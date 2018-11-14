-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Nov-2018 às 00:14
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `despachama`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `ID` int(11) NOT NULL,
  `TIPO` int(11) NOT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `CLIENTE_CPF` bigint(20) DEFAULT NULL,
  `REFERENCIA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`ID`, `TIPO`, `STATUS`, `CLIENTE_CPF`, `REFERENCIA`) VALUES
(5, 1, 1, 55555555555, 'Transferir de carro Gol'),
(6, 2, 1, 55555555555, 'Pagamento IPVA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `CPF` bigint(20) NOT NULL,
  `SENHA` varchar(200) NOT NULL,
  `NOME` varchar(150) NOT NULL,
  `TIPO` int(11) NOT NULL,
  `TELEFONE` varchar(30) DEFAULT NULL,
  `ENDERECO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`CPF`, `SENHA`, `NOME`, `TIPO`, `TELEFONE`, `ENDERECO`) VALUES
(12345678900, '$2y$10$awqzuN5wFofSl4Ee/J9x..q6qYgFbU67EFT0XduxijwZaKPEA0YOS', 'Matheus', 0, NULL, NULL),
(23575462412, '$2y$10$pC4x5X/zhb1Or8SOigNVg.9.kz8nb/gOhLTt7aMK.0/rbADbkPSrq', 'Matheus', 0, NULL, NULL),
(55555555555, '$2y$10$fUu2WcJGoVp7CjUyxf3QTOtEdMVxMomOVQyoZG7MIK7cnjxGOjmHm', 'Matheus L', 0, NULL, NULL),
(77777777777, '$2y$10$aq5ByfzCYoT78KXq7ylupOzVxOCx5JRfJSNJgGOerQ2rt5L5RO2Ki', 'Teste', 0, NULL, NULL),
(99999999999, '$2y$10$4Z3TOyHui9i1qby4rI1QBecqs33fnhuYflhZtrR7Lhw1o5FcCdzNS', 'Matheus Lazarin', 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CLIENTE_CPF` (`CLIENTE_CPF`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CPF`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`CLIENTE_CPF`) REFERENCES `usuario` (`CPF`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
