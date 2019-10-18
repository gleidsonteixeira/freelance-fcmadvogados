<?php
    include("../config/conexao.php");
    include("../model/USU.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LOGIN") {
            if(isset($_POST["LOGIN"]) && isset($_POST["SENHA"])) {
                if(!empty($_POST["LOGIN"]) && !empty($_POST["SENHA"])) {
                    $LOGIN = $_POST["LOGIN"];
                    $SENHA = $_POST["SENHA"];

                    $usuario = new USU();
                    $usuario->setUSU_EMAIL($LOGIN);
                    $usuario->setUSU_SENHA($SENHA);
                    $usuario->setUSU_STATUS(1);

                    $retorno = $usuario->login();
                    echo json_encode($retorno);
                }else{
                    $retorno = array("status" => 4, "mensagem" => "Todos os campos são obrigatórios, verifique se não há nenhum vazio.");
                    echo json_encode($retorno);
                }
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "DESLOGAR") {
            session_destroy();
            $retorno = array("status" => 0, "mensagem" => "Deslogado com sucesso!");
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