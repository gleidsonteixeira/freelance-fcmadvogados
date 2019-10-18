<?php
    include("config/conexao.php");
    include('model/BLO.php');
    $conexao = new Conexao();
    $con = $conexao->conectar();
    $cod = $_GET['cod'];
    $blo = new BLO();
    $resultado = $blo->buscar_dados_post($cod);
    $urlAtual= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $titulo = $resultado["BLO_TITULO"];
    $texto = $resultado["BLO_TEXTO"];
    $autor = $resultado["BLO_AUTOR"];
    $pre_texto = $resultado["BLO_P_TEXTO"];
    $categoria = $resultado["BLO_CATEGORIA"];
    $data = $resultado["BLO_DATA"];
    $imagem = $resultado["BLO_IMAGEM"];
    $click = $resultado["BLO_CLICKS"];


   
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
    
    <title><?php echo $titulo ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="expires" content="Tue, 01 Jan 2020 12:12:12 GMT">
    <meta http-equiv="cache-control" content="must-revalidate, public" max-age=31557600/>
    <meta http-equiv="Pragma" content="public">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content="<?php echo $textop?>"/>
    <meta name="keywords" content="<?php echo $categoria ?>"/>
    <meta name="author" content="<?php echo $autor ?>"/>
    <meta name="robots" content="index, follow">
    <meta name="language" content="pt-br" />
    
    <meta property=og:locale content=pt_BR />
    <meta property=og:type content=article />
    <meta property=og:title content="<?php echo $titulo ?>"/>
    <meta property=og:description content="<?php echo $pre_texto ?>"/>
    <meta property=og:url content="https://www.objetiveti.com.br/<?php echo $urlAtual ?>/"/>
    <meta property=og:site_name content="Objetive TI"/>
    <meta property=article:publisher content="https://www.facebook.com/ObjetiveTI/"/>
    <meta property=article:tag content="<?php echo $categoria ?>"/>
    <meta property=article:section content="<?php echo $categoria ?>"/>
    <meta property=article:published_time content="2019-07-15T18:16:18+00:00"/>
    <meta property=article:modified_time content="2019-07-15T18:16:25+00:00"/>
    <meta property=og:updated_time content="2019-07-15T18:16:25+00:00"/>
    <meta property=og:image content="https://www.objetiveti.com.br/<?php echo $imagem?>"/>
    <meta property=og:image:secure_url content="https://www.objetiveti.com.br/<?php echo $imagem?>"/>
    <meta property=og:image:width content=1000 />
    <meta property=og:image:height content=1000 />
    <meta name=twitter:card content=summary_large_image />
    <meta name=twitter:description content="<?php echo $pre_texto ?>"/>
    <meta name=twitter:title content="<?php echo $titulo ?>"/>
    <meta name=twitter:image content="https://www.objetiveti.com.br/<?php echo $imagem?>"/>

    <link rel="canonical" href="https://www.objetiveti.com.br/<?php echo $urlAtual ?>" />
    <link rel="shortlink" href="https://www.objetiveti.com.br/<?php echo $urlAtual ?>" />

    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/extras.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/site.css" media="all"/>
    <link rel="icon" href="img/favicon.png" sizes="32x32" />
    <link rel="icon" href="img/favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="img/favicon.png" />
    <link rel="manifest" href="manifest.json" />
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
            appId: "a7ee881a-1d96-41af-91bb-d3019bbc0408",
            });
        });
    </script>

</head>

