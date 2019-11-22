<?php 

	$hostname = "localhost";
	$database = "osescolhidos";
	$user = "root";
	$password = "";

	$mysqli = new mysqli($hostname, $user, $password, $database);
	if ($mysqli->connect_errno) {
		echo "Falha na conexao to Mysql: (". $mysqli->connect_errno .") ". $mysqli->connect_errno;
	}
?>