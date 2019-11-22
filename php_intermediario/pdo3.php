<?php

//para conexão com o banco de dados
$dsn = "mysql:dbname=blog;host=localhost";
$dbuser = "root";
$dbpass = "";

try { //uma proteção para, caso dê erro, envia para o CATCH ao invés de mostrar o erro para o usuário

	$pdo = new PDO($dsn, $dbuser, $dbpass); //Inicia uma classe do PDO (biblioteca)
	
	//$sql = "UPDATE usuarios SET email = 'abc@hotmail.com' WHERE email = 'teste@hotmail.com'";
	$novasenha = md5("teste123");
	$sql = "UPDATE usuarios SET senha = '$novasenha' WHERE id = '1'";
	$sql = $pdo->query($sql);

	echo "Senha alterada com sucesso.";

} catch(PDOException $e) { //Se acontecer um erro no try, o erro vai ficar dentro da variável $e

	echo "Falhou: ".$e->getMessage(); //

}

?>