<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
include('config/conexao.php');
//include_once("config/seguranca.php");
//seguranca_adm();
date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
$dataLocal = date('d/m/Y H:i:s', time());

$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$observacao = mysqli_real_escape_string($conn, $_POST['observacao']);
$rua = mysqli_real_escape_string($conn, $_POST['rua']);
$numero = mysqli_real_escape_string($conn, $_POST['numero']);
$bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
$criado_por = $_SESSION['usuarioNome'];
$status = mysqli_real_escape_string($conn, $_POST['status']);
$plano = mysqli_real_escape_string($conn, $_POST['plano']);
$concluido = 'NAO';
$data_cadastro = date('Y-m-d H:i:s');
$agendado = mysqli_real_escape_string($conn, $_POST['agendado']);

   
    $link = mysqli_query($conn, "SELECT nome FROM recolhas WHERE nome = '$nome' AND  STATUS in ('A LANÇAR','<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>','<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>') ");
    
    $array = mysqli_fetch_array($link);
    
    $nomearray = $array['nome'];
    

    
    if($nomearray == $nome){
		
		$_SESSION['success'] = "<div class='alert alert-danger alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> RECOLHA JA CADASTRADA &nbsp; <i class='fas fa-grin-squint-tears fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                            </div>";
     header('Location: recolhas');	
	 

    
    }else{



$altera_cliente = "INSERT INTO `recolhas`(`nome`, `observacao`, `rua`, `numero`, `bairro`, `plano`, `criado_por`, `alterado_por`, `status`, `veiculo`, `tecnico`, `concluido`, `data_cadastro`, `ultima_alteracao`, `data_fim`, `agendado`) VALUES  ('$nome','$observacao','$rua','$numero','$bairro','$plano','$criado_por','$alterado_por','$status','$veiculo','$tecnico','$concluido','$data_cadastro','$ultima_alteracao','$data_fim','$agendado')";
$resposta = mysqli_query($conn, $altera_cliente);

if($resposta){
    //$_SESSION['success'] = "<div class='danger' role='alert' id='sumirDiv'><center>Área Restrita - Realize Login</center></div>";
    $_SESSION['success'] = "<div class='alert alert-success alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> RECOLHA AGENDADA COM SUCESSO &nbsp; <i class='far fa-smile-wink fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                        </div>";
    header('Location: recolhas');
}else{
    $_SESSION['error'] = "<div class='alert alert-danger alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> NÃO FOI POSSÍVEL AGENDAR &nbsp; <i class='fas fa-grin-squint-tears fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                            </div>";
     header('Location: recolhas');
    
}
}
?>
