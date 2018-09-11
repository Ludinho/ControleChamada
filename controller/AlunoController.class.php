<?php
	include_once("model/Aluno.class.php");
	include_once("dao/DaoAluno.class.php");
	class AlunoController{
		function excluir($mat)
		{
			$dao = new DaoAluno ();
			$dao ->excluir($mat);
		}

		public function salvarAluno($post){
	      
	        $dao = new DaoAluno();
	        $aluno = $dao->buscarAlunoPorMatricula($post['cmatricula']);  

	        if (is_null ($aluno->getMatricula())) {
		        $quantidadeDeLinhas = $dao->salvarAlunoDaModal($post);
		                
				if($quantidadeDeLinhas > 0){
					echo "<h6 class='sf'>Aluno salvo com sucesso!<h6>";
				}else{
					echo "<h6 class='sf'>Erro ao realizar o cadastro!<h6>";
				}
			}else{
				echo "<h6 class='sf'>Matrícula já existente no banco, procure o Ari para mais informações<h6>";
			}
	    }

	    public function buscarAlunos(){
	    	$dao = new DaoAluno();
	    	return $dao->buscarTodosOsAlunos();
	    }
	}


?>