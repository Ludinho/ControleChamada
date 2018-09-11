<?php 
	include_once("model/Professor.class.php");
	include_once("includes/Conexao.class.php");
	class DaoProfessor{
	 	
	 	public function salvarProfessorDaModal($dadosDaModal){
			$sql = "INSERT INTO tb_professor (id_prof, disciplina_prof, nome_prof, codigo_prof) VALUES (null, :disciplina, :nome, :codigo)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$dadosDaModal['cnomep']);
			$sqlPreparado->bindValue(":disciplina",$dadosDaModal['cdisciplina']);
			$sqlPreparado->bindValue(":codigo",$dadosDaModal['ccodigo']);
			$resposta = $sqlPreparado->execute();
			return $sqlPreparado->rowCount();
			
		}

		public function buscarProfessorPorCodigo($codigo){
			$sql = "SELECT * FROM tb_professor WHERE codigo_prof=:codigo";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":codigo",$codigo);
			$resposta = $sqlPreparado->execute();
			$professor = $this->TransformaProfessorDoBancoEmObjeto($sqlPreparado->fetch(PDO::FETCH_ASSOC));
			return $professor;
			
		}
		public function buscarTodosOsProfessores(){
			$sql = "SELECT * FROM tb_professor";
			$resultado = Conexao::meDeAConexao()->query($sql);
			$listaFormatoBanco = $resultado->fetchAll(PDO::FETCH_ASSOC);
			$listaDeObjetosProfessores = array();

			foreach ($listaFormatoBanco as $itemLista)
				$listaDeObjetosProfessores[] = $this->TransformaProfessorDoBancoEmObjeto($itemLista);

			
			return $listaDeObjetosProfessores;
			
		}

		public function excluir($codigo){
			$sql = "DELETE  FROM tb_professor WHERE codigo_prof=:codigo";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":codigo",$codigo);
			$resposta = $sqlPreparado->execute();
		}

	 	public function TransformaProfessorDoBancoEmObjeto($dadosDoBanco){
	 		$professor = new Professor();
	 		$professor->setDisciplina($dadosDoBanco['disciplina_prof']);
	 		$professor->setNome($dadosDoBanco['nome_prof']);
	 		$professor->setCodigo($dadosDoBanco['codigo_prof']);
	 		return $professor;
	 	}
	 }




?>