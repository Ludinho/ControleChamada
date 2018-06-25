<?php
	class Professor{
		private $disciplina;
		private $nome;

		public function getDisciplina(){
			return $this->disciplina;
		}
		public function setDisciplina($disciplina){
			$this->disciplina = $disciplina;
		}

		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}

	}


?>