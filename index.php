<?php
session_start();
include('config/conexao.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>LOGIN - HB SOLUTIONS</title>
<link href="css/styles.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
  <div id="layoutAuthentication_content">
    <main>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
              <div class="card-header"><img  src="img/xgs2.png" class="img-fluid" alt="..." width="200"  /></div>
              <div class="card-body">
                <form class="needs-validation" novalidate method="POST" action="valida.php">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="usuario" placeholder="Informe seu usuário" required>
                    <label for="inputEmail">Login</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Password" required>
                    <label for="inputPassword">Senha</label>
                  </div>
                  <div class="form-check mb-3">
                  
                    <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                    <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                  </div><?php
if (isset($_SESSION['loginErro'])) {
    echo $_SESSION['loginErro'];
    unset($_SESSION['loginErro']);
}
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['tokenEspirado'])) {
    echo $_SESSION['tokenEspirado'];
    unset($_SESSION['tokenEspirado']);
}
?>
                  <div class="d-flex align-items-center justify-content-between mt-4 mb-0"> </div>
                  <input class="btn btn-primary" type='submit' name='OK' value='Entrar'>
                </form>
				
              </div>
              <div class="card-footer text-center py-3">
                <div class="small"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <div id="layoutAuthentication_footer">
    <footer class="py-4 bg-light mt-auto">
      <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
          <div class="text-muted">&copy; <?php echo date('Y') ?></div>
          <div> HB WEB E CIA - All Rights Reserved</div>
        </div>
      </div>
    </footer>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
<script src="js/scripts.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> 
<script>
 // SCRIPT DE VALIDAÇÃO DO PROPRIO BOOTSTRAP
  (function() {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>
</body>
</html>
