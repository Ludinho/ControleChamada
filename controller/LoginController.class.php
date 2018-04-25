<?php
	include_once("model/Usuario.class.php");
 	include_once("dao/DaoUsuario.class.php");
  class LoginController{
    	public function logar($post){
     	 //verificar usuario
	     	$dao = new DaoUsuario();
	     	$usuario = $dao->buscarUsuarioPorLogin($post["login"]);
        if (is_null($usuario->getIdUsuario())){
          return "Usuario não encontrado";
        } else{
            if ($usuario->getSenha()== $post['senha']){
              header("location:index.php");

            } else{
                return "Senha Incorreta";
            }
        }

	     	// verificar a senha
	    	//var_dump($usuario);

    	}
    }
  ?>