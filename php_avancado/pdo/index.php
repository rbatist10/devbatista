<?php
require 'usuarios.php';

$u = new Usuarios();
$res = $u->selecionar(1);
echo '<pre>';
print_r($res);
// $u->inserir("Felipe", "felipe@itech-all.com", "123");
// $u->atualizar("Felipe 2", "felipte@itech-all.com", "123", "24");
// $u->excluir(24);

?>