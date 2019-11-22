<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administração - Adicionar imagens</title>
	<link rel="stylesheet" type="text/css" href="../css/estiloUp.css">
	<link rel="icon" type="image/png" href="../img/osescolhidos.jpg" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.form.js"></script>
</head>
<body>

<?php 
	include '../config/connect.php';
	include '../pag_up/apagarImagem.php';

	session_start();

	$id = intval($_GET['idUser']);
	$_SESSION['id'] = $id;
	
?>

<div id="box">
	<div id="conteudo">
	<a href="index.php?idUser=<?php echo $id; ?>" id="btnSair">Voltar</a>
	</div>
</div>

<div id="box">

	<form method="POST" enctype="multipart/form-data" action="" id="uploadForm" onsubmit="return false">

	<?php 
		include "../config/conexao.php";

		if (isset($_FILES['img'])) {
		
		// dados do array de imagens
		$etapa = mysqli_real_escape_string($con, $_POST['etapa']);
		$file = $_FILES['img'];
		$numFile = count(array_filter($file['name']));

		// pasta
		$pasta = "../upload/galeria_imagens";

		// requisitos
		$permissao = array('image/jpeg', 'image/png');
		$maxSize = 1024 * 1024 * 10;

		// mensagens
		$msg = array();
		$errorMsg = array(
			1 => 'Maior do que o limite upload_max_filesize !',
			2 => 'Maior do que o limite max_file_size !',
			3 => 'Feito parcialmente o upload !',
			4 => 'nâo foi feito o upload !'
		);

		if ($numFile <= 0) 
			echo "Selecione uma imagem !";
		else {
			for ($i=0; $i < $numFile; $i++) { 
				# code...
				$name = $file['name'][$i];
				$type = $file['type'][$i];
				$size = $file['size'][$i];
				$error = $file['error'][$i];
				$tmp = $file['tmp_name'][$i];

				$extensao = @end(explode('.', $name));
				$novoNome = 'imagemCompetidores-'.md5(uniqid(rand())).'.'.$extensao;

				if ($error != 0)
					$msg[] = "<b>$name : </b> ".$errorMsg[$error];
				else if (!in_array($type, $permissao))
					$msg[] = "<b>$name : </b> Erro imagem não suportada !";
				else if ($size > $maxSize)
					$msg[] = "<b>$name : </b> Erro imagem ultrapassa o limite de 10MB !";
				else {

					if (move_uploaded_file($tmp, $pasta."/".$novoNome)){
						$msg[] = "<b>$name : </b> Upload realizado com sucesso !";
						$mysqli->query("INSERT INTO galeria_imagens (id, imagem, etapa) VALUES ('', '$novoNome', '$etapa')") or die ($mysqli->error);
					}
					else 
						$msg[] = "<b>$name : </b> Desculpe ocorreu um erro ...";

				}
			}

			// foreach ($msg as $valor) {
			// 	# code...
			// 	echo $valor."</br>";
			// }
			
		}

	}
	?>

	<div id="formCampos">
		<label>Etapa :</label><br/>
		<input type="text" name="etapa" required><br/>
		<!-- <label>Música :</label><br/>
		<input type="text" name="musica"><br/>
		<label>Etapa :</label><br/>
		<input type="text" name="etapa"><br/>
		<label>Descrição :</label><br/>
		<textarea rows="20" cols="62" name="descricao"></textarea><br/> -->
		<label>Selecione as imagens :</label><br/>
		<input type="file" name="img[]" multiple required id="uploadFile"><br/><br/>
	</div>
		<input type="submit" name="enviar" value="Enviar">
	</form>

</div>

<div id="progressbox" style="width: 80%; margin-left: 10%; border: 2px solid white; margin-top: 20px;">
	<div id="progressbar" style="width: 0%; height: 20px; background-color: #0C6;"></div>
</div>
<div id="progress" style="width: 50%; text-align: center; margin-left: 25%; padding: 5px; color: white; margin-top: 10px; font-size: 20px;"></div>

<div id="box">
	<form action="" method="POST" id="uploadForm">
		<div id="formCampos">
			<input type="text" name="pesquisarEtapa" placeholder="Pesquisar por etapa !"><br/><br/>
		</div>
			<input type="submit" name="pesquisar" value="Pesquisar">
	</form>
</div>

<div id="box">
	
	<?php 
		include "../config/conexao.php";

		if (isset($_POST['pesquisar'])){
			$pesquisa = mysqli_real_escape_string($con, $_POST['pesquisarEtapa']);
			$query = $mysqli->query("select * from galeria_imagens where etapa LIKE '%$pesquisa%'") or die ($mysqli->error);
		}
		else 
			$query = mysqli_query($con, "select * from galeria_imagens");
		
		while ($run = mysqli_fetch_assoc($query)) {
	?>
	<div id="lista">
		<div style="width: 100%; height: 50%; padding: 5px;">
		<?php 
			echo "Etapa - ".$run['etapa']."<br/>";
			echo "Nome da imagem - ".$run['imagem'];
		?>
		</div>
		<div style="width: 100%; height: 50%;">
		<button onclick="return confirm('Deseja realmente excluir a imagem : <?php echo $run['imagem']; ?>')" style="float: right; text-decoration: none; font-size: 15px; color: white; font-weight: bold; background-color: red; margin-right: 20px;"><a href="imagens.php?valor=<?php echo $run['id']; ?>&&idUser=<?php echo $id; ?>" style="color: white; text-decoration: none;">Excluir</a></button>
		</div>
	</div>

	<?php
		}
	?>
</div>

	<script src="../js/anim.js"></script>
</body>
</html>