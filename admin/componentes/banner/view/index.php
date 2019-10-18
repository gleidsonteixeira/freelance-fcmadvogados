<div id="banner-componente" class="banner-componente">    
    <div class="box dados produtos">
        <div class="box-head">
            <h5 class="suave font">Resumo</h5>
            <button class="cta right suave mini-title upper">aplicar período <i class="fa fa-redo-alt"></i></button>
            <div class="box-period suave">
                <i class="fa fa-chevron-down suave click escolher-periodo"></i>
                <span class="right-align" style="line-height: 15px;">Período escolhido:</span>
                <h6 class="mini-title upper right-align nm">mês atual</h6>
                <div class="box-period-content suave">
                    <div class="box-filter">
                        <span>Períodos pré-definidos:</span>
                        <select class="browser-default">
                            <option value="1">Mês atual</option>
                            <option value="2">Mês passado</option>
                            <option value="3">Últimos 30 dias</option>
                            <option value="4">Últimos 3 meses</option>
                            <option value="5">Últimos 6 meses</option>
                            <option value="6">Este ano</option>
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
                <h5 class="condesed banner-cadastrados">0</h5>
                <h6 class="mini-title upper">Banners cadastrados</h6>
            </li>
            <li class="center-align">
                <h5 class="condesed total-clicks">0</h5>
                <h6 class="mini-title upper">Total de clicks</h6>
            </li>
            <li class="center-align hide">
                <h5 class="condesed">0</h5>
                <h6 class="mini-title upper">Lucro estimado</h6>
            </li>
        </ul>
    </div>
    <div class="box suave">
        <div class="box-head">
            <h5 class="suave font">Banners</h5>
            <div class="box-actions suave">
                <button class="cta left suave mini-title upper novo-banner">novo banner <i class="fa fa-plus"></i></button>
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
                <button class="cta suave"><i class="fa fa-print"></i></button>
                <button class="cta suave"><i class="fa fa-trash"></i></button>
            </div>
        </div>
        <div id="banner">
            <ul class="lista-head">
                <li>
                    <h6><div class="check"><i class="fa fa-check"></i></div></h6>
                    <h6 class="mini-title upper">cod</h6>
                    <h6 class="mini-title upper">titulo</h6>
                    <h6 class="mini-title upper">data</h6>
                    <h6 class="mini-title upper">visível ?</h6>
                    <h6 class="mini-title upper">clicks</h6>
                    <h6 class="mini-title upper">-</h6>
                </li>
            </ul>
            <ul class="lista-body loading suave active"></ul>
        </div>
        <div class="box-paginadores">
            <i class="click fa fa-chevron-left pag-ante"></i>
            <i class="upper"><b></b></i>
            <i class="click fa fa-chevron-right pag-prox"></i>
        </div>
    </div>
    <div id="verBanner" class="suave gaveta">
        <div class="fechar-gaveta"></div>
        <div class="content suave">
            <h5 class="suave font">Banner <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <img class="banner-img responsive-img">
                <span>Dados do banner</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">Frase principal</h6>
                <p class="banner-titulo"></p>
                <h6 class="mini-title upper">Sub frase</h6>
                <p class="banner-sub-titulo"></p>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Adicionado em</h6>
                    <p class="banner-data"></p>
                </div>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Ativo ?</h6>
                    <p class="banner-status"></p>
                </div>
                <div class="clear"></div>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Clicks</h6>
                    <p class="banner-clicks"></p>
                </div>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Link</h6>
                    <a class="banner-link cta suave" target="_blank">link</a>
                </div>
                <div class="clear"></div>
                <span>Métricas</span>
                <h6 class="mini-title upper">Clicks por dia da semana</h6>
                <div class="metrica-semanal">
                    <div class="dia"><span class="dom">0</span><h6 class="mini-title upper">d</h6></div>
                    <div class="dia"><span class="seg">0</span><h6 class="mini-title upper">s</h6></div>
                    <div class="dia"><span class="ter">0</span><h6 class="mini-title upper">t</h6></div>
                    <div class="dia"><span class="qua">0</span><h6 class="mini-title upper">q</h6></div>
                    <div class="dia"><span class="qui">0</span><h6 class="mini-title upper">q</h6></div>
                    <div class="dia"><span class="sex">0</span><h6 class="mini-title upper">s</h6></div>
                    <div class="dia"><span class="sab">0</span><h6 class="mini-title upper">s</h6></div>
                </div>
                <h6 class="mini-title upper">Clicks neste mês</h6>
                <canvas id="grafico-clicks-mes" style="width: 100%; height:600px;"></canvas>
            </div>
        </div>
    </div>
    <div id="gaveta" class="suave">
        <div class="fechar-gaveta"></div>
        <form id="novoBanner" class="suave" enctype="multipart/form-data">
            <h5 class="suave font">Novo banner <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Dados do banner</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">Frase principal</h6>
                <input type="text" name="banner-titulo" class="banner-titulo" required>
                <h6 class="mini-title upper">Sub frase</h6>
                <input type="text" name="banner-sub-titulo" class="banner-sub-titulo">
                <div class="habilitavel">
                    <div class="check banner-cta">
                        <i class="fa fa-check"></i>
                        <input type="hidden" name="banner-cta-stats" value='0'>
                    </div>
                    <h6 class="mini-title upper">Call-to-action</h6>
                    <input type="text" name="banner-cta-text" class="banner-cta" placeholder="clique aqui" required disabled>
                </div>
                <h6 class="mini-title upper">Link</h6>
                <input type="text" name="banner-url" class="banner-url">
                <h6 class="mini-title upper">Imagem</h6>
                <input type="file" name="banner-imagem" class="banner-imagem" required>
                <h6 class="mini-title upper">Visível ?</h6>
                <div class="metade esquerda">
                    <input type="radio" name="banner-status" value='1' class="left" style="margin-right:10px;" checked>
                    <span style="line-height: 40px;">Sim</span>
                </div>
                <div class="metade direita">
                    <input type="radio" name="banner-status" value='2' class="left" style="margin-right:10px;">
                    <span style="line-height: 40px;">Não</span>
                </div>
                <div class="clear"></div>
                <h6 class="mini-title upper">Alinhamento</h6>
                <div class="metade esquerda">
                    <input type="radio" name="banner-alinhamento" value='2' class="left ladoe" style="margin-right:10px;" checked>
                    <span style="line-height: 40px;">Esquerda</span>
                </div>
                <div class="metade direita">
                    <input type="radio" name="banner-alinhamento" value='1' class="left ladod" style="margin-right:10px;">
                    <span style="line-height: 40px;">Direita</span>
                </div>
                <div class="clear"></div>
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
        <form id="editaBanner" class="suave" enctype="multipart/form-data">
            <h5 class="suave font">Editar banner <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Dados do banner</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">Frase principal</h6>
                <input type="text" name="banner-titulo" class="banner-titulo" required>
                <h6 class="mini-title upper">Sub frase</h6>
                <input type="text" name="banner-sub-titulo" class="banner-sub-titulo">
                <div class="habilitavel">
                    <div class="check banner-cta">
                        <i class="fa fa-check"></i>
                        <input type="hidden" name="banner-cta-stats" value='0'>
                    </div>
                    <h6 class="mini-title upper">Call-to-action</h6>
                    <input type="text" name="banner-cta-text" class="banner-cta" placeholder="clique aqui" required disabled>
                </div>
                <h6 class="mini-title upper">Link</h6>
                <input type="text" name="banner-url" class="banner-url">
                <h6 class="mini-title upper">Imagem</h6>
                <input type="file" name="banner-imagem" class="banner-imagem">
                <h6 class="mini-title upper">Visível ?</h6>
                <div class="metade esquerda">
                    <input type="radio" name="banner-status" value='1' class="left banner-status-esq" style="margin-right:10px;" checked>
                    <span style="line-height: 40px;">Sim</span>
                </div>
                <div class="metade direita">
                    <input type="radio" name="banner-status" value='2' class="left banner-status-dir" style="margin-right:10px;">
                    <span style="line-height: 40px;">Não</span>
                </div>
                <div class="clear"></div>
                <h6 class="mini-title upper">Alinhamento</h6>
                <div class="metade esquerda">
                    <input type="radio" name="banner-alinhamento" value='2' class="left banner-alinhamento-esq" style="margin-right:10px;" checked>
                    <span style="line-height: 40px;">Esquerda</span>
                </div>
                <div class="metade direita">
                    <input type="radio" name="banner-alinhamento" value='1' class="left banner-alinhamento-dir" style="margin-right:10px;">
                    <span style="line-height: 40px;">Direita</span>
                </div>
                <div class="clear"></div>
                <input type="hidden" name="banner-id">
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(".banner-componente .box-paginadores i b").text(pagination_banner);
    $(".banner-componente #dataDe, .banner-componente #dataAte").datepicker({
        dateFormat: "dd-mm-yy",
        dayNames: ["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"],
        dayNamesMin: ["D","S","T","Q","Q","S","S"],
        monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ]
    });
    listarBanner();
</script>