<?php
class Usuarios extends model {

	public function getNome() {
		$sql = "SELECT nome FROM usuarios";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			return $sql['nome'];
		} else {
			return false;
		}
	}

	public function getIdade() {
		return 99;
	}
}
?>