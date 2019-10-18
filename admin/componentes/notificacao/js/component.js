var pagination_ntf = 1;
var primeiro_cod_ntf = 0;
var ultimo_cod_ntf = 0;

function listarNotificacao(){

     var dadosajax = {
        'ACAO' : 'LISTAR NOTIFICACAO'
    };
    pageurl = 'componentes/notificacao/control/ntfList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.ntf-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao listar as notificações!",2000);
        },
        success: function(response){ 
            $('.ntf-componente .lista-body').empty();

            if(response.status == 0){
                pagination_ntf = 1;
                $(".faqs-componente .box-paginadores i b").text(pagination_ntf);
                var i = 0;
                for (i = 0; i < response.lista_ntf.length; i++) {
                    if(i == 0){primeiro_cod_ntf = response.lista_ntf[i].NTF_COD;}
                    if((i + 1) == response.lista_ntf.length){ultimo_cod_ntf = response.lista_ntf[i].NTF_COD;}

                    $('.ntf-componente .lista-body').removeClass("active");
                    $('.ntf-componente .lista-body').append('<li>' +
                        '<h6>' + response.lista_ntf[i].NTF_COD + '</h6>' +
                        '<h6>' + response.lista_ntf[i].NTF_TITULO + '</h6>' +
                        '<h6>' + response.lista_ntf[i].NTF_DESC + '</h6>' +
                        '<h6>' +
                            '<i class="action fa fa-pen editar-ntf" onclick="editarNtf(' + response.lista_ntf[i].NTF_COD + ')"></i>' +
                            '<i class="action fa fa-trash deletar-ntf" onclick="excluirNtf(' + response.lista_ntf[i].NTF_COD + ')"></i>' +
                        '</h6>' +
                    '</li>');
                }
                if(i == 0){
                    $('.ntf-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhuma notificação cadastrada.</h6></li>');
                }
            }else{
                $('.ntf-componente .lista-body').removeClass("active");
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                $('.ntf-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhuma notificação cadastrado.</h6></li>');
            }
        }
    });
}
function editarNtf(NTF_COD){
    var dadosajax = {
        'ACAO' : 'LISTAR DADOS NTF',
        'NTF_COD' : NTF_COD
    };
    pageurl = 'componentes/notificacao/control/ntfList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.ntf-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao listar dados das notificação!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                if(response.lista_ntf.length > 0){
                    $(".ntf-componente #editNtf .ntf-titulo").val(response.lista_ntf[0].NTF_TITULO);
                    $(".ntf-componente #editNtf .ntf-desc").val(response.lista_ntf[0].NTF_DESC);
                    $(".ntf-componente #editNtf .notificacao-str").val(response.lista_ntf[0].NTF_STO);
                    $(".ntf-componente #editNtf .ntf-cod").val(response.lista_ntf[0].NTF_COD);
                    $(".ntf-componente #gaveta, .ntf-componente #gaveta .editNtf").addClass("active");
                }
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
}
//Concluido-------
var duploClickCadNtf = 0;
function criarNotificacao(){
    event.preventDefault();
     if(duploClickCadNtf == 0){
        duploClickCadNtf = 1;
    
        var form = document.getElementById("novoNotificacao");
        var formData = new FormData(form);
        formData.append('ACAO', "CREATE");
        var pageurl = 'componentes/notificacao/control/notificacaoCreate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.ntf-componente .lista-nova-ntf').removeClass("active");
                criaAlerta(0,"Falha ao criar notificação2!",2000);
                duploClickCadNtf = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".ntf-componente #gaveta, #gaveta form").removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    $('.ntf-componente #novoNotificacao .lista-nova-ntf').each (function(){
                        this.reset();
                    });
                    // listarFAQFAQ();
                }else{
                    $('.ntf-componente .lista-nova-ntf').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickCadNtf = 0;
                listarNotificacao();
            }
        });
    }
}

