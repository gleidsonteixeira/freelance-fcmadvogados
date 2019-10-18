<?php
    include("../../../../config/conexao.php");
    include("../model/EMP.php");
    include("../model/STO.php");
    include("../model/EST.php");
    include("../model/CID.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR RESUMO") {
            $empresa = new EMP();
            $lista_resumo = $empresa->listar_resumo();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_resumo" => $lista_resumo);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR EMPRESA") {
            $empresa = new EMP();
            $lista_empresa = $empresa->listar_empresa_ativos("LIMIT 10");

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_empresa" => $lista_empresa);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO EMPRESA") {
            if(isset($_POST["EMP_COD"])){
                $empresa = new EMP();
                $lista_empresa = $empresa->listar_empresa_pag_prox("LIMIT 10", $_POST["EMP_COD"]);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_empresa" => $lista_empresa);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO EMPRESA") {
            if(isset($_POST["EMP_COD"])){
                $empresa = new EMP();
                $lista_empresa = $empresa->listar_empresa_pag_ante("LIMIT 10", $_POST["EMP_COD"]);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_empresa" => $lista_empresa);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "BUSCAR EMPRESA") {
            if(isset($_POST["BUSCA"])){
                $empresa = new EMP();
                $lista_empresa = $empresa->buscar_empresa($_POST["BUSCA"]);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_empresa" => $lista_empresa);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR SETORES") {
            $setor = new STO();
            $lista_setor = $setor->listar_setor_ativos();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_setor" => $lista_setor);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR ESTADOS") {
            $estados = new EST();
            $lista_estados = $estados->listar();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_estados" => $lista_estados);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR CIDADES" && isset($_POST['idestado'])) {
            $cidades = new CID();
            $lista_cidades = $cidades->listar($_POST['idestado']);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_cidades" => $lista_cidades);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR DADOS EMPRESA" && isset($_POST['EMP_COD'])) {
            $empresa = new EMP();
            $lista_empresa = $empresa->listar_dados($_POST['EMP_COD']);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_empresa" => $lista_empresa);
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