<?php
require 'config.php';

if(isset($_POST['nome']) && empty($_POST['nome']) == false) { // Se o usuário enviou o $_POST['nome'] e o campo nome não estiver vazio, ele executa o IF
	$nome = addslashes($_POST['nome']); //proteção contra o SQLInjection
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
	$pdo->query($sql);

	// Provavelmente é preciso usar um if para verificar se clicou em "Cadastrar" talvez em Javascript
	header("Location: index.php"); //redireciona para a página index.php
}

?>
<form method="POST">
	Nome:<br/>
	<input type="text" name="nome" /><br/><br/>
	Email:<br/>
	<input type="text" name="email" /><br/><br/>
	Senha: <br/>
	<input type="password" name="senha" /><br/><br/>

	<input type="submit" value="Cadastrar" />
</form>