-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2023 at 03:48 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `overdrive`
--
CREATE DATABASE IF NOT EXISTS `overdrive` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `overdrive`;

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `e_id` int NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(18) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nome_fantasia` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `endereco` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `responsavel` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`e_id`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `empresa`
--

INSERT INTO `empresa` (`e_id`, `cnpj`, `nome`, `nome_fantasia`, `endereco`, `telefone`, `responsavel`) VALUES
(1, '12.345.678/0001-58', 'Empresa fictícia de desenvolvimento ltda. ', 'Empresa Dev', 'Avenida Ipiranga, nº 6700', '(51) 3357-5642', 'Josias da Silva'),
(10, '32.132.131/0001-45', 'Luz elétrica geradores de energia ltda.', 'Geraluz', 'Avenida Getúlio Vargas, nº457', '(51) 3387-5656', 'Rafaela Soares de Almeida'),
(3, '87.654.321/0001-26', 'Manutenção de computadores e eletrônicos do Marcos ltda.', 'Arrumarcos', 'Rua Borges de Medeiros, nº 932, sala 708', '(51) 3333-2628', 'Marcos Oliveira Santos'),
(6, '12.312.312/0001-78', 'Companhia mercúrio de transportes e carregamentos ltda.', 'Mercúrio Transportes', 'Rua com o nome inventado, nº333', '(19) 99874-4523', 'Nícolas Manuel Barbeiro');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `cnh` varchar(20) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `endereco` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `carro` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `empresa` int NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `acesso` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `empresa` (`empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`u_id`, `nome`, `cpf`, `cnh`, `telefone`, `endereco`, `carro`, `empresa`, `senha`, `acesso`) VALUES
(1, 'Igor Rodrigues da Costa', '597.613.264-59', '1234567890', '(51) 99547-8223', 'Rua São José, nº638', 'Fiat Strada', 1, '$2y$10$j6PlQ4BmL42OQn/ABN4OIeRspGiwqPTlXz5tlK9WVKesaSKG0zwRO', 0),
(3, 'André Melo Zepf', '222.222.222-22', '65497881323', '(51) 99114-2539', 'Avenida Guilherme Schell, nº 3310, apto 404', ' Chevrolet Onix', 3, '$2y$10$qMGDvfljQVm/yDl57OFcmuNcD3nzPsOPnD2wZC.h/csBf1VuIag/m', 1),
(4, 'Matheus Ferreira Santos', '123.456.789-13', '59481232459', '(19) 99745-2612', 'Avenida Brasil, nº1800, apto 201', 'Volkswagen Polo', 1, '$2y$10$Ktk/iaS9cO6VMc0/3YgkMO5y8P19dQ5apYnWzBCZdjI4WeyFTgMta', 0),
(5, 'Mateus Rodrigues Gomes', '123.456.789-14', '49731652198', '(19) 99654-7213', 'Rua Sete de Setembro, nº22, apto 605', 'Fiat Mobi', 1, '$2y$10$YWF34hgHRJGeJVMjrLEVwu.eS.BC.skQtAdKteOteKuF17i95Epwi', 0),
(6, 'João Senha de Almeida Barros', '123.456.789-15', '33642187654', '(19) 99385-8542', 'Rua Quinze de Novembro, nº900', 'Hyundai HB20', 3, '$2y$10$a9r8XRljaKRafu3VvekeoujxX2W5TBKvxAyaCW5JeNg9Jshhf7cMy', 0),
(7, 'Andreia Martins Lopes', '123.456.789-16', '86457219546', '(51) 98465-3515', 'Rua Tiradentes, nº754, apto 201', 'Chevrolet Onix Plus', 3, '$2y$10$92.1hXMq.If9254zh/XGzu9DNRjm0a.peCbu1nvNgS0nRxUwU9NDe', 1),
(23, 'Joana Nascimento de Andrade', '324.234.233-33', '82414123579', '(51) 99785-4141', 'Rua São Francisco, nº632', 'Renault Kwid', 10, '$2y$10$UuLHFQDHavoHnymbTdN9purJFd0koCpIrE2HLCLlnkB.r0S7jmEfu', 0),
(26, 'Administrador', '111.111.111-11', '23423423522', '(19) 99745-8787', 'Rua José de Alencar, nº800', 'Volkswagen T-Cross', 3, '$2y$10$xAre/OiZOCKFqcDVv0Khee26IpKSP5eZl4rATmTe1FuCMLecdlrS.', 1),
(25, 'Mariana Machado Mendes', '324.234.235-32', '32423423477', '(51) 99636-3647', 'Rua Tiradentes, nº754, apto 202', 'Chevrolet Tracker', 1, '$2y$10$M1Z1o6.7wivlDOnWz2QuzOlGuV7dMp79Wdrx641hsgyoNQyOd0MMq', 0),
(29, 'Diogo Ribeiro de Lima', '324.235.233-21', '23523423563', '(51) 3314-5287', 'Avenida Aparício Borges, nº4000', 'Hyundai Creta', 6, '$2y$10$vn1wFtAF.28wKao4RMfFWeFqJsYUc2pcVE5k60shhaVLiPgXdCcWq', 1),
(39, 'Alexandre José de Oliveira da Silva Pereira', '333.333.333-33', '43252342342', '(32) 5243-5235', 'Avenida Marechal Guilherme Antônio de Ferreira nº1', 'Ford Ka', 6, '$2y$10$2zEVAlHX6BYX2l8kNDQArODOihTD.kT.PJxLKxCwa.mKgE3RVK00G', 0),
(32, 'Vitor Nascimento de Freitas', '123.245.345-55', '96545123455', '(51) 98546-3223', 'Rua Voluntários da Pátria, nº1320, apto 406', 'Fiat Argo', 10, '$2y$10$Ihn1ih2TwFFTb7BiKsJumuG2ltk9IQu/yFzjnzMyWG8rps3dDKxUa', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
