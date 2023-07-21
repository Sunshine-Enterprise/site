-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 11:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seu_usa`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplications`
--

CREATE TABLE `aplications` (
  `id` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(2555) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aplications`
--

INSERT INTO `aplications` (`id`, `id_job`, `name`, `email`, `phone`, `file_name`, `file_path`, `date`) VALUES
(24, 8, 'pruebajose', 'sam@gmail.com', '4565454545', 'Gary-Harvey-II resume.pdf', 'C:\\xamp\\htdocs\\seu-usa\\app\\pages/aplications/Gary-Harvey-II resume.pdf', '2023-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `user_id` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `industry_id` varchar(5) NOT NULL,
  `job_id` varchar(5) NOT NULL,
  `file_path` varchar(150) NOT NULL,
  `resume` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `user_id`, `date`, `industry_id`, `job_id`, `file_path`, `resume`) VALUES
(1, '36', '2023-07-21', '2', '', 'C:\\development\\app\\pages\\includes\\candidates/Brielle Elmoore-2022.pdf', 'Brielle Elmoore-2022.pdf'),
(2, '36', '2023-07-21', '5', '', 'C:\\development\\app\\pages\\includes\\candidates/Brielle Elmoore-2022.pdf', 'Brielle Elmoore-2022.pdf'),
(3, '36', '2023-07-21', '9', '', 'C:\\development\\app\\pages\\includes\\candidates/Brielle Elmoore-2022.pdf', 'Brielle Elmoore-2022.pdf'),
(44, '36', '2023-07-21', '5', '20 ', '', ''),
(55, '36', '2023-07-21', '9', '16 ', '', ''),
(56, '36', '2023-07-21', '9', '14 ', '', ''),
(57, '36', '2023-07-21', '9', '13 ', '', ''),
(58, '36', '2023-07-21', '5', '22', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(6) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `email`, `code`, `expire`) VALUES
(1, 'jose@gmail.com', '21321', 60);

-- --------------------------------------------------------

--
-- Table structure for table `employeers`
--

CREATE TABLE `employeers` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `shift` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `IndustryId` int(3) NOT NULL,
  `Nameindustry` varchar(50) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `disabled` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`IndustryId`, `Nameindustry`, `slug`, `disabled`) VALUES
(2, 'Construction', 'construction', 1),
(4, 'Hospitality', 'services-food', 1),
(5, 'Healthcare', 'nursing-hospital', 1),
(9, 'IT', 'it', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `job_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `content` text NOT NULL,
  `time` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `company_name` varchar(30) DEFAULT NULL,
  `positions` int(11) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 0,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `industry_id`, `job_name`, `description`, `content`, `time`, `state`, `city`, `zipcode`, `salary`, `company_name`, `positions`, `date`, `status`, `slug`) VALUES
