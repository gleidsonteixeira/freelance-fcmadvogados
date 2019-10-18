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
            <div class="aba aba-agatend mini-title click upper" data-status="2">Aguard. Atendente <span>0</span></div>
            <div class="aba aba-agclient mini-title click upper" data-status="3">Aguard. Cliente <span>0</span></div>
            <div class="aba aba-finalizado mini-title click upper" data-status="4">encerrados <span>0</span></div>
        </div>
        <div id="chamados">
            <ul class="lista-head">
                <li>
                    <h6 class="check-lista-head hide"><div class="check"><i class="fa fa-check"></i></div></h6>
                    <h6 class="mini-title upper">cod</h6>
                    <h6 class="mini-title upper">assunto</h6>
                    <h6 class="mini-title upper">empresa</h6>
                    <h6 class="mini-title upper">data</h6>
                    <h6 class="mini-title upper">setor</h6>
                    <h6 class="mini-title upper">prioridade</h6>
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
            </div>
            <ul class="respostas loading respostas-mensagens">
            </ul>
            <form class="responder hide" id="chamado_resposta" enctype="multipart/form-data" method="POST">
                <textarea name="resposta-mensagem" class= "resposta-mensagem" placeholder="Digite uma resposta" required></textarea>
                <input type="file" multiple name="resposta-anexos[]" class= "resposta-anexos left" style="width: 55%;">
                <input type="text" name="resposta-horas-gasta" class= "resposta-horas-gasta right" style="width: 43%;" placeholder="00:00 Tempo gasto" required>
                <button class="cta mini-title upper white-text suave click left chamado-responder-finalizar-btn hide" onclick="respondeFinalizarChamados();">resp. e finalizar</button>
                <button class="cta mini-title upper white-text suave click right chamado-responder-btn" onclick="responderChamados();">responder</button>
                <input type="hidden" name="resposta-chamados-cod" class="resposta-chamados-cod">
            </form>
        </div>
    </div>

    <div id="editarAtendente" class="suave gaveta">
        <div class="fechar-gaveta"></div>
        <div class="content suave">
            <h5 class="suave font">Escolher atendente <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Atendentes disponíveis</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">escolher atendente</h6>
                <select class="browser-default" style="margin-bottom:16px;" name="chamados-atendente" id="chamados-atendente">
                </select>
                <input type="hidden" name="chamados-cod" id="chamados-cod">
                <div class="clear"></div>
                <button type="submit" class="cta mini-title upper suave right edit-atendente">confirmar</button>
            </div>
        </div>
    </div>

    <div id="editarPrioridade" class="suave gaveta">
        <div class="fechar-gaveta"></div>
        <div class="content suave">
            <h5 class="suave font">Escolher prioridade <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Lista de prioridades</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">escolha uma prioridade</h6>
                <select class="browser-default" style="margin-bottom:16px;" name="chamados-prioridade" id="chamados-prioridade">
                    <option value="">prioridade 1</option>
                    <option value="">prioridade 2</option>
                    <option value="">prioridade 3</option>
                </select>
                <input type="hidden" name="chamados-cod" id="chamados-cod">
                <div class="clear"></div>
                <button type="submit" class="cta mini-title upper suave right edit-prioridade">confirmar</button>
            </div>
        </div>
    </div>

    <div id="editarAtendenteAll" class="suave gaveta">
        <div class="fechar-gaveta"></div>
        <div class="content suave">
            <h5 class="suave font">Escolher atendente <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Atendentes disponíveis</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">escolher atendente</h6>
                <select class="browser-default" style="margin-bottom:16px;" name="chamados-atendente" id="chamados-atendente">
                </select>
                <div class="clear"></div>
                <button type="submit" class="cta mini-title upper suave right edit-atendente">confirmar</button>
            </div>
        </div>
    </div>

    <div id="editarPrioridadeAll" class="suave gaveta">
        <div class="fechar-gaveta"></div>
        <div class="content suave">
            <h5 class="suave font">Escolher prioridade <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Lista de prioridades</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">escolha uma prioridade</h6>
                <select class="browser-default" style="margin-bottom:16px;" name="chamados-prioridade" id="chamados-prioridade">
                    <option value="">prioridade 1</option>
                    <option value="">prioridade 2</option>
                    <option value="">prioridade 3</option>
                </select>
                <div class="clear"></div>
                <button type="submit" class="cta mini-title upper suave right edit-prioridade">confirmar</button>
            </div>
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
                <h6 class="mini-title upper">Empresa Solicitante</h6>
                <select class="browser-default" style="margin-bottom:16px;" name="chamados-empresa" id="chamados-empresa">
                    <option>ok</option>
                </select>
                <h6 class="mini-title upper">Usuário Solicitante</h6>
                <select class="browser-default" style="margin-bottom:16px;" name="chamados-solicitante" id="chamados-solicitante" >
                </select>
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
                <h6 class="mini-title upper">Prioridade</h6>
                <select class="browser-default" style="margin-bottom:16px;" name="chamados-prioridade" id="chamados-prioridade" >
                </select>
                <div class="clear"></div>
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(".chamados-componente #chamado_resposta .resposta-horas-gasta").mask("00:00", {reverse: false});
    listarChamadoQuantidade();
    listarChamadosChamados();
    listarEmpresaCadChamado();
    listarSetorCadChamado();
    listarTipoSolicitacaoCadChamado();
    listarPrioridadeChamado();
    listarAtendentesChamado();
</script>
