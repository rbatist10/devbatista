<html>
<head>
	<meta charset="UTF-8">
	<title>Teste de MySQL</title>
</head>
<body>
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
// Testando conexão com a base de dados
if(isset($_POST['servidor'])){
	$servidor = $_POST['servidor'];
	$banco = $_POST['banco'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	
	$conexao=mysql_connect($servidor, $usuario, $senha) or die ("<p>Nao foi possivel conectar com o Banco</p>");
	$bd = mysql_select_db($banco);
	
	if($conexao){
		echo "<h3>Conexão com o banco de dados estabelecida com sucesso.</h3><br><br>";
		$sql = "SHOW TABLES;";
		$rs = mysql_query($sql);
		$regs = mysql_num_rows($rs);
		$fields = mysql_num_fields($rs);

		echo("<table border='1'>\n");

// retornando todos os registros do banco
		if ($regs > 0) {
			$linha = 0;
			while ($linha < $regs){
				echo("<tr>\n");
				$coluna = 0;
				while ($coluna < $fields){
					$mostra = mysql_result($rs,$linha,$coluna);
					if ($mostra == NULL) $mostra = "<i>NULL</i>";
						echo('<td class="x">'.str_replace("<", "&lt;", str_replace(">", "&gt;", $mostra))."</td>\n");
						$coluna++;
				}
				echo("</tr>\n");
				$linha++;
			}
		}
	}	
	echo("</table>");
	mysql_close($conexao);
	}else{
		// Exibe o erro na conexão, caso aconteça
		mysql_error();
	}
?>
</body>
</html>