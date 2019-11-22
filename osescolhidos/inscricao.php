<?php
session_start();
require 'config.php';

// //Informações do casal e email
// $nome_casal = $_POST['nome_casal'];
// //Informações da Dama
// $nome_cavalheiro = $_POST['nome_cavalheiro'];
// $data_nascimento_cavalheiro = $_POST['data_nascimento_cavalheiro'];
// $cpf_cavalheiro = $_POST['cpf_cavalheiro'];
// $celular_cavalheiro = $_POST['celular_cavalheiro'];
// $email_cavalheiro = $_POST['email_cavalheiro'];
// //Informações da Dama
// $nome_dama = $_POST['nome_dama'];
// $data_nascimento_dama = $_POST['data_nascimento_dama'];
// $cpf_dama = $_POST['cpf_dama'];
// $celular_dama = $_POST['celular_dama'];
// $email_dama = $_POST['email_dama'];

// //$query = "INSERT INTO competidores SET casal = '$nome_casal', email = '$email', cavalheiro = '$nome_cavalheiro', data_nasc_c = '$data_nascimento_cavalheiro', cpf_c = '$cpf_cavalheiro', cel_c = '$celular_cavalheiro', dama = '$nome_dama', data_nasc_d = '$data_nascimento_dama', cpf_d = '$cpf_dama', cel_d = '$celular_dama'";
// $dados = array('casal' => $nome_casal,'cavalheiro' => $nome_cavalheiro,'data_nasc_c' => $data_nascimento_cavalheiro,'cpf_c' => $cpf_cavalheiro,'cel_c' => $celular_cavalheiro ,'email_c' => $email_cavalheiro,'dama' => $nome_dama ,'data_nasc_d' => $data_nascimento_dama ,'cpf_d' => $cpf_dama ,'cel_d' => $celular_dama,'email_d' => $email_dama );
// $db -> prepare("INSERT INTO competidores (casal,cavalheiro,data_nasc_c,cpf_c,cel_c,email_c,dama,data_nasc_d,cpf_d,cel_d,email_d) VALUES (:casal,:cavalheiro,:data_nasc_c,:cpf_c,:cel_c,:email_c,:dama,:data_nasc_d,:cpf_d,:cel_d,:email_d)")->execute($dados);

