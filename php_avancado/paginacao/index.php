<?php
try {
	$pdo = new PDO("mysql:dbname=blog;host=localhost", "root", "");
} catch (PDOException $e) {
	die($e->getMessage());
}
/*
1. Calcular a quantidade total de páginas.
2. Definir o limite inserido na query ($p).
3. Fazer a query com LIMIT.
*/

$qtd_por_pagina = 10;

$total = 0;
$sql = "SELECT COUNT(*) as c FROM posts";
$sql = $pdo->query($sql);
$sql = $sql->fetch();
$total = $sql['c'];
$paginas = $total / 10;

$pg = 1;
if (isset($_GET['p']) && !empty($_GET['p'])) {
	$pg = addslashes($_GET['p']);
}
$p = ($pg - 1) * $qtd_por_pagina;

$sql = "SELECT * FROM posts LIMIT $p, $qtd_por_pagina";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0) {
	foreach ($sql->fetchAll() as $item) {
		echo $item['id']." - ".$item['titulo']."<br/>";
	}
}
echo "<hr/>";
for ($q=0; $q < $paginas ; $q++) { 
	echo '<a href="./?p='.($q + 1).'">[ '.($q + 1). ' ]</a>';
}
?>