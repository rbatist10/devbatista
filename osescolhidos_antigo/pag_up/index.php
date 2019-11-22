<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administração - Adicionar video</title>
	<link rel="stylesheet" type="text/css" href="../css/estiloUp.css">
	<link rel="icon" type="image/png" href="../img/osescolhidos.jpg" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.form.js"></script>
</head>
<body>

<?php 
	include '../config/connect.php';
	include '../config/conexao.php';
	include '../pag_up/apagado.php';
	include '../classes/usuario.php';

	session_start();

	// $usuario = $_SESSION['usuario'];
	// $_SESSION['usuario'] = $usuario;

	// $id = $usuario->get_id();

	// echo $usuario->get_id() . "/" . $usuario->get_nome() . "/" . $usuario->get_login() . "/" . $usuario->get_senha();

	if (!isset($_SESSION['id'])){
		if (!isset($_GET['idUser']))
			$id = 1;
		else
			$id = intval($_GET['idUser']);
	}	
	else
		$id = $_SESSION['id'];

	$nome = null;

	$resultado = $mysqli->query("select * from usuarios where id = ". $id) or die ($mysqli->error);
		
	while ($user = $resultado->fetch_assoc()) {
		$nome = $user['nome'];
		$id = $user['id'];
	}

		// if (!$_SESSION['id']) {
		// 	unset($_SESSION['id']);
		// 	session_destroy();
		// 	header("location: ../pag_videos/videos.php");
		// }

	// $login = $_SESSION['login'];
?>

<div id="box">
	<div id="conteudo">
	<p id="txtInicio"><b>Seja bem vindo : <?php echo $nome; ?></b></p>
	<a href="../pag_videos/videos.php" id="btnSair" onclick="<?php session_destroy(); ?>">Sair</a>
	<a href="trocarSenha.php?idUser=<?php echo $id; ?>" id="btnParceiro">Alterar dados</a>
	<a href="parceiro.php?idUser=<?php echo $id; ?>" id="btnParceiro">Cadastrar parceiro</a>
	<a href="imagens.php?idUser=<?php echo $id; ?>" id="btnParceiro">Adionar imagens</a>
	</div>
</div>

<div id="box">

	<form method="POST" enctype="multipart/form-data" action="index.php" id="uploadForm" onsubmit="return false">

		<?php 
		if (isset($_FILES['video'])) {

			$name = $_FILES['video']['name'];
			$type = explode('.', $name);
			$type = end($type);
			$size = $_FILES['video']['size'];
			$tmp = $_FILES['video']['tmp_name'];
			$titulo = mysqli_real_escape_string($con, $_POST['titulo']);
			$descricao = mysqli_real_escape_string($con, $_POST['descricao']);
			$musica = mysqli_real_escape_string($con, $_POST['musica']);
			$etapa = mysqli_real_escape_string($con, $_POST['etapa']);
			$name_video = 'video-'.md5(rand());
			
			if ($type != 'mp4' && $type != 'MP4' && $type != 'flv') {
				$message = "Video com formato não suportado !";
			}
			else {
				move_uploaded_file($tmp, "../upload/video/".$name_video.".".$type);
				mysqli_query($con, "INSERT INTO videos (id, titulo, musica, etapa, descricao, url) VALUES ('', '$titulo', '$musica', '$etapa', '$descricao', '$name_video.$type')");
				$message = "Video enviado com sucesso !";
			}

			echo $message."<br/><br/>";
		}
	?>
	<div id="formCampos">
		<label>Titulo :</label><br/>
		<input type="text" name="titulo" required><br/>
		<label>Música :</label><br/>
		<input type="text" name="musica" required><br/>
		<label>Etapa :</label><br/>
		<input type="text" name="etapa" required><br/>
		<label>Descrição :</label><br/>
		<textarea rows="20" cols="62" name="descricao" required></textarea><br/>
		<label>Selecione o video :</label><br/>
		<input type="file" name="video" id="uploadFile" required><br/><br/>
	</div>
		<input type="submit" name="enviar" value="Enviar">
	</form>

</div>

<div id="progressbox" style="width: 80%; margin-left: 10%; border: 2px solid white; margin-top: 20px;">
	<div id="progressbar" style="width: 0%; height: 20px; background-color: #0C6;"></div>
</div>
<div id="progress" style="width: 50%; text-align: center; margin-left: 25%; padding: 5px; color: white; margin-top: 10px; font-size: 20px;"></div>

<div id="box">
	
	<?php 
		$query = mysqli_query($con, "select * from videos");

		while ($run = mysqli_fetch_assoc($query)) {
	?>
	<div id="lista">
		<div style="width: 100%; height: 50%; padding: 5px;">
		<?php 
			echo "Titulo - ".$run['titulo']."<br/>";
			echo "Descricao - ";
									$frase = explode(" ", $run['descricao']);
									$con = 0;
									foreach ($frase as $linhas) {
										echo $linhas." ";
										$con ++;
										if ($con == 10) {
											echo " ...";
											break;
										}
									}
		?>
		</div>
		<div style="width: 100%; height: 50%;">
		<button onclick="return confirm('Deseja realmente excluir o video : <?php echo $run['titulo']; ?>')" style="float: right; text-decoration: none; font-size: 15px; color: white; font-weight: bold; background-color: red; margin-right: 20px;"><a href="index.php?valor=<?php echo $run['id']; ?>" style="color: white; text-decoration: none;">Excluir</a></button>
		<button style="float: right; text-decoration: none; font-size: 15px; font-weight: bold; margin-right: 10px; background-color: blue;"><a href="editar.php?valor=<?php echo $run['id']; ?>&&idUser=<?php echo $id; ?>" style="color: white; text-decoration: none;">Editar</a></button>
		</div>
	</div>

	<?php
		}
	?>
</div>

	<script src="../js/anim.js"></script>
</body>
</html>