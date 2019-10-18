<?php
    include("../../../../config/conexao.php");
    include("../model/EMP.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "UPDATE") {
            if(isset($_POST["empresa-rzsocial"]) && isset($_POST["empresa-nfantasia"]) && 
                isset($_POST["empresa-email"]) && isset($_POST["empresa-cnpj"]) && 
                isset($_POST['empresa-telefone']) && isset($_POST["empresa-endereco"]) && 
                isset($_POST['empresa-eresponsavel']) && isset($_POST["empresa-setor"]) &&
                isset($_POST["empresa-estados"]) && isset($_POST["empresa-cidades"]) &&
                isset($_POST["empresa-tempresa"]) && isset($_POST["empresa-cod"])
            ) {
                if(!empty($_POST["empresa-rzsocial"]) && !empty($_POST["empresa-nfantasia"]) && 
                   !empty($_POST["empresa-email"]) && !empty($_POST["empresa-cnpj"]) && 
                   !empty($_POST["empresa-telefone"]) && !empty($_POST["empresa-eresponsavel"]) && 
                   !empty($_POST["empresa-setor"]) && !empty($_POST["empresa-estados"]) && 
                   !empty($_POST["empresa-cidades"]) && !empty($_POST["empresa-tempresa"]) &&
                   !empty($_POST["empresa-cod"])
                ) {
                    $empresa_rzsocial = utf8_decode($_POST["empresa-rzsocial"]);
                    $empresa_nfantasia = utf8_decode($_POST["empresa-nfantasia"]);
                    $empresa_email = utf8_decode($_POST["empresa-email"]);
                    $empresa_cnpj =  $_POST["empresa-cnpj"]; 
                    $empresa_telefone = $_POST["empresa-telefone"];
                    $empresa_endereco =  utf8_decode($_POST["empresa-endereco"]); 
                    $empresa_eresponsavel = utf8_decode($_POST["empresa-eresponsavel"]);
                    $empresa_setor = explode(",", $_POST["empresa-setor"]); 
                    $empresa_estados = $_POST["empresa-estados"];
                    $empresa_cidades =  $_POST["empresa-cidades"]; 
                    $empresa_tempresa =  $_POST["empresa-tempresa"]; 
                    $empresa_cod =  $_POST["empresa-cod"]; 

                    $empresa = new EMP();
                    $empresa->setEMP_COD($empresa_cod);
                    $empresa->setEMP_RZSOCIAL($empresa_rzsocial);
                    $empresa->setEMP_NFANTASIA($empresa_nfantasia);
                    $empresa->setEMP_EMAIL($empresa_email);
                    $empresa->setEMP_CNPJ($empresa_cnpj);
                    $empresa->setEMP_TELEFONE($empresa_telefone);
                    $empresa->setEMP_EST($empresa_estados);
                    $empresa->setEMP_CID($empresa_cidades);
                    $empresa->setEMP_ENDERECO($empresa_endereco);
                    $empresa->setEMP_EMAILRESP($empresa_eresponsavel);
                    $empresa->setEMP_STATUS(1);
                    $empresa->setEMP_TIPO($empresa_tempresa);
                    $empresa->setEMP_DTEDIT(date("Y-m-d"));
                    $empresa->setEMP_HREDIT(date("H:i:s"));
                    $empresa->setEMP_USUEDIT($_SESSION['A_USU_COD']);

                    $retorno = $empresa->update();
                    if($retorno['status'] == 0){
                        $retorno_delete = $empresa->deleteEMPSTO($retorno['codigo']);
                        if($retorno_delete['status'] == 0){
                            for ($i = 0; $i < count($empresa_setor); $i++) { 
                                $empresa->createEMPSTO($retorno['codigo'], $empresa_setor[$i]);
                            }
                        }else{
                            $retorno['mensagem'] .= " | ".$retorno_delete['mensagem'];
                        }
                    }

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