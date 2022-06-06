#Criar o banco
CREATE DATABASE `db_lml` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
#Selecionar o banco a ser utilizado
use db_lml;

#Cria as tabelas necessarias
CREATE TABLE `biblioteca` (
  `idLivro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) NOT NULL,
  `edicao` varchar(20) NOT NULL,
  `lancamento` date NOT NULL,
  `autor` varchar(25) NOT NULL,
  `caminhoImagem` varchar(256) DEFAULT NULL,
  `avaliacoes` float NOT NULL,
  PRIMARY KEY (`idLivro`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
CREATE TABLE `stars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rateIndex` float NOT NULL,
  `idLivro` int(11) NOT NULL,
  `nomeUser` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `login` varchar(10) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tipoUsuario` int(1) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;