<?php
session_start();

include('config/conexao.php');
//include_once("config/seguranca.php");
//seguranca_adm();
date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
$dataLocal = date('d/m/Y H:i:s', time());

$id_cliente = mysqli_real_escape_string($conn, $_POST['id']);
$tecnico =  implode(" E ",$_REQUEST['tecnico']);
$veiculo = mysqli_real_escape_string($conn, $_POST['veiculo']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$rede = mysqli_real_escape_string($conn, $_POST['rede']);
$redesenha = mysqli_real_escape_string($conn, $_POST['redesenha']);
$conclusao = mysqli_real_escape_string($conn, $_POST['conclusao']);
$sinal = mysqli_real_escape_string($conn, $_POST['sinal']);
$cabo_drop = mysqli_real_escape_string($conn, $_POST['cabo_drop']);
$conector = mysqli_real_escape_string($conn, $_POST['conector']);
$buxa_parafuso = mysqli_real_escape_string($conn, $_POST['buxa_parafuso']);
$esticador = mysqli_real_escape_string($conn, $_POST['esticador']);
$repetidor = mysqli_real_escape_string($conn, $_POST['repetidor']);
$remoto = mysqli_real_escape_string($conn, $_POST['remoto']);
$concluido = mysqli_real_escape_string($conn, $_POST['concluido']);
$tempo = mysqli_real_escape_string($conn, $_POST['tempo']);
$alterado_por = $_SESSION['usuarioNome'];

$ultima_alteracao = date('Y-m-d H:i:s');
$data_fim = date('Y-m-d');


$altera_cliente = "UPDATE mudanca SET tecnico='$tecnico', veiculo='$veiculo', alterado_por='$alterado_por', ultima_alteracao='$ultima_alteracao', status='$status',  rede='$rede', redesenha='$redesenha', conclusao='$conclusao', sinal='$sinal', cabo_drop='$cabo_drop', conector='$conector', buxa_parafuso='$buxa_parafuso', esticador='$esticador', remoto='$remoto', repetidor='$repetidor', concluido='$concluido', data_fim='$data_fim', tempo='$tempo'  WHERE id_cliente='$id_cliente'";
$resposta = mysqli_query($conn, $altera_cliente);

if($resposta){
    //$_SESSION['success'] = "<div class='danger' role='alert' id='sumirDiv'><center>Área Restrita - Realize Login</center></div>";
    $_SESSION['success'] = "<div class='alert alert-success alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> STATUS ALTERADO COM SUCESSO &nbsp; <i class='far fa-smile-wink fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                        </div>";
    header('Location: mudancas');
}else{
    $_SESSION['error'] = "<div class='alert alert-danger alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> NÃO FOI POSSÍVEL EDITAR O CLIENTE &nbsp; <i class='fas fa-grin-squint-tears fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                            </div>";
     header('Location: mudancas');
    
}

?>