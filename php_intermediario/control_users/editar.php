<?php
require 'config.php';
$id = 0;

if(isset($_GET['id']) && empty($_GET['id']) == false) { //Buscar o id que foi passado através da url
	$id = addslashes($_GET['id']);
}

if(isset($_POST['nome']) && empty($_POST['nome']) == false) { 
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);

	$sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = '$id'";
	$pdo->query($sql);

	header("Location: index.php");

}

	$sql = "SELECT * FROM usuarios WHERE id = '$id'";
	$sql = $pdo->query($sql);
	
	if($sql->rowCount() > 0){
		
		$dado = $sql->fetch();

	} else {

		header("Location: index.php");
} 
?>
<form method="POST">
	Nome:<br/>
	<input type="text" name="nome" value="<?php echo $dado['nome'];?>" /><br/><br/>
	Email:<br/>
	<input type="text" name="email" value="<?php echo $dado['email'];?>" /><br/><br/>
		
	<input type="submit" value="Atualizar" />
</form>