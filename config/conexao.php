<?php
	function model_conexao(){
		//Conexao com o servidor
		//Servidor, usuario, senha, DB
		$conection = new mysqli("localhost", "root", "", "si_chamado");
		//define o idioma para portugues
		$conection->set_charset("utf8");

		//retorna a conexao feita
		return $conection;
	}
?>