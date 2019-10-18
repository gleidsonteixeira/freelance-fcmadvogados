<?php
    include("../../../../config/conexao.php");
    include("../model/FAQ.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "UPDATE") {
            if(isset($_POST["faqs-pergunta"]) && isset($_POST["faqs-resposta"]) && isset($_POST["faqs-cod"]) && isset($_POST["faqs-setor"])) {
                if(!empty($_POST["faqs-pergunta"]) && !empty($_POST["faqs-resposta"]) && !empty($_POST["faqs-cod"]) && !empty($_POST["faqs-setor"])) {
                    $faqs_pergunta = utf8_decode($_POST["faqs-pergunta"]);
                    $faqs_resposta = utf8_decode($_POST["faqs-resposta"]);
                    $faqs_cod = $_POST["faqs-cod"];
                    $faqs_setor = $_POST["faqs-setor"];

                    $faq = new FAQ();
                    $faq->setFAQ_COD($faqs_cod);
                    $faq->setFAQ_PERGUNTA($faqs_pergunta);
                    $faq->setFAQ_RESPOSTA($faqs_resposta);
                    $faq->setFAQ_STO($faqs_setor);

                    $retorno = $faq->update();
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