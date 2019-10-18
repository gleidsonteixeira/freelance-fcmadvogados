<?php
    include("../../../../config/conexao.php");
    include("../model/NTF.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "UPDATE") {
            if(isset($_POST["notificacao-titulo"]) && isset($_POST["notificacao-descricacao"]) && isset($_POST["ntf-setor"]) && isset($_POST["ntf-cod"])) {
                if(!empty($_POST["notificacao-titulo"]) && !empty($_POST["notificacao-descricacao"]) && !empty($_POST["ntf-setor"]) && !empty($_POST["ntf-cod"])) {
                    $ntf_titulo = utf8_decode($_POST["notificacao-titulo"]);
                    $ntf_desc = utf8_decode($_POST["notificacao-descricacao"]);  
                    $ntf_cod = $_POST["ntf-cod"];
                    $notificacao_str = $_POST["ntf-setor"];

                    $ntf = new NTF();
                    $ntf->setNTF_COD($ntf_cod);
                    $ntf->setNTF_TITULO($ntf_titulo);
                    $ntf->setNTF_DESC($ntf_desc);
                    $ntf->setNTF_STO($notificacao_str);

                    $retorno = $ntf->update();
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
