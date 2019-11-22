<?php
//include "recebedor.php" -- se der algum erro, o include vai mostrar uma mensagem porém o script vai continuar
require "recebedor.php"; // Ao dar um erro, o require para de executar o script-- há também o require_once (que irá rodar somente uma vez)
?>
<hr/>
<form method="POST">
	E-mail:<br/>
	<input type="text" name="email" /><br/><br/>

	<input type="submit" value="Enviar Dados" />
</form>
