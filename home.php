<?php
session_start();
include_once('assets/cabecalho.php');
include_once('assets/rodape.php');
include('config/conexao.php');
include_once("config/seguranca.php");
seguranca_adm();
$consulta = "SELECT * FROM clientes WHERE concluido = 'NAO' ORDER BY ultima_alteracao DESC ; ";
$resultado = mysqli_query($conn, $consulta);
date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
$dataLocal = date('d/m/Y H:i:s', time());

// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
?>
<style>
.card-columns {
  @include media-breakpoint-only(lg) {
    column-count: 4;
  }
</style>
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



<div class="container-sm">
 <div class="modal-content border-0">
  <div class="badge  text-wrap">
    <div class="col-md-auto"><h5><small class="text-muted">
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
    
    echo 'Olá ','<strong>', $_SESSION["usuarioNome"],'</strong>', ' Hoje é ', $semana["$data"] .  ", dia {$dia} de " . $mes_extenso["$mes"] . " de {$ano}"; ?></small></h5>
        <span class="btn btn-primary btn-sm"><?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?> REPAROS EM ANDAMENTO!</span>

<button type='button' class='btn btn-primary btn-sm' data-toggle='modal' ><?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>
 INSTALAÇÃO EM ANDAMENTO!</button>


    <span class="btn btn-primary btn-sm"><?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?> MUDANÇAS EM ANDAMENTO!</span>
<span class="btn btn-primary btn-sm"><?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?> RECOLHAS EM ANDAMENTO!</span>
    </div>
  </div>
</div>
</div><body>
<div class="modal-body">
</br>  

  <div class="tab-pane" id="pills-geral" role="tabpanel" aria-labelledby="pills-geral-tab"> 
  <div class="card-deck">
  <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header" style="text-align: center;">REPAROS TOTAIS</div>
  <div class="card-body">
    <h1 class="card-title" style="text-align: center;"><?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE YEAR(data_fim)="2024" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf(" %d", $row_cnt);				
 ?></h1>
    <p class="card-text" style="text-align: center;">REPAROS CONCLUIDOS</p>
  </div>
</div>
  <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header" style="text-align: center;">INSTALAÇÕES TOTAIS</div>
  <div class="card-body">
    <h1 class="card-title" style="text-align: center;"><?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE YEAR(data_fim)="2024" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf(" %d", $row_cnt);				
 ?></h1>
    <p class="card-text" style="text-align: center;">INSTAL. CONCLUIDAS</p>
  </div>
</div>
  <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
  <div class="card-header" style="text-align: center;">MUDANÇAS TOTAIS</div>
  <div class="card-body">
    <h1 class="card-title" style="text-align: center;"><?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE YEAR(data_fim)="2024" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf(" %d", $row_cnt);				
 ?></h1>
    <p class="card-text" style="text-align: center;">MUDANÇAS CONCLUIDAS</p>
  </div>
</div>
   <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
  <div class="card-header" style="text-align: center;">RECOLHAS TOTAIS</div>
  <div class="card-body">
    <h1 class="card-title" style="text-align: center;"> <?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE YEAR(data_fim)="2024" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf(" %d", $row_cnt);				
 ?></h1>
    <p class="card-text" style="text-align: center;">RECOLHAS CONCLUIDAS</p>
  </div>
</div>
 <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header" style="text-align: center;">TOTAL DE CHAMADOS</div>
  <div class="card-body">
    <h1 class="card-title" style="text-align: center;"><?php $result=mysqli_query($conn, "SELECT (SELECT COUNT(*) FROM clientes WHERE concluido = 'SIM') +
    (SELECT COUNT(*) FROM instalacoes WHERE concluido = 'SIM') +
    (SELECT COUNT(*) FROM mudanca WHERE concluido = 'SIM') +
    (SELECT COUNT(*) FROM recolhas WHERE concluido = 'SIM') AS total;");
	
$data=mysqli_fetch_assoc($result);
echo $data['total']; ?></h1>
    <p class="card-text" style="text-align: center;">TOTAL DE CHAMADOS CONCLUIDOS</p>
  </div>
</div>

  </div>
</div>
</BR>
 <div id="columnchart_material"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['<?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE  STATUS="A LANÇAR"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>', <?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE  STATUS="A LANÇAR"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>],
          ['<?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE  STATUS="<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>', <?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE  STATUS="<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>]
        ]);

        var options = {
          title: ' <?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE  STATUS="A LANÇAR"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?> REPAROS A LANÇAR      -     <?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE  STATUS="<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?> REPAROS A REMARCAR'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <div id="piechart"></div>
        </div>
        <div class="col-md-3">
 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          [' <?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE  STATUS="A LANÇAR"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>', <?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE  STATUS="A LANÇAR"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>],
          ['<?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE  STATUS="<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>', <?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE  STATUS="<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>]
        ]);

        var options = {
          title: '<?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE  STATUS="A LANÇAR"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?> INSTALAÇÕES A LANÇAR  - <?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE  STATUS="<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?> INSTALAÇÕES A REMARCAR'
        };
        

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
    <div id="piechart2"></div>
        </div>


        <div class="col-md-3">
            <div class="form-label-group">

      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['<?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE  STATUS="A LANÇAR"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>', <?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE  STATUS="A LANÇAR"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>],
          ['<?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE  STATUS="<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>', <?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE  STATUS="<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>]
        ]);

        var options = {
          title: '<?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE  STATUS="A LANÇAR"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?> MUDANÇAS A LANÇAR - <?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE  STATUS="<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?> MUDANÇAS A REMARCAR '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }
    </script>
    <div id="piechart3"></div>           

            </div>
        </div>
        <div class="col-md-3">
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['<?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE  STATUS="A LANÇAR"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>', <?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE  STATUS="A LANÇAR"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>],
          ['<?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE  STATUS="<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>   ', <?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE  STATUS="<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>]
        ]);

        var options = {
          title: '<?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE  STATUS="A LANÇAR"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?> RECOLHAS A LANÇAR - <?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE  STATUS="<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>"');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?> RECOLHAS A REMARCAR '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

        chart.draw(data, options);
      }
    </script>        
    <div id="piechart4" ></div>           
        
        </div>
    </div>
