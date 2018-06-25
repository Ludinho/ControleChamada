<?php
	class Aluno{
		private $matricula;
		private $nome;

		public function getMatricula(){
			return $this->matricula;
		}
		public function setMatricula($matricula){
			$this->matricula = $matricula;
		}

		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}

	}


?>