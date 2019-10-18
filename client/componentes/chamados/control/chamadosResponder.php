<?php
    include("../../../../config/conexao.php");
    include("../model/CHA.php");
    include("../model/CMS.php");
    include("../model/CMA.php");
    include("../model/CEN.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "RESPONDER") {
            if(isset($_POST["resposta-mensagem"]) && isset($_FILES['resposta-anexos']) && isset($_POST['resposta-chamados-cod'])) {
                if(!empty($_POST["resposta-mensagem"]) && !empty($_POST["resposta-chamados-cod"])) {
                    $resposta = new CMS();
                    $resposta->setCMS_CHA($_POST["resposta-chamados-cod"]);
                    $resposta->setCMS_USU($_SESSION['C_USU_COD']);
                    $resposta->setCMS_DESC($_POST["resposta-mensagem"]);
                    $resposta->setCMS_TIPOUSU("CLI");
                    $resposta->setCMS_DTEMISSAO(date("Y-m-d"));
                    $resposta->setCMS_HREMISSAO(date("H:i:s"));

                    $retorno = $resposta->create();
                    if($retorno['status'] == 0){
                        $chamado = new CHA();
                        $chamado->setCHA_COD($_POST["resposta-chamados-cod"]);

                        if($chamado->verificar_se_existe_atendente()){
                            $chamado->setCHA_STATUS(2);
                            $retorno_atualiza = $chamado->mudar_status();
                        }
                        $retorno_envia_email = $chamado->enviar_email_interacao($_POST["resposta-chamados-cod"]);
                        if(count($_FILES['resposta-anexos']['name']) > 0){
                            $i = 0;
                            while ($i < count($_FILES['resposta-anexos']['name'])) {
                                $nome = $_FILES['resposta-anexos']['name'][$i];
                                $arq_tmp = $_FILES['resposta-anexos']['tmp_name'][$i];

                                $extensao = pathinfo($nome, PATHINFO_EXTENSION);
                                $extensao = strtolower ($extensao);
                                $novo_name = uniqid(time()).".".$extensao;

                                $location_anexos = '../../../../chamados_anexos';
                                if(!is_dir($location_anexos)){
                                    mkdir($location_anexos);
                                }
                                
                                $destino = $location_anexos."/".$novo_name;

                                if (@move_uploaded_file($arq_tmp, $destino)) {
                                    $anexo = new CMA();
                                    $anexo->setCMA_ANEXO($novo_name);
                                    $anexo->setCMA_CMS($retorno['codigo']);
                                    $anexo->setCMA_USU($_SESSION['C_USU_COD']);
                                    $anexo->setCMA_CHA($_POST["resposta-chamados-cod"]);
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
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "FINALIZAR") {
            if(isset($_POST["CHA_COD"])) {
                if(!empty($_POST["CHA_COD"])) {
                    $chamado = new CHA();
                    $chamado->setCHA_COD($_POST["CHA_COD"]);
                    $chamado->setCHA_STATUS(4);
                    $chamado->setCHA_DTFINAL(date("Y-m-d"));
                    $chamado->setCHA_HRFINAL(date("H:i:s"));

                    $retorno = $chamado->update_finalizacao();
                    if($retorno['status'] == 0){
                        $historico_finalizacao = new CEN();
                        $historico_finalizacao->setCEN_TIPO("FIN");
                        $historico_finalizacao->setCEN_DTCAD($chamado->getCHA_DTFINAL());
                        $historico_finalizacao->setCEN_HRCAD($chamado->getCHA_HRFINAL());
                        $historico_finalizacao->setCEN_CHA($_POST["CHA_COD"]);
                        $historico_finalizacao->setCEN_ATENDENTE($retorno['CHA_ATENDENTE']);
                        $historico_finalizacao->setCEN_SOLICITANTE($_SESSION['C_USU_COD']);
                        $retorno_histfinal = $historico_finalizacao->create();
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
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "RECUSAR FINALIZACAO") {
            if(isset($_POST["CHA_COD"])) {
                if(!empty($_POST["CHA_COD"])) {
                    $chamado = new CHA();
                    $chamado->setCHA_COD($_POST["CHA_COD"]);
                    $chamado->setCHA_AGFINAL(0);
                    $chamado->setCHA_DTAGFINAL(date("Y-m-d"));
                    $chamado->setCHA_HRAGFINAL(date("H:i:s"));

                    $retorno = $chamado->recusar_finalizacao();
                    if($retorno['status'] == 0){
                        $historico_finalizacao = new CEN();
                        $historico_finalizacao->setCEN_TIPO("RFI");
                        $historico_finalizacao->setCEN_DTCAD($chamado->getCHA_DTAGFINAL());
                        $historico_finalizacao->setCEN_HRCAD($chamado->getCHA_HRAGFINAL());
                        $historico_finalizacao->setCEN_CHA($_POST["CHA_COD"]);
                        $historico_finalizacao->setCEN_ATENDENTE($retorno['CHA_ATENDENTE']);
                        $historico_finalizacao->setCEN_SOLICITANTE($_SESSION['C_USU_COD']);
                        $retorno_histfinal = $historico_finalizacao->create();
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
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "REALIZAR AVALIACAO") {
            if(isset($_POST["CHA_COD"]) && isset($_POST["CHA_OPINIAO"]) && isset($_POST["CHA_AVALIACAO"])) {
                if(!empty($_POST["CHA_COD"]) && !empty($_POST["CHA_AVALIACAO"])) {
                    $chamado = new CHA();
                    $chamado->setCHA_COD($_POST["CHA_COD"]);
                    $chamado->setCHA_AVALIACAO($_POST["CHA_AVALIACAO"]);
                    $chamado->setCHA_AVALIAOPINIAO($_POST["CHA_OPINIAO"]);
                    $chamado->setCHA_DTAVALIACAO(date("Y-m-d"));
                    $chamado->setCHA_HRAVALIACAO(date("H:i:s"));

                    $retorno = $chamado->realizar_avaliacao();
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