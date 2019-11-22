<?php
try {
	global $pdo; //para que o pdo funcione em toda a estrutura é preciso criar como variável global
	$pdo = new PDO("mysql:dbname=projeto_mmn;host=localhost", "root", "");
} catch (Exception $e) {
	echo "Erro: ".$e->getMessage();
	exit;
}

$limite = 3;

$patentes  = array();

?>