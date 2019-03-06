<?php
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

    //Lista abertura de chamados 
    $listarChamadoUsuario = listarChamadoUsuario(); 
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
    <?php include 'cabecalho_cartao.php'; ?>
    
        <div class="box_visul_pedido">
            
            <?php 
            if ($chamado_concluidos->num_rows) { ?>
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

                <?php while ($resul = $chamado_concluidos->fetch_array(MYSQLI_NUM)) {   ?>
                <!-- Linha pedido -->
                
                <div class="linha_vertical lista_pedido">

                    <div class="tipo_pedido">
                        <i class="fa fa-frown-o" aria-hidden="true"></i>
                    </div>

                    <div class="titulo_pedido">
                        <span class="titulos_box_pedido"><?php echo $resul[3]; ?></span>
                    </div>

                    <div class="data_pedido">
                        <span class="titulos_box_pedido"><?php echo dataHoraBras($resul[5]); ?></span>
                    </div>

                    <div class="tecnico_resp_pedido">
                        <span class="titulos_box_pedido"><?php echo $resul[1]; ?></span>
                    </div>

                    <div class="status_pedido">
                        <span class="titulos_box_pedido"><?php echo $resul[2]; ?></span>
                    </div>                    

                    <div class="botao_pedido">
                            <div class="alinhar_botao">
                                <a href="<?php echo 'cartao.php?id='.$resul[7];  ?>"><button type="submit" class="botao botao_cliente_icone visualizar_modal" id="visualizar_pedido" name="visualizar_pedido" value="<?php echo $resul[7]; ?>"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                            </div>
                    </div>
                </div>
                <!-- Fim Linha pedido -->
                <?php }
            } else { ?>
               <div class="fundao_nenhum">
                    <h1 class="titulo_nenhum">Você não possui nenhum chamado!</h1>
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                </div>
            <?php } ?>            

        </div>
    </div>
</body>
    <script src="lib/js/tinymce/tinymce.min.js"></script>
    <script src="lib/js/library.js"></script>
</html>