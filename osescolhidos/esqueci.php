<?php
require 'config.php';

if(!empty($_POST['email']) && isset($_POST['email'])) {

	$email = $_POST['email'];

	$sql = "SELECT * FROM usuarios WHERE email = :email";
	$sql = $db->prepare($sql);
	$sql->bindValue(":email", $email);
	$sql->execute();

	if($sql->rowCount() > 0) {

		$sql = $sql->fetch();
		$sql2 = $sql;
		$id = $sql['id'];

		$token = md5(time().rand(0, 99999).rand(0, 99999));

		$sql = "INSERT INTO usuarios_token (id_usuario, hash, expirado_em) VALUES (:id_usuario, :hash, :expirado_em)";
		$sql = $db->prepare($sql);
		$sql->bindValue(":id_usuario", $id);
		$sql->bindValue(":hash", $token);
		$sql->bindValue(":expirado_em", date('Y-m-d H:i', strtotime('+2 months')));
		$sql->execute();

		// $link = "http://testeapp.com.br/esqueci_senha/redefinir.php?token=".$token;
		$link = "http://www.osescolhidos.com.br/redefinir.php?token=".$token;

		$assunto = "Redefinição de senha";
		$mensagem = "Clique no link para redefinir a senha:<br/><br/> <a href='".$link."'>".$link."</a>";
		$remetente = "will.conceicao@osescolhidos.com.br";

		$headers = "MIME-Version: 1.1\n";
	    $headers .= "Content-type: text/html; charset=utf-8\n";
	    $headers .= "From: ".$remetente."\n";
	    $headers .= "Return-Path: ".$remetente."\n";
	    // $headers .= "Cc: batist11@gmail.com\n";
	    $headers .= "Reply-To: ".$email."\n";


	    mail($email, $assunto, $mensagem, $headers, "-r".$remetente);
	    ?><script>alert("Um email foi redirecionado para redefinição de sua senha!");
	    		window.location.href="./";</script><?php

	    // header("Location: ./");
	    // echo $mensagem;
	    exit;

	} else {
		?> 
		<script>alert("Email inválido!");</script>
		<?php
	}

}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/style.css">
		<link rel="icon" type="image/png" href="img/escolhidos.png" />
	</head>
	<body>
		<div class="container esqueci">
			<div class="row justify-content-center align-middle">
				<form method="POST">
					Qual seu email?<br/><br/>
					<input type="email" name="email" class="form-control" required /><br/>

					<input type="submit" value="Enviar" class="btn btn-dark" id="esqueci-senha" />
				</form>
			</div>
		</div>

		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>