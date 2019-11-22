<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
</head>
<body>

<?php  

	require "usuario.php";

	$adm = new Usuario(1, "isaac", "adm", "adm");

	echo "Nome : ". $adm->get_nome() . " Login : ". $adm->get_login() . " Senha : ". $adm->get_senha() ." id : ". $adm->get_id();
?>


</body>
</html>