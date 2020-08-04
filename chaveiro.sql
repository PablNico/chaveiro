-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2020 at 01:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chaveiro`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `idComanda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nomeCondominio` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `observacoes` text NOT NULL,
  `tipoCliente` int(1) NOT NULL COMMENT '1: Pessoa física\r\n2: Pessoa Jurídica (Condomínio)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `nomeCondominio`, `telefone`, `cpf`, `email`, `observacoes`, `tipoCliente`) VALUES
(1, 'Pablo Nicolas', NULL, '(47) 9 9666-6786', '057.818.659-42', 'pabloniicolas2@gmail.com', 'Teste', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comanda`
--

CREATE TABLE `comanda` (
  `id` int(11) NOT NULL,
  `carrinho` int(11) NOT NULL,
  `valorPago` double DEFAULT NULL,
  `valorTotal` int(11) NOT NULL COMMENT 'Soma de todos os produtos adicionados'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `logradouro` varchar(255) NOT NULL COMMENT 'Rua, Avenida e etc...',
  `nome` varchar(255) NOT NULL COMMENT 'Nome da rua',
  `numero` varchar(30) NOT NULL,
  `edificio` varchar(255) DEFAULT NULL COMMENT 'Prédio, edificio',
  `complemento` varchar(255) NOT NULL COMMENT 'Apartamento',
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(2) NOT NULL COMMENT 'Estado',
  `cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`id`, `logradouro`, `nome`, `numero`, `edificio`, `complemento`, `cidade`, `uf`, `cliente`) VALUES
(1, 'Rua', 'Geraldo José Borba', '1151', NULL, 'AP. 102', 'Navegantes', 'SC', 1),
(2, 'Avenida', 'Brasília', '1024', NULL, 'Esquina', 'Camboriú', 'SC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` double NOT NULL,
  `carrinho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `estoque` int(11) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `status` int(1) NOT NULL COMMENT '1: Andamento\r\n2: Finalizado\r\n3: Quitado\r\n4: Cancelado',
  `prioridade` int(1) NOT NULL COMMENT '1: Baixa\r\n2: Média\r\n3: Alta\r\n4: Urgente',
  `dataInicio` timestamp NOT NULL DEFAULT current_timestamp(),
  `dataFim` timestamp NULL DEFAULT NULL,
  `idComanda` int(11) DEFAULT NULL COMMENT 'Estou pensando em deixar igual o número do id',
  `idUsuario` int(11) DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `idEndereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(55) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `tipoConta` int(1) NOT NULL COMMENT '0: Funcionario\r\n1: Administrador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`, `tipoConta`) VALUES
(1, 'Pablo Nicolas', 'nico', '123', 1),
(6, 'nico', 'f', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrinho_ibfk_servico` (`idComanda`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto` (`carrinho`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente` (`cliente`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD KEY `pedido_ibfk_carrinho` (`carrinho`),
  ADD KEY `pedido_ibfk_produto` (`produto`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicos_ibfk_cliente` (`idCliente`),
  ADD KEY `servicos_ibfk_endereco` (`idEndereco`),
  ADD KEY `servicos_ibfk_usuario` (`idUsuario`),
  ADD KEY `servicos_ibfk_comanda` (`idComanda`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comanda`
--
ALTER TABLE `comanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_servico` FOREIGN KEY (`idComanda`) REFERENCES `comanda` (`id`);

--
-- Constraints for table `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `comanda_ibfk_1` FOREIGN KEY (`carrinho`) REFERENCES `produto` (`id`);

--
-- Constraints for table `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id`);

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_carrinho` FOREIGN KEY (`carrinho`) REFERENCES `carrinho` (`id`),
  ADD CONSTRAINT `pedido_ibfk_produto` FOREIGN KEY (`produto`) REFERENCES `produto` (`id`);

--
-- Constraints for table `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_ibfk_cliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `servicos_ibfk_comanda` FOREIGN KEY (`idComanda`) REFERENCES `comanda` (`id`),
  ADD CONSTRAINT `servicos_ibfk_endereco` FOREIGN KEY (`idEndereco`) REFERENCES `endereco` (`id`),
  ADD CONSTRAINT `servicos_ibfk_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
