<?php
    include("../../../../config/conexao.php");
    include("../model/CAT.php");
    session_start();
   
    if(isset($_POST["ACAO"])) {
          if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "UPDATE CATEGORIA") {
               if(isset($_POST["categoria-nome"]) && !empty($_POST['categoria-nome'])) {
                $nome = $_POST['categoria-nome'];
                $cat_cod = $_POST['cat-cod'];
                $cat = new CAT();
                $cat->setCAT_NOME($nome);
                $cat->setCAT_COD($cat_cod);
                $cat->updateCAT();

                $retorno = array("status" => 0, "mensagem" => "Edição da categoria realizado com sucesso!");
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