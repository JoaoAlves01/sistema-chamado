<!DOCTYPE html>
<html lang="pt_br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>School SAE | Dashboard </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <div><h1>Simulador de chamados</h1></div>
          <section class="login_content">
            <form method="POST" action="controller.php?f=loginT">

              <h1>Login Técnico</h1>
              <div>
                <?php
                //verifica se o login esta errado, recebendo via get a informação da url.
                if (isset($_GET['login'])) {                
              ?> 
                <div class="alert alert-danger" role="alert">
                  <strong>ERROR:</strong> Login ou senha inválidos!
                </div>
              <?php
                }
              ?>
                <input type="text" name="login" class="form-control" placeholder="matricula" required="" />
              </div>
              <div>
                <input type="submit" name="enviar" class="btn btn-default submit" value="Entrar">
                <a class="reset_pass" href="#">Esqueceu sua senha?</a>
              </div>
            </form>

             <form method="POST" action="controller.php?f=loginU">

              <h1>Login usúario</h1>
              <div>
                <?php
                //verifica se o login esta errado, recebendo via get a informação da url.
                if (isset($_GET['login'])) {                
              ?> 
                <div class="alert alert-danger" role="alert">
                  <strong>ERROR:</strong> Login ou senha inválidos!
                </div>
              <?php
                }
              ?>
                <input type="text" name="login" class="form-control" placeholder="matricula" required="" />
              </div>
              <div>
                <input type="submit" name="enviar" class="btn btn-default submit" value="Entrar">
                <a class="reset_pass" href="#">Esqueceu sua senha?</a>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
