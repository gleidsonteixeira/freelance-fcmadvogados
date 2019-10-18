var pagination_projeto = 1;
var primeiro_cod_projeto = 0;
var ultimo_cod_projeto = 0;

function buscarEmpresa(){
    $(".buscaEmpresa").keyup(function(){
        var a = $(this).val();
        if(a != ""){
            $(".input-select li").each(function(){
                $(this).addClass("off");
                if($(this).text().toLowerCase().match(a)){
                    $(this).removeClass("off");
                }
            });
        }else{
            $(".input-select li").each(function(){
                $(this).removeClass("off");
            });
        }
    });
    $(document).on("click", ".input-select li", function(){
        $(".buscaEmpresa").val($(this).text());
        $('input[name="pjt-emp"]').val($(this).attr("data-id"));
        $('input[name="pjt-emp-nome"]').val($(this).text());
    });
}

function listarEmpresasProjetos(){
    var dadosajax = {
        'ACAO' : 'LISTAR EMPRESA'
    };
    pageurl = 'componentes/projetos/control/projetoList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao lista as empresas!",2000);
        },
        success: function(response){ 
            $(".projetos-componente #novoProjeto .input-select ul").empty();
            $(".projetos-componente #editaProjeto .input-select ul").empty();
            $(".projetos-componente #verProjeto #pat-analista").empty();
            if(response.lista_empresa.length < 0){
                $(".projetos-componente #novoProjeto .input-select ul").append('<li class="mini-title upper click">nenhuma empresa encontrada</li>');
                $(".projetos-componente #editaProjeto .input-select ul").append('<li class="mini-title upper click">nenhuma empresa encontrada</li>');
            }
            
            for (var i = 0; i < response.lista_empresa.length; i++) {
                $(".projetos-componente #novoProjeto .input-select ul").append('<li data-id="' + response.lista_empresa[i].EMP_COD + '" class="mini-title upper click">' + response.lista_empresa[i].EMP_NFANTASIA + '</li>');
                $(".projetos-componente #editaProjeto .input-select ul").append('<li data-id="' + response.lista_empresa[i].EMP_COD + '" class="mini-title upper click">' + response.lista_empresa[i].EMP_NFANTASIA + '</li>');
            }
            
            for (var i = 0; i < response.lista_analistas.length; i++) {
                $(".projetos-componente #verProjeto #pat-analista").append('<option value="' + response.lista_analistas[i].SA1_USU + '">' + response.lista_analistas[i].SA1_NOME + '</option>');
            }
        }
    });
}

function listarProjetos(){
    var dadosajax = {
        'ACAO' : 'LISTAR PROJETOS'
    };
    pageurl = 'componentes/projetos/control/projetoList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao lista as projetos!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                pagination_projeto = 1;
                $('.projetos-componente .lista-body').empty();
                $(".projetos-componente .box-paginadores i b").text(pagination_projeto);
                var i = 0;
                for (i = 0; i < response.lista_projetos.length; i++) {
                    if(i == 0){primeiro_cod_projeto = response.lista_projetos[i].PJT_COD;}
                    if((i + 1) == response.lista_projetos.length){ultimo_cod_projeto = response.lista_projetos[i].PJT_COD;}
                    
                    $('.projetos-componente .lista-body').removeClass("active");
                    $('.projetos-componente .lista-body').append('<li>' +
                        '<h6>' + response.lista_projetos[i].PJT_COD + '</h6>' +
                        '<h6>' + response.lista_projetos[i].PJT_NOME + '</h6>' +
                        '<h6>' + response.lista_projetos[i].PJT_EMP_NOME + '</h6>' +
                        '<h6>' + response.lista_projetos[i].PJT_DTINIC + '</h6>' +
                        '<h6>' +
                            '<i class="action fa fa-eye ver-projeto" onclick="verProjeto(' + response.lista_projetos[i].PJT_COD + ')"></i>' +
                            '<i class="action fa fa-pen editar-projeto" onclick="editarProjeto(' + response.lista_projetos[i].PJT_COD + ')"></i>' +
                            '<i class="action fa fa-trash deletar-projeto" onclick="excluirProjeto(' + response.lista_projetos[i].PJT_COD + ')"></i>' +
                        '</h6>' +
                    '</li>');
                }
                $(".projetos-componente .box-paginadores").removeClass("hide");
                $('.projetos-componente .lista-body').removeClass("active");
                if(i == 0){
                    $('.projetos-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum projeto cadastrado.</h6></li>');
                }
            }else{
                $('.projetos-componente .lista-body').removeClass("active");
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                $('.projetos-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum projeto cadastrado.</h6></li>');
            }
        }
    });
}

