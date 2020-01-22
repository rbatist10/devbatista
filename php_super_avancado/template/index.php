<?php
require 'template.php';

$array = array(
	'titulo' => 'Título da página',
	'nome' => 'Rafael',
	'idade' => '25'
);

$tpl = new Template('template.phtml');
$tpl->render($array);
?>