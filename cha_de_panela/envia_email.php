<?php
session_start();
require 'config.php';

$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$item = $_SESSION['item'];
$assunto = "Chá de panela - Rafa e Kel";
$emailsender = "rafael@testeapp.com.br";
$nomeremetente = "Rafael e Kelly";

$mensagem = "Olá, ".$nome."<br><br>Se você está recebendo esse email é porque já consta no meu sistema que você escolheu um(a) <b>".$item."</b> para nos presentear.<br><br>Estamos muito felizes por aceitar nosso convite e aguardamos que você compareça no nosso Chá de Panela dia 24/11 as 14h para darmos muitas risadas, jogar resenhas fora e fazer várias brincadeiras nesse momento ímpar em nossas vidas.<br><br>Lembrando que o churrasco é por nossa conta, a bebida o próprio convidado que deverá levar.<br><br>Caso tenha escolhido um item e deseja trocar por outro, basta escolher na lista novamente, colocando seu nome e email em http://testeapp.com.br/cha-de-panela e nos mandar uma mensagem via whatsapp informando o item que deseja desmarcar.<br><br>Abaixo deixamos as informações sobre o local.<br><br>Rua Padre Fernando Pedreira de Castro, 30 - Jurubatuba - São Paulo - SP - 04696-180<br>Horário: 14h sem previsão para encerramento.<br><br>Contamos com sua presença.<br>Rafael e Kelly";

$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/html; charset=utf-8\n";
$headers .= "From: ".$emailsender."\n";
$headers .= "Return-Path: ".$emailsender."\n";
$headers .= "Reply-To: ".$email."\n";

mail($email, $assunto, $mensagem, $headers, "-r". $emailsender);

session_unset();
session_destroy();
header ("Location: ./index.php");

?>