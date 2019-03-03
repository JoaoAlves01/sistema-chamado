$(document).ready(function()
{
    $(".novo_cartao").on("click", function()
    {
        var div_pai = $(this).closest('[data-id]');

        $(this).hide();
        $('#'+div_pai.data('id')).find('.formulario_novo_cartao').show();

       // alert(div_pai.data('id'));
    });

    $(".fechar").on("click", function()
    {
        var div_pai = $(this).closest('[data-id]');

        $('#'+div_pai.data('id')).find('.novo_cartao').show();
        $('#'+div_pai.data('id')).find('.formulario_novo_cartao').hide();
        $('#'+div_pai.data('id')).find('.campo_new_cartao').val('');
    });

    $("#faixa_voltar").on("click", function()
    {
        window.location.href = "index.php";
    });
});

function aumentarPedidos()
{
    var valorAtual_urgente = 0;
    var valorAtual_andamento = 0;
    var valorAtual_concluido = 0;

    var elemento_urgente = document.getElementById("num_urgente");
    var elemento_andamento = document.getElementById("num_andamento");
    var elemento_concluido = document.getElementById("num_concluido");

    var valorFinal_urgente = elemento_urgente.innerHTML;
    var valorFinal_andamento = elemento_andamento.innerHTML;
    var valorFinal_concluido = elemento_concluido.innerHTML;

    var intervalo = setInterval(function()
    {
        if(valorAtual_urgente <= valorFinal_urgente)
            elemento_urgente.innerHTML = valorAtual_urgente++;

        if(valorAtual_andamento <= valorFinal_andamento)
            elemento_andamento.innerHTML = valorAtual_andamento++;

        if(valorAtual_concluido <= valorFinal_concluido)
            elemento_concluido.innerHTML = valorAtual_concluido++;

        else if(valorAtual_urgente == valorFinal_urgente && valorAtual_andamento == valorFinal_andamento && valorAtual_concluido == valorFinal_concluido)
            clearInterval(intervalo);
    },10);
}

// var tempo_urgente = setInterval(function()
// {
//     ponto_urgente.html(1);
// }, 1000);
