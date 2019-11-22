<html>
<head>
	<meta charset="UTF-8">
	<title>Teste de MySQL</title>
</head>
<body>
	<form method="POST">
		<label>Servidor: <input type="text" name="servidor"></label><br>
		<label>Banco: <input type="text" name="banco"></label><br>
		<label>Usuário: <input type="text" name="usuario"></label><br>
		<label>Senha: <input type="text" name="senha"></label><br>
		<input type="submit" value="Enviar"><br>
		
	</form>
	
<?php
// Testando conexão com a base de dados
if(isset($_POST['servidor'])){
	$servidor = $_POST['servidor'];
	$banco = $_POST['banco'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	
	$conexao=mysql_connect($servidor, $usuario, $senha) or die ("<p>Nao foi possivel conectar com o Banco</p>");
	$bd = mysql_select_db($banco);
	
	if($conexao){
		// CRIANDO TABELA
		$sqlcriatabela = "CREATE TABLE IF NOT EXISTS testelw(id INT(5) AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(20) NOT NULL, telefone VARCHAR(18) NOT NULL, email VARCHAR(30));";
		$criatabela = mysql_query( $sqlcriatabela, $conexao );
		echo "<h3>Tabela testelw criada.</h3><br>";
		// Fecha conexão
		mysql_close($conexao);
	}else{
		// Exibe o erro na conexão
		mysql_error();
	}
	
}

?>
</body>
</html>