<?php
require "environment.php";

$config = array();
if (ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/php_super_avancado/mvc/estrutura_mvc/");
	$config['dbname'] = "estrutura_mvc";
	$config['host'] = "localhost";
	$config['dbuser'] = "root";
	$config['dbpass'] = "";
} else {
	define("BASE_URL", "");
	$config['dbname'] = "";
	$config['host'] = "";
	$config['dbuser'] = "";
	$config['dbpass'] = "";
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch (Exception $e) {
	echo "Falha: ".$e->getMessage();
	exit;
}
?>