-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 26, 2017 at 05:25 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addressInsert`(IN p_ID INT(11), IN p_A1 CHAR(15), IN p_A2 CHAR(15), IN p_city CHAR(15), IN p_state CHAR(15), IN p_p INT(11))
BEGIN INSERT INTO address ( address.Address_ID, address.Address_Line1, address.Address_Line2, address.City, address.State,address.Pin ) VALUES ( p_ID, p_A1, p_A2, p_city, p_state ) ; END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customerInsert`(IN  p_ID   INT(11),
                               IN p_FName CHAR(15),
                               IN p_LName CHAR(15),
                               IN p_p INT(11),
                               IN p_W INT(11))
BEGIN 
    INSERT INTO customer
         (
             customer.Customer_ID,
             customer.FName,
             customer.LName,
             customer.Reward_Points,
             customer.EWallet
         )
    VALUES 
         ( 
          p_ID,
          p_FName,
          p_LName,
          p_p,
          p_W
  
         ) ; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doit`(IN  color1                    INT(11))
BEGIN 
    INSERT INTO color
         (
             color.Color_ID
         )
    VALUES 
         ( 
           color1 
           
         ) ; 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `Address_ID` int(11) NOT NULL,
  `Address_Line1` char(20) DEFAULT NULL,
  `Address_Line2` char(20) DEFAULT NULL,
  `City` char(15) DEFAULT NULL,
  `State` char(15) DEFAULT NULL,
  `Pin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`Address_ID`, `Address_Line1`, `Address_Line2`, `City`, `State`, `Pin`) VALUES
(1, 'Home1', 'Home2', 'Dallas', 'TX', 75252);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `Color_ID` int(11) NOT NULL,
  `Color_Name` char(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`Color_ID`, `Color_Name`) VALUES
(1, 'red'),
(2, 'blue'),
(3, 'black'),
(4, 'brown');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `Customer_ID` int(11) NOT NULL,
  `FName` char(15) DEFAULT NULL,
  `LName` char(15) DEFAULT NULL,
  `Reward_Points` int(11) DEFAULT NULL,
  `EWallet` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `FName`, `LName`, `Reward_Points`, `EWallet`) VALUES
(1, 'Uday', 'Singh', 1111, 11111111);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE IF NOT EXISTS `customer_address` (
  `Customer_Customer_ID` int(11) NOT NULL,
  `Address_Address_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`Customer_Customer_ID`, `Address_Address_ID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `Delivery_ID` int(11) NOT NULL,
  `Delivery_Type` char(15) DEFAULT NULL,
  `Delivery_Time` date DEFAULT NULL,
  `Note` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`Delivery_ID`, `Delivery_Type`, `Delivery_Time`, `Note`) VALUES
