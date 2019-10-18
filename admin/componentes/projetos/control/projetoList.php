<?php
    include("../../../../config/conexao.php");
    include("../model/EMP.php");
    include("../model/PJT.php");
    include("../model/PAT.php");
    include("../../chamados/model/SA1.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR EMPRESA") {
            $empresa = new EMP();
            $usuario = new SA1();
            $lista_empresa = $empresa->listar_empresa_ativos("");
            $lista_analistas = $usuario->listar_usuario_empresa(21);
            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_empresa" => $lista_empresa, "lista_analistas" => $lista_analistas);
            
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR PROJETOS"){
            $projeto = new PJT();
            $lista_projeto = $projeto->listar_projetos_ativos("LIMIT 10");
            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_projetos" => $lista_projeto);
            
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR DADOS PROJETOS" && isset($_POST['PJT_COD'])) {
            $projeto = new PJT();
            $lista_projeto = $projeto->listar_dados_projeto($_POST['PJT_COD']);
            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_projeto" => $lista_projeto);
            
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR DADOS ATIVIDADE" && isset($_POST['PAT_COD'])) {
            $atividade = new PAT();
            $lista_atividade = $atividade->listar_dados_atividade($_POST['PAT_COD']);
            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_atividade" => $lista_atividade);
            
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO PROJETOS") {
            if(isset($_POST["PJT_COD"])){
                $projeto = new PJT();
                $lista_projeto = $projeto->listar_projeto_pag_prox("LIMIT 10", $_POST["PJT_COD"]);
                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_projetos" => $lista_projeto);
                
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO PROJETOS") {
            if(isset($_POST["PJT_COD"])){
                $projeto = new PJT();
                $lista_projeto = $projeto->listar_projeto_pag_ante("LIMIT 10", $_POST["PJT_COD"]);
                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_projetos" => $lista_projeto);
                
                echo json_encode($retorno);
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