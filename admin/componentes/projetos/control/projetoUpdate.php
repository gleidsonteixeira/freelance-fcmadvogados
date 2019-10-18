<?php
    include("../../../../config/conexao.php");
    include("../model/PJT.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "UPDATE") {
            if(isset($_POST["pjt-nome"]) && isset($_POST["pjt-dtinic"]) && isset($_POST["pjt-cod"]) && isset($_POST["pjt-emp"]) && isset($_POST["pjt-emp-nome"])) {
                if(!empty($_POST["pjt-nome"]) && !empty($_POST["pjt-dtinic"]) && !empty($_POST["pjt-cod"]) && !empty($_POST["pjt-emp"]) && !empty($_POST["pjt-emp-nome"])) {
                    $pjt_cod = $_POST["pjt-cod"];
                    $pjt_nome = utf8_decode($_POST["pjt-nome"]);
                    $pjt_dtinic = date("Y-m-d", strtotime($_POST["pjt-dtinic"]));
                    $pjt_emp = $_POST["pjt-emp"];
                    $pjt_emp_nome = utf8_decode($_POST["pjt-emp-nome"]);

                    $projeto = new PJT();
                    $projeto->setPJT_COD($pjt_cod);
                    $projeto->setPJT_NOME($pjt_nome);
                    $projeto->setPJT_DTINIC($pjt_dtinic);
                    $projeto->setPJT_EMP($pjt_emp);
                    $projeto->setPJT_EMP_NOME($pjt_emp_nome);

                    $retorno = $projeto->update();
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