<?php
	include_once("model/Professor.class.php");
	include_once("dao/DaoProfessor.class.php");
	class ProfessorController{
		function excluir($mat)
		{
			$dao = new DaoProfessor ();
			$dao ->excluir($mat);
		}

		public function salvarProfessor($post){
	      
	        $dao = new DaoProfessor();
	        $professor = $dao->buscarProfessorPorCodigo($post['ccodigo']);

	        $quantidadeDeLinhas = $dao->salvarProfessorDaModal($post);
		                
			if($quantidadeDeLinhas > 0){
				echo "<h6 class='sf'>Professor salvo com sucesso!<h6>";
			}else{
				echo "<h6 class='sf'>Erro ao realizar o cadastro!<h6>";
			}

	    }

	    public function buscarProfessores(){
	    	$dao = new DaoProfessor();
	    	return $dao->buscarTodosOsProfessores();
	    }
	}


?>