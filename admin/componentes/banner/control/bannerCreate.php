<?php
    include("../../../../config/conexao.php");
    include("../model/BAN.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CADASTRO") {
            if(isset($_POST["banner-titulo"]) && isset($_POST["banner-sub-titulo"]) && 
                isset($_POST["banner-cta-stats"]) && isset($_POST["banner-status"]) && 
                isset($_POST['banner-url']) && isset($_FILES['banner-imagem']) && 
                isset($_POST['banner-alinhamento'])
            ) {
                if(!empty($_POST["banner-titulo"]) && !empty($_POST["banner-status"]) && 
                   !empty($_POST["banner-alinhamento"]) && $_FILES['banner-imagem']['name'] != ''
                ) {
                    $banner_titulo = $_POST["banner-titulo"];
                    $banner_sub_titulo = $_POST["banner-sub-titulo"];
                    $banner_cta_status = $_POST["banner-cta-stats"];
                    if($banner_cta_status == 1){
                        $banner_cta = $_POST["banner-cta-text"];
                    }else{
                        $banner_cta = 0;
                    }
                    $banner_data = date('Y-m-d');
                    $banner_visibilit = $_POST["banner-status"];
                    $banner_iamgem_nome = $_FILES['banner-imagem']['name'];
                    $banner_iamgem_tmp = $_FILES['banner-imagem']['tmp_name'];
                    $banner_url = $_POST["banner-url"];
                    $banner_clicks = 0;
                    $alinhamento = $_POST['banner-alinhamento'];
                    $extensao = pathinfo($banner_iamgem_nome, PATHINFO_EXTENSION);
                    $extensao = strtolower ($extensao);

                    if (strstr ( '.jpg;.jpeg;.gif;.png', $extensao )) {
                        $banner = new BAN();
                        $banner->setBAN_TITULO($banner_titulo);
                        $banner->setBAN_SUB_TITULO($banner_sub_titulo);
                        $banner->setBAN_CTA($banner_cta);
                        $banner->setBAN_CTA_STATUS($banner_cta_status);
                        $banner->setBAN_DATA($banner_data);
                        $banner->setBAN_STATUS(1);
                        $banner->setBAN_VISIBILIT($banner_visibilit);
                        $banner->setBAN_IMAGEM($banner_iamgem_nome);
                        $banner->setBAN_URL($banner_url);
                        $banner->setBAN_CLICKS($banner_clicks);
                        $banner->setBAN_ALINHAMENTO($alinhamento);

                        $retorno = $banner->create();

                        if ($retorno['status'] == 0) {
                            $destino = 'img/banner/'.$banner_iamgem_nome;
                            if (!@move_uploaded_file($banner_iamgem_tmp, '../../../../'.$destino )) {
                                $retornoRollBack = $banner->delete();
                                if($retornoRollBack['status'] == 0){
                                    $retorno['mensagem'] .= " | Erro ao cadastrar Imagem, RollBack foi executado com Sucesso.";
                                }else{
                                    $retorno['mensagem'] .= " | Erro ao cadastrar Imagem, erro ao executar o RollBack.";
                                }
                            }
                        }else{
                            $retornoRollBack = $banner->delete();
                            if($retornoRollBack['status'] == 0){
                                $retorno['mensagem'] .= " | RollBack foi executado com Sucesso.";
                            }else{
                                $retorno['mensagem'] .= " | Erro ao executar o RollBack.";
                            }
                        }
                    }else {
                        $retorno = array("status" => 5, "mensagem" => "Formato da imagem Inválido.");
                    }

                    echo json_encode($retorno);
                }else{
                    $retorno = array("status" => 4, "mensagem" => "Campos obrigatórios: 'FRASE PRINCIPAL', 'IMAGEM' e 'VISÍVEL ?'.");
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