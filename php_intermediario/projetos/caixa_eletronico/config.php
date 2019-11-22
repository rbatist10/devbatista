<?php
try {
	$pdo = new PDO("mysql:dbname=contas;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "Erro: ".$e->getMessage();
}

?>