<?php
    include("../../../../config/conexao.php");
    include("../model/CHA.php");
    include("../model/EMP.php");
    include("../model/SA1.php");
    include("../model/STO.php");
    include("../model/TSO.php");
    include("../model/PRI.php");
    include("../model/CMS.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR CHAMADOS QUANTIDADE MES" && isset($_POST['MES'])) {
            $chamados = new CHA();
            $diaFinalDoMes = cal_days_in_month(CAL_GREGORIAN, $_POST['MES'] , date("Y"));
            if($diaFinalDoMes < 10){
                $diaFinalDoMes = "0".$diaFinalDoMes;
            }

            $mes = $_POST['MES'];
            if($mes < 10){
                $mes = "0".$mes;
            }

            $periodo_de = date("Y")."-".$mes."-01";
            $periodo_ate = date("Y")."-".$mes."-".$diaFinalDoMes;
            $listar_chamados_quantidade = $chamados->listar_chamados_quantidade($_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD'], $periodo_de, $periodo_ate);
            $listar_chamados_garfico = $chamados->listar_chamados_grafico_mes($_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD'], 1, $diaFinalDoMes, $mes, date("Y")); 

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "listar_chamados_quantidade" => $listar_chamados_quantidade, "listar_chamados_garfico" => $listar_chamados_garfico, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR CHAMADOS QUANTIDADE PERIODO" && isset($_POST['PERIODODE']) && isset($_POST['PERIODOATE'])) {

            $array_de = explode("-", $_POST['PERIODODE']);
            $array_ate = explode("-", $_POST['PERIODOATE']);
            $periodo_de = $array_de[2]."-".$array_de[1]."-".$array_de[0];
            $periodo_ate = $array_ate[2]."-".$array_ate[1]."-".$array_ate[0];
            // echo $periodo_de;

            $chamados = new CHA();
            $listar_chamados_quantidade = $chamados->listar_chamados_quantidade($_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD'], $periodo_de, $periodo_ate);
            $listar_chamados_garfico = $chamados->listar_chamados_grafico_periodo($_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD'], $periodo_de, $periodo_ate); 

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "listar_chamados_quantidade" => $listar_chamados_quantidade, "listar_chamados_garfico" => $listar_chamados_garfico, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR CHAMADOS" && isset($_POST["status"])) {
            $chamados = new CHA();
            $lista_chamados = $chamados->listar_chamados_ativos("LIMIT 10", $_POST["status"], $_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD']);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_chamados" => $lista_chamados, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO CHAMADOS") {
            if(isset($_POST["CHA_COD"]) && isset($_POST["status"])){
                $chamados = new CHA();
                $lista_chamados = $chamados->listar_chamados_pag_prox("LIMIT 10", $_POST["CHA_COD"], $_POST["status"], $_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD']);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_chamados" => $lista_chamados, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO CHAMADOS") {
            if(isset($_POST["CHA_COD"]) && isset($_POST["status"])){
                $chamados = new CHA();
                $lista_chamados = $chamados->listar_chamados_pag_ante("LIMIT 10", $_POST["CHA_COD"], $_POST["status"], $_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD']);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_chamados" => $lista_chamados, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
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
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR SOLICITANTE" && isset($_POST["COD_EMP"])) {
            $usuario = new SA1();
            $lista_usuario = $usuario->listar_usuario_empresa($_POST["COD_EMP"]);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_usuario" => $lista_usuario);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR SETOR") {
            $setor = new STO();
            $lista_setor = $setor->listar_setor_ativos();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_setor" => $lista_setor);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR TIPO SOLICITACAO") {
            $tsolicitacao = new TSO();
            $lista_tsolicitacao = $tsolicitacao->listar_tipo_solicitacao_ativos();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_tsolicitacao" => $lista_tsolicitacao);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR PRIORIDADE") {
            $prioridade = new PRI();
            $lista_prioridade = $prioridade->listar_prioridade_ativos();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_prioridade" => $lista_prioridade);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR ATENDENTES") {
            $atendentes = new SA1();
            $lista_atendentes = $atendentes->listar_atendentes_ativos();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_atendentes" => $lista_atendentes);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "BUSCAR DADOS") {
            if(isset($_POST["CHA_COD"])) {
                if(!empty($_POST["CHA_COD"])) {
                    $chamados = new CHA();
                    $lista_chamados = $chamados->buscar_dados($_POST["CHA_COD"]);

                    $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_chamados" => $lista_chamados, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
                    echo json_encode($retorno);
                }else{
                    $retorno = array("status" => 4, "mensagem" => "Todos os campos são obrigatórios, verifique se não há nenhum vazio.");
                    echo json_encode($retorno);
                }
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }

        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR RESPOSTAS") {
            if(isset($_POST["CHA_COD"]) && isset($_POST["COD_ULTIMO_CMS"])) {
                if(!empty($_POST["CHA_COD"])) {
                    $respostas = new CMS();
                    $lista_respostas = $respostas->lista_respostas($_POST["CHA_COD"], $_POST["COD_ULTIMO_CMS"]);

                    $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_respostas" => $lista_respostas, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
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