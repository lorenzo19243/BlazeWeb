<!-- BOOTSTRAP V4.5.3 -->
<!-- Optional JavaScript  SEQUENCIA DE PLUGINS PARA UM CORRETO FUNCIONAMENTO -->
<!-- jQuery 1º, Popper.js 2º, Bootstrap JS 3º -->
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="bootstrap@4.5.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />

</body>
<div class="modal fade" id="modals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">AONDE ESTÃO OS TECNICOS?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">

 <table class="table table-striped table-sm" style="font-size: 10px;">
 <thead>
  <tr>
    <td width="40%"><strong>TECNICOS</strong></td>
    <td><strong>BAIRRO</strong></td>
    <td><strong>TEMPO</strong></td>
  </tr>
    </thead>  
  
  <?php

include('config/conexao.php');
include_once("config/seguranca.php");

$consulta = 'SELECT * FROM clientes WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>"  ORDER BY data_cadastro DESC
;';
$consulta2 = 'SELECT * FROM instalacoes WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>"  ORDER BY data_cadastro DESC
;';
$consulta3 = 'SELECT * FROM mudanca WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>"  ORDER BY data_cadastro DESC
;';
$consulta4 = 'SELECT * FROM recolhas WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>"  ORDER BY data_cadastro DESC
;';
$consulta5 = 'SELECT * FROM cameras WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>"  ORDER BY data_cadastro DESC
;';
$consulta6 = 'SELECT * FROM tvbox_chamados WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>"  ORDER BY data_cadastro DESC
;';
$resultado = mysqli_query($conn, $consulta);
$resultado2 = mysqli_query($conn, $consulta2);
$resultado3 = mysqli_query($conn, $consulta3);
$resultado4 = mysqli_query($conn, $consulta4);
$resultado5 = mysqli_query($conn, $consulta5);
$resultado6 = mysqli_query($conn, $consulta6);
date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
$dataLocal = date('d/m/Y H:i:s', time());

// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
?><tbody>
 <?php 
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id_cliente = $linha['id_cliente'];
        $nome = $linha['nome'];
		$tecnico = $linha['tecnico'];
        $bairro = $linha['bairro'];
		$ultima_alteracao = $linha['ultima_alteracao'];
		
		
		$data1 = new DateTime(''.$ultima_alteracao.'');
$data2 = new DateTime();
?>

  <tr>
    <td><strong style="font-size: 14px;"><?php echo $tecnico ?></strong></td>
    <td><?php echo $bairro ?></td>
    <td><?php $interval = $data1->diff($data2);
		      
			  echo $interval->format('%H:%I');
		 ?></td>
  </tr>
<?php } ?>
 <?php 
    while ($linha = mysqli_fetch_assoc($resultado2)) {
        $id_cliente = $linha['id_cliente'];
        $nome = $linha['nome'];
		$tecnico = $linha['tecnico'];
        $bairro = $linha['bairro'];
		$ultima_alteracao = $linha['ultima_alteracao'];
		
		
		$data1 = new DateTime(''.$ultima_alteracao.'');
$data2 = new DateTime();
?>

  <tr>
    <td><strong style="font-size: 14px;"><?php echo $tecnico ?></strong></td>
    <td><?php echo $bairro ?></td>
    <td><?php $interval = $data1->diff($data2);
		      
			  echo $interval->format('%H:%I');
		 ?></td>
  </tr>

<?php } ?>
 <?php 
    while ($linha = mysqli_fetch_assoc($resultado3)) {
        $id_cliente = $linha['id_cliente'];
        $nome = $linha['nome'];
		$tecnico = $linha['tecnico'];
        $bairro = $linha['bairro'];
		$ultima_alteracao = $linha['ultima_alteracao'];
		
		
		$data1 = new DateTime(''.$ultima_alteracao.'');
$data2 = new DateTime();
?>

  <tr>
    <td><strong style="font-size: 14px;"><?php echo $tecnico ?></strong></td>
    <td><?php echo $bairro ?></td>
    <td><?php $interval = $data1->diff($data2);
		      
			  echo $interval->format('%H:%I');
		 ?></td>
  </tr>

<?php } ?>
 <?php 
    while ($linha = mysqli_fetch_assoc($resultado4)) {
        $id_cliente = $linha['id_cliente'];
        $nome = $linha['nome'];
		$tecnico = $linha['tecnico'];
        $bairro = $linha['bairro'];
		$ultima_alteracao = $linha['ultima_alteracao'];
		
		
		$data1 = new DateTime(''.$ultima_alteracao.'');
$data2 = new DateTime();
?>

  <tr>
    <td><strong style="font-size: 14px;"><?php echo $tecnico ?></strong></td>
    <td><?php echo $bairro ?></td>
    <td><?php $interval = $data1->diff($data2);
		      
			  echo $interval->format('%H:%I');
		 ?></td>
  </tr>

<?php } ?>
<?php 
    while ($linha = mysqli_fetch_assoc($resultado5)) {
        $id_cliente = $linha['id_tvbox'];
        $nome = $linha['nome'];
		$tecnico = $linha['tecnico'];
        $bairro = $linha['bairro'];
		$ultima_alteracao = $linha['ultima_alteracao'];
		
		
		$data1 = new DateTime(''.$ultima_alteracao.'');
$data2 = new DateTime();
?>

  <tr>
    <td><strong style="font-size: 14px;"><?php echo $tecnico ?></strong></td>
    <td><?php echo $bairro ?></td>
    <td><?php $interval = $data1->diff($data2);
		      
			  echo $interval->format('%H:%I');
		 ?></td>
  </tr>

<?php } ?>
<?php 
    while ($linha = mysqli_fetch_assoc($resultado6)) {
        $id_cliente = $linha['id_cameras'];
        $nome = $linha['nome'];
		$tecnico = $linha['tecnico'];
        $bairro = $linha['bairro'];
		$ultima_alteracao = $linha['ultima_alteracao'];
		
		
		$data1 = new DateTime(''.$ultima_alteracao.'');
$data2 = new DateTime();
?>

  <tr>
    <td><strong style="font-size: 14px;"><?php echo $tecnico ?></strong></td>
    <td><?php echo $bairro ?></td>
    <td><?php $interval = $data1->diff($data2);
		      
			  echo $interval->format('%H:%I');
		 ?></td>
  </tr>
</tbody><?php } ?>

