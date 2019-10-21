<?php
    include("control/header.php");
?>

    <main>
        <section id="blog">
            <div class="posts">
  <!--               <article>
                    <a href="">
                        <figure>
                            <img src="img/bg.jpg" alt="banner">
                        </figure>
                        <header>
                            <h6 class="mini-title upper categoria white-text cor1">case de sucesso</h6>
                            <h2 class="font">[Case de sucesso] Como um site novo impactou em nossa presença na internet</h2>
                            <h6 class="mini-title upper">por <span class="cor1-text">ISABELLE CHRISTINE</span> em <span class="cor1-text">15 DE JULHO DE 2019</span></h6>
                        </header>
                        <p>Você já deve ter ouvido falar o ditado “em casa de ferreiro o espeto é de pau” pois é, Quer saber como reformulamos o nosso site e com isso conseguimos…</p>
                    </a>
                </article> -->
                <!-- <article>
                    <a href="">
                        <figure>
                            <img src="img/bg.jpg" alt="banner">
                        </figure>
                        <header>
                            <h6 class="mini-title upper categoria white-text cor1">E-COMMERCE</h6>
                            <h2 class="font">Você já ouviu falar do ”barato que sai caro”? Porque não fazer um site em plataformas prontas</h2>
                            <h6 class="mini-title upper">por <span class="cor1-text">ISABELLE CHRISTINE</span> em <span class="cor1-text">15 DE JULHO DE 2019</span></h6>
                        </header>
                        <p>A facilidade de clicar e arrastar e em poucos minutos ter um site pronto seduz as pessoas a recorrerem a plataformas prontas, mas será que vale mesmo a pena? não</p>
                    </a>
                </article> -->
  <!--               <div class="paginacao">
                    <ul>
                        <li class="active">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>Última >></li>
                    </ul>
                    <h6 class="mini-title upper">pág. 1 de 1000</h6>
                </div> -->
            </div>
            <div class="anuncio">
                <form action="" id="form-buscar" class="form-buscar busca">
                    <input type="hidden" name="tipo" value="BLOG">
                    <input type="text" name="postbusca" id="faqbusca" class="font" placeholder="Estou procurando...">
                    <button type="submit" class="suave font click">Procurar</button>
                </form>
                <figure>
                    <a href="#"><img src="img/ads1.png" alt="adsense" class="suave"></a>
                </figure>
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
        
    </script>
</body>
</html>