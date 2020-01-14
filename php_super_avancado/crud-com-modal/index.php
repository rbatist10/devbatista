<?php
include 'contato.php';
$contato = new Contato();
?>
<html>
	
	<head>
		<title>Site de contatos</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/script.js"></script>
	</head>
	<body>
		<h1>Contatos</h1>

		<a href="adicionar.php" class="modal_ajax">Adicionar usuário</a><br/><br/>

		<table border="1" width="600">
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Ações</th>
			</tr>
			
			<?php
			$lista = $contato->getAll(); //pegar as informações de todos os contatos
			foreach ($lista as $item):
			?>
			<tr>
				<td><?php echo $item['id']; ?></td>
				<td><?php echo $item['nome']; ?></td>
				<td><?php echo $item['email']; ?></td>
				<td>
					<a href="editar.php?id=<?php echo $item['id']; ?>" class="modal_ajax">[ Editar ]</a>
					<a href="excluir.php?id=<?php echo $item['id']; ?>" class="modal_ajax">[ Excluir ]</a>
				</td>
			</tr>
			<?php
			endforeach;
			?>
		</table>

		<div class="modal_bg">
			<div class="modal">
				
			</div>
		</div>

	</body>
</html>
