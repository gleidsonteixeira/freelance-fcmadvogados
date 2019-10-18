<?php
    include("../../../../config/conexao.php");
    include("../model/PAT.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "UPDATE") {
            if(isset($_POST["pat-observacao"]) && isset($_POST["pat-cod"])) {
                if(!empty($_POST["pat-cod"])) {
                    $pat_cod = $_POST["pat-cod"];
                    $pat_observacao = utf8_decode($_POST["pat-observacao"]);

                    $atividade = new PAT();
                    $atividade->setPAT_COD($pat_cod);
                    $atividade->setPAT_OBSERVACAO($pat_observacao);

                    $retorno = $atividade->updateObservacao();
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