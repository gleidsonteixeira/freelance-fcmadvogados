<?php
    include("../../../../config/conexao.php");
    include("../model/BAN.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR UM BANNER") {
            $banner = new BAN();
            $lista_banner = $banner->listar_banner_por_id($_POST["ID"]);
            $clicks_banner = $banner->listar_clicks_banner_por_id($_POST["ID"]);
            $clicks_mes_banner = $banner->listar_clicks_mes_banner_por_id($_POST["ID"]);
            
            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_banner" => $lista_banner, "clicks_banner" => $clicks_banner, "clicks_mes_banner" => $clicks_mes_banner);
            //$retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_banner" => $lista_banner);
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