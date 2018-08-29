<?php
	include_once("model/Entrada.class.php");
 	include_once("dao/DaoAluno.class.php");
  include_once("dao/Daoentrada.class.php");
  class EntradaController{
    	public function registrarEntrada($post){
     	  //Criar um objeto entrada
        $entrada = new Entrada();
        $entrada->setMatriculaAluno($post['matricula']);
        $entrada->setData(date("Y-m-d"));
        $entrada->setHora(date("H:i:s"));

        $daoAluno = new DaoAluno();

        $aluno = $daoAluno->buscarAlunoPorMatricula($entrada->getMatriculaAluno());

        if (is_null($aluno->getMatricula())){
          return "Aluno não encontrado";
        } else{
          $dao = new Daoentrada();
          $dao->geraRegistro($entrada);
          return "Registrou";
        }
      }

  }

?>