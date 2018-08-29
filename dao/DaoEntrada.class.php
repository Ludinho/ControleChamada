<?php 
	include_once("model/Entrada.class.php");
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
	 }
?>