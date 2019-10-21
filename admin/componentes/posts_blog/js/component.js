var pagination_posts = 1;
var primeiro_cod_posts = 0;
var ultimo_cod_posts = 0;

function listarPosts(){
    var dadosajax = {
        'ACAO': 'LISTAR POSTS'
    };
    pageurl = 'componentes/posts_blog/control/postList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function () {
            $('.posts-componente .lista-body').removeClass("active");
            criaAlerta(0, "Falha ao lista os Posts!", 2000);
        },
        success: function (response) {
            $('.posts-componente .lista-body').empty();

            if (response.status == 0) {
                var i = 0;
                pagination_posts = 1;
                $(".posts-componente .box-paginadores i b").text(pagination_posts);
                for (i = 0; i < response.lista_posts.length; i++) {
                    if (i == 0) { primeiro_cod_posts = response.lista_posts[i].BLO_COD; }
                    if ((i + 1) == response.lista_posts.length) { ultimo_cod_posts = response.lista_posts[i].BLO_COD; }
                    if (response.lista_posts[i].BLO_VISIBILIT == 1) {
                        var visibilidade = 'Sim';
                    } else {
                        var visibilidade = 'Não';
                    }
                    $('.posts-componente .lista-body').removeClass("active");
                    $('.posts-componente .lista-body').append('<li>' +
                        '<h6>' + response.lista_posts[i].BLO_COD + '</h6>' +
                        '<h6>' + response.lista_posts[i].BLO_TITULO + '</h6>' +
                        '<h6><b class="truncate">' + response.lista_posts[i].CAT_NOME + '</b></h6>' +
                        '<h6>' + response.lista_posts[i].BLO_DATA + '</h6>' +
                        '<h6>' + visibilidade + '</h6>' +
                        '<h6>' + response.lista_posts[i].BLO_CLICKS + '</h6>' +
                        '<h6>' +

                            '<i class="action fa fa-eye ver-posts" data-id="' + response.lista_posts[i].BLO_COD + '"></i>' +
                            '<i class="action fa fa-pen editar-posts" data-id="' + response.lista_posts[i].BLO_COD + '"></i>' +
                            '<i class="action fa fa-trash deletar-posts" data-cat="'+response.lista_posts[i].BLO_CATEGORIA +'" data-id="' + response.lista_posts[i].BLO_COD + '"></i>' +

                            '</h6>' +
                        '</li>');
                }
                if (i == 0) {
                    $('.posts-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum posts cadastrado.</h6></li>');
                }
                $(".posts-cadastrados").text(response.quant_posts.qnt);
                $(".total-clicks").text(response.quant_posts.qnt_click);
                $('.posts-componente .lista-body').removeClass("active");
            } else {
                $('.posts-componente .lista-body').removeClass("active");
                criaAlerta(0, "Status - " + response.status + " | Mensagem - " + response.mensagem, 2000);
                $('.posts-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum posts cadastrado.</h6></li>');
            }
        }
    });
}
function listarCategoriasForm() {
    var dadosajax = {
        'ACAO': 'LISTAR CATEGORIA'
    };
    pageurl = 'componentes/posts_blog/control/postList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function () {
            $('.posts-componente .lista-body').removeClass("active");
            criaAlerta(0, "Falha ao lista os Categorias no formulário!", 2000);
        },
        success: function (response) {
            $(".posts-componente #novoPost .categoria").empty();
            $(".posts-componente #editaPost .categoria").empty();
            if (response.lista_categoria.length > 0) {
                $(".posts-componente #novoPost .categoria").append("<option value='0'>Selecione uma categoria</option>");
            }

            for (var i = 0; i < response.lista_categoria.length; i++) {
                $(".posts-componente #novoPost .categoria").append("<option value='" + response.lista_categoria[i].CAT_NOME + "'>" + response.lista_categoria[i].CAT_NOME + "</option>");
                $(".posts-componente #editaPost .categoria").append("<option value='" + response.lista_categoria[i].CAT_NOME + "'>" + response.lista_categoria[i].CAT_NOME + "</option>");
            }
        }
    });
}
var duploClickPagProx = 0;
function listarPostsPagProx() {
    if (duploClickPagProx == 0) {
        duploClickPagProx = 1;
        var dadosajax = {
            'ACAO': 'PROXIMO PAGINACAO POST',
            'BLO_ID': ultimo_cod_posts
        };
        pageurl = 'componentes/posts_blog/control/postList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function () {
                duploClickPagProx = 0;
                $('.posts-componente .lista-body').removeClass("active");
                criaAlerta(0, "Falha ao lista os Posts!", 2000);
            },
            success: function (response) {
                if (response.lista_posts.length > 0) {
                    $('.posts-componente .lista-body').empty();
                }

                if (response.status == 0) {
                    var i = 0;
                    for (i = 0; i < response.lista_posts.length; i++) {
                        if (i == 0) { primeiro_cod_posts = response.lista_posts[i].BLO_COD; }
                        if ((i + 1) == response.lista_posts.length) { ultimo_cod_posts = response.lista_posts[i].BLO_COD; }
                        if (response.lista_posts[i].BLO_VISIBILIT == 1) {
                            var visibilidade = 'Sim';
                        } else {
                            var visibilidade = 'Não';
                        }
                        $('.posts-componente .lista-body').removeClass("active");
                        $('.posts-componente .lista-body').append('<li>' +
                            '<h6>' + response.lista_posts[i].BLO_COD + '</h6>' +
                            '<h6>' + response.lista_posts[i].BLO_TITULO + '</h6>' +
                            '<h6><b class="truncate">' + response.lista_posts[i].CAT_NOME + '</b></h6>' +
                            '<h6>' + response.lista_posts[i].BLO_DATA + '</h6>' +
                            '<h6>' + visibilidade + '</h6>' +
                            '<h6>' + response.lista_posts[i].BLO_CLICKS + '</h6>' +
                            '<h6>' +

                                '<i class="action fa fa-eye ver-posts" data-id="' + response.lista_posts[i].BLO_COD + '"></i>' +
                                '<i class="action fa fa-pen editar-posts" data-id="' + response.lista_posts[i].BLO_COD + '"></i>' +
                                '<i class="action fa fa-trash deletar-posts" data-cat="'+response.lista_posts[i].BLO_CATEGORIA +'" data-id="' + response.lista_posts[i].BLO_COD + '"></i>' +

                            '</h6>' +
                            '</li>');
                    }
                    if (i > 0) {
                        pagination_posts++;
                        $(".posts-componente .box-paginadores i b").text(pagination_posts);
                    }
                    duploClickPagProx = 0;
                } else {
                    $('.posts-componente .lista-body').removeClass("active");
                    criaAlerta(0, "Status - " + response.status + " | Mensagem - " + response.mensagem, 2000);
                    $('.posts-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum banner cadastrado.</h6></li>');
                    duploClickPagProx = 0;
                }
            }
        });
    }
}
var duploClickPagAnte = 0;
function listarPostPagAnte() {
    if (duploClickPagAnte == 0) {
        duploClickPagAnte = 1;
        var dadosajax = {
            'ACAO': 'ANTERIOR PAGINACAO POST',
            'BLO_COD': primeiro_cod_posts
        };
        pageurl = 'componentes/posts_blog/control/postList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function () {
                $('.posts-componente .lista-body').removeClass("active");
                criaAlerta(0, "Falha ao lista os Posts!", 2000);
                duploClickPagAnte = 0;
            },
            success: function (response) {
                if (response.lista_posts.length > 0) {
                    $('.posts-componente .lista-body').empty();
                }
                if (response.status == 0) {
                    var i = 0;
                    for (i = 0; i < response.lista_posts.length; i++) {
                        if (i == 0) { primeiro_cod_posts = response.lista_posts[i].BLO_COD; }
                        if ((i + 1) == response.lista_posts.length) { ultimo_cod_posts = response.lista_posts[i].BLO_COD; }
                        if (response.lista_posts[i].BLO_VISIBILIT == 1) {
                            var visibilidade = 'Sim';
                        } else {
                            var visibilidade = 'Não';
                        }
                        $('.posts-componente .lista-body').removeClass("active");
                        $('.posts-componente .lista-body').append('<li>' +
                            '<h6>' + response.lista_posts[i].BLO_COD + '</h6>' +
                            '<h6>' + response.lista_posts[i].BLO_TITULO + '</h6>' +
                            '<h6><b class="truncate">' + response.lista_posts[i].CAT_NOME + '</b></h6>' +
                            '<h6>' + response.lista_posts[i].BLO_DATA + '</h6>' +
                            '<h6>' + visibilidade + '</h6>' +
                            '<h6>' + response.lista_posts[i].BLO_CLICKS + '</h6>' +
                            '<h6>' +

                                '<i class="action fa fa-eye ver-posts" data-id="' + response.lista_posts[i].BLO_COD + '"></i>' +
                                '<i class="action fa fa-pen editar-posts" data-id="' + response.lista_posts[i].BLO_COD + '"></i>' +
                                '<i class="action fa fa-trash deletar-posts" data-cat="'+response.lista_posts[i].BLO_CATEGORIA +'" data-id="' + response.lista_posts[i].BLO_COD + '"></i>' +

                            '</h6>' +
                            '</li>');
                    }
                    if (i > 0) {
                        pagination_posts--;
                        $(".posts-componente .box-paginadores i b").text(pagination_posts);
                    }
                    duploClickPagAnte = 0;
                } else {
                    $('.posts-componente .lista-body').removeClass("active");
                    criaAlerta(0, "Status - " + response.status + " | Mensagem - " + response.mensagem, 2000);
                    $('.posts-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum post cadastrado.</h6></li>');
                    duploClickPagAnte = 0;
                }
            }
        });
    }
}
var duploClickCriarPost = 0;
function criarPost() {
    if (duploClickCriarPost == 0) {
        duploClickCriarPost = 1
        var form = document.getElementById("novoPost");
        var formData = new FormData(form);
        formData.append('ACAO', "CADASTRO POST");
        var pageurl = 'componentes/posts_blog/control/postCreate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function () {
                $('.posts-componente .lista-body').removeClass("active");
                criaAlerta(0, "Falha ao criar post!", 2000);
                $('.posts-componente #novoPost').each(function () {
                    this.reset();
                });
                duploClickCriarPost = 0;
            },
            success: function (response) {
                if (response.status == 0) {
                    $(".posts-componente #gaveta, .posts-componente #gaveta form").removeClass("active");
    
                    criaAlerta(0,response.mensagem,4000);
                    CKEDITOR.instances.blo_texto_cad.setData("");
                    $('.posts-componente #novoPost').each (function(){
                        this.reset();
                    });
                    duploClickCriarPost = 0;
                    listarPosts();
                } else {
                    $('.posts-componente .lista-body').removeClass("active");
                    criaAlerta(0, response.mensagem, 4000);
                }
            }
        });
    }
}
var duploClickVerPost = 0;
function verPost(post_id){
    if(duploClickVerPost == 0){
        duploClickVerPost = 1;
        var dadosajax = {
            'ACAO' : 'LISTAR UM POST',
            'ID'   : post_id
        };
        pageurl = 'componentes/posts_blog/control/postListarUm.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                criaAlerta(0,"Falha ao listar Post!",2000);
                duploClickVerPost = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    duploClickVerPost = 0;
                    var i = 0;
                    $(".posts-componente #verPost .post-titulo").text(response.lista_post.BLO_TITULO);
                    $(".posts-componente #verPost .post-autor").text(response.lista_post.BLO_AUTOR);
                    if(response.lista_post.BLO_P_TEXTO == ''){
                        $(".posts-componente #verPost .post-sub-titulo").text("Sem sub frase");
                    }else{
                        $(".posts-componente #verPost .post-sub-titulo").text(response.lista_post.BLO_P_TEXTO);
                    }
                    $(".posts-componente #verPost .post-img").attr("src", '../img/posts/'+response.lista_post.BLO_IMAGEM);
                    $(".posts-componente #verPost .post-data").text(response.lista_post.BLO_DATA);
                    if(response.lista_post.BLO_VISIBILIT == 1){
                        $(".posts-componente #verPost .post-status").text("Sim");
                    }else{
                        $(".posts-componente #verPost .post-status").text("Não");
                    }
                    $(".posts-componente #verPost .post-clicks").text(response.lista_post.BLO_CLICKS);
                    $(".posts-componente #verPost .metrica-semanal .dia .dom").text(response.clicks_post[0]);
                    $(".posts-componente #verPost .metrica-semanal .dia .seg").text(response.clicks_post[1]);
                    $(".posts-componente #verPost .metrica-semanal .dia .ter").text(response.clicks_post[2]);
                    $(".posts-componente #verPost .metrica-semanal .dia .qua").text(response.clicks_post[3]);
                    $(".posts-componente #verPost .metrica-semanal .dia .qui").text(response.clicks_post[4]);
                    $(".posts-componente #verPost .metrica-semanal .dia .sex").text(response.clicks_post[5]);
                    $(".posts-componente #verPost .metrica-semanal .dia .sab").text(response.clicks_post[6]);
                    clicksMesGrafico(response.clicks_mes_post);
                    $(".posts-componente #verPost, .posts-componente #verPost .content").addClass("active");
                }else{
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                }
            }
        });
    }
}
function verUmPost(post_id) {

    var dadosajax = {
        'ACAO': 'LISTAR UM POST',
        'ID': post_id
    };
    pageurl = 'componentes/posts_blog/control/postListarUm.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function () {
            $('.posts-componente .lista-body').removeClass("active");
            criaAlerta(0, "Falha ao listar post!", 2000);
        },
        success: function (response) {
            $(".posts-componente #gaveta, .posts-componente #gaveta #editaPost").addClass("active");
            if(response.status == 0){
                var visivel = response.lista_post.BLO_VISIBILIT;
                $(".posts-componente #editaPost .status-esq").empty();
                $(".posts-componente #editaPost .status-dir").empty();
    
                if (visivel == 1) {
                    $(".posts-componente #editaPost .status-esq").append('' +
                        '<input type="radio" name="post-status" value="1" class="left posts-status-esq" style="margin-right:10px;" checked>' +
                        '<span style="line-height: 40px;">Sim</span>');

    
                    $(".posts-componente #editaPost .status-dir").append(''+
                        '<input  type="radio" name="post-status" value="2" class="left posts-status-dir" style="margin-right:10px;">'+
                        '<span style="line-height: 40px;">Não</span>');
                } else {
                    $(".posts-componente #editaPost .status-esq").append('' +
                        '<input type="radio" name="post-status" value="1" class="left posts-status-esq" style="margin-right:10px;">' +
                        '<span style="line-height: 40px;">Sim</span>');
    
                    $(".posts-componente #editaPost .status-dir").append(''+
                        '<input type="radio" name="post-status" value="2" class="left posts-status-dir" style="margin-right:10px;" checked>'+
                        '<span style="line-height: 40px;">Não</span>');
                }
                $(".posts-componente #editaPost .blog-titulo").val(response.lista_post.BLO_TITULO);
                $(".posts-componente #editaPost .blog-frase-principal").val(response.lista_post.BLO_TEXTO);
                $(".posts-componente #editaPost .blog-pre-texto").val(response.lista_post.BLO_P_TEXTO);
                $(".posts-componente #editaPost .blog-titulo-seo").val(response.lista_post.BLO_SEO);
                $(".posts-componente #editaPost .blog-meta-descricao").val(response.lista_post.BLO_META_DESC);
                $(".posts-componente #editaPost .blog-frase-chave").val(response.lista_post.BLO_FRASE_CHAVE);
                CKEDITOR.instances.blog_texto_edi.setData(response.lista_post.BLO_TEXTO);
                $(".posts-componente #editaPost .blog-autor").val(response.lista_post.BLO_AUTOR);
                $(".posts-componente #editaPost .categoria").val(response.lista_post.BLO_CATEGORIA);
                $(".posts-componente #editaPost .post-cod").val(response.lista_post.BLO_COD);
                $(".posts-componente #editaPost .post-imagem").val(response.lista_post.BLO_IMAGEM);
                $(".posts-componente #editaPost .post-cod").val(post_id);


            } else {
                criaAlerta(0, "Status - " + response.status + " | Mensagem - " + response.mensagem, 2000);
            }
        }
    });
}
var duploClickDeletarPostBlog = 0;
function deletarPostBlog(cod_posts,cat_id){
    if (duploClickDeletarPostBlog == 0) {
        duploClickDeletarPostBlog = 1;
        var data = {
            'ID': cod_posts,
            'CAT_ID': cat_id,
            'ACAO': "DELETAR"
        }
        var pageurl = 'componentes/posts_blog/control/postDelete.php';
        $.ajax({
            url: pageurl,
            data: data,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                criaAlerta(0,"Falha ao deletar post!!",2000);
                duploClickDeletarPostBlog = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    duploClickDeletarPostBlog = 0;
                    criaAlerta(0,response.mensagem,3000);
                    listarPosts();
                  
                }else{
                    criaAlerta(0,response.mensagem,3000);
                }
            }
        });
    }
}
function clicksMesGrafico(dados) {

    //$("#grafico-clicks-mes").width('50vw');

    var context = document.getElementById("grafico-clicks-mes").getContext("2d");

    var gradiente = context.createLinearGradient(0, 0, 0, 350);
    gradiente.addColorStop(0, "#ce93d8");
    gradiente.addColorStop(1, "#4a148c");

    var mDados = [];
    var mKeys = [];
    for (i in dados) {
        mDados[i] = dados[i].valor;
        mKeys[i] = dados[i].data;
    }

    var grafico = new Chart(context, {

        // TIPO DE GRÁFICO
        type: 'horizontalBar',

        // DADOS DO GRÁFICO
        data: {
            labels: mKeys,
            datasets: [{
                label: "Clicks",
                backgroundColor: "rgba(169,51,203,.3)",
                borderColor: "rgba(169,51,203,1)",
                borderWidth: 1,
                data: mDados,
            }]
        },

        // CONFIGURAÇÕES EXTRAS
        options: {
            //TÍTULO DO GRÁFICO
            title: {
                display: false,
                text: "Gráfico 1",
                fontSize: 55,
                fontColor: "#a933cb"
            },
            // DEFINE SE É RESPONSIVO OU NÃO
            responsive: true,
            // SCALES SÃO OS TEXTOS QUE APARECEM NAS ESTREMIDADES DO GRÁFICO
            scales: {
                // ESTREMIDADE VERTICAL
                yAxes: [{
                    ticks: {
                        fontSize: 12,
                        fontColor: "#a933cb",
                        // INCLUIR "R$" ANTES DE CADA NOME NO VERTICE "Y" DO GRÁFICO
                        // callback: function(value, index, values) {
                        //     return 'R$ ' + value;
                        // }
                    }
                }],
                // EXTREMIDADE HORIZONTAL
                xAxes: [{
                    // stacked: true,
                    ticks: {
                        fontSize: 12,
                        fontColor: "#a933cb"
                    }
                }]
            },
            // TOOLTIPS SÃO OS TEXTOS QUE APARECEM AO PASSAR O MOUSE EM CIMA DE GRÁFICO
            tooltips: {
                mode: "index",
                // callbacks: {
                //     // INCLUIR "R$" APÓS O TÍTULO DE CADA TOOLTIP DO GRÁFICO
                //     label : function(tooltipItem, data) {
                //         // EX: LEGENDA : R$ VALOR
                //         return data.datasets[tooltipItem.datasetIndex].label + ' : R$ ' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]
                //     }
                // }
            }
        }
    });
}

