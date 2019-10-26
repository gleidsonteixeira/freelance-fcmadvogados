<?php
    include("config/conexao.php");
    include('model/BLO.php');
    $conexao = new Conexao();
    $con = $conexao->conectar();
    $cod = $_GET['post'];
    $blo = new BLO();
    $resultado = $blo->buscar_dados_post($cod);
    $urlAtual= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $titulo = $resultado["BLO_TITULO"];
    $texto = $resultado["BLO_TEXTO"];
    $autor = $resultado["BLO_AUTOR"];
    $pre_texto = $resultado["BLO_P_TEXTO"];
    $meta = $resultado["BLO_META_DESC"];
    $keywords = $resultado["BLO_SEO"];
    $frase = $resultado["BLO_FRASE_CHAVE"];
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
    <meta name="description" content="<?php echo $pre_texto?>"/>
    <meta name="keywords" content="<?php echo $keywords ?>"/>
    <meta name="author" content="<?php echo $autor ?>"/>
    <meta name="robots" content="index, follow">
    <meta name="language" content="pt-BR" />
    
    <meta property=og:locale content="pt_BR"/>
    <meta property=og:type content="article"/>
    <meta property=og:title content="<?php echo $titulo ?>"/>
    <meta property=og:description content="<?php echo $pre_texto ?>"/>
    <meta property=og:url content="<?php echo $urlAtual ?>/"/>
    <meta property=og:site_name content="Pombo Criativo"/>
    <meta property=article:publisher content="https://www.facebook.com/PomboCriativo/"/>
    <meta property=article:tag content="<?php echo $categoria ?>"/>
    <meta property=article:section content="<?php echo $categoria ?>"/>
    <meta property=article:published_time content="<?php echo date('Y-m-d')?>"/>
    <meta property=article:modified_time content="<?php echo date('Y-m-d')?>"/>
    <meta property=og:updated_time content="<?php echo date('Y-m-d')?>"/>
    <meta property=og:image content="https://www.pombocriativo.com/img/post/<?php echo $imagem?>"/>
    <meta property=og:image:secure_url content="https://www.pombocriativo.com/img/post/<?php echo $imagem?>"/>
    <meta property=og:image:width content=1000 />
    <meta property=og:image:height content=1000 />
    <meta name=twitter:card content=summary_large_image />
    <meta name=twitter:description content="<?php echo $pre_texto ?>"/>
    <meta name=twitter:title content="<?php echo $titulo ?>"/>
    <meta name=twitter:image content="https://www.pombocriativo.com/img/post/<?php echo $imagem?>"/>
    <meta property="og:type" content="business">
    <meta property="business:contact_data:street_address" content="R. Cidade Ecológica 80">
    <meta property="business:contact_data:locality" content="Fortaleza">
    <meta property="business:contact_data:region" content="Ceará">
    <meta property="business:contact_data:postal_code" content="60812450">
    <meta property="business:contact_data:country_name" content="Brasil">
    <meta property="og:type" content="place">
    <meta property="place:location:latitude" content="-3.772929">
    <meta property="place:location:longitude" content="-38.469697">

    <link rel="canonical" href="https://pombocriativo.com"/>
    <link rel="shortlink" href="https://pombocriativo.com"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:400,800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" media="all" href="https://pombocriativo.com/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="https://pombocriativo.com/css/materialize.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="https://pombocriativo.com/css/extras.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="https://pombocriativo.com/css/site.css"/>
    <link rel="icon" href="https://pombocriativo.com/img/favicon.png" sizes="32x32" />
    <link rel="icon" href="https://pombocriativo.com/img/favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="https://pombocriativo.com/img/favicon.png" />
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap"> -->
    <!-- <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
            appId: "a7ee881a-1d96-41af-91bb-d3019bbc0408",
            });
        });
    </script> -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "https://pombocriativo.com/",
            "logo": "https://pombocriativo.com/img/logo_pombo_criativo.png",
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "+55-85-98797-4616",
                "contactType": "customer service"
            }]
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Início",
                "item": "https://www.pombocriativo.com"
            },{
                "@type": "ListItem",
                "position": 2,
                "name": "Sobre",
                "item": "https://www.pombocriativo.com/blog.php"
            }]
        }
    </script>
    <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '769570139895464');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=769570139895464&ev=PageView&noscript=1"/></noscript>
    <!-- End Facebook Pixel Code -->

</head>

