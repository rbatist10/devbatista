<?php
// Servem somente para ajudar no código

class Post {
	private $titulo;
	private $data;
	private $corpo;
	private $comentarios;
	private $qtComentarios;

	public function getTitulo() {
		return $this->titulo;
	}
	public function setTitulo($t) {
		if(is_string($t)) {
			$this->titulo = $t;
		}
	}

	public function addComentario($msg) {
		$this->comentarios[] = $msg; // Adiciona o comentário no array
		$this->contarComentarios(); // Conta quantos comentários tem
	}
	public function getQuantosComentarios() {
		// return count($this->comentarios);
		return $this->qtComentarios;
	}
	private function contarComentarios() { // Private porque cabe somente ao próprio objeto fazer executar essa função
		$this->qtComentarios = count($this->comentarios);
	}
}

$post = new Post();

$post->addComentario("Teste");
$post->addComentario("Teste 2");
$post->addComentario("Teste 3");
$post->addComentario("Teste 4");

echo "Quantidade de comentarios: ".$post->getQuantosComentarios();

?>