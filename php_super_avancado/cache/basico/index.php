<?php 

class Cache {

	private $cache;

	public function setVar($nome, $valor) {

		// recuperar o cache já salvo (caso exista)
		$this->readCache();

		// alterar (vai transformar a variável nome no valor setado)
		$this->cache->$nome = $valor;

		// salvar
		$this->saveCache();

	}

	public function getVar($nome) {
		$this->readCache();
		// recomendável fazer uma verificação antes
		return $this->cache->$nome;
	}

	private function readCache() {
		$this->cache = new stdClass(); // stdClass() = objeto vazio
		if(file_exists('cache.cache')) {
			$this->cache = json_decode(file_get_contents('cache.cache'));
		}
	}

	private function saveCache() {
		file_put_contents("cache.cache", json_encode($this->cache));
	}

}

$cache = new Cache();
// $cache->setVar("nome", "Rafael");
$cache->setVar("idade", 25);

// echo "meu nome vai ser: ".$cache->getVar("nome");
?>