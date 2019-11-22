<?php 

$dsn = "mysql:dbname=pim_semestre;host=localhost;charset=utf8";
$dbuser = "root";
$dbpass = "";

try {

	global $db;
	$db = new PDO($dsn, $dbuser, $dbpass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// echo "conectou";

} catch (PDOException $e) {

	echo "Falha de conexão: ".$e->getMessage();

}

?>