<?php

try {
	$pdo = new PDO("mysql:dbname=projeto_ordenar;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "Erro: ".$e->getMessage();
	exit;
}
if(isset($_POST['ordem']) && empty($_POST['ordem']) == false) {
	$ordem = addslashes($_POST['ordem']);
	$sql = "SELECT * FROM usuarios ORDER BY ".$ordem;
} else {
	$ordem = "";
	$sql = "SELECT * FROM usuarios ORDER BY id";
}
?>

<form method="POST">
	<select name="ordem" onchange="this.form.submit()">
		<option></option>
		<option value="nome" <?php echo ($ordem == "nome")?'selected="selected"':''; ?>>Nome</option>
		<option value="idade" <?php echo ($ordem == "idade")?'selected="selected"':''; ?>>Idade</option>
	</select>
</form>

<table border="1" width="400px">
	<tr>
		<th>Nome</th>
		<th>Idade</th>
	</tr>

	<?php
		$sql = $pdo->query($sql);

		if($sql->rowCount() > 0) {

			foreach($sql->fetchAll() as $usuario):
	?>
		<tr>
			<td><?php echo $usuario['nome']; ?></td>
			<td><?php echo $usuario['idade']; ?></td>
		</tr>

	<?php
			endforeach;

		}
	?>
</table>