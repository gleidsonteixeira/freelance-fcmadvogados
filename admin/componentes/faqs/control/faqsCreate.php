<?php
    include("../../../../config/conexao.php");
    include("../model/FAQ.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CREATE") {
            if(isset($_POST["faqs-pergunta"]) && isset($_POST["faqs-resposta"])  && isset($_POST["faqs-setor"])) {
                if(!empty($_POST["faqs-pergunta"]) && !empty($_POST["faqs-resposta"])  && !empty($_POST["faqs-setor"])) {
                    $faqs_perguntas = utf8_decode($_POST["faqs-pergunta"]);
                    $faqs_respostas = utf8_decode($_POST["faqs-resposta"]);
                    $faqs_setor = $_POST["faqs-setor"];

                    $faq = new FAQ();
                    $faq->setFAQ_PERGUNTA($faqs_perguntas);
                    $faq->setFAQ_RESPOSTA($faqs_respostas);
                    $faq->setFAQ_DTCAD(date("Y-m-d"));
                    $faq->setFAQ_HRCAD(date("H:i:s"));
                    $faq->setFAQ_STATUS(1);
                    $faq->setFAQ_STO($faqs_setor);
                    $faq->setFAQ_USUCAD($_SESSION['A_USU_COD']);

                    $retorno = $faq->create();
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