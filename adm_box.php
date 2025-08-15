<?php
session_start();
include_once('assets/cabecalho.php');
include_once('assets/rodape.php');
include('config/conexao.php');
include_once("config/seguranca.php");
seguranca_adm();
$consulta = 'SELECT * FROM tvbox_chamados WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>"   
union 
(SELECT * FROM tvbox_chamados WHERE  STATUS="<button type=\'button\' class=\'btn btn-danger btn-sm\' >remarcar</button>" )
union
(SELECT * FROM tvbox_chamados WHERE  STATUS="A LANÇAR" ORDER BY data_cadastro DESC) 
;';
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
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 bg-warning justify-content-between p-3"> <a class="btn btn-sm btn-dark "  href="JavaScript:location.reload(true);"> ATUALIZAR </a> <a class="btn btn-sm btn-dark "  href="listar_chamados.php"> CHAMADOS TVBOX</a> <a class="btn btn-sm btn-dark "  href="listar_chamados_concluidos.php">CONCLUIDOS TVBOX</a>
      <button type="button" class="btn btn-sm btn-dark " data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#cadCliente">NOVO CHAMADO TVBOX</button>
    </div>
    <div class="col-md-2 bg-warning justify-content-between p-3">
      <div class="form-label-group"> </div>
    </div>
    <div class="col-md-4 bg-warning justify-content-between p-3 d-flex">
      <form class="row g-5" method="POST" action="pesquisar.php">
        <div class="col-auto">
          <input type="text" class="form-control" name="pesquisar" id="pesquisar" placeholder="PESQUISAR CLIENTES POR NOME" >
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
        REPAROS EM ANDAMENTO! </a> <a class="btn btn-primary btn-sm" href="listar_instalacoes.php">
        <?php $clientes = mysqli_query($conn,'SELECT * FROM instalacoes WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>
        INSTALAÇÃO EM ANDAMENTO! </a> <a class="btn btn-primary btn-sm" href="listar_mudancas.php">
        <?php $clientes = mysqli_query($conn,'SELECT * FROM mudanca WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>
        MUDANÇAS EM ANDAMENTO! </a> <a class="btn btn-primary btn-sm" href="listar_recolhas.php">
        <?php $clientes = mysqli_query($conn,'SELECT * FROM recolhas WHERE  STATUS="<button type=\'button\' class=\'btn btn-primary btn-sm\'> andamento</button>" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("%d", $row_cnt); ?>
        RECOLHAS EM ANDAMENTO! </a> </div>
    </div>
    <div class="modal-content border-0">
      <div class="row">
        <div class="col"></div>
        <div class="col">
          <div class="col-md-auto" style="text-align:center">
            <?php $clientes = mysqli_query($conn,'SELECT * FROM clientes WHERE  concluido="SIM" ORDER BY nome DESC;');
				$row_cnt = mysqli_num_rows($clientes);

printf("<small class='text-muted'>CONCLUIMOS <strong>%d</strong> REPAROS</small>", $row_cnt); ?>
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
                                
                                <strong> NENHUM AGENDAMENTO NO MOMENTO! &nbsp; <i class='far fa-smile-wink fa-2x'></i> </strong> 
                                    
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                        </div>";
}?>
  <table class="table" style="font-size: 12px; border:none">
    <thead class="bg-dark text text-white">
      <tr>
        <th scope="col" style="border:none"> ID </th>
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
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id_tvbox = $linha['id_tvbox'];
        $nome = $linha['nome'];
		$atendente = $linha['atendente'];
		$status = $linha['status'];
		$rua = $linha['rua'];
		$numero = $linha['numero'];
		$bairro = $linha['bairro'];
		$tecnico = $linha['tecnico'];
		$veiculo = $linha['veiculo'];
        $responsavel = $linha['criado_por'];
        $situacao = $linha['situacao'];
		 $observacao = $linha['observacao'];
		$sinal = $linha['sinal'];
		$pppoe = $linha['pppoe'];
		$plano = $linha['plano'];
        $alterado_por = $linha['alterado_por'];
		
        // CONVERTENDO DATA/HORA PARA PADRAO PORTUGUES-BR
        $ultima_alteracao = $linha['ultima_alteracao'];
        $ultima_alteracao = date('d/m/Y H:i:s',  strtotime($ultima_alteracao));

        // CONVERTENDO DATA/HORA PARA PADRAO PORTUGUES-BR
        $data_cadastro = $linha['data_cadastro'];
        $data_cadastro = date('d/m/Y H:i:s',  strtotime($data_cadastro));

    ?>
    <tbody>
      <tr >
        <td><?php echo $id_tvbox ?></td>
        <td style="font-weight: bold;"><?php echo $nome ?> - <?php echo $bairro ?></td>
        <td><?php echo $situacao ?>
          <?php
$observacao = $observacao;
$id_tvbox = $id_tvbox;

if ($observacao >= 0)
{
$x = "<button type='button' class='badge btn-warning' data-toggle='modal' data-target='#modal$id_tvbox'>
OBSERVACAO
</button>";
}
else
{
$x = "";
}

echo $x;
?></td>
        <td><?php echo $responsavel?></td>
        <td><?php echo $status ?></td>
        <td><?php
$tecnico = $tecnico;

if ($tecnico >= 0)
{
$x = "$tecnico";
}
else
{
$x = "CHAMADO SEM LANÇAR";
}

echo $x;
?></td>
        <td><?php echo $veiculo; ?></td>
        <td><?php echo $data_cadastro ?></td>
        <td class="text text-center"><a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#visulaizarCliente" data-whatever="<?php echo $linha['id_tvbox']; ?>" data-whatevernome="<?php echo $linha['nome']; ?>" 
 data-whateveratendente="<?php echo $linha['atendente']; ?>" 
 data-whateverstatus=""    
  data-whateverbairro="<?php echo $linha['bairro']; ?>"   
   data-whateverrua="<?php echo $linha['rua']; ?>"   
    data-whatevernumero="<?php echo $linha['numero']; ?>"
    data-whatevertecnico="<?php echo $linha['observacao']; ?>"   
     data-whateverveiculo="<?php echo $linha['sinal']; ?>"      data-whateverplano="<?php echo $linha['plano']; ?>"                 
       data-whateveroperador="<?php echo $linha['criado_por']; ?>" 
       data-whateversituacao="<?php echo $situacao; ?>" data-whateverdata-cadastro="<?php echo $data_cadastro ?>"                     data-whateveralterado_por="<?php echo $alterado_por; ?>" 
       data-whateverultima_alteracao="<?php
$ultima_alteracao = $ultima_alteracao;

if ($ultima_alteracao >= 1)
{
$x = "$ultima_alteracao";
}
else
{
$x = "";
}

echo $x;
?>"> <i class="far fa-eye text text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Visualizar"></i> </a></td>
        <td class="text text-center"><a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#editarCliente" data-whatever="<?php echo $linha['id_tvbox']; ?>" 
data-whatevernome="<?php echo $linha['nome']; ?>"
data-whateveroperador="<?php echo $linha['criado_por']; ?>" 
data-whateverstatus="" 
data-whatevertecnico="<?php echo $linha['tecnico']; ?>" 
data-whateverplano="<?php echo $linha['plano']; ?>" 
data-whateverdata-cadastro="<?php echo $data_cadastro ?>" 
data-whateveralterado_por="<?php echo $alterado_por; ?>" 
data-whateverultima_alteracao="<?php echo $ultima_alteracao?>"> <i class="far fa-edit text text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i></a></td>
        <td class="text text-center"><a href="processa_excluir_tvbox.php?id_tvbox=<?php echo $linha['id_tvbox']; ?>" onClick="return confirm('Deseja realmente deletar o cliente?')">
                        <i class="far fa-trash-alt text text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir"></i></a> </td>
        
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
*-----------------NOVO CHAMADO------------------*

*TIPO CHAMADO:* <?php echo $situacao ?>ㅤBOX TV   
*TÉCNICO RESPONSAVEL:* <?php echo $linha['tecnico']; ?>   
*VEÍCULO:* <?php echo $linha['veiculo']; ?>  

*SINAL ATUAL:* <?php echo $linha['sinal']; ?>  
*MENSAGEM:* <?php
$observacao = mb_strtoupper($observacao);

if ($observacao >= 0)
{
$x = "$observacao";
}
else
{
$x = "";
}

echo $x;
?> - ENVIAR FOTOS DO REPARO

*DADOS DO CLIENTE:*
*NOME:* <?php echo $linha['nome']; ?>   
*PPPOE:* <?php echo $linha['pppoe']; ?>   
*RUA:* <?php echo $linha['rua']; ?>, <?php echo $linha['numero']; ?> - <?php echo $linha['bairro']; ?>  
*PLANO:* <?php echo $linha['plano']; ?> 
*REDE_WIFI_ATUAL:* <?php echo $linha['rede']; ?> 
*SENHA_WIFI_ATUAL:* <?php echo $linha['redesenha']; ?> 
*LANÇADO POR:* <?php echo $_SESSION['usuarioNome'] ?>">Copiar</button>
          <div class="modal fade" id="modal<?php echo $linha['id_tvbox']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">ATENÇÃO!!!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                  <?php
$observacao = mb_strtoupper($observacao);

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
        <p class="mt-1 mb-1 text-muted"><a class="btn btn-secondary position-relative" href="relatorio.php"> RELATORIO </a></p>
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
        <h5 class="modal-title" id="exampleModalLabel">CADASTRAR CHAMADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      
      <!-- ALERTA PARA ERRO DE PREENCHIMENTO DE FORMULARIO -->
      <div class="alert alert-danger d-none fade show m-3" role="alert"> <strong>ERRO!</strong> - <strong>Preencha o campo <span id="campo-erro"></span></strong>! <span id="msg"></span> </div>
      <div class="modal-body">
      <form method="POST" action="processa_cad_tvbox.php">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <label for="recipient-nome" class="col-form-label">NOME:</label>
            <input type="text" name="nome" id="nome" maxlength="50" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-5">
            <label for="recipient-situacao" class="col-form-label">SITUAÇÃO:</label>
            <select class="form-control form-select-lg mb-5 select2" name="situacao" id="situacao" >
              <option value="REPARO">REPARO TVBOX</option>
              <option value="INSTALACAO">INSTALAÇÃO TVBOX</option>
              <option value="RECOLHA">RECOLHA TVBOX</option>
            </select>
          </div>

          <div class="col-md-12 col-sm-5">
            <label for="recipient-observacao" class="col-form-label">OBSERVAÇÃO:</label>
            <input type="text" name="observacao" id="observacao" maxlength="200" class="form-control">
          </div>
          </div>
          <div class="row">
          <div class="col-md-5 col-sm-12">
            <label for="recipient-bairro" class="col-form-label">BAIRRO</label>
            :
            <select class="form-control form-select-lg mb-5 select2" aria-label="Default select example" name="bairro" id="bairro">
              <option selected>SELECIONE O BAIRRO</option>
              <option value="ALDEIA KIRIRI">ALDEIA KIRIRI</option>
              <option value="ALDEIA TUXA">ALDEIA TUXA</option>
              <option value="ALDEIA TUXA RIACHO SERRA BRANCA">ALDEIA TUXA RIACHO SERRA BRANCA</option>
              <option value="ALTO DO CRUZEIRO">ALTO DO CRUZEIRO</option>
              <option value="ALTO DO FUNDAO">ALTO DO FUNDAO</option>
              <option value="BARREIROS DA PASSAGEM">BARREIROS DA PASSAGEM</option>
              <option value="CALUMBI">CALUMBI</option>
              <option value="CAMPO VERDE">CAMPO VERDE</option>
              <option value="CANABRAVA">CANABRAVA</option>
              <option value="CANTINHO 1">CANTINHO 1</option>
              <option value="CANTINHO 2 ">CANTINHO 2 </option>
              <option value="CENTRO">CENTRO</option>
              <option value="CIDADE NOVA">CIDADE NOVA</option>
              <option value="FAZENDA GRANDE">FAZENDA GRANDE</option>
              <option value="IBOTIRAMINHA">IBOTIRAMINHA</option>
              <option value="JARDIM IMPERIAL">JARDIM IMPERIAL</option>
              <option value="JARDIM NOVO TEMPO">JARDIM NOVO TEMPO</option>
              <option value="KM7">KM7</option>
              <option value="KM8">KM8</option>
              <option value="KM9">KM9</option>
              <option value="KM10">KM10</option>
              <option value="MARIA DA LUZ">MARIA DA LUZ</option>
              <option value="NEGO DO BODE">NEGO DO BODE</option>
              <option value="OLHOS DAGUAS">OLHOS DAGUAS</option>
              <option value="PASSAGEM">PASSAGEM</option>
              <option value="PIXAIN">PIXAIN</option>
              <option value="POV. DAS PEDRAS">POV. DAS PEDRAS</option>
              <option value="REFORMA CAPITAO LAMARCAR">REFORMA CAPITAO LAMARCAR</option>
              <option value="REFORMA RIACHO DE SERRA BRANCA">REFORMA RIACHO DE SERRA BRANCA</option>
              <option value="RIACHO DE SERRA BRANCA">RIACHO DE SERRA BRANCA</option>
              <option value="SAO FRANCISCO">SAO FRANCISCO </option>
              <option value="SAO JOAO">SAO JOAO</option>
              <option value="TIXINHAS">TIXINHAS</option>
              <option value="VEREDINHA">VEREDINHA</option>
              <option value="XIXA">XIXA</option>
            </select>
          </div>
          <div class="col-md-5 col-sm-12">
            <label for="recipient-rua" class="col-form-label">RUA:</label>
            <input type="text" name="rua" id="rua" maxlength="50" class="form-control -10">
          </div>
          <div class="col-md-2 col-sm-12">
            <label for="recipient-numero" class="col-form-label">N</label>
            :
            <input type="text" name="numero" id="numero" maxlength="50" class="form-control -10 border border-warning" >
          </div>
          <div class="col-md-5 col-sm-12">
            <label for="recipient-bairro" class="col-form-label">SINAL:</label>
            <input type="text" name="sinal" id="sinal" maxlength="50" class="form-control">
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-rua" class="col-form-label">PPPOE:</label>
            <input type="text" name="pppoe" id="pppoe" maxlength="50" class="form-control -10">
          </div>
          <div class="col-md-5 col-sm-10">
            <label for="recipient-rua" class="col-form-label">REDE WIFI ATUAL:</label>
            <input type="text" name="rede" id="rede" maxlength="50" class="form-control -10">
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-rua" class="col-form-label">SENHA WIFI ATUAL:</label>
            <input type="text" name="redesenha" id="redesenha" maxlength="50" class="form-control -10">
          </div>
          <div class="col-md-3 col-sm-12">
            <label for="recipient-numero" class="col-form-label">PLANO</label>
            :
            <select class="form-control form-select-lg mb-5 select2" name="plano" id="plano" aria-label=".form-select-lg example">
              <option value="30 MEGA">30 MEGA</option>
              <option value="110 MEGA">110 MEGA</option>
              <option value="200 MEGA">200 MEGA</option>
              <option value="310 MEGA">310 MEGA</option>
              <option value="510 MEGA">510 MEGA</option>
              <option value="710 MEGA">710 MEGA</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <label for="recipient-operador" class="col-form-label cli">ATENDENTE:</label>
            <input type="text" name="operador" id="operador" maxlength="50" class="form-control" disabled value="<?php echo $_SESSION['usuarioNome'] ?>">
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-dataCadastro" class="col-form-label">DATA DO CADASTRO:</label>
            <input type="text" class="form-control" value="<?php echo date('d/m/Y - H:i:s') ?>" disabled>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-status" class="col-form-label">SITUAÇÃO</label>
            <input type="text" name="status" id="status" maxlength="50" class="form-control" value="A LANÇAR" >
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary" id="btn-cadastrar">Salvar</button>
        </div>
        </div>
      </form>
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
          <div class="col-md-8 col-sm-12">
            <label for="recipient-situacao" class="col-form-label">SITUACAO</label>
            <input type="text" class="form-control" id="recipient-situacao" disabled>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-veiculo" class="col-form-label">SINAL</label>
            <input type="text" name="veiculo" id="recipient-veiculo" maxlength="50" class="form-control -10" disabled>
          </div>
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
            <label for="recipient-tecnico" class="col-form-label">OBSERVACAO</label>
            <input type="text" name="observacao" id="recipient-observacao" maxlength="50" class="form-control" disabled>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="recipient-plano" class="col-form-label">PLANO</label>
            <input type="text" name="plano" id="recipient-plano" maxlength="50" class="form-control -10" disabled>
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
		var recipientplano = button.data('whateverplano')
        var recipientoperador = button.data('whateveroperador')
        var recipientsituacao = button.data('whateversituacao')
        var recipientdataCadastro = button.data('whateverdata-cadastro')
        var recipientalterado_por = button.data('whateveralterado_por')
        var recipientultima_alteracao = button.data('whateverultima_alteracao')

        var modal = $(this)
        modal.find('.modal-title').text('VISUALIZAR CHAMADO ID: ' + recipient)
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
      <form method="POST" action="processa_edit_tvbox.php" enctype="multipart/form-data">
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
              <option value="<button type='button' class='btn btn-primary btn-sm'> andamento</button>">EM ANDAMENTO</option>
              <option value="<button type='button' class='btn btn-danger btn-sm' >remarcar</button>">REMARCAR</option>
              <option value="<button type='button' class='btn btn-success btn-sm' >concluido</button>">CONCLUIDO</option>
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
<script>
    $(document).ready(function() {
        $(function() {
            //Pesquisar os cursos sem refresh na página
            $("#pesquisa_cliente").keyup(function() {

                var pesquisa_cliente = $(this).val();

                //Verificar se há algo digitado
                if (pesquisa_cliente != '') {
                    var dados = {
                        palavra: pesquisa_cliente
                    }
                    $.post('busca_clientes.php', dados, function(retorna) {
                        //Mostra dentro da ul os resultado obtidos
                        $(".resultado_cliente").html(retorna);
                    });
                } else {
                    $(".resultado_cliente").html('');
                }
            });
        });

    });
</script> 
