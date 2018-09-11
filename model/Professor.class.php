<?php
	class Professor{

		private $idProf;
		private $disciplina;
		private $nome;
		private $codigo;

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

		public function getCodigo(){
			return $this->codigo;
		}
		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}

	}


?>