<?php
var_dump($_FILES); //Mostra informações detalhadas do Array

$arquivo = $_FILES['arquivo']; //variável global $_FILES para envio de arquivos

if(isset($arquivo['tmp_name']) && empty($arquivo['tmp_name']) == false) {

	//$nomedoarquivo = md5(time().rand(0,99)).'.png'; ---- Para gerar nome aleatório
	
	//Faz o envio do arquivo da pasta temporária para uma pasta real
	move_uploaded_file($arquivo['tmp_name'], './arquivos/'.$arquivo['name']); 

	echo "Arquivo enviado com sucesso";
} else {
	header("Location: index.php");
}

?>