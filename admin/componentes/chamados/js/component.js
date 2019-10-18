var pagination_chamados = 1;
var primeiro_cod_chamados = 0;
var ultimo_cod_chamados = 0;
var ultima_mensagem_resposta_chamados = 0;
var buscar_resposta_chamado;
var teste_buscar_resposta_chamado = 0;

function listarChamadoQuantidade(){
    var dadosajax = {
        'ACAO' : 'LISTAR CHAMADOS QUANTIDADE'
    };
    pageurl = 'componentes/chamados/control/chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.chamados-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista as quantidades de chamados!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                $(".chamados-componente .box-abas .aba-aberto span").html(response.listar_chamados_quantidade[0].CHA_ABERTO);
                $(".chamados-componente .box-abas .aba-agatend span").html(response.listar_chamados_quantidade[0].CHA_AGATEND);
                $(".chamados-componente .box-abas .aba-agclient span").html(response.listar_chamados_quantidade[0].CHA_AGCLIENT);
                $(".chamados-componente .box-abas .aba-finalizado span").html(response.listar_chamados_quantidade[0].CHA_FINALIZADO);
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
}
function listarChamadosChamados(){
    $(".chamados-componente .lista-head .check").removeClass("active");
    $(".chamados-componente .lista-body .check").removeClass("active");
    $(".chamados-componente .box-actions-extra").removeClass("active");
	var status = $(".chamados-componente .box-abas .aba.active").attr("data-status");

    var dadosajax = {
        'ACAO' : 'LISTAR CHAMADOS',
        'status' : status
    };
    pageurl = 'componentes/chamados/control/chamadosListar.php';
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
            $('.chamados-componente .lista-body').empty();

            if(response.status == 0){
                var i = 0;
                var lista;
                pagination_chamados = 1;
                $(".chamados-componente .box-paginadores i b").text(pagination_chamados);
                if(response.A_USU_TIPO == "ADM" || response.A_USU_TIPO == "COR" || response.A_USU_TIPO == "DEV"){
                    $(".chamados-componente .lista-head .check-lista-head").removeClass("hide");
                }

                for (i = 0; i < response.lista_chamados.length; i++) {
                    lista = "";
                    if(i == 0){primeiro_cod_chamados = response.lista_chamados[i].CHA_COD;}
                    if((i + 1) == response.lista_chamados.length){ultimo_cod_chamados = response.lista_chamados[i].CHA_COD;}

                    if(response.A_USU_TIPO == "ADM" || response.A_USU_TIPO == "COR" || response.A_USU_TIPO == "DEV"){
                        lista += '<li>' +
                            '<h6><div class="check" data-cod-chamado="' + response.lista_chamados[i].CHA_COD + '"><i class="fa fa-check"></i></div></h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NEMP + '</b></h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_NSTO + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_NPRI + '</h6>' +
                            '<h6>';

                        if(status == 1 || status == 2 || status == 3){
                            lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>' +
                                '<i class="action fa fa-user-plus editar-atendente" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>' +
                                '<i class="action fa fa-traffic-light editar-prioridade" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-prioridade="' + response.lista_chamados[i].CHA_PRI + '"></i>';
                        }else {
                            lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>';
                        }

                        lista += '</h6></li>';
                        $('.chamados-componente .lista-body').append(lista);
                    }else if(response.A_USU_TIPO == "FUN"){
                        lista += '<li>' +
                            '<h6 class="hide"><div class="check" data-cod-chamado="' + response.lista_chamados[i].CHA_COD + '"><i class="fa fa-check"></i></div></h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NEMP + '</b></h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_NSTO + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_NPRI + '</h6>' +
                            '<h6>';

                        if(status == 1){
                            lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>' +
                                '<i class="action fa fa-user-check se-adicionar-atendente" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.A_USU_COD + '"></i>';
                        }else {
                            lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>';
                        }

                        lista += '</h6></li>';
                        $('.chamados-componente .lista-body').append(lista);
                    }
                }
                if(i == 0){
                    $('.chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum chamado cadastrado.</h6></li>');
                }
                $('.chamados-componente .lista-body').removeClass("active");
            }else{
                $('.chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                $('.chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum chamado cadastrado.</h6></li>');
            }
            $('.chamados-componente .lista-body').removeClass("active");
        }
    });
}
function listarEmpresaCadChamado(){
    var dadosajax = {
        'ACAO' : 'LISTAR EMPRESA'
    };
    pageurl = 'componentes/chamados/control/chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.chamados-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista as empresas!",2000);
        },
        success: function(response){ 
            $(".chamados-componente #novoChamado #chamados-empresa").empty();

            if(response.lista_empresa.length > 0){
                $(".chamados-componente #novoChamado #chamados-empresa").append("<option value='0'>Selecione uma Empresa</option>");
            }
            
            for (var i = 0; i < response.lista_empresa.length; i++) {
                $(".chamados-componente #novoChamado #chamados-empresa").append("<option value='" + response.lista_empresa[i].EMP_COD + "'>" + response.lista_empresa[i].EMP_NFANTASIA + "</option>");
            }
        }
    });
}
function listarSolicitanteCadChamado(COD_EMP){
    var dadosajax = {
        'ACAO' : 'LISTAR SOLICITANTE',
        'COD_EMP' : COD_EMP
    };
    pageurl = 'componentes/chamados/control/chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.chamados-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os solicitantes!",2000);
        },
        success: function(response){ 
            $(".chamados-componente #novoChamado #chamados-solicitante").empty();

            if(response.lista_usuario.length > 0){
                $(".chamados-componente #novoChamado #chamados-solicitante").append("<option value='0'>Selecione uma Solicitantes</option>");
            }
            
            for (var i = 0; i < response.lista_usuario.length; i++) {
                $(".chamados-componente #novoChamado #chamados-solicitante").append("<option value='" + response.lista_usuario[i].SA1_USU + "'>" + response.lista_usuario[i].SA1_NOME + "</option>");
            }
        }
    });
}
function listarSetorCadChamado(){
    var dadosajax = {
        'ACAO' : 'LISTAR SETOR'
    };
    pageurl = 'componentes/chamados/control/chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.chamados-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os Setores!",2000);
        },
        success: function(response){ 
            $(".chamados-componente #novoChamado #chamados-setor").empty();

            if(response.lista_setor.length > 0){
                $(".chamados-componente #novoChamado #chamados-setor").append("<option value='0'>Selecione um Setor</option>");
            }
            
            for (var i = 0; i < response.lista_setor.length; i++) {
                $(".chamados-componente #novoChamado #chamados-setor").append("<option value='" + response.lista_setor[i].STO_COD + "'>" + response.lista_setor[i].STO_NOME + "</option>");
            }
        }
    });
}
function listarTipoSolicitacaoCadChamado(){
    var dadosajax = {
        'ACAO' : 'LISTAR TIPO SOLICITACAO'
    };
    pageurl = 'componentes/chamados/control/chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.chamados-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os Tipos de Solicitação!",2000);
        },
        success: function(response){ 
            $(".chamados-componente #novoChamado #chamados-tipo-solicitacao").empty();

            if(response.lista_tsolicitacao.length > 0){
                $(".chamados-componente #novoChamado #chamados-tipo-solicitacao").append("<option value='0'>Selecione um Tipo de Solicitação</option>");
            }
            
            for (var i = 0; i < response.lista_tsolicitacao.length; i++) {
                $(".chamados-componente #novoChamado #chamados-tipo-solicitacao").append("<option value='" + response.lista_tsolicitacao[i].TSO_COD + "'>" + response.lista_tsolicitacao[i].TSO_NOME + "</option>");
            }
        }
    });
}
function listarPrioridadeChamado(){
    var dadosajax = {
        'ACAO' : 'LISTAR PRIORIDADE'
    };
    pageurl = 'componentes/chamados/control/chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.chamados-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista as Prioridade!",2000);
        },
        success: function(response){ 
            $(".chamados-componente #novoChamado #chamados-prioridade").empty();
            $(".chamados-componente #editarPrioridade #chamados-prioridade").empty();
            $(".chamados-componente #editarPrioridadeAll #chamados-prioridade").empty();

            if(response.lista_prioridade.length > 0){
                $(".chamados-componente #novoChamado #chamados-prioridade").append("<option value='0'>Selecione uma Prioridade</option>");
                $(".chamados-componente #editarPrioridade #chamados-prioridade").append("<option value='0'>Selecione uma Prioridade</option>");
                $(".chamados-componente #editarPrioridadeAll #chamados-prioridade").append("<option value='0'>Selecione uma Prioridade</option>");
            }
            
            for (var i = 0; i < response.lista_prioridade.length; i++) {
                $(".chamados-componente #novoChamado #chamados-prioridade").append("<option value='" + response.lista_prioridade[i].PRI_COD + "'>" + response.lista_prioridade[i].PRI_NOME + "</option>");
                $(".chamados-componente #editarPrioridade #chamados-prioridade").append("<option value='" + response.lista_prioridade[i].PRI_COD + "'>" + response.lista_prioridade[i].PRI_NOME + "</option>");
                $(".chamados-componente #editarPrioridadeAll #chamados-prioridade").append("<option value='" + response.lista_prioridade[i].PRI_COD + "'>" + response.lista_prioridade[i].PRI_NOME + "</option>");
            }
        }
    });
}
function listarAtendentesChamado(){
    var dadosajax = {
        'ACAO' : 'LISTAR ATENDENTES'
    };
    pageurl = 'componentes/chamados/control/chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.chamados-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os Atendentes!",2000);
        },
        success: function(response){ 
            $(".chamados-componente #editarAtendenteAll #chamados-atendente").empty();
            $(".chamados-componente #editarAtendente #chamados-atendente").empty();

            if(response.lista_atendentes.length > 0){
                $(".chamados-componente #editarAtendenteAll #chamados-atendente").append("<option value='0'>Selecione um Atendente</option>");
            	$(".chamados-componente #editarAtendente #chamados-atendente").append("<option value='0'>Selecione um Atendente</option>");
            }
            
            for (var i = 0; i < response.lista_atendentes.length; i++) {
                $(".chamados-componente #editarAtendenteAll #chamados-atendente").append("<option value='" + response.lista_atendentes[i].SA1_USU + "'>" + response.lista_atendentes[i].SA1_NOME + "</option>");
            	$(".chamados-componente #editarAtendente #chamados-atendente").append("<option value='" + response.lista_atendentes[i].SA1_USU + "'>" + response.lista_atendentes[i].SA1_NOME + "</option>");
           	}
        }
    });
}
function listarRespostasChamado(CHA_COD){
    var dadosajax = {
        'ACAO' : 'LISTAR RESPOSTAS',
        'CHA_COD' : CHA_COD,
        'COD_ULTIMO_CMS' : ultima_mensagem_resposta_chamados
    };
    pageurl = 'componentes/chamados/control/chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao lista as respostas!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                var i;
                var lista_anexos = '';
                for (i = 0; i < response.lista_respostas.length; i++) {

                    lista_anexos = '';
                    for (o = 0; o < response.lista_respostas[i].CMS_ANEXOS.length; o++) {
                        lista_anexos +=  '<li class="suave arquivo" data-extensao="' + response.lista_respostas[i].CMS_ANEXOS[o].CMA_EXTENSAO + '"><a href="../chamados_anexos/' + response.lista_respostas[i].CMS_ANEXOS[o].CMA_ANEXO + '"' +  
                            ' download="' + response.lista_respostas[i].CMS_ANEXOS[o].CMA_ANEXO + '"><i class="fa fa-file-download click suave"></i></a></li>';
                    }

                    if(response.lista_respostas[i].CMS_TIPOUSU == "ATN"){
                        $('.chamados-componente .respostas-mensagens').append('<li class="atendente" id="rolar_' + response.lista_respostas[i].CMS_COD + '">'+
                            '<h6 class="mini-title upper white-text"><span class="truncate-chamados">' + response.lista_respostas[i].SA1_NOME + '</span><div class="right">' + response.lista_respostas[i].CMS_DTEMISSAO + '</div></h6>'+
                            '<p class="white-text">' + response.lista_respostas[i].CMS_DESC + '</p>'+
                            '<ul class="anexos nm">'+
                                lista_anexos+
                            '</ul>'+
                            '<span>Horas usadas: ' + response.lista_respostas[i].CMS_HRGASTA + '</span>'+
                        '</li>');
                    }else{
                        $('.chamados-componente .respostas-mensagens').append('<li id="rolar_' + response.lista_respostas[i].CMS_COD + '">'+
                            '<h6 class="mini-title upper"><span class="truncate-chamados" style="color: rgba(0, 0, 0, 0.87) !important;">' + response.lista_respostas[i].SA1_NOME + '</span><div class="right">' + response.lista_respostas[i].CMS_DTEMISSAO + '</div></h6>'+
                            '<p>' + response.lista_respostas[i].CMS_DESC + '</p>'+
                            '<ul class="anexos nm">'+
                                lista_anexos+
                            '</ul>'+
                        '</li>');
                    }
                }
                if(response.lista_respostas.length > 0){
                    ultima_mensagem_resposta_chamados = response.lista_respostas[response.lista_respostas.length - 1].CMS_COD;
                    var x = document.getElementById( 'rolar_'+response.lista_respostas[response.lista_respostas.length - 1].CMS_COD );
                    x.scrollIntoView();
                }
                if(teste_buscar_resposta_chamado == 0) {
                    teste_buscar_resposta_chamado = 1;
                    buscar_resposta_chamado = setInterval(function(){ listarRespostasChamado($(".chamados-componente #chamado_resposta .resposta-chamados-cod").val());}, 30000);
                }
            }
        }
    });
}
var duploClickEditAtendChamados = 0;
function editarAtendenteChamados(){
    if(duploClickEditAtendChamados == 0){
        duploClickEditAtendChamados = 1;

        var formData = {
        	'ACAO' : "UPDATE ATENDENTE",
        	'CHA_COD' : $(".chamados-componente #editarAtendente #chamados-cod").val(),
        	'USU_COD' : $(".chamados-componente #editarAtendente #chamados-atendente").val()
        };
        var pageurl = 'componentes/chamados/control/chamadosUpdate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao Adicionar Atendente!",2000);
                duploClickEditAtendChamados = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    criaAlerta(0,response.mensagem,4000);
                    listarChamadosChamados();
                    listarChamadoQuantidade();
    				$(".chamados-componente .gaveta, .chamados-componente .gaveta .content").removeClass("active");
                }else{
                    $('.chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickEditAtendChamados = 0;
            }
        });
    }
}
var duploClickEditAtendAllChamados = 0;
function editarAtendenteAllChamados(){
    if(duploClickEditAtendAllChamados == 0){
        duploClickEditAtendAllChamados = 1;
        var cod_chamados = [];
        $(".chamados-componente .lista-body .check").each(function () {
            if($(this).hasClass("active")){
                cod_chamados.push($(this).attr("data-cod-chamado"));
            }
        });

        var formData = {
        	'ACAO' : "UPDATE ATENDENTE ALL",
        	'CHA_COD' : cod_chamados,
        	'USU_COD' : $(".chamados-componente #editarAtendenteAll #chamados-atendente").val()
        };
        var pageurl = 'componentes/chamados/control/chamadosUpdate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao Adicionar Atendente!",2000);
                duploClickEditAtendAllChamados = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    criaAlerta(0,response.mensagem,4000);
                    listarChamadosChamados();
                    listarChamadoQuantidade();
    				$(".chamados-componente .gaveta, .chamados-componente .gaveta .content").removeClass("active");
                }else{
                    $('.chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickEditAtendAllChamados = 0;
            }
        });
    }
}
var duploClickEditAtendChamados = 0;
function editarPrioridadeChamados(){
    if(duploClickEditAtendChamados == 0){
        duploClickEditAtendChamados = 1;

        var formData = {
            'ACAO' : "UPDATE PRIORIDADE",
            'CHA_COD' : $(".chamados-componente #editarPrioridade #chamados-cod").val(),
            'PRI_COD' : $(".chamados-componente #editarPrioridade #chamados-prioridade").val()
        };
        var pageurl = 'componentes/chamados/control/chamadosUpdate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao Adicionar Prioridade!",2000);
                duploClickEditAtendChamados = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    criaAlerta(0,response.mensagem,4000);
                    listarChamadosChamados();
                    listarChamadoQuantidade();
                    $(".chamados-componente .gaveta, .chamados-componente .gaveta .content").removeClass("active");
                }else{
                    $('.chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickEditAtendChamados = 0;
            }
        });
    }
}
var duploClickEditAtendAllChamados = 0;
function editarPrioridadeAllChamados(){
    if(duploClickEditAtendAllChamados == 0){
        duploClickEditAtendAllChamados = 1;
        var cod_chamados = [];
        $(".chamados-componente .lista-body .check").each(function () {
            if($(this).hasClass("active")){
                cod_chamados.push($(this).attr("data-cod-chamado"));
            }
        });

        var formData = {
            'ACAO' : "UPDATE PRIORIDADE ALL",
            'CHA_COD' : cod_chamados,
            'PRI_COD' : $(".chamados-componente #editarPrioridadeAll #chamados-prioridade").val()
        };
        var pageurl = 'componentes/chamados/control/chamadosUpdate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao Adicionar Prioridade!",2000);
                duploClickEditAtendAllChamados = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    criaAlerta(0,response.mensagem,4000);
                    listarChamadosChamados();
                    listarChamadoQuantidade();
                    $(".chamados-componente .gaveta, .chamados-componente .gaveta .content").removeClass("active");
                }else{
                    $('.chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickEditAtendAllChamados = 0;
            }
        });
    }
}
var duploClickCadChamados = 0;
function criarChamados(){
    if(duploClickCadChamados == 0){
        duploClickCadChamados = 1;

        var form = document.getElementById("novoChamado");
        var formData = new FormData(form);
        formData.append('ACAO', "CREATE");
        var pageurl = 'componentes/chamados/control/chamadosCreate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao criar Chamado!",2000);
                duploClickCadChamados = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".chamados-componente #gaveta, .chamados-componente #gaveta form").removeClass("active");
                    criaAlerta(0,response.mensagem,6000);
                    $('.chamados-componente #novoChamado').each (function(){
                        this.reset();
                    });
                    listarChamadosChamados();
                    listarChamadoQuantidade();
                }else{
                    $('.chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickCadChamados = 0;
            }
        });
    }
}
var duploClickCadChamadosResp = 0;
function responderChamados(){
    if($("#chamado_resposta .resposta-mensagem").val() != ""){
        if(duploClickCadChamadosResp == 0){
            duploClickCadChamadosResp = 1;

            var form = document.getElementById("chamado_resposta");
            var formData = new FormData(form);
            formData.append('ACAO', "RESPONDER");
            var pageurl = 'componentes/chamados/control/chamadosResponder.php';
            $.ajax({
                url: pageurl,
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    $('.chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Falha ao criar Chamado!",2000);
                    duploClickCadChamadosResp = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        listarRespostasChamado($(".chamados-componente #chamado_resposta .resposta-chamados-cod").val());
                        // criaAlerta(0,response.mensagem,6000);
                        $('.chamados-componente #chamado_resposta').each (function(){
                            this.reset();
                        });
                    }else{
                        criaAlerta(0,response.mensagem,4000);
                    }
                    duploClickCadChamadosResp = 0;
                }
            });
        }
    }
}
var duploClickCadChamadosRespFinal = 0;
function respondeFinalizarChamados(){
    if($("#chamado_resposta .resposta-mensagem").val() != ""){
        criaAlerta(1,"Deseja realmente Solicitar a Finalização deste Chamado?",2000);
        $("#alerta .confirmar").click(function(){
            if(duploClickCadChamadosRespFinal == 0){
                duploClickCadChamadosRespFinal = 1;

                var form = document.getElementById("chamado_resposta");
                var formData = new FormData(form);
                formData.append('ACAO', "RESPONDER FINALIZAR");
                var pageurl = 'componentes/chamados/control/chamadosResponder.php';
                $.ajax({
                    url: pageurl,
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    cache: false,
                    dataType: 'json',
                    error: function(){
                        $('.chamados-componente .lista-body').removeClass("active");
                        criaAlerta(0,"Falha ao criar Chamado!",2000);
                        duploClickCadChamadosRespFinal = 0;
                    },
                    success: function(response){ 
                        if(response.status == 0){
                            criaAlerta(0,response.mensagem,4000);
                            listarRespostasChamado($(".chamados-componente #chamado_resposta .resposta-chamados-cod").val());
                            $('.chamados-componente #chamado_resposta .chamado-responder-finalizar-btn').removeClass("hide");
                            $('.chamados-componente #chamado_resposta .chamado-responder-finalizar-btn').addClass("hide");
                            // criaAlerta(0,response.mensagem,6000);
                            $('.chamados-componente #chamado_resposta').each (function(){
                                this.reset();
                            });
                        }else{
                            criaAlerta(0,response.mensagem,4000);
                        }
                        duploClickCadChamadosRespFinal = 0;
                    }
                });
            }
        });
    }
}
var duploClickPagProxUsuario = 0;
function listarChamadosPagProx(){
    if(duploClickPagProxUsuario == 0){
        duploClickPagProxUsuario = 1;
        $(".chamados-componente .lista-head .check").removeClass("active");
        $(".chamados-componente .lista-body .check").removeClass("active");
        $(".chamados-componente .box-actions-extra").removeClass("active");
        var status = $(".chamados-componente .box-abas .aba.active").attr("data-status");

        var dadosajax = {
            'ACAO' : 'PROXIMO PAGINACAO CHAMADOS',
            'CHA_COD' : ultimo_cod_chamados,
        	'status' : status
        };
        pageurl = 'componentes/chamados/control/chamadosListar.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                duploClickPagProxUsuario = 0;
                $('.chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista os Chamados!",2000);
            },
            success: function(response){ 
                if(response.status == 0){
                    if(response.lista_chamados.length > 0){
                        $('.chamados-componente .lista-body').empty();
                    }
                }

                if(response.status == 0){
                    var i = 0;
                    if(response.A_USU_TIPO == "ADM" || response.A_USU_TIPO == "COR" || response.A_USU_TIPO == "DEV"){
                        $(".chamados-componente .lista-head .check-lista-head").removeClass("hide");
                    }

                    for (i = 0; i < response.lista_chamados.length; i++) {
                        lista = "";
                        if(i == 0){primeiro_cod_chamados = response.lista_chamados[i].CHA_COD;}
                        if((i + 1) == response.lista_chamados.length){ultimo_cod_chamados = response.lista_chamados[i].CHA_COD;}

                        if(response.A_USU_TIPO == "ADM" || response.A_USU_TIPO == "COR" || response.A_USU_TIPO == "DEV"){
                            lista += '<li>' +
                                '<h6><div class="check" data-cod-chamado="' + response.lista_chamados[i].CHA_COD + '"><i class="fa fa-check"></i></div></h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                                '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                                '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NEMP + '</b></h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_NSTO + '</h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_NPRI + '</h6>' +
                                '<h6>';

                            if(status == 1 || status == 2 || status == 3){
                                lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>' +
                                    '<i class="action fa fa-user-plus editar-atendente" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>' +
                                    '<i class="action fa fa-traffic-light editar-prioridade" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-prioridade="' + response.lista_chamados[i].CHA_PRI + '"></i>';
                            }else {
                                lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>';
                            }

                            lista += '</h6></li>';
                            $('.chamados-componente .lista-body').append(lista);
                        }else if(response.A_USU_TIPO == "FUN"){
                            lista += '<li>' +
                                '<h6 class="hide"><div class="check" data-cod-chamado="' + response.lista_chamados[i].CHA_COD + '"><i class="fa fa-check"></i></div></h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                                '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                                '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NEMP + '</b></h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_NSTO + '</h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_NPRI + '</h6>' +
                                '<h6>';

                            if(status == 1){
                                lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>' +
                                    '<i class="action fa fa-user-check se-adicionar-atendente" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.A_USU_COD + '"></i>';
                            }else {
                                lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>';
                            }

                            lista += '</h6></li>';
                            $('.chamados-componente .lista-body').append(lista);
                        }
                    }
                    if(i > 0){
                        pagination_chamados++;
                        $(".chamados-componente .box-paginadores i b").text(pagination_chamados);
                    }
                    duploClickPagProxUsuario = 0;
                }else{
                    $('.chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum usuário cadastrado.</h6></li>');
                    duploClickPagProxUsuario = 0;
                }
           	}
            
        });
    }
}
var duploClickPagAnteUsuario = 0;
function listarChamadosPagAnte(){
    if(duploClickPagAnteUsuario == 0){
        duploClickPagAnteUsuario = 1;
        var status = $(".chamados-componente .box-abas .aba.active").attr("data-status");
        var dadosajax = {
            'ACAO' : 'ANTERIOR PAGINACAO CHAMADOS',
            'CHA_COD' : primeiro_cod_chamados,
        	'status' : status
        };
        pageurl = 'componentes/chamados/control/chamadosListar.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista os Chamados!",2000);
                duploClickPagAnteUsuario = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    if(response.lista_chamados.length > 0){
                        $('.chamados-componente .lista-body').empty();
                    }
                }

                if(response.status == 0){
                    var i = 0;if(response.A_USU_TIPO == "ADM" || response.A_USU_TIPO == "COR" || response.A_USU_TIPO == "DEV"){
                        $(".chamados-componente .lista-head .check-lista-head").removeClass("hide");
                    }

                    for (i = 0; i < response.lista_chamados.length; i++) {
                        lista = "";
                        if(i == 0){primeiro_cod_chamados = response.lista_chamados[i].CHA_COD;}
                        if((i + 1) == response.lista_chamados.length){ultimo_cod_chamados = response.lista_chamados[i].CHA_COD;}

                        if(response.A_USU_TIPO == "ADM" || response.A_USU_TIPO == "COR" || response.A_USU_TIPO == "DEV"){
                            lista += '<li>' +
                                '<h6><div class="check" data-cod-chamado="' + response.lista_chamados[i].CHA_COD + '"><i class="fa fa-check"></i></div></h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                                '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                                '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NEMP + '</b></h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_NSTO + '</h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_NPRI + '</h6>' +
                                '<h6>';

                            if(status == 1 || status == 2 || status == 3){
                                lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>' +
                                    '<i class="action fa fa-user-plus editar-atendente" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>' +
                                    '<i class="action fa fa-traffic-light editar-prioridade" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-prioridade="' + response.lista_chamados[i].CHA_PRI + '"></i>';
                            }else {
                                lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>';
                            }

                            lista += '</h6></li>';
                            $('.chamados-componente .lista-body').append(lista);
                        }else if(response.A_USU_TIPO == "FUN"){
                            lista += '<li>' +
                                '<h6 class="hide"><div class="check" data-cod-chamado="' + response.lista_chamados[i].CHA_COD + '"><i class="fa fa-check"></i></div></h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                                '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                                '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NEMP + '</b></h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_NSTO + '</h6>' +
                                '<h6>' + response.lista_chamados[i].CHA_NPRI + '</h6>' +
                                '<h6>';

                            if(status == 1){
                                lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>' +
                                    '<i class="action fa fa-user-check se-adicionar-atendente" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.A_USU_COD + '"></i>';
                            }else {
                                lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>';
                            }

                            lista += '</h6></li>';
                            $('.chamados-componente .lista-body').append(lista);
                        }
                    }
                    if(i > 0){
                        pagination_chamados--;
                        $(".chamados-componente .box-paginadores i b").text(pagination_chamados);
                    }
                    duploClickPagAnteUsuario = 0;
                }else{
                    $('.chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum usuário cadastrado.</h6></li>');
                    duploClickPagAnteUsuario = 0;
                }
            }
        });
    }
}

