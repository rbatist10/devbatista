<?php
$json = file_get_contents("http://viacep.com.br/ws/04696180/json/");
$json = json_decode($json);


echo "Rua retornada: ".count($json);
// echo '<pre>';
// print_r($json);
?>