<?php
    include("../../../../config/conexao.php");
    include("../model/PET.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "DELETE") {
            if(isset($_POST["PET_COD"])) {
                if(!empty($_POST["PET_COD"])) {
                    $PET_COD =  $_POST["PET_COD"];

                    $etapa = new PET();
                    $etapa->setPET_STATUS(2);
                    $etapa->setPET_COD($PET_COD);
                    $retorno = $etapa->delete();
                    
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