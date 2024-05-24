-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 12:08 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rith-ithelp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `image`, `quantity`) VALUES
(1, 1, 'UPS-SV0680', 'OE-000228', '', 1),
(2, 1, 'PC068247', 'FT-000507', '', 1),
(3, 1, 'PC068241', 'FT-000663', '', 1),
(4, 1, 'SV068014', 'Rental', '', 1),
(5, 1, 'UPS-PC0682', 'OE-000241', '', 1),
(6, 1, 'AP068225', 'OE-000281', 'product-5.jpg', 4),
(7, 1, 'PC068244', 'FT-000689', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dv_br`
--

CREATE TABLE `dv_br` (
  `dv_id` varchar(20) NOT NULL,
  `dv_name` varchar(100) NOT NULL,
  `dv_ass` varchar(100) NOT NULL,
  `dv_reg` varchar(100) NOT NULL,
  `dv_del` varchar(100) NOT NULL,
  `dv_war` varchar(100) NOT NULL,
  `dv_sts` varchar(100) NOT NULL,
  `dv_img` varchar(100) NOT NULL,
  `sts_d` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dv_br`
--

INSERT INTO `dv_br` (`dv_id`, `dv_name`, `dv_ass`, `dv_reg`, `dv_del`, `dv_war`, `dv_sts`, `dv_img`, `sts_d`) VALUES
('DV-202306001', 'Conference Set', 'None', '21-06-2023', 'YAMAHA PJP-20UR + Logitech G930E', 'None', 'AV', 'BR-1.jpg', ''),
('DV-202306002', 'External CD-1', 'None', '21-06-2023', 'HP External USB DVDRW Drive', 'None', 'AV', 'BR-2.jpg', ''),
('DV-202306003', 'External CD-2', 'None', '21-06-2023', 'Dell DW316 USB DVD?}R/W?', 'None', 'AV', 'BR-3.jpg', ''),
('DV-202306004', 'External CD-3', 'None', '21-06-2023', 'Dell DW316 USB DVD?}R/W?', 'None', 'UAV', 'BR-3.jpg', ''),
('DV-202306005', 'External CD-4', 'None', '21-06-2023', 'Dell DW316 USB DVD?}R/W?', 'None', 'AV', 'BR-3.jpg', ''),
('DV-202306006', 'HDMI TO VGA -1', 'None', '21-06-2023', 'Ugreen Adapter HDMI Male to VGA Converter ', 'None', 'AV', 'BR-4.jpg', ''),
('DV-202306007', 'HUB-1', 'None', '21-06-2023', 'D-Link DES-1005A?', 'None', 'AV', 'BR-5.jpg', ''),
('DV-202306008', 'HUB-2', 'None', '21-06-2023', 'D-Link DSL-2640BT?', 'None', 'AV', 'BR-6.jpg', ''),
('DV-202306009', 'HUB-3', 'None', '21-06-2023', 'TP-LINK TL-SG1008D ', 'None', 'UAV', 'BR-7.jpg', ''),
('DV-202306010', 'Mouse Pad', 'None', '21-06-2023', 'Mouse Pad', 'None', 'AV', 'BR-8.jpg', ''),
('DV-202306011', 'NEC Pen-1', 'None', '21-06-2023', 'NEC NP02P', 'None', 'AV', 'BR-9.jpg', ''),
('DV-202306012', 'NEC Pen-2', 'None', '21-06-2023', 'NEC NP02P', 'None', 'AV', 'BR-9.jpg', ''),
('DV-202306013', 'Pointer-1', 'None', '21-06-2023', 'Logitech R800', 'None', 'AV', 'BR-10.jpg', ''),
('DV-202306014', 'Pointer-2', 'None', '21-06-2023', 'Logitech Spotlight Laser Pointer', 'None', 'AV', 'BR-11.jpg', ''),
('DV-202306015', 'PC068119', 'None', '21-06-2023', 'Dell Latitude 3520', 'None', 'AV', 'BR-13.jpg', ''),
('DV-202306016', 'USB PORT', 'None', '21-06-2023', 'UGREEN USB-C OTG TO 4 PORTS USB 3.0', 'None', 'AV', 'BR-14.jpg', ''),
('DV-202306017', 'USB RJ45-1', 'None', '21-06-2023', 'UGREEN USB 3.0 to RJ45', 'None', 'AV', 'BR-15.jpg', ''),
('DV-202306018', 'USB RJ45-2', 'None', '21-06-2023', 'UGREEN USB 3.0 to RJ45', 'None', 'AV', 'BR-15.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `rith_dborrow`
--

CREATE TABLE `rith_dborrow` (
  `br_id` varchar(50) NOT NULL,
  `br_d` date NOT NULL,
  `rtp_d` date NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_sec` varchar(10) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `dv_name` varchar(255) NOT NULL,
  `ar_u` varchar(10) NOT NULL,
  `rm_b` text NOT NULL,
  `sts_b` varchar(20) NOT NULL DEFAULT 'Pending',
  `app_b` varchar(20) NOT NULL,
  `app_bd` date NOT NULL,
  `act_d` date NOT NULL,
  `name_r` varchar(255) NOT NULL,
  `lname_r` varchar(255) NOT NULL,
  `usec_r` varchar(20) NOT NULL,
  `mail_r` varchar(255) NOT NULL,
  `rt_d` date NOT NULL,
  `sts_r` varchar(20) NOT NULL DEFAULT 'Waiting',
  `app_r` varchar(20) NOT NULL,
  `app_rd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rith_dborrow`
--

INSERT INTO `rith_dborrow` (`br_id`, `br_d`, `rtp_d`, `user_name`, `user_lastname`, `user_sec`, `user_mail`, `dv_name`, `ar_u`, `rm_b`, `sts_b`, `app_b`, `app_bd`, `act_d`, `name_r`, `lname_r`, `usec_r`, `mail_r`, `rt_d`, `sts_r`, `app_r`, `app_rd`) VALUES
('BR-202306001', '2023-06-06', '2023-06-06', 'Wanna', 'T.', 'PC', 'na@rith.riso.biz', 'HUB-2', 'OUT', 'tst', 'Pending', 'Nattapon M.', '0000-00-00', '2023-06-23', 'Wanna', 'T.', '', 'na@rith.riso.biz', '2023-07-19', 'Returned', 'Nattapon', '2023-06-23'),
('BR-202306002', '0000-00-00', '0000-00-00', '2210888', '', '', '', 'PC068119', '', '', 'PENDING', '', '0000-00-00', '0000-00-00', 'Wanna T.', 'T.', '', 'na@rith.riso.biz', '2023-06-29', 'Returned', '', '0000-00-00'),
('BR-202306003', '2023-06-24', '2023-06-24', 'Nattapon', 'M.', 'IT', 'nattapon@rith.riso.biz', 'PC068119', 'OUT', '', 'Approved', 'Nattapon M.', '2023-06-20', '0000-00-00', 'sam', '', '', '', '2023-06-24', 'Borrowed', 'Nattapon', '0000-00-00'),
('BR-202306004', '0000-00-00', '0000-00-00', 'Nattapon', 'M.', 'IT', 'nattapon@rith.riso.biz', '', 'IN', '', 'PENDING', '', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '0000-00-00'),
('BR-202306005', '0000-00-00', '0000-00-00', 'Nattapon', 'M.', 'IT', 'nattapon@rith.riso.biz', 'HUB-3', 'IN', '', 'Approved', 'Nattapon M.', '2023-06-26', '0000-00-00', 'Wanna T.', 'T.', '', 'na@rith.riso.biz', '2000-06-26', 'Borrowed', 'Nattapon', '0000-00-00'),
('BR-202306006', '2023-06-26', '2023-06-26', 'Nattapon', 'M.', 'IT', 'nattapon@rith.riso.biz', 'HUB-3', 'IN', 'jj', 'Approved', 'Nattapon M.', '2023-06-27', '0000-00-00', 'Wanna T.', 'T.', '', 'na@rith.riso.biz', '0000-00-00', 'Borrowed', 'Sam', '2023-06-29'),
('BR-202306007', '2023-07-19', '1900-01-19', 'Wanna', 'T.', 'PC', 'nattapon@rith.riso.biz', 'HUB-3', 'IN', '', 'Approved', 'Nattapon M.', '2023-06-27', '0000-00-00', 'Wanna', 'T.', 'PC', 'na@rith.riso.biz', '2023-07-04', 'Returned', 'Sam', '2023-07-17'),
('BR-202306008', '2023-06-28', '2023-06-28', 'Nattapon', 'M.', 'IT', 'nattapon@rith.riso.biz', 'HUB-1', 'IN', '', 'Approved', 'Nattapon M.', '2023-06-29', '0000-00-00', 'Nattapon M.', '', '', 'nattapon@rith.riso.biz', '2023-07-25', ' Borrowed', 'Nattapon', '0000-00-00'),
('BR-202306009', '2023-06-28', '2023-06-28', 'Aritsara', '.', 'ACC', 'nattapon@rith.riso.biz', '', 'IN', '', 'Approved', 'Nattapon M.', '0000-00-00', '0000-00-00', 'Nattapon M.', '', '', '', '0000-00-00', 'Borrowed', 'Nattapon', '2023-06-29'),
('BR-202306010', '2023-06-28', '2023-06-28', 'Aritsara', '.', 'ACC', 'nattapon@rith.riso.biz', 'External CD-1', 'IN', '', '', '', '0000-00-00', '0000-00-00', 'Aritsara .', '.', '', 'Defect-slip@rith.riso.biz', '0000-00-00', '', 'Nattapon', '2023-06-29'),
('BR-202306011', '2023-05-30', '2023-06-13', 'Aritsara', '.', 'ACC', 'nattapon@rith.riso.biz', 'USB-PORT', 'OUT', '', 'Approved', 'Nattapon M.', '2023-06-29', '0000-00-00', '', '', '', '', '0000-00-00', 'Borrowed', '', '0000-00-00'),
('BR-202306012', '2023-06-30', '2023-06-30', 'Nattapon', 'M.', 'IT', 'nattapon@rith.riso.biz', 'RJ45-1', 'IN', '', 'PENDING', '', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Waiting', '', '0000-00-00'),
('BR-202306013', '2023-06-30', '2023-06-30', 'Wanna', 'T.', 'PC', 'natttapon@rith.riso.biz', 'External CD-3', 'IN', '', 'Approved', 'Nattapon M.', '2023-07-05', '0000-00-00', '', '', '', '', '0000-00-00', 'Borrowed', '', '0000-00-00'),
('BR-202306014', '2023-07-04', '2023-07-04', 'Wanna', 'T.', 'PC', 'natttapon@rith.riso.biz', 'External CD-1', 'IN', '', 'Approved', 'Nattapon M.', '0000-00-00', '0000-00-00', 'Wanna', 'T.', '', 'na@rith.riso.biz', '2023-07-04', 'Returned', '', '0000-00-00'),
('BR-202306015', '2023-07-05', '2023-07-05', 'Wanna', 'T.', 'PC', 'natttapon@rith.riso.biz', 'PC068012', 'OUT', '', 'PENDING', '', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Waiting', '', '0000-00-00'),
('BR-202306016', '2023-07-05', '2023-07-05', 'Wanna', 'T.', 'PC', 'natttapon@rith.riso.biz', 'NEC Pen-2', 'OUT', '', 'Approved', 'Nattapon M.', '2023-07-05', '0000-00-00', 'Wanna', 'T.', '', 'na@rith.riso.biz', '2023-07-05', ' Returned', 'Nattapon', '2023-07-05'),
('BR-202307001', '2023-07-27', '0000-00-00', 'Nattapon', 'M.', 'BOI', 'nattapon@rith.riso.biz', 'External CD-1', 'Please Cho', '', 'PENDING', '', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Waiting', '', '0000-00-00'),
('BR-202307002', '2023-07-19', '2023-07-19', 'userxxx', '.', 'IT', 'userxxx@rith.riso.biz', 'PC068119', 'OUT', '-', 'Approved', 'Nattapon M.', '2023-07-19', '0000-00-00', 'userxxx', '.', '', 'userxxx@rith.riso.biz', '2023-07-19', ' Returned', 'Nattapon', '2023-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `rith_item`
--

CREATE TABLE `rith_item` (
  `item_reg` varchar(50) DEFAULT NULL,
  `item_cat` varchar(255) NOT NULL,
  `item_type` varchar(50) DEFAULT NULL,
  `item_ass` varchar(50) DEFAULT NULL,
  `item_name` varchar(10) NOT NULL,
  `item_charger` varchar(255) DEFAULT NULL,
  `item_sec` varchar(255) DEFAULT NULL,
  `item_area` varchar(50) DEFAULT NULL,
  `item_detail` varchar(50) DEFAULT NULL,
  `item_sup` varchar(20) DEFAULT NULL,
  `item_war` varchar(255) DEFAULT NULL,
  `item_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rith_item`
--

INSERT INTO `rith_item` (`item_reg`, `item_cat`, `item_type`, `item_ass`, `item_name`, `item_charger`, `item_sec`, `item_area`, `item_detail`, `item_sup`, `item_war`, `item_img`) VALUES
('2014-07-10', 'Server', 'AC Server', 'OE/000195', 'acc/old', 'IT', 'IT', 'Server Room', 'HP Proliant DL360P SV/HPO/OCS/010 (A.S.I.A.)', 'NTT', '', ''),
('2016-06-23', 'Network', 'AP Wifi', 'FT/000379/1', 'AP068220', 'PE', 'PE', 'PD Line', 'Allied Telesis AT/TQ4600', 'NTT', '', 'product/5.jpg'),
('2016-06-23', 'Network', 'AP Wifi', 'FT-000379-2', 'AP068221', 'PE', 'PE', 'PD Line', 'Allied Telesis AT/TQ4600', 'NTT', '  ', ''),
('2017-03-22', 'Network', 'AP Wifi', 'FT/000431', 'AP068222', 'PE', 'PE', 'IQC Room', 'Allied Telesis AT/TQ4600', 'Other', '', ''),
('2021-07-21', 'Network', 'AP Wifi (Rework)', '/', 'AP068223', 'PE', 'PE', 'Repair Area ( Floor2 )', 'Access Point TL/WA1201 AC1200 Wireless ', 'Other', 'FGT60ETK18015957', ''),
('2020-02-20', 'Network', 'AP Controller (JPN)', 'OE/000282', 'AP068224', 'IT', 'IT', 'Server Room', 'UniFi AP Controller', 'CSL', 'FWF60D4615019860', ''),
('2020-02-20', 'Network', 'AP Wifi (JPN)', 'OE/000281', 'AP068225', 'IT', 'IT', 'Server Room', 'UniFi AP AC Lite', 'CSL', '', ''),
('2011-10-19', 'Network', 'HUB', 'OE-000057 ', 'Cisco/SW/1', 'IT', 'IT', 'Server Room', 'Cisco 48Port 10/100/1000M Switching  (Switching Hu', 'FDI', ' ', ''),
('2011-10-19', 'Network', 'PATCH PANEL', 'OE/000058 ', 'Cisco/SW/2', 'IT', 'IT', 'Server Room', 'AMP PATCH PANEL 24Port x2', 'FDI', '', ''),
('2018-08-01', 'Network', 'AP Controller', 'OE-000262', 'FW068001', 'IT', 'IT', 'Server Room', 'Fortigate 60E (Firewall Main)', 'MAT', ' ', ''),
('2016-06-23', 'Network', 'Firewall', 'FT/000378', 'FW068003', 'PE', 'PE', 'Server Room', 'FortiWiFi/60D (Firewall Wireless)', 'NTT', ' ', ''),
('2017-12-13', 'Clients', 'Notebook', 'OE/000249', 'PC068051', 'Mr.Arakawa', 'JPN', 'Admin Office', 'Computer Notebook Panasonic Let\'s note CF/SZ6RDQVS', 'JPN', '', ''),
('2022-01-05', 'Clients', 'Notebook', 'OE/000323', 'PC068052', 'Mr.Sakai', 'JPN', 'PD Office', 'Computer Notebook Dell Latitude 5320', 'JPN', '', ''),
('2023-05-02', 'Clients', 'Notebook', 'OE/000366', 'PC068053', 'Mr.Ono', 'JPN', 'Admin Office', 'Computer Notebook Panasonic Let\'s note CF/SV1RDLKS', 'JPN', '', ''),
('2022-09-05', 'Clients', 'Notebook', 'OE/000327', 'PC068054', 'Mr.Oose', 'JPN', 'Admin Office', 'Computer Notebook Dell Latitude 5330', 'JPN', '', ''),
('2019-05-02', 'Clients', 'Notebook', 'OE/000274', 'PC068055', 'Mr.Sano', 'JPN', 'Admin Office', 'Computer Notebook Panasonic Let\'s note CF/SZ6RDQVS', 'JPN', '', ''),
('2021-02-12', 'Clients', 'Notebook', 'OE/000302', 'PC068056', 'Mr.Kajima', 'JPN', 'Engineer Office', 'Computer Notebook Dell Latitude 5510 CTO', 'JPN', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000342', 'PC068101', 'Ms.Pennapa', 'BOI', 'Admin Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2018-08-15', 'Clients', 'PC Desktop', 'OE/000320', 'PC068102', 'Mrs.Siripen', 'Purchase', 'Admin Office', 'HP IDS ProDesk 400 G4 MT PC + Win10 Include/No DVD', 'MAT / BTMU/2', '', ''),
('2022-09-12', 'Clients', 'PC Desktop', 'Rental', 'PC068103', 'Ms.Sirada', 'HR', 'Admin Office', 'HP 280 G8 Microtower PC', 'MAT / BTMU/4', '', ''),
('2022-09-12', 'Clients', 'Notebook', 'Rental', 'PC068104', 'Ms.Suthaporn', 'BOI', 'Admin Office', 'Computer Dell Latitude 3520 CTO', 'MAT / BTMU/4', '', ''),
('2018-08-15', 'Clients', 'PC Desktop', 'OE/000321', 'PC068105', 'Mrs.Navee', 'Purchase', 'Admin Office', 'HP IDS ProDesk 400 G4 MT PC + Win10 Include/No DVD', 'MAT / BTMU/2', '  ', ''),
('2022-09-12', 'Clients', 'Notebook', 'Rental', 'PC068106', 'Ms.Nirawan', 'PE', 'Engineer Office', 'Computer Dell Latitude 3520 CTO', 'MAT / BTMU/4', ' ', '133608419720230707.jpg'),
('2022-09-12', 'Clients', 'PC Desktop', 'Rental', 'PC068107', 'Ms.Aritsara', 'QC', 'Measurment  Room', 'HP 280 G8 Microtower PC', 'MAT / BTMU/4', '', ''),
('2022-09-12', 'Clients', 'Notebook', 'Rental', 'PC068108', 'Ms.Benjamas', 'Account', 'Admin Office', 'Computer Dell Latitude 3520 CTO', 'MAT / BTMU/4', '', ''),
('2022-09-12', 'Clients', 'PC Desktop', 'Rental', 'PC068109', 'Mr.Nattapon', 'IT', 'Admin Office', 'HP 280 G8 Microtower PC', 'MAT / BTMU/4', '', ''),
('2022-09-12', 'Clients', 'Notebook', 'Rental', 'PC068110', 'Mr.Somporn', 'Logistic', 'LG Office', 'Computer Dell Latitude 3520 CTO', 'MAT / BTMU/4', '', ''),
('2022-09-12', 'Clients', 'PC Desktop', 'Rental', 'PC068111', 'Ms.Sudarat', 'Account', 'Admin Office', 'HP 280 G8 Microtower PC', 'MAT / BTMU/4', '', ''),
('2018-08-15', 'Clients', 'Notebook', 'OE/000312', 'PC068112', 'Ms.Benjalak', 'PE', 'Engineer Office', 'HP IDS DSC 2GB i5/7200U 450 G5 BNBPC +DVD WIN10 Ve', 'MAT / BTMU/2', '', ''),
('2022-09-12', 'Clients', 'PC Desktop', 'Rental', 'PC068113', 'Ms.Naphatsorn', 'Logistic', 'LG Office', 'HP 280 G8 Microtower PC', 'MAT / BTMU/4', '', ''),
('2022-09-12', 'Clients', 'Notebook', 'Rental', 'PC068114', 'Ms.Sukanya', 'Admin', 'Admin Office', 'Computer Dell Latitude 3520 CTO', 'MAT / BTMU/4', '', ''),
('2022-09-12', 'Clients', 'Notebook', 'Rental', 'PC068115', 'Ms.Kornsirinat', 'IT', 'Admin Office', 'Computer Dell Latitude 3520 CTO', 'MAT / BTMU/4', '', ''),
('2018-08-15', 'Clients', 'Notebook', 'OE/000315', 'PC068116', 'Mr.Anuchit', 'QE', 'Engineer Office', 'HP IDS DSC 2GB i5/7200U 450 G5 BNBPC +DVD WIN10 Ve', 'MAT / BTMU/2', '', ''),
('2018-08-15', 'Clients', 'PC Desktop', 'OE/000317', 'PC068117', 'Mr.Kittisak', 'PE', 'Engineer Office', 'HP IDS ProDesk 400 G4 MT PC + Win10 Include/No DVD', 'MAT / BTMU/2', '', ''),
('2018-08-15', 'Clients', 'Notebook', 'OE/000310', 'PC068118', 'Ms.Tunyalax', 'Admin', 'Reception', 'HP IDS DSC 2GB i5/7200U 450 G5 BNBPC +DVD WIN10 Ve', 'MAT / BTMU/2', '', ''),
('2022-09-12', 'Clients', 'Notebook', 'Rental', 'PC068119', 'Ms.Nantaporn', 'IT', 'Admin Office', 'Computer Dell Latitude 3520 CTO', 'MAT / BTMU/4', '', ''),
('2018-08-15', 'Clients', 'Notebook', 'OE/000313', 'PC068120', 'Mr.Sakchai', 'Purchase', 'Admin Office', 'HP IDS DSC 2GB i5/7200U 450 G5 BNBPC +DVD WIN10 Ve', 'MAT / BTMU/2', '', ''),
('2018-08-15', 'Clients', 'Notebook', 'OE/000311', 'PC068121', 'Ms.Nantaporn', 'IT', 'Admin Office', 'HP IDS DSC 2GB i5/7200U 450 G5 BNBPC +DVD WIN10 Ve', 'MAT / BTMU/2', '', ''),
('2018-08-15', 'Clients', 'PC Desktop', 'OE/000319', 'PC068122', 'Mr.Chanachai', 'Production', 'PD Office', 'HP IDS ProDesk 400 G4 MT PC + Win10 Include/No DVD', 'MAT / BTMU/2', '', ''),
('2019-10-25', 'Clients', 'Notebook', 'OE/000334', 'PC068123', 'Mr.Nutthapon', 'PE', 'Engineer Office', 'HP ProBook 450 G6 Notebook (4SZ45AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000345', 'PC068124', 'Ms.Pornchiya', 'PC', 'PD Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000355', 'PC068125', 'Ms.Natkritta', 'QA', 'Admin Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2022-02-24', 'Clients', 'Notebook', 'OE/000324', 'PC068126', 'Mr.Kittiphop', 'Admin', 'Admin Office', 'Notebook Dell Latitude 3520', 'MAT', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000343', 'PC068127', 'Ms.Nipawan', 'Admin', 'Admin Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', 'PBF0VF5', ''),
('2022-09-12', 'Clients', 'Notebook', 'Rental', 'PC068128', 'Mr.Pattaramart', 'PE', 'Engineer Office', 'Computer Dell Latitude 3520 CTO', 'MAT / BTMU/4', '', ''),
('2019-10-25', 'Clients', 'Notebook', 'OE/000335', 'PC068129', 'Mr.Nikom', 'PE', 'Engineer Office', 'HP ProBook 450 G6 Notebook (4SZ45AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'Notebook', 'OE/000340', 'PC068130', 'Ms.Kanokporn', 'QC', 'Engineer Office', 'HP ProBook 450 G6 Notebook (4SZ45AV)', 'CSL / BTMU/3', '', ''),
('2018-08-15', 'Clients', 'PC Desktop', 'OE/000316', 'PC068131', 'Mr.Likit', 'Logistic', 'Logistic Office', 'HP IDS ProDesk 400 G4 MT PC + Win10 Include/No DVD', 'MAT / BTMU/2', '', ''),
('2018-11-19', 'Clients', 'PC Desktop', 'OE/000269', 'PC068132', 'Mr.Pichai', 'PE', 'Engineer Office', 'HP Pavilion 590/p0050d (4LY28AA#AKL) ', 'MAT', 'PC01A0E6', ''),
('2019-10-25', 'Clients', 'Notebook', 'OE/000333', 'PC068133', 'Ms.Wanna', 'PC', 'PD Office', 'HP ProBook 450 G6 Notebook (4SZ45AV)', 'CSL / BTMU/3', 'PC01A0DS', ''),
('2022-09-12', 'Clients', 'Notebook', 'Rental', 'PC068134', 'Mr.Weerachai', 'Production', 'PD Office', 'Computer Dell Latitude 3520 CTO', 'MAT / BTMU/4', '', ''),
('2019-10-25', 'Clients', 'Notebook', 'OE/000332', 'PC068135', 'Ms.Patcharee C.', 'Admin', 'Admin Office', 'HP ProBook 450 G6 Notebook (4SZ45AV)', 'CSL / BTMU/3', 'PC0554BV', ''),
('2019-10-25', 'Clients', 'Notebook', 'OE/000337', 'PC068136', 'Ms.Arunrung', 'QA', 'Admin Office', 'HP ProBook 450 G6 Notebook (4SZ45AV)', 'CSL / BTMU/3', 'PC05ESK0', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000341', 'PC068137', 'Ms.Phatcharaporn', 'Account', 'Admin Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000357', 'PC068138', 'Ms.Nantana', 'QE', 'Engineer Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000344', 'PC068139', 'Mr.Phatchara', 'Admin', 'Admin Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000358', 'PC068140', 'Mr.Chanin', 'QE', 'Engineer Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000350', 'PC068141', 'Ms.Tassanee', 'Production', 'PD Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', 'CCWZQ82', ''),
('2019-10-25', 'Clients', 'Notebook', 'OE/000339', 'PC068142', 'Mr.Krisorn', 'QE', 'Engineer Office', 'HP ProBook 450 G6 Notebook (4SZ45AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000352', 'PC068143', 'Ms.Patcharee B.', 'Purchase', 'Admin Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000353', 'PC068144', 'Ms.Phapatsorn', 'Purchase', 'Admin Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', 'FQK3V72', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000362', 'PC068145', 'Mr.Suparat', 'QE', 'Engineer Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', 'PC0DNGFN', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000346', 'PC068146', 'Ms.Wiputthaporn', 'PE', 'Engineer Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'Notebook', 'OE/000338', 'PC068147', 'Mr.Wirot', 'QA', 'Admin Office', 'HP ProBook 450 G6 Notebook (4SZ45AV)', 'CSL / BTMU/3', ' ', '85359183220230707.jpg'),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000347', 'PC068148', 'Mr.Anusorn', 'PE', 'Engineer Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000356', 'PC068149', 'Ms.Nongnuch', 'QC', 'Engineer Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2018-08-15', 'Clients', 'PC Workstation ', 'OE/000309', 'PC068150', 'Mr.Wutthikai', 'PE', 'Engineer Office', 'Dell PrecisionT3620 Workstation +DVD WIN10 Ver.170', 'MAT / BTMU/2', '', ''),
('2019-10-25', 'Clients', 'PC Workstation ', 'OE/000363', 'PC068151', 'Mr.Nikom', 'PE', 'Engineer Office', 'WorkStation HP Z2 Tower G4 (4FU52AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'PC Workstation ', 'OE/000364', 'PC068152', 'Mr.Suparat', 'QE', 'Engineer Office', 'WorkStation HP Z2 Tower G4 (4FU52AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000359', 'PC068153', 'Mr.Anupong', 'QE', 'Engineer Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Jig', 'PC Desktop', 'OE/000348', 'PC068154', 'Mr.Puchong', 'PE', 'CD & Manual Room', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2022-09-12', 'Clients', 'Notebook', 'Rental', 'PC068155', 'Mr.Puchong', 'PE', 'Engineer Office', 'Computer Dell Latitude 3520 CTO', 'MAT / BTMU/4', 'PC0ACSC5', ''),
('2018-08-15', 'Clients', 'PC Desktop', 'OE/000318', 'PC068156', 'Mr.Purin', 'PE', 'Engineer Office', 'HP IDS ProDesk 400 G4 MT PC + Win10 Include/No DVD', 'MAT / BTMU/2', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000360', 'PC068157', 'Mr.Jukkapong', 'QE', 'Engineer Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2022-09-12', 'Clients', 'PC Desktop', 'Rental', 'PC068158', 'Ms.Patthinee', 'BOI', 'Admin Office', 'HP 280 G8 Microtower PC', 'MAT / BTMU/4', '', ''),
('2022-09-12', 'Clients', 'PC Desktop', 'Rental', 'PC068159', 'Ms.Peeraporn', 'Account', 'Admin Office', 'HP 280 G8 Microtower PC', 'MAT / BTMU/4', '', ''),
('2022-09-12', 'Clients', 'Notebook', 'Rental', 'PC068160', 'Mr.Wutthikai', 'PE', 'Engineer Office', 'Computer Dell Latitude 3520 CTO', 'MAT / BTMU/4', '', ''),
('2018-08-15', 'Clients', 'Notebook', 'OE/000314', 'PC068161', 'Mr.Theanchai', 'Admin', 'Admin Office', 'HP IDS DSC 2GB i5/7200U 450 G5 BNBPC +DVD WIN10 Ve', 'MAT / BTMU/2', '', ''),
('2019-10-25', 'Jig', 'PC Desktop', 'OE/000351', 'PC068162', 'Mr.Weerachai', 'Production', 'CD & Manual Room', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000354', 'PC068163', 'Ms.Manassanan', 'Purchase', 'Admin Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000361', 'PC068164', 'Mr.Surasak', 'QE', 'Engineer Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2020-10-14', 'Clients', 'Notebook', 'OE/000285', 'PC068165', 'Ms.Yosita', 'HR', 'Admin Office', 'HP Probook 440G7 Notebook', 'Other', '7X20B02', ''),
('2021-03-09', 'Clients', 'PC Desktop', 'OE/000303', 'PC068167', 'Mr.Jarun', 'QE', 'Engineer Office', 'Dell Optiplex 3080 MT + Dell monitor E2020H 19.5\"', 'MAT', '566XMX1', ''),
('2019-10-25', 'Clients', 'PC Desktop', 'OE/000349', 'PC068168', 'Ms.Nattunya', 'Production', 'PD Office', 'PC Desktop HP 280 G4 Microtower Business (2SJ42AV)', 'CSL / BTMU/3', '', ''),
('2022-09-12', 'Clients', 'PC Desktop', 'Rental', 'PC068169', 'Ms.Palee', 'QC', 'Engineer Office', 'HP 280 G8 Microtower PC', 'MAT / BTMU/4', '', ''),
('2016-01-14', 'Jig', 'Tablet', 'FT/000254', 'PC068201', 'QE Manager', 'QE', 'IQC Room', 'Tablet Microsoft Surface Pro3,Intel Core i5', 'Other', '', ''),
('2023-01-13', 'Jig', 'Notebook', '', 'PC068202', 'Ms.Nongnuch', 'QC', 'IQC Room', 'Dell vostro 340/VN340RHXFG0010GTH ', 'Other', '', ''),
('2023-01-13', 'Jig', 'Notebook', 'FT/000681', 'PC068203', 'Ms.Kanokporn', 'QC', 'IQC Room', 'Notebook Acer TravelMate TMP214/52/78K5', 'Other', '', ''),
('2023-01-13', 'Jig', 'Notebook', '', 'PC068204', 'Ms.Nongnuch', 'QC', 'IQC Room', 'Notebook Acer TravelMate TMP214/52/78K5', 'Other', '', ''),
('2016-11-25', 'Jig', 'Tablet', 'FT/000398', 'PC068205', 'QE Manager', 'QE', 'IQC Room', 'Microsoft Surface Pro 4 128GB Intel Corei5 (Win10 ', 'Other', '', ''),
('2021-07-07', 'Jig', 'Notebook', 'FT/000612', 'PC068206', 'QC Manager', 'QC', 'IQC Room', 'Notebook Acer TravelMate TMP214/52/78K5', 'JPN', '', ''),
('2021-07-07', 'Jig', 'Notebook', 'FT/000613', 'PC068209', 'QC Manager', 'QC', 'IQC Room', 'Notebook Acer TravelMate TMP214/52/78K5', 'JPN', '', ''),
('2016-03-07', 'Jig', 'PC Desktop', 'MC/000155', 'PC068225', 'Mr.Nikom', 'PE', 'SF Line', 'Dell OptiPlex 7440 AIO', 'JPN', '', ''),
('2019-10-25', 'Jig', 'Notebook', 'OE/000336', 'PC068226', 'Mr.Nikom', 'PE', 'Clean Room', 'HP ProBook 450 G6 Notebook (4SZ45AV)', 'CSL / BTMU/3', '', ''),
('2016-03-07', 'Jig', 'Tablet', 'MC/000154 /1', 'PC068229', 'Mr.Nikom', 'PE', 'SF Line', 'Microsoft Surface 3 / 64GB RAM 4GB (Win10 Pro)', 'JPN', '', ''),
('2020-01-27', 'Jig', 'Tablet', 'FT/000525', 'PC068230', 'Mr.Nikom', 'PE', 'Drum SFII', 'Microsoft Surface Pro 6 (1/4)', 'Other', '', ''),
('2020-01-27', 'Jig', 'Tablet', 'FT/000526', 'PC068231', 'Mr.Nikom', 'PE', 'Seihan SFII', 'Microsoft Surface Pro 6 (2/4)', 'Other', '', ''),
('2020-01-27', 'Jig', 'Tablet', 'FT/000527', 'PC068232', 'Mr.Nikom', 'PE', 'Main SFII', 'Microsoft Surface Pro 6 (3/4)', 'Other', '', ''),
('2021-09-20', 'Jig', 'Tablet', 'FT/000615', 'PC068233', 'Mr.Nikom', 'PE', 'Main SFII', 'Microsoft Surface Pro 7 Core I7/1165G7, 16 GB 12.3', 'Other', '', ''),
('2020-01-27', 'Jig', 'Tablet', 'FT/000528', 'PC068234', 'Mr.Nikom', 'PE', 'Main SFII', 'Microsoft Surface Pro 6 (4/4)', 'Other', '', ''),
('2023-05-11', 'Jig', 'Tablet', 'FT/000688', 'PC068235', 'Mr.Kittisak', 'PE', 'SF Line', 'Microsoft Surface Pro 9 i5/1245U 8GB 256 GB Win10P', 'Other', '', ''),
('2016-11-10', 'Jig', 'Tablet', 'FT/000392', 'PC068236', 'Mr.Nikom', 'PE', 'SF Line', 'Microsoft Surface Pro 4 128GB Intel Corei5 (Win10 ', 'Other', '', ''),
('2022-07-20', 'Jig', 'Tablet', 'FT/000657', 'PC068237', 'Mr.Kittisak', 'PE', 'SF Line', 'Microsoft Surface Pro 7+i7/1165G7 16GB 256GB Win 1', 'Other', '', ''),
('2016-11-10', 'Jig', 'Tablet', 'FT/000394', 'PC068238', 'Mr.Nikom', 'PE', 'SF Line', 'Microsoft Surface Pro 4 128GB Intel Corei5 (Win10 ', 'Other', '', ''),
('2023-05-11', 'Jig', 'Tablet', 'FT/000687', 'PC068239', 'Mr.Kittisak', 'PE', 'MAIN ME', 'Microsoft Surface Pro 9 i5/1245U 8GB 256 GB Win10P', 'Other', '', ''),
('2022-08-11', 'Jig', 'Tablet', 'FT/000660', 'PC068240', 'Mr.Kittisak', 'PE', 'MAIN ME', 'Microsoft Surface Pro 8 +i5/1145G7 8GB 256 GB Win ', 'Other', '', ''),
('2022-09-01', 'Jig', 'Tablet', 'FT/000663', 'PC068241', 'Mr.Anusorn', 'PE', 'MAIN ME', 'Microsoft Surface Pro 8 +i5/1145G7 8GB 256 GB Win1', 'Other', '', ''),
('2017-04-27', 'Jig', 'Tablet', 'FT/000434', 'PC068243', 'Mr.Nikom', 'PE', 'MAIN ME', 'Microsoft Surface Pro 4 (Core i5,RAM 4GB,Windows 1', 'Other', '', ''),
('2023-05-11', 'Jig', 'Tablet', 'FT/000689', 'PC068244', 'Mr.Kittisak', 'PE', 'CELL Line', 'Microsoft Surface Pro 9 i5/1245U 8GB 256 GB Win10P', 'Other', '', ''),
('2017-05-22', 'Jig', 'PC Desktop', 'FT/000444', 'PC068245', 'Mr.Nikom', 'PE', 'Cell Line (F2)', 'Dell OptiPlex 7440 AIO', 'JPN', '', ''),
('2017-06-09', 'Jig', 'PC Desktop', 'FT/000457', 'PC068246', 'Mr.Nikom', 'PE', 'M line Main line', 'Dell OptiPlex 7440 AIO', 'JPN', '', ''),
('2019-03-08', 'Jig', 'Tablet', 'FT/000507', 'PC068247', 'Mr.Nikom', 'PE', 'MAIN MF', 'New Surface Pro (Core i5,SSD 256GB,Ram 8 GB,Intel ', 'Other', '', ''),
('2016-12-13', 'Server', 'AD Server', 'OE/000330', 'SV068011', 'IT', 'IT', 'Server Room', 'Dell PowerEdge R430 Rack Server', 'NTT / BTMU/1', '', ''),
('2016-12-13', 'Server', 'File Server', 'OE/000330', 'SV068012', 'IT', 'IT', 'Server Room', 'Dell PowerEdge R430 Rack Server', 'NTT / BTMU/1', '', ''),
('2011-10-19', 'Server', 'Backup Server', 'OE/000048 ', 'SV068013', 'IT', 'IT', 'Server Room', 'HP Proliant DL120 G7 E3/1220 Pluggable AP Svr Serv', 'JPN', '', ''),
('2020-08-25', 'Server', 'AC Server', 'Rental', 'SV068014', 'IT', 'IT', 'Server Room', 'HP Proliant DL360 Gen10 (A.S.I.A.)', 'MAT', '', ''),
('2020-01-27', 'Clients', 'UPS', 'OE/000209', 'UPS/PC0681', 'Ms.Pennapa', 'PE', 'Admin Office', 'UPS SYNDOME S5 (INNO) 800 VA', 'NTT', '', ''),
('2017-09-18', 'Jig', 'UPS', 'OE/000241', 'UPS/PC0682', 'Mr.Nikom', 'PE', 'E Line Main Line', 'UPS SYNDOME S5 (INNO) 800 VA', 'Other', '', ''),
('2016-07-27', 'Server', 'UPS', 'OE/000228', 'UPS/SV0680', 'IT', 'IT', 'Server Room', 'APC Smart UPS/3000VA and UPS Network Management Ca', 'NTT', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rith_jobcase`
--

CREATE TABLE `rith_jobcase` (
  `job_id` varchar(50) NOT NULL,
  `job_date` date DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_lastname` varchar(50) DEFAULT NULL,
  `user_sec` varchar(10) DEFAULT NULL,
  `user_mail` varchar(255) DEFAULT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `item_ass` varchar(50) DEFAULT NULL,
  `job_cat` varchar(20) DEFAULT NULL,
  `job_detail` varchar(255) DEFAULT NULL,
  `job_charger` varchar(50) DEFAULT NULL,
  `job_img` varchar(55) DEFAULT NULL,
  `chk_re` varchar(255) DEFAULT NULL,
  `re_de1` varchar(50) DEFAULT NULL,
  `re_date1` varchar(10) DEFAULT NULL,
  `re_de2` varchar(50) DEFAULT NULL,
  `re_date2` varchar(10) DEFAULT NULL,
  `job_status` varchar(25) DEFAULT 'Progress',
  `re_date3` date DEFAULT NULL,
  `re_com` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rith_jobcase`
--

INSERT INTO `rith_jobcase` (`job_id`, `job_date`, `user_name`, `user_lastname`, `user_sec`, `user_mail`, `item_name`, `item_ass`, `job_cat`, `job_detail`, `job_charger`, `job_img`, `chk_re`, `re_de1`, `re_date1`, `re_de2`, `re_date2`, `job_status`, `re_date3`, `re_com`) VALUES
('CS-202204001', '2022-06-13', 'Ms.Wanna', 'T.', 'PD', 'nattapon@rith.riso.biz', 'PC068133', 'OE-000252', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204002', '2022-06-13', 'MS.Nutthunya', 'T.', 'PD', 'nattapon@rith.riso.biz', 'PC068168', 'OE-000253', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204003', '2022-06-13', 'Mr.Boonyaroj', 'T.', 'IT', 'nattapon@rith.riso.biz', 'SV068014', 'OE-000254', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204004', '2022-06-13', 'Mr.Anusorn', 'T.', 'QE', 'nattapon@rith.riso.biz', 'Network Equipment', 'OE-000255', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204005', '2022-06-13', 'Ms.Nongnuch', 'T.', 'PE', 'nattapon@rith.riso.biz', 'PC068107', 'OE-000256', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204006', '2022-06-13', 'Mr.Chanin', 'C.', 'QE', 'nattapon@rith.riso.biz', 'PC068153', 'OE-000257', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204007', '2022-06-13', 'Ms.Nirawan', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068106', 'OE-000258', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204008', '2022-06-13', 'Ms.Nirawan', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068112', 'OE-000259', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204009', '2022-06-13', 'Ms.Nirawan', 'C.', 'PE', 'nattapon@rith.riso.biz', 'Handheld', 'OE-000260', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204010', '2022-06-13', 'Ms.Natkritta', 'C.', 'QC', 'nattapon@rith.riso.biz', 'PC068136', 'OE-000261', 'Hardware Damage', 'User request install program Zoom', 'Nattapon', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204011', '2022-06-13', 'Mr.Nikom', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068129,PC068123', 'OE-000262', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204012', '2022-06-13', 'Ms.Nongnuch', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068149', 'OE-000263', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204013', '2022-06-13', 'Ms.Nongnuch', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068149', 'OE-000264', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204014', '2022-06-13', 'Ms.Wipuuthaporn', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068112', 'OE-000265', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204015', '2022-06-13', 'Mr.Surasak', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068168', 'OE-000266', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204016', '2022-06-13', 'Mr.Anuchit', 'C.', 'PD', 'nattapon@rith.riso.biz', 'PC068116', 'OE-000267', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204017', '2022-06-13', 'Mr.Nikom', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068237', 'OE-000268', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204018', '2022-06-13', 'Mr.Nikom', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068129', 'OE-000269', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204019', '2022-06-13', 'Mr.Nikom', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068240', 'OE-000270', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204020', '2022-06-13', 'Mr.Nikom', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068129', 'OE-000271', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204021', '2022-06-13', 'Mr.Purin', 'C.', 'PD', 'nattapon@rith.riso.biz', 'PC068156', 'OE-000272', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204022', '2022-06-13', 'Ms.Sirada', 'C.', 'IT', 'nattapon@rith.riso.biz', 'PC068103', 'OE-000273', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204023', '2022-06-13', 'Ms.Suthaporn', 'C.', 'QE', 'nattapon@rith.riso.biz', 'PC068104', 'OE-000274', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204024', '2022-06-13', 'Ms.Nirawan', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068106', 'OE-000275', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204025', '2022-06-13', 'Ms.Aritsara', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068107', 'OE-000276', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204026', '2022-06-13', 'Ms.Benjamas', 'C.', 'PD', 'nattapon@rith.riso.biz', 'PC068108', 'OE-000277', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204027', '2022-06-13', 'Ms.Kornsirinat', 'C.', 'IT', 'nattapon@rith.riso.biz', 'PC068109', 'OE-000278', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204028', '2022-06-13', 'Mr.Somporn', 'C.', 'QE', 'nattapon@rith.riso.biz', 'PC068110', 'OE-000279', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204029', '2022-06-13', 'Ms.Sudarat', 'C.', 'QC', 'nattapon@rith.riso.biz', 'PC068111', 'OE-000280', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204030', '2022-06-13', 'Ms.Naphatsorn', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068113', 'OE-000281', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204031', '2022-06-13', 'Ms.Sukanya', 'C.', 'PD', 'nattapon@rith.riso.biz', 'PC068114', 'OE-000282', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204032', '2022-06-13', 'Ms.Kornsirinat', 'C.', 'IT', 'nattapon@rith.riso.biz', 'PC068115', 'OE-000283', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204033', '2022-06-13', 'Mr.Piyapong', 'C.', 'QE', 'nattapon@rith.riso.biz', 'PC068128', 'OE-000284', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204034', '2022-06-13', 'Mr.Puchong', 'C.', 'QC', 'nattapon@rith.riso.biz', 'PC068155', 'OE-000285', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204035', '2022-06-13', 'Ms.Patthinee', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068158', 'OE-000286', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204036', '2022-06-13', 'Ms.Peeraporn', 'C.', 'PD', 'nattapon@rith.riso.biz', 'PC068159', 'OE-000287', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204037', '2022-06-13', 'Mr.Wutthikai', 'C.', 'QE', 'nattapon@rith.riso.biz', 'PC068160', 'OE-000288', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204038', '2022-06-13', 'Ms.Kornsirinat', 'C.', 'IT', 'nattapon@rith.riso.biz', 'PC068119', 'OE-000289', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204039', '2022-06-13', 'Mr.Weerachai', 'C.', 'QC', 'nattapon@rith.riso.biz', 'PC068134', 'OE-000290', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204040', '2022-06-13', 'Ms.Nongnuch', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068169', 'OE-000291', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204041', '2022-06-13', 'Mr.Anusorn', 'C.', 'PD', 'nattapon@rith.riso.biz', 'UPC-PC068148', 'OE-000292', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204042', '2022-06-13', 'Mr.Wutthikai', 'C.', 'IT', 'nattapon@rith.riso.biz', 'UPS-PC068150', 'OE-000293', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204043', '2022-06-13', 'Ms.Nongnuch', 'C.', 'QE', 'nattapon@rith.riso.biz', 'PC068149', 'OE-000294', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204044', '2022-06-13', 'Mr.Chanachai', 'C.', 'QC', 'nattapon@rith.riso.biz', 'PC068161', 'OE-000295', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204045', '2022-06-13', 'Mr.Anusorn', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC068129,PC068160', 'OE-000296', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204046', '2022-06-13', 'Ms.Manassanan', 'C.', 'PD', 'nattapon@rith.riso.biz', 'PC068163', 'OE-000297', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204047', '2022-06-13', 'Mr.Nongnuch', 'C.', 'IT', 'nattapon@rith.riso.biz', 'PC068107', 'OE-000298', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Cancel', '2022-06-13', 'Test'),
('CS-202204048', '2022-06-13', 'Ms.Nantaporn', 'C.', 'QE', 'nattapon@rith.riso.biz', 'PC068119', 'OE-000299', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Progress', '2022-06-13', 'Test'),
('CS-202204049', '2022-06-13', 'Ms.Nongnuch', 'C.', 'QC', 'nattapon@rith.riso.biz', 'Microscope', 'OE-000300', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204050', '2022-06-13', 'Mr.Nikom', 'C.', 'PE', 'nattapon@rith.riso.biz', 'PC2068151', 'OE-000301', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204051', '2022-06-13', 'Ms.Wanna', 'T.', 'PD', 'nattapon@rith.riso.biz', 'PC068133', 'OE-000302', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204052', '2022-06-13', 'Ms.Palee', 'T.', 'IT', 'nattapon@rith.riso.biz', 'PC068169', 'OE-000303', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204053', '2022-06-13', 'Ms.Kornsirinat', 'T.', 'QE', 'nattapon@rith.riso.biz', 'SV068014', 'OE-000304', 'Hardware Damage', 'User request install program Zoom', 'Nattapon M.', '', 'Test', 'Test', '2022-06-13', 'Test', '2022-06-13', 'Completed', '2022-06-13', 'Test'),
('CS-202204054', '2023-06-24', 'Kornsirinat', 'Pli.', 'IT', 'kornsirinat@rith.riso.biz', 'PC068115', 'Rental', 'Hardware Damage', 'Mouse was damage', 'Kornsirinat', '192060923620230624.jpg', 'Score bar of mouse was damage ', '-', '-', 'Mouse', '2023-06-24', 'Completed', '2023-06-26', 'Replacement of the new mouse for the user completed.'),
('CS-202204055', '2023-06-17', 'Pornchaiya', 'Sae.', 'PC', 'pornchaiya@rith.riso.biz', 'PC068124', 'OE-000345', 'Hardware Damage', 'Mouse was damaged.', 'Kornsirinat', '100396537320230624', 'Score bar of mouse was damaged.', '-', '-', 'Mouse', '2023-06-23', 'Completed', '2023-06-24', 'Replacement of the new mouse for the user completed.'),
('CS-202204056', '2023-06-24', 'Kornsirinat', 'Pli.', 'IT', 'kornsirinat@rith.riso.biz', 'SV068014', 'Rental', 'Please Choose Catego', 'Request IT support BENG install program', 'Kornsirinat', '3075205920230624.jpg', 'Account request support BENG', 'BENG', '2023-06-27', '-', '-', 'Completed', '2023-06-27', 'BENG install program completed.'),
('CS-202307001', '0000-00-00', 'Nattapon', 'M.', 'IT', 'nattapon@rith.riso.biz', '', '', 'Please Choose Catego', '', NULL, '112840897720230706.png', NULL, NULL, NULL, NULL, NULL, 'Progress', NULL, NULL),
('CS-202307002', '0000-00-00', 'Nattapon', 'M.', 'IT', 'nattapon@rith.riso.biz', 'PC068252', '', 'Hardware Damage', '', NULL, '55540983820230707', NULL, NULL, NULL, NULL, NULL, 'Progress', NULL, NULL),
('CS-202307003', '0000-00-00', 'Nattapon', 'M.', 'IT', 'nattapon@rith.riso.biz', 'PC068252', '', 'Request setting', '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Progress', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rith_user`
--

CREATE TABLE `rith_user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_pass` varchar(20) DEFAULT NULL,
  `item_name` varchar(20) DEFAULT NULL,
  `user_sec` varchar(10) DEFAULT NULL,
  `user_reg` date DEFAULT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mail` varchar(120) DEFAULT NULL,
  `user_tel` varchar(10) DEFAULT NULL,
  `user_type` varchar(10) NOT NULL,
  `user_img` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rith_user`
--

INSERT INTO `rith_user` (`user_id`, `user_name`, `user_lastname`, `user_pass`, `item_name`, `user_sec`, `user_reg`, `user_address`, `user_mail`, `user_tel`, `user_type`, `user_img`) VALUES
(1108005, 'Suthaporn', 'Kassayakorn', '1108005', 'PC068104', 'BOI', '2013-11-20', '', 'suthaporn@rith.riso.biz', '', 'user', 'woman.png'),
(1110008, 'Benjamas', 'Mungsakorn', '1110008', 'PC068108', 'Account', '2013-11-20', '', 'benjamas@rith.riso.biz', '', 'user', 'woman.png'),
(1110010, 'Kanokporn', 'Tunkhui', '1110010', 'PC068130', 'QC', '2013-11-20', '', 'kanokporn@rith.riso.biz', '', 'user', 'woman.png'),
(1111012, 'Nantaporn', 'Phujariphat', '1111012', 'PC068121', 'IT & HR', '2013-11-20', '', 'nantaporn@rith.riso.biz', '', 'admin', 'woman.png'),
(1201014, 'Wanna', 'Treeyotha', '1201014', 'PC068124', 'PC', '2013-11-20', '', 'na@rith.riso.biz', '', 'user', 'woman.png'),
(1202068, 'Palee', 'Kunok', '1202068', 'PC068169', 'QC', '2022-09-22', '', '-', '', 'user', 'woman.png'),
(1205110, 'Wirot', 'Wiangkham', '1205110', 'PC068147', 'QA', '2013-11-20', '', 'wirot@rith.riso.biz', '', 'user', 'woman.png'),
(1207133, 'Aritsara', 'Mayom', '1207133', 'PC068107', 'QC', '2020-10-09', '', 'Defect-slip@rith.riso.biz', '', 'user', 'woman.png'),
(1208150, 'Tasanee', 'Satipa', '1208150', 'PC068141', 'Production', '2013-11-20', '', 'tasonee@rith.riso.biz', '', 'user', 'woman.png'),
(1209155, 'Sakchai', 'Burana', '1209155', 'PC068120', 'Purchase', '2013-11-20', '', 'sakchai155@rith.riso.biz', '', 'user', 'woman.png'),
(1302190, 'Nawee', 'Suksaard', '1302190', 'PC068105', 'Purchase', '2013-11-20', '', 'nawee.s@rith.riso.biz', '', 'user', 'woman.png'),
(1302191, 'Siripen', 'Ngamrabieb', '1302191', 'PC068102', 'Purchase', '2013-11-20', '', 'siripen@rith.riso.biz', '', 'user', 'woman.png'),
(1310286, 'Suparat', 'Tipjoy', '1310286', 'PC068145', 'QE', '2013-11-20', '', 'suparat@rith.riso.biz', '', 'user', 'woman.png'),
(1310288, 'Nongnuch', 'Saeton', '1310288', 'PC068149', 'QC', '2013-11-20', '', 'nongnuch@rith.riso.biz', '', 'user', 'woman.png'),
(1310289, 'Krisorn', 'Mahamek', '1310289', 'PC068142', 'QE', '2013-11-20', '', 'krisorn@rith.riso.biz', '', 'user', 'woman.png'),
(1401301, 'Sirada', 'Phumpha', '1401301', 'PC068103', 'HR', '2014-01-29', '', 'sirada@rith.riso.biz', '', 'user', 'woman.png'),
(1402314, 'Patcharee', 'Chomduang', '1402314', 'PC068135', 'Admin', '2014-02-20', '', 'patcharee@rith.riso.biz', '', 'user', 'woman.png'),
(1403319, 'Natkitta', 'Krasaesueb', '1403319', 'PC068125', 'QA', '2014-06-03', '', 'pui@rith.riso.biz', '', 'user', 'woman.png'),
(1403320, 'Tunyalax', 'Promrad', '1403320', 'PC068118', 'Admin', '2014-03-06', '', 'Reception@rith.riso.biz', '', 'user', 'woman.png'),
(1403321, 'Nutthunya', 'Thaweesri', '1403321', 'PC068168', 'Production', '2022-04-08', '', 'Nutthunya@rith.riso.biz', '', 'user', 'woman.png'),
(1403327, 'Patcharee', 'Baikabroa', '1403327', 'PC068143', 'Purchase', '2014-06-03', '', 'patcharee.b@rith.riso.biz', '', 'user', 'woman.png'),
(1403329, 'Nanthana', 'Nanthanon', '1403329', 'PC068138', 'QE', '2014-06-26', '', 'nanthana@rith.riso.biz', '', 'user', 'woman.png'),
(1404332, 'Theachai', 'Pamuta', '1404332', 'PC068161', 'Admin', '2014-05-03', '', 'theanchai@rith.riso.biz', '', 'user', 'woman.png'),
(1404334, 'Phatcharaporn', 'Jiwprasert', '1404334', 'PC068137', 'Account', '2014-04-19', '', 'phatcharaporn@rith.riso.biz', '', 'user', 'woman.png'),
(1404341, 'Sudarat', 'Gaesri', '1404341', 'PC068111', 'Account', '2014-04-19', '', 'sudarat.k1@rith.riso.biz', '', 'user', 'woman.png'),
(1405342, 'Naphasorn', 'Maimun', '1405342', 'PC068113', 'Logistic', '2014-07-16', '', 'naphasorn@rith.riso.biz', '', 'user', 'woman.png'),
(1405346, 'Likit', 'Sila', '1405346', 'PC068131', 'Logistic', '2022-05-06', '', '-', '', 'user', 'woman.png'),
(1406364, 'Nikom', 'Jaifoo', '1406364', 'PC068129', 'PE', '2014-06-20', '', 'nikom@rith.riso.biz', '', 'user', 'woman.png'),
(1406366, 'Anusorn', 'Klinkajorn', '1406366', 'PC068148', 'PE', '2014-06-22', '', 'anusorn.k@rith.riso.biz', '', 'user', 'woman.png'),
(1407373, 'Nutthapon', 'U-rairat', '1407373', 'PC068123', 'PE', '2014-08-04', '', 'nutthapon@rith.riso.biz', '', 'user', 'woman.png'),
(1409382, 'Phapatsorn', 'Jaknowan', '1409382', 'PC068144', 'Purchase', '2014-09-09', '', 'phapatsorn@rith.riso.biz', '', 'user', 'woman.png'),
(1409383, 'Puchong', 'Nunyoo', '1409383', 'PC068155', 'PE', '2014-09-16', '', 'puchong@rith.riso.biz', '', 'user', 'woman.png'),
(1506450, 'Nirawan', 'Suphatta', '1506450', 'PC068106', 'PE', '2015-06-24', '', 'nirawan@rith.riso.biz', '', 'user', 'woman.png'),
(1602494, 'Wutthikai', 'Srinuan', '1602494', 'PC068151', 'PE', '2016-02-25', '', 'wutthikai@rith.riso.biz', '', 'user', 'woman.png'),
(1602500, 'Kornsirinat', 'Plianumrung', '1602500', 'PC068115', 'IT', '2019-09-12', '', 'kornsirinat@rith.riso.biz', '', 'admin', 'woman.png'),
(1602505, 'Pornchaiya', 'Saengsattra', '1602505', 'PC068133', 'PC', '2016-02-25', '', 'pornchaiya@rith.riso.biz', '', 'user', 'woman.png'),
(1602506, 'Somporn', 'Noptakul', '1602506', 'PC068110', 'Logistic', '2016-02-25', '', 'somporn.no@rith.riso.biz', '', 'user', 'woman.png'),
(1605603, 'Nipawan', 'Camchai', '1605603', 'PC068127', 'Admin', '2016-05-23', '', 'Safety@rith.riso.biz', '', 'user', 'woman.png'),
(1606580, 'Arunrung', 'Jundon', '1606580', 'PC068136', 'QA', '2020-12-01', '', 'arunrung@rith.riso.biz', '', 'user', 'woman.png'),
(1606582, 'Sukanya', 'Sonchot', '1606582', 'PC068114', 'Admin', '2016-06-14', '', 'iso@rith.riso.biz', '', 'user', 'woman.png'),
(1609608, 'Pennapa', 'Ngamsomporn', '1609608', 'PC068101', 'BOI', '2016-09-27', '', 'export@rith.riso.biz', '', 'user', 'woman.png'),
(1702650, 'Natthanankorn', 'Janchot', '1702650', 'PC068163', 'Purchase', '2017-02-21', '', 'manassanan@rith.riso.biz', '', 'user', 'woman.png'),
(1705678, 'Weerachai', 'Sukchot', '1705678', 'PC068134', 'Production', '2017-06-12', '', 'weerachai@rith.riso.biz', '', 'user', 'woman.png'),
(1711710, 'Peeraporn', 'Boothong', '1711710', 'PC068159', 'Account', '2017-11-06', '', 'Account@rith.riso.biz', '', 'user', 'woman.png'),
(1712714, 'Arakawa', 'Shuichi', '1712714', 'PC068051', 'JPN', '2017-12-01', '', 'Arakawa@rith.riso.biz', '', 'user', 'woman.png'),
(1804775, 'Patthinee', 'Bunset', '1804775', 'PC068158', 'BOI', '2018-04-24', '', 'im-export@rith.riso.biz', '', 'user', 'woman.png'),
(1806777, 'Surasak', 'Poowiengkawe', '1806777', 'PC068164', 'QE', '2018-06-13', '', 'Surasak@rith.riso.biz', '', 'user', 'woman.png'),
(1806778, 'Chanachai', 'Bumrungjit', '1806778', 'PC068122', 'Production', '2018-06-08', '', 'Chanachai.brj@rith.riso.biz', '', 'user', 'woman.png'),
(1807781, 'Jarun', 'Srihakul', '1807781', 'PC068167', 'QE', '2018-07-23', '', 'jarun@rith.riso.biz', '', 'user', 'woman.png'),
(1811786, 'Kitisak', 'Krongpoomvijit', '1811786', 'PC068117', 'PE', '2018-11-09', '', 'Kitisak@rith.riso.biz', '', 'user', 'woman.png'),
(1905807, 'Sano', 'Takeshi', '1905807', 'PC068055', 'JPN', '2019-05-02', '', 't-sano@rith.riso.biz', '', 'user', 'woman.png'),
(1906808, 'Benjaluk', 'Yenjai', '1906808', 'PC068112', 'PE', '2019-06-05', '', 'benjaluk@rith.riso.biz', '', 'user', 'woman.png'),
(1908811, 'Jukkapong', 'Nojuk', '1908811', 'PC068157', 'QE', '2019-08-07', '', 'jukkapong.nojuk@rith.riso.biz', '', 'user', 'woman.png'),
(1908812, 'Anupong', 'Sopa', '1908812', 'PC068153', 'QE', '2019-08-07', '', 'anupong.sopa@rith.riso.biz', '', 'user', 'woman.png'),
(1909816, 'Anuchit', 'Sangsawang', '1909816', 'PC068116', 'QE', '2019-09-18', '', 'anuchit.sangsawang@rith.riso.biz', '', 'user', 'woman.png'),
(1909817, 'Pichai', 'Banmai', '1909817', 'PC068132', 'QE', '2019-09-18', '', 'pichai.banmaio@rith.riso.biz', '', 'user', 'woman.png'),
(1910818, 'Yosita', 'Panya', '1910818', 'PC068165', 'HR', '2019-10-15', '', 'yosita@rith.riso.biz', '', 'user', 'woman.png'),
(2002825, 'Sakai', 'Takafumi', '2002825', 'PC068052', 'JPN', '2020-02-03', '', 't-sakai@rith.riso.biz', '', 'user', 'woman.png'),
(2101835, 'Chanin', 'Chanapamokkho', '2101835', 'PC068140', 'QE', '2021-01-13', '', 'chanapamokkho@rith.riso.biz', '', 'user', 'woman.png'),
(2101836, 'Pachara', 'Wongkhambang', '2101836', 'PC068139', 'Admin', '2021-04-27', '', 'pachara@rith.riso.biz', '', 'user', 'woman.png'),
(2101837, 'Kajima', 'Toshio', '2101837', 'PC068056', 'JPN', '2021-02-02', '', 'kajima@riso.co.jp', '', 'user', 'woman.png'),
(2103839, 'Purin', 'Deeluan', '2103839', '-', 'PE', '2021-03-06', '', 'purin@rith.riso.biz', '', 'user', 'woman.png'),
(2105840, 'Pattanamart', 'Pangmanee', '2105840', '-', 'PE', '2021-05-13', '', 'pattanamart@rith.riso.biz', '', 'user', 'woman.png'),
(2107858, 'Wiputthaporn', 'Jabjai', '2107858', 'PC068146', 'PE', '2021-07-12', '', 'wiputthaporn@rith.riso.biz', '', 'user', 'woman.png'),
(2208881, 'Chaiwat', 'Jitanan', '2208881', 'PC068131', 'Logistic', '2022-08-15', '', 'chaiwat@rith.riso.biz', '', 'user', 'woman.png'),
(2209883, 'Oose', 'Satoshi', '2209883', 'PC068054', 'JPN', '2022-09-05', '', 'umi-sora@rith.riso.biz', '', 'user', 'woman.png'),
(2209884, 'Kittiphop', 'Bungoed', '2209884', 'PC068126', 'Admin', '2022-09-20', '', 'kittiphop@rith.riso.biz', '', 'user', 'woman.png'),
(2210888, 'Nattapon', 'Muangsong', '2210888', 'PC068109', 'IT', '2022-10-03', ' ', 'nattapon@rith.riso.biz', '', 'admin', '110528397320230714.png'),
(2210999, 'userxxx', 'userx', '2210999', 'PC068999', 'IT', '2023-07-19', '-', 'userxxx@rith.riso.biz', '-', 'user', 'woman.png'),
(2305891, 'Ono', 'Kinya', '2305891', 'PC068053', 'JPN', '2023-05-02', '', 'kinyaono@rith.riso.biz', '', 'user', 'woman.png'),
(2307893, 'Tajima', 'Junichi', '2307893', 'PC068057', 'JPN', '2023-07-03', '', 'tajima@rith.riso.biz', '', 'user', 'woman.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `email`, `password`) VALUES
(1, 'sam', 'ssa', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dv_br`
--
ALTER TABLE `dv_br`
  ADD PRIMARY KEY (`dv_id`);

--
-- Indexes for table `rith_dborrow`
--
ALTER TABLE `rith_dborrow`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `rith_item`
--
ALTER TABLE `rith_item`
  ADD PRIMARY KEY (`item_name`);

--
-- Indexes for table `rith_jobcase`
--
ALTER TABLE `rith_jobcase`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `rith_user`
--
ALTER TABLE `rith_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
