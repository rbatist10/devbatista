<?php
// Servirá de template (estrutura) para outros objetos e, em qual for implementada, deverá usar os métodos inseridos na interface
interface Animal {
	// Todo método de uma interface deve ser público
	public function andar(); // em interface, as funções não tem códigos pois serão definidos nas funções que terão as propriedades herdadas

}
class Cachorro implements Animal {
	public function andar() {
		echo "Estou andando...";
	}
}

$cachorro = new Cachorro();
$cachorro->andar();

?>