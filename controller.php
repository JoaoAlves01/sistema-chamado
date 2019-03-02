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


	function listarChamado($categoria){

		$conexao = model_conexao();

		$sql = "SELECT * FROM sc_chamado WHERE categoria = '".$categoria."' AND estatos = 0";

		$resultado = $conexao->query($sql);

		return $resultado;
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

	function listarUcTurma(){
		$conexao = model_conexao();

		$sql = "SELECT count(id) FROM auxdisciplinaturma WHERE idCurso = '".$_SESSION['idCurso']."' AND idTurma = '".$_SESSION['idTurma']."'";

		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);

		return $resul;
	}

	function listarUcMaxima(){
		$conexao = model_conexao();

		$sql = "SELECT count(idDisciplina) FROM disciplina WHERE idCurso = '".$_SESSION['idCurso']."'";

		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);

		return $resul;
	}

	function inserirUcTurma(){
		$conexao = model_conexao();

		extract($_POST);

		//verifica se já existe essa falta.
		$sql = "SELECT * FROM auxdisciplinaturma WHERE idCurso = '".$_SESSION['idCurso']."' AND idTurma = '".$_SESSION['idTurma']."' AND idDisciplina = '".$id."'";
		$presenca = $conexao->query($sql);

		//verifica se já existe uma turma com aquele numero.
		if (!$presenca->num_rows) {
			$sql = "INSERT INTO auxdisciplinaturma (idCurso, idTurma, idDisciplina) VALUES('".$_SESSION['idCurso']."', '".$_SESSION['idTurma']."', '".$id."')";

			$resultado = $conexao->query($sql);

			//refazer uma consulta no banco pelo id
			$sql = "SELECT count(id) FROM auxdisciplinaturma WHERE idDisciplina = '".$id."' AND idCurso = '".$_SESSION['idCurso']."' AND idTurma = '".$_SESSION['idTurma']."'";

			//Executa o model
			$resultadoJson = $conexao->query($sql);
			$resul = $resultadoJson->fetch_array(MYSQLI_NUM);

			//retornar em modo json para o ajax
			$vetor[] = array('id'=>$resul[0][0]);
			echo json_encode($vetor);
		}
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