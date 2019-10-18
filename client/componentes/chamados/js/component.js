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

                for (i = 0; i < response.lista_chamados.length; i++) {
                    lista = "";
                    if(i == 0){primeiro_cod_chamados = response.lista_chamados[i].CHA_COD;}
                    if((i + 1) == response.lista_chamados.length){ultimo_cod_chamados = response.lista_chamados[i].CHA_COD;}

                    lista += '<li>' +
                        '<h6 class="hide"><div class="check" data-cod-chamado="' + response.lista_chamados[i].CHA_COD + '"><i class="fa fa-check"></i></div></h6>' +
                        '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                        '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                        '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NUSU + '</b></h6>' +
                        '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                        '<h6>' + response.lista_chamados[i].CHA_NSTO + '</h6>' +
                        '<h6>';

                    // if(status == 1){
                        lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>';
                    // }

                    lista += '</h6></li>';
                    $('.chamados-componente .lista-body').append(lista);
                    
                }
                if(i == 0){
                    $('.chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum Chamado.</h6></li>');
                }
                $('.chamados-componente .lista-body').removeClass("active");
            }else{
                $('.chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                $('.chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum Chamado.</h6></li>');
            }
            $('.chamados-componente .lista-body').removeClass("active");
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
                $(".chamados-componente #novoChamado #chamados-setor").append("<option value='0'>Selecione uma Setor</option>");
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
                var class_atendente = '';
                var i;
                var lista_anexos = '';
                for (i = 0; i < response.lista_respostas.length; i++) {
                    lista_anexos = '';
                    for (o = 0; o < response.lista_respostas[i].CMS_ANEXOS.length; o++) {
                        lista_anexos +=  '<li class="suave arquivo" data-extensao="' + response.lista_respostas[i].CMS_ANEXOS[o].CMA_EXTENSAO + '"><a href="../chamados_anexos/' + response.lista_respostas[i].CMS_ANEXOS[o].CMA_ANEXO + '"' +  
                            ' download="' + response.lista_respostas[i].CMS_ANEXOS[o].CMA_ANEXO + '"><i class="fa fa-file-download click suave"></i></a></li>';
                    }

                    if(response.lista_respostas[i].CMS_TIPOUSU == "CLI"){
                        $('.chamados-componente .respostas-mensagens').append('<li class="atendente" id="rolar_' + response.lista_respostas[i].CMS_COD + '">'+
                            '<h6 class="mini-title upper white-text"><span class="truncate-chamados">' + response.lista_respostas[i].SA1_NOME + '</span><div class="right">' + response.lista_respostas[i].CMS_DTEMISSAO + '</div></h6>'+
                            '<p class="white-text">' + response.lista_respostas[i].CMS_DESC + '</p>'+
                            '<ul class="anexos nm">'+
                                lista_anexos+
                            '</ul>'+
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

                    for (i = 0; i < response.lista_chamados.length; i++) {
                        lista = "";
                        if(i == 0){primeiro_cod_chamados = response.lista_chamados[i].CHA_COD;}
                        if((i + 1) == response.lista_chamados.length){ultimo_cod_chamados = response.lista_chamados[i].CHA_COD;}

                        lista += '<li>' +
                            '<h6 class="hide"><div class="check" data-cod-chamado="' + response.lista_chamados[i].CHA_COD + '"><i class="fa fa-check"></i></div></h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NUSU + '</b></h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_NSTO + '</h6>' +
                            '<h6>';

                            if(status == 1){
                                lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>';
                            }


                        lista += '</h6></li>';
                        $('.chamados-componente .lista-body').append(lista);
                        
                    }
                    if(i > 0){
                        pagination_chamados++;
                        $(".chamados-componente .box-paginadores i b").text(pagination_chamados);
                    }
                    duploClickPagProxUsuario = 0;
                }else{
                    $('.chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum Chamado.</h6></li>');
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
                    var i = 0;

                    for (i = 0; i < response.lista_chamados.length; i++) {
                        lista = "";
                        if(i == 0){primeiro_cod_chamados = response.lista_chamados[i].CHA_COD;}
                        if((i + 1) == response.lista_chamados.length){ultimo_cod_chamados = response.lista_chamados[i].CHA_COD;}

                        lista += '<li>' +
                            '<h6 class="hide"><div class="check" data-cod-chamado="' + response.lista_chamados[i].CHA_COD + '"><i class="fa fa-check"></i></div></h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_COD + '</h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_ASSUNTO + '</b></h6>' +
                            '<h6><b class="truncate">' + response.lista_chamados[i].CHA_NUSU + '</b></h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_DTEMISSAO + '</h6>' +
                            '<h6>' + response.lista_chamados[i].CHA_NSTO + '</h6>' +
                            '<h6>';

                            if(status == 1){
                                lista +=  '<i class="action fa fa-eye ver-chamado" data-cod="' + response.lista_chamados[i].CHA_COD + '" data-cod-atendente="' + response.lista_chamados[i].CHA_ATENDENTE + '"></i>';
                            }

                        lista += '</h6></li>';
                        $('.chamados-componente .lista-body').append(lista);
                        
                    }
                    if(i > 0){
                        pagination_chamados--;
                        $(".chamados-componente .box-paginadores i b").text(pagination_chamados);
                    }
                    duploClickPagAnteUsuario = 0;
                }else{
                    $('.chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.chamados-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum Chamado.</h6></li>');
                    duploClickPagAnteUsuario = 0;
                }
            }
        });
    }
}
var duploClickCadChamadosFinalizar = 0;
function finalizarChamados(){
    criaAlerta(1,"Deseja realmente Finalizar este Chamado?",2000);
    $("#alerta .confirmar").click(function(){
        if(duploClickCadChamadosFinalizar == 0){
            duploClickCadChamadosFinalizar = 1;

            var formData = {
                'ACAO' : "FINALIZAR",
                'CHA_COD' : $(".chamados-componente #chamado_resposta .resposta-chamados-cod").val()
            };
            var pageurl = 'componentes/chamados/control/chamadosResponder.php';
            $.ajax({
                url: pageurl,
                data: formData,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    $('.chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Falha ao criar Chamado!",2000);
                    duploClickCadChamadosFinalizar = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        criaAlerta(0,response.mensagem,6000);
                        
                        // $(".chamados-componente .gaveta, .chamados-componente .gaveta .content").removeClass("active");
                        // $(".chamados-componente .pesquisa-chamado").addClass("hide");
                        $(".chamados-componente .pesquisa-chamado").addClass("hide");
                        $(".chamados-componente .pesquisa-avaliacao-chamado").removeClass("hide");
                        $(".chamados-componente .pesquisa-avaliacao-chamado .avaliacao-chamado-opiniao").removeClass("hide");
                        $(".chamados-componente .pesquisa-avaliacao-chamado .avaliacao-chamado-opiniao").addClass("hide");
                        $(".chamados-componente .pesquisa-avaliacao-chamado .chamados-avaliacaoch").removeClass("hide");
                        $(".chamados-componente .pesquisa-avaliacao-chamado .chamados-avaliacaoch").addClass("hide");
                        $(".chamados-componente .pesquisa-avaliacao-chamado i").removeClass("active");
                        $(".chamados-componente .pesquisa-avaliacao-chamado").height(110);

                        clearInterval(buscar_resposta_chamado);
                        teste_buscar_resposta_chamado = 0;
                        listarChamadosChamados();
                        listarChamadoQuantidade();
                    }else{
                        criaAlerta(0,response.mensagem,4000);
                    }
                    duploClickCadChamadosFinalizar = 0;
                }
            });
        }
    });
}
var duploClickCadChamadosRecFinalizar = 0;
function RecusarfinalizacaoChamados(){
    criaAlerta(1,"Deseja realmente recusar esta Finalização de Chamado?",2000);
    $("#alerta .confirmar").click(function(){
        if(duploClickCadChamadosRecFinalizar == 0){
            duploClickCadChamadosRecFinalizar = 1;

            var formData = {
                'ACAO' : "RECUSAR FINALIZACAO",
                'CHA_COD' : $(".chamados-componente #chamado_resposta .resposta-chamados-cod").val()
            };
            var pageurl = 'componentes/chamados/control/chamadosResponder.php';
            $.ajax({
                url: pageurl,
                data: formData,
                type: 'POST',
                cache: false,
                dataType: 'json',
                error: function(){
                    $('.chamados-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Falha ao recusar a Finalização de Chamado!",2000);
                    duploClickCadChamadosRecFinalizar = 0;
                },
                success: function(response){ 
                    if(response.status == 0){
                        criaAlerta(0,response.mensagem,6000);
                        
                        $(".chamados-componente .gaveta, .chamados-componente .gaveta .content").removeClass("active");
                        clearInterval(buscar_resposta_chamado);
                        teste_buscar_resposta_chamado = 0;
                        listarChamadosChamados();
                        listarChamadoQuantidade();
                    }else{
                        criaAlerta(0,response.mensagem,4000);
                    }
                    duploClickCadChamadosRecFinalizar = 0;
                }
            });
        }
    });
}
var duploClickCadChamadosAvaliacao = 0;
function RealizarAvaliacao(){
    if(duploClickCadChamadosAvaliacao == 0){
        duploClickCadChamadosAvaliacao = 1;

        var formData = {
            'ACAO' : "REALIZAR AVALIACAO",
            'CHA_COD' : $(".chamados-componente #chamado_resposta .resposta-chamados-cod").val(),
            'CHA_OPINIAO' : $(".chamados-componente .pesquisa-avaliacao-chamado .avaliacao-chamado-opiniao").val(),
            'CHA_AVALIACAO' : $(".chamados-componente .pesquisa-avaliacao-chamado i.active").attr("data-id")
        };
        var pageurl = 'componentes/chamados/control/chamadosResponder.php';
        $.ajax({
            url: pageurl,
            data: formData,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.chamados-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao Avaliar Chamado!",2000);
                duploClickCadChamadosAvaliacao = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    criaAlerta(0,response.mensagem,6000);
                    
                    $(".chamados-componente .gaveta, .chamados-componente .gaveta .content").removeClass("active");
                    clearInterval(buscar_resposta_chamado);
                    teste_buscar_resposta_chamado = 0;
                    listarChamadosChamados();
                    listarChamadoQuantidade();
                }else{
                    criaAlerta(0,response.mensagem,4000);
                }
                duploClickCadChamadosAvaliacao = 0;
            }
        });
    }
}

