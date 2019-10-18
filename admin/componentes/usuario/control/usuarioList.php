<?php
    include("../../../../config/conexao.php");
    include("../model/USU.php");
    include("../model/SA1.php");
    include("../model/MNU.php");
    include("../model/EMP.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR USUARIO") {
            $usuario = new SA1();
            $lista_usuario = $usuario->listar_usuario_ativos("LIMIT 10", $_SESSION['A_USU_COD']);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_usuario" => $lista_usuario);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO USUARIO") {
            if(isset($_POST["SA1_COD"])){
                $usuario = new SA1();
                $lista_usuario = $usuario->listar_usuario_pag_prox("LIMIT 10", $_POST["SA1_COD"], $_SESSION['A_USU_COD']);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_usuario" => $lista_usuario);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO USUARIO") {
            if(isset($_POST["SA1_COD"])){
                $usuario = new SA1();
                $lista_usuario = $usuario->listar_usuario_pag_ante("LIMIT 10", $_POST["SA1_COD"], $_SESSION['A_USU_COD']);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_usuario" => $lista_usuario);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR EMPRESA") {
            $empresa = new EMP();
            $lista_empresa = $empresa->listar_empresa_ativos("");

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_empresa" => $lista_empresa);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR MENU" && isset($_POST['EMP_COD'])) {
            $menu = new MNU();
            $lista_menu = $menu->listar_menu_ativo_tipo($_POST['EMP_COD']);

            $empresa = new EMP();
            $tipo_empresa = $empresa->buscar_tipo_empresa($_POST['EMP_COD']);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_menu" => $lista_menu, "tipo_empresa" => $tipo_empresa);
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
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR DADOS USUARIO" && isset($_POST['SA1_COD'])) {
            $usuario = new SA1();
            $lista_usuario = $usuario->listar_dados($_POST['SA1_COD']);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_usuario" => $lista_usuario);
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