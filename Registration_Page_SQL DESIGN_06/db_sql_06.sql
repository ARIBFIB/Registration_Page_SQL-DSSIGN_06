-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Table structure for table `signup_registrationform06`
CREATE TABLE `signup_registrationform06` (
  `First_Name` VARCHAR(255) NOT NULL,
  `Email_Address` VARCHAR(255) NOT NULL,
  `User_Password` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`Email_Address`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table structure for table `login_form06`
CREATE TABLE `login_form06` (
  `Email_Address` VARCHAR(255) NOT NULL,
  `User_Password` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`Email_Address`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

COMMIT;