var duploClickPagProxProjeto = 0;
function listarProjetoPagProx(){
    if(duploClickPagProxProjeto == 0){
        duploClickPagProxProjeto = 1;
        var dadosajax = {
            'ACAO' : 'PROXIMO PAGINACAO PROJETOS',
            'PJT_COD' : ultimo_cod_projeto
        };
        pageurl = 'componentes/projetos/control/projetoList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                duploClickPagProxProjeto = 0;
                $('.projetos-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista as Projetos!",2000);
            },
            success: function(response){ 
                if(response.status == 0){
                    if(response.lista_projetos.length > 0){
                        $('.projetos-componente .lista-body').empty();
                    }
                }

                if(response.status == 0){
                    var i = 0;
                    for (i = 0; i < response.lista_projetos.length; i++) {
                        if(i == 0){primeiro_cod_projeto = response.lista_projetos[i].PJT_COD;}
                        if((i + 1) == response.lista_projetos.length){ultimo_cod_projeto = response.lista_projetos[i].PJT_COD;}
                        $('.projetos-componente .lista-body').removeClass("active");
                        $('.projetos-componente .lista-body').append('<li>' +
                            '<h6>' + response.lista_projetos[i].PJT_COD + '</h6>' +
                            '<h6>' + response.lista_projetos[i].PJT_NOME + '</h6>' +
                            '<h6>' + response.lista_projetos[i].PJT_EMP_NOME + '</h6>' +
                            '<h6>' + response.lista_projetos[i].PJT_DTINIC + '</h6>' +
                            '<h6>' +
                                '<i class="action fa fa-eye ver-projeto" onclick="verProjeto(' + response.lista_projetos[i].PJT_COD + ')"></i>' +
                                '<i class="action fa fa-pen editar-projeto" onclick="editarProjeto(' + response.lista_projetos[i].PJT_COD + ')"></i>' +
                                '<i class="action fa fa-trash deletar-projeto" onclick="excluirProjeto(' + response.lista_projetos[i].PJT_COD + ')"></i>' +
                            '</h6>' +
                        '</li>');
                    }
                    if(i > 0){
                        pagination_projeto++;
                        $(".projetos-componente .box-paginadores i b").text(pagination_projeto);
                    }
                    duploClickPagProxProjeto = 0;
                }else{
                    $('.projetos-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    duploClickPagProxProjeto = 0;
                }
            }
        });
    }
}

