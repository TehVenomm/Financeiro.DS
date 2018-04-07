-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Abr-2018 às 02:49
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `braz_bd`
--
CREATE DATABASE IF NOT EXISTS `braz_bd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `braz_bd`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `brinquedo_tb`
--

CREATE TABLE `brinquedo_tb` (
  `idBrinquedo` int(4) NOT NULL,
  `precoHora` double NOT NULL,
  `limiteCrianca` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `brinquedo_tb`
--

INSERT INTO `brinquedo_tb` (`idBrinquedo`, `precoHora`, `limiteCrianca`) VALUES
(1, 1.3, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `crianca_tb`
--

CREATE TABLE `crianca_tb` (
  `idCrianca` int(4) NOT NULL,
  `nomeCrianca` varchar(200) NOT NULL,
  `nomeResponsavel` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `crianca_tb`
--

INSERT INTO `crianca_tb` (`idCrianca`, `nomeCrianca`, `nomeResponsavel`) VALUES
(1, 'Adilson Jr', 'Asilson Sr');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permanencia_tb`
--

CREATE TABLE `permanencia_tb` (
  `idPermanencia` int(4) NOT NULL,
  `idCrianca_Permanencia` int(4) NOT NULL,
  `horaInicio` date NOT NULL,
  `horaFim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_tb`
--

CREATE TABLE `usuario_tb` (
  `idUsuario` int(4) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_tb`
--

INSERT INTO `usuario_tb` (`idUsuario`, `email`, `senha`) VALUES
(1, 'gabrielbrazs@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(3, 'atendente1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brinquedo_tb`
--
ALTER TABLE `brinquedo_tb`
  ADD PRIMARY KEY (`idBrinquedo`);

--
-- Indexes for table `crianca_tb`
--
ALTER TABLE `crianca_tb`
  ADD PRIMARY KEY (`idCrianca`);

--
-- Indexes for table `permanencia_tb`
--
ALTER TABLE `permanencia_tb`
  ADD PRIMARY KEY (`idPermanencia`),
  ADD KEY `idCrianca_Permanencia` (`idCrianca_Permanencia`);

--
-- Indexes for table `usuario_tb`
--
ALTER TABLE `usuario_tb`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brinquedo_tb`
--
ALTER TABLE `brinquedo_tb`
  MODIFY `idBrinquedo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crianca_tb`
--
ALTER TABLE `crianca_tb`
  MODIFY `idCrianca` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permanencia_tb`
--
ALTER TABLE `permanencia_tb`
  MODIFY `idPermanencia` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario_tb`
--
ALTER TABLE `usuario_tb`
  MODIFY `idUsuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `permanencia_tb`
--
ALTER TABLE `permanencia_tb`
  ADD CONSTRAINT `idCrianca_Permanencia` FOREIGN KEY (`idCrianca_Permanencia`) REFERENCES `permanencia_tb` (`idPermanencia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
