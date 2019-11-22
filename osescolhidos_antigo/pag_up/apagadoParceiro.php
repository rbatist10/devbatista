<?php 
	include '../config/conexao.php';

	if (!isset($_GET['idParceiro'])){
		$id = null;
	}
	else {
		$id = intval($_GET['idParceiro']);
		$query = $mysqli->query("delete from parceiros WHERE id = ". $id ) or die ($mysqli->error);
	}
?>