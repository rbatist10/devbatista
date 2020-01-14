<?php
# O autoload serve para puxar automaticamente todas as classes existentes no sistema
spl_autoload_register(function($class){

	require $class.'.php';

});

// require 'cavalo.php';

// sempre que uma classe for instanciada sem o require, irá ser mandado para o
// autoload executar o que está dentro da function($class)

// $cavalo = new Cavalo();
// echo $cavalo->falar();

$pessoa = new Pessoa();
echo $pessoa->andar();
?>