$(document).on("click", ".chamados-componente .lista-body .check", function(){
    $(this).toggleClass("active");
});

$(document).on("click", ".chamados-componente .lista-head .check", function(){
    $(".chamados-componente .lista-head .check").toggleClass("active");
    if($(".chamados-componente .lista-head .check").hasClass("active")){
        $(".chamados-componente .lista-body .check").addClass("active");
    }else{
        $(".chamados-componente .lista-body .check").removeClass("active");
    }
    $(".chamados-componente .box-actions-extra").toggleClass("active");
});

$(document).on("click", ".chamados-componente .aba", function(){
    $(".chamados-componente .aba").removeClass("active");
    $(this).addClass("active");
    listarChamadosChamados();
    listarChamadoQuantidade();
});

$(document).on("click", ".chamados-componente .novo-chamado", function(){
    $(".chamados-componente #gaveta, .chamados-componente #gaveta #novoChamado").addClass("active");
});

$(document).on("click", ".chamados-componente .aplicar-filtro", function(){
    $(".chamados-componente #gaveta, .chamados-componente #gaveta #aplicarFiltro").addClass("active");
});

var duploClickSeAddAtendChamados = 0;
var chamados_add_atendente_CHA_COD;
var chamados_add_atendente_USU_COD;
$(document).on("click", ".chamados-componente .se-adicionar-atendente", function(){
    chamados_add_atendente_CHA_COD = $(this).attr("data-cod");
    chamados_add_atendente_USU_COD = $(this).attr("data-cod-atendente");

    criaAlerta(1,"Deseja realmente atender este Chamado?",2000);
    $("#alerta .confirmar").click(function(){
        if(duploClickSeAddAtendChamados == 0){
            duploClickSeAddAtendChamados = 1;

            var formData = {
                'ACAO' : "UPDATE ATENDENTE",
                'CHA_COD' : chamados_add_atendente_CHA_COD,
                'USU_COD' : chamados_add_atendente_USU_COD
            };
            var pageurl = 'componentes/chamados/control/chamadosUpdate.php';
            $.ajax({
                url: pageurl,
                data: formData,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    $('.chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Falha ao atender Chamado!",2000);
                    duploClickSeAddAtendChamados = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        response.mensagem = "Adicionado ao chamado como Atendente com sucesso. Código do Chamado: " + chamados_add_atendente_CHA_COD;
                        criaAlerta(0,response.mensagem,4000);
                        listarChamadosChamados();
                        listarChamadoQuantidade();
                        $(".chamados-componente .gaveta, .chamados-componente .gaveta .content").removeClass("active");
                    }else{
                        $('.chamados-componente .lista-body').removeClass("active");
                        criaAlerta(0,response.mensagem,4000);
                    }
                    duploClickSeAddAtendChamados = 0;
                }
            });
        }
    });
});