$(document).on("click", ".posts-componente .novo-post", function () {
    $(".posts-componente #gaveta, .posts-componente #gaveta #novoPost").addClass("active");
});

$(document).on("click", ".posts-componente .fechar-gaveta", function () {
    $(".posts-componente #gaveta, .posts-componente #gaveta form").removeClass("active");
});

$(document).on("click", ".posts-componente #gaveta h5 i", function () {
    $(".posts-componente #gaveta, .posts-componente #gaveta form").removeClass("active");
});

$(document).on("click", ".posts-componente #verPost .fechar-gaveta", function () {
    $(".posts-componente #verPost, .posts-componente #verPost .content").removeClass("active");
});

$(document).on("click", ".posts-componente #verPost h5 i", function () {
    $(".posts-componente #verPost, .posts-componente #verPost .content").removeClass("active");
});

$(document).on("submit", ".posts-componente #novoPost", function (e) {
    e.preventDefault();
    $(".posts-componente .lista-body").addClass("active");
    criarPost();
});

$(document).on("submit", ".posts-componente #editaPost", function (e) {
    e.preventDefault();
    var form = document.getElementById("editaPost");
    var formData = new FormData(form);
    formData.append('ACAO', "ATUALIZAR");
    var pageurl = 'componentes/posts_blog/control/postUpdate.php';
    $.ajax({
        url: pageurl,
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function () {
            $('.posts-componente .lista-body').removeClass("active");
            criaAlerta(0, "Falha ao atualizar Post!", 2000);
        },
        success: function (response) {
            if (response.status == 0) {
                $(".posts-componente #gaveta, .posts-componente #gaveta form").removeClass("active");
                listarPosts();
                criaAlerta(0,response.mensagem,4000);
                CKEDITOR.instances.blog_texto_edi.setData("");
                $(".posts-componente #editaPost .posts-titulo").val("");
                $(".posts-componente #editaPost .posts-sub-titulo").val("");
                $(".posts-componente #editaPost .check.posts-cta").removeClass("active");
                $(".posts-componente #editaPost input.posts-cta").attr("disabled", false);
                $(".posts-componente #editaPost input.posts-cta").val("");
                $(".posts-componente #editaPost input[name='posts-cta-stats']").val("");
                $(".posts-componente #editaPost .posts-status-esq").attr("checked", true);


            } else {
                $('.posts-componente .lista-body').removeClass("active");
                criaAlerta(0, response.mensagem, 4000);
            }
        }
    });
});

