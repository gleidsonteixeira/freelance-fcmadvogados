<div class="box suave">
    <div class="box-head">
        <h5 class="suave condesed">Categoria de Menu</h5>
        <div class="box-actions suave">
            <button class="cta left suave mini-title upper novo-cat-menu">nova Categoria</button>
        </div>
        <div class="box-search">
            <input type="text" placeholder="Buscar" name="cat-menu-buscar" class="cat-menu-buscar">
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
    <div id="cat-menu">
        <ul class="lista-head">
            <li>
                <h6 class="mini-title upper">cod</h6>
                <h6 class="mini-title upper">Nome</h6>
                <h6 class="mini-title upper">Componente</h6>
                <h6 class="mini-title upper">Ordem</h6>
                <h6 class="mini-title upper">Tipo</h6>
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
<div class="box suave">
    <div class="box-head">
        <h5 class="suave condesed">Menu</h5>
        <div class="box-actions suave">
            <button class="cta left suave mini-title upper novo-menu">novo Menu</button>
        </div>
        <div class="box-search">
            <input type="text" placeholder="Buscar" name="menu-buscar" class="menu-buscar">
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
    <div id="menu">
        <ul class="lista-head">
            <li>
                <h6 class="mini-title upper">cod</h6>
                <h6 class="mini-title upper">Nome</h6>
                <h6 class="mini-title upper">Componente</h6>
                <h6 class="mini-title upper">Categoria</h6>
                <h6 class="mini-title upper">Ordem</h6>
                <h6 class="mini-title upper">Tipo</h6>
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
    <form id="novoMenu" class="suave novoMenu" enctype="multipart/form-data">
        <h5 class="suave">Novo Usuário <i class="material-icons right click suave">close</i></h5>
        <div class="form-content suave">
            <span>Dados do Usuário</span>
            <div class="clear"></div>
            <h6 class="mini-title upper">Nome</h6>
            <input type="text" name="menu-nome" class="menu-nome" required>
            <h6 class="mini-title upper">Email</h6>
            <input type="email" name="menu-email" class="menu-email" required>
            <div class="metade esquerda">
                <h6 class="mini-title upper">Senha</h6>
                <input type="password" name="menu-senha" class="menu-senha" required>
            </div>
            <div class="metade direita">
                <h6 class="mini-title upper">Cpf</h6>
                <input type="text" name="menu-cpf" class="menu-cpf" required>
            </div>
            <h6 class="mini-title upper">Telefone</h6>
            <input type="text" name="menu-telefone" class="menu-telefone" required>
            <h6 class="mini-title upper">Empresa</h6>
            <select name="menu-empresa" class="menu-empresa browser-default" required>
            </select>
            <ul class="lista-menu-menu lista-colunas-2">
            </ul>
            <button type="submit" class="cta mini-title upper suave">confirmar</button>
        </div>
    </form>
    <form id="editMenu" class="suave editMenu" enctype="multipart/form-data">
        <h5 class="suave">Editar Usuário <i class="material-icons right click suave">close</i></h5>
        <div class="form-content suave">
            <span>Dados do Usuário</span>
            <div class="clear"></div>
            <h6 class="mini-title upper">Nome</h6>
            <input type="text" name="menu-nome" class="menu-nome" required>
            <h6 class="mini-title upper">Email</h6>
            <input type="email" name="menu-email" class="menu-email" required>
            <div class="metade esquerda">
                <h6 class="mini-title upper">Senha</h6>
                <input type="password" name="menu-senha" class="menu-senha" required>
            </div>
            <div class="metade direita">
                <h6 class="mini-title upper">Cpf</h6>
                <input type="text" name="menu-cpf" class="menu-cpf" required>
            </div>
            <h6 class="mini-title upper">Telefone</h6>
            <input type="text" name="menu-telefone" class="menu-telefone" required>
            <h6 class="mini-title upper">Empresa</h6>
            <select name="menu-empresa" class="menu-empresa browser-default" required>
            </select>
            <ul class="lista-menu-menu lista-colunas-2">
            </ul>
            <input type="hidden" name="menu-cod" class="menu-cod">
            <button type="submit" class="cta mini-title upper suave">confirmar</button>
        </div>
    </form>
</div>
