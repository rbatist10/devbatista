<h1>Sorteio</h1>

<?php
$lista = file("lista.txt");
$key = rand(0, count($lista)-1);
echo "Sorteado: ".$lista[$key];

// echo '<pre>';
// print_r($lista);
?>