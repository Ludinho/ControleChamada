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
              session_start();
              $_SESSION['usuario']= $usuario->getNome();
              $_SESSION['logado'] = true;
              
              header("location:index2.php");

            } else{
                return "Senha Incorreta";
            }
        }
      }

      public function salvarUsuario($post){
        if($post['nome']==""){
          echo "Informe o nome.";
        }else{
          $dao = new DaoUsuario();
          $usuario = $dao->buscarUsuarioPorLogin($post['login']);
          if (is_null ($usuario->getIdUsuario())) {

            $quantidadeDeLinhas = $dao->salvarUsuarioDoForm($post);

            if($quantidadeDeLinhas > 0){
              echo "Usuário salvo com sucesso!";
            }else{
              echo "Erro ao realizar o cadastro!";
            }

          } else{
            echo "Perdeu playboy! Outro maluco já usa esse nickname";
          }
        }
      }
      public static function verificaSeUsuarioJaFezLogin(){
        session_start();
        if(!$_SESSION['logado']==true)
          header("location:login.php?msg='Malandro, você não pode entrar sem fazer login");
      }
      }

?>