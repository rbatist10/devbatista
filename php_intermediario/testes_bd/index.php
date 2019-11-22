<?php

	try {
		$pdo = new PDO("mysql:dbname=blog;host=localhost", "root", "");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Obrigando a mostrar o erro interno que ocorreu
	} catch(PDOException $e) {
		echo "FALHA: ".$e->getMessage();
	}

	$sql = "SELECT * FROM userss";
	$sql = $pdo->query($sql);

	echo "Total: ".$sql->rowCount();

?>