<?php
require 'config.php';

$ip = $_SERVER['REMOTE_ADDR'];
$hora = date('H:i:s');
$sql = $db->prepare("INSERT INTO acessos (ip, hora) VALUES (:ip, :hora)");
$sql->bindValue(":ip", $ip);
$sql->bindValue(":hora", $hora);
$sql->execute();

$sql = $db->prepare("DELETE FROM acessos WHERE hora < :hora");
$sql->bindValue(":hora", date('H:i:s', strtotime("-2 minutes")));
$sql->execute();

$sql = "SELECT * FROM acessos WHERE hora > :hora GROUP BY ip";
$sql = $db->prepare($sql);
$sql->bindValue(":hora", date('H:i:s', strtotime("-2 minutes")));
$sql->execute();

$contagem = $sql->rowCount();

// echo "ONLINE: ".$contagem;