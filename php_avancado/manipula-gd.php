<?php

$imagem = "html-css.jpg";
$mini_imagem = "nova_imagem.jpg";

list($largura_original, $altura_original) = getimagesize($imagem);
list($largura_mini, $altura_mini) = getimagesize($mini_imagem);

$imagem_final = imagecreatetruecolor($largura_original, $altura_original);

$imagem_original = imagecreatefromjpeg($imagem);
$imagem_mini = imagecreatefromjpeg("nova_imagem.jpg");

imagecopy($imagem_final, $imagem_original, 0, 0, 0, 0, $largura_original, $altura_original);
imagecopy($imagem_final, $imagem_mini, 100, 200, 0, 0, $largura_mini, $altura_mini);


// header("Content-Type: image/jpg");
imagejpeg($imagem_final, "marca-dagua.jpg");
echo "Imagem criada com sucesso.";

?>