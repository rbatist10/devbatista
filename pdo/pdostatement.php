<?php
include 'config.php';

//PDOStatement é bastante utilizado para melhorar a segurança do PHP + Banco de dados, quando é inserido dados através de variáveis
$nome = 'nome';
$id = X;

$sql = "UPDATE table SET = nome = :nome WHERE id = :id";
$sql = $db->prepare($sql); // Prepara a query para receber os valores
// Manda os valores para a query
$sql->bindValue(':nome', $nome);
$sql->bindValue(':id', $id);
// Executa a query
$sql->execute();

?>