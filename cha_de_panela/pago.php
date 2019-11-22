<?php
require '../config.php';

if(!empty($_GET['id'])) {
	$id = intval($_GET['id']);

	$sql = "UPDATE competidores SET pago = '1' WHERE id = :id";
	$sql = $db->prepare($sql);
	$sql->bindValue(":id", $id);
	$sql->execute();
}

header("Location: ./nao-pagaram.php");
exit;