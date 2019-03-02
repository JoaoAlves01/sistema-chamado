<?php
    include("controller.php");

    $chamado_urgentes = listarChamado('urgente');
    $chamado_andamentos = listarChamado('andamento');
    $chamado_concluidos = listarChamadoConcluido();

    include("cabecalho_cartao.php");
?>
        <div class="linha">

            <!-- Card do chamado -->
            <div class="box_pedido urgente" id="urgente" data-id="urgente">
                <div class="linha">
                    <span class="titulo_box">Pedidos Urgentes</span>
                </div>                
                <div class="capsula_pedidos urgente_scroll">

                    <?php 
                    while ($resul = $chamado_urgentes->fetch_array(MYSQLI_NUM)) { 
                    ?>
                    <!-- item Cartao -->
                    <a href="<?php echo $resul[0];  ?>">
                        <div class="box_solicitacao">
                            <div class="linha_vertical">
                                <span class="titulo_cartao">
                                    <?php echo $resul[3];  ?>
                                </span>

                                <div class="img_cartao">
                                    <img src="img/img_cartao.jpg" alt="img_cartao" />
                                </div>
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
                    <?php } ?>

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
                    ?>
                    <!-- item Cartao -->
                    <a href="<?php echo $resul[0];  ?>">
                        <div class="box_solicitacao">
                            <div class="linha_vertical">
                                <span class="titulo_cartao">
                                    <?php echo $resul[3];  ?>
                                </span>

                                <div class="img_cartao">
                                    <img src="img/img_cartao.jpg" alt="img_cartao" />
                                </div>
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
                    <?php } ?>

                </div>
            </div>

            <div class="box_pedido concluido" id="concluido" data-id="concluido">
                <div class="linha">
                    <span class="titulo_box">Pedidos concluidos</span>
                </div>

                <div class="capsula_pedidos concluido_scroll">

                    <?php 
                    while ($resul = $chamado_concluidos->fetch_array(MYSQLI_NUM)) { 
                    ?>
                    <!-- item Cartao -->
                    <a href="<?php echo $resul[0];  ?>">
                        <div class="box_solicitacao">
                            <div class="linha_vertical">
                                <span class="titulo_cartao">
                                    <?php echo $resul[3];  ?>
                                </span>

                                <div class="img_cartao">
                                    <img src="img/img_cartao.jpg" alt="img_cartao" />
                                </div>
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
                    <?php } ?>

                </div>
            </div>
        </div>
<?php
    include("footer_cartao.php");
?>