<?php
include 'config.php';

$nome = "nome";
$email = "email";
$senha = md5("senha");

$sql = "INSERT INTO table SET nome = '$nome', email = '$email', senha = '$senha'";
$sql = $db->query($sql);

echo "ID: ".$db->lastInsertId(); // Mostra qual o último ID inserido no banco

?>