<?php 
	include_once("model/Usuario.class.php");
	include_once("includes/Conexao.class.php");
	class DaoUsuario{
	 	 public function buscarUsuarioPorLogin($login){
	 	 	$sql = "SELECT * FROM tb_administrador WHERE login = :login";
	 	 	$sqlPreparado = Conexao:: meDeAConexao()->prepare($sql);
	 	 	$sqlPreparado->bindValue(":login", $login);
	 	 	$resposta = $sqlPreparado->execute();
	 	 	$usuario = $this->TransformaUsuarioDoBancoEmObjeto($sqlPreparado->fetch(PDO::FETCH_ASSOC));
	 	 	return $usuario;
	 	}

	 	public function salvarUsuarioDoForm($dadosDoForm){
			$sql = "INSERT INTO tb_administrador (id_administrador, nome, login, senha) VALUES (NULL, :nome, :login, :senha)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$dadosDoForm['nome']);
			$sqlPreparado->bindValue(":login",$dadosDoForm['login']);
			$sqlPreparado->bindValue(":senha",$dadosDoForm['senha']);
			$resposta = $sqlPreparado->execute();
			return $sqlPreparado->rowCount();
			
		}

	 	public function TransformaUsuarioDoBancoEmObjeto($dadosDoBanco){
	 		$usuario = new Usuario();
	 		$usuario->setIdUsuario($dadosDoBanco['id_administrador']);
	 		$usuario->setnome($dadosDoBanco['nome']);
	 		$usuario->setlogin($dadosDoBanco['login']);
	 		$usuario->setsenha($dadosDoBanco['senha']);
	 		return $usuario;
	 	}

	 	
	 }




?>