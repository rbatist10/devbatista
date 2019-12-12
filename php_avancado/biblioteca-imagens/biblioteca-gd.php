<!-- Para redimensionamento de imagens  -->
<?php

$arquivo = "html-css.jpg";

// Valores máximos que a imagem terá no final
$largura = 200;
$altura = 200;

list($largura_original, $altura_original) = getimagesize($arquivo);

$ratio = $largura_original/$altura_original;

// echo $ratio;

if($largura / $altura > $ratio) {
	$largura = $altura * $ratio;
} else {
	$altura = $largura / $ratio;
}

// echo "Original LARGURA: ".$largura_original." - Original ALTURA: ".$altura_original."<br/>";
// echo "LARGURA: ".$largura." - ALTURA: ".$altura;

// Criando imagem no PHP
$imagem_final = imagecreatetruecolor($largura, $altura);
// Transferindo a imagem original para o PHP
$imagem_original = imagecreatefromjpeg($arquivo);

//diminui mas ajusta os pixels para ficar com qualidade boa
imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0, $largura, $altura, $largura_original, $altura_original);
// imagecopyresized() -> redimensionada com a qualidade baixa

// header ("Content-Type: image/png"); ---- Para mostrar ao navegador que essa é uma imagem
// imagejpeg($imagem_final, null, 100); ---- sendo 100 a qualidade em porcentagem

imagejpeg($imagem_final, "nova_imagem.jpg");

?>