-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 04:28 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsupport`
--
CREATE DATABASE IF NOT EXISTS `dsupport` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dsupport`;

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `AttributeId` int(11) NOT NULL,
  `NameEn` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `IsPublished` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1 for published and 0 for unpublished',
  `CreatedOn` datetime DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`AttributeId`, `NameEn`, `IsPublished`, `CreatedOn`, `UpdatedOn`, `deleted_at`) VALUES
(1, 'Type ouder', '1', '2018-02-01 02:16:13', '2018-02-01 02:16:13', NULL),
(2, 'Toekenning PGB', '1', '2018-02-01 02:16:13', '2018-02-01 02:16:13', NULL),
(3, 'PGB wetten', '1', '2018-02-01 02:16:13', '2018-02-01 02:16:13', NULL),
(4, 'Transportmiddel', '1', '2018-02-01 02:16:13', '2018-02-01 02:16:13', NULL),
(5, 'D-Support gevonden via', '1', '2018-02-01 02:16:13', '2018-02-07 04:52:42', NULL),
(6, 'Diabetes therapie', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(7, 'Kenmerken instelling', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(8, 'Kenmerken personen', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(9, 'Browsertypes', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(10, 'Type operating system', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(11, 'Kwalificatieniveau', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(12, 'Fase scholing', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(13, 'Soort persoon', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(14, 'Fase contact oppasser', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(15, 'Fase contact gezin', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(16, 'Wijze aanmelding', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(17, 'Opleiding', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(18, 'Website wachtwoorden', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(19, 'Status koppeling gezin oppasser', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(20, 'Status projectaanvraag', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(21, 'Functie van personen bij instellingen', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(22, 'Ticket registration method', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(23, 'Ticket status', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(24, 'VOG status', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(25, 'Bijeenkomsten', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(26, 'Status gebruikers E-learning', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(27, 'Type gebruiker E-learning', '1', '2018-02-02 02:05:13', '2018-02-02 14:50:00', NULL),
(28, 'Kishan', '1', '2018-02-21 10:59:38', NULL, NULL),
(29, 'A Dsupport', '1', '2018-02-23 09:42:40', '2018-03-05 14:07:01', NULL),
(31, 'Dsupport', '1', '2018-03-06 09:34:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `geomunicipality`
--

CREATE TABLE `geomunicipality` (
  `GeoMunicipalityId` int(11) NOT NULL,
  `GeoProvinceId` int(11) NOT NULL,
  `NameEn` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `SortID` varchar(256) DEFAULT NULL,
  `IsPublished` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1 for published and 0 for unpublished',
  `CreatedOn` datetime DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geomunicipality`
--

INSERT INTO `geomunicipality` (`GeoMunicipalityId`, `GeoProvinceId`, `NameEn`, `SortID`, `IsPublished`, `CreatedOn`, `UpdatedOn`, `deleted_at`) VALUES
(1, 2, 'Aa en Hunze', NULL, '1', NULL, NULL, NULL),
(2, 3, 'Aalburg', NULL, '1', NULL, NULL, NULL),
(3, 4, 'Aalsmeer', NULL, '1', NULL, NULL, NULL),
(4, 5, 'Aalten', NULL, '1', NULL, NULL, NULL),
(5, 6, 'Achtkarspelen', NULL, '1', NULL, NULL, NULL),
(6, 7, 'Alblasserdam', NULL, '1', NULL, NULL, NULL),
(7, 7, 'Albrandswaard', NULL, '1', NULL, NULL, NULL),
(8, 4, 'Alkmaar', NULL, '1', NULL, NULL, NULL),
(9, 8, 'Almelo', NULL, '1', NULL, NULL, NULL),
(10, 9, 'Almere', NULL, '1', NULL, NULL, NULL),
(11, 7, 'Alphen aan den Rijn', NULL, '1', NULL, NULL, NULL),
(12, 3, 'Alphen-Chaam', NULL, '1', NULL, NULL, NULL),
(13, 6, 'Ameland', NULL, '1', NULL, NULL, NULL),
(14, 10, 'Amersfoort', NULL, '1', NULL, NULL, NULL),
(15, 4, 'Amstelveen', NULL, '1', NULL, NULL, NULL),
(16, 4, 'Amsterdam', NULL, '1', NULL, NULL, NULL),
(17, 5, 'Apeldoorn', NULL, '1', NULL, NULL, NULL),
(18, 11, 'Appingedam', NULL, '1', NULL, NULL, NULL),
(19, 5, 'Arnhem', NULL, '1', NULL, NULL, NULL),
(20, 2, 'Assen', NULL, '1', NULL, NULL, NULL),
(21, 3, 'Asten', NULL, '1', NULL, NULL, NULL),
(22, 3, 'Baarle-Nassau', NULL, '1', NULL, NULL, NULL),
(23, 10, 'Baarn', NULL, '1', NULL, NULL, NULL),
(24, 7, 'Barendrecht', NULL, '1', NULL, NULL, NULL),
(25, 5, 'Barneveld', NULL, '1', NULL, NULL, NULL),
(26, 11, 'Bedum', NULL, '1', NULL, NULL, NULL),
(27, 12, 'Beek', NULL, '1', NULL, NULL, NULL),
(28, 4, 'Beemster', NULL, '1', NULL, NULL, NULL),
(29, 12, 'Beesel', NULL, '1', NULL, NULL, NULL),
(30, 11, 'Bellingwedde', NULL, '1', NULL, NULL, NULL),
(31, 5, 'Berg en Dal', NULL, '1', NULL, NULL, NULL),
(32, 3, 'Bergeijk', NULL, '1', NULL, NULL, NULL),
(33, 4, 'Bergen', NULL, '1', NULL, NULL, NULL),
(34, 12, 'Bergen', NULL, '1', NULL, NULL, NULL),
(35, 3, 'Bergen op Zoom', NULL, '1', NULL, NULL, NULL),
(36, 5, 'Berkelland', NULL, '1', NULL, NULL, NULL),
(37, 3, 'Bernheze', NULL, '1', NULL, NULL, NULL),
(38, 3, 'Best', NULL, '1', NULL, NULL, NULL),
(39, 5, 'Beuningen', NULL, '1', NULL, NULL, NULL),
(40, 4, 'Beverwijk', NULL, '1', NULL, NULL, NULL),
(41, 7, 'Binnenmaas', NULL, '1', NULL, NULL, NULL),
(42, 3, 'Bladel', NULL, '1', NULL, NULL, NULL),
(43, 4, 'Blaricum', NULL, '1', NULL, NULL, NULL),
(44, 4, 'Bloemendaal', NULL, '1', NULL, NULL, NULL),
(45, 7, 'Bodegraven-Reeuwijk', NULL, '1', NULL, NULL, NULL),
(46, 3, 'Boekel', NULL, '1', NULL, NULL, NULL),
(47, 2, 'Borger-Odoorn', NULL, '1', NULL, NULL, NULL),
(48, 8, 'Borne', NULL, '1', NULL, NULL, NULL),
(49, 13, 'Borsele', NULL, '1', NULL, NULL, NULL),
(50, 3, 'Boxmeer', NULL, '1', NULL, NULL, NULL),
(51, 3, 'Boxtel', NULL, '1', NULL, NULL, NULL),
(52, 3, 'Breda', NULL, '1', NULL, NULL, NULL),
(53, 7, 'Brielle', NULL, '1', NULL, NULL, NULL),
(54, 5, 'Bronckhorst', NULL, '1', NULL, NULL, NULL),
(55, 5, 'Brummen', NULL, '1', NULL, NULL, NULL),
(56, 12, 'Brunssum', NULL, '1', NULL, NULL, NULL),
(57, 10, 'Bunnik', NULL, '1', NULL, NULL, NULL),
(58, 10, 'Bunschoten', NULL, '1', NULL, NULL, NULL),
(59, 5, 'Buren', NULL, '1', NULL, NULL, NULL),
(60, 7, 'Capelle aan den IJssel', NULL, '1', NULL, NULL, NULL),
(61, 4, 'Castricum', NULL, '1', NULL, NULL, NULL),
(62, 2, 'Coevorden', NULL, '1', NULL, NULL, NULL),
(63, 3, 'Cranendonck', NULL, '1', NULL, NULL, NULL),
(64, 7, 'Cromstrijen', NULL, '1', NULL, NULL, NULL),
(65, 3, 'Cuijk', NULL, '1', NULL, NULL, NULL),
(66, 5, 'Culemborg', NULL, '1', NULL, NULL, NULL),
(67, 8, 'Dalfsen', NULL, '1', NULL, NULL, NULL),
(68, 6, 'Dantumadiel', NULL, '1', NULL, NULL, NULL),
(69, 10, 'De Bilt', NULL, '1', NULL, NULL, NULL),
(70, 6, 'De Fryske Marren', NULL, '1', NULL, NULL, NULL),
(71, 11, 'De Marne', NULL, '1', NULL, NULL, NULL),
(72, 10, 'De Ronde Venen', NULL, '1', NULL, NULL, NULL),
(73, 2, 'De Wolden', NULL, '1', NULL, NULL, NULL),
(74, 7, 'Delft', NULL, '1', NULL, NULL, NULL),
(75, 11, 'Delfzijl', NULL, '1', NULL, NULL, NULL),
(76, 7, 'Den Haag', NULL, '1', NULL, NULL, NULL),
(77, 4, 'Den Helder', NULL, '1', NULL, NULL, NULL),
(78, 3, 'Deurne', NULL, '1', NULL, NULL, NULL),
(79, 8, 'Deventer', NULL, '1', NULL, NULL, NULL),
(80, 4, 'Diemen', NULL, '1', NULL, NULL, NULL),
(81, 8, 'Dinkelland', NULL, '1', NULL, NULL, NULL),
(82, 5, 'Doesburg', NULL, '1', NULL, NULL, NULL),
(83, 5, 'Doetinchem', NULL, '1', NULL, NULL, NULL),
(84, 3, 'Dongen', NULL, '1', NULL, NULL, NULL),
(85, 6, 'Dongeradeel', NULL, '1', NULL, NULL, NULL),
(86, 7, 'Dordrecht', NULL, '1', NULL, NULL, NULL),
(87, 4, 'Drechterland', NULL, '1', NULL, NULL, NULL),
(88, 3, 'Drimmelen', NULL, '1', NULL, NULL, NULL),
(89, 9, 'Dronten', NULL, '1', NULL, NULL, NULL),
(90, 5, 'Druten', NULL, '1', NULL, NULL, NULL),
(91, 5, 'Duiven', NULL, '1', NULL, NULL, NULL),
(92, 12, 'Echt-Susteren', NULL, '1', NULL, NULL, NULL),
(93, 4, 'Edam-Volendam', NULL, '1', NULL, NULL, NULL),
(94, 5, 'Ede', NULL, '1', NULL, NULL, NULL),
(95, 10, 'Eemnes', NULL, '1', NULL, NULL, NULL),
(96, 11, 'Eemsmond', NULL, '1', NULL, NULL, NULL),
(97, 3, 'Eersel', NULL, '1', NULL, NULL, NULL),
(98, 12, 'Eijsden-Margraten', NULL, '1', NULL, NULL, NULL),
(99, 3, 'Eindhoven', NULL, '1', NULL, NULL, NULL),
(100, 5, 'Elburg', NULL, '1', NULL, NULL, NULL),
(101, 2, 'Emmen', NULL, '1', NULL, NULL, NULL),
(102, 4, 'Enkhuizen', NULL, '1', NULL, NULL, NULL),
(103, 8, 'Enschede', NULL, '1', NULL, NULL, NULL),
(104, 5, 'Epe', NULL, '1', NULL, NULL, NULL),
(105, 5, 'Ermelo', NULL, '1', NULL, NULL, NULL),
(106, 3, 'Etten-Leur', NULL, '1', NULL, NULL, NULL),
(107, 6, 'Ferwerderadiel', NULL, '1', NULL, NULL, NULL),
(108, 6, 'Franekeradeel', NULL, '1', NULL, NULL, NULL),
(109, 3, 'Geertruidenberg', NULL, '1', NULL, NULL, NULL),
(110, 5, 'Geldermalsen', NULL, '1', NULL, NULL, NULL),
(111, 3, 'Geldrop-Mierlo', NULL, '1', NULL, NULL, NULL),
(112, 3, 'Gemert-Bakel', NULL, '1', NULL, NULL, NULL),
(113, 12, 'Gennep', NULL, '1', NULL, NULL, NULL),
(114, 7, 'Giessenlanden', NULL, '1', NULL, NULL, NULL),
(115, 3, 'Gilze en Rijen', NULL, '1', NULL, NULL, NULL),
(116, 7, 'Goeree-Overflakkee', NULL, '1', NULL, NULL, NULL),
(117, 13, 'Goes', NULL, '1', NULL, NULL, NULL),
(118, 3, 'Goirle', NULL, '1', NULL, NULL, NULL),
(119, 4, 'Gooise Meren', NULL, '1', NULL, NULL, NULL),
(120, 7, 'Gorinchem', NULL, '1', NULL, NULL, NULL),
(121, 7, 'Gouda', NULL, '1', NULL, NULL, NULL),
(122, 3, 'Grave', NULL, '1', NULL, NULL, NULL),
(123, 11, 'Groningen', NULL, '1', NULL, NULL, NULL),
(124, 11, 'Grootegast', NULL, '1', NULL, NULL, NULL),
(125, 12, 'Gulpen-Wittem', NULL, '1', NULL, NULL, NULL),
(126, 8, 'Haaksbergen', NULL, '1', NULL, NULL, NULL),
(127, 3, 'Haaren', NULL, '1', NULL, NULL, NULL),
(128, 4, 'Haarlem', NULL, '1', NULL, NULL, NULL),
(129, 4, 'Haarlemmerliede en Spaarnwoude', NULL, '1', NULL, NULL, NULL),
(130, 4, 'Haarlemmermeer', NULL, '1', NULL, NULL, NULL),
(131, 3, 'Halderberge', NULL, '1', NULL, NULL, NULL),
(132, 8, 'Hardenberg', NULL, '1', NULL, NULL, NULL),
(133, 5, 'Harderwijk', NULL, '1', NULL, NULL, NULL),
(134, 7, 'Hardinxveld-Giessendam', NULL, '1', NULL, NULL, NULL),
(135, 11, 'Haren', NULL, '1', NULL, NULL, NULL),
(136, 6, 'Harlingen', NULL, '1', NULL, NULL, NULL),
(137, 5, 'Hattem', NULL, '1', NULL, NULL, NULL),
(138, 4, 'Heemskerk', NULL, '1', NULL, NULL, NULL),
(139, 4, 'Heemstede', NULL, '1', NULL, NULL, NULL),
(140, 5, 'Heerde', NULL, '1', NULL, NULL, NULL),
(141, 6, 'Heerenveen', NULL, '1', NULL, NULL, NULL),
(142, 4, 'Heerhugowaard', NULL, '1', NULL, NULL, NULL),
(143, 12, 'Heerlen', NULL, '1', NULL, NULL, NULL),
(144, 3, 'Heeze-Leende', NULL, '1', NULL, NULL, NULL),
(145, 4, 'Heiloo', NULL, '1', NULL, NULL, NULL),
(146, 8, 'Hellendoorn', NULL, '1', NULL, NULL, NULL),
(147, 7, 'Hellevoetsluis', NULL, '1', NULL, NULL, NULL),
(148, 3, 'Helmond', NULL, '1', NULL, NULL, NULL),
(149, 7, 'Hendrik-Ido-Ambacht', NULL, '1', NULL, NULL, NULL),
(150, 8, 'Hengelo', NULL, '1', NULL, NULL, NULL),
(151, 6, 'het Bildt', NULL, '1', NULL, NULL, NULL),
(152, 5, 'Heumen', NULL, '1', NULL, NULL, NULL),
(153, 3, 'Heusden', NULL, '1', NULL, NULL, NULL),
(154, 7, 'Hillegom', NULL, '1', NULL, NULL, NULL),
(155, 3, 'Hilvarenbeek', NULL, '1', NULL, NULL, NULL),
(156, 4, 'Hilversum', NULL, '1', NULL, NULL, NULL),
(157, 8, 'Hof van Twente', NULL, '1', NULL, NULL, NULL),
(158, 4, 'Hollands Kroon', NULL, '1', NULL, NULL, NULL),
(159, 4, 'Hoofddorp', NULL, '1', NULL, NULL, NULL),
(160, 2, 'Hoogeveen', NULL, '1', NULL, NULL, NULL),
(161, 11, 'Hoogezand-Sappemeer', NULL, '1', NULL, NULL, NULL),
(162, 4, 'Hoorn', NULL, '1', NULL, NULL, NULL),
(163, 12, 'Horst aan de Maas', NULL, '1', NULL, NULL, NULL),
(164, 10, 'Houten', NULL, '1', NULL, NULL, NULL),
(165, 4, 'Huizen', NULL, '1', NULL, NULL, NULL),
(166, 13, 'Hulst', NULL, '1', NULL, NULL, NULL),
(167, 10, 'IJsselstein', NULL, '1', NULL, NULL, NULL),
(168, 7, 'Kaag en Braassem', NULL, '1', NULL, NULL, NULL),
(169, 8, 'Kampen', NULL, '1', NULL, NULL, NULL),
(170, 13, 'Kapelle', NULL, '1', NULL, NULL, NULL),
(171, 7, 'Katwijk', NULL, '1', NULL, NULL, NULL),
(172, 12, 'Kerkrade', NULL, '1', NULL, NULL, NULL),
(173, 4, 'Koggenland', NULL, '1', NULL, NULL, NULL),
(174, 6, 'Kollumerland en Nieuwkruisland', NULL, '1', NULL, NULL, NULL),
(175, 7, 'Korendijk', NULL, '1', NULL, NULL, NULL),
(176, 7, 'Krimpen aan den IJssel', NULL, '1', NULL, NULL, NULL),
(177, 7, 'Krimpenerwaard', NULL, '1', NULL, NULL, NULL),
(178, 3, 'Laarbeek', NULL, '1', NULL, NULL, NULL),
(179, 3, 'Landerd', NULL, '1', NULL, NULL, NULL),
(180, 12, 'Landgraaf', NULL, '1', NULL, NULL, NULL),
(181, 4, 'Landsmeer', NULL, '1', NULL, NULL, NULL),
(182, 4, 'Langedijk', NULL, '1', NULL, NULL, NULL),
(183, 7, 'Lansingerland', NULL, '1', NULL, NULL, NULL),
(184, 4, 'Laren', NULL, '1', NULL, NULL, NULL),
(185, 11, 'Leek', NULL, '1', NULL, NULL, NULL),
(186, 7, 'Leerdam', NULL, '1', NULL, NULL, NULL),
(187, 6, 'Leeuwarden', NULL, '1', NULL, NULL, NULL),
(188, 6, 'Leeuwarderadeel', NULL, '1', NULL, NULL, NULL),
(189, 7, 'Leiden', NULL, '1', NULL, NULL, NULL),
(190, 7, 'Leiderdorp', NULL, '1', NULL, NULL, NULL),
(191, 7, 'Leidschendam-Voorburg', NULL, '1', NULL, NULL, NULL),
(192, 9, 'Lelystad', NULL, '1', NULL, NULL, NULL),
(193, 12, 'Leudal', NULL, '1', NULL, NULL, NULL),
(194, 10, 'Leusden', NULL, '1', NULL, NULL, NULL),
(195, 5, 'Lingewaal', NULL, '1', NULL, NULL, NULL),
(196, 5, 'Lingewaard', NULL, '1', NULL, NULL, NULL),
(197, 7, 'Lisse', NULL, '1', NULL, NULL, NULL),
(198, 6, 'Littenseradiel', NULL, '1', NULL, NULL, NULL),
(199, 5, 'Lochem', NULL, '1', NULL, NULL, NULL),
(200, 3, 'Loon op Zand', NULL, '1', NULL, NULL, NULL),
(201, 10, 'Lopik', NULL, '1', NULL, NULL, NULL),
(202, 11, 'Loppersum', NULL, '1', NULL, NULL, NULL),
(203, 8, 'Losser', NULL, '1', NULL, NULL, NULL),
(204, 5, 'Maasdriel', NULL, '1', NULL, NULL, NULL),
(205, 12, 'Maasgouw', NULL, '1', NULL, NULL, NULL),
(206, 7, 'Maassluis', NULL, '1', NULL, NULL, NULL),
(207, 12, 'Maastricht', NULL, '1', NULL, NULL, NULL),
(208, 11, 'Marum', NULL, '1', NULL, NULL, NULL),
(209, 4, 'Medemblik', NULL, '1', NULL, NULL, NULL),
(210, 12, 'Meerssen', NULL, '1', NULL, NULL, NULL),
(211, 6, 'Menameradiel', NULL, '1', NULL, NULL, NULL),
(212, 11, 'Menterwolde', NULL, '1', NULL, NULL, NULL),
(213, 2, 'Meppel', NULL, '1', NULL, NULL, NULL),
(214, 13, 'Middelburg', NULL, '1', NULL, NULL, NULL),
(215, 7, 'Midden-Delfland', NULL, '1', NULL, NULL, NULL),
(216, 2, 'Midden-Drenthe', NULL, '1', NULL, NULL, NULL),
(217, 3, 'Mill en Sint Hubert', NULL, '1', NULL, NULL, NULL),
(218, 3, 'Moerdijk', NULL, '1', NULL, NULL, NULL),
(219, 7, 'Molenwaard', NULL, '1', NULL, NULL, NULL),
(220, 5, 'Montferland', NULL, '1', NULL, NULL, NULL),
(221, 10, 'Montfoort', NULL, '1', NULL, NULL, NULL),
(222, 12, 'Mook en Middelaar', NULL, '1', NULL, NULL, NULL),
(223, 5, 'Neder-Betuwe', NULL, '1', NULL, NULL, NULL),
(224, 12, 'Nederweert', NULL, '1', NULL, NULL, NULL),
(225, 5, 'Neerijnen', NULL, '1', NULL, NULL, NULL),
(226, 10, 'Nieuwegein', NULL, '1', NULL, NULL, NULL),
(227, 7, 'Nieuwkoop', NULL, '1', NULL, NULL, NULL),
(228, 5, 'Nijkerk', NULL, '1', NULL, NULL, NULL),
(229, 5, 'Nijmegen', NULL, '1', NULL, NULL, NULL),
(230, 7, 'Nissewaard', NULL, '1', NULL, NULL, NULL),
(231, 13, 'Noord-Beveland', NULL, '1', NULL, NULL, NULL),
(232, 2, 'Noordenveld', NULL, '1', NULL, NULL, NULL),
(233, 9, 'Noordoostpolder', NULL, '1', NULL, NULL, NULL),
(234, 7, 'Noordwijk', NULL, '1', NULL, NULL, NULL),
(235, 7, 'Noordwijkerhout', NULL, '1', NULL, NULL, NULL),
(236, 3, 'Nuenen, Gerwen en Nederwetten', NULL, '1', NULL, NULL, NULL),
(237, 5, 'Nunspeet', NULL, '1', NULL, NULL, NULL),
(238, 12, 'Nuth', NULL, '1', NULL, NULL, NULL),
(239, 7, 'Oegstgeest', NULL, '1', NULL, NULL, NULL),
(240, 3, 'Oirschot', NULL, '1', NULL, NULL, NULL),
(241, 3, 'Oisterwijk', NULL, '1', NULL, NULL, NULL),
(242, 11, 'Oldambt', NULL, '1', NULL, NULL, NULL),
(243, 5, 'Oldebroek', NULL, '1', NULL, NULL, NULL),
(244, 8, 'Oldenzaal', NULL, '1', NULL, NULL, NULL),
(245, 8, 'Olst-Wijhe', NULL, '1', NULL, NULL, NULL),
(246, 8, 'Ommen', NULL, '1', NULL, NULL, NULL),
(247, 1, 'Onbekend', NULL, '1', NULL, NULL, NULL),
(248, 12, 'Onderbanken', NULL, '1', NULL, NULL, NULL),
(249, 5, 'Oost Gelre', NULL, '1', NULL, NULL, NULL),
(250, 3, 'Oosterhout', NULL, '1', NULL, NULL, NULL),
(251, 6, 'Ooststellingwerf', NULL, '1', NULL, NULL, NULL),
(252, 4, 'Oostzaan', NULL, '1', NULL, NULL, NULL),
(253, 4, 'Opmeer', NULL, '1', NULL, NULL, NULL),
(254, 6, 'Opsterland', NULL, '1', NULL, NULL, NULL),
(255, 3, 'Oss', NULL, '1', NULL, NULL, NULL),
(256, 7, 'Oud-Beijerland', NULL, '1', NULL, NULL, NULL),
(257, 5, 'Oude IJsselstreek', NULL, '1', NULL, NULL, NULL),
(258, 4, 'Ouder-Amstel', NULL, '1', NULL, NULL, NULL),
(259, 10, 'Oudewater', NULL, '1', NULL, NULL, NULL),
(260, 5, 'Overbetuwe', NULL, '1', NULL, NULL, NULL),
(261, 7, 'Papendrecht', NULL, '1', NULL, NULL, NULL),
(262, 12, 'Peel en Maas', NULL, '1', NULL, NULL, NULL),
(263, 11, 'Pekela', NULL, '1', NULL, NULL, NULL),
(264, 7, 'Pijnacker-Nootdorp', NULL, '1', NULL, NULL, NULL),
(265, 4, 'Purmerend', NULL, '1', NULL, NULL, NULL),
(266, 5, 'Putten', NULL, '1', NULL, NULL, NULL),
(267, 8, 'Raalte', NULL, '1', NULL, NULL, NULL),
(268, 13, 'Reimerswaal', NULL, '1', NULL, NULL, NULL),
(269, 5, 'Renkum', NULL, '1', NULL, NULL, NULL),
(270, 10, 'Renswoude', NULL, '1', NULL, NULL, NULL),
(271, 3, 'Reusel-De Mierden', NULL, '1', NULL, NULL, NULL),
(272, 5, 'Rheden', NULL, '1', NULL, NULL, NULL),
(273, 10, 'Rhenen', NULL, '1', NULL, NULL, NULL),
(274, 7, 'Ridderkerk', NULL, '1', NULL, NULL, NULL),
(275, 5, 'Rijnwaarden', NULL, '1', NULL, NULL, NULL),
(276, 8, 'Rijssen-Holten', NULL, '1', NULL, NULL, NULL),
(277, 7, 'Rijswijk', NULL, '1', NULL, NULL, NULL),
(278, 12, 'Roerdalen', NULL, '1', NULL, NULL, NULL),
(279, 12, 'Roermond', NULL, '1', NULL, NULL, NULL),
(280, 3, 'Roosendaal', NULL, '1', NULL, NULL, NULL),
(281, 7, 'Rotterdam', NULL, '1', NULL, NULL, NULL),
(282, 5, 'Rozendaal', NULL, '1', NULL, NULL, NULL),
(283, 3, 'Rucphen', NULL, '1', NULL, NULL, NULL),
(284, 4, 'Schagen', NULL, '1', NULL, NULL, NULL),
(285, 5, 'Scherpenzeel', NULL, '1', NULL, NULL, NULL),
(286, 7, 'Schiedam', NULL, '1', NULL, NULL, NULL),
(287, 6, 'Schiermonnikoog', NULL, '1', NULL, NULL, NULL),
(288, 3, 'Schijndel', NULL, '1', NULL, NULL, NULL),
(289, 12, 'Schinnen', NULL, '1', NULL, NULL, NULL),
(290, 13, 'Schouwen-Duiveland', NULL, '1', NULL, NULL, NULL),
(291, 3, 's-Hertogenbosch', NULL, '1', NULL, NULL, NULL),
(292, 12, 'Simpelveld', NULL, '1', NULL, NULL, NULL),
(293, 3, 'Sint Anthonis', NULL, '1', NULL, NULL, NULL),
(294, 3, 'Sint-Michielsgestel', NULL, '1', NULL, NULL, NULL),
(295, 3, 'Sint-Oedenrode', NULL, '1', NULL, NULL, NULL),
(296, 12, 'Sittard-Geleen', NULL, '1', NULL, NULL, NULL),
(297, 7, 'Sliedrecht', NULL, '1', NULL, NULL, NULL),
(298, 11, 'Slochteren', NULL, '1', NULL, NULL, NULL),
(299, 13, 'Sluis', NULL, '1', NULL, NULL, NULL),
(300, 6, 'Smallingerland', NULL, '1', NULL, NULL, NULL),
(301, 10, 'Soest', NULL, '1', NULL, NULL, NULL),
(302, 3, 'Someren', NULL, '1', NULL, NULL, NULL),
(303, 3, 'Son en Breugel', NULL, '1', NULL, NULL, NULL),
(304, 11, 'Stadskanaal', NULL, '1', NULL, NULL, NULL),
(305, 8, 'Staphorst', NULL, '1', NULL, NULL, NULL),
(306, 4, 'Stede Broec', NULL, '1', NULL, NULL, NULL),
(307, 3, 'Steenbergen', NULL, '1', NULL, NULL, NULL),
(308, 8, 'Steenwijkerland', NULL, '1', NULL, NULL, NULL),
(309, 12, 'Stein', NULL, '1', NULL, NULL, NULL),
(310, 10, 'Stichtse Vecht', NULL, '1', NULL, NULL, NULL),
(311, 7, 'Strijen', NULL, '1', NULL, NULL, NULL),
(312, 6, 'Súdwest-Fryslân', NULL, '1', NULL, NULL, NULL),
(313, 11, 'Ten Boer', NULL, '1', NULL, NULL, NULL),
(314, 13, 'Terneuzen', NULL, '1', NULL, NULL, NULL),
(315, 6, 'Terschelling', NULL, '1', NULL, NULL, NULL),
(316, 4, 'Texel', NULL, '1', NULL, NULL, NULL),
(317, 7, 'Teylingen', NULL, '1', NULL, NULL, NULL),
(318, 13, 'Tholen', NULL, '1', NULL, NULL, NULL),
(319, 5, 'Tiel', NULL, '1', NULL, NULL, NULL),
(320, 3, 'Tilburg', NULL, '1', NULL, NULL, NULL),
(321, 8, 'Tubbergen', NULL, '1', NULL, NULL, NULL),
(322, 8, 'Twenterand', NULL, '1', NULL, NULL, NULL),
(323, 2, 'Tynaarlo', NULL, '1', NULL, NULL, NULL),
(324, 6, 'Tytsjerksteradiel', NULL, '1', NULL, NULL, NULL),
(325, 3, 'Uden', NULL, '1', NULL, NULL, NULL),
(326, 4, 'Uitgeest', NULL, '1', NULL, NULL, NULL),
(327, 4, 'Uithoorn', NULL, '1', NULL, NULL, NULL),
(328, 9, 'Urk', NULL, '1', NULL, NULL, NULL),
(329, 10, 'Utrecht', NULL, '1', NULL, NULL, NULL),
(330, 10, 'Utrechtse Heuvelrug', NULL, '1', NULL, NULL, NULL),
(331, 12, 'Vaals', NULL, '1', NULL, NULL, NULL),
(332, 12, 'Valkenburg aan de Geul', NULL, '1', NULL, NULL, NULL),
(333, 3, 'Valkenswaard', NULL, '1', NULL, NULL, NULL),
(334, 11, 'Veendam', NULL, '1', NULL, NULL, NULL),
(335, 10, 'Veenendaal', NULL, '1', NULL, NULL, NULL),
(336, 13, 'Veere', NULL, '1', NULL, NULL, NULL),
(337, 3, 'Veghel', NULL, '1', NULL, NULL, NULL),
(338, 3, 'Veldhoven', NULL, '1', NULL, NULL, NULL),
(339, 4, 'Velsen', NULL, '1', NULL, NULL, NULL),
(340, 12, 'Venlo', NULL, '1', NULL, NULL, NULL),
(341, 12, 'Venray', NULL, '1', NULL, NULL, NULL),
(342, 10, 'Vianen', NULL, '1', NULL, NULL, NULL),
(343, 7, 'Vlaardingen', NULL, '1', NULL, NULL, NULL),
(344, 11, 'Vlagtwedde', NULL, '1', NULL, NULL, NULL),
(345, 6, 'Vlieland', NULL, '1', NULL, NULL, NULL),
(346, 13, 'Vlissingen', NULL, '1', NULL, NULL, NULL),
(347, 12, 'Voerendaal', NULL, '1', NULL, NULL, NULL),
(348, 7, 'Voorschoten', NULL, '1', NULL, NULL, NULL),
(349, 5, 'Voorst', NULL, '1', NULL, NULL, NULL),
(350, 3, 'Vught', NULL, '1', NULL, NULL, NULL),
(351, 3, 'Waalre', NULL, '1', NULL, NULL, NULL),
(352, 3, 'Waalwijk', NULL, '1', NULL, NULL, NULL),
(353, 7, 'Waddinxveen', NULL, '1', NULL, NULL, NULL),
(354, 5, 'Wageningen', NULL, '1', NULL, NULL, NULL),
(355, 7, 'Wassenaar', NULL, '1', NULL, NULL, NULL),
(356, 4, 'Waterland', NULL, '1', NULL, NULL, NULL),
(357, 12, 'Weert', NULL, '1', NULL, NULL, NULL),
(358, 4, 'Weesp', NULL, '1', NULL, NULL, NULL),
(359, 3, 'Werkendam', NULL, '1', NULL, NULL, NULL),
(360, 5, 'West Maas en Waal', NULL, '1', NULL, NULL, NULL),
(361, 2, 'Westerveld', NULL, '1', NULL, NULL, NULL),
(362, 5, 'Westervoort', NULL, '1', NULL, NULL, NULL),
(363, 7, 'Westland', NULL, '1', NULL, NULL, NULL),
(364, 6, 'Weststellingwerf', NULL, '1', NULL, NULL, NULL),
(365, 7, 'Westvoorne', NULL, '1', NULL, NULL, NULL),
(366, 8, 'Wierden', NULL, '1', NULL, NULL, NULL),
(367, 5, 'Wijchen', NULL, '1', NULL, NULL, NULL),
(368, 4, 'Wijdemeren', NULL, '1', NULL, NULL, NULL),
(369, 10, 'Wijk bij Duurstede', NULL, '1', NULL, NULL, NULL),
(370, 11, 'Winsum', NULL, '1', NULL, NULL, NULL),
(371, 5, 'Winterswijk', NULL, '1', NULL, NULL, NULL),
(372, 3, 'Woensdrecht', NULL, '1', NULL, NULL, NULL),
(373, 10, 'Woerden', NULL, '1', NULL, NULL, NULL),
(374, 4, 'Wormerland', NULL, '1', NULL, NULL, NULL),
(375, 10, 'Woudenberg', NULL, '1', NULL, NULL, NULL),
(376, 3, 'Woudrichem', NULL, '1', NULL, NULL, NULL),
(377, 4, 'Zaanstad', NULL, '1', NULL, NULL, NULL),
(378, 5, 'Zaltbommel', NULL, '1', NULL, NULL, NULL),
(379, 4, 'Zandvoort', NULL, '1', NULL, NULL, NULL),
(380, 7, 'Zederik', NULL, '1', NULL, NULL, NULL),
(381, 9, 'Zeewolde', NULL, '1', NULL, NULL, NULL),
(382, 10, 'Zeist', NULL, '1', NULL, NULL, NULL),
(383, 5, 'Zevenaar', NULL, '1', NULL, NULL, NULL),
(384, 7, 'Zoetermeer', NULL, '1', NULL, NULL, NULL),
(385, 7, 'Zoeterwoude', NULL, '1', NULL, NULL, NULL),
(386, 11, 'Zuidhorn', NULL, '1', NULL, NULL, NULL),
(387, 7, 'Zuidplas', NULL, '1', NULL, NULL, NULL),
(388, 3, 'Zundert', NULL, '1', NULL, NULL, NULL),
(389, 5, 'Zutphen', NULL, '1', NULL, NULL, NULL),
(390, 8, 'Zwartewaterland', NULL, '1', NULL, NULL, NULL),
(391, 7, 'Zwijndrecht', NULL, '1', NULL, NULL, NULL),
(392, 8, 'Zwolle', NULL, '1', NULL, NULL, NULL),
(393, 14, 'Ahmedabad', '1', '1', '2018-02-27 13:42:21', '2018-02-27 13:55:23', NULL),
(394, 14, 'Surat', '2', '1', '2018-02-27 14:00:29', NULL, NULL),
(395, 14, 'Baroda', '3', '1', '2018-02-27 14:00:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `geoplace`
--

CREATE TABLE `geoplace` (
  `GeoPlaceId` int(11) NOT NULL,
  `GeoMunicipalityId` int(11) NOT NULL,
  `NameEn` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `SortID` varchar(256) DEFAULT NULL,
  `IsPublished` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1 for published and 0 for unpublished',
  `CreatedOn` datetime DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geoplace`
--

INSERT INTO `geoplace` (`GeoPlaceId`, `GeoMunicipalityId`, `NameEn`, `SortID`, `IsPublished`, `CreatedOn`, `UpdatedOn`, `deleted_at`) VALUES
(1, 391, 'Nieuw Bergen (L)', NULL, '1', NULL, NULL, NULL),
(2, 391, 'Nieuwe Niedorp', NULL, '1', NULL, NULL, NULL),
(3, 391, 'Nijverdal', NULL, '1', NULL, NULL, NULL),
(4, 240, 'Oisterwijk', NULL, '1', NULL, NULL, NULL),
(5, 391, 'Poeldijk', NULL, '1', NULL, NULL, NULL),
(6, 263, 'Purmerend', NULL, '1', NULL, NULL, NULL),
(7, 391, 'Reuver', NULL, '1', NULL, NULL, NULL),
(8, 391, 'Riel', NULL, '1', NULL, NULL, NULL),
(9, 279, 'Rotterdam', NULL, '1', NULL, NULL, NULL),
(10, 391, 'Sittard', NULL, '1', NULL, NULL, NULL),
(11, 318, 'Tilburg', NULL, '1', NULL, NULL, NULL),
(12, 391, 'Teeffelen', NULL, '1', NULL, NULL, NULL),
(13, 333, 'Veenendaal', NULL, '1', NULL, NULL, NULL),
(14, 391, 'Veltem', NULL, '1', NULL, NULL, NULL),
(15, 338, 'Venlo', NULL, '1', NULL, NULL, NULL),
(16, 391, 'Voorburg', NULL, '1', NULL, NULL, NULL),
(17, 391, 'Waarder (ZH)', NULL, '1', NULL, NULL, NULL),
(18, 353, 'Wassenaar', NULL, '1', NULL, NULL, NULL),
(19, 365, 'Wijchen', NULL, '1', NULL, NULL, NULL),
(20, 367, 'Wijk bij Duurstede', NULL, '1', NULL, NULL, NULL),
(21, 391, 'Wilp', NULL, '1', NULL, NULL, NULL),
(22, 391, 'Zuid Scharnwoude', NULL, '1', NULL, NULL, NULL),
(23, 390, 'Zwolle', NULL, '1', NULL, NULL, NULL),
(24, 90, 'Druten', NULL, '1', NULL, NULL, NULL),
(25, 94, 'Ede', NULL, '1', NULL, NULL, NULL),
(26, 391, 'Kuinre', NULL, '1', NULL, NULL, NULL),
(27, 206, 'Maastricht', NULL, '1', NULL, NULL, NULL),
(28, 391, 'Dinxperlo', NULL, '1', NULL, NULL, NULL),
(29, 391, 'Loosdrecht', NULL, '1', NULL, NULL, NULL),
(30, 118, 'Goirle', NULL, '1', NULL, NULL, NULL),
(31, 391, 'Esbeek', NULL, '1', NULL, NULL, NULL),
(32, 243, 'Oldenzaal', NULL, '1', NULL, NULL, NULL),
(33, 121, 'Gouda', NULL, '1', NULL, NULL, NULL),
(34, 238, 'Wezep', NULL, '1', NULL, NULL, NULL),
(35, 391, 'Maren', NULL, '1', NULL, NULL, NULL),
(36, 84, 'Dongen', NULL, '1', NULL, NULL, NULL),
(37, 350, 'Waalwijk', NULL, '1', NULL, NULL, NULL),
(38, 373, 'Woudenberg', NULL, '1', NULL, NULL, NULL),
(39, 227, 'Nijkerk', NULL, '1', NULL, NULL, NULL),
(40, 391, 'Velserbroek', NULL, '1', NULL, NULL, NULL),
(41, 391, 'Jistrum', NULL, '1', NULL, NULL, NULL),
(42, 52, 'Breda', NULL, '1', NULL, NULL, NULL),
(43, 391, 'Bussum', NULL, '1', NULL, NULL, NULL),
(44, 380, 'Zeist', NULL, '1', NULL, NULL, NULL),
(45, 150, 'Hengelo', NULL, '1', NULL, NULL, NULL),
(46, 391, 'Berghem', NULL, '1', NULL, NULL, NULL),
(47, 391, 'Oude Pekela', NULL, '1', NULL, NULL, NULL),
(48, 391, 'Ursem', NULL, '1', NULL, NULL, NULL),
(49, 391, 't Harde', NULL, '1', NULL, NULL, NULL),
(50, 391, 'Harkema', NULL, '1', NULL, NULL, NULL),
(51, 391, 'Onbekend', NULL, '1', NULL, NULL, NULL),
(52, 76, 'Den Haag', NULL, '1', NULL, NULL, NULL),
(53, 228, 'Nijmegen', NULL, '1', NULL, NULL, NULL),
(54, 327, 'Utrecht', NULL, '1', NULL, NULL, NULL),
(55, 341, 'Vlaardingen', NULL, '1', NULL, NULL, NULL),
(56, 16, 'Amsterdam', NULL, '1', NULL, NULL, NULL),
(57, 225, 'Nieuwegein', NULL, '1', NULL, NULL, NULL),
(58, 76, 'Wateringen', NULL, '1', NULL, NULL, NULL),
(59, 253, 'Oss', NULL, '1', NULL, NULL, NULL),
(60, 127, 'Haarlem', NULL, '1', NULL, NULL, NULL),
(61, 391, 's Graveland', NULL, '1', NULL, NULL, NULL),
(62, 10, 'Almere', NULL, '1', NULL, NULL, NULL),
(63, 11, 'Alphen aan den Rijn', NULL, '1', NULL, NULL, NULL),
(64, 14, 'Amersfoort', NULL, '1', NULL, NULL, NULL),
(65, 15, 'Amstelveen', NULL, '1', NULL, NULL, NULL),
(66, 17, 'Apeldoorn', NULL, '1', NULL, NULL, NULL),
(67, 391, 'Badhoevedorp', NULL, '1', NULL, NULL, NULL),
(68, 25, 'Barneveld', NULL, '1', NULL, NULL, NULL),
(69, 391, 'Bennekom', NULL, '1', NULL, NULL, NULL),
(70, 391, 'Bergen (NH)', NULL, '1', NULL, NULL, NULL),
(71, 391, 'Berkel en Rodenrijs', NULL, '1', NULL, NULL, NULL),
(72, 391, 'Bilthoven', NULL, '1', NULL, NULL, NULL),
(73, 43, 'Blaricum', NULL, '1', NULL, NULL, NULL),
(74, 391, 'De Meern', NULL, '1', NULL, NULL, NULL),
(75, 391, 'Den Bosch', NULL, '1', NULL, NULL, NULL),
(76, 79, 'Deventer', NULL, '1', NULL, NULL, NULL),
(77, 86, 'Dordrecht', NULL, '1', NULL, NULL, NULL),
(78, 391, 'Driebergen', NULL, '1', NULL, NULL, NULL),
(79, 391, 'Egmond aan den Hoef', NULL, '1', NULL, NULL, NULL),
(80, 391, 'Eibergen', NULL, '1', NULL, NULL, NULL),
(81, 391, 'Elst', NULL, '1', NULL, NULL, NULL),
(82, 391, 'Franeker', NULL, '1', NULL, NULL, NULL),
(83, 110, 'Geldermalsen', NULL, '1', NULL, NULL, NULL),
(84, 113, 'Gennep', NULL, '1', NULL, NULL, NULL),
(85, 391, 'Gorredijk', NULL, '1', NULL, NULL, NULL),
(86, 391, 'Graven', NULL, '1', NULL, NULL, NULL),
(87, 123, 'Groningen', NULL, '1', NULL, NULL, NULL),
(88, 391, 'Grootebroek (NH)', NULL, '1', NULL, NULL, NULL),
(89, 137, 'Hattem', NULL, '1', NULL, NULL, NULL),
(90, 148, 'Helmond', NULL, '1', NULL, NULL, NULL),
(91, 156, 'Hilversum', NULL, '1', NULL, NULL, NULL),
(92, 391, 'Honselerdijk', NULL, '1', NULL, NULL, NULL),
(93, 391, 'Horssen(NBR)', NULL, '1', NULL, NULL, NULL),
(94, 164, 'Huizen', NULL, '1', NULL, NULL, NULL),
(95, 170, 'Katwijk', NULL, '1', NULL, NULL, NULL),
(96, 185, 'Leerdam', NULL, '1', NULL, NULL, NULL),
(97, 186, 'Leeuwarden', NULL, '1', NULL, NULL, NULL),
(98, 188, 'Leiden', NULL, '1', NULL, NULL, NULL),
(99, 391, 'Leidschendam', NULL, '1', NULL, NULL, NULL),
(100, 391, 'Malden', NULL, '1', NULL, NULL, NULL),
(101, 391, 'Monster', NULL, '1', NULL, NULL, NULL),
(102, 101, 'Emmen', NULL, '1', NULL, NULL, NULL),
(103, 391, 'Bleiswijk', NULL, '1', NULL, NULL, NULL),
(104, 391, 'Beetsterzwaag', NULL, '1', NULL, NULL, NULL),
(105, 19, 'Arnhem', NULL, '1', NULL, NULL, NULL),
(106, 391, 'Wolvega', NULL, '1', NULL, NULL, NULL),
(107, 264, 'Putten', NULL, '1', NULL, NULL, NULL),
(108, 139, 'Heemstede', NULL, '1', NULL, NULL, NULL),
(109, 133, 'Harderwijk', NULL, '1', NULL, NULL, NULL),
(110, 74, 'Delft', NULL, '1', NULL, NULL, NULL),
(111, 382, 'Zoetermeer', NULL, '1', NULL, NULL, NULL),
(112, 391, 'Driebruggen', NULL, '1', NULL, NULL, NULL),
(113, 391, 'Naarden', NULL, '1', NULL, NULL, NULL),
(114, 392, 'Hoofddorp', NULL, '1', NULL, NULL, NULL),
(115, 56, 'Brunssum', NULL, '1', NULL, NULL, NULL),
(116, 238, 'Oegstgeest', NULL, '1', NULL, NULL, NULL),
(117, 391, 'Waarland', NULL, '1', NULL, NULL, NULL),
(118, 391, 'Naaldwijk', NULL, '1', NULL, NULL, NULL),
(119, 275, 'Rijswijk', NULL, '1', NULL, NULL, NULL),
(120, 391, 'Maarssen', NULL, '1', NULL, NULL, NULL),
(121, 391, 'Huisseling', NULL, '1', NULL, NULL, NULL),
(122, 391, 'Sint Annaland', NULL, '1', NULL, NULL, NULL),
(123, 391, 'Vriezenveen', NULL, '1', NULL, NULL, NULL),
(124, 391, 'Annen', NULL, '1', NULL, NULL, NULL),
(125, 391, 'Beekbergen', NULL, '1', NULL, NULL, NULL),
(126, 391, 'Nieuweroord', NULL, '1', NULL, NULL, NULL),
(127, 391, 'Rijnsburg', NULL, '1', NULL, NULL, NULL),
(128, 393, 'Bapunagar', NULL, '1', '2018-02-28 13:41:33', '2018-02-28 13:51:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `geoprovince`
--

CREATE TABLE `geoprovince` (
  `GeoProvinceId` int(11) NOT NULL,
  `NameEn` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `SortID` varchar(256) DEFAULT NULL,
  `IsPublished` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1 for published and 0 for unpublished',
  `CreatedOn` datetime DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geoprovince`
--

INSERT INTO `geoprovince` (`GeoProvinceId`, `NameEn`, `SortID`, `IsPublished`, `CreatedOn`, `UpdatedOn`, `deleted_at`) VALUES
(1, 'Onbekend', '99', '1', NULL, NULL, NULL),
(2, 'Drenthe', '1', '1', NULL, NULL, NULL),
(3, 'Noord-Brabant', '2', '1', NULL, NULL, NULL),
(4, 'Noord-Holland', '3', '1', NULL, NULL, NULL),
(5, 'Gelderland', '4', '1', NULL, NULL, NULL),
(6, 'Fryslan', '5', '1', NULL, NULL, NULL),
(7, 'Zuid-Holland', '6', '1', NULL, NULL, NULL),
(8, 'Overijssel', '7', '1', NULL, NULL, NULL),
(9, 'Flevoland', '8', '1', NULL, NULL, NULL),
(10, 'Utrecht', '9', '1', NULL, NULL, NULL),
(11, 'Groningen', '10', '1', NULL, NULL, NULL),
(12, 'Limburg', '11', '1', NULL, NULL, NULL),
(13, 'Zeeland', '12', '1', NULL, NULL, NULL),
(14, 'A Gujarat', '100', '1', '2018-02-27 12:14:07', '2018-02-27 13:31:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `LogID` int(11) NOT NULL,
  `TableID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `LogDetail` text NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`LogID`, `TableID`, `ID`, `UserID`, `LogDetail`, `CreatedOn`, `deleted_at`) VALUES
(1, 1, 28, 1, '[Kishan] Record added successfully.', '2018-02-21 10:59:38', NULL),
(5, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-02-22 13:07:54] : [127.0.0.1]', '2018-02-22 13:07:54', NULL),
(4, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-22 12:47:53] : [127.0.0.1]', '2018-02-22 12:47:53', NULL),
(6, 3, 0, 0, 'Failed Attempt : [admin@example.com] : [2018-02-22 13:08:11] : [127.0.0.1]', '2018-02-22 13:08:11', NULL),
(7, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-22 13:08:25] : [127.0.0.1]', '2018-02-22 13:08:25', NULL),
(8, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-02-22 13:18:54] : [127.0.0.1]', '2018-02-22 13:18:54', NULL),
(9, 3, 0, 0, 'Account Locked : [admin@d-support.com] : [2018-02-22 13:19:28] : [127.0.0.1]', '2018-02-22 13:19:28', NULL),
(10, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-22 13:21:31] : [127.0.0.1]', '2018-02-22 13:21:31', NULL),
(11, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-02-22 13:21:49] : [127.0.0.1]', '2018-02-22 13:21:49', NULL),
(14, 3, 0, 0, 'Failed Attempt 1 : [admin@d-support.com] : [2018-02-22 13:25:12] : [127.0.0.1]', '2018-02-22 13:25:12', NULL),
(15, 3, 0, 0, 'Failed Attempt 2 : [admin@d-support.com] : [2018-02-22 13:25:20] : [127.0.0.1]', '2018-02-22 13:25:20', NULL),
(16, 3, 0, 0, 'Failed Attempt 3 : [admin@d-support.com] : [2018-02-22 13:25:29] : [127.0.0.1]', '2018-02-22 13:25:29', NULL),
(17, 3, 0, 0, 'Account Locked : [admin@d-support.com] : [2018-02-22 13:25:40] : [127.0.0.1]', '2018-02-22 13:25:40', NULL),
(18, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-22 13:26:57] : [127.0.0.1]', '2018-02-22 13:26:57', NULL),
(19, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-02-23 06:44:23] : [127.0.0.1]', '2018-02-23 06:44:23', NULL),
(20, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-23 06:48:40] : [127.0.0.1]', '2018-02-23 06:48:40', NULL),
(21, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-02-23 06:48:43] : [127.0.0.1]', '2018-02-23 06:48:43', NULL),
(22, 3, 0, 0, 'Failed Attempt 1 : [admin@d-support.com] : [2018-02-23 06:49:40] : [127.0.0.1]', '2018-02-23 06:49:40', NULL),
(23, 3, 0, 0, 'Failed Attempt 2 : [admin@d-support.com] : [2018-02-23 06:49:46] : [127.0.0.1]', '2018-02-23 06:49:46', NULL),
(24, 3, 0, 0, 'Failed Attempt 3 : [admin@d-support.com] : [2018-02-23 06:49:50] : [127.0.0.1]', '2018-02-23 06:49:50', NULL),
(25, 3, 0, 0, 'Account Locked : [admin@d-support.com] : [2018-02-23 06:49:54] : [127.0.0.1]', '2018-02-23 06:49:54', NULL),
(26, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-23 06:50:18] : [127.0.0.1]', '2018-02-23 06:50:18', NULL),
(27, 1, 29, 1, '[Dsupport] Record added successfully.', '2018-02-23 09:42:40', NULL),
(28, 2, 140, 1, '[Dsupport sub] Record updated successfully.', '2018-02-23 09:53:26', NULL),
(29, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-02-23 11:38:58] : [127.0.0.1]', '2018-02-23 11:38:58', NULL),
(30, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-23 11:45:52] : [127.0.0.1]', '2018-02-23 11:45:52', NULL),
(31, 1, 30, 1, '[A] Record added successfully.', '2018-02-23 12:59:58', NULL),
(32, 1, 30, 1, '[A] Record deleted successfully.', '2018-02-23 13:07:15', NULL),
(33, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-26 04:11:12] : [127.0.0.1]', '2018-02-26 04:11:12', NULL),
(34, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-02-26 04:46:27] : [127.0.0.1]', '2018-02-26 04:46:27', NULL),
(35, 3, 0, 0, 'Failed Attempt 1 : [admin@d-support.com] : [2018-02-26 07:46:49] : [127.0.0.1]', '2018-02-26 07:46:49', NULL),
(36, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-26 07:46:54] : [127.0.0.1]', '2018-02-26 07:46:54', NULL),
(37, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-02-26 07:54:54] : [127.0.0.1]', '2018-02-26 07:54:54', NULL),
(38, 3, 0, 0, 'Failed Attempt 1 : [admin@d-support.com] : [2018-02-26 12:35:54] : [127.0.0.1]', '2018-02-26 12:35:54', NULL),
(39, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-26 12:35:58] : [127.0.0.1]', '2018-02-26 12:35:58', NULL),
(40, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-02-26 12:37:02] : [127.0.0.1]', '2018-02-26 12:37:02', NULL),
(41, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-26 12:48:35] : [127.0.0.1]', '2018-02-26 12:48:35', NULL),
(42, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-02-26 13:18:27] : [127.0.0.1]', '2018-02-26 13:18:27', NULL),
(43, 3, 0, 0, 'Failed Attempt 1 : [admin@d-support.com] : [2018-02-26 13:22:46] : [127.0.0.1]', '2018-02-26 13:22:46', NULL),
(44, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-26 13:22:50] : [127.0.0.1]', '2018-02-26 13:22:50', NULL),
(45, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-02-26 13:23:18] : [127.0.0.1]', '2018-02-26 13:23:18', NULL),
(46, 3, 0, 0, 'Failed Attempt : [admin@example.com] : [2018-02-27 04:59:15] : [127.0.0.1]', '2018-02-27 04:59:15', NULL),
(47, 3, 0, 0, 'Failed Attempt 1 : [admin@d-support.com] : [2018-02-27 04:59:44] : [127.0.0.1]', '2018-02-27 04:59:44', NULL),
(48, 3, 0, 0, 'Failed Attempt 2 : [admin@d-support.com] : [2018-02-27 04:59:54] : [127.0.0.1]', '2018-02-27 04:59:54', NULL),
(49, 3, 0, 0, 'Failed Attempt 3 : [admin@d-support.com] : [2018-02-27 04:59:59] : [127.0.0.1]', '2018-02-27 04:59:59', NULL),
(50, 3, 0, 0, 'Account Locked : [admin@d-support.com] : [2018-02-27 05:00:08] : [127.0.0.1]', '2018-02-27 05:00:08', NULL),
(51, 3, 0, 0, 'Failed Attempt 1 : [admin@d-support.com] : [2018-02-27 05:01:41] : [127.0.0.1]', '2018-02-27 05:01:41', NULL),
(52, 3, 0, 0, 'Failed Attempt 2 : [admin@d-support.com] : [2018-02-27 05:01:46] : [127.0.0.1]', '2018-02-27 05:01:46', NULL),
(53, 3, 0, 0, 'Failed Attempt 3 : [admin@d-support.com] : [2018-02-27 05:01:53] : [127.0.0.1]', '2018-02-27 05:01:53', NULL),
(54, 3, 0, 0, 'Account Locked : [admin@d-support.com] : [2018-02-27 05:01:57] : [127.0.0.1]', '2018-02-27 05:01:57', NULL),
(55, 3, 0, 0, 'Account Locked : [admin@d-support.com] : [2018-02-27 05:04:33] : [127.0.0.1]', '2018-02-27 05:04:33', NULL),
(56, 3, 0, 0, 'Account Locked : [admin@d-support.com] : [2018-02-27 05:05:13] : [127.0.0.1]', '2018-02-27 05:05:13', NULL),
(57, 3, 0, 0, 'Account Locked : [admin@d-support.com] : [2018-02-27 05:18:01] : [127.0.0.1]', '2018-02-27 05:18:01', NULL),
(58, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-27 05:25:29] : [127.0.0.1]', '2018-02-27 05:25:29', NULL),
(59, 1, 29, 1, '[Dsupport] Record deleted successfully.', '2018-02-27 07:45:03', NULL),
(60, 2, 140, 1, '[Dsupport sub] Record deleted successfully.', '2018-02-27 07:53:45', NULL),
(61, 2, 140, 1, '[Dsupport sub] Record deleted successfully.', '2018-02-27 07:55:24', NULL),
(62, 4, 14, 1, '[Gujarat] Record added successfully.', '2018-02-27 12:05:08', NULL),
(63, 4, 14, 1, '[A Gujarat] Record updated successfully.', '2018-02-27 12:13:05', NULL),
(64, 4, 14, 1, '[Gujarat] Record added successfully.', '2018-02-27 12:14:07', NULL),
(65, 4, 14, 1, '[A Gujarat] Record updated successfully.', '2018-02-27 12:14:18', NULL),
(66, 2, 141, 1, '[test subattribute] Record added successfully.', '2018-02-27 13:19:08', NULL),
(67, 4, 14, 1, '[Gujarat] Record updated successfully.', '2018-02-27 13:30:56', NULL),
(68, 4, 14, 1, '[A Gujarat] Record updated successfully.', '2018-02-27 13:31:05', NULL),
(69, 5, 393, 1, '[Ahmedabad] Record added successfully.', '2018-02-27 13:42:21', NULL),
(70, 5, 393, 1, '[Ahmedabad test] Record updated successfully.', '2018-02-27 13:55:12', NULL),
(71, 5, 393, 1, '[Ahmedabad] Record updated successfully.', '2018-02-27 13:55:23', NULL),
(72, 5, 394, 1, '[Surat] Record added successfully.', '2018-02-27 14:00:29', NULL),
(73, 5, 395, 1, '[Baroda] Record added successfully.', '2018-02-27 14:00:35', NULL),
(74, 5, 394, 1, '[Surat] Record deleted successfully.', '2018-02-28 05:12:39', NULL),
(75, 5, 395, 1, '[Baroda] Record deleted successfully.', '2018-02-28 05:14:21', NULL),
(76, 5, 393, 1, '[Ahmedabad] Record deleted successfully.', '2018-02-28 05:14:27', NULL),
(77, 4, 14, 1, '[A Gujarat] Record deleted successfully.', '2018-02-28 05:14:32', NULL),
(78, 4, 14, 1, '[A Gujarat] Record deleted successfully.', '2018-02-28 05:15:04', NULL),
(79, 5, 393, 1, '[Ahmedabad] Record deleted successfully.', '2018-02-28 05:16:39', NULL),
(80, 5, 395, 1, '[Baroda] Record deleted successfully.', '2018-02-28 05:16:41', NULL),
(81, 5, 394, 1, '[Surat] Record deleted successfully.', '2018-02-28 05:16:44', NULL),
(82, 4, 14, 1, '[A Gujarat] Record deleted successfully.', '2018-02-28 05:16:54', NULL),
(83, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-28 05:35:20] : [127.0.0.1]', '2018-02-28 05:35:20', NULL),
(84, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-28 07:43:37] : [127.0.0.1]', '2018-02-28 07:43:37', NULL),
(85, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-02-28 11:21:20] : [127.0.0.1]', '2018-02-28 11:21:20', NULL),
(86, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-02-28 12:20:45] : [127.0.0.1]', '2018-02-28 12:20:45', NULL),
(87, 6, 393, 1, '[Bapunagar] Record added successfully.', '2018-02-28 13:41:33', NULL),
(88, 2, 127, 1, '[2017 09 30 oppasdag asd] Record updated successfully.', '2018-02-28 13:44:38', NULL),
(89, 2, 127, 1, '[2017 09 30 oppasdag] Record updated successfully.', '2018-02-28 13:44:43', NULL),
(90, 6, 128, 1, '[A Bapunagar] Record updated successfully.', '2018-02-28 13:48:39', NULL),
(91, 6, 128, 1, '[Bapunagar] Record updated successfully.', '2018-02-28 13:49:10', NULL),
(92, 6, 128, 1, '[Bapunagar asd] Record updated successfully.', '2018-02-28 13:49:46', NULL),
(93, 6, 128, 1, '[Bapunagar] Record updated successfully.', '2018-02-28 13:50:24', NULL),
(94, 6, 128, 1, '[A Bapunagar] Record updated successfully.', '2018-02-28 13:51:30', NULL),
(95, 6, 128, 1, '[Bapunagar] Record updated successfully.', '2018-02-28 13:51:41', NULL),
(96, 6, 128, 1, '[A Bapunagar] Record updated successfully.', '2018-02-28 13:51:50', NULL),
(97, 6, 128, 1, '[Bapunagar] Record updated successfully.', '2018-02-28 13:51:56', NULL),
(98, 6, 128, 1, '[Bapunagar] Record deleted successfully.', '2018-02-28 13:57:38', NULL),
(99, 6, 128, 1, '[Bapunagar] Record deleted successfully.', '2018-02-28 13:58:10', NULL),
(100, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-03-01 05:49:48] : [127.0.0.1]', '2018-03-01 05:49:48', NULL),
(101, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-01 06:04:17] : [127.0.0.1]', '2018-03-01 06:04:17', NULL),
(102, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-03-01 12:03:15] : [127.0.0.1]', '2018-03-01 12:03:15', NULL),
(103, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-01 12:10:43] : [127.0.0.1]', '2018-03-01 12:10:43', NULL),
(104, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-03-01 12:10:48] : [127.0.0.1]', '2018-03-01 12:10:48', NULL),
(105, 3, 0, 0, 'Failed Attempt 1 : [admin@d-support.com] : [2018-03-02 04:03:57] : [127.0.0.1]', '2018-03-02 04:03:57', NULL),
(106, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-02 04:04:01] : [127.0.0.1]', '2018-03-02 04:04:01', NULL),
(107, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-03-02 04:05:28] : [127.0.0.1]', '2018-03-02 04:05:28', NULL),
(108, 3, 0, 0, 'Failed Attempt : [scalable.netdev@gmail.com] : [2018-03-02 04:50:40] : [192.168.1.217]', '2018-03-02 04:50:40', NULL),
(109, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-02 04:50:49] : [192.168.1.217]', '2018-03-02 04:50:49', NULL),
(110, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-02 05:18:08] : [127.0.0.1]', '2018-03-02 05:18:08', NULL),
(111, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-03-02 05:52:07] : [127.0.0.1]', '2018-03-02 05:52:07', NULL),
(112, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-02 06:52:24] : [127.0.0.1]', '2018-03-02 06:52:24', NULL),
(113, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-03-02 06:52:30] : [127.0.0.1]', '2018-03-02 06:52:30', NULL),
(114, 3, 0, 0, 'Logged In : [kishanpatel.nyusoft@gmail.com] : [2018-03-02 10:45:02] : [127.0.0.1]', '2018-03-02 10:45:02', NULL),
(115, 3, 0, 0, 'Logged Out : [kishanpatel.nyusoft@gmail.com] : [2018-03-02 10:45:05] : [127.0.0.1]', '2018-03-02 10:45:05', NULL),
(116, 3, 0, 0, 'Failed Attempt 1 : [kishanpatel.nyusoft@gmail.com] : [2018-03-02 10:45:16] : [127.0.0.1]', '2018-03-02 10:45:16', NULL),
(117, 3, 0, 0, 'Failed Attempt 2 : [kishanpatel.nyusoft@gmail.com] : [2018-03-02 10:45:17] : [127.0.0.1]', '2018-03-02 10:45:17', NULL),
(118, 3, 0, 0, 'Failed Attempt 3 : [kishanpatel.nyusoft@gmail.com] : [2018-03-02 10:45:18] : [127.0.0.1]', '2018-03-02 10:45:18', NULL),
(119, 3, 0, 0, 'Account Locked : [kishanpatel.nyusoft@gmail.com] : [2018-03-02 10:45:20] : [127.0.0.1]', '2018-03-02 10:45:20', NULL),
(120, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-02 12:11:25] : [127.0.0.1]', '2018-03-02 12:11:25', NULL),
(121, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-05 05:09:21] : [127.0.0.1]', '2018-03-05 05:09:21', NULL),
(122, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-03-05 05:09:30] : [127.0.0.1]', '2018-03-05 05:09:30', NULL),
(123, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-05 05:21:12] : [127.0.0.1]', '2018-03-05 05:21:12', NULL),
(124, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-03-05 09:45:13] : [127.0.0.1]', '2018-03-05 09:45:13', NULL),
(125, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-05 10:06:09] : [127.0.0.1]', '2018-03-05 10:06:09', NULL),
(126, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-03-05 11:45:49] : [127.0.0.1]', '2018-03-05 11:45:49', NULL),
(127, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-05 11:49:27] : [127.0.0.1]', '2018-03-05 11:49:27', NULL),
(128, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-03-05 11:50:13] : [127.0.0.1]', '2018-03-05 11:50:13', NULL),
(129, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-05 12:00:52] : [127.0.0.1]', '2018-03-05 12:00:52', NULL),
(130, 1, 29, 1, '[A Dsupport] Record is succesvold bijgewerkt.', '2018-03-05 14:07:01', NULL),
(131, 1, 31, 1, '[Dsupport] Record is succesvol toegevoegd.', '2018-03-06 09:34:17', NULL),
(132, 3, 0, 0, 'Uitgelogd : [admin@d-support.com] : [2018-03-06 10:16:45] : [127.0.0.1]', '2018-03-06 10:16:45', NULL),
(133, 3, 0, 0, 'Ingelogd : [admin@d-support.com] : [2018-03-06 10:16:52] : [127.0.0.1]', '2018-03-06 10:16:52', NULL),
(134, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-03-06 10:17:05] : [127.0.0.1]', '2018-03-06 10:17:05', NULL),
(135, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-06 10:33:42] : [127.0.0.1]', '2018-03-06 10:33:42', NULL),
(136, 3, 0, 0, 'log_login : [admin@d-support.com] : [2018-03-06 11:55:40] : [192.168.1.98]', '2018-03-06 11:55:40', NULL),
(137, 3, 0, 0, 'log_loggedout : [admin@d-support.com] : [2018-03-06 11:56:05] : [192.168.1.98]', '2018-03-06 11:56:05', NULL),
(138, 3, 0, 0, 'Uitgelogd : [admin@d-support.com] : [2018-03-06 11:56:56] : [127.0.0.1]', '2018-03-06 11:56:56', NULL),
(139, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-06 12:21:08] : [192.168.1.98]', '2018-03-06 12:21:08', NULL),
(140, 3, 0, 0, 'Ingelogd : [admin@d-support.com] : [2018-03-06 12:22:33] : [127.0.0.1]', '2018-03-06 12:22:33', NULL),
(141, 3, 0, 0, 'Failed Attempt : [scalable.netdev@gmail.com] : [2018-03-07 04:59:40] : [192.168.1.217]', '2018-03-07 04:59:40', NULL),
(142, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-07 05:00:00] : [192.168.1.217]', '2018-03-07 05:00:00', NULL),
(143, 3, 0, 0, 'Uitgelogd : [admin@d-support.com] : [2018-03-07 05:06:36] : [192.168.1.217]', '2018-03-07 05:06:36', NULL),
(144, 3, 0, 0, 'Ingelogd : [admin@d-support.com] : [2018-03-07 05:07:01] : [192.168.1.217]', '2018-03-07 05:07:01', NULL),
(145, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-03-07 05:07:15] : [192.168.1.217]', '2018-03-07 05:07:15', NULL),
(146, 3, 0, 0, 'Logged Out : [admin@d-support.com] : [2018-03-07 07:54:01] : [192.168.1.98]', '2018-03-07 07:54:01', NULL),
(147, 3, 0, 0, 'Logged In : [admin@d-support.com] : [2018-03-09 07:41:09] : [127.0.0.1]', '2018-03-09 07:41:09', NULL),
(148, 3, 0, 0, 'Failed Attempt : [frank.van.doorn@it-button.com] : [2018-03-13 06:52:43] : [127.0.0.1]', '2018-03-13 06:52:43', NULL),
(149, 3, 0, 0, 'Failed Attempt : [frank.van.doorn@it-button.com] : [2018-03-13 06:52:55] : [127.0.0.1]', '2018-03-13 06:52:55', NULL),
(150, 3, 0, 0, 'Failed Attempt : [frank.van.doorn@it-button.com] : [2018-03-13 06:53:20] : [127.0.0.1]', '2018-03-13 06:53:20', NULL),
(151, 3, 0, 0, 'Failed Attempt : [frank.van.doorn@it-button.com] : [2018-03-13 06:53:46] : [127.0.0.1]', '2018-03-13 06:53:46', NULL),
(152, 3, 0, 0, 'Failed Attempt : [frank.van.doorn@it-button.com] : [2018-03-13 06:53:50] : [127.0.0.1]', '2018-03-13 06:53:50', NULL),
(153, 3, 0, 0, 'Failed Attempt : [frank.van.doorn@it-button.com] : [2018-03-13 06:53:52] : [127.0.0.1]', '2018-03-13 06:53:52', NULL),
(154, 3, 0, 0, 'Failed Attempt : [frank.van.doorn@it-button.com] : [2018-03-13 06:54:08] : [127.0.0.1]', '2018-03-13 06:54:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`ID`, `Name`, `Description`) VALUES
(1, 'admin_email', 'info@iisr.nl'),
(2, 'block_timeout', '10');

-- --------------------------------------------------------

--
-- Table structure for table `subattribute`
--

CREATE TABLE `subattribute` (
  `SubAttributeId` int(11) NOT NULL,
  `AttributeId` int(11) NOT NULL,
  `NameEn` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `SortID` varchar(256) DEFAULT NULL,
  `IsPublished` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1 for published and 0 for unpublished',
  `CreatedOn` datetime DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subattribute`
--

INSERT INTO `subattribute` (`SubAttributeId`, `AttributeId`, `NameEn`, `SortID`, `IsPublished`, `CreatedOn`, `UpdatedOn`, `deleted_at`) VALUES
(107, 21, 'Cameraman', NULL, '1', NULL, NULL, NULL),
(106, 21, 'Arts', NULL, '1', NULL, NULL, NULL),
(105, 21, 'Directeur', NULL, '1', NULL, NULL, NULL),
(104, 20, 'Afgewezen', NULL, '1', NULL, NULL, NULL),
(103, 20, 'Toegekend', NULL, '1', NULL, NULL, NULL),
(102, 20, 'Ingediend', NULL, '1', NULL, NULL, NULL),
(101, 20, 'Opstelling dossier', NULL, '1', NULL, NULL, NULL),
(100, 20, 'Idee', NULL, '1', NULL, NULL, NULL),
(99, 19, 'Onbekend', NULL, '1', NULL, NULL, NULL),
(98, 19, 'Niet actief', NULL, '1', NULL, NULL, NULL),
(97, 19, 'Actief', NULL, '1', NULL, NULL, NULL),
(96, 5, 'Anders', NULL, '1', NULL, NULL, NULL),
(95, 18, 'D-support', NULL, '1', NULL, NULL, NULL),
(94, 18, 'Moode', NULL, '1', NULL, NULL, NULL),
(93, 5, 'D-Support contact', NULL, '1', NULL, NULL, NULL),
(92, 15, 'Gestopt', NULL, '1', NULL, NULL, NULL),
(91, 14, 'Gestopt', NULL, '1', NULL, NULL, NULL),
(90, 7, 'Consultancy', NULL, '1', NULL, NULL, NULL),
(89, 17, 'MBO', NULL, '1', NULL, NULL, NULL),
(88, 17, 'HBO', NULL, '1', NULL, NULL, NULL),
(87, 17, 'Onbekend', NULL, '1', NULL, NULL, NULL),
(86, 17, 'Overige', NULL, '1', NULL, NULL, NULL),
(85, 17, 'Universiteit', NULL, '1', NULL, NULL, NULL),
(84, 17, 'Middelbare school', NULL, '1', NULL, NULL, NULL),
(83, 17, 'VMBO', NULL, '1', NULL, NULL, NULL),
(82, 14, 'Guusje doorgestuurd', NULL, '1', NULL, NULL, NULL),
(81, 15, 'Guusje doorgestuurd', NULL, '1', NULL, NULL, NULL),
(79, 16, 'Telefonisch', NULL, '1', NULL, NULL, NULL),
(80, 14, 'Karin doorgestuurd', NULL, '1', NULL, NULL, NULL),
(77, 16, 'email', NULL, '1', NULL, NULL, NULL),
(78, 16, 'formulier', NULL, '1', NULL, NULL, NULL),
(75, 15, 'Wel match', NULL, '1', NULL, NULL, NULL),
(76, 15, 'Karin doorgestuurd', NULL, '1', NULL, NULL, NULL),
(74, 15, 'Geen match', NULL, '1', NULL, NULL, NULL),
(73, 15, 'Training gevolgd', NULL, '1', NULL, NULL, NULL),
(72, 15, 'Training nodig', NULL, '1', NULL, NULL, NULL),
(71, 15, 'Geen reactie', NULL, '1', NULL, NULL, NULL),
(70, 15, 'Aanmeldingsformulier ingevuld', NULL, '1', NULL, NULL, NULL),
(69, 15, 'Geen formulier ingevuld', NULL, '1', NULL, NULL, NULL),
(68, 14, 'Wel match', NULL, '1', NULL, NULL, NULL),
(67, 14, 'Geen macth', NULL, '1', NULL, NULL, NULL),
(66, 14, 'Training gevolgd', NULL, '1', NULL, NULL, NULL),
(65, 14, 'Training nodig', NULL, '1', NULL, NULL, NULL),
(64, 14, 'Geen reactie', NULL, '1', NULL, NULL, NULL),
(63, 14, 'Aanmeldingsformulier ingevuld', NULL, '1', NULL, NULL, NULL),
(62, 14, 'Algemeen contact', NULL, '1', NULL, NULL, NULL),
(61, 10, 'Android', NULL, '1', NULL, NULL, NULL),
(60, 4, 'Fiets/Brommer', NULL, '1', NULL, NULL, NULL),
(59, 13, 'oppasser en vrijwilliger', NULL, '1', NULL, NULL, NULL),
(58, 13, 'gezin en vrijwilliger', NULL, '1', NULL, NULL, NULL),
(57, 13, 'vrijwilliger', NULL, '1', NULL, NULL, NULL),
(56, 13, 'co-ouder', NULL, '1', NULL, NULL, NULL),
(55, 13, 'overige', NULL, '1', NULL, NULL, NULL),
(54, 13, 'kind', NULL, '1', NULL, NULL, NULL),
(53, 13, 'gezin en oppasser', NULL, '1', NULL, NULL, NULL),
(52, 13, 'oppasser', NULL, '1', NULL, NULL, NULL),
(51, 13, 'gezin', NULL, '1', NULL, NULL, NULL),
(50, 12, '3e scholing', NULL, '1', NULL, NULL, NULL),
(49, 12, '2e scholing', NULL, '1', NULL, NULL, NULL),
(48, 12, '1e scholing', NULL, '1', NULL, NULL, NULL),
(47, 5, 'Folder', NULL, '1', NULL, NULL, NULL),
(46, 5, 'Rianne', NULL, '1', NULL, NULL, NULL),
(45, 10, 'Linux', NULL, '1', NULL, NULL, NULL),
(44, 10, 'OS/X', NULL, '1', NULL, NULL, NULL),
(43, 11, 'ervaring met hulpmiddelen, oppaservaring', NULL, '1', NULL, NULL, NULL),
(42, 11, 'ervaring met hulpmiddelen, geen oppaservaring', NULL, '1', NULL, NULL, NULL),
(41, 11, 'kennis van diabetes, geen ervaring met hulpmiddelen, oppaservaring', NULL, '1', NULL, NULL, NULL),
(40, 11, 'kennis van diabetes, geen ervaring met hulpmiddelen, geen oppaservaring', NULL, '1', NULL, NULL, NULL),
(39, 11, 'geen kennis van diabetes, geen ervaring met hulpmiddelen, oppaservaring', NULL, '1', NULL, NULL, NULL),
(38, 11, 'geen kennis van diabetes, geen ervaring met hulpmiddelen, geen oppaservaring', NULL, '1', NULL, NULL, NULL),
(37, 9, 'Onbekend', NULL, '1', NULL, NULL, NULL),
(36, 10, 'Apple', NULL, '1', NULL, NULL, NULL),
(35, 9, 'Safari', NULL, '1', NULL, NULL, NULL),
(34, 10, 'Windows', NULL, '1', NULL, NULL, NULL),
(33, 9, 'Mozilla', NULL, '1', NULL, NULL, NULL),
(32, 9, 'Firefox', NULL, '1', NULL, NULL, NULL),
(31, 9, 'Explorer', NULL, '1', NULL, NULL, NULL),
(30, 9, 'Chrome', NULL, '1', NULL, '2018-02-07 13:08:30', NULL),
(29, 5, 'Facebook', NULL, '1', NULL, NULL, NULL),
(28, 5, 'Google', NULL, '1', NULL, NULL, NULL),
(27, 5, 'Advertentie', NULL, '1', NULL, NULL, NULL),
(26, 1, 'Pleegouder', NULL, '1', NULL, NULL, NULL),
(25, 6, 'Sensor', NULL, '1', NULL, NULL, NULL),
(24, 7, 'IT-bedrijf', NULL, '1', NULL, NULL, NULL),
(23, 8, 'Verpleegkundige', NULL, '1', NULL, NULL, NULL),
(22, 8, 'Arts', NULL, '1', NULL, NULL, NULL),
(21, 7, 'Diabetescentrum', NULL, '1', NULL, NULL, NULL),
(20, 6, 'I-port', NULL, '1', NULL, NULL, NULL),
(19, 6, 'Insuflon', NULL, '1', NULL, NULL, NULL),
(18, 6, 'Insulinepen', NULL, '1', NULL, NULL, NULL),
(17, 6, 'Insulinepompje', NULL, '1', NULL, NULL, NULL),
(16, 5, 'via andere ouders', NULL, '1', NULL, NULL, NULL),
(15, 5, 'Diabetesteam', NULL, '1', NULL, NULL, NULL),
(14, 5, 'Thuiszorg', NULL, '1', NULL, NULL, NULL),
(13, 5, 'Informatiepakket gemeente', NULL, '1', NULL, NULL, NULL),
(12, 5, 'Website D-Support', NULL, '1', NULL, NULL, NULL),
(11, 4, 'Niet ingevuld', NULL, '1', NULL, NULL, NULL),
(10, 4, 'Auto', NULL, '1', NULL, NULL, NULL),
(9, 4, 'Openbaar vervoer', NULL, '1', NULL, NULL, NULL),
(8, 4, 'Brommer', NULL, '1', NULL, NULL, NULL),
(7, 4, 'Fiets', NULL, '1', NULL, NULL, NULL),
(6, 4, 'Lopen', NULL, '1', NULL, NULL, NULL),
(5, 3, 'Jeugdwet', NULL, '1', NULL, NULL, NULL),
(4, 2, 'Nee', NULL, '1', NULL, NULL, NULL),
(3, 2, 'Ja', NULL, '1', NULL, NULL, NULL),
(2, 1, 'Voogd', NULL, '1', NULL, NULL, NULL),
(1, 1, 'Ouder', NULL, '1', NULL, NULL, NULL),
(108, 21, 'Consultant', NULL, '1', NULL, NULL, NULL),
(109, 21, 'Diabetesverpleegkundige', NULL, '1', NULL, NULL, NULL),
(110, 21, 'Voorzitter', NULL, '1', NULL, NULL, NULL),
(111, 21, 'Secretaris', NULL, '1', NULL, NULL, NULL),
(112, 21, 'Penningmeester', NULL, '1', NULL, NULL, NULL),
(113, 22, 'Email', NULL, '1', NULL, NULL, NULL),
(114, 22, 'Telephone', NULL, '1', NULL, NULL, NULL),
(115, 22, 'Personall meeting', NULL, '1', NULL, NULL, NULL),
(116, 22, 'Letter', NULL, '1', NULL, NULL, NULL),
(117, 22, 'Website form carer', NULL, '1', NULL, NULL, NULL),
(118, 22, 'Website form family', NULL, '1', NULL, NULL, NULL),
(119, 22, 'Website form volunteer', NULL, '1', NULL, NULL, NULL),
(120, 22, 'Website contact form', NULL, '1', NULL, NULL, NULL),
(121, 23, 'Open', NULL, '1', NULL, NULL, NULL),
(122, 23, 'Close', NULL, '1', NULL, NULL, NULL),
(123, 24, 'Aangevraagd', NULL, '1', NULL, NULL, NULL),
(124, 24, 'Toegekend', NULL, '1', NULL, NULL, NULL),
(125, 24, 'Afgewezen', NULL, '1', NULL, NULL, NULL),
(126, 24, 'Oude VOG', NULL, '1', NULL, NULL, NULL),
(127, 25, '2017 09 30 oppasdag', '1', '1', NULL, '2018-02-28 13:44:43', NULL),
(128, 13, 'regio-coordinator', NULL, '1', NULL, NULL, NULL),
(129, 27, 'Testgebruiker', NULL, '1', NULL, NULL, NULL),
(130, 27, 'Docent', NULL, '1', NULL, NULL, NULL),
(131, 26, 'Actief', NULL, '1', NULL, NULL, NULL),
(132, 26, 'Gestopt', NULL, '1', NULL, NULL, NULL),
(133, 27, 'Systeembeheerder', NULL, '1', NULL, NULL, NULL),
(134, 27, 'Cursist', NULL, '1', NULL, NULL, NULL),
(135, 13, 'diabetesverpleegkundige', NULL, '1', NULL, NULL, NULL),
(136, 13, 'zorgboerderij', NULL, '1', NULL, NULL, NULL),
(137, 13, 'Buddy netwerk', NULL, '1', NULL, NULL, NULL),
(138, 13, 'Bestuur', NULL, '1', NULL, NULL, NULL),
(139, 26, 'Nooit ingelogd', NULL, '1', NULL, NULL, NULL),
(140, 29, 'Dsupport sub', '2', '1', '2018-02-23 09:53:26', NULL, NULL),
(141, 29, 'test subattribute', '3', '1', '2018-02-27 13:19:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tablelist`
--

CREATE TABLE `tablelist` (
  `TableID` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablelist`
--

INSERT INTO `tablelist` (`TableID`, `Name`) VALUES
(1, 'Attribute'),
(2, 'Subattribute'),
(3, 'Usermaster'),
(4, 'GeoProvince'),
(5, 'GeoMunicipality'),
(6, 'GeoPlace');

-- --------------------------------------------------------

--
-- Table structure for table `unauthorizeuser`
--

CREATE TABLE `unauthorizeuser` (
  `ID` int(11) NOT NULL,
  `IpAddress` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unauthorizeuser`
--

INSERT INTO `unauthorizeuser` (`ID`, `IpAddress`) VALUES
(2, '127.0.0.1'),
(3, '127.0.0.1'),
(4, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Role` enum('1','2') NOT NULL COMMENT '1 for super admin,2 for admin',
  `IsPublished` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1 for published and 0 for unpublished',
  `AttemptsCnt` int(11) NOT NULL,
  `IsBlocked` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 for not block,1 for block',
  `BlockeTime` timestamp NULL DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `ResetToken` text,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`UserID`, `Name`, `Email`, `Password`, `Role`, `IsPublished`, `AttemptsCnt`, `IsBlocked`, `BlockeTime`, `CreatedOn`, `UpdatedOn`, `ResetToken`, `deleted_at`) VALUES
(1, 'Admin', 'admin@d-support.com', '$2y$12$4fJjJmoGe4UZN0BIji1YVOXS.cDd.SVDQynvpjAPJEMDb02cmfwC.', '1', '1', 0, '0', NULL, '2018-02-19 00:00:00', NULL, '', NULL),
(2, 'Admin', 'superadmin@d-support.com', '$2y$10$Gpli/BkvMuS61G6OlQd6YOa94KPwjvSqvmjoUgjq0zR84bbVVLI5O', '1', '1', 0, '0', NULL, '2018-02-19 00:00:00', NULL, '', NULL),
(3, 'Admin', 'kishanpatel.nyusoft@gmail.com', '$2y$10$Gpli/BkvMuS61G6OlQd6YOa94KPwjvSqvmjoUgjq0zR84bbVVLI5O', '1', '1', 3, '0', NULL, '2018-02-19 00:00:00', NULL, '$2y$12$0xte12yVcJTgM8K3H2tTVu3qIsH1F9SFU42pjePMOP2Zmbc8sooPO', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`AttributeId`);

--
-- Indexes for table `geomunicipality`
--
ALTER TABLE `geomunicipality`
  ADD PRIMARY KEY (`GeoMunicipalityId`);

--
-- Indexes for table `geoplace`
--
ALTER TABLE `geoplace`
  ADD PRIMARY KEY (`GeoPlaceId`);

--
-- Indexes for table `geoprovince`
--
ALTER TABLE `geoprovince`
  ADD PRIMARY KEY (`GeoProvinceId`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subattribute`
--
ALTER TABLE `subattribute`
  ADD PRIMARY KEY (`SubAttributeId`);

--
-- Indexes for table `tablelist`
--
ALTER TABLE `tablelist`
  ADD PRIMARY KEY (`TableID`);

--
-- Indexes for table `unauthorizeuser`
--
ALTER TABLE `unauthorizeuser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `AttributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `geomunicipality`
--
ALTER TABLE `geomunicipality`
  MODIFY `GeoMunicipalityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;
--
-- AUTO_INCREMENT for table `geoplace`
--
ALTER TABLE `geoplace`
  MODIFY `GeoPlaceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `geoprovince`
--
ALTER TABLE `geoprovince`
  MODIFY `GeoProvinceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subattribute`
--
ALTER TABLE `subattribute`
  MODIFY `SubAttributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `tablelist`
--
ALTER TABLE `tablelist`
  MODIFY `TableID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `unauthorizeuser`
--
ALTER TABLE `unauthorizeuser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
