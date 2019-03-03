<script src="lib/js/jquery.js"></script> 
<script src="lib/js/controle.js"></script> 

<?php
include("controller.php");

$_SESSION['chamado'] = listarChamadoId($_SESSION['id']);

$usuarioChamado = listarUsuario($_SESSION['chamado'][1]);
var_dump($usuarioChamado);

$listarComentarios = listarComentarios($_SESSION['id']);

while ($resul = $listarComentarios->fetch_array(MYSQLI_NUM)) {
                
                if($resul[2] == $_SESSION['chamado'][1]){ ?>

                    <!-- Container direito -->
                    <div class="container_comentario" id="valorAqui" data-id="valorAqui">

                        <?php if ($resul[2] == $_SESSION['idUser']) { ?>
                            <form method="POST" action="">
                                <div class="alinha_botao">
                                    <button type="button" class="botao deletar_cartao_comentario botao_icone_comentario" id="deletar_cartao_comentario" name="deletar_cartao_comentario"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    <button type="button" class="botao cancelar_cartao_comentario botao_icone_comentario" id="cancelar_cartao_comentario" name="cancelar_cartao_comentario"><i class="fa fa-close" aria-hidden="true"></i></button>
                                    <button type="button" class="botao editar_cartao_comentario botao_icone_comentario" id="editar_cartao_comentario" name="editar_cartao_comentario"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                </div>
                            </form>
                        <?php } ?>

                        <div class="linha">
                            <div class="img_cartao img_comentario">
                                <img src="../images/perfil/<?php echo $usuarioChamado[5]; ?>" alt="img_cartao" />
                            </div>
                            <div class="balao">
                                <span class="nome_usuario_comentario"><?php echo $usuarioChamado[2];?></span>
                                <span class="data_usuario_comentario"><?php echo dataHoraBras($resul[4]);?></span>
                                <div class="container_input_comentario">
                                    <input type="text" class="campo_sistema digitar_comentario" id="editar_comentario_balao" name="texto" placeholder="Digite aqui..." />
                                </div>
                                <p class="comentario_cartao"><?php echo $resul[3];?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Container esquerdo -->
            <?php 
                } else { ?>
                    <!-- Container esquerdo -->
                    <div class="container_comentario esquerda_comentario" id="valorAqui1" data-id="valorAqui1">

                        <?php if ($resul[2] == $_SESSION['idUser']) { ?>
                            <form method="POST" action="">
                                <div class="alinha_botao">
                                    <button type="button" class="botao deletar_cartao_comentario botao_icone_comentario" id="deletar_cartao_comentario" name="deletar_cartao_comentario" value=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    <button type="button" class="botao cancelar_cartao_comentario botao_icone_comentario" id="cancelar_cartao_comentario" name="cancelar_cartao_comentario"><i class="fa fa-close" aria-hidden="true"></i></button>
                                    <button type="button" class="botao editar_cartao_comentario botao_icone_comentario" id="editar_cartao_comentario" name="editar_cartao_comentario"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                </div>
                            </form>
                        <?php } ?>

                        <div class="linha">
                            <div class="img_cartao img_comentario">
                                <img src="../images/perfil/<?php $usuario = listarUsuario($resul[2]); echo $usuario[5]; ?>" alt="img_cartao" />
                            </div>
                            <div class="balao">
                                <span class="nome_usuario_comentario"><?php echo $usuario[2]; ?></span>
                                <span class="data_usuario_comentario"><?php echo dataHoraBras($resul[4]);?></span>
                                <div class="container_input_comentario">
                                    <input type="text" class="campo_sistema digitar_comentario" id="editar_comentario_balao" name="texto" placeholder="Digite aqui..." />
                                </div>
                                <p class="comentario_cartao"><?php echo $resul[3];?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Container esquerdo -->                
            <?php } } ?>

        </div>