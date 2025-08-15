<?php
session_start();

include('config/conexao.php');

$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario');
if($btnCadUsuario){
	
    $nome = $_POST['nome'];
    $usuario = addslashes(strtolower($_POST['usuario']));
    $senha = $_POST['senha'];

    
    $link = mysqli_query($conn, "SELECT usuario FROM usuarios WHERE usuario = '$usuario'");
    
    $array = mysqli_fetch_array($link);
    
    $usuarioarray = $array['usuario'];
    

    
    if($usuarioarray == $usuario){
		
		$_SESSION['success'] = "<div class='alert alert-danger alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> LOGIN JA CADASTRADO &nbsp; <i class='fas fa-grin-squint-tears fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                            </div>";
     header('Location: cadastrar_usuario.php');	
	 

    
    }else{
		
        $cadastro = mysqli_query($conn, "INSERT INTO usuarios (nome, usuario, senha) 
VALUES ('$nome', '$usuario', md5('$senha'))");
        
//Possivel localização do erro

        if($cadastro){
            $_SESSION['success'] = "<div class='alert alert-success alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> CHAMADO CADASTRADO COM SUCESSO &nbsp; <i class='far fa-smile-wink fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                        </div>";
     header('Location: cadastrar_usuario.php');	
	 
        } else{
            echo
            "
                <script type='text/javascript'>
                alert('erro ao se cadastrar, tente novamente mais tarde');
                window.location.href = '';
            </script>
            ";
        }
    }
}
?>