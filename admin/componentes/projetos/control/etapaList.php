<?php
    include("../../../../config/conexao.php");
    include("../model/PET.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR ETAPAS" && isset($_POST['PJT_COD'])) {
            $etapas = new PET();
            $pjt_cod = $_POST['PJT_COD'];
            $lista_etapas = $etapas->listar_etapas_ativos($pjt_cod, "");
            
            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_etapas" => $lista_etapas);
            echo json_encode($retorno);
        }
        // else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR PROJETOS"){
        //     $projeto = new PJT();
        //     $lista_projeto = $projeto->listar_projetos_ativos("LIMIT 10");

        //     $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_projetos" => $lista_projeto);
        //     echo json_encode($retorno);
        // }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR DADOS PROJETOS" && isset($_POST['PJT_COD'])) {
        //     $projeto = new PJT();
        //     $lista_projeto = $projeto->listar_dados_projeto($_POST['PJT_COD']);
    
        //     $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_projeto" => $lista_projeto);
        //     echo json_encode($retorno);
        // }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO PROJETOS") {
        //     if(isset($_POST["PJT_COD"])){
        //         $projeto = new PJT();
        //         $lista_projeto = $projeto->listar_projeto_pag_prox("LIMIT 10", $_POST["PJT_COD"]);

        //         $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_projetos" => $lista_projeto);
        //         echo json_encode($retorno);
        //     }else{
        //         $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
        //         echo json_encode($retorno);
        //     }
        // }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO PROJETOS") {
        //     if(isset($_POST["PJT_COD"])){
        //         $projeto = new PJT();
        //         $lista_projeto = $projeto->listar_projeto_pag_ante("LIMIT 10", $_POST["PJT_COD"]);

        //         $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_projetos" => $lista_projeto);
        //         echo json_encode($retorno);
        //     }else{
        //         $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
        //         echo json_encode($retorno);
        //     }
        // }
        else{
            $retorno = array("status" => 2, "mensagem" => "Ação não encontrada");
            echo json_encode($retorno);
        }        
    }else{
        $retorno = array("status" => 1, "mensagem" => "Ação não encontrada");
        echo json_encode($retorno);     
    }
?>