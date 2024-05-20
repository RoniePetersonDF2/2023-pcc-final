-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jun-2023 às 23:43
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `arte`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arte`
--

CREATE TABLE `arte` (
  `idarte` int(11) NOT NULL,
  `nome_arte` varchar(100) NOT NULL,
  `nome_img` varchar(32) NOT NULL,
  `descricao_arte` varchar(250) NOT NULL,
  `idartesao` int(11) NOT NULL,
  `idcoop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `arte`
--

INSERT INTO `arte` (`idarte`, `nome_arte`, `nome_img`, `descricao_arte`, `idartesao`, `idcoop`) VALUES
(12, 'images.jpg', 'Toca de Tricô', 'Touca Gorro Tricô. R$20,90 - Frete grátis para compra a cima de 10 unidades.', 43, 9),
(15, 'cachecol.jpg', 'Cachecol em crochê LGBTQIA+', 'Cachecol em crochê, ultimas peças. #VivaOOrgulho \r\nR$49,90 - Frete grátis na compra de 3 ou mais.', 44, 9),
(16, 'elefante.jpg', 'Elefante de Crochê', 'Quem não curte um elefante? Ainda mais um elefantinho de crochê tão fofo. \r\nNossos elefantinhos são confeccionados a mão. Por apenas R$360,00 - Frete grátis em todo o DF ', 45, 9),
(17, 'lâmpada.jpg', 'Vasinhos minimalistas ', 'Vasinhos de bancada(decoratrix). #DoLixoAoLuxo\r\nR$15,90 a unidade - Pegar em meu endereço', 52, 11),
(18, 'brinquedo.jpg', 'Brinquero Reciclado', 'Brinquedo reciclado para uma criança. R$69,90 - Entrego em domicílio na compra de 2.', 53, 11),
(19, 'brinquedo2.jpg', 'Brinquedo Reciclado', 'Brinquedo reciclado para duas crianças. R$85,90 - Entrego em domicílio na compra de 2.', 53, 11),
(20, 'Decoração.png', 'Kit com 3 moveis ', 'Kit com 3 peças. Todas feitas com caixotes de madeira, contendo uma mesa de centro de 1 x 1. R$199,90 - Não faço entrega.', 54, 11),
(21, 'chapeu.jpg', 'Chapéu em Crochê', 'Chapéu inspirado no utilizado pela Jade Picon no BBB. R$67,90 - Retira no local', 47, 9),
(22, 'biquini.jpg', 'Biquíni', 'Biquíni em crochê inspirado nas cores da bandeira. Temos tamanhos P, M e GG. Forrado com lycra.\r\nPor apenas 59,90 - Frete grátis na compra de 3 ou mais.\r\n', 44, 9),
(23, 'casacocroche.jpg', 'Casaco em Crochê', 'Casaco ótimo para os dias frios, nos tamanhos M e G. Todo feito em crochê, por apenas R$180,90 - Faço entrega. ', 44, 9),
(24, 'ceramica3Bacias.jpg', 'Kit com 3 peças', 'Kit maravilhoso para presentear pessoas queridas, conjunto com 3 peças de alta qualidade. R$119,90 - Buscar no meu armazém', 50, 10),
(25, 'ceramica3conjuntos.jpg', 'Kit com 9 peças em cerâmica', 'Combo com 9 peças. Peças feitas a mão com todo amor e dedicação, por apenas R$399,90 - Entrega em domicílio', 49, 10),
(26, 'filtropintado.jpg', 'Filtro de Barro Decorado', 'Filtro de barro. Suporta até 4L de água e possui 2 velas em cerâmica que já acompanham o produto. R$125,90 - Retirar na Via Leste(Ceilândia-DF)', 48, 10),
(27, 'filtrodeBarro.jpg', 'Filtro de Barro silples', 'Filtro de barro. Suporta até 6L de água filtrada e possui 3 velas em cerâmica que já acompanham o produto. R$149,90 - Retirar na Via Leste(Ceilândia-DF)', 48, 10),
(28, 'telaarvorecombotao.jpg', 'Tela Primavera', 'Tela em 40 x 60cm. R$59,90 - Frete grátis', 56, 12),
(29, 'telagaiola.jpg', 'Quadro de Decoração', 'Quadro ótimo para por na sala ou cozinha 25 x 40cm. R$37,90 - Frete grátis.', 56, 12),
(30, 'tela arvorevermelha.jpg', 'Tela Trabalhada', 'Tela em 70 x 45cm. R$79,90 - Retirar no local.', 51, 12),
(31, 'telarosas.jpg', 'Tela Trabalhada', 'Tela em 60 x 65cm. R$69,90. - Retirar no local.', 51, 12),
(32, 'tricobonecodeneve.jpg', 'Boneco de Neve', 'Boneco de neve feito em crochê. Ele tem 30cm de altura, confeccionados a mão e só está saindo por R$79,90 - Frete grátis em todo o DF ', 45, 9),
(33, 'telasofaarvore.jpg', 'Tela Artistica', 'Moderna e versátil, se adapta bem em todos os cómodos. Um verdadeiro luxo! 2,4 x 1,5mt. R$1.509,90 - Entrego em domicílio. ', 55, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `artesao`
--

CREATE TABLE `artesao` (
  `idartesao` int(11) NOT NULL,
  `nome_artesao` varchar(80) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email_artesao` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `telefone_artesao` varchar(15) NOT NULL,
  `endereco_artesao` varchar(255) NOT NULL,
  `nome_coop` varchar(100) NOT NULL,
  `idcoop` int(11) NOT NULL,
  `perfil` char(3) NOT NULL DEFAULT 'off' COMMENT 'USE=Usuario comum\\r\\nADM=dministrador\\r\\nOFF=Desativado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `artesao`
--

INSERT INTO `artesao` (`idartesao`, `nome_artesao`, `cpf`, `email_artesao`, `senha`, `telefone_artesao`, `endereco_artesao`, `nome_coop`, `idcoop`, `perfil`) VALUES
(41, 'Kaio Gabriel', '069.123.098-90', 'kaio@adm', '202cb962ac59075b964b07152d234b70', '(61)98290-6313', 'qnn 24 cj f', 'Inovações S.', 8, 'adm'),
(42, 'Roze Felix', '098.123.876-53', 'roze@adm', '202cb962ac59075b964b07152d234b70', '(61)98657-9483', 'qnn 22 cj a', 'Inovações S.', 8, 'adm'),
(43, 'Amanda', '780.483.284-94', 'amanda@use', '202cb962ac59075b964b07152d234b70', '(61)98685-6466', 'qnn 24', 'Tricoche', 9, 'use'),
(44, 'Gabriel Oliveira', '097.472.804-46', 'gabriel@use', '202cb962ac59075b964b07152d234b70', '(61)98656-7876', 'qnn 8 cj a', 'Tricoche', 9, 'use'),
(45, 'July Maria', '012.890.765-12', 'ju.maria@use', '900150983cd24fb0d6963f7d28e17f72', '(61)98790-0910', 'qnm 8 cj k', 'Tricoche', 9, 'use'),
(46, 'Kaio Gabriel', '069.123.098-90', 'kaio2@adm', '202cb962ac59075b964b07152d234b70', '(61)98290-6313', 'qnn 24 cj f', 'Tricoche', 9, 'adm'),
(47, 'Maria Antonia', '083.973.628-43', 'maria@ex', '202cb962ac59075b964b07152d234b70', '(61)98289-8775', 'qno 10 cj a', 'Tricoche', 9, 'use'),
(48, 'Kelven Nunes', '654.321.798-00', 'kelven@email', '202cb962ac59075b964b07152d234b70', '(61)99999-9999', 'Casa do Kelven', 'Coop Cerâmica', 10, 'off'),
(49, 'Gaby Oliveira', '321.654.987-00', 'gaby@email', '202cb962ac59075b964b07152d234b70', '(61)99999-9999', 'casa do Gabriel', 'Coop Cerâmica', 10, 'use'),
(50, 'Claudia Lopes', '321.654.987-00', 'claudia@email', '202cb962ac59075b964b07152d234b70', '(61)99999-9999', 'Casa da Claudia', 'Coop Cerâmica', 10, 'use'),
(51, 'Ana maria', '789.456.123-00', 'ana@email', '202cb962ac59075b964b07152d234b70', '(61)99999-9999', 'Casa da Ana', 'Artes Plásticas', 12, 'use'),
(52, 'Janaina Melo', '789.456.123-00', 'janaina@email', '202cb962ac59075b964b07152d234b70', '(61)99999-9999', 'Casa da Janaina', 'Reciclagem', 11, 'use'),
(53, 'Marcela Andrade ', '123.456.789-00', 'marcela@email', '202cb962ac59075b964b07152d234b70', '(61)99999-9999', 'Casa da Marcela', 'Reciclagem', 11, 'use'),
(54, 'Norrana Krisley', '321.654.987-00', 'norrana@email', '202cb962ac59075b964b07152d234b70', '(61)99999-9999', 'Casa da Norrana', 'Reciclagem', 11, 'use'),
(55, 'Andréia Lopes ', '789.456.123-00', 'andreia@email', '202cb962ac59075b964b07152d234b70', '(61)99999-9999', 'Casa da Andréia', 'Artes Plásticas', 12, 'use'),
(56, 'Aline Melo', '654.321.987-00', 'aline@email', '202cb962ac59075b964b07152d234b70', '(61)99999-9999', 'Casa da Aline', 'Artes Plásticas', 12, 'use');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `id` int(10) NOT NULL,
  `idcoop` int(10) NOT NULL,
  `email_artesao` varchar(255) NOT NULL,
  `nome_artesao` varchar(50) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `idartesao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`id`, `idcoop`, `email_artesao`, `nome_artesao`, `mensagem`, `idartesao`) VALUES
(126, 9, 'amanda@use', 'Amanda', 'olá!', 43),
(127, 9, 'gabriel@use', 'Gabriel Oliveira', 'oii', 44),
(128, 9, 'ju.maria@use', 'July Maria', 'oie, tudo bem?', 45),
(129, 9, 'maria@ex', 'Maria Antonia', 'Bom dia meus amores, eu sou a Maria e é um prazer estar aqui com vocês. Como vocês estão? eu espero que estejam todos muitos bem!!❤️❤️❤️❤️❤️❤️❤️❤️❤️❤️❤️❤️❤️', 47),
(130, 9, 'maria@ex', 'Maria Antonia', 'Estou cheia de ideias e estou amando essa plataforma, aqui eu posso ter uma ideia do que vocês, meus concorrentes, estão fazendo ', 47),
(131, 9, 'maria@ex', 'Maria Antonia', 'e assim ter uma ideia do que eu devo evitar\r\n', 47),
(132, 9, 'maria@ex', 'Maria Antonia', 'Também estou amando as vantagens dessa cooperativa, tudo se encaixa perfeitamente', 47),
(133, 9, 'maria@ex', 'Maria Antonia', 'Até parece um sonho', 47),
(134, 9, 'amanda@use', 'Amanda', 'Sim, Maria. Isso é vdd', 43),
(135, 9, 'ju.maria@use', 'July Maria', 'Maria você é de qual cidade do DF, amei seus projetos que estão disponíveis na tela inicial.', 45),
(136, 9, 'ju.maria@use', 'July Maria', 'Acho que até poderíamos fazer algo juntas.\r\n', 45),
(137, 8, 'kaio@ADM', 'Kaio Gabriel', 'oi', 41),
(138, 9, 'ju.maria@use', 'July Maria', 'O que você acha?', 45);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cooperativa`
--

CREATE TABLE `cooperativa` (
  `idcoop` int(11) NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `natureza` varchar(45) NOT NULL,
  `telefone_coop` varchar(15) NOT NULL,
  `endereco_coop` varchar(255) NOT NULL,
  `email_coop` varchar(100) NOT NULL,
  `nome_fantasia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `cooperativa`
--

INSERT INTO `cooperativa` (`idcoop`, `nome_empresa`, `cnpj`, `natureza`, `telefone_coop`, `endereco_coop`, `email_coop`, `nome_fantasia`) VALUES
(8, 'Sousa Silva', '09.624.174/9301-84', 'Apoio mútuo', '(61)98266-7250', 'qnp 10', 'sousa@coop', 'Inovações S.'),
(9, 'Soares Bonfin', '58.924.597/4539-75', 'Apoio mútuo', '(61)98087-2674', 'W3 Norte', 'bonfin@coop', 'Tricoche'),
(10, 'Coop Cerâmica', '33.333.333/3333-33', 'Interesse econômico', '(61)99999-9999', 'Rua das cooperativas', 'coopceramica@email', 'Coop Cerâmica'),
(11, 'Reciclagem', '44.444.444/4444-44', 'Interesse econômico', '(61)99999-9999', 'Rua das cooperativas', 'Reciclagem@email.com', 'Reciclagem'),
(12, 'A.M.', '55.555.555/5555-55', 'Interesse econômico', '(61)99999-9999', 'Rua das cooperativas', 'artes@email', 'Artes Plásticas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `idpgto` int(11) NOT NULL,
  `nome_pgto` varchar(45) NOT NULL,
  `data_pgto` date NOT NULL,
  `pacote` varchar(11) NOT NULL DEFAULT 'PAG' COMMENT 'MEN=Mensal\\nSEM=Semestral',
  `idartesao` int(11) NOT NULL,
  `idcoop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`idpgto`, `nome_pgto`, `data_pgto`, `pacote`, `idartesao`, `idcoop`) VALUES
(109, 'Amanda ', '2023-06-18', 'MEN', 43, 9),
(110, 'Gabriel Oliveira', '2023-06-18', 'SEM', 44, 9),
(111, 'july Maria', '2023-06-18', 'SEM', 45, 9),
(116, 'Kelven Nunes', '2023-06-02', 'SEM', 48, 10),
(117, 'Gabriel Oliveira', '2023-06-05', 'SEM', 49, 10),
(118, 'Claudia Lopes ', '2023-06-06', 'MEN', 49, 10),
(119, 'Ana Maria ', '2023-06-11', 'MEN', 51, 12),
(120, 'Janaina Melo', '2023-06-17', 'MEN', 51, 12),
(121, 'Marcela Andrade ', '2023-06-15', 'MEN', 53, 11),
(122, 'Norrana Krisley', '2023-06-11', 'MEN', 49, 10),
(123, 'Andréia Lopes ', '2023-06-03', 'SEM', 51, 12),
(124, 'Aline Melo', '2023-06-06', 'SEM', 56, 12),
(125, 'Pedro Melo', '2023-06-11', 'MEN', 49, 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `arte`
--
ALTER TABLE `arte`
  ADD PRIMARY KEY (`idarte`,`idartesao`,`idcoop`),
  ADD KEY `fk_arte_artesao1_idx` (`idartesao`,`idcoop`);

--
-- Índices para tabela `artesao`
--
ALTER TABLE `artesao`
  ADD PRIMARY KEY (`idartesao`,`idcoop`),
  ADD KEY `fk_artesao_cooperativa_idx` (`idcoop`);

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idartesao` (`idartesao`);

--
-- Índices para tabela `cooperativa`
--
ALTER TABLE `cooperativa`
  ADD PRIMARY KEY (`idcoop`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`idpgto`,`idartesao`,`idcoop`),
  ADD KEY `fk_pagamento_artesao1_idx` (`idartesao`,`idcoop`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arte`
--
ALTER TABLE `arte`
  MODIFY `idarte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `artesao`
--
ALTER TABLE `artesao`
  MODIFY `idartesao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de tabela `cooperativa`
--
ALTER TABLE `cooperativa`
  MODIFY `idcoop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `idpgto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `arte`
--
ALTER TABLE `arte`
  ADD CONSTRAINT `fk_arte_artesao1` FOREIGN KEY (`idartesao`,`idcoop`) REFERENCES `artesao` (`idartesao`, `idcoop`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `artesao`
--
ALTER TABLE `artesao`
  ADD CONSTRAINT `fk_artesao_cooperativa` FOREIGN KEY (`idcoop`) REFERENCES `cooperativa` (`idcoop`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`idartesao`) REFERENCES `artesao` (`idartesao`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `fk_pagamento_artesao1` FOREIGN KEY (`idartesao`,`idcoop`) REFERENCES `artesao` (`idartesao`, `idcoop`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
