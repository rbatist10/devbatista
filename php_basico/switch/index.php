<?php
$x = 532;

switch ($x) // declaração do switch é somente a variável
{
	case 0:
		echo "o X: zero";
		break;
	case 1:
		echo "o X: um";
		break;
	case 2:
	case 3:
	case 4:
	case 5:
		echo "X testando";
		break;
	default:
		echo "o X nao tem nada";
		break;
}
?>
