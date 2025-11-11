-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/11/2025 às 21:03
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_animes`
--
CREATE DATABASE IF NOT EXISTS `db_animes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_animes`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `animes`
--

CREATE TABLE `animes` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `data_publicacao` date NOT NULL,
  `nota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `animes`
--

INSERT INTO `animes` (`id`, `nome`, `genero`, `data_publicacao`, `nota`) VALUES
(1, 'Jujutsu Kaisen', 'Acão', '2025-11-28', 10),
(2, 'Naruto', 'Acão', '2001-05-07', 9);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animes`
--
ALTER TABLE `animes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
