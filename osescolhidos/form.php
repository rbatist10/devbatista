<?php
//header ('Content-type: text/html; charset=UTF-8');
//Conexão com banco de dados
/*$dsn = "mysql:dbname=escolhidos;host:escolhidos.mysql.dbaas.com.br";
$dbuser = "escolhidos";
$dbpass = "ShowdeBola10";
$host = "escolhidos.mysql.dbaas.com.br";
$bd = "escolhidos";
$pass_db = "ShowdeBola10";
$user_db = "escolhidos";*/

//$conecta = mysql_connect("$host", "$bd", "$pass_db") or print (mysql_error());
//mysql_select_db($user_db, $conecta) or print(mysql_error());
//print "Conexão OK";

//try {

//	$pdo = new PDO($dsn, $dbuser, $dbpass) or print (mysql_error());
	//$banco = new PDO('mysql:host=localhost;dbname=escolhidos','root','')or print (mysql_error());
	require 'config.php';

	//Informações do casal e email
	$nome_casal = $_POST['nome_casal'];
	//Informações da Dama
	$nome_cavalheiro = $_POST['nome_cavalheiro'];
	$data_nascimento_cavalheiro = $_POST['data_nascimento_cavalheiro'];
	$cpf_cavalheiro = $_POST['cpf_cavalheiro'];
	$celular_cavalheiro = $_POST['celular_cavalheiro'];
	$email_cavalheiro = $_POST['email_cavalheiro'];
	//Informações da Dama
	$nome_dama = $_POST['nome_dama'];
	$data_nascimento_dama = $_POST['data_nascimento_dama'];
	$cpf_dama = $_POST['cpf_dama'];
	$celular_dama = $_POST['celular_dama'];
	$email_dama = $_POST['email_dama'];

	echo $nome_cavalheiro;


	$dados = array(
		'casal' => $nome_casal,
		'cavalheiro' => $nome_cavalheiro,
		'data_nasc_c' => $data_nascimento_cavalheiro,
		'cpf_c' => $cpf_cavalheiro,
		'cel_c' => $celular_cavalheiro,
		'email_c' => $email_cavalheiro,
		'dama' => $nome_dama,
		'data_nasc_d' => $data_nascimento_dama,
		'cpf_d' => $cpf_dama,
		'cel_d' => $celular_dama,
		'email_d' => $email_dama
	);
	$db -> prepare("INSERT INTO competidores (casal,cavalheiro,data_nasc_c,cpf_c,cel_c,email_c,dama,data_nasc_d,cpf_d,cel_d,email_d) VALUES (:casal,:cavalheiro,:data_nasc_c,:cpf_c,:cel_c,:email_c,:dama,:data_nasc_d,:cpf_d,:cel_d,:email_d)")->execute($dados);
	$id_competidor = $db->lastInsertID();
	$id_competidor2 = $id_competidor;

	if(isset($_POST['nome_responsavel_c']) && !empty($_POST['nome_responsavel_c'])) {
		$nome_responsavel_c = $_POST['nome_responsavel_c'];
		$cpf_responsavel_c = $_POST['cpf_responsavel_c'];
		
		$sql = "INSERT INTO responsavel SET nome = :nome_responsavel_c, CPF = :cpf_responsavel_c, competidor = :nome_cavalheiro, id_competidor = :id_competidor";
		$sql = $db->prepare($sql);
		$sql->bindValue(":nome_responsavel_c", $nome_responsavel_c);
		$sql->bindValue(":cpf_responsavel_c", $cpf_responsavel_c);
		$sql->bindValue(":nome_cavalheiro", $nome_cavalheiro);
		$sql->bindValue(":id_competidor", $id_competidor);
		$sql->execute();
	};

	if(isset($_POST['nome_responsavel_d']) && !empty($_POST['nome_responsavel_d'])) {
		$nome_responsavel_d = $_POST['nome_responsavel_d'];
		$cpf_responsavel_d = $_POST['cpf_responsavel_d'];
		
		$sql = "INSERT INTO responsavel SET nome = :nome_responsavel_d, CPF = :cpf_responsavel_d, competidor = :nome_dama, id_competidor = :id_competidor";
		$sql = $db->prepare($sql);
		$sql->bindValue(":nome_responsavel_d", $nome_responsavel_d);
		$sql->bindValue(":cpf_responsavel_d", $cpf_responsavel_d);
		$sql->bindValue(":nome_dama", $nome_dama);
		$sql->bindValue(":id_competidor", $id_competidor2);
		$sql->execute();
	};

	# Enviando email para o competidor

	$nome1 = "Os Escolhidos";
	$replyTo1 = "will.conceicao@osescolhidos.com.br";

	$msg1 = "Seja bem vindo ao campeonato de sertanejo Os Escolhidos - Edição Especial.<br>
			Siga as instruções para realizar o pagamento.<br><br>

			Poderá ser feito em qualquer Agência da CEF ou em Lotéricas. <br><br>
			
			Caixa econômica Federal <br>
			Janilson William Moreira Conceição <br><br>

			Conta poupança <br>
			Agência <br>
			2903<br><br>

			Operação 013 <br><br>

			Conta POUPANÇA <br>
			17171- 5 <br><br>

			Valor: R$ 100,00 <br><br>

			CPF: 319.407.398-29 <br><br>

			-------------------------------------------------------- <br><br>

			Responda esse email com o comprovante de depósito e o regulamento assinado. (Em caso de menor de idade, assinado pelo responsável). <br><br>

			-------------------------------------------------------- <br><br>

			Qualquer dúvida, estamos a disposição.<br>
			Seu número de inscrição é: ".$id_competidor;

	$assunto1 = "Os Escolhidos - Edição Especial";

	$emailsender1 = "will.conceicao@osescolhidos.com.br";
	$nomeremetente1 = "Os Escolhidos - Edição Especial";
	$emaildestinatario1 = $email_cavalheiro;
	$comcopia1 = $email_dama;

	$mensagemHTML1 = $msg1;

	$headers1 = "MIME-Version: 1.1\n";
	$headers1 .= "Content-type: text/html; charset=utf-8\n";
	$headers1 .= "From: ".$emailsender1."\n";
	$headers1 .= "Return-Path: ".$emailsender1."\n";
	$headers1 .= "Cc: ".$comcopia1."\n";
	// $headers .= "Bcc: ".$comcopiaoculta."\n";
	$headers1 .= "Reply-To: ".$replyTo1."\n";

	// mail($emaildestinatario1, $assunto1, $mensagemHTML1, $headers1, "-r". $emailsender1);

	// -----------------------------------------------------------
	# Enviando email para o organizador

	$data_nascimento_cavalheiro = date('d/m/Y', strtotime($data_nascimento_cavalheiro));
	$data_nascimento_dama = date('d/m/Y', strtotime($data_nascimento_dama));

	$nome = "Os Escolhidos";
	$replyTo = "will.conceicao@osescolhidos.com.br";
	$data_atual = date("d/m/Y H:i");

	$msg = "Dados de Inscrição:
			<br/><br/>
			Nome do casal: ".$nome_casal."<br/>
			Número de inscrição: ".$id_competidor."<br/>
			Data e hora: ".$data_atual."
			<br/><br/>
			Cavalheiro: ".$nome_cavalheiro."<br/>
			Celular: ".$celular_cavalheiro."<br/>
			Email: ".$email_cavalheiro."<br/>
			CPF: ".$cpf_cavalheiro."<br/>
			Data de Nascimento: ".$data_nascimento_cavalheiro."<br/>";
			if(isset($_POST['nome_responsavel_c']) && !empty($_POST['nome_responsavel_c'])) {
				$msg .= "Nome do Responsável: ".$nome_responsavel_c."<br/>
						CPF do Responsável: ".$cpf_responsavel_c;
			};
	$msg .=	"<br/><br/>
			Dama: ".$nome_dama."<br/>
			Celular: ".$celular_dama."<br/>
			Email: ".$email_dama."<br/>
			CPF: ".$cpf_dama."<br/>
			Data de Nascimento: ".$data_nascimento_dama."<br/>";
			if(isset($_POST['nome_responsavel_d']) && !empty($_POST['nome_responsavel_d'])) {
				$msg .= "Nome do Responsável: ".$nome_responsavel_d."<br/>
				CPF do Responsável: ".$cpf_responsavel_d."<br/><br/>";
			};

	$assunto = "Os Escolhidos - Edição Especial";

	$emailsender = "will.conceicao@osescolhidos.com.br";
	$nomeremetente = "Os Escolhidos - Edição Especial";
	$emaildestinatario = "will.conceicao@osescolhidos.com.br";
	$comcopia = "profwill.danca@gmail.com";
	$comcopiaoculta = "rafael.batista@itech-all.com";

	$mensagemHTML = $msg;

	$headers = "MIME-Version: 1.1\n";
	$headers .= "Content-type: text/html; charset=utf-8\n";
	$headers .= "From: ".$emailsender."\n";
	$headers .= "Return-Path: ".$emailsender."\n";
	$headers .= "Cc: ".$comcopia."\n";
	$headers .= "Bcc: ".$comcopiaoculta."\n";
	$headers .= "Reply-To: ".$replyTo."\n";

	// mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);

	// header("Location: ./");
//} catch (PDOException $e) {
//	echo "Erro: ".$e->getMessage();
//}

?>
