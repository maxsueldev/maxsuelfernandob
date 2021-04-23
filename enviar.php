<?php 

$email_envio = 'maxsuelf94@gmail.com'; //Email receptor
$email_pass = ''; //Senha do email

$site_name = 'Maxsuel Fernando - Desenvolvedor Web'; //Nome do site
$site_url = ''; //Url do site

$host_smtp = 'smtp.gmail.com'; //HOST SMTP Ex: smtp.domain.com.br
$host_port = '587'; //Porta do host

//Variáveis do formulário

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

//Conteúdo do formulário

$body_content = "De: $nome \n Email: $email \n Mensagem: $mensagem";

//Não mudar a partir daqui

// if($_POST['leaveblank'] =! '' or $_POST['dontchange'] =! 'http://') {
// 	print "<h2 style=\"
// 	font-size: 1em;
// 	margin-top: 20%;
// 	text-align: center;
// 	font-family: 'Helvetica', 'Arial', 'Sans-serif';
// 	font-weight: normal;
// 	color: #1b1b1b;
// 	\"><center><span>Aconteceu algum erro!</span><p>Você pode tentar novamente ou enviar direto para " . $email_envio . "!</p></center></h2>";

// 	print "<html style=\"background: #fff;\"></html>";
// 	print "<meta HTTP-EQUIV='Refresh' CONTENT='10;URL=" . $site_url . "'>";
// }

/* else */  

if(isset($_POST['nome'])) { 
	require('./mailerClass/PHPMailerAutoload.php');

	$mail = new PHPMailer;
	$mail->CharSet = 'UTF-8';

	$mail->isSMTP();
	$mail->Host = $host_smtp;
	$mail->SMTPAuth = true;
	$mail->Username = $email_envio;
	$mail->Password = $email_pass;
	$mail->Port = $host_port;

	$mail->From = "maxsuelf94@gmail.com";

	$mail->addAddress("maxsuelf94@gmail.com");

	$mail->FromName = 'Formulário de Contato';
	$mail->AddReplyTo($_POST['email'], $_POST['nome']);

	$mail->WordWrap = 70;

	$mail->Subject = 'Formulário - ' . $site_name . ' - ' . $_POST['nome'];

	$mail->Body = $body_content;

	if($mail->send()) {
		header("location: https://maxsuelfernandob.000webhostapp.com");
	} else {
		header("location: https://maxsuelfernandob.000webhostapp.com");
	}

	// if(!$mail->send()) {
	// 	print "<h2 style=\"
	// 	font-size: 1.5em;
	// 	margin-top: 20%;
	// 	text-align: center;
	// 	font-family: 'Inconsolata', 'Arial', 'Sans-serif';
	// 	font-weight: normal;
	// 	color: #fdc64b;
	// 	\"><center><span>Aconteceu algum erro!</span><p>Você pode tentar novamente ou enviar direto para " . "contato@escolacreative.com" . "!</p></center></h2>";

	// 	print "<html style=\"background: #fff;\"></html>";
	// 	print "<meta HTTP-EQUIV='Refresh' CONTENT='10;URL=" . $site_url . "'>";
	// } else {
	// 	print "<h2 style=\"
	// 	font-size: 1.5em;
	// 	margin-top: 20%;
	// 	text-align: center;
	// 	font-family: 'Inconsolata', 'Arial', 'Sans-serif';
	// 	font-weight: normal;
	// 	color: #89bb50;
	// 	\"><center><span>Formulário enviado!</span><p>Em breve entraremos em contato!</p></center></h2>";

	// 	print "<html style=\"background: #fff;\"></html>";
	// 	print "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=" . $site_url . "'>";
	// }
} 

?>