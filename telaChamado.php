<?php

    //include("cabecalho_cartao.php");
    include("controller.php");

    if (isset($_SESSION['tipoUsuario'])) {
        if ($_SESSION['tipoUsuario'] == 'usuario') {
           header("Location: telaCliente.php");
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

        <div class="linha" id="container_cartao">

            <!-- Box chamado novo -->
            <div class="box_pedido normal" id="normal" data-id="normal">
                <div class="linha">
                    <span class="titulo_box">Pedidos Abertos</span>
                </div>                
                <div class="capsula_pedidos normal_scroll">

                    <?php 
                    while ($resul = $chamado_urgentes->fetch_array(MYSQLI_NUM)) {
                        if ($_SESSION['idUser'] != $resul[1]) {
                    ?>
                    <!-- item Cartao -->
                        <a href="<?php echo 'cartao.php?id='.$resul[7]; ?>">
                            <div class="box_solicitacao">
                                <div class="linha_vertical">
                                    <span class="titulo_cartao">
                                        <?php echo $resul[3];  ?>
                                    </span>
                                </div>
                                <div class="descricao_cartao">
                                   <?php echo $resul[4];  ?>
                                </div>
                                <div class="tempo_cartao">
                                    <i class="fa fa-clock-o" aria-hidden="true"><span><?php echo dataHoraBras($resul[5]);  ?></span></i>
                                </div>
                            </div>
                        </a>
                    <!-- Fim item Cartao -->
                    <?php } } ?>

                </div>            
            </div>

            <!-- Card do chamado -->
            <div class="box_pedido urgente" id="urgente" data-id="urgente">
                <div class="linha">
                    <span class="titulo_box">Pedidos Urgentes</span>
                </div>                
                <div class="capsula_pedidos urgente_scroll">

                    <?php 
                    while ($resul = $chamado_urgentes->fetch_array(MYSQLI_NUM)) {
                        if ($_SESSION['idUser'] != $resul[1]) {
                    ?>
                    <!-- item Cartao -->
                        <a href="<?php echo 'cartao.php?id='.$resul[7]; ?>">
                            <div class="box_solicitacao">
                                <div class="linha_vertical">
                                    <span class="titulo_cartao">
                                        <?php echo $resul[3];  ?>
                                    </span>
                                </div>
                                <div class="descricao_cartao">
                                   <?php echo $resul[4];  ?>
                                </div>
                                <div class="tempo_cartao">
                                    <i class="fa fa-clock-o" aria-hidden="true"><span><?php echo dataHoraBras($resul[5]);  ?></span></i>
                                </div>
                            </div>
                        </a>
                    <!-- Fim item Cartao -->
                    <?php } } ?>

                </div>            
            </div>
            <!-- Fim do chamado -->

            <div class="box_pedido andamento" id="andamento" data-id="andamento">
                <div class="linha">
                    <span class="titulo_box">Pedidos em andamento</span>
                </div>
                
                <div class="capsula_pedidos andamento_scroll">

                    <?php 
                    while ($resul = $chamado_andamentos->fetch_array(MYSQLI_NUM)) {
                        if ($_SESSION['idUser'] != $resul[1]) {
                    ?>
                    <!-- item Cartao -->
                    <a href="<?php echo 'cartao.php?id='.$resul[7]; ?>">
                        <div class="box_solicitacao">
                            <div class="linha_vertical">
                                <span class="titulo_cartao">
                                    <?php echo $resul[3];  ?>
                                </span>
                            </div>
                            
                            <div class="descricao_cartao">
                                <?php echo $resul[4];  ?>
                            </div>

                            <div class="tempo_cartao">
                                <i class="fa fa-clock-o" aria-hidden="true"><span><?php echo dataHoraBras($resul[5]);  ?></span></i>
                            </div>
                        </div>
                    </a>
                    <!-- Fim item Cartao -->
                    <?php } } ?>

                </div>
            </div>

            <div class="box_pedido concluido" id="concluido" data-id="concluido">
                <div class="linha">
                    <span class="titulo_box">Pedidos concluidos</span>
                </div>

                <div class="capsula_pedidos concluido_scroll">

                    <?php 
                    while ($resul = $chamado_concluidos->fetch_array(MYSQLI_NUM)) { 
                        if ($_SESSION['idUser'] != $resul[1]) {
                    ?>
                    <!-- item Cartao -->
                    <a href="<?php echo 'cartao.php?id='.$resul[7]; ?>">
                        <div class="box_solicitacao">
                            <div class="linha_vertical">
                                <span class="titulo_cartao">
                                    <?php echo $resul[3];  ?>
                                </span>
                            </div>
                            
                            <div class="descricao_cartao">
                                <?php echo $resul[4];  ?>
                            </div>

                            <div class="tempo_cartao">
                                <i class="fa fa-clock-o" aria-hidden="true"><span><?php echo dataHoraBras($resul[5]);  ?></span></i>
                            </div>
                        </div>
                    </a>
                    <!-- Fim item Cartao -->
                    <?php } } ?>

                </div>
            </div>
        </div>
<?php
    include("footer_cartao.php");
?>