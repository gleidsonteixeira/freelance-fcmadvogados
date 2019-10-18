<?php
    include("../../../../config/conexao.php");
    include("../model/FTR.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "REMOVE FILTRO") {

            $filtro = new FTR();
            $retorno = $filtro->update_situacao(1, 2, 'RHOCHA', $_SESSION['A_USU_COD']);
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