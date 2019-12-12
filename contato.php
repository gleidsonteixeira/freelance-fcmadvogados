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
    <meta name="author" content="Gleidson Teixeira, contato@pombocriativo.com"/>
    <meta name="robots" content="index, follow">
    <meta name="language" content="pt-br" />    

    <link rel="canonical" href="https://www.fcmadvogados.adv.br" />
    <link rel="shortlink" href="https://www.fcmadvogados.adv.br" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300|Oswald:400,700">
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css"/>
    <link rel="stylesheet" href="css/extras.css" type="text/css"/>
    <link rel="stylesheet" href="css/contato.css" type="text/css"/>
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
$mail->Host = "smtp.fcmadvogados.adv.br	"; // Seu endereço de host SMTP
$mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
$mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
$mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
$mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
$mail->Username = 'contato@fcmadvogados.adv.br'; // Conta de email existente e ativa em seu domínio
$mail->Password = 's1i2t3efcm'; // Senha da sua conta de email
 
// DADOS DO REMETENTE
$mail->Sender = "contato@fcmadvogados.adv.br"; // Conta de email existente e ativa em seu domínio
$mail->From = "contato@fcmadvogados.adv.br"; // Sua conta de email que será remetente da mensagem
$mail->FromName = "Contato do site"; // Nome da conta de email
 
// DADOS DO DESTINATÁRIO
$mail->AddAddress('contato@fcmadvogados.adv.br', 'FCM Advogados - Contato do site'); // Define qual conta de email receberá a mensagem
$mail->AddBCC('pombocriativo@gmail.com'); // Define qual conta de email receberá a mensagem
//$mail->AddAddress('recebe2@dominio.com.br'); // Define qual conta de email receberá a mensagem
//$mail->AddBCC('copiaoculta@dominio.info'); // Define qual conta de email receberá uma cópia oculta
 
// Definição de HTML/codificação
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
 
// DEFINIÇÃO DA MENSAGEM
$mail->Subject  = "Contato do site[".$_POST['nome']."]"; // Assunto da mensagem
$mail->Body .=  '<div style="background-color: #f6f6f6;padding: 10%;">';
$mail->Body .=  '    <div style="background-image: linear-gradient(-45deg, #1b5678,#56aeff);border-radius: 10px 10px 0 0;overflow: hidden;">';
$mail->Body .=  '        <figure style="display: block;margin: 30px auto;width: 100px;">';
$mail->Body .=  '            <img src="http://fcmadvogados.adv.br/img/logo-fcm-advogados.png" alt="Pombo Criativo" style="display: block;width: 100%;">';
$mail->Body .=  '        </figure>';
$mail->Body .=  '    </div>';
$mail->Body .=  '    <div style="background-color: white;padding: 16px;border-radius: 0 0 10px 10px;">';
$mail->Body .=  '        <h2 style="color: #56aeff;">Contato do site</h2>';
$mail->Body .=  '        <h4 style="margin-bottom: 0;font-weight:bold;color: #1b5678;">Nome:</h4>';
$mail->Body .=  '        <p style="margin: 0;font-size: 18px;">'.$_POST['nome'].'</p>';
$mail->Body .=  '        <h4 style="margin-bottom: 0;font-weight:bold;color: #1b5678;">Email:</h4>';
$mail->Body .=  '        <p style="margin: 0;font-size: 18px;">'.$_POST['email'].'</p>';
$mail->Body .=  '        <h4 style="margin-bottom: 0;font-weight:bold;color: #1b5678;">Telefone:</h4>';
$mail->Body .=  '        <p style="margin: 0;font-size: 18px;">'.$_POST['telefone'].'</p>';
$mail->Body .=  '        <h4 style="margin-bottom: 0;font-weight:bold;color: #1b5678;">Assunto:</h4>';
$mail->Body .=  '        <p style="margin: 0;font-size: 18px;">'.nl2br($_POST['assunto']).'</p>';
$mail->Body .=  '        <h4 style="margin-bottom: 0;font-weight:bold;color: #1b5678;">Mensagem:</h4>';
$mail->Body .=  '        <p style="margin: 0;font-size: 18px;">'.nl2br($_POST['mensagem']).'</p>';
$mail->Body .=  '    </div>';
$mail->Body .=  '</div>';


// $mail->Body .= " Nome: ".$_POST['nome']."<br>"; // Texto da mensagem
// $mail->Body .= " E-mail: ".$_POST['email']."<br>"; // Texto da mensagem
// $mail->Body .= " Telefone: ".$_POST['telefone']."<br>"; // Texto da mensagem
// $mail->Body .= " Assunto: ".nl2br($_POST['assunto'])."<br>"; // Texto da mensagem
// $mail->Body .= " Mensagem: ".nl2br($_POST['mensagem'])."<br>"; // Texto da mensagem
 
// ENVIO DO EMAIL
$enviado = $mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
 
// Exibe uma mensagem de resultado do envio (sucesso/erro)
if ($enviado) {
?>
    <div class="obrigado">
        <i class="material-icons">mail</i>
        <h5 class="font cor1-text">E-mail enviado com sucesso,<br>Responderemos o mais rápido possível!</h5>
        <a href="inicio" class="cta mini-title upper white-text suave click">Voltar</a>
    </div>
    <!-- <script>
        setTimeout(function(){
            window.location.href = 'https://objetiveti.com.br/cameras.php';
        }, 3000);
    </script> -->
<?php
} else {
  echo "Não foi possível enviar o e-mail.";
  echo "<b>Detalhes do erro:</b> " . $mail->ErrorInfo;
}
?>