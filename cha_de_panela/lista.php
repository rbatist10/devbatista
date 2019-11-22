<?php
session_start();
header("Content-type: text/html; charset=UTF-8");
// $db = variável de conexão com o banco
require './config.php';
// require '../users.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html" charset="utf-8" />
		<title>CHÁ DE PANELA - Rafa e Kel</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" /> 
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="./fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" />
		<link rel="stylesheet" type="text/css" href="./css/estilo.css" />
		<link rel="stylesheet" type="text/css" href="./css/animate.css" />
		<!-- <script type="text/javacript" src="./bootstrap/js/bootstrap.bundle.min.js"></script> -->
		<!-- <link rel="icon" type="./image/png" href="img/escolhidos.png" /> -->
	</head>

	<body>
		
		<div class="total">

			<div class="container fundo">

				<div class="table-responsive">
					<table class="table text-center">
						<thead>
							<tr class="alinhamento_tabela">
								<th><p>Item</p></th>
								<th><p>Disponível</p></th>
							</tr>
						</thead>
						
						<tbody>
						<?php

							$sql = "SELECT * FROM itens ORDER BY item";
							$sql = $db->query($sql);

							if($sql->rowCount() > 0) {

								foreach($sql->fetchAll() as $itens):
									$item = $itens['item'];
									$marcado = $itens['marcado']; 
							?>
							<tr>
								<td><code>&nbsp;&nbsp;<?php echo $item; ?>&nbsp;</code></td>
								<td>
									<?php 
										
										if($marcado == 0){?>
										<a href="./marcado.php?id=<?php echo $itens['id'];?>" id="codigo" class="btn btn-primary btn-sm active" onclick="alertaEmail()">SIM</a>
										<?php } else {?><a href="" class="btn btn-sm disabled btn-danger">NÃO</a>
										
									<?php }; ?>
								</td>
							</tr>
						<?php
								endforeach;
							}

						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="./js/script.js"></script>
	</body>
</html>
