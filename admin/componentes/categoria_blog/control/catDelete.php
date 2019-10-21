<?php
    include("../../../../config/conexao.php");
    include("../model/CAT.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "DELETE CATEGORIA") {
            if(isset($_POST["CAT_COD"])) {
                if(!empty($_POST["CAT_COD"])) {
                    $CAT_COD =  $_POST["CAT_COD"];


                    $cat = new CAT();
                    $cat->setCAT_STATUS(2);
                    $cat->setCAT_COD($CAT_COD);
                    $retorno = $cat->deleteCategoria();
                    $cat->deletarPostsCategoria($CAT_COD);
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