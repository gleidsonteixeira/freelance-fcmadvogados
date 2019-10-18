<div id="relatorio-horas-chamados-componente" class="relatorio-horas-chamados-componente"> 
    <div class="box suave">
        <div class="box-head">
            <h5 class="suave font">Relatório de Horas por Chamado</h5>
            <div class="box-actions suave">
                <button class="cta left suave mini-title upper add-filtro">filtros <i class="fa fa-filter"></i></button>
                <button class="cta left suave mini-title upper hide">imprimir <i class="fa fa-print"></i></button>
            </div>
            <div class="box-search hide">
                <input type="text" placeholder="Buscar">
                <i class="fa fa-search suave"></i>
            </div>
            <div class="box-filter hide">
                <select class="browser-default">
                    <option value="1">Cod</option>
                    <option value="2">Produto</option>
                    <option value="3">Estoque</option>
                    <option value="4">Compra</option>
                    <option value="5">Venda</option>
                </select>
                <i class="fa fa-filter suave"></i>
            </div>
            <div class="box-actions-extra">
                <button class="cta suave circle"><i class="fa fa-print"></i></button>
                <button class="cta suave circle"><i class="fa fa-trash"></i></button>
            </div>
        </div>

        <div id="relatorio-chamados">
            <ul class="lista-head">
                <li>
                    <h6 class="mini-title upper">cod</h6>
                    <h6 class="mini-title upper">assunto</h6>
                    <h6 class="mini-title upper">empresa</h6>
                    <h6 class="mini-title upper">abertura</h6>
                    <h6 class="mini-title upper">encerramento</h6>
                    <h6 class="mini-title upper">quant. horas</h6>
                    <h6 class="mini-title upper">status</h6>
                </li>
            </ul>
            <ul class="lista-body suave active">
            </ul>
        </div>
        <div class="box-paginadores">
            <i class="click fa fa-chevron-left pag-ante"></i>
            <i class="upper"><b></b></i>
            <i class="click fa fa-chevron-right pag-prox"></i>
        </div>
        <div class="box-total-horas">
            <h6>Total de Horas: <span id="total-quant-horas-chamados"></span></h6>
        </div>
    </div>

    <div id="gaveta" class="suave">
        <form id="addFiltro" class="suave" method="POST">
            <h5 class="suave font">Filtros <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Filtros disponíveis</span>
                <div class="clear"></div>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">De data</h6>
                    <input type="text" name="fDataDe" id="fDataDe" class="oInput" style="position: relative;z-index: 100;" placeholder="00-00-0000">
                </div>
                <div class="metade direita">
                    <h6 class="mini-title upper">Até data</h6>
                    <input type="text" name="fDataAte" id="fDataAte" class="oInput" style="position: relative;z-index: 100;" placeholder="00-00-0000">
                </div>
                <div class="clear"></div>
                <h6 class="mini-title upper">Status</h6>
                <select name="relatorio-chamados-status" id="relatorio-chamados-status" class="browser-default">
                     <option value="0">Selecione um Status</option>
                     <option value="1">Aberto</option>
                     <option value="4">Encerrado</option>
                </select>
                <h6 class="mini-title upper">Empresa</h6>
                <select name="relatorio-chamados-empresa" id="relatorio-chamados-empresa" class="browser-default">
                    <option value="0">Selecione uma Empresa</option>
                </select>
                <div class="clear"></div>
                <div class="metade esquerda">
                    <button type="submit" class="cta mini-title upper suave nm left aplicar-filtro">Aplicar Filtro</button>
                </div>
                <div class="metade direita">
                    <button type="submit" class="cta mini-title upper suave nm right salvar-filtro">Salvar/Aplicar</button>                
                </div>
                <div class="clear"></div>
                <button type="submit" class="cta mini-title upper suave nm remover-filtro" style="margin-top: 16px !important;">Remover Filtro</button>
            </div>
        </form>
    </div>
</div>
<script src="../js/chart.js"></script>
<script>
    $(".relatorio-horas-chamados-componente .box-period #dataDe").mask("00-00-0000", {reverse: false});
    $(".relatorio-horas-chamados-componente .box-period #dataAte").mask("00-00-0000", {reverse: false});
    $(".relatorio-horas-chamados-componente form #fDataDe").mask("00-00-0000", {reverse: false});
    $(".relatorio-horas-chamados-componente form #fDataAte").mask("00-00-0000", {reverse: false});

    $(".relatorio-horas-chamados-componente .box-period #dataDe, .relatorio-horas-chamados-componente .box-period #dataAte, .relatorio-horas-chamados-componente form #fDataDe, .relatorio-horas-chamados-componente form #fDataAte").datepicker({
        dateFormat: "dd-mm-yy",
        dayNames: ["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"],
        dayNamesMin: ["D","S","T","Q","Q","S","S"],
        monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ]
    });

    data = new Date();
    $("#relatorio-chamados-periodo").val(data.getMonth() + 1);
    $(".relatorio-horas-chamados-componente .box-period h6").html($("#relatorio-chamados-periodo").find(":selected").text());
    // chamadosGrafico();
    listarEmpresaRelatorioHorasChamado();
</script>