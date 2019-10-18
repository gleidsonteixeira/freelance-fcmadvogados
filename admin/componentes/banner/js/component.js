var pagination_banner = 1;
var primeiro_cod_banner = 0;
var ultimo_cod_banner = 0;

function listarBanner(){
    var dadosajax = {
        'ACAO' : 'LISTAR BANNER'
    };
    pageurl = 'componentes/banner/control/bannerListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.banner-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os Banners!",2000);
        },
        success: function(response){ 
            $('.banner-componente .lista-body').empty();

            if(response.status == 0){
                var i = 0;
                pagination_banner = 1;
                $(".banner-componente .box-paginadores i b").text(pagination_banner);
                for (i = 0; i < response.lista_banner.length; i++) {
                    if(i == 0){primeiro_cod_banner = response.lista_banner[i].BAN_ID;}
                    if((i + 1) == response.lista_banner.length){ultimo_cod_banner = response.lista_banner[i].BAN_ID;}
                    if(response.lista_banner[i].BAN_VISIBILIT == 1){
                        var visibilidade = 'Sim';
                    }else{
                        var visibilidade = 'Não';
                    }
                    $('.banner-componente .lista-body').removeClass("active");
                    $('.banner-componente .lista-body').append('<li>' +
                        '<h6><div class="check"><i class="fa fa-check"></i></div></h6>' +
                        '<h6>' + response.lista_banner[i].BAN_ID + '</h6>' +
                        '<h6>' + response.lista_banner[i].BAN_TITULO + '</h6>' +
                        '<h6>' + response.lista_banner[i].BAN_DATA + '</h6>' +
                        '<h6>' + visibilidade + '</h6>' +
                        '<h6>' + response.lista_banner[i].BAN_CLICKS + '</h6>' +
                        '<h6>' +
                            '<i class="action fa fa-eye ver-banner" data-id="' + response.lista_banner[i].BAN_ID + '"></i>' +
                            '<i class="action fa fa-pen editar-banner" data-id="' + response.lista_banner[i].BAN_ID + '"></i>' +
                            // '<i class="action fa fa-trash deletar-banner" data-id="' + response.lista_banner[i].BAN_ID + '"></i>' +
                        '</h6>' +
                    '</li>');
                }
                if(i == 0){
                    $('.banner-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum banner cadastrado.</h6></li>');
                }
                $(".banner-cadastrados").text(response.quant_banner.qnt);
                $(".total-clicks").text(response.quant_banner.qnt_click);
                $('.banner-componente .lista-body').removeClass("active");
            }else{
                $('.banner-componente .lista-body').removeClass("active");
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                $('.banner-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum banner cadastrado.</h6></li>');
            }
        }
    });
}
var duploClickPagProx = 0;
function listarBannerPagProx(){
    if(duploClickPagProx == 0){
        duploClickPagProx = 1;
        var dadosajax = {
            'ACAO' : 'PROXIMO PAGINACAO BANNER',
            'BAN_ID' : ultimo_cod_banner
        };
        pageurl = 'componentes/banner/control/bannerListar.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                duploClickPagProx = 0;
                $('.banner-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista os Banners!",2000);
            },
            success: function(response){ 
                if(response.lista_banner.length > 0){
                    $('.banner-componente .lista-body').empty();
                }

                if(response.status == 0){
                    var i = 0;
                    for (i = 0; i < response.lista_banner.length; i++) {
                        if(i == 0){primeiro_cod_banner = response.lista_banner[i].BAN_ID;}
                        if((i + 1) == response.lista_banner.length){ultimo_cod_banner = response.lista_banner[i].BAN_ID;}
                        $('.banner-componente .lista-body').removeClass("active");
                        $('.banner-componente .lista-body').append('<li>' +
                            '<h6><div class="check"><i class="fa fa-check"></i></div></h6>' +
                            '<h6>' + response.lista_banner[i].BAN_ID + '</h6>' +
                            '<h6>' + response.lista_banner[i].BAN_TITULO + '</h6>' +
                            '<h6>' + response.lista_banner[i].BAN_DATA + '</h6>' +
                            '<h6>' + response.lista_banner[i].BAN_VISIBILIT + '</h6>' +
                            '<h6>' + response.lista_banner[i].BAN_CLICKS + '</h6>' +
                            '<h6>' +
                                '<i class="action fa fa-eye ver-banner" data-id="' + response.lista_banner[i].BAN_ID + '"></i>' +
                                '<i class="action fa fa-pen editar-banner" data-id="' + response.lista_banner[i].BAN_ID + '"></i>' +
                                '<i class="action fa fa-trash deletar-banner" data-id="' + response.lista_banner[i].BAN_ID + '"></i>' +
                            '</h6>' +
                        '</li>');
                    }
                    if(i > 0){
                        pagination_banner++;
                        $(".banner-componente .box-paginadores i b").text(pagination_banner);
                    }
                    duploClickPagProx = 0;
                }else{
                    $('.banner-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.banner-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum banner cadastrado.</h6></li>');
                    duploClickPagProx = 0;
                }
            }
        });
    }
}
var duploClickPagAnte = 0;
function listarBannerPagAnte(){
    if(duploClickPagAnte == 0){
        duploClickPagAnte = 1;
        var dadosajax = {
            'ACAO' : 'ANTERIOR PAGINACAO BANNER',
            'BAN_ID' : primeiro_cod_banner
        };
        pageurl = 'componentes/banner/control/bannerListar.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.banner-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao lista os Banners!",2000);
                duploClickPagAnte = 0;
            },
            success: function(response){ 
                if(response.lista_banner.length > 0){
                    $('.banner-componente .lista-body').empty();
                }

                if(response.status == 0){
                    var i = 0;
                    for (i = 0; i < response.lista_banner.length; i++) {
                        if(i == 0){primeiro_cod_banner = response.lista_banner[i].BAN_ID;}
                        if((i + 1) == response.lista_banner.length){ultimo_cod_banner = response.lista_banner[i].BAN_ID;}
                        $('.banner-componente .lista-body').removeClass("active");
                        $('.banner-componente .lista-body').append('<li>' +
                            '<h6><div class="check"><i class="fa fa-check"></i></div></h6>' +
                            '<h6>' + response.lista_banner[i].BAN_ID + '</h6>' +
                            '<h6>' + response.lista_banner[i].BAN_TITULO + '</h6>' +
                            '<h6>' + response.lista_banner[i].BAN_DATA + '</h6>' +
                            '<h6>' + response.lista_banner[i].BAN_VISIBILIT + '</h6>' +
                            '<h6>' + response.lista_banner[i].BAN_CLICKS + '</h6>' +
                            '<h6>' +
                                '<i class="action fa fa-eye ver-banner" data-id="' + response.lista_banner[i].BAN_ID + '"></i>' +
                                '<i class="action fa fa-pen editar-banner" data-id="' + response.lista_banner[i].BAN_ID + '"></i>' +
                                '<i class="action fa fa-trash deletar-banner" data-id="' + response.lista_banner[i].BAN_ID + '"></i>' +
                            '</h6>' +
                        '</li>');
                    }
                    if(i > 0){
                        pagination_banner--;
                        $(".banner-componente .box-paginadores i b").text(pagination_banner);
                    }
                    duploClickPagAnte = 0;
                }else{
                    $('.banner-componente .lista-body').removeClass("active");
                    criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                    $('.banner-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum banner cadastrado.</h6></li>');
                    duploClickPagAnte = 0;
                }
            }
        });
    }
}
function criarBanner(){
    var form = document.getElementById("novoBanner");
    var formData = new FormData(form);
    formData.append('ACAO', "CADASTRO");
    var pageurl = 'componentes/banner/control/bannerCreate.php';
    $.ajax({
        url: pageurl,
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.banner-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao criar banner!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                $(".banner-componente #gaveta, .banner-componente #gaveta form").removeClass("active");
                criaAlerta(0,response.mensagem,4000);
                $('.banner-componente #novoBanner').each (function(){
                    this.reset();
                });
                listarBanner();
            }else{
                $('.banner-componente .lista-body').removeClass("active");
                criaAlerta(0,response.mensagem,4000);
            }
        }
    });
}
function verBanner(banner_id){
    var dadosajax = {
        'ACAO' : 'LISTAR UM BANNER',
        'ID'   : banner_id
    };
    pageurl = 'componentes/banner/control/bannerListarUm.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao listar banner!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                var i = 0;
                $(".banner-componente #verBanner .banner-titulo").text(response.lista_banner.BAN_TITULO);
                if(response.lista_banner.BAN_SUB_TITULO == ''){
                    $(".banner-componente #verBanner .banner-sub-titulo").text("Sem sub frase");
                }else{
                    $(".banner-componente #verBanner .banner-sub-titulo").text(response.lista_banner.BAN_SUB_TITULO);
                }
                $(".banner-componente #verBanner .banner-img").attr("src", '../img/banner/'+response.lista_banner.BAN_IMAGEM);
                $(".banner-componente #verBanner .banner-data").text(response.lista_banner.BAN_DATA);
                if(response.lista_banner.BAN_VISIBILIT == 1){
                    $(".banner-componente #verBanner .banner-status").text("Sim");
                }else{
                    $(".banner-componente #verBanner .banner-status").text("Não");
                }
                $(".banner-componente #verBanner .banner-clicks").text(response.lista_banner.BAN_CLICKS);
                $(".banner-componente #verBanner .banner-link").attr('href',response.lista_banner.BAN_URL);
                $(".banner-componente #verBanner .metrica-semanal .dia .dom").text(response.clicks_banner[0]);
                $(".banner-componente #verBanner .metrica-semanal .dia .seg").text(response.clicks_banner[1]);
                $(".banner-componente #verBanner .metrica-semanal .dia .ter").text(response.clicks_banner[2]);
                $(".banner-componente #verBanner .metrica-semanal .dia .qua").text(response.clicks_banner[3]);
                $(".banner-componente #verBanner .metrica-semanal .dia .qui").text(response.clicks_banner[4]);
                $(".banner-componente #verBanner .metrica-semanal .dia .sex").text(response.clicks_banner[5]);
                $(".banner-componente #verBanner .metrica-semanal .dia .sab").text(response.clicks_banner[6]);
                clicksMesGrafico(response.clicks_mes_banner);
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
}
function verUmBanner(banner_id){
    var dadosajax = {
        'ACAO' : 'LISTAR UM BANNER',
        'ID'   : banner_id
    };
    pageurl = 'componentes/banner/control/bannerListarUm.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.banner-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao listar banner!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                var i = 0;
                $(".banner-componente #editaBanner .banner-titulo").val(response.lista_banner.BAN_TITULO);
                $(".banner-componente #editaBanner .banner-sub-titulo").val(response.lista_banner.BAN_SUB_TITULO);
                if(response.lista_banner.BAN_CTA_STATUS == 1){
                    $(".banner-componente #editaBanner .check.banner-cta").addClass("active");
                    $(".banner-componente #editaBanner input.banner-cta").attr("disabled",false);
                    $(".banner-componente #editaBanner input.banner-cta").val(response.lista_banner.BAN_CTA);
                    $(".banner-componente #editaBanner input[name='banner-cta-stats']").val(1);
                }else{
                    $(".banner-componente #editaBanner .check.banner-cta").removeClass("active");
                    $(".banner-componente #editaBanner input.banner-cta").attr("disabled",true);
                    $(".banner-componente #editaBanner input[name='banner-cta-stats']").val(0);
                }
                console.log(response.lista_banner.BAN_VISIBILIT);
                if(response.lista_banner.BAN_VISIBILIT == '2'){
                    $(".banner-componente #editaBanner .banner-status-dir").attr("checked", true);
                }else{
                    $(".banner-componente #editaBanner .banner-status-esq").attr("checked", true);
                }
                if(response.lista_banner.BAN_ALINHAMENTO == '1'){
                    $(".banner-componente #editaBanner .banner-alinhamento-dir").attr("checked", true);
                }else{
                    $(".banner-componente #editaBanner .banner-alinhamento-esq").attr("checked", true);
                }
                $(".banner-componente #editaBanner .banner-url").val(response.lista_banner.BAN_URL);
                $(".banner-componente #gaveta, .banner-componente #gaveta #editaBanner").addClass("active");
            }else{
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
            }
        }
    });
}
function verBanners(mes){
    var dadosajax = {
        'pedido_mes' : mes
    };
    pageurl = '../acoes/pedidoSelectMes.php';
    request = $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        error: function(){
            criaAlerta(0,"Falha ao selecionar pedidos!!",2000);
        }
    });
    request.done(function(response){
        $(".banner-componente #pedidosDoMes").empty();
        pedidos = JSON.parse(response);
        pedidos.forEach( p => {
            html =  '<li>'+
                        '<div class="nome"><h6 class="mini-title upper truncate" style="padding-right: 10px;">'+p.cliente+'</h6></div>'+
                        '<div class="quantidade"><h6 class="mini-title upper">'+p.data+'</h6></div>'+
                        '<div class="preco"><h6 class="mini-title upper">R$ '+p.total+'</h6></div>'+
                    '</li>';
            $(".banner-componente #pedidosDoMes").append(html);
        });
    });
}
function deletarBanner(banner_id){
    var data = {'ID': banner_id,'ACAO': "DELETAR"}
    var pageurl = 'componentes/banner/control/bannerDelete.php';
    $.ajax({
        url: pageurl,
        data: data,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            criaAlerta(0,"Falha ao deletar banner!!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                criaAlerta(0,response.mensagem,4000);
                setTimeout(function(){
                    listarBanner();
                },2000);
            }else{
                criaAlerta(0,response.mensagem,4000);
            }
        }
    });
}
function clicksMesGrafico(dados){

    //$("#grafico-clicks-mes").width('50vw');

    var context = document.getElementById("grafico-clicks-mes").getContext("2d");

    var gradiente = context.createLinearGradient(0, 0, 0, 350);
    gradiente.addColorStop(0, "#ce93d8");
    gradiente.addColorStop(1, "#4a148c");

    var mDados = [];
    var mKeys = [];
    for (i in dados) {
        mDados[i] = dados[i].valor;
        mKeys[i] = dados[i].data;
    }

    var grafico = new Chart(context, {
    
        // TIPO DE GRÁFICO
        type: 'horizontalBar',

        // DADOS DO GRÁFICO
        data: {
            labels: mKeys,
            datasets: [{
                label: "Clicks",
                backgroundColor: "rgba(169,51,203,.3)",
                borderColor: "rgba(169,51,203,1)",
                borderWidth: 1,
                data: mDados,
            }]
        },

        // CONFIGURAÇÕES EXTRAS
        options: {
            //TÍTULO DO GRÁFICO
            title: {
                display: false,
                text: "Gráfico 1",
                fontSize: 55,
                fontColor: "#a933cb"
            },
            // DEFINE SE É RESPONSIVO OU NÃO
            responsive: true,
            // SCALES SÃO OS TEXTOS QUE APARECEM NAS ESTREMIDADES DO GRÁFICO
            scales: {
                // ESTREMIDADE VERTICAL
                yAxes: [{
                    ticks: {
                        fontSize: 12,
                        fontColor: "#a933cb",
                        // INCLUIR "R$" ANTES DE CADA NOME NO VERTICE "Y" DO GRÁFICO
                        // callback: function(value, index, values) {
                        //     return 'R$ ' + value;
                        // }
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
                // callbacks: {
                //     // INCLUIR "R$" APÓS O TÍTULO DE CADA TOOLTIP DO GRÁFICO
                //     label : function(tooltipItem, data) {
                //         // EX: LEGENDA : R$ VALOR
                //         return data.datasets[tooltipItem.datasetIndex].label + ' : R$ ' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]
                //     }
                // }
            }
        }
    });
}

$(document).on("click",".banner-componente .novo-banner",function(){
    $(".banner-componente #gaveta, .banner-componente #gaveta #novoBanner").addClass("active");
});

$(document).on("click",".banner-componente .fechar-gaveta",function(){
    $(".banner-componente #gaveta, .banner-componente #gaveta form").removeClass("active");
});

$(document).on("click",".banner-componente #gaveta h5 i",function(){
    $(".banner-componente #gaveta, .banner-componente #gaveta form").removeClass("active");
});

$(document).on("click",".banner-componente #verBanner .fechar-gaveta",function(){
    $(".banner-componente #verBanner, .banner-componente #verBanner .content").removeClass("active");
});

$(document).on("click",".banner-componente #verBanner h5 i",function(){
    $(".banner-componente #verBanner, .banner-componente #verBanner .content").removeClass("active");
});

$(document).on("submit",".banner-componente #novoBanner",function(e){
    e.preventDefault();
    $(".banner-componente .lista-body").addClass("active");
    criarBanner();
});

$(document).on("submit",".banner-componente #editaBanner",function(e){
    e.preventDefault();
    var form = document.getElementById("editaBanner");
    var formData = new FormData(form);
    formData.append('ACAO', "ATUALIZAR");
    var pageurl = 'componentes/banner/control/bannerUpdate.php';
    $.ajax({
        url: pageurl,
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.banner-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao atualizar banner!",2000);
        },
        success: function(response){ 
            if(response.status == 0){
                $(".banner-componente #gaveta, .banner-componente #gaveta form").removeClass("active");
                criaAlerta(0,response.mensagem,4000);
                $(".banner-componente #editaBanner .banner-titulo").val("");
                $(".banner-componente #editaBanner .banner-sub-titulo").val("");
                $(".banner-componente #editaBanner .check.banner-cta").removeClass("active");
                $(".banner-componente #editaBanner input.banner-cta").attr("disabled",false);
                $(".banner-componente #editaBanner input.banner-cta").val("");
                $(".banner-componente #editaBanner input[name='banner-cta-stats']").val("");
                $(".banner-componente #editaBanner .banner-url").val("");

                $(".banner-componente #editaBanner .banner-status-esq").attr("checked", true);
                $(".banner-componente #editaBanner .banner-alinhamento-esq").attr("checked", true);
                listarBanner();
            }else{
                $('.banner-componente .lista-body').removeClass("active");
                criaAlerta(0,response.mensagem,4000);
            }
        }
    });
});

$(document).on("click",".banner-componente .box-paginadores .pag-prox",function(){
    listarBannerPagProx();
});

$(document).on("click",".banner-componente .box-paginadores .pag-ante",function(){
    listarBannerPagAnte();
});

$(document).on("keypress",".banner-componente .buscaPedido",function(e){
    var a = $(this).val();
    if(a != ""){
        $("#pedidos-lista li").each(function(){
            $(this).addClass("off");
            if($(this).text().toLowerCase().match(a)){
                $(this).removeClass("off");
            }
        });
    }else{
        $("#pedidos-lista li").each(function(){
            $(this).removeClass("off");
        });
    }
});

$(document).on("click", ".banner-componente .lista-body .check", function(){
    $(this).toggleClass("active");
});

$(document).on("click", ".banner-componente .lista-head .check", function(){
    $(".banner-componente .lista-head .check").toggleClass("active");
    if($(".banner-componente .lista-head .check").hasClass("active")){
        $(".banner-componente .lista-body .check").addClass("active");
    }else{
        $(".banner-componente .lista-body .check").removeClass("active");
    }
    $(".banner-componente .box-actions-extra").toggleClass("active");
});

$(document).on("click", ".banner-componente .check.banner-cta", function(){
    $(this).toggleClass("active");
    if($(this).hasClass("active")){
        $(".banner-componente input.banner-cta").attr("disabled",false);
        $(".banner-componente input[name='banner-cta-stats']").val(1);
    }else{
        $(".banner-componente input.banner-cta").attr("disabled",true);
        $(".banner-componente input[name='banner-cta-stats']").val(0);
    }
});

$(document).on("click",".banner-componente .ver-banner",function(){
    var banner_id = $(this).attr("data-id");
    $(".banner-componente #verBanner, .banner-componente #verBanner .content").addClass("active");
    verBanner(banner_id);
});

$(document).on("click",".banner-componente .deletar-banner",function(){
    var banner_id = $(this).attr("data-id");
    criaAlerta(1,"Deseja realmente apagar esse banner?",2000);
    $("#alerta .confirmar").click(function(){
        deletarBanner(banner_id);
    });
});

$(document).on("click",".banner-componente .escolher-periodo",function(){
    $(".banner-componente .box-period, .banner-componente .box-period-content").toggleClass("active");
});

$(document).on("click",".banner-componente .box-period .check",function(){
    $(this).toggleClass("active");
    if($(".banner-componente .box-period .check").hasClass("active")){
        $(".banner-componente .box-period select").attr("disabled",true);
        $(".banner-componente .box-period input").attr("disabled",false);
    }else{
        $(".banner-componente .box-period select").attr("disabled",false);
        $(".banner-componente .box-period input").attr("disabled",true);
    }
});

$(document).on("click",".banner-componente .box-period.active",function(){
    if($(".banner-componente .box-period .check").hasClass("active")){
        $(".banner-componente .box-period h6").text($(".banner-componente #dataDe").val()+' | '+$("#dataAte").val());
    }else{
        $(".banner-componente .box-period h6").text($(".banner-componente .box-period select option:selected").text());
    }
});

$(document).on("click",".banner-componente .editar-banner",function(){
    var banner_id = $(this).attr("data-id");
    $(".banner-componente #editaBanner input[name='banner-id']").val(banner_id);
    verUmBanner(banner_id);
});
