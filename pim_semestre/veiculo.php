<?php

require 'conexao.php';

$placa = $_POST['placa'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$chassi = $_POST['chassi'];
$quilometragem = $_POST['quilometragem'];
$categoria = $_POST['categoria'];

// $dados = $_POST;
// print_r ($dados);

// $sql = "SELECT * FROM table WHERE x";
// $sql = $db->query($sql)

$sql = "INSERT INTO veiculo SET placa = :placa, modelo = :modelo, ano = :ano, chassi = :chassi, quilometragem = :quilometragem, categoria = :categoria, disponivel = 0";
	
	$sql = $db->prepare($sql);
	// $sql->execute($dados);
	
	$sql->bindValue(":placa", $placa);
	$sql->bindValue(":modelo", $modelo);
	$sql->bindValue(":ano", $ano);
	$sql->bindValue(":chassi", $chassi);
	$sql->bindValue(":quilometragem", $quilometragem);
	$sql->bindValue(":categoria", $categoria);

	$sql->execute();

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
                    <li><a href="./quemsomos/php">Quem Somos</a></li>
                    <li><a href="./contato.php">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="ghost"></section>
    <main>
        <section id="./index.php">
            <form action="./index2.php#cliente">
                <div>
                    <label for="cpf">Veiculo Cadastrado</label>
                </div>
            </form>
        </section>
        </main>
    <script type="text/javascript" src="Scripts/script.js"></script>
</body>
</html> 