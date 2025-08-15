<?php
session_start();
include_once('assets/cabecalho.php');
include_once('assets/rodape.php');
include('config/conexao.php');
include_once("config/seguranca.php");
seguranca_adm();
$pesquisar = $_POST['pesquisar'];
$busca = "SELECT * FROM mudanca WHERE nome LIKE '%$pesquisar%' OR bairro LIKE '%$pesquisar%'  OR rua LIKE '%$pesquisar%'";
$resultado = mysqli_query($conn, $busca);
?>


<?php include_once('assets/menu.php'); ?>
<div class="navbar-collapse offcanvas-collapse bg-warning" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <br>
            <br>
            <br>
            <br>
        </ul>
      </div>
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
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 bg-warning justify-content-between p-3">
      <a class="btn btn-dark position-relative"  href="listar_mudancas.php">MUDANCAS <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
</svg></a> 
      <a class="btn btn-dark position-relative"  href="listar_mudancas_concluidas.php">CONCLUIDAS <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
  <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
  <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
</svg></a>
      <button type="button" class="btn btn-dark position-relative" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#cadCliente">NOVA MUDANÇA <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
  <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5"/>
  <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
</svg></button>
    </div>

    <div class="col-md-4 bg-warning  justify-content-between p-3">
      <form class="row g-5" method="POST" action="pesquisar_mudancas.php">
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
        'Mon' => 'Seguda-Feira',
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
            <?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE  concluido="SIM" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("<small class='text-muted'>CONCLUIMOS <strong>%d</strong> MUDANÇAS</small>", $row_cnt); ?>
          </div>
        </div>
        <div class="col"></div>
      </div>
    </div>
  </div>
</div>
<div class="table-responsive-sm">

 

    <?php
$contar = mysqli_num_rows($resultado);

if ($contar == 0)
{
echo '</BR></BR></BR>

<div class="row">
          <div class="col-md-4 col-sm-12">

          </div>
                    <div class="col-md-4 col-sm-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Nenhum resultado encontrado para sua pesquisa!</strong> verifique o nome e tente novamente!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
          </div>
          <div class="col-md-4 col-sm-12">
          </div>
         
        </div';
}
else
{
echo '<table class="table table-striped table-sm" style="font-size: 14px;">
    <thead class="bg-dark text text-white">
    <th scope="col" style="border:none"> OS.</th>
      <th scope="col" style="border:none">CLIENTE</th>
      <th scope="col" style="border:none"> ENDEREÇO</th>
      <th scope="col" style="border:none">AG. P/ DIA</th>
      <th scope="col" style="border:none">ATENDENTE</th>
      <th scope="col" style="border:none">STATUS</th>
      <th scope="col" style="border:none" width="12%">TECNICO</th>
      <th scope="col" style="border:none">VEIC.</th>
      <th scope="col" style="border:none" width="6%">DATA</th>
      <th scope="col" class="text text-center" colspan="4" style="border:none">AÇÕES</th>
    </tr>
      </thead>';
}


?><tbody>
    <?php
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id_cliente = $linha['id_cliente'];
        $nome = $linha['nome'];
		$status = $linha['status'];
		$rua = $linha['rua'];
		$numero = $linha['numero'];
		$bairro = $linha['bairro'];
		$pppoe = $linha['pppoe'];
		$rua2 = $linha['rua2'];
		$numero2 = $linha['numero2'];
		$bairro2 = $linha['bairro2'];
		$tecnico = $linha['tecnico'];
		$veiculo = $linha['veiculo'];
        $responsavel = $linha['criado_por'];
		$observacao = $linha['observacao'];
        $alterado_por = $linha['alterado_por'];
		$agendado = $linha['agendado'];
		$conclusao = $linha['conclusao'];
		
        // CONVERTENDO DATA/HORA PARA PADRAO PORTUGUES-BR
        $ultima_alteracao = $linha['ultima_alteracao'];


        // CONVERTENDO DATA/HORA PARA PADRAO PORTUGUES-BR
        $data_cadastro = $linha['data_cadastro'];
        $data_cadastro = date('d/m/Y H:i:s',  strtotime($data_cadastro));

        $data1 = new DateTime(''.$ultima_alteracao.'');
