<?php
    include("control/header.php");
?>

    <main>
        <section class="big-title cor4">
            <h1 class="font suave"><b class="font suave upper fabrica pequeno"></b></h1>
            <h2 class="font white-text">é na Objetive TI</h2>
            <h3 class="font white-text">Solução e agilidade na sua necessidade.</h3>
            <!-- <div class="video-box suave">
                <i class="material-icons suave click">close</i>
                <iframe width="800" height="450" src="https://www.youtube-nocookie.com/embed/H8eDU9CMrOU?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> -->
        </section>
        <section id="descricao-servico">
            <div class="imagem">
                <img src="img/identifique-um-problema.png">
            </div>
            <div class="conteudo">
                <h5 class="font cor4-text">O que é</h5>
                <p>A fábrica de software cria um produto sob medida para cada cliente e utiliza em suas operações indicadores de qualidade e de produtividade em cada etapa do ciclo de desenvolvimento.</p>
                <p>Criação e desenvolvimento de Sites, sistemas web, aplicativos, sistemas desktop e etc...</p>
                <h5 class="font cor4-text">Problemas latentes que ocorrem com a falta de uma boa Fábrica de software são:</h5>
                <ul>
                    <li>Ter ou querer algo que não existe no mercado…(ainda).</li>
                    <li>Ter um processo manual que lhe consome tempo e dinheiro.</li>
                    <li>Falta de contato digital com os seus clientes e com o público.</li>
                    <li>Falta de dados.</li>
                </ul>
                <h5 class="font cor4-text">Isso ocorre com você?</h5>
            </div>
        </section>
        <section id="vantagens" class="gradi4">
            <h5 class="font">Mas fique tranquilo, nós temos a solução:</h5>
            <ul>
                <li class="interno metade">
                    <img src="img/fabrica-de-software-construir.png" alt="Construção de Software">
                    <h4 class="font center">Construção de software sob demanda.</h4>
                </li>
                <li class="interno metade">
                    <img src="img/fabrica-de-software-automaizacao.png" alt="Automatização de Processos">
                    <h4 class="font center">Automatização de processos.</h4>
                </li>
                <li class="interno metade">
                    <img src="img/fabrica-de-software-analise.png" alt="Gerenciamento">
                    <h4 class="font center">Gerenciamento de dados analíticos.</h4>
                </li>
                <li class="interno metade">
                    <img src="img/fabrica-de-software-movel.png" alt="Sistemas móveis">
                    <h4 class="font center">Criação de sistemas móveis.</h4>
                </li>
            </ul>
            <h6 class="font center"><em>Você merece eficiência!</em></h5>
            <div class="detalhe"></div>
        </section>
        <section id="beneficios">
            <div class="conteudo">
                <h2 class="font cor4-text">Benefícios do nosso produto</h2>
                <ul>
                    <li><i class="material-icons cor4-text">done</i> SEO otimizados em sites</li>
                    <li><i class="material-icons cor4-text">done</i> Oferecemos Sistemas e sites já responsivos.</li>
                    <li><i class="material-icons cor4-text">done</i> Preço atraente sem perda na qualidade.</li>
                    <li><i class="material-icons cor4-text">done</i> Acima de tudo temos o cuidado que outras empresas não têm no quesito amparo quando é necessário.</li>
                    <li><i class="material-icons cor4-text">done</i> Incorporamos novas tecnologias.</li>
                    <li><i class="material-icons cor4-text">done</i> Melhorias de performance.</li>
                </ul>
            </div>
        </section>
        <section id="clientes" class="interno">
            <h2 class="font center cor4-text">Clientes atendidos</h2>
            <ul class="center">
                <li><img src="img/clientes/logos principais clientes-15.png"></li>
                <li><img src="img/clientes/logos principais clientes-11.png"></li>
                <li><img src="img/clientes/logos principais clientes-01.png"></li>
                <li><img src="img/clientes/logos principais clientes-14.png"></li>
                <li><img src="img/clientes/logos principais clientes-07.png"></li>
            </ul>
        </section>
        <section id="contratar" class="gradi4">
            <form class="white" method="post" action="enviarFabrica.php" enctype="multipart/form-data">
                <h2 class="font center grey-text text-darken-2">Sua empresa precisa de ajuda para criar um software que atenda suas necessidades? solicite uma proposta.</h2>
                <h6 class="mini-title upper grey-text text-darken-2">digite seu nome</h6>
                <input type="text" name="nome">
                <h6 class="mini-title upper grey-text text-darken-2">digite seu email</h6>
                <input type="email" name="email">
                <h6 class="mini-title upper grey-text text-darken-2">digite seu telefone</h6>
                <input type="tel" name="telefone" id="fabricaTelefone">
                <h6 class="mini-title upper grey-text text-darken-2">qual o assunto?</h6>
                <input type="text" name="assunto">
                <button class="cta mini-title upper suave click">Solicitar</button>
            </form>
            <div class="detalhe"></div>
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
            &copy 2018 Objetive TI<br>Feita com <i class="material-icons" style="font-size:10px;color:#B7CCD4;">favorite</i> para você<br>Todos os direitos reservados.</b>
        </h6>
    </footer>
    <a class="voltar suave click"><i class="material-icons">arrow_forward</i></a>

	<script src="js/jquery.js" type="application/javascript"></script>
    <script src="js/typed.js" type="application/javascript"></script>
    <script src="js/jquery.mask.js" type="application/javascript"></script>
    <script src="js/script.js" type="application/javascript"></script>
    <script>
        var typed3 = new Typed('.fabrica', {
            strings: ["Fábrica de software", "Sistemas automatizados"],
            typeSpeed: 80,
            startDelay: 200,
            backSpeed: 50,
            backDelay: 1500,
            loop: true,
            loopCount: Infinity
        });
        $("#fabricaTelefone").mask('(00) 00000-0000');
    </script>

</body>
</html>