<?php
    include("../../../../config/conexao.php");
    include("../model/PAT.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "UPDATE") {
            if(isset($_POST["pat-nome"]) && isset($_POST["pat-desc"])
            && isset($_POST["pat-dtinic"]) && isset($_POST["pat-hrinic"])
            && isset($_POST["pat-dtencerra"])
            && isset($_POST["pat-analista"]) && isset($_POST["pat-cod"])) {
                if(!empty($_POST["pat-nome"]) && !empty($_POST["pat-desc"])
                && !empty($_POST["pat-dtinic"]) && !empty($_POST["pat-hrinic"])
                && !empty($_POST["pat-analista"]) && !empty($_POST["pat-cod"])) {
                    $at_nome = utf8_decode($_POST["pat-nome"]);
                    $at_desc = utf8_decode($_POST["pat-desc"]);
                    $at_dtinic = $_POST["pat-dtinic"];
                    $at_hrinic = $_POST["pat-hrinic"];
                    $at_dtencerra = $_POST["pat-dtencerra"];
                    $at_analista = $_POST["pat-analista"];
                    $at_cod = $_POST["pat-cod"];

                    $atividade = new PAT();
                    $atividade->setPAT_COD($at_cod);
                    $atividade->setPAT_NOME($at_nome);
                    $atividade->setPAT_DESC($at_desc);
                    $atividade->setPAT_STATUS(1);
                    $atividade->setPAT_PRI(1);
                    $atividade->setPAT_ANALISTA($at_analista);
                    $atividade->setPAT_DTINIC(date("Y-m-d", strtotime($at_dtinic)));
                    $atividade->setPAT_HRINIC($at_hrinic);
                    if(!empty($_POST["pat-dtencerra"])){
                        $atividade->setPAT_DTENCERRA(date("Y-m-d", strtotime($at_dtencerra)));
                    }
                    $atividade->setPAT_USUCAD($_SESSION['A_USU_COD']);

                    $retorno = $atividade->update();
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