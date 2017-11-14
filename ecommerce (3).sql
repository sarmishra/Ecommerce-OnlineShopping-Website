-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2016 at 04:18 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'saroj.mishra33@hotmail.com', '9848137012saroj'),
(2, 'rakshya.bista25@gmail.com', '9860675846');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(2, 'Appliances'),
(5, 'Main'),
(6, 'Other'),
(7, 'sony'),
(8, 'samsung');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(3, 'Different123'),
(5, 'Electric pot'),
(12, 'Boiler'),
(13, 'Cooler'),
(14, 'Cooker'),
(15, 'Gases');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`) VALUES
(16, '::1', 'Rakshya Bista', 'rakshya.bista@gmail.com', 'rakshya', 'Nepal', 'kathmandu', '9860675846', 'balkhu', 'C360_2015-08-02-13-11-06-222_1.jpg'),
(17, '::1', 'saroj mishra', 'saroj.mishra773@gmail.com', 'saroj', 'Nepal', 'kathmandu', '9848137012', 'gathaghar ', 'WIN_20160630_163335.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(8, 3, 2, ' knxzbhbxz nxz 1223', 2147483647, 'jnbcxjzkjcxz', 'WIN_20160415_174356.JPG', 'mullll'),
(11, 0, 5, 'suman', 3000, 'bhsdahbudsa', 'WIN_20160618_165554.JPG', 'bvhjgjG'),
(13, 1, 3, 'Electric Kittle', 200, 'MOst useful kittle take less time ', 'C360_2015-04-17-16-34-05-753.jpg', 'latest kittle r21'),
(15, 3, 2, 'najsnjkas', 22, ' znz', 'WIN_20160216_110455.JPG', 'mkllxnsdkn'),
(16, 0, 2, 'nljnds', 222, 'nsdj,nsd', 'WIN_20160131_230204.JPG', 'esddssd'),
(17, 5, 6, 'kjnjdjsa', 654, 'nkjsan', 'WIN_20160213_085541.JPG', 'jnsaiuhuishas'),
(18, 5, 2, 'bkjbjbzx', 6545, 'nljnasjksa', 'WIN_20160327_135132.JPG', 'bskjabkjsbjksa'),
(19, 3, 2, 'njnsas', 645, ' ZKBkjbkbx', 'WIN_20160131_230204.JPG', 'nasjhnashas'),
(20, 13, 8, 'asbjkasbas', 121, ',bkjbksbjbcckjbxnz cnzx', 'WIN_20160618_165905.JPG', 'jkbskjfjsdhs ahiu sd hfjd jchj  vdhkjhvjkhfkjsf hd saarih');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
