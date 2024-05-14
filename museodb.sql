-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mag 12, 2024 alle 16:37
-- Versione del server: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `museodb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `artisti`
--

CREATE TABLE IF NOT EXISTS `artisti` (
  `CodArtista` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(30) DEFAULT NULL,
  `Cognome` varchar(30) DEFAULT NULL,
  `DataN` smallint(5) unsigned DEFAULT NULL,
  `DataM` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`CodArtista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dump dei dati per la tabella `artisti`
--

INSERT INTO `artisti` (`CodArtista`, `Nome`, `Cognome`, `DataN`, `DataM`) VALUES
(1, 'Claude', 'Monet', 1840, 1926),
(2, 'Vincent', 'Van Gogh', 1853, 1890),
(3, 'Gustav', 'Klimt', 1862, 1918),
(4, 'Paul', 'Klee ', 1879, 1940),
(5, 'Caspar David ', 'Friedrich', 1774, 1840),
(6, 'August', 'Macke', 1887, 1914),
(7, 'Leonardo', 'da Vinci', 1452, 1519),
(8, 'Michelangelo', 'Buonarroti ', 1475, 1564),
(9, 'Pierre-Auguste ', 'Renoir', 1841, 1919),
(10, 'Johannes', 'Vermeer ', 1632, 1675),
(11, 'Max', 'Liebermann ', 1847, 1935),
(12, 'Raffaello', 'Sanzio ', 1483, 1520),
(13, 'Edvard', 'Munch ', 1863, 1944),
(14, 'Sandro ', 'Botticelli', 1445, 1510),
(15, 'Paul', 'Cezanne', 1520, 1906),
(16, 'Michelangelo', 'Merisi ', 1573, 1610),
(17, 'Salvador', 'Dalì', 1904, 1989),
(18, 'Pablo', 'Picasso', 1881, 1973),
(19, 'Franz', 'Marc', 1880, 1916),
(20, 'Paul', 'Gauguin', 1848, 1903),
(21, 'Max', 'Beckmann', 1884, 1950),
(22, 'Edouard', 'Manet', 1832, 1883);

-- --------------------------------------------------------

--
-- Struttura della tabella `citta`
--

