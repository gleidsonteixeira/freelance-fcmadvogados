<?php

    include("../../../../config/conexao.php");
    include("../model/PAT.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CREATE") {
            if(isset($_POST["pat-nome"]) && isset($_POST["pat-desc"])
            && isset($_POST["pat-dtinic"]) && isset($_POST["pat-hrinic"])
            && isset($_POST["pat-dtencerra"])
            && isset($_POST["pat-analista"]) && isset($_POST["pet-cod"])
            && isset($_POST["pjt-cod"])
            ) {
                if(!empty($_POST["pat-nome"]) && !empty($_POST["pat-desc"])
                && !empty($_POST["pat-dtinic"]) && !empty($_POST["pat-hrinic"])
                && !empty($_POST["pat-analista"]) && !empty($_POST["pet-cod"])
                && !empty($_POST["pjt-cod"])
                ) {
                    $at_nome = utf8_decode($_POST["pat-nome"]);
                    $at_desc = utf8_decode($_POST["pat-desc"]);
                    $at_dtinic = $_POST["pat-dtinic"];
                    $at_hrinic = $_POST["pat-hrinic"];
                    $at_dtencerra = $_POST["pat-dtencerra"];
                    $at_analista = $_POST["pat-analista"];
                    $at_etapa = $_POST["pet-cod"];
                    $at_projeto = $_POST["pjt-cod"];

                    $atividade = new PAT();
                    $atividade->setPAT_NOME($at_nome);
                    $atividade->setPAT_DESC($at_desc);
                    $atividade->setPAT_STATUS(1);
                    $atividade->setPAT_PJT($at_projeto);
                    $atividade->setPAT_PET($at_etapa);
                    $atividade->setPAT_PRI(1);
                    $atividade->setPAT_ANALISTA($at_analista);
                    $atividade->setPAT_DTINIC(date("Y-m-d", strtotime($at_dtinic)));
                    $atividade->setPAT_HRINIC($at_hrinic);
                    if(!empty($_POST["pat-dtencerra"])){
                        $atividade->setPAT_DTENCERRA(date("Y-m-d", strtotime($at_dtencerra)));
                    }else{
                        $atividade->setPAT_DTENCERRA('');
                    }
                    $atividade->setPAT_DTCAD(date("Y-m-d"));
                    $atividade->setPAT_HRCAD(date("H:i:s"));
                    $atividade->setPAT_USUCAD($_SESSION['A_USU_COD']);

                    $retorno = $atividade->create();
                    echo json_encode($retorno);
                }else{
                    var_dump($_POST);
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