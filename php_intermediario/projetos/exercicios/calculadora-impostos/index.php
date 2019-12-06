<h3>Calculadora de impostos</h3>

<form method="POST">
	Valor do produto: <br>
	<input type="number" name="valor"> <br><br>

	Taxa de imposto (em %): <br>
	<input type="number" name="porcentagem"> <br><br>

	<input type="submit" value="Calcular"> <br><br>
</form>

<?php

if(!empty($_POST['valor']) && !empty($_POST['porcentagem'])) {

	$valor = floatval($_POST['valor']);
	$porcentagem = intval($_POST['porcentagem']);

	$imposto = ($porcentagem / 100) * $valor;
	$produto = $valor - $imposto;

	echo "Valor do produto: R$ ".$valor;
	echo "<br>Taxa de imposto: ".$porcentagem."%";
	echo "<br>--------------------------------------------------------------------";
	echo "<br>Imposto: R$ ".$imposto;
	echo "<br>Produto: R$ ".$produto;
}

?>