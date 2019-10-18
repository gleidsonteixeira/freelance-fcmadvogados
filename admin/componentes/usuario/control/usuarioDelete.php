<?php
    include("../../../../config/conexao.php");
    include("../model/USU.php");
    include("../model/SA1.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "DELETE") {
            if(isset($_POST["SA1_COD"])) {
                if(!empty($_POST["SA1_COD"])) {
                    $SA1_COD =  $_POST["SA1_COD"];

                    $usuario = new USU();
                    $usuario->setUSU_STATUS(2);
                    $usuario->setUSU_COD($usuario->buscar_cod($SA1_COD));
                    $retorno = $usuario->delete();

                    if($retorno["status"] == 0){
                        $usuario = new SA1();
                        $usuario->setSA1_STATUS(2);
                        $usuario->setSA1_COD($SA1_COD);
                        $retorno = $usuario->delete();
                    }
                    
                    echo json_encode($retorno);
                }else{
                    $retorno = array("status" => 4, "mensagem" => "Todos os campos são obrigatórios, verifique se não há nenhum vazio.");
                    echo json_encode($retorno);
                }
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
?>