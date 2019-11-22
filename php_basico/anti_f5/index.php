<?php
if(isset($_POST['nome'])) {
	$nome = $_POST['nome'];
	file_put_contents("teste.txt", $nome, FILE_APPEND);

	header("Location: index.php"); //Para que a página seja redirecionada ao index.php
}
?>
<form method="POST">
	<input type="text" name="nome" />
	<input type="submit" value="Enviar" />
</form>