CREATE TABLE IF NOT EXISTS `citta` (
  `CodCitta` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CodCitta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dump dei dati per la tabella `citta`
--

INSERT INTO `citta` (`CodCitta`, `Nome`) VALUES
(1, 'Parigi'),
(2, 'New York'),
(3, 'Firenze'),
(4, 'Washington'),
(5, 'Roma'),
(6, 'Londra'),
(7, 'Madrid'),
(8, 'Amsterdam'),
(9, 'Cologne'),
(10, 'Korte Vijverberg'),
(11, 'Venezia'),
(12, 'Oslo'),
(13, 'Essen'),
(14, 'Vienna'),
(15, 'Firenze'),
(16, 'San Pietroburgo'),
(17, 'pompei');

-- --------------------------------------------------------

--
-- Struttura della tabella `musei`
--

CREATE TABLE IF NOT EXISTS `musei` (
  `CodMuseo` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `CodCitta` smallint(5) unsigned DEFAULT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CodMuseo`),
  KEY `CodCitta` (`CodCitta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dump dei dati per la tabella `musei`
--

INSERT INTO `musei` (`CodMuseo`, `CodCitta`, `Nome`) VALUES
(1, 1, 'Louvre'),
(2, 2, 'Museum of Modern Art'),
(3, 3, 'Gallerie degli Uffizi'),
(4, 4, 'National Gallery'),
(5, 5, 'Musei Vaticani'),
(6, 6, 'British Museum'),
(7, 7, 'Museo del Prado'),
(8, 1, 'Museo D''Orsay'),
(9, 8, 'Van Gogh Museum'),
(10, 5, 'Galleria Borghese'),
(11, 9, 'Museum Ludwig'),
(12, 10, 'Mauritshuis'),
(13, 7, 'Collezione Carmen Thyssen-Born'),
(14, 11, 'Galleria Internazionale d''Arte'),
(15, 12, 'Galleria Nazionale'),
(16, 13, 'Museo Folkwang'),
(17, 7, 'Museo Reina Sofia'),
(18, 14, 'Galleria Austriaca Belvedere'),
(19, 15, 'Galleria dell''Accademia'),
(20, 16, 'Emirtage');

-- --------------------------------------------------------

--
-- Struttura della tabella `opere`
--

CREATE TABLE IF NOT EXISTS `opere` (
  `CodOpera` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `CodMuseo` smallint(5) unsigned DEFAULT NULL,
  `CodArtista` int(10) unsigned NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Tipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CodOpera`),
  KEY `CodMuseo` (`CodMuseo`),
  KEY `CodArtista` (`CodArtista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=418 ;

--
-- Dump dei dati per la tabella `opere`
--

INSERT INTO `opere` (`CodOpera`, `CodMuseo`, `CodArtista`, `Nome`, `Tipo`) VALUES
(1, 8, 1, 'I papaveri', 'Quadro'),
(2, 8, 1, 'Camille Monet sul letto di morte', 'Quadro'),
(3, 8, 1, 'Colazione sull’erba', 'Quadro'),
(4, 4, 1, 'La Gazza', 'Quadro'),
(5, 4, 1, 'La Pointe de la Hève, Sainte-Adresse', 'Quadro'),
(6, 2, 1, 'La Grenouillère', 'Quadro'),
(7, 4, 1, 'Il parlamento di Londra, al tramonto', 'Quadro'),
(8, 2, 2, 'La notte stellata', 'Quadro'),
(9, 4, 2, 'I girasoli', 'Quadro'),
(10, 8, 2, 'La camera di Vincent ad Arles', 'Quadro'),
(11, 9, 2, 'Mangiatori di patate', 'Quadro'),
(12, 8, 2, 'Autoritratto', 'Quadro'),
(13, 18, 3, 'Il bacio', 'Quadro'),
(14, 18, 3, 'Giardino di campagna con girasoli', 'Quadro'),
(15, 18, 3, 'Il melo', 'Quadro'),
(16, 18, 3, 'Le amiche', 'Quadro'),
(17, 18, 3, 'Campo di papaveri', 'Quadro'),
(18, 2, 4, 'Gatto and uccello', 'Quadro'),
(19, 2, 4, 'Twittering Machine', 'Quadro'),
(20, 2, 4, 'Fuoco nella sera', 'Quadro'),
(21, 11, 4, 'Fool in Trance', 'Quadro'),
(22, 11, 4, 'Centrifugal memory', 'Quadro'),
(24, 8, 5, 'Viandante sul mare di nebbia', 'Quadro'),
(25, 1, 5, 'L''albero dei corvi', 'Quadro'),
(26, 11, 6, 'Signora in giacca verde', 'Quadro'),
(27, 11, 6, 'Fashion window', 'Quadro'),
(28, 1, 7, 'Gioconda', 'Quadro'),
(29, 17, 7, '', 'Quadro'),
(30, 1, 7, 'Giovanni Battista', 'Quadro'),
(31, 1, 7, 'Vergine delle Rocce', 'Quadro'),
(32, 3, 8, 'Il tondo doni', 'Quadro'),
(33, 19, 8, 'David', 'Scultura'),
(34, 5, 8, 'La tentazione di Adamo ed Eva', 'Quadro'),
(35, 5, 8, 'La barca di Caronte', 'Quadro'),
(36, 5, 8, 'Il diluvio universale', 'Quadro'),
(37, 5, 8, 'Creazione di Adamo', 'Quadro'),
(38, 5, 8, 'Giudizio Universale', 'Quadro'),
(39, 5, 8, 'Sibilla Libica', 'Quadro'),
(40, 8, 9, 'Ballo al Moulin de la Galette ', 'Quadro'),
(41, 4, 9, 'Navigando la Senna ad Asnieres', 'Quadro'),
(42, 8, 9, 'Sentiero in salita nell''erba alta', 'Quadro'),
(43, 8, 9, 'Mademoiselle Julie Manet con gatto', 'Quadro'),
(44, 8, 9, 'La lettura', 'Quadro'),
(45, 8, 9, 'Ragazza che legge', 'Quadro'),
(46, 4, 9, 'Lakeside Landscape', 'Quadro'),
(47, 12, 10, 'Ragazza con l''orecchino di perla', 'Quadro'),
(48, 12, 10, 'Vista di Delft', 'Quadro'),
(49, 12, 10, 'Diana e le ninfe', 'Quadro'),
(50, 13, 11, 'Lavoratrici di merletti', 'Quadro'),
(51, 14, 11, 'La nipote scrive', 'Quadro'),
(52, 5, 12, 'La scuola di Atene', 'Quadro'),
(53, 1, 12, 'San Michele e il drago', 'Quadro'),
(54, 5, 12, 'La trasfigurazione di Cristo', 'Quadro'),
(55, 5, 12, 'Il trionfo di Galatea', 'Quadro'),
(56, 19, 12, 'La Donna Velata', 'Quadro'),
(57, 1, 12, 'San Giorgio e il drago', 'Quadro'),
(58, 19, 12, 'Visione di Ezechiele', 'Quadro'),
(59, 12, 13, 'Il sole', 'Quadro'),
(60, 12, 13, 'L''urlo', 'Quadro'),
(61, 12, 13, 'Donna con papavero', 'Quadro'),
(62, 12, 13, 'Il giardino in Åsgårdstrand', 'Quadro'),
(63, 12, 13, 'Notte stellata', 'Quadro'),
(64, 12, 13, 'Melancholie', 'Quadro'),
(65, 12, 13, 'Frühling', 'Quadro'),
(66, 5, 14, 'La nascita di Venere', 'Quadro'),
(67, 5, 14, 'Primavera', 'Quadro'),
(68, 5, 14, 'Calunnis', 'Quadro'),
(69, 5, 14, 'Illustrazione della Divina Commedia', 'Quadro'),
(70, 8, 15, 'Monte Sainte-Victoire', 'Quadro'),
(71, 8, 15, 'Natura morta con cesto di frutta', 'Quadro'),
(72, 20, 15, 'Natura morta con mele', 'Quadro'),
(73, 5, 16, 'Bacco', 'Quadro'),
(74, 5, 16, 'Conversione di San Paolo', 'Quadro'),
(75, 5, 16, 'Medusa', 'Quadro'),
(76, 4, 16, 'Cena in Emmaus', 'Quadro'),
(77, 2, 17, 'Elefanti', 'Quadro'),
(78, 2, 17, 'la persistenza della memoria', 'Quadro'),
(79, 7, 17, 'Tentazioni di sant''Antonio', 'Quadro'),
(80, 17, 18, 'Guernica', 'Quadro'),
(81, 2, 18, 'Les Demoiselles d''Avignon', 'Quadro'),
(82, 2, 18, 'Testa di donna', 'Quadro'),
(83, 16, 19, 'Forme che giocano', 'Quadro'),
(84, 16, 19, 'Cavallo nella natura', 'Quadro'),
(85, 16, 19, 'Lying bull', 'Quadro'),
(86, 2, 20, 'Due donne tahitiane', 'Quadro'),
(87, 16, 20, 'Girl with fan', 'Quadro'),
(88, 16, 20, 'Horseman on the Beach', 'Quadro'),
(89, 16, 20, 'Devoid of destitute of Contes,', 'Quadro'),
(90, 16, 20, 'Bretonische Tangsammlerinnen', 'Quadro'),
(91, 16, 21, 'Perseus', 'Quadro'),
(92, 16, 21, 'Quappi and Man from India', 'Quadro'),
(93, 16, 21, 'Perseus. Triptych. Rechte Tafe', 'Quadro'),
(94, 16, 21, 'Vampire', 'Quadro'),
(95, 16, 21, 'Adam and Eve', 'Quadro'),
(96, 16, 21, 'Großes Selbstbildnis', 'Quadro');

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `musei`
--
ALTER TABLE `musei`
  ADD CONSTRAINT `musei_ibfk_1` FOREIGN KEY (`CodCitta`) REFERENCES `citta` (`CodCitta`);

--
-- Limiti per la tabella `opere`
--
ALTER TABLE `opere`
  ADD CONSTRAINT `opere_ibfk_1` FOREIGN KEY (`CodMuseo`) REFERENCES `musei` (`CodMuseo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
