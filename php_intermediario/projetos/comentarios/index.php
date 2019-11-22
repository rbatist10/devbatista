<?php
try {
	$pdo = new PDO("mysql:dbname=projeto_comentarios;host=localhost", "root", "");
} catch (Exception $e) {
	echo "Falhou: ".$e->getMessage();
	exit;
}

if(isset($_POST['nome']) && !empty($_POST['nome'])) {

	$nome = $_POST['nome'];
	$mensagem = $_POST['mensagem'];

	$sql = $pdo->prepare("INSERT INTO mensagens SET nome = :nome, msg = :msg, data_msg = NOW()");
	$sql->bindValue(":nome", $nome);
	$sql->bindValue(":msg", $mensagem);
	$sql->execute();
	
}

?>

<fieldset> <!-- cria um retangulo para conteúdos -->
	<form method="POST">
		Nome:<br/><br/>
		<input type="text" name="nome" /><br/><br/>

		Mensagem:<br/><br/>
		<textarea name="mensagem"></textarea><br/><br/>

		<input type="submit" value="Enviar" />
	</form> 
</fieldset>
<br/>

<?php 

$sql = "SELECT * FROM mensagens ORDER BY data_msg DESC";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0) {
	foreach($sql->fetchAll() as $mensagem):
	?>

	<strong><?php echo $mensagem['nome']; ?></strong><br/>
	<?php echo $mensagem['msg']; ?>
	<hr/>


	<?php
	endforeach;
} else

	echo "Não há mensagens.";

?>

