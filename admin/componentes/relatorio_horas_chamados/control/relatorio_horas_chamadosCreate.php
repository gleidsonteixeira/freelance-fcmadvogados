<?php
    include("../../../../config/conexao.php");
    include("../model/FTR.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CREATE FILTRO" && 
            isset($_POST['fDataDe']) && isset($_POST['fDataAte']) && 
            isset($_POST['relatorio-chamados-status']) && isset($_POST['relatorio-chamados-empresa'])
        ) {
            $fDataDe = null;
            $fDataAte = null;
            $status = null;
            $empresa = null;

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

            if(!empty($_POST['relatorio-chamados-status'])){ $status = $_POST['relatorio-chamados-status']; }
            if(!empty($_POST['relatorio-chamados-empresa'])){ $empresa = $_POST['relatorio-chamados-empresa']; }

            $filtro = new FTR();
            $filtro->setFTR_USU($_SESSION['A_USU_COD']);
            $filtro->setFTR_ORIGEM('RHOCHA');
            $filtro->setFTR_SITUACAO(1);
            $filtro->setFTR_DATADE($fDataDe);
            $filtro->setFTR_DATAATE($fDataAte);
            $filtro->setFTR_CHASTATUS($status);
            $filtro->setFTR_EMPSOLICITANTE($empresa);
            $filtro->setFTR_DTCAD(date('Y-m-d'));
            $filtro->setFTR_HRCAD(date('H:i:s'));
            $retorno = $filtro->update_situacao(1, 2, 'RHOCHA', $_SESSION['A_USU_COD']);
            $retorno = $filtro->create();

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