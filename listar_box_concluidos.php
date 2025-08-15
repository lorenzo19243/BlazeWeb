<?php
session_start();
include_once('assets/cabecalho.php');
include_once('assets/rodape.php');
include('config/conexao.php');
include_once("config/seguranca.php");
seguranca_adm();
$consulta = "SELECT * FROM tvbox_chamados WHERE concluido = 'SIM' ORDER BY ultima_alteracao DESC ; ";
$resultado = mysqli_query($conn, $consulta);
date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
$dataLocal = date('d/m/Y H:i:s', time());

// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
?>
<?php include_once('assets/menu.php'); ?>
<?php
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
?>
<div class="navbar-collapse offcanvas-collapse bg-warning" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <br>
            <br>
            <br>
            <br>
        </ul>
      </div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 bg-warning justify-content-between p-3"> 
    <a class="btn btn-dark position-relative"  href="listar_box.php">CHAMADOS <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
</svg></a> <a class="btn btn-dark position-relative"  href="listar_box_concluidos.php">CONCLUIDOS <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
  <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
  <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
</svg></a>
      <button type="button" class="btn btn-dark position-relative" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#cadCliente">NOVO CHAMADO <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
  <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5"/>
  <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
</svg></button>
    </div>
    <div class="col-md-4 bg-warning justify-content-between p-3 ">
      <form class="row g-5" method="POST" action="pesquisar.php">
          <input type="text" class="form-control" name="pesquisar" id="pesquisar" placeholder="PESQUISAR CLIENTES POR NOME" >
        </div>
        <div class="col-md-2 bg-warning justify-content-between p-3">
          <button type="submit" class="btn btn-primary mb-3">PESQUISAR</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container-sm">
  <div class="modal-content border-0">
    <div class="badge  text-wrap">
      <div class="col-md-auto">
        <h5><small class="text-muted">
          <?php
	 
	$_SESSION["usuarioNome"]; 
    $data = date('D');
    $mes = date('M');
    $dia = date('d');
    $ano = date('Y');
    
    $semana = array(
        'Sun' => 'Domingo', 
        'Mon' => 'Segunda-Feira',
        'Tue' => 'Terça-Feira',
        'Wed' => 'Quarta-Feira',
        'Thu' => 'Quinta-Feira',
        'Fri' => 'Sexta-Feira',
        'Sat' => 'Sabado'
    );
    
    $mes_extenso = array(
        'Jan' => 'Janeiro',
        'Feb' => 'Fevereiro',
        'Mar' => 'Março',
        'Apr' => 'Abril',
        'May' => 'Maio',
        'Jun' => 'Junho',
        'Jul' => 'Julho',
        'Aug' => 'Agosto',
        'Nov' => 'Novembro',
        'Sep' => 'Setembro',
        'Oct' => 'Outubro',
        'Dec' => 'Dezembro'
    );
    
    echo 'Olá ','<strong>', $_SESSION["usuarioNome"],'</strong>', ' Hoje é ', $semana["$data"] .  ", dia {$dia} de " . $mes_extenso["$mes"] . " de {$ano}"; ?>
          </small></h5>
                 <a class="btn btn-primary btn-sm" href="listar_chamados.php">
        <?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>
        REPARO <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
  <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
</svg></a> 
        
        <a class="btn btn-primary btn-sm" href="listar_instalacoes.php">
        <?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>
        INSTALAÇAO <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
  <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
</svg> </a> <a class="btn btn-primary btn-sm" href="listar_mudancas.php">
        <?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>
        MUDANÇA <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
  <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
</svg></a> <a class="btn btn-primary btn-sm" href="listar_recolhas.php">
        <?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>
        RECOLHA <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
  <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
