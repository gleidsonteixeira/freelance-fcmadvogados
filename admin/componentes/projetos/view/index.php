<div id="projetos-componente" class="projetos-componente">
    <div class="box dados produtos">
        <div class="box-head">
            <h5 class="suave font">Resumo</h5>
            <!-- <div class="box-period suave">
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
            </div> -->
        </div>
        <ul>
            <li class="center-align">
                <h5 class="condesed">0</h5>
                <h6 class="mini-title upper">Projetos cadastrados</h6>
            </li>
            <li class="center-align">
                <h5 class="condesed">0</h5>
                <h6 class="mini-title upper">Total de atividades</h6>
            </li>
            <li class="center-align">
                <h5 class="condesed">0</h5>
                <h6 class="mini-title upper">Empresas atendidas</h6>
            </li>
        </ul>
    </div>
    <div class="box">
        <div class="box-head">
            <h5 class="suave font">Projetos</h5>
            <div class="box-actions suave">
                <button class="cta left suave mini-title upper novo-projeto">novo projeto <i class="fa fa-plus"></i></button>
            </div>
            <!-- <div class="box-search">
                <input type="text" placeholder="Buscar">
                <i class="fa fa-search suave"></i>
            </div>
            <div class="box-filter">
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
            </div> -->
        </div>
        <div id="projetos">
            <ul class="lista-head">
                <li class="hide-on-small-only">
                    <h6 class="mini-title upper">cod</h6>
                    <h6 class="mini-title upper">projeto</h6>
                    <h6 class="mini-title upper">empresa</h6>
                    <h6 class="mini-title upper">data</h6>
                    <h6 class="mini-title upper">-</h6>
                </li>
                <li class="hide-on-med-and-up">
                    <h6 class="mini-title upper">Projetos Cadastrados</h6>
                </li>
            </ul>
            <ul class="lista-body loading active"></ul>
        </div>
        <div class="box-paginadores">
            <i class="click pag-ante fa fa-chevron-left"></i>
            <i class="upper"><b>0</b></i>
            <i class="click pag-prox fa fa-chevron-right"></i>
        </div>
    </div>

    <div id="verProjeto" class="suave gaveta">
        <div class="fechar-gaveta"></div>
        <div class="content suave">
            <h5 class="suave font"><div class="pjt-nome" style="display: inline-block;"></div> <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Dados do projeto</span>
                <div class="clear"></div>
                <ul class="etapas"></ul>
                <form id="novaEtapa" enctype="multipart/form-data">
                    <input type="text" name="pet-nome" class="pet-nome">
                    <input type="hidden" name="pjt-cod" class="pjt-cod">
                    <button class="cta mini-title upper click suave">salvar</button>
                </form>
                <button class="cta mini-title upper click suave nova-etapa">add etapa</button>
            </div>
            <form id="novaAtividade" class="suave" enctype="multipart/form-data">
                <div class="content-atividade white">
                    <h4 class="font">Nova atividade <i class="material-icons right click suave">close</i></h4>
                    <h6 class="mini-title upper">titulo da atividade</h6>
                    <input type="text" name="pat-nome" class="pat-nome" required>
                    <h6 class="mini-title upper">descrição da atividade</h6>
                    <textarea name="pat-desc" class="pat-desc" required></textarea>
                    <div class="metade esquerda">
                        <h6 class="mini-title upper">data inicial</h6>
                        <input type="text" id="pat-dtinic" name="pat-dtinic" class="pat-dtinic" style="z-index: 100;position:relative;" required>
                    </div>
                    <div class="metade direita">
                        <h6 class="mini-title upper">data final</h6>
                        <input type="text" id="pat-dtencerra" name="pat-dtencerra" class="pat-dtencerra" style="z-index: 100;position:relative;">
                    </div>
                    <div class="clear"></div>
                    <h6 class="mini-title upper">horas trabalhadas</h6>
                    <input type="text" name="pat-hrinic" class="pat-hrinic" required>
                    <!-- <div class="metade direita">
                        <h6 class="mini-title upper">hora final</h6>
                        <input type="text" name="pat-hrencerra" class="pat-hrencerra">
                    </div> -->
                    <div class="clear"></div>
                    <h6 class="mini-title upper">analista</h6>
                    <select id="pat-analista" name="pat-analista" class="browser-default" style="margin-bottom: 16px;"></select>
                    <div class="clear"></div>
                    <input type="hidden" name="pjt-cod" class="pjt-cod">
                    <input type="hidden" name="pet-cod" class="pet-cod">
                    <button class="cta mini-title upper click suave right">salvar</button>
                </div>
            </form>
            <form id="editaAtividade" class="suave" enctype="multipart/form-data">
                <div class="content-atividade white">
                    <h4 class="font">Editar atividade <i class="material-icons right click suave">close</i></h4>
                    <h6 class="mini-title upper">titulo da atividade</h6>
                    <input type="text" name="pat-nome" class="pat-nome" required>
                    <h6 class="mini-title upper">descrição da atividade</h6>
                    <textarea name="pat-desc" class="pat-desc" required></textarea>
                    <div class="metade esquerda">
                        <h6 class="mini-title upper">data inicial</h6>
                        <input type="text" id="e-pat-dtinic" name="pat-dtinic" class="pat-dtinic" style="z-index: 100;position:relative;" required>
                    </div>
                    <div class="metade direita">
                        <h6 class="mini-title upper">data final</h6>
                        <input type="text" id="e-pat-dtencerra" name="pat-dtencerra" class="pat-dtencerra" style="z-index: 100;position:relative;">
                    </div>
                    <div class="clear"></div>
                    <h6 class="mini-title upper">hora inicial</h6>
                    <input type="text" name="pat-hrinic" class="pat-hrinic" required>
                    <div class="clear"></div>
                    <h6 class="mini-title upper">analista</h6>
                    <select id="pat-analista" name="pat-analista" class="browser-default" style="margin-bottom: 16px;"></select>
                    <div class="clear"></div>
                    <input type="hidden" name="pjt-cod" class="pjt-cod">
                    <input type="hidden" name="pat-cod" class="pat-cod">
                    <button class="cta mini-title upper click suave right">salvar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="gaveta" class="suave">
        <div class="fechar-gaveta"></div>
        <form id="novoProjeto" class="suave" enctype="multipart/form-data">
            <h5 class="suave font">Novo projeto <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Dados do projeto</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">Nome do projeto</h6>
                <input type="text" name="pjt-nome" class="pjt-nome" required>
                <h6 class="mini-title upper">Data de Início</h6>
                <input type="text" id="pjt-dtinic" name="pjt-dtinic" class="pjt-dtinic" style="position:relative;z-index:100;">
                <h6 class="mini-title upper">Empresa</h6>
                <div class="input-select">
                    <input type="text" class="buscaEmpresa">
                    <input type="hidden" name="pjt-emp" class="pjt-emp">
                    <input type="hidden" name="pjt-emp-nome" class="pjt-emp-nome">
                    <div class="detalhe"></div>
                    <ul class="suave"></ul>
                </div>
                <div class="clear"></div>
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
        <form id="editaProjeto" class="suave" enctype="multipart/form-data">
            <h5 class="suave font">Editar projeto <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Dados do projeto</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">Nome do projeto</h6>
                <input type="text" name="pjt-nome" class="pjt-nome" required>
                <h6 class="mini-title upper">Data de Início</h6>
                <input type="text" id="e-pjt-dtinic" name="pjt-dtinic" class="pjt-dtinic" style="position:relative;z-index:100;">
                <h6 class="mini-title upper">Empresa</h6>
                <div class="input-select">
                    <input type="text" class="buscaEmpresa">
                    <input type="hidden" name="pjt-emp" class="pjt-emp">
                    <input type="hidden" name="pjt-emp-nome" class="pjt-emp-nome">
                    <div class="detalhe"></div>
                    <ul class="suave"></ul>
                </div>
                <div class="clear"></div>
                <input type="hidden" name="pjt-cod" class="pjt-cod">
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(".projetos-componente #pjt-dtinic, .projetos-componente #e-pjt-dtinic, .projetos-componente #pat-dtinic, .projetos-componente #pat-dtencerra, .projetos-componente #e-pat-dtinic, .projetos-componente #e-pat-dtencerra").datepicker({
        dateFormat: "dd-mm-yy",
        dayNames: ["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"],
        dayNamesMin: ["D","S","T","Q","Q","S","S"],
        monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ]
    });
    $(".pat-hrinic, .pat-hrencerra").mask("00:00");
    buscarEmpresa();
    listarProjetos();
    listarEmpresasProjetos();

    $("#gaveta h5 i, .fechar-gaveta").click(function(){
        $("#gaveta, form").removeClass("active");
    });

    $(".gaveta h5 i, .fechar-gaveta").click(function(){
        $(".gaveta, .gaveta .content").removeClass("active");
    });

    $(".gaveta h4 i").click(function(){
        $("#novaAtividade, #editaAtividade").removeClass("active");
    });
</script>