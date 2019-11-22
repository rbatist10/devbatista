<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>OS ESCOLHIDOS</title>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../css/modal.css">
	<link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
	<!-- If you'd like to support IE8 -->
  	<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
	<link rel="icon" type="image/png" href="../img/osescolhidos.jpg" />
</head>
<body>

	<?php 
		include '../config/connect.php';
	?>
	<!-- 
		Criação da navegação principal contendo os links
	-->
	<div class="container-fluid" id="nav">
			<ul id="ulPrincipal" class="nav nav-tabs nav-pills nav-justified">
				<li id="link1"><a href="../index.html" class="text-uppercase">Home</a></li>
				<!-- <li id="link"><a href="#">Sobre</a></li> -->
				<li id="link1"><a href="../tecnicos/tecnicos.html">Técnicos</a></li>
				<!-- <li id="link"><a href="#">Videos</a></li> -->
				<li id="link1"><a href="../parceiros/parceiros.php">Parceiros</a></li>
				<li id="link1"><a href="../galeria/galeriaImagens.php">Galeria de imagens</a></li>
			</ul>
	</div>
	<!-- --------------------------------------- -->

	<!-- criação do login -->
	<div class="container-fluid" id="containerFluid1">
		<div class="row" style="margin-right: 0;">
			<div class="col-md-12 col-sm-12">
				<div id="btnLogin" style="width: 100%;">
					<a href="../index.html" style="text-decoration: none; font-size: 20px; float: left; margin-left: 20px;">HOME</a>
					<a href="#" data-toggle="modal" data-target="#login-modal" style="text-decoration: none;">Login</a>

			<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
				    <div class="loginmodal-container">
						<h1>Login para Administração</h1><br>
						<form method="POST" action="videos.php">
							<input type="text" name="txtlogin" placeholder="Login">
							<input type="password" name="txtsenha" placeholder="Senha">
							<input type="submit" name="login" class="login loginmodal-submit" value="Login">
						</form>
					</div>
				</div>
			</div>

		 <?php 
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				include '../config/conexao.php';
				require '../classes/usuario.php';
				session_start();

				$login = mysqli_real_escape_string($con, $_POST['txtlogin']);
				$senha = mysqli_real_escape_string($con, $_POST['txtsenha']);

				$query = "select * from usuarios where (login = '".$login."' AND senha = '".$senha."')";
				$execute = $mysqli->query($query) or die ($mysqli->error);
				$num = $execute->num_rows;

				if ($num > 0){
				while ($user = $execute->fetch_assoc()) {
					if ($user['login'] == $login && $user['senha'] == $senha) {
							$usuario = new Usuario ($user['id'], $user['nome'], $user['login'], $user['senha']);
							$_SESSION['usuario'] = $usuario;
							// $_SESSION['nome'] = $user['nome'];
							// $_SESSION['login'] = $user['login'];
							// $_SESSION['senha'] = $user['senha'];
							header("Location: ../pag_up/index.php");
					}
					else {
							unset($_SESSION['login']);
							unset($_SESSION['senha']);
							echo "Usuário ou senha incorreto !";
					}
					}
				}
				}
		?> 
				</div>
			</div>
		</div>
	</div>
	<!-- --------------------------------------- -->

	<!-- criação dos videos -->
	<div class="container" id="divVideos" style="margin-top: 2%; margin-bottom: 5%;">
		<?php  
		include "../config/conexao.php";

		// itens por pagina
		$itens_pag = 10;
		// pegar pag atual
		if(!isset($_GET['pagina'])){
			$pagina = 1;
		}
		else {
			$pagina = intval($_GET['pagina']);
		}
		// inicio das paginas
		$inicio_pag	= ($itens_pag*$pagina)-$itens_pag;
		// codigo sql
		$sql_code = "select * from videos ORDER BY id DESC LIMIT $inicio_pag, $itens_pag";
		$execute = $mysqli->query($sql_code) or die ($mysqli->error);
		$num = $execute->num_rows;
		// quantidade total
		$num_total = $mysqli->query("select * from videos")->num_rows;
		// definir num pags
		$num_pags = ceil($num_total/$itens_pag);
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php if($num > 0) { ?>
					<table style="margin-top: 3%; margin-bottom: 3%; width: 80%; margin-left: 10%;">
						<tbody>
						<?php  while ($result = $execute->fetch_assoc()) { ?>
							<tr>
								<td style="border-bottom: 1px solid white; width: 40%; padding-bottom: 1%; padding-top: 1%;">
								<div style="position: relative; z-index: 0;">
								<a data-toggle="modal" data-target="#myModal<?php echo $result['id']; ?>" id="btnModal" style="background-color: rgba(0, 0, 0, 0.4); z-index: 1; width: 80%; position: absolute; height: 100%; margin-bottom: 1%; cursor: pointer;"><img src="../img/play.png" style="margin-top: 21%; margin-left: 44%; width: 15%;"></a>
									<!-- onclick='showModal("<?php $valor['url']; ?>");' -->
									<?php 
									echo "<video style='width: 80%; border-radius: 4px;'>
										<source src='../upload/video/".$result['url']."' type='video/mp4'>
										</video>";
									?>
								</div>
								</td>
								<td style="border-bottom: 1px solid white; width: 60%; color: white;">
								<div style="margin-top: -6%;">
								<h3 style="font-weight: bold;"><?php echo $result['titulo']; ?></h3>
								</div>
								<div style="margin-top: 5%; font-size: 15px;">
									<p>
									<b>Música :</b> <?php echo $result['musica']; ?><br/>
									<b>Etapa :</b> <?php echo $result['etapa']; ?><br/>
									<b>Descrição :</b>
								<?php 
									$frase = explode(" ", $result['descricao']);
									$con = 0;
									foreach ($frase as $linhas) {
										echo $linhas." ";
										$con ++;
										if ($con == 5) {
											echo $linhas." ...";
											break;
										}
									}
								?>
									</p>
							</div>	
								</td>
							</tr>

						<!-- Modal -->
						<div id="myModal<?php echo $result['id']; ?>" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content" style="width: 112%; margin-left: -5%;">
						      <div class="modal-header" style="background-color: black; color: silver;">
						        <button style="color: white;" type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title text-center"><?php echo $result['titulo']; ?></h4>
						      </div>
						      <div class="modal-body">
						        <!-- <video controls id='bgVideo'>
								<source src='upload/<?php echo $valor['url']; ?>' type='video/mp4'>
								</video> -->
								<video id="my-video" class="video-js" controls preload="auto" poster="../img/osescolhidos.jpg" data-setup="{}">
								    <source src="../upload/video/<?php echo $result['url']; ?>" type='video/mp4'>
								</video>
								<br/><br/>
								<p>
									<b>Música :</b> <?php echo $result['musica']; ?><br/>
									<b>Etapa :</b> <?php echo $result['etapa']; ?><br/>
									<b>Descrição :</b> <?php echo $result['descricao']; ?>
								</p>
								<br/>
						      </div>
						      <div class="modal-footer" style="background-color: black; color: silver;">
						        <p><b>Campeonato Os Escolhidos !</b></p>
						      </div>
						    </div>

						  </div>
						</div>
						<!-- --------------------------------------- -->
						<?php } ?>
						</tbody>
					</table>
					<nav style="margin-left: 10%;">
						<ul class="pagination">
							<li>
								<a href="videos.php?pagina=1" arial-label="Previous">
									<span arial-hidden="true">&laquo;</span>
								</a>
							</li>
							<?php 
								for ($i=1; $i <= $num_pags; $i++) { 
									$estilo = " ";
									if ($pagina == $i){
										$estilo = "class=\"active\"";
									}
							?>
								<li <?php echo $estilo; ?>><a href="videos.php?pagina=<?php echo $i; ?>" style="z-index: 0; cursor: pointer; background-color: black;"><?php echo $i; ?></a></li>
							<?php } ?>
							<li>
								<a href="videos.php?pagina=<?php echo $num_pags; ?>" arial-label="Next">
									<span arial-hidden="true">&raquo;</span>
								</a>
							</li>
						</ul>
					</nav>
				<?php } ?>
			</div>
		</div>
	</div>
	</div>
	<!-- --------------------------------------- -->

	<!-- criação do footer rodapé -->
	<div class="container-fluid" id="containerFluid">
		<div class="divFooterPrincipal">
			<div class="row">
			<footer id="footerPrincipal">
				<div id="link1" class="col-md-4 col-sm-4">
					<a href="https://www.facebook.com/campeonato.osescolhidos/?fref=ts"><img src="../img/faceLogo.png" alt="Facebook" id="social"></a>
				</div>
				<div id="link1" class="col-md-4 col-sm-4">
					<a href="#"><img src="../img/youtubeLogo.png" alt="Youtube" id="social"></a>
				</div>
				<div id="link1" class="col-md-4 col-sm-4">
					<a href="#"><img src="../img/instagramLogo.png" alt="Instagram" id="social"></a>
				</div>
			</footer>
			</div>
		</div>
	</div>
	<!-- --------------------------------------- -->

	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  	<script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="../js/anim.js"></script>
</body>
</html>