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
	function loginT(){
		//cria a conexao com o banco
		$conexao = model_conexao();

		//extrai todos os dados
		extract($_POST);

		//verifica se os campos nao estao em branco
		if ($login != '') {
			//SQL comando para logar
			$sql = "SELECT * FROM aluno WHERE matricula = '".$login."'";

			$resultado = $conexao->query($sql);

			//Verifica se a execução retonou alguma informação
			if ($resultado->num_rows) {
				//se deu certo o login executa os passos a seguir
				$resul = $resultado->fetch_array(MYSQLI_NUM);

				//Sessoes
				$_SESSION['idUser'] = $resul[0];
				$_SESSION['user'] = $resul[2];
				$_SESSION['foto'] = $resul[5];
				$_SESSION['contraste'] = false;
				$_SESSION['data'] = date("Y-m-d");
				$_SESSION['tipoUsuario'] = 'tecnico';

				//redirecionamento
				header("Location: telaChamado.php");		
			} else {
				//login nao encontrado
				header("Location: login.php?login=n");
			}
		}
	}

	function loginU(){
		//cria a conexao com o banco
		$conexao = model_conexao();

		//extrai todos os dados
		extract($_POST);

		//verifica se os campos nao estao em branco
		if ($login != '') {
			//SQL comando para logar
			$sql = "SELECT * FROM aluno WHERE matricula = '".$login."'";

			$resultado = $conexao->query($sql);

			//Verifica se a execução retonou alguma informação
			if ($resultado->num_rows) {
				//se deu certo o login executa os passos a seguir
				$resul = $resultado->fetch_array(MYSQLI_NUM);

				//Sessoes
				$_SESSION['idUser'] = $resul[0];
				$_SESSION['user'] = $resul[2];
				$_SESSION['foto'] = $resul[5];
				$_SESSION['contraste'] = false;
				$_SESSION['data'] = date("Y-m-d");
				$_SESSION['tipoUsuario'] = 'usuario';

				//redirecionamento
				header("Location: telaCliente.php");		
			} else {
				//login nao encontrado
				header("Location: login.php?login=n");
			}
		}
	}

	function addChamado(){
		//Conexao
		$conexao = model_conexao();

		extract($_POST);

		//Cria o sistema unico de idUI
		$idUI = md5(microtime()) . '.' . $_SESSION['idUser'];	
		$data = dataHora();		

		//Sql instrucao
		$sql = "INSERT INTO sc_chamado (idUsuario, categoria, titulo, texto, data, estatos, idUI) VALUES ('".$_SESSION['idUser']."', '".$status."', '".$titulo."', '".$texto."', '".$data."', 0, '".$idUI."')";

		//executa a query
		$resultado = $conexao->query($sql);

		header("Location: telaCliente.php");
	}

	function comentario(){
		//Conexao
		$conexao = model_conexao();

		extract($_POST);

		//Cria o sistema unico de idUI
		$idUI = md5(microtime()) . '.' . $_SESSION['idUser'];		

		//Sql instrucao
		$sql = "INSERT INTO sc_comentario (idChamada, idUsuario, texto, data, idUI, statos) 
		VALUES ('".$idChamada."', '".$_SESSION['idUser']."', '".$texto."', '".$_SESSION['data']."', '".$idUI."', 0)";

		//executa a query
		$resultado = $conexao->query($sql);

		$vetor[] = array('id'=>1);
		echo json_encode($vetor);
	}

	function excluirComentario(){
		//Conexao
		$conexao = model_conexao();

		var_dump($_POST);

		extract($_POST);		

		//Sql instrucao
		$sql = "UPDATE sc_comentario SET statos = '1' WHERE idUI ='".$cancelar_pedido."'";

		//executa a query
		$resultado = $conexao->query($sql);

		header("Location: cartao.php?id=".$_SESSION['id']);

	}

	//deslogar
	function deslogar(){
		session_destroy();
		header("Location: login.php");
	}

	function listarComentarios($id){

		$conexao = model_conexao();

		$sql = "SELECT * FROM sc_comentario WHERE idChamada = '".$id."' AND statos = 0";

		$resultado = $conexao->query($sql);

		return $resultado;
	}

	function listarChamadoUsuario(){

		$conexao = model_conexao();

		$sql = "SELECT * FROM sc_chamado WHERE idUsuario = '".$_SESSION['idUser']."'";

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

		$sql = "SELECT * FROM sc_chamado WHERE idUI = '".$idChamada."'";

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