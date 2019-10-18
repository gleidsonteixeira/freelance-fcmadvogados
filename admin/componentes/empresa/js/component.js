var pagination_empresa = 1;
var primeiro_cod_empresa = 0;
var ultimo_cod_empresa = 0;

function listarResumoEmpresa(){
    var dadosajax = {
        'ACAO' : 'LISTAR RESUMO'
    };
    pageurl = 'componentes/empresa/control/empresaList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.empresa-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista o resumo!",2000);
        },
        success: function(response){ 
            $('.empresa-componente .lista-resumo').empty();

            if(response.status == 0){
                var i = 0;
                for (i = 0; i < response.lista_resumo.length; i++) {
                    $('.empresa-componente .lista-resumo').removeClass("active");
                    $('.empresa-componente .lista-resumo').append('<li class="center-align">' +
                        '<h5 class="condesed">' + response.lista_resumo[i].QUANT_EMP + '</h5>' +
                        '<h6 class="mini-title upper">' + response.lista_resumo[i].STO_NOME + '</h6>' +
                    '</li>');
                }
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
}
function listarEmpresaEmpresa(){
    var dadosajax = {
        'ACAO' : 'LISTAR EMPRESA'
    };
    pageurl = 'componentes/empresa/control/empresaList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.empresa-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista as Empresas!",2000);
        },
        success: function(response){ 
            $('.empresa-componente .lista-body').empty();

            if(response.status == 0){
                pagination_empresa = 1;
                $(".empresa-componente .box-paginadores i b").text(pagination_empresa);
                var i = 0;
                for (i = 0; i < response.lista_empresa.length; i++) {
                    if(i == 0){primeiro_cod_empresa = response.lista_empresa[i].EMP_COD;}
                    if((i + 1) == response.lista_empresa.length){ultimo_cod_empresa = response.lista_empresa[i].EMP_COD;}

                    $('.empresa-componente .lista-body').removeClass("active");
                    $('.empresa-componente .lista-body').append('<li>' +
                        '<h6>' + response.lista_empresa[i].EMP_COD + '</h6>' +
                        '<h6>' + response.lista_empresa[i].EMP_NFANTASIA + '</h6>' +
                        '<h6>' + response.lista_empresa[i].EMP_EMAIL + '</h6>' +
                        '<h6>' + response.lista_empresa[i].EMP_TELEFONE + '</h6>' +
                        '<h6>' +
                            '<i class="action fa fa-pen editar-empresa" onclick="editEmpresa(' + response.lista_empresa[i].EMP_COD + ')"></i>' +
                            '<i class="action fa fa-trash deletar-empresa" onclick="excluirEmpresa(' + response.lista_empresa[i].EMP_COD + ')"></i>' +
                        '</h6>' +
                    '</li>');
                }
                $(".empresa-componente .box-paginadores").removeClass("hide");
                $('.empresa-componente .lista-body').removeClass("active");
                if(i == 0){
                    $('.empresa-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
                }
            }else{
                $('.empresa-componente .lista-body').removeClass("active");
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                $('.empresa-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
            }
        }
    });
}
function editEmpresa(EMP_COD){
    var dadosajax = {
        'ACAO' : 'LISTAR DADOS EMPRESA',
        'EMP_COD' : EMP_COD
    };
    pageurl = 'componentes/empresa/control/empresaList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.empresa-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista as Empresas!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                if(response.lista_empresa.length > 0){
                    $(".empresa-componente #editEmpresa .empresa-rzsocial").val(response.lista_empresa[0].EMP_RZSOCIAL);
                    $(".empresa-componente #editEmpresa .empresa-nfantasia").val(response.lista_empresa[0].EMP_NFANTASIA);
                    $(".empresa-componente #editEmpresa .empresa-email").val(response.lista_empresa[0].EMP_EMAIL);
                    $(".empresa-componente #editEmpresa .empresa-cnpj").val(response.lista_empresa[0].EMP_CNPJ);
                    $(".empresa-componente #editEmpresa .empresa-telefone").val(response.lista_empresa[0].EMP_TELEFONE);
                    $(".empresa-componente #editEmpresa .empresa-tempresa").val(response.lista_empresa[0].EMP_TIPO);
                    listarSetoresEmpresaEdit(response.lista_empresa[0].EMP_STO)
                    listarEstadosEmpresaEdit(response.lista_empresa[0].EMP_EST);
                    listarCidadesEmpresaEdit(response.lista_empresa[0].EMP_EST, response.lista_empresa[0].EMP_CID);
                    $(".empresa-componente #editEmpresa .empresa-endereco").val(response.lista_empresa[0].EMP_ENDERECO);
                    $(".empresa-componente #editEmpresa .empresa-eresponsavel").val(response.lista_empresa[0].EMP_EMAILRESP);
                    $(".empresa-componente #editEmpresa .empresa-cod").val(response.lista_empresa[0].EMP_COD);
                    $(".empresa-componente #gaveta, .empresa-componente #gaveta .editEmpresa").addClass("active");
                }
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
}
function listarSetoresEmpresaCad(){
    var dadosajax = {
        'ACAO' : 'LISTAR SETORES'
    };
    pageurl = 'componentes/empresa/control/empresaList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.empresa-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os setores!",2000);
        },
        success: function(response){ 
            $('.empresa-componente #novoEmpresa .lista-empresa-setor').empty();

            for (var i = 0; i < response.lista_setor.length; i++) {
                $('.empresa-componente #novoEmpresa .lista-empresa-setor').append('<li>' +
                    '<div class="lista-habilitavel">' +
                        '<div class="check banner-cta" data-cod-setor="' + response.lista_setor[i].STO_COD + '">' +
                            '<i class="fa fa-check"></i>' +
                        '</div>' +
                        '<h6 class="mini-title upper">' + response.lista_setor[i].STO_NOME + '</h6>' +
                    '</div>' +
                '</li>');
            }
        }
    });
}
function listarEstadosEmpresaCad(){
    var dadosajax = {
        'ACAO' : 'LISTAR ESTADOS'
    };
    pageurl = 'componentes/empresa/control/empresaList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao lista os estados!",2000);
        },
        success: function(response){ 
            $(".empresa-componente #novoEmpresa .empresa-estados").empty();

            for (var i = 0; i < response.lista_estados.length; i++) {
                $(".empresa-componente #novoEmpresa .empresa-estados").append("<option value='" + response.lista_estados[i].EST_COD + "'>" + response.lista_estados[i].EST_NOME + "</option>");
            }
        }
    });
}
function listarCidadesEmpresaCad(idestado){
    var dadosajax = {
        'ACAO' : 'LISTAR CIDADES',
        'idestado' : idestado
    };
    pageurl = 'componentes/empresa/control/empresaList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.empresa-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os cidades!",2000);
        },
        success: function(response){ 
            $(".empresa-componente #novoEmpresa .empresa-cidades").empty();

            for (var i = 0; i < response.lista_cidades.length; i++) {
                $(".empresa-componente #novoEmpresa .empresa-cidades").append("<option value='" + response.lista_cidades[i].CID_COD + "'>" + response.lista_cidades[i].CID_NOME + "</option>");
            }
        }
    });
}
function listarSetoresEmpresaEdit(array_setor){
    var dadosajax = {
        'ACAO' : 'LISTAR SETORES'
    };
    pageurl = 'componentes/empresa/control/empresaList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.empresa-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os setores!",2000);
        },
        success: function(response){ 
            $('.empresa-componente #editEmpresa .lista-empresa-setor').empty();

            for (var i = 0; i < response.lista_setor.length; i++) {
                var contadora = 0;
                var active = "";
                while(contadora < array_setor.length){
                    if (array_setor[contadora].STO_COD == response.lista_setor[i].STO_COD) {
                        active = "active";
                    }
                    contadora++;
                }

                $('.empresa-componente #editEmpresa .lista-empresa-setor').append('<li>' +
                    '<div class="lista-habilitavel">' +
                        '<div class="check banner-cta ' + active + '" data-cod-setor="' + response.lista_setor[i].STO_COD + '">' +
                            '<i class="fa fa-check"></i>' +
                        '</div>' +
                        '<h6 class="mini-title upper">' + response.lista_setor[i].STO_NOME + '</h6>' +
                    '</div>' +
                '</li>');
            }
        }
    });
}
function listarEstadosEmpresaEdit(idestado){
    var dadosajax = {
        'ACAO' : 'LISTAR ESTADOS'
    };
    pageurl = 'componentes/empresa/control/empresaList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao lista os estados!",2000);
        },
        success: function(response){ 
            $(".empresa-componente #editEmpresa .empresa-estados").empty();
            var selected = "";
            for (var i = 0; i < response.lista_estados.length; i++) {
                selected = "";
                if(response.lista_estados[i].EST_COD == idestado){
                    selected = "selected";
                }
                $(".empresa-componente #editEmpresa .empresa-estados").append("<option value='" + response.lista_estados[i].EST_COD + "' " + selected + ">" + response.lista_estados[i].EST_NOME + "</option>");
            }
        }
    });
}
function listarCidadesEmpresaEdit(idestado, idcidade){
    var dadosajax = {
        'ACAO' : 'LISTAR CIDADES',
        'idestado' : idestado
    };
    pageurl = 'componentes/empresa/control/empresaList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.empresa-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os cidades!",2000);
        },
        success: function(response){ 
            $(".empresa-componente #editEmpresa .empresa-cidades").empty();
            var selected = "";
            for (var i = 0; i < response.lista_cidades.length; i++) {
                selected = "";
                if(response.lista_cidades[i].CID_COD == idcidade){
                    selected = "selected";
                }
                $(".empresa-componente #editEmpresa .empresa-cidades").append("<option value='" + response.lista_cidades[i].CID_COD + "' " + selected + ">" + response.lista_cidades[i].CID_NOME + "</option>");
            }
        }
    });
}
function buscarEmpresa(text){
    var dadosajax = {
        'ACAO' : 'BUSCAR EMPRESA',
        'BUSCA' : text
    };
    pageurl = 'componentes/empresa/control/empresaList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.empresa-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista as Empresas!",2000);
        },
        success: function(response){ 
            $('.empresa-componente .lista-body').empty();

            if(response.status == 0){
                var i = 0;
                for (i = 0; i < response.lista_empresa.length; i++) {
                    if(i == 0){primeiro_cod_empresa = response.lista_empresa[i].EMP_COD;}
                    if((i + 1) == response.lista_empresa.length){ultimo_cod_empresa = response.lista_empresa[i].EMP_COD;}

                    $('.empresa-componente .lista-body').removeClass("active");
                    $('.empresa-componente .lista-body').append('<li>' +
                        '<h6>' + response.lista_empresa[i].EMP_COD + '</h6>' +
                        '<h6>' + response.lista_empresa[i].EMP_NFANTASIA + '</h6>' +
                        '<h6>' + response.lista_empresa[i].EMP_EMAIL + '</h6>' +
                        '<h6>' + response.lista_empresa[i].EMP_TELEFONE + '</h6>' +
                        '<h6>' +
                            '<i class="action fa fa-pen editar-empresa" onclick="editEmpresa(' + response.lista_empresa[i].EMP_COD + ')"></i>' +
                            '<i class="action fa fa-trash deletar-empresa" onclick="excluirEmpresa(' + response.lista_empresa[i].EMP_COD + ')"></i>' +
                        '</h6>' +
                    '</li>');
                }
                $(".empresa-componente .box-paginadores").addClass("hide");
                if(i == 0){
                    $('.empresa-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
                }
            }else{
                $('.empresa-componente .lista-body').removeClass("active");
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                $('.empresa-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
            }
        }
    });
}
var duploClickPagProxEmpresa = 0;
function listarEmpresaPagProx(){
    if(duploClickPagProxEmpresa == 0){
        duploClickPagProxEmpresa = 1;
        var dadosajax = {
            'ACAO' : 'PROXIMO PAGINACAO EMPRESA',
            'EMP_COD' : ultimo_cod_empresa
        };
        pageurl = 'componentes/empresa/control/empresaList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                duploClickPagProxEmpresa = 0;
                $('.lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista as Empresas!",2000);
            },
            success: function(response){ 
                    if(response.status == 0){
                        if(response.lista_empresa.length > 0){
                            $('.empresa-componente .lista-body').empty();
                        }
                    }

                    if(response.status == 0){
                        var i = 0;
                        for (i = 0; i < response.lista_empresa.length; i++) {
                            if(i == 0){primeiro_cod_empresa = response.lista_empresa[i].EMP_COD;}
                            if((i + 1) == response.lista_empresa.length){ultimo_cod_empresa = response.lista_empresa[i].EMP_COD;}
                            $('.empresa-componente .lista-body').removeClass("active");
                            $('.empresa-componente .lista-body').append('<li>' +
                                '<h6>' + response.lista_empresa[i].EMP_COD + '</h6>' +
                                '<h6>' + response.lista_empresa[i].EMP_NFANTASIA + '</h6>' +
                                '<h6>' + response.lista_empresa[i].EMP_EMAIL + '</h6>' +
                                '<h6>' + response.lista_empresa[i].EMP_TELEFONE + '</h6>' +
                                '<h6>' +
                                    '<i class="action fa fa-pen editar-empresa" onclick="editEmpresa(' + response.lista_empresa[i].EMP_COD + ')"></i>' +
                                    '<i class="action fa fa-trash deletar-empresa" onclick="excluirEmpresa(' + response.lista_empresa[i].EMP_COD + ')"></i>' +
                                '</h6>' +
                            '</li>');
                        }
                        if(i > 0){
                            pagination_empresa++;
                            $(".empresa-componente .box-paginadores i b").text(pagination_empresa);
                        }
                        duploClickPagProxEmpresa = 0;
                    }else{
                        $('.empresa-componente .lista-body').removeClass("active");
                        criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                        $('.empresa-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
                        duploClickPagProxEmpresa = 0;
                    }
                }
            
        });
    }
}
var duploClickPagAnteEmpresa = 0;
function listarEmpresaPagAnte(){
    if(duploClickPagAnteEmpresa == 0){
        duploClickPagAnteEmpresa = 1;
        var dadosajax = {
            'ACAO' : 'ANTERIOR PAGINACAO EMPRESA',
            'EMP_COD' : primeiro_cod_empresa
        };
        pageurl = 'componentes/empresa/control/empresaList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.empresa-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista as Empresas!",2000);
                duploClickPagAnteEmpresa = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    if(response.lista_empresa.length > 0){
                        $('.empresa-componente .lista-body').empty();
                    }
                }


                if(response.status == 0){
                    var i = 0;
                    for (i = 0; i < response.lista_empresa.length; i++) {
                        if(i == 0){primeiro_cod_empresa = response.lista_empresa[i].EMP_COD;}
                        if((i + 1) == response.lista_empresa.length){ultimo_cod_empresa = response.lista_empresa[i].EMP_COD;}
                        $('.empresa-componente .lista-body').removeClass("active");
                        $('.empresa-componente .lista-body').append('<li>' +
                            '<h6>' + response.lista_empresa[i].EMP_COD + '</h6>' +
                            '<h6>' + response.lista_empresa[i].EMP_NFANTASIA + '</h6>' +
                            '<h6>' + response.lista_empresa[i].EMP_EMAIL + '</h6>' +
                            '<h6>' + response.lista_empresa[i].EMP_TELEFONE + '</h6>' +
                            '<h6>' +
                                '<i class="action fa fa-pen editar-empresa" onclick="editEmpresa(' + response.lista_empresa[i].EMP_COD + ')"></i>' +
                                '<i class="action fa fa-trash deletar-empresa" onclick="excluirEmpresa(' + response.lista_empresa[i].EMP_COD + ')"></i>' +
                            '</h6>' +
                        '</li>');
                    }
                    if(i > 0){
                        pagination_empresa--;
                        $(".empresa-componente .box-paginadores i b").text(pagination_empresa);
                    }
                    duploClickPagAnteEmpresa = 0;
                }else{
                    $('.empresa-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.empresa-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
                    duploClickPagAnteEmpresa = 0;
                }
            }
        });
    }
}
var duploClickCadEmpresa = 0;
function criarEmpresa(){
    event.preventDefault();
    if(duploClickCadEmpresa == 0){
        duploClickCadEmpresa = 1;
        var empresa_setor = [];
        $(".empresa-componente #novoEmpresa .lista-empresa-setor .check").each(function () {
            if($(this).hasClass("active")){
                empresa_setor.push($(this).attr("data-cod-setor"));
            }
        });

        var form = document.getElementById("novoEmpresa");
        var formData = new FormData(form);
        formData.append('ACAO', "CREATE");
        formData.append('empresa-setor', empresa_setor);
        var pageurl = 'componentes/empresa/control/empresaCreate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.empresa-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao criar Empresa!",2000);
                duploClickCadEmpresa = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".empresa-componente #gaveta, .empresa-componente #gaveta form").removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    $('.empresa-componente #novoEmpresa').each (function(){
                        this.reset();
                    });
                    $(".empresa-componente #novoEmpresa .empresa-cidades").empty();
                    listarEmpresaEmpresa();
                    listarResumoEmpresa();
                    $('.empresa-componente #novoEmpresa .check').toggleClass("active");
                }else{
                    $('.empresa-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickCadEmpresa = 0;
            }
        });
    }
}
var duploClickEdiEmpresa = 0;
function editarEmpresa(){
    event.preventDefault();
    if(duploClickEdiEmpresa == 0){
        duploClickEdiEmpresa = 1;
        var empresa_setor = [];
        $(".empresa-componente #editEmpresa .lista-empresa-setor .check").each(function () {
            if($(this).hasClass("active")){
                empresa_setor.push($(this).attr("data-cod-setor"));
            }
        });

        var form = document.getElementById("editEmpresa");
        var formData = new FormData(form);
        formData.append('ACAO', "UPDATE");
        formData.append('empresa-setor', empresa_setor);
        var pageurl = 'componentes/empresa/control/empresaUpdate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.empresa-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao criar Empresa!",2000);
                duploClickEdiEmpresa = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".empresa-componente #gaveta, .empresa-componente #gaveta form").removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    $('.empresa-componente #editEmpresa').each (function(){
                        this.reset();
                    });
                    $(".empresa-componente #editEmpresa .empresa-cidades").empty();
                    listarEmpresaEmpresa();
                    $('.empresa-componente #editEmpresa .check').toggleClass("active");
                }else{
                    $('.empresa-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickEdiEmpresa = 0;
            }
        });
    }
}
var duploClickExcEmpresa = 0;
var codigo_empresa_excluir;
function excluirEmpresa(EMP_COD){
    codigo_empresa_excluir = EMP_COD;
    criaAlerta(1,"Deseja realmente excluir essa Empresa?",2000);
    $("#alerta .confirmar").click(function(){
        if(duploClickExcEmpresa == 0){
            duploClickExcEmpresa = 1;
            var formData = {
                'ACAO':'DELETE',
                'EMP_COD':codigo_empresa_excluir
            }
            var pageurl = 'componentes/empresa/control/empresaDelete.php';
            $.ajax({
                url: pageurl,
                data: formData,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    $('.empresa-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Falha ao excluir Empresa!",2000);
                    duploClickExcEmpresa = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        criaAlerta(0,response.mensagem,4000);
                        listarEmpresaEmpresa();
                        listarResumoEmpresa();
                    }else{
                        $('.empresa-componente .lista-body').removeClass("active");
                        criaAlerta(0,response.mensagem,4000);
                    }
                    duploClickExcEmpresa = 0;
                }
            });
        }
    });
}

