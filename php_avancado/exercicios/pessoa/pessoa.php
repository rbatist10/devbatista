<?php 
class Pessoa {
	private $nome;
	private $idade;

	public function __construct($nome, $idade) {
	$this->nome = $nome;
	$this->idade = $idade;

	}

	public function getNome() {
		return $this->nome;
	}

	public function getIdade() {
		$data = explode("/", $this->idade);

		$d1 = time();
		$d2 = strtotime($data[2].'-'.$data[1].'-'.$data[0]);

		$c = $d1 - $d2;

		$ano = date('Y', $c) - 1970;

		return $ano;
	}
}
?>