var duploClickPagAnteProjeto = 0;
function listarProjetoPagAnte(){
    if(duploClickPagAnteProjeto == 0){
        duploClickPagAnteProjeto = 1;
        var dadosajax = {
            'ACAO' : 'ANTERIOR PAGINACAO PROJETOS',
            'PJT_COD' : primeiro_cod_projeto
        };
        pageurl = 'componentes/projetos/control/projetoList.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.projetos-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista as Projetos!",2000);
                duploClickPagAnteProjeto = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    if(response.lista_projetos.length > 0){
                        $('.projetos-componente .lista-body').empty();
                    }
                }

                if(response.status == 0){
                    var i = 0;
                    for (i = 0; i < response.lista_projetos.length; i++) {
                        if(i == 0){primeiro_cod_projeto = response.lista_projetos[i].PJT_COD;}
                        if((i + 1) == response.lista_projetos.length){ultimo_cod_projeto = response.lista_projetos[i].PJT_COD;}
                        $('.projetos-componente .lista-body').removeClass("active");
                        $('.projetos-componente .lista-body').append('<li>' +
                            '<h6>' + response.lista_projetos[i].PJT_COD + '</h6>' +
                            '<h6>' + response.lista_projetos[i].PJT_NOME + '</h6>' +
                            '<h6>' + response.lista_projetos[i].PJT_EMP_NOME + '</h6>' +
                            '<h6>' + response.lista_projetos[i].PJT_DTINIC + '</h6>' +
                            '<h6>' +
                                '<i class="action fa fa-eye ver-projeto" onclick="verProjeto(' + response.lista_projetos[i].PJT_COD + ')"></i>' +
                                '<i class="action fa fa-pen editar-projeto" onclick="editarProjeto(' + response.lista_projetos[i].PJT_COD + ')"></i>' +
                                '<i class="action fa fa-trash deletar-projeto" onclick="excluirProjeto(' + response.lista_projetos[i].PJT_COD + ')"></i>' +
                            '</h6>' +
                        '</li>');
                    }
                    if(i > 0){
                        pagination_projeto--;
                        $(".projetos-componente .box-paginadores i b").text(pagination_projeto);
                    }
                    duploClickPagAnteProjeto = 0;
                }else{
                    $('.projetos-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.projetos-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum empresa cadastrado.</h6></li>');
                    duploClickPagAnteProjeto = 0;
                }
            }
        });
    }
}

var duploClickCadProjeto = 0;
function criarProjeto(){
    event.preventDefault();
    if(duploClickCadProjeto == 0){
        duploClickCadProjeto = 1;

        var form = document.getElementById("novoProjeto");
        var formData = new FormData(form);
        formData.append('ACAO', "CREATE");
        var pageurl = 'componentes/projetos/control/projetoCreate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.projetos-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao criar Projeto!",2000);
                duploClickCadProjeto = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".projetos-componente #gaveta, .projetos-componente #gaveta form").removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    $('.projetos-componente #novoProjeto').each (function(){
                        this.reset();
                    });
                    $('.projetos-componente .lista-body').removeClass("active");
                    listarProjetos();
                }else{
                    $('.projetos-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickCadProjeto = 0;
            }
        });
    }
}

function editarProjeto(PJT_COD){
    var dadosajax = {
        'ACAO' : 'LISTAR DADOS PROJETOS',
        'PJT_COD' : PJT_COD
    };
    pageurl = 'componentes/projetos/control/projetoList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.projetos-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao listar Projeto!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                if(response.lista_projeto.length > 0){
                    $(".projetos-componente #editaProjeto .pjt-cod").val(response.lista_projeto[0].PJT_COD);
                    $(".projetos-componente #editaProjeto .pjt-nome").val(response.lista_projeto[0].PJT_NOME);
                    $(".projetos-componente #editaProjeto .pjt-dtinic").val(response.lista_projeto[0].PJT_DTINIC);
                    $(".projetos-componente #editaProjeto .pjt-emp").val(response.lista_projeto[0].PJT_EMP);
                    $(".projetos-componente #editaProjeto .pjt-emp-nome").val(response.lista_projeto[0].PJT_EMP_NOME);
                    $(".projetos-componente .buscaEmpresa").val(response.lista_projeto[0].PJT_EMP_NOME);
                    $(".projetos-componente #gaveta, .projetos-componente #gaveta .editaProjeto").addClass("active");
                }
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
}