</svg></a> 
        <a class="btn btn-primary btn-sm" href="listar_box.php">
        <?php $clientes = mysqli_query($conn,'SELECT * FROM tvbox_chamados WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>
        TV-BOX <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
  <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
</svg></a>
        
        <a class="btn btn-primary btn-sm" href="listar_cameras.php">
        <?php $clientes = mysqli_query($conn,'SELECT * FROM cameras WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>
        CÂMERA <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
  <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
</svg></a> 
        
        </div>
    </div>
    <div class="modal-content border-0">
      <div class="row">
        <div class="col"></div>
        <div class="col">
          <div class="col-md-auto" style="text-align:center">
            <?php $clientes = mysqli_query($conn,'SELECT * FROM tvbox_chamados WHERE  concluido="SIM" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("<small class='text-muted'>CONCLUIMOS <strong>%d</strong> CHAMADOS</small>", $row_cnt); ?>
          </div>
        </div>
        <div class="col"></div>
      </div>
    </div>
  </div>
</div>
<div class="table-responsive-sm">
<table class="table" style="font-size: 12px; border:none">
<thead class="bg-dark text text-white">
  <tr>
    <th scope="col" style="border:none"> OS.</th>
    <th scope="col" style="border:none">CLIENTE</th>
    <th scope="col" style="border:none">SITUAÇÃO</th>
    <th scope="col" style="border:none">ATENDENTE</th>
    <th scope="col" style="border:none">STATUS</th>
    <th scope="col" style="border:none">TECNICO</th>
    <th scope="col" style="border:none">VEICULO</th>
    <th scope="col" style="border:none">DATA</th>
    <th scope="col" class="text text-center" colspan="4" style="border:none">AÇÕES</th>
  </tr>
</thead>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
function showReport(){
include('config/conexao.php');
    $r = mysqli_query($conn,'SELECT DISTINCT data_fim FROM tvbox_chamados WHERE concluido ="SIM"  ORDER BY data_fim DESC'); 
    echo '<tbody>';
	
    if($r >= null){ 
	    
        while($reg = mysqli_fetch_assoc($r)){
            echo '';
            echo ''; 			
			echo '<tr class="bg-danger text text-white" style="border:none">
                <td style="border:none"></td>
                <td style="border:none"><strong> DIA ',  date('d/m/Y', strtotime($reg['data_fim'])); 
				$clientes = mysqli_query($conn,'SELECT * FROM tvbox_chamados WHERE data_fim = "'. $reg['data_fim'] .'" and concluido="SIM" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf(" - %d REPAROS CONCLUIDOS.</strong>\n", $row_cnt);
  			
            $clientes = mysqli_query($conn,'SELECT * FROM tvbox_chamados WHERE data_fim = "'. $reg['data_fim'] .'" and concluido="SIM" ORDER BY ultima_alteracao DESC;');
			
            if($clientes != null){
                echo '</td>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none"></td>         

<td style="border:none"></td>
<td style="border:none"></td>
<td style="border:none"></td>



                </td>

            </tr>';
                while($cliente = mysqli_fetch_assoc($clientes)){
					$id_tvbox = $cliente['id_tvbox'];
					$situacao = $cliente['situacao'];
					$criado_por = $cliente['criado_por'];
					$status = $cliente['status'];
					$pppoe = $cliente['pppoe'];
					$rede = $cliente['rede'];
					$redesenha = $cliente['redesenha'];
					$tecnico = $cliente['tecnico'];
					$veiculo = $cliente['veiculo'];
					$tempo = $cliente['tempo'];
					$ultima_alteracao = $cliente['ultima_alteracao'];
                    echo '<tr>
            <td>'.$cliente['id_tvbox'].'</td>
            <td style="font-weight: bold;">'.$cliente['nome'].'</td>
            <td>'.$cliente['situacao'].'</td>
                   <td>'.$cliente['criado_por'].'</td>
                <td>'.$cliente['status'].'</td>
				 <td>'.$cliente['tecnico'].'</td>
	<td>'.$cliente['veiculo'].'</td>
	<td>'.date('d/m/Y - H:i:s', strtotime($cliente['ultima_alteracao'])).'</td><td><button type="button" class="btn btn-primary btn-sm" data-clipboard-text="
*ORDEM DE SERVIÇO Nº '.$cliente['id_tvbox'].' CONCLUIDA*

*TÉCNICO RESPONSAVEL:* '.$cliente['tecnico'].'
*VEÍCULO:* '.$cliente['veiculo'].'

*CLIENTE:* '.$cliente['nome'].'
*PPPOE:* '.$cliente['pppoe'].'
*REDE:* '.$cliente['rede'].'
*SENHA:* '.$cliente['redesenha'].'
*SINAL IXC:* '.$cliente['sinal'].'

*SITUAÇÃO:* '.$cliente['conclusao'].'

*CONCLUIDO:* '.date('d/m/Y - H:i:s', strtotime($cliente['ultima_alteracao'])).'
*TEMPO DE CHAMADO:* '.$cliente['tempo'].'

*BAIXA POR:* '.$_SESSION['usuarioNome'].'

*CLIENTE CONECTADO COM SUCESSO✅*">BAIXA</button></td>
';
                }
                echo '';
            }
            echo '</tbody>';
            echo '';
        }
    }else{
        echo '<tr><td>Não existe pedido na tabela de compras</td></tr>';
    }
    echo '</table>';
;
}

showReport();
?>
</div>
<footer class="bd-footer py-5 mt-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col"> </div>
      <div class="badge  text-wrap">
        <p class="mt-5 mb-1 text-muted">&copy; <?php echo date('d/m/Y') ?></p>
        <p class="mt-1 mb-1 text-muted">HB WEB E CIA - All Rights Reserved</p>
        <p class="mt-1 mb-1 text-muted">Versão 1.0 </p>
      </div>
      <div class="col"> </div>
    </div>
  </div>
</footer>
<!-- ================================== MODAL CADASTRAR CLIENTE----------------------------------------------------------------->
<style>
    .errorInput {
        border: 2px solid red !important;
    }
</style>
<script>
    // ================================ FUNÇÃO PARA MASCARA DE TELEFONE =============================================
    function mask(o, f) {
        setTimeout(function() {
            var v = telefone(o.value);
            if (v != o.value) {
                o.value = v;
            }
        }, 1);
    }

    function telefone(v) {
        var r = v.replace(/\D/g, "");
        r = r.replace(/^0/, ""); //limpa o campo se começar com ZERO (0)
        if (r.length > 10) {
            r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
        } else if (r.length > 5) {
            r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
        } else if (r.length > 2) {
            r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
        } else {
            r = r.replace(/^(\d*)/, "($1");
        }
        return r;
    }

    // ================================ FUNÇÃO PARA MASCARA DE CELULAR =============================================
    function mask(o, f) {
        setTimeout(function() {
            var v = celular(o.value);
            if (v != o.value) {
                o.value = v;
            }
        }, 1);
    }

    function celular(v) {
        var r = v.replace(/\D/g, "");
        r = r.replace(/^0/, ""); //limpa o campo se começar com ZERO (0)
        if (r.length > 10) {
            r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
        } else if (r.length > 5) {
            r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
        } else if (r.length > 2) {
            r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
        } else {
            r = r.replace(/^(\d*)/, "($1");
        }
        return r;
    }

    // ================================ FUNÇÃO PARA MASCARA DE CPF =============================================
    $(document).ready(function() {
        $("#cpf").mask("999.999.999-99");
    });

    // ================================ FUNÇÃO PARA MASCARA DE NASCIMENTO =============================================
    $(document).ready(function() {
        $("#nascimento").mask("99/99/9999");
    });

    // FUNÇÃO PARA ADICONAR ENDEREÇO VIA CEP (https://viacep.com.br/exemplo/javascript/)
    function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('rua').value = ("");
        document.getElementById('bairro').value = ("");
        document.getElementById('numero').value = ("");
        document.getElementById('uf').value = ("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value = (conteudo.rua);
            document.getElementById('bairro').value = (conteudo.bairro);
            document.getElementById('numero').value = (conteudo.numero);
            document.getElementById('uf').value = (conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value = "...";
                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";
                document.getElementById('uf').value = "...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };


    $(document).ready(function() {

        $('#insert_form').on('submit', function(event) {
            event.preventDefault(); //EVITA O SUBMIT DO FORM

            var nome = $('#nome'); // PEGA O CAMPO CLIENTE DO FORM



            var erro = $('.alert-danger'); // PEGA O CAMPO COM A class alert e CRIA A VARIAVEL erro
            var campo = $('#campo-erro'); // CRIA A VARIAVEL PATA EXIBIR O NOME DO CAMPO COM ERROcampo-sucesso


            erro.addClass('d-none');
            $('.is-invalid').removeClass('is-invalid');
            $('.is-valid').removeClass('is-valid');


            if (!nome.val().match(/[A-Za-z\d]/)) {
                erro.removeClass('d-none'); //REMOVE A CLASSE (d-none) DO BOOTSTRAP E EXIBE O ALERTA
                campo.html('cliente'); // ADICIONA AO ALERTA O NOME DO CAMPO NAO PREENCHIDO
                nome.focus(); //COLOCA O CURSOR NO CAMPO COM ERRO
                nome.addClass('is-invalid');



                return false;

            } else {

                var dados = $("#insert_form").serialize();
                $.post("processa_cad_clientes.php", dados, function(retorna) {
                    if (retorna) {
                        //Limpar os campo
                        $('#insert_form')[0].reset();

                        //Fechar a janela modal cadastrar
                        $('#cadCliente').modal('hide');
                        $('#sucessModal').modal('show');

                        setInterval(function() {
                            var redirecionar = "listar_chamados.php";
                            $(window.document.location).attr('href', redirecionar);

                        }, 3000);

                    } else {

                        return false;
                    }

                });

            }

        });

    });
</script> 

<!-- Modal ALERTA DE CADASTRO COM SUCESSO-->
<div class="modal fade" id="sucessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
      </div>
      <div class="modal-body bg-success text text-center text-white"> CLIENTE CADASTRADO COM SUCESSO! </div>
      <div class="modal-footer"> </div>
    </div>
  </div>
</div>
<!-- Modal ALERTA DE CADASTRO NAO REALIZADO-->
<div class="modal fade" id="dangerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
      </div>
      <div class="modal-body bg-danger text text-center text-white"> CLIENTE NÃO CADASTRADO! </div>
      <div class="modal-footer"> </div>
    </div>
  </div>
</div>
<!-- ==================================================MODAL CADASTRO DE CLIENTE ==================================== -->
<div class="modal fade" id="cadCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel">CADASTRAR CHAMADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      
      <!-- ALERTA PARA ERRO DE PREENCHIMENTO DE FORMULARIO -->
      <div class="alert alert-danger d-none fade show m-3" role="alert"> <strong>ERRO!</strong> - <strong>Preencha o campo <span id="campo-erro"></span></strong>! <span id="msg"></span> </div>
      <div class="modal-body">
      <div class="row g-3">
<div class="col-sm-5">
  <div class="input-group">
    <div class="input-group-text">ID LOGIN:</div>
    <input type="text" class="form-control" name="logins" id="logins">
  </div>
</div><div class="col-sm">
  <button class="btn btn-primary mb-3" onClick="processa_box()">PESQUISA</button>
</div>
<div class="col-sm-3">
</div>

<div id="modal-body">  </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- -----------------------------------MODAL VISUALIZAR CLIENTE----------------------------------------------------------------->
<div class="modal fade" id="visulaizarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
      <form>
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <label for="recipient-nome" class="col-form-label">NOME</label>
            <input type="text" class="form-control" id="recipient-nome" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-9 col-sm-12">
            <label for="recipient-situacao" class="col-form-label">SITUACAO</label>
            <input type="text" class="form-control" id="recipient-situacao" disabled>
          </div>
          <div class="col-md-3 col-sm-12"> </div>
        </div>
        <div class="row">
          <div class="col-md-5 col-sm-12">
            <label for="recipient-bairro" class="col-form-label">BAIRRO</label>
            <input type="text" name="bairro" id="recipient-bairro" maxlength="50" class="form-control" disabled>
          </div>
          <div class="col-md-5 col-sm-12">
            <label for="recipient-rua" class="col-form-label">RUA</label>
            <input type="text" name="rua" id="recipient-rua" maxlength="50" class="form-control -10" disabled>
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-numero" class="col-form-label">NUMERO</label>
            <input type="text" name="numero" id="recipient-numero" maxlength="50" class="form-control" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <label for="recipient-tecnico" class="col-form-label">TECNICO</label>
            <input type="text" name="tecnico" id="recipient-tecnico" maxlength="50" class="form-control" disabled>
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-veiculo" class="col-form-label">VEICULO</label>
            <input type="text" name="veiculo" id="recipient-veiculo" maxlength="50" class="form-control -10" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <label for="recipient-operador" class="col-form-label cli">CADASTRADO POR</label>
            <input type="text" name="operador" id="recipient-operador" maxlength="50" class="form-control" disabled>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-dataCadastro" class="col-form-label">DATA DO CADASTRO</label>
            <input type="text" class="form-control" id="recipient-dataCadastro" disabled>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-status" class="col-form-label">STATUS</label>
            <input type="text" name="status" id="recipient-status" maxlength="50" class="form-control" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <label for="recipient-alterado_por" class="col-form-label cli">ALTERADO POR</label>
            <input type="text" name="alterado_por" id="recipient-alterado_por" maxlength="50" class="form-control" disabled>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-ultima_alteracao" class="col-form-label">ÚLTIMA ALTERAÇÃO</label>
            <input type="text" class="form-control" name="ultima_alteracao" id="recipient-ultima_alteracao" disabled>
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- -----------------------------------SCRIPT MODAL VISUALIZAR CLIENTE-----------------------------------------------------------------> 
<script type="text/javascript">
    $('#visulaizarCliente').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Botão que acionou o modal
        var recipient = button.data('whatever')
        var recipientnome = button.data('whatevernome')
        var recipientsituacao = button.data('whateversituacao')
		var recipientatendente = button.data('whateveratendente')
		var recipientstatus = button.data('whateverstatus')
		var recipientrua = button.data('whateverrua')
		var recipientbairro = button.data('whateverbairro')
		var recipientnumero = button.data('whatevernumero')
		var recipienttecnico = button.data('whatevertecnico')
		var recipientveiculo = button.data('whateverveiculo')
        var recipientoperador = button.data('whateveroperador')
        var recipientsituacao = button.data('whateversituacao')
        var recipientdataCadastro = button.data('whateverdata-cadastro')
        var recipientalterado_por = button.data('whateveralterado_por')
        var recipientultima_alteracao = button.data('whateverultima_alteracao')

        var modal = $(this)
        modal.find('.modal-title').text('VISUALIZAR CLIENTE CÓDIGO: ' + recipient)
        modal.find('#id').val(recipient)
        modal.find('#recipient-nome').val(recipientnome)
		modal.find('#recipient-situacao').val(recipientsituacao)
		modal.find('#recipient-atendente').val(recipientatendente)
		modal.find('#recipient-status').val(recipientstatus)
		modal.find('#recipient-rua').val(recipientrua)
		modal.find('#recipient-bairro').val(recipientbairro)
		modal.find('#recipient-numero').val(recipientnumero)
		modal.find('#recipient-tecnico').val(recipienttecnico)
		modal.find('#recipient-veiculo').val(recipientveiculo)
		modal.find('#recipient-operador').val(recipientoperador)
        modal.find('#recipient-dataCadastro').val(recipientdataCadastro)
        modal.find('#recipient-alterado_por').val(recipientalterado_por)
        modal.find('#recipient-ultima_alteracao').val(recipientultima_alteracao)

    })
</script> 

<!-- -----------------------------------MODAL EDITAR CLIENTE----------------------------------------------------------------->

<div class="modal fade" id="editarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">New message</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>
    <div class="modal-body">
      <form method="POST" action="processa_edit_clientes.php" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-10 col-sm-12">
            <label for="recipient-tecnico" class="col-form-label">TECNICOS</label>
            <input type="text" name="tecnico" id="recipient-tecnico" maxlength="50" class="form-control">
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-veiculo" class="col-form-label">VEICULO</label>
            <select class="form-control form-select-lg mb-5 select2" name="veiculo" id="veiculo" aria-label=".form-select-lg example">
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="S10">S10</option>
              <option value="YBR">YBR</option>
              <option value="BIZ">BIZ</option>
              <option value="POP">POP</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <label for="recipient-operador" class="col-form-label cli">Cadastrado por</label>
            <input type="text" name="operador" id="recipient-operador" maxlength="50" class="form-control" disabled>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-dataCadastro" class="col-form-label">Data do cadastro</label>
            <input type="text" class="form-control" id="recipient-dataCadastro" disabled>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-status" class="col-form-label">Situação</label>
            <select class="form-control form-select-lg mb-5 select2" name="status" id="status" aria-label=".form-select-lg example">
              <option value="<td bgcolor='#1E90FF'>EM ANDAMENTO</td>">EM ANDAMENTO</option>
              <option value="<td bgcolor='#fc7f03'>REMARCAR</td>">REMARCAR</option>
              <option value="<td bgcolor='#00CC66'>CONCLUIDO</td>">CONCLUIDO</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <label for="recipient-operador" class="col-form-label cli">Alterado por</label>
            <input type="text" name="alterado_por" id="recipient-alterado_por" maxlength="50" class="form-control" disabled value="<?php echo $_SESSION['usuarioNome'] ?>">
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-ultima_alteracao" class="col-form-label">Última Alteração</label>
            <input type="text" class="form-control" name="ultima_alteracao" id="recipient-ultima_alteracao" value="<?php echo date('d/m/Y - H:i:s') ?>" disabled>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-concluido" class="col-form-label">CONCLUIDO</label>
            <select class="form-control form-select-lg mb-5 select2" name="concluido" id="concluido" aria-label=".form-select-lg example">
              <option value="NAO">NAO</option>
              <option value="SIM">SIM</option>
            </select>
          </div>
          <input type="hidden" name="id" class="form-control" id="id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- -----------------------------------SCRIPT MODAL EDITAR CLIENTE-----------------------------------------------------------------> 
<script type="text/javascript">
    $('#editarCliente').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Botão que acionou o modal
        var recipient = button.data('whatever')
        var recipientnome = button.data('whatevernome')
        var recipienttecnico = button.data('whatevertecnico')
        var recipienttelefone = button.data('whatevertelefone')
        var recipientrua = button.data('whateverrua')
        var recipientnumero = button.data('whatevernumero')
        var recipientbairro = button.data('whateverbairro')
        var recipientcomplemento = button.data('whatevercomplemento')
        var recipientcep = button.data('whatevercep')
        var recipientcidade = button.data('whatevercidade')
        var recipientuf = button.data('whateveruf')
        var recipienttelefone = button.data('whatevertelefone')
        var recipientcelular = button.data('whatevercelular')
        var recipientcpf = button.data('whatevercpf')
        var recipientrg = button.data('whateverrg')
        var recipientnascimento = button.data('whatevernascimento')
        var recipientoperador = button.data('whateveroperador')
        var recipientsituacao = button.data('whateversituacao')
		var recipientconcluido = button.data('whateverconcluido')
        var recipientdataCadastro = button.data('whateverdata-cadastro')
        var recipientalterado_por = button.data('whateveralterado_por')
        var recipientultima_alteracao = button.data('whateverultima_alteracao')

        var modal = $(this)
        modal.find('.modal-title').text('EDITAR CLIENTE CÓDIGO: ' + recipient)
        modal.find('#id').val(recipient)
        modal.find('#recipient-nome').val(recipientnome)
		modal.find('#recipient-tecnico').val(recipienttecnico)
        modal.find('#recipient-operador').val(recipientoperador)
        modal.find('#recipient-situacao').val(recipientsituacao)
		modal.find('#recipient-concluido').val(recipientconcluido)
        modal.find('#recipient-dataCadastro').val(recipientdataCadastro)
        modal.find('#recipient-alterado_por').val(recipientalterado_por)
        modal.find('#recipient-ultima_alteracao').val(recipientultima_alteracao)

    })
</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script> 
<script type="text/javascript">
const clipboard = new ClipboardJS('.btn')

clipboard.on('success', function(e) {
    alert("BAIXA COPIADA")
});

clipboard.on('error', function(e) {
    alert("Falha ao copiar texto")
});
</script> 
<script>
function processa_box() {
    var logins = document.getElementById("logins").value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("modal-body").innerHTML = this.responseText;
    }
    xhttp.open("GET", "processa_tvbox.php?logins="+logins);
    xhttp.send();    
}      
</script>