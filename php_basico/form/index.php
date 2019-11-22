<?php
//if(isset($_POST['email']) && $_POST['email'] != "" ) {
if(isset($_POST['email']) && empty($_POST['email']) == false) // empty = caso a variável esteja vazia ---- Colocando ! na frente de qualquer função, é uma negação, ou seja, dupla negação é uma afirmação (padrão é TRUE)
{
	if(isset($_POST['senha']) && !empty($_POST['senha'])) 
	{
		$email = $_POST['email'];
		$senha = $_POST['senha'];
	        //echo "O usuario enviou os dados";
		echo "Meu email: ".$email. " e minha senha: ".$senha;
	}
}
?>
<hr/>
<form method="POST">
	E-mail:<br/>
	<input type="text" name="email" /><br/><br/>
	Senha:</br>
	<input type="password" name="senha" /><br/><br/>

	<input type="submit" value="Enviar Dados" />
</form>
