-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Nov-2023 às 01:39
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
  `id` smallint(6) NOT NULL,
  `telefone` varchar(10) DEFAULT NULL,
  `celular` varchar(11) NOT NULL,
  `usuario_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estilos`
--

CREATE TABLE `estilos` (
  `id` smallint(6) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `estilos`
--

INSERT INTO `estilos` (`id`, `nome`) VALUES
(1, 'Lettering'),
(2, 'Realismo'),
(3, 'Fine Line'),
(4, 'Cartoon');

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE `localizacao` (
  `id` smallint(6) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `numero` varchar(8) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `usuario_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `portfolio`
--

CREATE TABLE `portfolio` (
  `id` smallint(6) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `usuario_id` smallint(6) NOT NULL,
  `estilo_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `portfolio`
--

INSERT INTO `portfolio` (`id`, `imagem`, `descricao`, `usuario_id`, `estilo_id`) VALUES
(1, 'tatuagem4.jpg', 'Tatuagem no Braço', 1, 1),
(2, 'tatuagem3.jpg', 'Tatuagem no Pescoço', 1, 3),
(3, 'tatuagem2.jpg', 'Tatuagem no Pescoço', 1, 1),
(4, 'tatuagem1.jpg', 'Tatuagem no Braço', 1, 2),
(5, 'tatuagem5.jpg', 'Tatuagem no Braço', 2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` smallint(6) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `foto_perfil` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` enum('admin','tatuador','cliente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `foto_perfil`, `descricao`, `email`, `senha`, `tipo`) VALUES
(1, 'Marina Tanaka', 'tanaka-espelho.jpg', 'Maloqueira do coração puro', 'tanaka@gmail.com', '$2y$10$l911Pxve5PqPFj.8C7H2Hum9qqvclv3jBvX4I9Syga.3fSU/XQ1Yy', 'tatuador'),
(2, 'Andre Mocoto', 'andre.jpg', 'Cubista', 'andre@gmail.com', '$2y$10$S4esQ/3UKvekj0lrRmCzJ.p4mxEgP720.dtT.ZJRZ7GZ72LDrf4Py', 'tatuador'),
(3, 'Luis Fernando', 'nando.jpg', 'Penetra', 'nando@gmail.com', '$2y$10$9G42rGoNGKcVMvqk0VIMR.SB0WHGy4v52jETQGsTh9cZkGID4avBG', 'tatuador'),
(4, 'InkWizards Admin', 'icon-admin.jpg', 'Admin do Site', 'inkwizards.tatto@gmail.com', '$2y$10$kRGBI0GW3xPIKp9q5N9UEeD8YclDq7cQmMqkS5.F1UWZ7e7AdR2WK', 'admin'),
(5, 'Cliente', 'dog.jpg', 'Cliente', 'cliente@cliente.com', '$2y$10$LrfQ502kt53rCZpHMfHNpOtFnFm2IKVAIfX8FNfRDR1oTd6eh7nIG', 'cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contatos_usuarios` (`usuario_id`);

--
-- Índices para tabela `estilos`
--
ALTER TABLE `estilos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `localizacao`
--
ALTER TABLE `localizacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_localizacao_usuarios` (`usuario_id`);

--
-- Índices para tabela `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_portfolio_estilos` (`estilo_id`),
  ADD KEY `fk_portfolio_usuarios` (`usuario_id`);

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
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estilos`
--
ALTER TABLE `estilos`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `localizacao`
--
ALTER TABLE `localizacao`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `fk_contatos_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `localizacao`
--
ALTER TABLE `localizacao`
  ADD CONSTRAINT `fk_localizacao_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `fk_portfolio_estilos` FOREIGN KEY (`estilo_id`) REFERENCES `estilos` (`id`),
  ADD CONSTRAINT `fk_portfolio_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
