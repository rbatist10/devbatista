<?php
$numeros = array(1, 3, 5, 22, 7, 9, 11, 6, 4, 8, 14);

for ($i=0; $i < count($numeros); $i++) { 

	if($i == count($numeros) - 1){
		echo $numeros[$i];
	} else {
		echo $numeros[$i].', ';
	}
	
}
echo '<br>MAIOR: '.max($numeros);
?>