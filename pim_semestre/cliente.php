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