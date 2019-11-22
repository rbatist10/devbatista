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
		<input type="submit" value="Enviar"><br>
</form>



<?php
// Recuperando e exibindo dados do banco
// Cria conexão
$servidor = $_POST['servidor'];
$banco = $_POST['banco'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$conexao=mysql_connect($servidor, $usuario, $senha);
$bd = mysql_select_db($banco);

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$sql = "DROP TABLE testelw";

if($_POST['servidor']){	
	if(mysql_query($sql,$conexao)){
		echo "Tabela apagada com sucesso!";
	}else{
		echo "Erro ao apagar a tabela!<br>Erro: " . mysql_error();
	}
}
    mysql_close($conexao);
?>
 
</body>
</html>


