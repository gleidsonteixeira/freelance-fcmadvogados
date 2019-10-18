<div id="usuario-componente" class="usuario-componente">
    <div class="box dados usuario hide">
        <div class="box-head">
            <h5 class="suave condesed">Resumo</h5>
        </div>
        <ul>
            <li class="center-align">
                <h5 class="condesed">0</h5>
                <h6 class="mini-title upper">Empresas cadastradas</h6>
            </li>
        </ul>
    </div>
    <div class="box suave">
        <div class="box-head">
            <h5 class="suave condesed">Usuário</h5>
            <div class="box-actions suave">
                <button class="cta left suave mini-title upper novo-usuario">novo Usuário <i class="fa fa-plus"></i></button>
            </div>
            <div class="box-search">
                <input type="text" placeholder="Buscar" name="usuario-buscar" class="usuario-buscar">
                <i class="fa fa-search suave"></i>
            </div>
            <div class="box-filter hide">
                <select class="browser-default">
                    <option value="1">Cod</option>
                    <option value="2">Nome</option>
                    <option value="3">Email</option>
                </select>
                <i class="fa fa-filter suave"></i>
            </div>
            <div class="box-actions-extra">
                <button class="cta suave circle"><i class="fa fa-print"></i></button>
                <button class="cta suave circle"><i class="fa fa-trash"></i></button>
            </div>
        </div>
        <div id="usuario">
            <ul class="lista-head">
                <li>
                    <h6 class="mini-title upper">cod</h6>
                    <h6 class="mini-title upper">Nome</h6>
                    <h6 class="mini-title upper">Email</h6>
                    <h6 class="mini-title upper">Telefone</h6>
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

    <div id="gaveta" class="suave">
        <div class="fechar-gaveta"></div>
        <form id="novoUsuario" class="suave novoUsuario usuario" enctype="multipart/form-data">
            <h5 class="suave">Novo Usuário <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Dados do Usuário</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">Nome</h6>
                <input type="text" name="usuario-nome" class="usuario-nome" required>
                <h6 class="mini-title upper">Email</h6>
                <input type="email" name="usuario-email" class="usuario-email" required>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Senha</h6>
                    <input type="password" name="usuario-senha" class="usuario-senha" required>
                </div>
                <div class="metade direita">
                    <h6 class="mini-title upper">Cpf</h6>
                    <input type="text" name="usuario-cpf" class="usuario-cpf" required>
                </div>
                <h6 class="mini-title upper">Telefone</h6>
                <input type="text" name="usuario-telefone" class="usuario-telefone" required>
                <h6 class="mini-title upper">Empresa</h6>
                <select name="usuario-empresa" class="usuario-empresa browser-default" required>
                </select>
                <h6 class="mini-title upper">Tipo Usuário</h6>
                <select name="usuario-tipo-user" class="usuario-tipo-user browser-default" required>
                </select>
                <ul class="lista-usuario-menu lista-colunas-2">
                </ul>
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
        <form id="editUsuario" class="suave editUsuario usuario" enctype="multipart/form-data">
            <h5 class="suave">Editar Usuário <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Dados do Usuário</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">Nome</h6>
                <input type="text" name="usuario-nome" class="usuario-nome" required>
                <h6 class="mini-title upper">Email</h6>
                <input type="email" name="usuario-email" class="usuario-email" required>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Senha</h6>
                    <input type="password" name="usuario-senha" class="usuario-senha" required>
                </div>
                <div class="metade direita">
                    <h6 class="mini-title upper">Cpf</h6>
                    <input type="text" name="usuario-cpf" class="usuario-cpf" required>
                </div>
                <h6 class="mini-title upper">Telefone</h6>
                <input type="text" name="usuario-telefone" class="usuario-telefone" required>
                <h6 class="mini-title upper">Empresa</h6>
                <select name="usuario-empresa" class="usuario-empresa browser-default" required>
                </select>
                <h6 class="mini-title upper">Tipo Usuário</h6>
                <select name="usuario-tipo-user" class="usuario-tipo-user browser-default" required>
                </select>
                <ul class="lista-usuario-menu lista-colunas-2">
                </ul>
                <input type="hidden" name="usuario-cod" class="usuario-cod">
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(".usuario-componente .box-paginadores i b").text(pagination_usuario);
    $(document).ready(function($) {
        $(".usuario-componente #novoUsuario .usuario-cpf").mask("000.000.000-00", {reverse: false});
        $(".usuario-componente #editUsuario .usuario-cpf").mask("000.000.000-00", {reverse: false});
        $(".usuario-componente #novoUsuario .usuario-telefone").mask("(00)00000-0000", {reverse: false});
        $(".usuario-componente #editUsuario .usuario-telefone").mask("(00)00000-0000", {reverse: false});
    });
    
    listarUsuarioUsuario();
    listarEmpresaCadEditUsuario();
</script>