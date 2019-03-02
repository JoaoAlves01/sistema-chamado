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

// var tempo_urgente = setInterval(function()
// {
//     ponto_urgente.html(1);
// }, 1000);
