<html>
<head>
    <title>Projeto Upload de foto com ajax</title>
</head>
<body>
	<form id="form" method="POST" enctype="multipart/form-data" action="recebedor.php">
		Nome:<br/>
		<input type="text" id="nome" name="nome" /><br/><br/>

		Foto:<br/>
		<input type="file" id="foto" name="foto" /><br/><br/>

<button>Enviar</button>
	</form>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>