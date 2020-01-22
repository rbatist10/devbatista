<!DOCTYPE html>
<html>
<head>
	<title>Página de teste</title>
</head>
<body>
	<div style="width: 300px;margin: auto; background-color: #999; padding: 20px;">
		
		<h1>Este é um cabeçalho <?php echo rand(0,9999); ?></h1>

		<form method="POST">
			<input type="text" paceholder="E-mail"><br><br>

			<input type="password" placeholder="Senha"><br><br>

			<input type="submit" value="Entrar">
		</form>

	</div>

</body>
</html>