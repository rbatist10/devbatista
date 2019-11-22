<?php
// DEFININDO PROPRIEDADES

// class Cachorro {
// 	public $nome;
// 	private $idade;
// }

// $cachorro = new Cachorro();
// $cachorro->nome = "Lulu";

// echo "O nome do meu cachorro é: ".$cachorro->nome;

// ------------------------------------------------------------------- //

class Post {
	private $titulo;
	private $data;
	private $corpo;
	private $comentarios;

	public function getTitulo() {
		return $this->titulo; // Forma de fazer com que uma propriedade privada possa ser acessada por toda a estrutura através de um método publico
	}
	public function setTitulo($t) {
		if(is_string($t) > 5) {
			$this->titulo = $t;
		}
	}
}

$post = new Post();
$post->setTitulo("Titulo da Postagem");

echo "Titulo: ".$post->getTitulo();

?>