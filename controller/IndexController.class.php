<?php
	include_once("model/Aluno.class.php");
 	include_once("dao/DaoAluno.class.php");
  	class IndexController{
    	

      	public function salvarAluno($post){
	      
	        $dao = new DaoAluno();
	        $aluno = $dao->buscarAlunoPorMatricula($post['cmatricula']);  

	        if (is_null ($aluno->getMatricula())) {
		        $quantidadeDeLinhas = $dao->salvarAlunoDaModal($post);
		                
				if($quantidadeDeLinhas > 0){
					echo "Aluno salvo com sucesso!";
				}else{
					echo "Erro ao realizar o cadastro!";
				}
			}else{
				echo "Matrícula já existente no banco, procure o Ari para mais informações";
			}

	    }
	

	include_once("model/Professor.class.php");
 	include_once("dao/DaoProfessor.class.php");
    	

      	public function salvarProfessor($post){
	      
	        $dao = new DaoProfessor();
	        $professor = $dao->buscarProfessorPorMateria($post['cmateria']);  

	        if (is_null ($professor->getMateria())) {
		        $quantidadeDeLinhas = $dao->salvarProfessorDaModal($post);
		                
				if($quantidadeDeLinhas > 0){
					echo "professor salvo com sucesso!";
				}else{
					echo "Erro ao realizar o cadastro!";
				}
			}else{
				echo "Materia já existente no banco, procure o Ari para mais informações";
			}

	    }
	}
?>