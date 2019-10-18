<?php

    include("../../../../config/conexao.php");
    include("../model/PET.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CREATE") {
            if(isset($_POST["pet-nome"]) && isset($_POST["pjt-cod"])
            ) {
                if(!empty($_POST["pet-nome"]) && !empty($_POST["pjt-cod"])
                ) {
                    $etapa_nome = utf8_decode($_POST["pet-nome"]);
                    $etapa_projeto = $_POST["pjt-cod"];

                    $etapa = new PET();
                    $etapa->setPET_NOME($etapa_nome);
                    $etapa->setPET_STATUS(1);
                    $etapa->setPET_PJT($etapa_projeto);
                    $etapa->setPET_ORDEM(1);
                    $etapa->setPET_DTCAD(date("Y-m-d"));
                    $etapa->setPET_HRCAD(date("H:i:s"));
                    $etapa->setPET_USUCAD($_SESSION['A_USU_COD']);

                    $retorno = $etapa->create();
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