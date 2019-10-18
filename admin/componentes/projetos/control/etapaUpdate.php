<?php
    include("../../../../config/conexao.php");
    include("../model/PET.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "UPDATE") {
            if(isset($_POST["pet-nome"]) && isset($_POST["pet-cod"]) && isset($_POST["pjt-cod"])) {
                if(!empty($_POST["pet-nome"]) && !empty($_POST["pet-cod"]) && !empty($_POST["pjt-cod"])) {
                    $pet_cod = $_POST["pet-cod"];
                    $pet_pjt = $_POST["pjt-cod"];
                    $pet_nome = utf8_decode($_POST["pet-nome"]);

                    $etapa = new PET();
                    $etapa->setPET_COD($pet_cod);
                    $etapa->setPET_NOME($pet_nome);
                    $etapa->setPET_PJT($pet_pjt);

                    $retorno = $etapa->update();
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