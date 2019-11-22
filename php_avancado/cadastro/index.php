<?php
if(isset($_POST['nome']) && !empty($_POST['nome'])) {
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	
	require 'config.php';

	$db->query("INSERT INTO usuarios SET nome = '$nome', email = '$email'");
	$id = $db->lastInsertId();

	$md5 = md5($id);
	$link = 'http://testeapp.com.br/cadastro/confirmar.php?h='.$md5;

	$assunto = "Confirme seu cadastro";
	$msg = "Clique no link abaixo para confirmar seu cadastro:\n\n".$link;
	$remetente = "teste@testeapp.com.br";

	$headers = "MIME-Version: 1.1\n";
    $headers .= "Content-type: text/html; charset=utf-8\n";
    $headers .= "From: teste@testeapp.com.br\n";
    $headers .= "Return-Path: teste@testeapp.com.br\n";
    $headers .= "Cc: batist11@gmail.com\n";
    $headers .= "Reply-To: ".$replyTo."\n";

    mail($email, $assunto, $msg, $headers, "-r". $remetente);

    echo "<h2>Confirme seu cadastro agora!</h2>";
    exit;
}

?>
<form method="POST">
	Nome: <br/>
	<input type="text" name="nome" /><br/><br/>

	Email: <br/>
	<input type="email" name="email" /><br/><br/>

	<input type="submit" value="Cadatrar" />
</form>
