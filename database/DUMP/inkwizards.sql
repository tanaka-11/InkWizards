-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Out-2023 às 13:29
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `inkwizards`
--
CREATE DATABASE IF NOT EXISTS `inkwizards` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `inkwizards`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` tinyint(4) NOT NULL,
  `telefone` tinyint(10) DEFAULT NULL,
  `celular` tinyint(11) NOT NULL,
  `usuario_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `telefone`, `celular`, `usuario_id`) VALUES
(1, 127, 127, 1),
(2, 127, 127, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estilos`
--

CREATE TABLE `estilos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `portfolio_id` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE `localizacao` (
  `id` tinyint(4) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `numero` varchar(8) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `usuario_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `localizacao`
--

INSERT INTO `localizacao` (`id`, `cep`, `endereco`, `numero`, `bairro`, `complemento`, `usuario_id`) VALUES
(1, '3605010', 'rua rua da rua', '69', 'Penha', 'casulo', 1),
(2, '11111111', 'aaaa', '44', 'aaaa', 'aaaa', 1),
(3, '2002454', 'aaa', '444', 'aaa', 'aaa', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `portfolio`
--

CREATE TABLE `portfolio` (
  `id` tinyint(4) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `usuario_id` tinyint(4) NOT NULL,
  `estilo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` tinyint(4) NOT NULL,
  `foto_perfil` varchar(45) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` text NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipo` enum('admin','tatuador','cliente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `foto_perfil`, `nome`, `descricao`, `email`, `senha`, `tipo`) VALUES
(1, '', 'Motocó', 'blablabla 123', 'motoco@xpto.ok', '$2y$10$b1pVJ6zq3LP.UDPjP4y4x.IssdT92Nf.dwYGBa', 'admin'),
(2, '', 'Marina Tanaka', 'aaaa', 'huttenloucher@gmail.com', '$2y$10$ulaJOfQVDBMK0a8tUshdgeAqzoNXYp/wJkXK9B', 'admin'),
(3, '', 'Marina Tanaka', 'aaaa', 'aaa@gmail.com1', '$2y$10$Pu87Xjm28Xyf9oFEEpTgOOpznpQdoBNOymrArR', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contatos_usuarios` (`usuario_id`) USING BTREE;

--
-- Índices para tabela `estilos`
--
ALTER TABLE `estilos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estilos_portfolio` (`portfolio_id`);

--
-- Índices para tabela `localizacao`
--
ALTER TABLE `localizacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_localizacao_usuarios` (`usuario_id`) USING BTREE;

--
-- Índices para tabela `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_portifolio_estilos` (`estilo_id`),
  ADD KEY `fk_portfolio_usuarios` (`usuario_id`) USING BTREE;

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `estilos`
--
ALTER TABLE `estilos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `localizacao`
--
ALTER TABLE `localizacao`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `fk_contatos_tatuadores` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `estilos`
--
ALTER TABLE `estilos`
  ADD CONSTRAINT `fk_estilos_portfolio` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`id`);

--
-- Limitadores para a tabela `localizacao`
--
ALTER TABLE `localizacao`
  ADD CONSTRAINT `fk_localizacao_tatuadores` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `fk_portfolio_tatuadores` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_portifolio_estilos` FOREIGN KEY (`estilo_id`) REFERENCES `estilos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
