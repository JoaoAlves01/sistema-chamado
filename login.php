<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Titulo Cartão</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="lib/css/estilo.css">
    <link rel="stylesheet" type="text/css" href="lib/css/estilo_mobile.css">
    <script src="lib/js/jquery.js"></script> 
    <script src="lib/js/controle.js"></script> 
  </head>

  <body>
    <div class="container_form">
        <!-- Box do cliente -->
        <div class="box_cliente">
            <form method="POST" action="controller.php?f=loginU">
                <div class="linha_vertical">
                    <span class="titulo_login">Login no sistema<small>Acessar como cliente</small></span>
                </div>
                <div class="container_formulario">
                    <span class="label_sistema">Matricula</span>
                    <div class="linha">
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
                        <input type="text" class="campo_sistema" id="usuario" name="login" />
                    </div>

                    <div class="linha_vertical" id="linha_post">
                        <button type="submit" class="botao botao_icone" id="logar_sistema" name="enviar" value="Entrar"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</button>
                    </div>

                    <div class="linha_vertical">
                        <a href="#" class="tipo_acesso">Acessar como técnico</a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Box do tecnico -->
        <div class="box_tecnico">
            <form method="POST" action="controller.php?f=loginT">
                <div class="linha_vertical">
                    <span class="titulo_login">Login no sistema<small>Acessar como técnico</small></span>
                </div>
                <div class="container_formulario">
                    <span class="label_sistema">Matricula</span>
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
                    <div class="linha">
                        <input type="text" class="campo_sistema" name="login" placeholder="matricula" required=""  />
                    </div>

                    <div class="linha_vertical" id="linha_post">
                        <button type="submit" class="botao botao_icone" id="logar_sistema" name="enviar" value="Entrar"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</button>
                    </div>

                    <div class="linha_vertical">
                        <a href="#" class="tipo_acesso">Acessar como cliente</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </body>
</html>
