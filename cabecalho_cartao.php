    <div class="fundo_excluir_pedido">
        <div class="modal_exclur_pedido">
            <div class="linha_vertical linha_modal">
                <span class="titulo_modal">Excluir</span>
                <span class="fechar_modal"><i class="fa fa-close" aria-hidden="true"></i></span>
            </div>
            <div class="linha linha_modal">
                <label class="acao_desejada">Deseja realmente excluir!</label>
            </div>
            <form method="POST" action="controller.php?f=excluirComentario">
                <div class="alinhar_botao_modal">
                    <button type="submit" class="botao botao_icone" id="cancelar_pedido" name="cancelar_pedido">Sim</button>
                    <button type="button" class="botao botao_icone" id="cancelar_cancelar" name="cancelar_cancelar">Não</button>
                </div>
            </form>
        </div>

        <div class="modal_exclur_chamado">
            <div class="linha_vertical linha_modal">
                <span class="titulo_modal">Excluir</span>
                <span class="fechar_modal"><i class="fa fa-close" aria-hidden="true"></i></span>
            </div>
            <div class="linha linha_modal">
                <label class="acao_desejada">Deseja realmente cancelar!</label>
            </div>
            <form method="POST" action="">
                <div class="alinhar_botao_modal">
                    <button type="submit" class="botao botao_icone" id="cancelar_pedido" name="cancelar_pedido">Sim</button>
                    <button type="button" class="botao botao_icone" id="cancelar_cancelar" name="cancelar_cancelar">Não</button>
                </div>
            </form>
        </div>  

        <?php
            if ($_SESSION['tipoUsuario'] != 'tecnico') { 

          ?>
            <div class="modal_novo_pedido">
                <div class="linha_vertical linha_modal">
                    <span class="titulo_modal">Abrir Chamado</span>
                    <span class="fechar_modal"><i class="fa fa-close" aria-hidden="true"></i></span>
                </div>
                <form method="POST" action="controller.php?f=addChamado">
                    <div class="linha linha_modal" id="modal_nv_pedido">
                        <label class="label_sistema">Título do cartão</label>
                        <input type="text" class="campo_sistema" name="titulo" placeholder="Informe o nome do cartão..." />

                        <label class="label_sistema">Texto</label>
                        <textarea rows="3" name="texto" id="texto"></textarea>

                        <label class="label_sistema">Status</label>
                        <select class="campo_sistema" name="status">
                            <option value="Urgente">Urgente</option>
                            <option value="Andamento">Normal</option>
                        </select>
                    </div>
                    <div class="alinhar_botao_modal">
                        <button type="submit" class="botao botao_icone" id="salvar_pedido" name="salvar_pedido">Salvar</button>
                        <button type="button" class="botao botao_icone" id="cancelar_cancelar" name="cancelar_cancelar">Cancelar</button>
                    </div>
                </form>
            </div>
        <?php  } ?> 

    </div>

    <div class="faixa_info">
        <div class="box_pontos">
            <div class="box_trofeu" id="img_usuario">
                <img src="../images/perfil/<?php $usuarioChamado = listarUsuario($_SESSION['idUser']); echo $usuarioChamado[5]; ?>" alt="img_usuario" class="centralizar_img" />
            </div>
        </div>

        <div class="mini_menu_usuario">
            <nav>
                <ul class="menu">
                    <li><a href="perfil.php?idUI="><i class="fa fa-user" aria-hidden="true"></i>Perfil</a></li>
                    <li><a href="telaHistoricoChamado.php"><i class="fa fa-user" aria-hidden="true"></i>Histórico</a></li>
                    <li><a href="deslogar.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Deslogar</a></li>
                </ul>
            </nav>
        </div>

        <?php
            if ($_SESSION['tipoUsuario'] != 'tecnico') {
        ?>

            <div class="box_pontos">
                <div class="box_trofeu abrir_chamado">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                </div>
                <span>Abrir<br>chamado</span>
            </div>
        <?php } ?>

        <div class="box_pontos">
            <div class="box_trofeu">
                <i class="fa fa-frown-o" aria-hidden="true"></i>
            </div>
            <span>Urgente<small><div class="num_urgente" id="num_urgente"><?php echo $listarQtdUrgente[0]; ?></div></small></span>
        </div>

        <div class="box_pontos">
            <div class="box_trofeu">
                <i class="fa fa-cogs" aria-hidden="true"></i>
            </div>
            <span>Em andamento<small><div class="num_andamento" id="num_andamento"><?php echo $listarQtdAndamento[0]; ?></div></small></span>
        </div>

        <div class="box_pontos">
            <div class="box_trofeu">
                <i class="fa fa-smile-o" aria-hidden="true"></i>
            </div>
            <span>Concluído<small><div class="num_concluido" id="num_concluido"><?php echo $listarQtdConcluido[0]; ?></div></small></span>
        </div>
    </div>

    <script>aumentarPedidos();</script>
                
    <div class="envelope">