-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Ago-2025 às 20:15
-- Versão do servidor: 8.0.29
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `esmalteideal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int NOT NULL,
  `fotoProduto` varchar(100) NOT NULL,
  `nomeProduto` varchar(30) NOT NULL,
  `descricaoProduto` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `valorProduto` decimal(10,2) NOT NULL,
  `statusProduto` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `editoraLivro` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `numeroLivro` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `generoLivro` varchar(1000) DEFAULT NULL,
  `idUsuario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idProduto`, `fotoProduto`, `nomeProduto`, `descricaoProduto`, `valorProduto`, `statusProduto`, `editoraLivro`, `numeroLivro`, `generoLivro`, `idUsuario`) VALUES
(6, 'img/karav.jpg', 'Noites Brancas', 'gsetgw4', '1100.00', 'yse4t', '', '', 'disponivel', NULL),
(8, 'img/mito de sisisfo.jpg', 'Mito de Sísifo', '&quot;O Mito de Sísifo&quot;, de Albert Camus, é um ensaio filosófico que explora a condição humana à luz do absurdo. Camus analisa a relação entre o homem, que busca sentido e ordem.', '10.00', 'EDITORIAL RECORD', '140', 'Reflexão', 'disponivel', NULL),
(9, 'img/passeioaofarol.jpg', 'Passeio ao Farol', 'De Vírginia Woofl', '45.00', 'Penguin', '220', 'Romance', 'disponivel', NULL),
(10, 'img/relexaog.webp', 'Reflexão sobre a Guilhotina', 'De Albert Camus', '50.00', 'EDITORA RECORD', '160', 'Ensaio', 'disponivel', NULL),
(14, 'img/81xrQauj0bL.jpg', 'Gente Pobre', 'De Dostoievski,Primeira obra de Dostoiévski, Gente pobre mostra ao leitora dura realidade vivida pelos moradores de São Petesburgo, no século XIX por meio das cartas trocadas entre os protagonistas.', '45.00', 'Editora 34', '130', 'Ficção', 'disponivel', NULL),
(15, 'img/81r9A1bGIFL._UF894,1000_QL80_.jpg', 'O Idiota', 'Um homem de compaixão sem limites, tratado por todos ao redor como “idiota”, recebe uma grande herança e passa a ser bajulado e explorado por pessoas egoístas, maliciosas e mesquinhas.', '84.00', 'Editora 34', '544', 'Ficção', 'disponivel', NULL),
(16, 'img/oestrangeiro.jpg', 'O estrangeiro, Albert Camus', 'O estrangeiro narra a história de um homem comum que se depara com o absurdo da condição humana depois que comete um crime quase inconscientemente.', '120.00', 'Record', '120', 'Ficção', 'disponivel', NULL),
(17, 'img/4c74cb30125248797583fef69289b785.jpg', 'A Queda', 'de Albert Camus', '50.00', 'Record', '180', 'Ficção', 'disponivel', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `fotoUsuario` varchar(100) NOT NULL,
  `nomeUsuario` varchar(50) NOT NULL,
  `dataNascimentoUsuario` date NOT NULL,
  `cidadeUsuario` varchar(30) NOT NULL,
  `telefoneUsuario` varchar(20) NOT NULL,
  `emailUsuario` varchar(50) NOT NULL,
  `senhaUsuario` varchar(100) NOT NULL,
  `tipoUsuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `fotoUsuario`, `nomeUsuario`, `dataNascimentoUsuario`, `cidadeUsuario`, `telefoneUsuario`, `emailUsuario`, `senhaUsuario`, `tipoUsuario`) VALUES
(1, 'img/Classico_2D.webp', 'Sonic', '1991-04-10', 'telemacoBorba', '(42) 99999-9999', 'sonic@gmail.com', '202cb962ac59075b964b07152d234b70', 'administrador'),
(2, 'img/mario.png', 'Mario Mario', '1983-12-10', 'imbau', '(42) 99999-7777', 'mario@gmail.com', '202cb962ac59075b964b07152d234b70', 'cliente'),
(3, 'img/Luigi.png', 'Luigi Mario', '1986-03-20', 'telemacoBorba', '(42) 99988-7799', 'luigi@gmail.com', '202cb962ac59075b964b07152d234b70', 'cliente'),
(4, 'img/PEDRO.png', 'maria', '4889-12-23', 'telemacoBorba', '(42) 99954-3690', 'root@gmail.com', '202cb962ac59075b964b07152d234b70', 'cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
