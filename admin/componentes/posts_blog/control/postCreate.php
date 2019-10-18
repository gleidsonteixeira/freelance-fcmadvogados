<?php
    include("../../../../config/conexao.php");
    include("../model/BLO.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CADASTRO POST") {
            if(isset($_POST['blog-autor']) && isset($_POST["texto"]) && isset($_POST["blog-titulo"]) && isset($_POST["pre-texto"]) &&  isset($_POST["categoria"]) && isset($_POST["post-status"]) && isset($_FILES['post-imagem'])) {
                if(!empty($_POST['blog-autor']) && !empty($_POST["texto"]) && !empty($_POST["blog-titulo"]) && !empty($_POST["post-status"])  && $_FILES['post-imagem']['name'] != '') {
                    
                    $post_titulo = utf8_decode($_POST["blog-titulo"]);
                    $texto = utf8_decode($_POST["texto"]);
                    $pre_texto = utf8_decode($_POST["pre-texto"]);
                    $post_categoria = utf8_decode($_POST["categoria"]);
                    $post_data = date('Y-m-d');
                    $post_visibilit = $_POST["post-status"];
                    $post_autor = utf8_decode($_POST['blog-autor']);
                    $post_imagem_nome = utf8_decode($_FILES['post-imagem']['name']);
                    $post_imagem_tmp = $_FILES['post-imagem']['tmp_name'];
                    $post_clicks = 0;
                    $posts_status = 1;
                    $extensao = pathinfo($post_imagem_nome, PATHINFO_EXTENSION);
                    $extensao = strtolower ($extensao);

                    

                    if (strstr ( '.jpg;.jpeg;.gif;.png', $extensao)) {
                        $blo = new BLO();
                        $blo->setBLO_TITULO($post_titulo);
                        $blo->setBLO_CATEGORIA($post_categoria);
                        $blo->setBLO_TEXTO($texto);
                        $blo->setBLO_P_TEXTO($pre_texto);
                        $blo->setBLO_DATA($post_data);
                        $blo->setBLO_VISIBILIT($post_visibilit);
                        $blo->setBLO_CLICKS($post_clicks);
                        $blo->setBLO_AUTOR($post_autor);
                        $blo->setBLO_IMAGEM($post_imagem_nome);
                        $blo->setBLO_STATUS($posts_status);
                        $retorno = $blo->create($posts_status);

                        if ($retorno['status'] == 0) {
                            $destino = 'img/posts/'.$post_imagem_nome;
                            if (!@move_uploaded_file($post_imagem_tmp, '../../../../'.$destino )) {
                                $retornoRollBack = $blo->delete();
                                if($retornoRollBack['status'] == 0){
                                    $retorno['mensagem'] .= " | Erro ao cadastrar Imagem, RollBack foi executado com Sucesso.";
                                }else{
                                    $retorno['mensagem'] .= " | Erro ao cadastrar Imagem, erro ao executar o RollBack.";
                                }
                            }
                        }else{
                            $retornoRollBack = $blo->delete();
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