<?php
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
		if ($cpf != '' AND $senha != '') {
			$senha = md5($senha);
			//SQL comando para logar
			$sql = "SELECT * FROM usuario WHERE cpf = '".$cpf."'  AND senha = '".$senha."'";

			$resultado = $conexao->query($sql);

			//Verifica se a execução retonou alguma informação
			if ($resultado->num_rows) {
				//se deu certo o login executa os passos a seguir
				$resul = $resultado->fetch_array(MYSQLI_NUM);

				//Sessoes
				$_SESSION['idUser'] = $resul[0];
				$_SESSION['user'] = $resul[1];
				$_SESSION['matricula'] = $resul[5];
				$_SESSION['foto'] = $resul[4];
				$_SESSION['contraste'] = false;

				//cria uma relação de quais alunos estão ligados a esse usuario
				$conexao = model_conexao();
				$sql = "SELECT * FROM aluno WHERE idUsuario = '".$_SESSION['idUser']."'";
				$resultado = $conexao->query($sql);
				$resul = $resultado->fetch_array(MYSQLI_NUM);
				$_SESSION['matriculaAluno'] = $resul[1];
				$_SESSION['idAluno'] = $resul[0];
				$_SESSION['nomeAluno'] = $resul[2];
				$_SESSION['tela'] = "telaPrincipal.php";
				$_SESSION['idEscola'] = $resul[5];
				$_SESSION['idTurma'] = $resul[6];

				//redirecionamento
				header("Location: ../telaPrincipal.php");		
			} else {
				//login nao encontrado
				header("Location: ../index.php?login=n");
			}
		}
	}

	//deslogar
	function deslogar(){
		session_destroy();
		header("Location: ../index.php");
	}

	/*			ALUNO - CRUD 		*/
	function listarMatricula(){
		$conexao = model_conexao();

		$sql = "SELECT * FROM aluno WHERE idUsuario = '".$_SESSION['idUser']."'";

		$resultado = $conexao->query($sql);
		//$resul = $resultado->fetch_all();

		return $resultado;
	}

	function listarNotificacoes($matricula){
		$conexao = model_conexao();

		//$sql = "SELECT * FROM notificacao WHERE idAluno = '".$_SESSION['idAluno']."' ORDER BY status ASC";
		$sql = "SELECT * FROM notificacao ORDER BY status ASC";

		$resultado = $conexao->query($sql);
		//$resultado->fetch_array(MYSQLI_NUM);
		//$resul = $resultado->fetch_array(MYSQLI_NUM);
		return $resultado;
	}

	function addNotificacoes(){
		$conexao = model_conexao();

		extract($_POST);
		$data = dataHora();
		$sql = "INSERT INTO notificacao (titulo, mensagem, data, idTurma, idAluno, tipo, status) VALUES ('".$titulo."', '".$motivo."', '".$data."', '".$turma."', '".$aluno."', '".$categoria."', 0)";

		$resultado = $conexao->query($sql);
		header("Location: ../admin/notifique.php");
	}

	function cienteNotificacao(){
		$conexao = model_conexao();

		$id = $_GET['id'];

		$sql = "UPDATE notificacao SET status = '1' WHERE idNotificacao = '".$id."'";

		$resultado = $conexao->query($sql);
		header("Location: ../telaPrincipal.php");		
	}

	function definirMatriculaAluno(){
			extract($_POST);

			$_SESSION['matriculaAluno'] = $matricula;
			//cria uma relação de quais alunos estão ligados a esse usuario
			$conexao = model_conexao();
			$sql = "SELECT * FROM aluno WHERE matricula = '".$_SESSION['matriculaAluno']."'";
			$resultado = $conexao->query($sql);
			$resul = $resultado->fetch_array(MYSQLI_NUM);

			$_SESSION['idAluno'] = $resul[0];
			$_SESSION['nomeAluno'] = $resul[2];
			$_SESSION['idEscola'] = $resul[5];
			$_SESSION['idTurma'] = $resul[6];

			$tela = $_SESSION['tela'];
			header("Location: ../$tela");
	}

	/*			EVENTOS - CRUD 		*/
	function listarEventos(){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT * FROM evento as e WHERE status  != 1 ORDER BY data DESC";

		//executa a query
		$resultado = $conexao->query($sql);
		//$resul = $resultado->fetch_all();

		//retorna o resultado
		return $resultado;
	}
	function listarEventosTodos(){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		
		$sql = "SELECT * FROM evento WHERE status != 1 ORDER BY data DESC";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_all();

		//retorna o resultado
		return $resul;
	}

	function inserirEventosTodos(){
		//Conexao
		$conexao = model_conexao();

		extract($_POST);
		//converte a data para o padrao americano
		$data = dataHoraAme($dataEvento);
		//Sql instrucao		
		$sql = "INSERT INTO evento (titulo, data, descricao, tipo, status) VALUES ('".$nomeEvento."', '".$data."', '".$infoModal."', '".$categoria."', 0)";

		//executa a query
		$resultado = $conexao->query($sql);
		
		header("Location: ../admin/evento.php");
	}

	function editarEventosStatus(){
		//Conexao
		$conexao = model_conexao();

		$idEvento = $_GET['id'];

		//Sql instrucao		
		$sql = "UPDATE evento SET status = 1 WHERE idEvento = '".$idEvento."'";

		//executa a query
		$resultado = $conexao->query($sql);

		header("Location: ../admin/evento.php");
	}

	function listarEventosVoluntarios(){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT * FROM evento WHERE tipo = 'voluntario' ORDER BY data DESC";

		//executa a query
		$resultado = $conexao->query($sql);
		//$resul = $resultado->fetch_all();

		//retorna o resultado
		return $resultado;
	}

	function listarEventosVoluntarioPessoa($idEvento, $idUsuario){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT * FROM eventoaux WHERE idEvento = '".$idEvento."' AND idUsuario = '".$idUsuario."'";

		//executa a query
		$resultado = $conexao->query($sql);

		if ($resul = $resultado->num_rows) {
			$msg = 1;
		} else {
			$msg = 0;
		}

		//retorna o resultado
		return $msg;
	}

	function cadastrarEventoVoluntario(){
		//Conexao
		$conexao = model_conexao();

		$data = dataHora();

		//Sql instrucao
		//$sql = "INSERT INTO eventoaux (idEvento, idUser, data, ativo) VALUES ('".$_SESSION['idEvento']."', '".$_SESSION['idUser']."', '".$data."', 1)";
		$sql = "INSERT INTO eventoaux (idEvento, idUsuario, dataCadastro, ativo) VALUES ('".$_SESSION['idEvento']."', '".$_SESSION['idUser']."', '".$data."', 1)";

		//executa a query
		$resultado = $conexao->query($sql);
		header("Location: ../voluntario.php?add=y");
	}

	/*			NOTAS - CRUD 		*/
	function addNota(){

	}

	function listaNotaAluno(){

	}

	/*				DISCIPLINAS			*/
	function listarDisciplinaAluno(){
		
	}

	/*			BOLETIM - CRUD 		*/
	function listaBoletim(){
		//Conexao
		$conexao = model_conexao();

		extract($_POST);

		//Sql instrucao
		$sql = "SELECT d.*, di.nome FROM disciplinaaux as d LEFT JOIN disciplina as di ON d.idDisciplina = di.idDisciplina WHERE d.idAluno = '".$_SESSION['idAluno']."'";

		//executa a query
		$resultado = $conexao->query($sql);
		//$resul = $resultado->fetch_array(MYSQLI_NUM);
		return $resultado;
	}
	function listaBoletimTodos(){
		//Conexao
		$conexao = model_conexao();

		extract($_POST);

		//Sql instrucao
		$sql = "SELECT d.*, di.nome FROM disciplinaaux as d LEFT JOIN disciplina as di ON d.idDisciplina = di.idDisciplina";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_all();
		return $resul;
	}
	/*			ATENDIMENTO - CRUD 		*/
	function listarAtendimento(){
		$conexao = model_conexao();

		$sql = "SELECT * FROM atendimento WHERE idUsuario = '".$_SESSION['idUser']."'";

		$resultado = $conexao->query($sql);
		//$resul = $resultado->fetch_array(MYSQLI_NUM);
		return $resultado;
	}

	//inserir atendimento.
	function inserirAtendimento(){
		$conexao = model_conexao();

		extract($_POST);

		$tipoRequerimento = $categoria. "/". $agendamento;

		$data = dataHora();

		$sql = "INSERT INTO atendimento (idUsuario, dataCriacao, tipoRequerimento, situacao) VALUES ('".$_SESSION['idUser']."','".$data."' ,'".$tipoRequerimento."', 'Aguardando')";

		$resultado = $conexao->query($sql);
		header("Location: ../gerarAtendimento.php");
	}
	

	/*			ESPAÇOFISICO - CRUD 		*/
	function listaEspacoFisico(){
		//Conexao
		$conexao = model_conexao();

		extract($_POST);

		//Sql instrucao
		$sql = "SELECT es.nome, e.* FROM espacofisico as e LEFT JOIN escola as es ON e.idEscola = es.idEscola";

		//executa a query
		$resultado = $conexao->query($sql);
		//$resul = $resultado->fetch_all();
		return $resultado;
	}

	function reservarEspaco(){
		$conexao = model_conexao();

		$idEspacoFisico = $_GET['idEspacoFisico'];


		$sql = "INSERT INTO espacofisicoaux (idUsuario, idEscola, idEspacoFisico) VALUES ('".$_SESSION['idUser']."', '".$_SESSION['idEscola']."', '".$idEspacoFisico."')";

		$resultado = $conexao->query($sql);

		$tela = $_SESSION['tela'];
		header("Location: ../$tela");		
	}

	/*			TURMA - CRUD 		*/
	function listarEscola(){
		//Conexao
		$conexao = model_conexao();

		//Sql instrucao
		$sql = "SELECT * FROM escola";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_all();
		return $resul;
	}

	function listarTurma(){
		//Conexao
		$conexao = model_conexao();

		$id = $_GET['id'];

		//Sql instrucao
		$sql = "SELECT * FROM turma WHERE idEscola = '".$id."'";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_all();
		echo json_encode($resul);
	}

	function listarAlunos(){
		//Conexao
		$conexao = model_conexao();

		$idTurma = $_GET['id'];

		//Sql instrucao
		$sql = "SELECT * FROM aluno WHERE idEscola = '".$_SESSION['idEscola']."' AND idTurma = '".$idTurma."'";

		//executa a query
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_all();
		echo json_encode($resul);
	}

	/*			FUNÇÕES AUXILIARES	*/

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
	//listar prof para materia
	function listarProfMateria($idmateria){
		$conexao = model_conexao();

		$sql = "SELECT d.nome, p.nome, pa.*   FROM professoraux as pa
				LEFT JOIN professor as p ON pa.idProfessor = p.idProfessor
                LEFT JOIN disciplina as d ON pa.idDisciplina = d.idDisciplina
				WHERE pa.idDisciplina ='".$idmateria."'";
		$resultado = $conexao->query($sql);
		if ($resul = $resultado->num_rows) {
			$resul = $resultado->fetch_array(MYSQLI_NUM);
		} else {
			$resul = 0;
		}		

		return $resul;
	}
	//Primeira letra maiscula
	function letraM($texto){
		$textoM = ucfirst($texto);
		return $textoM;
	}

	function contraste(){
		$_SESSION['contraste'] =  !$_SESSION['contraste'];
		$tela = $_SESSION['tela'];
		header("Location: ../$tela");
	}

	function anuncio(){
		$idAnuncio = rand(1, 5);

		$conexao = model_conexao();

		$sql = "SELECT * FROM anuncio WHERE idAnuncio = '".$idAnuncio."'";
		$resultado = $conexao->query($sql);
		$resul = $resultado->fetch_array(MYSQLI_NUM);

		return $resul;
	}

	//upload de arquivo

?>