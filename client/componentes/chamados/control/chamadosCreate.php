<?php
    include("../../../../config/conexao.php");
    include("../model/CHA.php");
    include("../model/CAN.php");
    include("../model/CHI.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CREATE") {
            if(isset($_POST["chamados-assunto"]) && isset($_POST["chamados-copia-para"]) && 
                isset($_POST['chamados-descricao']) && isset($_FILES['chamados-anexos']) && 
                isset($_POST['chamados-setor']) && isset($_POST['chamados-tipo-solicitacao'])
            ) {
                if(!empty($_POST["chamados-assunto"]) && !empty($_POST['chamados-descricao']) && 
                    !empty($_POST['chamados-setor']) && !empty($_POST['chamados-tipo-solicitacao'])
                ) {
                    $chamado = new CHA();
                    $chamado->setCHA_ASSUNTO($_POST["chamados-assunto"]);
                    $chamado->setCHA_DESC($_POST['chamados-descricao']);
                    $chamado->setCHA_EMP($_SESSION['C_USU_EMP']);
                    $chamado->setCHA_SOLICITANTE($_SESSION['C_USU_COD']);
                    $chamado->setCHA_COPIA($_POST["chamados-copia-para"]);
                    $chamado->setCHA_STO($_POST['chamados-setor']);
                    $chamado->setCHA_TIPO($_POST['chamados-tipo-solicitacao']);
                    $chamado->setCHA_DTEMISSAO(date("Y-m-d"));
                    $chamado->setCHA_HREMISSAO(date("H:i:s"));
                    $chamado->setCHA_STATUS(1);

                    $retorno = $chamado->create();

                    if ($retorno['status'] == 0) {

                        $retorno_enviar_email = $chamado->enviar_email_cadchamados($retorno['codigo']);
                        if(count($_FILES['chamados-anexos']['name']) > 0){
                            $i = 0;
                            while ($i < count($_FILES['chamados-anexos']['name'])) {
                                $nome = $_FILES['chamados-anexos']['name'][$i];
                                $arq_tmp = $_FILES['chamados-anexos']['tmp_name'][$i];

                                $extensao = pathinfo($nome, PATHINFO_EXTENSION);
                                $extensao = strtolower ($extensao);
                                $novo_name = uniqid(time()).".".$extensao;

                                $location_anexos = '../../../../chamados_anexos';
                                if(!is_dir($location_anexos)){
                                    mkdir($location_anexos);
                                }
                                
                                $destino = $location_anexos."/".$novo_name;

                                if (@move_uploaded_file($arq_tmp, $destino)) {
                                    $anexo = new CAN();
                                    $anexo->setCAN_ANEXO($novo_name);
                                    $anexo->setCAN_CHA($retorno['codigo']);
                                    $retorno_img = $anexo->create();

                                    if($retorno_img['status'] != 0){
                                        $retorno['mensagem'] .= " | Erro ao cadastrar Anexo ";
                                    }
                                }

                                $i++;
                            }
                        }
                    }

                    echo json_encode($retorno);
                }else{
                    $retorno = array("status" => 4, "mensagem" => "Todos os campos são obrigatórios, verifique se não há nenhum vazio.");
                    echo json_encode($retorno);
                }
            }else{
                $retorno = array("status" => 3, "mensagem" => "Todos os campos são obrigatórios, verifique se não há nenhum vazio.");
                echo json_encode($retorno);
            }
        }else{
            $retorno = array("status" => 2, "mensagem" => "Ação não encontrada");
            echo json_encode($retorno);
        }
    }else{
        $retorno = array("status" => 1, "mensagem" => "Ação não encontrada");
        echo json_encode($retorno);     
    }
?>