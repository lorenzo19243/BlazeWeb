<?php
session_start();
include_once('assets/cabecalho.php');
include_once('assets/rodape.php');
include('config/conexao.php');
include_once("config/seguranca.php");
seguranca_adm();

$consulta = 'SELECT * FROM equipes ORDER BY data DESC 
;';
$resultado = mysqli_query($conn, $consulta);
date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
$dataLocal = date('d/m/Y H:i:s', time());

// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
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
    <div class="col-md-6 bg-warning justify-content-between p-3"> <a class="btn btn-sm btn-dark "  href="JavaScript:location.reload(true);">ATUALIZAR <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
</svg></a> <a class="btn btn-sm btn-dark "  href="listar_equipes.php">EQUIPES HOJE<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
</svg></a>
      <button type="button" class="btn btn-sm btn-dark " data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#cadCliente">CADASTRAR EQUIPE <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
  <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5"/>
  <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
</svg></button>
    </div>
    <div class="col-md-2 bg-warning justify-content-between p-3">
      <div class="form-label-group"> </div>
    </div>
    <div class="col-md-4 bg-warning justify-content-between p-3 d-flex">
      <form class="row g-5" method="POST" action="pesquisar_reparos.php">
        <div class="col-auto">
          <input type="text" class="form-control col-md-18" name="pesquisar" id="pesquisar" placeholder="PESQUISAR CLIENTES POR NOME" >
        </div>
        <div class="col-auto">
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
 
        
        
        </div>
    </div>
    <div class="modal-content border-0">
      <div class="row">
        <div class="col"></div>
        <div class="col">
          <div class="col-md-auto" style="text-align:center">

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

if ($contar == 0) {
echo "<div class='alert alert-success alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> NENHUM AGENDAMENTO NO MOMENTO! </strong> 
                                </button>
                                
                        </div>";
}?>
  <table class="table" style="font-size: 12px; border:none">
    <thead class="bg-dark text text-white">
      <tr>
        <th scope="col" style="border:none"></th>
        <th scope="col" style="border:none"></th>
        <th scope="col" style="border:none"></th>
        <th scope="col" style="border:none"></th>
        <th scope="col" style="border:none">EQUIPE </th>
        <th scope="col" style="border:none">VEICULO </th>
        <th scope="col" style="border:none">DATA </th>
        <th scope="col" style="border:none"></th>
        <th scope="col" style="border:none"></th>
        <th scope="col" style="border:none"></th>
        <th scope="col" style="border:none"></th>
      </tr>
    </thead>
    <?php 
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $tecnicos = $linha['tecnicos'];
		$veiculo = $linha['veiculo'];
		$data = $linha['data'];
 
    ?>
    <tbody>
      <tr >
        <td></td>
        <td></td>
        <td></td>   
        <td></td>
        <td><?php echo $tecnicos?></td>
        <td><?php echo $veiculo ?></td>
        <td><?php echo date('d/m/Y  H:i',  strtotime($data));?></td>
        <td></td>
        <td></td>
        <td class="text text-center">
        </td>
        <td class="text text-center">
          </td>
          </td>
      </tr>
    </tbody>
    <?php } ?>
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
        <p class="mt-1 mb-1 text-muted"><a class="btn btn-secondary position-relative" href="relatorio.php"> RELATORIO ANO</a> <a class="btn btn-secondary position-relative" href="relatorio_mes.php"> RELATORIO MES</a></p>
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
        <h5 class="modal-title" id="exampleModalLabel">EQUIPES HOJE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      
      <!-- ALERTA PARA ERRO DE PREENCHIMENTO DE FORMULARIO -->
      <div class="alert alert-danger d-none fade show m-3" role="alert"> <strong>ERRO!</strong> - <strong>Preencha o campo <span id="campo-erro"></span></strong>! <span id="msg"></span> </div>
      <div class="modal-body">
      <form method="POST" action="processa_cad_equipes.php">
        <div class="row">
          <div class="col-md-10 col-sm-12">
             <label for="recipient-tecnico" class="col-form-label">TECNICOS:</label>
<select id="recipient-tecnico" name="tecnicos[]" class="selectpicker form-control" multiple aria-label=".form-select-lg example" required>
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
<label for="recipient-veiculo" class="col-form-label">VEICULO:</label>
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
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary" id="btn-cadastrar">AGENDAR</button>
        </div>
        
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function processa() {
    var logins = document.getElementById("logins").value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("modal-body").innerHTML = this.responseText;
    }
    xhttp.open("GET", "processa.php?logins="+logins);
    xhttp.send();    
}      
</script>
<script src="bootstrap-select.min.js"></script>
<link rel="stylesheet" href="bootstrap-select.min.css" />