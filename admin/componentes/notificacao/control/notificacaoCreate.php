<?php
    include("../../../../config/conexao.php");
    include("../model/NTF.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CREATE") {
            if(isset($_POST["notificacao-titulo"]) && isset($_POST["notificacao-descricacao"])  && isset($_POST["ntf-setor"])) {
                if(!empty($_POST["notificacao-titulo"]) && !empty($_POST["notificacao-descricacao"])  && !empty($_POST["ntf-setor"])) {
                    $ntf_titulo = utf8_decode($_POST["notificacao-titulo"]);
                    $ntf_descricao = utf8_decode($_POST["notificacao-descricacao"]);
                    $ntf_setor = $_POST["ntf-setor"];

                    $ntf = new NTF();
                    $ntf->setNTF_TITULO($ntf_titulo);
                    $ntf->setNTF_DESC($ntf_descricao);
                    $ntf->setNTF_TIPO("ADM");
                    $ntf->setNTF_STATUS(1);
                    $ntf->setNTF_DTCAD(date("Y-m-d"));
                    $ntf->setNTF_HRCAD(date("H:i:s"));
                    $ntf->setNTF_USUCAD($_SESSION['A_USU_COD']);
                    $ntf->setNTF_STO($ntf_setor);
                    

                   

                    $retorno = $ntf->create();
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