$data2 = new DateTime();
$interval = $data1->diff($data2);
    ?>
    
      <tr>
        <td><?php echo $id_cliente ?></td>
        <td style="font-weight: bold;"><?php echo $nome ?></td>
        <td><strong>ANTIGO:</strong>
          <?php
$rua = mb_strtoupper($rua);

if ($rua >= 0)
{
$x = "$rua";
}
echo $x;
?>
          , Nº <?php echo $numero ?> - <?php echo $bairro ?> </br>
          <strong>NOVO:</strong>
          <?php
$rua2 = mb_strtoupper($rua2);

if ($rua2 >= 0)
{
$x = "$rua2";
}
echo $x;
?>
          , Nº <?php echo $numero2 ?> - <?php echo $bairro2 ?> <?php
$observacao = $observacao;
$id_cliente = $id_cliente;

if ($observacao >= '0')
{
$x = "<button type='button' class='position-absolute top-0 start-100 translate-middle badge rounded-pill btn-warning' data-toggle='modal' data-target='#modal$id_cliente'>
OBS!
</button>";
}
else
{
$x = "";
}

echo $x;
?></td>
        <td><button type="button" class="btn btn-secondary btn-sm"><?php echo date('d/m/Y',  strtotime($agendado));?></button></td>
        <td><?php echo $responsavel?></td>
        <td><?php echo $status ?></td>
        <td><?php
$tecnico = $tecnico;

if ($tecnico >= '0')
{
$x = "$tecnico";
}
else
{
$x = "CHAMADO SEM LANÇAR";
}

echo $x;
?><?php
$conclusao = $conclusao;
$id_cliente = $id_cliente;

if ($conclusao >= '0')
{
$x = "<button class=\"position-absolute   close\"  data-toggle='modal' data-target='#modala$id_cliente'><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"24\" height=\"24\"> <path d=\"M1.75 4.5a.25.25 0 0 0-.25.25v.852l10.36 7a.25.25 0 0 0 .28 0l5.69-3.845A.75.75 0 0 1 18.67 10l-5.69 3.845c-.592.4-1.368.4-1.96 0L1.5 7.412V19.25c0 .138.112.25.25.25h20.5a.25.25 0 0 0 .25-.25v-8.5a.75.75 0 0 1 1.5 0v8.5A1.75 1.75 0 0 1 22.25 21H1.75A1.75 1.75 0 0 1 0 19.25V4.75C0 3.784.784 3 1.75 3h15.5a.75.75 0 0 1 0 1.5H1.75Z\"></path><path d=\"M24 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z\"></path></svg></button>";
}
else
{
$x = "";
}

echo $x;
?>
 <div class="modal fade" id="modala<?php echo $id_cliente ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                  <?php
$conclusao = mb_strtoupper($conclusao);

if ($conclusao >= 0)
{
$x = "$conclusao";
}
else
{
$x = "";
}

echo $x;
?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div></td>
        <td><?php echo $veiculo; ?></td>
        <td><?php echo $data_cadastro ?></td>
        <td class="text text-center"><a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#visulaizarCliente" data-whatever="<?php echo $linha['id_cliente']; ?>" data-whatevernome="<?php echo $linha['nome']; ?>" 
    data-whateverobservacao="<?php echo $linha['observacao']; ?>"  
    data-whateverconclusao="<?php echo $linha['conclusao']; ?>"   
  data-whateverbairro="<?php echo $linha['bairro']; ?>"   
   data-whateverrua="<?php echo $linha['rua']; ?>"   
    data-whatevernumero="<?php echo $linha['numero']; ?>"
      data-whateverbairro2="<?php echo $linha['bairro2']; ?>"   
   data-whateverrua2="<?php echo $linha['rua2']; ?>"   
    data-whatevernumero2="<?php echo $linha['numero2']; ?>"
    data-whatevertecnico="<?php echo $linha['tecnico']; ?>"   
     data-whateverveiculo="<?php echo $linha['veiculo']; ?>"      data-whateverplano="<?php echo $linha['plano']; ?>"                 
       data-whateveroperador="<?php echo $linha['criado_por']; ?>" 
       data-whateversituacao="<?php echo $situacao; ?>" data-whateverdata-cadastro="<?php echo $data_cadastro ?>"                     data-whateveralterado_por="<?php echo $alterado_por; ?>" 
       data-whateverultima_alteracao="<?php
