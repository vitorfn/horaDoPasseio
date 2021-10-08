-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 29/08/2020 às 20:20
-- Versão do servidor: 10.4.13-MariaDB
-- Versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `horaDoPasseio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Acomodacao`
--

CREATE TABLE `Acomodacao` (
  `idQuarto` int(11) NOT NULL,
  `capacidade` int(11) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `Acomodacao`
--

INSERT INTO `Acomodacao` (`idQuarto`, `capacidade`, `valor`) VALUES
(4, 2, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Animal`
--

CREATE TABLE `Animal` (
  `idAnimal` int(11) NOT NULL,
  `nomeAnimal` varchar(45) NOT NULL,
  `anoNascimento` varchar(4) NOT NULL,
  `observacoes` varchar(100) NOT NULL,
  `especie` varchar(45) NOT NULL,
  `raca` varchar(45) DEFAULT NULL,
  `CPF` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `Animal`
--

INSERT INTO `Animal` (`idAnimal`, `nomeAnimal`, `anoNascimento`, `observacoes`, `especie`, `raca`, `CPF`) VALUES
(3, 'Filo', '2019', 'Come ração diet', 'Galinha', 'Desconhecida', '12345678911'),
(4, 'llalala', '2020', 'akasklsdk', 'skdjfklsd', 'kjskldjflk', '12345678911');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Dono`
--

CREATE TABLE `Dono` (
  `CPF` char(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `data_nascimento` date NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `Dono`
--

INSERT INTO `Dono` (`CPF`, `nome`, `telefone`, `email`, `data_nascimento`, `endereco`, `senha`) VALUES
('12345678911', 'Dono 1', '1234567', 'dono1@gmail.com', '1999-10-10', 'Rua ', 'senha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Funcionario`
--

CREATE TABLE `Funcionario` (
  `CPF` char(11) NOT NULL,
  `nomeFunc` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `data_Nasc` date NOT NULL,
  `senha` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `Funcionario`
--

INSERT INTO `Funcionario` (`CPF`, `nomeFunc`, `email`, `data_Nasc`, `senha`, `telefone`) VALUES
('12345678910', 'Vitor', 'vitor@hdp.com', '2000-07-17', 'vitor', '12345678'),
('12345678911', 'Bruna', 'bruna@hdp.com', '2000-10-10', 'bruna', '12345679'),
('12345678912', 'Geremias', 'geremias@hdp.com', '2000-10-10', 'geremias', '123456781');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Reserva`
--

CREATE TABLE `Reserva` (
  `idReserva` int(11) NOT NULL,
  `dataEntrada` date NOT NULL,
  `dataSaida` date NOT NULL,
  `CPF` char(11) NOT NULL,
  `idQuarto` int(11) NOT NULL,
  `idAnimal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `Reserva`
--

INSERT INTO `Reserva` (`idReserva`, `dataEntrada`, `dataSaida`, `CPF`, `idQuarto`, `idAnimal`) VALUES
(8, '2020-10-10', '2020-11-10', '12345678911', 4, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ServicoExtra`
--

CREATE TABLE `ServicoExtra` (
  `idServico` int(11) NOT NULL,
  `descricao` varchar(400) NOT NULL,
  `valor` float NOT NULL,
  `dataServico` date NOT NULL,
  `idReserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Acomodacao`
--
ALTER TABLE `Acomodacao`
  ADD PRIMARY KEY (`idQuarto`);

--
-- Índices de tabela `Animal`
--
ALTER TABLE `Animal`
  ADD PRIMARY KEY (`idAnimal`),
  ADD KEY `CPF` (`CPF`);

--
-- Índices de tabela `Dono`
--
ALTER TABLE `Dono`
  ADD PRIMARY KEY (`CPF`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- Índices de tabela `Funcionario`
--
ALTER TABLE `Funcionario`
  ADD PRIMARY KEY (`CPF`);

--
-- Índices de tabela `Reserva`
--
ALTER TABLE `Reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `CPF` (`CPF`),
  ADD KEY `idQuarto` (`idQuarto`),
  ADD KEY `idAnimal` (`idAnimal`);

--
-- Índices de tabela `ServicoExtra`
--
ALTER TABLE `ServicoExtra`
  ADD PRIMARY KEY (`idServico`),
  ADD KEY `idReserva` (`idReserva`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Acomodacao`
--
ALTER TABLE `Acomodacao`
  MODIFY `idQuarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `Animal`
--
ALTER TABLE `Animal`
  MODIFY `idAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `Reserva`
--
ALTER TABLE `Reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `ServicoExtra`
--
ALTER TABLE `ServicoExtra`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `Animal`
--
ALTER TABLE `Animal`
  ADD CONSTRAINT `Animal_ibfk_1` FOREIGN KEY (`CPF`) REFERENCES `Dono` (`CPF`);

--
-- Restrições para tabelas `Reserva`
--
ALTER TABLE `Reserva`
  ADD CONSTRAINT `Reserva_ibfk_1` FOREIGN KEY (`CPF`) REFERENCES `Dono` (`CPF`),
  ADD CONSTRAINT `Reserva_ibfk_2` FOREIGN KEY (`idQuarto`) REFERENCES `Acomodacao` (`idQuarto`),
  ADD CONSTRAINT `Reserva_ibfk_3` FOREIGN KEY (`idAnimal`) REFERENCES `Animal` (`idAnimal`);

--
-- Restrições para tabelas `ServicoExtra`
--
ALTER TABLE `ServicoExtra`
  ADD CONSTRAINT `ServicoExtra_ibfk_1` FOREIGN KEY (`idReserva`) REFERENCES `Reserva` (`idReserva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
