<link rel="stylesheet" href="../css/ckeditor.css" type="text/css"/>
<div id="posts-componente" class="posts-componente">    
    <div class="box dados produtos">
        <div class="box-head">
            <h5 class="suave font">Resumo</h5>
        </div>
        <div class="clear hide-on-med-and-up"></div>
        <ul>
            <li class="center-align">
                <h5 class="condesed posts-cadastrados">0</h5>
                <h6 class="mini-title upper truncate">Posts cadastrados</h6>
            </li>
            <li class="center-align">
                <h5 class="condesed total-clicks">0</h5>
                <h6 class="mini-title upper truncate">Total de clicks</h6>
            </li>
        </ul>
    </div>
    <div class="box suave">
        <div class="box-head">
            <h5 class="suave font">Posts</h5>
            <div class="box-actions suave">
                <button class="cta left suave mini-title upper novo-post">novo Post <i class="fa fa-plus"></i></button>
            </div>
            <div class="box-search hide">
                <input type="text" placeholder="Buscar">
                <i class="fa fa-search suave"></i>
            </div>
            <div class="box-filter hide">
                <select class="browser-default">
                    <option value="1">Cod</option>
                    <option value="2">Produto</option>
                    <option value="3">Estoque</option>
                    <option value="4">Compra</option>
                    <option value="5">Venda</option>
                </select>
                <i class="fa fa-filter suave"></i>
            </div>
            <div class="box-actions-extra">
                <button class="cta suave hide"><i class="fa fa-print"></i></button>
                <button class="cta suave deletar-posts">OI<i class="fa fa-trash"></i></button>
            </div>
        </div>
        <div id="post_blog">
            <ul class="lista-head">
                <li class="hide-on-small-only">
                    <h6 class="mini-title upper">cod</h6>
                    <h6 class="mini-title upper">titulo</h6>
                    <h6 class="mini-title upper">Categoria</h6>
                    <h6 class="mini-title upper">data</h6>
                    <h6 class="mini-title upper">visível ?</h6>
                    <h6 class="mini-title upper">clicks</h6>
                    <h6 class="mini-title upper">-</h6>
                </li>
                <li class="hide-on-med-and-up">
                    <h6 class="mini-title upper">Posts Cadastrados</h6>
                </li>
            </ul>
            <ul class="lista-body loading suave active"></ul>
        </div>
        <div class="box-paginadores">
            <i class="click fa fa-chevron-left pag-ante"></i>
            <i class="upper"><b></b></i>
            <i class="click fa fa-chevron-right pag-prox"></i>
        </div>
    </div>
    <div id="verPost" class="suave gaveta">
        <div class="fechar-gaveta"></div>
        <div class="content suave">
            <h5 class="suave font">Post <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <img class="post-img responsive-img">
                <span>Dados do post</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">Pre-texto</h6>
                <p class="post-titulo"></p>
                <h6 class="mini-title upper">Texto</h6>
                <p class="post-sub-titulo"></p>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Adicionado em</h6>
                    <p class="post-data"></p>
                </div>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Ativo ?</h6>
                    <p class="post-status"></p>
                </div>
                <div class="clear"></div>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Clicks</h6>
                    <p class="post-clicks"></p>
                </div>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Autor</h6>
                    <p class="post-autor"></p>
                </div>

                <div class="clear"></div>
                <span>Métricas</span>
                <h6 class="mini-title upper">Clicks por dia da semana</h6>
                <div class="metrica-semanal">
                    <div class="dia"><span class="dom">0</span><h6 class="mini-title upper">d</h6></div>
                    <div class="dia"><span class="seg">0</span><h6 class="mini-title upper">s</h6></div>
                    <div class="dia"><span class="ter">0</span><h6 class="mini-title upper">t</h6></div>
                    <div class="dia"><span class="qua">0</span><h6 class="mini-title upper">q</h6></div>
                    <div class="dia"><span class="qui">0</span><h6 class="mini-title upper">q</h6></div>
                    <div class="dia"><span class="sex">0</span><h6 class="mini-title upper">s</h6></div>
                    <div class="dia"><span class="sab">0</span><h6 class="mini-title upper">s</h6></div>
                </div>
                <h6 class="mini-title upper">Clicks neste mês</h6>
                <canvas id="grafico-clicks-mes" style="width: 100%; height:600px;"></canvas>
            </div>
        </div>
    </div>

    <div id="gaveta" class="suave">
        <div class="fechar-gaveta"></div>
        <form id="novoPost" class="suave novoPost" enctype="multipart/form-data">
            <h5 class="suave font">Novo posts <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Dados do post</span>
                <div class="clear"></div>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Titulo</h6>
                    <input type="text" name="blog-titulo" class="blog-titulo" required>
                </div>
                <div class="metade direita">
                    <h6 class="mini-title upper">Pre texto</h6>
                    <input type="text" name="pre-texto" class="blog-frase-principal" required>
                </div>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Titulo SEO</h6>
                    <input type="text" name="titulo-seo" class="titulo-seo" required>
                </div>
                <div class="metade direita">
                    <h6 class="mini-title upper">Frase chave</h6>
                    <input type="text" name="frase-chave" class="frase-chave" required>
                </div>
                <h6 class="mini-title upper">Meta descrição</h6>
                <textarea name="meta-descricao" class="meta-descricao" maxlength="160"></textarea>
                
                <h6 class="mini-title upper">texto</h6>
                <textarea name="blo_texto_cad" id="blo_texto_cad" class="form-control ckeditor"></textarea>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Autor</h6>
                    <input type="text" name="blog-autor" class="blog-autor" required>
                </div>
                <div class="metade direita">   
                    <h6 class="mini-title upper">Categoria</h6>
                    <select name="categoria" class="categoria browser-default" required>
                        
                    </select>
                </div>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Imagem</h6>
                    <input type="file" name="post-imagem" class="post-imagem" required>
                </div>
                <div class="metade direita">
                    <h6 class="mini-title upper">Visível ?</h6>
                    <div class="metade esquerda">
                        <input type="radio" name="post-status" value='1' class="left" style="margin-right:10px;" checked >
                        <span style="line-height: 40px;">Sim</span>
                    </div>
                    <div class="metade direita">
                        <input type="radio" name="post-status" value='2' class="left" style="margin-right:10px;">
                        <span style="line-height: 40px;">Não</span>
                    </div>
                </div>
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
        <form id="editaPost" class="suave" enctype="multipart/form-data">
            <h5 class="suave font">Editar post <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <input type="hidden" name="post-cod" class="post-cod">
                <span>Dados do post</span>
                <div class="clear"></div>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Titulo</h6>
                    <input type="text" name="blog-titulo" class="blog-titulo" required>
                </div>
                <div class="metade direita">
                    <h6 class="mini-title upper">Pre texto</h6>
                    <input type="text" name="blog-pre-texto" class="blog-pre-texto" required>
                </div>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Titulo SEO</h6>
                    <input type="text" name="blog-titulo-seo" class="blog-titulo-seo" required>
                </div>
                <div class="metade direita">
                    <h6 class="mini-title upper">Frase chave</h6>
                    <input type="text" name="blog-frase-chave" class="blog-frase-chave" required>
                </div>
                <h6 class="mini-title upper">Meta descrição</h6>
                <textarea name="meta-descricao" class="blog-meta-descricao" maxlength="160"></textarea>
                
                <h6 class="mini-title upper">texto</h6>
                <textarea name="blog_texto_edi" id="blog_texto_edi" class="form-control blog_texto_edi ckeditor ">
                   
                </textarea>

                <div class="metade esquerda">
                    <h6 class="mini-title upper">Autor</h6>
                    <input type="text" name="blog-autor" class="blog-autor" required>
                </div>
                <div class="metade direita">   
                    <h6 class="mini-title upper">Categoria</h6>
                    <select name="categoria" class="categoria browser-default">
                        
                    </select>
                </div>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Imagem</h6>
                    <input type="file" name="post-imagem" class="post-imagem">
                </div>
                <div class="metade direita">
                    <h6 class="mini-title upper">Visível ?</h6>
                    <div class="metade esquerda status-esq">
                        <input type="radio" name="post-status" value='1' class="left" style="margin-right:10px;" checked>
                        <span style="line-height: 40px;">Sim</span>
                    </div>
                    <div class="metade direita status-dir">
                        <input type="radio" name="post-status" value='2' class="left" style="margin-right:10px;">
                        <span style="line-height: 40px;">Não</span>
                    </div>
                </div>
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'blo_texto_cad', {
        height: 200,
        filebrowserUploadUrl: "componentes/posts_blog/control/postCreate.php?ACAO=SALVAR_IMAGEM"
    });
 </script>
 <script>
    CKEDITOR.replace( 'blog_texto_edi', {
        height: 200,
        filebrowserUploadUrl: "componentes/posts_blog/control/postCreate.php?ACAO=SALVAR_IMAGEM"
    });
 </script>

<script type="text/javascript">

    $(".posts-componente .box-paginadores i b").text(pagination_posts);
    $(".posts-componente #dataDe, .posts-componente #dataAte").datepicker({
        dateFormat: "dd-mm-yy",
        dayNames: ["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"],
        dayNamesMin: ["D","S","T","Q","Q","S","S"],
        monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ]
    });
    listarPosts();
    listarCategoriasForm();
</script>