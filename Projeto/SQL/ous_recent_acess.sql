-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Maio-2019 às 04:51
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evolutec_ous`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ous_recent_acess`
--

CREATE TABLE `ous_recent_acess` (
  `cod` int(11) NOT NULL,
  `id_funcionario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `data_hora` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` enum('Administrador','Atendente','Tecnico','Recepcionista') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ous_recent_acess`
--

INSERT INTO `ous_recent_acess` (`cod`, `id_funcionario`, `nome`, `sobrenome`, `data_hora`, `cargo`) VALUES
(13, 'ous_2460', 'Wesley', 'Silva', '14/05/19 ás 20:56', 'Administrador'),
(12, 'ous_5700', 'Admin', 'Admin', '14/05/19 as 17:49', 'Administrador'),
(11, 'ous_5700', 'Admin', 'Admin', '14/05/19 as 17:42', 'Administrador'),
(10, 'ous_2460', 'Wesley', 'Silva', '14/05/19 as 17:33', 'Administrador'),
(14, 'ous_5700', 'Admin', 'Admin', '14/05/19 as 21:54', 'Administrador'),
(15, 'ous_2460', 'Wesley', 'Silva', '14/05/19 as 21:58', 'Administrador'),
(16, 'ous_5189', 'Lucas', 'Alves', '14/05/19 as 22:11', 'Tecnico'),
(17, 'ous_2460', 'Wesley', 'Silva', '14/05/19 as 22:57', 'Administrador'),
(18, 'ous_2460', 'Wesley', 'Silva', '14/05/19 as 23:27', 'Administrador'),
(19, 'ous_2460', 'Wesley', 'Silva', '14/05/19 as 23:28', 'Administrador'),
(20, 'ous_2460', 'Wesley', 'Silva', '15/05/19 as 04:20', 'Administrador'),
(21, 'ous_2460', 'Wesley', 'Silva', '15/05/19 as 08:15', 'Administrador'),
(22, 'ous_2460', 'Wesley', 'Silva', '15/05/19 as 08:18', 'Administrador'),
(23, 'ous_2460', 'Wesley', 'Silva', '15/05/19 as 09:11', 'Administrador'),
(24, 'ous_2460', 'Wesley', 'Silva', '15/05/19 as 11:23', 'Administrador'),
(25, 'ous_2460', 'Wesley', 'Silva', '15/05/19 as 11:27', 'Administrador'),
(26, 'ous_2460', 'Wesley', 'Silva', '15/05/19 as 11:39', 'Administrador'),
(27, 'ous_2460', 'Wesley', 'Silva', '15/05/19 as 13:07', 'Administrador'),
(28, 'ous_2460', 'Wesley', 'Silva', '15/05/19 as 15:56', 'Administrador'),
(29, 'ous_2460', 'Wesley', 'Silva', '16/05/19 ás 08:47', 'Administrador'),
(30, 'ous_2460', 'Wesley', 'Silva', '16/05/19 as 13:23', 'Administrador'),
(31, 'ous_2460', 'Wesley', 'Silva', '16/05/19 as 15:53', 'Administrador'),
(32, 'ous_2460', 'Wesley', 'Silva', '16/05/19 as 16:00', 'Administrador'),
(33, 'ous_5700', 'Admin', 'Admin', '16/05/19 as 16:10', 'Administrador'),
(34, 'ous_2460', 'Wesley', 'Silva', '16/05/19 as 16:20', 'Administrador'),
(35, 'ous_4326', 'STEFANNE', 'SOUSA', '16/05/19 as 16:26', 'Atendente'),
(36, 'ous_5700', 'Admin', 'Admin', '16/05/19 as 16:31', 'Administrador'),
(37, 'ous_5700', 'Admin', 'Admin', '16/05/19 as 16:32', 'Administrador'),
(38, 'ous_5700', 'Admin', 'Admin', '16/05/19 as 16:33', 'Administrador'),
(39, 'ous_2460', 'Wesley', 'Silva', '17/05/19 as 11:01', 'Administrador'),
(40, 'ous_2460', 'Wesley', 'Silva', '20/05/19 as 11:34', 'Administrador'),
(41, 'ous_2460', 'Wesley', 'Silva', '20/05/19 as 11:41', 'Administrador'),
(42, 'ous_2460', 'Wesley', 'Silva', '20/05/19 as 16:42', 'Administrador'),
(43, 'ous_2460', 'Wesley', 'Silva', '21/05/19 as 08:09', 'Administrador'),
(44, 'ous_2460', 'Wesley', 'Silva', '21/05/19 as 23:18', 'Administrador');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ous_recent_acess`
--
ALTER TABLE `ous_recent_acess`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ous_recent_acess`
--
ALTER TABLE `ous_recent_acess`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
