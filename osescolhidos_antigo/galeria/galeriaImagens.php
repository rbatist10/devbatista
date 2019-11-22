<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>OS ESCOLHIDOS</title>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<!-- <link rel="stylesheet" type="text/css" href="../css/modal.css"> -->
	<link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
	<!-- If you'd like to support IE8 -->
  	<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
	<link rel="icon" type="image/png" href="../img/osescolhidos.jpg" />
</head>
<body style="padding-right: 0;">

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
				<li id="link1"><a href="../pag_videos/videos.php">Videos</a></li>
				<li id="link"><a href="../parceiros/parceiros.php">Parceiros</a></li>
				<!-- <li id="link"><a href="#tituloContato">Contato</a></li> -->
			</ul>
	</div>
	<!-- --------------------------------------- -->

	<div class="container" id="divVideos" style="margin-top: 2%; margin-bottom: 2%; padding: 1%;">
		<form action="" method="POST" id="formPesquisa">
			<input type="text" name="txtpesquisa" placeholder="Digite aqui o nome da etapa !">
			<input type="submit" name="pesquisa" value="Pesquisar">
		</form>
	</div>

	<!-- criação dos videos -->
	<div class="container" id="divVideos" style="margin-top: 2%; margin-bottom: 5%;">
		<?php  
		include "../config/conexao.php";

		// itens por pagina
		$itens_pag = 30;
		// pegar pag atual
		if(!isset($_GET['pagina'])){
			$pagina = 1;
		}
		else {
			$pagina = intval($_GET['pagina']);
		}
		// inicio das paginas
		$inicio_pag	= ($itens_pag*$pagina)-$itens_pag;

		if (isset($_POST['pesquisa'])) {
			$pesquisa = mysqli_real_escape_string($con, $_POST['txtpesquisa']);
			$sql_code = "select * from galeria_imagens where etapa LIKE '%$pesquisa%' ORDER BY id DESC LIMIT $inicio_pag, $itens_pag";
		}
		else {
			// codigo sql
			$sql_code = "select * from galeria_imagens ORDER BY id DESC LIMIT $inicio_pag, $itens_pag";
		}
		
		$execute = $mysqli->query($sql_code) or die ($mysqli->error);
		$num = $execute->num_rows;

		// quantidade total
		$num_total = $mysqli->query("select * from galeria_imagens")->num_rows;
		// definir num pags
		$num_pags = ceil($num_total/$itens_pag);
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php if($num > 0) { ?>
					<table style="margin-top: 3%; margin-bottom: 3%; width: 100%;">
						<tbody>
						<?php  
						$num_td = 0;
						while ($result = $execute->fetch_assoc()) { 

								if($num_td == 0) {
								?>
									<tr style="height: 200px;">
							<?php
								}
							?>
							
								<td id="tdGaleria" style="width: 20%; padding: 2px; color: white;">
								<div style="position: relative; z-index: 0;">
									<a data-toggle="modal" data-target="#myModal<?php echo $result['id']; ?>" id="btnModal" style="cursor: pointer;">
									<img src="../upload/galeria_imagens/<?php echo $result['imagem']; ?>" style="width: 100%; height: 200px; border-radius: 3px;" id="imgCompetidores">
									</a>
								</div>
								</td>

								<?php 
									if($num_td == 4) {
										$num_td = 0;
										echo "</tr>";
									} 
									else {
										$num_td ++;
									}
								?>
						<!-- Modal -->
						<div id="myModal<?php echo $result['id']; ?>" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content" style="width: 112%; margin-left: -5%;">
						      <div class="modal-header" style="background-color: black; color: silver;">
						        <button style="color: white;" type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title text-center"><?php echo $result['etapa']; ?></h4>
						      </div>
						      <div class="modal-body">
						        <img src="../upload/galeria_imagens/<?php echo $result['imagem']; ?>" style="width: 100%; border-radius: 3px;">
								<br/><br/>
								<p>
									<b>Etapa :</b> <?php echo $result['etapa']; ?>
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
						<?php 
							}
						?>
						</tbody>
					</table>
					<nav style="margin-left: 1%;">
						<ul class="pagination">
							<li>
								<a href="galeriaImagens.php?pagina=1" arial-label="Previous">
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
								<li <?php echo $estilo; ?>><a href="galeriaImagens.php?pagina=<?php echo $i; ?>" style="z-index: 0; cursor: pointer; background-color: black;"><?php echo $i; ?></a></li>
							<?php } ?>
							<li>
								<a href="galeriaImagens.php?pagina=<?php echo $num_pags; ?>" arial-label="Next">
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
			<div class="row" style="margin-right: 0;">
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