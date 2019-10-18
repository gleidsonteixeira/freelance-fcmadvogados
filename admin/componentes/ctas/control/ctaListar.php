<?php
    include("../../../../config/conexao.php");
    include("../model/CTA.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR CTA") {
            $cta = new CTA();
            $lista_cta = $cta->listar_ctas();
            $conta_cta = $cta->conta_ctas();
            $avaliacoes = $cta->conta_avaliacoes();
            $grafico = $cta->listar_clicks_ctas();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_cta" => $lista_cta, "quant_cta" => $conta_cta, "avaliacoes" => $avaliacoes, "grafico" => $grafico);
            echo json_encode($retorno);
        }
        // else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO BANNER") {
        //     if(isset($_POST["BAN_ID"])){
        //         $banner = new BAN();
        //         $lista_banner = $banner->listar_banner_pag_prox("LIMIT 10", $_POST["BAN_ID"]);

        //         $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_banner" => $lista_banner);
        //         echo json_encode($retorno);
        //     }else{
        //         $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
        //         echo json_encode($retorno);
        //     }
        // }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO BANNER") {
        //     if(isset($_POST["BAN_ID"])){
        //         $banner = new BAN();
        //         $lista_banner = $banner->listar_banner_pag_ante("LIMIT 10", $_POST["BAN_ID"]);

        //         $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_banner" => $lista_banner);
        //         echo json_encode($retorno);
        //     }else{
        //         $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
        //         echo json_encode($retorno);
        //     }
        // }else{
        //     $retorno = array("status" => 2, "mensagem" => "Ação não encontrada");
        //     echo json_encode($retorno);
        // }
    }else{
        $retorno = array("status" => 1, "mensagem" => "Ação não encontrada");
        echo json_encode($retorno);     
    }
?>