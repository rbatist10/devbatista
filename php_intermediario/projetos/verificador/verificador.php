<?php
session_start(); // Tudo que mexe com sessão deverá ser aberto.

if(!empty($_POST['numero'])) {

	$numero = intval($_POST['numero']);

	if($_SESSION['v'] == $numero) {
		echo "HUMANO";
		?><br><a href="./index.php">voltar</a> 
	<?php } else {
		echo "FAKE";
		?><br><a href="./index.php">voltar</a> 
	<?php }

} else {
	header("Location: index.php");
}
?>