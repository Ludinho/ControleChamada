<?php
	class Entrada{
		private $id_presenca;
		private $data;
		private $hora;
		private $matricula_aluno;

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

		
	}


?>