<div id="ntf-componente" class="ntf-componente">
    <div class="box dados faqs hide">
        <div class="box-head">
            <h5 class="suave font">Resumo</h5>
        </div>
        <ul>
            <li class="center-align">
                <h5 class="condesed">0</h5>
                <h6 class="mini-title upper">Faq's cadastradas</h6>
            </li>
        </ul>
    </div>
    <div class="box suave">
        <div class="box-head">
            <h5 class="suave font">Notificações</h5>
            <div class="box-actions suave">
                <button class="cta left suave mini-title upper nova-notificacao">Nova notificação <i class="fa fa-plus"></i></button>
            </div>
            <div class="box-search hide">
                <input type="text" placeholder="Buscar">
                <i class="fa fa-search suave"></i>
            </div>
            <div class="box-filter hide">
                <select class="browser-default">
                    <option value="1">Cod</option>
                    <option value="2">Pergunta</option>
                </select>
                <i class="fa fa-filter suave"></i>
            </div>
            <div class="box-actions-extra">
                <button class="cta suave circle"><i class="fa fa-print"></i></button>
                <button class="cta suave circle"><i class="fa fa-trash"></i></button>
            </div>
        </div>
        <div id="ntf">
            <ul class="lista-head">
                <li>
                    <h6 class="mini-title upper">cod</h6>
                    <h6 class="mini-title upper">Título</h6>
                    <h6 class="mini-title upper">Descrição</h6>
                    <h6 class="mini-title upper">-</h6>
                </li>
            </ul>
            <ul class="lista-body loading suave active"></ul>
        </div>
        <div class="box-paginadores">
            <i class="click fa fa-chevron-left pag-ante"></i>
            <i class="upper"><b>1</b></i>
            <i class="click fa fa-chevron-right pag-prox"></i>
        </div>
    </div>

    <div id="gaveta" class="suave">
        <div class="fechar-gaveta"></div>
        <form id="novoNotificacao" class="suave novoNotificacao lista-nova_ntf" enctype="multipart/form-data">
            <h5 class="suave font">Nova notificação <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Dados da notificação</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">Título</h6>
                <input type="text" name="notificacao-titulo" class="notificacao-pergunta" required>
                <h6 class="mini-title upper">Descrição</h6>
                <textarea type="text" name="notificacao-descricacao" class="notificacao-resposta" required></textarea> 
                <h6 class="mini-title upper">Setor</h6>
                <select name="ntf-setor" class="notificacao-setor browser-default" required>
                </select>
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
        <form id="editNtf" class="suave editNtf" enctype="multipart/form-data">
            <h5 class="suave font">Editar notificação <i class="material-icons right click suave">close</i></h5> 
            <div class="form-content suave">
                <span>Dados da notificação</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">Título</h6>
                <input type="text" name="notificacao-titulo" class="ntf-titulo" required>
                <h6 class="mini-title upper">Descrição</h6>
                <textarea type="text" name="notificacao-descricacao" class="ntf-desc" required></textarea> 
                <h6 class="mini-title upper">setor</h6>
                <select name="ntf-setor" class="notificacao-str browser-default" required>
                </select>
                <input type="hidden" name="ntf-cod" class="ntf-cod">
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(".faqs-componente .box-paginadores i b").text(pagination_faqs);
    listarNotificacao();
    listarSetoresNotificacao();
</script>