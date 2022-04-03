-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 02:41 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `A_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`A_ID`, `name`, `price`, `description`, `address`) VALUES
(1, 'Kalemgdan', 0, 'The Kalemegdan Park or simply Kalemegdan is the largest park and the most important historical monument in Belgrade. It is located on a 125-metre-high (410 ft) cliff, at the junction of the River Sava and the Danube. Its name is formed from the two Turkish words: Kale (meaning \"fortress\") and archaic word of Turkish origin megdan (meaning \"battlefield\").', 'Kalemegdan bb \n'),
(2, 'Skadarlija', 0, 'Skadarlija  is a vintage street, an urban neighborhood and former municipality of Belgrade, Serbia. It is located in the Belgrade municipality of Stari Grad (Old Town).\n', 'Skadarlija '),
(3, 'Belgrade fortress', 10, 'The Belgrade Fortress, consists of the old citadel (Upper and Lower Town) and Kalemegdan Park (Large and Little Kalemegdan) on the confluence of the Sava and Danube rivers, in an urban area of modern Belgrade, Serbia. ', 'Šumadinska Ulica'),
(4, 'Nikola Tesla Museum', 15, 'The Nikola Tesla Museum is a science museum located in the central area of Belgrade, Serbia. It is dedicated to honoring and displaying the life and work of Nikola Tesla as well as the final resting place for Tesla. It holds more than 160,000 original documents, over 2,000 books and journals, over 1,200 historical technical exhibits, over 1,500 photographs and photo plates of original, technical objects, instruments and apparatus, and over 1,000 plans and drawings.\n', 'Krunska 51\n'),
(5, 'Ban Jelacic Square', 0, 'Ban Jelačić Square is the central square of the city of Zagreb, Croatia, named after Ban Josip Jelačić. The official name is Trg bana Jelačića. The square is colloquially called Jelačić plac.\n', 'Donji Grad 45'),
(6, 'Maksimir Park', 20, 'Maksimir Park is the oldest public park in Zagreb, Croatia. It forms part of the city\'s cultural heritage and is a habitat for many different plant and animal species.\n', 'Maksimirski Perivor 55'),
(7, 'Zagreb Club', 50, 'The Zagreb Club is the most popular night club in Zagreb. We guarantee you great experience with amazing music.', 'Runjaninova 3\n');

-- --------------------------------------------------------

--
-- Table structure for table `arrangement`
--

CREATE TABLE `arrangement` (
  `Ar_ID` int(11) NOT NULL,
  `events` int(11) NOT NULL,
  `catering_facility` int(11) NOT NULL,
  `transport` int(11) DEFAULT NULL,
  `cities` int(11) NOT NULL,
  `isCanceled` tinyint(1) DEFAULT NULL,
  `priceOfFacility` double NOT NULL,
  `priceOfTransport` double DEFAULT NULL,
  `priceOfEvent` double NOT NULL,
  `profit` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `trending` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arrangement`
--

