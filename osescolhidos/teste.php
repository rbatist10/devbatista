<?php

require 'config.php';


if(isset($_POST['nome']) && !empty($_POST['nome'])) {
	$nome = $_POST['nome'];

	$sql = "INSERT INTO teste SET nome = :nome";
	$sql = $db->prepare($sql);
	$sql->bindValue(":nome", $nome);
	$sql->execute();

}

?>

<form method="POST">
	<input type="text" name="nome" />
	<input type="submit" value="enviar" />
</form>