$(document).on("click", ".posts-componente .box-paginadores .pag-prox", function () {
    listarPostsPagProx();
});

$(document).on("click", ".posts-componente .box-paginadores .pag-ante", function () {
    listarPostPagAnte();
});

$(document).on("keypress", ".posts-componente .buscaPedido", function (e) {
    var a = $(this).val();
    if (a != "") {
        $("#pedidos-lista li").each(function () {
            $(this).addClass("off");
            if ($(this).text().toLowerCase().match(a)) {
                $(this).removeClass("off");
            }
        });
    } else {
        $("#pedidos-lista li").each(function () {
            $(this).removeClass("off");
        });
    }
});

$(document).on("click", ".posts-componente .lista-body .check", function () {
    $(this).toggleClass("active");
    if ($(".posts.componente .lista-body .check").hasClass("active")) {
        $(".posts-componente .box-actions-extra").removeClass("active");
    } else if ($(".posts-componente .lista-body .check").hasClass("active") == false) {
        $(".posts-componente .box-actions-extra").removeClass("active");
    } else {
        $(".posts-componente .box-actions-extra").addClass("active");
    }
});

$(document).on("click", ".posts-componente .lista-head .check", function () {
    $(".posts-componente .lista-head .check").toggleClass("active");
    if ($(".posts-componente .lista-head .check").hasClass("active")) {
        $(".posts-componente .lista-body .check").addClass("active");
    } else {
        $(".posts-componente .lista-body .check").removeClass("active");
    }
    $(".posts-componente .box-actions-extra").toggleClass("active");
});

