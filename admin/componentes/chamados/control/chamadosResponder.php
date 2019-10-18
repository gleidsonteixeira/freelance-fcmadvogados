<?php
    include("../../../../config/conexao.php");
    include("../model/CHA.php");
    include("../model/CMS.php");
    include("../model/CMA.php");
    include("../model/CEN.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "RESPONDER") {
            if(isset($_POST["resposta-mensagem"]) && isset($_FILES['resposta-anexos']) && isset($_POST['resposta-chamados-cod']) && isset($_POST['resposta-horas-gasta'])) {
                if(!empty($_POST["resposta-mensagem"]) && !empty($_POST["resposta-chamados-cod"]) && !empty($_POST["resposta-horas-gasta"])) {
                    $hrgastaarray = explode(":", $_POST["resposta-horas-gasta"]);
                    if(count($hrgastaarray) > 1){
                        if(!empty($hrgastaarray[1])){
                            if($hrgastaarray[1] > 60){
                                $hrgastaarray[1] = 59;
                            }
                            $hrgasta = $hrgastaarray[0].":".$hrgastaarray[1];
                        }else{
                            $hrgasta = $hrgastaarray[0].":00";
                        }
                    }else{
                        $hrgasta = $hrgastaarray[0].":00";
                    }

                    $resposta = new CMS();
                    $resposta->setCMS_CHA($_POST["resposta-chamados-cod"]);
                    $resposta->setCMS_USU($_SESSION['A_USU_COD']);
                    $resposta->setCMS_DESC($_POST["resposta-mensagem"]);
                    $resposta->setCMS_TIPOUSU("ATN");
                    $resposta->setCMS_HRGASTA($hrgasta);
                    $resposta->setCMS_DTEMISSAO(date("Y-m-d"));
                    $resposta->setCMS_HREMISSAO(date("H:i:s"));

                    $retorno = $resposta->create();
                    if($retorno['status'] == 0){
                        $chamado = new CHA();
                        $chamado->setCHA_COD($_POST["resposta-chamados-cod"]);
                        $chamado->setCHA_STATUS(3);
                        $retorno_atualiza = $chamado->mudar_status();
                        // $retorno_envia_email = $chamado->enviar_email_interacao($_POST["resposta-chamados-cod"]);
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
                                    $anexo->setCMA_USU($_SESSION['A_USU_COD']);
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
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "RESPONDER FINALIZAR") {
            if(isset($_POST["resposta-mensagem"]) && isset($_FILES['resposta-anexos']) && isset($_POST['resposta-chamados-cod']) && isset($_POST['resposta-horas-gasta'])) {
                if(!empty($_POST["resposta-mensagem"]) && !empty($_POST["resposta-chamados-cod"]) && !empty($_POST["resposta-horas-gasta"])) {
                    $hrgastaarray = explode(":", $_POST["resposta-horas-gasta"]);
                    if(count($hrgastaarray) > 1){
                        if(!empty($hrgastaarray[1])){
                            if($hrgastaarray[1] > 60){
                                $hrgastaarray[1] = 59;
                            }
                            $hrgasta = $hrgastaarray[0].":".$hrgastaarray[1];
                        }else{
                            $hrgasta = $hrgastaarray[0].":00";
                        }
                    }else{
                        $hrgasta = $hrgastaarray[0].":00";
                    }
                    
                    $resposta = new CMS();
                    $resposta->setCMS_CHA($_POST["resposta-chamados-cod"]);
                    $resposta->setCMS_USU($_SESSION['A_USU_COD']);
                    $resposta->setCMS_DESC($_POST["resposta-mensagem"]);
                    $resposta->setCMS_TIPOUSU("ATN");
                    $resposta->setCMS_HRGASTA($hrgasta);
                    $resposta->setCMS_DTEMISSAO(date("Y-m-d"));
                    $resposta->setCMS_HREMISSAO(date("H:i:s"));

                    $retorno = $resposta->create();
                    if($retorno['status'] == 0){
                        $chamado = new CHA();
                        $chamado->setCHA_COD($_POST["resposta-chamados-cod"]);
                        $chamado->setCHA_AGFINAL(1);
                        $chamado->setCHA_DTAGFINAL($resposta->getCMS_DTEMISSAO());
                        $chamado->setCHA_HRAGFINAL($resposta->getCMS_HREMISSAO());
                        $retorno = $chamado->update_finalizacao();
                        $retorno_envia_email = $chamado->enviar_email_finalizacao($_POST["resposta-chamados-cod"]);
                        if($retorno['status'] == 0){
                            $historico_finalizacao = new CEN();
                            $historico_finalizacao->setCEN_TIPO("SFI");
                            $historico_finalizacao->setCEN_DTCAD($resposta->getCMS_DTEMISSAO());
                            $historico_finalizacao->setCEN_HRCAD($resposta->getCMS_HREMISSAO());
                            $historico_finalizacao->setCEN_CHA($_POST["resposta-chamados-cod"]);
                            $historico_finalizacao->setCEN_ATENDENTE($_SESSION['A_USU_COD']);
                            $historico_finalizacao->setCEN_SOLICITANTE($retorno['CHA_SOLICITANTE']);
                            $retorno_histfinal = $historico_finalizacao->create();

                            $chamado = new CHA();
                            $chamado->setCHA_COD($_POST["resposta-chamados-cod"]);
                            $chamado->setCHA_STATUS(3);
                            $retorno_atualiza = $chamado->mudar_status();
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
                                        $anexo->setCMA_USU($_SESSION['A_USU_COD']);
                                        $anexo->setCMA_CHA($_POST["resposta-chamados-cod"]);
                                        $retorno_img = $anexo->create();

                                        if($retorno_img['status'] != 0){
                                            $retorno['mensagem'] .= " | Erro ao cadastrar Anexo ";
                                        }
                                    }

                                    $i++;
                                }
                            }
                        }else{
                            $retorno['mensagem'] .= " | Erro ao solicitar finalização.";
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