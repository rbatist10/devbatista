<?php

//para conexão com o banco de dados
$dsn = "mysql:dbname=blog;host=localhost";
$dbuser = "root";
$dbpass = "";

try { //uma proteção para, caso dê erro, envia para o CATCH ao invés de mostrar o erro para o usuário

	$pdo = new PDO($dsn, $dbuser, $dbpass); //Inicia uma classe do PDO (biblioteca)
	$nome = "Testador";
	$email = "teste@hotmail.com";
	$senha = md5("showdebola");
	
	$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
	$sql = $pdo->query($sql); //execução da query no banco de dados

	echo "Usuário ".$nome." inserido com sucesso.<br/> id: ".$pdo->lastInsertID(); //mostra na tela qual o último ID inserido

} catch(PDOException $e) { //Se acontecer um erro no try, o erro vai ficar dentro da variável $e

	echo "Falhou: ".$e->getMessage(); //

}

?>