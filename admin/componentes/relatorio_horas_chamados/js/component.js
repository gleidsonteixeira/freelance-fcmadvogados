var pagination_relatorio_horas_chamados = 1;
var primeiro_cod_relatorio_horas_chamados = 0;
var ultimo_cod_relatorio_horas_chamados = 0;

function listarRelatorioHorasChamados(){
    var dadosajax = {
        'ACAO' : 'LISTAR CHAMADOS',
        'fDataDe' : $('.relatorio-horas-chamados-componente #addFiltro #fDataDe').val(),
        'fDataAte' : $('.relatorio-horas-chamados-componente #addFiltro #fDataAte').val(),
        'relatorio-chamados-status' : $('.relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-status').val(),
        'relatorio-chamados-empresa' : $('.relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-empresa').val()
    };
    pageurl = 'componentes/relatorio_horas_chamados/control/relatorio_horas_chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao listar os Chamadoss!",2000);
        },
        success: function(response){ 
            $('.relatorio-horas-chamados-componente .lista-body').empty();

            if(response.status == 0){
                var i = 0;
                var lista;
                var status = '';
                pagination_relatorio_horas_chamados = 1;
                $(".relatorio-horas-chamados-componente .box-paginadores i b").text(pagination_relatorio_horas_chamados);

                for (i = 0; i < response.lista_chamados.length; i++) {
                    if(i == 0){primeiro_cod_relatorio_horas_chamados = response.lista_chamados[i].CHA_COD;}
                    if((i + 1) == response.lista_chamados.length){ultimo_cod_relatorio_horas_chamados = response.lista_chamados[i].CHA_COD;}
                    if(response.lista_chamados[i].CHA_STATUS == 4){ status = 'Encerrado'; }else{ status = 'Aberto'; }
                    lista = '<li>' +
                        '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                        '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                        '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NEMP + '</b></h6>' +
                        '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                        '<h6>' + response.lista_chamados[i].CHA_DTFINAL + '</h6>' +
                        '<h6>' + response.lista_chamados[i].CHA_HORASGASTA + '</h6>' +
                        '<h6>' + status + '</h6></li>';
                    $('.relatorio-horas-chamados-componente .lista-body').append(lista);
                }
                if(i == 0){
                    $('.relatorio-horas-chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum chamado cadastrado.</h6></li>');
                }
                $('.relatorio-horas-chamados-componente .lista-body').removeClass("active");
            }else{
                $('.relatorio-horas-chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                $('.relatorio-horas-chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum chamado cadastrado.</h6></li>');
            }
            $('.relatorio-horas-chamados-componente .lista-body').removeClass("active");
        }
    });
}
var duploClickPagProxRelatorioHorasChamados = 0;
function listarRelatorioHorasChamadosPagProx(){
    if(duploClickPagProxRelatorioHorasChamados == 0){
        duploClickPagProxRelatorioHorasChamados = 1;
        $(".relatorio-horas-chamados-componente .lista-head .check").removeClass("active");
        $(".relatorio-horas-chamados-componente .lista-body .check").removeClass("active");
        $(".relatorio-horas-chamados-componente .box-actions-extra").removeClass("active");
        var status = $(".relatorio-horas-chamados-componente .box-abas .aba.active").attr("data-status");

        var dadosajax = {
            'ACAO' : 'PROXIMO PAGINACAO CHAMADOS',
            'CHA_COD' : ultimo_cod_relatorio_horas_chamados,
            'fDataDe' : $('.relatorio-horas-chamados-componente #addFiltro #fDataDe').val(),
            'fDataAte' : $('.relatorio-horas-chamados-componente #addFiltro #fDataAte').val(),
            'relatorio-chamados-status' : $('.relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-status').val(),
            'relatorio-chamados-empresa' : $('.relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-empresa').val()
        };
        pageurl = 'componentes/relatorio_horas_chamados/control/relatorio_horas_chamadosListar.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                duploClickPagProxRelatorioHorasChamados = 0;
                $('.relatorio-horas-chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista os Chamados!",2000);
            },
            success: function(response){ 
                if(response.status == 0){
                    if(response.lista_chamados.length > 0){
                        $('.relatorio-horas-chamados-componente .lista-body').empty();
                    }
                }

                if(response.status == 0){
                    var i = 0;
                    var lista;
                    var status = '';        

                    for (i = 0; i < response.lista_chamados.length; i++) {
                        if(i == 0){primeiro_cod_relatorio_horas_chamados = response.lista_chamados[i].CHA_COD;}
                        if((i + 1) == response.lista_chamados.length){ultimo_cod_relatorio_horas_chamados = response.lista_chamados[i].CHA_COD;}
                        if(response.lista_chamados[i].CHA_STATUS == 4){ status = 'Encerrado'; }else{ status = 'Aberto'; }
                        lista = '<li>' +
                            '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NEMP + '</b></h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_DTFINAL + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_HORASGASTA + '</h6>' +
                            '<h6>' + status + '</h6></li>';
                        $('.relatorio-horas-chamados-componente .lista-body').append(lista);
                    }
                    if(i > 0){
                        pagination_relatorio_horas_chamados++;
                        $(".relatorio-horas-chamados-componente .box-paginadores i b").text(pagination_relatorio_horas_chamados);
                    }
                    duploClickPagProxRelatorioHorasChamados = 0;
                }else{
                    $('.relatorio-horas-chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.relatorio-horas-chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum usuário cadastrado.</h6></li>');
                    duploClickPagProxRelatorioHorasChamados = 0;
                }
            }
            
        });
    }
}
var duploClickPagAnteRelatorioHorasChamados = 0;
function listarRelatorioHorasChamadosPagAnte(){
    if(duploClickPagAnteRelatorioHorasChamados == 0){
        duploClickPagAnteRelatorioHorasChamados = 1;
        var status = $(".relatorio-horas-chamados-componente .box-abas .aba.active").attr("data-status");
        var dadosajax = {
            'ACAO' : 'ANTERIOR PAGINACAO CHAMADOS',
            'CHA_COD' : primeiro_cod_relatorio_horas_chamados,
            'fDataDe' : $('.relatorio-horas-chamados-componente #addFiltro #fDataDe').val(),
            'fDataAte' : $('.relatorio-horas-chamados-componente #addFiltro #fDataAte').val(),
            'relatorio-chamados-status' : $('.relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-status').val(),
            'relatorio-chamados-empresa' : $('.relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-empresa').val()
        };
        pageurl = 'componentes/relatorio_horas_chamados/control/relatorio_horas_chamadosListar.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.relatorio-horas-chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista os Chamados!",2000);
                duploClickPagAnteRelatorioHorasChamados = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    if(response.lista_chamados.length > 0){
                        $('.relatorio-horas-chamados-componente .lista-body').empty();
                    }
                }

                if(response.status == 0){
                    var i = 0;
                    var lista;
                    var status = '';        

                    for (i = 0; i < response.lista_chamados.length; i++) {
                        if(i == 0){primeiro_cod_relatorio_horas_chamados = response.lista_chamados[i].CHA_COD;}
                        if((i + 1) == response.lista_chamados.length){ultimo_cod_relatorio_horas_chamados = response.lista_chamados[i].CHA_COD;}
                        if(response.lista_chamados[i].CHA_STATUS == 4){ status = 'Encerrado'; }else{ status = 'Aberto'; }
                        lista = '<li>' +
                            '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NEMP + '</b></h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_DTFINAL + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_HORASGASTA + '</h6>' +
                            '<h6>' + status + '</h6></li>';
                        $('.relatorio-horas-chamados-componente .lista-body').append(lista);
                    }

                    if(i > 0){
                        pagination_relatorio_horas_chamados--;
                        $(".relatorio-horas-chamados-componente .box-paginadores i b").text(pagination_relatorio_horas_chamados);
                    }
                    duploClickPagAnteRelatorioHorasChamados = 0;
                }else{
                    $('.relatorio-horas-chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.relatorio-horas-chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum usuário cadastrado.</h6></li>');
                    duploClickPagAnteRelatorioHorasChamados = 0;
                }
            }
        });
    }
}
function listarEmpresaRelatorioHorasChamado(){
    var dadosajax = {
        'ACAO' : 'LISTAR EMPRESA'
    };
    pageurl = 'componentes/relatorio_horas_chamados/control/relatorio_horas_chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao listar as empresas!",2000);
            listarFiltroRelatorioHorasChamado();
        },
        success: function(response){ 
            $(".relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-empresa").empty();

            if(response.lista_empresa.length > 0){
                $(".relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-empresa").append("<option value='0'>Selecione uma Empresa</option>");
            }
            
            for (var i = 0; i < response.lista_empresa.length; i++) {
                $(".relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-empresa").append("<option value='" + response.lista_empresa[i].EMP_COD + "'>" + response.lista_empresa[i].EMP_NFANTASIA + "</option>");
            }
            listarFiltroRelatorioHorasChamado();
        }
    });
}
function listarFiltroRelatorioHorasChamado(){
    var dadosajax = {
        'ACAO' : 'LISTAR FILTRO'
    };
    pageurl = 'componentes/relatorio_horas_chamados/control/relatorio_horas_chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao listar o Filtro!",2000);
            listarRelatorioHorasChamados();
        },
        success: function(response){ 
            if(response.lista_filtro.length > 0){
                $(".relatorio-horas-chamados-componente #addFiltro #fDataDe").val(response.lista_filtro[0].FTR_DATADE);
                $(".relatorio-horas-chamados-componente #addFiltro #fDataAte").val(response.lista_filtro[0].FTR_DATAATE);
                $(".relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-atendentes").val(response.lista_filtro[0].FTR_ATENDENTE);
                $(".relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-prioridade").val(response.lista_filtro[0].FTR_PRIORIDADE);
                $(".relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-status").val(response.lista_filtro[0].FTR_CHASTATUS);
                $(".relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-empresa").val(response.lista_filtro[0].FTR_EMPSOLICITANTE);
                $(".relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-setor").val(response.lista_filtro[0].FTR_SETOR);
            }
            listarRelatorioHorasChamados();
        }
    });
}
var duploClickCadFiltroRelatorioHorasChamados = 0;
function criarFiltroRelatorioHorasChamado(){
    if(duploClickCadFiltroRelatorioHorasChamados == 0){
        duploClickCadFiltroRelatorioHorasChamados = 1;
        var dadosajax = {
            'ACAO' : 'CREATE FILTRO',
            'fDataDe' : $('.relatorio-horas-chamados-componente #addFiltro #fDataDe').val(),
            'fDataAte' : $('.relatorio-horas-chamados-componente #addFiltro #fDataAte').val(),
            'relatorio-chamados-status' : $('.relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-status').val(),
            'relatorio-chamados-empresa' : $('.relatorio-horas-chamados-componente #addFiltro #relatorio-chamados-empresa').val()
        };
        pageurl = 'componentes/relatorio_horas_chamados/control/relatorio_horas_chamadosCreate.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                criaAlerta(0,"Falha ao cadastrar o Filtro!",2000);
                duploClickCadFiltroRelatorioHorasChamados = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    criaAlerta(0, response.mensagem, 2000);
                    listarRelatorioHorasChamados();
                    $(".relatorio-horas-chamados-componente #gaveta, .relatorio-horas-chamados-componente form").removeClass("active");
                }else{
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                }
                duploClickCadFiltroRelatorioHorasChamados = 0;
            }
        });
    }
}
var duploClickExcFiltroRelatorioHorasChamados = 0;
function removeFiltroRelatorioHorasChamado(){
    criaAlerta(1,"Deseja realmente remover o Filtro?",2000);
    $("#alerta .confirmar").click(function(){
        if(duploClickExcFiltroRelatorioHorasChamados == 0){
            duploClickExcFiltroRelatorioHorasChamados = 1;
            var dadosajax = {
                'ACAO' : 'REMOVE FILTRO'
            };
            pageurl = 'componentes/relatorio_horas_chamados/control/relatorio_horas_chamadosUpdate.php';
            $.ajax({
                url: pageurl,
                data: dadosajax,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    criaAlerta(0,"Falha ao remover o Filtro!",2000);
                    duploClickExcFiltroRelatorioHorasChamados = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        $(".relatorio-horas-chamados-componente #gaveta, .relatorio-horas-chamados-componente form").removeClass("active");
                        criaAlerta(0, response.mensagem, 2000);
                        $('.relatorio-horas-chamados-componente #addFiltro').each (function(){
                            this.reset();
                        });
                        listarRelatorioHorasChamados();
                    }else{
                        criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    }
                    duploClickExcFiltroRelatorioHorasChamados = 0;
                }
            });
        }
    });
}
$(document).on("click",".relatorio-horas-chamados-componente .add-filtro",function(){
    $(".relatorio-horas-chamados-componente #gaveta, .relatorio-horas-chamados-componente #addFiltro").addClass("active");
});

