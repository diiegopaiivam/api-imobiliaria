-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jan-2020 às 20:31
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `id_car` int(10) UNSIGNED NOT NULL,
  `id_imovel` int(10) NOT NULL,
  `caracteristica` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(60,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `caracteristicas`
--

INSERT INTO `caracteristicas` (`id_car`, `id_imovel`, `caracteristica`, `valor`) VALUES
(1, 4, 'Duplex', '0'),
(2, 4, 'Suíte ', '0'),
(4, 1, 'Condominio', '200'),
(7, 6, 'Varanda', '0'),
(8, 6, 'Varanda', '2000'),
(9, 3, 'Condominio', '230'),
(10, 3, 'Varanda', '0'),
(11, 2, 'Varanda', '0'),
(12, 2, 'Varanda', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhes`
--

CREATE TABLE `detalhes` (
  `id` int(11) NOT NULL,
  `id_imovel` int(11) NOT NULL,
  `quartos` int(11) NOT NULL,
  `banheiros` int(11) NOT NULL,
  `vagas` int(11) NOT NULL,
  `salas` int(11) NOT NULL,
  `cozinhas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `detalhes`
--

INSERT INTO `detalhes` (`id`, `id_imovel`, `quartos`, `banheiros`, `vagas`, `salas`, `cozinhas`) VALUES
(1, 2, 2, 1, 0, 1, 1),
(2, 1, 3, 2, 1, 1, 1),
(3, 3, 4, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `forecast`
--

CREATE TABLE `forecast` (
  `id` int(11) NOT NULL,
  `forecast` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `id_imovel` int(11) NOT NULL,
  `endereco` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(100) NOT NULL,
  `bairro` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finalidade` int(2) DEFAULT NULL,
  `cep` int(7) DEFAULT NULL,
  `tipo` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`id_imovel`, `endereco`, `numero`, `bairro`, `finalidade`, `cep`, `tipo`) VALUES
(1, 'Rua Alvaro Martins', 394, 'Jardim America', 1, 604123, 'locação'),
(2, 'Av João Pessoa', 3912, 'Damas', 1, 60425580, 'Locação '),
(3, 'Av João Pessoa', 3911, 'Damas', 1, 60425580, 'Locação '),
(4, 'Rua Julio Cesar', 410, 'Benfica', 2, 60425960, 'venda'),
(5, 'Rua Julio Cesar', 420, 'Benfica', 1, 60425960, 'locacao'),
(6, 'Rua Julio Cesar', 490, 'Benfica', 2, 60425960, 'locacao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`id_car`),
  ADD KEY `id_imovel` (`id_imovel`);

--
-- Índices para tabela `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `detalhes`
--
ALTER TABLE `detalhes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_imoveis` (`id_imovel`);

--
-- Índices para tabela `forecast`
--
ALTER TABLE `forecast`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id_imovel`);

--
-- Índices para tabela `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `id_car` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `detalhes`
--
ALTER TABLE `detalhes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `forecast`
--
ALTER TABLE `forecast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id_imovel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD CONSTRAINT `id_imovel` FOREIGN KEY (`id_imovel`) REFERENCES `imoveis` (`id_imovel`);

--
-- Limitadores para a tabela `detalhes`
--
ALTER TABLE `detalhes`
  ADD CONSTRAINT `fk_imoveis` FOREIGN KEY (`id_imovel`) REFERENCES `imoveis` (`id_imovel`);

--
-- Limitadores para a tabela `forecast`
--
ALTER TABLE `forecast`
  ADD CONSTRAINT `forecast_ibfk_1` FOREIGN KEY (`id`) REFERENCES `cities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
