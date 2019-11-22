<?php
session_start();
header("Content-type: text/html; charset=UTF-8");
// $db = variável de conexão com o banco
require '../config.php';
require '../users.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html" charset="utf-8" />
		<title>OS ESCOLHIDOS - Edição Especial</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" /> 
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/estilo.css" />
		<script type="text/javacript" src="../bootstrap/js/jquery-3.3.1.min.js"></script>
		<script type="text/javacript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
		<link rel="icon" type="../image/png" href="img/escolhidos.png" />
	</head>

	<body>
		<div class="total">
			<div class="container-fluid fundo">
				
				<div class="row">
					<div class="col-8">
						<a href="sair.php" class="encerrar">Encerrar Sessão</a><br/><br/>
					</div>
					<div class="col">
						Acessos atuais: <?php echo $contagem; ?>
					</div>
				</div>

				<?php

				// if(isset($_GET['act']) && !empty($_GET['act'])) {
				// 	session_destroy();
				// 	header("Location: login.php");
				// }

				if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {
					
					if(isset($_POST['ordem']) && !empty($_POST['ordem'])) {
						$ordem = addslashes($_POST['ordem']);
						if($ordem == "pago"){
							$sql = "SELECT * FROM competidores WHERE pago = '1'";
						} else {
						$sql = "SELECT * FROM competidores ORDER BY ".$ordem;
						}
					} else {
						$ordem = "";
						$sql = "SELECT * FROM competidores";
					}
				?>
				<div class="order_by pull-right">
					Mostrar por: 
					<form method="POST">
						<select name="ordem" onchange="this.form.submit()">
							<option></option>
							<option class="ordenar" value="pago" <?php echo ($ordem == "pago")?'selected="selected"':''; ?>>Pago</option>
							<option class="ordenar" value="casal" <?php echo ($ordem == "casal")?'selected="selected"':''; ?>>Nome Casal</option>
							<option class="ordenar" value="id" <?php echo ($ordem == "id")?'selected="selected"':''; ?>>Inscrição</option>
						</select>
					</form><br/>
					<a href="./nao-pagaram.php" class="btn btn-light btn-lg">Não pagos</a>
					<a href="./gerar-planilha.php" class="btn btn-light btn-lg">Gerar planilha</a><br/><br/>
				</div>

				<div class="table-responsive">
					<table class="table text-center">
						<thead>
							<tr class="alinhamento_tabela">
								<th>ID</th>
								<th>Casal</th>
								<th>Cavalheiro</th>
								<!-- <th>Data Nascimento</th> -->
								<!-- <th>CPF</th> -->
								<th>Celular</th>
								<th>Email</th>
								<th>Dama</th>
								<!-- <th>Data Nascimento</th> -->
								<!-- <th>CPF</th> -->
								<th>Celular</th>
								<th>Email</th>
							</tr>
						</thead>
						
						<tbody>
						<?php 

							$sql = $db->query($sql);

							if($sql->rowCount() > 0) {

								foreach($sql->fetchAll() as $competidores):
									$id = $competidores['id'];
									$casal = $competidores['casal'];
									$cavalheiro = $competidores['cavalheiro'];
									$data_nasc_c = $competidores['data_nasc_c'];
									$cpf_c = $competidores['cpf_c'];
									$cel_c = $competidores['cel_c'];
									$email_c = $competidores['email_c'];
									$dama = $competidores['dama'];
									$data_nasc_d = $competidores['data_nasc_d'];
									$cpf_d = $competidores['cpf_d'];
									$cel_d = $competidores['cel_d'];
									$email_d = $competidores['email_d'];
						?>
							<tr>
								<td><?php echo $id; ?></td>
								<td><?php echo utf8_encode($casal); ?></td>
								<td><?php echo utf8_encode($cavalheiro); ?></td>
								<!-- <td><?php //echo $data_nasc_c; ?></td> -->
								<!-- <td><?php //echo $cpf_c; ?></td> -->
								<td><?php echo $cel_c; ?></td>
								<td><?php echo $email_c; ?></td>
								<td><?php echo utf8_encode($dama); ?></td>
								<!-- <td><?php //echo $data_nasc_d; ?></td> -->
								<!-- <td><?php //echo $cpf_d; ?></td> -->
								<td><?php echo $cel_d; ?></td>
								<td><?php echo $email_d; ?></td>
							</tr>

						<?php
								endforeach;
							}

						?>
						</tbody>

					<?php
					} else {
						header("Location: login.php");
					}
					?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