// // echo "Bem vindo ao campeonato Os Escolhidos - Edicao Especial <br/>";
// // echo "Número de inscrição: ".$db->lastInsertID();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<!-- <meta http-equiv="Content-Language" content="pt-br" /> -->
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" /> 
		<title>OS ESCOLHIDOS - Edição Especial</title>
		<!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.v3.css" /> -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate.css" />
		<link rel="icon" type="image/png" href="img/escolhidos.png" />
	</head>
	<body>
		<header>
			<!-- <div class="container-fluid">
				<a href="./"><img id="logotipo" src="img/osescolhidos.png" alt="Os Escolhidos" /></a>
			</div> -->

			<!-- <div class="row">	
				<div class="container-fluid">
					<nav id="menu" class="text-right">
						</button>
						<ul>
							<li><a href="">HOME</a></li>
							<li><a href="">O CAMPEONATO</a></li>
							<li><a href="">TÉCNICOS</a></li>
							<li><a href="">CONTATO</a></li>
							<li><a href="./inscricao.php">INSCRIÇÃO</a></li>
							<li><a href="" data-toggle="modal" data-target="#janela">ADMIN</a></li>
						</ul>
					</nav>
				</div>
			</div> -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="navegacao">

			<a href="./"><img id="logotipo" src="img/osescolhidos.png" alt="Os Escolhidos" /></a>

			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="navbar-collapse collapse text-right" id="navbarMenu">
				<div class="navbar-nav">
					<a id="link-home" href="./" class="itemMenu nav-item nav-link">HOME</a>
					<a id="link-regulamento" href="./regulamento" class="itemMenu nav-item nav-link">REGULAMENTO</a>
					<a id="link-tecnicos" href="./" class="itemMenu nav-item nav-link disabled" onclick="desativadoTecnicos()">TÉCNICOS</a>
					<a id="link-contato" href="#contato" class="itemMenu nav-item nav-link" onclick="addContato()">CONTATO</a>
					<a id="link-inscricao" href="./inscricao" class="itemMenu nav-item nav-link active">INSCRIÇÃO</a>
					<?php 
						if(isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
							<a href="./admin" class="itemMenu nav-item nav-link">ADMIN</a>
						<?php } else { ?>
							<a href="#" data-toggle="modal" data-target="#janela" class="itemMenu nav-item nav-link">ADMIN</a>
						<?php }
					?>
				</div>
			</div>

			<!-- <form method="POST" class="form-inline">
			<input type="text" class="form-control" placeholder="Pesquisar..." />
			</form> -->

		</nav>

			<!-- -------------------------------------- Início da janela de login (modal) -------------------------------------- -->
			<?php
				if(isset($_POST['email']) && !empty($_POST['email'])) {
					$email = addslashes($_POST['email']);
					$senha = md5(addslashes($_POST['senha']));

					//$dsn = "mysql:dbname=escolhidos;host=127.0.0.1";
					//$dbuser = "root";
					//$dbpass = "";

					try {
						//$db = new PDO($dsn, $dbuser, $dbpass);
						$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
						$sql = $db->query($sql);

						if ($sql->rowCount() > 0) {

							$dado = $sql->fetch();

							$_SESSION['id'] = $dado['id'];

							header("Location: ./admin/index.php");

						} else {
							echo '<script>alert("Usuário e/ou senha inválidos!!!");</script>';
						}

					} catch (Exception $e) {
						echo "Falhou: ".$e->getMessage();		
					}

				}

			?>
			<div class="modal fade" id="janela">
				<div class="modal-dialog modal-dialog-centered modal-md">
					<div class="modal-content">
						<div class="modal-header">
							

							<h5 class="modal-title">Área restrita</h5>
							<button class="close" data-dismiss="modal"><span>&times;</span></button>
						</div>
						<div class="modal-body">
							
							<form method="POST" class="justify-content-center align-items-center">
								<div class="form-group">
									<label for="email">E-mail:</label><br/>
									<input type="text" name="email" class="form-control" />
								</div>
								<div class="form-group">
									<label for="senha">Senha:</label>
									<input type="password" name="senha" class="form-control" />
								</div>
								<div class="form-group">
									<a class="esqueciSenha" href="./esqueci">Esqueci minha senha</a><br/>
								</div>
									<input type="submit" value="Entrar" class="btn btn-primary btn-dark" />
									
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- -------------------------------------- Final da janela de login (modal) -------------------------------------- -->
		</header>
		
		<section>
		<p></p>
			<div class="container" id="inscricao">
				<form method="POST" action="form.php">
					<div class="form-group form-sm">
						<label for="nome_casal">Nome Artístico do Casal</label>
						<input type="text" name="nome_casal" id="nome_casal" class="form-control" placeholder="Digite o nome que gostaria de ser divulgado" required autofocus />
					</div><br/>

					<h2>CAVALHEIRO</h2><br>
					<div class="form-group form-sm">
						<label for="nome_cavalheiro">Nome do Cavalheiro</label>
						<input type="text" name="nome_cavalheiro" id="nome_cavalheiro" class="form-control" placeholder="Nome completo do cavalheiro" required />
					</div>
					<div class="form-group form-sm">
						<label for="data_nascimento_cavalheiro">Data de Nascimento</label>
						<input type="date" name="data_nascimento_cavalheiro" id="data_nascimento_cavalheiro" class="form-control" min="1970-01-01" max="2006-01-01" required />
					</div>
					<!------------ -->
					<div class="form-group form-sm nao-mostrar">
						<label for="idade_c">Idade Cavalheiro</label>
						<input type="num" name="idade_c" id="idade_c" class="form-control" />
					</div>

					<div class="responsavel-c">
						<div class="form-group form-sm">
							<label for="nome_responsavel_c">Nome do Responsável</label>
							<input type="text" name="nome_responsavel_c" id="nome_responsavel_c" class="form-control" placeholder="Nome do responsável" />
						</div>
						<div class="form-group form-sm">
							<label for="cpf_responsavel_c">CPF do Responsável</label>
							<input type="text" name="cpf_responsavel_c" id="cpf_responsavel_c" maxlength="14" class="form-control" placeholder="XXX.XXX.XXX-XX" OnKeyPress="formatar('###.###.###-##', this)" />
						</div>
					</div>
					<!-------------- -->
					<div class="form-group form-sm">
						<label for="cpf_cavalheiro">CPF Cavalheiro</label>
						<input type="text" name="cpf_cavalheiro" id="cpf_cavalheiro" maxlength="14" class="form-control" required placeholder="XXX.XXX.XXX-XX" OnKeyPress="formatar('###.###.###-##', this)" />
					</div>
					<div class="form-group form-sm">
						<label for="celular_cavalheiro">Celular para contato</label>
						<input type="tel" name="celular_cavalheiro" id="celular_cavalheiro" maxlength="13" class="form-control" required placeholder="XX XXXXX-XXXX" OnKeyPress='formatar("## #####-####", this)' />
					</div>
					<div class="form-group form-sm">
						<label for="email">Email</label>
						<input type="email" name="email_cavalheiro" id="email_cavalheiro" class="form-control" placeholder="seuemail@dominio.com.br" required />
					</div><br/>

					<h2>DAMA</h2><br>
					<div class="form-group form-sm">
						<label for="nome_dama">Nome da Dama</label>
						<input type="text" name="nome_dama" id="nome_dama" class="form-control" placeholder="Nome completo da dama" required />
					</div>
					<div class="form-group form-sm">
						<label for="data_nascimento_dama">Data de Nascimento</label>
						<input type="date" name="data_nascimento_dama" id="data_nascimento_dama" class="form-control" min="1970-01-01" max="2010-01-01" required />
					</div>
					<!-- ---------- -->
					<div class="form-group form-sm nao-mostrar">
						<label for="idade_d">Idade Dama</label>
						<input type="num" name="idade_d" id="idade_d" class="form-control" />
					</div>

					<div class="responsavel-d">
						<div class="form-group form-sm">
							<label for="nome_responsavel_d">Nome do Responsável</label>
							<input type="text" name="nome_responsavel_d" id="nome_responsavel_d" class="form-control" placeholder="Nome do responsável" />
						</div>
						<div class="form-group form-sm">
							<label for="cpf_responsavel_d">CPF do Responsável</label>
							<input type="text" name="cpf_responsavel_d" id="cpf_responsavel_d" maxlength="14" class="form-control" placeholder="XXX.XXX.XXX-XX" OnKeyPress="formatar('###.###.###-##', this)" />
						</div>
					</div>
					<!-- ---------- -->
					<div class="form-group form-sm">
						<label for="cpf_dama">CPF Dama</label>
						<input type="text" name="cpf_dama" id="cpf_dama" class="form-control" maxlength="14" required placeholder="XXX.XXX.XXX-XX" OnKeyPress="formatar('###.###.###-##', this)" />
					</div>
					<div class="form-group form-sm">
						<label for="celular_dama">Celular para contato</label>
						<input type="text" name="celular_dama" id="celular_dama" class="form-control" maxlength="13" required placeholder="XX XXXXX-XXXX" OnKeyPress='formatar("## #####-####", this)' />
					</div>
					<div class="form-group form-sm">
						<label for="email">Email</label>
						<input type="email" name="email_dama" id="email_dama" class="form-control" placeholder="seuemail@dominio.com.br" required />
					</div><br/>
					
					<div>
						<!-- <button type="submit" class="btn btn-dark btn-lg">Inscrever-se</button><br/><p></p> -->
						<input type="submit" value="Inscrever-se" name="inscrever-se" id="inscrever-se" class="btn btn-lg btn-dark" disabled="disabled"><br/><br/>
					</div>
				</form>
			</div>
		</section>

		<footer>
			<div class="bg-dark" id="ffooter">
				<div class="container">
					<div class="row">
						<div class="col-md order-first" id="facebook">
							<div id="fb-root"></div>
							<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0&appId=778489995680573&autoLogAppEvents=1';
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>
							<div class="fb-page" data-href="https://www.facebook.com/campeonato.osescolhidos/" data-width="500" data-height="190" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/campeonato.osescolhidos/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/campeonato.osescolhidos/">Os Escolhidos - Sertanejo Universitário</a></blockquote></div>
						</div>
						<div class="col-md" id="informacoes">
							<address>
								<i class="fa fa-map-marker-alt"></i> <span>Av. Senador Vergueiro, 4090<br/> São Bernardo do Campo - SP - 09602-000 <br/></span>
								<p><br><a id="telefone" href="tel:+55 11 96829-3601"><i class="fa fa-phone"></i> 11 96829-3601</a></p>
							</address>
						</div>
					</div>
				</div>
			</div>
			<div id="lfooter">
				<div class="container">
					<div class="row">
						<div class="col-8">
							<p class="text-left" id="direitos">OS ESCOLHIDOS. Todos os direitos reservados.</p>
						</div>	
						<div class="col-md">
							<p class="text-right" id="criado">Created by <a href="https://www.fb.com/Rbatist10" class="footer-link">Itech-All</a></p>
						</div>	
					</div>
				</div>
			</div>
		</footer>

		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>