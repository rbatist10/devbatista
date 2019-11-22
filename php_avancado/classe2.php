<?php

class Cachorro {
	public static function latir() {
		echo "au au";
	}
}
// Instanciando uma classe - e o ideal

$cachorro = new Cachorro(); //new NomeDaClasse();
$cachorro->latir();

$dudu = new Cachorro();
$dudu->latir();

// Executando sem instanciar; (não tem como acessar essa classe depois) deve ser necessário colocar um "public static function" na classe
Cachorro::latir();

?>