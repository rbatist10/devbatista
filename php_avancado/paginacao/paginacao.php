<?php 
// 1. iniciando do registro 0 -> 10 posts / 11 -> 10 posts / 21 -> 10 posts
// quantidade de páginas: qtd-total / reg-por-pag

try {
	$dsn = "mysql:dbname=blog;host=localhost";
	$dbuser = "root";
	$dbpass = "";
	$pdo = new PDO($dsn, $dbuser, $dbpass);
} catch (Exception $e) {
	die($e->getMessage());
}

$qt_por_pagina = 10;

// Para verificar quantos registros tem
$total = 0;
$sql = "SELECT COUNT(*) as c FROM posts";
$sql = $pdo->query($sql);
$sql = $sql->fetch();
$total = $sql['c'];
// echo $total;
// exit;
$paginas = $total/$qt_por_pagina;

$pg = 1;
if (isset($_GET['p']) && !empty($_GET['p'])) {
	$pg = addslashes($_GET['p']);
}
$p = ($pg - 1) * $qt_por_pagina;

$sql = "SELECT * FROM posts LIMIT $p, $qt_por_pagina"; // $p sendo o inicio da paginacao, 10 é o limite
$sql = $pdo->query($sql);

if ($sql->rowCount() > 0) {
	foreach ($sql->fetchAll() as $item) {
		echo $item['id'].' - '.$item['titulo'].'<br>';
	}
}

echo "<hr>";
// echo "TOTAL DE PÁGINAS: ".ceil($paginas);
for ($q=0;$q<$paginas;$q++) { 
	echo '<a href="./paginacao?p='.($q+1).'">['.($q+1).']';
}
?>