<body>
    <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create','UA-104056819-1','auto');ga('send','pageview');</script>

    <ul id="slide-out" class="side-nav suave">
        <div class="gradi3 perfil">
            <i class="material-icons fechar click">close</i>
            <img src="img/logo-objetive-ti-branca.png" class="z-depth-2"/>
            <p class="white-text mini-title upper">
                <a href="tel:8530477001">(85) 3047-7001</a><br>
                <a href="mailto:contato@objetiveti.com.br">contato@objetiveti.com.br</a>
            </p>
        </div>
        <li>
            <a href="sobre.php" class="active suave">
                Sobre
            </a>
        </li>
        <li>
            <a href="data-center.php" class="suave">
                Data center
            </a>
        </li>
        <li>
            <a href="consultoria.php" class="suave">
                Consultoria ERP
            </a>
        </li>
        <li>
            <a href="fabrica.php" class="suave">
                Fábrica de software
            </a>
        </li>
        <li>
            <a href="infraestrutura.php" class="suave">
                Infraestrutura
            </a>
        </li>
        <li>
            <a href="cameras.php" class="suave">
                Instalação de câmeras
            </a>
        </li>
        <li>
            <a href="https://objetiveti.com.br/blog" class="suave">
                Blog
            </a>
        </li>
        <!-- <li>
            <a href="faq.php" class="suave">
                Faq
            </a>
        </li> -->
        <li>
            <a href="sistema" class="suave">
                Área do cliente
            </a>
        </li>
    </ul>
    
    <i class="mdi-navigation-menu click menu-btn circle button-collapse hide-on-large-only" data-activates="slide-out"></i>

    <header id="topo" class="suave white">
        <div class="container">
            <div class="mini-menu">
                <i class="material-icons suave click">menu</i>
            </div>
            <div class="logo suave">
                <a href="index.php" class="suave">
                    <img src="img/logo-objetive-ti.png" alt="Objetive TI" title="Objetive TI" class="" />
                </a>
            </div>
            <div class="links">
                <a class="hide-on-small-only addBannerClick" data-id="6" data-tipo="CTT" href="tel:8530477001"><i class="material-icons">phone</i>(85) 3047-7001</a>
                <a class="hide-on-small-only addBannerClick" data-id="7" data-tipo="CTT" href="mailto:contato@objetiveti.com.br"><i class="material-icons">mail</i>contato@objetiveti.com.br</a>
                <a target="_blank" class="suave rede-social addBannerClick" style="background-color: rgba(66,103,178,1) !important;margin-left:0;" data-id="8" data-tipo="CTT" href="https://www.facebook.com/ObjetiveTI/"><img src="img/ico6.png"></a>
                <a target="_blank" class="suave rede-social addBannerClick" style="background-color: rgba(255,0,0,1) !important;" data-id="9" data-tipo="CTT" href="https://www.youtube.com/channel/UCqEzLbAtRRACyG-jpCN2W5A"><img src="img/ico7.png"></a>
                <a target="_blank" class="suave rede-social addBannerClick" style="background-color: rgba(169,51,203,1) !important;" data-id="10" data-tipo="CTT" href="https://www.instagram.com/objetiveti/"><img src="img/ico8.png"></a>
                <a target="_blank" class="suave rede-social addBannerClick" style="background-color: rgba(88,232,112,1) !important;" data-id="11" data-tipo="CTT" href="https://api.whatsapp.com/send?phone=5585988147192&amp;text=Olá%20Objetive%20TI,%20gostaria%20de%20solicitar%20um%20orçamento...&amp;l=pt-br"><img src="img/ico9.png"></a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="container">
            <nav class="menu suave hide-on-small-only">
                <ul>
                    <li>
                        <a href="index.php" class="suave mini-title upper">
                            Início
                        </a>
                    </li>
                    <li>
                        <a href="sobre.php" class="suave mini-title upper">
                            Sobre
                        </a>
                    </li>
                    <li>
                        <a class="suave mini-title upper click">
                            Nossos Serviços
                        </a>
                        <ul class="suave">
                            <li class="suave"><a href="data-center.php" class="suave mini-title upper">Data center</a></li>
                            <li class="suave"><a href="consultoria.php" class="suave mini-title upper">Consultoria ERP</a></li>
                            <li class="suave"><a href="fabrica.php" class="suave mini-title upper">Fábrica de Software</a></li>
                            <li class="suave"><a href="infraestrutura.php" class="suave mini-title upper">Infraestrutura</a></li>
                            <li class="suave"><a href="cameras.php" class="suave mini-title upper">Instalação de Câmeras</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="https://objetiveti.com.br/blog" class="suave mini-title upper">
                            blog
                        </a>
                    </li>
                    <!-- <li>
                        <a href="faq.php" class="suave scrollto mini-title upper">
                            FAQ
                        </a>
                    </li> -->
                    <li style="float: right;">
                        <a href="sistema" class="cta suave mini-title upper">
                            <i class="material-icons">account_circle</i>
                            área do cliente
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </header>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.3&appId=1052573301602917&autoLogAppEvents=1"></script>
    
    <main>
        <section class="big-title cor1 menor">
            <h1 class="pequeno"><b class="font upper pequeno">#OBJ</b><b class="font upper white-text pequeno">COM</b><b class="font upper pequeno">VC</b></h1>
            <!-- <h3 class="font white-text" style="max-width: initial;">Respostas para suas dúvidas.</h3> -->
        </section>
        <section id="blog">
            <div class="post">
                <article>
                    <header>
                        <h2 class="font"><?php echo $titulo ?></h2>
                        <h6 class="mini-title upper">por <span class="cor1-text"><?php echo $autor ?></span> em <span class="cor1-text"><?php echo $data ?></span></h6>
                        <p><?php echo $pre_texto ?></p>
                    </header>
                    <figure>
                        <img src="img/posts/<?php echo $imagem ?>" alt="banner">
                    </figure>
                    <!-- <h3 class="font">A Objetive TI no começo</h3> -->
                    <p><?php echo $texto ?></p>
                    <!-- <p>Quando criamos o nosso primeiro site quase não tínhamos o que colocar de informação nele…</p>
                    <p>mas estava lá e ficou assim por dois anos, acredite, sabíamos que precisava ser atualizado mas você sabe, vai aparecendo uma coisa aqui e uma ali e o tempo passa, criando sites e softwares lindos para os clientes e para nós nada</p>
                    <blockquote>porém no começo desse anos vimos que não daria mais.</blockquote>
                    <h3 class="font">Tudo veio com o tempo</h3>
                    <p>A Objetive TI tinha crescido de uma forma que quase não deu pra controlar, uma hora éramos pequenos e sem muitos contatos, depois já estávamos contratando pois não tínhamos mais braços para fazer os projetos que chegavam</p>
                    <p>precisamos nos mudar para uma sala maior, comprar novos equipamentos e …. sim, mudar aquele site que estava no ar a dois anos sem atualizações</p>
                    <p>o agravante também foi a mudança para uma nova identidade visual com uma nova logo para a empresa, novas cores e o site antigo acabou ficando defasado.</p>
                    <blockquote>Então colocamos a mão na massa!</blockquote> -->
                    <div class="marcadores">
                        <span>Marcadores:</span>
                        <h6 class="mini-title upper white-text cor1"><?php echo $categoria ?></h6>
                    </div>
                    <div class="avaliacao">
                        <p>O que achou deste conteúdo?</p>
                        <i class="material-icons click suave" data-id="1" title="Muito Insatisfeito">sentiment_very_dissatisfied</i>
                        <i class="material-icons click suave" data-id="2" title="Pouco Insatisfeito">sentiment_dissatisfied</i>
                        <i class="material-icons click suave" data-id="3" title="Regular">sentiment_satisfied</i>
                        <i class="material-icons click suave" data-id="4" title="Pouco satisfeito">sentiment_satisfied_alt</i>
                        <i class="material-icons click suave" data-id="5" title="Muito Satisfeito">sentiment_very_satisfied</i>
                    </div>
                    <h3 class="font cor1-text">Deixe seu comentário</h3>
                    <div class="aviso"><b>Atenção:</b> Os comentários abaixo são de inteira responsabilidade de seus respectivos autores e não representam, necessariamente, a opinião da Resultados Digitais.</div>
                    <div class="fb-comments" data-href="https://www.objetiveti.com.br/" data-width="650" data-numposts="5"></div>
                </article>
            </div>
            <div class="newslatter gradi3">
                <h2 class="font white-text">Inscreva-se em nossa newsletter</h2>
                <p class="white-text">E receba por email nossos conteúdos.</p>
                <form action="">
                    <input type="text" placeholder="Nome">
                    <input type="text" placeholder="Email">
                    <button class="mini-title upper white-text suave click">Quero receber</button>
                </form>
            </div>
            <div class="relacionados">
                <h3 class="font cor1-text">Veja também</h3>
                <?php
                    $sql = "SELECT * FROM BLO WHERE BLO_COD <> $cod LIMIT 3";
                    $rs = $con->prepare($sql);
                    $rs->execute();
                    $lista = array();
                    $i = 0;
                    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
                       $lista[$i] = array(
                        "BLO_COD" => $row->BLO_COD,
                        "BLO_TITULO" => utf8_encode($row->BLO_P_TEXTO),
                        "BLO_IMAGEM" => utf8_encode($row->BLO_IMAGEM)
                       );
                    ?>
                <ul>
                    <li>
                        <figure>
                            <img  src="img/posts/<?php echo $lista[$i]['BLO_IMAGEM'] ?>" alt="">
                        </figure>
                        <h6 style="cursor:pointer" onclick="abrirPost(<?php echo $lista[$i]['BLO_COD'] ?>)"><?php echo $lista[$i]['BLO_TITULO'] ?></h6>
                    </li>
                    <!-- <li>
                        <figure>
                            <img src="img/bg.jpg" alt="">
                        </figure>
                        <h6>[Case de sucesso] Como um site novo impactou em nossa presença na internet</h6>
                    </li>
                    <li>
                        <figure>
                            <img src="img/bg.jpg" alt="">
                        </figure>
                        <h6>[Case de sucesso] Como um site novo impactou em nossa presença na internet</h6>
                    </li> -->
                </ul>
                    <?php  $i++; } ?>
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
    <script src="js/default.js" type="application/javascript"></script>
    
    <script>
        function abrirPost(cod){
        event.preventDefault();
        window.location.href = "blogpost.php?cod="+cod+"&titulo=<?php echo $titulo?>";
    }
    </script>
</body>
</html>