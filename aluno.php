<?php

	$log = $_POST['login'];
	$sen = $_POST['senha'];
	$redirect = "index.html";
	$redirect1 = "formulario.html";
	
	if ($log == "aluno1" && $sen == "lagrimas"){
		//redirecionar para index .html
		header("location:$redirect");
	}
	else{
		header("location:$redirect1"."?erro=$msg");
	}

?>