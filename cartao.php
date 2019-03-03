<?php
    include("controller.php");
    
    include("cabecalho_card.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        //listar chamado
        $chamado = listarChamadoId($id);
        $usuarioChamado = listarUsuario($chamado[1]);

        //Listar comentarios
        $listarComentarios = listarComentarios($id);
    }
?>
        <div class="container_info_cartao"> 
            <div class="linha">
                <div class="img_cartao" id="img_cartao">
                    <img src="../images/perfil/<?php echo $usuarioChamado[5]; ?>" alt="img_cartao" />
                </div>
                <span class="nome_usuario_cartao"><a href="perfil.php"><?php echo $usuarioChamado[2]; ?></a><small><?php echo dataHoraBras($chamado[5]); ?></small></span>
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
                   <?php echo $chamado[4]; ?>
                </span>
            </div>

            <form method="POST" action="">
                <div class="alinha_botao" id="linha_post">
                    <button type="submit" class="botao botao_icone editar_cartao" id="editar_cartao" name="editar_cartao"><i class="fa fa-pencil" aria-hidden="true"></i>Editar</button>
                    <button type="submit" class="botao botao_icone deletar_cartao" id="deletar_cartao" name="deletar_cartao"><i class="fa fa-trash-o" aria-hidden="true"></i>Excluir</button>
                </div>
            </form>

            <?php while ($resul = $listarComentarios->fetch_array(MYSQLI_NUM)) {
                
                if($resul[2] == $chamado[1]){ ?>

                    <!-- Container direito -->
                    <div class="container_comentario">
                        <form method="POST" action="">
                            <div class="alinha_botao">
                                <button type="submit" class="botao botao_icone_comentario" id="deletar_cartao_comentario" name="deletar_cartao_comentario"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                <button type="submit" class="botao botao_icone_comentario" id="editar_cartao_comentario" name="editar_cartao_comentario"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                            </div>
                        </form>
                        <div class="linha">
                            <div class="img_cartao img_comentario">
                                <img src="../images/perfil/<?php echo $usuarioChamado[5]; ?>" alt="img_cartao" />
                            </div>
                            <span class="nome_usuario_comentario"><?php echo $usuarioChamado[2];  ?></span>
                            <span class="data_usuario_comentario"><?php echo dataHoraBras($resul[4]);  ?></span>
                            <p class="comentario_cartao">
                                <?php echo $resul[3];  ?>
                            </p>
                        </div>
                    </div>
                    <!-- Fim Container esquerdo -->
            <?php 
                } else { ?>
                    <!-- Container esquerdo -->
                    <div class="container_comentario esquerda_comentario">
                        <form method="POST" action="">
                            <div class="alinha_botao">
                                <button type="submit" class="botao botao_icone_comentario" id="deletar_cartao_comentario" name="deletar_cartao_comentario"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                <button type="submit" class="botao botao_icone_comentario" id="editar_cartao_comentario" name="editar_cartao_comentario"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                            </div>
                        </form>
                        <div class="linha">
                            <div class="img_cartao img_comentario">
                                <img src="img/img_cartao.jpg" alt="img_cartao" />
                            </div>
                            <span class="nome_usuario_comentario">João Pedro Alves de Sousa</span>
                            <span class="data_usuario_comentario">7:30 AM Hoje</span>
                            <p class="comentario_cartao">
                                <?php echo $resul[3];  ?>
                            </p>
                        </div>
                    </div>
                    <!-- Fim Container esquerdo -->                
            <?php } } ?>

            <div class="container_novo_comentario">
                <form method="POST" action="">
                    <div class="linha_vertical">
                        <div class="img_cartao img_comentario" id="comentar">
                            <img src="img/img_cartao.jpg" alt="img_cartao" />
                        </div>
                        <input type="text" class="campo_sistema" id="nome_cartao_urgente" name="nome_cartao_urgente" placeholder="Digite aqui..." />
                        <button type="submit" class="botao botao_icone enviar_msg" id="enviar_msg" name="enviar_msg">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
<?php
    include("footer_cartao.php");
?>