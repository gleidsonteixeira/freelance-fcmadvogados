<?php
    session_start();

    if(isset($_SESSION["A_USU_COD"])){
        echo "<script>window.location.href='admin/';</script>";
    }

    if(isset($_SESSION["C_USU_COD"])){
        echo "<script>window.location.href='admin/';</script>";
    }
?>

<html>
    <head>
        <title>Objetive TI - Login</title>
        <!-- METAS -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="theme-color" content="#a933cb">
        <meta name="msapplication-navbutton-color" content="#a933cb">
        <meta name="apple-mobile-web-app-status-bar-style" content="#a933cb">
        <!-- CSS -->
        <link rel="canonical" href="https://www.objetiveti.com.br" />
        <link rel="shortlink" href="https://www.objetiveti.com.br" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald:400,700">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome.css" type="text/css"/>
        <link href="css/materialize.css" rel="stylesheet" type="text/css">
        <link href="css/ionicons.css" rel="stylesheet" type="text/css">
        <link href="css/extras.css" rel="stylesheet" type="text/css">
        <link href="css/site.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create','UA-104056819-1','auto');ga('send','pageview');</script>
        
        <div id="login">
            <div class="header">
                <h1 class="font white-text suave">
                    Objetive TI
                    <div class="divider white"></div>
                </h1>
                <p class="white-text suave condesed">
                    Atendimento com rapidez e qualidade para garantir sua satisfação.
                </p>
            </div>
            <div class="form suave">
                <div id="loading" class="suave white">
                    <div class="central">
                        <h6 class="mini-title center-align"><b class="purpler-text">Aguarde...</b></h6>
                        <div class="progress blue-grey lighten-4">
                            <div class="indeterminate cor1"></div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <h6 class="cor1-text center-align">
                        <b class="condesed purple-text">Atendimento ao Cliente</b>
                    </h6>
                    <img src="img/logo-grande.png" class="responsive-img">
                    <div class="input-field">
                        <h6><b class="condesed purple-text">Email:</b></h6>
                        <input type="text" name="email" id="email" placeholder="email@email.com" required>
                    </div>
                    <div class="input-field">
                        <h6><b class="condesed purple-text">Senha:</b></h6>
                        <i class="mdi-image-remove-red-eye ver click circle cor1-text"></i>
                        <input type="password" name="senha" id="senha" placeholder="sua senha" required style="margin-bottom: 10px;">
                    </div>
                    <span class="red-text center-align hide">
                        <b><i class="material-icons">mood_bad</i> Seu usuário ou senha estão incorretos</b>
                    </span>
                    <button class="btn cor1 white-text mini-title upper loginBtn">Entrar</button>
                </div>
            </div>
            <!-- ALERTAS -->
            <div id="alerta" class="suave">
                <i class="fa fa-exclamation-circle icon suave"></i>
                <p class="white-text suave">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <div class="opcoes right-align suave hide">
                    <button class="mini-title upper green accent-3 white-text confirmar"><i class="fa fa-check"></i>sim</button>
                    <button class="mini-title upper red white-text cancelar"><i class="fa fa-times"></i>não</button>
                </div>
            </div>
            <div class="areas suave">
                <div class="area white center-align">
                    <a href="#!">
                        <i class="material-icons light-blue-text">donut_large</i>
                        <h6 class="mini-title"><b>Relatórios<br>avançados</b></h6>
                    </a>
                </div>
                <div class="area white center-align">
                    <a href="#!">
                        <i class="material-icons light-blue-text">forum</i>
                        <h6 class="mini-title"><b>Portal de<br>chamados</b></h6>
                    </a>
                </div>
            </div>
        </div>

        <script src="js/jquery.js"></script>
        <script src="js/materialize.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-storage.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-database.js"></script>
        <script src="js/loginFirebase.js"></script>
        <script src="js/default.js"></script>
        <script src="js/login.js"></script>
        <script>
            //VER SENHA
            function verSenha(){
                $(".ver").click(function(){
                    var tipo = $(this).next("input").attr("type");
                    if (tipo == 'password'){
                        $(this).next("input").attr("type", "text");
                    } else {
                        $(this).next("input").attr("type", "password");
                    }
                })
            } verSenha();

            // LOGIN ANIMADO
            function loginAnimation(){
                $("#login h1, #login p").addClass("active");
                //$("#login .areas").addClass("active");
                setTimeout(function(){
                    $("#login .form").addClass("active");
                }, 700);
            } loginAnimation();
            $(document).keypress(function(e){
                if(e.wich == 13 || e.keyCode == 13){
                    login();
                }
            });
        </script>
    </body>
</html>