<?php 
	include '../config/conexao.php';

	if (!isset($_GET['valor'])){
		$id = null;
	}
	else {
		$id = intval($_GET['valor']);
		$query = $mysqli->query("delete from videos WHERE id = ". $id ) or die ($mysqli->error);
	}
?>