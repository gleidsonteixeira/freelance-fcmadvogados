<?php
    include("../../../../config/conexao.php");
    include("../model/BAN.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR BANNER") {
            $banner = new BAN();
            $lista_banner = $banner->listar_banner_ativos("LIMIT 10");
            $conta_banner = $banner->conta_banner();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_banner" => $lista_banner, "quant_banner" => $conta_banner);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO BANNER") {
            if(isset($_POST["BAN_ID"])){
                $banner = new BAN();
                $lista_banner = $banner->listar_banner_pag_prox("LIMIT 10", $_POST["BAN_ID"]);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_banner" => $lista_banner);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO BANNER") {
            if(isset($_POST["BAN_ID"])){
                $banner = new BAN();
                $lista_banner = $banner->listar_banner_pag_ante("LIMIT 10", $_POST["BAN_ID"]);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_banner" => $lista_banner);
                echo json_encode($retorno);
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