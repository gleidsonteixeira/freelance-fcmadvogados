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
            <h6 class="mini-title upper">Produtos cadastrados</h6>
        </li>
        <li class="center-align">
            <h5 class="condesed">R$ 0</h5>
            <h6 class="mini-title upper">Valor do estoque</h6>
        </li>
        <li class="center-align">
            <h5 class="condesed">R$ 0</h5>
            <h6 class="mini-title upper">Lucro estimado</h6>
        </li>
    </ul>
</div>
<div class="box">
    <div class="box-head">
        <h5 class="suave font">Meus produtos</h5>
        <div class="box-actions suave">
            <button class="cta left suave mini-title upper">novo produto</button>
        </div>
        <div class="box-search">
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
        </div>
    </div>
    <div id="pedidos">
        <ul class="lista-head">
            <li>
                <h6><div class="check"><i class="fa fa-check"></i></div></h6>
                <h6 class="mini-title upper">cod</h6>
                <h6 class="mini-title upper">produto</h6>
                <h6 class="mini-title upper">estoque</h6>
                <h6 class="mini-title upper">compra</h6>
                <h6 class="mini-title upper">venda</h6>
                <h6 class="mini-title upper">-</h6>
            </li>
        </ul>
        <ul class="lista-body">
            <li>
                <h6><div class="check"><i class="fa fa-check"></i></div></h6>
                <h6>01</h6>
                <h6>Nome do produto</h6>
                <h6>0</h6>
                <h6>R$ 0.00</h6>
                <h6>R$ 0.00</h6>
                <h6>
                    <i class="action fa fa-eye ver-produto"></i>
                    <i class="action fa fa-pen"></i>
                    <i class="action fa fa-trash deletar-produto" data-id="0"></i>
                </h6>
            </li>
            <li>
                <h6><div class="check"><i class="fa fa-check"></i></div></h6>
                <h6>02</h6>
                <h6>Nome do produto</h6>
                <h6>0</h6>
                <h6>R$ 0.00</h6>
                <h6>R$ 0.00</h6>
                <h6>
                    <i class="action fa fa-eye ver-produto"></i>
                    <i class="action fa fa-pen"></i>
                    <i class="action fa fa-trash deletar-produto"></i>
                </h6>
            </li>
            <li>
                <h6><div class="check"><i class="fa fa-check"></i></div></h6>
                <h6>03</h6>
                <h6>Nome do produto</h6>
                <h6>0</h6>
                <h6>R$ 0.00</h6>
                <h6>R$ 0.00</h6>
                <h6>
                    <i class="action fa fa-eye ver-produto"></i>
                    <i class="action fa fa-pen"></i>
                    <i class="action fa fa-trash deletar-produto"></i>
                </h6>
            </li>
            <li>
                <h6><div class="check"><i class="fa fa-check"></i></div></h6>
                <h6>04</h6>
                <h6>Nome do produto</h6>
                <h6>0</h6>
                <h6>R$ 0.00</h6>
                <h6>R$ 0.00</h6>
                <h6>
                    <i class="action fa fa-eye ver-produto"></i>
                    <i class="action fa fa-pen"></i>
                    <i class="action fa fa-trash deletar-produto"></i>
                </h6>
            </li>
            <li>
                <h6><div class="check"><i class="fa fa-check"></i></div></h6>
                <h6>05</h6>
                <h6>Nome do produto</h6>
                <h6>0</h6>
                <h6>R$ 0.00</h6>
                <h6>R$ 0.00</h6>
                <h6>
                    <i class="action fa fa-eye ver-produto"></i>
                    <i class="action fa fa-pen"></i>
                    <i class="action fa fa-trash deletar-produto"></i>
                </h6>
            </li>
        </ul>
    </div>
    <div class="box-paginadores">
        <i class="click fa fa-chevron-left"></i>
        <i class="upper"><b>0</b></i>
        <i class="click fa fa-chevron-right"></i>
    </div>
</div>

<div id="verProduto" class="suave gaveta">
    <div class="fechar-gaveta"></div>
    <div class="content suave">
        <h5 class="suave font">Nome do produto <i class="material-icons right click suave">close</i></h5>
    </div>
</div>

<script>

    function delatarProduto(){
        $(document).on("click",".deletar-produto",function(){
            criaAlerta(1,"Deseja realmente apagar esse produto?",2000);
        });
    } delatarProduto();

    function verProduto(){
        $(document).on("click",".ver-produto",function(){
            $("#verProduto, #verProduto .content").addClass("active");
        });
    } verProduto();

    function escolherPeriodo(){
        $(".escolher-periodo").click(function(){
            $(".box-period, .box-period-content").toggleClass("active");
        });
    } escolherPeriodo();

    $(".gaveta h5 i, .fechar-gaveta").click(function(){
        $(".gaveta, .gaveta .content").removeClass("active");
    });

</script>