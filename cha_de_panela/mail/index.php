<?php

$emailsender = "teste@osescolhidos.com.br";
$nomeremetente = "Teste";
$emaildestinatario = "teste@osescolhidos.com.br";
$comcopia = "batist11@gmail.com";
$comcopiaoculta = "";
$assunto = "Teste PHPMail";
$mensagem = "Corpo do email";
$replyTo = "rafael.batista@itech-all.com";

$mensagemHTML = "<p>Teste da função PHP Mail(): !</p>
<p>Título</p>
<p>".$mensagem."</p>
<hr>";

$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: ".$emailsender."\n";
$headers .= "Return-Path: ".$emailsender."\n";
$headers .= "Cc: ".$comcopia."\n";
$headers .= "Reply-To: ".$replyTo."\n";

mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);

print "Mensagem enviada com sucesso!";


?>
