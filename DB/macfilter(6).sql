-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           10.4.18-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.0.0.6037
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour macfilter
CREATE DATABASE IF NOT EXISTS `macfilter` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `macfilter`;

-- Listage de la structure de la table macfilter. devices
CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table macfilter.devices : ~8 rows (environ)
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;

-- Listage de la structure de la table macfilter. errores
CREATE TABLE IF NOT EXISTS `errores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `problem` varchar(100) DEFAULT NULL,
  `printer` int(11) DEFAULT NULL,
  `probable_cause` text DEFAULT NULL,
  `corrective_action` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table macfilter.errores : ~1 rows (environ)
/*!40000 ALTER TABLE `errores` DISABLE KEYS */;
INSERT INTO `errores` (`id`, `problem`, `printer`, `probable_cause`, `corrective_action`) VALUES
	(1, 'LEDs do not light.', 5, '1) Insufficient supply voltage. \n2) Machine is not plugged in.', '1) Look at the line voltage level shown on the back of the printer (see Figure 5). Confirm \nthat the mains line voltage for your location is within the range limits.\n2) Check that both ends of the power cord are plugged in securely.\n3) Confirm that the outlet the machine is plugged into has power.');
/*!40000 ALTER TABLE `errores` ENABLE KEYS */;

-- Listage de la structure de la table macfilter. inventary
CREATE TABLE IF NOT EXISTS `inventary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `statut` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table macfilter.inventary : ~2 rows (environ)
/*!40000 ALTER TABLE `inventary` DISABLE KEYS */;
INSERT INTO `inventary` (`id`, `item_number`, `quantity`, `statut`) VALUES
	(1, 1, 5, 'Exists'),
	(2, 2, 4, 'Exists');
/*!40000 ALTER TABLE `inventary` ENABLE KEYS */;