var duploClickEditProjeto = 0;
function editProjeto(){
    event.preventDefault();

     if(duploClickEditProjeto == 0){
        duploClickEditProjeto = 1;
    
        var form = document.getElementById("editaProjeto");
        var formData = new FormData(form);
        formData.append('ACAO', "UPDATE");
        var pageurl = 'componentes/projetos/control/projetoUpdate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.projetos-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao alterar Projeto!",2000);
                duploClickEditProjeto = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".projetos-componente #gaveta, .projetos-componente #gaveta form").removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    $('.projetos-componente #editaProjeto').each (function(){
                        this.reset();
                    });
                    $('.projetos-componente .lista-body').empty();
                    $('.projetos-componente .lista-body').removeClass("active");
                    listarProjetos();
                }else{
                    $('.projetos-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickEditProjeto = 0;
            }
        });
    }
}

var duploClickExcProjeto = 0;
var codigo_projeto_excluir;
function excluirProjeto(PJT_COD){
    codigo_projeto_excluir = PJT_COD;
    criaAlerta(1,"Deseja realmente excluir esse Projeto?",2000);
    $("#gaveta, .projetos-componente .lista-body").addClass("active");
    $("#alerta .confirmar").click(function(){
        if(duploClickExcProjeto == 0){
            duploClickExcProjeto = 1;
            var formData = {
                'ACAO':'DELETE',
                'PJT_COD':codigo_projeto_excluir
            }
            var pageurl = 'componentes/projetos/control/projetoDelete.php';
            $.ajax({
                url: pageurl,
                data: formData,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    $('.projetos-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Falha ao excluir Projeto!",2000);
                    duploClickExcProjeto = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        criaAlerta(0,response.mensagem,4000);
                        $('.projetos-componente .lista-body').empty();
                        listarProjetos();
                        $("#gaveta").removeClass("active");
                    }else{
                        $('.projetos-componente .lista-body').removeClass("active");
                        criaAlerta(0,response.mensagem,4000);
                    }
                    duploClickExcProjeto = 0;
                }
            });
        }
    });
}

