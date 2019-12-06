<?php
if(!empty($_GET['n1']) && !empty($_GET['n2']) && !empty($_GET['op'])) {

	// intval("string") - transforma o valor em inteiro
	$n1 = floatval($_GET['n1']); // Transforma um número em float
	$n2 = floatval($_GET['n2']);
	$op = $_GET['op'];

	switch ($op) {
		case '-':
			$conta = $n1 - $n2;
			echo $n1." - ".$n2." = ".$conta;
			break;
		case '+':
			$conta = $n1 + $n2;
			echo $n1." + ".$n2." = ".$conta;
			break;
		case '*':
			$conta = $n1 * $n2;
			echo $n1." * ".$n2." = ".$conta;
			break;
		case '/':
			$conta = $n1 / $n2;
			echo $n1." / ".$n2." = ".$conta;
			break;
	}

} else {
	header("Location: index.php");
}

?>