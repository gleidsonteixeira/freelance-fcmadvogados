<?php
    include("../../../../config/conexao.php");
    include("../model/BLO.php");
    include("../model/CAT.php");
  
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "DELETAR") {
            if (isset($_POST["ID"])) {
                $id = $_POST['ID'];
                $cat_id = $_POST['CAT_ID'];

                $blo = new BLO();
                $blo->setBLO_COD($id);
                $blo->setBLO_STATUS(2);
                $retorno = $blo->deletarPost();
                echo json_encode($retorno);
                
                $cat = new CAT();
                $cat->diminuirPost($cat_id);
              

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