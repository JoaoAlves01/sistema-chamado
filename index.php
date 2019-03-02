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
    <script src="lib/js/controle.js"></script> 
</head>
<body>
    <div class="envelope">
        <div class="linha">
            <div class="box_pedido urgente">
                <div class="linha">
                    <span class="titulo_box">Pedidos Urgentes <span class="titulo_box_quant">(06)</span></span>
                </div>

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

                <div class="linha_vertical">
                    <button type="button" class="botao novo_cartao" id="botao_novo_cartao" name="botao_novo_cartao" onclick="adicionarNovoCartao();">Adicionar novo cartão</button>
                </div>

                <form method="POST" action="" id="formulario_novo_cartao">
                    <div class="linha_vertical">
                        <button type="button" class="botao fechar_novo_cartao" id="fechar_novo_cartao" name="fechar_novo_cartao" onclick="fecharNovoCartao();"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>

                    <div class="linha_vertical" id="adicionar_cartao">
                        <input type="text" class="campo_sistema" id="nome_cartao" name="nome_cartao" placeholder="Informe um título..." />
                    </div>

                    <div class="linha_vertical">
                        <button type="button" class="botao salvar_cartao" id="botao_adicionar_cartao" name="botao_adicionar_cartao">Salvar cartão</button>
                    </div>
                </form>
            </div>

            <!-- <div class="box_pedido andamento">
                <div class="linha">
                    <span class="titulo_box">Pedidos Urgentes <span class="titulo_box_quant">(06)</span></span>
                </div>

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
                        <i class="fa fa-address-book" aria-hidden="true"><span>5 horas fev</span></i>
                    </div>
                </div>
            </div>

            <div class="box_pedido concluido">
                <div class="linha">
                    <span class="titulo_box">Pedidos Urgentes <span class="titulo_box_quant">(06)</span></span>
                </div>

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
                        <i class="fa fa-address-book" aria-hidden="true"><span>5 horas fev</span></i>
                    </div>
                </div>

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
                        <i class="fa fa-address-book" aria-hidden="true"><span>5 horas fev</span></i>
                    </div>
                </div>

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
                        <i class="fa fa-address-book" aria-hidden="true"><span>5 horas fev</span></i>
                    </div>
                </div>

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
                        <i class="fa fa-address-book" aria-hidden="true"><span>5 horas fev</span></i>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</body>
</html>