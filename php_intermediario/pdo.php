<?php

//para conexão com o banco de dados
$dsn = "mysql:dbname=blog;host=localhost";
$dbuser = "root";
$dbpass = "";

try { //uma proteção para, caso dê erro, envia para o CATCH ao invés de mostrar o erro para o usuário

	$pdo = new PDO($dsn, $dbuser, $dbpass); //Inicia uma classe do PDO (biblioteca)
	//echo "Conexão estabelecida.";
	$sql = "SELECT * FROM usuarios";
	$sql = $pdo->query($sql);

	//Verificar se há registros na query solicitada
	if($sql->rowCount() > 0) { //rowCount() - significa: conte as linhas, a conta tem que dar maior do que zero para entrar no if
	
		foreach($sql->fetchAll() as $usuario) { //vai pegar todos os resultados da query e transformar num array
			echo $usuario["nome"]." - ".$usuario["email"]."<br/>";
		}

	} else {
		echo "Não há registros cadastrados";
	}

} catch(PDOException $e) { //Se acontecer um erro no try, o erro vai ficar dentro da variável $e

	echo "Falhou: ".$e->getMessage(); //

}

?>