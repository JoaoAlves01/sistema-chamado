<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Titulo Cartão</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="lib/css/estilo.css">
    <link rel="stylesheet" type="text/css" href="lib/css/estilo_mobile.css">
    <script src="lib/js/jquery.js"></script> 
    <script src="lib/js/controle.js"></script> 
</head>
<body>
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
        <div class="modal_trocar_status">
            <div class="linha_vertical linha_modal">
                <span class="titulo_modal">Avançar no Status do Pedido</span>
                <span class="fechar_modal"><i class="fa fa-close" aria-hidden="true"></i></span>
            </div>
            <div class="linha linha_modal">
                <label class="acao_desejada">Deseja realmente avançar no status de pedido!</label>
            </div>
            <form method="POST" action="controller.php?f=avancar">
                <div class="alinhar_botao_modal">
                    <button type="submit" class="botao botao_icone" id="trocar_status" name="trocar_status">Sim</button>
                    <button type="button" class="botao botao_icone cancelar_modal" id="cancelar_troca" name="cancelar_troca">Não</button>
                </div>
            </form>
        </div>      
    </div>
