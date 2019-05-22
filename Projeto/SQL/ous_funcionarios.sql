-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Maio-2019 às 04:50
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
-- Estrutura da tabela `ous_funcionarios`
--

CREATE TABLE `ous_funcionarios` (
  `cod` int(11) NOT NULL,
  `id_funcionario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `contato` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ultimo_acesso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` enum('Administrador','Atendente','Tecnico') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ous_funcionarios`
--

INSERT INTO `ous_funcionarios` (`cod`, `id_funcionario`, `nome`, `sobrenome`, `password`, `contato`, `ultimo_acesso`, `email`, `cargo`) VALUES
(10, 'ous_1186', 'Anderson', 'Almada', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '88888888888', '', 'almada@email.com', ''),
(11, 'ous_6538', 'Admin', 'System', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '88888888888', '', 'admin@email.com', 'Administrador'),
(12, 'ous_5561', 'Funcionario', 'System', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '88888888888', '', 'funcionario@email.com', 'Atendente'),
(5, 'ous_2460', 'Wesley', 'Silva', 'ca146bd44a100fc77f46b1c08601e64bf6103e3795e57ed36d85b1c28ec50c7c', '88992175376', '', 'wesley.wsm97@gmail.com', 'Administrador'),
(9, 'ous_4326', 'STEFANNE', 'SOUSA', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '889838924234', '', '23R2R2R@GMAIL.COM', 'Atendente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ous_funcionarios`
--
ALTER TABLE `ous_funcionarios`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ous_funcionarios`
--
ALTER TABLE `ous_funcionarios`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
