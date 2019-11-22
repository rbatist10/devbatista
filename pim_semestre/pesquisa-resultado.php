<?php
 // Conectando ao banco de dados:
require 'conexao.php';
 

 $consulta = "SELECT * FROM cliente";
 $con = mysqli_query($consulta) or die(mysqli_error);

 // Recebendo os dados a pesquisar
 $pesquisa = $POST['CPF'];
?>
 <html>
 <head>
 <link href="estilos.css" rel="stylesheet" type="text/css">
 <title>Resultado da pesquisa</title>
 </head>
 <body>
 
 <!-- Criando tabela e cabeçalho de dados: -->
 <table border="1" style='width:50%'>
 	<tr>
		 <th>NOME</th>
		 <th>RG</th>
		 <th>CPF</th>
		 <th>CNH</th>
		 <th>EMAIL</th>
		 <th>TELEFONE</th>
		 <th>CELULAR</th>
		 <th>ENDERECO</th>
	 </tr>
	 <?php while($dado = $con->fetch_array()){ ?>
	 <tr>
		 <th><?php echo $dado["Nome"]; ?></th>
		 <th><?php echo $dado["RG"]; ?></th>
		 <th><?php echo $dado["CPF"]; ?></th>
		 <th><?php echo $dado["CNH"]; ?></th>
		 <th><?php echo $dado["Email"]; ?></th>
		 <th><?php echo $dado["Telefone"]; ?></th>
		 <th><?php echo $dado["Celular"]; ?></th>
		 <th><?php echo $dado["Endereco"]; ?></th>
	 </tr>
	 <?php } ?>
</body>
</html>
