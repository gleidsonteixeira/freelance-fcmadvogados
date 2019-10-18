var grafico_relatorio_chamados;
var pagination_relatorio_chamados = 1;
var primeiro_cod_relatorio_chamados = 0;
var ultimo_cod_relatorio_chamados = 0;

function chamadosGrafico(listar_chamados_garfico){
    if (grafico_relatorio_chamados == 1) {
        $('.relatorio-chamados #grafico-chamados-mes').remove(); // this is my <canvas> element
        $('.relatorio-chamados').append('<canvas id="grafico-chamados-mes" style="width:100%;height:300px;margin-top:10px;"></canvas>');
    }

    var context = document.getElementById("grafico-chamados-mes").getContext("2d");
    var gradiente = context.createLinearGradient(0, 0, 0, 350);
    gradiente.addColorStop(0, "#ce93d8");
    gradiente.addColorStop(1, "#4a148c");

    var tipo_chart;
    if($(".relatorio-chamados-componente .box-period .check").hasClass("active")){
        tipo_chart = "line";
    }else{
        tipo_chart = "bar";
    }

    var grafico = new Chart(context, {
        // TIPO DE GRÁFICO
        type: tipo_chart,
        // DADOS DO GRÁFICO
        data: {
            labels: listar_chamados_garfico.CHA_DATA,
            datasets: [{
                label: "Chamados Abertos",
                backgroundColor: "rgba(169,51,203,.3)",
                borderColor: "rgba(169,51,203,1)",
                borderWidth: 1,
                data: listar_chamados_garfico.CHA_ABERTO,
            },{
                label: "Chamados Encerrados",
                backgroundColor: "rgba(3,129,244,.3)",
                borderColor: "rgba(3,129,244,1)",
                borderWidth: 1,
                data: listar_chamados_garfico.CHA_FINALIZADO,
            }]
        },
        // CONFIGURAÇÕES EXTRAS
        options: {
            //TÍTULO DO GRÁFICO
            title: {
                display: true,
                text: "Chamados abertos X Chamados encerrados",
                fontSize: 18,
                fontColor: "#a933cb"
            },
            // DEFINE SE É RESPONSIVO OU NÃO
            responsive: false,
            // SCALES SÃO OS TEXTOS QUE APARECEM NAS ESTREMIDADES DO GRÁFICO
            scales: {
                // ESTREMIDADE VERTICAL
                yAxes: [{
                    ticks: {
                        fontSize: 12,
                        fontColor: "#a933cb"
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
            tooltips:{
                mode: "index",
            }
        }
    });

    grafico_relatorio_chamados = 1;
}
function listarRelatorioChamadoQuantidade(){
    var dadosajax;
    if($(".relatorio-chamados-componente .box-period .check").hasClass("active")){
        dadosajax = {
            'ACAO' : 'LISTAR CHAMADOS QUANTIDADE PERIODO',
            'PERIODODE'  : $(".relatorio-chamados-componente .box-period #dataDe").val(),
            'PERIODOATE'  : $(".relatorio-chamados-componente .box-period #dataAte").val()
        };
    }else{
        dadosajax = {
            'ACAO' : 'LISTAR CHAMADOS QUANTIDADE MES',
            'MES'  : $(".relatorio-chamados-componente .box-period #relatorio-chamados-periodo").val()
        };
    }

    pageurl = 'componentes/relatorio_chamados/control/relatorio_chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao lista as quantidades de chamados!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                $(".relatorio-chamados-componente .relatorio-chamados .relatorio-chamados-atendidos").html(response.listar_chamados_quantidade.CHA_FINALIZADO);
                $(".relatorio-chamados-componente .relatorio-chamados .relatorio-chamados-atendentes-operando").html(response.listar_chamados_quantidade.CHA_ATENDENTESS);
                $(".relatorio-chamados-componente .relatorio-chamados .relatorio-chamados-mic").html(response.listar_chamados_quantidade.CHA_MCI);
                chamadosGrafico(response.listar_chamados_garfico);
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
}
function listarRelatorioChamados(){
    var dadosajax = {
        'ACAO' : 'LISTAR CHAMADOS',
        'fDataDe' : $('.relatorio-chamados-componente #addFiltro #fDataDe').val(),
        'fDataAte' : $('.relatorio-chamados-componente #addFiltro #fDataAte').val(),
        'relatorio-chamados-setor' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-setor').val(),
        'relatorio-chamados-atendentes' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-atendentes').val(),
        'relatorio-chamados-prioridade' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-prioridade').val(),
        'relatorio-chamados-status' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-status').val(),
        'relatorio-chamados-empresa' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-empresa').val()
    };
    pageurl = 'componentes/relatorio_chamados/control/relatorio_chamadosListar.php';
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
            $('.relatorio-chamados-componente .lista-body').empty();

            if(response.status == 0){
                var i = 0;
                var lista;
                var status = '';
                pagination_relatorio_chamados = 1;
                $(".relatorio-chamados-componente .box-paginadores i b").text(pagination_relatorio_chamados);

                for (i = 0; i < response.lista_chamados.length; i++) {
                    if(i == 0){primeiro_cod_relatorio_chamados = response.lista_chamados[i].CHA_COD;}
                    if((i + 1) == response.lista_chamados.length){ultimo_cod_relatorio_chamados = response.lista_chamados[i].CHA_COD;}
                    if(response.lista_chamados[i].CHA_STATUS == 4){ status = 'Encerrado'; }else{ status = 'Aberto'; }
                    lista = '<li>' +
                        '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                        '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                        '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NEMP + '</b></h6>' +
                        '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                        '<h6>' + response.lista_chamados[i].CHA_NSTO + '</h6>' +
                        '<h6>' + response.lista_chamados[i].CHA_NPRI + '</h6>' +
                        '<h6>' + status + '</h6></li>';
                    $('.relatorio-chamados-componente .lista-body').append(lista);
                }
                if(i == 0){
                    $('.relatorio-chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum chamado cadastrado.</h6></li>');
                }
                $('.relatorio-chamados-componente .lista-body').removeClass("active");
            }else{
                $('.relatorio-chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                $('.relatorio-chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum chamado cadastrado.</h6></li>');
            }
            $('.relatorio-chamados-componente .lista-body').removeClass("active");
        }
    });
}
var duploClickPagProxRelatorioChamados = 0;
function listarRelatorioChamadosPagProx(){
    if(duploClickPagProxRelatorioChamados == 0){
        duploClickPagProxRelatorioChamados = 1;
        $(".relatorio-chamados-componente .lista-head .check").removeClass("active");
        $(".relatorio-chamados-componente .lista-body .check").removeClass("active");
        $(".relatorio-chamados-componente .box-actions-extra").removeClass("active");
        var status = $(".relatorio-chamados-componente .box-abas .aba.active").attr("data-status");

        var dadosajax = {
            'ACAO' : 'PROXIMO PAGINACAO CHAMADOS',
            'CHA_COD' : ultimo_cod_relatorio_chamados,
            'fDataDe' : $('.relatorio-chamados-componente #addFiltro #fDataDe').val(),
            'fDataAte' : $('.relatorio-chamados-componente #addFiltro #fDataAte').val(),
            'relatorio-chamados-setor' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-setor').val(),
            'relatorio-chamados-atendentes' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-atendentes').val(),
            'relatorio-chamados-prioridade' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-prioridade').val(),
            'relatorio-chamados-status' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-status').val(),
            'relatorio-chamados-empresa' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-empresa').val()
        };
        pageurl = 'componentes/relatorio_chamados/control/relatorio_chamadosListar.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                duploClickPagProxRelatorioChamados = 0;
                $('.relatorio-chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista os Chamados!",2000);
            },
            success: function(response){ 
                if(response.status == 0){
                    if(response.lista_chamados.length > 0){
                        $('.relatorio-chamados-componente .lista-body').empty();
                    }
                }

                if(response.status == 0){
                    var i = 0;
                    var lista;
                    var status = '';        

                    for (i = 0; i < response.lista_chamados.length; i++) {
                        if(i == 0){primeiro_cod_relatorio_chamados = response.lista_chamados[i].CHA_COD;}
                        if((i + 1) == response.lista_chamados.length){ultimo_cod_relatorio_chamados = response.lista_chamados[i].CHA_COD;}
                        if(response.lista_chamados[i].CHA_STATUS == 4){ status = 'Encerrado'; }else{ status = 'Aberto'; }
                        lista = '<li>' +
                            '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NEMP + '</b></h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_NSTO + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_NPRI + '</h6>' +
                            '<h6>' + status + '</h6></li>';
                        $('.relatorio-chamados-componente .lista-body').append(lista);
                    }
                    if(i > 0){
                        pagination_relatorio_chamados++;
                        $(".relatorio-chamados-componente .box-paginadores i b").text(pagination_relatorio_chamados);
                    }
                    duploClickPagProxRelatorioChamados = 0;
                }else{
                    $('.relatorio-chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.relatorio-chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum usuário cadastrado.</h6></li>');
                    duploClickPagProxRelatorioChamados = 0;
                }
            }
            
        });
    }
}
var duploClickPagAnteRelatorioChamados = 0;
function listarRelatorioChamadosPagAnte(){
    if(duploClickPagAnteRelatorioChamados == 0){
        duploClickPagAnteRelatorioChamados = 1;
        var status = $(".relatorio-chamados-componente .box-abas .aba.active").attr("data-status");
        var dadosajax = {
            'ACAO' : 'ANTERIOR PAGINACAO CHAMADOS',
            'CHA_COD' : primeiro_cod_relatorio_chamados,
            'fDataDe' : $('.relatorio-chamados-componente #addFiltro #fDataDe').val(),
            'fDataAte' : $('.relatorio-chamados-componente #addFiltro #fDataAte').val(),
            'relatorio-chamados-setor' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-setor').val(),
            'relatorio-chamados-atendentes' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-atendentes').val(),
            'relatorio-chamados-prioridade' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-prioridade').val(),
            'relatorio-chamados-status' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-status').val(),
            'relatorio-chamados-empresa' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-empresa').val()
        };
        pageurl = 'componentes/relatorio_chamados/control/relatorio_chamadosListar.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.relatorio-chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista os Chamados!",2000);
                duploClickPagAnteRelatorioChamados = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    if(response.lista_chamados.length > 0){
                        $('.relatorio-chamados-componente .lista-body').empty();
                    }
                }

                if(response.status == 0){
                    var i = 0;
                    var lista;
                    var status = '';        

                    for (i = 0; i < response.lista_chamados.length; i++) {
                        if(i == 0){primeiro_cod_relatorio_chamados = response.lista_chamados[i].CHA_COD;}
                        if((i + 1) == response.lista_chamados.length){ultimo_cod_relatorio_chamados = response.lista_chamados[i].CHA_COD;}
                        if(response.lista_chamados[i].CHA_STATUS == 4){ status = 'Encerrado'; }else{ status = 'Aberto'; }
                        lista = '<li>' +
                            '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NEMP + '</b></h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_NSTO + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_NPRI + '</h6>' +
                            '<h6>' + status + '</h6></li>';
                        $('.relatorio-chamados-componente .lista-body').append(lista);
                    }

                    if(i > 0){
                        pagination_relatorio_chamados--;
                        $(".relatorio-chamados-componente .box-paginadores i b").text(pagination_relatorio_chamados);
                    }
                    duploClickPagAnteRelatorioChamados = 0;
                }else{
                    $('.relatorio-chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.relatorio-chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum usuário cadastrado.</h6></li>');
                    duploClickPagAnteRelatorioChamados = 0;
                }
            }
        });
    }
}
function listarEmpresaRelatorioChamado(){
    var dadosajax = {
        'ACAO' : 'LISTAR EMPRESA'
    };
    pageurl = 'componentes/relatorio_chamados/control/relatorio_chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao listar as empresas!",2000);
            listarSetorRelatorioChamado();
        },
        success: function(response){ 
            $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-empresa").empty();

            if(response.lista_empresa.length > 0){
                $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-empresa").append("<option value='0'>Selecione uma Empresa</option>");
            }
            
            for (var i = 0; i < response.lista_empresa.length; i++) {
                $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-empresa").append("<option value='" + response.lista_empresa[i].EMP_COD + "'>" + response.lista_empresa[i].EMP_NFANTASIA + "</option>");
            }
            listarSetorRelatorioChamado();
        }
    });
}
function listarSetorRelatorioChamado(){
    var dadosajax = {
        'ACAO' : 'LISTAR SETOR'
    };
    pageurl = 'componentes/relatorio_chamados/control/relatorio_chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao listar os Setores!",2000);
            listarPrioridadeRelatorioChamado();
        },
        success: function(response){ 
            $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-setor").empty();

            if(response.lista_setor.length > 0){
                $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-setor").append("<option value='0'>Selecione um Setor</option>");
            }
            
            for (var i = 0; i < response.lista_setor.length; i++) {
                $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-setor").append("<option value='" + response.lista_setor[i].STO_COD + "'>" + response.lista_setor[i].STO_NOME + "</option>");
            }
            listarPrioridadeRelatorioChamado();
        }
    });
}
function listarPrioridadeRelatorioChamado(){
    var dadosajax = {
        'ACAO' : 'LISTAR PRIORIDADE'
    };
    pageurl = 'componentes/relatorio_chamados/control/relatorio_chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao listar as Prioridade!",2000);
            listarAtendentesRelatorioChamado();
        },
        success: function(response){ 
            $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-prioridade").empty();

            if(response.lista_prioridade.length > 0){
                $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-prioridade").append("<option value='0'>Selecione uma Prioridade</option>");
            }
            
            for (var i = 0; i < response.lista_prioridade.length; i++) {
                $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-prioridade").append("<option value='" + response.lista_prioridade[i].PRI_COD + "'>" + response.lista_prioridade[i].PRI_NOME + "</option>");
            }
            listarAtendentesRelatorioChamado();
        }
    });
}
function listarAtendentesRelatorioChamado(){
    var dadosajax = {
        'ACAO' : 'LISTAR ATENDENTES'
    };
    pageurl = 'componentes/relatorio_chamados/control/relatorio_chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao listar os Atendentes!",2000);
            listarFiltroRelatorioChamado();
        },
        success: function(response){ 
            $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-atendentes").empty();

            if(response.lista_atendentes.length > 0){
                $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-atendentes").append("<option value='0'>Selecione um Atendente</option>");
            }
            
            for (var i = 0; i < response.lista_atendentes.length; i++) {
                $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-atendentes").append("<option value='" + response.lista_atendentes[i].SA1_USU + "'>" + response.lista_atendentes[i].SA1_NOME + "</option>");
            }
            listarFiltroRelatorioChamado();
        }
    });
}
function listarFiltroRelatorioChamado(){
    var dadosajax = {
        'ACAO' : 'LISTAR FILTRO'
    };
    pageurl = 'componentes/relatorio_chamados/control/relatorio_chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao listar o Filtro!",2000);
            listarRelatorioChamados();
        },
        success: function(response){ 
            if(response.lista_filtro.length > 0){
                $(".relatorio-chamados-componente #addFiltro #fDataDe").val(response.lista_filtro[0].FTR_DATADE);
                $(".relatorio-chamados-componente #addFiltro #fDataAte").val(response.lista_filtro[0].FTR_DATAATE);
                $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-atendentes").val(response.lista_filtro[0].FTR_ATENDENTE);
                $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-prioridade").val(response.lista_filtro[0].FTR_PRIORIDADE);
                $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-status").val(response.lista_filtro[0].FTR_CHASTATUS);
                $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-empresa").val(response.lista_filtro[0].FTR_EMPSOLICITANTE);
                $(".relatorio-chamados-componente #addFiltro #relatorio-chamados-setor").val(response.lista_filtro[0].FTR_SETOR);
            }
            listarRelatorioChamados();
        }
    });
}
var duploClickCadFiltroRelatorioChamados = 0;
function criarFiltroRelatorioChamado(){
    if(duploClickCadFiltroRelatorioChamados == 0){
        duploClickCadFiltroRelatorioChamados = 1;
        var dadosajax = {
            'ACAO' : 'CREATE FILTRO',
            'fDataDe' : $('.relatorio-chamados-componente #addFiltro #fDataDe').val(),
            'fDataAte' : $('.relatorio-chamados-componente #addFiltro #fDataAte').val(),
            'relatorio-chamados-setor' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-setor').val(),
            'relatorio-chamados-atendentes' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-atendentes').val(),
            'relatorio-chamados-prioridade' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-prioridade').val(),
            'relatorio-chamados-status' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-status').val(),
            'relatorio-chamados-empresa' : $('.relatorio-chamados-componente #addFiltro #relatorio-chamados-empresa').val()
        };
        pageurl = 'componentes/relatorio_chamados/control/relatorio_chamadosCreate.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                criaAlerta(0,"Falha ao cadastrar o Filtro!",2000);
                duploClickCadFiltroRelatorioChamados = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    criaAlerta(0, response.mensagem, 2000);
                    listarRelatorioChamados();
                    $(".relatorio-chamados-componente #gaveta, .relatorio-horas-chamados-componente form").removeClass("active");
                }else{
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                }
                duploClickCadFiltroRelatorioChamados = 0;
            }
        });
    }
}
var duploClickExcFiltroRelatorioChamados = 0;
function removeFiltroRelatorioChamado(){
    criaAlerta(1,"Deseja realmente remover o Filtro?",2000);
    $("#alerta .confirmar").click(function(){
        if(duploClickExcFiltroRelatorioChamados == 0){
            duploClickExcFiltroRelatorioChamados = 1;
            var dadosajax = {
                'ACAO' : 'REMOVE FILTRO'
            };
            pageurl = 'componentes/relatorio_chamados/control/relatorio_chamadosUpdate.php';
            $.ajax({
                url: pageurl,
                data: dadosajax,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    criaAlerta(0,"Falha ao remover o Filtro!",2000);
                    duploClickExcFiltroRelatorioChamados = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        $(".relatorio-chamados-componente #gaveta, .relatorio-chamados-componente form").removeClass("active");
                        criaAlerta(0, response.mensagem, 2000);
                        $('.relatorio-chamados-componente #addFiltro').each (function(){
                            this.reset();
                        });
                        listarRelatorioChamados();
                    }else{
                        criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    }
                    duploClickExcFiltroRelatorioChamados = 0;
                }
            });
        }
    });
}
$(document).on("click",".relatorio-chamados-componente .add-filtro",function(){
    $(".relatorio-chamados-componente #gaveta, .relatorio-chamados-componente #addFiltro").addClass("active");
});

