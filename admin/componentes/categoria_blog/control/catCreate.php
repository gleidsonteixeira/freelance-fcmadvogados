<?php
    include("../../../../config/conexao.php");
    include("../model/CAT.php");
    session_start();

    if(isset($_POST["ACAO"])) {
          if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CREATE CATEGORIA") {
               if(isset($_POST["cat-nome"]) && !empty($_POST['cat-nome'])) {
                $nome = utf8_decode($_POST['cat-nome']);
                $cat = new CAT();
                $cat->setCAT_NOME($nome);
                $cat->setCAT_STATUS(1);
                $cat->createCAT();

                $retorno = array("status" => 0, "mensagem" => "Cadastro da categoria realizado com sucesso!");
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