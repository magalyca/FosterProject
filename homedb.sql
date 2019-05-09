-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 03:44 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'magaly', 'cantu', 'admin@admin', 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `biologicalparent`
--

CREATE TABLE `biologicalparent` (
  `bioParentId` int(11) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `gender` varchar(28) NOT NULL,
  `childName` int(11) NOT NULL,
  `alive` varchar(24) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biologicalparent`
--

INSERT INTO `biologicalparent` (`bioParentId`, `firstName`, `lastName`, `gender`, `childName`, `alive`, `description`) VALUES
(1, 'Pedro', 'Gonzalez', 'Male', 1, 'Yes', 'Went to prison, had to put child in foster care');

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `childId` int(11) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `dateOfBirth` varchar(64) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `roomNumber` int(11) NOT NULL,
  `adopted` varchar(16) NOT NULL,
  `staffId` int(11) NOT NULL,
  `dateEntered` varchar(64) NOT NULL,
  `emergencyContact` varchar(32) NOT NULL,
  `medicalRecordId` int(11) NOT NULL,
  `personalDocId` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `bioParentId` int(11) NOT NULL,
  `newParentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`childId`, `firstName`, `lastName`, `dateOfBirth`, `age`, `gender`, `roomNumber`, `adopted`, `staffId`, `dateEntered`, `emergencyContact`, `medicalRecordId`, `personalDocId`, `height`, `weight`, `bioParentId`, `newParentId`) VALUES
