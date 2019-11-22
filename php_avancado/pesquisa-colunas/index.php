<h1>Digite email ou cpf do usuario</h1>

<form method="GET">
	<input type="text" name="campo" />
	<input type="submit" value="Pesquisar" />
</form>

<hr/>

<?php
if(!empty($_GET['campo'])) {
	$campo = $_GET['campo'];

	try {
		$pdo = new PDO("mysql:dbname=projeto_pesquisacolunas;host=localhost", "root", "");
	} catch (PDOException $e) {
		echo "Erro: ".$e->getMessage();
		exit;
	}

	$sql = "SELECT * FROM usuarios WHERE (email = :email) OR (cpf = :cpf)";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":email", $campo);
	$sql->bindValue(":cpf", $campo);
	$sql->execute();

	if($sql->rowCount() > 0) {
		$sql = $sql->fetch();

		echo "Nome: ".$sql['nome'];

	}

}
?>