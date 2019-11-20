<?php
    include("config/conexao.php");
    $conexao = new Conexao();
    $con = $conexao->conectar();
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
    
    <title>Fernandes Coelho Maia Advogados</title>   

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="expires" content="Tue, 01 Jan 2020 12:12:12 GMT">
    <meta http-equiv="cache-control" content="must-revalidate, public" max-age=31557600/>
    <meta http-equiv="Pragma" content="public">
    <meta http-equiv="content-script-type" content="text/javascript" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes"/>
    <meta name="description" content="Descrição"/>
    <meta name="keywords" content="Palavras chave"/>
    <meta name="author" content="Gleidson Teixeira, contato@pombocriativo.com"/>
    <meta name="robots" content="index, follow">
    <meta name="language" content="pt-br" />
    <meta name="theme-color" content="#1b5678">
    <meta name="msapplication-navbutton-color" content="#1b5678">
    <meta name="apple-mobile-web-app-status-bar-style" content="#1b5678">
    <meta name="subject" content="<?php echo $categoria; ?>" />
    <meta name="copyright"content=" &copy FCM Advogados">
    <meta name="classification" content="Business">
    <meta name="url" content="<?php echo $urlAtual; ?>">
    <meta name="identifier-URL" content="<?php echo $urlAtual; ?>">
    <meta name="category" content="article">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    <meta name="revisit-after" content="3 days">

    <meta property=og:locale content="pt_BR"/>
    <meta property=og:type content="site"/>
    <meta property=og:title content="Fernandes Coelho Maia Advogados"/>
    <meta property=og:description content="Descrição"/>
    <meta property=og:url content="<?php echo $urlAtual; ?>"/>
    <meta property=og:site_name content="FCM Advogados"/>
    <meta property=og:email content="contato@fcmadvogados.adv.br"/>
    <meta property=og:phone_number content="85-3171-8341"/>
    <meta name="fb:page_id" content="558378884521356" />
    <meta property="og:type" content="business">
    <meta property="business:contact_data:street_address" content="R. Coronel Linhares 950 sala 1008">
    <meta property="business:contact_data:locality" content="Fortaleza">
    <meta property="business:contact_data:region" content="Ceará">
    <meta property="business:contact_data:postal_code" content="60812450">
    <meta property="business:contact_data:country_name" content="Brasil">
    <meta property="og:type" content="place">
    <meta property="place:location:latitude" content="-3.772929">
    <meta property="place:location:longitude" content="-38.469697">
    <meta name="place:street-address" content="R. Coronel Linhares 950 sala 1008"/>
    <meta name="place:locality" content="Fortaleza"/>
    <meta name="place:region" content="CE"/>
    <meta name="place:postal-code" content="60812450"/>
    <meta name="place:country-name" content="Brasil"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">

    <link rel="canonical" href="<?php echo $urlAtual; ?>"/>
    <link rel="shortlink" href="<?php echo $urlAtual; ?>"/>
    <link rel="stylesheet" type="text/css" href="css/footer.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/extras.css" media="all"/>
    <link rel="icon" href="img/favicon.png" sizes="32x32" />
    <link rel="icon" href="img/favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="img/favicon.png" />

    <style type="text/css">
        @font-face {font-family: 'Material Icons';font-style: normal;font-weight: 400;src: url("fonts/flUhRq6tzZclQEJ-Vdg-IuiaDsNcIhQ8tQ.woff2") format('woff2');font-display: swap;}
        .material-icons {font-family: 'Material Icons';font-weight: normal;font-style: normal;font-size: 24px;line-height: 1;letter-spacing: normal;text-transform: none;display: inline-block;white-space: nowrap;word-wrap: normal;direction: ltr;-webkit-font-feature-settings: 'liga';-webkit-font-smoothing: antialiased;}
        #topo{width: 100%;left: 0;top: 0;position: absolute;z-index: 10;}
        #topo .header{width: 100%;padding: 0 10%;box-sizing: border-box;}
        #topo .header .logo{height:30px;text-align: right;margin-top: 10px;position: relative;}
        #topo .header .logo img{border-left: 4px solid white;padding: 20px 20px 20px 13px;}
        #topo .header .logo img,
        #topo .header .logo a{float: left;display: block;}
        #topo .header .logo a.imagem{position: absolute;top: 0;left: 0;}
        #topo .header .logo a.addBannerClick{float: right;line-height: 30px;font-weight: bold;color: white;display: inline-block;font-size: 18px;margin-left: 30px;}

        #topo nav{background-color: transparent;box-shadow: none;width: auto;}

        #topo .menu{height: 50px;margin: 20px 0;text-align: right;}
        #topo .menu ul{width:auto;float: right;height: 50px;margin-right: 30px;}
        #topo .menu ul li{position: relative;display: inline-block;}
        #topo .menu ul li ul{width:220px;height:auto;background-color: white;opacity: 0;visibility: hidden;box-shadow: 0px 10px 20px -5px rgba(0, 0, 0, .15);border-radius: 5px;position: absolute;top: 100%;left: 0;will-change: opacity;}
        #topo .menu ul li ul::before{content: "";border: 10px solid transparent;border-top: 0;border-bottom-color: white;position: absolute;bottom: 100%;left: 30px;}
        #topo .menu ul li:hover ul{opacity: 1;visibility: visible;}
        #topo .menu ul li ul li{float: none;overflow: hidden;text-align: left;display: block;}
        #topo .menu ul li ul li a{color: #2e8dcc;border-radius: 0;}
        #topo .menu ul li ul li a:hover{color: #f1a80a;background-color: rgba(0,0,0,.05);}
        #topo .menu ul li a{display: block;line-height: 50px;padding: 0 16px;border-radius: 5px;position: relative;color:white;font-size: 18px;background-color: transparent;}
        #topo .menu ul li.active a::before{content:"";width: 100%;height: 3px;background-color: #673ab7;position: absolute;left: 0;bottom: 0;}
        #topo .menu ul li a:hover{color: #f1a80a;}
        #topo .menu ul li a.cta{background-color: #673ab7;color: #673ab7;}
        #topo .menu ul li a.cta:hover{background-color: #673ab7;}
        #topo .menu ul li a.cta i{line-height: 50px !important;float: left;color: white;}
        #topo .menu a.rede-social{display: block;float:right;border-radius: 25px;height:42px;margin-left: 10px;margin-top: 5px;border: 1px solid white;}
        #topo .menu a.rede-social:hover{background-color: #f1a80a;border-color: transparent;}
        #topo .mini-menu{display: block;height: 60px;width: 60px;top: 70px;right: 16px;position: fixed;z-index: 10;border-radius: 30px;overflow: hidden;box-shadow: 0px 5px 8px rgba(0,0,0,.15);}
        #topo .mini-menu i{line-height: 60px;width: 60px;text-align: center;color: #56aeff;background-color: white;font-size: 28px;}
        #topo .mini-menu.active i{background-color: #56aeff;color: white;}
        #topo .action{display: none;}
        #topo .action a i{line-height: 48px;margin-right: 16px;}

        @media only screen and (max-width: 480px){
            #topo .header{padding: 0 16px;}
            #topo .header .logo{margin: 0;}
            #topo .header .logo a.imagem{width: 130px;top: 30px}
            #topo .header .logo a.imagem img{width: 100%;}
            #topo .menu{width: 75%;height: 100vh;position: fixed;top: 0;right: -100%;background-color: white;margin: 0;text-align: center;border-bottom-left-radius: 50px;z-index: 8;transition-timing-function: cubic-bezier(0.165, 0.84, 0.44, 1);}
            #topo .menu.active{right: 0%;}
            #topo .menu figure img{display: block;height: 90px;margin-left: 16px;margin-top: 55px;}
            #topo .menu ul{width: 100%;height: auto;float: none;margin: 0;padding-top: 30px;}
            #topo .menu ul li{display: block;float: none;}
            #topo .menu ul li a{color: #56aeff;text-align: left;line-height: 36px;}
            #topo .menu ul li a i{float: left;width: 30px;text-align: center;margin-right: 10px;line-height: 36px;}
            #topo .menu a.rede-social{float: none;display: inline-block;border:0;background-color: #56aeff;height: 40px;margin: 20px 10px;position: absolute;bottom: 0;right: 12px;}
            #topo .menu a.rede-social:nth-child(2){right: 68px;}
            #topo .menu a.rede-social:nth-child(3){right: 124px;}
            #topo .menu a.rede-social:nth-child(4){right: 180px;}
            #topo .menu ul li ul{padding: 0;opacity: 1;visibility: visible;position: initial;top:initial;left: initial;box-shadow: none;padding-left: 60px;}
            #topo .menu ul li ul li a{font-size: 16px;color: #56aeff;}
            #topo .sombra{width: 100%;height: 100%;position: fixed;top:0;left:0;background-color: rgba(0,0,0,.7);visibility: 0;opacity: 0;z-index: 5;}
            #topo .sombra.active{visibility: visible;opacity: 1}
        }
    </style>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "FCM Advogados",
            "url": "http://fcmadvogados.adv.br",
            "logo": "http://fcmadvogados.adv.br/img/logo_pombo_criativo.webp",
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "+55-85-3181-8341",
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
                "item": "http://fcmadvogados.adv.br"
            },{
                "@type": "ListItem",
                "position": 2,
                "name": "Pombo News",
                "item": "http://fcmadvogados.adv.br/blog.php"
            }]
        }
    </script>

    <!-- Facebook Pixel Code -->
    <!-- <script async defer>
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
    <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=769570139895464&ev=PageView&noscript=1"/></noscript> -->
    <!-- End Facebook Pixel Code -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async defer type="text/javascript" src="https://www.googletagmanager.com/gtag/js?id=UA-112375115-1"></script>
    <script async defer type="text/javascript">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-112375115-1');
    </script> -->
    
    <!--Start of Tawk.to Script-->
    <!-- <script async defer type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5daa15cd78ab74187a5a5df2/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script> -->
    <!--End of Tawk.to Script-->

