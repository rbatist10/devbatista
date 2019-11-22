<?php
require 'config.php';

if(!empty($_GET['token'])) {

	$token = $_GET['token'];

	$sql = "SELECT * FROM usuarios_token WHERE hash = :hash AND used = 0 AND expirado_em > NOW()";
	$sql = $db->prepare($sql);
	$sql->bindValue(":hash", $token);
	$sql->execute();

	if($sql->rowCount() > 0) {
		$sql = $sql->fetch();
		$id = $sql['id_usuario'];

		if(!empty($_POST['senha'])) {
			$senha = $_POST['senha'];

			$sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
			$sql = $db->prepare($sql);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":id", $id);
			$sql->execute();

			$sql = "UPDATE usuarios_token SET used = 1 WHERE hash = :hash";
			$sql = $db->prepare($sql);
			$sql->bindValue(":hash", $token);
			$sql->execute();

			?><script>alert("Senha alterada com sucesso!");</script><?php
			header("Location: ./");
			exit;

		}

?>	

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/style.css">
		<link rel="icon" type="image/png" href="img/escolhidos.png" />
	</head>
	<body>
		<div class="container esqueci">
			<div class="row justify-content-center align-middle">
				<form method="POST">
					Digite a nova senha:<br/>
					<input type="password" name="senha" class="form-control" required /><br/>
					<input type="submit" value="Alterar senha" class="btn btn-dark" />
				</form>

			<?php
				} else {
					echo "Token inválido ou utilizado.";
					exit;
				}

			}
				
			?>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>

