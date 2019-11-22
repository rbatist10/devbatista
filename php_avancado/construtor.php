<?php

class Post {
	private $titulo;
	private $data;
	private $corpo;
	private $comentarios;

	// Criação de construtores (é executado instantaneamente, caso existir)
	public function __construct($t) {
		$this->setTitulo($t); // $this = esse próprio objeto
	}

	public function getTitulo() {
		return $this->titulo; // Forma de fazer com que uma propriedade privada possa ser acessada por toda a estrutura através de um método publico
	}
	public function setTitulo($t) {
		if(is_string($t)) {
			$this->titulo = $t;
		}
	}
}

$post = new Post("Titulo qualquer", "Corpo da minha postagem");

echo "Titulo do post: ".$post->getTitulo();

?>