INSERT INTO `arrangement` (`Ar_ID`, `events`, `catering_facility`, `transport`, `cities`, `isCanceled`, `priceOfFacility`, `priceOfTransport`, `priceOfEvent`, `profit`, `description`, `picture`, `trending`) VALUES
(1, 1, 1, 3, 1, 0, 300, 200, 50, 100, 'The Croatian representative from Athens’ Eurovision, Severina is currently on a local tour called The Magic Tour. After a concert in her hometown Split, the next stop was Zagreb and home of the 53rd Eurovision Song Contest. ', 'img_3.png', 1),
(2, 2, 2, 1, 1, 0, 400, 100, 50, 50, 'One of the biggest music stars of this area, on 25.12.2018. will play and entertain the audience at the Revelin Culture Club.\n\nWith her energetic performances, she became a symbol of positive energy and elegance.\n', 'img_2.png', NULL),
(3, 4, 1, 3, 1, 0, 300, 150, 200, 350, 'Rihanna, byname of Robyn Rihanna Fenty, (born February 20, 1988, St. Michael parish, Barbados), Barbadian pop and rhythm-and-blues (R&B) singer who became a worldwide star in the early 21st century, known for her distinctive and versatile voice and for her fashionable appearance. She was also known for her beauty and fashion lines.\n', 'img.png', 1),
(4, 5, 7, 1, 1, 0, 250, 150, 300, 100, 'Beyoncé, in full Beyoncé Giselle Knowles, (born September 4, 1981, Houston, Texas, U.S.), American singer-songwriter and actress who achieved fame in the late 1990s as the lead singer of the R&B group Destiny’s Child and then launched a hugely successful solo career.\n', 'img_1.png', 0),
(6, 8, 10, 2, 2, 0, 100, 150, 50, 50, 'Marija Šerifović was born 14 November 1984 is a Serbian singer and record producer. She won the 2007 Eurovision Song Contest for Serbia with \"Molitva\", and is to date Serbia\'s only Eurovision winner. Since 2015, she has been a judge on televised singing competition Zvezde Granda.\n', 'img_5.png', NULL),
(7, 9, 9, 13, 2, 0, 350, 100, 25, 40, 'Partizan was founded by young high officers of the Yugoslav People\'s Army in 1945 in Belgrade, as part of the Yugoslav Sports Association Partizan. Their home ground is the Partizan Stadium in Belgrade, where they have played since 1949. Partizan holds records such as playing in the first European Champions Cup match on 4 September, 1955, as well as becoming the first Balkan and Eastern European football club to reach the European Champions Cup final.\n', 'img_6.png', NULL),
(8, 11, 9, 13, 2, 0, 350, 100, 30, 40, 'Partizan was founded by young high officers of the Yugoslav People\'s Army in 1945 in Belgrade, as part of the Yugoslav Sports Association Partizan. Their home ground is the Partizan Stadium in Belgrade, where they have played since 1949. Partizan holds records such as playing in the first European Champions Cup match on 4 September, 1955, as well as becoming the first Balkan and Eastern European football club to reach the European Champions Cup final.\n', 'img_7.png', 1),
(9, 18, 5, 2, 2, 0, 100, 200, 50, 30, 'Fudbalski klub Crvena zvezda, better known simply as Crvena zvezda or, internationally, as Red Star Belgrade, is a Serbian professional football club based in Belgrade.They are the only Serbian and Yugoslav club to have won the European Cup, having done so in 1991, and the only team to have won the Intercontinental Cup, also in 1991. With 32 national championships, 25 national cups, 2 national supercups and one league cup between Serbian and Yugoslav competitions, Red Star was the most successful club in Yugoslavia and finished first in the Yugoslav First League all-time table, and is the most successful club in Serbia. \n', 'img_9.png', NULL),
(10, 13, 10, 13, 2, 0, 30, 40, 25, 40, 'Košarkaški klub Partizan, commonly referred to as KK Partizan or simply Partizan, is a men\'s professional basketball club based in Belgrade, Serbia. It is part of the multi-sports Belgrade-based club Partizan. The club is a founding member and shareholder of the Adriatic Basketball Association, and competes in the ABA League, the EuroCup and in the Basketball League of Serbia.\n', 'img_10.png', NULL),
(11, 14, 5, 13, 2, 0, 40, 40, 25, 40, 'Košarkaški klub Crvena zvezda , commonly referred to as KK Crvena zvezda mts for sponsorship reasons or simply Crvena zvezda, is a men\'s professional basketball club based in Belgrade, Serbia, the major part of the Red Star multi-sports club. The club is a founding member and shareholder of the Adriatic Basketball Association, and competes in the Serbian League (KLS), the ABA League, and the top-tier Europe-wide EuroLeague. Crvena zvezda mts use Aleksandar Nikolić Hall for most of their home games.\n', 'img_8.png', NULL),
(12, 23, 7, 14, 1, 0, 150, 170, 40, 70, 'Građanski nogometni klub Dinamo Zagreb commonly referred to as GNK Dinamo Zagreb or simply Dinamo Zagreb is a Croatian professional football club based in Zagreb. The club is the successor of 1. HŠK Građanski, which had been founded in 1911, disbanded in 1945 and replaced by the newly founded Dinamo Zagreb. They play their home matches at Stadion Maksimir. They are the most successful club in Croatian football, having won twenty-two Prva HNL titles, sixteen Croatian Cups and six Croatian Super Cups. \n', 'img_11.png', 1),
(13, 24, 8, 14, 1, 0, 120, 170, 40, 70, 'Građanski nogometni klub Dinamo Zagreb commonly referred to as GNK Dinamo Zagreb or simply Dinamo Zagreb is a Croatian professional football club based in Zagreb. The club is the successor of 1. HŠK Građanski, which had been founded in 1911, disbanded in 1945 and replaced by the newly founded Dinamo Zagreb. They play their home matches at Stadion Maksimir. They are the most successful club in Croatian football, having won twenty-two Prva HNL titles, sixteen Croatian Cups and six Croatian Super Cups. \n', 'img_12.png', NULL),
(14, 17, 10, 13, 2, 0, 100, 40, 10, 30, 'Amar Hodžić, known by his stage name Buba Corelli, is a Bosnian rapper and hip-hop recording artist, songwriter, record producer and entrepreneur. He is best known for his collaborative efforts with Jala Brat, with whom he also founded their record label Imperia. Outside of his own musical career, Buba Corelli has also attained significant success as a producer working for well known regional artists such as Maya Berović, Milan Stanković and Severina.\n', 'img_13.png', 1),
(15, 16, 5, 15, 2, 0, 70, 50, 40, 50, 'Aleksandar Vuksanović, better known by his stage name Aca Lukas, is a Serbian pop-folk singer. He rose to prominence in Belgrade\'s night club scene during the early nineties by performing various genres, from jazz to Gypsy music, before joining rock musician Viktorija and her band.\n', 'img_14.png', NULL);

