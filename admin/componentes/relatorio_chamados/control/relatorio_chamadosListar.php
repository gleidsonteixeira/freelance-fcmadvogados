<?php
    include("../../../../config/conexao.php");
    include("../model/CHA.php");
    include("../model/FTR.php");
    include("../model/EMP.php");
    include("../model/SA1.php");
    include("../model/STO.php");
    include("../model/PRI.php");
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
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR CHAMADOS" && 
            isset($_POST['fDataDe']) && isset($_POST['fDataAte']) && 
            isset($_POST['relatorio-chamados-atendentes']) && isset($_POST['relatorio-chamados-prioridade']) && 
            isset($_POST['relatorio-chamados-status']) && isset($_POST['relatorio-chamados-empresa']) && 
            isset($_POST['relatorio-chamados-setor'])
        ) {
            $fDataDe = "";
            $fDataAte = "";

            if(!empty($_POST['fDataDe'])){
                $array_de = explode("-", $_POST['fDataDe']);
                if(count($array_de) == 3){
                    $fDataDe = $array_de[2]."-".$array_de[1]."-".$array_de[0];
                }
            }
            
            if(!empty($_POST['fDataAte'])){
                $array_ate = explode("-", $_POST['fDataAte']);
                if(count($array_ate) == 3){
                    $fDataAte = $array_ate[2]."-".$array_ate[1]."-".$array_ate[0];
                }
            }

            $chamados = new CHA();
            $lista_chamados = $chamados->listar_chamados_ativos("LIMIT 10", $_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD'], $fDataDe, $fDataAte, $_POST['relatorio-chamados-setor'], $_POST['relatorio-chamados-atendentes'], $_POST['relatorio-chamados-prioridade'], $_POST['relatorio-chamados-status'], $_POST['relatorio-chamados-empresa']);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_chamados" => $lista_chamados, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
            echo json_encode($retorno);

        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO CHAMADOS" && 
            isset($_POST['fDataDe']) && isset($_POST['fDataAte']) && 
            isset($_POST['relatorio-chamados-atendentes']) && isset($_POST['relatorio-chamados-prioridade']) && 
            isset($_POST['relatorio-chamados-status']) && isset($_POST['relatorio-chamados-empresa']) && 
            isset($_POST['relatorio-chamados-setor'])
        ) {
            if(isset($_POST["CHA_COD"])){
                $fDataDe = "";
                $fDataAte = "";

                if(!empty($_POST['fDataDe'])){
                    $array_de = explode("-", $_POST['fDataDe']);
                    if(count($array_de) == 3){
                        $fDataDe = $array_de[2]."-".$array_de[1]."-".$array_de[0];
                    }
                }
                
                if(!empty($_POST['fDataAte'])){
                    $array_ate = explode("-", $_POST['fDataAte']);
                    if(count($array_ate) == 3){
                        $fDataAte = $array_ate[2]."-".$array_ate[1]."-".$array_ate[0];
                    }
                }

                $chamados = new CHA();
                $lista_chamados = $chamados->listar_chamados_pag_prox("LIMIT 10", $_POST["CHA_COD"], $_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD'], $fDataDe, $fDataAte, $_POST['relatorio-chamados-setor'], $_POST['relatorio-chamados-atendentes'], $_POST['relatorio-chamados-prioridade'], $_POST['relatorio-chamados-status'], $_POST['relatorio-chamados-empresa']);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_chamados" => $lista_chamados, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO CHAMADOS" && 
            isset($_POST['fDataDe']) && isset($_POST['fDataAte']) && 
            isset($_POST['relatorio-chamados-atendentes']) && isset($_POST['relatorio-chamados-prioridade']) && 
            isset($_POST['relatorio-chamados-status']) && isset($_POST['relatorio-chamados-empresa']) && 
            isset($_POST['relatorio-chamados-setor'])
        ) {
            if(isset($_POST["CHA_COD"])){
                $fDataDe = "";
                $fDataAte = "";

                if(!empty($_POST['fDataDe'])){
                    $array_de = explode("-", $_POST['fDataDe']);
                    if(count($array_de) == 3){
                        $fDataDe = $array_de[2]."-".$array_de[1]."-".$array_de[0];
                    }
                }
                
                if(!empty($_POST['fDataAte'])){
                    $array_ate = explode("-", $_POST['fDataAte']);
                    if(count($array_ate) == 3){
                        $fDataAte = $array_ate[2]."-".$array_ate[1]."-".$array_ate[0];
                    }
                }

                $chamados = new CHA();
                $lista_chamados = $chamados->listar_chamados_pag_ante("LIMIT 10", $_POST["CHA_COD"], $_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD'], $fDataDe, $fDataAte, $_POST['relatorio-chamados-setor'], $_POST['relatorio-chamados-atendentes'], $_POST['relatorio-chamados-prioridade'], $_POST['relatorio-chamados-status'], $_POST['relatorio-chamados-empresa']);

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
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR SETOR") {
            $setor = new STO();
            $lista_setor = $setor->listar_setor_ativos();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_setor" => $lista_setor);
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
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR FILTRO") {
            $filtro = new FTR();
            $lista_filtro = $filtro->listar_filtro_ativo($_SESSION['A_USU_COD'], "RLTCHA");

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_filtro" => $lista_filtro);
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