<?php
session_start(); //é preciso abrir sessão no PHP caso os arquivos de configurações estejam separados

if(isset($_POST['email']) && empty($_POST['email']) == false) { //Verificar se o campo de email foi inserido
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	$dsn = "mysql:dbname=blog;host:localhost";
	$dbuser = "root";
	$dbpass = "";

	try {
		$db = new PDO($dsn, $dbuser, $dbpass);
		$sql = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'";
		$sql = $db->query($sql);

		if($sql->rowCount() > 0) {

			$dado = $sql->fetch(); //pega o primeiro resultado da requisição $sql -- fetchAll() para buscar todos resultados
			
			$_SESSION['id'] = $dado['id']; //salva o dado de ID na variável de sessão

			header("Location: index.php");

		} else {
			echo "Usuário e/ou senha inexistentes.";
		}

	} catch(PDOException $e) {
		echo "Falhou: ".$e->getMessage();
	}
}

?>

Página de login <br/><br/>

<form method="POST">
		Email:<br/>
		<input type="text" name="email" /><br/><br/>
		Senha:<br/>
		<input type="password" name="senha" /><br/><br/>

		<input type="submit" value="Entrar" />

</form>