<?php
$xml = simplexml_load_file("previsao.xml");

print_r($xml);
echo "<br><br>";
echo "Cidade: ".$xml->nome."<br><br>";
echo "Previsão: ".$xml->previsao[0]->dia;
?>