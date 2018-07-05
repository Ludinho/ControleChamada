<?php
	include_once("controller/IndexController.class.php");
	include_once("controller/LoginController.class.php");
	
	$controle = new IndexController();
	
	LoginController::verificaSeUsuarioJaFezLogin();

	if (isset($_POST['operacao'])) {
		$operacao = $_POST['operacao'];

		switch ($operacao) { // Caso
			case 'salvarAluno':
				$mensagem = $controle->salvarAluno($_POST);
			break;
			case 'salvarProfessor':
				$mensagem = $controle->salvarProfessor($_POST);
			break;
		}
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

	        <!-- Sidebar -->
	        <div id="sidebar-wrapper">
	            <ul class="sidebar-nav">
	                <li>
	                    <a href="prof.php">Professores</a>
	                </li>
	                <li>
	                    <!-- Button trigger modal -->

						<a type="" class="" data-toggle="modal" data-target="#modalCadastroAluno">
						Cadastrar Aluno
						</a>
	                </li>
	                <li>
	                    <!-- Button trigger modal -->
						<a type="" class="" data-toggle="modal" data-target="#modalCadastroProfessor">

						Cadastrar Professor
						</a>
	                </li>
	                <li class="nav-item dropdown">
				      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				        Tabelas
				      </a>
				      <div class="dropdown-menu btn-dark">
				        <a class="dropdown-item" href="segunda.html">Segunda</a>
				        <a class="dropdown-item" href="terca.html">Terça</a>
				        <a class="dropdown-item" href="quarta.html">Quarta</a>
				        <a class="dropdown-item" href="quinta.html">Quinta</a>
				        <a class="dropdown-item" href="sexta.html">Sexta</a>
				      </div>
				    </li>
	                <li>
	                    <a href="sair.php">Sair</a>
	                </li>
	            </ul>
	        </div>
	        <!-- /#sidebar-wrapper -->

	        <!-- Page Content -->
	        <div id="page-content-wrapper">
	            <div class="container-fluid">
	                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
	                Bem vindo <?=$_SESSION['usuario']?>
	                <?php
	                	$listaDeAlunos = $controle->buscarAlunos();
	                	
	                	foreach ($listaDeAlunos as $aluno){
	                		
	                ?>
	                	<h3><?=$aluno->getNome()?></h3>


	              	<?php



	                	}
	                ?>
	            </div>
	        </div>
	        <!-- /#page-content-wrapper -->

	   		</div>
			<footer class="footer navbar-fixed-bottom">
				Escola Estadual Waldemir Barros da Silva <br />
				Endereço: R. Palmácia - Moreninha II, Campo Grande - MS, 79065-140 </br>
				Telefone:(67) 3314-9014
			</footer>	
			<!-- END: footer -->
		</div>
		<!-- Primeira Modal -->
			<div class="modal fade" id="modalCadastroAluno" tabindex="-1" role="dialog" aria-labelledby="modalCadastroAlunoTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<form method="POST">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Cadastro de aluno</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<label for="cnome">Nome:</label>
							<input type="text" name="cnome" id="cnome" placeholder="Digite o seu nome" class="form-control"/>
								<label for="cmatricula">Matrícula:</label>
							<input type="text" name="cmatricula" id="cmatricula" placeholder="Digite a sua matrícula (código do aluno)" class="form-control"/>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								<button type="submit" class="btn btn-primary" name="operacao" value="salvarAluno">Salvar Dados</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		<!-- Segunda Modal -->
			<div class="modal fade" id="modalCadastroProfessor" tabindex="-1" role="dialog" aria-labelledby="modalCadastroProfessorTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
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