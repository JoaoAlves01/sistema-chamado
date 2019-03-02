<?php
 include("cabecalho_cartao.php");
?>
        <div class="linha">

            <!-- Card do chamado -->
            <div class="box_pedido urgente" id="urgente" data-id="urgente">
                <div class="linha">
                    <span class="titulo_box">Pedidos Urgentes</span>
                </div>                
                <div class="capsula_pedidos urgente_scroll">

                    <!-- item Cartao -->
                    <a href="#">
                        <div class="box_solicitacao">
                            <div class="linha_vertical">
                                <span class="titulo_cartao">
                                    Titulo Cartão
                                </span>

                                <div class="img_cartao">
                                    <img src="img/img_cartao.jpg" alt="img_cartao" />
                                </div>
                            </div>
                            <div class="descricao_cartao">
                                Aliqua wiiiii adipisicing ullamco dolor commodo reprehenderit chasy la bodaaa uuuhhh. Minim tempor poulet tikka masala po kass tulaliloo aaaaaah tatata bala tu po kass.
                            </div>
                            <div class="tempo_cartao">
                                <i class="fa fa-clock-o" aria-hidden="true"><span>5 horas fev</span></i>
                            </div>
                        </div>
                    </a>
                    <!-- Fim item Cartao -->

                </div>            
                <div class="linha_vertical">
                    <button type="button" class="botao novo_cartao" id="botao_novo_cartao" name="botao_novo_cartao">Adicionar novo cartão</button>
                </div>

                <form method="POST" action="" class="formulario_novo_cartao" enctype="multipart/form-data">
                    <div class="linha_vertical">
                        <button type="button" class="botao fechar fechar_novo_cartao_urgente" id="fechar_novo_cartao_urgente" name="fechar_novo_cartao_urgente"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>

                    <div class="linha_vertical" id="adicionar_cartao">
                        <input type="text" class="campo_sistema campo_new_cartao" id="nome_cartao_urgente" name="nome_cartao_urgente" placeholder="Informe um título..." />
                        <input type="file" class="update_arquivo" id="img_cartao_urgente" name="img_cartao_urgente" />
                    </div>

                    <div class="linha_vertical">
                        <button type="button" class="botao salvar_cartao_urgente" name="botao_adicionar_cartao_urgente">Salvar cartão</button>
                    </div>
                </form>
            </div>
            <!-- Fim do chamado -->

            <div class="box_pedido andamento" id="andamento" data-id="andamento">
                <div class="linha">
                    <span class="titulo_box">Pedidos em andamento</span>
                </div>
                
                <div class="capsula_pedidos andamento_scroll">
                    <a href="#">
                        <div class="box_solicitacao">
                            <div class="linha_vertical">
                                <span class="titulo_cartao">
                                    Titulo Cartão
                                </span>

                                <div class="img_cartao">
                                    <img src="img/img_cartao.jpg" alt="img_cartao" />
                                </div>
                            </div>
                            
                            <div class="descricao_cartao">
                                Aliqua wiiiii adipisicing ullamco dolor commodo reprehenderit chasy la bodaaa uuuhhh. Minim tempor poulet tikka masala po kass tulaliloo aaaaaah tatata bala tu po kass.
                            </div>

                            <div class="tempo_cartao">
                                <i class="fa fa-clock-o" aria-hidden="true"><span>5 horas fev</span></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="linha_vertical">
                    <button type="button" class="botao novo_cartao" id="botao_novo_cartao" name="botao_novo_cartao">Adicionar novo cartão</button>
                </div>

                <form method="POST" action="" class="formulario_novo_cartao">
                    <div class="linha_vertical">
                        <button type="button" class="botao fechar fechar_novo_cartao_andamento" id="fechar_novo_cartao_andamento" name="fechar_novo_cartao_andamento"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>

                    <div class="linha_vertical" id="adicionar_cartao">
                        <input type="text" class="campo_sistema campo_new_cartao" id="nome_cartao_andamento" name="nome_cartao_andamento" placeholder="Informe um título..." />
                        <input type="file" class="update_arquivo" id="img_cartao_andamento" name="img_cartao_andamento" />
                    </div>

                    <div class="linha_vertical">
                        <button type="button" class="botao salvar_cartao_andamento" name="botao_adicionar_cartao_andamento">Salvar cartão</button>
                    </div>
                </form>
            </div>

            <div class="box_pedido concluido" id="concluido" data-id="concluido">
                <div class="linha">
                    <span class="titulo_box">Pedidos concluidos</span>
                </div>

                <div class="capsula_pedidos concluido_scroll">
                    <a href="#">
                        <div class="box_solicitacao">
                            <div class="linha_vertical">
                                <span class="titulo_cartao">
                                    Titulo Cartão
                                </span>

                                <div class="img_cartao">
                                    <img src="img/img_cartao.jpg" alt="img_cartao" />
                                </div>
                            </div>
                            
                            <div class="descricao_cartao">
                                Aliqua wiiiii adipisicing ullamco dolor commodo reprehenderit chasy la bodaaa uuuhhh. Minim tempor poulet tikka masala po kass tulaliloo aaaaaah tatata bala tu po kass.
                            </div>

                            <div class="tempo_cartao">
                                <i class="fa fa-clock-o" aria-hidden="true"><span>5 horas fev</span></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="linha_vertical">
                    <button type="button" class="botao novo_cartao" id="botao_novo_cartao" name="botao_novo_cartao">Adicionar novo cartão</button>
                </div>

                <form method="POST" action="" class="formulario_novo_cartao">
                    <div class="linha_vertical">
                        <button type="button" class="botao fechar fechar_novo_cartao_concluido" id="fechar_novo_cartao_concluido" name="fechar_novo_cartao_concluido"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>

                    <div class="linha_vertical" id="adicionar_cartao">
                        <input type="text" class="campo_sistema campo_new_cartao" id="nome_cartao_concluido" name="nome_cartao_concluido" placeholder="Informe um título..." />
                        <input type="file" class="update_arquivo" id="img_cartao_concluido" name="img_cartao_concluido" />
                    </div>

                    <div class="linha_vertical">
                        <button type="button" class="botao salvar_cartao_concluido" name="botao_adicionar_cartao_concluido">Salvar cartão</button>
                    </div>
                </form>
            </div>
        </div>
<?php
    include("footer_cartao.php");
?>