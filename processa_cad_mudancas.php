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
$tecnico = mysqli_real_escape_string($conn, $_POST['tecnico']);
$veiculo = mysqli_real_escape_string($conn, $_POST['veiculo']);
$rua = mysqli_real_escape_string($conn, $_POST['rua']);
$rua2 = mysqli_real_escape_string($conn, $_POST['rua2']);
$numero = mysqli_real_escape_string($conn, $_POST['numero']);
$numero2 = mysqli_real_escape_string($conn, $_POST['numero2']);
$bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
$bairro2 = mysqli_real_escape_string($conn, $_POST['bairro2']);
$criado_por = $_SESSION['usuarioNome'];
$status = mysqli_real_escape_string($conn, $_POST['status']);
$plano = mysqli_real_escape_string($conn, $_POST['plano']);
$pppoe = mysqli_real_escape_string($conn, $_POST['pppoe']);
$rede = mysqli_real_escape_string($conn, $_POST['rede']);
$redesenha = mysqli_real_escape_string($conn, $_POST['redesenha']);
$concluido = 'NAO';
$data_cadastro = date('Y-m-d H:i:s');
$agendado = mysqli_real_escape_string($conn, $_POST['agendado']);



$altera_cliente = "INSERT INTO `mudanca`(`nome`, `observacao`, `rua`, `rua2`, `numero`, `numero2`, `bairro`, `bairro2`, `plano`, `criado_por`, `alterado_por`, `status`, `veiculo`, `tecnico`, `concluido`, `data_cadastro`, `ultima_alteracao`, `data_fim`, `agendado`, rede, redesenha, `pppoe`) VALUES ('$nome','$observacao','$rua','$rua2','$numero','$numero2','$bairro','$bairro2','$plano','$criado_por','$alterado_por','$status','$veiculo','$tecnico','$concluido','$data_cadastro','$ultima_alteracao','$data_fim','$agendado', '$rede', '$redesenha', '$pppoe' )";
$resposta = mysqli_query($conn, $altera_cliente);

if($resposta){
    //$_SESSION['success'] = "<div class='danger' role='alert' id='sumirDiv'><center>Área Restrita - Realize Login</center></div>";
    $_SESSION['success'] = "<div class='alert alert-success alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> MUDANÇA AGENDADA COM SUCESSO &nbsp; <i class='far fa-smile-wink fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                        </div>";
    header('Location: mudancas');
}else{
    $_SESSION['error'] = "<div class='alert alert-danger alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> NÃO FOI POSSÍVEL AGENDAR &nbsp; <i class='fas fa-grin-squint-tears fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                            </div>";
     header('Location: mudancas');
    
}


?>
