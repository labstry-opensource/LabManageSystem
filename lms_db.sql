-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2021 at 11:34 PM
-- Server version: 10.5.5-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `lms_page`
--

CREATE TABLE `lms_page` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_slug` varchar(255) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `custom_fields` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `visible` int(11) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `visibility` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lms_page`
--

INSERT INTO `lms_page` (`id`, `slug`, `parent_slug`, `locale`, `content`, `custom_fields`, `created_date`, `visible`, `keywords`, `title`, `visibility`, `type`) VALUES
(1, 'how-to-say-hello', '/', 'en', 'Hello World !', NULL, NULL, 1, NULL, 'How To Say Hello', 1, 'page'),
(2, 'solutions', '/', 'en', 'Hello, That is a solution', NULL, NULL, NULL, NULL, 'Solutions', NULL, 'page'),
(3, 'solutions-2', '/', 'en', 'Hello, That is a solution23234', NULL, NULL, NULL, NULL, 'Solutions 2', NULL, 'page');

-- --------------------------------------------------------

--
-- Table structure for table `lms_users`
--

CREATE TABLE `lms_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `registered_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `address` text DEFAULT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lms_users`
--

INSERT INTO `lms_users` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `last_login`, `registered_at`, `updated_at`, `address`, `roles`) VALUES
(1, 'raynold', '$2y$10$XF1Z84FM3v.129xUOIXs1umQRQlvYQJk0qw6.9.RAGXR1koXr3hiG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `nightingale_plugin`
--

CREATE TABLE `nightingale_plugin` (
  `id` int(11) NOT NULL,
  `plugin_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plugin_namespace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `installed_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nightingale_plugin`
--

INSERT INTO `nightingale_plugin` (`id`, `plugin_name`, `plugin_namespace`, `activated`, `type`, `installed_date`) VALUES
(1, 'com-labstry-contact_form', 'com\\test\\plugin', 1, '', '2020-12-01 00:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `nightingale_plugin_data`
--

CREATE TABLE `nightingale_plugin_data` (
  `plugin_id` int(11) NOT NULL,
  `key_id` int(11) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lms_page`
--
ALTER TABLE `lms_page`
  ADD PRIMARY KEY (`id`,`slug`,`parent_slug`,`locale`) USING BTREE;

--
-- Indexes for table `lms_users`
--
ALTER TABLE `lms_users`
  ADD PRIMARY KEY (`id`,`username`),
  ADD KEY `name` (`first_name`);

--
-- Indexes for table `nightingale_plugin`
--
ALTER TABLE `nightingale_plugin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nightingale_plugin_data`
--
ALTER TABLE `nightingale_plugin_data`
  ADD PRIMARY KEY (`plugin_id`,`key_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lms_page`
--
ALTER TABLE `lms_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nightingale_plugin`
--
ALTER TABLE `nightingale_plugin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
