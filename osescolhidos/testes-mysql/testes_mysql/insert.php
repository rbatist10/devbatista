<html>
<head>
	<title>Teste de MySQL</title>
</head>

<body>
<form method="POST">
	<h3> Preencha com os dados de acesso ao banco de dados</h3>
	<br>
	<label>Servidor: <input type="text" name="servidor"></label><br>
	<label>Banco: <input type="text" name="banco"></label><br>
	<label>Usuario: <input type="text" name="usuario"></label><br>
	<label>Senha: <input type="text" name="senha"></label><br>
	<br>
	<h3> Preencha os dados a serem salvos na tabela</h3>
	<br>
	<label>Nome: <input type="text" name="nome"></label><br>
	<label>Telefone: <input type="text" name="telefone"></label><br>
	<label>Email: <input type="text" name="email"></label><br>
	<input type="submit" value="Enviar"><br>
</form>

<?php
mysql_set_charset('utf8');
$servidor = $_POST['servidor'];
$banco = $_POST['banco'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$conexao=mysql_connect($servidor, $usuario, $senha);
$bd = mysql_select_db($banco);
mysqli_query("SET NAMES 'utf8'");
mysqli_query('SET character_set_connection=utf8');
mysqli_query('SET character_set_client=utf8');
mysqli_query('SET character_set_results=utf8');

// Verifica se o formulário foi preenchido 
        if(isset($_POST['nome'])){
	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
// Testa a conexão e faz a inserção dos dados na tabela 
	if($conexao){
		$insert = "INSERT INTO testelw (nome, telefone, email)VALUES ('$nome','$telefone', '$email')";
		$query = mysql_query($insert,$conexao);	
		mysql_close($conexao);
		echo "<h3>Dados inseridos.</h3><br>";
	}else{
		mysql_error();
	};
};
?>
</body>
</html>