(1, 'Diego', 'Gonzalez', '6/19/2013', 5, 'Male', 2, 'No', 1, '4/15/2019', 'Gabriela Perez', 1, 1, 41, 40, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expenseType` varchar(32) NOT NULL,
  `amount` int(11) NOT NULL,
  `dateBought` varchar(128) NOT NULL,
  `staffId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expenseType`, `amount`, `dateBought`, `staffId`) VALUES
('Electricity', 60, '5/8/2019', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foodinventory`
--

CREATE TABLE `foodinventory` (
  `foodId` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodinventory`
--

INSERT INTO `foodinventory` (`foodId`, `name`, `quantity`) VALUES
(1, 'Beans can', 20);

-- --------------------------------------------------------

--
-- Table structure for table `medicalrecord`
--

CREATE TABLE `medicalrecord` (
  `medRecordId` int(11) NOT NULL,
  `childId` int(11) NOT NULL,
  `recordType` varchar(64) NOT NULL,
  `description` varchar(400) NOT NULL,
  `dateEntered` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicalrecord`
--

INSERT INTO `medicalrecord` (`medRecordId`, `childId`, `recordType`, `description`, `dateEntered`) VALUES
(1, 1, 'Blood type', '+O', '4/23/2019');

-- --------------------------------------------------------

--
-- Table structure for table `necessities`
--

CREATE TABLE `necessities` (
  `necessitiesId` int(11) NOT NULL,
  `itemName` varchar(64) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `necessities`
--

INSERT INTO `necessities` (`necessitiesId`, `itemName`, `quantity`) VALUES
(1, 'Shampoo bottle', 10),
(2, 'Conditioner bottle', 16);

-- --------------------------------------------------------

--
-- Table structure for table `newparent`
--

CREATE TABLE `newparent` (
  `newParentId` int(11) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `childId` int(11) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `address` varchar(128) NOT NULL,
  `dateApplied` varchar(64) NOT NULL,
  `biologicalChild` varchar(64) NOT NULL,
  `staffId` int(11) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newparent`
--

INSERT INTO `newparent` (`newParentId`, `firstName`, `lastName`, `childId`, `telephone`, `email`, `address`, `dateApplied`, `biologicalChild`, `staffId`, `gender`, `age`) VALUES
(1, 'Juan', 'Alanis', 1, '956-528-4561', 'juan.alanis@gmail.com', '1284 W Maky, Edinburg Tx 78541', '3/2/2019', '2', 1, 'Male', 32);

-- --------------------------------------------------------

--
-- Table structure for table `personaldocument`
--

CREATE TABLE `personaldocument` (
  `documentId` int(11) NOT NULL,
  `childId` int(11) NOT NULL,
  `docType` varchar(64) NOT NULL,
  `description` varchar(400) NOT NULL,
  `dateEntered` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personaldocument`
--

INSERT INTO `personaldocument` (`documentId`, `childId`, `docType`, `description`, `dateEntered`) VALUES
(1, 1, 'Birth certificate', 'Birth certificate here.', '4/23/2019');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomId` int(11) NOT NULL,
  `building` varchar(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `roomNum` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `childId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomId`, `building`, `floor`, `roomNum`, `capacity`, `childId`) VALUES
(1, 'A', 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` int(11) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `position` varchar(64) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `firstName`, `lastName`, `position`, `email`, `password`) VALUES
(1, 'lucy', 'lorenzana', 'Manager', 'lucy@lucy', 'lucy'),
(2, 'luis', 'moreno', 'regular staff', 'luis@luis', 'luis');

-- --------------------------------------------------------

--
-- Table structure for table `waitingparent`
--

CREATE TABLE `waitingparent` (
  `waitingParentId` int(11) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `address` varchar(250) NOT NULL,
  `dateApplied` varchar(128) NOT NULL,
  `biologicalChild` varchar(32) NOT NULL,
  `staffId` int(11) NOT NULL,
  `gender` varchar(24) NOT NULL,
  `age` int(11) NOT NULL,
  `formId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biologicalparent`
--
ALTER TABLE `biologicalparent`
  ADD PRIMARY KEY (`bioParentId`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`childId`),
  ADD KEY `StaffID` (`staffId`) USING BTREE;

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD KEY `staffid2` (`staffId`);

--
-- Indexes for table `foodinventory`
--
ALTER TABLE `foodinventory`
  ADD PRIMARY KEY (`foodId`);

--
-- Indexes for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  ADD PRIMARY KEY (`medRecordId`);

--
-- Indexes for table `necessities`
--
ALTER TABLE `necessities`
  ADD PRIMARY KEY (`necessitiesId`);

--
-- Indexes for table `newparent`
--
ALTER TABLE `newparent`
  ADD PRIMARY KEY (`newParentId`);

--
-- Indexes for table `personaldocument`
--
ALTER TABLE `personaldocument`
  ADD PRIMARY KEY (`documentId`),
  ADD KEY `childid4` (`childId`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomId`),
  ADD KEY `ChildID` (`childId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `waitingparent`
--
ALTER TABLE `waitingparent`
  ADD PRIMARY KEY (`waitingParentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biologicalparent`
--
ALTER TABLE `biologicalparent`
  MODIFY `bioParentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `childId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foodinventory`
--
ALTER TABLE `foodinventory`
  MODIFY `foodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  MODIFY `medRecordId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newparent`
--
ALTER TABLE `newparent`
  MODIFY `newParentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personaldocument`
--
ALTER TABLE `personaldocument`
  MODIFY `documentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `waitingparent`
--
ALTER TABLE `waitingparent`
  MODIFY `waitingParentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biologicalparent`
--
ALTER TABLE `biologicalparent`
  ADD CONSTRAINT `childid5` FOREIGN KEY (`childName`) REFERENCES `child` (`childId`);

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `Staffif` FOREIGN KEY (`staffId`) REFERENCES `staff` (`staffId`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `staffid2` FOREIGN KEY (`staffId`) REFERENCES `staff` (`staffId`);

--
-- Constraints for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  ADD CONSTRAINT `childid1` FOREIGN KEY (`childId`) REFERENCES `child` (`childId`);

--
-- Constraints for table `newparent`
--
ALTER TABLE `newparent`
  ADD CONSTRAINT `childid2` FOREIGN KEY (`childId`) REFERENCES `child` (`childId`),
  ADD CONSTRAINT `staff5` FOREIGN KEY (`staffId`) REFERENCES `staff` (`staffId`);

--
-- Constraints for table `personaldocument`
--
ALTER TABLE `personaldocument`
  ADD CONSTRAINT `childid4` FOREIGN KEY (`childId`) REFERENCES `child` (`childId`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `ChildID` FOREIGN KEY (`childId`) REFERENCES `child` (`childId`);

--
-- Constraints for table `waitingparent`
--
ALTER TABLE `waitingparent`
  ADD CONSTRAINT `doc1` FOREIGN KEY (`formId`) REFERENCES `personaldocument` (`documentId`),
  ADD CONSTRAINT `staff3` FOREIGN KEY (`staffId`) REFERENCES `staff` (`staffId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
