<?php
require "config.php";

$arquivo = file("itens.txt");

foreach($arquivo as $item):

	$verificador = "SELECT * FROM itens WHERE item = ':item'";
	$verificador = $db->prepare($verificador);
	$verificador->bindValue(":item", $item);
	$verificador->execute();

	if($verificador->rowCount() == 0) {
	
	$sql = "INSERT INTO itens SET item = :item, marcado = 0";
	$sql = $db->prepare($sql);
	$sql->bindValue(":item", $item);
	$sql->execute();
	
	};

endforeach;

header("Location: ./index.php");
?>