function verProjeto(PJT_COD){
    var dadosajax = {
        'ACAO' : 'LISTAR DADOS PROJETOS',
        'PJT_COD' : PJT_COD
    };
    pageurl = 'componentes/projetos/control/projetoList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao listar projeto!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                var i = 0;
                $(".projetos-componente #verProjeto .pjt-nome").text(response.lista_projeto[0].PJT_NOME);
                $(".projetos-componente #verProjeto .pjt-cod").val(response.lista_projeto[0].PJT_COD);
                var projeto = "";
                $.each(response.lista_projeto,function(){
                        $.each(this.etapas,function(){                            
                            projeto += '<li data-id="' + this.PET_COD + '">'+
                                        '<div class="etapa">' + this.PET_NOME + '<i data-id="' + this.PET_COD + '" data-pjt="'+response.lista_projeto[0].PJT_COD+'" class="fa fa-trash right click suave deletar-etapa"></i> <i data-id="' + this.PET_COD + '" class="fa fa-pen right click suave editar-etapa"></i></div>'+
                                        '<form id="editar-etapa' + this.PET_COD + '" class="edicao"  data-pjt="' + response.lista_projeto[0].PJT_COD + '" data-id="' + this.PET_COD + '">'+
                                            '<input type="hidden" name="pjt-cod" value="' + response.lista_projeto[0].PJT_COD + '">'+
                                            '<input type="hidden" name="pet-cod" value="' + this.PET_COD + '">'+
                                            '<input type="text" name="pet-nome" value="' + this.PET_NOME + '">'+
                                            '<button class="cta mini-title upper click suave">salvar</button>'+
                                        '</form>'+
                                        '<ul class="atividades">';
                            if(this.atividades !== undefined){
                                $.each(this.atividades,function(){
                                    projeto += '<li>'+
                                                    '<div class="atividade suave">'+
                                                        '<h6 class="mini-title upper cor1-text nm">'+ this.PAT_NOME +' <i data-id="'+ this.PAT_COD +'" data-pjt="'+response.lista_projeto[0].PJT_COD+'" class="fa fa-trash right click deletar-atividade"></i><i data-id="'+ this.PAT_COD +'" class="fa fa-comment right click add-observacao"></i><i data-id="'+ this.PAT_COD +'" onclick="editarAtividade('+ this.PAT_COD +')" class="fa fa-pen right click editar-atividade"></i></h6>';
                                    if(this.PAT_DTENCERRA){                    
                                        projeto +=      '<span>Iniciada em '+ this.PAT_DTINIC +' <br> Encerrada em '+ this.PAT_DTENCERRA +' por '+ this.PAT_ANALISTA +'</span>'+
                                                        '<p>'+ this.PAT_DESC +'</p>';
                                    }else{
                                        projeto +=      '<span>Iniciada em '+ this.PAT_DTINIC +' por '+ this.PAT_ANALISTA +'</span>'+
                                                        '<p>'+ this.PAT_DESC +'</p>';
                                    }
                                    if(this.PAT_OBSERVACAO){
                                        projeto +=     '<blockquote>'+
                                                            '<span>Observações:</span>'+
                                                            '<p>' + this.PAT_OBSERVACAO + '</p>'+
                                                        '</blockquote>'+
                                                        '<form id="editarObservacao' + this.PAT_COD + '" class="observacao-form ed" style="margin-top:10px;" data-id="' + this.PAT_COD + '" data-pjt="' + response.lista_projeto[0].PJT_COD + '">'+
                                                            '<input type="hidden" name="pat-cod" value="' + this.PAT_COD + '">'+
                                                            '<h6 class="mini-title upper">Editar observação:</h6>'+
                                                            '<textarea name="pat-observacao">' + this.PAT_OBSERVACAO + '</textarea>'+
                                                            '<button class="cta mini-title upper click suave">salvar</button>'+
                                                        '</form>';
                                    }else{
                                        projeto +=      '<form id="novaObservacao' + this.PAT_COD + '" class="observacao-form" data-id="' + this.PAT_COD + '" data-pjt="' + response.lista_projeto[0].PJT_COD + '">'+
                                                            '<input type="hidden" name="pat-cod" value="' + this.PAT_COD + '">'+
                                                            '<h6 class="mini-title upper">observação:</h6>'+
                                                            '<textarea name="pat-observacao"></textarea>'+
                                                            '<button class="cta mini-title upper click suave">salvar</button>'+
                                                        '</form>';
                                    }
                                    projeto +=      '</div>'+
                                                '</li>';
                                });
                            }else{
                                projeto += '<li>'+
                                                '<div class="atividade suave">'+
                                                    '<h6 class="mini-title upper cor1-text nm" style="color: #666;">Nenhuma atividade cadastrada</h6>'+
                                                '</div>'+
                                            '</li>';
                            }
                            projeto += '</ul>'+
                                        '<button data-id="' + this.PET_COD + '" class="cta mini-title upper click suave nova-atividade">add atividade</button>'+
                                    '</li>';
                        });
                });
                $(".projetos-componente #verProjeto .etapas").html(projeto);                
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
}

function listarEtapas(PJT_COD){
    var dadosajax = {
        'ACAO' : 'LISTAR ETAPAS',
        'PJT_COD' : PJT_COD
    };
    pageurl = 'componentes/projetos/control/etapaList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao lista as etapas!",2000);
        },
        success: function(response){ 
            $(".projetos-componente #verProjeto .etapas").empty();
            if(response.lista_etapas.length == 0){
                $(".projetos-componente #verProjeto .etapas").append('<li><div class="etapa">Este projeto não possui etapas ainda...</div></li>');
            }
            for (var i = 0; i < response.lista_etapas.length; i++) {
                $(".projetos-componente #verProjeto .etapas").append(
                    '<li data-id="' + response.lista_etapas[i].PET_COD + '">'+
                        '<div class="etapa">' + response.lista_etapas[i].PET_NOME + '<i data-id="' + response.lista_etapas[i].PET_COD + '" class="fa fa-trash right click suave"></i> <i data-id="' + response.lista_etapas[i].PET_COD + '" class="fa fa-pen right click suave"></i></div>'+
                        '<ul class="atividades">'+
                            '<li>'+
                                '<div class="atividade">'+
                                    '<h6 class="mini-title upper cor1-text nm">Nenhuma atividade cadastrada</h6>'+
                                '</div>'+
                            '</li>'+
                        '</ul>'+
                        '<button data-id="' + response.lista_etapas[i].PET_COD + '" class="cta mini-title upper click suave nova-atividade">add atividade</button>'+
                    '</li>');
            }
        }
    });
}