(10, 36, 5, 'Secretary', 'We\'re hiring Nurses for this week', '<h3 style=\"text-align:justify\"><font color=\"#337ab7\" face=\"Calibri, sans-serif\">Company Overview:</font></h3><h3 style=\"text-align:justify\"><span style=\"font-family: Helvetica; font-weight: normal;\">Our client has an exciting opportunity for a\nPipe Layer with successful and progressive experience in performing</span><span style=\"font-family: Helvetica;\"> </span><span style=\"font-family: Helvetica; font-weight: normal;\">Heavy Highway Contractor working in and\naround City and State-owned roadways</span></h3><h3 style=\"text-align:justify\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:minor-latin;\nmso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;font-weight:\nnormal;mso-bidi-font-weight:bold\"><br></span><b style=\"color: rgb(136, 136, 136); font-size: 14px; text-align: left;\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif;\nmso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:\nminor-latin\">&nbsp;</span></b><span style=\"color: rgb(136, 136, 136); font-size: 14px; text-align: left; font-family: Calibri, sans-serif; font-weight: bolder;\">Necessary Attributes:</span></h3><p class=\"MsoNormal\"><span style=\"font-weight: bolder;\"><span style=\"font-family: Calibri, sans-serif;\"><o:p></o:p></span></span></p><ol style=\"margin-top: 0in;\">\n </ol><p class=\"MsoNormal\"><span style=\"font-size: 12pt; font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\">Must possess the ability to adapt to different personalities and management styles</span></p><p class=\"MsoNormal\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\"><br></span><span style=\"font-size: 12pt; font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\">Team player and with strong interpersonal and verbal skills</span></p><p class=\"MsoNormal\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\"><br></span><span style=\"font-size: 12pt; font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\">Reliance on experience and judgment to plan and accomplish goals</span></p><p class=\"MsoNormal\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\"><br></span><span style=\"font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\">Dedicated and hard working</span></p><p class=\"MsoNormal\"><b><span style=\"font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:\nminor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin\">Necessary\nAttributes:</span></b></p><p class=\"MsoNormal\"><b><span style=\"font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:\nminor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin\"><br></span></b><span style=\"font-size: 12pt; font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n</span></span><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\">Must possess the ability to adapt to different personalities and\nmanagement styles</span></p><p class=\"MsoNormal\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\"><br></span><span style=\"font-size: 12pt; font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n</span></span><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\">Team player and with strong interpersonal and verbal skills</span></p><p class=\"MsoNormal\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\"><br></span><span style=\"font-size: 12pt; font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n</span></span><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\">Reliance on experience and judgment to plan and accomplish goals</span></p><p class=\"MsoNormal\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\"><br></span><span style=\"font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n</span></span><span style=\"font-size: 12pt; font-family: Calibri, sans-serif;\">Dedicated and hard working</span></p><p>\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n</p><p class=\"CDMMemoBULLET\" style=\"margin-left:.5in;text-align:justify;text-indent:\n0in;mso-list:none;tab-stops:.5in\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif;\nmso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:\nminor-latin\">&nbsp;</span></p>', 'full-time', 'FL', 'Miami', '32343', 23.12, 'Sunshine', 5, '2023-06-20', 1, 'secretary2991'),
(11, 36, 9, 'Secretary', 'We\'re hiring Nurses for this week', '<ul><li style=\"text-align: justify;\"><font color=\"#337ab7\">1<a href=\"http://google.com\" target=\"_blank\"> hola</a></font></li><li style=\"text-align: justify;\"><font color=\"#337ab7\">2</font></li><li style=\"text-align: justify;\"><font color=\"#337ab7\">3</font></li><li style=\"text-align: justify;\"><font color=\"#337ab7\">4</font></li></ul><h3 style=\"text-align:justify\"><font color=\"#337ab7\"><br></font></h3><h3 style=\"text-align:justify\"><span style=\"font-family:\" calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;font-weight:=\"\" normal;mso-bidi-font-weight:bold\"=\"\">&nbsp; &nbsp;<o:p></o:p></span></h3>', 'full-time', 'FL', 'Miami', '32343', 23.12, 'Sunshine', 5, '2023-06-20', 1, 'secretary9696'),
(12, 36, 9, 'Doctor', '', '<h3 style=\"text-align:justify\"><font face=\"Calibri, sans-serif\">Company Overview: <span style=\"font-weight: normal;\">Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.</span></font></h3><h3 style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">Overview:</font></h3><p style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\">Company Overview: Our client has an exciting </span></font></p><p style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\">opportunity for a Pipe Layer with successful and</span></font></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">progressive experience in performing Heavy Highway </span></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">Contractor working in and around City and State-owned roadways.&nbsp;</span></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\"><br></span></p><p style=\"text-align: justify;\"><b>Somerhing</b>:</p><ol><li style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">Company Overview: Our client has an exciting</font></li></ol><p style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">opportunity for a Pipe Layer with successful and</font></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">progressive experience in performing Heavy Highway</span></p><ul><li style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">Contractor working in and around City and State-owned roadways.&nbsp;</span></li></ul><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\"><br></span></p><ul><li style=\"text-align: center;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\">&nbsp;</span><span style=\"font-weight: normal;\">&nbsp;&nbsp;</span></font><b style=\"color: rgb(136, 136, 136); text-align: center;\"><i>Sunshine\r\nEnterprise USA is an “Equal Opportunity Employer—Minorities, Females, Veterans\r\nand Disabled Persons”</i></b><p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:6.0pt;text-align:center\"><b><i><o:p></o:p></i></b></p></li></ul>', 'full-time', 'FL', 'Miami', '32343', 17, 'Marriot', 20, '2023-06-20', 1, 'doctor'),
(13, 36, 9, 'Doctor', ' We\'re looking doctors                         \r\n                      ', '<p><b>Company Overview: </b>Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.&nbsp; &nbsp;</p><p><span style=\"font-weight: bolder;\">Company Overview:&nbsp;</span><span style=\"font-family: Helvetica;\">Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.&nbsp; </span>&nbsp;</p><p><span style=\"font-weight: bolder;\">Company Overview:&nbsp;</span><span style=\"font-family: &quot;Times New Roman&quot;;\">Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.&nbsp; &nbsp;</span><br></p>', 'full-time', 'FL', 'Miami', '32343', 17, 'Marriot', 20, '2023-06-20', 1, 'doctor7324'),
(14, 36, 9, 'Labor man', 'We\'re looking programmers', '<h3 style=\"text-align: justify;\"><span style=\"font-family: Impact;\">﻿</span><span style=\"font-weight: bolder;\"><u>We\'re looking </u>LABORS</span></h3><h1></h1><h2><p style=\"text-align: justify;\"><span style=\"color: rgb(136, 136, 136);\">We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers.</span><br></p><ol><li style=\"text-align: justify;\"><span style=\"font-family: Tahoma;\"><b>COMPANY: </b><a href=\"http://google.com\" target=\"_blank\">google</a></span></li></ol><p style=\"text-align: justify;\"><span style=\"font-family: Tahoma;\">1. assa</span></p></h2><h3 style=\"text-align: justify; \"><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\"><span style=\"font-family: Tahoma;\"><span style=\"font-family: Impact;\"><span style=\"font-weight: bolder;\">﻿</span><span style=\"font-weight: normal;\">* <span style=\"font-family: Arial;\">Html<br></span></span></span></span><span style=\"font-weight: normal;\"><span style=\"font-family: Impact;\">﻿* </span><font face=\"Arial\" style=\"\">CSS<br></font><span style=\"font-family: Impact;\">﻿* </span><font face=\"Arial\" style=\"\">JS<br></font><span style=\"font-family: Impact;\">﻿* </span><font face=\"Arial\" style=\"\">PHP</font></span></font></h3><p style=\"text-align: justify; \"><span style=\"color: rgb(102, 102, 102); font-family: Arial;\"><br></span><span style=\"color: rgb(102, 102, 102); font-family: Tahoma;\"><span style=\"font-family: Impact;\"><span style=\"font-family: Arial;\"><br></span></span></span></p><table class=\"table table-bordered\"><tbody><tr><td>SHIFT</td><td>PAYRATE</td><td>HOURS</td></tr><tr><td>Full time</td><td>Part time</td><td>20:00 - 04:00</td></tr></tbody></table><p style=\"text-align: justify; \"><span style=\"color: rgb(102, 102, 102); font-family: Tahoma;\"><span style=\"font-family: Impact;\"><span style=\"font-family: Arial;\"><br></span></span></span></p><p style=\"text-align: justify; \"><span style=\"color: rgb(102, 102, 102); font-family: Tahoma;\"><span style=\"font-family: Impact;\"><span style=\"font-family: Arial;\"><br></span></span></span><span style=\"font-family: Arial;\">﻿</span><br></p><h3 style=\"text-align: justify;\"><span style=\"font-weight: bolder;\"><u>We\'re looking LABORS.</u></span></h3><p style=\"text-align: justify; \">We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers.</p><p style=\"text-align: justify; \"><b><br></b></p><h3 style=\"text-align: justify;\"><span style=\"font-weight: bolder;\"><u>We\'re looking LABORS.</u></span></h3><p style=\"text-align: justify; \">We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers,&nbsp;We\'re looking programmers.<b><br></b></p>', 'full-time', 'FL', 'Miami', '32343', 23.12, 'Sunshine', 1, '2023-06-20', 1, 'labor-man4832'),
(15, 61, 2, 'sadsa', 'dsadasd', '<ol><li>uno</li><li>dos</li><li>tres</li><li>cuatro</li><li>cinco</li></ol>', 'full-time', 'FL', 'Orlando', '32412', 16.5, 'Sunshine', 4, '2023-06-15', 1, 'sadsa'),
(16, 36, 9, 'DOCTOR NY', ' We\'re looking doctors                         \r\n                      ', '<p><b>Company Overview: </b>Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.   </p><p><span style=\"font-weight: bolder;\">Company Overview: </span><span style=\"font-family: Helvetica;\">Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.  </span> </p><p><span style=\"font-weight: bolder;\">Company Overview: </span><span style=\"font-family: \"Times New Roman\";\">Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.   </span><br></p>', 'full-time', 'NY', 'Ney York', '83282', 17, 'Marriot', 20, '2023-06-28', 1, ''),
(18, 36, 4, 'Secretary for Disney', 'We\'re hiring Nurses for this week', '<ul><li style=\"text-align: justify;\"><font color=\"#337ab7\">1<a href=\"http://google.com\" target=\"_blank\"> hola</a></font></li><li style=\"text-align: justify;\"><font color=\"#337ab7\">2</font></li><li style=\"text-align: justify;\"><font color=\"#337ab7\">3</font></li><li style=\"text-align: justify;\"><font color=\"#337ab7\">4</font></li></ul><h3 style=\"text-align:justify\"><font color=\"#337ab7\"><br></font></h3><h3 style=\"text-align:justify\"><span style=\"font-family:\" calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;font-weight:=\"\" normal;mso-bidi-font-weight:bold\"=\"\">   <o:p></o:p></span></h3>', 'full-time', 'CA', 'San Francisco', '32343', 23.12, 'Sunshine', 5, '2023-06-28', 1, '6647'),
(19, 36, 5, 'Doctor for TX', 'We\'re hiring peopl for texas', '<h3 style=\"text-align:justify\"><font face=\"Calibri, sans-serif\">Company Overview: <span style=\"font-weight: normal;\">Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.</span></font></h3><h3 style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">Overview:</font></h3><p style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\">Company Overview: Our client has an exciting </span></font></p><p style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\">opportunity for a Pipe Layer with successful and</span></font></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">progressive experience in performing Heavy Highway </span></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">Contractor working in and around City and State-owned roadways. </span></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\"><br></span></p><p style=\"text-align: justify;\"><b>Somerhing</b>:</p><ol><li style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">Company Overview: Our client has an exciting</font></li></ol><p style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">opportunity for a Pipe Layer with successful and</font></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">progressive experience in performing Heavy Highway</span></p><ul><li style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">Contractor working in and around City and State-owned roadways. </span></li></ul><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\"><br></span></p><ul><li style=\"text-align: center;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: normal;\">  </span></font><b style=\"color: rgb(136, 136, 136); text-align: center;\"><i>Sunshine\r\nEnterprise USA is an “Equal Opportunity Employer—Minorities, Females, Veterans\r\nand Disabled Persons”</i></b><p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:6.0pt;text-align:center\"><b><i><o:p></o:p></i></b></p></li></ul>', 'full-time', 'TX', 'Texas', '23122', 17, 'Marriot', 20, '2023-06-28', 1, '9225'),
(20, 36, 5, 'Doctor TX', 'We\'re hiring peopl for texas', '<h3 style=\"text-align:justify\"><font face=\"Calibri, sans-serif\">Company Overview: <span style=\"font-weight: normal;\">Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.</span></font></h3><h3 style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">Overview:</font></h3><ul><li style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\">Company Overview: Our client has an exciting </span></font></li><li style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\">opportunity for a Pipe Layer with successful and</span></font></li><li style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">progressive experience in performing Heavy Highway </span></li><li style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">Contractor working in and around City and State-owned roadways.&nbsp;</span></li></ul><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\"><br></span></p><p style=\"text-align: justify;\"><b>Somerhing</b>:</p><ol><li style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">Company Overview: Our client has an exciting</font></li></ol><p style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">opportunity for a Pipe Layer with successful and</font></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">progressive experience in performing Heavy Highway</span></p><ul><li style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">Contractor working in and around City and State-owned roadways.&nbsp;</span></li></ul><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\"><br></span></p><ul><li style=\"text-align: center;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\">&nbsp;</span><span style=\"font-weight: normal;\">&nbsp;&nbsp;</span></font><b style=\"color: rgb(136, 136, 136); text-align: center;\"><i>Sunshine\r\nEnterprise USA is an “Equal Opportunity Employer—Minorities, Females, Veterans\r\nand Disabled Persons”</i></b><p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:6.0pt;text-align:center\"><b><i><o:p></o:p></i></b></p></li></ul>', 'full-time', 'TX', 'Texas', '23122', 17, 'Marriot', 20, '2023-06-28', 1, '5490'),
(22, 36, 5, 'Doctor Texas', 'We\'re hiring peopl for texas', '<h3 style=\"text-align:justify\"><font face=\"Calibri, sans-serif\">Company Overview: <span style=\"font-weight: normal;\">Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.</span></font></h3><h3 style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">Overview:</font></h3><p style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\">Company Overview: Our client has an exciting </span></font></p><p style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\">opportunity for a Pipe Layer with successful and</span></font></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">progressive experience in performing Heavy Highway </span></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">Contractor working in and around City and State-owned roadways. </span></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\"><br></span></p><p style=\"text-align: justify;\"><b>Somerhing</b>:</p><ol><li style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">Company Overview: Our client has an exciting</font></li></ol><p style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">opportunity for a Pipe Layer with successful and</font></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">progressive experience in performing Heavy Highway</span></p><ul><li style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">Contractor working in and around City and State-owned roadways. </span></li></ul><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\"><br></span></p><ul><li style=\"text-align: center;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: normal;\">  </span></font><b style=\"color: rgb(136, 136, 136); text-align: center;\"><i>Sunshine\r\nEnterprise USA is an “Equal Opportunity Employer—Minorities, Females, Veterans\r\nand Disabled Persons”</i></b><p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:6.0pt;text-align:center\"><b><i><o:p></o:p></i></b></p></li></ul>', 'full-time', 'TX', 'Texas', '23122', 17, 'Marriot', 20, '2023-06-28', 1, 'doctor-texas'),
(23, 36, 5, 'Doctor Texas', 'We\'re hiring peopl for texas', '<h3 style=\"text-align:justify\"><font face=\"Calibri, sans-serif\">Company Overview: <span style=\"font-weight: normal;\">Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.</span></font></h3><h3 style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">Overview:</font></h3><p style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\">Company Overview: Our client has an exciting </span></font></p><p style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\">opportunity for a Pipe Layer with successful and</span></font></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">progressive experience in performing Heavy Highway </span></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">Contractor working in and around City and State-owned roadways. </span></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\"><br></span></p><p style=\"text-align: justify;\"><b>Somerhing</b>:</p><ol><li style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">Company Overview: Our client has an exciting</font></li></ol><p style=\"text-align: justify;\"><font face=\"Calibri, sans-serif\">opportunity for a Pipe Layer with successful and</font></p><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">progressive experience in performing Heavy Highway</span></p><ul><li style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\">Contractor working in and around City and State-owned roadways. </span></li></ul><p style=\"text-align: justify;\"><span style=\"font-family: Calibri, sans-serif; color: rgb(102, 102, 102);\"><br></span></p><ul><li style=\"text-align: center;\"><font face=\"Calibri, sans-serif\"><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: normal;\">  </span></font><b style=\"color: rgb(136, 136, 136); text-align: center;\"><i>Sunshine\r\nEnterprise USA is an “Equal Opportunity Employer—Minorities, Females, Veterans\r\nand Disabled Persons”</i></b><p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom:6.0pt;text-align:center\"><b><i><o:p></o:p></i></b></p></li></ul>', 'full-time', 'TX', 'Texas', '23122', 17, 'Marriot', 20, '2023-06-28', 1, 'doctor-texas8523'),
(24, 36, 2, 'Nuevo duplicado', 'dsadasd', '<ol><li>uno</li><li>dos</li><li>tres</li><li>cuatro</li><li>cinco</li></ol>', 'part-time', 'TX', 'Dalton', '32321', 16.5, 'Sunshine', 4, '2023-06-28', 1, 'nuevo-duplicado'),
(25, 36, 9, 'DOCTOR NY', ' We\'re looking doctors                         \r\n                      ', '<p><b>Company Overview: </b>Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.   </p><p><span style=\"font-weight: bolder;\">Company Overview: </span><span style=\"font-family: Helvetica;\">Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.  </span> </p><p><span style=\"font-weight: bolder;\">Company Overview: </span><span style=\"font-family: \"Times New Roman\";\">Our client has an exciting opportunity for a Pipe Layer with successful and progressive experience in performing Heavy Highway Contractor working in and around City and State-owned roadways.   </span><br></p>', 'full-time', 'FL', 'Ney York', '83282', 17, 'Marriot', 20, '2023-06-28', 0, 'doctor-ny');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `date_user` varchar(45) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `phone`, `message`, `date_user`, `date`) VALUES
(15, 36, '(407) 952-8514', '  Hola mundo                    ', 'Monday 26th of June 2023', '2023-06-26'),
(16, 36, '(407) 952-8514', 'hola mundo        ', 'Wednesday 28th of June 2023', '2023-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `passwords`
--

CREATE TABLE `passwords` (
  `IdRequest` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passwords`
--

INSERT INTO `passwords` (`IdRequest`, `email`) VALUES
(6, 'Array'),
(7, 'Array'),
(8, 'Array'),
(9, 'Array'),
(10, 'Array'),
(11, 'Array'),
(12, 'Array'),
(13, 'Array'),
(14, 'Array'),
(15, 'joselito@gmail.com'),
(16, 'joselito@gmail.com'),
(17, 'amigos@gmail.com'),
(18, 'amigos@gmail.com'),
(19, 'amigos@gmail.com'),
(20, 'amigos@gmail.com'),
(21, 'amigos@gmail.com'),
(22, 'amigos@gmail.com'),
(23, 'joselito@gmail.com'),
(24, 'joselito@gmail.com'),
(25, 'joselito@gmail.com'),
(26, 'joselito@gmail.com'),
(27, 'joselito@gmail.com'),
(28, 'joselito@gmail.com'),
(29, 'joselito@gmail.com'),
(30, 'joselito@gmail.com'),
(31, 'fabri@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `soliciting` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `file` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `folder_path` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `phone`, `soliciting`, `email`, `file`, `filename`, `folder_path`, `date`) VALUES
(8, 'Taylor Grille', '4079528514', ' I need construction Workers                       ', 'joselito@gmail.com', '', 'Gary-Harvey-II resume.pdf', 'C:\\xamp\\htdocs\\seu-usa\\app\\pages/requests/Gary-Harvey-II resume.pdf', '2023-06-09'),
(9, 'pruebajose', '4079528514', '  pruebajosepruebajosepruebajose                      ', 'pruebajose@gmail.com', '', 'ResumeMariaTorres (2).pdf', 'C:\\xamp\\htdocs\\seu-usa\\app\\pages/requests/ResumeMariaTorres (2).pdf', '2023-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `state` varchar(25) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `role` varchar(10) NOT NULL,
  `data` int(11) NOT NULL,
  `token` varchar(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fname`, `lname`, `phone`, `state`, `city`, `zipcode`, `date`, `role`, `data`, `token`, `status`) VALUES
(36, 'joselito@gmail.com', '$2y$10$sPPgOTnxl49B49Phruc82OQokdJjh0YSqb6jCYxXiWANVswFPOwGu', 'Jose', 'Manzano', '4079528514', 'FL', 'Miami', '32343', '2023-05-17', 'user', 1, '', 1),
(40, 'samfa@gmail.com', '$2y$10$sPPgOTnxl49B49Phruc82OQokdJjh0YSqb6jCYxXiWANVswFPOwGu', 'Sam', 'Faragalla', '4079528514', 'FL', 'Orlando', '32543', '2023-05-22', 'admin', 0, '', 1),
(57, 'sunshineenterpriseusa@gmail.com', '$2y$10$M7D9yD9O9pFHMrer0Ns4ruGaYYd2twT.aAHvmfWSIk9acfOHG3mKK', 'Sam', 'Fargalla', '4079528514', 'FL', 'Orlando', '32824', '2023-06-22', 'employeer', 0, '47807', 0),
(61, 'joselomanzano@hotmail.com', '$2y$10$sPPgOTnxl49B49Phruc82OQokdJjh0YSqb6jCYxXiWANVswFPOwGu', 'Dayana', 'Faragalla', '(407) 952-8514', 'FL', 'Orlando', '32421', '2023-06-23', 'employeer', 0, '57492', 0),
(62, 't0273021@gmail.com', '$2y$10$v.BYy5KCjwVTP15Wfn1zNufyKZWPMPe53dGgfFOp3sYgxuSkRr7Au', 'Teaman', 'Tamayo', '4079528514', 'FL', 'Miami', '32343', '2023-06-26', 'employeer', 0, '37000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `visit` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `name`, `email`, `phone`, `visit`, `date`, `time`) VALUES
(16, 'jose manzano', 'jose@gmail.com', '4079528514', 'I came for interview', '2023-05-24', '17:24:00'),
(17, 'Taylor Grille', 'mateo@gmail.com', '4089200912', 'Take interview', '2023-05-24', '17:26:00'),
(18, 'sam Faragalla', 'amigo@gmai.com', '4079528514', 'Came for take interview with Sam', '2023-05-24', '17:27:00'),
(19, 'Charlie Friederech', 'charlie@gmail.com', '4079528514', 'I came for visit charlie', '2023-05-24', '17:28:00'),
(20, 'Taylor Grille', 'joselito@gmail.com', '4565454545555', 'Come for take interview with Charlie', '2023-05-24', '18:04:00'),
(21, 'Javier Machado', 'javi@gmail.com', '40799821221', 'I came for know the team', '2023-05-24', '12:11:00'),
(22, 'jose', 'joselito@gmail.com', '4079528514', 'I came to visit sa=m', '2023-06-12', '12:35:00'),
(23, 'Jose Manzano', 'joselito@gmail.com', '4079528514', 'I came for visit Sam', '2023-06-16', '01:33:00'),
(24, 'jose', 'joselito@gmail.com', '4079528514', 'come to say hello', '2023-06-20', '01:24:00'),
(25, 'Juan Armijos', 'juan@gmail.com', '(323) 232-323', 'I came for visit my friends', '0000-00-00', '12:35:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplications`
--
ALTER TABLE `aplications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expire` (`expire`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `employeers`
--
ALTER TABLE `employeers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `shift` (`shift`),
  ADD KEY `department` (`department`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`IndustryId`),
  ADD KEY `slug` (`slug`),
  ADD KEY `Nameindustry` (`Nameindustry`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `industry_id` (`industry_id`),
  ADD KEY `job_name` (`job_name`),
  ADD KEY `time` (`time`),
  ADD KEY `state` (`state`),
  ADD KEY `city` (`city`),
  ADD KEY `zipcode` (`zipcode`),
  ADD KEY `salary` (`salary`),
  ADD KEY `company_name` (`company_name`),
  ADD KEY `positions` (`positions`),
  ADD KEY `status` (`status`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`IdRequest`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Email` (`email`),
  ADD KEY `Phone` (`phone`),
  ADD KEY `Role` (`role`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplications`
--
ALTER TABLE `aplications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `IndustryId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `passwords`
--
ALTER TABLE `passwords`
  MODIFY `IdRequest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employeers`
--
ALTER TABLE `employeers`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
