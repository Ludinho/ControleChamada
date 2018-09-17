<?php 
	include_once("model/Entrada.class.php");
	include_once("dao/DaoAluno.class.php");
	include_once("includes/Conexao.class.php");
	class DaoEntrada{
	 	
	 	public function geraRegistro($presenca){
			$sql = "INSERT INTO tb_entrada (id_entrada, data, hora, matricula_aluno) VALUES (null, :data, :hora, :matricula)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":data",$presenca->getData());
			$sqlPreparado->bindValue(":hora",$presenca->getHora());
			$sqlPreparado->bindValue(":matricula",$presenca->getMatriculaAluno());
			$resposta = $sqlPreparado->execute();
			return $sqlPreparado->rowCount();
			
		}

		public function buscarTodosOsAlunosPresentes(){
			
			$sql = "SELECT * FROM tb_entrada te INNER JOIN tb_aluno ta ON(te.matricula_aluno=ta.matricula_aluno) WHERE data = :data";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":data", date("Y-m-d"));
			$resposta = $sqlPreparado->execute();
			$listaFormatoBanco = $sqlPreparado->fetchAll(PDO::FETCH_ASSOC);
			$listaDeObjetosAlunos = array();

			$daoAluno = new DaoAluno();
			
			foreach ($listaFormatoBanco as $itemLista){
				$listaDeObjetosAlunos[] = $daoAluno->TransformaAlunoDoBancoEmObjeto($itemLista);
			}
			
			
			
			return $listaDeObjetosAlunos;
			
		}

		public function buscarTodosOsAlunosPresentesFiltro($filtrosDePesquisa){
			var_dump($filtrosDePesquisa);
			$sql = "SELECT * FROM tb_entrada te INNER JOIN tb_aluno ta ON(te.matricula_aluno=ta.matricula_aluno) WHERE te.data = :data and ta.turma=:turma and te.matricula_aluno = :matricula";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":data",$filtrosDePesquisa['data']);
			$sqlPreparado->bindValue(":matricula",$filtrosDePesquisa['matricula']);
			$sqlPreparado->bindValue(":turma",$filtrosDePesquisa['turma']);
			$resposta = $sqlPreparado->execute();
			$listaFormatoBanco = $sqlPreparado->fetchAll(PDO::FETCH_ASSOC);
			$listaDeObjetosAlunos = array();

			$daoAluno = new DaoAluno();
			
			foreach ($listaFormatoBanco as $itemLista){
				$listaDeObjetosAlunos[] = $daoAluno->TransformaAlunoDoBancoEmObjeto($itemLista);
			}
			

			
			return $listaDeObjetosAlunos;
			
		}
	 }
?>