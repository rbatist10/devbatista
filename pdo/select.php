<?php
include 'config.php';

// Para rodar selects simples utilizando o método query()
$sql = "SELECT * FROM table"; // ou "SELECT * FROM table WHERE condicao"
$sql = $db->query($sql);

if($sql->rowCount() > 0) {
	echo "Retornou resultados";

	// Pega todas as linhas da consulta e transforma em um array
	foreach($sql->fetchAll() as $variavel) {
		echo "Dado: ".$variavel['coluna'];
	}

} else {
	echo "Vazio";
}

?>