<?php 
	include_once("model/Saida.class.php");
	include_once("includes/Conexao.class.php");
	class DaoSaida{
	 	
	 	public function geraRegistro($saida){
			$sql = "INSERT INTO tb_saida (nome, id_saida, data, hora, matricula_aluno, motivo) VALUES (null, :data, :hora, :matricula, :motivo)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$saida->getnome());
			$sqlPreparado->bindValue(":data",$saida->getData());
			$sqlPreparado->bindValue(":hora",$saida->getHora());
			$sqlPreparado->bindValue(":matricula",$saida->getMatriculaAluno());
			$sqlPreparado->bindValue(":motivo",$saida->getMotivo());
			$resposta = $sqlPreparado->execute();
			return $sqlPreparado->rowCount();
			
		}

		public function buscarTodosOsAlunos(){
			$sql = "SELECT * FROM tb_saida";
			$resultado = Conexao::meDeAConexao()->query($sql);
			$listaFormatoBanco = $resultado->fetchAll(PDO::FETCH_ASSOC);
			$listaDeObjetosAlunos = array();

			foreach ($listaFormatoBanco as $itemLista)
				$listaDeObjetosAlunos[] = $this->TransformaAlunoDoBancoEmObjeto($itemLista);

			
			return $listaDeObjetosAlunos;
			
		}

	 	public function TransformaAlunoDoBancoEmObjeto($dadosDoBanco){
	 		$registro = new Saida();
	 		$registro->setNome($dadosDoBanco['nome']);
	 		$registro->setMatriculaAluno($dadosDoBanco['matricula_aluno']);
	 		$registro->setMotivo($dadosDoBanco['motivo']);
	 		$registro->setData($dadosDoBanco['data']);
	 		$registro->setHora($dadosDoBanco['hora']);
	 		return $registro;
	 	}
	 }
?>