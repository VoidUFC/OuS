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
-- Estrutura da tabela `ous_os`
--

CREATE TABLE `ous_os` (
  `cod` int(11) NOT NULL,
  `os_id_cliente` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `os_numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `os_nome_do_cliente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os_cidade_do_cliente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `os_contato_1_do_cliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `os_contato_2_do_cliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `os_aparelho` enum('Computador','Notebook','Celular','Telefone rural','Outro') COLLATE utf8_unicode_ci NOT NULL,
  `os_marca` enum('Apple','Asus','Acer','Alcatel','Samsung','LG','Motorola','Multilaser','Microsoft','Xiaomi','Outro') COLLATE utf8_unicode_ci NOT NULL,
  `os_modelo` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `os_cor_do_aparelho` enum('Preto','Branco','Prata','Dourado','Rose','Roxo','Outra') COLLATE utf8_unicode_ci NOT NULL,
  `os_defeito` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os_status` enum('Aberta','Fechada','Orçamento','Aguardando','Concluida') COLLATE utf8_unicode_ci NOT NULL,
  `os_itens` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `os_servico` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `os_valor` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `os_data_entrada` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `os_data_saida` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ous_os`
--

INSERT INTO `ous_os` (`cod`, `os_id_cliente`, `os_numero`, `os_nome_do_cliente`, `os_cidade_do_cliente`, `os_contato_1_do_cliente`, `os_contato_2_do_cliente`, `os_aparelho`, `os_marca`, `os_modelo`, `os_cor_do_aparelho`, `os_defeito`, `os_status`, `os_itens`, `os_servico`, `os_valor`, `os_data_entrada`, `os_data_saida`) VALUES
(1, 'UZZS3AGP8A', 'FWHIU2643HI', 'TEREZINHA FEITOSA', 'CRATEÚS', '88728448472', '88983647264', 'Celular', 'Samsung', 'moto g2', 'Preto', 'tela quebrada', 'Aguardando', '(02) Chips (01) SD card ', 'troca da tela', '120,00', '21/04/19 ás 16:14', ''),
(8, 'AR5J81QM68', 'RXXL5UXY4L', 'LUANA COELHO', 'CRATEÚS', '88912345678', '88952738648', 'Celular', 'Multilaser', 'm7', 'Preto', 'touch quebrado', 'Orçamento', '(01) SD card (01) Carregador ', 'troca do touch', '100,00', '21/05/19 á39 05:21', ''),
(7, 'RIL0KKKHB4', 'RIL0KKKHB4', 'CARLOS EDUARDO', 'CRATEÚS', '88983746234', '88987654327', 'Notebook', 'Acer', 'ASPIRE 5', 'Preto', 'ESTA LENTO', 'Fechada', '(01) Chip (02) SD cards ', 'FORMATAÇAO', '40,00', '21/05/19 á13 05:05', ''),
(6, '9WHUVQYU5O', 'GF6OXGLJ9Y', 'LUCAS PEREIRA', 'CRATEÚS', '88983642843', '88962846374', 'Celular', 'Apple', 'iphone 5s', 'Preto', 'Tela quebrada', 'Concluida', '(02) Chips', 'Troca da tela', '250,00', '21/05/19 á01 04:52', ''),
(9, 'LRGO0F3U84', 'EKEHUK6D9J', 'JAQUELINE RODRIGUES', 'CRATEÚS', '88976438543', '88964827463', 'Celular', 'Apple', 'iphone 6', 'Rose', 'tela quebrada', 'Aberta', '(01) Chip ', 'troca de tela', '250,00', '21/05/19 á44 05:24', ''),
(10, '2Y3ZF31UKH', '6L1LNZ8BAX', 'CINTIA ALVES', 'CRATEÚS', '88947545625', '88934353223', 'Celular', 'Samsung', 'J6', 'Dourado', 'TELA QUEBRADA', 'Aberta', '(02) Chips (01) SD card ', 'TROCA DA TELA', '200,00', '21/05/19 á22 05:28', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ous_os`
--
ALTER TABLE `ous_os`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ous_os`
--
ALTER TABLE `ous_os`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
