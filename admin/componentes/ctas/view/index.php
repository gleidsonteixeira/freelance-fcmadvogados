<div id="cta-componente" class="cta-componente">  
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
                <h5 class="condesed cta-cadastrados">0</h5>
                <h6 class="mini-title upper">ctas cadastrados</h6>
            </li>
            <li class="center-align">
                <h5 class="condesed cta-avaliacoes">0</h5>
                <h6 class="mini-title upper">Avaliações externas</h6>
            </li>
            <li class="center-align hide">
                <h5 class="condesed">R$ 0</h5>
                <h6 class="mini-title upper">Lucro estimado</h6>
            </li>
        </ul>
        <canvas id="grafico-ctas-mes" style="width:100%;height:300px;margin-top:10px;"></canvas>
    </div>

    <div class="box">
        <div class="box-head">
            <h5 class="suave font">CTA´S do site</h5>
            <div class="box-actions suave">
                <button class="cta left suave mini-title upper novo-cta">novo cta <i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div id="ctas">
            <ul class="lista-head">
                <li>
                    <h6 class="mini-title upper">cod</h6>
                    <h6 class="mini-title upper">cta</h6>
                    <h6 class="mini-title upper">clicks</h6>
                    <h6 class="mini-title upper">-</h6>
                </li>
            </ul>
            <ul class="lista-body loading active"></ul>
        </div>
        <div class="box-paginadores">
        </div>
    </div>

    <div id="gaveta" class="suave">
        <div class="fechar-gaveta"></div>
        <form id="novoCta" class="suave" enctype="multipart/form-data">
            <h5 class="suave font">Novo CTA <i class="material-icons right click suave">close</i></h5>
            <div class="form-content suave">
                <span>Dados do CTA</span>
                <div class="clear"></div>
                <h6 class="mini-title upper">nome do cta</h6>
                <input type="text" name="cta-nome" class="cta-nome" required>
                <div class="clear"></div>
                <button type="submit" class="cta mini-title upper suave">confirmar</button>
            </div>
        </form>
    </div>

</div>
<script src="../js/chart.js"></script>
<script>
    listarCTA();
    // function delatarProduto(){
    //     $(document).on("click",".deletar-produto",function(){
    //         criaAlerta(1,"Deseja realmente apagar esse produto?",2000);
    //     });
    // } delatarProduto();

    // function verProduto(){
    //     $(document).on("click",".ver-produto",function(){
    //         $("#verProduto, #verProduto .content").addClass("active");
    //     });
    // } verProduto();

    // function escolherPeriodo(){
    //     $(".escolher-periodo").click(function(){
    //         $(".box-period, .box-period-content").toggleClass("active");
    //     });
    // } escolherPeriodo();

    $(".novo-cta").click(function(){
        $("#gaveta, #novoCta").addClass("active");
    });

    $("#gaveta h5 i, .fechar-gaveta").click(function(){
        $("#gaveta, #gaveta #novoCta").removeClass("active");
    });

</script>