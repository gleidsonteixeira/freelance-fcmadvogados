<?php
    include("../../../../config/conexao.php");
    include("../model/CHA.php");
    include("../model/CHI.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "UPDATE ATENDENTE") {
            if(isset($_POST["CHA_COD"]) && isset($_POST["USU_COD"])) {
                if(!empty($_POST["CHA_COD"]) && !empty($_POST["USU_COD"])) {
                    $CHA_COD = $_POST["CHA_COD"];
                    $USU_COD = $_POST["USU_COD"];

                    $chamados = new CHA();
                    $chamados->setCHA_ATENDENTE($USU_COD);
                    $chamados->setCHA_COD($CHA_COD);
                    $chamados->setCHA_STATUS(2);

                    $retorno = $chamados->update_atendente();
                    if ($retorno['status'] == 0) {
                        $chamadoxatendente = new CHI();
                        $chamadoxatendente->setCHI_CHA($CHA_COD);
                        $chamadoxatendente->setCHI_ATENDENTE($USU_COD);
                        $chamadoxatendente->setCHI_DTINIC(date("Y-m-d"));
                        $chamadoxatendente->setCHI_HRINIC(date("H:i:s"));
                        $chamadoxatendente->setCHI_STATUS(1);

                        $retorno_chamadoxatendente = $chamadoxatendente->create();
                        if ($retorno_chamadoxatendente['status'] != 0) {
                            $chamados->setCHA_ATENDENTE(0);
                            $chamados->setCHA_COD($CHA_COD);
                            $chamados->setCHA_STATUS(1);

                            $retornoRollBack = $chamados->update_atendente();
                            if ($retornoRollBack['status'] == 0) {
                                $retorno['mensagem'] .= " | Erro ao inserir o Atendente, RollBack realizado com sucesso.";
                            }else{
                                $retorno['mensagem'] .= " | Erro ao executar o RollBack.";
                            }
                        }
                    }

                    echo json_encode($retorno);
                }else{
                    $retorno = array("status" => 4, "mensagem" => "Todos os campos são obrigatórios, verifique se não há nenhum vazio.");
                    echo json_encode($retorno);
                }
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "UPDATE ATENDENTE ALL") {
            if(isset($_POST["CHA_COD"]) && isset($_POST["USU_COD"])) {
                if(!empty($_POST["CHA_COD"]) && !empty($_POST["USU_COD"])) {
                    $CHA_COD = $_POST["CHA_COD"];
                    $USU_COD = $_POST["USU_COD"];

                    for ($i = 0; $i < count($CHA_COD); $i++) { 
                        $chamados = new CHA();
                        $chamados->setCHA_ATENDENTE($USU_COD);
                        $chamados->setCHA_COD($CHA_COD[$i]);
                        $chamados->setCHA_STATUS(2);
                        $retorno = $chamados->update_atendente();
                        if ($retorno['status'] == 0) {
                            $chamadoxatendente = new CHI();
                            $chamadoxatendente->setCHI_CHA($CHA_COD[$i]);
                            $chamadoxatendente->setCHI_ATENDENTE($USU_COD);
                            $chamadoxatendente->setCHI_DTINIC(date("Y-m-d"));
                            $chamadoxatendente->setCHI_HRINIC(date("H:i:s"));
                            $chamadoxatendente->setCHI_STATUS(1);

                            $retorno_chamadoxatendente = $chamadoxatendente->create();
                            if ($retorno_chamadoxatendente['status'] != 0) {
                                $chamados->setCHA_ATENDENTE(0);
                                $chamados->setCHA_COD($CHA_COD);
                                $chamados->setCHA_STATUS(1);

                                $retornoRollBack = $chamados->update_atendente();
                                if ($retornoRollBack['status'] == 0) {
                                    $retorno['mensagem'] .= " | Erro ao inserir o Atendente, RollBack realizado com sucesso.";
                                }else{
                                    $retorno['mensagem'] .= " | Erro ao executar o RollBack.";
                                }
                            }
                        }
                    }

                    echo json_encode($retorno);
                }else{
                    $retorno = array("status" => 4, "mensagem" => "Todos os campos são obrigatórios, verifique se não há nenhum vazio.");
                    echo json_encode($retorno);
                }
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "UPDATE PRIORIDADE") {
            if(isset($_POST["CHA_COD"]) && isset($_POST["PRI_COD"])) {
                if(!empty($_POST["CHA_COD"]) && !empty($_POST["PRI_COD"])) {
                    $CHA_COD = $_POST["CHA_COD"];
                    $PRI_COD = $_POST["PRI_COD"];

                    $chamados = new CHA();
                    $chamados->setCHA_PRI($PRI_COD);
                    $chamados->setCHA_COD($CHA_COD);
                    $retorno = $chamados->update_prioridade();
                    echo json_encode($retorno);
                }else{
                    $retorno = array("status" => 4, "mensagem" => "Todos os campos são obrigatórios, verifique se não há nenhum vazio.");
                    echo json_encode($retorno);
                }
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "UPDATE PRIORIDADE ALL") {
            if(isset($_POST["CHA_COD"]) && isset($_POST["PRI_COD"])) {
                if(!empty($_POST["CHA_COD"]) && !empty($_POST["PRI_COD"])) {
                    $CHA_COD = $_POST["CHA_COD"];
                    $PRI_COD = $_POST["PRI_COD"];

                    for ($i = 0; $i < count($CHA_COD); $i++) { 
                        $chamados = new CHA();
                        $chamados->setCHA_PRI($PRI_COD);
                        $chamados->setCHA_COD($CHA_COD[$i]);
                        $retorno = $chamados->update_prioridade();
                    }

                    echo json_encode($retorno);
                }else{
                    $retorno = array("status" => 4, "mensagem" => "Todos os campos são obrigatórios, verifique se não há nenhum vazio.");
                    echo json_encode($retorno);
                }
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
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