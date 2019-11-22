<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">	
	<title>Administração - Adicionar parceiro</title>
	<link rel="stylesheet" type="text/css" href="../css/estiloUp.css">
	<link rel="icon" type="image/png" href="../img/osescolhidos.jpg" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.form.js"></script>
</head>
<body>

<?php 
	include '../config/connect.php';
	include '../pag_up/apagadoParceiro.php';
	include '../classes/usuario.php';

	session_start();

	$id = intval($_GET['idUser']);
	$_SESSION['id'] = $id;

	// $usuario = $_SESSION['id'];
	// $_SESSION['usuario'] = $usuario;

	// $id = $usuario->get_id();
?>

<div id="box">
	<div id="conteudo">
	<a href="index.php?idUser=<?php echo $id; ?>" id="btnVoltar" style="float: right; text-decoration: none; font-size: 15px; color: white; font-weight: bold; background-color: red; padding: 4px; border-radius: 2px;">Voltar</a>
	</div>
</div>

<div id="box">

	<form method="POST" enctype="multipart/form-data" action="parceiro.php" id="uploadForm" onsubmit="return false">

	<?php 
		if (isset($_FILES['img_parceiro'])) {

			$name = $_FILES['img_parceiro']['name'];
			$type = explode('.', $name);
			$type = end($type);
			$size = $_FILES['img_parceiro']['size'];
			$tmp = $_FILES['img_parceiro']['tmp_name'];
			$nome = mysqli_real_escape_string($con, $_POST['nome_parceiro']);
			$descricao = mysqli_real_escape_string($con, $_POST['descricao_parceiro']);
			$name_foto = 'parceiro-'.md5(rand());
			
			if ($type != 'png' && $type != 'jpg') {
				$message = "Imagem com formato não suportado !";
			}
			else {
				move_uploaded_file($tmp, "../upload/img_parceiros/".$name_foto.".".$type);
				mysqli_query($con, "INSERT INTO parceiros (id, nome, descricao, imagem) VALUES ('', '$nome', '$descricao', '$name_foto.$type')");
				$message = "Parceiro cadastrado com sucesso !";
			}

			echo $message."<br/><br/>";
		}
	?>
		<div id="formCampos">
		<label>Nome :</label><br/>
		<input type="text" name="nome_parceiro"><br/>
		<label>Descrição :</label><br/>
		<textarea rows="20" cols="62" name="descricao_parceiro" style="background-color: #444; border: none; padding: 10px;color: white; margin: 5px 0;"></textarea><br/>
		<label>Selecione a imagem :</label><br/>
		<input type="file" name="img_parceiro" id="uploadFile"><br/><br/>
		</div>
		<input type="submit" name="enviar" value="Enviar">
	</form>

</div>

<div id="progressbox" style="width: 80%; margin-left: 10%; border: 2px solid white; margin-top: 10px;">
	<div id="progressbar" style="width: 0%; height: 20px; background-color: #0C6;"></div>
</div>
<div id="progress" style="width: 50%; text-align: center; margin-left: 25%; padding: 5px; color: white; font-size: 20px; margin-top: 10px;"></div>

<div id="box">
	
	<?php 
		$query = mysqli_query($con, "select * from parceiros");

		while ($run = mysqli_fetch_assoc($query)) {
	?>
	<div id="lista">
		<div style="width: 100%; height: 50%; padding: 5px;">
		<?php 
			echo "Nome - ".$run['nome']."<br/>";
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
		<button onclick="return confirm('Deseja realmente excluir o video : <?php echo $run['nome']; ?>')" style="float: right; text-decoration: none; font-size: 15px; color: white; font-weight: bold; background-color: red; margin-right: 20px;"><a href="parceiro.php?idParceiro=<?php echo $run['id']; ?>&&idUser=<?php echo $id; ?>" style="color: white; text-decoration: none;">Excluir</a></button>
		<button style="float: right; text-decoration: none; font-size: 15px; font-weight: bold; margin-right: 10px; background-color: blue;"><a href="editarParceiro.php?idParceiro=<?php echo $run['id']; ?>&&idUser=<?php echo $id; ?>" style="color: white; text-decoration: none;">Editar</a></button>
		</div>
	</div>

	<?php
		}
	?>
</div>

	<script src="../js/anim.js"></script>
</body>
</html>