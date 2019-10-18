<?php
    include("../../../../config/conexao.php");
    include("../model/FAQ.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "DELETE") {
            if(isset($_POST["FAQ_COD"])) {
                if(!empty($_POST["FAQ_COD"])) {
                    $FAQ_COD =  $_POST["FAQ_COD"];

                    $faq = new FAQ();
                    $faq->setFAQ_STATUS(2);
                    $faq->setFAQ_COD($FAQ_COD);
                    $retorno = $faq->delete();
                    
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