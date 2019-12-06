<h2>Conversor Palavra em Dígito</h2>

<form method="POST">
	<input type="text" name="valor" />

	<input type="submit" name="Enviar">
	<br><br>
	<hr>
</form>

<?php
	$numeros = array(
		"zero" => 0,
		"um" => 1,
		"dois" => 2,
		"tres" => 3,
		"quatro" => 4,
		"cinco" => 5,
		"seis" => 6,
		"sete" => 7,
		"oito" => 8,
		"nove" => 9
	);
	// var_dump($numeros)

	if(!empty($_POST["valor"])) {

		$valor = explode(",", $_POST["valor"]);
		// var_dump($valor);
		print_r($_POST['valor']);
		echo "<br>";

		for ($i=0;$i<count($valor);$i++) { 
			echo $numeros[$valor[$i]];

			if ($i+1 != count($valor)) {
				echo ",";
			}
		}

	}

?> 