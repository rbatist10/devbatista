<pre>
<?php 

if(!empty($_FILES['arquivo']) && !empty($_POST['largura']) && !empty($_POST['altura'])) {

	print_r($_FILES);
	$arquivos = count($_FILES['arquivo']['tmp_name']);
	$largura = $_POST['largura'];
	$altura = $_POST['altura'];

	// if($arquivos > 0) {

	// 	echo $arquivos, $largura, $altura;

	 	// $arquivos = count($_FILES['arquivo']['tmp_name']);

	 	// echo $arquivos;
	 	// 	for ($q=0; $q < $arquivos; $q++) { 
				
	 	// 		$nomedoarquivo = $_FILES['arquivo']['name'][$q];
	 	// 		list($largura_original, $altura_original) = getimagesize($nomedoarquivo);

	 	// 	}
	// }
}
?>
</pre>

<h1>Redimensionador de imagens em massa</h1>
<form method="POST" enctype="multipart/form-data">
	Largura máxima:
	<input type="number" name="largura"><br>
	Altura máxima:
	<input type="numer" name="altura"><br>

	<input type="file" name="arquivo[]" multiple><br><br>

	<input type="submit" value="Redimensionar">
</form>