var pagination_faqs = 1;
var primeiro_cod_faq = 0;
var ultimo_cod_faq = 0;

function listarFAQFAQ(){
    var dadosajax = {
        'ACAO' : 'LISTAR FAQ'
    };
    pageurl = 'componentes/faqs/control/faqsList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.faqs-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao listar os Faqs!",2000);
        },
        success: function(response){ 
            $('.faqs-componente .lista-body').empty();

            if(response.status == 0){
                pagination_faqs = 1;
                $(".faqs-componente .box-paginadores i b").text(pagination_faqs);
                var i = 0;
                for (i = 0; i < response.lista_faqs.length; i++) {
                    if(i == 0){primeiro_cod_faq = response.lista_faqs[i].FAQ_COD;}
                    if((i + 1) == response.lista_faqs.length){ultimo_cod_faq = response.lista_faqs[i].FAQ_COD;}

                    $('.faqs-componente .lista-body').removeClass("active");
                    $('.faqs-componente .lista-body').append('<li>' +
                        '<h6>' + response.lista_faqs[i].FAQ_COD + '</h6>' +
                        '<h6>' + response.lista_faqs[i].FAQ_PERGUNTA + '</h6>' +
                        '<h6>' + response.lista_faqs[i].FAQ_NSETOR + '</h6>' +
                        '<h6>' + response.lista_faqs[i].FAQ_UTIL + '</h6>' +
                        '<h6>' + response.lista_faqs[i].FAQ_INUTIL + '</h6>' +
                        '<h6>' +
                            '<i class="action fa fa-pen editar-empresa" onclick="editarFaqs(' + response.lista_faqs[i].FAQ_COD + ')"></i>' +
                            '<i class="action fa fa-trash deletar-empresa" onclick="excluirFaqs(' + response.lista_faqs[i].FAQ_COD + ')"></i>' +
                        '</h6>' +
                    '</li>');
                }
                if(i == 0){
                    $('.faqs-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
                }
                $('.faqs-componente .lista-body').removeClass("active");
            }else{
                $('.faqs-componente .lista-body').removeClass("active");
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                $('.faqs-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
            }
        }
    });
}
function editarFaqs(FAQ_COD){
    var dadosajax = {
        'ACAO' : 'LISTAR DADOS FAQS',
        'FAQ_COD' : FAQ_COD
    };
    pageurl = 'componentes/faqs/control/faqsList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.faqs-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao listar Faqs!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                if(response.lista_faqs.length > 0){
                    $(".faqs-componente #editFaqs .faqs-pergunta").val(response.lista_faqs[0].FAQ_PERGUNTA);
                    $(".faqs-componente #editFaqs .faqs-resposta").val(response.lista_faqs[0].FAQ_RESPOSTA);
                    $(".faqs-componente #editFaqs .faqs-setor").val(response.lista_faqs[0].FAQ_STO);
                    $(".faqs-componente #editFaqs .faqs-cod").val(response.lista_faqs[0].FAQ_COD);
                    $(".faqs-componente #gaveta, .faqs-componente #gaveta .editFaqs").addClass("active");
                }
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
}
var duploClickCadFaqs = 0;
function criarFaqs(){
    event.preventDefault();
     if(duploClickCadFaqs == 0){
        duploClickCadFaqs = 1;
    
        var form = document.getElementById("novoFaqs");
        var formData = new FormData(form);
        formData.append('ACAO', "CREATE");
        var pageurl = 'componentes/faqs/control/faqsCreate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.faqs-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao criar Faqs!",2000);
                duploClickCadFaqs = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".faqs-componente #gaveta, .faqs-componente #gaveta form").removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    $('.faqs-componente #novoFaqs').each (function(){
                        this.reset();
                    });
                    listarFAQFAQ();
                }else{
                    $('.faqs-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickCadFaqs = 0;
            }
        });
    }
}
var duploClickEditFaqs = 0;
function editFaqs(){
    event.preventDefault();

     if(duploClickEditFaqs == 0){
        duploClickEditFaqs = 1;
    
        var form = document.getElementById("editFaqs");
        var formData = new FormData(form);
        formData.append('ACAO', "UPDATE");
        var pageurl = 'componentes/faqs/control/faqsUpdate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.faqs-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao alterar Faqs!",2000);
                duploClickEditFaqs = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".faqs-componente #gaveta, .faqs-componente #gaveta form").removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    $('.faqs-componente #novoFaqs').each (function(){
                        this.reset();
                    });
                    listarFAQFAQ();
                }else{
                    $('.faqs-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickEditFaqs = 0;
            }
        });
    }
}
var duploClickExcFaq = 0;
var codigo_faq_excluir;
function excluirFaqs(FAQ_COD){
    codigo_faq_excluir = FAQ_COD;
    criaAlerta(1,"Deseja realmente excluir essa Faq?",2000);
    $("#alerta .confirmar").click(function(){
        if(duploClickExcFaq == 0){
            duploClickExcFaq = 1;
            var formData = {
                'ACAO':'DELETE',
                'FAQ_COD':codigo_faq_excluir
            }
            var pageurl = 'componentes/faqs/control/faqsDelete.php';
            $.ajax({
                url: pageurl,
                data: formData,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    $('.faqs-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Falha ao excluir Faq!",2000);
                    duploClickExcFaq = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        criaAlerta(0,response.mensagem,4000);
                        listarFAQFAQ();
                    }else{
                        $('.faqs-componente .lista-body').removeClass("active");
                        criaAlerta(0,response.mensagem,4000);
                    }
                    duploClickExcFaq = 0;
                }
            });
        }
    });
}
var duploClickPagProxFaqs = 0;
function listarFaqPagProx(){
    if(duploClickPagProxFaqs == 0){
        duploClickPagProxFaqs = 1;
        var dadosajax = {
            'ACAO' : 'PROXIMO PAGINACAO FAQS',
            'FAQ_COD' : ultimo_cod_faq
        };
        pageurl = 'componentes/faqs/control/faqsList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                duploClickPagProxFaqs = 0;
                $('.faqs-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista as Faqs!",2000);
            },
            success: function(response){ 
                    if(response.status == 0){
                        if(response.lista_faqs.length > 0){
                            $('.faqs-componente .lista-body').empty();
                        }
                    }

                    if(response.status == 0){
                        var i = 0;
                        for (i = 0; i < response.lista_faqs.length; i++) {
                            if(i == 0){primeiro_cod_faq = response.lista_faqs[i].FAQ_COD;}
                            if((i + 1) == response.lista_faqs.length){ultimo_cod_faq = response.lista_faqs[i].FAQ_COD;}
                            $('.faqs-componente .lista-body').removeClass("active");
                            $('.faqs-componente .lista-body').append('<li>' +
                                '<h6>' + response.lista_faqs[i].FAQ_COD + '</h6>' +
                                '<h6>' + response.lista_faqs[i].FAQ_PERGUNTA + '</h6>' +
                                '<h6>' + response.lista_faqs[i].FAQ_NSETOR + '</h6>' +
                                '<h6>' + response.lista_faqs[i].FAQ_UTIL + '</h6>' +
                                '<h6>' + response.lista_faqs[i].FAQ_INUTIL + '</h6>' +
                                '<h6>' +
                                    '<i class="action fa fa-pen editar-empresa" onclick="editarFaqs(' + response.lista_faqs[i].FAQ_COD + ')"></i>' +
                                    '<i class="action fa fa-trash deletar-empresa" onclick="excluirFaqs(' + response.lista_faqs[i].FAQ_COD + ')"></i>' +
                                '</h6>' +
                            '</li>');
                        }
                        if(i > 0){
                            pagination_faqs++;
                            $(".faqs-componente .box-paginadores i b").text(pagination_faqs);
                        }
                        duploClickPagProxFaqs = 0;
                    }else{
                        $('.faqs-componente .lista-body').removeClass("active");
                        criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                        duploClickPagProxFaqs = 0;
                    }
                }
            
        });
    }
}
var duploClickPagAnteFaqs = 0;
function listarFaqPagAnte(){
    if(duploClickPagAnteFaqs == 0){
        duploClickPagAnteFaqs = 1;
        var dadosajax = {
            'ACAO' : 'ANTERIOR PAGINACAO FAQS',
            'FAQ_COD' : primeiro_cod_faq
        };
        pageurl = 'componentes/faqs/control/faqsList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.faqs-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista as Empresas!",2000);
                duploClickPagAnteFaqs = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    if(response.lista_faqs.length > 0){
                        $('.faqs-componente .lista-body').empty();
                    }
                }


                if(response.status == 0){
                    var i = 0;
                    for (i = 0; i < response.lista_faqs.length; i++) {
                        if(i == 0){primeiro_cod_faq = response.lista_faqs[i].FAQ_COD;}
                        if((i + 1) == response.lista_faqs.length){ultimo_cod_faq = response.lista_faqs[i].FAQ_COD;}
                        $('.faqs-componente .lista-body').removeClass("active");
                        $('.faqs-componente .lista-body').append('<li>' +
                            '<h6>' + response.lista_faqs[i].FAQ_COD + '</h6>' +
                            '<h6>' + response.lista_faqs[i].FAQ_PERGUNTA + '</h6>' +
                            '<h6>' + response.lista_faqs[i].FAQ_NSETOR + '</h6>' +
                            '<h6>' + response.lista_faqs[i].FAQ_UTIL + '</h6>' +
                            '<h6>' + response.lista_faqs[i].FAQ_INUTIL + '</h6>' +
                            '<h6>' +
                                '<i class="action fa fa-pen editar-empresa" onclick="editarFaqs(' + response.lista_faqs[i].FAQ_COD + ')"></i>' +
                                '<i class="action fa fa-trash deletar-empresa" onclick="excluirFaqs(' + response.lista_faqs[i].FAQ_COD + ')"></i>' +
                            '</h6>' +
                        '</li>');
                    }
                    if(i > 0){
                        pagination_faqs--;
                        $(".faqs-componente .box-paginadores i b").text(pagination_faqs);
                    }
                    duploClickPagAnteFaqs = 0;
                }else{
                    $('.faqs-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.faqs-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
                    duploClickPagAnteFaqs = 0;
                }
            }
        });
    }
}
function listarSetoresFaqs(){
    var dadosajax = {
        'ACAO' : 'LISTAR SETORES'
    };
    pageurl = 'componentes/faqs/control/faqsList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.faqs-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os Setores!",2000);
        },
        success: function(response){ 
            $(".faqs-componente #novoFaqs .faqs-setor").empty();
            $(".faqs-componente #editFaqs .faqs-setor").empty();
            if(response.lista_setores.length > 0){
                $(".faqs-componente #novoFaqs .faqs-setor").append("<option value='0'>Selecione um Setor</option>");
                $(".faqs-componente #editFaqs .faqs-setor").append("<option value='0'>Selecione um Setor</option>");
            }
            
            for (var i = 0; i < response.lista_setores.length; i++) {
                $(".faqs-componente #novoFaqs .faqs-setor").append("<option value='" + response.lista_setores[i].STO_COD + "'>" + response.lista_setores[i].STO_NOME + "</option>");
                $(".faqs-componente #editFaqs .faqs-setor").append("<option value='" + response.lista_setores[i].STO_COD + "'>" + response.lista_setores[i].STO_NOME + "</option>");
            }
        }
    });
}

$(document).on("click",".faqs-componente .novo-faqs",function(){
    $(".faqs-componente #gaveta, .faqs-componente #gaveta #novoFaqs").addClass("active");
});

$(document).on("click",".faqs-componente .fechar-gaveta",function(){
    $(".faqs-componente #gaveta, .faqs-componente #gaveta form").removeClass("active");
});

$(document).on("click",".faqs-componente #gaveta h5 i",function(){
    $(".faqs-componente #gaveta, .faqs-componente #gaveta form").removeClass("active");
});

$(document).on("submit",".faqs-componente #novoFaqs",function(e){
    e.preventDefault();
    $(".faqs-componente .lista-body").addClass("active");
    criarFaqs();
});

$(document).on("submit",".faqs-componente #editFaqs",function(e){
    e.preventDefault();
    $(".faqs-componente .lista-body").addClass("active");
    editFaqs();
});

$(document).on("click",".faqs-componente .box-paginadores .pag-prox",function(){
    listarFaqPagProx();
});

$(document).on("click",".faqs-componente .box-paginadores .pag-ante",function(){
    listarFaqPagAnte();
});