<?php
    include("control/header.php");
?>

    <main>
        <section class="big-title cor1">
            <h1 class="font"><b class="font upper sobre"></b></h1>
            <h2 class="font white-text">é na Objetive TI</h2>
        </section>
        <section id="sobre">
            <div class="imagem">
                <img src="img/logo-grande.png" alt="Objetive TI">
            </div>
            <div class="conteudo">
                <h2 class="font cor1-text">A Objetive TI</h2>
                <p>Fundada na ensolarada Fortaleza a <b class="cor1-text">Objetive TI</b> é uma empresa preocupada com o cliente, em sua busca diária para melhorar e inovar sempre já estendemos nossos serviços para todo o país.</p>
                <p>Nossos colaboradores apaixonados pelo que fazem se orgulham em dizer que melhoramos e facilitamos os objetivos de todas as empresas que completaram a nossa história até aqui, nossos combustível é inspirar a solução de problemas por meio da tecnologia.</p>
                <p>Estamos aqui para te ouvir, sempre!.</p>
            </div>
            
        </section>
        <section id="como">
            <h2 class="font cor1-text">O que é Objetive TI</h2>
            <div class="modo">
                <ul>
                    <li class="click suave como1"><h6 class="mini-title upper">Missão</h6></li>
                    <li class="click suave como2"><h6 class="mini-title upper">Visão</h6></li>
                    <li class="click suave como3"><h6 class="mini-title upper">Valores</h6></li>
                </ul>
                <p class="text1 active">Existimos para oferecer aos nossos clientes soluções tecnológicas que superam suas expectativas, proporcionando produtividade, agilidade e segurança em suas histórias.</p>
                <p class="text2">Ser referência solucionando os problemas das empresas e assim transformar o mundo.</p>
                <p class="text3">Proximidade com o cliente, inovação, disponibilidade e dedicação sempre.</p>
            </div>
            <div class="modo-img">
                <img class="imagem1 suave active" src="img/missao.png">
                <img class="imagem2 suave" src="img/visao.png">
                <img class="imagem3 suave" src="img/valores.png">
            </div>
        </section>
        <section id="familia">
            <img src="img/familia-objetive2.webp" alt="Família Objetive TI">
        </section>
        
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
    <a class="voltar suave click"><i class="material-icons">arrow_forward</i></a>

	<script src="js/jquery.js" type="application/javascript"></script>
    <script src="js/typed.js" type="application/javascript"></script>
    <script src="js/jquery.mask.js" type="application/javascript"></script>
    <script src="js/script.js" type="application/javascript"></script>
    <script>
        var typed5 = new Typed('.sobre', {
            strings: ["Inovação","Criatividade","Compromisso","Agilidade","Dedicação","Respeito","Atitude","Tecnologia"],
            typeSpeed: 80,
            startDelay: 200,
            backSpeed: 50,
            backDelay: 1500,
            loop: true,
            loopCount: Infinity
        });
    </script>
</body>
</html>