-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.1.36-community-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para estoque_escolar
CREATE DATABASE IF NOT EXISTS `estoque_escolar` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `estoque_escolar`;

-- Copiando estrutura para tabela estoque_escolar.cardapio
CREATE TABLE IF NOT EXISTS `cardapio` (
  `id_cardapio` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `nome_cardapio` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cardapio`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.cardapio: 35 rows
/*!40000 ALTER TABLE `cardapio` DISABLE KEYS */;
INSERT INTO `cardapio` (`id_cardapio`, `status`, `nome_cardapio`) VALUES
	(1, 1, 'galinhada'),
	(2, 1, 'galinhada'),
	(3, 1, 'galinhada'),
	(4, 0, 'feijoada'),
	(5, 1, 'fffffffff'),
	(6, 0, 'Arroz com carne moida'),
	(7, 0, 'jjjjjj'),
	(8, 0, 'Frango com arroz'),
	(9, 0, 'Lasanha'),
	(10, 0, 'FeijÃ£o com linguiÃ§a'),
	(11, 0, 'sfdsd'),
	(12, 0, 'ssssss'),
	(13, 0, 'Galinhada'),
	(14, 0, 'Galinhada'),
	(15, 0, 'sdfgdfg'),
	(16, 0, 'Farofa'),
	(17, 0, 'Feijao e arroz'),
	(18, 0, 'Farinha'),
	(19, 0, 'sdfjds'),
	(20, 0, 'sdfjds'),
	(21, 0, 'sdfjds'),
	(22, 0, 'sdfs'),
	(23, 0, 'Galinhada'),
	(24, 0, 'Lasanha'),
	(25, 0, 'huukhu'),
	(26, 0, 'Frango'),
	(27, 0, 'Estrogonofe'),
	(28, 0, 'Vaca Atolada'),
	(29, 0, 'sdfsdg'),
	(30, 0, 'Galinhada'),
	(31, 1, 'churrasco'),
	(32, 1, 'LinguiÃ§a'),
	(33, 1, 'Lasanha'),
	(34, 1, 'fddfg'),
	(35, 1, 'Farofa com arroz');
/*!40000 ALTER TABLE `cardapio` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.entrada_nota
CREATE TABLE IF NOT EXISTS `entrada_nota` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `data_entrada` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_fornecedor` int(11) NOT NULL,
  `numero_nota` varchar(100) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtn_produto` float NOT NULL DEFAULT '0',
  `id_recurso` int(11) DEFAULT NULL,
  `valor_produto` float(10,3) NOT NULL DEFAULT '0.000',
  `total_nota` float(10,3) NOT NULL DEFAULT '0.000',
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_nota`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.entrada_nota: 2 rows
/*!40000 ALTER TABLE `entrada_nota` DISABLE KEYS */;
INSERT INTO `entrada_nota` (`id_nota`, `data_entrada`, `id_fornecedor`, `numero_nota`, `id_produto`, `qtn_produto`, `id_recurso`, `valor_produto`, `total_nota`, `status`) VALUES
	(25, '2022-12-13 22:53:24', 4, '125', 0, 0, 2, 0.000, 200.000, 0),
	(24, '2022-12-13 22:50:18', 9, '1234', 0, 0, NULL, 0.000, 100.000, 0);
/*!40000 ALTER TABLE `entrada_nota` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.estoque
CREATE TABLE IF NOT EXISTS `estoque` (
  `id_estoque` int(11) NOT NULL AUTO_INCREMENT,
  `id_nota` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtn_produto` float NOT NULL,
  PRIMARY KEY (`id_estoque`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.estoque: 4 rows
/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
INSERT INTO `estoque` (`id_estoque`, `id_nota`, `id_produto`, `qtn_produto`) VALUES
	(1, 0, 1, 11395),
	(2, 0, 3, 4648),
	(3, 0, 5, 232),
	(4, 0, 2, 8);
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.fornecedor
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(100) NOT NULL,
  `endereco_fornecedor` varchar(100) NOT NULL,
  `contato_fornecedor` varchar(100) NOT NULL,
  `telefone1` varchar(14) NOT NULL,
  `telefone2` varchar(14) DEFAULT NULL,
  `e_mail` varchar(100) DEFAULT NULL,
  `cnpj` varchar(17) DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.fornecedor: 11 rows
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` (`id_fornecedor`, `nome_fornecedor`, `endereco_fornecedor`, `contato_fornecedor`, `telefone1`, `telefone2`, `e_mail`, `cnpj`) VALUES
	(1, 'Jb', 'Av SDFSDF', '5465', '4565', '565', 'dfg@gmail.com', NULL),
	(2, 'Jb', 'Av SDFSDF', '5465', '4565', '565', 'dfg@gmail.com', NULL),
	(3, 'Jb', 'Av SDFSDF', '5465', '4565', '565', 'dfg@gmail.com', NULL),
	(4, 'Jb3', 'Euvaldo Lodi', 'Joao', '65847984765', '2454', 'jb@gmail.com', '123'),
	(5, 'gfdfg', 'sdfsd', 'sdfsd', 'sdfsd', '', '', NULL),
	(6, 'sdfsd', 'sdfsd', 'sdf', 'sdfsd', '', '', '1234'),
	(7, 'XatÃ£o', 'Av Brasilia', 'JosÃ©', '545463123', '65465445454', 'xatao@gmail.com', '545454543213213'),
	(8, 'Agricultura', 'Rua AraxÃ¡', 'Maria', '453645756', '345345345', 'agricultuta@gmail.com', '354163546546546'),
	(9, 'ABC', 'Rua Brasil', 'Joao', '6547654', '', 'abc@gmail.com', '879846321321'),
	(10, 'sdfsdf', 'ertert', 'erte', 'rte', '', 'nanan@gmail.com', '543453'),
	(11, 'fsdfsadf', 'hjghdf', 'fgdf', 'dfgdf', '', 'lsfjksdlkjas@gmail.com', '5434534');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.info_produtos_entrada
CREATE TABLE IF NOT EXISTS `info_produtos_entrada` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT,
  `id_nota` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `data_validade` date NOT NULL,
  `qtd` decimal(10,2) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.info_produtos_entrada: 2 rows
/*!40000 ALTER TABLE `info_produtos_entrada` DISABLE KEYS */;
INSERT INTO `info_produtos_entrada` (`id_info`, `id_nota`, `id_produto`, `data_validade`, `qtd`, `valor`) VALUES
	(95, 24, 3, '0000-00-00', 5.00, 10.00),
	(94, 24, 1, '0000-00-00', 10.00, 5.00);
/*!40000 ALTER TABLE `info_produtos_entrada` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.item_cardapio
CREATE TABLE IF NOT EXISTS `item_cardapio` (
  `id_item_card` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) DEFAULT NULL,
  `qtd_mat` int(11) DEFAULT NULL,
  `qtd_vesp` int(11) DEFAULT NULL,
  `qtd_not` int(11) DEFAULT NULL,
  `id_cardapio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_item_card`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.item_cardapio: 77 rows
/*!40000 ALTER TABLE `item_cardapio` DISABLE KEYS */;
INSERT INTO `item_cardapio` (`id_item_card`, `id_produto`, `qtd_mat`, `qtd_vesp`, `qtd_not`, `id_cardapio`) VALUES
	(1, 5, 5, 0, 0, NULL),
	(2, 1, 0, 0, 0, NULL),
	(3, 3, 3, 4, 5, NULL),
	(4, 3, 3, 4, 5, NULL),
	(5, 3, 3, 4, 5, NULL),
	(6, 1, 5, 5, 5, NULL),
	(7, 1, 5, 5, 5, NULL),
	(8, 1, 5, 5, 5, NULL),
	(9, 1, 4, 45, 5, NULL),
	(10, 1, 4, 45, 5, NULL),
	(11, 1, 4, 45, 5, NULL),
	(12, 5, 4, 56, 5, NULL),
	(13, 5, 4, 56, 5, NULL),
	(14, 5, 4, 56, 5, NULL),
	(15, 5, 4, 56, 5, NULL),
	(16, 5, 4, 56, 5, NULL),
	(17, 5, 4, 56, 5, NULL),
	(18, 5, 4, 56, 5, NULL),
	(19, 5, 4, 56, 5, NULL),
	(20, 1, 4, 6, 5, NULL),
	(21, 1, 3, 4, 5, NULL),
	(22, 1, 3, 4, 5, NULL),
	(23, 1, 3, 4, 5, NULL),
	(24, 1, 3, 4, 5, NULL),
	(25, 1, 456, 456, 5456, NULL),
	(26, 5, 4, 66, 6, NULL),
	(27, 5, 4, 5, 6, NULL),
	(28, 5, 4, 5, 6, NULL),
	(29, 1, 5, 5, 6, NULL),
	(30, 1, 5, 5, 6, NULL),
	(31, 5, 5, 3, 4, NULL),
	(32, 1, 55, 4, 5, NULL),
	(33, 1, 55, 4, 5, NULL),
	(34, 1, 55, 4, 5, NULL),
	(35, 1, 55, 4, 5, NULL),
	(36, 1, 5, 4, 3, NULL),
	(37, 1, 5, 4, 3, NULL),
	(38, 1, 5, 4, 3, NULL),
	(39, 1, 56, 56, 56, NULL),
	(40, 1, 56, 56, 5, NULL),
	(41, 1, 56, 56, 5, NULL),
	(42, 1, 56, 56, 5, NULL),
	(43, 1, 56, 56, 5, NULL),
	(126, 1, 500, 400, 300, 28),
	(148, 13, 45, 6, 5, 21),
	(128, 7, 4, 6, 7, 28),
	(49, 3, 45, 65, 56, 22),
	(50, 5, 5, 5, 5, 24),
	(51, 1, 34, 5, 6, 24),
	(52, 3, 4, 6, 5, 24),
	(85, 3, 6, 5, 6, 25),
	(84, 5, 6, 7, 6, 25),
	(111, 0, 0, 0, 0, 21),
	(125, 5, 450, 300, 200, 28),
	(127, 6, 300, 250, 200, 28),
	(144, 1, 5, 7, 8, 21),
	(146, 2, 56, 67, 56, 21),
	(130, 1, 300, 300, 200, 30),
	(131, 1, 4, 6, 45, 12),
	(147, 9, 45, 6, 7, 21),
	(132, 2, 4, 6, 7, 12),
	(150, 1, 56, 7, 8, 5),
	(149, 7, 45, 6, 7, 21),
	(151, 7, 4, 5, 6, 5),
	(152, 12, 4, 5, 6, 5),
	(153, 5, 4, 6, 5, 5),
	(154, 8, 45, 65, 45, 5),
	(155, 14, 45, 66, 55, 5),
	(156, 10, 444, 555, 444, 5),
	(157, 6, 45, 67, 67, 31),
	(158, 1, 5, 7, 6, 32),
	(159, 1, 450, 500, 300, 33),
	(160, 6, 300, 300, 300, 33),
	(162, 1, 350, 300, 200, 35),
	(163, 5, 250, 200, 150, 35),
	(164, 3, 150, 100, 200, 35),
	(165, 7, 30, 20, 10, 35);
/*!40000 ALTER TABLE `item_cardapio` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(100) NOT NULL,
  `unidade_medida` varchar(3) NOT NULL,
  `data_validade` date NOT NULL,
  `id_nota` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_recurso` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.produtos: 14 rows
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id_produto`, `nome_produto`, `unidade_medida`, `data_validade`, `id_nota`, `id_fornecedor`, `id_recurso`) VALUES
	(1, 'Arroz', 'kg', '0002-05-06', 0, 0, 0),
	(2, 'Arroz 5', 'kg', '0000-00-00', 0, 0, 0),
	(3, 'Batata', 'kg', '2022-12-10', 56, 1, 0),
	(4, 'Batata', 'kg', '2022-02-20', 4, 9, 2),
	(5, 'Feijao', 'kg', '2022-03-04', 2, 4, 2),
	(6, 'carne', 'kg', '0000-00-00', 0, 0, 0),
	(7, 'alface', '', '0000-00-00', 0, 0, 0),
	(8, 'uva', '', '0000-00-00', 0, 0, 0),
	(9, 'abacate', '', '0000-00-00', 0, 0, 0),
	(10, 'azeitona', '', '0000-00-00', 0, 0, 0),
	(11, 'amora', '', '0000-00-00', 0, 0, 0),
	(12, 'abacaxi', '', '0000-00-00', 0, 0, 0),
	(13, 'azeite', '', '0000-00-00', 0, 0, 0),
	(14, 'ameixa', '', '0000-00-00', 0, 0, 0);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.recurso
CREATE TABLE IF NOT EXISTS `recurso` (
  `id_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `nome_recurso` varchar(100) NOT NULL,
  PRIMARY KEY (`id_recurso`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.recurso: 2 rows
/*!40000 ALTER TABLE `recurso` DISABLE KEYS */;
INSERT INTO `recurso` (`id_recurso`, `nome_recurso`) VALUES
	(0, 'Estado'),
	(2, 'Fazenda');
/*!40000 ALTER TABLE `recurso` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nivel` int(11) NOT NULL,
  `desativado` int(11) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.usuarios: 1 rows
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `usuario`, `nome`, `senha`, `nivel`, `desativado`, `token`) VALUES
	(0, 'Nat', 'Natallia', '1234', 0, 0, '23fcd6f5b85066e5e9ebe486b1ab773b');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
