<?php
session_start();

if(!empty($_GET['lang'])) {
	$_SESSION['lang'] = $_GET['lang'];
}

require 'config.php';
require 'language.php';
$lang = new Language();
?>
<a href="index.php?lang=en">English</a>
<a href="index.php?lang=pt-br">Português-BR</a>
<a href="index.php?lang=es">Español</a>
<hr/>
Linguagem Definida: <?php echo $lang->getLanguage(); ?>
<hr/>


<button><?php echo $lang->get('BUY'); ?></button>
<!-- <a href=""><?php //$lang->get('LOGOUT'); ?></a> -->
<!-- Categoria: <?php //$lang->get('CATEGORIA_PHOTO'); ?> -->
<br/>
<?php
$sql = "SELECT id, (select valor from lang where lang.lang = :lang and lang.nome = categorias.lang_item) as nome FROM categorias";
$sql = $pdo->prepare($sql);
$sql->bindValue(":lang", $lang->getLanguage());
$sql->execute();

if($sql->rowCount() > 0) {
	foreach($sql->fetchAll() as $categoria) {
		echo $categoria['nome'].'<br/>';
	}
}
?>