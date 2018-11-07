<?php
	include_once("model/Saida.class.php");
 	include_once("dao/DaoAluno.class.php");
  include_once("dao/DaoSaida.class.php");

  class SaidaController{
    	public function registrarSaida($post){
     	  //Criar um objeto registro
         //Criar um objeto presenca
        $saida = new Saida();
         $saida->setNome($post['nome']);
        $saida->setMatriculaAluno($post['matricula']);
        $saida->setData(date("Y-m-d"));
        $saida->setHora(date("H:i:s"));
        $saida->setMotivo($post['motivo']);

        $daoAluno = new DaoAluno();

        $aluno = $daoAluno->buscarAlunoPorMatricula($saida->getMatriculaAluno());

        if (is_null($aluno->getMatricula())){
          return "Aluno não encontrado";
        } else{
          $dao = new DaoSaida();
          $dao->geraRegistro($saida);
          return "Registrou";
        }
      }

       public function buscarRegistros(){
        $dao = new DaoSaida();
        return $dao->buscarTodosOsAlunos();
      }

  }

?>