var duploClickCadEtapa = 0;
function criarEtapa(PJT_COD){
    event.preventDefault();
    if(duploClickCadEtapa == 0){
        duploClickCadEtapa = 1;

        var form = document.getElementById("novaEtapa");
        var formData = new FormData(form);
        formData.append('ACAO', "CREATE");
        var pageurl = 'componentes/projetos/control/etapaCreate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                criaAlerta(0,"Falha ao criar etapa!",2000);
                duploClickCadEtapa = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".projetos-componente #novaEtapa").toggle();
                    criaAlerta(0,response.mensagem,4000);
                    $('.projetos-componente #novaEtapa').each(function(){
                        this.reset();
                    });
                    verProjeto(PJT_COD);
                }else{
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickCadEtapa = 0;
            }
        });
    }
}

var duploClickEditEtapa = 0;
function editEtapa(PJT_COD, PET_COD){
    event.preventDefault();

     if(duploClickEditEtapa == 0){
        duploClickEditEtapa = 1;
    
        var form = document.getElementById("editar-etapa"+PET_COD);
        var formData = new FormData(form);
        formData.append('ACAO', "UPDATE");
        var pageurl = 'componentes/projetos/control/etapaUpdate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                criaAlerta(0,"Falha ao alterar etapa!",2000);
                duploClickEditEtapa = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    criaAlerta(0,response.mensagem,4000);
                    verProjeto(PJT_COD);
                }else{
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickEditEtapa = 0;
            }
        });
    }
}

var duploClickExcEtapa = 0;
var codigo_etapa_excluir;
function excluirEtapa(PJT_COD, PET_COD){
    codigo_etapa_excluir = PET_COD;
    criaAlerta(1,"Deseja realmente excluir essa etapa?",2000);
    $("#alerta .confirmar").click(function(){
        if(duploClickExcEtapa == 0){
            duploClickExcEtapa = 1;
            var formData = {
                'ACAO':'DELETE',
                'PET_COD':codigo_etapa_excluir
            }
            var pageurl = 'componentes/projetos/control/etapaDelete.php';
            $.ajax({
                url: pageurl,
                data: formData,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    criaAlerta(0,"Falha ao excluir etapa!",2000);
                    duploClickExcEtapa = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        criaAlerta(0,response.mensagem,4000);
                        verProjeto(PJT_COD);
                    }else{
                        criaAlerta(0,response.mensagem,4000);
                    }
                    duploClickExcEtapa = 0;
                }
            });
        }
    });
}

var duploClickCadAtividade = 0;
function criarAtividade(PJT_COD){
    event.preventDefault();
    if(duploClickCadAtividade == 0){
        duploClickCadAtividade = 1;

        var form = document.getElementById("novaAtividade");
        var formData = new FormData(form);
        formData.append('ACAO', "CREATE");
        var pageurl = 'componentes/projetos/control/atividadeCreate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $(".projetos-componente #novaAtividade").removeClass("active");
                criaAlerta(0,"Falha ao criar atividade!",2000);
                duploClickCadAtividade = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".projetos-componente #novaAtividade").removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    $('.projetos-componente #novaAtividade').each(function(){
                        this.reset();
                    });
                    verProjeto(PJT_COD);
                }else{
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickCadAtividade = 0;
            }
        });
    }
}

