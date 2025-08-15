       <?php // Executando consulta SQL
$sql = mysqli_query($conn,'SELECT * FROM clientes WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;') or die( 
  mysqli_error($conn) //caso haja um erro na consulta 
);

while($aux = mysqli_fetch_assoc($sql)) { 
  echo "-----------------------------------------<br />"; 
  echo "TECNICO: ".$aux["tecnico"]." - VEICULO: ".$aux["veiculo"]." - CHAMADO: ".$aux["situacao"]."<br />"; 
}
?>