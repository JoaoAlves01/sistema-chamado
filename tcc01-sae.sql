-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Mar-2019 às 20:58
-- Versão do servidor: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc01-sae`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idAluno` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `dataNascimento` date NOT NULL,
  `idTurma` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `ativo` int(1) NOT NULL,
  `apelido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `matricula`, `nome`, `dataNascimento`, `idTurma`, `foto`, `ativo`, `apelido`) VALUES
(3, 1010, 'Alberto Junior da S Rosa', '0000-00-00', 1, '09.jpeg', 1, ''),
(4, 1111, 'Aline Flôr de Oliveira', '0000-00-00', 1, '10.jpeg', 1, ''),
(5, 2020, 'Brenda rodrigues dos Santos', '0000-00-00', 1, '04.jpeg', 1, ''),
(6, 2121, 'Flávia da Silva Nascimento', '0000-00-00', 1, '11.jpeg', 1, ''),
(7, 0, 'Guilherme Pereira C da Silva', '0000-00-00', 1, '08.jpeg', 1, ''),
(8, 0, 'Guilherme Ramalho G Teixeira', '0000-00-00', 1, '12.jpeg', 1, ''),
(9, 0, 'Helio Machado Fonseca', '0000-00-00', 1, '13.jpeg', 1, ''),
(10, 0, 'Izabelly Vitória Reais Gomes', '0000-00-00', 1, '14.jpeg', 1, ''),
(11, 0, 'João Pedro Benvindo da Silva', '0000-00-00', 1, '15.jpeg', 1, ''),
(12, 0, 'João Pedro Souza de Oliveira', '0000-00-00', 1, '01.jpeg', 1, ''),
(13, 0, 'Juan Jefferson Assunmção Dias', '0000-00-00', 1, '06.jpeg', 1, ''),
(14, 0, 'Laila da Silva Pinheiro', '0000-00-00', 1, '16.jpeg', 1, ''),
(15, 0, 'Lucas da Conceição dos S Gomes', '0000-00-00', 1, '17.jpeg', 1, ''),
(16, 0, 'Lucas Laino do Nascimento', '0000-00-00', 1, '07.jpeg', 1, ''),
(17, 0, 'Lúcia Victória de Aráujo Pereira', '0000-00-00', 1, '18.jpeg', 1, ''),
(18, 0, 'Luis Phellype Coelho Dutra', '0000-00-00', 1, '02.jpeg', 1, ''),
(19, 0, 'Nathan Machado Pereira', '0000-00-00', 1, '05.jpeg', 1, ''),
(20, 0, 'Nicolas Nunes Ferreira Vasconcellos', '0000-00-00', 1, '19.jpeg', 1, ''),
(21, 0, 'Pablo Oliveira Marins', '0000-00-00', 1, '20.jpeg', 1, ''),
(22, 0, 'Pedro Roberto Macedo de Sousa', '0000-00-00', 1, '21.jpeg', 1, ''),
(23, 0, 'Sergio Henrique Pereira da Silva', '0000-00-00', 1, '03.jpeg', 1, ''),
(24, 0, 'Thais Paloma Santos Avila', '0000-00-00', 1, '22.jpeg', 1, ''),
(25, 0, 'Thais Raimundo Torres dos Santos', '0000-00-00', 1, 'user.png', 0, ''),
(26, 0, 'Victor Leon Soares dos Anjos', '0000-00-00', 1, 'user.png', 0, ''),
(27, 0, 'Caio Luiz de Souza', '0000-00-00', 9, 'user.png', 1, ''),
(28, 0, 'Felipe Cardoso Gomes', '0000-00-00', 9, 'user.png', 1, ''),
(29, 0, 'Fernanda Saldanha Antunes', '0000-00-00', 9, 'user.png', 1, ''),
(30, 0, 'Flávia da Silva Muniz', '0000-00-00', 9, 'user.png', 1, ''),
(31, 0, 'Francyelle Carlone Soares Braga', '0000-00-00', 9, 'user.png', 1, ''),
(32, 0, 'Gabriel Felix Menezes', '0000-00-00', 9, 'user.png', 1, ''),
(33, 0, 'Gabriella Santiago da C Silva', '0000-00-00', 9, 'user.png', 1, ''),
(34, 0, 'Higor Queiroz Rangel Gomes', '0000-00-00', 9, 'user.png', 1, ''),
(35, 0, 'Isabelle de Oliveira Barbosa', '0000-00-00', 9, 'user.png', 1, ''),
(36, 0, 'João Pedro de Oliveira Santana', '0000-00-00', 9, 'user.png', 1, ''),
(37, 0, 'João Pedro dos Santos Abel', '0000-00-00', 9, 'user.png', 1, ''),
(38, 0, 'Kemilly de Souza Silva Daniel', '0000-00-00', 9, 'user.png', 1, ''),
(39, 0, 'Larissa Cristina Demétrio Abel', '0000-00-00', 9, 'user.png', 1, ''),
(40, 0, 'Leticia Ribeiro de Oliveira Marques', '0000-00-00', 9, 'user.png', 1, ''),
(41, 0, 'Luan Bruno Caldas do Nascimento', '0000-00-00', 9, 'user.png', 1, ''),
(42, 0, 'Luiz Otavio Soares de Oliveira', '0000-00-00', 9, 'user.png', 1, ''),
(43, 0, 'Marcele Regino de Carvalho', '0000-00-00', 9, 'user.png', 1, ''),
(44, 0, 'Mylena da Silva dos Santos', '0000-00-00', 9, 'user.png', 1, ''),
(45, 0, 'Nicolly da Silva Figueiredo', '0000-00-00', 9, 'user.png', 1, ''),
(46, 0, 'Pollyana Diniz de Carvalho', '0000-00-00', 9, 'user.png', 1, ''),
(47, 0, 'Ruan Gonçalves de Almeida', '0000-00-00', 9, 'user.png', 1, ''),
(48, 0, 'Sabrina Cristine N Torres Pinheiro', '0000-00-00', 9, 'user.png', 1, ''),
(49, 0, 'Shandler Fernandes do Valle', '0000-00-00', 9, 'user.png', 1, ''),
(50, 0, 'Thamiris Cristina F Pinheiro', '0000-00-00', 9, 'user.png', 1, ''),
(51, 0, 'Yan Louis C Costa Francisco', '0000-00-00', 9, 'user.png', 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `idAtividade` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `descricao` longtext NOT NULL,
  `dataAtividade` date NOT NULL,
  `dataCriacao` date NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `idTurma` int(11) NOT NULL,
  `ativo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`idAtividade`, `nome`, `descricao`, `dataAtividade`, `dataCriacao`, `tipo`, `idTurma`, `ativo`) VALUES
