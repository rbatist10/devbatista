<?php
// Para redimensionamento de imagens 
$arquivo = "html-css.jpg";

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

// echo "O LARGURA: ".$largura_original." - O ALTURA: ".$altura_original."<br/>";
// echo "LARGURA: ".$largura." - ALTURA: ".$altura;

$imagem_final = imagecreatetruecolor($largura, $altura);
$imagem_original = imagecreatefromjpeg($arquivo);

//diminui mas ajusta os pixels para ficar com qualidade boa
imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0, $largura, $altura, $largura_original, $altura_original);
// imagecopyresized -> redimensionada com a qualidade baixa

// header ("Content-Type: image/png"); ---- Para mostrar ao navegador que essa é uma imagem
// imagejpeg($imagem_final, null);

imagejpeg($imagem_final, "nova_imagem.jpg");

?>