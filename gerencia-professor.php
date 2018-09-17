<?php
	include_once("controller/ProfessorController.class.php");
	include_once("controller/LoginController.class.php");
	
	
	$controle = new ProfessorController();
	LoginController::verificaSeUsuarioJaFezLogin();

	if (isset($_POST['operacao'])){
		$operacao = $_POST['operacao'];
		
		switch ($operacao) { // Caso
			
			case 'salvarProfessor':
				$mensagem = $controle->salvarProfessor($_POST);
			break;
		}
	}

	if (isset($_GET['mat'])){
		$mat=$_GET['mat'];
		$controle -> excluir($mat);
	}
	
	

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>..:: Admin WBS ::..</title>
		
		<!--  Nucleo do jquery -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/estile.css"/>
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

		                <!-- Button trigger modal -->
						<a type="" class="btn btn-dark float-right" data-toggle="modal" data-target="#modalCadastroProfessor">

						Cadastrar Professor
						</a>
		                <table class="table table-hover table-dark">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Nome</th>
						      <th scope="col">Matricula</th>
						      <th scope="col">Turma</th>
						      <th scope="col">Opções</th>
						    </tr>
						  </thead>
						  <tbody>
			                <?php
			                	$listaDeProfessores = $controle->buscarProfessores();

			                	foreach ($listaDeProfessores as $professor){
			                ?>
								    <tr>
								      <th scope="row">1</th>
								      <td><?=$professor->getNome()?></td>
								      <td><?=$professor->getDisciplina()?></td>
								      <td><?=$professor->getCodigo()?></td>
								      <td>
								      	<a href="gerencia-professor.php?op=excluir&mat=<?=$professor->getCodigo()?>">Excluir</a>
								      	</td>

								    </tr>
			              	<?php
			                	}
			                ?>
		                  </tbody>
						</table>
		            </div>
		        </div>
		        <!-- /#page-content-wrapper -->
	   		</div>
			<footer class="footer navbar-bottom">
				Escola Estadual Waldemir Barros da Silva <br />
				Endereço: R. Palmácia - Moreninha II, Campo Grande - MS, 79065-140 </br>
				Telefone:(67) 3314-9014
			</footer>	
			<!-- END: footer -->
		</div>
		

		<!-- Segunda Modal -->
		<div class="modal fade" id="modalCadastroProfessor" tabindex="-1" role="dialog" aria-labelledby="modalCadastroProfessorTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="POST">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Cadastro de Professor</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<label for="cnomep">Nome:</label>
						<input type="text" name="cnomep" id="cnomep" placeholder="Digite o seu nome" class="form-control"/>
							<label for="cdisciplina">disciplina:</label>
						<input type="text" name="cdisciplina" id="cdisciplina" placeholder="Digite a sua disciplina" class="form-control"/>
							<label for="cdisciplina">Codigo:</label>
						<input type="text" name="ccodigo" id="ccodigo" placeholder="Digite o codigo do professor" class="form-control"/>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							<button type="submit" class="btn btn-primary" name="operacao" value="salvarProfessor">Salvar Dados</button>
						</div>
					</div>
				</form>
			</div>
		</div>




		<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script> 
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>

		<script>
		    $("#menu-toggle").click(function(e) {
		        e.preventDefault();
		        $("#wrapper").toggleClass("toggled");
		    });
		</script>
	</body>
</html>