-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/01/2026 às 00:37
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
(1, 'Lucas', '$2y$10$QrIR/mIybKpbqBdpUltrHu2IgxzdYotIC15domOZNYqEY2aiuk1iC'),
(2, 'Lucas', '$2y$10$JF84EhvlUrtQCqvoA8WuzelPcVM5JylWhvGXCK9U8GYYRSyqWI/0S'),
(3, 'Arthur', '$2y$10$AQDV8YdfECAwpEP6S0gaJudRsx92AqOx3YhQ0jIIKPW/UI2oIh.Ii'),
(4, 'Elder', '$2y$10$ADmB.Fs8a3VrazbVLCvcRO9hsMy2C1s074Hin75vQUMtutVhdVr7G');

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
(1, 1, 3, '2026-02-14', '11:00:00', ''),
(2, 2, 4, '2026-02-20', '08:30:00', 0x2e2e2e2e2e2e2e2e2e2e2e2e2e2e2e2e2e2e2e2e2e2e),
(3, 3, 5, '2026-02-01', '09:15:00', ''),
(4, 4, 6, '2026-02-08', '16:45:00', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `ID` int(11) NOT NULL,
  `PATH` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagens`
--

INSERT INTO `imagens` (`ID`, `PATH`) VALUES
(1, '6972973482b82.png'),
(2, '697299ab1e66c.jpg'),
(3, '6972ab97bc4b0.jpg'),
(4, '6972ac45b4ab1.jpg'),
(5, '6972aca6e7eef.jpg');

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
(1, 'Vitor da Silva', 'Pediatria'),
(2, 'Thiago', 'Odontologia'),
(3, 'Gabriel', 'Dermatologia'),
(4, 'Guilherme', 'Psiquiatria');

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `DATA_NASCIMENTO` date NOT NULL,
  `TIPO_SANGUINEO` enum('A+','A-','AB+','AB-','B+','B-','O+','O-') NOT NULL,
  `imagem_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`ID`, `NOME`, `DATA_NASCIMENTO`, `TIPO_SANGUINEO`, `imagem_id`) VALUES
(3, 'Pedro', '2000-12-12', 'AB+', 2),
(4, 'Lucas Bezerra', '2006-06-15', 'A+', 3),
(5, 'Arthur da Silva', '2006-05-20', 'O-', 4),
(6, 'Elder Marcedo', '1997-08-19', 'B+', 5);

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
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `imagem_id` (`imagem_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `ID_CON` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`ID_MEDICO`) REFERENCES `medico` (`ID`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`ID_PACIENTE`) REFERENCES `paciente` (`ID`);

--
-- Restrições para tabelas `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`imagem_id`) REFERENCES `imagens` (`ID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