var duploClickEditNtf = 0;
function editNtf(){

     if(duploClickEditNtf == 0){
        duploClickEditNtf = 1;
    
        var form = document.getElementById("editNtf");
        var formData = new FormData(form);
        formData.append('ACAO', "UPDATE");
        var pageurl = 'componentes/notificacao/control/notificacaoUpdate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.ntf-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao alterar a notificação!",2000);
                duploClickEditNtf = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".ntf-componente #gaveta, .ntf-componente #gaveta form").removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    $('.ntf-componente #editNtf').each (function(){
                        this.reset();
                    });
                    listarNotificacao();
                }else{
                    $('.ntf-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickEditNtf = 0;
            }
        });
    }
}
var duploClickExcNtf = 0;
var codigo_ntf_excluir;
function excluirNtf(NTF_COD){
    codigo_ntf_excluir = NTF_COD;
    criaAlerta(1,"Deseja realmente excluir essa notificação",2000);
    $("#alerta .confirmar").click(function(){
        if(duploClickExcNtf == 0){
            duploClickExcNtf = 1;
            var formData = {
                'ACAO':'DELETE',
                'NTF_COD':codigo_ntf_excluir
            }
            var pageurl = 'componentes/notificacao/control/notificacaoDelete.php';
            $.ajax({
                url: pageurl,
                data: formData,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    $('.ntf-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Falha ao excluir notificação!",2000);
                    duploClickExcNtf = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        criaAlerta(0,response.mensagem,4000);
                        listarNotificacao();
                    }else{
                        $('.ntf-componente .lista-body').removeClass("active");
                        criaAlerta(0,response.mensagem,4000);
                    }
                    duploClickExcNtf = 0;
                }
            });
        }
    });
}

