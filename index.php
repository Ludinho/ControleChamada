<?php
	if (isset($_POST['btn-enviar'])) {
		include_once("controller/EntradaController.class.php");
		$controle = new EntradaController();
		$mensagem = $controle->registrarEntrada($_POST);
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
			<h1>Presença<h1>
		</div>
		<div class="form-centralizado">
			<form method="POST">
				<div class="form-group">
					<label for="matricula">Matrícula:</label>
					<input type="text" name="matricula" id="matricula" placeholder="Digite seu código" class="form-control"/>
				</div>
				<?php
					if(isset($mensagem)){
						echo "<p class='msg-login'>$mensagem </p>";
					}
				?>
				<div class="form-group">
					<input type="submit" name="btn-enviar" id="btn-enviar" value="Confirmar Presença" class="btn btn-sucess btn-block btn-enviar">
				</div>
			</form>
		</div>
	</body>
</html>