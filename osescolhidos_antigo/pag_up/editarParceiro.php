<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administração - Editar parceiro</title>
	<link rel="stylesheet" type="text/css" href="../css/estiloUp.css">
	<link rel="icon" type="image/png" href="../img/osescolhidos.jpg" />
</head>
<body onunload="window.opener.location.reload()">

<?php 
	include '../config/conexao.php';
	include '../config/connect.php';

	$id = intval($_GET['idParceiro']);
	$idUser = intval($_GET['idUser']);
	$img = null;
	$id_bd = null;

	$sql = "select * from parceiros where id = ". $id;
	$execute = $mysqli->query($sql);
	$num = $execute->num_rows;
?>

<div id="box">
	<div id="conteudo">
	<a href="parceiro.php?idUser=<?php echo $idUser; ?>" id="btnSair" onclick="return confirm('Deseja realmente voltar ?')" style="float: right; text-decoration: none; font-size: 15px; color: white; font-weight: bold; background-color: red; padding: 4px; border-radius: 2px;">Voltar</a>
	</div>
</div>

<div id="box">

	<?php 
		if ($num > 0) {

			while ($resultado = $execute->fetch_assoc()) {
				$img = $resultado['imagem'];
				$id_bd = $resultado['id'];		
	?>

	<form method="POST" id="uploadForm" action="editarParceiro.php?idParceiro=<?php echo $id; ?>&&idUser=<?php echo $idUser; ?>">
		<?php 
			$nome = null;
			$descricao = null;

			// echo $img . " / " . $nome_bd . " / " . $descricao_bd . " / " . $id_bd . "<br/>";

			if (isset($_POST['atualizar'])) {

				if ($_POST['nome'] == null){
					$nome = $resultado['nome'];
				}
				else {
					$nome = mysqli_real_escape_string($con, $_POST['nome']);
				}

				if ($_POST['descricao'] == null){
					$descricao = $resultado['descricao'];
				}
				else {
					$descricao = mysqli_real_escape_string($con, $_POST['descricao']);
				}
				
				$query_sql = "update parceiros set nome = '$nome', descricao = '$descricao', imagem = '$img' where id = '$id_bd'";
			    $result = $mysqli->query($query_sql) or die ($mysqli->error);

			    if ($result) {
			    	echo "<script>window.location.href='editarParceiro.php?idParceiro=$id&&idUser=$idUser';</script>";
			    }
			    else {
			    	echo "Erro ao atualizar campos !";
			    }
			}
		?>

		<div id="formCampos">
		<label>Nome :</label><br/>
		<input type="text" name="nome" value="<?php echo $resultado['nome']; ?>"><br/>
		<label>Descrição :</label><br/>
		<textarea rows="20" cols="62" name="descricao"><?php echo $resultado['descricao']; ?></textarea><br/>
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