<?php 
	include_once("model/Professor.class.php");
	include_once("includes/Conexao.class.php");
	class DaoProfessor{
	 	
	 	public function salvarProfessorDaModal($dadosDaModal){
			$sql = "INSERT INTO tb_professor (id_prof, disciplina_prof, nome_prof) VALUES (null, :disciplina, :nome)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$dadosDaModal['cnomep']);
			$sqlPreparado->bindValue(":disciplina",$dadosDaModal['cdisciplina']);
			$resposta = $sqlPreparado->execute();
			return $sqlPreparado->rowCount();
			
		}

		public function buscarProfessorPorDisciplina($materia){
			$sql = "SELECT * FROM tb_professor WHERE disciplina_prof=:disciplina";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":disciplina",$disciplina);
			$resposta = $sqlPreparado->execute();
			$aluno = $this->TransformaProfessorDoBancoEmObjeto($sqlPreparado->fetch(PDO::FETCH_ASSOC));
			return $Professor;
			
		}
		public function buscarTodosOsAlunos(){
			$sql = "SELECT * FROM tb_professor";
			$resultado = Conexao::meDeAConexao()->query($sql);
			$listaFormatoBanco = $resultado->fetchAll(PDO::FETCH_ASSOC);
			$listaDeObjetosProfessores = array();

			foreach ($listaFormatoBanco as $itemLista)
				$listaDeObjetosProfessores[] = $this->TransformaAlunoDoBancoEmObjeto($itemLista);

			
			return $listaDeObjetosProfessores;
			
		}

	 	public function TransformaProfessorDoBancoEmObjeto($dadosDoBanco){
	 		$aluno = new Professor();
	 		$aluno->setDisciplina($dadosDoBanco['disciplina_prof']);
	 		$aluno->setNome($dadosDoBanco['nome_prof']);
	 		return $professor;
	 	}
	 }




?>