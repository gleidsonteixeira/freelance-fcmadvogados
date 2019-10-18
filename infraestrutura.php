<?php
    include("control/header.php");
?>

    <main>
        <section class="big-title cor3">
            <h1 class="font"><b class="font upper infraestrutura"></b></h1>
            <h2 class="font white-text">é na Objetive TI</h2>
            <h3 class="font white-text">Obtenha ganhos e mantenha seu sistema sempre produtivo.</h3>
            <!-- <div class="video-box suave">
                <i class="material-icons suave click">close</i>
                <iframe width="800" height="450" src="https://www.youtube-nocookie.com/embed/H8eDU9CMrOU?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> -->
        </section>
        <section id="descricao-servico" class="">
            <div class="imagem">
                <img src="img/identifique-um-problema.png">
            </div>
            <div class="conteudo">
                <h5 class="font cor3-text">O que é</h5>
                <p>A infraestrutura é a base da capacidade planejada de TI disponível em todo o negócio, estabelecer uma infraestrutura de TI certa no momento certo resulta em rápida implementação de futuras iniciativas de negócio.</p>
                <p>Os serviços de infraestrutura incluem serviços de rede, provisão de computação, gerenciamento de banco de dados, expertise em P&amp;D, etc. Estes serviços podem ser prestados internamente ou providos por provedores de serviços externos.</p>
                <h5 class="font cor3-text">Problemas latentes que ocorrem com a falta de uma boa Infraestrutura de TI são:</h5>
                <ul>
                    <li>Tráfego lento de dados.</li>
                    <li>Rede instável.</li>
                    <li>Mapa de rede não documentado.</li>
                    <li>Falta de segurança da rede.</li>
                </ul>
                <h5 class="font cor3-text">Isso ocorre com você?</h5>
            </div>
        </section>
        <section id="vantagens" class="gradi2">
            <h5 class="font">Mas fique tranquilo, nós temos a solução:</h5>
            <ul>
                <li class="interno metade">
                    <img src="img/infraestrutura-mapeamento.png" alt="Mapeamento">
                    <h4 class="font center">Mapa do parque tecnológico.</h4>
                </li>
                <li class="interno metade">
                    <img src="img/infraestrutura-equipamento.png" alt="Equipamentos">
                    <h4 class="font center">Sugestão dos equipamentos adequados.</h4>
                </li>
                <li class="interno metade">
                    <img src="img/infraestrutura-identificacao.png" alt="Identificação de Cabos">
                    <h4 class="font center">Identificação dos cabos já existentes e até mesmo os novos.</h4>
                </li>
                <li class="interno metade">
                    <img src="img/infraestrutura-pfsense.png" alt="PFSense">
                    <h4 class="font center">PFSense - controle do tráfego da rede.</h4>
                </li>
            </ul>
            <h6 class="font center"><em>Tenha estrutura!</em></h6>
            <div class="detalhe"></div>
        </section>
        <section id="beneficios" class="infraestrutura">
            <div class="conteudo">
                <h2 class="font cor3-text">Benefícios do nosso produto</h2>
                <ul>
                    <li><i class="material-icons">done</i> Padronização do parque tecnológico segundo as normas do órgão fiscalizador.</li>
                    <li><i class="material-icons">done</i> Operações ágeis.</li>
                    <li><i class="material-icons">done</i> Garantia da estabilidade da rede.</li>
                </ul>
            </div>
        </section>
        <section id="clientes" class="interno">
            <h2 class="font center cor3-text">Clientes atendidos</h2>
            <ul class="center">
                <li style="display: inline-block;float: none;"><img src="img/clientes/logos principais clientes-05.png"></li>
                <li style="display: inline-block;float: none;"><img src="img/clientes/logos principais clientes-02.png"></li>
            </ul>
        </section>
        <section id="contratar" class="gradi2">
            <!-- <div class="metade">
                <form class="duplo">
                    <h2 class="font center">Sua rede precisa de mais segurança, solicite um PFSense agora mesmo!</h2>
                    <select class="upper mini-title">
                        <option value="#">Escolha o treinamento</option>
                        <option value="1">16 GB de armazenamento</option>
                    </select>
                    <select class="upper mini-title">
                        <option value="#">Escolha a carga horária</option>
                        <option value="1">16 GB de armazenamento</option>
                    </select>
                    <h6 class="mini-title upper">Quantas pessoas participarão do treinamento?</h6>
                    <input type="number">
                    <button class="cta mini-title upper suave click">Solicitar</button>
                </form>
                <div class="detalhe"></div>
            </div>
            <div class="metade"> -->
                <form class="white" method="post" action="enviarInfra.php" enctype="multipart/form-data">
                    <h2 class="font center cor3-text">Sua empresa precisa de ajuda com infraestrutura? solicite uma proposta.</h2>
                    <h6 class="mini-title upper cor3-text">digite seu nome</h6>
                    <input type="text" name="nome">
                    <h6 class="mini-title upper cor3-text">digite seu email</h6>
                    <input type="email" name="email">
                    <h6 class="mini-title upper cor3-text">digite seu telefone</h6>
                    <input type="tel" name="telefone" id="infraTelefone">
                    <h6 class="mini-title upper cor3-text">qual o assunto?</h6>
                    <input type="text" name="assunto">
                    <button type="submit" class="cta mini-title upper suave click">Solicitar</button>
                </form>
                <div class="detalhe"></div>
            <!-- </div> -->
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
        var typed4 = new Typed('.infraestrutura', {
            strings: ["Infraestrutura", "Rede segura"],
            typeSpeed: 80,
            startDelay: 200,
            backSpeed: 50,
            backDelay: 1500,
            loop: true,
            loopCount: Infinity
        });
        $("#infraTelefone").mask('(00) 00000-0000');
    </script>
</body>
</html>