$(document).on("click", ".chamados-componente .pesquisa-avaliacao-chamado i", function(){
    $(".chamados-componente .pesquisa-avaliacao-chamado i").removeClass("active");
    $(this).addClass("active");
    $(".chamados-componente .pesquisa-avaliacao-chamado").height(300);
    setTimeout(() => {
        $(".chamados-componente .pesquisa-avaliacao-chamado textarea, .chamados-componente .pesquisa-avaliacao-chamado button").removeClass("hide");
    }, 500);
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
                $(".chamados-componente #verChamado .form-content .chamados-empresa").html(response.lista_chamados.CHA_NEMP);
                $(".chamados-componente #verChamado .form-content .chamados-desc").html(response.lista_chamados.CHA_DESC);
                $(".chamados-componente #verChamado .form-content .chamados-datainic").html(response.lista_chamados.CHA_DTEMISSAO);
                $(".chamados-componente #verChamado .form-content .anexos").empty();
                if(response.lista_chamados.lista_anexos.length > 0){
                    for(i = 0; i < response.lista_chamados.lista_anexos.length; i++){
                       $(".chamados-componente #verChamado .form-content .anexos").append(''+
                        '<li class="suave arquivo" data-extensao="' + response.lista_chamados.lista_anexos[i].CAN_EXTENSAO + '"><a href="../chamados_anexos/' + response.lista_chamados.lista_anexos[i].CAN_ANEXO + '"' +  
                        ' download="' + response.lista_chamados.lista_anexos[i].CAN_ANEXO + '"><i class="fa fa-file-download click suave"></i></a></li>');
                    }
                }

                if (response.lista_chamados.CHA_AGFINAL == 1) {
                    if(response.lista_chamados.CHA_STATUS != 4){
                        $(".chamados-componente #verChamado .pesquisa-chamado").removeClass("hide");
                        $(".chamados-componente #verChamado .respostas").addClass("chamados-responder");
                        $(".chamados-componente #verChamado .responder").removeClass("hide");
                        $(".chamados-componente .pesquisa-avaliacao-chamado").removeClass("hide");
                        $(".chamados-componente .pesquisa-avaliacao-chamado").addClass("hide");
                        $(".chamados-componente .pesquisa-avaliacao-chamado .avaliacao-chamado-opiniao").removeClass("hide");
                        $(".chamados-componente .pesquisa-avaliacao-chamado .avaliacao-chamado-opiniao").addClass("hide");
                        $(".chamados-componente .pesquisa-avaliacao-chamado .chamados-avaliacaoch").removeClass("hide");
                        $(".chamados-componente .pesquisa-avaliacao-chamado .chamados-avaliacaoch").addClass("hide");
                        $(".chamados-componente .pesquisa-avaliacao-chamado i").removeClass("active");
                        $(".chamados-componente .pesquisa-avaliacao-chamado").height(110);
                    }else{
                        $(".chamados-componente #verChamado .pesquisa-chamado").removeClass("hide");
                        $(".chamados-componente #verChamado .pesquisa-chamado").addClass("hide");
                        $(".chamados-componente #verChamado .respostas").removeClass("chamados-responder");
                        $(".chamados-componente #verChamado .responder").removeClass("hide");
                        $(".chamados-componente #verChamado .responder").addClass("hide");
                        if(response.lista_chamados.CHA_AVALIACAO == null){
                            $(".chamados-componente .pesquisa-avaliacao-chamado").removeClass("hide");
                            $(".chamados-componente .pesquisa-avaliacao-chamado .avaliacao-chamado-opiniao").removeClass("hide");
                            $(".chamados-componente .pesquisa-avaliacao-chamado .avaliacao-chamado-opiniao").addClass("hide");
                            $(".chamados-componente .pesquisa-avaliacao-chamado .chamados-avaliacaoch").removeClass("hide");
                            $(".chamados-componente .pesquisa-avaliacao-chamado .chamados-avaliacaoch").addClass("hide");
                            $(".chamados-componente .pesquisa-avaliacao-chamado i").removeClass("active");
                            $(".chamados-componente .pesquisa-avaliacao-chamado").height(110);
                        }else{
                            $(".chamados-componente .pesquisa-avaliacao-chamado").removeClass("hide");
                            $(".chamados-componente .pesquisa-avaliacao-chamado").addClass("hide");
                            $(".chamados-componente .pesquisa-avaliacao-chamado .avaliacao-chamado-opiniao").removeClass("hide");
                            $(".chamados-componente .pesquisa-avaliacao-chamado .avaliacao-chamado-opiniao").addClass("hide");
                            $(".chamados-componente .pesquisa-avaliacao-chamado .chamados-avaliacaoch").removeClass("hide");
                            $(".chamados-componente .pesquisa-avaliacao-chamado .chamados-avaliacaoch").addClass("hide");
                            $(".chamados-componente .pesquisa-avaliacao-chamado i").removeClass("active");
                            $(".chamados-componente .pesquisa-avaliacao-chamado").height(110);
                        }
                    }
                }else{
                    $(".chamados-componente #verChamado .pesquisa-chamado").removeClass("hide");
                    $(".chamados-componente #verChamado .pesquisa-chamado").addClass("hide");
                    $(".chamados-componente .pesquisa-avaliacao-chamado").removeClass("hide");
                    $(".chamados-componente .pesquisa-avaliacao-chamado").addClass("hide");
                    $(".chamados-componente .pesquisa-avaliacao-chamado .avaliacao-chamado-opiniao").removeClass("hide");
                    $(".chamados-componente .pesquisa-avaliacao-chamado .avaliacao-chamado-opiniao").addClass("hide");
                    $(".chamados-componente .pesquisa-avaliacao-chamado .chamados-avaliacaoch").removeClass("hide");
                    $(".chamados-componente .pesquisa-avaliacao-chamado .chamados-avaliacaoch").addClass("hide");
                    $(".chamados-componente .pesquisa-avaliacao-chamado i").removeClass("active");
                    $(".chamados-componente .pesquisa-avaliacao-chamado").height(110);
                    if(response.lista_chamados.CHA_STATUS != 4){
                        $(".chamados-componente #verChamado .respostas").addClass("chamados-responder");
                        $(".chamados-componente #verChamado .responder").removeClass("hide");
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
});

$(document).on("click",".chamados-componente .gaveta h5 i",function(){
    $(".chamados-componente .gaveta, .chamados-componente .gaveta .content").removeClass("active");
    clearInterval(buscar_resposta_chamado);
    teste_buscar_resposta_chamado = 0;
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
    responderChamados();
});

$(document).on("click",".chamados-componente .box-paginadores .pag-prox",function(){
    listarChamadosPagProx();
});

$(document).on("click",".chamados-componente .box-paginadores .pag-ante",function(){
    listarChamadosPagAnte();
});

$(document).on("click",".chamados-componente .pesquisa-chamado .chamados-finalizarch",function(){
    finalizarChamados();
});

$(document).on("click",".chamados-componente .pesquisa-chamado .chamados-recusarfinalizarch",function(){
    RecusarfinalizacaoChamados();
});

$(document).on("click",".chamados-componente .pesquisa-avaliacao-chamado .chamados-avaliacaoch",function(){
    RealizarAvaliacao();
});