<?php 
    include("controller.php");
    
    $listarQtdUrgente = listarQtd('urgente');
    $listarQtdAndamento = listarQtd('andamento');
    $listarQtdConcluido = listarQtdConcluido();
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

        <div class="modal_novo_pedido">
            <div class="linha_vertical linha_modal">
                <span class="titulo_modal">Abrir Chamado</span>
                <span class="fechar_modal"><i class="fa fa-close" aria-hidden="true"></i></span>
            </div>
            <form method="POST" action="">
                <div class="linha linha_modal" id="modal_nv_pedido">
                    <label class="label_sistema">Título do cartão</label>
                    <input type="text" class="campo_sistema" id="" name="" placeholder="Informe o nome do cartão..." />

                    <label class="label_sistema">Data para entrega</label>
                    <input type="text" class="campo_sistema" id="data_novo_pedido" name="data_novo_pedido" placeholder="Informe uma data..." maxlength="10" />

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
    </div>

    <div class="faixa_info">
        <div class="box_pontos">
            <div class="box_trofeu abrir_chamado">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </div>
            <span>Abrir<br>chamado</span>
        </div>

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