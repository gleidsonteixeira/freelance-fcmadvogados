<div id="relatorio-chamados-componente" class="relatorio-chamados-componente"> 
    <div class="box dados relatorio-chamados">
        <div class="box-head">
            <h5 class="suave font">Resumo</h5>
            <button class="cta right suave mini-title upper aplicar_periodo">aplicar período <i class="fa fa-redo-alt"></i></button>
            <div class="box-period suave">
                <i class="fa fa-chevron-down suave click escolher-periodo"></i>
                <span class="right-align" style="line-height: 15px;">Período escolhido:</span>
                <h6 class="mini-title upper right-align nm">mês atual</h6>
                <div class="box-period-content suave">
                    <div class="box-filter">
                        <span>Períodos pré-definidos:</span>
                        <select class="browser-default" name="relatorio-chamados-periodo" id="relatorio-chamados-periodo">
                            <option value="1">Janeiro</option>
                            <option value="2">Fevereiro</option>
                            <option value="3">Março</option>
                            <option value="4">Abril</option>
                            <option value="5">Maio</option>
                            <option value="6">Junho</option>
                            <option value="7">Julho</option>
                            <option value="8">Agosto</option>
                            <option value="9">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12" selected>Dezembro</option>
                        </select>
                        <i class="fa fa-calendar-day suave"></i>
                    </div>
                    <div class="clear"></div>
                    <div class="divider"></div>
                    <div class="check left">
                        <i class="fa fa-check"></i>
                    </div>
                    <div class="metade right">
                        <span>Data até:</span>
                        <input type="text" id="dataAte" class="oInput" placeholder="00-00-0000" disabled>
                    </div>
                    <div class="metade right" style="margin-right:10px;">
                        <span>Data de:</span>
                        <input type="text" id="dataDe" class="oInput" placeholder="00-00-0000" disabled>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <ul>
            <li class="center-align">
                <h5 class="condesed relatorio-chamados-atendidos">0</h5>
                <h6 class="mini-title upper">Chamados atendidos</h6>
            </li>
            <li class="center-align">
                <h5 class="condesed relatorio-chamados-atendentes-operando">0</h5>
                <h6 class="mini-title upper">Atendentes operando</h6>
            </li>
            <li class="center-align">
                <h5 class="condesed relatorio-chamados-mic">0</h5>
                <h6 class="mini-title upper"><abbr title="Média de interações por chamado">MIC</abbr></h6>
            </li>
        </ul>
        <canvas id="grafico-chamados-mes" style="width:100%;height:300px;margin-top:10px;"></canvas>
    </div>
    <div class="box suave">
        <div class="box-head">
            <h5 class="suave font">Relatório de chamados</h5>
            <div class="box-actions suave">
                <button class="cta left suave mini-title upper add-filtro">filtros <i class="fa fa-filter"></i></button>
                <button class="cta left suave mini-title upper">imprimir <i class="fa fa-print"></i></button>
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
                    <h6 class="mini-title upper">data</h6>
                    <h6 class="mini-title upper">setor</h6>
                    <h6 class="mini-title upper">prioridade</h6>
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
                <h6 class="mini-title upper">Setor</h6>
                <select name="relatorio-chamados-setor" id="relatorio-chamados-setor" class="browser-default">
                     <option value="0">Selecione um Setor</option>
                </select>
                <h6 class="mini-title upper">Atendente</h6>
                <select name="relatorio-chamados-atendentes" id="relatorio-chamados-atendentes" class="browser-default">
                     <option value="0">Selecione um Atendente</option>
                </select>
                <h6 class="mini-title upper">Prioridade</h6>
                <select name="relatorio-chamados-prioridade" id="relatorio-chamados-prioridade" class="browser-default">
                     <option value="0">Selecione uma Prioridade</option>
                </select>
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
    $(".relatorio-chamados-componente .box-period #dataDe").mask("00-00-0000", {reverse: false});
    $(".relatorio-chamados-componente .box-period #dataAte").mask("00-00-0000", {reverse: false});
    $(".relatorio-chamados-componente form #fDataDe").mask("00-00-0000", {reverse: false});
    $(".relatorio-chamados-componente form #fDataAte").mask("00-00-0000", {reverse: false});

    $(".relatorio-chamados-componente .box-period #dataDe, .relatorio-chamados-componente .box-period #dataAte, .relatorio-chamados-componente form #fDataDe, .relatorio-chamados-componente form #fDataAte").datepicker({
        dateFormat: "dd-mm-yy",
        dayNames: ["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"],
        dayNamesMin: ["D","S","T","Q","Q","S","S"],
        monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ]
    });

    data = new Date();
    $("#relatorio-chamados-periodo").val(data.getMonth() + 1);
    $(".relatorio-chamados-componente .box-period h6").html($("#relatorio-chamados-periodo").find(":selected").text());
    // chamadosGrafico();
    listarRelatorioChamadoQuantidade();
    listarEmpresaRelatorioChamado();
</script>