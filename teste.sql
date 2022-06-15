-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jun-2022 às 11:08
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste`
--
CREATE DATABASE IF NOT EXISTS `teste` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `teste`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `url`
--

DROP TABLE IF EXISTS `url`;
CREATE TABLE IF NOT EXISTS `url` (
  `n_cod_url` int(11) NOT NULL AUTO_INCREMENT,
  `c_descricao` varchar(1000) NOT NULL,
  `f_status` varchar(1) NOT NULL,
  `n_cod_usuario_inc` int(11) NOT NULL,
  `d_inclusao` date NOT NULL,
  `n_cod_usuario_alt` int(11) DEFAULT NULL,
  `d_alteracao` int(11) DEFAULT NULL,
  PRIMARY KEY (`n_cod_url`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `url`
--

INSERT INTO `url` (`n_cod_url`, `c_descricao`, `f_status`, `n_cod_usuario_inc`, `d_inclusao`, `n_cod_usuario_alt`, `d_alteracao`) VALUES
(1, 'teste1.com', 'S', 1, '2022-06-15', NULL, NULL),
(2, 'teste2.com', 'S', 1, '2022-06-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `n_cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `c_login` varchar(100) NOT NULL,
  `d_criacao` date NOT NULL,
  `d_modificacao` date DEFAULT NULL,
  PRIMARY KEY (`n_cod_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`n_cod_usuario`, `c_login`, `d_criacao`, `d_modificacao`) VALUES
(1, 'thiago.tufolo', '2022-06-14', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
