<?php 
class Pessoa {

	private $nome;
	private $idade;

	// terá apenas uma instância no sistema inteiro
	public static function getInstance() {

		static $instance = null;
		if($instance == null) {
			$instance = new Pessoa();
		}

		return $instance;

	}

	private function __construct() {

	}

	public function setNome($n) {
		$this->nome = $n;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setIdade($i) {
		$this->idade = $i;
	}

	public function getIdade() {
		return $this->idade;
	}

} 

$cara = Pessoa::getInstance();
$cara->setNome("Rafael");

// echo "Nome: ".$cara->getNome();

$cara2 = Pessoa::getInstance();
$cara2->setIdade(25);

echo "idade: ".$cara->getIdade();

?>