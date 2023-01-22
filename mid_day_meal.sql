-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 08:05 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mid_day_meal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(11) NOT NULL,
  `pwd` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `pwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `grants`
--

CREATE TABLE `grants` (
  `dice` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `rice` float NOT NULL,
  `dal` float NOT NULL,
  `oil` float NOT NULL,
  `milk` float NOT NULL,
  `val` tinyint(1) NOT NULL,
  `amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grants`
--

INSERT INTO `grants` (`dice`, `date`, `rice`, `dal`, `oil`, `milk`, `val`, `amt`) VALUES
('123', '2021-05-30', 1.5, 0.2, 0.05, 0.18, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `indents`
--

CREATE TABLE `indents` (
  `dice` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `rice` float NOT NULL,
  `dal` float NOT NULL,
  `oil` float NOT NULL,
  `milk` float NOT NULL,
  `val` tinyint(1) NOT NULL,
  `nos` int(11) NOT NULL,
  `amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indents`
--

INSERT INTO `indents` (`dice`, `date`, `rice`, `dal`, `oil`, `milk`, `val`, `nos`, `amt`) VALUES
('123', '2021-05-30', 100, 100, 100, 100, 1, 10, 100);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `dice` varchar(11) NOT NULL,
  `rice` float NOT NULL,
  `dal` float NOT NULL,
  `oil` float NOT NULL,
  `milk` float NOT NULL,
  `amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`dice`, `rice`, `dal`, `oil`, `milk`, `amt`) VALUES
('123', 13, 1.5, 0.39, 1.33, 150);

--
-- Triggers `stock`
--
DELIMITER $$
CREATE TRIGGER `place_indent` AFTER UPDATE ON `stock` FOR EACH ROW BEGIN
	DECLARE nos1 integer;    
    DECLARE rice1 float;    
    DECLARE dal1 float;    
    DECLARE milk1 float;    
    DECLARE oil1 float;    
    DECLARE amt1 float;    
    DECLARE nos2 integer;        
    SET @nos1:=(SELECT nos from user WHERE dice=new.dice);    
    IF ((old.rice <> new.rice) AND ( (new.rice < (@nos1*0.150*7)) OR (new.dal < (@nos1*0.02*7)) OR (new.milk < (@nos1*0.018*7)) OR (new.oil < (@nos1*0.005*7)) OR (new.amt < (@nos1*2*7)))) THEN    
    	SET @rice1:=(SELECT sum(rice) from transaction WHERE dice=new.dice AND MONTH(date)=MONTH(CURRENT_DATE())-1);        
        SET @dal1:=(SELECT sum(dal) from transaction WHERE dice=new.dice AND MONTH(date)=MONTH(CURRENT_DATE())-1);        
        SET @oil1:=(SELECT sum(oil) from transaction WHERE dice=new.dice AND MONTH(date)=MONTH(CURRENT_DATE())-1);        
        SET @milk1:=(SELECT sum(milk) from transaction WHERE dice=new.dice AND MONTH(date)=MONTH(CURRENT_DATE())-1);        
        SET @amt1:=(SELECT sum(amt) from transaction WHERE dice=new.dice AND MONTH(date)=MONTH(CURRENT_DATE())-1);        
        SET @nos2:=(SELECT sum(nos) from transaction WHERE dice=new.dice AND MONTH(date)=MONTH(CURRENT_DATE())-1);        
        INSERT into indents values(new.dice,CURRENT_DATE(),@rice1,@dal1,@oil1,@milk1,0,@nos2,@amt1);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `date` date NOT NULL,
  `nos` int(11) NOT NULL,
  `rice` float NOT NULL,
  `dal` float NOT NULL,
  `oil` float NOT NULL,
  `milk` float NOT NULL,
  `amt` float NOT NULL,
  `dice` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`date`, `nos`, `rice`, `dal`, `oil`, `milk`, `amt`, `dice`) VALUES
('2021-04-13', 10, 100, 100, 100, 100, 100, '123'),
('2021-05-30', 10, 1.5, 0.2, 0.05, 0.18, 20, '123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `dice` varchar(11) NOT NULL,
  `nos` int(11) NOT NULL,
  `pwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`dice`, `nos`, `pwd`) VALUES
('123', 10, 'abc');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
