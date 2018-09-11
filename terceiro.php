<?php
	include_once("controller/IndexController.class.php");
	include_once("controller/LoginController.class.php");
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet" href="css/style.css">
			<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
			<title>Visualizar Alunos</title>
		</head>
		<body>
			<h2>Registros de alunos</h2>

			 <?php
	                	$listaDeAlunos = $controle->buscarResgistros();
	                	
	                	foreach ($listaDeAlunos as $aluno){
	                		
	                ?>

	                	
	                	<h4><?=$aluno->getMatricula()?></h4>
	                	<h4><?=$aluno->getMotivo()?></h4>
	                	<h4><?=$aluno->getData()?></h4>
	                	<h4><?=$aluno->getHora()?></h4>


	              	<?php



	                	}
	                ?>
			
		</body>
	</html>