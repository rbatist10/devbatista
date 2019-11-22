<?php

if(isset($_POST['nome']) && !empty($_POST['nome'])) {

	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$msg = addslashes($_POST['msg']);

	$para = "batist11@gmail.com";
	$assunto = "Contato do site";
	$corpo = "Nome: ".$nome." - Email: ".$email."<br/>Mensagem:<br/>".$msg;
	$cabecalho = "From: rafael.batista@itech-all.com"."\r\n"."Reply-To: ".$email."\r\n"."X-Mailer: PHP/".phpversion(); // \r\n -> pular linha

	mail($para, $assunto, $corpo, $cabecalho);

	echo "<h2>Envio feito com sucesso</h2>";
	exit;

}

?>

<!DOCTYPE html>
<html>
	<form method="POST">
		Nome:<br/>
		<input type="text" name="nome" /><br/><br/>

		Email:<br/>
		<input type="email" name="email" /><br/><br/>

		Mensagem:<br/>
		<textarea name="msg"></textarea><br/><br/>

		<input type="submit" value="Enviar">
	</form>
</html>