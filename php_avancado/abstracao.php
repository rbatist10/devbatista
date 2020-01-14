<?php
abstract class Animal { // É necessário criar uma classe abstrata pra habilitar funções abstratas
	private $nome;
	private $idade;

	abstract protected function andar(); // todas as funções abstratas são protegidas // Criou um modelo para a classe Cavalo()

	public function setNome($n) {
		$this->nome = $n;
	}
	public function getNome() {
		return $this->nome;
	}
}

class Cavalo extends Animal {
	private $quantidade_de_patas;
	private $tipo_de_pelo;

	public function andar() {
		// É obrigatório declarar o método para todas as classes que tiverem herança (extends)
	}
}

$cavalo = new Cavalo();

$cavalo->setNome("Cavalo Teste");

echo "O meu cavalo é: ".$cavalo->getNome();

?>