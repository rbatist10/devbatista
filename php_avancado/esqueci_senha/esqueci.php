<?php
require 'config.php';

if(!empty($_POST['email']) && isset($_POST['email'])) {

	$email = $_POST['email'];

	$sql = "SELECT * FROM usuarios WHERE email = :email";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":email", $email);
	$sql->execute();

	if($sql->rowCount() > 0) {

		$sql = $sql->fetch();
		$id = $sql['id'];

		$token = md5(time().rand(0, 99999).rand(0, 99999));

		$sql = "INSERT INTO usuarios_token (id_usuario, hash, expirado_em) VALUES (:id_usuario, :hash, :expirado_em)";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_usuario", $id);
		$sql->bindValue(":hash", $token);
		$sql->bindValue(":expirado_em", date('Y-m-d H:i', strtotime('+2 months')));
		$sql->execute();

		// $link = "http://testeapp.com.br/esqueci_senha/redefinir.php?token=".$token;
		$link = "http://www.osescolhidos.com.br/esqueci_senha/redefinir.php?token=".$token;

		$assunto = "Redefinição de senha";
		$mensagem = "Clique no link para redefinir a senha:<br/><br/>".$link;
		$remetente = "will.conceicao@osescolhidos.com.br";

		$headers = "MIME-Version: 1.1\n";
	    $headers .= "Content-type: text/html; charset=utf-8\n";
	    $headers .= "From: ".$remetente."\n";
	    $headers .= "Return-Path: ".$remetente."\n";
	    $headers .= "Cc: batist11@gmail.com\n";
	    // $headers .= "Reply-To: ".$email."\n";

	    // mail($email, $assunto, $mensagem, $headers, "-r".$remetente);
	    echo $mensagem;
	    exit;

	}

}

?>

<form method="POST">
	Qual seu email?<br/>
	<input type="email" name="email" /><br/>

	<input type="submit" value="Enviar" /><br/>
</form>