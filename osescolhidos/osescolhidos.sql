-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.21 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para escolhidos
CREATE DATABASE IF NOT EXISTS `escolhidos` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `escolhidos`;

-- Copiando estrutura para tabela escolhidos.competidores
CREATE TABLE IF NOT EXISTS `competidores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `casal` varchar(150) NOT NULL,
  `cavalheiro` varchar(100) NOT NULL,
  `data_nasc_c` date NOT NULL,
  `cpf_c` varchar(20) NOT NULL,
  `cel_c` varchar(20) NOT NULL,
  `email_c` varchar(65) NOT NULL,
  `dama` varchar(100) NOT NULL,
  `data_nasc_d` date NOT NULL,
  `cpf_d` varchar(20) NOT NULL,
  `cel_d` varchar(20) NOT NULL,
  `email_d` varchar(65) NOT NULL,
  `pago` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
