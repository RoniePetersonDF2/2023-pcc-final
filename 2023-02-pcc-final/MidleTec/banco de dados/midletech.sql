-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 08:29 PM
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
-- Table structure for table `instituicoes`
--

CREATE TABLE `instituicoes` (
  `idinstituicoes` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `ciadade` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `ddd` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `horarioabertura` varchar(255) NOT NULL,
  `horariofechamento` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `quadra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instituicoes`
--

INSERT INTO `instituicoes` (`idinstituicoes`, `nome`, `cep`, `estado`, `ciadade`, `numero`, `ddd`, `telefone`, `email`, `horarioabertura`, `horariofechamento`, `complemento`, `nick`, `quadra`) VALUES
(1, 'ESCOLA TÉCNICA DE CEILÂNDIA', '72220140', 'Distrito Federal', 'Ceilândia', '0', '61', '39017545', 'etc@se.df.gov.br', '08:00', '22:00', '', 'ETC', 'EQNN 14 Área Especial Sul');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matricula` mediumint(9) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `ddd` varchar(2) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  `dtnasc` date NOT NULL,
  `genero` varchar(50) NOT NULL,
  `cep` mediumint(8) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `instituicao` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instituicoes`
--
ALTER TABLE `instituicoes`
  ADD PRIMARY KEY (`idinstituicoes`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instituicoes`
--
ALTER TABLE `instituicoes`
  MODIFY `idinstituicoes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
