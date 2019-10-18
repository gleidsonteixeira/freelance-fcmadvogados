<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
    
    <title>Obrigado</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="expires" content="Tue, 01 Jan 2019 12:12:12 GMT">
    <meta http-equiv="cache-control" content="public" />
    <meta http-equiv="Pragma" content="public">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content="Gleidson Teixeira, g.teixeira@objetiveti.com.br"/>
    <meta name="robots" content="index, follow">
    <meta name="language" content="pt-br" />    

    <link rel="canonical" href="https://objetiveti.com.br" />
    <link rel="shortlink" href="https://objetiveti.com.br" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300|Oswald:400,700">
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css"/>
    <link rel="stylesheet" href="css/extras.css" type="text/css"/>
    <link rel="stylesheet" href="css/site.css" type="text/css"/>
    <link rel="icon" href="img/favicon.png" sizes="32x32" />
    <link rel="icon" href="img/favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="img/favicon.png" />

</head>
<?php
// Adiciona o arquivo class.phpmailer.php - você deve especificar corretamente o caminho da pasta com o este arquivo.
require_once("autenvio/PHPMailerAutoload.php");
// Inicia a classe PHPMailer
$mail = new PHPMailer();
 
// DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.objetiveti.com.br"; // Seu endereço de host SMTP
$mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
$mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
$mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
$mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
$mail->Username = 'g.teixeira@objetiveti.com.br'; // Conta de email existente e ativa em seu domínio
$mail->Password = 'sup-2018'; // Senha da sua conta de email
 
// DADOS DO REMETENTE
$mail->Sender = "g.teixeira@objetiveti.com.br"; // Conta de email existente e ativa em seu domínio
$mail->From = "g.teixeira@objetiveti.com.br"; // Sua conta de email que será remetente da mensagem
$mail->FromName = "Landpage - Relatórios Objetive"; // Nome da conta de email
 
// DADOS DO DESTINATÁRIO
$mail->AddAddress('i.oliveira@objetiveti.com.br', 'Landpage - Relatórios Objetive'); // Define qual conta de email receberá a mensagem
//$mail->AddAddress('recebe2@dominio.com.br'); // Define qual conta de email receberá a mensagem
$mail->AddCC('g.teixeira@objetiveti.com.br'); // Define qual conta de email receberá uma cópia
//$mail->AddBCC('copiaoculta@dominio.info'); // Define qual conta de email receberá uma cópia oculta
 
// Definição de HTML/codificação
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
 
// DEFINIÇÃO DA MENSAGEM
$mail->Subject  = "Pedido de Teste Relatórios Objetive"; // Assunto da mensagem
$mail->Body .= " Nome: ".$_POST['testeNome']."<br>"; // Texto da mensagem
$mail->Body .= " E-mail: ".$_POST['testeEmail']."<br>"; // Texto da mensagem
$mail->Body .= " Telefone: ".$_POST['testeTelefone']."<br>"; // Texto da mensagem
$mail->Body .= " Estado: ".$_POST['testeEstado']."<br>"; // Texto da mensagem
$mail->Body .= " Cidade: ".$_POST['testeCidade']."<br>"; // Texto da mensagem
//$mail->Body .= " Segmento: ".$_POST['testeSegmento']."<br>"; // Texto da mensagem
//$mail->Body .= " Assunto: ".nl2br($_POST['assunto'])."<br>"; // Texto da mensagem
 
// ENVIO DO EMAIL
$enviado = $mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
 
// Exibe uma mensagem de resultado do envio (sucesso/erro)
if ($enviado) {
?>
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create','UA-104056819-1','auto');ga('send','pageview');</script>

    <div class="obrigado">
        <img src="img/enviado.png">
        <h5 class="font cor1-text">Pedido enviado com sucesso,<br>Responderemos o mais rápido possível!</h5>
        <a href="index.html" class="cta mini-title upper white-text suave click">Voltar</a>
    </div>
    <script>
        setTimeout(function(){
            window.location.href = 'https://objetiveti.com.br/testegratis/';
        }, 3000);
    </script>
<?php
} else {
  echo "Não foi possível enviar o e-mail.";
  echo "<b>Detalhes do erro:</b> " . $mail->ErrorInfo;
}
?>