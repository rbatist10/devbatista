<?php
echo abs(10); echo "<br/>"; // mostra o valor absoluto
echo round(5.2); echo "<br/>"; // arredonda o valor para o número inteiro mais próximo
echo ceil(2.3); echo "<br/>"; // arredonda o valor para o número inteiro acima
echo floor(5.8); echo "<br/>"; // arredonda o valor para o número inteiro abaixo
echo rand(3, 9); echo "<br/><br/>"; // mostra um valor aleatório entre x e y

echo "Sorteio<br/>";
$lista =  array("Rafael", "Batista", "Chiquinho", "Nilva");
$x = rand(0, 3);
echo "O sorteado é: ".$lista[$x];
?>