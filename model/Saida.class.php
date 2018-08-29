<?php
	class Saida{
		private $id_saida;
		private $data;
		private $hora;
		private $matricula_aluno;
		private $motivo;

		public function getIdPresenca(){
			return $this->idPresenca;
		}
		public function setIdPresenca($idPresenca){
			$this->idPresenca = $idPresenca;
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