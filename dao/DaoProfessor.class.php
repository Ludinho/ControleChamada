<?php 
	include_once("model/Professor.class.php");
	include_once("includes/Conexao.class.php");
	class DaoProfessor{
	 	
	 	public function salvarProfessorDaModal($dadosDaModal){
			$sql = "INSERT INTO tb_professor (materia_prof, nome_prof) VALUES (:materia, :nome)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$dadosDaModal['cnomep']);
			$sqlPreparado->bindValue(":materia",$dadosDaModal['cmateria']);
			$resposta = $sqlPreparado->execute();
			return $sqlPreparado->rowCount();
			
		}

		public function buscarProfessorPorDisciplina($materia){
			$sql = "SELECT * FROM tb_professor WHERE meteria_prof=:materia";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":materia",$materia);
			$resposta = $sqlPreparado->execute();
			$aluno = $this->TransformaProfessorDoBancoEmObjeto($sqlPreparado->fetch(PDO::FETCH_ASSOC));
			return $Professor;
			
		}

	 	public function TransformaProfessorDoBancoEmObjeto($dadosDoBanco){
	 		$aluno = new Professor();
	 		$aluno->setMateria($dadosDoBanco['materia_prof']);
	 		$aluno->setNome($dadosDoBanco['nome_prof']);
	 		return $professor;
	 	}
	 }




?>