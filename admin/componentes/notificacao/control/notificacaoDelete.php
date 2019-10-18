<?php
    include("../../../../config/conexao.php");
    include("../model/NTF.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "DELETE") {
            if(isset($_POST["NTF_COD"])) {
                if(!empty($_POST["NTF_COD"])) {
                    $ntf_cod =  $_POST["NTF_COD"];

                    $ntf = new NTF();
                    $ntf->setNTF_STATUS(2);
                    $ntf->setNTF_COD($ntf_cod);
                    $retorno = $ntf->delete($ntf_cod);
                    
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