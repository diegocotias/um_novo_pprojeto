-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/08/2024 às 12:45
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `concurso`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `candidatos`
--

CREATE TABLE `candidatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cargo_id` int(11) DEFAULT NULL,
  `categoria` enum('ampla_concorrencia','afrodescendente','pcd') NOT NULL,
  `classificacao` int(11) DEFAULT NULL,
  `numero_inscricao` varchar(20) DEFAULT NULL,
  `numero_filhos` int(11) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `objetivas` varchar(20) DEFAULT NULL,
  `titulos` varchar(20) DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `candidatos`
--

INSERT INTO `candidatos` (`id`, `nome`, `cargo_id`, `categoria`, `classificacao`, `numero_inscricao`, `numero_filhos`, `data_nascimento`, `objetivas`, `titulos`, `total`) VALUES
(3, 'MAICON RODRIGUES PORTO', 1, 'ampla_concorrencia', 1, '25798', 0, '1996-09-28', '7100', '0', '71000'),
(4, 'KAIQUE SAMUEL PEREIRA RAMOS', 1, 'ampla_concorrencia', 2, '22560', 0, '1999-11-08', '1000', '0.00', '999.99'),
(5, 'IVAN DE FREITAS SOARES FILHO', 1, 'ampla_concorrencia', 3, '26611', 0, '1994-05-10', '1000', '0.00', '999.99'),
(7, 'PAULO OTAVIO DA SILVA LIMA', 1, 'ampla_concorrencia', 4, '14346', 0, '1989-02-17', '1000', '0.00', '999.99'),
(8, 'ALTAMIRANDO ALBERTINO DOS SANTOS NETO', 1, 'ampla_concorrencia', 5, '1694112', 0, '2004-01-19', '1000', '0.00', '999.99'),
(9, 'AGDA ELJANE MESQUITA CARDOSO', 1, 'ampla_concorrencia', 6, '95141', 0, '1997-04-25', '1000', '0.00', '999.99'),
(10, 'DEBORA SANTANA GOUVEIA', 1, 'ampla_concorrencia', 7, '1693391', 0, '1989-11-27', '1000', '0.00', '999.99'),
(11, 'MAURICIO OLIVEIRA DOS SANTOS', 1, 'ampla_concorrencia', 8, '16519', 0, '1987-11-03', '1000', '0.00', '999.99'),
(12, 'NOADSON ALVES BORGES CARDOSO', 1, 'ampla_concorrencia', 9, '15750', 0, '1996-05-25', '1000', '0.00', '999.99'),
(13, 'SIRLAINA JESUS MOREIRA MORAES', 1, 'ampla_concorrencia', 10, '1696373', 2, '1987-06-16', '1000', '0.00', '999.99'),
(14, 'PAULO HENRIQUE PINTO TEIXEIRA', 1, 'ampla_concorrencia', 11, '19402', 0, '2002-10-30', '1000', '0.00', '999.99'),
(15, 'EUGENIO RAMOS TEIXEIRA', 1, 'ampla_concorrencia', 12, '26387', 0, '1997-12-13', '1000', '0.00', '999.99'),
(16, 'MAICON RODRIGUES PORTO', 1, 'afrodescendente', 1, '25798', 0, '1996-09-28', '7100', '0', '71000'),
(17, 'KAIQUE SAMUEL PEREIRA RAMOS', 1, 'afrodescendente', 2, '22560', 0, '1999-11-06', '1000', '0.00', '999.99'),
(18, 'PAULO OTAVIO DA SILVA LIMA', 1, 'afrodescendente', 3, '14346', 0, '1989-02-17', '1000', '0.00', '999.99'),
(19, 'DEBORA SANTANA GOUVEIA', 1, 'afrodescendente', 4, '1693391', 0, '1989-11-27', '1000', '0.00', '999.99'),
(20, 'MAURICIO OLIVEIRA DOS SANTOS', 1, 'afrodescendente', 5, '16519', 0, '1987-11-03', '1000', '0.00', '999.99'),
(21, 'PAULO HENRIQUE PINTO TEIXEIRA', 1, 'afrodescendente', 6, '19402', 0, '2002-10-30', '1000', '0.00', '999.99'),
(22, 'ESTEFANE BORGES RODRIGUES', 1, 'afrodescendente', 7, '13137', 0, '2003-03-30', '1000', '0.00', '999.99'),
(23, 'HIANA STEFANE PEREIRA XAVIER', 1, 'afrodescendente', 8, '10782', 0, '1998-10-06', '1000', '0.00', '999.99'),
(24, 'AILTON DE SOUZA BATISTA JUNIOR', 1, 'afrodescendente', 9, '11584', 0, '1999-01-18', '1000', '0.00', '999.99'),
(25, 'MARCELA CONCEICAO TEIXEIRA DE OLIVEIRA', 2, 'ampla_concorrencia', 1, '51963', 0, '1982-09-18', '10200', '1000', '103000'),
(26, 'ELIARDO DA SILVA OLIVEIRA', 2, 'ampla_concorrencia', 2, '1389', 0, '1996-05-16', '10000', '2000', '102000'),
(27, 'SABRINA MARIA JOSE NOVAIS MEIRA', 2, 'ampla_concorrencia', 3, '170341', 0, '1994-03-19', '10100', '0', '101000'),
(28, 'IOLANDA SANTOS NOGUEIRA', 2, 'ampla_concorrencia', 4, '9941', 0, '1994-10-04', '9900', '1000', '100000'),
(29, 'IGOR MAIA DE OLIVEIRA', 2, 'ampla_concorrencia', 5, '1048', 0, '1997-02-21', '9900', '0', '99000'),
(30, 'PALOMA CASTRO PINTO ROCHA', 2, 'ampla_concorrencia', 6, '9876', 0, '1991-01-13', '9800', '1000', '99000'),
(31, 'LARISSA SILVA TEIXEIRA GOMES', 2, 'ampla_concorrencia', 7, '9539', 1, '1990-01-27', '9600', '1000', '97000'),
(32, 'RAISSA NEYLA DA SILVA DOMINGUES NOGUEIRA', 2, 'ampla_concorrencia', 8, '51521', 0, '1997-02-25', '9600', '1000', '97000'),
(33, 'ROBSON DE SOUSA', 2, 'ampla_concorrencia', 9, '168713', 0, '1988-01-23', '9500', '2000', '97000'),
(34, 'MARIA EMILIA PEREIRA LOPES', 2, 'ampla_concorrencia', 10, '9390', 0, '1998-05-12', '9600', '0', '96000'),
(35, 'ALINE JOYCE SANTANA OLIVEIRA', 2, 'ampla_concorrencia', 11, '2123', 0, '1993-10-23', '9500', '1000', '96000'),
(36, 'LILIANE OLIVEIRA MACEDO', 2, 'ampla_concorrencia', 12, '2460', 0, '1997-05-16', '9600', '0', '96000'),
(37, 'ERICKA EMANUELLA GOMES MOREIRA', 2, 'ampla_concorrencia', 13, '2030', 0, '1990-08-03', '9400', '1000', '95000'),
(38, 'NAILANE MOREIRA COSTA', 2, 'ampla_concorrencia', 14, '7089', 1, '1985-11-16', '9400', '1000', '95000'),
(39, 'REGINA NEVES RIBEIRO', 2, 'ampla_concorrencia', 15, '170074', 0, '1990-02-03', '9400', '1000', '95000'),
(40, 'GRAZIELI MARTINS BRITO', 2, 'ampla_concorrencia', 16, '168706', 2, '1984-07-20', '9300', '1000', '94000'),
(41, 'MARIA DA CONCEICAO PARANAGUA SANTOS', 2, 'ampla_concorrencia', 17, '51113', 2, '1983-10-30', '9200', '2000', '94000'),
(42, 'LEYLIANE SANTANA MARQUES', 2, 'ampla_concorrencia', 18, '2360', 0, '1999-02-23', '9200', '2000', '94000'),
(43, 'LUZIA CELIA BATISTA SOARES', 2, 'ampla_concorrencia', 19, '7186', 1, '1994-12-13', '9200', '2000', '94000'),
(44, 'KELLE ARAUJO NASCIMENTO ALVES', 2, 'ampla_concorrencia', 20, '9853', 2, '1983-05-12', '8900', '5000', '94000'),
(45, 'ANA LUISA COTRIM OLIVEIRA', 2, 'ampla_concorrencia', 21, '1772', 2, '1992-07-26', '8900', '2000', '94000'),
(46, 'HELCIA TAIANE DE OLIVEIRA SANTOS', 2, 'ampla_concorrencia', 22, '168146', 0, '1990-01-30', '9300', '0', '93000'),
(47, 'DENISE DE SOUZA CARVALHO', 2, 'ampla_concorrencia', 23, '169607', 0, '1993-12-07', '9200', '1000', '93000'),
(48, 'MARCELE JERONIMO SANTANA', 2, 'ampla_concorrencia', 24, '163941', 0, '1997-03-29', '9300', '0', '93000'),
(49, 'SAMARA MACHADO DA SILVA', 2, 'ampla_concorrencia', 25, '9458', 2, '1985-04-22', '9200', '1000', '93000'),
(50, 'MAIANA AQUINO PINHEIRO', 2, 'ampla_concorrencia', 26, '170664', 0, '1990-04-10', '9200', '1000', '93000'),
(51, 'RICARDO BRUNO SANTOS FERREIRA', 2, 'ampla_concorrencia', 27, '9646', 0, '1990-01-25', '8800', '5000', '93000'),
(52, 'DANIELA DA SILVA SANTOS', 2, 'ampla_concorrencia', 28, '1608', 0, '2000-09-14', '9200', '0', '92000'),
(53, 'KATHELLY OLIVEIRA ANDRADE', 2, 'ampla_concorrencia', 29, '7185', 0, '1996-11-21', '9200', '0', '92000'),
(54, 'MILENA DOS ANJOS CONCEICAO', 2, 'ampla_concorrencia', 30, '1848', 0, '1989-08-14', '9000', '2000', '92000'),
(55, 'MAYARA CARDOSO DA SILVA', 2, 'ampla_concorrencia', 31, '170666', 0, '1996-04-23', '9100', '1000', '92000'),
(56, 'KAIQUE SANTOS REIS', 2, 'ampla_concorrencia', 32, '1811', 0, '1996-11-03', '9100', '1000', '92000'),
(57, 'ALICIA CATHARINE SILVA DE OLIVEIRA', 2, 'ampla_concorrencia', 33, '2120', 0, '1998-10-08', '9000', '2000', '92000'),
(58, 'DOUGLAS DE SOUZA E SILVA', 2, 'ampla_concorrencia', 34, '7315', 0, '1991-09-06', '8700', '5000', '92000'),
(59, 'SABRINA DA SILVA GUERRA', 2, 'ampla_concorrencia', 35, '51916', 0, '1995-06-06', '9100', '0', '91000'),
(60, 'VALERIA WEYRLA DA SILVA PORTO VIANA', 2, 'ampla_concorrencia', 36, '2717', 0, '1991-09-20', '9000', '1000', '91000'),
(61, 'BARBARA CRISTINA SILVA ALKMIM', 2, 'ampla_concorrencia', 37, '2237', 1, '1980-04-27', '9000', '1000', '91000'),
(62, 'TAYNA FREITAS MAIA', 2, 'ampla_concorrencia', 38, '102810', 0, '1997-07-22', '9000', '1000', '91000'),
(63, 'CRISTIANO OLIVEIRA DE SOUZA', 2, 'ampla_concorrencia', 39, '1453', 0, '1986-10-29', '8700', '4000', '91000'),
(64, 'NEILA CARLA SILVA DE MAGALHAES', 2, 'ampla_concorrencia', 40, '7113', 2, '1985-12-05', '9000', '1000', '91000'),
(65, 'CINOELIA LEAL DE SOUZA', 2, 'ampla_concorrencia', 41, '51684', 0, '1988-10-31', '8100', '10000', '91000'),
(66, 'ROSANA MARIA SILVA', 2, 'ampla_concorrencia', 42, '169754', 1, '1984-05-17', '8900', '1000', '90000'),
(67, 'LUCIANA APARECIDA FARIAS NEVES', 2, 'ampla_concorrencia', 43, '170391', 2, '1982-03-23', '8900', '1000', '90000'),
(68, 'WESLEY DOS SANTOS TEIXEIRA', 2, 'ampla_concorrencia', 44, '169519', 0, '1998-04-18', '9000', '0', '90000'),
(69, 'IARA CAROLINE MOURA CONCEICAO DA SILVA', 2, 'ampla_concorrencia', 45, '1491', 0, '1995-09-28', '8800', '2000', '90000'),
(70, 'REGINA NEVES RIBEIRO', 2, 'afrodescendente', 1, '170074', 0, '1990-02-03', '9400', '1000', '95000'),
(71, 'MARIA DA CONCEICAO PARANAGUA SANTOS', 2, 'afrodescendente', 2, '51113', 2, '1983-10-30', '9200', '2000', '94000'),
(72, 'LEYLIANE SANTANA MARQUES', 2, 'afrodescendente', 3, '2360', 0, '1999-02-23', '9200', '2000', '94000'),
(73, 'LUZIA CELIA BATISTA SOARES', 2, 'afrodescendente', 4, '7186', 1, '1994-12-13', '9200', '2000', '94000'),
(74, 'HELCIA TAIANE DE OLIVEIRA SANTOS', 2, 'afrodescendente', 5, '168146', 0, '1990-01-30', '9300', '0', '93000'),
(75, 'MARCELE JERONIMO SANTANA', 2, 'afrodescendente', 6, '163941', 0, '1997-03-29', '9300', '0', '93000'),
(76, 'RICARDO BRUNO SANTOS FERREIRA', 2, 'afrodescendente', 7, '9646', 0, '1990-01-25', '8800', '5000', '93000'),
(77, 'MILENA DOS ANJOS CONCEICAO', 2, 'afrodescendente', 8, '1848', 0, '1989-08-14', '9000', '2000', '92000'),
(78, 'KAIQUE SANTOS REIS', 2, 'afrodescendente', 9, '1811', 0, '1996-11-03', '9100', '1000', '92000'),
(79, 'DOUGLAS DE SOUZA E SILVA', 2, 'afrodescendente', 10, '7315', 0, '1991-09-06', '8700', '5000', '92000'),
(80, 'CINOELIA LEAL DE SOUZA', 2, 'afrodescendente', 11, '51684', 0, '1988-10-31', '8100', '10000', '91000'),
(81, 'ROSANA MARIA SILVA', 2, 'afrodescendente', 12, '169754', 1, '1984-05-17', '8900', '1000', '90000'),
(82, 'WESLEY DOS SANTOS TEIXEIRA', 2, 'afrodescendente', 13, '169519', 0, '1998-04-18', '9000', '0', '90000'),
(83, 'IARA CAROLINE MOURA CONCEICAO DA SILVA', 2, 'afrodescendente', 14, '1491', 0, '1995-09-28', '8800', '2000', '90000'),
(84, 'CRISTIAN LUCAS DOS SANTOS BEZERRA', 2, 'afrodescendente', 15, '1780', 0, '1998-12-11', '9000', '0', '90000'),
(85, 'JAMILLE SALES DA CRUZ', 2, 'afrodescendente', 16, '2296', 1, '1997-06-15', '8800', '2000', '90000'),
(86, 'ANA PAULA OLIVEIRA SANTOS MELO', 2, 'afrodescendente', 17, '168392', 2, '1994-11-28', '8900', '0', '89000'),
(87, 'ATILA RODRIGUES SOUZA', 2, 'afrodescendente', 18, '170018', 0, '1999-10-23', '8900', '0', '89000'),
(88, 'JOQUEBEDE DE SOUZA SANTOS', 2, 'afrodescendente', 19, '7254', 0, '1995-06-01', '8800', '1000', '89000'),
(89, 'DELMA RIANE REBOUCAS BATISTA', 2, 'afrodescendente', 20, '170812', 1, '1985-07-30', '8400', '5000', '89000'),
(90, 'ANDRE MAURICIO GOMES', 2, 'afrodescendente', 21, '168931', 0, '1978-08-06', '8800', '0', '88000'),
(91, 'ELAINE TAIS MENDES DOS SANTOS BOTELHO', 2, 'afrodescendente', 22, '51751', 1, '1991-02-06', '8700', '1000', '88000'),
(92, 'SABRINA NUNES DOS SANTOS', 2, 'afrodescendente', 23, '9550', 0, '1994-02-08', '8600', '2000', '88000'),
(93, 'ESTER DA SILVA SANTOS', 2, 'afrodescendente', 24, '9376', 0, '1994-03-26', '8700', '0', '87000'),
(94, 'ANA CAROLINA RODRIGUES MENEZES', 2, 'afrodescendente', 25, '1524', 0, '2000-04-02', '8700', '0', '87000'),
(95, 'SALMARA VIDAL CARVALHO', 2, 'afrodescendente', 26, '171115', 0, '1981-09-20', '8600', '1000', '87000'),
(96, 'EDILENE SANTOS SILVA', 2, 'afrodescendente', 27, '165538', 0, '1998-07-25', '8600', '0', '86000'),
(97, 'ROSILENE DAS NEVES PEREIRA', 2, 'afrodescendente', 28, '169781', 2, '1987-06-01', '8100', '5000', '86000'),
(98, 'ELIANE SANTANA NUNES', 2, 'afrodescendente', 29, '9896', 1, '1984-11-27', '8100', '5000', '86000'),
(99, 'VIRLANE MAGALHAES MOCO', 2, 'afrodescendente', 30, '170563', 1, '1992-12-04', '8500', '0', '85000'),
(100, 'OTON ELISIO TEIXEIRA SANTANA', 2, 'afrodescendente', 31, '1831', 0, '1999-05-17', '8500', '0', '85000'),
(101, 'RIZONETE MASCARENHAS DA SILVA ROCHA', 2, 'afrodescendente', 32, '9987', 2, '1984-05-16', '8400', '1000', '85000'),
(102, 'CLEBER IANCO BENEVIDES FERNANDES', 2, 'afrodescendente', 33, '9155', 2, '1988-11-30', '8300', '2000', '85000'),
(103, 'ALDA BRITO ALMEIDA', 2, 'afrodescendente', 34, '9913', 0, '1988-10-20', '8300', '1000', '84000'),
(104, 'JARBAS WILLIAN PAIVA LEITE', 2, 'afrodescendente', 35, '9412', 0, '1988-11-07', '8200', '2000', '84000'),
(105, 'JULIETE SILVA CAMPOS', 2, 'pcd', 1, '168269', 1, '1990-03-25', '8400', '1000', '85000'),
(106, 'EVANIA ROCHA DONATO PEREIRA', 2, 'pcd', 2, '7169', 1, '1981-10-25', '7300', '1000', '74000'),
(107, 'BRUNO FRAGA SOUSA', 2, 'pcd', 3, '51901', 0, '1995-04-03', '7400', '0', '74000'),
(108, 'RAIZA MAGALHAES MARTINS REGO BADARO', 2, 'pcd', 4, '51143', 0, '1989-06-28', '7200', '1000', '73000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `total_vagas` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`, `total_vagas`) VALUES
(1, 'Agente de Trânsito', 50),
(2, 'Enfermeiro', 50),
(3, 'Técnico em Enfermagem', 50),
(4, 'Auditor Fiscal', 0),
(5, 'Professor', 0),
(6, 'Policial', 50);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cargo_id` (`cargo_id`);

--
-- Índices de tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `candidatos`
--
ALTER TABLE `candidatos`
  ADD CONSTRAINT `candidatos_ibfk_1` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