<body>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112375115-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-112375115-1');
    </script>
    
    <i class="mdi-navigation-menu click menu-btn circle button-collapse hide-on-large-only" data-activates="slide-out"></i>

    <header id="topo" class="suave">
        <div class="header">
            <div class="mini-menu">
                <i class="material-icons suave click">menu</i>
            </div>
            <div class="logo suave">
                <a href="https://pombocriativo.com/" class="suave">
                    <img src="https://pombocriativo.com/img/logo_pombo_criativo.png" alt="Pombo_Criativo_Logo" title="Pombo Criativo" />
                </a>
                <a class="hide-on-small-only suave addBannerClick" data-id="6" data-tipo="CTT" href="tel:85987974616" style="margin-top: 10px;">(85) 98797-4616</a>
                <a class="hide-on-small-only suave addBannerClick" data-id="7" data-tipo="CTT" href="mailto:contato@pombocriativo.com.br">contato@pombocriativo.com</a>
            </div>
            <nav class="menu suave">
                <ul>
                    <li>
                        <a href="https://pombocriativo.com/index.php" class="suave">
                            Início
                        </a>
                    </li>    
                    <li>
                        <a href="https://pombocriativo.com/index.php#servicos" class="suave scrollto">
                            Serviços
                        </a>
                    </li>
                    <li>
                        <a href="https://pombocriativo.com/index.php#portfolio" class="suave scrollto">
                            Portfólio
                        </a>
                    </li>
                    <li>
                        <a href="pombo-news" class="suave scrollto">
                            Pombo news
                        </a>
                    </li>
                    <!-- <li>
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
                    </li> -->
                    
                    <!-- <li style="float: right;">
                        <a href="login.php" class="cta suave mini-title upper">
                            <i class="material-icons">account_circle</i>
                            área do cliente
                        </a>
                    </li> -->
                </ul>
                <a class="suave rede-social addBannerClick" data-id="11" data-tipo="CTT" href="https://api.whatsapp.com/send?phone=5585987974616&amp;text=Olá%20Pombo%20Criativo,%20gostaria%20de%20solicitar%20um%20orçamento...&amp;l=pt-br" target="_blank"><img src="https://pombocriativo.com/img/ico9.png"></a>
                <a class="suave rede-social addBannerClick" data-id="10" data-tipo="CTT" href="https://www.instagram.com/pombocriativo/?hl=pt-br" target="_blank"><img src="https://pombocriativo.com/img/ico8.png"></a>
                <a class="suave rede-social addBannerClick" data-id="9" data-tipo="CTT" href="https://www.youtube.com/channel/UCKEsrPEIsH5ZvESF2hcZezg" target="_blank"><img src="https://pombocriativo.com/img/ico7.png"></a>
                <a class="suave rede-social addBannerClick" data-id="8" data-tipo="CTT" href="https://www.facebook.com/PomboCriativo/" target="_blank"><img src="https://pombocriativo.com/img/ico6.png"></a>
            </nav>
            <div class="clear"></div>
        </div>
    </header>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.3&appId=1052573301602917&autoLogAppEvents=1"></script>
    
    <main>
        <section id="blog">
            <div class="post">
                <article itemscope itemtype="http://schema.org/NewsArticle">
                    <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php echo $urlAtual; ?>"/>
                    <header>
                        <h2 itemprop="headline" class="font"><?php echo $titulo ?></h2>
                        <h6 class="mini-title upper">por <span class="cor1-text" itemprop="author"><?php echo $autor ?></span> em <span class="cor1-text" itemprop="datePublished" content="<?php echo $data ?>"><?php echo $data ?></span><span style="opacity:0;visibility:hidden;" itemprop="dateModified" content="<?php echo $data ?>"></span></h6>
                        <p itemprop="description"><?php echo $pre_texto ?></p>
                    </header>
                    <figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
                        <meta itemprop="height" content="600">
                        <meta itemprop="width" content="auto">
                        <meta itemprop="url" content="https://pombocriativo.com/img/posts/<?php echo $imagem ?>">
                        <img src="https://pombocriativo.com/img/posts/<?php echo $imagem ?>" alt="banner">
                    </figure>
                    <div class="conteudo">
                        <div style="visibility:hidden;opacity:0;height:0;overflow:hidden" itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
                            <div itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
                                <meta itemprop="url" content="https://pombocriativo.com/img/logo_pombo_criativo.png">
                                <img src="https://pombocriativo.com/img/logo_pombo_criativo.png" alt="logo-pombo-criativo">
                            </div>
                            <span itemprop="name">Pombo Criativo</span>
                        </div>    
                        <p itemprop="articleBody"><?php echo $texto ?></p>
                        <div class="marcadores">
                            <span>Marcadores:</span>
                            <?php 
                                $marcadores = explode(',', $keywords);
                                foreach($marcadores as $marcador){
                                    echo '<h6 class="mini-title upper white-text cor1">'.$marcador.'</h6>';
                                }
                            ?>
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
                        <div class="aviso"><b>Atenção:</b> Os comentários abaixo são de inteira responsabilidade de seus respectivos autores e não representam, necessariamente, a opinião do Pombo Criativo.</div>
                        <div class="fb-comments" data-href="<?php echo $urlAtual; ?>" data-width="650" data-numposts="5"></div>
                    </div>
                </article>
            </div>
            <div class="newslatter">
                <h2 class="font">Inscreva-se em<br>nossa newsletter</h2>
                <p>E receba por email nossos conteúdos.</p>
                <form action="">
                    <input type="text" placeholder="Nome">
                    <input type="text" placeholder="Email">
                    <button class="mini-title upper white-text suave click">Quero receber</button>
                </form>
            </div>
            <div class="relacionados">
                <ul>
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
                
                    <li>
                        <figure>
                            <img  src="img/posts/<?php echo $lista[$i]['BLO_IMAGEM'] ?>" alt="">
                        </figure>
                        <h6 style="cursor:pointer" onclick="abrirPost(<?php echo $lista[$i]['BLO_COD'] ?>)"><?php echo $lista[$i]['BLO_TITULO'] ?></h6>
                    </li>
                <?php  $i++; } ?>
                </ul>
            </div>
            <div class="anuncio"></div>
        </section>
    </main>
    
    <?php include("control/footer.php"); ?>

	<script type="application/javascript" src="https://pombocriativo.com/js/jquery.js"></script>
    <script type="application/javascript" src="https://pombocriativo.com/js/jquery.mask.js"></script>
    <script type="application/javascript" src="https://pombocriativo.com/js/script.js"></script>
    <script type="application/javascript" src="https://pombocriativo.com/js/default.js"></script>
    
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