<?php

$dsn = 'mysql:host=localhost;dbname=pim_semestre';
$username = 'root';
$password = '';
		
try{

	global $db;
	// Criar conexão
	$db = new PDO($dsn, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (PDOException $e){

		echo "Falha de conexão: ".$ex->getMessage();
	}
?>