<?php
    include("controller.php");

    if (!isset($_SESSION['user'])) {
        header("Location: login.php?login=n");
    }

    include("cabecalho_card.php");

    if (isset($_GET['id'])) {
        $_SESSION['id'] = $_GET['id'];

        //listar chamado
        $_SESSION['chamado'] = listarChamadoId($_SESSION['id']);
        $usuarioChamado = listarUsuario($_SESSION['chamado'][1]);

        //Listar comentarios
        $listarComentarios = listarComentarios($_SESSION['chamado'][0]);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sistema de Chamadas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="lib/css/estilo.css">
    <link rel="stylesheet" type="text/css" href="lib/css/estilo_mobile.css">
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap-theme.min.css">
    <script src="lib/js/jquery.js"></script>
    <script src="lib/js/controle.js"></script> 
</head>
<body>
        <div class="container_info_cartao"> 
            <div class="linha">
                <div class="img_cartao" id="img_cartao">
                    <img src="../images/perfil/<?php echo $usuarioChamado[5]; ?>" alt="img_cartao" />
                </div>
                <span class="nome_usuario_cartao"><a href="perfil.php"><?php echo $usuarioChamado[2]; ?></a><small><?php echo dataHoraBras($_SESSION['chamado'][5]); ?></small></span>
            </div>

            <div class="linha">
                <span class="situacao_pedido">Status do Pedido<small>Acompanhe aqui o status do seu pedido</small></span>
            </div>
            
            <div class="linha_vertical">
                <div class="status status_inicio" id="status_inicio">
                    <i class="fa fa-play-circle" aria-hidden="true" alt="teste"></i>
                    <span class="titulo_status">Início</span>
                </div>

                <div class="status status_andamento" id="status_andamento">
                    <i class="fa fa-spinner" aria-hidden="true"></i>
                    <span class="titulo_status">Andamento</span>
                </div>

                <div class="status status_feedback" id="status_feedback">
                <i class="fa fa-comments-o" aria-hidden="true"></i>
                    <span class="titulo_status">Feedback</span>
                </div>

                <div class="status status_final" id="status_final">
                    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                    <span class="titulo_status">Concluído/Cancelado</span>
                </div>
            </div>

            <div class="titulo_descricao_cartao">
                <span>
                   <?php echo $_SESSION['chamado'][4]; ?>
                </span>
            </div>

            <?php if ($_SESSION['chamado'][1] == $_SESSION['idUser']) { ?>
            <form method="POST" action="">
                <div class="alinha_botao" id="linha_post">
                    <button type="submit" class="botao botao_icone editar_cartao" id="editar_cartao" name="editar_cartao"><i class="fa fa-pencil" aria-hidden="true"></i>Editar</button>
                    <button type="button" class="botao botao_icone deletar_cartao" id="deletar_cartao" name="deletar_cartao" value=""><i class="fa fa-trash-o" aria-hidden="true"></i>Excluir</button>
                </div>
            </form>
            <?php } ?>

            <div id="caixaComentarios">

            </div>

            <div class="container_novo_comentario">
                <div class="linha_vertical">
                    <div class="img_cartao img_comentario" id="comentar">
                        <img src="../images/perfil/<?php echo $_SESSION['foto']; ?>" alt="img_cartao" />
                    </div>
                    <input type="hidden" id="idChamada" name="idChamada" value="<?php echo $_SESSION['chamado'][0]; ?>">
                    <input type="text" class="campo_sistema" id="nome_cartao_urgente" name="texto" placeholder="Digite aqui..." />
                    <button type="submit" class="botao botao_icone enviar_msg" id="enviar_msg" name="enviar_msg">Enviar</button>
                </div>
            </div>
        </div>
        <script>
            
            $(document).ready(function(){
                $.ajax({
                    url: "carregarComentarios.php",
                    dataType: "html",
                    success: function(Result){
                        $('#caixaComentarios').html(Result);
                    }
                })
                
                $('#enviar_msg').click(function(){
                    var texto = $('#nome_cartao_urgente').val();
                    var idChamada = $('#idChamada').val();

                    //Chama o ajax
                    $.ajax({
                      type: 'POST',
                      dataType: 'json',
                      url: 'controller.php?f=comentario',
                      async: true,
                      data: 'texto='+texto+'&idChamada='+idChamada,
                      success: function(response) {
                        console.log(response);
                        $('#nome_cartao_urgente').val('');
                      }
                    });

                    $.ajax({
                        url: "carregarComentarios.php",
                        dataType: "html",
                        success: function(Result){
                            $('#caixaComentarios').html(Result);
                        }
                    })
                });
            });
        </script>
        <script src="lib/js/tinymce/tinymce.min.js"></script>
    <script src="lib/js/library.js"></script>
<?php
    include("footer_cartao.php");
?>