<?php
    include("../../../../config/conexao.php");
    include("../model/CAT.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR CATEGORIA") {
            $cat = new CAT();
            $lista_cat = $cat->listar_cat_ativos("LIMIT 10");

            $retorno = array("status" => 0, "mensagem" => "Listagem das categorias realizada com sucesso", "lista_cat" => $lista_cat);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO CATEGORIA") {
            if(isset($_POST["CAT_COD"])){
                $cat = new CAT();
                $lista_cat = $cat->listar_categoria_pag_prox("LIMIT 10", $_POST["CAT_COD"]);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_cat" => $lista_cat);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => $_POST['CAT_COD']);
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO CATEGORIA") {
            if(isset($_POST["CAT_COD"])){
                $cat = new CAT();
                $lista_cat = $cat->listar_categoria_pag_ante("LIMIT 10", $_POST["CAT_COD"]);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_cat" => $lista_cat);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR DADOS CATEGORIA EDITAR" && isset($_POST['CAT_COD'])) {
            $cat = new CAT();
            $lista_cat = $cat->listar_dados_categoria($_POST['CAT_COD']);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_cat" => $lista_cat);
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