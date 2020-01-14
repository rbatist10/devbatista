<?php

// Recomendado para requisições a webservice

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://www.checkitout.com.br/wb/pingpong"); // setar a URL
curl_setopt($ch, CURLOPT_POST, 1); // enviar requisição do tipo POST
curl_setopt($ch, CURLOPT_POSTFIELDS, "nome=Rafael&idade=25&sexo=masculino"); // campos que serão enviados

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorno da transferencia é verdadeiro

$resposta = curl_exec($ch);

curl_close($ch); // é recomendável fechar a conexão do CURL

echo "<pre>";
print_r($resposta);

?>