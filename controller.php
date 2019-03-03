<?php
	//error_reporting(0);
	session_start(); //start a sessao
	//chama a conexao com o banco.
	include_once 'config/conexao.php';
	

	//auxilia na contagem do contraste.
	$GLOBALS['aux'] = false;

	//verifica qual a função está chamando
	if (isset($_GET['f'])) {
		//recebe o GET por parametro
		$function = $_GET['f'];

		//verifica se existe a função que foi passada por GET
		if (function_exists($function)) {
			//caso a função exista chama ela
			call_user_func($function);
			//depois de chamar fecha a função
			exit();
		}
	}

	//LISTAR TODAS AS FUNÇÕES DISPONIVEIS NO SISTEMA

	/*			USUARIO CRUD 		*/

	/*			LOGAR				*/
	function login(){
		//cria a conexao com o banco
		$conexao = model_conexao();

		//extrai todos os dados
		extract($_POST);

		//verifica se os campos nao estao em branco
		if ($login != '' AND $senha != '') {
			$senha = md5($senha);
			//SQL comando para logar
			$sql = "SELECT * FROM usuario WHERE login = '".$login."'  AND senha = '".$senha."'";

			$resultado = $conexao->query($sql);

			//Verifica se a execução retonou alguma informação
			if ($resultado->num_rows) {
				//se deu certo o login executa os passos a seguir
				$resul = $resultado->fetch_array(MYSQLI_NUM);

				//Sessoes
				$_SESSION['idUser'] = $resul[0];
				$_SESSION['user'] = $resul[1];
				$_SESSION['foto'] = $resul[4];
				$_SESSION['contraste'] = false;
				$_SESSION['data'] = date("Y-m-d");

				//redirecionamento
				header("Location: index.php");		
			} else {
				//login nao encontrado
				header("Location: login.php?login=n");
			}
		}
	}

	//deslogar
	function deslogar(){
		session_destroy();
		header("Location: login.php");
	}

	function listarComentarios($id){

		$conexao = model_conexao();

		$sql = "SELECT * FROM sc_comentario WHERE idChamada = '".$id."'";

		$resultado = $conexao->query($sql);

		return $resultado;
	}

	function listarUsuario($id){

		$conexao = model_conexao();

		$sql = "SELECT * FROM aluno WHERE idAluno = '".$id."'";

		$resultado = $conexao->query($sql);

		$resul = $resultado->fetch_array(MYSQLI_NUM);

		return $resul;
	}


	function listarChamado($categoria){

		$conexao = model_conexao();

		$sql = "SELECT * FROM sc_chamado WHERE categoria = '".$categoria."' AND estatos = 0";

		$resultado = $conexao->query($sql);

		return $resultado;
	}

	function listarChamadoId($idChamada){

		$conexao = model_conexao();

		$sql = "SELECT * FROM sc_chamado WHERE idChamada = '".$idChamada."'";

		$resultado = $conexao->query($sql);

		$resul = $resultado->fetch_array(MYSQLI_NUM);

		return $resul;
	}

	function listarChamadoConcluido(){

		$conexao = model_conexao();

		$sql = "SELECT * FROM sc_chamado WHERE estatos = 1";

		$resultado = $conexao->query($sql);

		return $resultado;
	}

	function listarQtd($categoria){
		$conexao = model_conexao();

		$sql = "SELECT count(idChamada) FROM sc_chamado WHERE categoria = '".$categoria."' AND estatos = 0";

		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);

		return $resul;
	}

	function listarQtdConcluido(){
		$conexao = model_conexao();

		$sql = "SELECT count(idChamada) FROM sc_chamado WHERE estatos = 1";

		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);

		return $resul;
	}

	//pegar data e hora do servidor
	function dataHora(){
		$data = date("Y-m-d H:i:s");
		return $data;
	}
	//converter para formato brasileiro
	function dataHoraBras($dataAM){
		$data = date('d/m/Y', strtotime($dataAM));
		return $data;
	}
	//converter para formato americano
	function dataHoraAme($dataAM){
		$dataEx = explode("/", $dataAM);
		list($dia, $mes, $ano) = $dataEx;
		$dataFinal = "$ano-$mes-$dia";
		//$data = date('Y-m-d H:i:s', strtotime($dataAM));
		return $dataFinal;
	}

?>