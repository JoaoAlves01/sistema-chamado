function adicionarNovoCartao(){

    var botao = document.getElementById('botao_novo_cartao');

    if(botao)
    {
        document.getElementById('formulario_novo_cartao').style.display = "block";
        document.getElementById('botao_novo_cartao').style.display = "none";
    }
}

function fecharNovoCartao(){

    var botao = document.getElementById('fechar_novo_cartao');

    if(botao)
    {
        document.getElementById('botao_novo_cartao').style.display = "block";
        document.getElementById('nome_cartao').value = "";
        document.getElementById('formulario_novo_cartao').style.display = "none";
    }
}