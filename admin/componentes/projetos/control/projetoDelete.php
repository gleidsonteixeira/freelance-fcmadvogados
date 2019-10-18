<?php
    include("../../../../config/conexao.php");
    include("../model/PJT.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "DELETE") {
            if(isset($_POST["PJT_COD"])) {
                if(!empty($_POST["PJT_COD"])) {
                    $PJT_COD =  $_POST["PJT_COD"];

                    $projeto = new PJT();
                    $projeto->setPJT_STATUS(2);
                    $projeto->setPJT_COD($PJT_COD);
                    $retorno = $projeto->delete();
                    
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