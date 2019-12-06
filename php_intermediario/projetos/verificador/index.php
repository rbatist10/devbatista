<?php
session_start();

$n1 = rand(0,10);
$n2 = rand(0,10);

$_SESSION['v'] = $n1 + $n2;

?>

<h1>Verificador de Humanos</h1>

<form method="POST" action="./verificador.php">
	<?php echo $n1." + ".$n2." = "; ?>
	<input type="number" name="numero" />
	<input type="submit" value="Verificar" />
</form>