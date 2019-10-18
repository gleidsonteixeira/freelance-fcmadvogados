<?php

    include("../../../../config/conexao.php");
    include("../model/PJT.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CREATE") {
            if(isset($_POST["pjt-nome"]) && isset($_POST["pjt-dtinic"]) && 
                isset($_POST["pjt-emp"]) && isset($_POST["pjt-emp-nome"])
            ) {
                if(!empty($_POST["pjt-nome"]) && !empty($_POST["pjt-dtinic"]) && 
                   !empty($_POST["pjt-emp"]) && !empty($_POST["pjt-emp-nome"])
                ) {
                    $projeto_nome = utf8_decode($_POST["pjt-nome"]);
                    $projeto_data =  date("Y-m-d", strtotime($_POST["pjt-dtinic"]));
                    $projeto_empresa = $_POST["pjt-emp"];
                    $projeto_nome_empresa = $_POST["pjt-emp-nome"];

                    $projeto = new PJT();
                    $projeto->setPJT_NOME($projeto_nome);
                    $projeto->setPJT_DTINIC($projeto_data);
                    $projeto->setPJT_STATUS(1);
                    $projeto->setPJT_EMP($projeto_empresa);
                    $projeto->setPJT_EMP_NOME($projeto_nome_empresa);
                    $projeto->setPJT_DTCAD(date("Y-m-d"));
                    $projeto->setPJT_HRCAD(date("H:i:s"));
                    $projeto->setPJT_USUCAD($_SESSION['A_USU_COD']);

                    $retorno = $projeto->create();
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