--
-- Triggers `arrangement`
--
DELIMITER $$
CREATE TRIGGER `checkIfValidDate` BEFORE INSERT ON `arrangement` FOR EACH ROW BEGIN
     IF((select departureTime from transport where T_ID = new.transport)>(select time from events where E_ID = new.events) || (select arrivalTime from transport where T_ID = new.transport)<(select time from events where E_ID = new.events))
    then SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Please enter a valid data" ; END IF; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `catering_facilities`
--

CREATE TABLE `catering_facilities` (
  `CF_ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `breakfast` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catering_facilities`
--

INSERT INTO `catering_facilities` (`CF_ID`, `name`, `type`, `address`, `contact`, `country`, `breakfast`) VALUES
(1, 'Marriott', 'Hotel', 'Banjaloska ulica 3', '061234234', 'Cro', 1),
(2, 'Central Hotel', 'Hotel', 'Banatski Odvojak 4', '061232122', 'Cro', 1),
(3, 'Grand Hotel', 'Hotel', 'Juraja Najthartav15', '061829212', 'B&H', 1),
(4, 'Apartmani Nikšić', 'Apartment', 'Sutjeska 15', '061987982', 'B&H', 0),
(5, 'Pansion LASTA', 'Pansion', 'Hamze Cizmića 15', '061876273', 'Srb', 0),
(6, 'Efsa', 'Motel', 'Vase Čerapića 3', '061899238', 'Srb', 1),
(7, 'Hilton', 'Hotel', 'Vukovarska Ulica 7', '067897564', 'Cro', 0),
(8, 'Jadran', 'Motel', 'Ulica Antuna Mihanovuića 18', '061567324', 'Cro', 0),
(9, 'Belgrade Hotel', 'Hotel', 'Ulica Terazije 23', '061789678', 'Srb', 1),
(10, 'Habitat', 'Hostel', 'Knez Miloš 4', '061898654', 'Srb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `City_ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`City_ID`, `name`, `country`, `zipcode`) VALUES
(1, 'Zagreb', 'Cro', '10000'),
(2, 'Beograd', 'Srb', '11000'),
(3, 'Niš', 'Srb', '18204');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `C_ID` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `arrangement` int(11) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`C_ID`, `user`, `arrangement`, `Date`) VALUES
(61, 2, 1, '2020-08-18'),
(67, 53, 14, '2020-10-13'),
(68, 53, 7, '2020-11-24'),
(69, 53, 11, '2021-12-15'),
(70, 53, 6, '2021-06-08'),
(71, 57, 14, '2021-12-14'),
(72, 57, 8, '2021-06-08'),
(73, 57, 10, '2019-06-14'),
(74, 57, 7, '2021-06-08'),
(75, 57, 3, '2019-06-08'),
(76, 58, 12, '2021-06-08'),
(77, 58, 8, '2021-06-08'),
(78, 58, 14, '2021-06-08'),
(79, 58, 15, '2021-06-08'),
(80, 58, 13, '2021-06-08'),
(81, 58, 3, '2021-06-08'),
(82, 58, 9, '2021-06-08'),
(84, 58, 6, '2020-06-08'),
(85, 2, 12, '2021-06-08'),
(86, 2, 8, '2021-06-08'),
(87, 2, 14, '2021-06-08'),
(88, 2, 15, '2021-06-08'),
(89, 2, 10, '2021-06-08'),
(90, 1, 6, '2021-06-08'),
(91, 60, 1, '2021-06-10'),
(94, 1, 12, '2021-06-12'),
(96, 1, 3, '2021-06-13'),
(99, 1, 8, '2021-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `E_ID` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `available_tickets` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`E_ID`, `type`, `place`, `time`, `available_tickets`, `address`, `Name`) VALUES
(1, 'Concert', 'H20', '2021-12-02', 96, 'Runjaninova 3\n', 'Severina Kojić'),
(2, 'Concert', 'H20', '2021-12-03', 100, 'Runjaninova 3\n', 'Jelena Rozga'),
(3, 'Concert', 'H20', '2021-09-08', 100, 'Runjaninova 3\n', 'Maja Šuput'),
(4, 'Concert', 'Arena Zagreb', '2021-12-01', 1996, 'Vice Vukova 6\n\n', 'Rihanna'),
(5, 'Concert', 'Arena Zagreb', '2021-09-01', 1995, 'Vice Vukova 6\n', 'Beyonce'),
(6, 'Concert', 'Arena Zagreb', '0000-00-00', 2001, 'Vice Vukova 6', 'Justin Bieber'),
(7, 'Concert', 'TasMajdan', '2021-12-03', 2998, 'Vase Čarapića 5', 'Jelena Karleuša'),
(8, 'Concert', 'TasMajdan', '2021-09-12', 2996, 'Vase Čarapića 5', 'Marija Šerifović'),
(9, 'Football Game', 'Partizan Stadium', '2021-10-07', 2498, NULL, 'Partizan-Manchester United'),
(10, 'Football Game', 'Partizan Stadium', NULL, 2500, NULL, 'Partizan-FK Sarajevo'),
(11, 'Football Game', 'Partizan Stadium', '2021-10-02', 2400, '', 'Partizan-Slavia Prague'),
(12, 'Basketball Game', 'Arena Zagreb', NULL, 2499, 'Vice Vukova 6\n', 'Cedevita-Zagreb'),
(13, 'Basketball Game', 'Stark Arena', '2021-10-04', 2497, 'Bulevar Arsenija Čarnojevica 58\n', 'Crvena Zvezda-EFES'),
(14, 'Basketball Game', 'Stark Arena', '2021-10-06', 2399, 'Bulevar Arsenija Čarnojevica 58', 'Partizan-Real Madrid'),
(15, 'Football Game', 'Partizan Stadium', NULL, 2500, NULL, 'Partizan-Arsenal'),
(16, 'Concert', 'Stark Arena', '2021-12-17', 148, 'Bulevar Arsenija Čarnojevica 58\n', 'Aca Lukas'),
(17, 'Concert', 'Stark Arena', '2021-10-05', 146, 'Bulevar Arsenija Čarnojevica 58\n', 'Jala Brat & Buba Corelli & Inas'),
(18, 'Football Game', 'Marakana', '2021-09-13', 999, NULL, 'Crvena Zvezda-Liverpool'),
(19, 'Football Game', 'Marakana', '2021-12-03', 1000, NULL, 'Crvena Zvezda-Bayern Munchen'),
(20, 'Football Game', 'Marakana', NULL, 1000, NULL, 'Crvena Zvezda-West Ham'),
(22, 'Football Game', 'Marakana', NULL, 1000, NULL, 'Crvena Zvezda-Milan'),
(23, 'Football Game', 'Maksimir', '2021-12-02', 2497, NULL, 'Dinamo Zagreb-Inter'),
(24, 'Football Game', 'Maksimir', '2021-12-06', 2499, NULL, 'Dinamo Zagreb-Juventus');

-- --------------------------------------------------------

--
-- Table structure for table `rec_activities`
--

CREATE TABLE `rec_activities` (
  `R_ID` int(11) NOT NULL,
  `Activity` int(11) NOT NULL,
  `Cities` int(11) NOT NULL,
  `Distance` double DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rec_activities`
--

INSERT INTO `rec_activities` (`R_ID`, `Activity`, `Cities`, `Distance`, `Rating`) VALUES
(1, 1, 2, 0, NULL),
(2, 2, 2, 0, NULL),
(3, 3, 2, 0, NULL),
(4, 4, 2, 0, NULL),
(5, 5, 1, 0, NULL),
(6, 6, 1, 0, NULL),
(7, 7, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `T_ID` int(11) NOT NULL,
  `startPlace` varchar(100) NOT NULL,
  `endPlace` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `departureTime` datetime NOT NULL,
  `arrivalTime` date NOT NULL,
  `company` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`T_ID`, `startPlace`, `endPlace`, `type`, `departureTime`, `arrivalTime`, `company`) VALUES
(1, 'Sarajevo', 'Zagreb', 'Bus', '0000-00-00 00:00:00', '2021-09-03', 'Centrotrans'),
(2, 'Sarajevo', 'Beograd', 'Airplane', '2021-09-10 11:00:00', '2021-09-15', 'Wizz Air'),
(3, 'Sarajevo', 'Zagreb', 'Airplane', '2021-11-30 13:00:00', '2021-12-05', 'Wizz Air'),
(7, 'Tuzla', 'Zagreb', 'Bus', '2021-08-01 10:00:15', '2021-08-07', 'Biss Tours'),
(8, 'Tuzla', 'Zagreb', 'Airplane', '2021-08-03 10:00:00', '2021-08-08', 'Fly Croatia1'),
(9, 'Tuzla', 'Zagreb', 'Train', '2021-08-30 15:30:00', '2021-09-06', 'Talgo'),
(13, 'Sarajevo', 'Beograd', 'Bus', '2021-10-01 14:00:10', '2021-10-10', 'Lasta Tours'),
(14, 'Sarajevo', 'Zagreb', 'Airplane', '2021-12-01 17:00:00', '2021-12-08', 'Fly Bosnia'),
(15, 'Sarajevo', 'Beograd', 'Bus', '2021-12-15 09:00:00', '2021-12-20', 'Hare Tours'),
(21, 'Sarajevo', 'Zagreb', 'Train', '2021-11-01 20:45:00', '2021-12-30', 'Fly Croatia1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Fname` varchar(255) DEFAULT NULL,
  `Lname` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `accountNumber` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `expiryDate` date DEFAULT NULL,
  `securityCode` varchar(10) DEFAULT NULL,
  `U_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Fname`, `Lname`, `Mail`, `contact`, `city`, `country`, `DOB`, `accountNumber`, `password`, `expiryDate`, `securityCode`, `U_ID`) VALUES
('Amar', 'Sose', 'amar.sose@stu.ssst.edu.ba', '387-61-111-111', 'Sarajevo', 'BiH     ', '2000-05-16', '11111111111178', 'Amar1234', '2022-05-16', '111', 1),
('Irfan', 'Paric', 'irfan.paric@stu.ssst.edu.ba', '387-61-111-123', 'Sarajevo', 'B&H', '2021-05-12', '111111111112', 'Irfan1234', '2021-05-19', '222', 2),
('Amil', 'Murselovic', 'amil@gmail.com', '387-56-565-256', 'Tuzla', 'B&H', '2021-05-13', '12121212121212', 'Amil1234', '2022-05-21', '121', 37),
('Azemina', 'HHH', 'azemina@stu.ssst.edu.ba', '387-56-565-256', 'Sarajevo', 'B&H', '2021-05-15', '454343545645343', 'Azemina1234', '2022-05-25', '454', 53),
('Teodora', 'Dzehverovic', 'teodora@grand.com', '387-62-456-345', 'Tuzla', 'B&H', '2000-06-27', '1234567891011', 'Teodora10', '2022-05-27', '456', 54),
('Admin', 'Main', 'admin@travelix.ba', '387-62-456-345', 'Sarajevo', 'B&H', NULL, NULL, 'Admin1234', NULL, NULL, 55),
('Mirza', 'Arslanagić', 'mirza.arslanagic@stu.ssst.edu.ba', '387-62-456-345', 'Sarajevo', 'B&H', '2008-01-23', '8792828289292', 'Mirza1234', '2022-06-23', '455', 57),
('Amer', 'Muamerovic', 'amer@gmail.com', '386-62-345-345', 'Sarajevo', 'B&H', '1985-06-20', '288329392939', 'Amer1234', NULL, '555', 58),
('Eldar', 'Esmić', 'eldar@gmail.com', '387-56-565-256', 'Sarajevo', 'B&H', '1997-06-17', '23232323232323', 'Eldar1234', NULL, '232', 59),
('Mufid123', 'Murselovic', 'aida_amil@hotmail.com', '387-62-456-111', 'Sarajevo', 'B&H ', '1989-01-01', '1234 5678 98587', 'Laufer1$', NULL, '123', 60),
('test', 'test', 'amil@com', '387-56-565-256', 'Sarajevo', 'B&H', '2021-06-12', '3958493482839283', 'Amar12345', NULL, '343', 67),
('mamamamm', 'sdwdwdwd', 'amil12sa3@com', '387-76-897-987', 'Sarajevo', 'B&H', '2006-06-07', '3443434343433', 'Esma123456', NULL, '343', 68),
('Amil', 'test', 'amil12sa33@com', '387-76-897-987', 'Zagreb', 'Cro', '2021-09-15', '26626262626262', 'Amil1234&', NULL, '565', 69);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`A_ID`),
  ADD UNIQUE KEY `activity_name_uindex` (`name`);

--
-- Indexes for table `arrangement`
--
ALTER TABLE `arrangement`
  ADD PRIMARY KEY (`Ar_ID`),
  ADD KEY `Arrangement_catering_facilities_CF_ID_fk` (`catering_facility`),
  ADD KEY `Arrangement_events_E_ID_fk` (`events`),
  ADD KEY `Arrangement_transport_T_ID_fk` (`transport`),
  ADD KEY `arrangement_cities_City_ID_fk` (`cities`),
  ADD KEY `arrangement_profit_index` (`profit`);

--
-- Indexes for table `catering_facilities`
--
ALTER TABLE `catering_facilities`
  ADD PRIMARY KEY (`CF_ID`),
  ADD KEY `catering_facilities_type_index` (`type`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`City_ID`),
  ADD KEY `cities_name_index` (`name`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`C_ID`),
  ADD KEY `contracts_arrangement_Ar_ID_fk` (`arrangement`),
  ADD KEY `contracts_users_U_ID_fk` (`user`),
  ADD KEY `contracts_Date_index` (`Date`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`E_ID`),
  ADD KEY `events_Name_index` (`Name`),
  ADD KEY `events_available_tickets_index` (`available_tickets`),
  ADD KEY `events_type_index` (`type`);

--
-- Indexes for table `rec_activities`
--
ALTER TABLE `rec_activities`
  ADD PRIMARY KEY (`R_ID`),
  ADD KEY `rec_activities_activity_A_ID_fk` (`Activity`),
  ADD KEY `rec_activities_cities_City_ID_fk` (`Cities`),
  ADD KEY `rec_activities_Rating_index` (`Rating`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`T_ID`),
  ADD KEY `transport_arrivalTime_index` (`arrivalTime`),
  ADD KEY `transport_departureTime_index` (`departureTime`),
  ADD KEY `transport_endPlace_index` (`endPlace`),
  ADD KEY `transport_startPlace_index` (`startPlace`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_ID`),
  ADD UNIQUE KEY `users_U_ID_uindex` (`U_ID`),
  ADD UNIQUE KEY `users_Mail_uindex` (`Mail`),
  ADD KEY `users_Fname_index` (`Fname`),
  ADD KEY `users_Lname_Fname_index` (`Lname`),
  ADD KEY `users_Mail_index` (`Mail`),
  ADD KEY `users_city_index` (`city`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `arrangement`
--
ALTER TABLE `arrangement`
  MODIFY `Ar_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `catering_facilities`
--
ALTER TABLE `catering_facilities`
  MODIFY `CF_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `City_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `E_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `rec_activities`
--
ALTER TABLE `rec_activities`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `T_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arrangement`
--
ALTER TABLE `arrangement`
  ADD CONSTRAINT `Arrangement_catering_facilities_CF_ID_fk` FOREIGN KEY (`catering_facility`) REFERENCES `catering_facilities` (`CF_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Arrangement_events_E_ID_fk` FOREIGN KEY (`events`) REFERENCES `events` (`E_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Arrangement_transport_T_ID_fk` FOREIGN KEY (`transport`) REFERENCES `transport` (`T_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `arrangement_cities_City_ID_fk` FOREIGN KEY (`cities`) REFERENCES `cities` (`City_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_arrangement_Ar_ID_fk` FOREIGN KEY (`arrangement`) REFERENCES `arrangement` (`Ar_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contracts_users_U_ID_fk` FOREIGN KEY (`user`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rec_activities`
--
ALTER TABLE `rec_activities`
  ADD CONSTRAINT `rec_activities_activity_A_ID_fk` FOREIGN KEY (`Activity`) REFERENCES `activity` (`A_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rec_activities_cities_City_ID_fk` FOREIGN KEY (`Cities`) REFERENCES `cities` (`City_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
