var pagination_usuario = 1;
var primeiro_cod_usuario = 0;
var ultimo_cod_usuario = 0;

function listarUsuarioUsuario(){
    var dadosajax = {
        'ACAO' : 'LISTAR USUARIO'
    };
    pageurl = 'componentes/usuario/control/usuarioList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.usuario-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os Usuários!",2000);
        },
        success: function(response){ 
            $('.usuario-componente .lista-body').empty();

            if(response.status == 0){
                var i = 0;
                for (i = 0; i < response.lista_usuario.length; i++) {
                    if(i == 0){primeiro_cod_usuario = response.lista_usuario[i].SA1_COD;}
                    if((i + 1) == response.lista_usuario.length){ultimo_cod_usuario = response.lista_usuario[i].SA1_COD;}

                    $('.usuario-componente .lista-body').removeClass("active");
                    $('.usuario-componente .lista-body').append('<li>' +
                        '<h6>' + response.lista_usuario[i].SA1_COD + '</h6>' +
                        '<h6>' + response.lista_usuario[i].SA1_NOME + '</h6>' +
                        '<h6>' + response.lista_usuario[i].SA1_EMAIL + '</h6>' +
                        '<h6>' + response.lista_usuario[i].SA1_TELEFONE + '</h6>' +
                        '<h6>' +
                            '<i class="action fa fa-pen editar-usuario" onclick="editUsuario(' + response.lista_usuario[i].SA1_COD + ')"></i>' +
                            '<i class="action fa fa-trash deletar-usuario" onclick="excluirUsuario(' + response.lista_usuario[i].SA1_COD + ')"></i>' +
                        '</h6>' +
                    '</li>');
                }
                if(i == 0){
                    $('.usuario-componente .lista-body').removeClass("active");
                    $('.usuario-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum usuário cadastrado.</h6></li>');
                }
            }else{
                $('.usuario-componente .lista-body').removeClass("active");
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                $('.usuario-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum usuário cadastrado.</h6></li>');
            }
        }
    });
}
function editUsuario(SA1_COD){
    var dadosajax = {
        'ACAO' : 'LISTAR DADOS USUARIO',
        'SA1_COD' : SA1_COD
    };
    pageurl = 'componentes/usuario/control/usuarioList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.usuario-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os Usuários!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                if(response.lista_usuario.length > 0){
                    $(".usuario-componente #editUsuario .usuario-nome").val(response.lista_usuario[0].SA1_NOME);
                    $(".usuario-componente #editUsuario .usuario-email").val(response.lista_usuario[0].SA1_EMAIL);
                    $(".usuario-componente #editUsuario .usuario-senha").val(response.lista_usuario[0].SA1_SENHA);
                    $(".usuario-componente #editUsuario .usuario-cpf").val(response.lista_usuario[0].SA1_CPF);
                    $(".usuario-componente #editUsuario .usuario-telefone").val(response.lista_usuario[0].SA1_TELEFONE);
                    $(".usuario-componente #editUsuario .usuario-empresa").val(response.lista_usuario[0].SA1_EMP);
                    listarMenuEditUsuario(response.lista_usuario[0].SA1_EMP, response.lista_usuario[0].SA1_MNU);
                    $(".usuario-componente #editUsuario .usuario-cod").val(response.lista_usuario[0].SA1_COD);
                    $(".usuario-componente #gaveta, .usuario-componente #gaveta .editUsuario").addClass("active");
                }
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
}
function listarMenuCadUsuario(){
    var dadosajax = {
        'ACAO' : 'LISTAR MENU'
    };
    pageurl = 'componentes/usuario/control/usuarioList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.usuario-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os menus!",2000);
        },
        success: function(response){ 
            $('.usuario-componente #novoUsuario .lista-usuario-menu').empty();
            if(response.lista_menu.length > 0){
                $('.usuario-componente #novoUsuario .lista-usuario-menu').append('<h6 class="mini-title upper">Menus Disponíveis</h6>');
            }
            for (var i = 0; i < response.lista_menu.length; i++) {
                $('.usuario-componente #novoUsuario .lista-usuario-menu').append('<li>' +
                    '<div class="lista-habilitavel">' +
                        '<div class="check banner-cta" data-cod-menu="' + response.lista_menu[i].MNU_COD + '">' +
                            '<i class="fa fa-check"></i>' +
                        '</div>' +
                        '<h6 class="mini-title upper">' + response.lista_menu[i].MNU_NOME + '</h6>' +
                    '</div>' +
                '</li>');
            }
        }
    });
}
function listarMenuEditUsuario(EMP_COD, SA1_MNU){
    var dadosajax = {
        'ACAO' : 'LISTAR MENU',
        'EMP_COD' : EMP_COD
    };
    pageurl = 'componentes/usuario/control/usuarioList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.usuario-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os menus!",2000);
        },
        success: function(response){ 
            $('.usuario-componente #editUsuario .lista-usuario-menu').empty();
            if(response.lista_menu.length > 0){
                $('.usuario-componente #editUsuario .lista-usuario-menu').append('<h6 class="mini-title upper">Menus Disponíveis</h6>');
            }
            var active = "";
            for (var i = 0; i < response.lista_menu.length; i++) {
                active = ""
                for (var o = 0; o < SA1_MNU.length; o++) {
                    if(SA1_MNU[o].MNU_COD == response.lista_menu[i].MNU_COD){
                        active = "active";
                    }
                }

                $('.usuario-componente #editUsuario .lista-usuario-menu').append('<li>' +
                    '<div class="lista-habilitavel">' +
                        '<div class="check banner-cta ' + active + '" data-cod-menu="' + response.lista_menu[i].MNU_COD + '">' +
                            '<i class="fa fa-check"></i>' +
                        '</div>' +
                        '<h6 class="mini-title upper">' + response.lista_menu[i].MNU_NOME + '</h6>' +
                    '</div>' +
                '</li>');
            }
        }
    });
} 
var duploClickPagProx = 0;
function listarUsuarioPagProx(){
    if(duploClickPagProx == 0){
        duploClickPagProx = 1;
        var dadosajax = {
            'ACAO' : 'PROXIMO PAGINACAO USUARIO',
            'SA1_COD' : ultimo_cod_usuario
        };
        pageurl = 'componentes/usuario/control/usuarioList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                duploClickPagProx = 0;
                $('.usuario-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista os Usuários!",2000);
            },
            success: function(response){ 
                    if(response.status == 0){
                        if(response.lista_usuario.length > 0){
                            $('.usuario-componente .lista-body').empty();
                        }
                    }

                    if(response.status == 0){
                        var i = 0;
                        for (i = 0; i < response.lista_usuario.length; i++) {
                            if(i == 0){primeiro_cod_usuario = response.lista_usuario[i].SA1_COD;}
                            if((i + 1) == response.lista_usuario.length){ultimo_cod_usuario = response.lista_usuario[i].SA1_COD;}
                            $('.usuario-componente .lista-body').removeClass("active");
                            $('.usuario-componente .lista-body').append('<li>' +
                                '<h6>' + response.lista_usuario[i].SA1_COD + '</h6>' +
                                '<h6>' + response.lista_usuario[i].SA1_NOME + '</h6>' +
                                '<h6>' + response.lista_usuario[i].SA1_EMAIL + '</h6>' +
                                '<h6>' + response.lista_usuario[i].SA1_TELEFONE + '</h6>' +
                                '<h6>' +
                                    '<i class="action fa fa-pen editar-usuario" onclick="editUsuario(' + response.lista_usuario[i].SA1_COD + ')"></i>' +
                                    '<i class="action fa fa-trash deletar-usuario" onclick="excluirUsuario(' + response.lista_usuario[i].SA1_COD + ')"></i>' +
                                '</h6>' +
                            '</li>');
                        }
                        if(i > 0){
                            pagination_usuario++;
                            $(".box-paginadores i b").text(pagination_usuario);
                        }
                        duploClickPagProx = 0;
                    }else{
                        $('.usuario-componente .lista-body').removeClass("active");
                        criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                        $('.usuario-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum usuário cadastrado.</h6></li>');
                        duploClickPagProx = 0;
                    }
                }
            
        });
    }
}
var duploClickPagAnte = 0;
function listarUsuarioPagAnte(){
    if(duploClickPagAnte == 0){
        duploClickPagAnte = 1;
        var dadosajax = {
            'ACAO' : 'ANTERIOR PAGINACAO USUARIO',
            'SA1_COD' : primeiro_cod_usuario
        };
        pageurl = 'componentes/usuario/control/usuarioList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.usuario-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista os Usuários!",2000);
                duploClickPagAnte = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    if(response.lista_usuario.length > 0){
                        $('.usuario-componente .lista-body').empty();
                    }
                }

                if(response.status == 0){
                    var i = 0;
                    for (i = 0; i < response.lista_usuario.length; i++) {
                        if(i == 0){primeiro_cod_usuario = response.lista_usuario[i].SA1_COD;}
                        if((i + 1) == response.lista_usuario.length){ultimo_cod_usuario = response.lista_usuario[i].SA1_COD;}
                        $('.usuario-componente .lista-body').removeClass("active");
                        $('.usuario-componente .lista-body').append('<li>' +
                            '<h6>' + response.lista_usuario[i].SA1_COD + '</h6>' +
                            '<h6>' + response.lista_usuario[i].SA1_NOME + '</h6>' +
                            '<h6>' + response.lista_usuario[i].SA1_EMAIL + '</h6>' +
                            '<h6>' + response.lista_usuario[i].SA1_TELEFONE + '</h6>' +
                            '<h6>' +
                                '<i class="action fa fa-pen editar-usuario" onclick="editUsuario(' + response.lista_usuario[i].SA1_COD + ')"></i>' +
                                '<i class="action fa fa-trash deletar-usuario" onclick="excluirUsuario(' + response.lista_usuario[i].SA1_COD + ')"></i>' +
                            '</h6>' +
                        '</li>');
                    }
                    if(i > 0){
                        pagination_usuario--;
                        $(".box-paginadores i b").text(pagination_usuario);
                    }
                    duploClickPagAnte = 0;
                }else{
                    $('.usuario-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.usuario-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum usuário cadastrado.</h6></li>');
                    duploClickPagAnte = 0;
                }
            }
        });
    }
}
var duploClickCadUsuario = 0;
function criarUsuario(){
    event.preventDefault();
    if(duploClickCadUsuario == 0){
        duploClickCadUsuario = 1;
        var usuario_menu = [];
        $(".usuario-componente #novoUsuario .lista-usuario-menu .check").each(function () {
            if($(this).hasClass("active")){
                usuario_menu.push($(this).attr("data-cod-menu"));
            }
        });

        var form = document.getElementById("novoUsuario");
        var formData = new FormData(form);
        formData.append('ACAO', "CREATE");
        formData.append('usuario-menu', usuario_menu);
        var pageurl = 'componentes/usuario/control/usuarioCreate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.usuario-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao criar Usuário!",2000);
                duploClickCadUsuario = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".usuario-componente #gaveta, .usuario-componente #gaveta form").removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    $('.usuario-componente #novoUsuario').each (function(){
                        this.reset();
                    });
                    $(".usuario-componente #novoUsuario .lista-usuario-menu").empty();
                    listarUsuarioUsuario();
                    $('.usuario-componente #novoUsuario .check').toggleClass("active");
                }else{
                    $('.usuario-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickCadUsuario = 0;
            }
        });
    }
}
var duploClickEdiUsuario = 0;
function editarUsuario(){
    event.preventDefault();
    if(duploClickEdiUsuario == 0){
        duploClickEdiUsuario = 1;
        var usuario_menu = [];
        $(".usuario-componente #editUsuario .lista-usuario-menu .check").each(function () {
            if($(this).hasClass("active")){
                usuario_menu.push($(this).attr("data-cod-menu"));
            }
        });

        var form = document.getElementById("editUsuario");
        var formData = new FormData(form);
        formData.append('ACAO', "UPDATE");
        formData.append('usuario-menu', usuario_menu);
        var pageurl = 'componentes/usuario/control/usuarioUpdate.php';

        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.usuario-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao editar Usuário!",2000);
                duploClickEdiUsuario = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".usuario-componente #gaveta, .usuario-componente #gaveta form").removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    $('.usuario-componente #editUsuario').each (function(){
                        this.reset();
                    });
                    $(".usuario-componente #editUsuario .empresa-cidades").empty();
                    listarUsuarioUsuario();
                    $('.usuario-componente #editUsuario .check').toggleClass("active");
                }else{
                    $('.usuario-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickEdiUsuario = 0;
            }
        });
    }
}
var duploClickExcUsuario = 0;
var codigo_usuario_excluir;
function excluirUsuario(SA1_COD){
    codigo_usuario_excluir = SA1_COD;
    criaAlerta(1,"Deseja realmente excluir essa Usuário?",2000);
    $("#alerta .confirmar").click(function(){
        if(duploClickExcUsuario == 0){
            duploClickExcUsuario = 1;
            var formData = {
                'ACAO':'DELETE',
                'SA1_COD':codigo_usuario_excluir
            }
            var pageurl = 'componentes/usuario/control/usuarioDelete.php';
            $.ajax({
                url: pageurl,
                data: formData,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    $('.usuario-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Falha ao excluir Usuário!",2000);
                    duploClickExcUsuario = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        criaAlerta(0,response.mensagem,4000);
                        listarUsuarioUsuario();
                    }else{
                        $('.usuario-componente .lista-body').removeClass("active");
                        criaAlerta(0,response.mensagem,4000);
                    }
                    duploClickExcUsuario = 0;
                }
            });
        }
    });
}

