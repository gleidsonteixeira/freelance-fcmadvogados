var pagination_cta = 1;
var primeiro_cod_cta = 0;
var ultimo_cod_cta = 0;

function listarCTA(){
    var dadosajax = {
        'ACAO' : 'LISTAR CTA'
    };
    pageurl = 'componentes/ctas/control/ctaListar.php';
    $.ajax({
        url: pageurl,
        data: dadosajax,
        type: 'POST',
        cache: false,
        dataType: 'json',
        error: function(){
            $('.cta-componente .lista-body').removeClass("active");
            criaAlerta(0,"Falha ao lista os CTA´S!",2000);
        },
        success: function(response){ 
            $('.cta-componente .lista-body').empty();

            if(response.status == 0){
                var i = 0;
                pagination_banner = 1;
                $(".cta-componente .box-paginadores i b").text(pagination_banner);
                for (i = 0; i < response.lista_cta.length; i++) {
                    if(i == 0){primeiro_cod_cta = response.lista_cta[i].BAN_ID;}
                    if((i + 1) == response.lista_cta.length){ultimo_cod_cta = response.lista_cta[i].BAN_ID;}
                    $('.cta-componente .lista-body').removeClass("active");
                    $('.cta-componente .lista-body').append('<li>' +
                        '<h6>' + response.lista_cta[i].CTA_COD + '</h6>' +
                        '<h6>' + response.lista_cta[i].CTA_NOME + '</h6>' +
                        '<h6>' + response.lista_cta[i].CTA_QNTCLICK + '</h6>' +
                        '<h6>' +
                            '<i class="action fa fa-eye ver-cta" data-id="' + response.lista_cta[i].CTA_COD + '"></i>' +
                        '</h6>' +
                    '</li>');
                }
                if(i == 0){
                    $('.cta-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum cta cadastrado.</h6></li>');
                }
                $(".cta-cadastrados").text(response.quant_cta.qnt);
                $(".cta-avaliacoes").text(response.avaliacoes.qnt_click);
                // $(".total-clicks").text(response.quant_banner.qnt_click);
                $('.cta-componente .lista-body').removeClass("active");
                ctasGrafico(response.grafico);
            }else{
                $('.cta-componente .lista-body').removeClass("active");
                criaAlerta(0,"Status - " + response.status + " | Mensagem - " + response.mensagem,2000);
                $('.cta-componente .lista-body').append('<li><h6 style="width: 100%;text-align:center;">Nenhum cta cadastrado.</h6></li>');
            }
        }
    });
}
var duploClickcadCTA = 0;
function criarCta(){
    if(duploClickcadCTA == 0){
        duploClickcadCTA = 1;
        var form = document.getElementById("novoCta");
        var formData = new FormData(form);
        formData.append('ACAO', "CADASTRO");
        var pageurl = 'componentes/ctas/control/ctaCreate.php';
        $.ajax({
            url: pageurl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: function(){
                $('.cta-componente .lista-body').removeClass("active");
                criaAlerta(0,"Falha ao criar cta!",2000);
                duploClickcadCTA = 0;
            },
            success: function(response){ 
                if(response.status == 0){
                    $(".cta-componente #gaveta, .cta-componente #gaveta form").removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    $('.cta-componente #novoCta').each (function(){
                        this.reset();
                    });
                    listarCTA();
                    duploClickcadCTA = 0;
                }else{
                    $('.cta-componente .lista-body').removeClass("active");
                    criaAlerta(0,response.mensagem,4000);
                    duploClickcadCTA = 0;
                }
            }
        });
    }
}
function ctasGrafico(dados){
    var context = document.getElementById("grafico-ctas-mes").getContext("2d");

    var gradiente = context.createLinearGradient(0, 0, 0, 350);
    gradiente.addColorStop(0, "#ce93d8");
    gradiente.addColorStop(1, "#4a148c");

    var grafico = new Chart(context, {
    
        // TIPO DE GRÁFICO
        type: 'line',

        // DADOS DO GRÁFICO
        data: {
            labels: dados.data,
            datasets: [{
                label: "Telefone",
                backgroundColor: "rgba(0,0,0,.3)",
                borderColor: "rgba(0,0,0,1)",
                borderWidth: 1,
                data: dados.cod6,
            },{
                label: "Email",
                backgroundColor: "rgba(255,193,7,.3)",
                borderColor: "rgba(255,193,7,1)",
                borderWidth: 1,
                data: dados.cod7,
            },{
                label: "Facebook",
                backgroundColor: "rgba(66,103,178,.3)",
                borderColor: "rgba(66,103,178,1)",
                borderWidth: 1,
                data: dados.cod8,
            },{
                label: "Youtube",
                backgroundColor: "rgba(255,0,0,.3)",
                borderColor: "rgba(255,0,0,1)",
                borderWidth: 1,
                data: dados.cod9,
            },{
                label: "Instagram",
                backgroundColor: "rgba(169,51,203,.3)",
                borderColor: "rgba(169,51,203,1)",
                borderWidth: 1,
                data: dados.cod10,
            },{
                label: "Whatsapp",
                backgroundColor: "rgba(88,232,112,.3)",
                borderColor: "rgba(88,232,112,1)",
                borderWidth: 1,
                data: dados.cod11,
            }]
        },

        // CONFIGURAÇÕES EXTRAS
        options: {
            //TÍTULO DO GRÁFICO
            title: {
                display: true,
                text: "Clicks em CTA´S",
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


$(document).on("submit",".cta-componente #novoCta",function(e){
    e.preventDefault();
    $(".cta-componente .lista-body").addClass("active");
    criarCta();
});