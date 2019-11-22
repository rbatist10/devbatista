<?php
session_start();
require 'config.php';
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
					<a id="link-home" href="./" class="itemMenu nav-item nav-link">HOME</a>
					<a id="link-regulamento" href="./regulamento" class="itemMenu nav-item nav-link active">REGULAMENTO</a>
					<a id="link-tecnicos" href="./" class="itemMenu nav-item nav-link disabled" onclick="desativadoTecnicos()">TÉCNICOS</a>
					<a id="link-contato" href="./#contato" class="itemMenu nav-item nav-link" onclick="addContato()">CONTATO</a>
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
			<div class="container">
				<div id="regulamento"><p>

				<div class="row">
						<div class="col-8">
							<h3>CAMPEONATO DE DANÇA – OS ESCOLHIDOS</h3><br/>
						</div>	
						<div class="col-md">
							<p class="text-right"><a href="regulamento.pdf" download="regulamento.pdf" class="btn btn-dark btn-lg">Baixar Regulamento</a></p>
						</div>
				</div>
				
				<br/>

				<h6>REGULAMENTO</h6><br/>

				Este regulamento tem como finalidade estipular as regras gerais para a participação do  campeonato de Sertanejo OS ESCOLHIDOS.<br/><br/>

				<b>1. INÍCIO E TÉRMINO</b> <br/><br/>

				1.1. O presente campeonato ocorrerá no ARENA TEXAS, localizado na AV SENADOR VERGUEIRO, 4090 – RUDGE RAMOS – São Bernardo- SP; Será disputado aos Sábados, a partir das 20:00hs, e as Seletivas aos Sábados, a partir das 19h:00hs, e terá o início com Seletivas no dia 27 de outubro de 2018 e Seu Término previsto em 08 de Dezembro de 2018.<br/>
				1.2. O local e horário e datas poderão ser modificados, informando aos participantes com até uma semana de Antecedência. <br/><br/>

				<b>2. DAS CONDIÇOES DE PARTICIPAÇÕES</b> <br/><br/>

				2.1. O campeonato e aberto a todo e qualquer casal, cujos parceiros sejam um homem e uma Mulher, que sejam residentes e domiciliados no território nacional, com o pagamento da taxa de inscrição, e de acordo com as condições previstas neste regulamento. <br/>
				2.2. Os participantes ao se inscreverem, atestarão que estão em perfeitas condições de saúde para participar do campeonato, responsabilizando-se por quaisquer problemas de saúde que possam ocorrer durante as fases que se compõe.<br/> 
				2.3. Poderão participar do campeonato todas as pessoas físicas, exceto aos prepostos com função de gestão, funcionários ou qualquer pessoa que esteja envolvida diretamente com o Campeonato. <br/><br/>

				<b>3. COMO PARTICIPAR</b> <br/><br/>

				3.1 SELETIVA<br/>
				3.1.1 As inscrições para a Seletiva serão efetuadas por deposito bancário ou Pagamento on Line no valor de R$ 100,00 (Cem Reais). <br/>
				3.1.2 Os casais Inscritos receberam por e-mail a data da Seletiva, os mesmos dançaram uma música de no máximo 2 min.<br/>
				3.1.3. Os técnicos terão o tempo da música e mais 10 segundos após a apresentação para escolher os competidores.<br/>
				3.1.4. Os casais que não passarem na Seletiva terá uma chance na repescagem caso o time dos técnicos não estejam completos.<br/>
				3.1.5. Quem não passar na seletiva e na repescagem não terão o direito de participarem do campeonato, entretanto receberão ingressos para assistir a primeira fase do campeonato. Valido para chave A, B.<br/>
				3.1.6. O número mínimo de casal para realização do campeonato será de 24 (vinte e quatro) casais, e o número máximo para essa competição e de 32 (Trinta e dois) casais, caso não tenha o numero mínimo de casais inscritos ate o inicio do campeonato, será informado a todos os inscritos e será mudada a data de inicio campeonato ate completar o numero mínimo de casais. <br/>
				3.1.7 Caso o time dos técnicos estejam completos antes da final da audição os competidores que não efetuaram a Seletiva receberam o reembolso da sua inscrição<br/>
				3.3. A data da Inscrição será do dia 10 de Setembro de 2018 a 15 de Outubro de 2018 ou ate atingir a quantidade de 70 inscritos. (Lembrando que o candidato só esta inscrito após a o pagamento da inscrição). <br/><br/>

				<b>4. DIVULGAÇÃO</b> <br/><br/>

				4.1. O presente campeonato será divulgado por meios de cartazes, flyer e outros materiais necessários à divulgação, alem dos meios Eletrônicos de divulgação tais como: (site, redes sociais, entre outros). <br/>
				4.2 os participantes inscritos no presente campeonato autorizam, desde já a realização de fotos, filmagens durante o campeonato para publicidade e divulgação do evento em qualquer meio relacionado à dança de salão, sem que estes tenham direito á qualquer indenização. <br/><br/>

				<b>5. DA COMPETIÇÃO</b> <br/><br/>
				5.1. Todos os competidores serão previamente notificados, por e-mail, telefone ou redes sociais, sobre o dia e a hora que deveram comparecer a cada evento. <br/>
				5.2. O casal participante devera apresentar-se em todas as fases para as quais forem convocados. A ausência em qualquer das fases implicará em desclassificação automática, não cabendo recurso. <br/>
				5.3. A competição será na modalidade “SERTANEJO UNIVERSITARIO”. <br/>
				5.4. No dia da apresentação na seletiva, os participantes deveram levar um PEN DRIVE com uma musica Única, identificado com o nome do casal. Com duração Máxima de 2 Min. <br/>
				5.5. A competição compreenderá as Seguintes fases: Seletiva dia 27 de Outubro e 03 de Novembro de 2018 a Partir das 19h. <br/>
				5.6 O casal escolhido por mais de um dos técnicos poderão escolher para qual técnico ele será treinado, cada técnico terá uma única opção de bloqueio para bloquear o outro técnico para um determinado casal. O Técnico bloqueado não poderá escolher nem ser escolhido com o casal que foi escolhido. <br/>
				5.7. Cada técnico poderão escolher no máximo 8 casais para seu time.<br/>
				5.8 Os escolhidos terão venda obrigatória de 14 pulseiras no valor de R$ 20,00 (vinte reais) em cada uma das etapas por casal.<br/><br/>
				       O campeonato terá as modalidades de Batalhas da seguinte forma.<br/>
				1ª. FASE BATALHA INTERNA - Os casais Escolhidos por seus Técnicos, serão divididos em 2 grupos Chave A, B os Técnicos passaram 2 casais de sua equipe por chave, passando 4 casais para Semifinal.<br/>
				CHAVE A – (DATA 17/11/2018) DOS 4 CANDIDATOS DE CADA TIME APENAS 2 PASSARAM PARA A SEMIFINAL, SERÃO ESCOLHIDOS PELO SEUS TECNICOS.<br/>
				CHAVE B – (DATA 24/11/2018) DOS 4 CANDIDATOS DE CADA TIME APENAS 2 PASSARAM PARA A SEMIFINAL, SERÃO ESCOLHIDOS PELO SEUS TECNICOS.<br/>
				SEMIFINAL – BATALHA – IMPROVISO – Cada técnico terão quatro casais de sua equipe. Os competidores serão sorteados para saber com qual técnico oposto eles batalharam, representando sua equipe. Os competidores receberão as respectivas musicas no dia anterior a semifinal. Os vencedores da Batalha garantirão a vaga para a grande Final. <br/>
				SEMIFINAL   – (DATA 01/12/2018) SERÃO FORMADAS 8 BATALHAS, Nesta fase teremos outros Jurados que avaliaram quem venceu a batalha. Os 2 casais que perderam a batalha com melhores notas passaram para a final.<br/>
				FINAL (DATA 08/12/2018) OS 10 CASAIS ESTARAO COMPETINDO PELO 1°, 2° E 3° LUGAR. <br/><br/>

				<b>6. COMISSÃO JULGADORA</b> <br/><br/>

				6.1. A comissão será Composta por 03 (Três) Jurados. Sendo necessário pelo menos 1 dos jurados ser do próprio ritmo avaliado.<br/>
				6.2. Os Juízes, Profissionais de dança de Salão, Profissionais do Ritmo Sertanejo, bem como profissionais do meio artístico ou Cultural, escolhido pela comissão organizadora do evento. <br/>
				6.3. As decisões da Comissão Julgadora serão soberanas e irrevogáveis, não cabendo qualquer tipo de questionamento e/ou recurso por parte dos participantes ou técnicos. <br/><br/>

				<b>7. CRITERIO DA AVALIAÇÃO</b> <br/><br/>

				7.1. A comissão Organizadora da Competição ficara responsável por avaliar as inscrições, de acordo com os critérios de avaliação e desclassificação previstas neste regulamento. <br/>
				7.2. Os seguintes critérios serão avaliados pela comissão julgadora; <br/>
				1- RITMO <br/>
				2- MUSICALIDADE <br/>
				3- TECNICA <br/>
				4- HARMONIA <br/>
				5- PRESENÇA CENICA <br/>
				6- FIGURINO  (apenas na Final)<br/>
				7- COMPLEXIDADE<br/>
				7.3. Em caso de empate, o critério utilizado será a RITMO, se continuar empatado passaremos para musicalidade e assim sucessivamente até haver o desempate.<br/>
				7.4. As notas do casal serão de no mínimo 05(cinco) e no Maximo 10 (dez) em cada critério mencionado acima. <br/><br/>

				<b>8-DIVULGAÇÃO DOS RESULTADOS</b> <br/><br/>

				8.1. Os nomes dos vencedores do presente campeonato serão divulgados no final do Evento. <br/><br/>

				<b>9. PREMIAÇÃO</b> <br/><br/>

				9.1. Os 3 (Três) casais selecionados na final farão jus aos seguintes prêmios:<br/>
				1° Lugar – R$ 5.000,00 Sendo R$ 2.000 em Dinheiro + 1 Figurino de R$ 1.000 reais do Ateliê Celma Mota para o casal e R$ 2.000,00 em Dinheiro Para os Técnicos. <br/>
				Casal Campeão será selecionado para ser Técnico dos Escolhidos 2019<br/>
				2° Lugar – R$ 2200,00 Sendo R$ 1.200 para o casal e R$ 1.000,00 Para os Técnicos. <br/>
				3° Lugar – R$ 1300,00 Sendo R$ 1.000 para o casal e R$ 300,00 Para os Técnicos<br/><br/>

				<b>10. CONSIDERAÇÕES GERAIS</b> <br/><br/>

				10.1. Todas as despesas incorridas pelos participantes para a realização das apresentações, tais como: Figurino, documentação e transporte, são de responsabilidade de cada participante e não serão reembolsadas, em nenhuma hipótese, pela comissão organizadora. <br/>
				10.2. Nas hipóteses de caso fortuito e/ou força maior, a comissão organizadora do presente campeonato reserva-se ao direito de proceder a alteração de clausulas deste regulamento e/ou da data de divulgação do resultado, cujas alterações serão amplamente comunicadas aos participantes e demais interessados. <br/>
				10.3. A participação neste campeonato implica em reconhecimento de todos os termos e condições neste regulamento.<br/><br/>
				
				</p></div>
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