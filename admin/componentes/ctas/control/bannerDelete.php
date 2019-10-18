<?php
    include("../../../../config/conexao.php");
    include("../model/BAN.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "DELETAR") {
            $banner = new BAN();
            $banner->setBAN_ID($_POST["ID"]);
            $retorno = $banner->delete();
            echo json_encode($retorno);
        }
    }
                        
?>