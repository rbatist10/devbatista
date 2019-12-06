<?php

if($_SERVER['SERVER_ADDR'] == '::1') {
	$dns = "mysql:dbname=X;host:Y";
	$dbuser = "usuario";
	$dbpass = "senha";
}
if($_SERVER['SERVER_ADDR'] == '192.168.0.1') {
	$dns = "mysql:dbname=X;host:Y";
	$dbuser = "usuario";
	$dbpass = "senha";
}
if($_SERVER['SERVER_ADDR'] == 'online') {
	$dns = "mysql:dbname=X;host:Y";
	$dbuser = "usuario";
	$dbpass = "senha";
}

try {
	global $db;
	$db = new PDO($dns, $dbuser, $dbpass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Erro: ".$e->getMessage();
}

?>