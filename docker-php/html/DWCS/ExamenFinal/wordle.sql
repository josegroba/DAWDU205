CREATE DATABASE IF NOT EXISTS `wordle` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wordle`;

DROP TABLE IF EXISTS `palabra`;
CREATE TABLE `palabra` (
  `idPalabra` int(11) NOT NULL,
  `palabra` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `palabra` (`idPalabra`, `palabra`) VALUES
(1, 'ganar'),
(2, 'cimas'),
(3, 'filon'),
(4, 'rifas');