<?php
session_start();

if (!isset($_SESSION['captcha'])) {
	$n = rand(1000, 9999);
	$_SESSION['captcha'] = $n;
}

if (!empty($_POST['email'])) {
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$codigo = $_POST['codigo'];

	if ($codigo == $_SESSION['captcha']) {
		echo "Logado com sucesso!";
	} else {
		echo "Digite o código novamente.";
	}
}

?>
<br/>
<form method="POST">
	Email: <br/>
	<input type="email" name= "email" /><br/><br/>

	Senha: <br/>
	<input type="password" name="senha" /><br/><br/>

	<img src="imagem.php" width="100" height="50" /><br/>
	<input type="text" name="codigo" /><br/><br/>

	<input type="submit" value="Verificar" />
</form>