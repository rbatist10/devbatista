<?php
require 'config.php';

$h = $_GET['h'];

if(!empty($h)) {
	$db->query("UPDATE usuarios SET status = '1' WHERE MD5(id) = '$h'");
	echo "<h2>Cadastro confirmado com sucesso!</h2>";
}

?>
