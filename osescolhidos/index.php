<?php
session_start();
require 'config.php';
require 'users.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-Language" content="pt-br" />
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
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="navegacao">

			<a href="./"><img id="logotipo" src="img/osescolhidos.png" alt="Os Escolhidos" /></a>

			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="navbar-collapse collapse text-right" id="navbarMenu">
				<div class="navbar-nav">
					<a id="link-home" href="./" class="itemMenu nav-item nav-link active">HOME</a>
					<a id="link-regulamento" href="./regulamento" class="itemMenu nav-item nav-link">REGULAMENTO</a>
					<a id="link-tecnicos" href="./" class="itemMenu nav-item nav-link disabled" onclick="desativadoTecnicos()">TÉCNICOS</a>
					<a id="link-contato" href="#contato" class="itemMenu nav-item nav-link" onclick="addContato()">CONTATO</a>
					<a id="link-inscricao" href="./inscricao" class="itemMenu nav-item nav-link">INSCRIÇÃO</a>
					<?php 
						if(isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
							<a href="./admin" class="itemMenu nav-item nav-link">ADMIN</a>
						<?php } else { ?>
							<a href="#" data-toggle="modal" data-target="#janela" class="itemMenu nav-item nav-link">ADMIN</a>
						<?php }
					?>
				</div>
			</div>
		</nav>

			<!-- -------------------------------------- Início da janela de login (modal) -------------------------------------- -->
			<?php
				if(isset($_POST['email']) && !empty($_POST['email'])) {
					$email = addslashes($_POST['email']);
					$senha = md5(addslashes($_POST['senha']));

					try {
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
			<div class="container">
				<div class="divLogo">	
					<div id="divImgLogo">
						<img src="img/osescolhidos2.png" id="imgLogo" class="animated fadeInDown bg-dark">
					</div>
					
					<div id="divTextLogo">
						<div id="textP" class="animated fadeInUp bg-dark">
							<p>Campeonato de dança em que quatro equipes lideradas por grandes nomes da Dança de Salão, competem entre si para levar o prêmio de campeão e mostrar quem será ... O ESCOLHIDO !</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<!-- -------------------------------------- Início do formulário de contato -------------------------------------- -->

			<div class="container" id="contato">
				<h1 id="tituloContato">Entre em contato</h1>
			</div>
			<!-- -- -->
			<div class="container" id="formContato">
				<div class="divFormPrincipal">
					<form id="formPrincipal" action="./#formContato" method="POST">

						<div class="form-group">
							<input type="text" name="nome" placeholder="Nome :" class="form-control active">
						</div>
						<div class="form-group">
							<input type="email" name="email" placeholder="Email :" class="form-control">
						</div>
						<div class="form-group">
							<input type="text" name="assunto" placeholder="Assunto :" class="form-control">
						</div>
						<div class="form-group">
							<!-- <textarea rows="20" cols="80" placeholder="Escreva sua mensagem ..." class="form-control" name="textmensagem">
							</textarea> -->
							<textarea name="msg" rows="10" cols="80" class="form-control" placeholder="Escreva sua mensagem ..."></textarea>
						</div>
						<div id="btnEnviar">
							<input type="submit" value="Enviar" name="enviar" class="btn btn-lg btn-dark"><br/><br/>
						</div>
					</form>
				</div>
			</div>
			<div class="container">
			<?php 

			if(isset($_POST['nome']) && !empty($_POST['nome'])) {

				$nome = addslashes($_POST['nome']);
				$replyTo = addslashes($_POST['email']);
				$msg = addslashes($_POST['msg']);
				$assunto = "Contato - Os Escolhidos - ".addslashes($_POST['assunto']);

				$emailsender = "will.conceicao@osescolhidos.com.br";
                $nomeremetente = "Os Escolhidos - Edição Especial";
                $emaildestinatario = "will.conceicao@osescolhidos.com.br";
                $comcopia = "profwill.danca@gmail.com";
                $comcopiaoculta = "rafael.batista@itech-all.com";

                $mensagemHTML = "Nome: ".$nome." - Email: ".$email."<br/><br/>Mensagem:<br/>".$msg;

                $headers = "MIME-Version: 1.1\n";
                $headers .= "Content-type: text/html; charset=utf-8\n";
                $headers .= "From: ".$emailsender."\n";
                $headers .= "Return-Path: ".$emailsender."\n";
                $headers .= "Cc: ".$comcopia."\n";
                $headers .= "Bcc: ".$comcopiaoculta."\n";
                $headers .= "Reply-To: ".$replyTo."\n";

				mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);

				echo '<div class="container" id="envioForm"><h2>Envio feito com sucesso.</h2></div>';
				exit;

			} // else {
			// 	echo "<h2>Erro ao enviar mensagem.</h2>";
			// }
			?>

			</div>
			<!-- -------------------------------------- Final do formulário de contato -------------------------------------- -->
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
			<button type="button" data-toggle="modal" data-target="#janela2">Abrir Modal</button>

		<div class="modal fade" id="janela2" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
		    	<div class="modal-content">
		     	<div class="modal-header">
			        <h5 class="modal-title" id="TituloModalCentralizado">Título do modal</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        ...
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			        <button type="button" class="btn btn-primary">Salvar mudanças</button>
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