$(document).on("click", ".chamados-componente .editar-atendente", function(){
	$(".chamados-componente #editarAtendente #chamados-cod").val($(this).attr("data-cod"));
	$(".chamados-componente #editarAtendente #chamados-atendente").val($(this).attr("data-cod-atendente"));
    $(".chamados-componente #editarAtendente, .chamados-componente #editarAtendente .content").addClass("active");
});

$(document).on("click", ".chamados-componente .editar-atendenteall", function(){
	$(".chamados-componente #editarAtendenteAll #chamados-atendente").val($(this).attr("data-cod-atendente"));
    $(".chamados-componente #editarAtendenteAll, .chamados-componente #editarAtendenteAll .content").addClass("active");
});

$(document).on("click", ".chamados-componente .editar-prioridade", function(){
    $(".chamados-componente #editarPrioridade #chamados-cod").val($(this).attr("data-cod"));
    $(".chamados-componente #editarPrioridade #chamados-prioridade").val($(this).attr("data-cod-prioridade"));
    $(".chamados-componente #editarPrioridade, .chamados-componente #editarPrioridade .content").addClass("active");
});

$(document).on("click", ".chamados-componente .editar-prioridadeall", function(){
    $(".chamados-componente #editarPrioridadeAll #chamados-prioridade").val($(this).attr("data-cod-prioridade"));
    $(".chamados-componente #editarPrioridadeAll, .chamados-componente #editarPrioridadeAll .content").addClass("active");
});

