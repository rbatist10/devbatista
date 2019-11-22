<?php
header('Content-Type: text/html; charset=utf-8');
require 'historico.php';
$log = new Historico();
$log->registrar("Entrou na página inicial...");