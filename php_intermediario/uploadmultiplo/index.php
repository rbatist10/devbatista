<pre> <!-- faz com que o texto seja literal-->
<?php

if(isset($_FILES['arquivo']) && empty($_FILES['arquivo']) == false) {

	/*Envio de 1 arquivo somente
	$nome = $_FILES['arquivo']['name']; //arquivo.jpg

	//Envio de múltiplos arquivos;
	$nome = $_FILES['arquivo']['name']; // Array*/

	if(count($_FILES['arquivo']['tmp_name']) > 0) {

		for($q=0;$q<count($_FILES['arquivo']['tmp_name']);$q++) {

			$nomedoarquivo = md5($_FILES['arquivo']['name'][$q].time().rand(0,999)).'jpg';
			move_uploaded_file($_FILES['arquivo']['tmp_name'][$q], './arquivos/'.$nomedoarquivo);

			echo "Arquivos enviados";

		}

	}

}

?>
</pre>

<form method="POST" enctype="multipart/form-data">

	Arquivos:<br/><br/>
	<input type="file" name="arquivo[]" multiple><br/><br/>

	<input type="submit" value="Enviar">

</form>