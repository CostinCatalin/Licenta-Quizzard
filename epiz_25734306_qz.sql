-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: sql301.byetcluster.com
-- Timp de generare: iun. 30, 2020 la 01:58 AM
-- Versiune server: 5.6.47-87.0
-- Versiune PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `epiz_25734306_qz`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `qz_answers`
--

CREATE TABLE `qz_answers` (
  `answer_id` int(24) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_description` varchar(512) NOT NULL,
  `answer_value` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `qz_answers`
--

INSERT INTO `qz_answers` (`answer_id`, `question_id`, `answer_description`, `answer_value`) VALUES
(11, 1, 'test', '2'),
(10, 1, 'Am de toate', '1'),
(33, 19, 'or', '1'),
(85, 23, 'Cu nimic', '1'),
(16, 1, '5', '3'),
(52, 1, 'Satana', '4'),
(71, 22, 'Unu', '1'),
(81, 19, 'High five', '3'),
(82, 19, 'Sarumana', '4'),
(88, 22, 'Cinci', '5'),
(94, 21, '', 'Ma mut in caraibe'),
(83, 24, 'Am o intrebare', '1'),
(76, 22, 'Patru', '4'),
(72, 22, 'Doi', '2'),
(84, 24, 'Cat de departe', '2'),
(86, 23, 'Stiu ca a mgresit', '2'),
(92, 22, 'Sase', '6'),
(95, 27, 'Ma duc la mare', '1'),
(96, 27, 'Du-te tare', '2'),
(97, 27, 'Ce sa faci ?', '3'),
(98, 28, 'De ce ma minti ?', '1'),
(99, 28, '', '2'),
(101, 29, 'Cat de departe ??', '1'),
(102, 29, 'Sa fie sanatos', '2'),
(103, 25, '', 'Shit!'),
(111, 31, '1977', '1'),
(108, 30, '5', '1'),
(107, 33, '', '1'),
(109, 30, '3', '2'),
(110, 30, '4', '3'),
(112, 31, '1930', '2'),
(114, 31, '1877', '3'),
(115, 44, 'BTS', '1'),
(116, 44, 'Coldplay', '2'),
(118, 44, 'AC/DC', '4'),
(144, 55, 'Harry Styles', '3'),
(143, 55, 'Zayn Malik', '2'),
(142, 55, 'Niall Horan', '1'),
(194, 88, '', '2'),
(193, 88, '', '1'),
(133, 66, 'Cat de departe ??', '1'),
(134, 66, 'Sa fie sanatos', '2'),
(136, 65, 'Back in Black', '1'),
(137, 65, 'Hell Bells', '2'),
(138, 65, 'TNT', '3'),
(139, 70, 'Black Swan', '1'),
(140, 70, 'Boy with luv', '2'),
(141, 70, 'Stay Gold', '3'),
(145, 73, 'Mushroom', '1'),
(146, 73, 'Fire Flower', '2'),
(147, 73, 'Starman', '3'),
(148, 73, ' Yoshi Egg', '4'),
(149, 74, '49', '1'),
(150, 74, ' 96', '2'),
(151, 74, '256', '3'),
(152, 74, '999', '4'),
(153, 75, 'World War I', '1'),
(154, 75, 'World War II', '2'),
(155, 75, 'World War III', '3'),
(156, 75, 'The Vietnam War', '4'),
(157, 76, 'Krystal', '1'),
(158, 76, ' Lylat', '2'),
(159, 76, 'Corneria', '3'),
(160, 76, 'Aparoid', '4'),
(161, 77, 'Moonwalker', '1'),
(162, 77, 'Space Channel 5', '2'),
(163, 77, 'Space Channel 5', '3'),
(164, 77, 'Dance Dance Revolution', '4'),
(166, 78, 'Nexus', '1'),
(167, 78, 'Inhibitor', '2'),
(168, 78, 'Power Core', '3'),
(169, 78, 'Fire Flower', '4'),
(170, 79, 'Golden Axe', '1'),
(171, 79, 'Minecraft', '2'),
(172, 79, 'Lego the Hobbit', '3'),
(173, 79, 'League of Legends', '4'),
(174, 80, 'Tides of Darkness', '1'),
(175, 80, 'Reign of Chaos', '2'),
(176, 80, 'Tides of Darkness', '3'),
(177, 80, 'Orcs & Humans', '4'),
(178, 81, 'Pong', '1'),
(179, 81, 'Pac-Man', '2'),
(180, 81, 'Tennis for Two', '3'),
(181, 81, 'Asteroids', '4'),
(182, 82, 'One week', '1'),
(183, 82, 'One month', '2'),
(184, 82, 'One year', '3'),
(185, 82, 'Five years', '4'),
(186, 41, '', 'Baby One More Time '),
(187, 54, '', 'Kanye West'),
(188, 63, '', 'CÃ©line Dion'),
(189, 67, '', 'Mama, just killed a man'),
(190, 84, '  Prejudecata', '1'),
(191, 84, '  Simtire', '2'),
(192, 84, 'Orgoliu', '3'),
(195, 85, '  vanturi', '1'),
(196, 85, 'drumuri', '2'),
(197, 85, 'piscuri', '3'),
(198, 86, 'Dorinte', '1'),
(199, 86, 'Sperante', '2'),
(200, 86, 'Iubiri', '3'),
(201, 89, 'Slujitoarei', '1'),
(202, 89, 'Scufitei Rosii', '2'),
(203, 89, 'Razvratitei', '3'),
(204, 90, 'Karamazov', '1'),
(205, 90, 'Moscovei', '2'),
(206, 90, 'lui Vania', '3'),
(207, 91, 'Labirintului', '1'),
(208, 91, 'Foamei', '2'),
(209, 91, 'Revansei', '3'),
(210, 92, 'Dezlantuita', '1'),
(211, 92, 'a Mustelor', '2'),
(212, 92, 'Noua', '3'),
(213, 93, 'Hoinarilor', '1'),
(214, 93, 'Spanzuratilor', '2'),
(215, 93, 'Razboiul', '3'),
(217, 94, 'Animalelor', '1'),
(218, 94, 'Comunista', '2'),
(219, 94, 'Porcilor', '3'),
(220, 95, 'Stelara', '1'),
(221, 95, 'Cosmica', '2'),
(222, 95, 'Spatiala', '3'),
(223, 96, 'Muntii Apuseni', '1'),
(224, 96, 'Muntii Retezat', '2'),
(225, 96, 'Muntii Rodnei', '3'),
(226, 96, 'Muntii Bucegi', '4'),
(227, 97, 'Arges', '1'),
(228, 97, 'Mures', '2'),
(229, 97, 'Olt', '3'),
(230, 97, 'Crisul Repede', '4'),
(231, 98, 'Calarasi', '1'),
(232, 98, 'Olt', '2'),
(233, 98, 'Braila', '3'),
(234, 98, 'Teleorman', '4'),
(235, 99, 'Colibita', '1'),
(236, 99, 'Portile de Fier', '2'),
(237, 99, 'Gura Raului', '3'),
(238, 99, 'Vidra', '4'),
(240, 100, 'Vulpea', '1'),
(241, 100, 'Caprele negre', '2'),
(242, 100, 'Rasul', '3'),
(243, 100, 'Cerbul', '4'),
(244, 101, 'Bulgaria si Serbia', '1'),
(245, 101, 'Ucraina si Moldova', '2'),
(246, 101, 'Ungaria si Ucraina', '3'),
(247, 101, 'Ungaria si Serbia', '4'),
(248, 102, 'Buzau', '1'),
(249, 102, 'Onesti', '2'),
(250, 102, 'Roman', '3'),
(251, 102, 'Targu Neamt', '4'),
(252, 103, 'Nemerul', '1'),
(253, 103, 'Austrul', '2'),
(254, 103, 'Crivatul', '3'),
(255, 103, 'Viscolul', '4'),
(257, 104, 'AC Milan', '1'),
(258, 104, 'Real Madrid', '2'),
(259, 104, 'Bayern Munchen', '3'),
(260, 104, 'FC Liverpool', '4'),
(261, 105, 'Germania', '1'),
(262, 105, 'Brazilia', '2'),
(263, 105, 'Franta', '3'),
(264, 105, 'Argentina', '4'),
(265, 106, 'Lionel Messi', '1'),
(266, 106, 'Cristiano Ronaldo', '2'),
(267, 106, 'Pele', '3'),
(268, 106, 'Maradona', '4'),
(270, 107, 'Lionel Messi', '1'),
(271, 107, 'Cristiano Ronaldo', '2'),
(272, 107, 'Sima Ciprian', '3'),
(273, 107, 'Miroslav Klose', '4'),
(274, 108, 'Gheorghe Hagi', '1'),
(275, 108, 'Sima Ciprian', '2'),
(276, 108, 'Ilie Dumitrescu', '3'),
(277, 108, 'Gheorghe Popescu', '4');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `qz_questions`
--

CREATE TABLE `qz_questions` (
  `question_id` int(16) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `question_image` varchar(128) NOT NULL,
  `answers_type` tinyint(1) NOT NULL COMMENT '1 - checkbox,  2 - radiobox,  3 - text',
  `is_required` tinyint(1) NOT NULL,
  `correct_answer` varchar(128) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `qz_questions`
--

INSERT INTO `qz_questions` (`question_id`, `quiz_id`, `question_text`, `question_image`, `answers_type`, `is_required`, `correct_answer`) VALUES
(1, 1, 'Am n-am bani imi vand casa', '', 2, 0, '0'),
(21, 1, 'De ce ma minti de ce ma minti?', '', 3, 0, '94'),
(22, 1, 'Multiple', '', 1, 0, '2_5'),
(19, 1, 'Shakespir', '', 2, 0, '4'),
(23, 1, 'Sigur ca da', '', 2, 0, '1'),
(24, 1, 'S-ar putea sa ma car totusi', '', 2, 0, '2'),
(25, 3, 'Si m-am dus m-am dus', '', 3, 0, '103'),
(26, 2, 'O intrebare?', '', 3, 0, '0'),
(27, 2, 'Doua intrebari', '', 2, 0, '0'),
(28, 2, 'Cand sa ma duc acasa ?', '', 1, 0, '0'),
(29, 3, 'Ca nu am io treaba cu el', '', 2, 0, '2'),
(30, 17, ' CÃ¢È›i membri existÄƒ Ã®n trupa Little Mix?', '', 1, 0, '3'),
(31, 17, 'ÃŽn ce an a murit Elvis Presley?', '', 1, 0, '1'),
(32, 18, 'Shut up', '', 3, 0, '0'),
(33, 18, '', '', 2, 0, '0'),
(34, 19, '', '', 3, 0, '0'),
(54, 17, 'Cu ce â€‹â€‹celebru rapper s-a cÄƒsÄƒtorit cu Kim Kardashian Ã®n 2014?', '', 3, 0, '187'),
(41, 17, 'Cum s-a numit primul single al lui Britney Spears?', '', 3, 0, '186'),
(44, 17, 'Ce trupÄƒ a avut un album de succes internaÈ›ional Ã®n 2002 cu Ã®nregistrarea â€žA Rush of Blood to the Headâ€?', '', 1, 0, '2'),
(88, 20, '', '', 2, 0, '0'),
(55, 17, 'Care membru al trupei One Direction a lansat â€žWatermelon Sugarâ€ È™i â€žAdore Youâ€?', '', 1, 0, '3'),
(63, 17, 'Cine a cÃ¢ntat melodia din filmul Titanic, â€žMy heart will go onâ€?', '', 3, 0, '188'),
(65, 17, ' Care a fost primul album AC / DC lansat dupÄƒ moartea cÃ¢ntÄƒreÈ›ului principal Bon Scott?', '', 1, 0, '1'),
(66, 3, 'Ca nu am io treaba cu el', '', 2, 0, '2'),
(67, 17, 'Care este primul vers al melodiei  â€žBohemian Rhapsodyâ€?', '', 3, 0, '189'),
(70, 17, 'Care este ultimul MV lansat de BTS din iunie 2020?', '', 1, 0, '3'),
(72, 3, '', '', 3, 0, '0'),
(73, 21, 'Ce l-a fÄƒcut pe Mario invincibil Ã®n â€žSuper Mario Bros.â€?', '', 2, 0, '3'),
(74, 21, 'Care este cel mai Ã®nalt nivel pe care Ã®l poate atinge un jucÄƒtor Ã®n â€žPac-Manâ€?', '', 2, 0, '3'),
(75, 21, 'Ce eveniment istoric este prezentat in prima editie \"Call of Duty\" ?', '', 2, 0, '2'),
(76, 21, ' Cum se numeÈ™te celebrul sistem Ã®n care are loc universul â€žStar Foxâ€?', '', 2, 0, '2'),
(77, 21, 'Cum se numea jocul video Ã®n care Michael Jackson este erou?', '', 2, 0, '1'),
(78, 21, ' Care este obiectul pe care jucÄƒtorii adversari trebuie sÄƒ-l distrugÄƒ pentru a cÃ¢È™tiga la â€žLeague of Legendsâ€?', '', 2, 0, '1'),
(79, 21, 'Un pickaxe este un instrument de bazÄƒ, de obicei utilizat Ã®n care jocul video?', '', 2, 0, '2'),
(80, 21, ' Cum se numeÈ™te primul joc video din seria â€žWarcraftâ€?', '', 2, 0, '4'),
(81, 21, ' Cum se numeÈ™te primul joc video?', '', 2, 0, '3'),
(82, 21, ' CÃ¢t i-a luat lui Markus Persson sÄƒ creeze prima versiune a â€žMinecraftâ€?', '', 2, 0, '1'),
(83, 22, '', '', 3, 0, '0'),
(84, 24, 'Completeaza titlul acestei carti semnate de Jane Austen: Mandrie si...', '', 2, 0, '1'),
(85, 24, 'Completeaza titlul acestei carti semnate de Emily Bronte: La rascruce de...', '', 2, 0, '1'),
(86, 24, 'Completeaza titlul acestei carti semnate de Charles Dickens: Marile...', '', 2, 0, '2'),
(89, 24, 'Completeaza titlul acestei carti semnate de Margaret Atwood: Povestea...', '', 2, 0, '1'),
(90, 24, 'Completeaza titlul acestei carti semnate de Feodor Dostoievski: Fratii...', '', 2, 0, '1'),
(91, 24, 'Completeaza titlul acestei carti semnate de Suzanne Collins: Jocurile...', '', 2, 0, '2'),
(92, 24, 'Completeaza titlul acestei carti semnate de Aldous Huxley: Minunata Lume...', '', 2, 0, '3'),
(93, 24, 'Completeaza titlul acestei carti semnate de Liviu Rebreanu: Padurea...', '', 2, 0, '2'),
(94, 24, 'Completeaza titlul acestei carti semnate de George Orwell: Ferma...', '', 2, 0, '1'),
(95, 24, 'Completeaza titlul acestei carti semnate de Arthur C. Clarke: 2001- Odiseea...', '', 2, 0, '3'),
(96, 25, 'Majoritatea zacamintelor de aur se afla in?', '', 2, 0, '1'),
(97, 25, 'Lacul Vidraru se afla pe raul?', '', 2, 0, '1'),
(98, 25, 'Principalele forme deAlexandria este resedinta judetului? relief ale Deltei sunt?', '', 2, 0, '4'),
(99, 25, 'Pe raul Lotru se afla barajul?', '', 2, 0, '4'),
(100, 25, 'Specifice faunei alpine sunt?', '', 2, 0, '2'),
(101, 25, 'Vecinii Romaniei la vest sunt?', '', 2, 0, '4'),
(102, 25, 'Trotusul strabate orasul?', '', 2, 0, '2'),
(103, 25, 'Vantul geros care bate in partea de est a tarii este?', '', 2, 0, '3'),
(104, 27, 'Cine a castigat Liga Campionilor in anul 1976?', '', 2, 0, '3'),
(105, 27, 'Ce nationala are cele mai multe cupe mondiale castigate?', '', 2, 0, '2'),
(106, 27, 'Care este jucatorul cu cele mai multe baloane de aur castigate?', '', 2, 0, '1'),
(107, 27, 'Cine este detinatorul recordului de cele mai multe goluri la Campionatul Mondial?', '', 2, 0, '4'),
(108, 27, 'Cine este considerat cel mai bun fotbalist roman din istorie?', '', 2, 0, '1');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `qz_quizzes`
--

CREATE TABLE `qz_quizzes` (
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_type` tinyint(1) NOT NULL COMMENT '1 - test, 2 - poll, 3 - survey',
  `quiz_title` varchar(128) NOT NULL,
  `quiz_description` text NOT NULL,
  `quiz_image` varchar(128) NOT NULL,
  `quiz_status` tinyint(1) NOT NULL COMMENT '1 - template, 2 - active(published), 3 - closed(published), 4 - removed(hidden), 5 - banned',
  `quiz_creation_date` varchar(16) NOT NULL,
  `last_edit_date` varchar(16) NOT NULL,
  `quiz_start_date` varchar(16) NOT NULL,
  `quiz_end_date` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `qz_quizzes`
--

INSERT INTO `qz_quizzes` (`quiz_id`, `user_id`, `quiz_type`, `quiz_title`, `quiz_description`, `quiz_image`, `quiz_status`, `quiz_creation_date`, `last_edit_date`, `quiz_start_date`, `quiz_end_date`) VALUES
(1, 1, 1, 'Primul quiz creat', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'DEk8xIOOJp.jpg', 3, '1593241624', '', '1593230400', '1591156800'),
(2, 1, 1, 'Alt quiz de care n-am nevoie', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 3, '1593243924', '', '1591070400', '1592884800'),
(3, 1, 1, 'Numai data end setata', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 3, '1593243937', '', '', '1592539200'),
(14, 1, 1, 'Numai data start setata', '', '', 2, '1593265289', '', '1592280000', ''),
(15, 5, 1, '', '', '', 1, '1593331099', '', '', ''),
(16, 5, 1, '', '', '', 1, '1593331296', '', '', ''),
(17, 13, 1, 'Music', 'Hereâ€™s music to the ears of anyone asked to conduct a round for an upcoming House Party, Google Hangouts, Zoom or Skype pub quiz: weâ€™ve got you covered.', '', 2, '1593359571', '', '', ''),
(18, 1, 1, 'Quiz nou', 'Test la mate', '', 1, '1593359705', '', '', ''),
(19, 1, 1, '', '', '', 1, '1593359792', '', '', ''),
(20, 1, 1, 'Test #2', 'O descriere minunata', '', 1, '1593359972', '', '', ''),
(21, 13, 1, 'Games', '', '', 2, '1593361831', '', '1593316800', ''),
(22, 16, 1, '', '', '', 1, '1593374784', '', '', ''),
(23, 16, 1, '', '', '', 1, '1593436312', '', '', ''),
(24, 16, 1, 'Test de cultura generala', 'Poti completa aceste titluri celebre de carti?', '', 2, '1593437026', '', '', ''),
(25, 16, 1, 'Geografia Romaniei', 'Iti place geografia? Hai sa vedem cat de bine cunosti Romania!', 'NWESwQnpj3.png', 2, '1593438410', '', '', ''),
(26, 17, 1, 'Fotbal', '', '', 1, '1593443168', '', '', ''),
(27, 19, 1, 'Fotbal', 'Despre Fotbal', 'uRitQCMhWR.png', 2, '1593444059', '', '', '');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `qz_scores`
--

CREATE TABLE `qz_scores` (
  `score_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score_value` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `qz_scores`
--

INSERT INTO `qz_scores` (`score_id`, `quiz_id`, `user_id`, `score_value`) VALUES
(1, 21, 1, 70),
(2, 17, 15, 10),
(3, 21, 16, 50),
(4, 17, 16, 30),
(5, 25, 18, 13),
(6, 21, 19, 30),
(7, 25, 19, 88),
(8, 27, 17, 100),
(9, 27, 20, 20),
(10, 27, 1, 40);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `qz_users`
--

CREATE TABLE `qz_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_profile_img` varchar(128) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_type` tinyint(1) NOT NULL COMMENT '1 - user, 2 - guest',
  `user_first_name` varchar(32) NOT NULL,
  `user_last_name` varchar(32) NOT NULL,
  `user_phone` varchar(32) NOT NULL,
  `user_description` text NOT NULL,
  `user_occupation` varchar(64) NOT NULL,
  `user_country` varchar(32) NOT NULL,
  `user_county` varchar(32) NOT NULL,
  `user_city` varchar(32) NOT NULL,
  `user_born_date` varchar(16) NOT NULL,
  `user_register_date` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `qz_users`
--

INSERT INTO `qz_users` (`user_id`, `user_name`, `user_email`, `user_profile_img`, `user_password`, `user_type`, `user_first_name`, `user_last_name`, `user_phone`, `user_description`, `user_occupation`, `user_country`, `user_county`, `user_city`, `user_born_date`, `user_register_date`) VALUES
(1, 'admin', 'clau.sarmasi@yahoo.com', 'm1X8Zi0Mna.png', '$2y$10$KrghzM4wRjedM2sxFabk7uq558Gdb7zbdWeYjpHnAt8LaMPEsONj2', 1, 'Claudiu', 'Sarmasi', '0762190393', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed ipsum vulputate, venenatis enim eget, mollis velit. Nulla non dolor accumsan, hendrerit tellus in, scelerisque magna. Sed elementum, elit eu accumsan consequat, nulla eros finibus diam, a varius risus neque vitae libero', 'Web Developer', 'Romania', 'Maramures', 'Baia Mare', '1590033600', '1593238400'),
(2, 'second', 'second@gmail.com', '', '$2y$10$rqG/tvVXBACJ0hgWbx9UQexdgjpsIXy3pLKLC2T/Z3bw.utREuYYW', 1, '', '', '', '', '', '', '', '', '', '1593240778'),
(4, 'admintest', 'test@yahoo.com', '', '$2y$10$rqG/tvVXBACJ0hgWbx9UQexdgjpsIXy3pLKLC2T/Z3bw.utREuYYW', 1, '', '', '', '', '', '', '', '', '', '1593240936'),
(5, 'admin2', '', '', '$2y$10$KrghzM4wRjedM2sxFabk7uq558Gdb7zbdWeYjpHnAt8LaMPEsONj2', 1, 'Ciprian', 'Popescu', '', 'is de trb', 'Web Junior Developer', '', '', '', '1436241600', '1593240966'),
(6, '', '', '', '', 2, '', '', '', '', '', '', '', '', '', '1593331435'),
(7, '', '', '', '', 2, '', '', '', '', '', '', '', '', '', '1593331589'),
(8, '', '', '', '', 2, '', '', '', '', '', '', '', '', '', '1593334278'),
(9, '', '', '', '', 2, '', '', '', '', '', '', '', '', '', '1593334297'),
(10, '', '', '', '', 2, '', '', '', '', '', '', '', '', '', '1593334338'),
(11, '', '', '', '', 2, '', '', '', '', '', '', '', '', '', '1593334355'),
(12, '', '', '', '', 2, '', '', '', '', '', '', '', '', '', '1593334417'),
(13, 'bulibasa', 'bulibasa@yahoo.com', '', '$2y$10$e6k4oWJTnZ6XjLksS8QG7.8V7bMzs0O7xcdh/VZQbuATExH/HHBPG', 1, '', '', '', '', '', '', '', '', '', '1593359543'),
(14, '', '', '', '', 2, '', '', '', '', '', '', '', '', '', '1593362556'),
(15, '', '', '', '', 2, '', '', '', '', '', '', '', '', '', '1593365812'),
(16, 'CostinCatalin', 'catalincostin995@gmail.com', 'WsPa7qIJxY.jpg', '$2y$10$ffGvkWjFYqe1l8d.Bxvqp.nnCb/aR3i/Xc43zxQBRsrakBnm/tGRi', 1, 'Catalin', 'Costin', '', '', 'Student', 'Romania', 'Maramures', 'Baia Mare', '', '1593374444'),
(17, 'costinpaul06', 'costin.paul@yahoo.com', '', '$2y$10$eba0v.F62l391h.9fpxLdOH2Y9uZi6kw3uIATIudU9hjgYWMv3w0e', 1, '', '', '', '', '', '', '', '', '', '1593439334'),
(18, '', '', '', '', 2, '', '', '', '', '', '', '', '', '', '1593441043'),
(19, 'TodeaTudor', 'tudortodea1415@gmail.com', '', '$2y$10$/W.F.992ZmakxFMJ6QKaWuQVrLLZX443wUKCS47dIRyoQKnEBb1um', 1, '', '', '', '', '', '', '', '', '', '1593443537'),
(20, 'DaddyStyle', 'simaciprian578@yahoo.com', '', '$2y$10$DxzF6j0doMNv6Vla9ANHL.bIVbfrQ2BB4RCTXnYyzIdbDNtvVdS1q', 1, '', '', '', '', '', '', '', '', '', '1593445824');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `qz_user_answers`
--

CREATE TABLE `qz_user_answers` (
  `us_answer_id` int(24) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_value` varchar(512) NOT NULL,
  `answer_date` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `qz_user_answers`
--

INSERT INTO `qz_user_answers` (`us_answer_id`, `user_id`, `quiz_id`, `question_id`, `answer_value`, `answer_date`) VALUES
(17, 5, 1, 23, '2', '1593329197'),
(16, 5, 1, 22, '2_5_6', '1593329197'),
(15, 5, 1, 21, 'Nu ma indur la nimeni!!', '1593329197'),
(14, 5, 1, 19, '3', '1593329197'),
(13, 5, 1, 1, '3', '1593329197'),
(18, 5, 1, 24, '1', '1593329197'),
(19, 5, 3, 25, 'Sper ca nu', '1593331088'),
(20, 5, 3, 29, '2', '1593331088'),
(21, 2, 1, 1, '2', '1593332569'),
(22, 2, 1, 19, '3', '1593332569'),
(23, 2, 1, 21, 'Nu ma indur la nimeni!!', '1593332569'),
(24, 2, 1, 22, '1', '1593332569'),
(25, 2, 1, 23, '2', '1593332569'),
(26, 2, 1, 24, '1', '1593332569'),
(27, 8, 1, 1, '3', '1593334288'),
(28, 8, 1, 19, '1', '1593334288'),
(29, 8, 1, 21, '0', '1593334288'),
(30, 8, 1, 22, '4_5', '1593334288'),
(31, 8, 1, 23, '1', '1593334288'),
(32, 8, 1, 24, '1', '1593334288'),
(33, 9, 1, 1, '3', '1593334312'),
(34, 9, 1, 19, '1', '1593334312'),
(35, 9, 1, 21, 'Nu ma indur la nimeni!!', '1593334312'),
(36, 9, 1, 22, '2_6', '1593334312'),
(37, 9, 1, 23, '1', '1593334312'),
(38, 9, 1, 24, '1', '1593334312'),
(39, 9, 2, 26, '0', '1593334331'),
(40, 9, 2, 27, '1', '1593334331'),
(41, 9, 2, 28, '1', '1593334331'),
(42, 10, 1, 1, '3', '1593334349'),
(43, 10, 1, 19, '4', '1593334349'),
(44, 10, 1, 21, 'Nu ma indur la nimeni!!', '1593334349'),
(45, 10, 1, 22, '1_5_6', '1593334349'),
(46, 10, 1, 23, '2', '1593334349'),
(47, 10, 1, 24, '1', '1593334349'),
(48, 11, 1, 1, '2', '1593334368'),
(49, 11, 1, 19, '3', '1593334368'),
(50, 11, 1, 21, 'Nu ma indur la nimeni!!', '1593334368'),
(51, 11, 1, 22, '2_5_6', '1593334368'),
(52, 11, 1, 23, '2', '1593334368'),
(53, 11, 1, 24, '1', '1593334368'),
(54, 12, 1, 1, '2', '1593334430'),
(55, 12, 1, 19, '3', '1593334430'),
(56, 12, 1, 21, 'Nu ma indur la nimeni!!', '1593334430'),
(57, 12, 1, 22, '2_4', '1593334430'),
(58, 12, 1, 23, '2', '1593334430'),
(59, 12, 1, 24, '1', '1593334430'),
(60, 1, 17, 30, '3', '1593364492'),
(61, 1, 17, 31, '1', '1593364492'),
(62, 1, 17, 41, 'One More Time', '1593364492'),
(63, 1, 17, 44, '2', '1593364492'),
(64, 1, 17, 54, 'Kanye', '1593364492'),
(65, 1, 17, 55, '3', '1593364492'),
(66, 1, 17, 63, 'Celine Dion', '1593364492'),
(67, 1, 17, 65, '1', '1593364492'),
(68, 1, 17, 67, '0', '1593364492'),
(69, 1, 17, 70, '3', '1593364492'),
(70, 1, 21, 73, '3', '1593364581'),
(71, 1, 21, 74, '3', '1593364581'),
(72, 1, 21, 75, '2', '1593364581'),
(73, 1, 21, 76, '2', '1593364581'),
(74, 1, 21, 77, '1', '1593364581'),
(75, 1, 21, 78, '1', '1593364581'),
(76, 1, 21, 79, '2', '1593364581'),
(77, 1, 21, 80, '3', '1593364581'),
(78, 1, 21, 81, '2', '1593364581'),
(79, 1, 21, 82, '2', '1593364581'),
(80, 15, 17, 30, '2', '1593365832'),
(81, 15, 17, 31, '2', '1593365832'),
(82, 15, 17, 41, 'asddsa', '1593365832'),
(83, 15, 17, 44, '2', '1593365832'),
(84, 15, 17, 54, 'asddsa', '1593365832'),
(85, 15, 17, 55, '1', '1593365832'),
(86, 15, 17, 63, 'asddsa', '1593365832'),
(87, 15, 17, 65, '3', '1593365832'),
(88, 15, 17, 67, 'asdsda', '1593365832'),
(89, 15, 17, 70, '2', '1593365832'),
(90, 16, 21, 73, '1', '1593374665'),
(91, 16, 21, 74, '4', '1593374665'),
(92, 16, 21, 75, '3', '1593374665'),
(93, 16, 21, 76, '4', '1593374665'),
(94, 16, 21, 77, '4', '1593374665'),
(95, 16, 21, 78, '1', '1593374665'),
(96, 16, 21, 79, '2', '1593374665'),
(97, 16, 21, 80, '4', '1593374665'),
(98, 16, 21, 81, '3', '1593374665'),
(99, 16, 21, 82, '1', '1593374665'),
(100, 16, 17, 30, '2', '1593375110'),
(101, 16, 17, 31, '1', '1593375110'),
(102, 16, 17, 41, 'asdasd', '1593375110'),
(103, 16, 17, 44, '1', '1593375110'),
(104, 16, 17, 54, 'asdas', '1593375110'),
(105, 16, 17, 55, '2', '1593375110'),
(106, 16, 17, 63, 'asd', '1593375110'),
(107, 16, 17, 65, '1', '1593375110'),
(108, 16, 17, 67, 'asd', '1593375110'),
(109, 16, 17, 70, '3', '1593375110'),
(110, 18, 25, 96, '2', '1593441056'),
(111, 18, 25, 97, '1', '1593441056'),
(112, 18, 25, 98, '0', '1593441056'),
(113, 18, 25, 99, '0', '1593441056'),
(114, 18, 25, 100, '1', '1593441056'),
(115, 18, 25, 101, '0', '1593441056'),
(116, 18, 25, 102, '0', '1593441056'),
(117, 18, 25, 103, '0', '1593441056'),
(118, 19, 21, 73, '4', '1593443798'),
(119, 19, 21, 74, '4', '1593443798'),
(120, 19, 21, 75, '1', '1593443798'),
(121, 19, 21, 76, '1', '1593443798'),
(122, 19, 21, 77, '4', '1593443798'),
(123, 19, 21, 78, '1', '1593443798'),
(124, 19, 21, 79, '2', '1593443798'),
(125, 19, 21, 80, '4', '1593443798'),
(126, 19, 21, 81, '1', '1593443798'),
(127, 19, 21, 82, '4', '1593443798'),
(128, 19, 25, 96, '1', '1593444041'),
(129, 19, 25, 97, '1', '1593444041'),
(130, 19, 25, 98, '4', '1593444041'),
(131, 19, 25, 99, '3', '1593444041'),
(132, 19, 25, 100, '2', '1593444041'),
(133, 19, 25, 101, '4', '1593444041'),
(134, 19, 25, 102, '2', '1593444041'),
(135, 19, 25, 103, '3', '1593444041'),
(136, 17, 27, 104, '3', '1593445836'),
(137, 17, 27, 105, '2', '1593445836'),
(138, 17, 27, 106, '1', '1593445836'),
(139, 17, 27, 107, '4', '1593445836'),
(140, 17, 27, 108, '1', '1593445836'),
(141, 20, 27, 104, '2', '1593445868'),
(142, 20, 27, 105, '2', '1593445868'),
(143, 20, 27, 106, '0', '1593445868'),
(144, 20, 27, 107, '3', '1593445868'),
(145, 20, 27, 108, '2', '1593445868'),
(146, 1, 27, 104, '1', '1593460423'),
(147, 1, 27, 105, '1', '1593460423'),
(148, 1, 27, 106, '1', '1593460423'),
(149, 1, 27, 107, '1', '1593460423'),
(150, 1, 27, 108, '1', '1593460423');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `qz_answers`
--
ALTER TABLE `qz_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexuri pentru tabele `qz_questions`
--
ALTER TABLE `qz_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexuri pentru tabele `qz_quizzes`
--
ALTER TABLE `qz_quizzes`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexuri pentru tabele `qz_scores`
--
ALTER TABLE `qz_scores`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexuri pentru tabele `qz_users`
--
ALTER TABLE `qz_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexuri pentru tabele `qz_user_answers`
--
ALTER TABLE `qz_user_answers`
  ADD PRIMARY KEY (`us_answer_id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `qz_answers`
--
ALTER TABLE `qz_answers`
  MODIFY `answer_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT pentru tabele `qz_questions`
--
ALTER TABLE `qz_questions`
  MODIFY `question_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT pentru tabele `qz_quizzes`
--
ALTER TABLE `qz_quizzes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pentru tabele `qz_scores`
--
ALTER TABLE `qz_scores`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `qz_users`
--
ALTER TABLE `qz_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `qz_user_answers`
--
ALTER TABLE `qz_user_answers`
  MODIFY `us_answer_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
