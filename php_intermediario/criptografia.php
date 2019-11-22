<?php

$nome = "Rafael";
$nome2 = md5($nome); //forma irreversível
//$nome2 = base64_ecode($nome); criptografa de forma reversível - https://www.base64decode.org/ ~~~ base64_decode() -> para descriptografar


echo "Nome origianal: ".$nome."<br/>";
echo "Nome cripografado: ".$nome2;

?>