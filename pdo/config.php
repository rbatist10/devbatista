<?php

$dns = "mysql:dbname=X;host:Y";
$dbuser = "usuario";
$dbpass = "senha";

try {
	global $db;
	$db = new PDO($dns, $dbuser, $dbpass);
} catch(PDOException $e) {
	echo "Erro: ".$e->getMessage();
}

?>