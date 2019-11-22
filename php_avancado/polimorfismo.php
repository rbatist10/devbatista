<?php
// O conceito de polimorfismo é quando você herda as propriedades de uma classe, mas recria o método
class Animal {

	public function getNome() {
		echo "getNome da classe Animal";
	}

	public function testar() {
		echo "TESTADO !!!";
	}

}

class Cachorro extends Animal {

	public function getNome() {
		
		$this->testar();

	}

}

$cachorro = new Cachorro();
$cachorro->getNome();

?>