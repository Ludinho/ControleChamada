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
			<!-- Modal -->
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Cadastro</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<label for="login">Nome:</label>
						<input type="text" name="nome" id="nome" placeholder="Digite o nome" class="form-control"/>
							<label for="login">Turma:</label>
						<input type="text" name="nome" id="nome" placeholder="Digite a serie" class="form-control"/>

						</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary">Salvar Dados</button>
					</div>
					</div>
				</div>
			</div>
			<div id="wrapper">

	        <!-- Sidebar -->
	        <div id="sidebar-wrapper">
	            <ul class="sidebar-nav">
	                <li>
	                    <a href="#">Professores</a>
	                </li>
	                <li>
	                    <!-- Button trigger modal -->
						<a type="" class="" data-toggle="modal" data-target="#exampleModalCenter">
						Cadastrar Aluno
						</a>
	                </li>
	                <li>
	                    <!-- Button trigger modal -->
						<a type="" class="" data-toggle="modal" data-target="#exampleModalCenter">
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
	                    <a href="#">Sair</a>
	                </li>
	            </ul>
	        </div>
	        <!-- /#sidebar-wrapper -->

	        <!-- Page Content -->
	        <div id="page-content-wrapper">
	            <div class="container-fluid">
	                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
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