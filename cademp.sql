-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Set-2022 às 21:01
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
-- Banco de dados: `cademp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(10) NOT NULL,
  `razao_social` varchar(100) NOT NULL,
  `nome_fantasia` varchar(50) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `data_inclusao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `razao_social`, `nome_fantasia`, `endereco`, `complemento`, `bairro`, `cidade`, `estado`, `data_inclusao`) VALUES
(8, 'Fátima Raimunda Rezende', 'Fátima Raimunda', 'Rua Judson Roosevelt Cabral', 'Casa', 'Tabuleiro do Martins', 'Maceió', 'AL', '2022-09-16 03:00:00'),
(18, 'Renato e Hugo Telecom ME', 'Dupla Sertaneja', 'Rua Divisa', 'Sala 20', 'Chácara das Paineiras', 'Carapicuíba', 'SP', '2022-09-16 03:00:00'),
(19, 'Bryan e Luana Contábil ME', 'Delivey Rapidez', 'Rua Antônio Gonçalo da Costa', 'Bloco 20 rua 10', 'Cidade da Saúde', 'Itapevi', 'SP', '2022-09-15 03:00:00'),
(20, 'Henrique e Sebastiana Limpeza ME', 'Casa da Limpeza', 'Rua Napoleão Tannus Gallep', '', 'Jardim Piratininga', 'Sorocaba', 'SP', '2022-09-13 03:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `cod_contato` int(11) NOT NULL,
  `nome_contato` varchar(100) NOT NULL,
  `telefone_1` char(13) DEFAULT NULL,
  `telefone_2` char(13) DEFAULT NULL,
  `celular` char(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cod_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`cod_contato`, `nome_contato`, `telefone_1`, `telefone_2`, `celular`, `email`, `cod_cliente`) VALUES
(26, 'Fatima', '(15) 2507-449', '', '(15) 99185-81', 'fatima@teste.com', 8),
(27, 'Renato', '(11) 2864-660', '', '', 'teste@teste.com', 18),
(28, 'Hugo', '', '', '(11) 99818-10', 'hugo@teste.com', 18);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`cod_contato`),
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `cod_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `contato_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
