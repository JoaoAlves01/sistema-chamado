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

    $('.editar_cartao_comentario').on('click', function()
    {
        var div_pai = $(this).closest('[data-id]');
        var comentarioUsuario = $('#'+div_pai.data('id')).find('.comentario_cartao').text();
        var comentarioUsuario1 = $('#'+div_pai.data('id')).find('.comentario_cartao').text();
        
        $(this).hide();
        $(".digitar_comentario").val(comentarioUsuario);
        $('#'+div_pai.data('id')).find('.cancelar_cartao_comentario').show();
        $('#'+div_pai.data('id')).find('.container_input_comentario').show();
    });

    $('.cancelar_cartao_comentario').on('click', function()
    {
        var div_pai = $(this).closest('[data-id]');
        
        $(this).hide();
        $('#'+div_pai.data('id')).find('.editar_cartao_comentario').show();
        $('#'+div_pai.data('id')).find('.container_input_comentario').hide();
        $('.digitar_comentario').val("");
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
