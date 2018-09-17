<?php
	include_once("model/Entrada.class.php");
 	include_once("dao/DaoAluno.class.php");
  include_once("dao/DaoEntrada.class.php");
  class PresencaController{
    	public function buscarTodosOsAlunosPresentes(){
          $dao = new DaoEntrada();
          return $dao->buscarTodosOsAlunosPresentes();
      }

      public function buscarTodosOsAlunosPresentesFiltro($filtrosDePesquisa){
          $dao = new DaoEntrada();
          return $dao->buscarTodosOsAlunosPresentesFiltro($filtrosDePesquisa);
      }

  }

?>