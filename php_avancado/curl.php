<?php

// Recomendado para requisições a webservice

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://www.checkitout.com.br/wb/pingpong");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "nome=Rafael&idade=23&sexo=masculino");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resposta = curl_exec($ch);

curl_close($ch); //é recomendável fechar a conexão do CURL

print_r($resposta);

?>