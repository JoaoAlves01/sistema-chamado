<?php
    //include("cabecalho_cartao.php");
    include("controller.php");

    if (isset($_SESSION['tipoUsuario'])) {
        if ($_SESSION['tipoUsuario'] == 'tecnico') {
           header("Location: telaChamado.php");
        }        
    }  

    $listarQtdUrgente = listarQtd('urgente');
    $listarQtdAndamento = listarQtd('andamento');
    $listarQtdConcluido = listarQtdConcluido();

    $chamado_urgentes = listarChamado('urgente');
    $chamado_andamentos = listarChamado('andamento');
    $chamado_concluidos = listarChamadoConcluido();    
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
    <script src="lib/js/jquery.js"></script>
    <script src="lib/js/controle.js"></script> 
</head>
<body>
    <?php include 'cabecalho_cartao.php'; ?>
        <div class="box_visul_pedido">
            <div class="linha_vertical" id="linha_titulo_cliente">
                <div class="tipo_pedido"></div>

                <div class="titulo_pedido">
                    <span class="titulos_box_pedido">Título</span>
                </div>

                <div class="data_pedido">
                    <span class="titulos_box_pedido">Data</span>
                </div>

                <div class="tecnico_resp_pedido">
                    <span class="titulos_box_pedido">Técnico Responsável</span>
                </div>

                <div class="status_pedido">
                    <span class="titulos_box_pedido">Status</span>
                </div>

                <div class="botao_pedido">
                    <span class="titulos_box_pedido">Ação</span>
                </div>

            </div>

            <!-- Começa pegando por aqui noob-->
            <div class="linha_vertical lista_pedido">

                <div class="tipo_pedido">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                </div>

                <div class="titulo_pedido">
                    <span class="titulos_box_pedido">Nome do cartão de pedido solicitado</span>
                </div>

                <div class="data_pedido">
                    <span class="titulos_box_pedido">00/00/0000</span>
                </div>

                <div class="tecnico_resp_pedido">
                    <span class="titulos_box_pedido">João Pedro Alves de Sousa</span>
                </div>

                <div class="status_pedido">
                    <span class="titulos_box_pedido">Urgente</span>
                </div>

                <div class="botao_pedido">
                    <form method="POST" action="">
                        <div class="alinhar_botao">
                            <button type="submit" class="botao botao_cliente_icone visualizar_modal" id="visualizar_pedido" name="visualizar_pedido" value=""><i class="fa fa-eye" aria-hidden="true"></i></button>
                            <button type="submit" class="botao botao_cliente_icone editar_modal" id="editar_pedido" name="editar_pedido" value=""><i class="fa fa-pencil" aria-hidden="true"></i></button>
                            <button type="button" class="botao botao_cliente_icone excluir_modal" id="excluir_pedido" name="excluir_pedido" value="1"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="linha_vertical lista_pedido">
                <div class="tipo_pedido">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                </div>

                <div class="titulo_pedido">
                    <span class="titulos_box_pedido">Nome do cartão de pedido solicitado</span>
                </div>

                <div class="data_pedido">
                    <span class="titulos_box_pedido">00/00/0000</span>
                </div>

                <div class="tecnico_resp_pedido">
                    <span class="titulos_box_pedido">João Pedro Alves de Sousa</span>
                </div>

                <div class="status_pedido">
                    <span class="titulos_box_pedido">Andamento</span>
                </div>

                <div class="botao_pedido">
                    <form method="POST" action="">
                        <div class="alinhar_botao">
                            <button type="submit" class="botao botao_cliente_icone" id="visualizar_pedido" name="visualizar_pedido"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            <button type="submit" class="botao botao_cliente_icone" id="editar_pedido" name="editar_pedido"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                            <button type="button" class="botao botao_cliente_icone excluir_modal" id="excluir_pedido" name="excluir_pedido"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="linha_vertical lista_pedido">
                <div class="tipo_pedido">
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                </div>

                <div class="titulo_pedido">
                    <span class="titulos_box_pedido">Nome do cartão de pedido solicitado</span>
                </div>

                <div class="data_pedido">
                    <span class="titulos_box_pedido">00/00/0000</span>
                </div>

                <div class="tecnico_resp_pedido">
                    <span class="titulos_box_pedido">João Pedro Alves de Sousa</span>
                </div>

                <div class="status_pedido">
                    <span class="titulos_box_pedido">Concluído</span>
                </div>

                <div class="botao_pedido">
                    <form method="POST" action="">
                        <div class="alinhar_botao">
                            <button type="submit" class="botao botao_cliente_icone" id="visualizar_pedido" name="visualizar_pedido"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            <button type="submit" class="botao botao_cliente_icone" id="editar_pedido" name="editar_pedido"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                            <button type="button" class="botao botao_cliente_icone excluir_modal" id="excluir_pedido" name="excluir_pedido"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>