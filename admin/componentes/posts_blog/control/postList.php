<?php
    include("../../../../config/conexao.php");
    include("../model/BLO.php");
    include("../model/CAT.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR POSTS") {
            $blo = new BLO();
            $lista_posts = $blo->listar_posts_ativos("LIMIT 10");
            $conta_posts = $blo->conta_posts();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_posts" => $lista_posts, "quant_posts" => $conta_posts);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR CATEGORIA" ){
            $cat = new CAT();
            $lista_categoria = $cat->listar_categorias_ativas();

            $retorno = array("status" => 0, "mensagem" => "Listagem da categoria realizada com sucesso", "lista_categoria" => $lista_categoria);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO POST") {
            if(isset($_POST["BLO_ID"])){
                $blo = new BLO();
                $lista_post = $blo->listar_posts_pag_prox("LIMIT 10", $_POST["BLO_ID"]);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_posts" => $lista_post);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO POST") {
            if(isset($_POST["BLO_COD"])){
                $blo = new BLO();
                $lista_posts = $blo->listar_posts_pag_ante("LIMIT 10", $_POST["BLO_COD"]);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_posts" => $lista_posts);
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
