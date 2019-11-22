<?php
require 'usuario.php';

// $usuario = new Usuario();
// $usuario->setEmail("teste@hotmail.com");
// $usuario->setSenha("123");
// $usuario->setNome("Testador");
// $usuario->salvar();

// $usuario = new Usuario(4);
// echo "Meu nome é: ".$usuario->getNome();
// $usuario->setNome("Fulano");
// $usuario->salvar();

$usuario = new Usuario(4);
$usuario->delete();

?>