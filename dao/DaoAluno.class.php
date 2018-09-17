<?php 
	include_once("model/Aluno.class.php");
	include_once("includes/Conexao.class.php");
	class DaoAluno{
	 	
	 	public function salvarAlunoDaModal($dadosDaModal){
			$sql = "INSERT INTO tb_aluno (matricula_aluno, nome_aluno, turma) VALUES (:matricula, :nome, :turma)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$dadosDaModal['cnome']);
			$sqlPreparado->bindValue(":matricula",$dadosDaModal['cmatricula']);
			$sqlPreparado->bindValue(":turma",$dadosDaModal['cturma']);
			$resposta = $sqlPreparado->execute();
			return $sqlPreparado->rowCount();
			
		}

		public function buscarAlunoPorMatricula($matricula){
			$sql = "SELECT * FROM tb_aluno WHERE matricula_aluno=:matricula";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":matricula",$matricula);
			$resposta = $sqlPreparado->execute();
			$aluno = $this->TransformaAlunoDoBancoEmObjeto($sqlPreparado->fetch(PDO::FETCH_ASSOC));
			return $aluno;
			
		}

		public function buscarTodosOsAlunos(){
			$sql = "SELECT * FROM tb_aluno";
			$resultado = Conexao::meDeAConexao()->query($sql);
			$listaFormatoBanco = $resultado->fetchAll(PDO::FETCH_ASSOC);
			$listaDeObjetosAlunos = array();

			foreach ($listaFormatoBanco as $itemLista)
				$listaDeObjetosAlunos[] = $this->TransformaAlunoDoBancoEmObjeto($itemLista);

			
			return $listaDeObjetosAlunos;
			
		}

		

		public function excluir($matricula){
			$sql = "DELETE  FROM tb_entrada WHERE matricula_aluno=:matricula_aluno";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":matricula_aluno",$matricula);
			$resposta = $sqlPreparado->execute();

			$sql = "DELETE  FROM tb_saida WHERE matricula_aluno=:matricula_aluno";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":matricula_aluno",$matricula);
			$resposta = $sqlPreparado->execute();

			$sql = "DELETE  FROM tb_aluno WHERE matricula_aluno=:matricula_aluno";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":matricula_aluno",$matricula);
			$resposta = $sqlPreparado->execute();
			
		}
	 	public function TransformaAlunoDoBancoEmObjeto($dadosDoBanco){
	 		$aluno = new Aluno();
	 		$aluno->setMatricula($dadosDoBanco['matricula_aluno']);
	 		$aluno->setNome($dadosDoBanco['nome_aluno']);
	 		$aluno->setTurma($dadosDoBanco['turma']);
	 		return $aluno;
	 	}
	 }




?>