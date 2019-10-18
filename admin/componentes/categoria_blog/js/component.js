var pagination_cat = 1;
var primeiro_cod_cat = 0;
var ultimo_cod_cat = 0;

function listarCATCAT(){
    var dadosajax = {
        'ACAO' : 'LISTAR CATEGORIA'
    };
    var pageurl = 'componentes/categoria_blog/control/catList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.categoria-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao listar os categorias!",2000);
        },
        success: function(response){ 
            $('.categoria-componente .lista-body').empty();

            if(response.status == 0){
                pagination_cat = 1;
                $(".categoria-componente .box-paginadores i b").text(pagination_cat);
                var i = 0;
                for (i = 0; i < response.lista_cat.length; i++) {
                    if(i == 0){primeiro_cod_cat = response.lista_cat[i].CAT_COD;}
                    if((i + 1) == response.lista_cat.length){ultimo_cod_cat = response.lista_cat[i].CAT_COD;}

                    $('.categoria-componente #categorias .lista-body').removeClass("active");
                    $('.categoria-componente #categorias .lista-body').append('<li>' +
                        '<h6>' + response.lista_cat[i].CAT_COD + '</h6>' +
                        '<h6>' + response.lista_cat[i].CAT_NOME + '</h6>' +
                        '<h6>' +
                            '<i class="action fa fa-pen editar-empresa" onclick="editarCat(' + response.lista_cat[i].CAT_COD + ')"></i>' +
                            '<i class="action fa fa-trash deletar-empresa" onclick="excluirCat(' + response.lista_cat[i].CAT_COD + ')"></i>' +
                        '</h6>' +
                    '</li>');
                }
                if(i == 0){
                    $('.categoria-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
                }
                $('.categoria-componente .lista-body').removeClass("active");
            }else{
                $('.categoria-componente .lista-body').removeClass("active");
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                $('.categoria-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
            }
        }
    });
}