$(document).on("click",".relatorio-horas-chamados-componente #gaveta h5 i",function(){
    $(".relatorio-horas-chamados-componente #gaveta, .relatorio-horas-chamados-componente form").removeClass("active");
});

$(document).on("click",".relatorio-horas-chamados-componente .escolher-periodo",function(){
    $(".relatorio-horas-chamados-componente .box-period, .relatorio-horas-chamados-componente .box-period-content").toggleClass("active");
});

$(document).on("click",".relatorio-horas-chamados-componente .box-period .check",function(){
    $(this).toggleClass("active");
    if($(".relatorio-horas-chamados-componente .box-period .check").hasClass("active")){
        $(".relatorio-horas-chamados-componente .box-period select").attr("disabled",true);
        $(".relatorio-horas-chamados-componente .box-period input").attr("disabled",false);
    }else{
        $(".relatorio-horas-chamados-componente .box-period select").attr("disabled",false);
        $(".relatorio-horas-chamados-componente .box-period input").attr("disabled",true);
    }
});

$(document).on("change",".relatorio-horas-chamados-componente .box-period.active #dataDe, .relatorio-horas-chamados-componente .box-period.active #dataAte",function(){
    if($(".relatorio-horas-chamados-componente .box-period .check").hasClass("active")){
        $(".relatorio-horas-chamados-componente .box-period h6").text($(".relatorio-horas-chamados-componente #dataDe").val()+' | '+$("#dataAte").val());
    }else{
        $(".relatorio-horas-chamados-componente .box-period h6").text($(".relatorio-horas-chamados-componente .box-period select option:selected").text());
    }
});