(1, '1', '2017-04-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `embroidery`
--

CREATE TABLE IF NOT EXISTS `embroidery` (
  `Embroidery_ID` int(11) NOT NULL,
  `Embroidery_Name` char(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `embroidery`
--

INSERT INTO `embroidery` (`Embroidery_ID`, `Embroidery_Name`) VALUES
(1, 'aaa'),
(2, 'bbb'),
(3, 'ccc'),
(4, 'ddd');

-- --------------------------------------------------------

--
-- Table structure for table `fabric`
--

CREATE TABLE IF NOT EXISTS `fabric` (
  `Stock` int(11) DEFAULT NULL,
  `Pattern_Pattern_ID` int(11) NOT NULL,
  `Color_Color_ID` int(11) NOT NULL,
  `Fabric_Type_Fabric_Type_ID` int(11) NOT NULL,
  `Embroidery_Embroidery_ID` int(11) NOT NULL,
  `fabricID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fabric`
--

INSERT INTO `fabric` (`Stock`, `Pattern_Pattern_ID`, `Color_Color_ID`, `Fabric_Type_Fabric_Type_ID`, `Embroidery_Embroidery_ID`, `fabricID`) VALUES
(10, 1, 1, 1, 1, NULL),
(10, 1, 1, 1, 2, NULL),
(10, 1, 1, 1, 3, NULL),
(10, 1, 1, 1, 4, NULL),
(10, 1, 1, 2, 1, NULL),
(10, 1, 1, 2, 2, NULL),
(10, 1, 1, 2, 3, NULL),
(10, 1, 1, 2, 4, NULL),
(10, 1, 1, 3, 1, NULL),
(10, 1, 1, 3, 2, NULL),
(10, 1, 1, 3, 3, NULL),
(10, 1, 1, 3, 4, NULL),
(10, 1, 1, 4, 1, NULL),
(10, 1, 1, 4, 2, NULL),
(10, 1, 1, 4, 3, NULL),
(10, 1, 1, 4, 4, NULL),
(10, 1, 2, 1, 1, NULL),
(10, 1, 2, 1, 2, NULL),
(10, 1, 2, 1, 3, NULL),
(10, 1, 2, 1, 4, NULL),
(10, 1, 2, 2, 1, NULL),
(10, 1, 2, 2, 2, NULL),
(10, 1, 2, 2, 3, NULL),
(10, 1, 2, 2, 4, NULL),
(10, 1, 2, 3, 1, NULL),
(10, 1, 2, 3, 2, NULL),
(10, 1, 2, 3, 3, NULL),
(10, 1, 2, 3, 4, NULL),
(10, 1, 2, 4, 1, NULL),
(10, 1, 2, 4, 2, NULL),
(10, 1, 2, 4, 3, NULL),
(10, 1, 2, 4, 4, NULL),
(10, 1, 3, 1, 1, NULL),
(10, 1, 3, 1, 2, NULL),
(10, 1, 3, 1, 3, NULL),
(10, 1, 3, 1, 4, NULL),
(10, 1, 3, 2, 1, NULL),
(10, 1, 3, 2, 2, NULL),
(10, 1, 3, 2, 3, NULL),
(10, 1, 3, 2, 4, NULL),
(10, 1, 3, 3, 1, NULL),
(10, 1, 3, 3, 2, NULL),
(10, 1, 3, 3, 3, NULL),
(10, 1, 3, 3, 4, NULL),
(10, 1, 3, 4, 1, NULL),
(10, 1, 3, 4, 2, NULL),
(10, 1, 3, 4, 3, NULL),
(10, 1, 3, 4, 4, NULL),
(10, 1, 4, 1, 1, NULL),
(10, 1, 4, 1, 2, NULL),
(10, 1, 4, 1, 3, NULL),
(10, 1, 4, 1, 4, NULL),
(10, 1, 4, 2, 1, NULL),
(10, 1, 4, 2, 2, NULL),
(10, 1, 4, 2, 3, NULL),
(10, 1, 4, 2, 4, NULL),
(10, 1, 4, 3, 1, NULL),
(10, 1, 4, 3, 2, NULL),
(10, 1, 4, 3, 3, NULL),
(10, 1, 4, 3, 4, NULL),
(10, 1, 4, 4, 1, NULL),
(10, 1, 4, 4, 2, NULL),
(10, 1, 4, 4, 3, NULL),
(10, 1, 4, 4, 4, NULL),
(10, 2, 1, 1, 1, NULL),
(10, 2, 1, 1, 2, NULL),
(10, 2, 1, 1, 3, NULL),
(10, 2, 1, 1, 4, NULL),
(10, 2, 1, 2, 1, NULL),
(10, 2, 1, 2, 2, NULL),
(10, 2, 1, 2, 3, NULL),
(10, 2, 1, 2, 4, NULL),
(10, 2, 1, 3, 1, NULL),
(10, 2, 1, 3, 2, NULL),
(10, 2, 1, 3, 3, NULL),
(10, 2, 1, 3, 4, NULL),
(10, 2, 1, 4, 1, NULL),
(10, 2, 1, 4, 2, NULL),
(10, 2, 1, 4, 3, NULL),
(10, 2, 1, 4, 4, NULL),
(10, 2, 2, 1, 1, NULL),
(10, 2, 2, 1, 2, NULL),
(10, 2, 2, 1, 3, NULL),
(10, 2, 2, 1, 4, NULL),
(10, 2, 2, 2, 1, NULL),
(10, 2, 2, 2, 2, NULL),
(10, 2, 2, 2, 3, NULL),
(10, 2, 2, 2, 4, NULL),
(10, 2, 2, 3, 1, NULL),
(10, 2, 2, 3, 2, NULL),
(10, 2, 2, 3, 3, NULL),
(10, 2, 2, 3, 4, NULL),
(10, 2, 2, 4, 1, NULL),
(10, 2, 2, 4, 2, NULL),
(10, 2, 2, 4, 3, NULL),
(10, 2, 2, 4, 4, NULL),
(10, 2, 3, 1, 1, NULL),
(10, 2, 3, 1, 2, NULL),
(10, 2, 3, 1, 3, NULL),
(10, 2, 3, 1, 4, NULL),
(10, 2, 3, 2, 1, NULL),
(10, 2, 3, 2, 2, NULL),
(10, 2, 3, 2, 3, NULL),
(10, 2, 3, 2, 4, NULL),
(10, 2, 3, 3, 1, NULL),
(10, 2, 3, 3, 2, NULL),
(10, 2, 3, 3, 3, NULL),
(10, 2, 3, 3, 4, NULL),
(10, 2, 3, 4, 1, NULL),
(10, 2, 3, 4, 2, NULL),
(10, 2, 3, 4, 3, NULL),
(10, 2, 3, 4, 4, NULL),
(10, 2, 4, 1, 1, NULL),
(10, 2, 4, 1, 2, NULL),
(10, 2, 4, 1, 3, NULL),
(10, 2, 4, 1, 4, NULL),
(10, 2, 4, 2, 1, NULL),
(10, 2, 4, 2, 2, NULL),
(10, 2, 4, 2, 3, NULL),
(10, 2, 4, 2, 4, NULL),
(10, 2, 4, 3, 1, NULL),
(10, 2, 4, 3, 2, NULL),
(10, 2, 4, 3, 3, NULL),
(10, 2, 4, 3, 4, NULL),
(10, 2, 4, 4, 1, NULL),
(10, 2, 4, 4, 2, NULL),
(10, 2, 4, 4, 3, NULL),
(10, 2, 4, 4, 4, NULL),
(10, 3, 1, 1, 1, NULL),
(10, 3, 1, 1, 2, NULL),
(10, 3, 1, 1, 3, NULL),
(10, 3, 1, 1, 4, NULL),
(10, 3, 1, 2, 1, NULL),
(10, 3, 1, 2, 2, NULL),
(10, 3, 1, 2, 3, NULL),
(10, 3, 1, 2, 4, NULL),
(10, 3, 1, 3, 1, NULL),
(10, 3, 1, 3, 2, NULL),
(10, 3, 1, 3, 3, NULL),
(10, 3, 1, 3, 4, NULL),
(10, 3, 1, 4, 1, NULL),
(10, 3, 1, 4, 2, NULL),
(10, 3, 1, 4, 3, NULL),
(10, 3, 1, 4, 4, NULL),
(10, 3, 2, 1, 1, NULL),
(10, 3, 2, 1, 2, NULL),
(10, 3, 2, 1, 3, NULL),
(10, 3, 2, 1, 4, NULL),
(10, 3, 2, 2, 1, NULL),
(10, 3, 2, 2, 2, NULL),
(10, 3, 2, 2, 3, NULL),
(10, 3, 2, 2, 4, NULL),
(10, 3, 2, 3, 1, NULL),
(10, 3, 2, 3, 2, NULL),
(10, 3, 2, 3, 3, NULL),
(10, 3, 2, 3, 4, NULL),
(10, 3, 2, 4, 1, NULL),
(10, 3, 2, 4, 2, NULL),
(10, 3, 2, 4, 3, NULL),
(10, 3, 2, 4, 4, NULL),
(10, 3, 3, 1, 1, NULL),
(10, 3, 3, 1, 2, NULL),
(10, 3, 3, 1, 3, NULL),
(10, 3, 3, 1, 4, NULL),
(10, 3, 3, 2, 1, NULL),
(10, 3, 3, 2, 2, NULL),
(10, 3, 3, 2, 3, NULL),
(10, 3, 3, 2, 4, NULL),
(10, 3, 3, 3, 1, NULL),
(10, 3, 3, 3, 2, NULL),
(10, 3, 3, 3, 3, NULL),
(10, 3, 3, 3, 4, NULL),
(10, 3, 3, 4, 1, NULL),
(10, 3, 3, 4, 2, NULL),
(10, 3, 3, 4, 3, NULL),
(10, 3, 3, 4, 4, NULL),
(10, 3, 4, 1, 1, NULL),
(10, 3, 4, 1, 2, NULL),
(10, 3, 4, 1, 3, NULL),
(10, 3, 4, 1, 4, NULL),
(10, 3, 4, 2, 1, NULL),
(10, 3, 4, 2, 2, NULL),
(10, 3, 4, 2, 3, NULL),
(10, 3, 4, 2, 4, NULL),
(10, 3, 4, 3, 1, NULL),
(10, 3, 4, 3, 2, NULL),
(10, 3, 4, 3, 3, NULL),
(10, 3, 4, 3, 4, NULL),
(10, 3, 4, 4, 1, NULL),
(10, 3, 4, 4, 2, NULL),
(10, 3, 4, 4, 3, NULL),
(10, 3, 4, 4, 4, NULL),
(10, 4, 1, 1, 1, NULL),
(10, 4, 1, 1, 2, NULL),
(10, 4, 1, 1, 3, NULL),
(10, 4, 1, 1, 4, NULL),
(10, 4, 1, 2, 1, NULL),
(10, 4, 1, 2, 2, NULL),
(10, 4, 1, 2, 3, NULL),
(10, 4, 1, 2, 4, NULL),
(10, 4, 1, 3, 1, NULL),
(10, 4, 1, 3, 2, NULL),
(10, 4, 1, 3, 3, NULL),
(10, 4, 1, 3, 4, NULL),
(10, 4, 1, 4, 1, NULL),
(10, 4, 1, 4, 2, NULL),
(10, 4, 1, 4, 3, NULL),
(10, 4, 1, 4, 4, NULL),
(10, 4, 2, 1, 1, NULL),
(10, 4, 2, 1, 2, NULL),
(10, 4, 2, 1, 3, NULL),
(10, 4, 2, 1, 4, NULL),
(10, 4, 2, 2, 1, NULL),
(10, 4, 2, 2, 2, NULL),
(10, 4, 2, 2, 3, NULL),
(10, 4, 2, 2, 4, NULL),
(10, 4, 2, 3, 1, NULL),
(10, 4, 2, 3, 2, NULL),
(10, 4, 2, 3, 3, NULL),
(10, 4, 2, 3, 4, NULL),
(10, 4, 2, 4, 1, NULL),
(10, 4, 2, 4, 2, NULL),
(10, 4, 2, 4, 3, NULL),
(10, 4, 2, 4, 4, NULL),
(10, 4, 3, 1, 1, NULL),
(10, 4, 3, 1, 2, NULL),
(10, 4, 3, 1, 3, NULL),
(10, 4, 3, 1, 4, NULL),
(10, 4, 3, 2, 1, NULL),
(10, 4, 3, 2, 2, NULL),
(10, 4, 3, 2, 3, NULL),
(10, 4, 3, 2, 4, NULL),
(10, 4, 3, 3, 1, NULL),
(10, 4, 3, 3, 2, NULL),
(10, 4, 3, 3, 3, NULL),
(10, 4, 3, 3, 4, NULL),
(10, 4, 3, 4, 1, NULL),
(10, 4, 3, 4, 2, NULL),
(10, 4, 3, 4, 3, NULL),
(10, 4, 3, 4, 4, NULL),
(10, 4, 4, 1, 1, NULL),
(10, 4, 4, 1, 2, NULL),
(10, 4, 4, 1, 3, NULL),
(10, 4, 4, 1, 4, NULL),
(10, 4, 4, 2, 1, NULL),
(10, 4, 4, 2, 2, NULL),
(10, 4, 4, 2, 3, NULL),
(10, 4, 4, 2, 4, NULL),
(10, 4, 4, 3, 1, NULL),
(10, 4, 4, 3, 2, NULL),
(10, 4, 4, 3, 3, NULL),
(10, 4, 4, 3, 4, NULL),
(10, 4, 4, 4, 1, NULL),
(10, 4, 4, 4, 2, NULL),
(10, 4, 4, 4, 3, NULL),
(10, 4, 4, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fabric_type`
--

CREATE TABLE IF NOT EXISTS `fabric_type` (
  `Fabric_Type_ID` int(11) NOT NULL,
  `Fabric_Type` char(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fabric_type`
--

INSERT INTO `fabric_type` (`Fabric_Type_ID`, `Fabric_Type`) VALUES
(1, 'Denim'),
(2, 'Cotton'),
(3, 'Silk'),
(4, 'wool');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `Order_ID` int(11) NOT NULL,
  `Price` int(11) DEFAULT NULL,
  `Tax` int(11) DEFAULT NULL,
  `Cost` int(11) DEFAULT NULL,
  `Parcel_Parcel_ID` int(11) NOT NULL,
  `Delivery_Delivery_ID` int(11) NOT NULL,
  `Customer_Customer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Price`, `Tax`, `Cost`, `Parcel_Parcel_ID`, `Delivery_Delivery_ID`, `Customer_Customer_ID`) VALUES
(1, 111, 11, 122, 1, 1, 1);

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `Deliveryupdate` BEFORE INSERT ON `orders`
 FOR EACH ROW insert into delivery(
    delivery.Delivery_ID,
    delivery.Delivery_Type,
    delivery.Delivery_Time,
    delivery.Note)
VALUES
(
    New.Order_ID,
    "",
    NOW(),
    ""
 )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_fabric`
--

CREATE TABLE IF NOT EXISTS `order_fabric` (
  `Order_ID` int(11) NOT NULL,
  `Fabric_Pattern_Pattern_ID` int(11) NOT NULL,
  `Fabric_Color_Color_ID` int(11) NOT NULL,
  `Fabric_Fabric_Type_Fabric_Type_ID` int(11) NOT NULL,
  `Fabric_Embroidery_Embroidery_ID` int(11) NOT NULL,
  `Orders_Customer_ID` int(11) NOT NULL,
  `In_Stock` char(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_fabric`
--

INSERT INTO `order_fabric` (`Order_ID`, `Fabric_Pattern_Pattern_ID`, `Fabric_Color_Color_ID`, `Fabric_Fabric_Type_Fabric_Type_ID`, `Fabric_Embroidery_Embroidery_ID`, `Orders_Customer_ID`, `In_Stock`) VALUES
(1, 1, 1, 1, 1, 1, '1'),
(3, 1, 2, 2, 4, 5, '5'),
(4, 1, 2, 3, 4, 5, '6'),
(5, 1, 2, 3, 4, 5, '1'),
(6, 3, 2, 3, 1, 1, '1'),
(7, 3, 2, 3, 2, 1, '1'),
(8, 3, 2, 3, 2, 1, '1'),
(9, 3, 2, 3, 1, 0, '1'),
(12, 3, 1, 3, 1, 0, '1'),
(13, 3, 1, 3, 1, 0, '1'),
(15, 3, 2, 3, 1, 1, '1');

--
-- Triggers `order_fabric`
--
DELIMITER $$
CREATE TRIGGER `parcelinsert` AFTER INSERT ON `order_fabric`
 FOR EACH ROW insert into parcel(
    parcel.Parcel_ID,
    parcel.Parcel_Service,
    parcel.Tracking_Number,
    parcel.Delivery_Time)
VALUES
(
    new.Order_ID,
    "",
    1,
    NOW()
 )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE IF NOT EXISTS `parcel` (
  `Parcel_ID` int(11) NOT NULL,
  `Parcel_Service` char(20) DEFAULT NULL,
  `Tracking_Number` int(11) DEFAULT NULL,
  `Delivery_Time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`Parcel_ID`, `Parcel_Service`, `Tracking_Number`, `Delivery_Time`) VALUES
(1, 'Mine', 1, '2017-04-22'),
(3, '', 1, '2017-04-21'),
(4, '', 1, '2017-04-25'),
(5, '', 1, '2017-04-25'),
(6, '', 1, '2017-04-25'),
(7, '', 1, '2017-04-25'),
(8, '', 1, '2017-04-25'),
(9, '', 1, '2017-04-25'),
(10, '', 1, '2017-04-25'),
(11, '', 1, '2017-04-25'),
(12, '', 1, '2017-04-25'),
(13, '', 1, '2017-04-25'),
(14, '', 1, '2017-04-26'),
(15, '', 1, '2017-04-26'),
(16, '', 1, '2017-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `pattern`
--

CREATE TABLE IF NOT EXISTS `pattern` (
  `Pattern_ID` int(11) NOT NULL,
  `Pattern_Name` char(15) DEFAULT NULL,
  `Designer` char(15) DEFAULT NULL,
  `Origin` char(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pattern`
--

INSERT INTO `pattern` (`Pattern_ID`, `Pattern_Name`, `Designer`, `Origin`) VALUES
(1, 'Abstract', 'me', 'myhome'),
(2, 'Zebra stripes', 'Nature', 'Wild'),
(3, 'Flag', 'Trump', 'WH'),
(4, 'Checks', 'me', 'home');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Address_ID`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`Color_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`Customer_Customer_ID`,`Address_Address_ID`),
  ADD KEY `Customer_Address_Address_FK` (`Address_Address_ID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`Delivery_ID`);

--
-- Indexes for table `embroidery`
--
ALTER TABLE `embroidery`
  ADD PRIMARY KEY (`Embroidery_ID`);

--
-- Indexes for table `fabric`
--
ALTER TABLE `fabric`
  ADD PRIMARY KEY (`Pattern_Pattern_ID`,`Color_Color_ID`,`Fabric_Type_Fabric_Type_ID`,`Embroidery_Embroidery_ID`),
  ADD KEY `Fabric_Color_FK` (`Color_Color_ID`),
  ADD KEY `Fabric_Embroidery_FK` (`Embroidery_Embroidery_ID`),
  ADD KEY `Fabric_Fabric_Type_FK` (`Fabric_Type_Fabric_Type_ID`);

--
-- Indexes for table `fabric_type`
--
ALTER TABLE `fabric_type`
  ADD PRIMARY KEY (`Fabric_Type_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`,`Customer_Customer_ID`),
  ADD UNIQUE KEY `Orders__IDX` (`Delivery_Delivery_ID`),
  ADD UNIQUE KEY `Orders__IDXv1` (`Parcel_Parcel_ID`),
  ADD KEY `Orders_Customer_FK` (`Customer_Customer_ID`);

--
-- Indexes for table `order_fabric`
--
ALTER TABLE `order_fabric`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Order_Fabric_Orders_FK` (`Orders_Customer_ID`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`Parcel_ID`);

--
-- Indexes for table `pattern`
--
ALTER TABLE `pattern`
  ADD PRIMARY KEY (`Pattern_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `Color_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `embroidery`
--
ALTER TABLE `embroidery`
  MODIFY `Embroidery_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fabric_type`
--
ALTER TABLE `fabric_type`
  MODIFY `Fabric_Type_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_fabric`
--
ALTER TABLE `order_fabric`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pattern`
--
ALTER TABLE `pattern`
  MODIFY `Pattern_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Orders_Delivery_FK` FOREIGN KEY (`Delivery_Delivery_ID`) REFERENCES `delivery` (`Delivery_ID`),
  ADD CONSTRAINT `Orders_Parcel_FK` FOREIGN KEY (`Parcel_Parcel_ID`) REFERENCES `parcel` (`Parcel_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
