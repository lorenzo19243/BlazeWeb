<?php

function seguranca_adm(){

	if(empty($_SESSION['usuarioToken'] )){		
		$_SESSION['tokenEspirado'] = "Realize Seu Login!";
		echo "<script>alert('Area Restrita Faça Seu Login!'); location.href='login'</script>";
	}
	
}



