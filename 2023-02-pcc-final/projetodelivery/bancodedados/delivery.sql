-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/11/2023 às 03:51
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `delivery`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `id_venda`, `id_produto`, `cpf`, `quantidade`) VALUES
(214, 24, 2, '000.000.000-10', 2),
(215, 24, 12, '000.000.000-10', 6),
(216, 25, 13, '000.000.000-10', 4),
(217, 25, 1, '000.000.000-10', 2),
(218, 26, 14, '000.000.000-10', 1),
(226, 26, 2, '000.000.000-10', 2),
(230, 27, 1, '000.000.000-10', 2),
(231, 27, 2, '000.000.000-10', 2),
(232, 28, 13, '000.000.000-10', 4),
(233, 28, 12, '000.000.000-10', 6),
(234, 29, 2, '000.000.000-10', 2),
(235, 29, 13, '000.000.000-10', 4),
(236, 30, 2, '000.000.000-10', 2),
(237, 30, 1, '000.000.000-10', 2),
(238, 31, 1, '000.000.000-10', 2),
(242, 32, 2, '000.000.000-00', 2),
(243, 32, 1, '000.000.000-00', 2),
(244, 33, 1, '000.000.000-10', 2),
(245, 33, 13, '000.000.000-10', 4),
(246, 34, 2, '000.000.000-10', 2),
(247, 34, 1, '000.000.000-10', 2),
(248, 34, 13, '000.000.000-10', 4),
(249, 35, 1, '000.000.000-10', 2),
(250, 35, 2, '000.000.000-10', 2),
(251, 36, 12, '000.000.000-10', 6),
(252, 36, 2, '000.000.000-10', 2),
(253, 37, 12, '000.000.000-10', 6),
(254, 37, 2, '000.000.000-10', 2),
(263, 45, 12, '999.999.999-99', 1),
(267, 38, 1, '000.000.000-10', 1),
(268, 38, 2, '000.000.000-10', 2),
(269, 38, 24, '000.000.000-10', 1),
(270, 38, 25, '000.000.000-10', 1),
(271, 39, 1, '000.000.000-10', 1),
(272, 39, 2, '000.000.000-10', 2),
(273, 40, 2, '000.000.000-10', 2),
(274, 41, 2, '000.000.000-10', 2),
(276, 42, 2, '000.000.000-10', 2),
(277, 46, 2, '000.000.000-10', 1),
(282, 43, 2, '000.000.000-01', 2),
(283, 44, 2, '000.000.000-01', 2),
(284, 44, 12, '000.000.000-01', 1),
(287, 47, 2, '000.000.000-10', 1),
(288, 48, 2, '000.000.000-10', 1),
(289, 49, 2, '000.000.000-10', 1),
(290, 50, 2, '000.000.000-10', 1),
(291, 51, 2, '000.000.000-10', 1),
(292, 52, 2, '000.000.000-10', 1),
(293, 53, 2, '000.000.000-10', 1),
(294, 55, 2, '000.000.000-10', 1),
(295, 56, 2, '000.000.000-10', 1),
(296, 57, 2, '000.000.000-10', 1),
(297, 58, 2, '000.000.000-10', 1),
(298, 59, 2, '000.000.000-10', 1),
(299, 60, 2, '000.000.000-10', 1),
(300, 61, 2, '000.000.000-10', 1),
(302, 62, 2, '000.000.000-10', 1),
(303, 63, 16, '000.000.000-01', 2),
(313, 0, 2, '000.000.000-01', 1),
(314, 65, 16, '222.222.222-22', 1),
(318, 66, 13, '222.222.222-22', 1),
(321, 67, 27, '012.398.621-48', 1),
(322, 68, 12, '012.398.621-48', 1),
(324, 0, 16, '012.398.621-48', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `nome_url` varchar(50) NOT NULL,
  `produtos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `descricao`, `imagem`, `nome_url`, `produtos`) VALUES
(1, 'Bebidas', 'Bebidas', 'bebidas.jpeg', 'bebidas', 4),
(2, 'Sanduíches Artesanais', 'Sanduíches Artesanais', 'artesanal.jpeg', 'sanduiches-artesanais', 2),
(7, 'Açaí', 'Açaís', 'acai.jpeg', 'acai', 2),
(8, 'Sanduíches', 'Sanduíches', 'sanduiches.jpeg', 'sanduiches', 3),
(9, 'Pizza', 'Pizza', 'pizzas.jpeg', 'pizza', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `cartao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `telefone`, `email`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `cartao`) VALUES
(1, 'Marcos Santos', '000.000.000-10', '(11) 11111-1111', 'marcos@gmail.com', 'Rua 5', '55', 'Céu Azul', 'Belo Horizonte', 'MG', '33333-333', 21),
(2, 'Hugo Freitas', '111.111.111-11', '(11) 11111-1111', 'hugovasconcelosf@hotmail.com', 'Rua 5', '55', 'Céu Azul', 'Belo Horizonte', '', '', 0),
(3, 'José Silva ', '000.000.000-01', '(99) 99999-999', 'teste@teste.com', 'qnn 6', '01', 'Ceilândia Sul ', 'ceilandia ', '', '', 4),
(4, 'lene', '222.222.222-22', '(61) 99999-9999', 'lene@gmail.com', '5', '24', 'Samambaia Norte', 'samambaia ', 'MG', '72323-011', 2),
(5, 'helena ', '012.398.621-48', '(61) 99406-5329', 'helena@gmail.com', 'quadra 415', '24', 'Samambaia Norte', 'samambaia ', '', '', 2),
(6, 'Douglas Carlos Dias ', '259.746.371-00', '(61) 99406-5329', 'douglasdcdnet@gmail.com', '', '', '', '', '', '', 0),
(7, 'douglas', '555.555.555-55', '(61) 99406-5329', 'dcd@gmail.com', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `previsao_minutos` int(11) NOT NULL,
  `taxa_entrega` decimal(8,2) NOT NULL,
  `abertura` time NOT NULL,
  `fechamento` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `config`
--

INSERT INTO `config` (`id`, `previsao_minutos`, `taxa_entrega`, `abertura`, `fechamento`) VALUES
(1, 40, 5.00, '18:00:00', '23:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `locais`
--

CREATE TABLE `locais` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `locais`
--

INSERT INTO `locais` (`id`, `nome`) VALUES
(1, 'Ceilândia Sul '),
(3, 'Ceilândia Norte '),
(4, 'Samambaia Sul'),
(5, 'Samambaia Norte'),
(8, 'Taguatinga Norte ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `descricao_longa` varchar(600) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `categoria` int(11) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `nome_url` varchar(50) NOT NULL,
  `combo` varchar(10) DEFAULT NULL,
  `vendas` int(11) NOT NULL,
  `adicional` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `descricao_longa`, `valor`, `categoria`, `imagem`, `nome_url`, `combo`, `vendas`, `adicional`) VALUES
(1, 'Açai 600 ML', 'Açaí na Taça', 'Açaí com Leite em pó e granola', 8.99, 7, 'acai 1.jpeg', 'acai-600-ml', NULL, 11, NULL),
(10, 'Duas Barcas', 'Combo Completo', 'Combo imperdível com duas barcas completas com muito açãi e cheia de incrementos!', 60.00, 7, 'barcas.jpg', 'duas-barcas', 'Sim', 0, NULL),
(12, 'Chessburguer', 'Carne e Queijo', 'Delicioso Chessburguer com carne bovina, queijo, maionese, picles, ketchup!!', 9.99, 8, 'sanduiche 1.jpeg', 'chessburguer', NULL, 5, NULL),
(13, 'Bufalo Burguer', 'Gigante e Saboroso', 'Um Sanduíche gigantesco, pra quem tem muita fome, a base de carne bovina, cheddar ....', 12.50, 8, 'sanduiche 2.jpeg', 'bufalo-burguer', NULL, 3, NULL),
(14, '3 Pizzas Grandes', 'Super Promoção', 'Aproveite já nossa super promoção, são 3 pizzas grande de 8 fatias cada, muito saborosa...', 47.90, 9, 'pizza promocao.jpeg', '3-pizzas-grandes', 'Sim', 0, NULL),
(15, 'Sanduiche Gourmet', 'Delicioso Artesanal', 'Um Delicioso sanduiche artesenal, carne de frango ....', 10.00, 2, 'gourmet.jpeg', 'sanduiche-gourmet', NULL, 0, NULL),
(16, 'Pizza Grande', '8 Fatias', 'Pizza Grande de 8 Fatias nos sabores frango com catu....', 17.90, 9, 'pizza 1.jpeg', 'pizza-grande', NULL, 4, NULL),
(17, 'Pizza Média', '6 Pedaços', 'Pizza Média ...', 11.90, 9, 'pizza 2.jpeg', 'pizza-media', NULL, 0, NULL),
(18, 'Combo Artesanais', '2 Sanduiches', 'Dois Deliciosos sanduiches artesanais', 18.00, 2, 'promocao artesanais.jpeg', 'combo-artesanais', 'Sim', 0, NULL),
(19, 'Combo Sanduíches', '3 Sanduiches', 'Trez Gigantescos sanduiches...', 29.99, 8, 'promocao sanduinches.jpeg', 'combo-sanduiches', 'Sim', 0, NULL),
(20, 'Coca Cola Lata', '350 ML', 'Refrigerante Coca Cola Lata', 3.50, 1, 'WhatsApp Image 2020-05-13 at 22.38.18.jpeg', 'coca-cola-lata', NULL, 0, NULL),
(21, 'Agua Mineral', 'Garrafa 200 ML', 'Agua Mineral', 2.00, 1, 'WhatsApp Image 2020-05-13 at 22.41.30.jpeg', 'agua-mineral', NULL, 0, NULL),
(22, 'Suco Lata', '290 ML', 'Suco de Lata 290 ML', 2.90, 1, 'WhatsApp Image 2020-05-13 at 22.45.31.jpeg', 'suco-lata', NULL, 0, NULL),
(23, 'Cerveja Lata', '350 ML', 'Cerveja Lata', 4.50, 1, 'WhatsApp Image 2020-05-13 at 22.49.20.jpeg', 'cerveja-lata', NULL, 0, NULL),
(29, 'pizza calabresa', 'pizza grande 8 pedaços ', 'mussarela,calabresa,cebola e orégano!', 20.00, 9, 'pizza 2.jpeg', 'pizza-calabresa', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(35) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `telefone`, `usuario`, `senha`, `nivel`) VALUES
(22, 'Marcos Santos', '000.000.000-10', '(11) 11111-1111', 'marcos@gmail.com', '123', 'Cliente'),
(23, 'Hugo Freitas', '111.111.111-11', '(11) 11111-1111', 'hugovasconcelosf@hotmail.com', '123', 'Cliente'),
(24, 'douglas', '000.000.000-00', '3333-3399', 'dcdnet@gmail.com', '123', 'Admin'),
(26, 'Douglas', '999.999.999-99', '(99) 99999-9990', 'balconista@hotmail.com', '123', 'Balconista'),
(27, 'douglas', '000.000.000-01', '(99) 99999-999', 'teste@teste.com', '123', 'Cliente'),
(28, 'lene', '222.222.222-22', '(61) 99999-9999', 'lene@gmail.com', '123', 'Cliente'),
(29, 'luiz', '259.777.777-77', '(61) 99999-9999', 'luiz@luiz.com', '123', 'Balconista'),
(30, 'helena ', '012.398.621-48', '(61) 99406-5329', 'helena@gmail.com', '123', 'Cliente'),
(31, 'Douglas Carlos Dias ', '259.746.371-00', '(61) 99406-5329', 'douglasdcdnet@gmail.com', '123', 'Cliente'),
(32, 'douglas', '555.555.555-55', '(61) 99406-5329', 'dcd@gmail.com', '123', 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `total_pago` decimal(8,2) NOT NULL,
  `troco` decimal(8,2) NOT NULL,
  `tipo_pgto` varchar(30) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `status` varchar(25) NOT NULL,
  `pago` varchar(5) NOT NULL,
  `obs` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `cliente`, `total`, `total_pago`, `troco`, `tipo_pgto`, `data`, `hora`, `status`, `pago`, `obs`) VALUES
(26, '000.000.000-10', 49.90, 50.00, 0.10, 'Dinheiro', '2020-05-20', '11:58:13', 'Concluído', 'Não', NULL),
(27, '000.000.000-10', 19.98, 0.00, 0.00, 'Cartão de Crédito', '2020-05-20', '11:59:53', 'Concluído', 'Não', NULL),
(28, '000.000.000-10', 22.49, 0.00, 0.00, 'Cartão de Débito', '2020-05-20', '12:06:22', 'Concluído', 'Sim', NULL),
(29, '000.000.000-10', 27.00, 0.00, 0.00, 'Cartão de Débito', '2020-05-20', '12:09:07', 'Concluído', 'Sim', NULL),
(30, '000.000.000-10', 19.98, 0.00, 0.00, 'Cartão de Crédito', '2020-05-20', '12:10:04', 'Concluído', 'Sim', NULL),
(31, '000.000.000-10', 26.97, 0.00, 0.00, 'Cartão de Débito', '2020-05-20', '12:11:41', 'Concluído', 'Sim', NULL),
(32, '000.000.000-00', 15.99, 21.00, 5.01, 'Dinheiro', '2020-05-20', '16:39:04', 'Iniciado', 'Não', NULL),
(33, '000.000.000-10', 21.49, 50.00, 28.51, 'Dinheiro', '2020-05-20', '16:39:34', 'Despachado', 'Não', NULL),
(34, '000.000.000-10', 31.48, 50.00, 18.52, 'Dinheiro', '2020-05-20', '17:04:29', 'Preparando', 'Não', 'Tirar o Picles'),
(35, '000.000.000-10', 9.99, 15.00, 5.01, 'Dinheiro', '2020-05-21', '12:23:47', 'Iniciado', 'Não', 'Retirar Cebola e Picles'),
(36, '000.000.000-10', 10.99, 0.00, 0.00, 'Cartão de Débito', '2020-05-21', '12:24:48', 'Iniciado', 'Não', ''),
(37, '000.000.000-10', 15.99, 20.00, 4.01, 'Dinheiro', '2020-05-21', '12:26:25', 'Iniciado', 'Sim', 'Tirar Picles e Azeitona'),
(38, '000.000.000-10', 21.49, 0.00, 0.00, 'Mercado Pago', '2020-05-21', '15:41:47', 'Aguardando', 'Não', ''),
(39, '000.000.000-10', 14.99, 0.00, 0.00, 'Cartão de Crédito', '2020-05-21', '16:03:33', 'Despachado', 'Não', ''),
(40, '000.000.000-10', 1.00, 0.00, 0.00, 'Mercado Pago', '2020-05-21', '16:39:44', 'Iniciado', 'Sim', ''),
(41, '000.000.000-10', 1.00, 0.00, 0.00, 'Mercado Pago', '2020-05-21', '16:40:36', 'Iniciado', 'Sim', ''),
(42, '000.000.000-10', 1.00, 0.00, 0.00, 'Mercado Pago', '2020-05-21', '16:48:09', 'Aguardando', 'Não', ''),
(43, '000.000.000-01', 7.00, 0.00, 0.00, 'Cartão de Débito', '2020-05-21', '20:09:18', 'Iniciado', 'Não', ''),
(44, '000.000.000-01', 16.99, 20.00, 3.01, 'Dinheiro', '2020-05-21', '20:11:38', 'Iniciado', 'Não', ''),
(45, '999.999.999-99', 15.99, 16.00, 0.01, 'Dinheiro', '2020-05-21', '20:55:22', 'Iniciado', 'Não', 'Nbbjjj'),
(63, '000.000.000-01', 35.80, 50.00, 14.20, 'Dinheiro', '2023-11-18', '14:13:04', 'Concluído', 'Sim', ''),
(64, '000.000.000-01', 22.90, 50.00, 27.10, 'Dinheiro', '2023-11-20', '08:51:34', 'Concluído', 'Sim', 'sem cebola !'),
(65, '222.222.222-22', 22.90, 0.00, 0.00, 'Cartão de Crédito', '2023-11-20', '09:42:37', 'Concluído', 'Sim', 'retirar azeitona!'),
(66, '222.222.222-22', 17.50, 0.00, 0.00, 'Cartão de Débito', '2023-11-20', '23:20:58', 'Preparando', 'Não', ''),
(67, '012.398.621-48', 15.00, 20.00, 5.00, 'Dinheiro', '2023-11-22', '19:44:45', 'Concluído', 'Sim', ''),
(68, '012.398.621-48', 14.99, 0.00, 0.00, 'Cartão de Débito', '2023-11-22', '21:35:29', 'Concluído', 'Sim', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
