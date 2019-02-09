-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2019 at 05:14 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmorts`
--

-- --------------------------------------------------------

--
-- Table structure for table `enemy`
--

DROP TABLE IF EXISTS `enemy`;
CREATE TABLE IF NOT EXISTS `enemy` (
  `enemy_id` int(11) NOT NULL AUTO_INCREMENT,
  `enemy_name` varchar(50) NOT NULL,
  `enemy_hp` int(11) NOT NULL,
  `enemy_str` int(11) NOT NULL,
  `enemy_lvl` int(11) NOT NULL,
  PRIMARY KEY (`enemy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enemy`
--

INSERT INTO `enemy` (`enemy_id`, `enemy_name`, `enemy_hp`, `enemy_str`, `enemy_lvl`) VALUES
(1, 'Goblin', 25, 1, 1),
(2, 'Imp', 50, 3, 3),
(3, 'Demon Lord', 1000, 50, 99),
(4, 'Lich', 100, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `effect` int(11) NOT NULL,
  `details` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `effect`, `details`) VALUES
(1, 'Gold', 0, 'Gold is used to buy items and upgrade gear '),
(2, 'Basic Sword', 1, 'Basic training sword');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `player_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(20) NOT NULL,
  `player_hp` int(11) NOT NULL,
  `player_str` int(11) NOT NULL,
  `player_exp` int(11) NOT NULL,
  `player_energie` int(11) NOT NULL,
  `player_lvl` int(11) NOT NULL,
  `xp_need` int(11) NOT NULL,
  PRIMARY KEY (`player_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`player_id`, `player_name`, `player_hp`, `player_str`, `player_exp`, `player_energie`, `player_lvl`, `xp_need`) VALUES
(1, 'Damzy', 60, 7, 0, 100, 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `player_inventory`
--

DROP TABLE IF EXISTS `player_inventory`;
CREATE TABLE IF NOT EXISTS `player_inventory` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `play_id` int(11) NOT NULL,
  `it_id` int(11) NOT NULL,
  `ammount` int(11) NOT NULL,
  PRIMARY KEY (`inv_id`),
  KEY `play_id` (`play_id`),
  KEY `it_id` (`it_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_inventory`
--

INSERT INTO `player_inventory` (`inv_id`, `play_id`, `it_id`, `ammount`) VALUES
(1, 1, 1, 310),
(2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_title` varchar(100) NOT NULL,
  `task_details` varchar(500) NOT NULL,
  `reward_gold` int(11) NOT NULL,
  `reward_exp` int(11) NOT NULL,
  `task_time` int(11) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_title`, `task_details`, `reward_gold`, `reward_exp`, `task_time`) VALUES
(1, 'Kopaj jamu!', 'Posto si mali lv i nemas pojma jedino sto ti preostaje je zamijeniti jadne radnike na ovoj vrucini i pomoci im kopati jamu.Blago tebi!', 100, 100, 60),
(2, 'Obrani selo.', 'Uzbuna!! Selo je u opasnosti od napada bijesnih vukova. vukovi su poprilicno gladni i kolju mjestanima ovce. Prikini  vukove i pomozi narodu. vjerujem da ce te bogato nagraditi.', 500, 500, 3600);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `player_inventory`
--
ALTER TABLE `player_inventory`
  ADD CONSTRAINT `player_inventory_ibfk_1` FOREIGN KEY (`play_id`) REFERENCES `player` (`player_id`),
  ADD CONSTRAINT `player_inventory_ibfk_2` FOREIGN KEY (`it_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
