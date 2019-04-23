-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 23-Abr-2019 às 00:18
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `biblioteca`
--
CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_livro`
--

CREATE TABLE IF NOT EXISTS `categoria_livro` (
  `ID_CATEGORIA_LIVRO` int(11) NOT NULL AUTO_INCREMENT,
  `NUM_MAX_DIAS_EMP` int(11) NOT NULL,
  `DESCRICAO_CATEGORIA` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_CATEGORIA_LIVRO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `categoria_livro`
--

INSERT INTO `categoria_livro` (`ID_CATEGORIA_LIVRO`, `NUM_MAX_DIAS_EMP`, `DESCRICAO_CATEGORIA`) VALUES
(1, 5, 'Lançamento'),
(2, 10, 'Semi-Lançamento'),
(3, 15, 'Normal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `ENDERECO` varchar(50) NOT NULL,
  `TELEFONE` int(12) NOT NULL DEFAULT '0',
  `DATA_NASC` date NOT NULL,
  `CIDADE` varchar(10) NOT NULL,
  `ESTADO` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_CLIENTE`,`TELEFONE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`ID_CLIENTE`, `NOME`, `ENDERECO`, `TELEFONE`, `DATA_NASC`, `CIDADE`, `ESTADO`) VALUES
(1, 'maria', 'av 12', 4845, '2015-10-28', 'matao', 'SP'),
(2, 'cliente 2', 'kkkkk', 1516, '2019-05-19', 'matão', 'sp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `ID_FUNCIONARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `ENDERECO` varchar(50) NOT NULL,
  `TELEFONE` int(12) NOT NULL DEFAULT '0',
  `DATA_NASC` date NOT NULL,
  `PERIODO_TRABALHO` varchar(10) DEFAULT NULL,
  `CIDADE` varchar(10) NOT NULL,
  `ESTADO` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_FUNCIONARIO`,`TELEFONE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`ID_FUNCIONARIO`, `NOME`, `ENDERECO`, `TELEFONE`, `DATA_NASC`, `PERIODO_TRABALHO`, `CIDADE`, `ESTADO`) VALUES
(1, 'joao', 'av 36', 5555, '2008-03-02', 'manha', 'araraquara', 'sp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `ID_LIVRO` int(11) NOT NULL AUTO_INCREMENT,
  `TITULO` varchar(50) NOT NULL,
  `AUTOR` varchar(50) NOT NULL,
  `EDITORA` varchar(20) NOT NULL,
  `NUMERO_PAGINA` int(10) DEFAULT NULL,
  `ID_CAT_LIVRO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_LIVRO`),
  KEY `ID_CAT_LIVRO` (`ID_CAT_LIVRO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`ID_LIVRO`, `TITULO`, `AUTOR`, `EDITORA`, `NUMERO_PAGINA`, `ID_CAT_LIVRO`) VALUES
(3, 'titulo livro', 'autor do livro', 'editora', 500, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `ID_RESERVA` int(11) NOT NULL AUTO_INCREMENT,
  `DATA_RESERVA` date NOT NULL,
  `DATA_DEVOLUCAO` date NOT NULL,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `ID_FUNCIONARIO` int(11) DEFAULT NULL,
  `ID_LIVRO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_RESERVA`),
  KEY `ID_CLIENTE` (`ID_CLIENTE`),
  KEY `ID_FUNCIONARIO` (`ID_FUNCIONARIO`),
  KEY `ID_LIVRO` (`ID_LIVRO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`ID_RESERVA`, `DATA_RESERVA`, `DATA_DEVOLUCAO`, `ID_CLIENTE`, `ID_FUNCIONARIO`, `ID_LIVRO`) VALUES
(4, '2019-04-22', '2019-04-16', 1, 1, 3);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`ID_CAT_LIVRO`) REFERENCES `categoria_livro` (`ID_CATEGORIA_LIVRO`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`ID_FUNCIONARIO`) REFERENCES `funcionario` (`ID_FUNCIONARIO`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`ID_LIVRO`) REFERENCES `livro` (`ID_LIVRO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
