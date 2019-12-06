<form method="POST">
	Qual seu nome? <br>
	<input type="text" name="nome">
	<input type="submit" value="Enviar">
</form>

<?php
if(!empty($_POST['nome'])) {
	echo "Salve ".$_POST['nome'];
	exit;
}
?>