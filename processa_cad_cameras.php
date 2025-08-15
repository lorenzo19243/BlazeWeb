<?php
session_start();

include('config/conexao.php');
//include_once("config/seguranca.php");
//seguranca_adm();
date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
$dataLocal = date('d/m/Y H:i:s', time());

$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$situacao = mysqli_real_escape_string($conn, $_POST['situacao']);
$observacao = mysqli_real_escape_string($conn, $_POST['observacao']);
$atendente = mysqli_real_escape_string($conn, $_POST['atendente']);
$tecnico = mysqli_real_escape_string($conn, $_POST['tecnico']);
$rua = mysqli_real_escape_string($conn, $_POST['rua']);
$numero = mysqli_real_escape_string($conn, $_POST['numero']);
$bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
$criado_por = $_SESSION['usuarioNome'];
$status = mysqli_real_escape_string($conn, $_POST['status']);
$sinal = mysqli_real_escape_string($conn, $_POST['sinal']);
$pppoe = mysqli_real_escape_string($conn, $_POST['pppoe']);
$plano = mysqli_real_escape_string($conn, $_POST['plano']);
$rede = mysqli_real_escape_string($conn, $_POST['rede']);
$redesenha = mysqli_real_escape_string($conn, $_POST['redesenha']);
$concluido = 'NAO';
$data_cadastro = date('Y-m-d H:i:s');
$agendado = mysqli_real_escape_string($conn, $_POST['agendado']);

    $link = mysqli_query($conn, "SELECT nome FROM cameras WHERE nome = '$nome' AND  STATUS='A LANÇAR'");
    
    $array = mysqli_fetch_array($link);
    
    $nomearray = $array['nome'];
    

    
    if($nomearray == $nome){
		
		$_SESSION['success'] = "<div class='alert alert-danger alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> CLIENTE JA CADASTRADO &nbsp; <i class='fas fa-grin-squint-tears fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                            </div>";
     header('Location: listar_cameras.php');	
	 

    
    }else{


$altera_cliente = "INSERT INTO cameras (nome, situacao, observacao, atendente, tecnico, rua, numero, bairro, data_cadastro, criado_por, status, sinal, pppoe, plano, rede, redesenha, concluido, agendado) 
VALUES ('$nome', '$situacao', '$observacao', '$atendente', '$tecnico', '$rua', '$numero', '$bairro', '$data_cadastro', '$criado_por', '$status', '$sinal', '$pppoe', '$plano', '$rede', '$redesenha', '$concluido' , '$agendado')";
$resposta = mysqli_query($conn, $altera_cliente);

if($resposta){
    //$_SESSION['success'] = "<div class='danger' role='alert' id='sumirDiv'><center>Área Restrita - Realize Login</center></div>";
    $_SESSION['success'] = "<div class='alert alert-success alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> REPARO AGENDADO COM SUCESSO &nbsp; <i class='far fa-smile-wink fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                        </div>";
    header('Location: listar_cameras.php');
}else{
    $_SESSION['error'] = "<div class='alert alert-danger alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> NÃO FOI POSSÍVEL AGENDAR &nbsp; <i class='fas fa-grin-squint-tears fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                            </div>";
     header('Location: listar_cameras.php');
    
}
}

?>
