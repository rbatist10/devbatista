<html>
<head>
	<title>Teste de MySQL</title>
</head>
<body>

<!-- INSERINDO DADOS NA TABELA -->
<form method="POST">
	<h3> Preencha com os dados de acesso ao banco de dados</h3>
	<br>
	<label>Servidor: <input type="text" name="servidor"></label><br>
	<label>Banco: <input type="text" name="banco"></label><br>
	<label>Usuário: <input type="text" name="usuario"></label><br>
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
$conexao=mysql_connect($servidor, $usuario, $senha) or die ("<p></p>");
$bd = mysql_select_db($banco);

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$sql = "SELECT nome, telefone, email FROM testelw"; 
$consulta = mysql_query($sql,$conexao);
 
echo "<table border='1'>"; 
echo '<tr>'; 
echo '<td>NOME</td>'; 
echo '<td>TELEFONE</td>'; 
echo '<td>E-MAIL</td>';
echo '</tr>';
 
// Armazena os dados da consulta em um array associativo
 
while($registro = mysql_fetch_assoc($consulta)){
 
echo '<tr>'; 
echo '<td>'.$registro["nome"].'</td>'; 
echo '<td>'.$registro["telefone"].'</td>'; 
echo '<td>'.$registro["email"].'</td>';
echo '</tr>'; 
}
echo "</table>";
 
?>
</body>
</html>