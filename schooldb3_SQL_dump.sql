-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 08:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooldb3`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `starts_at` varchar(255) NOT NULL,
  `participants_number` int(11) DEFAULT NULL,
  `seats_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `name`, `starts_at`, `participants_number`, `seats_number`) VALUES
(1, 'Math 12th', '2020-02-22 11:55:40', 79, 38),
(2, 'Science 6th', '2019-12-03 07:19:38', 78, 163),
(3, 'English 9th', '2020-05-29 22:20:33', NULL, NULL),
(4, 'Math 9th', '2020-05-17 12:37:29', 40, 192),
(5, 'Science 9th', '2020-01-16 23:25:26', 136, 118),
(6, 'Geography 12th', '2020-02-07 21:17:18', 116, 83),
(7, 'Science 7ht', '2020-05-30 04:59:50', NULL, NULL),
(8, 'Math 3rd', '2020-05-02 19:39:11', 169, 26),
(9, 'German 10th', '2020-01-15 20:28:10', 92, 192),
(10, 'Language day', '2020-02-16 01:25:56', 130, 27),
(11, 'German 9th', '2019-09-18 11:07:31', 70, 48),
(12, 'Physics 6th', '2019-09-15 01:19:11', 31, 15),
(13, 'Arts 7th', '2020-05-19 19:51:58', NULL, NULL),
(14, 'Physics 9th', '2019-11-20 22:09:20', 64, 96),
(15, 'Geography 5th', '2020-03-29 04:30:54', NULL, NULL),
(16, 'Arts 4th', '2020-01-12 03:59:45', 98, 172),
(17, 'Arts 9th', '2020-04-11 07:41:02', 195, 77),
(18, 'Geography 1st', '2020-04-28 15:19:59', 67, 89),
(19, 'Math 6th', '2019-09-17 19:53:21', 126, 156),
(20, 'English 11th', '2020-01-19 14:07:07', 16, 14),
(21, 'Movie night', '2020-03-18 17:50:04', NULL, NULL),
(22, 'Physics 11th', '2020-01-19 00:43:32', 165, 67),
(23, 'School dance', '2020-03-19 03:56:56', 114, 111),
(24, 'Science 4th', '2019-09-10 02:07:51', 132, 97),
(25, 'Math 8th', '2019-10-14 02:24:07', 183, 32),
(26, 'English 6th', '2020-04-18 11:28:43', 163, 18),
(27, 'Math 10th', '2019-12-05 15:16:35', NULL, NULL),
(28, 'Song contest', '2020-03-21 06:17:33', 29, 120),
(29, 'Dance 5th', '2020-02-24 16:19:40', NULL, NULL),
(30, 'English 2nd', '2020-03-20 09:07:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

CREATE TABLE `attend` (
  `activity_id` int(11) DEFAULT NULL,
  `pupil_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`activity_id`, `pupil_id`) VALUES
(5, 5),
(5, 7),
(11, 4),
(11, 6),
(15, 23),
(25, 8),
(25, 9),
(25, 10),
(25, 11),
(25, 12),
(29, 22),
(29, 23),
(15, 22),
(15, 23);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `release_year` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `age_group` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `genre`, `release_year`, `author`, `age_group`, `user_id`) VALUES
(101, 'Honeymoon in Vegas', 'Comedy|Romance', 2010, 'Meridel Penson', NULL, NULL),
(102, 'Another Cinderella Story', 'Children|Comedy|Musical|Romance', 1998, 'Sibyl Kindleside', NULL, NULL),
(103, 'Die Is Cast, The (La suerte está echada)', 'Comedy', 2004, 'Ermanno Excell', NULL, NULL),
(104, 'Tokyo Chorus (Tôkyô no kôrasu)', 'Comedy|Drama', 1993, 'Gavan Sisley', NULL, NULL),
(105, 'Café Metropole', 'Comedy|Drama|Romance', 2003, 'Brody Brabant', '13', NULL),
(106, 'Falls, The', 'Drama|Sci-Fi', 2001, 'Austen Vanyakin', NULL, NULL),
(107, 'Butterfly (La lengua de las mariposas)', 'Drama', 2010, 'Pietrek Cheng', '12', NULL),
(108, 'Eat a Bowl of Tea', 'Romance', 2007, 'Fifine Marzelo', '9', NULL),
(109, 'Escape from Suburbia: Beyond the American Dream', 'Documentary', 2009, 'Granny McDermid', '14', NULL),
(110, 'Letter From Death Row, A', 'Crime|Drama', 1971, 'Ulysses Tante', NULL, NULL),
(111, 'Beyond (Svinalängorna)', 'Drama', 1994, 'Linea Gristock', '11', NULL),
(112, 'Agenda: Grinding America Down', 'Documentary', 2004, 'Kristos Moyer', NULL, NULL),
(113, 'Home Alone 4', 'Children|Comedy|Crime', 1964, 'Dniren Killich', NULL, NULL),
(114, 'I Am a Sex Addict', 'Comedy|Documentary|Romance', 2010, 'Hewe Rubica', NULL, NULL),
(115, 'Perfectly Normal', 'Comedy', 1995, 'Elissa Niave', '11', NULL),
(116, 'Love Is a Woman (Death Is a Woman)', 'Crime|Drama|Mystery', 2003, 'Hillary Digger', '8', NULL),
(117, 'Safe House', 'Thriller', 1999, 'Shelia Rock', '15', NULL),
(118, 'Small Change (Argent de poche, L\')', 'Comedy|Drama', 1997, 'Maynard Faichney', NULL, NULL),
(119, 'Getaway', 'Action|Crime', 1993, 'Lucita Spiaggia', NULL, NULL),
(120, 'Black & White & Sex', 'Drama', 1993, 'Bertine Midlar', '14', NULL),
(121, 'Long Goodbye, The', 'Crime|Film-Noir', 1991, 'Janek Didsbury', '7', NULL),
(122, 'Black Cat, The', 'Adventure|Crime|Horror|Thriller', 1995, 'Trisha Curnnok', NULL, NULL),
(123, 'Black Sheep', 'Comedy|Horror', 2001, 'Del Fender', NULL, NULL),
(124, 'Hesher', 'Drama', 1998, 'Phineas Bown', NULL, NULL),
(125, 'Gozu (Gokudô kyôfu dai-gekijô: Gozu)', 'Comedy|Crime|Drama|Horror|Mystery', 1992, 'Arin Bronger', NULL, NULL),
(126, 'Other Side of Sunday, The (Søndagsengler)', 'Comedy|Drama', 2010, 'Rubi Rainer', NULL, NULL),
(127, 'Man from Earth, The', 'Drama|Sci-Fi', 2011, 'Barny Muxworthy', '19', NULL),
(128, 'Camilla', 'Adventure|Drama|Romance', 2001, 'Gaelan Constanza', '11', NULL),
(129, 'Last Blitzkrieg, The', 'Drama|War', 1998, 'Page Pullan', '7', NULL),
(130, 'The Golden Eye', 'Crime|Mystery|Thriller', 2012, 'Zara Incogna', '8', NULL),
(131, 'Take Care of My Cat (Goyangileul butaghae)', 'Drama', 2011, 'Catherin Bonallick', NULL, NULL),
(132, 'Simon Magus', 'Drama|Fantasy|Mystery|Romance', 2002, 'Lexi Hardware', '19', NULL),
(133, 'Dying at Grace', 'Documentary', 1996, 'Maren Gerbel', NULL, NULL),
(134, 'Hannah Arendt', 'Drama', 2007, 'Bond Rickerd', NULL, NULL),
(135, 'Roman de gare', 'Drama', 1992, 'Ugo Crossland', NULL, NULL),
(136, 'Meatballs Part II', 'Comedy', 1997, 'Yetta Harbison', '13', NULL),
(137, 'Behind Enemy Lines', 'Action|Drama|War', 1997, 'Lovell Spykins', NULL, NULL),
(138, 'O Último Mergulho', 'Drama', 2009, 'Bobbe Ewings', '10', NULL),
(139, 'Long Dark Hall, The', 'Crime|Drama', 1995, 'Griswold Test', NULL, NULL),
(140, 'Leather Jacket Love Story', 'Drama|Romance', 1986, 'Gavin Scuse', '16', NULL),
(141, 'Social Genocide (Memoria del saqueo)', 'Documentary', 1997, 'Willette Reeveley', '17', NULL),
(142, 'Love Potion #9', 'Comedy|Romance', 2005, 'Kordula Caen', NULL, NULL),
(143, 'W.R.: Mysteries of the Organism', 'Comedy|Documentary', 1998, 'Derek Laker', '8', NULL),
(144, 'Reader, The', 'Drama|Romance', 2000, 'Reggi Hance', NULL, NULL),
(145, 'Feuer, Eis & Dosenbier', 'Comedy', 2001, 'Manuel Mathewson', NULL, NULL),
(146, '50 Children: The Rescue Mission of Mr. And Mrs. Kraus', 'Documentary', 2005, 'Matthieu Durn', NULL, NULL),
(147, 'Gorky Park', 'Crime|Drama|Thriller', 1999, 'Emmalee Sanbrook', NULL, NULL),
(148, 'Fight, Zatoichi, Fight (Zatôichi kesshô-tabi) (Zatôichi 8)', 'Action|Adventure|Comedy|Drama', 2007, 'Mabelle Sives', NULL, NULL),
(149, 'Weight of Water, The', 'Thriller', 2010, 'Lola Wissbey', '7', NULL),
(150, 'Rules of Single Life (Sinkkuelämän säännöt)', 'Documentary', 1985, 'Lefty Clamo', '13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `employee_id`) VALUES
(1, '8b', 14),
(2, '9a', 13),
(3, '5c', 12),
(4, '7b', 10),
(5, '10a', 8),
(6, '11b', 6),
(7, '6a', 5),
(8, '5b', 4),
(9, '7c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `employed_at` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `role`, `employed_at`, `user_id`) VALUES
(1, 'teacher', '1/9/2015', 1),
(2, 'janitor', '1/9/2018', 2),
(3, 'administration', '4/5/2010', 3),
(4, 'teacher', '11/4/2012', 4),
(5, 'teacher', '10/9/2013', 5),
(6, 'teacher', '4/11/2014', 6),
(7, 'administration', '1/6/2014', 7),
(8, 'teacher', '21/6/2016', 8),
(9, 'janitor', '30/11/2015', 9),
(10, 'teacher', '14/1/2016', 10),
(11, 'administration', '28/10/2018', 11),
(12, 'teacher', '1/9/2016', 12),
(13, 'teacher', '24/5/2013', 13),
(14, 'teacher', '15/1/2013', 14),
(15, 'administration', '22/7/2014', 15);

-- --------------------------------------------------------

--
-- Table structure for table `event_`
--

CREATE TABLE `event_` (
  `id` int(11) NOT NULL,
  `is_internal` tinyint(1) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `price` float DEFAULT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_`
--

INSERT INTO `event_` (`id`, `is_internal`, `organizer`, `price`, `activity_id`) VALUES
(1, 0, 'employee', 9, 10),
(2, 1, 'pupils', 7, 21),
(3, 0, 'employee', 3, 23);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `need_computers` tinyint(1) NOT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `need_computers`, `activity_id`) VALUES
(1, 0, 1),
(2, 0, 2),
(3, 1, 3),
(4, 0, 4),
(5, 0, 5),
(6, 1, 6),
(7, 0, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 11),
(11, 1, 12),
(12, 0, 13),
(13, 1, 14),
(14, 0, 15),
(15, 1, 16),
(16, 0, 17),
(17, 0, 18),
(18, 0, 19),
(19, 1, 20),
(20, 0, 22),
(21, 1, 24),
(22, 0, 25),
(23, 1, 26),
(24, 0, 27),
(26, 0, 29),
(27, 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `organize`
--

CREATE TABLE `organize` (
  `activity_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organize`
--

INSERT INTO `organize` (`activity_id`, `employee_id`) VALUES
(1, 12),
(2, 1),
(3, 4),
(4, 14),
(5, 1),
(6, 8),
(7, 4),
(8, 8),
(9, 14),
(10, 6),
(11, 5),
(12, 14),
(13, 13),
(14, 12),
(15, 10),
(16, 8),
(17, 6),
(18, 5),
(19, 4),
(20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `placeclassroom`
--

CREATE TABLE `placeclassroom` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `has_computers` tinyint(1) NOT NULL,
  `tables_number` int(11) DEFAULT NULL,
  `has_projector` tinyint(1) DEFAULT NULL,
  `chairs_number` int(11) DEFAULT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `placeclassroom`
--

INSERT INTO `placeclassroom` (`id`, `name`, `has_computers`, `tables_number`, `has_projector`, `chairs_number`, `activity_id`) VALUES
(1, '125a', 0, 10, 1, 21, 15),
(2, '101', 0, 10, 1, 30, 15),
(3, '311', 0, 10, 0, 30, 14),
(4, 'main hall', 0, 2, 1, 150, 10),
(5, '125a', 0, 10, 1, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pupil`
--

CREATE TABLE `pupil` (
  `id` int(11) NOT NULL,
  `enrolled_at` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `pupil_representative_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pupil`
--

INSERT INTO `pupil` (`id`, `enrolled_at`, `user_id`, `class_id`, `pupil_representative_id`) VALUES
(1, '1/9/2013', 19, 6, 15),
(2, '1/9/2014', 21, 6, 3),
(3, '1/9/2014', 25, 5, 5),
(4, '1/9/2015', 30, 2, 20),
(5, '1/9/2016', 32, 2, 19),
(6, '1/9/2016', 34, 2, 18),
(7, '1/9/2016', 36, 2, 17),
(8, '1/9/2015', 38, 1, 16),
(9, '1/9/2017', 16, 1, 15),
(10, '1/9/2017', 23, 1, 14),
(11, '1/9/2017', 29, 1, 13),
(12, '1/9/2017', 31, 1, 12),
(13, '1/9/2018', 18, 9, 11),
(14, '1/9/2018', 22, 4, 10),
(15, '1/9/2018', 27, 9, 9),
(16, '1/9/2019', 35, 4, 8),
(17, '1/9/2019', 17, 4, 7),
(18, '1/9/2019', 20, 9, 6),
(19, '1/9/2019', 26, 9, 5),
(20, '1/9/2019', 28, 7, 4),
(21, '1/9/2020', 24, 7, 3),
(22, '1/9/2019', 33, 3, 2),
(23, '1/9/2020', 37, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pupil_representative`
--

CREATE TABLE `pupil_representative` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pupil_representative`
--

INSERT INTO `pupil_representative` (`id`, `name`, `surname`, `phone_number`, `address`, `birthdate`) VALUES
(1, 'Norry', 'Arkow', '6979797367', '671 Autumn Leaf Parkway', '9/4/1980'),
(2, 'Bathsheba', 'Rocco', '6965409622', '63647 Mendota Point', '10/12/1976'),
(3, 'Ailey', 'Catt', '5186407566', '76296 Eggendart Plaza', '27/3/1986'),
(4, 'Lynett', 'Chartre', '1922120861', '097 Nelson Pass', '25/2/1987'),
(5, 'Erl', 'O\'Crevan', '8215311216', '921 Almo Road', '26/11/1977'),
(6, 'Chariot', 'Thumann', '2541668201', '1316 Erie Drive', '29/3/1982'),
(7, 'Jany', 'Lighterness', '3891422433', '91 Golf Course Place', '27/2/1978'),
(8, 'Carlita', 'Hutsby', '2604279912', '0 Crescent Oaks Parkway', '1/8/1988'),
(9, 'Bonnie', 'Broggini', '3349616986', '3 Westport Alley', '28/11/1979'),
(10, 'Birch', 'Ziemecki', '1956222774', '2564 Michigan Terrace', '9/3/1979'),
(11, 'Dana', 'Jachimczak', '9323795734', '2 Pond Drive', '14/12/1974'),
(12, 'Veda', 'Patrono', '1343031376', '941 Mariners Cove Court', '17/6/1980'),
(13, 'Marvin', 'Doy', '1031692854', '4 Harbort Parkway', '14/3/1970'),
(14, 'Hilliary', 'Ledington', '6962557275', '52572 Beilfuss Lane', '17/12/1988'),
(15, 'Nyssa', 'Delacroix', '6158278796', '4762 Acker Drive', '3/10/1977'),
(16, 'Burl', 'Foale', '9033682579', '7 Doe Crossing Drive', '2/5/1984'),
(17, 'Gustav', 'Rowbrey', '4964040541', '5758 Buhler Pass', '28/4/1979'),
(18, 'Borden', 'Vallis', '4565376201', '8642 Buena Vista Hill', '19/2/1975'),
(19, 'Booth', 'Cuckoo', '1847650158', '68674 Badeau Alley', '28/5/1986'),
(20, 'Rakel', 'Pack', '4742725855', '70 Dixon Drive', '1/4/1982');

-- --------------------------------------------------------

--
-- Table structure for table `user_`
--

CREATE TABLE `user_` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_`
--

INSERT INTO `user_` (`id`, `name`, `surname`, `birth_date`, `account_type`, `created_at`, `sex`) VALUES
(1, 'Janis', 'Coxon', '1/9/1991', 'employee', '1/9/2015', 'male'),
(2, 'Lynett', 'Macklam', '27/8/1986', 'employee', '1/9/2018', 'female'),
(3, 'Carroll', 'Pepis', '2/3/1990', 'employee', '1/9/2019', 'female'),
(4, 'Jennilee', 'Barttrum', '19/6/1977', 'employee', '1/9/2018', 'female'),
(5, 'Creigh', 'Hawkshaw', '28/5/1977', 'employee', '1/9/2018', 'male'),
(6, 'Candice', 'Gallon', '1/5/1985', 'employee', '1/9/2016', 'female'),
(7, 'Verina', 'Vedeniktov', '13/6/1961', 'employee', '25/12/2015', 'female'),
(8, 'Tracee', 'Marion', '13/3/1972', 'employee', '27/12/2017', 'male'),
(9, 'Tamar', 'Isack', '8/2/1985', 'employee', '1/9/2016', 'male'),
(10, 'Ellyn', 'MacGinlay', '9/7/1987', 'employee', '15/4/2019', 'female'),
(11, 'Laurice', 'Naul', '13/5/1986', 'employee', '28/10/2018', 'female'),
(12, 'Aeriela', 'Kingswood', '27/7/1981', 'employee', '1/9/2016', 'male'),
(13, 'Francis', 'Casaju', '16/2/1985', 'employee', '1/9/2020', 'female'),
(14, 'Tersina', 'Lawleff', '3/1/1977', 'employee', '1/9/2017', 'female'),
(15, 'Maynard', 'Scaife', '25/12/1986', 'employee', '1/9/2017', 'male'),
(16, 'Nita', 'Blaylock', '15/10/2009', 'pupil', '1/9/2017', 'female'),
(17, 'Rafaelia', 'Padkin', '14/12/2011', 'pupil', '1/9/2019', 'female'),
(18, 'Farrah', 'Dowbekin', '2/12/2011', 'pupil', '1/9/2018', 'male'),
(19, 'Myra', 'Penke', '6/8/2005', 'pupil', '1/9/2013', 'female'),
(20, 'Aretha', 'Cosyns', '24/10/2011', 'pupil', '1/9/2019', 'female'),
(21, 'Anya', 'Stoffers', '13/7/2007', 'pupil', '1/9/2014', 'female'),
(22, 'Melen', 'Stickels', '24/5/2010', 'pupil', '1/9/2018', 'male'),
(23, 'Moll', 'Grogan', '23/7/2010', 'pupil', '1/9/2017', 'female'),
(24, 'Ewen', 'Shackelton', '22/6/2013', 'pupil', '1/9/2020', 'male'),
(25, 'Cornelia', 'Gorham', '21/2/2007', 'pupil', '1/9/2015', 'female'),
(26, 'Cullie', 'Berks', '28/1/2010', 'pupil', '1/9/2019', 'female'),
(27, 'Sergeant', 'Charlon', '11/8/2007', 'pupil', '1/9/2018', 'female'),
(28, 'Morty', 'Gotobed', '31/12/2012', 'pupil', '1/9/2019', 'female'),
(29, 'Kayne', 'Bodehey', '31/1/2009', 'pupil', '1/9/2017', 'male'),
(30, 'Shermie', 'Nan Carrow', '9/5/2009', 'pupil', '1/9/2016', 'female'),
(31, 'Cullie', 'Stickels', '4/7/2010', 'Pupil', '1/9/2017', 'female'),
(32, 'Moll', 'Grogan', '2/7/2007', 'Pupil', '1/9/2016', 'male'),
(33, 'Ewein', 'Shahckelton', '22/9/2013', 'Pupil', '1/9/2020', 'female'),
(34, 'Moise', 'Gorham', '2/6/2007', 'Pupil', '1/9/2016', 'female'),
(35, 'Cullies', 'Bohey', '8/5/2010', 'Pupil', '1/9/2018', 'male'),
(36, 'Moises', 'Charlon', '1/10/2007', 'Pupil', '1/9/2016', 'female'),
(37, 'Morts', 'Shackelton', '15/2/2013', 'Pupil', '1/9/2020', 'male'),
(38, 'Kayne', 'Bodhey', '3/5/2010', 'Pupil', '1/9/2016', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
  ADD KEY `attend` (`activity_id`),
  ADD KEY `attend2` (`pupil_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `has` (`user_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manages` (`employee_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `event_`
--
ALTER TABLE `event_`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `activity_id` (`activity_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `activity_id` (`activity_id`);

--
-- Indexes for table `organize`
--
ALTER TABLE `organize`
  ADD PRIMARY KEY (`activity_id`,`employee_id`);

--
-- Indexes for table `placeclassroom`
--
ALTER TABLE `placeclassroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `takes_place_in` (`activity_id`);

--
-- Indexes for table `pupil`
--
ALTER TABLE `pupil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `contains_` (`class_id`),
  ADD KEY `represent` (`pupil_representative_id`);

--
-- Indexes for table `pupilRepresentative`
--
ALTER TABLE `pupil_representative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `event_`
--
ALTER TABLE `event_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `placeclassroom`
--
ALTER TABLE `placeclassroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pupil`
--
ALTER TABLE `pupil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pupilRepresentative`
--
ALTER TABLE `pupil_representative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_`
--
ALTER TABLE `user_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attend`
--
ALTER TABLE `attend`
  ADD CONSTRAINT `attend` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attend2` FOREIGN KEY (`pupil_id`) REFERENCES `pupil` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `has` FOREIGN KEY (`user_id`) REFERENCES `user_` (`id`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `manages` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_` (`id`);

--
-- Constraints for table `event_`
--
ALTER TABLE `event_`
  ADD CONSTRAINT `event__ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`);

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`);

--
-- Constraints for table `organize`
--
ALTER TABLE `organize`
  ADD CONSTRAINT `organize` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `placeclassroom`
--
ALTER TABLE `placeclassroom`
  ADD CONSTRAINT `takes_place_in` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`);

--
-- Constraints for table `pupil`
--
ALTER TABLE `pupil`
  ADD CONSTRAINT `contains_` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `pupil_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_` (`id`),
  ADD CONSTRAINT `represent` FOREIGN KEY (`pupil_representative_id`) REFERENCES `pupil_representative` (`id`)  ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@O+LD_COLLATION_CONNECTION */;