(15, 'Criação de layout', 'Criação de um layout básico.', '0000-00-00', '2019-02-02', 'atividade', 1, 1),
(16, 'Criação de um facebook', 'Criação de um facebook como página para exibir informações de produtos.', '0000-00-00', '2019-02-02', 'atividade', 1, 0),
(17, 'Criação banner para facebook', 'Criação de um banner para o facebook.', '0000-00-00', '2019-02-02', 'atividade', 1, 0),
(18, 'Avaliação Formativa', 'Conceitos e efeitos.', '0000-00-00', '2019-02-03', 'avaliacao', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auxalunoturmadisciplina`
--

CREATE TABLE `auxalunoturmadisciplina` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auxatividadealuno`
--

CREATE TABLE `auxatividadealuno` (
  `id` int(11) NOT NULL,
  `idAtividade` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `auxatividadealuno`
--

INSERT INTO `auxatividadealuno` (`id`, `idAtividade`, `idTurma`, `idAluno`, `tipo`) VALUES
(15, 15, 1, 5, 'atividade'),
(16, 16, 1, 5, 'atividade'),
(17, 16, 1, 18, 'atividade'),
(18, 16, 1, 23, 'atividade'),
(19, 17, 1, 5, 'atividade'),
(20, 17, 1, 18, 'atividade'),
(21, 18, 1, 5, 'avaliacao'),
(22, 18, 1, 23, 'avaliacao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auxchamadaaluno`
--

CREATE TABLE `auxchamadaaluno` (
  `id` int(11) NOT NULL,
  `idChamada` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `auxchamadaaluno`
--

INSERT INTO `auxchamadaaluno` (`id`, `idChamada`, `idAluno`) VALUES
(11, 42, 3),
(12, 42, 4),
(13, 44, 7),
(14, 45, 30),
(15, 45, 29),
(16, 45, 28),
(17, 48, 5),
(18, 50, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auxdisciplinaturma`
--

CREATE TABLE `auxdisciplinaturma` (
  `id` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `auxdisciplinaturma`
--

INSERT INTO `auxdisciplinaturma` (`id`, `idCurso`, `idTurma`, `idDisciplina`) VALUES
(23, 2, 9, 21),
(24, 2, 9, 22),
(25, 1, 1, 1),
(26, 1, 1, 2),
(27, 1, 1, 3),
(28, 1, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auxprofessorturmadisciplina`
--

CREATE TABLE `auxprofessorturmadisciplina` (
  `id` int(11) NOT NULL,
  `idProf` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamada`
--

CREATE TABLE `chamada` (
  `idChamada` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `data` date NOT NULL,
  `ativo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `chamada`
--

INSERT INTO `chamada` (`idChamada`, `idTurma`, `idDisciplina`, `data`, `ativo`) VALUES
(42, 1, 1, '2019-01-28', 0),
(43, 9, 1, '2019-01-28', 1),
(44, 1, 1, '2019-01-29', 0),
(45, 9, 1, '2019-01-29', 0),
(46, 9, 1, '2019-01-30', 0),
(47, 1, 1, '2019-02-01', 1),
(48, 1, 1, '2019-02-02', 0),
(49, 9, 1, '2019-02-02', 0),
(50, 1, 1, '2019-02-03', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `cargaHoraria` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`idCurso`, `nome`, `descricao`, `cargaHoraria`) VALUES
(1, 'WebDesign', 'Planejar, criar, desenvolver e publicar páginas web.', '800'),
(2, 'Operador de Suporte Técnico em TI', 'Implementar e manter infraestrutura de computadores, sistemas operacionais e redes de dados, aplicando\r\nnormas segurança de rede, padrões técnicos, de acordo com as políticas de segurança da informação e\r\nprovendo suporte aos usuários.', '800');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `idDisciplina` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `cargaHoraria` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`idDisciplina`, `nome`, `idCurso`, `cargaHoraria`) VALUES
(1, 'Leitura e Comunicação', 1, 20),
(2, 'Relações Sócio Profissionais, Cidadania e Ética', 1, 24),
(3, 'Saúde e Segurança do Trabalho', 1, 36),
(4, 'Planejamento e Organização do Trabalho', 1, 20),
(5, 'Raciocínio Lógico e Análise de Dados', 1, 20),
(6, 'Metodologia de Projetos', 1, 40),
(7, 'Marketing', 1, 36),
(8, 'Teoria da cor ', 1, 24),
(9, 'Tipografia', 1, 24),
(10, 'Tratamento de imagens ', 1, 36),
(11, 'Usabilidade e acessibilidade', 1, 40),
(12, 'Projeto de websites', 1, 36),
(13, 'Criação de layouts', 1, 60),
(14, 'Construção de páginas web', 1, 160),
(15, 'Programação web', 1, 80),
(16, 'Frameworks e bibliotecas', 1, 80),
(17, 'Publicação de projetos web', 1, 32),
(18, 'Sistema de gerenciamento de conteudo', 1, 32),
(21, 'Leitura e Comunicação', 2, 20),
(22, 'Relações Sócio Profissionais, Cidadania e Ética', 2, 24),
(23, 'Saúde e Segurança do Trabalho', 2, 36),
(24, 'Planejamento e Organização do Trabalho', 2, 20),
(25, 'Raciocínio Lógico e Análise de Dados', 2, 20),
(26, 'Atendimento ao cliente interno e externo', 2, 20),
(27, 'Empreendedorismo e inovação', 2, 20),
(28, 'Fundamentos de eletroeletrônica', 2, 20),
(29, 'Arquitetura de Computadores', 2, 60),
(30, 'Montagem, manutenção e instalação de computadores', 2, 80),
(31, 'Instalação, configuração e operação de sistemas operacionais', 2, 60),
(32, 'Redes de computadores', 2, 40),
(33, 'Telecomunicações e Comunicação de dados', 2, 60),
(34, 'Instalação e configuração de rede', 2, 80),
(35, 'Cabeamento estruturado', 2, 40),
(36, 'Configuração de servidores de redes', 2, 60),
(37, 'Manutenção e suporte técnico', 2, 60),
(38, 'Segurança de redes aplicada ao suporte técnico', 2, 40),
(39, 'Gerenciamento de serviços de TI', 2, 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `idProf` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `dataNascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idProf`, `nome`, `sobrenome`, `dataNascimento`) VALUES
(1, 'Raimundo', 'Tavares Dionizio', '1964-12-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_chamado`
--

CREATE TABLE `sc_chamado` (
  `idChamada` int(11) NOT NULL,
  `idTecnico` int(11) NOT NULL,
  `categoria` varchar(25) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `data` date NOT NULL,
  `estatos` int(1) NOT NULL,
  `idUI` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sc_chamado`
--

INSERT INTO `sc_chamado` (`idChamada`, `idTecnico`, `categoria`, `titulo`, `texto`, `data`, `estatos`, `idUI`) VALUES
(1, 3, 'urgente', 'Titulo 1', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '2019-03-05', 0, '0'),
(2, 4, 'andamento', 'Titulo 2', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '2019-03-05', 0, '0'),
(3, 3, 'andamento', 'Titulo 3', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '2019-03-05', 0, '0'),
(4, 4, 'urgente', 'urgente 2', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '2019-03-05', 0, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_comentario`
--

CREATE TABLE `sc_comentario` (
  `idComentario` int(11) NOT NULL,
  `idChamada` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `texto` varchar(250) NOT NULL,
  `data` date NOT NULL,
  `idUI` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sc_comentario`
--

INSERT INTO `sc_comentario` (`idComentario`, `idChamada`, `idUsuario`, `texto`, `data`, `idUI`) VALUES
(58, 1, 1, 'fazendo um teste.', '2019-03-03', 'c05fcdde95bdae1beaf2e16b665da0c4'),
(59, 1, 1, 'oi', '2019-03-03', 'fd68913d36fc2be398fec1f227a07494'),
(60, 1, 1, 'dsdsdd', '2019-03-03', 'c819f6cfe9a897f862741f4c99d8e14b'),
(61, 1, 1, 'sdsd', '2019-03-03', '5f54730a3312a35b6bbfa5e36bd633ee'),
(62, 1, 1, 'sdsdsd', '2019-03-03', 'dfff18cd5a3fbb91fc0fe60f59853fce'),
(63, 1, 1, 'dsdsdd', '2019-03-03', '4cef371b5e15d08967b4d7d04c517fd3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `idTurma` int(11) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `turno` varchar(15) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `inicio` date NOT NULL,
  `termino` date NOT NULL,
  `idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`idTurma`, `numero`, `turno`, `ativo`, `inicio`, `termino`, `idCurso`) VALUES
(1, '2018011', 'Tarde', 1, '0000-00-00', '0000-00-00', 1),
(9, '2018018', 'Manhã', 1, '0000-00-00', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(25) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `login`, `senha`, `foto`) VALUES
(1, 'Diogo', 'diogo', '202cb962ac59075b964b07152d234b70', '030.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`);

--
-- Indexes for table `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`idAtividade`);

--
-- Indexes for table `auxalunoturmadisciplina`
--
ALTER TABLE `auxalunoturmadisciplina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auxatividadealuno`
--
ALTER TABLE `auxatividadealuno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auxchamadaaluno`
--
ALTER TABLE `auxchamadaaluno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auxdisciplinaturma`
--
ALTER TABLE `auxdisciplinaturma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auxprofessorturmadisciplina`
--
ALTER TABLE `auxprofessorturmadisciplina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamada`
--
ALTER TABLE `chamada`
  ADD PRIMARY KEY (`idChamada`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`idDisciplina`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idProf`);

--
-- Indexes for table `sc_chamado`
--
ALTER TABLE `sc_chamado`
  ADD PRIMARY KEY (`idChamada`);

--
-- Indexes for table `sc_comentario`
--
ALTER TABLE `sc_comentario`
  ADD PRIMARY KEY (`idComentario`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`idTurma`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `atividade`
--
ALTER TABLE `atividade`
  MODIFY `idAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `auxalunoturmadisciplina`
--
ALTER TABLE `auxalunoturmadisciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auxatividadealuno`
--
ALTER TABLE `auxatividadealuno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `auxchamadaaluno`
--
ALTER TABLE `auxchamadaaluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `auxdisciplinaturma`
--
ALTER TABLE `auxdisciplinaturma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `auxprofessorturmadisciplina`
--
ALTER TABLE `auxprofessorturmadisciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chamada`
--
ALTER TABLE `chamada`
  MODIFY `idChamada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `idDisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `idProf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sc_chamado`
--
ALTER TABLE `sc_chamado`
  MODIFY `idChamada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sc_comentario`
--
ALTER TABLE `sc_comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
