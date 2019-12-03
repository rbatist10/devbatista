<?php 

include 'conexao.php';

$sql = "SELECT * FROM veiculo";
$sql = $db->query($sql);
	 // -- SET placa = :placa, modelo = :modelo, ano = :ano, chassi = :chassi, quilometragem = :quilometragem, categoria = :categoria;
	
	// $sql = $db->prepare($sql);

?>

<!DOCTYPE html>
<html>
<head lang="pt-br">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" conten="ie=edge">
    <link rel="stylesheet" href="Style/style.css">
    <title>Smartcar</title>

    <script>
        function formatar(mascara, documento){
          var i = documento.value.length;
          var saida = mascara.substring(0,1);
          var texto = mascara.substring(i)
          
          if (texto.substring(0,1) != saida){
                    documento.value += texto.substring(0,1);
          }
          
        }
        </script>
</head>
<body>
    <header class="max-header">
        <div class="container">
            <div class="logo max-logo">
                <img src="imgs/omnitech-logo-1.png" alt="Logomarca da Omnitech">
            </div>
            <div class="menu"></div>
                <div class="hamburguer"></div>
            <nav class="nav-bar max-nav">
                <ul>
                    <li><a href="./cadastro.php">Cadastro</a></li>
                    <li><a href="./consulta.php">Consulta</a></li>
                    <li><a href="./quemsomos.php">Quem Somos</a></li>
                    <li><a href="./contato.php">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="ghost"></section>
    <main>
        <section>
            <table border="1">
            	<tr>
            		<td width="100" aling="center" bgcolor="c5eff7">Placa</td>
            		<td width="250" bgcolor="c5eff7">Modelo</td>
            		<td width="120" aling="center" bgcolor="c5eff7">Ano</td>
            		<td width="120" aling="center" bgcolor="c5eff7">Chassi</td>
            		<td width="120" aling="center" bgcolor="c5eff7">Quilometragem</td>
            		<td width="120" aling="center" bgcolor="c5eff7">Categoria</td>
            		<td width="120" aling="center" bgcolor="c5eff7">Disponivel</td>
            	</tr>
            	<?php  
            	if ($sql->rowCount() > 0) {

            		foreach($sql->fetchAll() as $dado): ?>
            			<tr>
            				<td><?php echo $dado["PLACA"];?></td>
    			    		<td><?php echo $dado["MODELO"];?></td>
    			    		<td><?php echo $dado["ANO"];?></td>
    			    		<td><?php echo $dado["CHASSI"];?></td>
    			    		<td><?php echo $dado["QUILOMETRAGEM"];?></td>
    			    		<td><?php echo $dado["CATEGORIA"];?></td>

    			    		<td><?php 
    										
    										if($dado["DISPONIVEL"] == 0){?>
    										<a href="./marcado.php?id=<?php echo $itens['id'];?>" id="codigo" class="btn btn-primary btn-sm active" onclick="alertaEmail()">SIM</a>
    										<?php } else {?><a href="" class="btn btn-sm disabled btn-danger">NÃO</a>
    										
    									<?php }; ?></td>
            			</tr>


            	<!-- while($dado = $db->fetchAll($sql)){ ?> -->
            	<!-- <tr>
            		<td><?php //echo $dado["placa"];?></td>
            		<td><?php //echo $dado["modelo"];?></td>
            		<td><?php //echo $dado["ano"];?></td>
            		<td><?php //echo $dado["chassi"];?></td>
            		<td><?php //echo $dado["quilometragem"];?></td>
            		<td><?php //echo $dado["categoria"];?></td>
            	</tr> -->
            	<?php  
            endforeach; } ?>
            </table>
        </section>
    </main>
    <script type="text/javascript" src="Scripts/script.js"></script>
</body>
</html> 