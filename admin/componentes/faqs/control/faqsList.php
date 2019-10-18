<?php
    include("../../../../config/conexao.php");
    include("../model/STO.php");
    include("../model/FAQ.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR FAQ") {
            $faq = new FAQ();
            $lista_faqs = $faq->listar_faqs_ativos("LIMIT 10");

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_faqs" => $lista_faqs);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO FAQS") {
            if(isset($_POST["FAQ_COD"])){
                $faq = new FAQ();
                $lista_faq = $faq->listar_faq_pag_prox("LIMIT 10", $_POST["FAQ_COD"]);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_faqs" => $lista_faq);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO FAQS") {
            if(isset($_POST["FAQ_COD"])){
                $faq = new FAQ();
                $lista_faq = $faq->listar_faq_pag_ante("LIMIT 10", $_POST["FAQ_COD"]);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_faqs" => $lista_faq);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR DADOS FAQS" && isset($_POST['FAQ_COD'])) {
            $faq = new FAQ();
            $lista_faqs = $faq->listar_dados_faqs($_POST['FAQ_COD']);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_faqs" => $lista_faqs);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR SETORES" ){
            $sto = new STO();
            $lista_setores = $sto->listar_setor_ativos();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_setores" => $lista_setores);
            echo json_encode($retorno);
        }else{
            $retorno = array("status" => 2, "mensagem" => "Ação não encontrada");
            echo json_encode($retorno);
        }
    }else{
        $retorno = array("status" => 1, "mensagem" => "Ação não encontrada");
        echo json_encode($retorno);     
    }
?>