$(document).on("click",".relatorio-chamados-componente #gaveta h5 i",function(){
    $(".relatorio-chamados-componente #gaveta, .relatorio-chamados-componente form").removeClass("active");
});

$(document).on("click",".relatorio-chamados-componente .escolher-periodo",function(){
    $(".relatorio-chamados-componente .box-period, .relatorio-chamados-componente .box-period-content").toggleClass("active");
});

$(document).on("click",".relatorio-chamados-componente .box-period .check",function(){
    $(this).toggleClass("active");
    if($(".relatorio-chamados-componente .box-period .check").hasClass("active")){
        $(".relatorio-chamados-componente .box-period select").attr("disabled",true);
        $(".relatorio-chamados-componente .box-period input").attr("disabled",false);
    }else{
        $(".relatorio-chamados-componente .box-period select").attr("disabled",false);
        $(".relatorio-chamados-componente .box-period input").attr("disabled",true);
    }
});

$(document).on("change",".relatorio-chamados-componente .box-period.active #dataDe, .relatorio-chamados-componente .box-period.active #dataAte",function(){
    if($(".relatorio-chamados-componente .box-period .check").hasClass("active")){
        $(".relatorio-chamados-componente .box-period h6").text($(".relatorio-chamados-componente #dataDe").val()+' | '+$("#dataAte").val());
    }else{
        $(".relatorio-chamados-componente .box-period h6").text($(".relatorio-chamados-componente .box-period select option:selected").text());
    }
});

