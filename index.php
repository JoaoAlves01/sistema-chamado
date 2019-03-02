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
    <div class="faixa_info">        
        <div class="box_pontos">
            <div class="box_trofeu">
                <i class="fa fa-frown-o" aria-hidden="true"></i>
            </div>
            <span>Urgente<small><div class="num_urgente" id="num_urgente">38</div></small></span>
        </div>

        <div class="box_pontos">
            <div class="box_trofeu">
                <i class="fa fa-cogs" aria-hidden="true"></i>
            </div>
            <span>Em andamento<small>50</small></span>
        </div>

        <div class="box_pontos">
            <div class="box_trofeu">
                <i class="fa fa-smile-o" aria-hidden="true"></i>
            </div>
            <span>Concluído<small>38</small></span>
        </div>
    </div>
                
    <div class="envelope">
        <div class="linha">

            <div class="box_pedido urgente" id="urgente" data-id="urgente">
                <div class="linha">
                    <span class="titulo_box">Pedidos Urgentes</span>
                </div>

                <div class="capsula_pedidos urgente_scroll">
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
                        <button type="button" class="botao fechar fechar_novo_cartao_urgente" id="fechar_novo_cartao_urgente" name="fechar_novo_cartao_urgente"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>

                    <div class="linha_vertical" id="adicionar_cartao">
                        <input type="text" class="campo_sistema campo_new_cartao" id="nome_cartao_urgente" name="nome_cartao_urgente" placeholder="Informe um título..." />
                    </div>

                    <div class="linha_vertical">
                        <button type="button" class="botao salvar_cartao_urgente" name="botao_adicionar_cartao_urgente">Salvar cartão</button>
                    </div>
                </form>
            </div>

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
                    </div>

                    <div class="linha_vertical">
                        <button type="button" class="botao salvar_cartao_concluido" name="botao_adicionar_cartao_concluido">Salvar cartão</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>