$(document).on("click", ".posts-componente .check.posts-cta", function () {
    $(this).toggleClass("active");
    if ($(this).hasClass("active")) {
        $(".posts-componente input.posts-cta").attr("disabled", false);
        $(".posts-componente input[name='posts-cta-stats']").val(1);
    } else {
        $(".posts-componente input.posts-cta").attr("disabled", true);
        $(".posts-componente input[name='posts-cta-stats']").val(0);
    }
});

$(document).on("click", ".posts-componente .ver-posts", function () {
    var post_id = $(this).attr("data-id");
    verPost(post_id);
});
var post_id_delete;
var cat_id_delete;
$(document).on("click",".posts-componente .deletar-posts",function(){
    post_id_delete = $(this).attr("data-id");
    cat_id_delete = $(this).attr("data-cat");
    criaAlerta(1,"Deseja realmente apagar?",2000);
    $("#alerta .confirmar").click(function(){
        deletarPostBlog(post_id_delete, cat_id_delete);
    });
});

$(document).on("click", ".posts-componente .escolher-periodo", function () {
    $(".posts-componente .box-period, .posts-componente .box-period-content").toggleClass("active");
});

$(document).on("click", ".posts-componente .box-period .check", function () {
    $(this).toggleClass("active");
    if ($(".posts-componente .box-period .check").hasClass("active")) {
        $(".posts-componente .box-period select").attr("disabled", true);
        $(".posts-componente .box-period input").attr("disabled", false);
    } else {
        $(".posts-componente .box-period select").attr("disabled", false);
        $(".posts-componente .box-period input").attr("disabled", true);
    }
});

$(document).on("click", ".posts-componente .box-period.active", function () {
    if ($(".posts-componente .box-period .check").hasClass("active")) {
        $(".posts-componente .box-period h6").text($(".posts-componente #dataDe").val() + ' | ' + $("#dataAte").val());
    } else {
        $(".posts-componente .box-period h6").text($(".posts-componente .box-period select option:selected").text());
    }
});

$(document).on("click", ".posts-componente .editar-posts", function () {
    var posts_id = $(this).attr("data-id");
    $(".posts-componente #editaPost input[name='posts-id']").val(posts_id);
    verUmPost(posts_id);
});
