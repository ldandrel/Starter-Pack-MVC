-- phpMyAdmin SQL Dump
-- version 4.7.0-beta1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2017 at 12:02 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blog-example`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `article`) VALUES
(1, 'title 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus bibendum nibh faucibus ipsum elementum, sit amet viverra libero bibendum. Nullam a lorem dictum, posuere ipsum sit amet, euismod leo. Integer at lobortis nulla. Sed accumsan tristique augue, eu porttitor ipsum pulvinar eget. Nunc vitae justo in urna dapibus convallis. Nulla in efficitur urna, sit amet bibendum ipsum. Mauris volutpat pellentesque ligula facilisis egestas. Donec ut nibh lacinia, feugiat neque vestibulum, mollis tellus.\r\n\r\n'),
(2, 'title 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus bibendum nibh faucibus ipsum elementum, sit amet viverra libero bibendum. Nullam a lorem dictum, posuere ipsum sit amet, euismod leo. Integer at lobortis nulla. Sed accumsan tristique augue, eu porttitor ipsum pulvinar eget. Nunc vitae justo in urna dapibus convallis. Nulla in efficitur urna, sit amet bibendum ipsum. Mauris volutpat pellentesque ligula facilisis egestas. Donec ut nibh lacinia, feugiat neque vestibulum, mollis tellus.\r\n\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;