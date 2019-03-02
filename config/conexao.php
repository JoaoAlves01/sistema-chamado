<?php
	function model_conexao(){
		//Conexao com o servidor
		//Servidor, usuario, senha, DB
		//$conection = new mysqli("localhost", "image862_sae", "Ab784512a", "image862_sae");
		$conection = new mysqli("localhost", "root", "", "tcc01-sae");
		//define o idioma para portugues
		$conection->set_charset("utf8");

		//retorna a conexao feita
		return $conection;
	}
?>