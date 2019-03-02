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

	/* CADASTRAR */

	function listarUcCargaHoraria(){

		$_SESSION['qtdCargaHorariaUcTotal'] = 0;
		$_SESSION['qtdCargaHorariaUc'] = 0;

		$conexao = model_conexao();

		$sql = "SELECT * FROM disciplina WHERE idCurso = '".$_SESSION['idCurso']."'";

		$resultado = $conexao->query($sql);

		while ($resul = $resultado->fetch_array(MYSQLI_NUM)) { 

			$_SESSION['qtdCargaHorariaUcTotal'] += $resul[3];
			$unidade = listarUcEspecifica($resul[0]);

            if ($unidade) {
            	$_SESSION['qtdCargaHorariaUc'] += $resul[3];
            }		
		}
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

	function listarUcEspecifica($id){
		$conexao = model_conexao();

		$sql = "SELECT * FROM auxdisciplinaturma WHERE idCurso = '".$_SESSION['idCurso']."' AND idTurma = '".$_SESSION['idTurma']."' AND idDisciplina = '".$id."'";

		$resultado = $conexao->query($sql);

		if ($resultado->num_rows) {
			return true;
		} else {
			return false;
		}	
	}

	function listarUc(){
		$conexao = model_conexao();

		$sql = "SELECT * FROM disciplina WHERE idCurso = '".$_SESSION['idCurso']."'";

		$resultado = $conexao->query($sql);

		return $resultado;
	}

	function listarAtividadePorAluno($idAluno){
		$conexao = model_conexao();

		$sql = "SELECT count(idAluno) FROM auxatividadealuno WHERE idAluno = '".$idAluno."' AND idAtividade = '".$_SESSION['idAtividade']."' AND idTurma = '".$_SESSION['idTurma']."'";

		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);
		return $resul;
	}

	function finalizarAtividade(){
		$conexao = model_conexao();

		$id = $_GET['id'];

		//Sql instrucao
		$sql = "UPDATE atividade SET ativo = 0 WHERE idAtividade = '".$id."'";

		//executa a query
		$resultado = $conexao->query($sql);

		$_SESSION['chamadaFinalizada'] = true;

		header("Location: listarAlunos.php");
	}

	function botaoChamadaAtividade($id){
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT * FROM atividade WHERE idAtividade = '".$id."' AND ativo = 0";

		//executa a query
		$resultado = $conexao->query($sql);

		if ($resultado->num_rows) {
			return true;
		} else {
			return false;
		}		
	}

	function cadastrarAtividadeAluno(){

		//Conexao
		$conexao = model_conexao();

		extract($_POST);

		
		//verifica se já existe essa atividade para esse aluno.
		$sql = "SELECT * FROM auxatividadealuno WHERE idAluno = '".$id."' AND idAtividade = '".$_SESSION['idAtividade']."' AND idTurma = '".$_SESSION['idTurma']."' AND tipo = '".$_SESSION['atividadeTipo']."'";
		$presenca = $conexao->query($sql);

		//verifica se já existe uma turma com aquele numero.
		if (!$presenca->num_rows) {
			//Sql instrucao
			$sql = "INSERT INTO auxatividadealuno (idAtividade, idTurma, idAluno, tipo) VALUES ('".$_SESSION['idAtividade']."' , '".$_SESSION['idTurma']."', '".$id."', '".$_SESSION['atividadeTipo']."')";

			$resultado = $conexao->query($sql);


			//retornar em modo json para o ajax			
			$vetor[] = array('id'=>1);
			echo json_encode($vetor);
		}	
	}

	function editarAtividade(){
		//Conexao
		$conexao = model_conexao();

		extract($_POST);

		if ($ativo == 'on') {
			$estadoAtivo = 1;
		} else {
			$estadoAtivo = 0;
		}

		//Sql instrucao
		$sql = "UPDATE ativo SET nome = '".$nome."', tipo = '".$tipo."', ativo = '".$estadoAtivo."', descricao = '".$descricao."', idTurma = '".$idTurma."' WHERE idAtividade = '".$idAtividade."'";

		//executa a query
		$resultado = $conexao->query($sql);
		
		if ($resultado) {
			header("Location: atividade.php?t=$idAtividade");
		} else {
			header("Location: atividade.php?add=n");
		}
	}


	function cadastrarAtividade(){
		//Conexao
		$conexao = model_conexao();

		extract($_POST);

		$data = dataHoraAme(date("Y-m-d"));

		if ($ativo == 'on') {
			$estadoAtivo = 1;
		} else {
			$estadoAtivo = 0;
		}

		//Sql instrucao
		$sql = "INSERT INTO atividade (nome, descricao, ativo, dataCriacao, idTurma, tipo) VALUES ('".$nome."', '".$descricao."', '".$estadoAtivo."', '".date("Y-m-d")."', '".$_SESSION['idTurma']."', '".$tipo."')";

		//executa a query
		$resultado = $conexao->query($sql);

		if ($resultado) {
			header("Location: atividade.php?add=y");
		} else {
			header("Location: atividade.php?add=n");
		}
	}

	function cadastrarTurma(){
		//Conexao
		$conexao = model_conexao();

		extract($_POST);

		$sql = "SELECT * FROM turma WHERE numero = '".$numero."'";
		$turma = $conexao->query($sql);

		//verifica se já existe uma turma com aquele numero.
		if ($turma->num_rows) {
			header("Location: cadastrarTurma.php?add=e"); //turma já existe
		} else {
			//Sql instrucao
			$sql = "INSERT INTO turma (numero, turno, ativo) VALUES ('".$numero."', '".$turno."', 1)";

			//executa a query
			$resultado = $conexao->query($sql);

			if ($resultado) {
				header("Location: turma.php?add=y");
			} else {
				header("Location: turma.php?add=n");
			}
		}
	}

	function cadastrarChamada(){

		$resultadoStatus = false;

		$conexao = model_conexao();

		if (isset($_SESSION['data'])) {
		
			//Sql instrucao
			$sql = "SELECT * FROM chamada WHERE idTurma = '".$_SESSION['idTurma']."' AND data = '".$_SESSION['data']."'";

			//executa a query
			$resultado = $conexao->query($sql);

			if ($resultado->num_rows) {
				$resul = $resultado->fetch_array(MYSQLI_NUM);
				$_SESSION['idChamada'] = $resul[0];

				$resultadoStatus = true;
			} else {
				$resultadoStatus = false;
			}

		} else {
			$resultadoStatus = false;
		}


		if ($resultadoStatus) {
			header("Location: fazerChamada.php");
		} else {
			//Conexao
			$conexao = model_conexao();

			extract($_POST);			

			//Sql instrucao
			$sql = "INSERT INTO chamada (idTurma, idDisciplina, data, ativo) VALUES ('".$_SESSION['idTurma']."', 1, '".$_SESSION['data']."', 1)";

			//executa a query
			$resultado = $conexao->query($sql);

			if ($resultado) {
				$_SESSION['idChamada'] = $conexao->insert_id;
				
				header("Location: fazerChamada.php?add=y");
			} else {
				header("Location: fazerChamada.php?add=n");
			}
		}	
	}

	/* LISTAR */

	//listar todas as avaliacoes
	function listarAvaliacoes(){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT * FROM atividade WHERE idTurma = '".$_SESSION['idTurma']."' AND tipo = 'avaliacao'";

		//executa a query
		$resultado = $conexao->query($sql);
		
		return $resultado;
	}

	function contarAvaliacoes(){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT count(idAtividade) FROM atividade WHERE idTurma = '".$_SESSION['idTurma']."' AND tipo = 'avaliacao' AND ativo = 0";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);
		
		return $resul;
	}

	function listarAvaliacaoAluno($idAluno){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT count(id) FROM auxatividadealuno WHERE idTurma = '".$_SESSION['idTurma']."' AND idAluno = '".$idAluno."' AND tipo = 'avaliacao'";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);
		
		return $resul;
	}

	//listar todas as atividades
	function listarAtividades(){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT * FROM atividade WHERE idTurma = '".$_SESSION['idTurma']."' AND tipo = 'atividade' ORDER BY idAtividade DESC, ativo DESC";

		//executa a query
		$resultado = $conexao->query($sql);
		
		return $resultado;
	}

	function contarAtividades(){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT count(idAtividade) FROM atividade WHERE idTurma = '".$_SESSION['idTurma']."' AND tipo = 'atividade' AND ativo = 0";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);
		
		return $resul;
	}

	//listar atividade individual
	function listarAtividadeAluno($idAluno){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT count(id) FROM auxatividadealuno WHERE idTurma = '".$_SESSION['idTurma']."' AND idAluno = '".$idAluno."' AND tipo = 'atividade'";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);
		
		return $resul;
	}

	function listarAtividade($id){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT * FROM atividadae WHERE idAtividade = '".$id."'";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);
		
		return $resul;
	}

	function listarTurmas(){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT * FROM turma WHERE ativo = 1";

		//executa a query
		$resultado = $conexao->query($sql);
		
		return $resultado;
	}

	//Lista turma especifica.
	function listarTurma($id){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT * FROM turma WHERE idTurma = '".$id."'";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);
		
		return $resul;
	}

	//Lista aluno da turma especifica.
	function listarAlunos($turma){
		//Conexao
		$conexao = model_conexao();

		extract($_POST);

		//Sql instrucao
		$sql = "SELECT * FROM aluno WHERE idTurma = '".$turma."' AND ativo = '1'";

		//executa a query
		$resultado = $conexao->query($sql);
		
		return $resultado;
	}

	function listarAlunosAtivos($turma){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT count(idAluno) FROM aluno WHERE idTurma = '".$turma."' AND ativo = 1";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);
		
		return $resul;
	}

	function listarAlunosDesativados($turma){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT count(idAluno) FROM aluno WHERE idTurma = '".$turma."' AND ativo = 0";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);
		
		return $resul;
	}	

	function listarPresencaAluno($idAluno){
		$conexao = model_conexao();

		$sql = "SELECT count(idAluno) FROM auxchamadaaluno WHERE idAluno = '".$idAluno."' AND idChamada = '".$_SESSION['idChamada']."'";

		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);
		return $resul;
	}

	function listarAluno($idAluno){
		$conexao = model_conexao();

		$sql = "SELECT * FROM aluno WHERE idAluno = '".$idAluno."'";

		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);
		return $resul;
	}

	/* EDITAR */

	function editarTurma(){
		//Conexao
		$conexao = model_conexao();

		extract($_POST);

		if ($ativo == 'on') {
			$estadoAtivo = 1;
		} else {
			$estadoAtivo = 0;
		}

		//Sql instrucao
		$sql = "UPDATE turma SET numero = '".$numero."', turno = '".$turno."', ativo = '".$estadoAtivo."', descricao = '".$descricao."'  WHERE idTurma = '".$idTurma."'";

		//executa a query
		$resultado = $conexao->query($sql);
		
		if ($resultado) {
			header("Location: turma.php?t=$idTurma");
		} else {
			header("Location: turma.php?add=n");
		}
	}

	/* INSERIR */

	function inserirPresenca(){
		$conexao = model_conexao();

		extract($_POST);

		//verifica se já existe essa falta.
		$sql = "SELECT * FROM auxchamadaaluno WHERE idAluno = '".$id."' AND idChamada = '".$_SESSION['idChamada']."'";
		$presenca = $conexao->query($sql);

		//verifica se já existe uma turma com aquele numero.
		if (!$presenca->num_rows) {
			$sql = "INSERT INTO auxchamadaaluno (idChamada, idAluno) VALUES('".$_SESSION['idChamada']."', '".$id."')";

			$resultado = $conexao->query($sql);

			//refazer uma consulta no banco pelo id
			$sql = "SELECT count(idAluno) FROM auxchamadaaluno WHERE idAluno = '".$id."'";

			//Executa o model
			$resultadoJson = $conexao->query($sql);
			$resul = $resultadoJson->fetch_array(MYSQLI_NUM);

			//retornar em modo json para o ajax
			$vetor[] = array('id'=>$resul[0][0]);
			echo json_encode($vetor);
		}
	}

	/* DESATIVAR */

	function finalizarChamada(){
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "UPDATE chamada SET ativo = 0 WHERE idTurma = '".$_SESSION['idTurma']."' AND data = '".$_SESSION['data']."'";

		//executa a query
		$resultado = $conexao->query($sql);

		$_SESSION['chamadaFinalizada'] = true;

		header("Location: listarTurmas.php");
	}

	function desativarTurma(){
		//Conexao
		$conexao = model_conexao();

		$id = $_GET['id'];

		//Sql instrucao
		$sql = "UPDATE turma SET ativo = 0 WHERE idTurma = '".$id."'";

		//executa a query
		$resultado = $conexao->query($sql);
	}

	/*		FUNÇÕES AUXILIARES	*/

	function botaoChamada(){
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT * FROM chamada WHERE idChamada = '".$_SESSION['idChamada']."' AND ativo = 0";

		//executa a query
		$resultado = $conexao->query($sql);

		if ($resultado->num_rows) {
			return true;
		} else {
			return false;
		}		
	}

	function definirTurma(){
		$idTurma = $_GET['id'];

		$conexao = model_conexao();

		$_SESSION['idTurma'] = $idTurma;

		//Sql instrucao
		$sql = "SELECT idCurso FROM turma WHERE idTurma = '".$_SESSION['idTurma']."' AND ativo = 1";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);

		$_SESSION['idCurso'] = $resul[0][0];

		header("Location: listarAlunos.php");
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