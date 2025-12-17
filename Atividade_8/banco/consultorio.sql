-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/12/2025 às 01:20
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
-- Banco de dados: `consultorio`
--
CREATE DATABASE IF NOT EXISTS `consultorio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `consultorio`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `SENHA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`ID`, `USUARIO`, `SENHA`) VALUES
(2, 'Lucas', '$2y$10$AQ9Pn1GqQaSyu1yDmtAGxelM/MsH1XYtIElBhTxNtcEUNk74AJ7m2'),
(3, 'Arthur Germano', '$2y$10$hx7lmc68Js7BOXsl1NPOYecfChuI8PERINVRLjPsRGArpPtO4j0PG');

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta`
--

CREATE TABLE `consulta` (
  `ID_CON` int(11) NOT NULL,
  `ID_MEDICO` int(11) NOT NULL,
  `ID_PACIENTE` int(11) NOT NULL,
  `DATA_CONSULTA` date NOT NULL,
  `HORA_CONSULTA` time NOT NULL,
  `OBSERVACAO` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consulta`
--

INSERT INTO `consulta` (`ID_CON`, `ID_MEDICO`, `ID_PACIENTE`, `DATA_CONSULTA`, `HORA_CONSULTA`, `OBSERVACAO`) VALUES
(2, 4, 2, '2026-06-28', '12:00:00', 0x6e656e68756d61),
(3, 2, 3, '2026-02-20', '15:47:00', 0x4e656e68756d61);

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `ESPECIALIDADE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medico`
--

INSERT INTO `medico` (`ID`, `NOME`, `ESPECIALIDADE`) VALUES
(2, 'Jeraldo', 'Odontologia'),
(4, 'Guilherme', 'Dermatologia'),
(5, 'gabriel Luna', 'Psiquiatria');

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `DATA_NASCIMENTO` date NOT NULL,
  `TIPO_SANGUINEO` enum('A+','A-','AB+','AB-','B+','B-','O+','O-') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`ID`, `NOME`, `DATA_NASCIMENTO`, `TIPO_SANGUINEO`) VALUES
(1, 'Lucas Bezerra da Silva', '2006-06-15', 'A+'),
(2, 'Neuraci da Silva', '1960-08-07', 'A-'),
(3, 'Adeilton da Silva', '1980-09-05', 'B+');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`ID_CON`),
  ADD KEY `ID_MEDICO` (`ID_MEDICO`),
  ADD KEY `ID_PACIENTE` (`ID_PACIENTE`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `ID_CON` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`ID_MEDICO`) REFERENCES `medico` (`ID`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`ID_PACIENTE`) REFERENCES `paciente` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
