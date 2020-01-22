<?php 

function is_valido($cache) {
	$ultima_modificacao = filectime($cache);
	$c = time() - $ultima_modificacao;

	if($c > 10) {
		return false;
	} else {
		return true;
	}
}

$p = 'pagina';
if(isset($_GET['p']) && !empty($_GET['p']) && file_exists('paginas/'.$_GET['p'].".php")) {
	$p = $_GET['p']
}

if(file_exists("caches/".$p.".cache") && is_valido("caches/".$p.".cache")) {
	require "caches/".$p.".cache";
} else {

	ob_start(); // tudo o que acontecer dentro do ob não será mostrado ao usuário, ou seja, será guardada na memória
	require "paginas".$p.".php";
	$html = ob_get_contents(); // pega todo conteúdo e salva na variável
	ob_end_clean();

	file_put_contents("caches/".$p.".cache", $html);
	echo $html;
}
?>