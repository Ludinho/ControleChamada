<?php
	include_once("model/Aluno.class.php");
	include_once("model/Professor.class.php");
 	include_once("dao/DaoAluno.class.php");
 	include_once("dao/DaoProfessor.class.php");
    	
  	class IndexController{
    	

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
			header("refresh: 3; url = index.php");

	    }
	
		public function salvarProfessor($post){
	      
	        $dao = new DaoProfessor();
	        $quantidadeDeLinhas = $dao->salvarProfessorDaModal($post);
		                
			if($quantidadeDeLinhas > 0){
				echo "<h6 class='sf'>Professor salvo com sucesso!<h6>";
			}else{
				echo "<h6 class='sf'>Erro ao realizar o cadastro!<h6>";
			}
			header("Refresh: 20; url = menu.php");

	    }

	    public function buscarAlunos(){
	    	$dao = new DaoAluno();
	    	return $dao->buscarTodosOsAlunos();
	    }
	}
?>