var duploClickPagProxNtf = 0;
function listarNtfPagProx(){
    if(duploClickPagProxNtf == 0){
        duploClickPagProxNtf = 1;
        var dadosajax = {
            'ACAO' : 'PROXIMO PAGINACAO NTF',
            'NTF_COD' : ultimo_cod_ntf
        };
        pageurl = 'componentes/notificacao/control/ntfList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                duploClickPagProxNtf = 0;
                $('.ntf-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao listar as notificações",2000);
            },
            success: function(response){ 
                    if(response.status == 0){
                        if(response.lista_ntf.length > 0){
                            $('.ntf-componente .lista-body').empty();
                        }
                    }

                    if(response.status == 0){
                        var i = 0;
                        for (i = 0; i < response.lista_ntf.length; i++) {
                            if(i == 0){primeiro_cod_ntf = response.lista_ntf[i].NTF_COD;}
                            if((i + 1) == response.lista_ntf.length){ultimo_cod_ntf = response.lista_ntf[i].NTF_COD;}
                            $('.ntf-componente .lista-body').removeClass("active");
                            $('.ntf-componente .lista-body').append('<li>' +
                                '<h6>' + response.lista_ntf[i].NTF_COD + '</h6>' +
                                '<h6>' + response.lista_ntf[i].NTF_TITULO+ '</h6>' +
                                '<h6>' + response.lista_ntf[i].NTF_DESC + '</h6>' +
                                '<h6>' +
                                    '<i class="action fa fa-pen editar-empresa" onclick="editarNtf(' + response.lista_ntf[i].NTF_COD + ')"></i>' +
                                    '<i class="action fa fa-trash deletar-empresa" onclick="excluirNtf(' + response.lista_ntf[i].NTF_COD + ')"></i>' +
                                '</h6>' +
                            '</li>');
                        }
                        if(i > 0){
                            pagination_ntf++;
                            $(".ntf-componente .box-paginadores i b").text(pagination_ntf);
                        }
                        duploClickPagProxNtf = 0;
                    }else{
                        $('.ntf-componente .lista-body').removeClass("active");
                        criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                        duploClickPagProxNtf = 0;
                    }
                }
            
        });
    }
}
var duploClickPageAnteNtf = 0;
function listarPagAnteNtf(){
    if(duploClickPageAnteNtf == 0){
        duploClickPageAnteNtf = 1;
        var dadosajax = {
            'ACAO' : 'ANTERIOR PAGINACAO NTF',
            'NTF_COD' : primeiro_cod_ntf
        };
        pageurl = 'componentes/notificacao/control/ntfList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.ntf-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao listar as notificações!",2000);
                duploClickPageAnteNtf = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    if(response.lista_ntf.length > 0){
                        $('.ntf-componente .lista-body').empty();
                    }
                }


                if(response.status == 0){
                    var i = 0;
                    for (i = 0; i < response.lista_ntf.length; i++) {
                        if(i == 0){primeiro_cod_ntf = response.lista_ntf[i].NTF_COD;}
                        if((i + 1) == response.lista_ntf.length){ultimo_cod_ntf = response.lista_ntf[i].NTF_COD;}
                        $('.ntf-componente .lista-body').removeClass("active");
                        $('.ntf-componente .lista-body').append('<li>' +
                            '<h6>' + response.lista_ntf[i].NTF_COD + '</h6>' +
                            '<h6>' + response.lista_ntf[i].NTF_TITULO + '</h6>' +
                            '<h6>' + response.lista_ntf[i].NTF_DESC + '</h6>' +
                            '<h6>' +
                                '<i class="action fa fa-pen editar-empresa" onclick="editarNtf(' + response.lista_ntf[i].NTF_COD + ')"></i>' +
                                '<i class="action fa fa-trash deletar-empresa" onclick="excluirNtf(' + response.lista_ntf[i].NTF_COD + ')"></i>' +
                            '</h6>' +
                        '</li>');
                    }
                    if(i > 0){
                        pagination_ntf--;
                        $(".ntf-componente .box-paginadores i b").text(pagination_ntf);
                    }
                    duploClickPageAnteNtf = 0;
                }else{
                    $('.ntf-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.ntf-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
                    duploClickPageAnteNtf = 0;
                }
            }
        });
    }
}
//Concluido--------
function listarSetoresNotificacao(){
    var dadosajax = {
        'ACAO' : 'LISTAR SETORES'
    };
    pageurl = 'componentes/notificacao/control/ntfList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.ntf-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os Setores!",2000);
        },
        success: function(response){ 
            $(".ntf-componente #novoNotificacao .notificacao-setor").empty();
            $(".ntf-componente #editFaqs .faqs-setor").empty();
            if(response.lista_setores.length > 0){
                $(".ntf-componente #novoNotificacao .notificacao-setor").append("<option value='0'>Selecione um Setor</option>");
                $(".ntf-componente #editNtf .notificacao-str").append("<option value='0'>Selecione um Setor</option>");
            }
            
            for (var i = 0; i < response.lista_setores.length; i++) {
                $(".ntf-componente #novoNotificacao .notificacao-setor").append("<option value='" + response.lista_setores[i].STO_COD + "'>" + response.lista_setores[i].STO_NOME + "</option>");
                $(".ntf-componente #editNtf .notificacao-str").append("<option value='" + response.lista_setores[i].STO_COD + "'>" + response.lista_setores[i].STO_NOME + "</option>");
            }
        }
    });
}
//---------
$(document).on("click",".ntf-componente .nova-notificacao",function(){
    $(".ntf-componente #gaveta, .ntf-componente #gaveta #novoNotificacao").addClass("active");
});

$(document).on("click",".ntf-componente .fechar-gaveta",function(){
    $(".ntf-componente #gaveta, .ntf-componente #gaveta form").removeClass("active");
});

$(document).on("click",".ntf-componente #gaveta h5 i",function(){
    $(".ntf-componente #gaveta, .ntf-componente #gaveta form").removeClass("active");
});

$(document).on("submit",".ntf-componente #novoNotificacao",function(e){
    e.preventDefault();
    $(".ntf-componente .lista-body").addClass("active");
    criarNotificacao();
});

$(document).on("submit",".ntf-componente #editNtf",function(e){
    e.preventDefault();
    $(".ntf-componente .lista-body").addClass("active");
    editNtf();
});

$(document).on("click",".ntf-componente .box-paginadores .pag-prox",function(){
    listarNtfPagProx();
});

$(document).on("click",".ntf-componente .box-paginadores .pag-ante",function(){
    listarPagAnteNtf();
});