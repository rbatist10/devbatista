<?php 
session_start();
require '../config.php';

if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
	header("Location: index.php");
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
		<div class="container">
			<div class="row justify-content-center align-middle">
				
					<form method="POST" class="justify-content-center align-items-center">
						E-mail:<br/>
						<input type="text" name="email" /><br/><br/>
						Senha:<br/>
						<input type="password" name="senha" /><br/><br/>

						<input type="submit" value="Entrar" /><br/><br/>
					</form>
				
			</div>
		</div>

		<script type="text/javacript" src="../js/jquery-3.3.1.min.js"></script>
		<script type="text/javacript" src="../js/bootstrap.bundle.min.js"></script>
	</body>
<?php
if(isset($_POST['email']) && !empty($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	//$dsn = "mysql:dbname=escolhidos;host=127.0.0.1";
	//$dbuser = "root";
	//$dbpass = "";

	try {
		//$db = new PDO($dsn, $dbuser, $dbpass);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
		$sql = $db->query($sql);

		if ($sql->rowCount() > 0) {

			$dado = $sql->fetch();

			$_SESSION['id'] = $dado['id'];

			header("Location: index.php");

		} else {
			echo '<div class="alert alert-danger alert-dismissible" role="alert">
					<h4 class="alert-heading">ERRO!!!</h4>
					E-mail e/ou senha inválidos.
					<button class="close" data-dismiss="alert" aria-label="Fechar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br/><br/>';
		}

	} catch (Exception $e) {
		echo "Falhou: ".$e->getMessage();		
	}

}

?>
</html>