<?php

$dsn = "mysql:dbname=testeapp2;host=testeapp2.mysql.dbaas.com.br";
$dbuser = "testeapp2";
$dbpass = "ShowdeBola#10";

try {
	global $db;
	$db = new PDO($dsn, $dbuser, $dbpass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die.($e->getMessage());
}
?>