$ultima_alteracao = $ultima_alteracao;

if ($ultima_alteracao >= 0)
{
$x = "$ultima_alteracao";
}
else
{
$x = "0";
}

echo $x;
?>"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16">
  <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z"/>
  <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z"/>
  <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
</svg></a></td>
        <td class="text text-center">
        <a href="#" 
data-toggle="modal"data-backdrop="static" 
data-keyboard="false" data-target="#editarCliente" 
data-whatever="<?php echo $linha['id_cliente']; ?>" 
data-whatevernome="<?php echo $linha['nome']; ?>"
data-whateverrede="<?php echo $linha['rede']; ?>"
data-whateverredesenha="<?php echo $linha['redesenha']; ?>"
data-whateveroperador="<?php echo $linha['criado_por']; ?>" 
data-whateverveiculo="<?php echo $linha['veiculo']; ?>" 
data-whatevertecnico="<?php echo $linha['tecnico']; ?>" 
data-whateverpppoe="<?php echo $linha['pppoe']; ?>"
data-whateverplano="<?php echo $linha['plano']; ?>" 
data-whateverconclusao="<?php echo $linha['conclusao']; ?>" 
data-whateverdata-cadastro="<?php echo $data_cadastro ?>" 
data-whatevertempo="<?php echo $interval->format('%H:%I'); ?>"
data-whateveralterado_por="<?php echo $alterado_por; ?>" 
data-whateverultima_alteracao="<?php echo $ultima_alteracao = date('d/m/Y H:i:s',  strtotime($ultima_alteracao));?>"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></a>

<?php 
                        if($_SESSION['perfil_cod'] == 1){
                    ?>
<td class="text text-center">
                    <a href="processa_excluir_mudancas.php?id_cliente=<?php echo $linha['id_cliente']; ?>" onClick="return confirm('Deseja realmente deletar o cliente?')">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg></a> </td><?php } ?>



</td>
        <td class="text text-center"><script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script> 
          <script type="text/javascript">
const clipboard = new ClipboardJS('.btn')

clipboard.on('success', function(e) {
    alert("CHAMADO COPIADO")
});

clipboard.on('error', function(e) {
    alert("Falha ao copiar texto")
});
</script>
          <button type="button" class="btn btn-primary btn-sm" data-clipboard-text="
*ORDEM DE SERVIÇO Nº <?php echo $linha['id_cliente']; ?>*
`MUDANÇA DE ENDEREÇO`

*TIPO CHAMADO:* MUDANÇA DE ENDEREÇO
*TÉCNICO:* <?php echo $linha['tecnico']; ?>   
*VEÍCULO:* <?php echo $linha['veiculo']; ?>  

*MENSAGEM:* <?php echo $linha['observacao']; ?> - ENVIAR FOTOS DO REPARO

*DADOS DO CLIENTE:*
*NOME:* <?php echo $linha['nome']; ?>   
*PPPOE:*  <?php echo $linha['pppoe']; ?> 
*PLANO:* <?php echo $linha['plano']; ?> 
*ANTIGO ENDEREÇO: :* <?php echo $linha['rua']; ?>, Nº <?php echo $linha['numero']; ?> - <?php echo $linha['bairro']; ?>  
*NOVO ENDEREÇO: :* <?php echo $linha['rua2']; ?>, Nº <?php echo $linha['numero2']; ?> - <?php echo $linha['bairro2']; ?> 
*LANÇADO POR:* <?php echo $_SESSION['usuarioNome'] ?>