function editarCat(CAT_COD){
    var dadosajax = {
        'ACAO' : 'LISTAR DADOS CATEGORIA EDITAR',
        'CAT_COD' : CAT_COD
    };
    pageurl = 'componentes/categoria_blog/control/catList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.categoria-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao listar categoria!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                if(response.lista_cat.length > 0){
                    $(".categoria-componente #gaveta, .categoria-componente #gaveta .editCategoria").addClass("active");
                    $(".categoria-componente #editCategoria .categoria-nome").val(response.lista_cat[0].CAT_NOME);
                    $(".categoria-componente #editCategoria .cat-cod").val(response.lista_cat[0].CAT_COD);
                    
                }
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
}
var duploClickCadCat = 0;
function criarCategoria(){
    event.preventDefault();
     if(duploClickCadCat == 0){
        duploClickCadCat = 1;
        var form = document.getElementById("novoCate");
        var formData = new FormData(form);
        formData.append('ACAO', "CREATE CATEGORIA");
        var pageurl = 'componentes/categoria_blog/control/catCreate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.categoria-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao cadastrar categoria!",2000);
                duploClickCadCat = 0;
            },
            success: function(response){
                if(response.status == 0){
                     $(".categoria-componente #gaveta, .categoria-componente #gaveta form").removeClass("active");
                     criaAlerta(0,response.mensagem,4000);
                    $('.categoria-componente #novoCate').each (function(){
                        this.reset();
                    });
                     listarCATCAT();
                }else{
                    $('.categoria-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickCadCat = 0;
            }
        });
    }
}
var duploClickEditCategoria = 0;
function editCat(){
        event.preventDefault();

     if(duploClickEditCategoria == 0){
        duploClickEditCategoria = 1;
    
        var form = document.getElementById("editCategoria");
        var formData = new FormData(form);
        formData.append('ACAO', "UPDATE CATEGORIA");
        var pageurl = 'componentes/categoria_blog/control/catUpdate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.categoria-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao alterar categoria!",2000);
                duploClickEditCategoria = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".categoria-componente #gaveta, .categoria-componente #gaveta form").removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    $('.categoria-componente #editCategoria').each (function(){
                        this.reset();
                    });
                    listarCATCAT();
                }else{
                    $('.categoria-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickEditCategoria = 0;
            }
        });
    }
}
var duploClickExcCategoria = 0;
var codigo_cat_excluir;
function excluirCat(CAT_COD){
    codigo_cat_excluir = CAT_COD;
    criaAlerta(1,"Deseja realmente excluir essa categoria?",2000);
    $("#alerta .confirmar").click(function(){
        if(duploClickExcCategoria == 0){
            duploClickExcCategoria = 1;
            var formData = {
                'ACAO':'DELETE CATEGORIA',
                'CAT_COD':codigo_cat_excluir
            }
            var pageurl = 'componentes/categoria_blog/control/catDelete.php';
            $.ajax({
                url: pageurl,
                data: formData,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    $('.categoria-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Falha ao excluir Categoria!",2000);
                    duploClickExcCategoria = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        criaAlerta(0,response.mensagem,4000);
                        listarCATCAT();
                    }else{
                        $('.categoria-componente .lista-body').removeClass("active");
                        criaAlerta(0,response.mensagem,4000);
                    }
                    duploClickExcCategoria = 0;
                }
            });
        }
    });
}
var duploClickPagProxCategoria = 0;
function listarCategoriaPagProx(){
    if(duploClickPagProxCategoria == 0){
        duploClickPagProxCategoria = 1;
        var dadosajax = {
            'ACAO' : 'PROXIMO PAGINACAO CATEGORIA',
            'CAT_COD' : ultimo_cod_cat
        };
        pageurl = 'componentes/categoria_blog/control/catList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                duploClickPagProxCategoria = 0;
                $('.categoria-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao listar as categorias proximas!",2000);
            },
            success: function(response){ 
                    if(response.status == 0){
                        if(response.lista_cat.length > 0){
                            $('.categoria-componente .lista-body').empty();
                        }
                    }

                    if(response.status == 0){
                        var i = 0;
                        for (i = 0; i < response.lista_cat.length; i++) {
                            if(i == 0){primeiro_cod_cat = response.lista_cat[i].CAT_COD}
                            if((i + 1) == response.lista_cat.length){ultimo_cod_cat = response.lista_cat[i].CAT_COD}
                            $('.categoria-componente #categorias .lista-body').removeClass("active");
                            $('.categoria-componente #categorias .lista-body').append('<li>' +
                                '<h6>' + response.lista_cat[i].CAT_COD + '</h6>' +
                                '<h6>' + response.lista_cat[i].CAT_NOME + '</h6>' +
                                '<h6>'+
                                    '<i class="action fa fa-pen editar-empresa" onclick="editarCat(' + response.lista_cat[i].CAT_COD + ')"></i>' +
                                    '<i class="action fa fa-trash deletar-empresa" onclick="excluirCat(' + response.lista_cat[i].CAT_COD + ')"></i>' +
                                '</h6>' +
                            '</li>');



                        }
                        if(i > 0){
                            pagination_cat++;
                            $(".categoria-componente .box-paginadores i b").text(pagination_cat);
                        }
                        duploClickPagProxCategoria = 0;
                    }else{
                        $('.categoria-componente .lista-body').removeClass("active");
                        criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                        duploClickPagProxCategoria = 0;
                    }
                }
            
        });
    }
}
var duploClickPagAnteCategoria = 0;
function listarCategoriaPagAnte(){
    if(duploClickPagAnteCategoria == 0){
        duploClickPagAnteCategoria = 1;
        var dadosajax = {
            'ACAO' : 'ANTERIOR PAGINACAO CATEGORIA',
            'CAT_COD' : primeiro_cod_cat
        };
        pageurl = 'componentes/categoria_blog/control/catList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.categoria-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista as categorias anteriores!",2000);
                duploClickPagAnteCategoria = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    if(response.lista_cat.length > 0){
                        $('.categoria-componente .lista-body').empty();
                    }
                }


                if(response.status == 0){
                    var i = 0;
                    for (i = 0; i < response.lista_cat.length; i++) {
                        if(i == 0){primeiro_cod_cat = response.lista_cat[i].CAT_COD;}
                        if((i + 1) == response.lista_cat.length){ultimo_cod_cat = response.lista_cat[i].CAT_COD;}
                        $('.categoria-componente #categorias .lista-body').removeClass("active");
                        $('.categoria-componente #categorias .lista-body').append('<li>' +
                            '<h6>' + response.lista_cat[i].CAT_COD + '</h6>' +
                            '<h6>' + response.lista_cat[i].CAT_NOME + '</h6>' +
                            '<h6>' +
                                '<i class="action fa fa-pen editar-empresa" onclick="editarCat(' + response.lista_cat[i].CAT_COD + ')"></i>' +
                                '<i class="action fa fa-trash deletar-empresa" onclick="excluirCat(' + response.lista_cat[i].CAT_COD + ')"></i>' +
                            '</h6>' +
                        '</li>');
                    }
                    if(i > 0){
                        pagination_cat--;
                        $(".categoria-componente .box-paginadores i b").text(pagination_cat);
                    }
                    duploClickPagAnteCategoria = 0;
                }else{
                    $('.categoria-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.categoria-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
                    duploClickPagAnteCategoria = 0;
                }
            }
        });
    }
}


$(document).on("click",".categoria-componente .novo-cate",function(){
    $(".categoria-componente #gaveta, .categoria-componente #gaveta #novoCate").addClass("active");
});

$(document).on("click",".categoria-componente .fechar-gaveta",function(){
    $(".categoria-componente #gaveta, .categoria-componente #gaveta form").removeClass("active");
});

$(document).on("click",".categoria-componente #gaveta h5 i",function(){
    $(".categoria-componente #gaveta, .categoria-componente #gaveta form").removeClass("active");
});

$(document).on("submit",".categoria-componente #novoCate",function(e){
    
    e.preventDefault();
    $(".categoria-componente .lista-body").addClass("active");
    criarCategoria();
});

$(document).on("submit",".categoria-componente #editCategoria",function(e){
    e.preventDefault();
    $(".categoria-componente .lista-body").addClass("active");
    editCat();
});

$(document).on("click",".categoria-componente .box-paginadores .pag-prox",function(){
    listarCategoriaPagProx();
});

$(document).on("click",".categoria-componente .box-paginadores .pag-ante",function(){
    listarCategoriaPagAnte();
});