-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2018 at 06:17 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reseau`
--

-- --------------------------------------------------------

--
-- Table structure for table `testemonials`
--

DROP TABLE IF EXISTS `testemonials`;
CREATE TABLE IF NOT EXISTS `testemonials` (
  `testemonialID` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`testemonialID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testemonials`
--

INSERT INTO `testemonials` (`testemonialID`, `ime`, `text`, `slika`) VALUES
(1, 'Milica Avramovic', 'Mozda najbolja agencija sa kojom sam saradjivala. Veoma veliki nivo profesionalizma i zelje za pomoci.', 'milica.jpg'),
(2, 'Marija Djurovic', 'Odusevljenje je prava rec za ovu agenciju. Profesinalizam koji pokazuju je na najvecem nivou. Saradnja sa njima ce biti uspostavljena svakom prilikom kada je potrebna.', 'marija.jpg'),
(3, 'Milos Rokvic', 'Ocena 11. Jer 10 nije dovoljno za ovu agenciju, saradjivacemo jos dugo, ubedjen sam u to', 'milos.jpg'),
(4, 'Test', 'test', 'kengur.jpg'),
(5, 'afsfas', 'asfasfas', 'slika.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `imePrezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `imePrezime`, `username`, `password`, `isAdmin`) VALUES
(1, 'Inna Cekic', 'inna', 'inna', 1),
(2, 'Korisnik', 'korisnik', 'korisnik', 0),
(3, 'test1234333', 'admin124214124', 'admin1241241242', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usluge`
--

DROP TABLE IF EXISTS `usluge`;
CREATE TABLE IF NOT EXISTS `usluge` (
  `uslugaID` int(11) NOT NULL AUTO_INCREMENT,
  `nazivUsluge` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `cena` double NOT NULL,
  PRIMARY KEY (`uslugaID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usluge`
--

INSERT INTO `usluge` (`uslugaID`, `nazivUsluge`, `opis`, `cena`) VALUES
(1, 'Društvene mreže', 'I pored činjenice da većina kompanija/preduzeća/ugostitelja koristi društvene mreže radi oglašavanja, oni ipak nisu zadovoljni menadžmentom istih. Smatra se da su društvene mreže i dalje neiskorišćen potencijal. Za nas su vaše društvene mreže ozbiljna stvar, i njima se bavimo svakodnevno', 500),
(2, 'Kreiranje sadržaja', 'U skladu sa vašim željama i potrebama, važno je definisati, osmisliti i uskladiti sadržaje koje ćemo objavljivati. Online marketing je “živa stvar” i naš je cilj da objavama budemo jedinstveni sa interesantnim i nevidjenim sadržajem...drugim rečima, vaši profili na društvenim mrežama će biti unikatni i neće biti plagijati ostalih!', 700),
(3, 'Izrada Marketing strategije', 'Ko su vaši potencijalni klijenti? Koja su njihova interesovanja? Kako doći do njih? Ko je vaša konkurencija? Istraživanje tržišta je neizbežno, jer na taj način možemo da ističemo vaše prednosti na efikasan način. Na kraju svakog meseca Vas izveštavamo o uspešnosti kampanje. Ne lutamo bez cilja, već se držimo plana !', 400),
(4, 'Foto & Video', 'Dobar marketing na društvenim mrežama zahteva posvećenost...i kvalitetan sadržaj. Lepe fotografije su \"must-have\". Bez obzira na vrstu vašeg poslovanja, naši fotografi dolaze na lice mesta i fotografišu/snimaju. Izbegavamo fotografisanje mobilnim telefonom...drugim rečima, koristimo profi foto-aparat za slikanje vašeg objekta, proizvoda itd. Ali to nije sve: svaku fotografiju treba obraditi & ulepšati (\"retouchage\"). Ista pravila važe i za video produkciju: mini klipovi, spotovi ili reklame, trudimo se da video sadržajem obogatimo vašu ponudu i da ljudi ponovo posete vaš profil.', 1100),
(5, 'Oglašavanje', 'Plaćeno reklamiranje na Internetu je efikasno i precizno. Naš cilj je da za što manje novca, vašu reklamu vidi što više potencijalnih klijenata! Drugim rečima, naš zadatak je da definišemo vašu ciljnu grupu, \"poruku\" koju im želite preneti, dizajniranje oglasa kao i praćenje i analiza rezultata.', 300),
(6, 'Web design & 3D virtuelna panorama/prezentacija', 'Izrada sajtova za vaše poslovanje odavno je postala neminovnost: optimizacija, funkcionalnost (prilagodjeni mobilnim uredjajima) & moderan dizajn. Takodje nudimo izradu 3D virtuelne panorame vašeg poslovnog prostora, proizvoda itd. Ali to nije sve: našim vernim klijentima to poklanjamo, u znak zahvalnosti na ukazanom poverenju.', 700),
(7, 'Influencer-i', 'Ko su influencer-i ? Radi se o osobi koja ima moć da utiče nad svojim mnogobrojnim pratiocima. Da pojednostavimo: angažovanje influencer-a Saradjujemo sa poznatima iz sveta manekenstva & mode, sporta, sa pevačima itd. Drugim rečima, radi se o poznatima na društvenim mrežama. To što neko ima 500.000 pratioca na Instagramu ne znači da Vama može biti od koristi, ukoliko to nije vaša ciljna grupa. Mi ćemo Vam pomoći da pronadjete relevantnu \"celebrity\" osobu koja će doprineti Vašoj popularnosti.', 900);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