</div>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['RELATORIO MENSAL', 'REPAROS', 'INSTALAÇÕES', 'MUDANÇAS', 'RECOLHAS'],
          ['JANEIRO', 0, 0, 0, 0],
          ['FEVEREIRO', 0, 0, 0, 0],
          ['MARÇO', 0, 0, 0, 0],
          ['ABRIL', 0, 0, 0, 0],
          ['MAIO', 0, 0, 0, 0],
          ['JUNHO', 0, 0, 0, 0],
          ['JULHO', 0, 0, 0, 0],
          ['AGOSTO', <?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE MONTH(data_fim)="08" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE MONTH(data_fim)="08" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE MONTH(data_fim)="08" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE MONTH(data_fim)="08" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>],
          ['SETEMBRO', <?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE MONTH(data_fim)="09" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE MONTH(data_fim)="09" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE MONTH(data_fim)="09" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE MONTH(data_fim)="09" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>],
          ['OUTUBRO', <?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE MONTH(data_fim)="10" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE MONTH(data_fim)="10" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE MONTH(data_fim)="10" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE MONTH(data_fim)="10" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>],
          ['NOVEMBRO', <?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE MONTH(data_fim)="11" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE MONTH(data_fim)="11" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE MONTH(data_fim)="11" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE MONTH(data_fim)="11" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>],
          ['DEZEMBRO', <?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE MONTH(data_fim)="12" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE MONTH(data_fim)="12" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE MONTH(data_fim)="12" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>, <?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE MONTH(data_fim)="12" AND concluido="SIM" ORDER BY nome DESC;');
				
$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt);				
 ?>]


          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
   
  </body>
</html>

<footer class="bd-footer py-5 mt-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col"> </div>
      <div class="badge  text-wrap">
        <p class="mt-5 mb-1 text-muted">&copy; <?php echo date('d/m/Y') ?></p>
        <p class="mt-1 mb-1 text-muted">HB WEB E CIA - All Rights Reserved</p>
        <p class="mt-1 mb-1 text-muted">Versão 1.0 </p>
        <p class="mt-1 mb-1 text-muted"><a class="btn btn-secondary position-relative" href="relatorio.php"> RELATORIO ANO</a> <a class="btn btn-secondary position-relative" href="relatorio_mes.php"> RELATORIO MES</a> <a class="btn btn-secondary position-relative" href="pesquisar_relatorio_tecnico.php"> RELATORIO TECNICO</a> </p>
      </div>
      <div class="col"> </div>
    </div>
  </div>
</footer>

   
    
