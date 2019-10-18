<?php
    include("../../../../config/conexao.php");
    include("../model/CTA.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CADASTRO") {
            if(isset($_POST["cta-nome"])
            ) {
                if(!empty($_POST["cta-nome"])
                ) {
                    $cta_nome = $_POST["cta-nome"];
                    
                    $cta = new CTA();
                    $cta->setCTA_NOME($cta_nome);
                        
                    $retorno = $cta->create();

                    // if ($retorno['status'] == 0) {
                    //     $retornoRollBack = $cta->delete();
                    //     if($retornoRollBack['status'] == 0){
                    //         $retorno['mensagem'] .= " | RollBack foi executado com Sucesso.";
                    //     }else{
                    //         $retorno['mensagem'] .= " | Erro ao executar o RollBack.";
                    //     }
                    // }

                    echo json_encode($retorno);
                }
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