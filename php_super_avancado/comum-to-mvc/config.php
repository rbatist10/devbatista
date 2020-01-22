<?php
require "environment.php";

global $config;
$config = array();
if (ENVIRONMENT == 'development') {
	// define("BASE_URL", "http://localhost/php_super_avancado/comum-/estrutura_mvc/");
	$config['dbname'] = "blog";
	$config['host'] = "localhost";
	$config['dbuser'] = "root";
	$config['dbpass'] = "";
} else {
	// define("BASE_URL", "");
	$config['dbname'] = "";
	$config['host'] = "";
	$config['dbuser'] = "";
	$config['dbpass'] = "";
}

// global $db;
// try {
// 	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
// } catch (Exception $e) {
// 	echo "Falha: ".$e->getMessage();
// 	exit;
// }
?>