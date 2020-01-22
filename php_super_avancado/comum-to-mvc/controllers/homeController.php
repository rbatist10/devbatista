<?php

class homeController extends controller {

	public function __construct() { // toda página criada com controler terá um método "index"
		parent::__construct();
	}

	public function index() {
		$dados = array();

		$posts = new Posts();
		$dados['posts'] = $posts->getPosts(10);

		$this->loadTemplate('home', $dados);
	}


}

?>