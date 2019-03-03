$(document).ready(function()
{
    $("#faixa_voltar").on("click", function()
    {
        window.location.href = "telaChamado.php";
    });

    $('.excluir_modal, .deletar_cartao, .deletar_cartao_comentario').on('click', function()
    {
        var id = this.value;

        $('.fundo_excluir_pedido').toggleClass('mostrar_modal', 'slow');
        $('.modal_exclur_pedido').toggleClass('mostrar_modal', 'slow');
        $('#cancelar_pedido').val(id);
    });

    $('.fechar_modal, #cancelar_cancelar').on('click', function()
    {
        $('.fundo_excluir_pedido').removeClass('mostrar_modal');
        $('.modal_exclur_pedido').removeClass('mostrar_modal');
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
    },250);
}
