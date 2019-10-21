<?php
    include("../../../../config/conexao.php");
    include("../model/BLO.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ATUALIZAR") {
            if(isset($_POST['blog-autor']) && isset($_POST["blog-titulo"]) && isset($_POST["blog-pre-texto"]) && isset($_POST['blog-titulo-seo']) && isset($_POST["blog-frase-chave"]) && isset($_POST["meta-descricao"]) && isset($_POST["blog_texto_edi"]) && isset($_POST["post-cod"]) &&  isset($_POST["categoria"]) && isset($_POST["post-status"]) && isset($_FILES['post-imagem'])) {
                if(!empty($_POST['blog-autor']) && !empty($_POST["blog-titulo"]) && !empty($_POST["blog-pre-texto"]) && !empty($_POST['blog-titulo-seo']) && !empty($_POST["blog-frase-chave"]) && !empty($_POST["meta-descricao"]) && !empty($_POST["blog_texto_edi"]) && !empty($_POST["post-cod"]) &&  !empty($_POST["categoria"]) && !empty($_POST["post-status"]) && !empty($_FILES['post-imagem'])) {
                    $post_titulo = utf8_decode($_POST["blog-titulo"]);
                    $post_pre_texto = utf8_decode($_POST["blog-pre-texto"]);
                    $post_titulo_seo = utf8_decode($_POST["blog-titulo-seo"]);
                    $post_frase_chave = utf8_decode($_POST["blog-frase-chave"]);
                    $post_meta_descricao = utf8_decode($_POST["meta-descricao"]);
                    $post_texto_edi = utf8_decode($_POST["blog_texto_edi"]);
                    $post_autor = utf8_decode($_POST["blog-autor"]);
                    $post_categoria = utf8_decode($_POST["categoria"]);
                    $post_visibilit = $_POST["post-status"];
                    $post_data = date('Y-m-d');
                    $post_imagem_nome = utf8_decode($_FILES['post-imagem']['name']);
                    $post_imagem_tmp = $_FILES['post-imagem']['tmp_name'];
                    $post_status = 1;
                    $post_cod = $_POST['post-cod'];

                    $blo = new BLO();
                    if(isset($_FILES['post-imagem'])){
                        if(!empty($_FILES['post-imagem']['name'])){
                            $blo->setBLO_IMAGEM($post_imagem_nome);
                        }
                    }

                    $blo->setBLO_COD($post_cod);
                    $blo->setBLO_TITULO($post_titulo);
                    $blo->setBLO_CATEGORIA($post_categoria);
                    $blo->setBLO_TEXTO($post_texto_edi);
                    $blo->setBLO_P_TEXTO($post_pre_texto);
                    $blo->setBLO_SEO($post_titulo_seo);
                    $blo->setBLO_FRASE_CHAVE($post_frase_chave);
                    $blo->setBLO_META_DESC($post_meta_descricao);
                    $blo->setBLO_DATA($post_data);
                    $blo->setBLO_VISIBILIT($post_visibilit);
                    $blo->setBLO_AUTOR($post_autor);
                    $blo->setBLO_STATUS($post_status);
                    $retorno = $blo->update();

                    if ($retorno['status'] == 0) {
                        $destino = '../../../../img/posts/'.$post_imagem_nome;
                            if(isset($_FILES['post-imagem'])){
                                if(!empty($_FILES['post-imagem']['name'])){
                                $retornoImagem = $blo->moverArquivo('post-imagem', $_FILES, $destino);
                                if(isset($retornoImagem['status'])){
                                    $retornoRollBack = $blo->delete();
                                    if($retornoRollBack['status'] == 0){
                                        $retorno['mensagem'] .= " | Erro ao atualizar Imagem, RollBack foi executado com Sucesso.";
                                    }else{
                                        $retorno['mensagem'] .= " | Erro ao atualizar Imagem, erro ao executar o RollBack.";
                                    }
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