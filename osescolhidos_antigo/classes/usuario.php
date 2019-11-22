<?php  

	class usuario {

		private $id;
		private $nome;
		private $login;
		private $senha;

		public function __construct (int $id, string $nome, string $login, string $senha) {
			// passando valores aos membros da classe
			$this->set_id($id);
			$this->set_nome($nome);
			$this->set_login($login);
			$this->set_senha($senha);
		}

		// seters dos membros, para setar valores
		public function set_id (int $id) {
			$this->id = $id;
		}

		public function set_nome (string $nome) {
			$this->nome = $nome;
		}

		public function set_login (string $login) {
			$this->login = $login;
		}

		public function set_senha ( string$senha) {
			$this->senha = $senha;
		}

		// geters dos membros, para recuperar valores
		public function get_id () : int {
			return $this->id;
		}

		public function get_nome () : string {
			return $this->nome;
		}

		public function get_login () : string {
			return $this->login;
		}

		public function get_senha () : string {
			return $this->senha;
		}

	}

?>