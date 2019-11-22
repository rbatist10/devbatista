<?php
class Usuarios {

	private $db;

	public function __construct() {
		try {
			$this->db = new PDO("mysql:dbname=blog;host=localhost", "root", "");
		} catch (PDOException $e) {
			echo "Falha: ".$e->getMessage();
		}
	}

	public function selecionar($id) {
		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
		$sql->bindValue(":id", $id); # Apenas pega o valor da variavel e associa com o apelido.
		$sql->execute();

		$array = array();
		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		return $array;
	}

	public function inserir($nome, $email, $senha) {
		$sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha");
		$sql->bindParam(":nome", $nome); # Enquanto a query não for executada, o valor do nome permanece sendo da variável
		$sql->bindParam(":email", $email); # Caso a variável venha a ser alterada antes do execute() a query é alterada também
		$sql->bindValue(":senha", md5($senha)); # O que não ocorre no bindValue
		$sql->execute();
	}

	public function atualizar($nome, $email, $senha, $id) {
		$sql = $this->db->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?");
		$sql->execute(array($nome, $email, md5($senha), $id));
	}

	public function excluir($id) {
		$sql = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
		$sql->bindValue(1, $id);
		$sql->execute();
	}

}