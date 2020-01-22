<?php 
if(file_exists("cache.cache")) {
	require 'cache.cache';
} else {

	ob_start(); // tudo o que acontecer dentro do ob não será mostrado ao usuário, ou seja, será guardada na memória
	require "pagina.php";
	$html = ob_get_contents(); // pega todo conteúdo e salva na variável
	ob_end_clean();

	file_put_contents("cache.cache", $html);
	echo $html;
}
?>