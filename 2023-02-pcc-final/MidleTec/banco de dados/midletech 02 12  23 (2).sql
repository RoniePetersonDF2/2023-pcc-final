-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 04:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midletech`
--

-- --------------------------------------------------------

--
-- Table structure for table `assinaturas`
--

CREATE TABLE `assinaturas` (
  `idassinatura` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `data` datetime(6) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `valor` float NOT NULL,
  `perildo` int(11) NOT NULL,
  `data_de_expiracao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `idavaliacao` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idinstituicao` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avaliacoes`
--

INSERT INTO `avaliacoes` (`idavaliacao`, `idusuario`, `idinstituicao`, `comentario`, `avaliacao`, `data`) VALUES
(15, 57, 7, 'muitas variedades de cursos oferecidas aqui.', 5, '2023-12-01 10:07:21'),
(16, 57, 8, 'ótimo lugar de ensino técnico, na área da saúde com exelentes professores.', 5, '2023-12-01 14:39:41'),
(17, 58, 8, 'ninguem atende no telefone da secretaria.', 3, '2023-12-01 14:48:03'),
(18, 58, 1, 'ótimos professores, qualidade de ensino exelente.', 5, '2023-12-01 14:51:15'),
(19, 42, 1, 'estou feliz por estar me formando nesta instituição.', 5, '2023-12-01 20:30:15'),
(20, 59, 5, 'existem poucas vagas nos melhores cursos.', 4, '2023-12-01 20:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `favoritos`
--

CREATE TABLE `favoritos` (
  `idfavoritos` tinyint(4) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idmaterial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favoritos`
--

INSERT INTO `favoritos` (`idfavoritos`, `idusuario`, `idmaterial`) VALUES
(25, 57, 55);

-- --------------------------------------------------------

--
-- Table structure for table `foruns`
--

CREATE TABLE `foruns` (
  `idforum` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descricao` text NOT NULL,
  `categoria` text NOT NULL,
  `proprietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foruns`
--

INSERT INTO `foruns` (`idforum`, `titulo`, `descricao`, `categoria`, `proprietario`) VALUES
(11, 'Coleta Seletiva nas Escolas Técnicas', 'Como é feita a coleta seletiva em sua instituição?', 'Sustentabilidade e Meio Ambiente', 58),
(12, 'Saúde e Bem-Estar', 'Tópicos relacionados à saúde e bem-estar, incluindo exercícios, dietas saudáveis, e gerenciamento do estresse. Buscando promover um estilo de vida saudável e equilibrado.', 'Saúde e Bem-Estar', 57),
(13, 'Jogos e Entretenimento', 'Conversas animadas sobre seus jogos favoritos, ler análises detalhadas e ficar por dentro dos torneios mais recentes. Comunidades de fãs de filmes, séries e livros para aqueles que desejam compartilhar e discutir sobre.', 'Jogos e Entretenimento', 57),
(15, 'Arte e Cultura', 'Espaço dedicado à apreciação crítica de obras de arte, filmes, música e literatura. Incentivando o compartilhamento de projetos de arte e fomentando a criação colaborativa entre nossos membros. Promoção de debates animados sobre cultura pop e as tendências mais recentes.', 'Arte e Cultura', 59),
(16, 'Física e Matemática', 'Debates estimulantes sobre teorias, fórmulas e problemas matemáticos, assim como discutir os princípios fundamentais da física.', 'Física e Matemática', 59),
(17, 'Educação e Aprendizado', 'Promove debates sobre métodos de estudo eficazes para melhorar o desempenho acadêmico. Apoio a estudantes que enfrentam dificuldades em suas jornadas educacionais.', 'Educação e Aprendizado', 59),
(18, 'Carreiras e Emprego', 'Recurso para orientação de carreira e desenvolvimento profissional. Aqui, você encontrará ofertas de emprego e oportunidades de freelancers para impulsionar sua trajetória profissional. Promove discussões sobre entrevistas, técnicas de networking e estratégias para avançar em sua carreira.', 'Carreiras e Emprego', 59),
(19, 'Alimentação e Culinária', 'Compartilhamento de receitas deliciosas e técnicas de cozinha. Avaliações de restaurantes e pratos, ajuda para escolher os melhores locais para suas refeições fora de casa. Incentiva discussões sobre dietas especiais, como vegetarianismo e paleo, para ajudá-lo a encontrar opções que atendam às suas preferências alimentares.', 'Alimentação e Culinária', 62),
(20, 'História e Genealogia', 'Discussões envolventes sobre eventos históricos e genealogia familiar. Oferece ajuda e orientação para pesquisas de árvores genealógicas e registros históricos.', 'História e Genealogia', 62);

-- --------------------------------------------------------

--
-- Table structure for table `foruns_msg`
--

CREATE TABLE `foruns_msg` (
  `idforuns_msg` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idforum` int(11) NOT NULL,
  `mensagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foruns_msg`
--

INSERT INTO `foruns_msg` (`idforuns_msg`, `idusuario`, `idforum`, `mensagem`) VALUES
(33, 57, 11, 'Nos da ETBRAZ temos espalhados em nossa instituição varias lixeiras de materiais reciclaveis para que os alunos possam fazer o descarte de forma consiente. '),
(34, 58, 11, 'Na minha escola não é diferente, nossos professores estão sempre nos aconselhando a fazer o descarte de forma correta.');

-- --------------------------------------------------------

--
-- Table structure for table `instituicoes`
--

CREATE TABLE `instituicoes` (
  `idinstituicoes` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `ddd` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `slogan` text NOT NULL,
  `descricao` text NOT NULL,
  `logo` varchar(150) NOT NULL,
  `facebook` varchar(150) NOT NULL,
  `instagram` varchar(150) NOT NULL,
  `docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instituicoes`
--

INSERT INTO `instituicoes` (`idinstituicoes`, `nome`, `cep`, `estado`, `cidade`, `numero`, `ddd`, `telefone`, `email`, `complemento`, `sigla`, `endereco`, `slogan`, `descricao`, `logo`, `facebook`, `instagram`, `docente`) VALUES
(1, ' ESCOLA TÉCNICA DE CEILÂNDIA ', '72220140', 'Distrito Federal', 'CEILÂNDIA', '0', '61', '61 39017545', 'etc@se.df.gov.br', '', 'ETC', 'EQNN 14 Área Especial Sul', 'A sua Escola de programação e Marketing Digital', 'A Escola Técnica de Ceilândia - ETC, instituição de educação profissional, surgiu em 1982. Estrategicamente localizada ao lado da estação do metrô, na guariroba, área especial, QNN 14, possui uma estrutura de 16 laboratórios de informática, salas de multimídias, teatro de arena, auditório, oficinas de gastronomia, cabeleireiro, mecânica, elétrica, marcenaria e costura. Atende a cada ano cerca de 6 mil alunos.\r\n\r\nA ETC, com sua respeitabilidade adquirida ao longo dos anos, vem preparando profissionais para o mundo do trabalho, garantindo a formação geral e técnica, desenvolvendo um cidadão com participação efetiva na sociedade.', '../upload/instituicoes/1/42656158bf7ef263.84139023.png', 'https://pt-br.facebook.com/cepceilandia/', '', 62),
(5, 'ESCOLA TÉCNICA DE BRAZLÂNDIA', '72734056', '', 'BRAZLÂNDIA', '', '', '(61) 3901-4935', 'etbraz@edu.se.gov.br', '', 'ETBRAZ', 'Qd 34 AE 34 Vila São José', 'Construindo Futuros Brilhantes', 'Nós da Escola Técnica de Brazlândia, também conhecida como Centro de Educação Profissional Escola Técnica Deputado Juarezão, estamos entusiasmados em recebê-los em nosso espaço dedicado à formação profissional de excelência. Desde o momento em que nossas portas se abrem para você, nossa missão clara e inspiradora está em ação.', '../upload/instituicoes/ESCOLA TÉCNICA DE BRAZLÂNDIA/ESCOLA TÉCNICA DE BRAZLÂNDIA65693ff4bbeb05.43220752.png', '', 'https://www.instagram.com/cep_etbraz/', 57),
(7, 'ESCOLA TÉCNICA DE BRASÍLIA', '71966700', '', 'BRASÍLIA', '', '', '(61) 3901-6767', 'alaideetb@gmail.com', '', 'ETB', 'Qs 07 lote 02/08 avenida Águas Claras - Vila Areal ', '', 'A missão do CEP-ETB é oferecer Educação Profissional para jovens e adultos na perspectiva da formação de um cidadão crítico e consciente, desenvolvendo competências, habilidades e atitudes que possibilitem o desempenho de atividades produtivas e a sua consequente inserção no mundo do trabalho.\r\n\r\n\r\nO CEP-ETB tem como objetivo oferecer Educação Profissional Técnica de Nível Médio e Formação Inicial e Continuada de Trabalhadores, incluindo a formação ética, o desenvolvimento da autonomia intelectual, do pensamento reflexivo e da criatividade.\r\n\r\n', '../upload/instituicoes/ESCOLA TÉCNICA DE BRASÍLIA/ESCOLA TÉCNICA DE BRASÍLIA6569d7a9510ea5.99915129.jpg', 'https://www.facebook.com/EtbBsb/', '', 58),
(8, 'ESCOLA TÉCNICA DE PLANALTINA', '73310000', '', 'PLANALTINA', '', '', '(61) 3901-6788', 'cepetp@gov.com', '', 'ETECSAUDE', 'Entrw Av Contorno e Independência SN', '', 'O Centro de Educação Profissional Escola Técnica de Planaltina - CEP ETP foi inaugurado no ano de 1998. A instituição está localizada Entre as Avenidas Independência com a Contorno, Setor Hospitalar, Planaltina DF.\r\nAlém da unidade sede em Planaltina, o CEP ETP conta com Unidades Remotas, as quais funcionam em parceria com outras escolas públicas no distrito Federal, a exemplo do CEF Miguel Arcanjo em São Sebastião, com a oferta dos curso na modalidade presencial de Técnico em Administração, Técnico em Logística e Técnico em Saúde Bucal e do curso na modalidade de Educação à distância de Técnico em Controle Ambiental. Vale ressaltar que as Unidades Remotas são viabilizadas pela parceria entre as escolas e o PRONATEC/Programa Novos Caminhos.', '../upload/instituicoes/ESCOLA TÉCNICA DE PLANALTINA/ESCOLA TÉCNICA DE PLANALTINA656a10c5aac418.68018584.png', '', '', 60);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `idmaterial` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `avalicao` varchar(100) NOT NULL,
  `proprietario` int(11) NOT NULL,
  `endereco` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`idmaterial`, `titulo`, `descricao`, `tipo`, `autor`, `assunto`, `avalicao`, `proprietario`, `endereco`) VALUES
(55, 'Modelo de Dados (Banco de Dados)', 'diagramas de modelo de dados usados em banco de dados.', 'artigo', '', 'Banco de Dados', '', 57, '../upload/PEDRO SANTOS/Modelo de Dados (Banco de Dados).pdf'),
(56, 'Integridade de dados', 'integridade dos dados do banco de dados.', 'artigo', '', 'Banco de Dados', '', 57, '../upload/PEDRO SANTOS/Integridade de dados.pdf'),
(57, 'Modelo OSI', 'artigo sobre as camadas do modelo OSI (redes de computadores)', 'artigo', '', 'redes', '', 59, '../upload/MARIA GONSALVES/Modelo OSI.pdf'),
(59, 'entenda programação em javascript', 'entenda como funciona a programação de javascript.', 'ytbvid', '', 'javascript', '', 58, 'https://www.youtube.com/watch?v=rQseLH4LDXQ'),
(60, 'metodo facil de aprender Javascript', 'entenda os metodos mais faceis de aprender javascript.', 'ytbvid', '', 'javascript', '', 58, ' https://www.youtube.com/watch?v=OHN8Ze4te70'),
(61, 'Aula de css e html', 'aprenda a montar uma página simples apenas usuando css e html', 'ytbvid', '', 'html', '', 58, ' https://www.youtube.com/watch?v=qPYCnebQQ6U'),
(62, 'html e css básico', 'aprenda o basico de css e html.', 'ytbvid', '', 'html', '', 58, ' https://www.youtube.com/watch?v=n_Etdr7Dbjs'),
(63, 'aula de css e html', 'confira a aula sobre html e css', 'ytbvid', '', 'css', '', 58, 'https://www.youtube.com/watch?v=E6CdIawPTh0'),
(64, 'Criptografia Blowfish', 'artigo detalhado sobre o algoritimo blowfish.', 'artigo', '', 'blowfish', '', 42, '../upload/DIONES SILVA/Criptografia Blowfish.pdf'),
(65, 'Memoria Rom e BIOS (Montagem e Configuração)', 'material de montagem e configuração explicando o que é memoria ROM e bios', 'artigo', '', 'Montagem e Configuração', '', 42, '../upload/DIONES SILVA/Memoria Rom e BIOS (Montagem e Configuração).pdf'),
(70, 'Inteligência Artificial Aplicada a Ambientes de Engenharia de Software: Uma Visão Geral', 'Este artigo vem mostrar alguns ambientes que utilizam técnicas de Inteligência Artificial e propor o uso de outras técnicas para melhorar os Ambientes de Engenharia de Software.', 'artigo', '', 'Inteligência Artificial', '', 44, '../upload/DIONES SILVA/Inteligência Artificial Aplicada a Ambientes de Engenharia de Software: Uma Visão Geral.pdf'),
(71, 'Metodologias para a criação de jogos educativos: uma revisão sistemática da literatura', 'Esta pesquisa propõe um mapeamento sobre metodologias para o desenvolvimento de jogos educativos, enfocando, principalmente, em estudos que explicitam a concepção da documentação de design.', 'artigo', '', 'Criação de Jogos', '', 44, '../upload/DIONES SILVA/Metodologias para a criação de jogos educativos: uma revisão sistemática da literatura.pdf'),
(73, 'O QUE É A INTELIGÊNCIA ARTIFICIAL (AI)?', 'Inteligência artificial, algoritmos, robôs e como tudo isso vai impactar cada vez mais os nossos cotidianos nas próximas décadas. pipipopo', 'ytbvid', '', 'Inteligência artificial', '', 44, 'https://youtu.be/UhA_ZgI-otM?si=iFS1-K7NCNwGW5RH'),
(74, 'W3Schools', 'site para aprendizagem de programação', 'link', '', 'programação', '', 44, 'https://www.w3schools.com');

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `idnoticia` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `idinstituicao` int(11) NOT NULL,
  `noticia` text NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`idnoticia`, `idusuario`, `titulo`, `idinstituicao`, `noticia`, `imagem`, `data`) VALUES
(10, 42, 'Sábado Letivo', 1, 'Caros alunos, informamos que, devido ao feriado ocorrido recentemente, teremos aulas de reposição no próximo sábado. Agradecemos pela compreensão.', '../upload/instituicoes/1/Sábado Letivo65615ee37471a7.76662966.png', '2023-11-24 23:41:39'),
(11, 57, 'Renovação de Matricula', 5, 'Devido ao feriado a renovação de matricula poderá ser feita até a proxima segunda feira, dia 04 de novembro.', '../upload/instituicoes/5/Renovação de Matricula65694fe262a3f9.51656429.png', '2023-12-01 00:15:46'),
(12, 57, 'Curso de Tecnico em Enfermagem', 5, 'As inscrições poderão ser feitas atravez do site da secretaria de educação.', '../upload/instituicoes/5/Curso de Tecnico em Enfermagem6569554775de11.82708251.png', '2023-12-01 00:38:47'),
(13, 57, 'Outras Informações', 5, 'Para mais informações referente a nossa instituiçao entre em contato pelo whatzapp: 3901-4935', '../upload/instituicoes/5/Outras Informações656956f1ce0272.71930801.png', '2023-12-01 00:45:53'),
(14, 58, 'Processo Classificatorio ETB', 7, 'Inscrições abertas até o dia 10/12/2023 ', '../upload/instituicoes/7/Procsso Classificatorio ETB6569d893a01393.81568814.png', '2023-12-01 09:58:59'),
(19, 60, 'Informações', 8, 'Se você deseja informações sobre o Centro de Educação Profissional - Escola Técnica de Planaltina - CEP-SAÚDE, entre em contato conosco via WATSAPP. Para que possamos agilizar o atendimento\r\nWhatsApp SECRETARIA ESCOLAR  61 9 9809 8035\r\nWhatsApp  EDUCAÇÃO A DISTÂNCIA  61 9 9857 9398', '../upload/instituicoes/8/Informações656a156aef7bb8.47167432.png', '2023-12-01 14:18:34'),
(20, 62, 'Processo Seletivo 2024', 1, 'inscrições abertas de 28/11/2023 a 10/12/2023', '../upload/instituicoes/1/Processo Seletivo 2024656a65e3aa5cc8.16987624.png', '2023-12-01 20:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `perfis`
--

CREATE TABLE `perfis` (
  `idperfil` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `sigla` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perfis`
--

INSERT INTO `perfis` (`idperfil`, `nome`, `sigla`) VALUES
(1, 'ADMINISTRADOR', 'ADM'),
(2, 'ALUNO', 'ALU'),
(3, 'DOCENTE', 'DOC'),
(4, 'ALUNO ASSINATE', 'ALSIN');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matricula` varchar(9) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `ddd` varchar(2) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `dtnasc` date NOT NULL,
  `genero` varchar(50) NOT NULL,
  `cep` mediumint(8) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `instituicao` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `perfil` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `docmatricula` varchar(100) NOT NULL,
  `datacadastro` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome`, `sobrenome`, `email`, `matricula`, `senha`, `ddd`, `telefone`, `dtnasc`, `genero`, `cep`, `estado`, `cidade`, `instituicao`, `status`, `perfil`, `imagem`, `docmatricula`, `datacadastro`) VALUES
(1, 'ADM MIDLETECH', '', 'adm@email.com', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '0000-00-00', '', 0, '', '', NULL, 1, 1, 'upload/ADM MIDLETECH/66666666656a3af52a4840.30423053.png', '', '2023-12-01 16:58:45.000000'),
(42, 'DIONES SILVA', '', 'diones@email.com', '22204056', 'e10adc3949ba59abbe56e057f20f883e', '', '(61) 99177-1048', '1997-02-12', '', 0, '', '', 1, 1, 2, 'upload/DIONES SILVA/42656a41e40e19d0.02215320.png', '../upload/DIONES SILVA/42656a45da86faf0.52793438.pdf', '2023-10-10 22:52:47.000000'),
(44, 'HISLA PAIXãO DIAS', '', 'hisla.aluna@gmail.com', '22203991', 'e10adc3949ba59abbe56e057f20f883e', '', '619951195', '2003-09-28', '', 0, '', '', 1, 1, 2, 'upload/HISLA PAIXãO DIAS/2220399165520be3181ac9.15340826.png', '', '2023-11-13 08:43:31.000000'),
(57, 'PEDRO SANTOS', '', 'pedrosantos@email.com', '', 'e10adc3949ba59abbe56e057f20f883e', '', '(61) 66554-4331', '1991-05-04', '', 0, '', '', NULL, 1, 3, 'upload/PEDRO SANTOS/PEDRO SANTOS65693147eafed1.47541423.png', '', '2023-11-30 22:05:11.000000'),
(58, 'PAULO RODRIGUES', '', 'paulorodrigues@email.com', '', 'e10adc3949ba59abbe56e057f20f883e', '', '(61) 99778-8665', '1980-02-08', '', 0, '', '', NULL, 1, 3, 'upload/PAULO RODRIGUES/PAULO RODRIGUES6569d2d0b9b421.19654443.png', '', '2023-12-01 09:34:24.000000'),
(59, 'MARIA GONSALVES', '', 'mariagonsalves@email.com', '887766552', 'e10adc3949ba59abbe56e057f20f883e', '', '(61) 99887-7000', '1975-01-01', '', 0, '', '', 7, 1, 2, 'upload/MARIA GONSALVES/887766556569e9c4c9e8f1.67810582.png', '../upload/MARIA GONSALVES/887766556569e9c4c9fd43.12823277.pdf', '2023-12-01 11:12:20.000000'),
(60, 'MARTA NASCIMENTO', '', 'martanascimento@email.com', '', 'e10adc3949ba59abbe56e057f20f883e', '', '(61) 11223-3445', '1995-07-04', '', 0, '', '', NULL, 1, 3, 'upload/MARTA NASCIMENTO/60656a0a46c78e88.45424868.png', '', '2023-12-01 13:29:41.000000'),
(62, 'DIONES SILVA', '', 'docente@email.com', '22204056', 'e10adc3949ba59abbe56e057f20f883e', '', '(61) 99177-1048', '1997-02-12', '', 0, '', '', NULL, 1, 3, 'upload/DIONES SILVA/42656a41e40e19d0.02215320.png', '../upload/DIONES SILVA/42656a45da86faf0.52793438.pdf', '2023-10-10 22:52:47.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assinaturas`
--
ALTER TABLE `assinaturas`
  ADD PRIMARY KEY (`idassinatura`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indexes for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`idavaliacao`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idinstituicao` (`idinstituicao`);

--
-- Indexes for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`idfavoritos`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `favoritos_ibfk_1` (`idmaterial`);

--
-- Indexes for table `foruns`
--
ALTER TABLE `foruns`
  ADD PRIMARY KEY (`idforum`),
  ADD KEY `foruns_ibfk_1` (`proprietario`);

--
-- Indexes for table `foruns_msg`
--
ALTER TABLE `foruns_msg`
  ADD PRIMARY KEY (`idforuns_msg`),
  ADD KEY `foruns_msg_ibfk_1` (`idforum`),
  ADD KEY `foruns_msg_ibfk_2` (`idusuario`);

--
-- Indexes for table `instituicoes`
--
ALTER TABLE `instituicoes`
  ADD PRIMARY KEY (`idinstituicoes`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idmaterial`),
  ADD KEY `proprietario` (`proprietario`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idnoticia`);

--
-- Indexes for table `perfis`
--
ALTER TABLE `perfis`
  ADD PRIMARY KEY (`idperfil`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `perfil` (`perfil`),
  ADD KEY `instituicao` (`instituicao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assinaturas`
--
ALTER TABLE `assinaturas`
  MODIFY `idassinatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `idavaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `idfavoritos` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `foruns`
--
ALTER TABLE `foruns`
  MODIFY `idforum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `foruns_msg`
--
ALTER TABLE `foruns_msg`
  MODIFY `idforuns_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `instituicoes`
--
ALTER TABLE `instituicoes`
  MODIFY `idinstituicoes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `idmaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `perfis`
--
ALTER TABLE `perfis`
  MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assinaturas`
--
ALTER TABLE `assinaturas`
  ADD CONSTRAINT `assinaturas_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avaliacoes_ibfk_2` FOREIGN KEY (`idinstituicao`) REFERENCES `instituicoes` (`idinstituicoes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`idmaterial`) REFERENCES `material` (`idmaterial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foruns`
--
ALTER TABLE `foruns`
  ADD CONSTRAINT `foruns_ibfk_1` FOREIGN KEY (`proprietario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foruns_msg`
--
ALTER TABLE `foruns_msg`
  ADD CONSTRAINT `foruns_msg_ibfk_1` FOREIGN KEY (`idforum`) REFERENCES `foruns` (`idforum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foruns_msg_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`proprietario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`instituicao`) REFERENCES `instituicoes` (`idinstituicoes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`perfil`) REFERENCES `perfis` (`idperfil`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
