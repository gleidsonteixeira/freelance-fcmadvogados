<?php
    include("../../../../config/conexao.php");
    include("../model/PAT.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "DELETE") {
            if(isset($_POST["PAT_COD"])) {
                if(!empty($_POST["PAT_COD"])) {
                    $PAT_COD =  $_POST["PAT_COD"];

                    $atividade = new PAT();
                    $atividade->setPAT_STATUS(2);
                    $atividade->setPAT_COD($PAT_COD);
                    $retorno = $atividade->delete();
                    
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