function editarAtividade(PAT_COD){
    var dadosajax = {
        'ACAO' : 'LISTAR DADOS ATIVIDADE',
        'PAT_COD' : PAT_COD
    };
    pageurl = 'componentes/projetos/control/projetoList.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao listar atividade!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                $(".projetos-componente #editaAtividade .pat-cod").val(response.lista_atividade.PAT_COD);
                $(".projetos-componente #editaAtividade .pat-nome").val(response.lista_atividade.PAT_NOME);
                $(".projetos-componente #editaAtividade .pat-desc").val(response.lista_atividade.PAT_DESC);
                $(".projetos-componente #editaAtividade .pat-dtinic").val(response.lista_atividade.PAT_DTINIC);
                $(".projetos-componente #editaAtividade .pat-hrinic").val(response.lista_atividade.PAT_HRINIC);
                $(".projetos-componente #editaAtividade .pat-dtencerra").val(response.lista_atividade.PAT_DTENCERRA);
                $(".projetos-componente #editaAtividade .pat-hrencerra").val(response.lista_atividade.PAT_HRENCERRA);
                $(".projetos-componente #editaAtividade").addClass("active");
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
}

var duploClickEditAtividade = 0;
function editAtividade(PJT_COD){
    event.preventDefault();

     if(duploClickEditAtividade == 0){
        duploClickEditAtividade = 1;
    
        var form = document.getElementById("editaAtividade");
        var formData = new FormData(form);
        formData.append('ACAO', "UPDATE");
        var pageurl = 'componentes/projetos/control/atividadeUpdate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                criaAlerta(0,"Falha ao alterar atividade!",2000);
                duploClickEditAtividade = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    criaAlerta(0,response.mensagem,4000);
                    $(".projetos-componente #editaAtividade").removeClass("active");
                    verProjeto(PJT_COD);
                }else{
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickEditAtividade = 0;
            }
        });
    }
}

var duploClickExcAtividade = 0;
var codigo_atividade_excluir;
function excluirAtividade(PJT_COD, PAT_COD){
    codigo_atividade_excluir = PAT_COD;
    criaAlerta(1,"Deseja realmente excluir essa atividade?",2000);
    $("#alerta .confirmar").click(function(){
        if(duploClickExcAtividade == 0){
            duploClickExcAtividade = 1;
            var formData = {
                'ACAO':'DELETE',
                'PAT_COD':codigo_atividade_excluir
            }
            var pageurl = 'componentes/projetos/control/atividadeDelete.php';
            $.ajax({
                url: pageurl,
                data: formData,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    criaAlerta(0,"Falha ao excluir atividade!",2000);
                    duploClickExcAtividade = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        criaAlerta(0,response.mensagem,4000);
                        verProjeto(PJT_COD);
                    }else{
                        criaAlerta(0,response.mensagem,4000);
                    }
                    duploClickExcAtividade = 0;
                }
            });
        }
    });
}

var duploClickCadObservacao = 0;
function criarObservacao(PJT_COD, PAT_COD){
    event.preventDefault();
    if(duploClickCadObservacao == 0){
        duploClickCadObservacao = 1;

        var form = document.getElementById("novaObservacao"+PAT_COD);
        var formData = new FormData(form);
        formData.append('ACAO', "UPDATE");
        var pageurl = 'componentes/projetos/control/observacaoUpdate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                criaAlerta(0,"Falha ao atualizar observação!",2000);
                duploClickCadObservacao = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".projetos-componente .observacao-form").toggle();
                    criaAlerta(0,response.mensagem,4000);
                    $('.projetos-componente #novaObservacao'+PAT_COD).each(function(){
                        this.reset();
                    });
                    verProjeto(PJT_COD);
                }else{
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickCadObservacao = 0;
            }
        });
    }
}

