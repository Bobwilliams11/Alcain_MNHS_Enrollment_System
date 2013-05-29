-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2013 at 09:14 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Alcain_Enrollment_System`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `admin_id` int(20) NOT NULL AUTO_INCREMENT,
  `Admin_username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Password2` varchar(50) NOT NULL,
  `teacher_id` int(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`admin_id`, `Admin_username`, `Password`, `Password2`, `teacher_id`) VALUES
(1, 'westlife', 'ako', 'ako', 1),
(2, 'fumi', 'fumi', 'fuim', 11);

-- --------------------------------------------------------

--
-- Table structure for table `Guardians`
--

CREATE TABLE IF NOT EXISTS `Guardians` (
  `guardian_id` int(50) NOT NULL AUTO_INCREMENT,
  `Guardian_Name` varchar(50) NOT NULL,
  `Guardian_Birthday` date NOT NULL,
  `Guardian_Age` int(50) NOT NULL,
  `Guardian_Occupation` varchar(50) NOT NULL,
  `Guardian_Contact` varchar(50) NOT NULL,
  `Guardian_Address` varchar(50) NOT NULL,
  `Guardian_Religion` varchar(50) NOT NULL,
  `Guardian_Relationship` varchar(50) NOT NULL,
  PRIMARY KEY (`guardian_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `Guardians`
--

INSERT INTO `Guardians` (`guardian_id`, `Guardian_Name`, `Guardian_Birthday`, `Guardian_Age`, `Guardian_Occupation`, `Guardian_Contact`, `Guardian_Address`, `Guardian_Religion`, `Guardian_Relationship`) VALUES
(30, 'Emma Abrillo-alcain', '1973-08-12', 40, 'Bookkeeper', '09198790384', 'Mayorga', 'Catholic', 'Mother'),
(37, 'Mama', '1987-12-28', 41, 'Senyora', '4545', 'Cavite', 'Catholic', 'Mother'),
(38, 'Papa', '1988-01-05', 43, 'Driver', '0000', 'Mayorga', 'Catholic', 'Phaduds'),
(39, 'Beloved Mother', '1987-04-05', 43, 'First President', '4545', 'Abuyog', 'Church Of Jesus Christ', 'Mothe'),
(40, 'Mama', '1970-06-24', 43, 'Fs', '45825', 'Sf', 'Sfsf', 'Father');

-- --------------------------------------------------------

--
-- Table structure for table `Position_Table`
--

