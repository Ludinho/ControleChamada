<?php
	if (isset($_POST['Enviar'])) {
		include_once("controller/LoginController.class.php");
		$controle = new LoginController();
		$post = "senha";
		$controle->logar($_POST);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
		<input type="text" name="login">
		<input type="password" name="senha">
		<input type="submit" name="Enviar">
	</form>
</body>
</html>