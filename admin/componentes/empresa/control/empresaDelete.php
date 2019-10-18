<?php
    include("../../../../config/conexao.php");
    include("../model/EMP.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "DELETE") {
            if(isset($_POST["EMP_COD"])) {
                if(!empty($_POST["EMP_COD"])) {
                    $EMP_COD =  $_POST["EMP_COD"]; 

                    $empresa = new EMP();
                    $empresa->setEMP_STATUS(2);
                    $empresa->setEMP_COD($EMP_COD);
                    $retorno = $empresa->delete();
                    
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