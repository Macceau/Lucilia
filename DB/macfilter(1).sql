-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2021 at 05:26 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `macfilter`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device`) VALUES
(1, 'ADTP'),
(2, 'LokPrint'),
(3, 'Monarch 6404'),
(4, 'Monarch 6405'),
(5, 'Snap 500'),
(6, 'Snap 600'),
(7, 'Snap 700'),
(8, 'SS Finisher'),
(9, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `errores`
--

DROP TABLE IF EXISTS `errores`;
CREATE TABLE IF NOT EXISTS `errores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `problem` varchar(100) DEFAULT NULL,
  `printer` int(11) DEFAULT NULL,
  `probable_cause` text,
  `corrective_action` text,
  `video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `errores`
--

INSERT INTO `errores` (`id`, `problem`, `printer`, `probable_cause`, `corrective_action`, `video`) VALUES
(1, 'LEDs do not light.', 5, '1) Insufficient supply voltage. \n2) Machine is not plugged in.', '1) Look at the line voltage level shown on the back of the printer (see Figure 5). Confirm \nthat the mains line voltage for your location is within the range limits.\n2) Check that both ends of the power cord are plugged in securely.\n3) Confirm that the outlet the machine is plugged into has power.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventary`
--

DROP TABLE IF EXISTS `inventary`;
CREATE TABLE IF NOT EXISTS `inventary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subinventary` varchar(50) NOT NULL,
  `sigle` varchar(50) NOT NULL,
  `locator` varchar(50) NOT NULL,
  `statut` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventary`
--

INSERT INTO `inventary` (`id`, `item_number`, `quantity`, `subinventary`, `sigle`, `locator`, `statut`) VALUES
(1, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(2, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(3, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(4, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(5, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(6, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(7, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(8, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(9, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(10, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(11, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(12, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(13, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(14, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(15, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(16, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(17, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(18, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(19, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(20, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(21, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(22, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(23, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(24, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(25, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(26, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(27, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Un-exists'),
(28, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Un-exists'),
(29, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Un-exists'),
(30, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists'),
(31, 260, 1, 'HT TCK CEN', 'EA', 'FG-S', 'Exists');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` varchar(60) DEFAULT NULL,
  `item_desc` varchar(200) DEFAULT NULL,
  `price` double NOT NULL,
  `part_number` int(11) DEFAULT NULL,
  `part_description` varchar(60) DEFAULT NULL,
  `printer_model` int(11) DEFAULT NULL,
  `photo_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_number`, `item_desc`, `price`, `part_number`, `part_description`, `printer_model`, `photo_link`) VALUES
