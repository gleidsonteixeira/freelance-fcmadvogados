<div class="box dados pedidos">
    <div class="box-head">
        <h5 class="suave font">Resumo</h5>
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
            <h5 class="condesed">0</h5>
            <h6 class="mini-title upper">Total de pedidos</h6>
        </li>
        <li class="center-align">
            <h5 class="condesed">0</h5>
            <h6 class="mini-title upper">Pedidos aguardando</h6>
        </li>
        <li class="center-align">
            <h5 class="condesed">0</h5>
            <h6 class="mini-title upper">Pedidos cancelados</h6>
        </li>
        <li class="center-align">
            <h5 class="condesed">R$ 0</h5>
            <h6 class="mini-title upper">Total faturado</h6>
        </li>
        <li class="center-align">
            <h5 class="condesed">R$ 0</h5>
            <h6 class="mini-title upper">Aguardando receber</h6>
        </li>
        <li class="center-align">
            <h5 class="condesed">R$ 0</h5>
            <h6 class="mini-title upper">Lucro líquido</h6>
        </li>
    </ul>
</div>
<div class="box">
    <div class="box-head">
        <h5 class="suave font">Meus pedidos</h5>
        <div class="box-actions suave hide">
            <button class="cta suave circle"><i class="fa fa-print"></i></button>
            <button class="cta suave circle"><i class="fa fa-trash"></i></button>
            <!-- <button class="cta left suave mini-title upper">action btn</button> -->
        </div>
        <div class="box-search">
            <input type="text" placeholder="Buscar">
            <i class="fa fa-search suave"></i>
        </div>
        <div class="box-filter">
            <select class="browser-default">
                <option value="1">Cod</option>
                <option value="2">Cliente</option>
                <option value="3">Pagamento</option>
                <option value="4">Data</option>
                <option value="5">Status</option>
                <option value="6">Valor</option>
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
                <h6 class="mini-title upper">cliente</h6>
                <h6 class="mini-title upper">pagamento</h6>
                <h6 class="mini-title upper">data</h6>
                <h6 class="mini-title upper">status</h6>
                <h6 class="mini-title upper">valor</h6>
                <h6 class="mini-title upper">-</h6>
            </li>
        </ul>
        <ul class="lista-body">
            <li>
                <h6><div class="check"><i class="fa fa-check"></i></div></h6>
                <h6>01</h6>
                <h6>Nome do cliente</h6>
                <h6>Crédito</h6>
                <h6>00-00-0000</h6>
                <h6>Pago</h6>
                <h6>R$ 0.00</h6>
                <h6>
                    <i class="action fa fa-eye ver-pedido"></i>
                    <i class="action fa fa-print"></i>
                    <i class="action fa fa-trash deletar-pedido" data-id="0"></i>
                </h6>
            </li>
            <li>
                <h6><div class="check"><i class="fa fa-check"></i></div></h6>
                <h6>02</h6>
                <h6>Nome do cliente</h6>
                <h6>Crédito</h6>
                <h6>00-00-0000</h6>
                <h6>Pago</h6>
                <h6>R$ 0.00</h6>
                <h6>
                    <i class="action fa fa-eye ver-pedido"></i>
                    <i class="action fa fa-print"></i>
                    <i class="action fa fa-trash deletar-pedido"></i>
                </h6>
            </li>
            <li>
                <h6><div class="check"><i class="fa fa-check"></i></div></h6>
                <h6>03</h6>
                <h6>Nome do cliente</h6>
                <h6>Débito</h6>
                <h6>00-00-0000</h6>
                <h6>Aguardando</h6>
                <h6>R$ 0.00</h6>
                <h6>
                    <i class="action fa fa-eye ver-pedido"></i>
                    <i class="action fa fa-print"></i>
                    <i class="action fa fa-trash deletar-pedido"></i>
                </h6>
            </li>
            <li>
                <h6><div class="check"><i class="fa fa-check"></i></div></h6>
                <h6>04</h6>
                <h6>Nome do cliente</h6>
                <h6>Transferência</h6>
                <h6>00-00-0000</h6>
                <h6>Aguardando</h6>
                <h6>R$ 0.00</h6>
                <h6>
                    <i class="action fa fa-eye ver-pedido"></i>
                    <i class="action fa fa-print"></i>
                    <i class="action fa fa-trash deletar-pedido"></i>
                </h6>
            </li>
            <li>
                <h6><div class="check"><i class="fa fa-check"></i></div></h6>
                <h6>05</h6>
                <h6>Nome do cliente</h6>
                <h6>Boleto</h6>
                <h6>00-00-0000</h6>
                <h6>Cancelado</h6>
                <h6>R$ 0.00</h6>
                <h6>
                    <i class="action fa fa-eye ver-pedido"></i>
                    <i class="action fa fa-print"></i>
                    <i class="action fa fa-trash deletar-pedido"></i>
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

<div id="verPedido" class="suave gaveta">
    <div class="fechar-gaveta"></div>
    <div class="content suave">
        <h5 class="suave font">Pedido #0 <i class="material-icons right click suave">close</i></h5>
    </div>
</div>

<script>
    function delatarPedido(){
        $(document).on("click",".deletar-pedido",function(){
            criaAlerta(1,"Deseja realmente apagar esse pedido?",2000);
        });
    } delatarPedido();

    function verPedido(){
        $(document).on("click",".ver-pedido",function(){
            $("#verPedido, #verPedido .content").addClass("active");
        });
    } verPedido();

    function checkbox(){
        $(".check").click(function(){
            $(this).toggleClass("active");
        });
        $(".lista-head .check").click(function(){
            if($(".lista-head .check").hasClass("active")){
                $(".lista-body .check").addClass("active");
            }else{
                $(".lista-body .check").removeClass("active");
            }
            $(".box-actions-extra").toggleClass("active");
        });
    } checkbox();

    function checkData(){
        $(".box-period .check").click(function(){
            if($(".box-period .check").hasClass("active")){
                $(".box-period select").attr("disabled",true);
                $(".box-period input").attr("disabled",false);
            }else{
                $(".box-period select").attr("disabled",false);
                $(".box-period input").attr("disabled",true);
            }
        });
        $(document).on("click",".box-period.active",function(){
            if($(".box-period .check").hasClass("active")){
                $(".box-period h6").text($("#dataDe").val()+' | '+$("#dataAte").val());
            }else{
                $(".box-period h6").text($(".box-period select option:selected").text());
            }
        });
    } checkData();

    function quadrado(element){
        $(element).height($(element).width());
    } 
    
    function setDataPicker(){
        $("#dataDe, #dataAte").datepicker({
            dateFormat: "dd-mm-yy",
            dayNames: ["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"],
            dayNamesMin: ["D","S","T","Q","Q","S","S"],
            monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ]
        });
    } setDataPicker();

    function escolherPeriodo(){
        $(".escolher-periodo").click(function(){
            $(".box-period, .box-period-content").toggleClass("active");
        });
    } escolherPeriodo();

    $(".gaveta h5 i, .fechar-gaveta").click(function(){
        $(".gaveta, .gaveta .content").removeClass("active");
    });

</script>