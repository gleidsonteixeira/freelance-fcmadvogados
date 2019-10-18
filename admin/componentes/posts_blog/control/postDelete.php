<?php
    include("../../../../config/conexao.php");
    include("../model/BLO.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "DELETAR") {
            if (isset($_POST["ID"])) {
            $id = $_POST['ID'];

           for ($i = 0; $i < count($id); $i++) { 
                $blo = new BLO();
                $blo->setBLO_COD($id[$i]);
                $blo->setBLO_STATUS(2);
                $retorno = $blo->deletarPost();

            }

            $retorno = array("status" => 0, "mensagem" => "Post deletado com sucesso !");
            echo json_encode($retorno);
            }else{
                 $retorno = array("status" => 3, "Mensagem:" => "Verifique os parametros enviados");
                echo json_encode($retorno);
            }
        }else{
             $retorno = array("status" => 2, "Mensagem:" => "Verifique os parametros enviados");
             echo json_encode($retorno);
        }
    }else{
        $retorno = array("status" => 1, "Mensagem:" => "Ação não encontrada");
        echo json_encode($retorno);
    }
                        
?>