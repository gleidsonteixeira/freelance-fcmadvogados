<?php
    include("../../../../config/conexao.php");
    include("../model/BLO.php");
    include("../model/CAT.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CADASTRO POST") {
            if(isset($_POST['blog-autor']) && isset($_POST["blo_texto_cad"]) && isset($_POST["blog-titulo"]) && isset($_POST["pre-texto"]) &&  isset($_POST["categoria"]) && isset($_POST["post-status"]) && isset($_POST['meta-descricao']) && isset($_POST['frase-chave']) && isset($_POST['titulo-seo']) && isset($_FILES['post-imagem'])) {
                if(!empty($_POST['blog-autor']) && !empty($_POST["blo_texto_cad"]) && !empty($_POST["blog-titulo"]) && !empty($_POST["post-status"]) && !empty($_POST['meta-descricao']) && !empty($_POST['frase-chave']) && !empty($_POST['titulo-seo']) && $_FILES['post-imagem']['name'] != '') {
                    
                    $meta_descricao = utf8_decode($_POST['meta-descricao']); 
                    $frase_chave = utf8_decode($_POST['frase-chave']);
                    $titulo_seo = utf8_decode($_POST['titulo-seo']);
                    $post_titulo = utf8_decode($_POST["blog-titulo"]);
                    $texto = utf8_decode($_POST["blo_texto_cad"]);
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
                    $novo_name = uniqid(time()).".".$extensao;  

                    if (strstr ( '.jpg;.jpeg;.gif;.png', $extensao)) {
                        $blo = new BLO();
                        $blo->setBLO_TITULO($post_titulo);
                        $blo->setBLO_CATEGORIA($post_categoria);
                        $blo->setBLO_TEXTO($texto);
                        $blo->setBLO_P_TEXTO($pre_texto);
                        $blo->setBLO_SEO($titulo_seo);
                        $blo->setBLO_FRASE_CHAVE($frase_chave);
                        $blo->setBLO_META_DESC($meta_descricao);
                        $blo->setBLO_DATA($post_data);
                        $blo->setBLO_VISIBILIT($post_visibilit);
                        $blo->setBLO_CLICKS($post_clicks);
                        $blo->setBLO_AUTOR($post_autor);
                        $blo->setBLO_IMAGEM($novo_name);
                        $blo->setBLO_STATUS($posts_status);
                        $retorno = $blo->create($posts_status);

                        if ($retorno['status'] == 0) {
                            $cat = new CAT();
                            $resultado = $cat->inserirCategoria($post_categoria); 
                            if($resultado['status'] == 0){
                                $destino = 'img/posts/'.$novo_name;
                                if (!@move_uploaded_file($post_imagem_tmp, '../../../../'.$destino )) {
                                    $retornoRollBack = $blo->delete();
                                    if($retornoRollBack['status'] == 0){
                                        $retorno['mensagem'] .= " | Erro ao cadastrar Imagem, RollBack foi executado com Sucesso.";
                                    }else{
                                        $retorno['mensagem'] .= " | Erro ao cadastrar Imagem, erro ao executar o RollBack.";
                                    }
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
    }else if(isset($_GET["ACAO"])) {
        if(!empty($_GET["ACAO"]) && $_GET["ACAO"] == "SALVAR_IMAGEM") {
            if (file_exists("images/" . $_FILES["upload"]["name"])) {
                echo $_FILES["upload"]["name"] . " already exists. ";
            } else {
                
                $post_imagem_nome = utf8_decode($_FILES['upload']['name']);
                $post_imagem_tmp = $_FILES['upload']['tmp_name'];

                $extensao = pathinfo($post_imagem_nome, PATHINFO_EXTENSION);
                $extensao = strtolower ($extensao);
                $novo_name = uniqid(time()).".".$extensao;  
                
                $destino = 'img/posts/'.$novo_name;
                if (@move_uploaded_file($post_imagem_tmp, '../../../../'.$destino )) {
                    $funcNum = $_GET['CKEditorFuncNum'] ;
                    $token = $_POST['ckCsrfToken'] ;
                    $url = 'http://localhost/objetiveti/'.$destino;
                    $message = 'Upload realizado com sucesso!';
                    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
                }else{
                    echo $_FILES["upload"]["name"] . " already exists. ";
                }
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