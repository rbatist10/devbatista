<h1>Substituidor</h1>

<form method="POST">
	Frase: <br>
	<textarea name="msg" rows="5" cols="40" placeholder="Escreva a frase..."></textarea><br><br>
	
	Procurar por: <br>
	<input type="text" name="origem"> <br><br>

	Trocar por: <br>
	<input type="text" name="destino"> <br><br>

	<input type="submit" name="Substituir">
</form>
<hr>

<?php
if (!empty($_POST['msg']) && !empty($_POST['origem']) && !empty($_POST['destino'])) {
	$frase = $_POST['msg'];
	$origem = $_POST['origem'];
	$destino = $_POST['destino'];

	$final = str_replace($origem, $destino, $frase);

	echo "Frase: ".$frase;
	echo  "<br>Nova frase: ".$final;
}
?>