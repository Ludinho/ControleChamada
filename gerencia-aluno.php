<?php
	include_once("controller/AlunoController.class.php");
	include_once("controller/LoginController.class.php");
	
	
	$controle = new AlunoController();
	LoginController::verificaSeUsuarioJaFezLogin();
	
	if (isset($_POST['operacao'])){
		$operacao = $_POST['operacao'];
		switch ($operacao) { // Caso
			case 'salvarAluno':
				$mensagem = $controle->salvarAluno($_POST);
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
		<link rel="stylesheet" href="datatables/datatables.min.css" /> 
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
				<a type="" class="btn btn-success float-right" data-toggle="modal" data-target="#modalCadastroAluno">

							Cadastrar Aluno
							</a>

	                <table class="table table-hover table-dark" id="tabela_registro">
					  <thead>
					    <tr>
					      <th scope="col">Nome</th>
					      <th scope="col">Matricula</th>
					      <th scope="col">Turma</th>
					      <th scope="col">Opções</th>
					    </tr>
					  </thead>
					  <tbody>
		                <?php
		                	$listaDeAlunos = $controle->buscarAlunos();

		                	foreach ($listaDeAlunos as $aluno){
		                ?>
							    <tr>
							      
							      <td><?=$aluno->getNome()?></td>
							      <td><?=$aluno->getMatricula()?></td>
							      <td><?=$aluno->getTurma()?></td>
							      <td>
							      	<a href="gerencia-aluno.php?op=excluir&mat=<?=$aluno->getMatricula()?>">Excluir</a>
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
		<!-- Primeira Modal -->
		<div class="modal fade" id="modalCadastroAluno" tabindex="-1" role="dialog" aria-labelledby="modalCadastroAlunoTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
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
							<label for="cnome">Turma:</label>
						<input type="text" name="cturma" id="cturma" placeholder="Digite a turma" class="form-control"/>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							<button type="submit" class="btn btn-primary" name="operacao" value="salvarAluno">Salvar Dados</button>
						</div>
					</div>
				</form>
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