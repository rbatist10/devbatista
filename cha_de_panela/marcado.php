<?php
session_start();
require './config.php';

if(!empty($_GET['id'])) {
	$id = intval($_GET['id']);

	$sql = "UPDATE itens SET marcado = '1', quem_leva = :nome, email = :email WHERE id = :id";
	$sql = $db->prepare($sql);
	$sql->bindValue(":nome", $_SESSION['nome']);
	$sql->bindValue(":email", $_SESSION['email']);
	$sql->bindValue(":id", $id);
	$sql->execute();

	$sql2 = "SELECT item FROM itens WHERE id = ".$id;
	$sql2 = $db->query($sql2);

	if($sql2->rowCount() > 0) {
		foreach($sql2->fetchAll() as $itens):
			$_SESSION['item'] = $itens['item'];
		endforeach;
	}
}

header("Location: ./envia_email.php");
exit;