https://app.xgstelecom.com.br/os/">Copiar</button>
          <div class="modal fade" id="modal<?php echo $linha['id_cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">ATENÇÃO!!!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                  <?php
$observacao = $observacao;

if ($observacao >= 0)
{
$x = "$observacao";
}
else
{
$x = "";
}

echo $x;
?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div></td>
          </td>
      </tr><?php } ?>
    </tbody>
    
  </table>
</div>
<footer class="bd-footer py-5 mt-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col"> </div>
      <div class="badge  text-wrap">
        <?php    
if (empty($consulta)) { //Se nao achar nada, lança essa mensagem
    echo '<h1><p class="mt-1 mb-1 text-muted">NADA AGENDADO NO MOMENTO</p></h1>';
}
 ?>
        <p class="mt-5 mb-1 text-muted">&copy; <?php echo date('d/m/Y') ?></p>
        <p class="mt-1 mb-1 text-muted">HB WEB E CIA - All Rights Reserved</p>
        <p class="mt-1 mb-1 text-muted">Versão 1.0 </p>
                <p class="mt-1 mb-1 text-muted"><?php 
                        if($_SESSION['perfil_cod'] == 1){
                    ?><a class="btn btn-secondary position-relative" href="relatorio.php"> RELATORIO ANO</a> <a class="btn btn-secondary position-relative" href="relatorio_mes.php"> RELATORIO MES</a> <a class="btn btn-secondary position-relative" href="pesquisar_relatorio_tecnico.php"> RELATORIO TECNICO</a> <?php } ?></p>
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
                $.post("processa_cad_mudancas.php", dados, function(retorna) {
                    if (retorna) {
                        //Limpar os campo
                        $('#insert_form')[0].reset();

                        //Fechar a janela modal cadastrar
                        $('#cadCliente').modal('hide');
                        $('#sucessModal').modal('show');

                        setInterval(function() {
                            var redirecionar = "listar_mudancas.php";
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
      <div class="modal-body bg-success text text-center text-white"> CHAMADO CADASTRADO COM SUCESSO! </div>
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
      <div class="modal-body bg-danger text text-center text-white"> CHAMADO NÃO CADASTRADO! </div>
      <div class="modal-footer"> </div>
    </div>
  </div>
</div>
<!-- ==================================================MODAL CADASTRO DE CLIENTE ==================================== -->
<div class="modal fade" id="cadCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel">AGENDAR MUDANÇA DE ENDEREÇO!</h5>
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
</div>

<div class="col-sm">
  <button class="btn btn-primary mb-3" onClick="processa_mud()">PESQUISA</button>
</div>
<div class="col-sm-1">
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
                    <div class="col-md-8 col-sm-12">
            <label for="recipient-tecnico" class="col-form-label">TECNICO</label>
            <input type="text" name="tecnico" id="recipient-tecnico" maxlength="50" class="form-control" disabled>
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-veiculo" class="col-form-label">VEICULO</label>
            <input type="text" name="veiculo" id="recipient-veiculo" maxlength="50" class="form-control -10" disabled>
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-plano" class="col-form-label">PLANO</label>
            <input type="text" name="plano" id="recipient-plano" maxlength="50" class="form-control -10" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <label for="recipient-observacao" class="col-form-label">OBSERVACAO</label>
           <textarea class="form-control" name="observacao" id="recipient-observacao"  aria-label="With textarea" disabled></textarea>
          </div>
                    <div class="col-md-6 col-sm-12">
            <label for="recipient-conclusao" class="col-form-label">CONCLUSAO:</label>
            <textarea class="form-control" name="conclusao" id="recipient-conclusao"  aria-label="With textarea"disabled></textarea>
        </div>
        </div>
        <div class="row">
          <div class="col-md-5 col-sm-12">
            <label for="recipient-bairro" class="col-form-label">ANTIGO BAIRRO</label>
            <input type="text" name="bairro" id="recipient-bairro" maxlength="50" class="form-control" disabled>
          </div>
          <div class="col-md-5 col-sm-12">
            <label for="recipient-rua" class="col-form-label">ANTIGA RUA</label>
            <input type="text" name="rua" id="recipient-rua" maxlength="50" class="form-control -10" disabled>
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-numero" class="col-form-label">NUMERO</label>
            <input type="text" name="numero" id="recipient-numero" maxlength="50" class="form-control" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 col-sm-12">
            <label for="recipient-bairro2" class="col-form-label">NOVO BAIRRO</label>
            <input type="text" name="bairro2" id="recipient-bairro2" maxlength="50" class="form-control" disabled>
          </div>
          <div class="col-md-5 col-sm-12">
            <label for="recipient-rua2" class="col-form-label">NOVA RUA</label>
            <input type="text" name="rua2" id="recipient-rua2" maxlength="50" class="form-control -10" disabled>
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-numero2" class="col-form-label">NUMERO</label>
            <input type="text" name="numero2" id="recipient-numero2" maxlength="50" class="form-control" disabled>
          </div>
        </div>
        <div class="row">

        </div>
        <div class="row">
          <div class="col-md-3 col-sm-12">
            <label for="recipient-operador" class="col-form-label cli">CADASTRADO POR</label>
            <input type="text" name="operador" id="recipient-operador" maxlength="50" class="form-control" disabled>
          </div>
          <div class="col-md-3 col-sm-12">
            <label for="recipient-dataCadastro" class="col-form-label">DATA DO CADASTRO</label>
            <input type="text" class="form-control" id="recipient-dataCadastro" disabled>
          </div>
          <div class="col-md-3 col-sm-12">
            <label for="recipient-alterado_por" class="col-form-label cli">ALTERADO POR</label>
            <input type="text" name="alterado_por" id="recipient-alterado_por" maxlength="50" class="form-control" disabled>
          </div>
          <div class="col-md-3 col-sm-12">
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
		var recipientpppoe = button.data('whateverpppoe')
        var recipientsituacao = button.data('whateversituacao')
		var recipientconclusao = button.data('whateverconclusao')
		var recipientatendente = button.data('whateveratendente')
		var recipientstatus = button.data('whateverstatus')
		var recipientrua = button.data('whateverrua')
		var recipientbairro = button.data('whateverbairro')
		var recipientnumero = button.data('whatevernumero')
		var recipientrua2 = button.data('whateverrua2')
		var recipientbairro2 = button.data('whateverbairro2')
		var recipientnumero2 = button.data('whatevernumero2')
		var recipienttecnico = button.data('whatevertecnico')
		var recipientveiculo = button.data('whateverveiculo')
		var recipientplano = button.data('whateverplano')
        var recipientoperador = button.data('whateveroperador')
        var recipientsituacao = button.data('whateversituacao')
        var recipientdataCadastro = button.data('whateverdata-cadastro')
        var recipientalterado_por = button.data('whateveralterado_por')
        var recipientultima_alteracao = button.data('whateverultima_alteracao')

        var modal = $(this)
        modal.find('.modal-title').text('ORDEM DE SERVIÇO Nº ' + recipient)
        modal.find('#id').val(recipient)
        modal.find('#recipient-nome').val(recipientnome)
		modal.find('#recipient-pppoe').val(recipientpppoe)
		modal.find('#recipient-situacao').val(recipientsituacao)
		modal.find('#recipient-conclusao').val(recipientconclusao)
		modal.find('#recipient-atendente').val(recipientatendente)
		modal.find('#recipient-status').val(recipientstatus)
		modal.find('#recipient-rua').val(recipientrua)
		modal.find('#recipient-bairro').val(recipientbairro)
		modal.find('#recipient-numero').val(recipientnumero)
		modal.find('#recipient-rua2').val(recipientrua2)
		modal.find('#recipient-bairro2').val(recipientbairro2)
		modal.find('#recipient-numero2').val(recipientnumero2)
		modal.find('#recipient-tecnico').val(recipienttecnico)
		modal.find('#recipient-veiculo').val(recipientveiculo)
		modal.find('#recipient-plano').val(recipientplano)
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
      <form method="POST" action="processa_edit_mudanca.php" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-10 col-sm-12">
            <label for="recipient-tecnico" class="col-form-label">TECNICOS</label>
                       <label for="recipient-tecnico" class="col-form-label">TECNICOS:</label>
             <label for="recipient-tecnico" class="col-form-label">TECNICOS:</label>
<select id="recipient-tecnico" name="tecnico[]" class="selectpicker form-control" multiple aria-label="size 3 select example" required>
    <option value="ADRIANO">ADRIANO</option>
    <option value="BRUNO">BRUNO</option>
    <option value="EDUARDO">EDUARDO</option>
    <option value="EMERSON">EMERSON</option>
    <option value="DOUGLAS">DOUGLAS</option>
    <option value="LEANDRO">LEANDRO</option>
    <option value="LUIS">LUIS</option>
    <option value="MIGUEL">MIGUEL</option>
<option value="UELITON">UELITON</option>
<option value="UALAS">UALAS</option>
<option value="JOSEVAN">JOSEVAN</option>
<option value="KALEBHE">KALEBHE</option>
<option value="JEFFERSON">JEFFERSON</option>
<option value="WENDEL">WENDEL</option>
<option value="CARLEAN">CARLEAN</option>
<option value="ETEVALDO">ETEVALDO</option>
<option value="HELBER">HELBER</option>
<option value="ERIK">ERIK</option>
<option value="HENRIQUE">HENRIQUE</option>
<option value="MANOEL">MANOEL</option>
<option value="ALAN">ALAN</option>
<option value="RENANTO">RENATO</option>
<option value="YAN">YAN</option>
  </select>
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-veiculo" class="col-form-label">VEICULO</label>
            <select class="form-control form-select-lg mb-2 select2" name="veiculo" id="recipient-veiculo" aria-label=".form-select-lg example">
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
               <option value="UNO_C">UNO_C</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <label for="recipient-conclusao" class="col-form-label">CONCLUSAO:</label>
            <textarea class="form-control" name="conclusao" id="recipient-conclusao"  aria-label="With textarea"></textarea>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-pppoe" class="col-form-label">PPPOE:</label>
            <input type="text" name="pppoe" id="recipient-pppoe" maxlength="50" class="form-control -10" value="">
          </div>
          <div class="col-md-4 col-sm-10">
            <label for="recipient-rede" class="col-form-label">REDE WIFI:</label>
            <input type="text" name="rede" id="recipient-rede" maxlength="50" class="form-control -10">
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-redesenha" class="col-form-label">SENHA WIFI:</label>
            <input type="text" name="redesenha" id="recipient-redesenha" maxlength="50" class="form-control -10">
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-rua" class="col-form-label">DROP:</label>
            <input type="text" name="cabo_drop" id="cabo_drop" maxlength="50" class="form-control -10">
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-rua" class="col-form-label">SINAL:</label>
            <input type="text" name="sinal" id="sinal" maxlength="50" class="form-control -10">
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-rua" class="col-form-label">CONECTOR:</label>
            <input type="text" name="conector" id="conector" maxlength="50" class="form-control -10">
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-rua" class="col-form-label">ESTICADORES:</label>
            <input type="text" name="esticador" id="esticador" maxlength="50" class="form-control -10">
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-rua" class="col-form-label">BUXA/PARAF.:</label>
            <input type="text" name="buxa_parafuso" id="busxa_parafuso" maxlength="50" class="form-control -10">
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-concluido" class="col-form-label">REMOTO</label>
            <select class="form-control form-select-lg mb-1 select2" name="remoto" id="remoto" aria-label=".form-select-lg example">
              <option value="ATIVADO">ATIVADO</option>
              <option value="NAO">NAO</option>
            </select>
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-concluido" class="col-form-label">REPETIDOR</label>
            <select class="form-control form-select-lg mb-1 select2" name="remoto" id="remoto" aria-label=".form-select-lg example">
              <option value="NAO">NAO</option>
              <option value="SIM">SIM</option>
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
            <select class="form-control form-select-lg mb-2 select2" name="status" id="status" aria-label=".form-select-lg example">
              <option value="<button type='button' class='btn btn-primary btn-sm'> andamento</button>">EM ANDAMENTO</option>
              <option value="<button type='button' class='btn btn-danger btn-sm' >remarcar</button>">REMARCAR</option>
              <option value="<button type='button' class='btn btn-success btn-sm' >concluido</button>">CONCLUIDO</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-12">
            <label for="recipient-operador" class="col-form-label cli">Alterado por</label>
            <input type="text" name="alterado_por" id="recipient-alterado_por" maxlength="50" class="form-control" disabled value="<?php echo $_SESSION['usuarioNome'] ?>">
          </div>
          <div class="col-md-3 col-sm-12">
            <label for="recipient-ultima_alteracao" class="col-form-label">Última Alteração</label>
            <input type="text" class="form-control" name="ultima_alteracao" id="recipient-ultima_alteracao" value="<?php echo date('d/m/Y - H:i:s') ?>" disabled>
          </div>
           <div class="col-md-3 col-sm-12">
            <label for="recipient-tempo" class="col-form-label">TEMPO:</label>
            <input type="text" name="tempo" id="recipient-tempo" maxlength="50" class="form-control">
          </div>
          <div class="col-md-3 col-sm-12">
            <label for="recipient-concluido" class="col-form-label">CONCLUIDO</label>
            <select class="form-control form-select-lg mb-2 select2" name="concluido" id="concluido" aria-label=".form-select-lg example">
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
		var recipientpppoe = button.data('whateverpppoe')
		var recipientrede = button.data('whateverrede')
		var recipientredesenha = button.data('whateverredesenha')
		var recipientveiculo = button.data('whateverveiculo')
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
		var recipientconclusao = button.data('whateverconclusao')
        var recipientdataCadastro = button.data('whateverdata-cadastro')
        var recipientalterado_por = button.data('whateveralterado_por')
        var recipientultima_alteracao = button.data('whateverultima_alteracao')
        var recipienttempo = button.data('whatevertempo')

        var modal = $(this)
        modal.find('.modal-title').text('EDITAR ORDEM DE SERVIÇO Nº ' + recipient)
        modal.find('#id').val(recipient)
        modal.find('#recipient-nome').val(recipientnome)
		modal.find('#recipient-tecnico').val(recipienttecnico)
		modal.find('#recipient-pppoe').val(recipientpppoe)
		modal.find('#recipient-rede').val(recipientrede)
		modal.find('#recipient-redesenha').val(recipientredesenha)
		modal.find('#recipient-veiculo').val(recipientveiculo)
        modal.find('#recipient-operador').val(recipientoperador)
        modal.find('#recipient-situacao').val(recipientsituacao)
		modal.find('#recipient-concluido').val(recipientconcluido)
		modal.find('#recipient-conclusao').val(recipientconclusao)
        modal.find('#recipient-dataCadastro').val(recipientdataCadastro)
        modal.find('#recipient-alterado_por').val(recipientalterado_por)
        modal.find('#recipient-ultima_alteracao').val(recipientultima_alteracao)
          modal.find('#recipient-tempo').val(recipienttempo)

    })
</script> 
<script>
function processa_mud() {
    var logins = document.getElementById("logins").value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("modal-body").innerHTML = this.responseText;
    }
    xhttp.open("GET", "processa_mudanca.php?logins="+logins);
    xhttp.send();    
}      
</script>
<script src="bootstrap-select.min.js"></script>
<link rel="stylesheet" href="bootstrap-select.min.css" />