<?php

require 'conexao.php';

$nome = $_POST['nome'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$cnh = $_POST['cnh'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$endereco = $_POST['endereco'];

// $dados = $_POST;
// print_r ($dados);

$sql = "INSERT INTO cliente SET Nome = :nome, RG = :rg, CPF = :cpf, CNH = :cnh, Email = :email, Telefone = :telefone, Celular = :celular, Endereco = :endereco";
	
	$sql = $db->prepare($sql);
	// $sql->execute($dados);
	
	$sql->bindValue(":nome", $nome);
	$sql->bindValue(":rg", $rg);
	$sql->bindValue(":cpf", $cpf);
	$sql->bindValue(":cnh", $cnh);
	$sql->bindValue(":email", $email);
	$sql->bindValue(":telefone", $telefone);
	$sql->bindValue(":celular", $celular);
	$sql->bindValue(":endereco", $endereco);

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
                    <label for="cpf">Cliente Cadastrado</label>
                </div>
            </form>
        </section>
        </main>
    <script type="text/javascript" src="Scripts/script.js"></script>
</body>
</html> 