-- Listage de la structure de la table macfilter. items
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` varchar(60) DEFAULT NULL,
  `item_desc` varchar(200) DEFAULT NULL,
  `part_number` int(11) DEFAULT NULL,
  `part_description` varchar(60) DEFAULT NULL,
  `printer_model` int(11) DEFAULT NULL,
  `photo_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table macfilter.items : ~147 rows (environ)
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `item_number`, `item_desc`, `part_number`, `part_description`, `printer_model`, `photo_link`) VALUES
	(1, '05581201', 'Frame, Upright (ref only)', 1, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(2, '118052', 'Holder, Bearing', 2, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(4, '117903', 'Bearing, Platen', 3, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(5, '117955', 'Gear, Ribbon, 54T - 15T', 4, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(6, '05991367', 'Snap ring, 9/64 e-ring', 5, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(7, '05991372', '6-32 x 1/4 Pan head screw', 6, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(8, '05991368', '2.5x 5mm Pan head screw', 7, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(9, '05586005', 'Spacer, Ink arbor, Inner', 8, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(10, '05583007', 'Shaft, Unwind', 9, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(11, '05586004', 'Spacer, Ink arbor, Outer', 10, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(12, '117954', 'Gear, Ribbon, 75T', 11, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(13, '05990327', 'Snap ring, 5/16 e-ring', 12, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(14, '126468', 'Motor, Ribbon', 13, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(15, '05989971', '5/16 - 18 x 3/8 Set screw', 14, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(16, '05583009', 'Drag plug, Unwind', 15, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(17, '05991443', 'Spring, Compression', 16, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(18, '05583006', 'Knob, Adjust, Unwind', 17, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(19, '05990019', '6-32 x 1/4 Button head screw', 18, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(20, '05583003', 'Hub, Inner, Unwind', 19, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(21, '05583004', 'Shaft, Core locator', 20, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(22, '05990325', 'Snap ring, 3/16 e-ring', 21, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(23, '05583002', 'Hub, Outer, Unwind', 22, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(24, '05583005', 'Bracket, Core locator', 23, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(25, '05990052', '8-32 x 1/2 Cap screw', 24, 'Unwind Assembly – Gen 1', 5, 'picturepart/1627161623_Unwind Assembly.png'),
	(26, '05593001', 'SHAFT, UNWIND, 600', 6, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628277360_Unwind Assembly Gen2.png'),
	(27, '05593002', 'HUB, OUTER, UNWIND, 600', 7, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628277360_Unwind Assembly Gen2.png'),
	(28, '05593003', 'HUB, INNER, UNWIND, 600', 8, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628277360_Unwind Assembly Gen2.png'),
	(29, '05991436', '6-32 X 375 PHILLIPS PAN HEAD SCREW', 13, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628277360_Unwind Assembly Gen2.png'),
	(30, '05991510', 'BALL BEARING , 16mm O.D. x 8mm I.D. FLG', 15, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628277360_Unwind Assembly Gen2.png'),
	(31, '05634051', 'SHAFT, QUICK ATTACH UNWIND', 7, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628278503_Unwind Assembly Gen22.png'),
	(32, '05634052', 'SHAFT, QUICK ATTACH UNWIND THREADED', 8, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628278542_Unwind Assembly Gen22.png'),
	(33, '05996311', '4 SCREW, 4-40 X 5/8 PPHS W/ EXT TOOTH LOCK WASHER', 14, 'Unwind Assembly – Gen 2', 5, 'picturepart/1628279146_Unwind Assembly Gen22.png'),
	(34, '05584058', 'BRACKET, WEB GUIDE', 1, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(35, '05584059', 'PLATE, WEB GUIDE', 2, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(36, '05584009', 'SHAFT, WEB GUIDE', 3, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(37, '05584024', 'SHAFT, WEB GUIDE (SENSOR)', 4, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(38, '05584006', 'BRACKET, WEB GUIDE', 5, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(39, '118826', 'GUIDE, WEAR', 6, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(40, '05991374', '1/4 SCREW, 1/4-20 X 1/2 PAN PHILLIPS', 7, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(41, '05584035', 'SPACER, WEB GUIDE', 8, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(42, '05991447', 'SPRING, COMPRESSION', 9, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(43, '05990079', '10-32 X 1/4 CAP SCREW', 10, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(44, '05990313', 'THUMB KNOB, #10', 11, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(45, '05584025', 'GEAR, WEB GUIDE ADJUST', 12, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(46, '05990148', '1/4-20 E-S NUT', 13, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(47, '05991366', 'KNOB, CLAMPING', 14, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(48, '05581128', 'SENSOR, REF HARN', 15, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(49, '05989975', '4-40 X 3/16 PAN HD SCREW', 16, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(50, '05991379', '10-32 X 3/8 PHILLIPS PAN HEAD SCREW', 17, 'Guide Assembly – Gen 1 and 2', 5, 'picturepart/1628602176_Guide Assembly – Gen 1 and 2.png'),
	(51, '05594014', 'SHAFT, WEB GUIDE SENSOR', 2, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
	(52, '05594001', 'BLOCK, SENSOR MOUNT', 8, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
	(53, '05591201K', 'FRAME, SNAP 500', 16, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
	(54, '05591447', 'SPRING, COMPRESSION', 17, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
	(55, '05591121', 'LED, HARNESSED', 18, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
	(56, '05591128', 'SENSOR, REG OPTL SWITCH', 19, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
	(57, '05591129', 'SENSOR, IR LED CEN HARN', 20, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
	(58, '05591130', 'SWITCH, SENS HOLE HARN', 21, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
	(59, '05581222', 'COVER, HOLE SENSR SWITCH', 22, 'Guide Assembly – Gen 1 with Hole Sensing', 5, 'picturepart/1628603666_Guide Assembly – Gen 1 with Hole Sensing.png'),
	(60, '05585008', 'Latch, Head - Right', 1, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(61, '117951', 'Button, Pressure', 2, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(62, '05585006', 'Shaft, Head lock', 3, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(63, '05585005', 'Screw, Special head lock', 4, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(64, '05585007', 'Latch, Head - Left', 5, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(65, '05585022', 'Mount, Print head', 6, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(66, '117950', 'Pin, Print head pivot', 7, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(67, '05585023', 'Bracket, Print head mount', 8, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(68, '05581111', 'Pot, Contrast control', 9, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(69, '990436', 'Roll pin, 1/16 x 3/8', 10, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(70, '991382', 'Spring, Compression', 11, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(71, '991383', 'Spring, Extension', 12, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(72, '990469', 'Washer, Nylon, .031 Thick', 13, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(73, 'PB00700220', 'Screw, Pan head, Phillips', 14, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(74, '05581190', 'Assembly, Print head, 500', 15, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(75, '05589029', 'Harness, Fan, Print Head', 16, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(76, '991492', 'Nylon rivet', 17, 'Print Head Assembly – Gen 1', 5, 'picturepart/1628607470_Print Head Assembly – Gen 1.png'),
	(77, '05635003', 'BRACKET, PRINT HEAD MOUNT', 5, 'Print Head Assembly – Gen 2', 5, 'picturepart/1628608698_Print Head Assembly – Gen 2.png'),
	(78, '05631190S', 'PRINT HEAD, 500 2 OVER 1', 6, 'Print Head Assembly – Gen 2', 5, 'picturepart/1628608698_Print Head Assembly – Gen 2.png'),
	(79, '05585027', 'ASSY, LATCH, PRINT HEAD', 8, 'Print Head Assembly – Gen 2', 5, 'picturepart/1628608698_Print Head Assembly – Gen 2.png'),
	(80, '991653', 'SCREW, PAN HEAD PHILLIPS', 15, 'Print Head Assembly – Gen 2', 5, 'picturepart/1628608698_Print Head Assembly – Gen 2.png'),
	(81, '05581126', 'SCREW, PAN HEAD PHILLIPS', 0, 'Print Head Assembly – Gen 2', 5, 'picturepart/1628608698_Print Head Assembly – Gen 2.png'),
	(82, '05581130', 'SENSOR, OPTICAL SLOTTED, HARNESSED', 1, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(83, '05631201', 'KIT, FRAME ASSEMBLY, SNAP 500 2/1', 2, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(84, '117903', 'BALL BEARING', 3, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(85, '05585012', 'SHAFT, SWING BLOCK', 4, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(86, '05585014', 'BRACKET, SWING ARM 600 DPI (USE ON 600 DPI MACHINE)', 5, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(87, '05595005', 'SHAFT, PLATEN ROLLER', 6, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(88, '05595010', 'ROLLER, MOLDED PLATEN - RED', 7, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(89, '05595008', 'ROLLER, MOLDED PLATEN - GREEN', 7, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(90, '990067', 'WASHER, #8 SAE', 8, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(91, '990068', 'LOCK WASHER, #8', 9, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(92, '990327', 'E-RING, 5/16', 10, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(93, '990486', 'SNAP RING, 3/8 E-RING', 11, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(94, '991480', '10-32 X 5/16 PHILLIPS PAN HEAD SCREW', 12, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(95, '991643', '8-32 X 3/8 THUMB SCREW', 13, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(96, '991422', '4-40 X 1/4 PHILLIPS PAN HEAD SCREW', 14, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(97, '991608', 'SPRING, EXTENSION', 15, 'Swing Arm Assembly – Gen 2', 5, 'picturepart/1628610251_Swing Arm Assembly – Gen 2.png'),
	(98, '05586007', 'Shaft, Ink arbor', 4, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(99, '05586008', 'Core, Ink arbor, Molded', 5, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(100, '991454', '8-32 x 1/4 Thumb screw', 6, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(101, '126468', 'Motor, Ribbon', 7, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(102, '05586004', 'Spacer, Ink arbor, Outer', 8, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(103, '05586006', 'Shaft, Ink arbor lock', 9, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(104, '05586002', 'Bracket, Inch core stop - Black', 10, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(105, '05586009', 'Bracket, Metric core stop - Gray', 10, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(106, '991370', 'Torsion spring', 11, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(107, '991367', 'Snap ring, 9/64 e-ring', 12, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(108, '990327', 'Snap ring, 5/16 e-ring', 13, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(109, '117954', 'Gear, Ribbon, 75T', 14, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(110, '17955', 'Gear, Ribbon, 54T - 15T', 15, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(111, '991372', '6-32 x 1/4 Phillips pan head screw', 16, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(112, '990019', 'Hexagon socket BH cap screw', 17, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(113, '991368', '2.5mm x 5mm Slotted PH screw', 18, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(114, '05586003', 'Shaft, Ink turn', 19, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(115, '05586094K', 'Kit, Single arbor assembly, Inch', 20, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(116, '05586095K', 'Kit, Single arbor assembly, Metric', 20, 'Ink Unwind / Rewind Assembly – Gen 1', 5, 'picturepart/1628615246_Ink Unwind-Rewind Assembly – Gen 1.png'),
	(117, '05596001', 'SHAFT, INK ARBOR, 600', 1, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
	(118, '05586008', 'CORE, INK ARBOR, MOLDED', 2, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
	(119, '05586002', 'BRACKET, CORE STOP (INCH) A*', 3, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
	(120, '05586009', 'BRACKET, CORE STOP (METRIC) B*', 3, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
	(121, '05586006', 'SHAFT, IN K ARBOR, LOCK', 4, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
	(122, '991370', 'SPRING, TORSION, CORE STOP', 5, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
	(125, '991454', '8-32 X 1/4" THUMB SCREW', 6, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
	(126, '991510', 'BALL BEARING , 16mm O.D. x 8mm I.D. FLG', 7, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
	(127, '117954', 'GEAR-RIBBON 75T', 8, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
	(128, '990327', 'E-RING, 5/16', 9, 'Ink Unwind / Rewind Arbor Assembly – Gen 2', 5, 'picturepart/1628692126_Ink Unwind-Rewind Arbor Assembly – Gen 2.png'),
	(130, '117954', 'GEAR-RIBBON 75T', 1, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
	(131, '117955', 'GEAR-RIBBON 54T-15T', 2, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
	(132, '126468', 'MOTOR - RIBBON', 3, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
	(133, '05581186', 'MOTOR, STOCK UNWIND W/ EXTENSION', 4, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
	(134, '05593001', 'SHAFT, UNWIND, 600', 5, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
	(135, '05596001', 'SHAFT, INK ARBOR, 600', 6, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
	(136, '05631201', 'KIT, FRAME ASSEMBLY, SNAP 500 2/1', 7, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
	(137, '990327', 'E-RING, 5/16', 8, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
	(138, '991510', 'BALL BEARING , 16mm O.D. x 8mm I.D. FLG', 9, 'Ink / Unwind Motor Assembly – Gen 2', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
	(139, '991639', 'M2.6 X 4mm PPHS', 10, 'M2.6 X 4mm PPHS', 5, 'picturepart/1628703229_Ink-Unwind Motor Assembly – Gen 2.png'),
	(141, '05584011', 'FRAME, KNIFE / DRIVE', 1, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705408_Feed – Drive Train Assembly – Gen 1.png'),
	(142, '05584010', 'SUPPORT, BEARING', 2, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705408_Feed – Drive Train Assembly – Gen 1.png'),
	(143, '117903', 'BALL BEARING', 3, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
	(144, '118052', 'HOLDER, BEARING', 4, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
	(145, '05584026', 'BRACKET, FEED MOTOR MOUNT', 5, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
	(146, '351141', 'STEPPER MOTOR, HARNESSED', 6, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
	(147, '05585013', 'SHAFT, SWING BLOCK', 7, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
	(148, '990439', 'NYLON WASHER', 8, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
	(149, '05585014', 'BRACKET, SWING ARM', 9, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
	(150, '05585024', 'SHAFT, PLATEN ROLLER', 10, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
	(151, '05585016', 'GEAR, 38T DRIVE 300 DPI', 11, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png'),
	(152, '117902', 'GEAR, PLATEN', 12, 'Feed – Drive Train Assembly – Gen 1', 5, 'picturepart/1628705636_Feed – Drive Train Assembly – Gen 11.png');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