CREATE TABLE IF NOT EXISTS `Position_Table` (
  `position_id` int(50) NOT NULL AUTO_INCREMENT,
  `Position` varchar(50) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Position_Table`
--

INSERT INTO `Position_Table` (`position_id`, `Position`) VALUES
(1, 'Principal1'),
(2, 'Principal2'),
(3, 'Principal3'),
(4, 'Teacher1'),
(5, 'Teacher2'),
(6, 'Teacher3'),
(7, 'Librarian'),
(8, 'Guidance Counsilor'),
(9, 'Head Teacher1'),
(10, 'Head Teacher2');

-- --------------------------------------------------------

--
-- Table structure for table `Registered_User`
--

CREATE TABLE IF NOT EXISTS `Registered_User` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Password2` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_fk1` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Registered_User`
--

INSERT INTO `Registered_User` (`user_id`, `teacher_id`, `Username`, `Password`, `Password2`) VALUES
(2, 2, 'gibs', 'gibs', 'gibs'),
(3, 1, 'lean', 'lemu', 'lemu'),
(4, 4, 'case', 'case', 'case');

-- --------------------------------------------------------

--
-- Table structure for table `Room_Table`
--

CREATE TABLE IF NOT EXISTS `Room_Table` (
  `room_id` int(50) NOT NULL AUTO_INCREMENT,
  `Room` varchar(50) NOT NULL,
  `Year_Constructed` date NOT NULL,
  `Construction_Company` varchar(50) NOT NULL,
  `Construction_Cost` varchar(50) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `Room_Table`
--

INSERT INTO `Room_Table` (`room_id`, `Room`, `Year_Constructed`, `Construction_Company`, `Construction_Cost`) VALUES
(18, 'Lab1', '1987-05-20', 'ReadyCon Trading and Construction Company', '100,000'),
(30, 'Lab2', '1969-05-20', 'ReadyCon Trading and Construction Company', '100,000'),
(35, 'Lab3', '1984-11-14', 'ReadyCon Trading and Construction Company', '100,000'),
(36, 'Room1', '1997-03-12', 'ReadyCon Trading and Construction Company', '50,000'),
(37, 'Room2', '1979-02-21', 'ReadyCon Trading and Construction Company', '100,000'),
(38, 'Room3', '1997-03-12', 'ReadyCon Trading and Construction Company', '50,000'),
(42, 'Room4', '1997-03-12', 'ReadyCon Trading and Construction Company', '50,000'),
(43, 'Room1', '1997-03-12', 'ReadyCon Trading and Construction Company', '50,000'),
(44, 'Room5', '1995-03-22', 'ReadyCon Trading and Construction Company', '100,000'),
(47, 'room6', '2010-06-08', 'amon', '150,000');

-- --------------------------------------------------------

--
-- Table structure for table `Students_Profile`
--

CREATE TABLE IF NOT EXISTS `Students_Profile` (
  `student_id` int(50) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Middlename` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Birthday` date NOT NULL,
  `Age` int(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Religion` varchar(50) NOT NULL,
  `Contact` varchar(50) NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `Address` (`Address`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `Students_Profile`
--

INSERT INTO `Students_Profile` (`student_id`, `teacher_id`, `Firstname`, `Middlename`, `Lastname`, `Birthday`, `Age`, `Gender`, `Address`, `Religion`, `Contact`) VALUES
(66, 1, 'Joanne Emma', 'Abrillo', 'Alcain', '0000-00-00', 18, 'Female', 'Mayorga', 'Catholic', '09462822310'),
(67, 1, 'Lemuel', 'Selliza', 'Lucanas', '1995-07-17', 17, 'Male', 'Mc Arthur', 'Catholic', '09461798554'),
(68, 1, 'Casey', 'Pessa', 'Altejar', '2013-05-23', 45, 'Male', 'Abuyog', 'Catholic', '5555'),
(69, 2, 'Jenelyn', 'Secret', 'Orion', '0000-00-00', 18, 'Female', 'Palo', 'Church Of Jesus Christ', '545'),
(70, 1, 'Joanne Emma', 'Abrillo', 'Alcain', '1995-12-12', 18, 'Female', 'Mayorga', 'Catholic', '4545'),
(71, 1, 'Joanne Emma', 'Abrillo', 'Alcain', '0000-00-00', 18, 'Female', 'Dfd', 'Catholic', '445'),
(72, 1, 'Joanne', 'Abrillo', 'Alcain', '1995-12-12', 18, 'Female', 'Sdf', 'Sfs', '4545'),
(73, 1, 'Dexter', 'Rtrtr', 'Trr', '0000-00-00', 18, 'Undefined', 'Di Matagpuan Street', 'Christian', '099999999999999'),
(74, 1, 'Dsf', 'Sf', 'Sf', '1990-05-07', 23, 'Female', 'Sfs', 'Sf', '4545'),
(75, 1, 'Jane', 'Mya', 'Ksdj', '1990-06-11', 23, 'Female', 'Candahog', 'Catholic', '4545'),
(76, 1, 'Fsfssfsffs', 'Sf', 'Sf', '1990-05-07', 23, 'Male', 'Sfs', 'Sf', '4545'),
(77, 1, 'Fsfssfsffssfsf', 'Sfsfsfssfs', 'Sfsf', '1990-05-07', 23, 'Male', 'Sfs', 'Sf', '4545');

-- --------------------------------------------------------

--
-- Table structure for table `Student_and_Parent`
--

CREATE TABLE IF NOT EXISTS `Student_and_Parent` (
  `s_p_id` int(50) NOT NULL AUTO_INCREMENT,
  `student_id` int(50) NOT NULL,
  `guardian_id` int(50) NOT NULL,
  PRIMARY KEY (`s_p_id`),
  KEY `sp_fk1` (`student_id`),
  KEY `sp_fk2` (`guardian_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `Student_and_Parent`
--

INSERT INTO `Student_and_Parent` (`s_p_id`, `student_id`, `guardian_id`) VALUES
(22, 66, 30),
(24, 67, 37),
(25, 71, 38),
(26, 69, 39),
(27, 75, 40);

-- --------------------------------------------------------

--
-- Table structure for table `Subject`
--

CREATE TABLE IF NOT EXISTS `Subject` (
  `subject` int(20) NOT NULL AUTO_INCREMENT,
  `Subject_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`subject`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `Subject`
--

INSERT INTO `Subject` (`subject`, `Subject_Name`) VALUES
(1, 'General Science'),
(2, 'Biology'),
(3, 'Chemistry'),
(4, 'Physics'),
(5, 'Elementary Algebra'),
(6, 'Trigonometry'),
(7, 'English1'),
(8, 'English2'),
(9, 'English3'),
(10, 'English4'),
(11, 'Aralin Panlipunan');

-- --------------------------------------------------------

--
-- Table structure for table `Subject_of_Teachers`
--

CREATE TABLE IF NOT EXISTS `Subject_of_Teachers` (
  `st_id` int(50) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(50) NOT NULL,
  `subject_id` int(50) NOT NULL,
  `room_id` int(50) NOT NULL,
  `Day` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL,
  PRIMARY KEY (`st_id`),
  KEY `subject_fk2` (`teacher_id`),
  KEY `st_fk` (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Subject_of_Teachers`
--

INSERT INTO `Subject_of_Teachers` (`st_id`, `teacher_id`, `subject_id`, `room_id`, `Day`, `Time`) VALUES
(1, 1, 1, 18, 'mon-fri', '7-8am'),
(2, 14, 7, 30, 'mon-fri', '9-10am'),
(3, 20, 9, 35, 'mon-fri', '7-8:am'),
(4, 1, 9, 36, 'mon-fri', '1-2pm'),
(5, 8, 6, 18, 'mon-fri', '2-3pm'),
(6, 1, 6, 36, 'mon-fri', '4-5pm'),
(7, 1, 2, 42, 'mon-fri', '8-9am'),
(10, 20, 3, 36, 'mon-fri', '8-9am'),
(11, 20, 5, 42, 'mon-fri', '11-12pm'),
(12, 4, 6, 35, 'mon-fri', '8-9am'),
(13, 1, 6, 42, 'mon-fri', '8-9am'),
(14, 14, 3, 36, 'mon-fri', '8-9am'),
(15, 4, 7, 38, 'mon-fri', '8-9am');

-- --------------------------------------------------------

--
-- Table structure for table `Teachers_Room_Position`
--

CREATE TABLE IF NOT EXISTS `Teachers_Room_Position` (
  `tr_id` int(50) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(50) NOT NULL,
  `room_id` int(50) NOT NULL,
  `position_id` int(50) NOT NULL,
  PRIMARY KEY (`tr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Teachers_Room_Position`
--

INSERT INTO `Teachers_Room_Position` (`tr_id`, `teacher_id`, `room_id`, `position_id`) VALUES
(1, 1, 36, 1),
(2, 2, 30, 10),
(3, 4, 37, 8),
(4, 8, 30, 3),
(5, 9, 35, 4),
(6, 11, 36, 5),
(7, 14, 37, 6),
(12, 20, 42, 8);

-- --------------------------------------------------------

--
-- Table structure for table `Teachers_Table`
--

CREATE TABLE IF NOT EXISTS `Teachers_Table` (
  `teacher_id` int(50) NOT NULL AUTO_INCREMENT,
  `Teacher_Name` varchar(50) NOT NULL,
  `Teacher_Bday` date NOT NULL,
  `Teacher_Age` int(20) NOT NULL,
  `Teacher_Sex` varchar(50) NOT NULL,
  `Teacher_Address` varchar(50) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `Teachers_Table`
--

INSERT INTO `Teachers_Table` (`teacher_id`, `Teacher_Name`, `Teacher_Bday`, `Teacher_Age`, `Teacher_Sex`, `Teacher_Address`) VALUES
(1, 'Joanne Alcain', '1995-12-07', 17, 'Female', 'Mayorga'),
(2, 'Gilbert Carilla', '1987-02-14', 43, 'Male', 'Tacloban City, Philipines'),
(4, 'Casey Altejar', '1995-12-05', 17, 'Female', 'Abuyogq'),
(8, 'Marejean', '1995-02-17', 17, 'Female', 'Palo'),
(9, 'Sir Jojo', '2013-05-08', 42, 'Male', 'Tacloban?'),
(11, 'Dexter', '2013-05-07', 5, 'Male', 'Sdf'),
(14, 'Jonel', '2013-05-14', 19, 'Male', 'Palo'),
(20, 'Lemuel Lucanas', '1995-07-17', 18, 'Male', 'Mcarthur');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Registered_User`
--
ALTER TABLE `Registered_User`
  ADD CONSTRAINT `user_fk1` FOREIGN KEY (`teacher_id`) REFERENCES `Teachers_Table` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Student_and_Parent`
--
ALTER TABLE `Student_and_Parent`
  ADD CONSTRAINT `sp_fk1` FOREIGN KEY (`student_id`) REFERENCES `Students_Profile` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sp_fk2` FOREIGN KEY (`guardian_id`) REFERENCES `Guardians` (`guardian_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Subject_of_Teachers`
--
ALTER TABLE `Subject_of_Teachers`
  ADD CONSTRAINT `st_fk` FOREIGN KEY (`subject_id`) REFERENCES `Subject` (`subject`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `st_fk2` FOREIGN KEY (`teacher_id`) REFERENCES `Teachers_Table` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_fk2` FOREIGN KEY (`teacher_id`) REFERENCES `Teachers_Table` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;