</table>





                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div>
          
<div class="modal fade" id="modals2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">EQUIPES HOJE</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                <?php 
$hoje = date("Y-m-d");
$consulta = "SELECT * FROM equipes WHERE data = '$hoje' ORDER BY veiculo";
$resultado = mysqli_query($conn, $consulta);

?>

 <table class="table">
 <thead>
  <tr>
    <td>TECNICOS</td>
    <td>VEICULO</td>
    <td>DATA</td>
  </tr>
    </thead>  
  
  
<tbody>    <?php 
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $tecnicos = $linha['tecnicos'];
		$veiculo = $linha['veiculo'];
		$data = $linha['data'];
 
    ?>
  <tr>
    <td><?php echo $tecnicos?></td>
        <td><?php echo $veiculo ?></td>
        <td><?php echo date('d/m/Y',  strtotime($data));?></td>
  </tr><?php } ?>
</tbody>
  
</table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div>
          
          
 <div class="modal fade bd-example-modal-lg" id="modals3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">TABELA DE HORARIOS</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                

 <table class="table table-striped table-sm" >
 <thead class="bg-dark text text-white">
  <tr>
    <td>COLABORADORES EXTERNOS</td>
    <td>SEGUNDA A SEXTA</td>
    <td>SABADO</td>
  </tr>
    </thead>  
<tbody> 
<?php 
$consulta = "SELECT * FROM horarios WHERE local = 'EXTERNO' ORDER BY id";
$resultado = mysqli_query($conn, $consulta);

?>   
<?php 
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $tecnicos = $linha['tecnicos'];
		$semana = $linha['semana'];
		$local = $linha['local'];
		$sabado = $linha['sabado'];
 
    ?>
  <tr>
    <td><?php echo $tecnicos?></td>
    <td><?php echo $semana?></td>
    <td><?php echo $sabado?></td>
  </tr>
  <?php } ?>
</tbody>
 <thead class="bg-dark text text-white">
  <tr>
    <td>COLABORADORES INTERNOS</td>
    <td>SEGUNDA A SEXTA</td>
    <td>SABADO</td>
  </tr>
    </thead>  
<tbody> 

<?php 
$consulta = "SELECT * FROM horarios WHERE local = 'INTERNO' ORDER BY id";
$resultado = mysqli_query($conn, $consulta);

?>  <?php 
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $tecnicos = $linha['tecnicos'];
		$semana = $linha['semana'];
		$local = $linha['local'];
		$sabado = $linha['sabado'];
 
    ?> 
  <tr>
    <td><?php echo $tecnicos?></td>
    <td><?php echo $semana?></td>
    <td><?php echo $sabado?></td>
  </tr> <?php } ?>


</tbody>
 <thead class="bg-dark text text-white">

  <tr>
    <td>COLABORADORES</td>
    <td>PLANTAO DOMINGO</td>
    <td></td>
  </tr>
    </thead>  
<tbody>     <?php 
$consulta = "SELECT * FROM horarios WHERE sabado = 'HORARIO COMERCIAL' ORDER BY id";
$resultado = mysqli_query($conn, $consulta);

?>  <?php 
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $tecnicos = $linha['tecnicos'];
		$semana = $linha['semana'];
		$local = $linha['local'];
		$sabado = $linha['sabado'];
 
    ?>     
      <td><?php echo $tecnicos?></td>
    <td><?php echo $semana?></td>
    <td><?php echo $sabado?></td>
  </tr> <?php } ?>


</tbody>
 <thead class="bg-dark text text-white">

  <tr>
    <td>COLABORADORES</td>
    <td>PLANTAO BACKBONE</td>
    <td></td>
  </tr>
    </thead>  
<tbody>     <?php 
$consulta = "SELECT * FROM horarios WHERE sabado = 'backbone' ORDER BY id";
$resultado = mysqli_query($conn, $consulta);

?>  <?php 
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $tecnicos = $linha['tecnicos'];
		$semana = $linha['semana'];
		$local = $linha['local'];
		$sabado = $linha['sabado'];
 
    ?>     
      <td><?php echo $tecnicos?></td>
    <td><?php echo $semana?></td>
    <td><?php echo $sabado?></td>
  </tr> <?php } ?>


</tbody>
  
</table>
</div>
                <div class="modal-footer">
                    <a class="btn btn-primary"  href="imprimir_horarios.php" target="_blank">IMPRIMIR</a>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div>
  
</html>