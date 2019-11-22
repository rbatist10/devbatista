<?php 

$dsn = "mysql:dbname=escolhidos;host=localhost;charset=utf8";
$dbuser = "root";
$dbpass = "";

try {

	global $db;
	$db = new PDO($dsn, $dbuser, $dbpass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

	echo "Falha de conexão: ".$e->getMessage();

}

?>