var duploClickEdtObservacao = 0;
function editarObservacao(PJT_COD, PAT_COD){
    event.preventDefault();
    if(duploClickEdtObservacao == 0){
        duploClickEdtObservacao = 1;

        var form = document.getElementById("editarObservacao"+PAT_COD);
        var formData = new FormData(form);
        formData.append('ACAO', "UPDATE");
        var pageurl = 'componentes/projetos/control/observacaoUpdate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                criaAlerta(0,"Falha ao atualizar observação!",2000);
                duploClickEdtObservacao = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".projetos-componente .observacao-form").toggle();
                    criaAlerta(0,response.mensagem,4000);
                    $('.projetos-componente #novaObservacao'+PAT_COD).each(function(){
                        this.reset();
                    });
                    verProjeto(PJT_COD);
                }else{
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickEdtObservacao = 0;
            }
        });
    }
}

$(document).on("click",".novo-projeto",function(){
    $("#gaveta, #novoProjeto").addClass("active");
});

$(document).on("click",".editar-projeto",function(){
    $("#gaveta, #editaProjeto").addClass("active");
});

$(document).on("click",".ver-projeto",function(){
    $("#verProjeto, #verProjeto .content").addClass("active");
});

$(document).on("click",".nova-etapa",function(){
    var etapas = $("#verProjeto .etapa").length + 1;
    $("#novaEtapa").toggle("fast");
    $("#novaEtapa .pet-nome").val("Etapa "+ etapas);
});

$(document).on("click",".editar-etapa",function(){
    $('#editar-etapa'+$(this).attr("data-id")).toggle("fast");
});

$(document).on("click",".deletar-etapa",function(){
    excluirEtapa($(this).attr("data-pjt"),$(this).attr("data-id"));
});

$(document).on("click",".nova-atividade",function(){
    $("#novaAtividade").addClass("active");
    $("#novaAtividade .pet-cod").val($(this).attr("data-id"));
});

$(document).on("click",".deletar-atividade",function(){
    excluirAtividade($(this).attr("data-pjt"),$(this).attr("data-id"));
});

$(document).on("click",".add-observacao",function(){
    $("#novaObservacao"+$(this).attr("data-id")).toggle("fast");
    $("#editarObservacao"+$(this).attr("data-id")).toggle("fast");
});

$(document).on("submit",".projetos-componente #novaAtividade",function(e){
    e.preventDefault();
    var PJT_COD = $("#novaAtividade .pjt-cod").val();
    criarAtividade(PJT_COD);
});

$(document).on("submit",".projetos-componente #editaAtividade",function(e){
    e.preventDefault();
    var PJT_COD = $("#editaAtividade .pjt-cod").val();
    editAtividade(PJT_COD);
});

$(document).on("submit",".projetos-componente #novaEtapa",function(e){
    e.preventDefault();
    var PJT_COD = $("#novaEtapa .pjt-cod").val();
    criarEtapa(PJT_COD);
});

$(document).on("submit",".edicao",function(){
    editEtapa($(this).attr("data-pjt"),$(this).attr("data-id"));
});

$(document).on("submit",".observacao-form",function(){
    criarObservacao($(this).attr("data-pjt"),$(this).attr("data-id"));
});

$(document).on("submit",".ed",function(){
    editarObservacao($(this).attr("data-pjt"),$(this).attr("data-id"));
});

$(document).on("submit",".projetos-componente #novoProjeto",function(e){
    e.preventDefault();
    $(".projetos-componente .lista-body").addClass("active");
    criarProjeto();
});

$(document).on("submit",".projetos-componente #editaProjeto",function(e){
    e.preventDefault();
    $(".projetos-componente .lista-body").addClass("active");
    editProjeto();
});

$(document).on("click",".projetos-componente .box-paginadores .pag-prox",function(){
    listarProjetoPagProx();
});

$(document).on("click",".projetos-componente .box-paginadores .pag-ante",function(){
    listarProjetoPagAnte();
});




