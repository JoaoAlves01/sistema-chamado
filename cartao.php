<?php
    include("cabecalho_card.php");
?>
        <div class="container_info_cartao"> 
            <div class="linha">
                <div class="img_cartao" id="img_cartao">
                    <img src="img/img_cartao.jpg" alt="img_cartao" />
                </div>
                <span class="nome_usuario_cartao">João Pedro Alves de Sousa<small>7:30 AM Hoje</small></span>
            </div>

            <div class="linha">
                <span class="situacao_pedido">Status do Pedido<small>Acompanhe aqui o status do seu pedido</small></span>
            </div>

            <div class="img_principal_cartao">
                <img src="img/img_cartao.jpg" alt="img_principal_cartao" />
            </div> 

            <div class="titulo_descricao_cartao">
                <span>
                    Aliqua wiiiii adipisicing ullamco dolor commodo reprehenderit chasy la bodaaa uuuhhh. Minim tempor poulet tikka masala po kass tulaliloo aaaaaah tatata bala tu po kass. Daa me want bananaaa! Hana dul sae sit amet tempor bananaaaa sit amet duis. Labore officia gelatooo ut baboiii eiusmod dolor ti aamoo! Magna nostrud. Bappleees dolore esse nostrud duis la bodaaa. Aliqua elit butt poopayee. Me want bananaaa! bananaaaa adipisicing baboiii enim hahaha esse.
                </span>
            </div>

            <form method="POST" action="">
                <div class="alinha_botao" id="linha_post">
                    <button type="submit" class="botao botao_icone editar_cartao" id="editar_cartao" name="editar_cartao"><i class="fa fa-pencil" aria-hidden="true"></i>Editar</button>
                    <button type="submit" class="botao botao_icone deletar_cartao" id="deletar_cartao" name="deletar_cartao"><i class="fa fa-trash-o" aria-hidden="true"></i>Excluir</button>
                </div>
            </form>

            <div class="container_comentario">
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
                    <span class="data_usuario_comentario"> 7:30 AM Hoje</span>
                    <p class="comentario_cartao">
                    Minions ipsum para tú enim tank yuuu! Pepete reprehenderit. 
                    Sed baboiii bappleees aaaaaah poopayee occaecat ut. 
                    Pepete baboiii aliqua qui hana dul sae baboiii veniam bananaaaa incididunt para tú 
                    tulaliloo.
                    Minions ipsum para tú enim tank yuuu! Pepete reprehenderit. 
                    Sed baboiii bappleees aaaaaah poopayee occaecat ut. 
                    Pepete baboiii aliqua qui hana dul sae baboiii veniam bananaaaa incididunt para tú 
                    tulaliloo.
                    Minions ipsum para tú enim tank yuuu! Pepete reprehenderit. 
                    Sed baboiii bappleees aaaaaah poopayee occaecat ut. 
                    Pepete baboiii aliqua qui hana dul sae baboiii veniam bananaaaa incididunt para tú 
                    tulaliloo.
                    </p>
                </div>
            </div>

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
                    Minions ipsum para tú enim tank yuuu! Pepete reprehenderit. 
                    Sed baboiii bappleees aaaaaah poopayee occaecat ut. 
                    Pepete baboiii aliqua qui hana dul sae baboiii veniam bananaaaa incididunt para tú 
                    tulaliloo.
                    Minions ipsum para tú enim tank yuuu! Pepete reprehenderit. 
                    Sed baboiii bappleees aaaaaah poopayee occaecat ut. 
                    Pepete baboiii aliqua qui hana dul sae baboiii veniam bananaaaa incididunt para tú 
                    tulaliloo.
                    Minions ipsum para tú enim tank yuuu! Pepete reprehenderit. 
                    Sed baboiii bappleees aaaaaah poopayee occaecat ut. 
                    Pepete baboiii aliqua qui hana dul sae baboiii veniam bananaaaa incididunt para tú 
                    tulaliloo.
                    </p>
                </div>
            </div>

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