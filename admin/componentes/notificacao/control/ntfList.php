<?php
    include("../../../../config/conexao.php");
    include("../model/STO.php");
    include("../model/NTF.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR NOTIFICACAO") {
            $ntf = new NTF();
            $lista_ntf = $ntf->listar_ntf_ativos("LIMIT 10");

            $retorno = array("status" => 0, "mensagem" => "Listagem das notificações realizada com sucesso", "lista_ntf" => $lista_ntf);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO NTF") {
            if(isset($_POST["NTF_COD"])){
                $ntf = new NTF();
                $lista_ntf = $ntf->listar_ntf_pag_prox("LIMIT 10", $_POST["NTF_COD"]);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_ntf" => $lista_ntf);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO NTF") {
            if(isset($_POST["NTF_COD"])){
                $ntf = new NTF();
                $lista_ntf = $ntf->listar_ntf_pag_ante("LIMIT 10", $_POST["NTF_COD"]);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_ntf" => $lista_ntf);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR DADOS NTF" && isset($_POST['NTF_COD'])) {
            $ntf = new NTF();
            $lista_ntf = $ntf->listar_dados_ntf($_POST['NTF_COD']);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_ntf" => $lista_ntf);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR SETORES" ){
            $sto = new STO();
            $lista_setores = $sto->listar_setor_ativos();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_setores" => $lista_setores);
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