<?php
	class Saida{
		private $nome;
		private $id_saida;
		private $data;
		private $hora;
		private $matricula_aluno;
		private $motivo;

		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getIdSaida(){
			return $this->id_saida;
		}
		public function setIdSaida($id_saida){
			$this->id_saida = $id_saida;
		}

		public function getData(){
			return $this->data;
		}
		public function setData($data){
			$this->data = $data;
		}

		public function getHora(){
			return $this->hora;
		}
		public function setHora($hora){
			$this->hora = $hora;
		}

		public function getMatriculaAluno(){
			return $this->matriculaAluno;
		}
		public function setMatriculaAluno($matriculaAluno){
			$this->matriculaAluno = $matriculaAluno;
		}

		public function getMotivo(){
			return $this->motivo;
		}
		public function setMotivo($motivo){
			$this->motivo = $motivo;
		}
	}


?>