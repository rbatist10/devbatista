<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administração - Editar video</title>
	<link rel="stylesheet" type="text/css" href="../css/estiloUp.css">
	<link rel="icon" type="image/png" href="../img/osescolhidos.jpg" />
</head>
<body>

<?php 
	include '../config/conexao.php';
	include '../config/connect.php';

	$id = intval($_GET['valor']);
	$idUser = intval($_GET['idUser']);
	$id_bd = null;
	$url = null;

	$sql = "select * from videos where id = ". $id;
	$execute = $mysqli->query($sql);
	$num = $execute->num_rows;

?>

<div id="box">
	<div id="conteudo">
	<a href="index.php?idUser=<?php echo $idUser; ?>" id="btnSair" onclick="return confirm('Deseja realmente voltar ?')" style="float: right; text-decoration: none; font-size: 15px; color: white; font-weight: bold; background-color: red; padding: 4px; border-radius: 2px;">Voltar</a>
	</div>
</div>

<div id="box">

	<?php 
		if ($num > 0) {

			while ($resultado = $execute->fetch_assoc()) {
				$url = $resultado['url'];
				$id_bd = $resultado['id'];
	?>

	<form method="POST" id="uploadForm" action="editar.php?valor=<?php echo $id; ?>&&idUser=<?php echo $idUser; ?>">

		<?php 
			$titulo = null;
			$musica = null;
			$etapa = null;
			$descricao = null;

			if (isset($_POST['atualizar'])) {

				if ($_POST['titulo'] == null)
					$titulo = $resultado['titulo'];
				else
					$titulo = mysqli_real_escape_string($con, $_POST['titulo']);

				if ($_POST['musica'] == null)
					$musica = $resultado['musica'];
				else
					$musica = mysqli_real_escape_string($con, $_POST['musica']);

				if ($_POST['etapa'] == null)
					$etapa = $resultado['etapa'];
				else
					$etapa = mysqli_real_escape_string($con, $_POST['etapa']);

				if ($_POST['descricao'] == null)
					$descricao = $resultado['descricao'];
				else 
					$descricao = mysqli_real_escape_string($con, $_POST['descricao']);

				$query_sql = "update videos set titulo = '$titulo', musica = '$musica', etapa = '$etapa', descricao = '$descricao', url = '$url' where id = '$id_bd'";
				$result = $mysqli->query($query_sql) or die ($mysqli->error);

				if ($result) {
			    	echo "<script>window.location.href='editar.php?valor=$id';</script>";
			    }
			    else {
			    	echo "Erro ao atualizar campos !";
			    }
			}
		?>

		<div id="formCampos">
		<label>Titulo :</label><br/>
		<input type="text" name="titulo" value="<?php echo $resultado['titulo']; ?>"><br/>
		<label>Música :</label><br/>
		<input type="text" name="musica" value="<?php echo $resultado['musica']; ?>"><br/>
		<label>Etapa :</label><br/>
		<input type="text" name="etapa" value="<?php echo $resultado['etapa']; ?>"><br/>
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