$(document).on("click",".relatorio-chamados-componente .relatorio-chamados .aplicar_periodo",function(){
    listarRelatorioChamadoQuantidade();
    $(".relatorio-chamados-componente .box-period, .relatorio-chamados-componente .box-period-content").removeClass("active");
    if($(".relatorio-chamados-componente .box-period .check").hasClass("active")){
        $(".relatorio-chamados-componente .box-period h6").text($(".relatorio-chamados-componente #dataDe").val()+' | '+$("#dataAte").val());
    }else{
        $(".relatorio-chamados-componente .box-period h6").text($(".relatorio-chamados-componente .box-period select option:selected").text());
    }
});

$(document).on("click",".relatorio-chamados-componente .box-paginadores .pag-prox",function(){
    listarRelatorioChamadosPagProx();
});

$(document).on("click",".relatorio-chamados-componente .box-paginadores .pag-ante",function(){
    listarRelatorioChamadosPagAnte();
});

$(document).on("submit",".relatorio-chamados-componente #addFiltro",function(e){
    e.preventDefault();
});

$(document).on("click",".relatorio-chamados-componente #addFiltro .aplicar-filtro",function(){
    listarRelatorioChamados();
});

$(document).on("click",".relatorio-chamados-componente #addFiltro .salvar-filtro",function(){
    criarFiltroRelatorioChamado();
});

$(document).on("click",".relatorio-chamados-componente #addFiltro .remover-filtro",function(){
    removeFiltroRelatorioChamado();
});