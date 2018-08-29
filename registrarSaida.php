<?php
	if (isset($_POST['btn-saida'])) {
		include_once("controller/SaidaController.class.php");
		$controle = new SaidaController();
		$mensagem = $controle->registrarSaida($_POST);
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
			<h1>Registro de Saída<h1>
		</div>
		<div class="form-centralizado">
			<form method="POST">
				
				<div class="form-group">
					<label for="matricula">Matrícula:</label>
					<input type="text" name="matricula" id="matricula" placeholder="Digite sua matricula" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="matricula">Motivo da Saída:</label>
					<input type="text" name="motivo" id="motivo" placeholder="Diga o motivo da saída" class="form-control"/>
				</div>
				<?php
					if(isset($mensagem)){
						echo "<p class='msg-login'>$mensagem </p>";
					}
				?>
				<div class="form-group">
					<input type="submit" name="btn-saida" id="btn-saida" value="Registrar" class="btn btn-sucess btn-block btn-enviar">
				</div>
			</form>
		</div>
	</body>
</html>