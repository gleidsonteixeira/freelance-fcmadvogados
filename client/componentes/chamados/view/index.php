<div id="chamados-componente" class="chamados-componente">    
    <div class="box suave">
        <div class="box-head">
            <h5 class="suave font">Chamados</h5>
            <div class="box-actions suave">
                <button class="cta left suave mini-title upper novo-chamado">novo Chamado <i class="fa fa-plus"></i></button>
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
                <button class="cta suave circle editar-atendenteall"><i class="fa fa-user-plus"></i></button>
                <button class="cta suave circle editar-prioridadeall"><i class="fa fa-traffic-light"></i></button>
            </div>
        </div>
        <div class="box-abas">
            <div class="aba aba-aberto mini-title click upper active" data-status="1">abertos <span>0</span></div>
            <div class="aba aba-finalizado mini-title click upper" data-status="4">encerrados <span>0</span></div>
        </div>
        <div id="chamados">
            <ul class="lista-head">
                <li>
                    <h6 class="check-lista-head hide"><div class="check"><i class="fa fa-check"></i></div></h6>
                    <h6 class="mini-title upper">cod</h6>
                    <h6 class="mini-title upper">assunto</h6>
                    <h6 class="mini-title upper">atendente</h6>
                    <h6 class="mini-title upper">data</h6>
                    <h6 class="mini-title upper">setor</h6>
                    <h6 class="mini-title upper">-</h6>
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

    <div id="verChamado" class="suave gaveta">
        <div class="fechar-gaveta"></div>
        <div class="content suave">
            <h5 class="suave condesed"><i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <h5 class="font nm chamados-assunto"></h5>
                <h6 class="mini-title upper nm">
                    <div style="line-height:24px;margin-bottom:10px;" class="chamados-datainic">00/00/0000</div>
                    <div class="pill white-text chamados-setor"></div>
                    <div class="pill white-text chamados-prioridade"></div>
                    <div class="pill white-text chamados-empresa"></div>
                </h6>
                <div class="clear"></div>
                <span>Descrição do problema</span>
                <div class="clear"></div>
                <p class="chamados-desc"></p>
                <div class="clear"></div>
                <span>Anexos:</span>
                <div class="clear"></div>
                <ul class="anexos nm">
                    <!-- <li class="suave"><img src="../img/banner/wallpaper2.png"><i class="fa fa-file-download click suave"></i></li>
                    <li class="suave arquivo" data-extensao="pdf"><a href="download/acme-doc-2.0.1.txt" download="Acme Documentation (ver. 2.0.1).txt"><i class="fa fa-file-download click suave"></i></a></li>
                    <li class="suave arquivo" data-extensao="csv"><i class="fa fa-file-download click suave"></i></li> -->
                </ul>

                <div class="pesquisa-chamado suave hide">
                    <img src="componentes/chamados/img/favicon.png">
                    <p>Seu atendente solicitou a finalização, você aceita?</p>
                    <div class="clear"></div>
                    <textarea name="sugestao" class="hide" placeholder="Deixe sua opnião"></textarea>
                    <button class="cta mini-title upper white-text suave click left chamados-recusarfinalizarch">Recusar Finalização</button>
                    <button class="cta mini-title upper white-text suave click right chamados-finalizarch">Finalizar Chamado</button>
                </div>

                <div class="pesquisa-avaliacao-chamado suave hide">
                    <img src="componentes/chamados/img/favicon.png">
                    <p>No geral, qual o seu grau de satisfação com este atendimento?</p>
                    <i class="material-icons click suave" data-id="1" title="Muito Insatisfeito">sentiment_very_dissatisfied</i>
                    <i class="material-icons click suave" data-id="2" title="Pouco Insatisfeito">sentiment_dissatisfied</i>
                    <i class="material-icons click suave" data-id="3" title="Regular">sentiment_satisfied</i>
                    <i class="material-icons click suave" data-id="4" title="Pouco satisfeito">sentiment_satisfied_alt</i>
                    <i class="material-icons click suave" data-id="5" title="Muito Satisfeito">sentiment_very_satisfied</i>
                    <div class="clear"></div>
                    <textarea name="avaliacao-chamado-opiniao" class="avaliacao-chamado-opiniao hide" placeholder="Deixe sua opnião"></textarea>
                    <button class="cta mini-title upper white-text suave click right chamados-avaliacaoch hide">Enviar Avaliação</button>
                </div>
            </div>
            <ul class="respostas loading respostas-mensagens">
            </ul>
            <form class="responder hide" id="chamado_resposta" enctype="multipart/form-data" method="POST">
                <textarea name="resposta-mensagem" class= "resposta-mensagem" placeholder="Digite uma resposta" required></textarea>
                <input type="file" multiple name="resposta-anexos[]" class= "resposta-anexos" >
                <button class="cta mini-title upper white-text suave click right chamado-responder-btn">responder</button>
                <input type="hidden" name="resposta-chamados-cod" class="resposta-chamados-cod">
            </form>
        </div>
    </div>

    <div id="gaveta" class="suave">
        <div class="fechar-gaveta"></div>
        <form id="novoChamado" class="suave" enctype="multipart/form-data" method="POST">
            <h5 class="suave font">Novo Chamado <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Dados do chamado</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">Assunto</h6>
                <input type="text" name="chamados-assunto" id="chamados-assunto" required>
                <h6 class="mini-title upper">Cópia para...</h6>
                <input type="text" name="chamados-copia-para" id="chamados-copia-para"> 
                <h6 class="mini-title upper">Anexos</h6>
                <input type="file" multiple name="chamados-anexos[]" id="chamados-anexos">                
                <h6 class="mini-title upper">Descrição</h6>
                <textarea name="chamados-descricao" id="chamados-descricao"></textarea>
                <h6 class="mini-title upper">Setor</h6>
                <select class="browser-default" style="margin-bottom:16px;" name="chamados-setor" id="chamados-setor" >
                </select>
                <h6 class="mini-title upper">Tipo de Solicitação</h6>
                <select class="browser-default" style="margin-bottom:16px;" name="chamados-tipo-solicitacao" id="chamados-tipo-solicitacao" >
                </select>
                <div class="clear"></div>
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
    </div>
</div>
<style type="text/css">
    
</style>
<script>
    listarChamadoQuantidade();
    listarChamadosChamados();
    listarSetorCadChamado();
    listarTipoSolicitacaoCadChamado();
</script>
