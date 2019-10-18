<?php
    include("../../../../config/conexao.php");
    include("../model/CHA.php");
    include("../model/FTR.php");
    include("../model/EMP.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR CHAMADOS" && 
            isset($_POST['fDataDe']) && isset($_POST['fDataAte']) && 
            isset($_POST['relatorio-chamados-status']) && isset($_POST['relatorio-chamados-empresa'])
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
            $lista_chamados = $chamados->listar_chamados_ativos("LIMIT 10", $_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD'], $fDataDe, $fDataAte, $_POST['relatorio-chamados-status'], $_POST['relatorio-chamados-empresa']);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_chamados" => $lista_chamados, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
            echo json_encode($retorno);

        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO CHAMADOS" && 
            isset($_POST['fDataDe']) && isset($_POST['fDataAte']) && 
            isset($_POST['relatorio-chamados-status']) && isset($_POST['relatorio-chamados-empresa'])
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
                $lista_chamados = $chamados->listar_chamados_pag_prox("LIMIT 10", $_POST["CHA_COD"], $_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD'], $fDataDe, $fDataAte, $_POST['relatorio-chamados-status'], $_POST['relatorio-chamados-empresa']);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_chamados" => $lista_chamados, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO CHAMADOS" && 
            isset($_POST['fDataDe']) && isset($_POST['fDataAte']) && 
            isset($_POST['relatorio-chamados-status']) && isset($_POST['relatorio-chamados-empresa'])
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
                $lista_chamados = $chamados->listar_chamados_pag_ante("LIMIT 10", $_POST["CHA_COD"], $_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD'], $fDataDe, $fDataAte, $_POST['relatorio-chamados-status'], $_POST['relatorio-chamados-empresa']);

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
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR FILTRO") {
            $filtro = new FTR();
            $lista_filtro = $filtro->listar_filtro_ativo($_SESSION['A_USU_COD'], "RHOCHA");

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