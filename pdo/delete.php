<?php
include 'config.php';

$sql = "DELETE FROM table WHERE 'condition'"; //Se não ter a clausula WHERE é perigoso excluir todos os dados
$sql = $db->query($sql);

?>