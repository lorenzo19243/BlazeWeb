<?php
	$servidor = "localhost";
	$usuario = "u310272217_hbweb";
	//$senha = "@Adminbinho2012";//AMBIENTE DE PRODUÇÃO
	$senha = "@Adminbinho2012";//AMBIENTE DE DESENVOLVIMENTO
	$dbname = "u310272217_app_xgs";
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	if(!$conn){
		echo "ERROR: 1";
	}else{
			//echo "Conexao realizada com sucesso";
	}
	
	?>
