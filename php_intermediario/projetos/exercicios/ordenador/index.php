<h1>Ordenador de números</h1>

<form method = "POST">
	<input type="text" name="numeros" />
	</br></br>
	<input type="submit" value="Ordenar">
</form>
</br>
<hr>

<?php
if (!empty($_POST['numeros'])) {
	$numeros = $_POST['numeros'];
	$nums = explode(" ", $numeros);

	sort($nums);

	echo '<pre>';
	print_r($nums);
}
?>