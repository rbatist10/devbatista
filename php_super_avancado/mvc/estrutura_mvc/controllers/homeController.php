<?php

class homeController extends controller {

	public function index() { // toda página criada com controler terá um método "index"
		$anuncios = new Anuncios();
		$usuarios = new Usuarios();

		$dados = array(
			'quantidade' => $anuncios->getQuantidade(),
			'nome' => $usuarios->getNome(),
			'idade' => $usuarios->getIdade()
		);

		$this->loadTemplate('home', $dados);

	}

}

?>