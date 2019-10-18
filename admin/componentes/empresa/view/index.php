<div id="empresa-componente" class="empresa-componente">
    <div class="box dados empresa">
        <div class="box-head">
            <h5 class="suave font">Empresas por Setor</h5>
        </div>
        <ul class="lista-resumo">
            <li class="center-align">
                <h5 class="condesed">0</h5>
                <h6 class="mini-title upper">FÁBRICA DE SOFTWARE</h6>
            </li>
            <li class="center-align">
                <h5 class="condesed">0</h5>
                <h6 class="mini-title upper">INFRAESTRUTURA</h6>
            </li>
            <li class="center-align">
                <h5 class="condesed">0</h5>
                <h6 class="mini-title upper">CONSULTORIA</h6>
            </li>
            <li class="center-align">
                <h5 class="condesed">0</h5>
                <h6 class="mini-title upper">INSTALAÇÃO DE CÂMERAS</h6>
            </li>
            <li class="center-align">
                <h5 class="condesed">0</h5>
                <h6 class="mini-title upper">DATA CENTER</h6>
            </li>
        </ul>
    </div>
    <div class="box suave">
        <div class="box-head">
            <h5 class="suave font">Empresa</h5>
            <div class="box-actions suave">
                <button class="cta left suave mini-title upper novo-empresa">nova Empresa <i class="fa fa-plus"></i></button>
            </div>
            <div class="box-search">
                <input type="text" placeholder="Buscar" name="empresa-buscar" class="empresa-buscar">
                <i class="fa fa-search suave"></i>
            </div>
            <div class="box-filter hide">
                <select class="browser-default filtro-empresa">
                    <option value="EMP_COD" selected>Cod</option>
                    <option value="EMP_NFANTASIA">Nome</option>
                    <option value="EMP_EMAIL">Email</option>
                </select>
                <i class="fa fa-filter suave"></i>
            </div>
            <div class="box-actions-extra">
                <button class="cta suave circle"><i class="fa fa-print"></i></button>
                <button class="cta suave circle"><i class="fa fa-trash"></i></button>
            </div>
        </div>
        <div id="empresa">
            <ul class="lista-head">
                <li>
                    <h6 class="mini-title upper">cod</h6>
                    <h6 class="mini-title upper">Nome Fantasia</h6>
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
        <form id="novoEmpresa" class="suave novoEmpresa" enctype="multipart/form-data">
            <h5 class="suave font">Nova Empresa <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Dados da Empresa</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">Razão Social</h6>
                <input type="text" name="empresa-rzsocial" class="empresa-rzsocial" required>
                <h6 class="mini-title upper">Nome Fantasia</h6>
                <input type="text" name="empresa-nfantasia" class="empresa-nfantasia" required>
                <h6 class="mini-title upper">Email</h6>
                <input type="email" name="empresa-email" class="empresa-email" required>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">CNPJ</h6>
                    <input type="text" name="empresa-cnpj" class="empresa-cnpj" required>
                </div>
                <div class="metade direita">
                    <h6 class="mini-title upper">Telefone</h6>
                    <input type="text" name="empresa-telefone" class="empresa-telefone browser-default" required>
                </div>
                <h6 class="mini-title upper">Tipo da Empresa</h6>
                <select name="empresa-tempresa" class="empresa-tempresa browser-default" required>
                    <option value="ADM">Minha Empresa</option>
                    <option value="CLI">Empresa de Cliente</option>
                </select>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Estados</h6>
                    <select name="empresa-estados" class="empresa-estados browser-default" required>
                    </select>
                </div>
                <div class="metade direita">
                    <h6 class="mini-title upper">Cidades</h6>
                    <select name="empresa-cidades" class="empresa-cidades browser-default" required>
                    </select>
                </div>
                <h6 class="mini-title upper">Endereço</h6>
                <input type="text" name="empresa-endereco" class="empresa-endereco" required>
                <h6 class="mini-title upper">Email do Responsável</h6>
                <input type="email" name="empresa-eresponsavel" class="empresa-eresponsavel" required>
                <h6 class="mini-title upper">Setor</h6>
                <ul class="lista-empresa-setor">
                </ul>
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
        <form id="editEmpresa" class="suave editEmpresa" enctype="multipart/form-data">
            <h5 class="suave font">Editar Empresa <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Dados da Empresa</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">Razão Social</h6>
                <input type="text" name="empresa-rzsocial" class="empresa-rzsocial" required>
                <h6 class="mini-title upper">Nome Fantasia</h6>
                <input type="text" name="empresa-nfantasia" class="empresa-nfantasia" required>
                <h6 class="mini-title upper">Email</h6>
                <input type="email" name="empresa-email" class="empresa-email" required>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">CNPJ</h6>
                    <input type="text" name="empresa-cnpj" class="empresa-cnpj" required>
                </div>
                <div class="metade direita">
                    <h6 class="mini-title upper">Telefone</h6>
                    <input type="text" name="empresa-telefone" class="empresa-telefone browser-default" required>
                </div>
                <h6 class="mini-title upper">Tipo da Empresa</h6>
                <select name="empresa-tempresa" class="empresa-tempresa browser-default" required>
                    <option value="ADM">Minha Empresa</option>
                    <option value="CLI">Empresa de Cliente</option>
                </select>
                <div class="metade esquerda">
                    <h6 class="mini-title upper">Estados</h6>
                    <select name="empresa-estados" class="empresa-estados browser-default" required>
                    </select>
                </div>
                <div class="metade direita">
                    <h6 class="mini-title upper">Cidades</h6>
                    <select name="empresa-cidades" class="empresa-cidades browser-default" required>
                    </select>
                </div>
                <h6 class="mini-title upper">Endereço</h6>
                <input type="text" name="empresa-endereco" class="empresa-endereco" required>
                <h6 class="mini-title upper">Email do Responsável</h6>
                <input type="email" name="empresa-eresponsavel" class="empresa-eresponsavel" required>
                <h6 class="mini-title upper">Setor</h6>
                <ul class="lista-empresa-setor">
                </ul>
                <input type="hidden" name="empresa-cod" class="empresa-cod">
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(".empresa-componente .box-paginadores i b").text(pagination_empresa);
    $(document).ready(function($) {
        $(".empresa-componente #novoEmpresa .empresa-cnpj").mask("00.000.0000/0000-00", {reverse: false});
        $(".empresa-componente #editEmpresa .empresa-cnpj").mask("00.000.0000/0000-00", {reverse: false});
        $(".empresa-componente #novoEmpresa .empresa-telefone").mask("(00)00000-0000", {reverse: false});
        $(".empresa-componente #editEmpresa .empresa-telefone").mask("(00)00000-0000", {reverse: false});
    });

    listarResumoEmpresa();
    listarEmpresaEmpresa();
    listarSetoresEmpresaCad();
    listarEstadosEmpresaCad();
</script>