-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 11, 2019 at 12:31 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `problemSolver`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categorie`
--

CREATE TABLE `Categorie` (
  `idCategoria` int(11) NOT NULL,
  `descrizione` varchar(26) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Categorie`
--

INSERT INTO `Categorie` (`idCategoria`, `descrizione`) VALUES
(1, 'ordine pubblico'),
(2, 'trasporti'),
(4, 'amministrazione'),
(6, 'sanita'),
(7, 'istruzione'),
(8, 'sanita'),
(9, 'istruzione'),
(10, 'altro'),
(11, 'categoria di prova');

-- --------------------------------------------------------

--
-- Table structure for table `Commenti`
--

CREATE TABLE `Commenti` (
  `idCommento` bigint(20) NOT NULL,
  `secretID` bigint(20) NOT NULL,
  `idProblema` bigint(20) NOT NULL,
  `dataCom` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descrizione` varchar(3000) NOT NULL,
  `boolVisibile` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Commenti`
--

INSERT INTO `Commenti` (`idCommento`, `secretID`, `idProblema`, `dataCom`, `descrizione`, `boolVisibile`) VALUES
(93, 45, 92, '2018-12-03 11:45:28', ' Commento uno riguardo il problema 92!', 1),
(94, 45, 93, '2018-12-03 12:23:03', ' Commento per la prova generale!', 1),
(95, 45, 94, '2018-12-03 12:24:00', ' n!', 1),
(96, 45, 94, '2018-12-03 14:21:03', 'Inserjsco ', 1),
(97, 46, 104, '2018-12-08 17:08:32', ' etajj', 1),
(98, 999999999999999, 106, '2018-12-08 18:26:13', ' Ciao ciao\n', 1),
(100, 999999999999999, 106, '2018-12-08 18:26:21', ' Ciao ciao\n\n', 1),
(101, 999999999999999, 106, '2018-12-08 18:26:46', 'ciao\n ', 1),
(102, 999999999999999, 106, '2018-12-08 18:26:52', ' ciao', 1),
(105, 999999999999999, 107, '2018-12-08 18:29:09', ' Aiuto\nAiuto\nAiuto', 1),
(106, 999999999999999, 108, '2018-12-08 18:35:29', 'Prendi esempio da me \n\n                            -Rockerduck', 1),
(107, 999999999999999, 98, '2018-12-08 18:58:04', ' Ehi ehi ehi', 1),
(108, 999999999999999, 109, '2018-12-08 19:03:38', 'Ahaahahhahahahahahahhahahahahahahah ', 1),
(109, 46, 110, '2018-12-12 08:09:10', ' wykykw5', 1),
(110, 46, 115, '2018-12-13 20:54:00', ' entttnntaar', 1),
(111, 46, 113, '2018-12-13 20:54:47', ' hhhhhhhhhhhhhhhhhhhh', 1),
(112, 46, 115, '2018-12-14 10:20:34', ' hhh', 1),
(115, 46, 110, '2018-12-14 11:03:32', ' un commento', 1),
(116, 46, 139, '2019-01-30 11:37:29', '', 1),
(118, 46, 139, '2019-02-01 14:42:07', 'rggrgrgrgr', 1),
(122, 789, 139, '2019-02-01 15:52:57', '4wrg4wrgwgrewgrewgr4', 1),
(126, 46, 139, '2019-02-02 08:58:20', 'Commento', 1),
(127, 46, 139, '2019-02-02 09:01:49', 'Nuovo Commento!', 1),
(128, 46, 139, '2019-02-02 09:03:19', 'Nuovo Commento!!!!', 1),
(129, 46, 139, '2019-02-02 09:07:21', 'efefeeffefeefef', 1),
(130, 46, 138, '2019-02-05 08:08:19', 'grgegergregre', 1),
(131, 46, 138, '2019-02-05 08:08:25', 'ssssssssssssssssssssssssssssssss', 1),
(132, 46, 143, '2019-02-06 09:37:49', '557ke57kk57k5', 1),
(133, 46, 143, '2019-02-06 09:38:15', '?????', 1),
(134, 46, 142, '2019-02-06 09:38:33', '???????????????????????', 1),
(135, 46, 143, '2019-02-06 10:31:14', 'fhfhfhf', 1),
(137, 46, 143, '2019-02-06 10:31:32', 'fhftu', 1),
(138, 46, 137, '2019-02-06 10:31:47', 'cfjhg', 1),
(139, 46, 149, '2019-02-11 10:02:25', 'hererherhrheerh', 1),
(140, 46, 149, '2019-02-11 10:02:30', 'hererherhrheerhgwegwgwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 1);

-- --------------------------------------------------------

--
-- Table structure for table `DizionarioTag`
--

CREATE TABLE `DizionarioTag` (
  `idTag` bigint(11) NOT NULL,
  `descrizione` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DizionarioTag`
--

INSERT INTO `DizionarioTag` (`idTag`, `descrizione`) VALUES
(8641845, ''),
(8641883, '#'),
(8641800, '#1'),
(8641874, '#abbassoPaperone'),
(8641801, '#Albero'),
(8641878, '#Anonimo'),
(8641803, '#Cairoli'),
(8641880, '#esame'),
(8641932, '#FFFFFFFFFFFFF'),
(8641863, '#mio'),
(8641857, '#n'),
(8641877, '#PaperoneÃ¨cadutodallescale'),
(8641876, '#PaperonetibatterÃ²'),
(8641802, '#Piazza'),
(8641873, '#piuricco'),
(8641881, '#ppp'),
(8641799, '#Problema'),
(8641854, '#ProblemaX'),
(8641856, '#ProvaGenerale'),
(8641866, '#rq35'),
(8641934, '#RRRRRRRRRRRRRR'),
(8641859, '#Segnalazioni'),
(8641933, '#SKSKSKSKSK'),
(8641879, '#tag'),
(8641855, '#Tram'),
(8641875, '#VicaROckerduck'),
(8641846, '#X'),
(8641847, '#xxxxxxxxxxxxxx'),
(8641868, '46u4u4'),
(8641865, '4h4545'),
(8641867, '5yy55y'),
(8641951, 'aaa'),
(8641852, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(8641930, 'allerta'),
(8641885, 'asdfghmyrtherwefibwu'),
(8641886, 'bgprwub'),
(8641890, 'brwph'),
(8641945, 'egewgewgewgewwgegewwgwge'),
(8641909, 'ehl'),
(8641921, 'feeeeeeeeeeeeeeeeeeek'),
(8641853, 'foto'),
(8641849, 'Gattino'),
(8641894, 'gehwg'),
(8641891, 'gewp'),
(8641887, 'gpj'),
(8641915, 'gwe'),
(8641946, 'gwgeeggwegwegwe'),
(8641947, 'gwgewewgegwewgewg'),
(8641949, 'gwgggw'),
(8641940, 'h54h55h4h54h545h5'),
(8641895, 'hewk'),
(8641893, 'hgewhgewh'),
(8641892, 'hhew'),
(8641913, 'hjlwge'),
(8641912, 'hjwge'),
(8641900, 'hk'),
(8641907, 'hkegw'),
(8641896, 'hkgew'),
(8641901, 'hkglew'),
(8641897, 'hkgwe'),
(8641906, 'hklgew'),
(8641904, 'hlk'),
(8641902, 'hlkgew'),
(8641908, 'hlkgw'),
(8641903, 'hlkgwe'),
(8641905, 'hwgkle'),
(8641937, 'j6j6j6j6j46'),
(8641948, 'jjtejetjtetjeetj'),
(8641911, 'lhgewl'),
(8641931, 'meteo'),
(8641916, 'mgw'),
(8641918, 'mgwe'),
(8641919, 'mm'),
(8641941, 'PASSWORD'),
(8641850, 'Punteggiatura'),
(8641950, 'reeeeeeeeeeeeeeeeeeeeee'),
(8641864, 'rheh3'),
(8641889, 'rwpj'),
(8641923, 'skrrrrrrrrrr'),
(8641922, 'sksksk'),
(8641942, 'Stato'),
(8641944, 'Stato3'),
(8641848, 'Virgola'),
(8641858, 'vjebvjkebk'),
(8641914, 'wge'),
(8641910, 'wghle'),
(8641888, 'wrbpb'),
(8641851, 'XOXO');

-- --------------------------------------------------------

--
-- Table structure for table `Incarichi`
--

CREATE TABLE `Incarichi` (
  `idIncarico` int(11) NOT NULL,
  `descrizione` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Incarichi`
--

INSERT INTO `Incarichi` (`idIncarico`, `descrizione`) VALUES
(1, 'utente'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Problemi`
--

CREATE TABLE `Problemi` (
  `idProblema` bigint(20) NOT NULL,
  `secretID` bigint(20) NOT NULL,
  `boolAnonimo` tinyint(4) NOT NULL,
  `idUbicazione` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `descrizione` varchar(3070) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `dataSegn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dataRisol` timestamp NULL DEFAULT NULL,
  `ModificaDi` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Problemi`
--

INSERT INTO `Problemi` (`idProblema`, `secretID`, `boolAnonimo`, `idUbicazione`, `idCategoria`, `descrizione`, `titolo`, `dataSegn`, `dataRisol`, `ModificaDi`) VALUES
(87, 0, 0, 2, 1, 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXx ', 'Problema X', '2018-12-06 08:21:05', NULL, NULL),
(88, 0, 0, 2, 1, ' Sono un gattino, sono la stella del telefonino. Ma Chiusa Parentesi chi Ã¨?', 'Mi chiamo Virgola', '2018-12-06 08:21:05', NULL, NULL),
(89, 0, 0, 2, 1, ' aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-12-06 08:21:05', '2018-12-24 23:00:00', NULL),
(90, 0, 0, 2, 1, ' mmmmmmmmmmmmmmmmmmmmmmm', 'Prova foto', '2018-12-06 08:21:05', '2018-12-12 23:07:00', NULL),
(91, 0, 0, 2, 1, 'Descrizione del problema x!', 'PRoblema x', '2018-12-06 08:21:05', NULL, NULL),
(92, 0, 0, 2, 1, 'Il tram non funziona come di norma. ', 'Interrotto regolare funzionamento tram!', '2018-12-06 08:21:05', NULL, NULL),
(93, 45, 0, 2, 1, 'descrizione della prova generale! ', 'Prova Generale!', '2018-12-06 08:21:05', NULL, NULL),
(94, 45, 1, 2, 1, ' Ennesima descrizione', 'Prova n-esima!', '2018-12-06 08:21:05', NULL, NULL),
(95, 45, 1, 2, 1, ' gnbownrgobnwrobwn', 'Problema nn', '2018-12-06 08:21:05', NULL, NULL),
(96, 45, 1, 2, 1, ' ho rimosso le segnalazioni come richiesto!', 'Non ci sono piÃ¹ le segnalazioni!!', '2018-12-06 08:30:37', NULL, NULL),
(97, 45, 1, 2, 6, '................................................', 'Titolo', '2018-12-06 08:41:34', NULL, NULL),
(98, 46, 1, 2, 1, 'Giuseppe DAgostino ', 'Problema riportato da me', '2018-12-06 11:56:35', NULL, NULL),
(99, 46, 0, 2, 1, 'adfnsfhmgdgj,dj,y ', 'Un altro mio porlbema', '2018-12-06 12:02:24', NULL, NULL),
(100, 46, 1, 2, 1, ' ghbwrig aierj gajet h et me', 'un altra volta', '2018-12-06 12:04:30', NULL, NULL),
(102, 46, 1, 2, 1, 'feffo ', 'fefiffo', '2018-12-06 12:06:11', NULL, NULL),
(103, 46, 1, 2, 1, ' etthaetrhartjjry', 'mmmmmmmmmmmmmmmmmhkhhpp', '2018-12-06 12:08:28', NULL, NULL),
(104, 46, 1, 2, 1, ' ma', 'Problr', '2018-12-08 17:08:16', NULL, NULL),
(105, 46, 0, 2, 1, ' q35yq35yq543yq54y', '53yq35', '2018-12-08 17:10:06', NULL, NULL),
(106, 46, 0, 2, 7, ' 46juq4q456u4u', 'h53q534qu', '2018-12-08 17:24:01', NULL, NULL),
(107, 999999999999999, 0, 2, 10, ' Aiutatemi a capire come diventare piÃ¹ ricco', 'Non so cosa fare', '2018-12-08 18:28:25', NULL, NULL),
(108, 999999999999999, 1, 2, 1, ' Vorrei stracciare Paperone ma mi anticipa sempre! Come posso fare?', 'Paperone mi irrita', '2018-12-08 18:33:11', NULL, NULL),
(109, 999999999999999, 1, 2, 1, ' Non riesco a smettere di ridere', 'Ahahahahahahahhahah', '2018-12-08 19:03:19', '2018-12-10 05:11:05', NULL),
(110, 46, 1, 2, 2, 'Prova problema anonimo ', 'Problema anonimo', '2018-12-10 08:10:17', NULL, NULL),
(111, 46, 0, 1, 2, 'uuuuuuuuuuuuuuuuubicazione ', 'Problema ubicazione', '2018-12-12 09:38:18', NULL, NULL),
(113, 46, 1, 33, 1, ' ARJTYTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT', 'wrGHREHEATEATJJ', '2018-12-12 09:41:19', NULL, NULL),
(115, 46, 0, 1, 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaarg ', 'Nuovo problema piazza cairoli', '2018-12-12 09:43:58', NULL, NULL),
(116, 46, 1, 34, 7, ' sbvibsibiiib', 'Nuovo problema rjgjrj', '2018-12-14 10:45:50', NULL, NULL),
(117, 789, 0, 34, 1, 'enonetrohinrtoinroitnhoirn ', 'problema di ppp', '2018-12-14 10:57:26', '2018-12-30 23:00:00', NULL),
(118, 789, 1, 34, 1, 'ethtthrtryyjvnshhsjjakjakaka ', 'problema anonimo ppp', '2018-12-14 10:58:47', NULL, NULL),
(119, 789, 0, 36, 1, '  asdfghmyrtherwefibwu bgprwub gpj wrbpb rwpj brwph gewp hhew hgewhgewh gehwg hewk hkgew hkgwe hkgwe hkgwe hk hkglew hlkgew hlkgwe hlk hwgkle hklgew hkegw hlkgw ehl wghle lhgewl hjwge hjlwge wge gwe mgw mgw mgwe mm asdfghmyrtherwefibwu bgprwub gpj wrbpb rwpj brwph gewp hhew hgewhgewh gehwg hewk hkgew hkgwe hkgwe hkgwe hk hkglew hlkgew hlkgwe hlk hwgkle hklgew hkegw hlkgw ehl wghle lhgewl hjwge hjlwge wge gwe mgw mgw mgwe mm asdfghmyrtherwefibwu bgprwub gpj wrbpb rwpj brwph gewp hhew hgewhgewh gehwg hewk hkgew hkgwe hkgwe hkgwe hk hkglew hlkgew hlkgwe hlk hwgkle hklgew hkegw hlkgw ehl wghle lhgewl hjwge hjlwge wge gwe mgw mgw mgwe mm asdfghmyrtherwefibwu bgprwub gpj wrbpb rwpj brwph gewp hhew hgewhgewh gehwg hewk hkgew hkgwe hkgwe hkgwe hk hkglew hlkgew hlkgwe hlk hwgkle hklgew hkegw hlkgw ehl wghle lhgewl hjwge hjlwge wge gwe mgw mgw mgwe mm asdfghmyrtherwefibwu bgprwub gpj wrbpb rwpj brwph gewp hhew hgewhgewh gehwg hewk hkgew hkgwe hkgwe hkgwe hk hkglew hlkgew hlkgwe hlk hwgkle hklgew hkegw hlkgw ehl wghle lhgewl hjwge hjlwge wge gwe mgw mgw mgwe mm asdfghmyrtherwefibwu bgprwub gpj wrbpb rwpj brwph gewp hhew hgewhgewh gehwg hewk hkgew hkgwe hkgwe hkgwe hk hkglew hlkgew hlkgwe hlk hwgkle hklgew hkegw hlkgw ehl wghle lhgewl hjwge hjlwge wge gwe mgw mgw mgwe mm asdfghmyrtherwefibwu bgprwub gpj wrbpb rwpj brwph gewp hhew hgewhgewh gehwg hewk hkgew hkgwe hkgwe hkgwe hk hkglew hlkgew hlkgwe hlk hwgkle hklgew hkegw hlkgw ehl wghle lhgewl hjwge hjlwge wge gwe mgw mgw mgwe mm asdfghmyrtherwefibwu bgprwub gpj wrbpb rwpj brwph gewp hhew hgewhgewh gehwg hewk hkgew hkgwe hkgwe hkgwe hk hkglew hlkgew hlkgwe hlk hwgkle hklgew hkegw hlkgw ehl wghle lhgewl hjwge hjlwge wge gwe mgw mgw mgwe mm asdfghmyrtherwefibwu bgprwub gpj wrbpb rwpj brwph gewp hhew hgewhgewh gehwg hewk hkgew hkgwe hkgwe hkgwe hk hkglew hlkgew hlkgwe hlk hwgkle hklgew hkegw hlkgw ehl wghle lhgewl hjwge hjlwge wge gwe mgw mgw mgwe mm', ' asdfghmyrtherwefibwu bgprwub gpj wrbpb rwpj brwph gewp hhew hgewhgewh gehwg hewk hkgew hkgwe hkgwe hkgwe hk hkglew hlkgew hlkgwe hlk hwgkle hklgew hkegw hlkgw ehl wghle lhgewl hjwge hjlwge wge gwe mgw mgw mgwe mm', '2018-12-17 10:30:28', NULL, NULL),
(120, 45, 1, 2, 6, ' 4t4t4tt4t4', '4343t4t43', '2019-01-14 17:31:58', NULL, NULL),
(122, 45, 1, 2, 6, '2.0', '2.0', '2019-01-14 17:33:58', NULL, NULL),
(123, 789, 0, 38, 6, ' efefefefefthjkkk', 'efeef', '2019-01-14 18:47:28', NULL, NULL),
(125, 789, 0, 38, 6, 'fffgggggggggggggghjuy65re', 'efeef', '2019-01-14 18:49:25', NULL, NULL),
(130, 789, 0, 38, 6, 'fffgggggggggggggghjuy65rejyy', 'efeef', '2019-01-14 18:53:32', NULL, NULL),
(133, 789, 1, 48, 1, 'falcomata ', 'ALLERTA METEO', '2019-01-14 18:59:12', NULL, NULL),
(134, 789, 0, 49, 7, ' gggg434g334g43g43g', 'Prova tag ajax', '2019-01-17 16:05:04', NULL, NULL),
(135, 789, 1, 36, 7, ' j665j6j64j64j64j', 'j6w45555555j', '2019-01-28 16:04:49', '2019-02-06 08:43:00', NULL),
(137, 789, 0, 36, 6, ' iyllyilyiliylyiliyliy', 'yillilyiyil', '2019-01-28 16:05:59', '2019-02-06 08:32:47', 137),
(138, 789, 0, 55, 6, ' h35h53h53h35h5h55h5hh5', '5y3y53y5h53h53h53qh35', '2019-01-29 11:48:17', '2019-02-06 08:23:09', NULL),
(139, 46, 1, 55, 4, 'HO DIMENTICATO TUTTE LE PASSWORD', 'NON RICORDO LE PASSWORD', '2019-01-29 11:53:50', '2019-02-06 08:11:50', NULL),
(140, 46, 0, 56, 10, ' Prova stato', 'Prova Stato', '2019-02-06 08:50:48', NULL, NULL),
(141, 46, 0, 56, 10, ' Prova stato 2', 'Prova Stato2', '2019-02-06 08:53:49', NULL, NULL),
(142, 46, 0, 56, 10, ' Prova stato 3', 'Prova Stato3', '2019-02-06 08:54:17', '2019-02-06 09:45:58', NULL),
(143, 46, 0, 56, 10, ' Prova stato 4', 'Prova Stato4', '2019-02-06 08:55:23', '2019-02-11 09:55:31', NULL),
(144, 46, 0, 36, 6, 'wrgerg ', 'erberern', '2019-02-08 14:53:35', '2019-02-08 15:00:22', 143),
(146, 46, 0, 36, 6, 'wrgerg l686l8l68l68l68', 'o86868ol8', '2019-02-08 15:00:22', '2019-02-11 09:10:36', 144),
(147, 46, 0, 36, 1, ' gewgwwgwgeewgegwgewewggewgwegwgwewg', 'gwrgrgwgwgewgewge', '2019-02-11 09:10:36', '2019-02-11 09:51:31', 146),
(148, 46, 0, 58, 10, ' wgewegwgewgewgeegwgwegewgew', 'wrgrrrrgge', '2019-02-11 09:55:47', '2019-02-11 09:56:08', NULL),
(149, 46, 0, 59, 7, ' egwgewgewegwewgewgewg', 'weggwegewegw', '2019-02-11 09:56:08', '2019-02-11 10:35:32', 148),
(150, 46, 0, 36, 7, ' tjjtejtejtejtjtetjjtejetjet', 'jttjtjtetjjte', '2019-02-11 10:35:32', NULL, 149),
(151, 46, 0, 36, 10, ' a', 'Ahahahahahahahhahaha', '2019-02-11 10:36:11', '2019-02-11 10:36:35', NULL),
(152, 46, 1, 36, 7, ' reeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'modific', '2019-02-11 10:36:35', NULL, 151),
(153, 46, 1, 36, 6, ' aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2019-02-11 10:56:35', NULL, NULL),
(154, 46, 1, 36, 2, ' aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2019-02-11 10:57:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `StatiProblema`
--

CREATE TABLE `StatiProblema` (
  `idStato` int(11) NOT NULL,
  `descrizione` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StatiProblema`
--

INSERT INTO `StatiProblema` (`idStato`, `descrizione`) VALUES
(0, 'oscurato'),
(1, 'risolto'),
(2, 'aperto'),
(3, 'Modificato');

-- --------------------------------------------------------

--
-- Table structure for table `StatoProblema`
--

CREATE TABLE `StatoProblema` (
  `idProblema` bigint(20) NOT NULL,
  `idStato` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StatoProblema`
--

INSERT INTO `StatoProblema` (`idProblema`, `idStato`) VALUES
(139, 0),
(138, 0),
(137, 3),
(135, 1),
(143, 1),
(142, 1),
(144, 3),
(146, 3),
(147, 0),
(148, 3),
(149, 3),
(150, 2),
(151, 3),
(152, 2),
(153, 2),
(154, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tagBridge`
--

CREATE TABLE `tagBridge` (
  `idProblema` bigint(20) NOT NULL,
  `idTag` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagBridge`
--

INSERT INTO `tagBridge` (`idProblema`, `idTag`) VALUES
(91, 8641854),
(92, 8641855),
(93, 8641856),
(94, 8641857),
(95, 8641858),
(96, 8641859),
(98, 8641863),
(99, 8641863),
(100, 8641863),
(102, 8641863),
(103, 8641863),
(104, 8641866),
(105, 8641867),
(106, 8641868),
(107, 8641873),
(107, 8641874),
(107, 8641875),
(108, 8641876),
(109, 8641877),
(110, 8641878),
(111, 8641845),
(113, 8641845),
(115, 8641801),
(115, 8641802),
(115, 8641803),
(115, 8641799),
(116, 8641879),
(116, 8641880),
(117, 8641881),
(118, 8641881),
(118, 8641883),
(119, 8641845),
(130, 8641921),
(130, 8641922),
(130, 8641923),
(133, 8641930),
(133, 8641931),
(134, 8641932),
(134, 8641933),
(134, 8641934),
(135, 8641937),
(137, 8641845),
(138, 8641940),
(139, 8641941),
(140, 8641942),
(141, 8641942),
(142, 8641944),
(143, 8641942),
(144, 8641845),
(146, 8641845),
(147, 8641945),
(148, 8641946),
(149, 8641947),
(150, 8641948),
(151, 8641949),
(152, 8641950),
(153, 8641951),
(154, 8641951);

-- --------------------------------------------------------

--
-- Table structure for table `Ubicazioni`
--

CREATE TABLE `Ubicazioni` (
  `idUbicazione` int(11) NOT NULL,
  `descrizione` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ubicazioni`
--

INSERT INTO `Ubicazioni` (`idUbicazione`, `descrizione`) VALUES
(36, ''),
(35, ' asdfghmyrtherwefibwu bgprwub gpj wrbpb rwpj brwph gewp hhew hgewhgewh gehwg hewk hkgew hkgwe hkgwe hkgwe hk hkglew hlkgew hlkgwe hlk hwgkle hklgew hkegw hlkgw ehl wghle lhgewl hjwge hjlwge wge gwe mgw mgw mgwe mm'),
(38, 'dffff'),
(28, 'ewgwegwegwgw'),
(49, 'fefiffo'),
(37, 'fffffffffff'),
(58, 'gegewgewgwgwwggwgwwge'),
(59, 'gwgwgwwgwg'),
(55, 'h5h54h5h5h54h54'),
(56, 'nessuna'),
(25, 'ospedale papardo'),
(1, 'Piazza Cairoli'),
(48, 'reggio calabria'),
(33, 'RHHRHRHRHRHREHER'),
(2, 'stazione centrale'),
(34, 'universitÃ  ingegneria papardo'),
(26, 'wgwrggw');

-- --------------------------------------------------------

--
-- Table structure for table `Utenti`
--

CREATE TABLE `Utenti` (
  `idUtente` bigint(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Cognome` varchar(255) NOT NULL,
  `ruolo` int(11) NOT NULL DEFAULT '1',
  `CF` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `secretID` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Utenti`
--

INSERT INTO `Utenti` (`idUtente`, `Nome`, `Cognome`, `ruolo`, `CF`, `password`, `secretID`, `email`) VALUES
(3, 'Paperon', 'De Paperoni', 1, 'qwertyuioplkjhgf', 'fbfwetrnrn', 0, 'PPaperoni@gmail.com'),
(4, 'Paolino', 'Paperino', 1, 'w123eascrtmoit34', 'c6009f08fc5fc6385f1ea1f5840e179f', 45, 'paolinopaperino@gmail.com'),
(5, 'Lino', 'Topo', 1, 'aaaaaaaaaaaaaaaa', '189bbbb00c5f1fb7fba9ad9285f193d1', 78, 'e@mail.com'),
(8, 'Giuseppe', 'DAgostino', 2, 'DGSGPP94H16H224A', 'cavallo2', 46, 'giuseppe.dagostin94@gmail.com'),
(9, 'Mr.', 'Rockerduck', 1, 'MRCKRD96H26H224D', '289692f48740d1026cb193de4f60524f', 999999999999999, 'puffo'),
(10, 'ppp', 'ppp', 1, 'uip384739idurewf', '9003d1df22eb4d3820015070385194c8', 789, 'ppp@gmail.com'),
(11, 'aa', 'aa', 1, 'aaaaaaaaaaaaaaab', '0cc175b9c0f1b6a831c399e269772661', 780, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(12, 'gegewgewge', 'gewgegewgwegew', 1, 'grerhethrtrthjrj', 'fda89032c4b27faea76c970e1dc01c77', 5675434567, 'wewgeggwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `Commenti`
--
ALTER TABLE `Commenti`
  ADD PRIMARY KEY (`idCommento`),
  ADD UNIQUE KEY `descrizione` (`descrizione`),
  ADD KEY `idProblema` (`idProblema`),
  ADD KEY `secretID` (`secretID`);

--
-- Indexes for table `DizionarioTag`
--
ALTER TABLE `DizionarioTag`
  ADD PRIMARY KEY (`idTag`),
  ADD UNIQUE KEY `descrizione` (`descrizione`);

--
-- Indexes for table `Incarichi`
--
ALTER TABLE `Incarichi`
  ADD PRIMARY KEY (`idIncarico`);

--
-- Indexes for table `Problemi`
--
ALTER TABLE `Problemi`
  ADD PRIMARY KEY (`idProblema`),
  ADD UNIQUE KEY `descrizione` (`descrizione`),
  ADD KEY `idUbicazione` (`idUbicazione`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `secretID` (`secretID`),
  ADD KEY `ModificaDi` (`ModificaDi`);

--
-- Indexes for table `StatiProblema`
--
ALTER TABLE `StatiProblema`
  ADD PRIMARY KEY (`idStato`);

--
-- Indexes for table `StatoProblema`
--
ALTER TABLE `StatoProblema`
  ADD KEY `idProplema` (`idProblema`),
  ADD KEY `idStato` (`idStato`);

--
-- Indexes for table `tagBridge`
--
ALTER TABLE `tagBridge`
  ADD KEY `idTag` (`idTag`),
  ADD KEY `idProblema` (`idProblema`);

--
-- Indexes for table `Ubicazioni`
--
ALTER TABLE `Ubicazioni`
  ADD PRIMARY KEY (`idUbicazione`),
  ADD UNIQUE KEY `descrizione` (`descrizione`);

--
-- Indexes for table `Utenti`
--
ALTER TABLE `Utenti`
  ADD PRIMARY KEY (`idUtente`),
  ADD UNIQUE KEY `secretID` (`secretID`),
  ADD UNIQUE KEY `CF` (`CF`),
  ADD KEY `ruolo` (`ruolo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Commenti`
--
ALTER TABLE `Commenti`
  MODIFY `idCommento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `DizionarioTag`
--
ALTER TABLE `DizionarioTag`
  MODIFY `idTag` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8641953;
--
-- AUTO_INCREMENT for table `Incarichi`
--
ALTER TABLE `Incarichi`
  MODIFY `idIncarico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Problemi`
--
ALTER TABLE `Problemi`
  MODIFY `idProblema` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT for table `StatiProblema`
--
ALTER TABLE `StatiProblema`
  MODIFY `idStato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Ubicazioni`
--
ALTER TABLE `Ubicazioni`
  MODIFY `idUbicazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `Utenti`
--
ALTER TABLE `Utenti`
  MODIFY `idUtente` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Commenti`
--
ALTER TABLE `Commenti`
  ADD CONSTRAINT `Commenti_ibfk_2` FOREIGN KEY (`idProblema`) REFERENCES `Problemi` (`idProblema`),
  ADD CONSTRAINT `Commenti_ibfk_3` FOREIGN KEY (`secretID`) REFERENCES `Utenti` (`secretID`);

--
-- Constraints for table `Problemi`
--
ALTER TABLE `Problemi`
  ADD CONSTRAINT `Problemi_ibfk_1` FOREIGN KEY (`idUbicazione`) REFERENCES `Ubicazioni` (`idUbicazione`),
  ADD CONSTRAINT `Problemi_ibfk_2` FOREIGN KEY (`idCategoria`) REFERENCES `Categorie` (`idCategoria`),
  ADD CONSTRAINT `Problemi_ibfk_3` FOREIGN KEY (`secretID`) REFERENCES `Utenti` (`secretID`),
  ADD CONSTRAINT `Problemi_ibfk_4` FOREIGN KEY (`ModificaDi`) REFERENCES `Problemi` (`idProblema`);

--
-- Constraints for table `StatoProblema`
--
ALTER TABLE `StatoProblema`
  ADD CONSTRAINT `StatoProblema_ibfk_1` FOREIGN KEY (`idProblema`) REFERENCES `Problemi` (`idProblema`),
  ADD CONSTRAINT `StatoProblema_ibfk_2` FOREIGN KEY (`idStato`) REFERENCES `StatiProblema` (`idStato`);

--
-- Constraints for table `tagBridge`
--
ALTER TABLE `tagBridge`
  ADD CONSTRAINT `tagBridge_ibfk_1` FOREIGN KEY (`idTag`) REFERENCES `DizionarioTag` (`idTag`),
  ADD CONSTRAINT `tagBridge_ibfk_2` FOREIGN KEY (`idProblema`) REFERENCES `Problemi` (`idProblema`);

--
-- Constraints for table `Utenti`
--
ALTER TABLE `Utenti`
  ADD CONSTRAINT `Utenti_ibfk_1` FOREIGN KEY (`ruolo`) REFERENCES `Incarichi` (`idIncarico`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
