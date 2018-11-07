<?php
	include_once("controller/SaidaController.class.php");
	include_once("controller/LoginController.class.php");

	$controle = new SaidaController();
	LoginController::verificaSeUsuarioJaFezLogin();
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
			<link rel="stylesheet" href="datatables/datatables.min.css" /> 
			<link rel="stylesheet" href="css/estile.css"/>
			<title>Visualização de alunos</title>
		</head>
		<body>
			<div class="container-fluid">
			
			<div id="wrapper">

	        <?php
				include_once("includes/menu-lateral.php");
			?>
	        

	        <!-- Page Content -->
	        <div id="page-content-wrapper">
	            <div class="container-fluid">
	                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle"></a>

	                Bem vindo <?=$_SESSION['usuario']?>

						<h2>Anotações</h2>
						<table class="table table-hover table-dark" id="tabela_registro">
							<thead>
								<tr>
									<th scope="col">Matricula</th>
									<th scope="col">Hora</th>
									<th scope="col">Data</th>
									<th scope="col">Motivo</th>
								</tr>
							</thead>
							<tbody>
								<?php

									$listaDeAlunos = $controle->buscarRegistros();

									foreach ($listaDeAlunos as $aluno){

								?>

								<tr>

									<td><?=$aluno->getMatriculaAluno()?></td>
									<td><?=$aluno->getHora()?></td>
									<td><?=$aluno->getData()?></td>
									<td><?=$aluno->getMotivo()?></td>

								</tr>
								
								<?php

								}

								?>

							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
				<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script> 
				<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
				<script type="text/javascript" src="datatables/datatables.min.js"></script>
				<script type="text/javascript" src="js/main.js"></script>

				<script>
				$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
				});
				</script>
		</body>
	</html>