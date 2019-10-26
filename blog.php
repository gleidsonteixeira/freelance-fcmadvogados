<?php
    include("control/header.php");
?>

    <main>
        <section id="blog">
            <div class="posts"></div>
            <div class="anuncio">
                <form action="" id="form-buscar" class="form-buscar busca">
                    <input type="hidden" name="tipo" value="BLOG">
                    <input type="text" name="postbusca" id="faqbusca" class="font" placeholder="Estou procurando...">
                    <button type="submit" class="suave font click">Procurar</button>
                </form>
            </div>
        </section>
    </main>
    
    <?php
        include("control/footer.php");
    ?>
    
    <!-- ALERTAS -->
    <div id="alerta" class="suave">
        <i class="fa fa-exclamation-circle icon suave"></i>
        <p class="white-text suave">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <div class="opcoes right-align suave hide">
            <button class="mini-title upper green accent-3 white-text confirmar"><i class="fa fa-check"></i>sim</button>
            <button class="mini-title upper red white-text cancelar"><i class="fa fa-times"></i>não</button>
        </div>
    </div>

	<script src="js/jquery.js" type="application/javascript"></script>
    <script src="js/jquery.mask.js" type="application/javascript"></script>
    <script src="js/script.js" type="application/javascript"></script>
    <script src="js/blogpost.js" type="text/javascript"></script>

    <script>
        var tamanhoNav = 0;
        $("nav ul li").each(function(){
            $(this).each(function(){
                tamanhoNav += $(this).width() + 3;
            });
            $("nav ul").width(tamanhoNav);
        });
    </script>
</body>
</html>