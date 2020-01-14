<?php
require 'tempo.php';
$t = '2019-09-13 08:00:00';
$data = date('d/m/Y H:i:s', strtotime($t));

echo $data.'<br>foi há '.Tempo::diferenca($t).' atrás';
?>