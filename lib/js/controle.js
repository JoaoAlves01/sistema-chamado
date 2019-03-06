$(document).ready(function()
{
    $("#faixa_voltar").on("click", function()
    {
        window.location.href = "telaChamado.php";
    });
    
    //Abrir modal de excluir
    $(document).on('click', '.excluir_modal, .deletar_cartao, .deletar_cartao_comentario', function()
    {
        var id = this.value;

        $('.fundo_excluir_pedido').toggleClass('mostrar_modal', 'slow');
        $('.modal_exclur_pedido').toggleClass('mostrar_modal', 'slow');
        $('#cancelar_pedido').val(id);
    });

    //Editar comentarios
    $(document).on('click', '.editar_cartao_comentario', function()
    {
        var div_pai = $(this).closest('[data-id]');
        var comentarioUsuario = $('#'+div_pai.data('id')).find('.comentario_cartao').text();
        var comentarioUsuario1 = $('#'+div_pai.data('id')).find('.comentario_cartao').text();
        
        $(this).hide();
        $(".digitar_comentario").val(comentarioUsuario);
        $('#'+div_pai.data('id')).find('.cancelar_cartao_comentario').show();
        $('#'+div_pai.data('id')).find('.container_input_comentario').show();
    });

    //Cancelar editar do comentario
    $(document).on('click', '.cancelar_cartao_comentario', function()
    {
        var div_pai = $(this).closest('[data-id]');
        
        $(this).hide();
        $('#'+div_pai.data('id')).find('.editar_cartao_comentario').show();
        $('#'+div_pai.data('id')).find('.container_input_comentario').hide();
        $('.digitar_comentario').val("");
    });

    //Cancelar modal
    $('.fechar_modal, #cancelar_cancelar, .cancelar_modal').on('click', function()
    {
        $('.fundo_excluir_pedido').removeClass('mostrar_modal');
        $('.modal_exclur_pedido').removeClass('mostrar_modal');
        $('.modal_novo_pedido').removeClass('mostrar_modal');
        $('.modal_trocar_status').removeClass('mostrar_modal');
        $('.modal_exclur_chamado').removeClass('mostrar_modal');
    });
   
    //Abrir um novo chamado
    $('.abrir_chamado').on('click', function()
    {
        $('.fundo_excluir_pedido').toggleClass('mostrar_modal', 'slow');
        $('.modal_novo_pedido').toggleClass('mostrar_modal', 'slow');
    });

    //Abrir modal escluir pedido
    $('.status_modal').on('click', function()
    {
        $('.fundo_excluir_pedido').toggleClass('mostrar_modal', 'slow');
        $('.modal_trocar_status').toggleClass('mostrar_modal', 'slow');
    });

    $("#img_usuario").on('click', function()
    {
        $('.mini_menu_usuario').toggleClass('mostrar_modal', 'slow');
    });

    //Modal excluir chamado
    $(document).on('click', '.excluir_chamado', function()
    {
        var id = this.value;

        $('.fundo_excluir_pedido').toggleClass('mostrar_modal');
        $('.modal_exclur_chamado').toggleClass('mostrar_modal');
        $('.modal_exclur_chamado').find('#cancelar_pedido').val(id);
    });

    //mostrar login
    var contator_login = 0;
    $(".tipo_acesso").on('click', function()
    {
        if(contator_login == 0)
        {
            $('.box_cliente').hide();
            $('.box_tecnico').toggleClass('mostrar_tecninco');
            $('.box_cliente').removeClass('mostrar_cliente');

            contator_login = 1;
        }

        else
        {
            $('.box_tecnico').removeClass('mostrar_tecninco');
            $('.box_cliente').show();
            $('.box_cliente').toggleClass('mostrar_cliente');

            contator_login = 0;
        }
        
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