<?php
    include("../../config/conexao.php");
    include("../../model/FAQ.php");
    include("../../model/STO.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR FAQ") {
            $faq = new FAQ();
            $lista_faqs = $faq->listar_faqs();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_faqs" => $lista_faqs);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR STO"){
            $sto = new STO();
            $lista_sto = $sto->listar_sto();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_sto" => $lista_sto);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR FAQ STO" && isset($_POST["STO_COD"])){
            $STO_COD = $_POST["STO_COD"];
            $faq = new FAQ();
            $lista_faq_sto = $faq->listar_faq_sto($STO_COD);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_faq_sto" => $lista_faq_sto);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CONTAR FAQ UTIL" && isset($_POST["FAQ_COD"])){
            $FAQ_COD = $_POST["FAQ_COD"];
            $faq = new FAQ();
            $retorno = $faq->contar_util($FAQ_COD);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CONTAR FAQ INUTIL" && isset($_POST["FAQ_COD"])){
            $FAQ_COD = $_POST["FAQ_COD"];
            $faq = new FAQ();
            $retorno = $faq->contar_inutil($FAQ_COD);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "BUSCAR" && isset($_POST["faqbusca"])){
            $textofaq = $_POST["faqbusca"];
            $faq = new FAQ();
            $lista_faqs = $faq->buscar_faqs($textofaq);

            $retorno = array("status" => 0, "mensagem" => "Busca realizada com sucesso", "lista_faqs" => $lista_faqs);
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