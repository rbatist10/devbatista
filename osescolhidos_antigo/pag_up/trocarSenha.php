<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administração - Alterar dados</title>
	<link rel="stylesheet" type="text/css" href="../css/estiloUp.css">
	<link rel="icon" type="image/png" href="../img/osescolhidos.jpg" />
</head>
<body onunload="window.opener.location.reload()">

<?php 
	include '../config/conexao.php';
	include '../config/connect.php';
	session_start();

	$id = intval($_GET['idUser']);
	$_SESSION['id'] = $id;

	$sql = "select * from usuarios where id = ". $id;
	$execute = $mysqli->query($sql);
	$num = $execute->num_rows;
?>

<div id="box">
	<div id="conteudo">
	<a href="index.php?idUser=<?php echo $id; ?>" id="btnSair" style="float: right; text-decoration: none; font-size: 15px; color: white; font-weight: bold; background-color: red; padding: 4px; border-radius: 2px;">Voltar</a>
	</div>
</div>

<div id="box">

	<?php 
		if ($num > 0) {

			while ($resultado = $execute->fetch_assoc()) {	
	?>

	<form method="POST" id="uploadForm" enctype="multipart/form-data" action="trocarSenha.php?idUser=<?php echo $resultado['id']; ?>" id="formEdit">
		<?php 
			$nome = null;
			$login = null;
			$senhaAtual = null;
			$novaSenha = null;

			// echo $img . " / " . $nome_bd . " / " . $descricao_bd . " / " . $id_bd . "<br/>";

			if (isset($_POST['atualizar'])) {

				if ($_POST['nome'] == null){
					$nome = $resultado['nome'];
				}
				else {
					$nome = mysqli_real_escape_string($con, $_POST['nome']);
				}

				if ($_POST['login'] == null){
					$login = $resultado['login'];
				}
				else {
					$login = mysqli_real_escape_string($con, $_POST['login']);
				}

				$senhaAtual = mysqli_real_escape_string($con, $_POST['senhaAtual']);
				$novaSenha = mysqli_real_escape_string($con, $_POST['senhaNova']);

				if ($senhaAtual == $resultado['senha']) {

					if ($novaSenha == null) {
						$senhaAtual = $resultado['senha'];
						$query_sql = "update usuarios set login = '$login', senha = '$senhaAtual', nome = '$nome' where id = '$id'";
					    $result = $mysqli->query($query_sql) or die ($mysqli->error);

					    if ($result) {
					    	echo "<script>window.location.href='index.php?idUser=$id';</script>";
					    }
					    else {
					    	echo "Erro ao atualizar campos !";
					    }
					}
					else {
						$query_sql = "update usuarios set login = '$login', senha = '$novaSenha', nome = '$nome' where id = '$id'";
					    $result = $mysqli->query($query_sql) or die ($mysqli->error);

					    if ($result) {
					    	echo "<script>window.location.href='index.php?idUser=$id';</script>";
					    }
					    else {
					    	echo "Erro ao atualizar campos !";
					    }
					}
					
				}
				else {
					$senhaAtual = $resultado['senha'];					
					$novaSenha = null;

					if ($nome == $resultado['nome'] && $login == $resultado['login'] && $senhaAtual == $resultado['senha'] && $novaSenha == null){
						echo "<div id='erro'><p>Não houve nenhuma alteração nos campos !</p></div>";
					}
					else {
						echo "<div id='erro'><p>Digite a senha atual para efetuar mudanças !</p></div>";
					}
				}

			}
		?>

		<div id="formCampos">
		<label>Login :</label><br/>
		<input type="text" name="login" value="<?php echo $resultado['login']; ?>"><br/>
		<label>Nome :</label><br/>
		<input type="text" name="nome" value="<?php echo $resultado['nome']; ?>"><br/>
		<label>Senha atual :</label><br/>
		<input type="password" name="senhaAtual" placeholder="Digite sua senha atual"><br/>
		<label>Nova senha :</label><br/>
		<input type="password" name="senhaNova" placeholder="Digite sua nova senha"><br/><br/>
		</div>
		<!-- <label>Selecione o video :</label><br/>
		<input type="file" name="video"><br/><br/> -->
		<input type="submit" name="atualizar" value="Atualizar">
	</form>

	<?php 
			}
		}
	?>

</div>
	
</body>
</html>