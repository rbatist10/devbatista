<?php 

$dsn = "mysql:dbname=testeapp2;host=179.188.16.16;charset=utf8";
$dbuser = "testeapp2";
$dbpass = "showdebola";

try {

	global $db;
	$db = new PDO($dsn, $dbuser, $dbpass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

	echo "Falha de conexão: ".$e->getMessage();

}

?>