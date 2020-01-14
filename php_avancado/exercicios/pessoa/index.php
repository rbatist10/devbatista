<?php 
require 'pessoa.php';
$pessoa = new Pessoa("Rafael", "13/09/1994");

echo $pessoa->getNome()." tem  ".$pessoa->getIdade()." anos";
?>