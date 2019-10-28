<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
    
    <title>Pombo Criativo</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="expires" content="Tue, 01 Jan 2020 12:12:12 GMT">
    <meta http-equiv="cache-control" content="must-revalidate, public" max-age=31557600/>
    <meta http-equiv="Pragma" content="public">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content="Empresa de soluções tecnológicas como softwares, cloud, rede e cabeamento, suporte com ERP, solucione hoje!"/>
    <meta name="keywords" content="desenvolvimento, fortaleza, ecommerce, marketing, loja online, blogs, criar site, protheus, totvs, erp, infraestrutura, instalação de câmeras, ceará, aplicativo, ios, android, suporte, pfsense, design"/>
    <meta name="author" content="Gleidson Teixeira, contato@pombocriativo.com"/>
    <meta name="robots" content="index, follow">
    <meta name="language" content="pt-br" />    

    <link rel="canonical" href="https://pombocriativo.com" />
    <link rel="shortlink" href="https://pombocriativo.com" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="css/materialize.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/extras.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/site.css" media="all"/>
    <link rel="icon" href="img/favicon.png" sizes="32x32" />
    <link rel="icon" href="img/favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="img/favicon.png" />
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
<?php
// Adiciona o arquivo class.phpmailer.php - você deve especificar corretamente o caminho da pasta com o este arquivo.
require_once("autenvio/PHPMailerAutoload.php");
// Inicia a classe PHPMailer
$mail = new PHPMailer();
 
// DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.pombocriativo.com"; // Seu endereço de host SMTP
$mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
$mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
$mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
$mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
$mail->Username = 'contato@pombocriativo.com'; // Conta de email existente e ativa em seu domínio
$mail->Password = 'pasok2015'; // Senha da sua conta de email
 
// DADOS DO REMETENTE
$mail->Sender = "contato@pombocriativo.com"; // Conta de email existente e ativa em seu domínio
$mail->From = "contato@pombocriativo.com"; // Sua conta de email que será remetente da mensagem
$mail->FromName = "Assinante newsletter"; // Nome da conta de email
 
// DADOS DO DESTINATÁRIO
$mail->AddAddress('contato@pombocriativo.com', 'Pombo - newsletter'); // Define qual conta de email receberá a mensagem
//$mail->AddAddress('recebe2@dominio.com.br'); // Define qual conta de email receberá a mensagem
//$mail->AddCC('g.teixeira@objetiveti.com.br'); // Define qual conta de email receberá uma cópia
//$mail->AddBCC('copiaoculta@dominio.info'); // Define qual conta de email receberá uma cópia oculta
 
// Definição de HTML/codificação
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
 
// DEFINIÇÃO DA MENSAGEM
$mail->Subject  = "Assinante newsletter"; // Assunto da mensagem
$mail->Body .= " Nome: ".$_POST['nome']."<br>"; // Texto da mensagem
$mail->Body .= " E-mail: ".$_POST['email']."<br>"; // Texto da mensagem
//$mail->Body .= " Telefone: ".$_POST['telefone']."<br>"; // Texto da mensagem
//$mail->Body .= " Assunto: ".nl2br($_POST['assunto'])."<br>"; // Texto da mensagem
 
// ENVIO DO EMAIL
$enviado = $mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
 
// Exibe uma mensagem de resultado do envio (sucesso/erro)
if ($enviado) {
?>
<body>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112375115-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-112375115-1');
    </script>
    
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5daa15cd78ab74187a5a5df2/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <div class="obrigado">
        <img src="img/enviado.png">
        <h5 class="font cor1-text">Obrigado por se cadastrar,<br>Manteremos você sempre atualizado!</h5>
        <a href="index.html" class="cta mini-title upper white-text suave click">Voltar</a>
    </div>
    <script>
        setTimeout(function(){
            window.location.href = 'https://www.pombocriativo.com/inicio';
        }, 3000);
        function loadCss(css) {
            var added = false;

            function trigger(){
                if (added) return;
                    added = true;
                    var css = document.createElement("link");
                    css.onload = function() {
                        document.body.appendChild(css);
                    };
                    css.rel = "stylesheet";
                    css.src = css;
            }
            if (document.readyState !== "loading") {
                trigger();
            } else {
                document.addEventListener("DOMContentLoaded", trigger);
            }
        }

        loadCss("css/https://fonts.googleapis.com/css?family=Comfortaa:400,800&display=swap");
        loadCss("css/https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&display=swap");
    </script>
<?php
} else {
    echo "Não foi possível enviar o e-mail.";
    echo "<b>Detalhes do erro:</b> " . $mail->ErrorInfo;
}
?>
</body>
</html>