$(document).on("click", ".chamados-componente .ver-chamado", function(){
    ultima_mensagem_resposta_chamados = 0;
    $(".chamados-componente #chamado_resposta .resposta-chamados-cod").val($(this).attr("data-cod"));
    $(".chamados-componente .respostas-mensagens").empty();
    var dadosajax = {
        'ACAO' : 'BUSCAR DADOS',
        'CHA_COD' : $(this).attr("data-cod")
    };
    pageurl = 'componentes/chamados/control/chamadosListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.chamados-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista o Chamado!",2000);
            duploClickPagAnteUsuario = 0;
        },
        success: function(response){ 
            if(response.status == 0){
                var i = 0;
                $(".chamados-componente #verChamado #chamado_resposta .resposta-chamados-cod").val(response.lista_chamados.CHA_COD);
                $(".chamados-componente #verChamado .form-content .chamados-assunto").html(response.lista_chamados.CHA_ASSUNTO);
                $(".chamados-componente #verChamado .form-content .chamados-setor").html(response.lista_chamados.CHA_NSTO);
                $(".chamados-componente #verChamado .form-content .chamados-prioridade").html(response.lista_chamados.CHA_NPRI);
                $(".chamados-componente #verChamado .form-content .chamados-empresa").html(response.lista_chamados.CHA_NEMP);
                $(".chamados-componente #verChamado .form-content .chamados-desc").html(response.lista_chamados.CHA_DESC);
                $(".chamados-componente #verChamado .form-content .chamados-datainic").html(response.lista_chamados.CHA_DTEMISSAO);
                $(".chamados-componente #verChamado .form-content .anexos").empty();

                if(response.lista_chamados.CHA_AGFINAL == 0){
                    $('.chamados-componente #chamado_resposta .chamado-responder-finalizar-btn').removeClass("hide");
                }else{
                    $('.chamados-componente #chamado_resposta .chamado-responder-finalizar-btn').removeClass("hide");
                    $('.chamados-componente #chamado_resposta .chamado-responder-finalizar-btn').addClass("hide");
                }

                if(response.lista_chamados.lista_anexos.length > 0){
                    for(i = 0; i < response.lista_chamados.lista_anexos.length; i++){
                       $(".chamados-componente #verChamado .form-content .anexos").append(''+
                        '<li class="suave arquivo" data-extensao="' + response.lista_chamados.lista_anexos[i].CAN_EXTENSAO + '"><a href="../chamados_anexos/' + response.lista_chamados.lista_anexos[i].CAN_ANEXO + '"' +  
                        ' download="' + response.lista_chamados.lista_anexos[i].CAN_ANEXO + '"><i class="fa fa-file-download click suave"></i></a></li>');
                    }
                }

                if(response.A_USU_TIPO == "FUN" || response.A_USU_TIPO == "COR" || response.A_USU_TIPO == "ADM"){
                    if(response.lista_chamados.CHA_STATUS != 1 && response.lista_chamados.CHA_STATUS != 4){
                        if(response.lista_chamados.CHA_ATENDENTE == response.A_USU_COD){
                            $(".chamados-componente #verChamado .respostas").addClass("chamados-responder");
                            $(".chamados-componente #verChamado .responder").removeClass("hide");
                        }else{
                            $(".chamados-componente #verChamado .respostas").removeClass("chamados-responder");
                            $(".chamados-componente #verChamado .responder").removeClass("hide");
                            $(".chamados-componente #verChamado .responder").addClass("hide");
                        }
                    }else{
                        $(".chamados-componente #verChamado .respostas").removeClass("chamados-responder");
                        $(".chamados-componente #verChamado .responder").removeClass("hide");
                        $(".chamados-componente #verChamado .responder").addClass("hide");
                    }
                }
                $(".chamados-componente #verChamado, .chamados-componente #verChamado .content").addClass("active");
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
    listarRespostasChamado($(this).attr("data-cod"));
});

$(document).on("click",".chamados-componente .fechar-gaveta",function(){
    $(".chamados-componente .gaveta, .chamados-componente .gaveta .content").removeClass("active");
    clearInterval(buscar_resposta_chamado);
    teste_buscar_resposta_chamado = 0;
    listarChamadosChamados();
    listarChamadoQuantidade();
});

$(document).on("click",".chamados-componente .gaveta h5 i",function(){
    $(".chamados-componente .gaveta, .chamados-componente .gaveta .content").removeClass("active");
    clearInterval(buscar_resposta_chamado);
    teste_buscar_resposta_chamado = 0;
    listarChamadosChamados();
    listarChamadoQuantidade();
});

$(document).on("click",".chamados-componente .fechar-gaveta",function(){
    $(".chamados-componente #gaveta, .chamados-componente #gaveta form").removeClass("active");
});

$(document).on("click",".chamados-componente #gaveta h5 i",function(){
    $(".chamados-componente #gaveta, .chamados-componente #gaveta form").removeClass("active");
});

$(document).on("change",".chamados-componente #novoChamado #chamados-empresa",function(){
    listarSolicitanteCadChamado($(this).val());
});

$(document).on("submit",".chamados-componente #novoChamado",function(e){
	e.preventDefault();
    criarChamados();
});

$(document).on("submit",".chamados-componente #verChamado #chamado_resposta",function(e){
    e.preventDefault();
});

$(document).on("click",".chamados-componente #editarAtendente .edit-atendente",function(e){
	e.preventDefault();
    editarAtendenteChamados();
});

$(document).on("click",".chamados-componente #editarAtendenteAll .edit-atendente",function(e){
	e.preventDefault();
    editarAtendenteAllChamados();
});

$(document).on("click",".chamados-componente #editarPrioridade .edit-prioridade",function(e){
    e.preventDefault();
    editarPrioridadeChamados();
});

$(document).on("click",".chamados-componente #editarPrioridadeAll .edit-prioridade",function(e){
    e.preventDefault();
    editarPrioridadeAllChamados();
});

$(document).on("click",".chamados-componente .box-paginadores .pag-prox",function(){
    listarChamadosPagProx();
});

$(document).on("click",".chamados-componente .box-paginadores .pag-ante",function(){
    listarChamadosPagAnte();
});
