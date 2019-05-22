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
-- Estrutura da tabela `ous_clientes`
--

CREATE TABLE `ous_clientes` (
  `cod` int(11) NOT NULL,
  `id_cliente` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `contato_1` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `contato_2` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `n_casa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ous_clientes`
--

INSERT INTO `ous_clientes` (`cod`, `id_cliente`, `nome`, `contato_1`, `contato_2`, `estado`, `cidade`, `endereco`, `n_casa`, `bairro`) VALUES
(1, 'AR5J81QM68', 'LUANA COELHO', '88912345678', '88952738648', 'CE', 'CRATEÚS', 'PEDRO II', '2034', 'FÁTIMA II'),
(2, '9WHUVQYU5O', 'LUCAS PEREIRA', '88983642843', '88962846374', 'CE', 'CRATEÚS', 'PADRE MORORO', '104', 'FÁTIMA II'),
(3, 'UZZS3AGP8A', 'TEREZINHA FEITOSA', '88728448472', '88983647264', 'CE', 'CRATEÚS', 'MOREIRA DA ROCHA', '2983', 'CENTRO'),
(4, '2Y3ZF31UKH', 'CINTIA ALVES', '88947545625', '88934353223', 'CE', 'CRATEÚS', 'CORONEL LÚCIO', '3059', 'CENTRO'),
(5, 'LRGO0F3U84', 'JAQUELINE RODRIGUES', '88976438543', '88964827463', 'CE', 'CRATEÚS', 'PROFESSOR LISBOA ', '478', 'FÁTIMA II'),
(6, 'HJ072VKKVF', 'MARIA APARECIDA', '88923751684', '88936276453', 'CE', 'CRATEÚS', 'CATUNDA MELO', '827', 'VENANCIO'),
(21, 'RIL0KKKHB4', 'CARLOS EDUARDO', '88983746234', '88987654327', 'CE', 'CRATEÚS', 'AVENIDA EDILBERTO FROTA', '298', 'CENTRO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ous_clientes`
--
ALTER TABLE `ous_clientes`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ous_clientes`
--
ALTER TABLE `ous_clientes`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