$(document).on("click",".relatorio-horas-chamados-componente .relatorio-chamados .aplicar_periodo",function(){
    $(".relatorio-horas-chamados-componente .box-period, .relatorio-horas-chamados-componente .box-period-content").removeClass("active");
    if($(".relatorio-horas-chamados-componente .box-period .check").hasClass("active")){
        $(".relatorio-horas-chamados-componente .box-period h6").text($(".relatorio-horas-chamados-componente #dataDe").val()+' | '+$("#dataAte").val());
    }else{
        $(".relatorio-horas-chamados-componente .box-period h6").text($(".relatorio-horas-chamados-componente .box-period select option:selected").text());
    }
});

$(document).on("click",".relatorio-horas-chamados-componente .box-paginadores .pag-prox",function(){
    listarRelatorioHorasChamadosPagProx();
});

$(document).on("click",".relatorio-horas-chamados-componente .box-paginadores .pag-ante",function(){
    listarRelatorioHorasChamadosPagAnte();
});

$(document).on("submit",".relatorio-horas-chamados-componente #addFiltro",function(e){
    e.preventDefault();
});

$(document).on("click",".relatorio-horas-chamados-componente #addFiltro .aplicar-filtro",function(){
    listarRelatorioHorasChamados();
});

$(document).on("click",".relatorio-horas-chamados-componente #addFiltro .salvar-filtro",function(){
    criarFiltroRelatorioHorasChamado();
});

$(document).on("click",".relatorio-horas-chamados-componente #addFiltro .remover-filtro",function(){
    removeFiltroRelatorioHorasChamado();
});