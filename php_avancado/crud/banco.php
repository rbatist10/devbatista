<?php

class Banco {

	private $pdo;
	private $numRows;
	private $array;

	public function __construct($host, $dbname, $dbuser, $dbpass) {
		try {
		$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $dbuser, $dbpass);
		} catch(PDOException $e) {
			echo "Falhou: ".$e->getMessage();
		}
	}

	public function query($sql) {
		$query = $this->pdo->query($sql);
		$this->numRows = $query->rowCount(); // Pega quantos registros foram alterados através da query (número de linhas)
		$this->array = $query->fetchAll(); // Todos os items para jogar no array
	}

	public function numRows() {
		return $this->numRows;
	}

	public function result() {
		return $this->array;
	}

	public function insert($table, $data) {
		if(!empty($table) && ( is_array($data) && count($data) > 0 )) { // Verifica se a tabela está vazia, se é um array e se há dados inseridos
			$sql = "INSERT INTO ".$table." SET ";
			
			// INSERT INTO tabela SET nome = 'fulano', idade = 90;
			$dados = array();
			foreach($data as $chave => $valor) {
				$dados[] = $chave." = '".addslashes($valor)."'";
			}
			$sql = $sql.implode(", ", $dados);
			$this->pdo->query($sql);
		}
	}

	public function update($table, $data, $where = array(), $where_cond = "AND") {
		if(!empty($table) &&  ( is_array($data) && count($data) > 0 && is_array($where) )) {
			$sql = "UPDATE ".$table." SET ";
			$dados = array();
			foreach($data as $chave => $valor) {
				$dados[] = $chave." = '".addslashes($valor)."'";
			}
			$sql = $sql.implode(", ", $dados);

			if(count($where) > 0) {
				$dados = array();
				foreach($where as $chave => $valor) {
					$dados[] = $chave." = '".addslashes($valor)."'";
				}
				$sql = $sql." WHERE ".implode(" ".$where_cond." ", $dados);
			}
			$this->pdo->query($sql);
		}
	}

	public function delete($table, $where, $where_cond = "AND") {
		if(!empty($table) && (is_array($where) && count($where) > 0)) {
			$sql = "DELETE FROM ".$table;

			if(count($where) > 0) {
				$dados = array();
				foreach($where as $chave => $valor) {
					$dados[] = $chave." = '".addslashes($valor)."'";
				}
				$sql = $sql." WHERE ".implode(" ".$where_cond." ", $dados);
			}
			$this->pdo->query($sql);
		}
	}

}

?> 