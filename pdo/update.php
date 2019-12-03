<?php
include 'config.php';

$sql = "UPDATE table SET coluna = 'X' WHERE coluna = 'Y'";
$sql = $db->query($sql);
// Se retornar algum tipo de resultado é recomendável armazenar em uma variável (como está armazenando no momento)
// Caso não, nem precisa armazenar, pode executar da seguinte maneira abaixo
// $db->query($sql);

?>