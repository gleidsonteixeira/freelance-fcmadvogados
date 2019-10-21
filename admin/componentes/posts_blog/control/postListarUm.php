<?php
    include("../../../../config/conexao.php");
    include("../model/BLO.php");
    
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR UM POST") {
            $post = new BLO();
            $lista_post = $post->listar_post_por_id($_POST["ID"]);
            $clicks_post = $post->listar_clicks_post_por_id($_POST["ID"]);
            $clicks_mes_post = $post->listar_clicks_mes_post_por_id($_POST["ID"]);
            

             $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_post" => $lista_post, "clicks_post" => $clicks_post, "clicks_mes_post" => $clicks_mes_post);
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