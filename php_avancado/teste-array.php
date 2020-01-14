<?php 
$valor = array(1, 0, 4, 1, 0);

foreach ($valor as $key => $value) {
	$validador = 2;

	// echo $value." ".$key."<br>";

	if($validador > $value) {
		$v[$key] = 0;
	} else {
		$v[$key] = 1;
	}
}

echo "<pre>";
print_r($v);

if(in_array(1, $v, true)) {
	echo "sim";
} else {
	echo "não";
}
?>