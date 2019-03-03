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
    <div class="faixa_info">        
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