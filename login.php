<?php
	if (isset($_POST['btn-enviar'])) {
		include_once("controller/LoginController.class.php");
		$controle = new LoginController();
		$post = "senha";
		$mensagem = $controle->logar($_POST);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Med WBS</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/estilo.css" />
	</head>
	<body>
		<div class="container">
			<h1>Login do Administrador<h1>
		</div>
		<div class="form-centralizado">
			<form method="POST">
				<div class="form-group">
					<label for="login">Login:</label>
					<input type="text" name="login" id="login" placeholder="Digite o seu Email" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="senha">Senha:</label>
					<input type="password" name="senha" id="senha" placeholder="Digite sua senha" class="form-control"/>
				</div>
				<?php
					if(isset($mensagem)){
						echo "<p class='msg-login'>$mensagem </p>";
					}
				?>
				<div class="form-group">
					<input type="submit" name="btn-enviar" id="btn-enviar" value="Entrar" class="btn btn-sucess btn-block btn-enviar">
				</div>
			</form>
		</div>
	</body>
</html>