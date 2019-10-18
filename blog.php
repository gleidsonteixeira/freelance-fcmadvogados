<?php
    include("control/header.php");
?>

    <main>
        <section class="big-title cor1 menor">
            <h1 class="pequeno"><b class="font upper pequeno">#OBJ</b><b class="font upper white-text pequeno">COM</b><b class="font upper pequeno">VC</b></h1>
            <!-- <h3 class="font white-text" style="max-width: initial;">Respostas para suas dúvidas.</h3> -->
        </section>
        <section id="blog">
            <form action="" id="form-buscar" class="form-buscar busca">
                <input type="hidden" name="tipo" value="BLOG">
                <input type="text" name="postbusca" id="faqbusca" class="font" placeholder="Estou procurando...">
                <button type="submit" class="suave font click">Procurar</button>
            </form>
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
                <figure>
                    <a href="#"><img src="img/ads1.png" alt="adsense" class="suave"></a>
                </figure>
            </div>
        </section>
        
        <section id="contratar" style="padding-bottom:0;"></section>
    </main>
    
    <footer class="interno">
        <div class="conteudo">
            <div class="texto">
                <h3><img src="img/logo-objetive-ti-branca.png" class="responsive-img"></h3>
                <p>A Objetive TI é uma empresa fundada e situada na cidade de Fortaleza-CE, formada por profissionais capacitados nas mais diversas áreas da Tecnologia, tais como implantação e consultoria de sistemas, desenvolvimento e infraestrutura.</p>
            </div>
            <div class="infos">
                <ul>
                    <li class="title">Empresa</li>
                    <!-- <li class="mini-title upper"><a href="contato.html">Solicitar orçamentos</a></li> -->
                    <li class="mini-title upper"><a href="http://objetiveti.com.br/sistema">Área do cliente</a></li>
                    <li class="mini-title upper"><a href="sobre.html">Sobre</a></li>
                    <li class="mini-title upper"><a href="https://objetiveti.com.br/blog">Blog</a></li>
                </ul>
                <ul>
                    <li class="title">Soluções</li>
                    <li class="mini-title upper"><a href="data-center.php">Data center</a></li>
                    <li class="mini-title upper"><a href="consultoria.php">Consultoria ERP</a></li>
                    <li class="mini-title upper"><a href="fabrica.php">Fábrica de software</a></li>
                    <li class="mini-title upper"><a href="infraestrutura.php">Infraestrutura</a></li>
                    <li class="mini-title upper"><a href="cameras.php">Instalação de Câmeras</a></li>
                </ul>
                <ul>
                    <li class="title">Escritório</li>
                    <li class="mini-title upper">Fortaleza CE<br>Av Des. Moreira 1701,<br>sala 807</li>
                    <li class="mini-title upper"><a href="mailto:contato@objetiveti.com.br" class="addBannerClick" data-id="7" data-tipo="CTT">contato@objetiveti.com.br</a></li>
                    <li class="mini-title upper">---</li>
                    <li class="mini-title upper">
                        <a href="tel:8530477001" class="addBannerClick" data-id="6" data-tipo="CTT">(85)3047-7001</a>
                         <!-- / <a href="tel:+8530477001">00000-0000</a> -->
                    </li>
                </ul>
            </div>
            <ul class="redes-sociais">
                <li><a target="_blank" href="https://www.facebook.com/ObjetiveTI/" class="suave addBannerClick" data-id="8" data-tipo="CTT"><img src="img/ico6.png"></a></li>
                <li><a target="_blank" href="https://www.youtube.com/channel/UCqEzLbAtRRACyG-jpCN2W5A" class="suave addBannerClick" data-id="9" data-tipo="CTT"><img src="img/ico7.png"></a></li>
                <li><a target="_blank" href="https://www.instagram.com/objetiveti/" class="suave addBannerClick" data-id="10" data-tipo="CTT"><img src="img/ico8.png"></a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <h6 class="rodape">
            &copy 2018 Objetive TI<br>Feita com <i class="material-icons" style="font-size:10px;">favorite</i> para você<br>Todos os direitos reservados.</b>
        </h6>
    </footer>
    
    <!-- ALERTAS -->
    <div id="alerta" class="suave">
        <i class="fa fa-exclamation-circle icon suave"></i>
        <p class="white-text suave">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <div class="opcoes right-align suave hide">
            <button class="mini-title upper green accent-3 white-text confirmar"><i class="fa fa-check"></i>sim</button>
            <button class="mini-title upper red white-text cancelar"><i class="fa fa-times"></i>não</button>
        </div>
    </div>

    <a class="voltar suave click"><i class="material-icons">arrow_forward</i></a>

	<script src="js/jquery.js" type="application/javascript"></script>
    <script src="js/jquery.mask.js" type="application/javascript"></script>
    <script src="js/script.js" type="application/javascript"></script>
    <script src="js/blogpost.js" type="text/javascript"></script>

    <script>
        
    </script>
</body>
</html>