<?php
	include_once("controller/LoginController.class.php");	
	
	LoginController::verificaSeUsuarioJaFezLogin();
	
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