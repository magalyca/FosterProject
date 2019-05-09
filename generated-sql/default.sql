
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- admin
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `firstName` VARCHAR(32) NOT NULL,
    `lastName` VARCHAR(32) NOT NULL,
    `email` VARCHAR(64) NOT NULL,
    `password` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- biologicalparent
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `biologicalparent`;

CREATE TABLE `biologicalparent`
(
    `bioParentId` INTEGER NOT NULL AUTO_INCREMENT,
    `firstName` VARCHAR(32) NOT NULL,
    `lastName` VARCHAR(32) NOT NULL,
    `gender` VARCHAR(28) NOT NULL,
    `childName` INTEGER NOT NULL,
    `alive` VARCHAR(24) NOT NULL,
    `description` VARCHAR(400) NOT NULL,
    PRIMARY KEY (`bioParentId`),
    INDEX `childid5` (`childName`),
    CONSTRAINT `childid5`
        FOREIGN KEY (`childName`)
        REFERENCES `child` (`childId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- child
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `child`;

CREATE TABLE `child`
(
    `childId` INTEGER NOT NULL AUTO_INCREMENT,
    `firstName` VARCHAR(32) NOT NULL,
    `lastName` VARCHAR(32) NOT NULL,
    `dateOfBirth` VARCHAR(64) NOT NULL,
    `age` INTEGER NOT NULL,
    `gender` VARCHAR(16) NOT NULL,
    `roomNumber` INTEGER NOT NULL,
    `adopted` VARCHAR(16) NOT NULL,
    `staffId` INTEGER NOT NULL,
    `dateEntered` VARCHAR(64) NOT NULL,
    `emergencyContact` VARCHAR(32) NOT NULL,
    `medicalRecordId` INTEGER NOT NULL,
    `personalDocId` INTEGER NOT NULL,
    `height` INTEGER NOT NULL,
    `weight` INTEGER NOT NULL,
    `bioParentId` INTEGER NOT NULL,
    `newParentId` INTEGER NOT NULL,
    PRIMARY KEY (`childId`),
    INDEX `StaffID` (`staffId`),
    CONSTRAINT `Staffif`
        FOREIGN KEY (`staffId`)
        REFERENCES `staff` (`staffId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expenses
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses`
(
    `expenseType` VARCHAR(32) NOT NULL,
    `amount` INTEGER NOT NULL,
    `dateBought` VARCHAR(128) NOT NULL,
    `staffId` INTEGER NOT NULL,
    INDEX `staffid2` (`staffId`),
    CONSTRAINT `staffid2`
        FOREIGN KEY (`staffId`)
        REFERENCES `staff` (`staffId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- foodinventory
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `foodinventory`;

CREATE TABLE `foodinventory`
(
    `foodId` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(64) NOT NULL,
    `quantity` INTEGER NOT NULL,
    PRIMARY KEY (`foodId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- medicalrecord
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `medicalrecord`;

CREATE TABLE `medicalrecord`
(
    `medRecordId` INTEGER NOT NULL AUTO_INCREMENT,
    `childId` INTEGER NOT NULL,
    `recordType` VARCHAR(64) NOT NULL,
    `description` VARCHAR(400) NOT NULL,
    `dateEntered` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`medRecordId`),
    INDEX `childid1` (`childId`),
    CONSTRAINT `childid1`
        FOREIGN KEY (`childId`)
        REFERENCES `child` (`childId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- necessities
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `necessities`;

CREATE TABLE `necessities`
(
    `necessitiesId` INTEGER NOT NULL,
    `itemName` VARCHAR(64) NOT NULL,
    `quantity` INTEGER NOT NULL,
    PRIMARY KEY (`necessitiesId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- newparent
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `newparent`;

CREATE TABLE `newparent`
(
    `newParentId` INTEGER NOT NULL AUTO_INCREMENT,
    `firstName` VARCHAR(32) NOT NULL,
    `lastName` VARCHAR(32) NOT NULL,
    `childId` INTEGER NOT NULL,
    `telephone` VARCHAR(32) NOT NULL,
    `email` VARCHAR(32) NOT NULL,
    `address` VARCHAR(128) NOT NULL,
    `dateApplied` VARCHAR(64) NOT NULL,
    `biologicalChild` VARCHAR(64) NOT NULL,
    `staffId` INTEGER NOT NULL,
    `gender` VARCHAR(16) NOT NULL,
    `age` INTEGER NOT NULL,
    PRIMARY KEY (`newParentId`),
    INDEX `childid2` (`childId`),
    INDEX `staff5` (`staffId`),
    CONSTRAINT `childid2`
        FOREIGN KEY (`childId`)
        REFERENCES `child` (`childId`),
    CONSTRAINT `staff5`
        FOREIGN KEY (`staffId`)
        REFERENCES `staff` (`staffId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- personaldocument
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `personaldocument`;

CREATE TABLE `personaldocument`
(
    `documentId` INTEGER NOT NULL AUTO_INCREMENT,
    `childId` INTEGER NOT NULL,
    `docType` VARCHAR(64) NOT NULL,
    `description` VARCHAR(400) NOT NULL,
    `dateEntered` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`documentId`),
    INDEX `childid4` (`childId`),
    CONSTRAINT `childid4`
        FOREIGN KEY (`childId`)
        REFERENCES `child` (`childId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- rooms
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `rooms`;

CREATE TABLE `rooms`
(
    `roomId` INTEGER NOT NULL AUTO_INCREMENT,
    `building` VARCHAR(11) NOT NULL,
    `floor` INTEGER NOT NULL,
    `roomNum` INTEGER NOT NULL,
    `capacity` INTEGER NOT NULL,
    `childId` INTEGER NOT NULL,
    PRIMARY KEY (`roomId`),
    INDEX `ChildID` (`childId`),
    CONSTRAINT `ChildID`
        FOREIGN KEY (`childId`)
        REFERENCES `child` (`childId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- staff
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff`
(
    `staffId` INTEGER NOT NULL AUTO_INCREMENT,
    `firstName` VARCHAR(32) NOT NULL,
    `lastName` VARCHAR(32) NOT NULL,
    `position` VARCHAR(64) NOT NULL,
    `email` VARCHAR(32) NOT NULL,
    `password` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`staffId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- waitingparent
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `waitingparent`;

CREATE TABLE `waitingparent`
(
    `waitingParentId` INTEGER NOT NULL AUTO_INCREMENT,
    `firstName` VARCHAR(32) NOT NULL,
    `lastName` VARCHAR(32) NOT NULL,
    `telephone` VARCHAR(32) NOT NULL,
    `email` VARCHAR(64) NOT NULL,
    `address` VARCHAR(250) NOT NULL,
    `dateApplied` VARCHAR(128) NOT NULL,
    `biologicalChild` VARCHAR(32) NOT NULL,
    `staffId` INTEGER NOT NULL,
    `gender` VARCHAR(24) NOT NULL,
    `age` INTEGER NOT NULL,
    `formId` INTEGER NOT NULL,
    PRIMARY KEY (`waitingParentId`),
    INDEX `doc1` (`formId`),
    INDEX `staff3` (`staffId`),
    CONSTRAINT `doc1`
        FOREIGN KEY (`formId`)
        REFERENCES `personaldocument` (`documentId`),
    CONSTRAINT `staff3`
        FOREIGN KEY (`staffId`)
        REFERENCES `staff` (`staffId`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
