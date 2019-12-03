<?php
session_start();
header("Content-type: text/html; charset=UTF-8");
// $db = variável de conexão com o banco
require './config.php';
// require '../users.php';

if(isset($_POST['nome']) && !empty($_POST['email'])) {

		$nome = $_POST['nome'];
		$email = $_POST['email']; 

		$_SESSION['nome'] = $nome;
		$_SESSION['email'] = $email;
		
		header("Location: ./lista.php");
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html" charset="utf-8" />
		<title>CHÁ DE PANELA - Rafa e Kel</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" /> 
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="./fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" />
		<link rel="stylesheet" type="text/css" href="./css/estilo.css" />
		<link rel="stylesheet" type="text/css" href="./css/animate.css" />
		<!-- <script type="text/javacript" src="./bootstrap/js/bootstrap.bundle.min.js"></script> -->
		<!-- <link rel="icon" type="./image/png" href="img/escolhidos.png" /> -->
	</head>

	<body>
		<div class="container">
			<div class="centralizar justify-content-center align-middle">
				
					<form method="POST" class="justify-content-center align-items-center" id="formulario" action="">

						<div class="form-group form-sm">
							<label for="nome">Nome:</label><br/>
							<input type="text" name="nome" id="nome" class="form-control" /><br/>
						</div>
						<div class="form-group form-sm">
							<label for="email">Email:</label><br/>
							<input type="email" name="email" id="email" class="form-control" /><br/>
						</div>
						<input type="submit" value="Entrar" class="btn btn-primary btn-dark" /><br/><br/>
					</form>
				
			</div>
		</div>

		<script type="text/javacript" src="../js/jquery-3.3.1.min.js"></script>
		<script type="text/javacript" src="../js/bootstrap.bundle.min.js"></script>
	</body>

		<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="./js/script.js"></script>
	</body>
</html>