(1, '05581201', 'Frame, Upright (ref only)', 0, 1, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(2, '118052', 'Holder, Bearing', 0, 2, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(4, '117903', 'Bearing, Platen', 0, 3, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(5, '117955', 'Gear, Ribbon, 54T - 15T', 0, 4, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(6, '05991367', 'Snap ring, 9/64 e-ring', 0, 5, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(7, '05991372', '6-32 x 1/4 Pan head screw', 0, 6, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(8, '05991368', '2.5x 5mm Pan head screw', 0, 7, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(9, '05586005', 'Spacer, Ink arbor, Inner', 0, 8, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(10, '05583007', 'Shaft, Unwind', 0, 9, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(11, '05586004', 'Spacer, Ink arbor, Outer', 0, 10, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(12, '117954', 'Gear, Ribbon, 75T', 0, 11, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(13, '05990327', 'Snap ring, 5/16 e-ring', 0, 12, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(14, '126468', 'Motor, Ribbon', 0, 13, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(15, '05989971', '5/16 - 18 x 3/8 Set screw', 0, 14, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(16, '05583009', 'Drag plug, Unwind', 0, 15, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(17, '05991443', 'Spring, Compression', 0, 16, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(18, '05583006', 'Knob, Adjust, Unwind', 0, 17, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(19, '05990019', '6-32 x 1/4 Button head screw', 0, 18, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(20, '05583003', 'Hub, Inner, Unwind', 0, 19, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(21, '05583004', 'Shaft, Core locator', 0, 20, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(22, '05990325', 'Snap ring, 3/16 e-ring', 0, 21, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(23, '05583002', 'Hub, Outer, Unwind', 0, 22, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(24, '05583005', 'Bracket, Core locator', 0, 23, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(25, '05990052', '8-32 x 1/2 Cap screw', 0, 24, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
(26, '05593001', 'SHAFT, UNWIND, 600', 0, 6, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628277360_Unwind Assembly Gen2.png'),
(27, '05593002', 'HUB, OUTER, UNWIND, 600', 0, 7, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628277360_Unwind Assembly Gen2.png'),
(28, '05593003', 'HUB, INNER, UNWIND, 600', 0, 8, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628277360_Unwind Assembly Gen2.png'),
(29, '05991436', '6-32 X 375 PHILLIPS PAN HEAD SCREW', 0, 13, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628277360_Unwind Assembly Gen2.png'),
(30, '05991510', 'BALL BEARING , 16mm O.D. x 8mm I.D. FLG', 0, 15, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628277360_Unwind Assembly Gen2.png'),
(31, '05634051', 'SHAFT, QUICK ATTACH UNWIND', 0, 7, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628278503_Unwind Assembly Gen22.png'),
(32, '05634052', 'SHAFT, QUICK ATTACH UNWIND THREADED', 0, 8, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628278542_Unwind Assembly Gen22.png'),
(33, '05996311', '4 SCREW, 4-40 X 5/8 PPHS W/ EXT TOOTH LOCK WASHER', 0, 14, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628279146_Unwind Assembly Gen22.png'),
(34, '05584058', 'BRACKET, WEB GUIDE', 0, 1, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(35, '05584059', 'PLATE, WEB GUIDE', 0, 2, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(36, '05584009', 'SHAFT, WEB GUIDE', 0, 3, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(37, '05584024', 'SHAFT, WEB GUIDE (SENSOR)', 0, 4, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(38, '05584006', 'BRACKET, WEB GUIDE', 0, 5, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(39, '118826', 'GUIDE, WEAR', 0, 6, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(40, '05991374', '1/4 SCREW, 1/4-20 X 1/2 PAN PHILLIPS', 0, 7, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(41, '05584035', 'SPACER, WEB GUIDE', 0, 8, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(42, '05991447', 'SPRING, COMPRESSION', 0, 9, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(43, '05990079', '10-32 X 1/4 CAP SCREW', 0, 10, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(44, '05990313', 'THUMB KNOB, #10', 0, 11, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(45, '05584025', 'GEAR, WEB GUIDE ADJUST', 0, 12, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(46, '05990148', '1/4-20 E-S NUT', 0, 13, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(47, '05991366', 'KNOB, CLAMPING', 0, 14, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(48, '05581128', 'SENSOR, REF HARN', 0, 15, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(49, '05989975', '4-40 X 3/16 PAN HD SCREW', 0, 16, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(50, '05991379', '10-32 X 3/8 PHILLIPS PAN HEAD SCREW', 0, 17, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
(51, '05594014', 'SHAFT, WEB GUIDE SENSOR', 0, 2, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
(52, '05594001', 'BLOCK, SENSOR MOUNT', 0, 8, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
(53, '05591201K', 'FRAME, SNAP 500', 0, 16, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
(54, '05591447', 'SPRING, COMPRESSION', 0, 17, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
(55, '05591121', 'LED, HARNESSED', 0, 18, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
(56, '05591128', 'SENSOR, REG OPTL SWITCH', 0, 19, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
(57, '05591129', 'SENSOR, IR LED CEN HARN', 0, 20, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
(58, '05591130', 'SWITCH, SENS HOLE HARN', 0, 21, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
(59, '05581222', 'COVER, HOLE SENSR SWITCH', 0, 22, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
(60, '05585008', 'Latch, Head - Right', 0, 1, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(61, '117951', 'Button, Pressure', 0, 2, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(62, '05585006', 'Shaft, Head lock', 0, 3, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(63, '05585005', 'Screw, Special head lock', 0, 4, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(64, '05585007', 'Latch, Head - Left', 0, 5, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(65, '05585022', 'Mount, Print head', 0, 6, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(66, '117950', 'Pin, Print head pivot', 0, 7, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(67, '05585023', 'Bracket, Print head mount', 0, 8, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(68, '05581111', 'Pot, Contrast control', 0, 9, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(69, '990436', 'Roll pin, 1/16 x 3/8', 0, 10, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(70, '991382', 'Spring, Compression', 0, 11, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(71, '991383', 'Spring, Extension', 0, 12, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(72, '990469', 'Washer, Nylon, .031 Thick', 0, 13, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(73, 'PB00700220', 'Screw, Pan head, Phillips', 0, 14, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(74, '05581190', 'Assembly, Print head, 500', 0, 15, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(75, '05589029', 'Harness, Fan, Print Head', 0, 16, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(76, '991492', 'Nylon rivet', 0, 17, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
(77, '05635003', 'BRACKET, PRINT HEAD MOUNT', 0, 5, 'Print Head Assembly – Gen 2', 5, 'picturepart/1628608698_Print Head Assembly – Gen 2.png'),
(78, '05631190S', 'PRINT HEAD, 500 2 OVER 1', 0, 6, 'Print Head Assembly – Gen 2', 5, 'picturepart/1628608698_Print Head Assembly – Gen 2.png'),
(79, '05585027', 'ASSY, LATCH, PRINT HEAD', 0, 8, 'Print Head Assembly – Gen 2', 5, 'picturepart/1628608698_Print Head Assembly – Gen 2.png'),
(80, '991653', 'SCREW, PAN HEAD PHILLIPS', 0, 15, 'Print Head Assembly – Gen 2', 5, 'picturepart/1628608698_Print Head Assembly – Gen 2.png'),
(81, '05581126', 'SCREW, PAN HEAD PHILLIPS', 0, 0, 'Print Head Assembly – Gen 2', 5, 'picturepart/1628608698_Print Head Assembly – Gen 2.png'),
(82, '05581130', 'SENSOR, OPTICAL SLOTTED, HARNESSED', 0, 1, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(83, '05631201', 'KIT, FRAME ASSEMBLY, SNAP 500 2/1', 0, 2, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(84, '117903', 'BALL BEARING', 0, 3, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(85, '05585012', 'SHAFT, SWING BLOCK', 0, 4, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(86, '05585014', 'BRACKET, SWING ARM 600 DPI (USE ON 600 DPI MACHINE)', 0, 5, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(87, '05595005', 'SHAFT, PLATEN ROLLER', 0, 6, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(88, '05595010', 'ROLLER, MOLDED PLATEN - RED', 0, 7, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(89, '05595008', 'ROLLER, MOLDED PLATEN - GREEN', 0, 7, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(90, '990067', 'WASHER, #8 SAE', 0, 8, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(91, '990068', 'LOCK WASHER, #8', 0, 9, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(92, '990327', 'E-RING, 5/16', 0, 10, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(93, '990486', 'SNAP RING, 3/8 E-RING', 0, 11, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(94, '991480', '10-32 X 5/16 PHILLIPS PAN HEAD SCREW', 0, 12, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(95, '991643', '8-32 X 3/8 THUMB SCREW', 0, 13, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(96, '991422', '4-40 X 1/4 PHILLIPS PAN HEAD SCREW', 0, 14, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(97, '991608', 'SPRING, EXTENSION', 0, 15, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
(98, '05586007', 'Shaft, Ink arbor', 0, 4, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(99, '05586008', 'Core, Ink arbor, Molded', 0, 5, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(100, '991454', '8-32 x 1/4 Thumb screw', 0, 6, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(101, '126468', 'Motor, Ribbon', 0, 7, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(102, '05586004', 'Spacer, Ink arbor, Outer', 0, 8, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(103, '05586006', 'Shaft, Ink arbor lock', 0, 9, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(104, '05586002', 'Bracket, Inch core stop - Black', 0, 10, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(105, '05586009', 'Bracket, Metric core stop - Gray', 0, 10, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(106, '991370', 'Torsion spring', 0, 11, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(107, '991367', 'Snap ring, 9/64 e-ring', 0, 12, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(108, '990327', 'Snap ring, 5/16 e-ring', 0, 13, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(109, '117954', 'Gear, Ribbon, 75T', 0, 14, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(110, '17955', 'Gear, Ribbon, 54T - 15T', 0, 15, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(111, '991372', '6-32 x 1/4 Phillips pan head screw', 0, 16, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(112, '990019', 'Hexagon socket BH cap screw', 0, 17, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(113, '991368', '2.5mm x 5mm Slotted PH screw', 0, 18, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(114, '05586003', 'Shaft, Ink turn', 0, 19, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(115, '05586094K', 'Kit, Single arbor assembly, Inch', 0, 20, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(116, '05586095K', 'Kit, Single arbor assembly, Metric', 0, 20, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
(117, '05596001', 'SHAFT, INK ARBOR, 600', 0, 1, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
(118, '05586008', 'CORE, INK ARBOR, MOLDED', 0, 2, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
(119, '05586002', 'BRACKET, CORE STOP (INCH) A*', 0, 3, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
(120, '05586009', 'BRACKET, CORE STOP (METRIC) B*', 0, 3, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
(121, '05586006', 'SHAFT, IN K ARBOR, LOCK', 0, 4, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
(122, '991370', 'SPRING, TORSION, CORE STOP', 0, 5, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
(125, '991454', '8-32 X 1/4\" THUMB SCREW', 0, 6, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
(126, '991510', 'BALL BEARING , 16mm O.D. x 8mm I.D. FLG', 0, 7, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
(127, '117954', 'GEAR-RIBBON 75T', 0, 8, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
(128, '990327', 'E-RING, 5/16', 0, 9, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
(130, '117954', 'GEAR-RIBBON 75T', 0, 1, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
(131, '117955', 'GEAR-RIBBON 54T-15T', 0, 2, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
(132, '126468', 'MOTOR - RIBBON', 0, 3, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
(133, '05581186', 'MOTOR, STOCK UNWIND W/ EXTENSION', 0, 4, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
(134, '05593001', 'SHAFT, UNWIND, 600', 0, 5, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
(135, '05596001', 'SHAFT, INK ARBOR, 600', 0, 6, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
(136, '05631201', 'KIT, FRAME ASSEMBLY, SNAP 500 2/1', 0, 7, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
(137, '990327', 'E-RING, 5/16', 0, 8, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
(138, '991510', 'BALL BEARING , 16mm O.D. x 8mm I.D. FLG', 0, 9, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
(139, '991639', 'M2.6 X 4mm PPHS', 0, 10, 'M2.6 X 4mm PPHS', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
(141, '05584011', 'FRAME, KNIFE / DRIVE', 0, 1, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705408_Feed – Drive Train Assembly – Gen 1.png'),
(142, '05584010', 'SUPPORT, BEARING', 0, 2, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705408_Feed – Drive Train Assembly – Gen 1.png'),
(143, '117903', 'BALL BEARING', 0, 3, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
(144, '118052', 'HOLDER, BEARING', 0, 4, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
(145, '05584026', 'BRACKET, FEED MOTOR MOUNT', 0, 5, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
(146, '351141', 'STEPPER MOTOR, HARNESSED', 0, 6, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
(147, '05585013', 'SHAFT, SWING BLOCK', 0, 7, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
(148, '990439', 'NYLON WASHER', 0, 8, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
(149, '05585014', 'BRACKET, SWING ARM', 0, 9, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
(150, '05585024', 'SHAFT, PLATEN ROLLER', 0, 10, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
(151, '05585016', 'GEAR, 38T DRIVE 300 DPI', 0, 11, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
(152, '117902', 'GEAR, PLATEN', 0, 12, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
(153, '05624024', 'ROLLER, NIP DRIVE, MOLDED', 50, 4, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(154, '05624023 ', 'BRACKET, NIP ROLLER MOUNT', 5, 1, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(155, '05584033', 'BRACKET, NIP ROLLER OUTER ', 30, 2, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(156, '05999098', 'BUSHING, 3/16 X 1/4 X 3/8', 50, 3, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(157, '05624025', 'ROLLER, NIP ', 30, 5, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(158, '05999165', 'BUSHING, 3/16 X 1/4 X 1/4', 10, 6, 'Nip Roller Assembly ', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(159, '05999076 ', 'BEARING, 3/16 X 1/4 X 5/8 OIL NS IMPREG BUSHING ', 10, 7, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(160, '05990325', 'SNAP RING, 3/16 \"E\" RING', 10, 8, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(161, '05991523', 'SPRING, COMP 500/600 NIP ASSEMBLY', 10, 9, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(162, '05990424', '4-40 X 3/8\" SH CAP SCREW', 10, 10, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(163, '05624038 ', 'BRACKET, STRIPPER', 10, 11, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(164, '05448010 ', 'STATIC BRUSH', 10, 12, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(165, '05991373', '8-32 X 1/4 PAN PHILLIPS', 10, 13, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(166, '05991454', '8-32 X 1/4 THUMB SCREW', 10, 14, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(167, '05991377', '10-32 X 3/4 PAN PHILLIPS', 10, 15, 'Nip Roller Assembly', 7, 'picturepart/1632487522_Nip Roller Assembly.PNG'),
(168, '05634050', 'GEAR, 30T 600 DPI', 10, 11, '600DPI Machine Parts – Gen 2', 5, 'picturepart/1632489141_600DPI Machine Parts – Gen 2.PNG'),
(169, '421002', 'FRONT PLATE ', 10, 1, 'Knife Assembly ', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(170, '427018', 'SUPPORT, ROCKER ARM ', 10, 2, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(171, '22012', 'LINK PLATE ASSEMBLY', 10, 3, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(172, '427033', 'LINK SLIDER ASSEMBLY ', 10, 4, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(173, '27041', 'SCREW, KNIFE ADJUSTER', 10, 5, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(174, '427007', 'TIE PLATE', 10, 6, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(175, '427042', 'LOCK KNOB', 10, 7, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(176, '427026', 'NUT, ADJUSTMENT', 10, 8, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(177, '421012', 'FRAME, KNIFE', 10, 9, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(178, '427002  ', 'SLIDER, KNIFE ADJUST', 10, 10, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(179, '427062', 'INSULATOR, KNIFE HOLDER', 10, 11, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(180, '427061', 'BUSHING, INSULATOR', 10, 12, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(181, '990092 ', '10-32 X 1/2\" BUTTON HD CAP SCR  ', 10, 13, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(182, '990122', '1/4-20 X 3/4\" SOCKET HD CAP SCR', 10, 14, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(183, '999142', 'BUSHING, 1/2 X 3/4 X 2\"  ', 10, 15, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(184, '990120 ', '1/4-20 X 1/2\" SOCKET HD CAP SCR ', 10, 16, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(185, '990127', '1/4-20 X 2\" SOCKET HD CAP SCR', 10, 17, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(186, '990148', '1/4-20 E-S NUT', 10, 18, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(187, '427035', 'COMPRESSION SPRING', 10, 19, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(188, '990081', '10-32 X 1/2 SOCKET HJD CAP SCR  ', 10, 20, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(189, '151186', 'SONIC CONTROL IMPUT HARNESS', 10, 21, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(190, '989976', '#6 STAR WASHER', 10, 22, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(191, '990019', '6-32 X 1/4\" BUTON HD CAP SCR', 10, 23, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(192, '575004', 'SONIC KIT, 115V, 1000W', 10, 24, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(193, '427096', 'FRAME, HORN MOUNT', 10, 25, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(194, '577056', 'KNIFE BLADE', 10, 26, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(195, '427086 ', 'KNIFE MOUNT', 10, 27, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(196, '999071', 'BUSHING 5/16 X 1/2 X 3/8\"', 10, 28, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(197, '999105', 'BUSHING 5/16 X 7/16 X 1/4\"  ', 10, 29, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(198, '427006', 'ARM, LEVER', 10, 30, 'Knife Assembly', 8, 'picturepart/1632493044_Knife Assembly.PNG'),
(199, '05800265', 'Chip', 10, 0, 'Control Panel Operation', 8, 'picturepart/1632756083_Control Panel Operation.PNG'),
(200, 'A3413', 'Feed roller ', 20, 9, '64-xx dispenser', 3, 'picturepart/1632918239_64-xx dispenser.PNG'),
(201, 'A3413', 'Print roller', 20, 10, '64-xx dispenser', 3, 'picturepart/1632918239_64-xx dispenser.PNG'),
(202, '05634028', 'GEAR, 70T', 20, 5, '600DPI Machine Parts – Gen 2', 5, 'picturepart/1632918835_600DPI Machine Parts – Gen 2.PNG'),
(203, '05634015', 'BRACKET, FEED ASSEMBLY', 20, 10, 'Feed Assembly – Gen 2 ', 5, 'picturepart/1632921176_Feed Assembly – Gen 2.png'),
(204, '05634012', 'BEARING MOUNT, FEED SHAFT', 20, 9, 'Feed Assembly – Gen 2', 5, 'picturepart/1632921176_Feed Assembly – Gen 2.png'),
(205, '05584013', 'ROLLER, MOLDED, IDLER', 20, 16, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1632922189_Feed – Drive Train Assembly – Gen 1.png'),
(206, '581182', 'Sensor, Color, Sick ', 20, 5, 'RUN position', 7, 'picturepart/1632923628_RUN position.PNG'),
(207, '581181', 'Sensor, Contrast, Sick', 20, 5, 'RUN position', 7, 'picturepart/1632923628_RUN position.PNG'),
(208, '05584015', 'Roller, Molded', 20, 12, 'Knife – Drive – Nip Roller Assembly – Gen 1 ', 5, 'picturepart/1632925061_Knife – Drive – Nip Roller Assembly – Gen 1 .png'),
(209, '05584016', 'Roller, Nip, Idler', 20, 13, 'Knife – Drive – Nip Roller Assembly – Gen 1', 5, 'picturepart/1632925061_Knife – Drive – Nip Roller Assembly – Gen 1 .png'),
(210, '05634102', 'ROLLER, GRIT ', 20, 15, 'Feed Assembly – Gen 2', 5, 'picturepart/1632925341_Feed Assembly – Gen 2.png'),
(211, '05634010', 'ROLLER, MOLDED LOWER FEED', 20, 7, 'Feed Assembly – Gen 2', 5, 'picturepart/1633010276_Feed Assembly – Gen 2.png'),
(212, '05624016', 'BRACKET, END DRIVE', 20, 1, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(213, '05999001', 'R6FF BEARING', 20, 2, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(214, '05624039 ', 'BRACKET, STRIPPER WIRE MOUNT', 20, 3, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(215, '05624017 ', 'ROLLER, GRIT (MAIN DRIVE)', 20, 4, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(216, '05624020-1', 'SHAFT, IDLER ROLLER', 20, 5, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(217, '05624190-1', 'ASSY, FEED ROLLER', 20, 6, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(218, '05624022', 'BRACKET, STRIPPER, LOWER', 20, 7, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(219, '05990281', 'WASHER, 1/2X3/4X.015 SHIM', 20, 8, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(220, '05990328 ', 'MUST BE ROHS SNAP RING, 1/2 \"E\" RING', 20, 9, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(221, '05624021-1', 'PLUG, SPRING LOCK', 20, 10, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(222, '05990136', '1/4:20 X 1/4 KNURLED CUP POINT', 45, 11, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(223, '05989979', '10:32 X 1 KNURLED CUP POINT', 77, 12, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(224, '05990104', '10:32 E-S NUT', 67, 13, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(225, '05105023K', 'IMPRESSION ADJ KNOB/SS KIT', 54, 14, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(226, '05990055', '8:32X3/8 F. H. SCREW ', 99, 15, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(227, '05448010', 'STATIC BRUSH', 54, 16, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(228, '05990066', '8:32X1/4 BTN. SCREW', 34, 17, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(229, '05990079', '10:32 X 1/4 CAP SCREW ', 23, 18, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(230, '05624046', 'BRACKET, STRIPPER UPPER', 33, 19, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(231, '05624178', 'COVER, FEED GUARD, SNAP 700', 55, 20, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(232, '05624015', 'BRACKET, BASE, DRIVE MODULE', 34, 21, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(233, '05991626 ', 'COMPRESSION SPRING, .360 OD X .059 WIRE X .69', 32, 22, 'Drive Assembly', 7, 'picturepart/1633010940_Drive Assembly.PNG'),
(234, '05625094-1', 'ASSEMBLY, 700 PRINT HEAD, 5 INCH', 50, 1, 'Print Head Assembly ', 7, 'picturepart/1633012963_Print Head Assembly.PNG'),
(235, '05625050', 'GUARD, PRINT HEAD', 22, 2, 'Print Head Assembly', 7, 'picturepart/1633012963_Print Head Assembly.PNG'),
(236, '05331201', ' KIT, FRAME ASSEMBLY, SNAP 500 2/1 ', 56, 1, 'Knife Assembly  – Gen 2', 5, 'picturepart/1633013472_Knife Assembly  – Gen 2.PNG'),
(237, '05587017', 'STANDOFF, KNIFE MOTOR', 44, 2, 'Knife Assembly  – Gen 2', 5, 'picturepart/1633013472_Knife Assembly  – Gen 2.PNG'),
(238, '05637001', 'BRACKET, KNIFE', 67, 3, 'Knife Assembly  – Gen 2', 5, 'picturepart/1633013472_Knife Assembly  – Gen 2.PNG'),
(239, '991376', '10 SCREW, 10-32 X 1/2 PAN PHILLIPS ', 98, 4, 'Knife Assembly  – Gen 2', 5, 'picturepart/1633013472_Knife Assembly  – Gen 2.PNG'),
(240, '05581130', 'SENOSR, OPTICAL SLOTTED, HARNESSED ', 34, 5, 'Knife Assembly  – Gen 2', 5, 'picturepart/1633013472_Knife Assembly  – Gen 2.PNG'),
(241, '989983', '4-40 X 1/4 PHILLIPS PAN HEAD SCREW ', 45, 6, 'Knife Assembly  – Gen 2', 5, 'picturepart/1633013472_Knife Assembly  – Gen 2.PNG'),
(242, '05245026', 'STEPPER MOTOR, HARNESSED', 77, 7, 'Knife Assembly  – Gen 2', 5, 'picturepart/1633013472_Knife Assembly  – Gen 2.PNG'),
(243, '991642 ', 'DRIVE, BEAM COUPLING ', 87, 8, 'Knife Assembly  – Gen 2', 5, 'picturepart/1633013472_Knife Assembly  – Gen 2.PNG'),
(244, '05637002', 'ASSY, KNIFE DRIVE SHAFT', 87, 9, 'Knife Assembly  – Gen 2', 5, 'picturepart/1633013472_Knife Assembly  – Gen 2.PNG'),
(245, '05587090-2', 'ASSEMBLY, KNIFE', 54, 10, 'Knife Assembly  – Gen 2', 5, 'picturepart/1633013472_Knife Assembly  – Gen 2.PNG'),
(246, '05584034', 'Electrical, Static Brush', 65, 13, 'Short Feed Option – Gen 1', 5, 'picturepart/1633023376_Short Feed Option – Gen 1.PNG'),
(247, '05587086 ', 'SHAFT, FRONT UPPER ROLLER', 67, 1, 'Nip Roller Assembly – Gen 2', 5, 'picturepart/1633023977_Nip Roller Assembly – Gen 2.png'),
(248, '05588076', 'BRACKET, TICKET STRIPPER', 89, 2, 'Nip Roller Assembly – Gen 2', 5, 'picturepart/1633023977_Nip Roller Assembly – Gen 2.png'),
(249, '05634023', 'BRACKET, NIP INNER ASY ', 76, 3, 'Nip Roller Assembly – Gen 2', 5, 'picturepart/1633023977_Nip Roller Assembly – Gen 2.png'),
(250, '05634024', 'BRACKET, NIP OUTTER ASY', 54, 4, 'Nip Roller Assembly – Gen 2', 5, 'picturepart/1633023977_Nip Roller Assembly – Gen 2.png'),
(251, '05634025', 'ROLLER, NIP MOLDED', 23, 5, 'Nip Roller Assembly – Gen 2', 5, 'picturepart/1633023977_Nip Roller Assembly – Gen 2.png'),
(252, '05634026', 'SPRING, NIP ', 65, 6, 'Nip Roller Assembly – Gen 2', 5, 'picturepart/1633023977_Nip Roller Assembly – Gen 2.png'),
(253, '5634033', 'ELECTRICAL, STATIC BRUSH ', 5, 7, 'Nip Roller Assembly – Gen 2', 5, 'picturepart/1633023977_Nip Roller Assembly – Gen 2.png'),
(254, '990015', '6-32 X 1/4 SHCS', 78, 8, 'Nip Roller Assembly – Gen 2', 5, 'picturepart/1633023977_Nip Roller Assembly – Gen 2.png'),
(255, '990314', 'KNOB, THUMB SCREW, #6 ', 0, 9, 'Nip Roller Assembly – Gen 2', 5, 'picturepart/1633023977_Nip Roller Assembly – Gen 2.png'),
(256, '991422', '4 SCREW, 4-40 X 1/4 PAN HD PHILLIPS ', 0, 10, 'Nip Roller Assembly – Gen 2', 5, 'picturepart/1633023977_Nip Roller Assembly – Gen 2.png'),
(257, 'A0978', 'Print head 4 In', 0, 3, '64-xx dispenser', 3, 'picturepart/1633026385_64-xx dispenser.PNG'),
(258, 'A0979', 'Print head, 5 In', 0, 3, '64-xx dispenser', 4, 'picturepart/1633026385_64-xx dispenser.PNG'),
(259, '12678401', '9800, 300 DPI, PRINTHEAD ASSY KIT (REPLACES 12055201)', 0, 10, 'Print Head Assembly', 1, 'picturepart/1633028910_D e s c r i p c i ó n   d e   l a   i m p r e s o r aa.png'),
(260, '05634149 ', 'ROLLER, AUX FEED DRIVE', 0, 19, 'Feed Assembly – Gen 2 ', 5, 'picturepart/1633348266_Feed Assembly – Gen 2.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