$(document).on("click",".usuario-componente .novo-usuario",function(){
    $(".usuario-componente #gaveta, .usuario-componente #gaveta .novoUsuario").addClass("active");
});

$(document).on("click",".usuario-componente .fechar-gaveta",function(){
    $(".usuario-componente #gaveta, .usuario-componente #gaveta form").removeClass("active");
});

$(document).on("click",".usuario-componente #gaveta h5 i",function(){
    $(".usuario-componente #gaveta, .usuario-componente #gaveta form").removeClass("active");
});

$(document).on("submit",".usuario-componente .editUsuario",function(e){
    e.preventDefault();
    $(".usuario-componente .lista-body").addClass("active");
    editarUsuario();
});

$(document).on("submit",".usuario-componente .novoUsuario",function(e){
    e.preventDefault();
    $(".usuario-componente .lista-body").addClass("active");
    criarUsuario();
});

$(document).on("change",".usuario-componente #novoUsuario .usuario-empresa",function(e){
    $("#novoUsuario .lista-usuario-menu").empty();
    listarMenuCadUsuario($(this).val());
});

$(document).on("change",".usuario-componente #editUsuario .usuario-empresa",function(e){
    $("#editUsuario .lista-usuario-menu").empty();
    listarMenuEditUsuario($(this).val(), 0);
});

$(document).on("click",".usuario-componente .box-paginadores .pag-prox",function(e){
    listarUsuarioPagProx();
});

$(document).on("click",".usuario-componente .box-paginadores .pag-ante",function(e){
    listarUsuarioPagAnte();
});

$(document).on("click", ".usuario-componente .check", function(){
    $(this).toggleClass("active");
});
