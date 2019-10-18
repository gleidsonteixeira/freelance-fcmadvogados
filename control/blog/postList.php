<?php
    include("../../config/conexao.php");
    include("../../model/BLO.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR POSTS") {
            $blo = new BLO();
            $lista_posts = $blo->listar_posts_ativos("LIMIT 10");

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_posts" => $lista_posts);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "BUSCAR" && isset($_POST["postbusca"])){
            $textoPost = $_POST["postbusca"];
            $blo = new BLO();
            $lista_posts = $blo->buscar_posts($textoPost);

            $retorno = array("status" => 0, "mensagem" => "Busca realizada com sucesso", "lista_posts" => $lista_posts);
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