$(document).on("click",".empresa-componente .novo-empresa",function(){
    $(".empresa-componente #gaveta, .empresa-componente #gaveta .novoEmpresa").addClass("active");
});

$(document).on("click",".empresa-componente .fechar-gaveta",function(){
    $(".empresa-componente #gaveta, .empresa-componente #gaveta form").removeClass("active");
});

$(document).on("click",".empresa-componente #gaveta h5 i",function(){
    $(".empresa-componente #gaveta, .empresa-componente #gaveta form").removeClass("active");
});

$(document).on("submit",".empresa-componente .editEmpresa",function(e){
    e.preventDefault();
    $(".empresa-componente .lista-body").addClass("active");
    editarEmpresa();
});

$(document).on("submit",".empresa-componente .novoEmpresa",function(e){
    e.preventDefault();
    $(".empresa-componente .lista-body").addClass("active");
    criarEmpresa();
});

$(document).on("change",".empresa-componente #novoEmpresa .empresa-estados",function(){
    $(".empresa-componente #novoEmpresa .empresa-cidades").empty();
    listarCidadesEmpresaCad($(this).val());
});

$(document).on("change",".empresa-componente #editEmpresa .empresa-estados",function(){
    $(".empresa-componente #editEmpresa .empresa-cidades").empty();
    listarCidadesEmpresaEdit($(this).val(), 0);
});

$(document).on("click",".empresa-componente .box-paginadores .pag-prox",function(){
    listarEmpresaPagProx();
});

$(document).on("click",".empresa-componente .box-paginadores .pag-ante",function(){
    listarEmpresaPagAnte();
});

$(document).on("keypress",".empresa-componente .box .empresa-buscar",function(e){
    if(e.which == 13) {
        if($(this).val() == ""){
            listarEmpresaEmpresa();
        }else{
            buscarEmpresa($(this).val());
        }
    }
});

$(document).on("click", ".empresa-componente .check", function(){
    $(this).toggleClass("active");
});
