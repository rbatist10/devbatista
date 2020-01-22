<?php
// o adapter é uma extensão do objeto

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
		return $this->idade;
	}
}

class PessoaAdapter {

	private $sexo;
	private $pessoa;

	// aqui funciona o adapter, como um extends
	public function __construct(Pessoa $pessoa) {
		$this->pessoa = $pessoa;
	}

	public function setSexo($s) {
		$this->sexo = $s;
	}

	public function getSexo() {
		return $this->sexo;
	}

	public function getNome() {
		// métodos que estão na classe Pessoa()
		return $this->pessoa->getNome();
	}

	public function getIdade() {
		return $this->pessoa->getIdade();
	}

}

$pessoa = new Pessoa("Rafael", "25");

$pa = new PessoaAdapter($pessoa);
$pa->setSexo("Masculino");

echo "Nome: ".$pa->getNome()."<br>";
echo "Idade: ".$pa->getIdade()."<br>";
echo "Sexo: ".$pa->getSexo()."<br>";
?>