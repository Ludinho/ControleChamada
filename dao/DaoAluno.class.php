<?php 
	include_once("model/Aluno.class.php");
	include_once("includes/Conexao.class.php");
	class DaoAluno{
	 	
	 	public function salvarAlunoDaModal($dadosDaModal){
			$sql = "INSERT INTO tb_aluno (matricula_aluno, nome_aluno) VALUES (:matricula, :nome)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$dadosDaModal['cnome']);
			$sqlPreparado->bindValue(":matricula",$dadosDaModal['cmatricula']);
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

	 	public function TransformaAlunoDoBancoEmObjeto($dadosDoBanco){
	 		$aluno = new Aluno();
	 		$aluno->setMatricula($dadosDoBanco['matricula_aluno']);
	 		$aluno->setNome($dadosDoBanco['nome_aluno']);
	 		return $aluno;
	 	}
	 }




?>