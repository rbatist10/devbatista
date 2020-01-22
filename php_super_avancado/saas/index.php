<?php
try {
	$pdo = new PDO("mysql:dbname=saas;host=localhost", "root", "");
} catch (PDOException $e) {
	echo "Falou: ".$e->getMessage();
}

// print_r($_SERVER);
$dominio = $_SERVER['HTTP_HOST'];

$sql = "SELECT * FROM usuarios WHERE dominio = ?";
$sql = $pdo->prepare($sql);
$sql->execute(array($dominio));

if($sql->rowCount() > 0) {
	$cliente = $sql->fetch();

	if(file_exists('clientes/'.$cliente['id'].'/index.php')) {
		require 'clientes/'.$cliente['id'].'/index.php';
	} else {
		echo "Sistema fora do ar";
	}
	// echo "Cliente que acessou: ".$cliente['nome'];
	// print_r($cliente);
} else {
	echo "Sistema fora do ar";
}