</head>

<body>
    <header id="topo" class="suave">
        <div class="header">
            <div class="mini-menu hide-on-med-and-up">
                <i class="material-icons suave click">menu</i>
            </div>
            <div class="logo suave">
                <a href="inicio" class="suave imagem">
                    <img src="img/logo-fcm-advogados.webp" alt="FCM_Advogados_Logo" title="FCM Advogados" />
                </a>
                <a class="condesed hide-on-small-only suave addBannerClick" data-id="7" data-tipo="CTT" href="mailto:contato@fcmadvogados.adv.br">contato@fcmadvogados.adv.br</a>
                <a class="condesed hide-on-small-only suave addBannerClick" data-id="6" data-tipo="CTT" href="tel:8531818341">(85) 3181-8341</a>
            </div>
            <div class="sombra suave"></div>
            <nav class="menu suave">
                <a class="suave rede-social addBannerClick" data-id="9" data-tipo="CTT" href="" target="_blank"><img src="img/ico7.webp" alt="icone-youtube"></a>
                <a class="suave rede-social addBannerClick" data-id="11" data-tipo="CTT" href="https://api.whatsapp.com/send?phone=5585987974616&amp;text=Olá%20Pombo%20Criativo,%20gostaria%20de%20solicitar%20um%20orçamento...&amp;l=pt-br" target="_blank"><img src="img/ico9.webp" alt="icone-whatsapp"></a>
                <a class="suave rede-social addBannerClick" data-id="10" data-tipo="CTT" href="" target="_blank"><img src="img/ico8.webp" alt="icone-instagram"></a>
                <a class="suave rede-social addBannerClick" data-id="8" data-tipo="CTT" href="" target="_blank"><img src="img/ico6.webp" alt="icone-facebook"></a>
                <figure>
                    <img src="img/logo-fcm-advogados-azul.webp" alt="Logo FCM Advogados" class="hide-on-med-and-up">
                </figure>
                <ul>
                    <li>
                        <a href="inicio" class="condesed suave">
                            <i class="material-icons hide-on-med-and-up">home</i>
                            Início
                        </a>
                    </li>    
                    <li>
                        <a href="quem-somos" class="condesed suave">
                            <i class="material-icons hide-on-med-and-up">supervised_user_circle</i>
                            Quem somos
                        </a>
                    </li>
                    <li>
                        <a class="condesed suave click">
                            <i class="material-icons hide-on-med-and-up">gavel</i>
                            Soluções
                        </a>
                        <ul class="suave">
                            <li class="suave"><a href="" class="condesed suave">Solução 1</a></li>
                            <li class="suave"><a href="" class="condesed suave">Solução 2</a></li>
                            <li class="suave"><a href="" class="condesed suave">Solução 3</a></li>
                            <li class="suave"><a href="" class="condesed suave">Solução 4</a></li>
                            <li class="suave"><a href="" class="condesed suave">Solução 5</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="blog" class="condesed suave">
                            <i class="material-icons hide-on-med-and-up">forum</i>
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="#contato" class="condesed suave scrollto">
                            <i class="material-icons hide-on-med-and-up">call</i>
                            Contato
                        </a>
                    </li>
                    
                    <!-- <li style="float: right;">
                        <a href="login.php" class="cta suave mini-title upper">
                            <i class="material-icons">account_circle</i>
                            área do cliente
                        </a>
                    </li> -->
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </header>