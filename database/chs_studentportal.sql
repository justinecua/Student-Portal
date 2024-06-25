-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 07:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chs_studentportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Account_ID` int(15) NOT NULL,
  `Student_ID` int(25) DEFAULT NULL,
  `TeacherID` int(15) DEFAULT NULL,
  `ID_Number` varchar(25) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DateAcc_Created` varchar(255) NOT NULL,
  `SectionID` int(15) DEFAULT NULL,
  `SchoolYear_ID` int(15) DEFAULT NULL,
  `AccountType_ID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Account_ID`, `Student_ID`, `TeacherID`, `ID_Number`, `Password`, `DateAcc_Created`, `SectionID`, `SchoolYear_ID`, `AccountType_ID`) VALUES
(1, NULL, NULL, 'CHS-001', 'admin123', '', NULL, 15, 1),
(3, NULL, NULL, 'CHS-002', 'Finance123', '', NULL, 15, 3),
(177, NULL, 108, 'CHST-001', '123', '2023-12-04 21:57:14', NULL, 15, 4),
(178, NULL, 109, 'CHST-002', '123', '2023-12-04 21:58:30', NULL, 15, 4),
(179, NULL, 110, 'CHST-003', '123', '2023-12-04 22:02:27', NULL, 15, 4),
(180, NULL, 111, 'CHST-004', '123', '2023-12-04 22:03:29', NULL, 15, 4),
(181, NULL, 112, 'CHST-005', '123', '2023-12-04 22:04:29', NULL, 15, 4),
(182, NULL, 113, 'CHST-006', '123', '2023-12-04 22:05:05', NULL, 15, 4),
(184, NULL, 115, 'CHST-008', '123', '2023-12-04 22:05:52', NULL, 15, 4),
(185, NULL, 116, 'CHST-009', '123', '2023-12-04 22:06:46', NULL, 15, 4),
(186, NULL, 117, 'CHST-010', '123', '2023-12-04 22:08:40', NULL, 15, 4),
(187, NULL, 118, 'CHST-007', '123', '2023-12-04 22:09:31', NULL, 15, 4),
(188, NULL, 119, 'CHST-011', '123', '2023-12-04 22:10:08', NULL, 15, 4),
(199, 31, NULL, 'CHS-003', 'a', '2023-12-12 19:35:38', 75, 15, 2),
(200, 34, NULL, 'CHS-004', 'a', '2023-12-12 19:42:25', 75, 15, 2),
(207, 43, NULL, 'CHS-005', '123', '2023-12-20 18:03:06', 75, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `AccountTypeID` int(15) NOT NULL,
  `Account Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`AccountTypeID`, `Account Type`) VALUES
(1, 'admin'),
(2, 'student'),
(3, 'finance'),
(4, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `gradelevel`
--

CREATE TABLE `gradelevel` (
  `Gradelevel_ID` int(15) NOT NULL,
  `GradeLevel` varchar(255) NOT NULL,
  `SchoolYear_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gradelevel`
--

INSERT INTO `gradelevel` (`Gradelevel_ID`, `GradeLevel`, `SchoolYear_ID`) VALUES
(1, 'Grade 1', 15),
(2, 'Grade 2', 15),
(3, 'Grade 3', 15),
(4, 'Grade 4', 15),
(5, 'Grade 5', 15),
(6, 'Grade 6', 15),
(8, 'Grade 7', 15),
(9, 'Grade 8', 15),
(10, 'Grade 9', 15),
(11, 'Grade 10', 15),
(12, 'Grade 11', 15),
(13, 'Grade 12', 15);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `gradeID` int(15) NOT NULL,
  `grades` int(12) NOT NULL,
  `Subject_ID` int(15) NOT NULL,
  `Account_ID` int(15) NOT NULL,
  `GradingPeriod_ID` int(15) NOT NULL,
  `SchoolYear_ID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`gradeID`, `grades`, `Subject_ID`, `Account_ID`, `GradingPeriod_ID`, `SchoolYear_ID`) VALUES
(29, 93, 129, 207, 1, 15),
(30, 93, 129, 207, 2, 15),
(41, 76, 129, 207, 3, 15),
(43, 45, 118, 200, 1, 15),
(44, 80, 116, 200, 2, 15),
(45, 87, 119, 200, 1, 15),
(47, 87, 123, 207, 1, 15),
(48, 84, 123, 207, 2, 15),
(49, 92, 123, 207, 3, 15),
(50, 88, 123, 207, 4, 15),
(51, 87, 129, 207, 4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `gradingperiod`
--

CREATE TABLE `gradingperiod` (
  `GradingPeriod_ID` int(15) NOT NULL,
  `GradingType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gradingperiod`
--

INSERT INTO `gradingperiod` (`GradingPeriod_ID`, `GradingType`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notif_id` int(15) NOT NULL,
  `NotifTitle` varchar(255) NOT NULL,
  `notifContent` varchar(500) NOT NULL,
  `NotifDateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NotifStat` varchar(150) NOT NULL,
  `Student_ID` int(15) DEFAULT NULL,
  `Account_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notif_id`, `NotifTitle`, `notifContent`, `NotifDateTime`, `NotifStat`, `Student_ID`, `Account_ID`) VALUES
(95, 'Pending Enrollment', 'Your Enrollment is Pending. Please pay a minimum of ₱1000 to be officially enrolled', '2023-12-26 19:53:16', 'Unread', 45, NULL),
(96, 'Payment Confirmed', 'We would like to inform you that your payment on Jan 03, 2024 at 1:01 pm has been successfully confirmed by the school.', '2024-01-02 22:02:23', 'Unread', 43, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(15) NOT NULL,
  `SendersName` varchar(255) NOT NULL,
  `ReceiversName` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `paymentDate` varchar(55) NOT NULL,
  `payment_amount` double(10,2) NOT NULL,
  `payment_refNum` varchar(100) NOT NULL,
  `payment_proof` varchar(255) NOT NULL,
  `payment_stat` varchar(255) NOT NULL,
  `Student_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `SendersName`, `ReceiversName`, `payment_method`, `paymentDate`, `payment_amount`, `payment_refNum`, `payment_proof`, `payment_stat`, `Student_ID`) VALUES
(41, 'Billy Josh', 'Christian Horizon School Inc', 'Gcash', '2024-01-03 13:01:45', 10000.00, '12314124', 'UserPayments/6594ea391306d_PaymentImage.jpg', 'Approved', 43);

-- --------------------------------------------------------

--
-- Table structure for table `schoolfees`
--

CREATE TABLE `schoolfees` (
  `SchoolFee_ID` int(15) NOT NULL,
  `SchoolFee_Name` varchar(255) NOT NULL,
  `SchoolFee_Price` double(10,2) NOT NULL,
  `Gradelevel_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolfees`
--

INSERT INTO `schoolfees` (`SchoolFee_ID`, `SchoolFee_Name`, `SchoolFee_Price`, `Gradelevel_ID`) VALUES
(90, 'Tuition Fee', 8700.00, 1),
(91, 'Tuition Fee', 8700.00, 2),
(92, 'Tuition Fee', 8700.00, 3),
(93, 'Tuition Fee', 10200.00, 4),
(94, 'Tuition Fee', 10200.00, 5),
(95, 'Tuition Fee', 10200.00, 6),
(96, 'Tuition Fee', 11500.00, 8),
(97, 'Tuition Fee', 11500.00, 9),
(98, 'Tuition Fee', 11500.00, 10),
(99, 'Tuition Fee', 12000.00, 11),
(100, 'Extra Curricular Activities', 600.00, 1),
(101, 'Extra Curricular Activities', 600.00, 2),
(102, 'Extra Curricular Activities', 600.00, 3),
(103, 'Extra Curricular Activities', 600.00, 4),
(104, 'Extra Curricular Activities', 600.00, 5),
(105, 'Extra Curricular Activities', 600.00, 6),
(106, 'Library Fee', 250.00, 1),
(107, 'Library Fee', 250.00, 2),
(108, 'Library Fee', 250.00, 3),
(109, 'Library Fee', 250.00, 4),
(110, 'Library Fee', 250.00, 5),
(111, 'Library Fee', 250.00, 5),
(112, 'Library Fee', 250.00, 6),
(113, 'Library Fee', 250.00, 8),
(114, 'Library Fee', 250.00, 9),
(115, 'Library Fee', 250.00, 10),
(116, 'Library Fee', 250.00, 11),
(117, 'Laboratory Fee', 400.00, 4),
(118, 'Laboratory Fee', 400.00, 5),
(119, 'Laboratory Fee', 400.00, 6),
(120, 'Laboratory Fee', 400.00, 8),
(121, 'Laboratory Fee', 400.00, 9),
(122, 'Laboratory Fee', 400.00, 10),
(123, 'Laboratory Fee', 400.00, 11),
(124, 'School ID', 250.00, 1),
(125, 'School ID', 250.00, 2),
(126, 'School ID', 250.00, 3),
(127, 'School ID', 250.00, 4),
(128, 'School ID', 250.00, 5),
(129, 'School ID', 250.00, 6),
(130, 'School ID', 250.00, 8),
(131, 'School ID', 250.00, 9),
(132, 'School ID', 250.00, 10),
(133, 'School ID', 250.00, 11),
(134, 'School ID', 250.00, 12),
(135, 'School ID', 250.00, 13),
(136, 'Library Fee', 300.00, 12),
(137, 'Library Fee', 300.00, 13),
(138, 'Extra Curricular Activities', 700.00, 8),
(139, 'Extra Curricular Activities', 700.00, 9),
(140, 'Extra Curricular Activities', 700.00, 10),
(141, 'Extra Curricular Activities', 700.00, 11),
(142, 'Extra Curricular Activities', 800.00, 12),
(143, 'Extra Curricular Activities', 800.00, 13),
(144, 'Laboratory Fee', 650.00, 12),
(145, 'Laboratory Fee', 650.00, 13),
(146, 'Health / Medical Fee', 300.00, 1),
(147, 'Health / Medical Fee', 300.00, 2),
(148, 'Health / Medical Fee', 300.00, 3),
(149, 'Health / Medical Fee', 300.00, 4),
(150, 'Health / Medical Fee', 300.00, 5),
(151, 'Health / Medical Fee', 300.00, 6),
(152, 'Health / Medical Fee', 300.00, 8),
(153, 'Health / Medical Fee', 300.00, 9),
(154, 'Health / Medical Fee', 300.00, 10),
(155, 'Health / Medical Fee', 300.00, 11),
(156, 'Health / Medical Fee', 300.00, 12),
(157, 'Health / Medical Fee', 300.00, 13),
(158, 'Books (Per Set)', 950.00, 1),
(159, 'Books (Per Set)', 950.00, 2),
(160, 'Books (Per Set)', 1200.00, 3),
(161, 'Books (Per Set)', 1400.00, 4),
(162, 'Books (Per Set)', 1400.00, 5),
(163, 'Books (Per Set)', 1400.00, 6),
(164, 'Books (Per Set)', 1800.00, 8),
(165, 'Books (Per Set)', 1800.00, 9),
(166, 'Books (Per Set)', 1800.00, 10),
(167, 'Books (Per Set)', 1800.00, 11),
(170, 'Student Handbook', 200.00, 1),
(171, 'Student Handbook', 200.00, 2),
(172, 'Student Handbook', 200.00, 3),
(173, 'Student Handbook', 200.00, 4),
(174, 'Student Handbook', 200.00, 5),
(175, 'Student Handbook', 200.00, 6),
(176, 'Student Handbook', 200.00, 8),
(177, 'Student Handbook', 200.00, 9),
(178, 'Student Handbook', 200.00, 10),
(179, 'Student Handbook', 200.00, 11),
(180, 'Student Handbook', 200.00, 12),
(181, 'Student Handbook', 200.00, 13),
(182, 'Test Services', 250.00, 1),
(183, 'Test Services', 250.00, 2),
(184, 'Test Services', 250.00, 3),
(185, 'Test Services', 250.00, 4),
(186, 'Test Services', 250.00, 5),
(187, 'Test Services', 250.00, 6),
(188, 'Test Services', 250.00, 8),
(189, 'Test Services', 250.00, 9),
(190, 'Test Services', 250.00, 10),
(191, 'Test Services', 250.00, 11),
(192, 'Test Services', 250.00, 12),
(193, 'Test Services', 250.00, 13);

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `SchoolYear_ID` int(15) NOT NULL,
  `SchoolYear` varchar(255) NOT NULL,
  `SchoolYearStatus` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`SchoolYear_ID`, `SchoolYear`, `SchoolYearStatus`) VALUES
(15, '2023-2024', 'Selected'),
(24, '2024-2025', '');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `SectionID` int(15) NOT NULL,
  `SectionName` varchar(255) NOT NULL,
  `Gradelevel_ID` int(15) DEFAULT NULL,
  `Strand_ID` int(15) DEFAULT NULL,
  `Teacher_ID` int(15) DEFAULT NULL,
  `SchoolYear_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`SectionID`, `SectionName`, `Gradelevel_ID`, `Strand_ID`, `Teacher_ID`, `SchoolYear_ID`) VALUES
(67, 'A', 1, NULL, 108, 15),
(68, 'B', 1, NULL, 109, 15),
(69, 'C', 12, 2, 110, 15),
(70, 'A', 2, NULL, 111, 15),
(71, 'A', 12, 4, 112, 15),
(72, 'B', 12, 4, 113, 15),
(73, 'A', 10, NULL, 115, 15),
(74, 'A', 13, 4, 116, 15),
(75, 'A', 8, NULL, 117, 15);

-- --------------------------------------------------------

--
-- Table structure for table `strand`
--

CREATE TABLE `strand` (
  `Strand_ID` int(15) NOT NULL,
  `StrandName` varchar(255) NOT NULL,
  `StrandDescription` varchar(255) NOT NULL,
  `SchoolYear_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `strand`
--

INSERT INTO `strand` (`Strand_ID`, `StrandName`, `StrandDescription`, `SchoolYear_ID`) VALUES
(2, 'ABM', 'Accountancy, Business and Management', 15),
(4, 'HUMSS', 'Humanities and Social Science', 15),
(5, 'GAS', 'General Academic Strand', 15),
(6, 'TVL', 'Technical-Vocational-Livelihood', 15);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_ID` int(15) NOT NULL,
  `Enrollment_Date` date NOT NULL,
  `Enrollment_Status` varchar(75) NOT NULL,
  `School_year` varchar(25) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `LRN` varchar(50) NOT NULL,
  `Incoming_Level` varchar(50) NOT NULL,
  `Educational_Attainment` varchar(255) NOT NULL,
  `Course` varchar(255) NOT NULL,
  `Strand` varchar(75) NOT NULL,
  `Student_PicturePath` varchar(255) NOT NULL,
  `TransriptOfRecordPath` varchar(255) NOT NULL,
  `Form138Path` varchar(255) NOT NULL,
  `PSAPath` varchar(255) NOT NULL,
  `GoodMoralPath` varchar(255) NOT NULL,
  `Cert_Of_CompletionPath` varchar(255) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `BirthPlace` varchar(255) NOT NULL,
  `Birthday` date NOT NULL,
  `Religion` varchar(75) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `HomeAddress` varchar(255) NOT NULL,
  `Last_School_Attended` varchar(255) NOT NULL,
  `EmailAddress` varchar(150) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Fathers_Full_Name` varchar(255) NOT NULL,
  `Fathers_Occupation` varchar(150) NOT NULL,
  `Mothers_Full_Name` varchar(255) NOT NULL,
  `Mothers_Occupation` varchar(255) NOT NULL,
  `Emergency_ContactPerson` varchar(255) NOT NULL,
  `Emergency_ContactNumber` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `Enrollment_Date`, `Enrollment_Status`, `School_year`, `Status`, `LRN`, `Incoming_Level`, `Educational_Attainment`, `Course`, `Strand`, `Student_PicturePath`, `TransriptOfRecordPath`, `Form138Path`, `PSAPath`, `GoodMoralPath`, `Cert_Of_CompletionPath`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `BirthPlace`, `Birthday`, `Religion`, `ContactNumber`, `HomeAddress`, `Last_School_Attended`, `EmailAddress`, `Password`, `Fathers_Full_Name`, `Fathers_Occupation`, `Mothers_Full_Name`, `Mothers_Occupation`, `Emergency_ContactPerson`, `Emergency_ContactNumber`) VALUES
(31, '2023-11-19', 'Enrolled', '2023-2024', 'New', '213', 'Grade 1', '', '', '', 'UserUploads/6559d8460e596_KstudentPicture.jpg', '', 'UserUploads/6559d8460e598_KForm138.jpg', 'UserUploads/6559d8460e599_KPSA.jpg', 'UserUploads/6559d8460e59a_KGoodMoral.jpg', '', 'Justine', 'Acain', 'Cua', 'Male', 'a', '2023-11-14', 'a', 'a', 'Makati City, Metro Manila', 'a', 'ylleee014@gmail.com', 'a', 'a', 'a', 'a', 'aa', 'aa', '132'),
(32, '2023-11-20', 'Enrolled', '2023-2024', 'New', '1213', 'Grade 11', '', '', '', 'UserUploadsSHS/655b6196f3456_SHSstudentPicture.jpg', '', 'UserUploadsSHS/655b6196f3459_SHSForm138.jpg', 'UserUploadsSHS/655b6196f345a_SHSPSA.jpg', 'UserUploadsSHS/655b6196f345b_SHSGoodMoral.jpg', 'UserUploadsSHS/655b6196f345c_SHSCertCompl.jpg', 'Kira', 'Jeanes', 'Hataku', 'Female', 'asd asd as dasd as dsa ', '2023-11-11', 'aasdsad', '09123124213', 'asdadas ada ', 'Aaawq Aaawq Aaawq Aaawq', 'klineruth48@gmail.com', '123', 'a', 'a', 'a', 'a', 'a', '31321'),
(34, '2023-11-25', 'Enrolled', '2023-2024', 'New', '123', 'Grade 1', '', '', '', 'UserUploads/65614c4c6339e_KstudentPicture.jpg', '', 'UserUploads/65614c4c633a1_KForm138.jpg', 'UserUploads/65614c4c633a2_KPSA.jpg', 'UserUploads/65614c4c633a3_KGoodMoral.jpg', '', 'Allie', 'V', 'Joseph', 'Male', 'a', '2023-11-07', 'a', 'a', 'Bacolod, Negros Occidental', 'aa', 'katsukiyu38@gmail.com', 'a', 'aa', 'a', 'a', 'aa', 'a', 'a'),
(35, '2023-11-25', 'Pending', '2023-2024', 'New', '123123', 'Grade 11', '', '', '', 'UserUploadsSHS/65614c6b9e95f_SHSstudentPicture.jpg', '', 'UserUploadsSHS/65614c6b9e962_SHSForm138.jpg', 'UserUploadsSHS/65614c6b9e963_SHSPSA.jpg', 'UserUploadsSHS/65614c6b9e964_SHSGoodMoral.jpg', 'UserUploadsSHS/65614c6b9e965_SHSCertCompl.jpg', 'q', 'q', 'q', 'Male', 'q', '2023-11-02', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'qq', 'q', 'qq', 'q'),
(36, '2023-11-25', 'Not Enrolled', '2023-2024', 'New', '', '', 'High School Graduate', 'Bread and Pastry Production NC II', '', 'UserUploadsT/6561c2fdc765c_TstudentPicture.jpg', 'UserUploadsT/6561c2fdc765f_TForm138.jpg', '', 'UserUploadsT/6561c2fdc7660_TPSA.jpg', 'UserUploadsT/6561c2fdc7661_TGoodMoral.jpg', '', 'a', 'a', 'a', 'Male', 'a', '2023-11-01', 'a', 'a', 'a', 'a', 'a', '123', 'a', 'a', 'a', 'a', 'a', '123'),
(43, '2023-12-20', 'Enrolled', '2023-2024', 'New', '1231', 'Grade 7', '', '', '', 'UserUploads/6582baec74e0a_KstudentPicture.jpg', '', 'UserUploads/6582baec74e0e_KForm138.jpg', 'UserUploads/6582baec74e0f_KPSA.jpg', 'UserUploads/6582baec74e10_KGoodMoral.jpg', '', 'Ivy', 'P', 'Allison', 'Female', 'asdasd', '2023-12-18', 'asdasd', '2311', 'asdas', 'asd', 'justcua2001@gmail.com', '123', 'asd', 'asd', 'asd', 'asd', 'asd', '123123'),
(44, '2023-12-22', 'In Progress', '2023-2024', 'New', '12312', 'Grade 7', '', '', '', 'UserUploads/6584e3bd31c95_KstudentPicture.jpg', '', 'UserUploads/6584e3bd31c98_KForm138.jpg', 'UserUploads/6584e3bd31c99_KPSA.jpg', 'UserUploads/6584e3bd31c9a_KGoodMoral.jpg', '', 'Lane', 'a', 'a', 'Male', 'a', '2023-12-17', 'a', '09123', 'a', 'aa', 'justineacain.cua@my.smciligan.edu.ph', '123', 'a', 'a', 'aa', 'a', 'a', 'aa'),
(45, '2023-12-25', 'Pending', '2023-2024', 'New', '121', 'Grade 7', '', '', '', 'UserUploads/6589603a08964_KstudentPicture.jpg', '', 'UserUploads/6589603a08976_KForm138.jpg', 'UserUploads/6589603a08977_KPSA.jpg', 'UserUploads/6589603a08978_KGoodMoral.jpg', '', 'Jezz', 'Flio', 'Clinton', 'Female', 'Iligan City', '2023-12-27', 'Catholic', '09123456789', 'Iligan City', 'asd', 'emily.parker456asd@gmail.com', '123', 'adasdasd', 'qq', 'q', 'sad', 'asd', '0912345678');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `Subject_ID` int(11) NOT NULL,
  `Subject_Code` varchar(255) NOT NULL,
  `Subject_Name` varchar(255) NOT NULL,
  `Subject_Description` varchar(500) NOT NULL,
  `StartTime` varchar(15) NOT NULL,
  `EndTime` varchar(15) NOT NULL,
  `SectionID` int(15) DEFAULT NULL,
  `GradeLevel_ID` int(15) DEFAULT NULL,
  `Strand_ID` int(15) DEFAULT NULL,
  `Teacher_ID` int(15) DEFAULT NULL,
  `SchoolYear_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`Subject_ID`, `Subject_Code`, `Subject_Name`, `Subject_Description`, `StartTime`, `EndTime`, `SectionID`, `GradeLevel_ID`, `Strand_ID`, `Teacher_ID`, `SchoolYear_ID`) VALUES
(109, 'ENG101', 'English', 'This introductory course focuses on developing fundamental language skills in English, encompassing reading, writing, and basic grammar. Students engage with age-appropriate literature to enhance vocabulary and comprehension skills, fostering a strong foundation in the English language.', '07:30', '08:30', 67, 1, NULL, 108, 15),
(110, 'MATH102', 'Mathematics', 'Foundational math concepts take center stage in this course, covering numbers, addition, subtraction, shapes, and basic problem-solving skills. The emphasis is on building a robust mathematical foundation, providing students with essential skills for future mathematical endeavors.', '08:30', '09:30', 67, 1, NULL, 108, 15),
(111, 'SCI103', 'Science', 'Designed to spark curiosity about the natural world, this course introduces basic scientific concepts through hands-on activities. Students explore topics such as plants, animals, seasons, and engage in simple experiments, fostering a love for inquiry and discovery.', '10:00', '11:00', 67, 1, NULL, 108, 15),
(112, 'CIVICS104', 'Civics', ' focuses on imparting knowledge about government structures, civic responsibilities, and the principles of democracy. Students will learn to be informed and active citizens, contributing positively to their communities.', '11:00', '12:00', 67, 1, NULL, 108, 15),
(113, 'FIL105', 'Filipino', 'emphasizes the appreciation and mastery of the Filipino language. Students will enhance their reading, writing, and communication skills in Filipino, while also exploring the rich literary heritage of the Philippines.', '13:00', '14:00', 67, 1, NULL, 108, 15),
(114, 'PE106', 'Physical Education', 'promotes physical fitness and basic motor skills through age-appropriate exercises, games, and activities. Emphasis is on developing coordination, teamwork, and a positive attitude toward physical activity.', '14:00', '15:00', 67, 1, NULL, 108, 15),
(115, 'CED107', 'Christian Education', 'explores values and principles based on Christian teachings. Students will reflect on moral and ethical values, gaining insights into spirituality and contributing positively to their personal and social development', '15:00', '16:00', 67, 1, NULL, 108, 15),
(116, 'ENG101', 'English', 'This introductory course focuses on developing fundamental language skills in English, encompassing reading, writing, and basic grammar. Students engage with age-appropriate literature to enhance vocabulary and comprehension skills, fostering a strong foundation in the English language.', '07:30', '09:30', 68, 1, NULL, 109, 15),
(117, 'MATH102', 'Mathematics', 'covers foundational math concepts such as numbers, addition, subtraction, shapes, and basic problem-solving skills. The emphasis is on building a strong mathematical foundation.', '08:30', '09:30', 68, 1, NULL, 109, 15),
(118, 'SCI103', 'Science', 'Designed to spark curiosity about the natural world, this course introduces basic scientific concepts through hands-on activities. Students explore topics such as plants, animals, seasons, and engage in simple experiments, fostering a love for inquiry and discovery.', '10:00', '11:00', 68, 1, NULL, 109, 15),
(119, 'CIVICS104', 'Civics', 'focuses on imparting knowledge about government structures, civic responsibilities, and the principles of democracy. Students will learn to be informed and active citizens, contributing positively to their communities.', '11:00', '12:00', 68, 1, NULL, 109, 15),
(120, 'FIL105', 'Filipino', 'emphasizes the appreciation and mastery of the Filipino language. Students will enhance their reading, writing, and communication skills in Filipino, while also exploring the rich literary heritage of the Philippines.', '13:00', '14:00', 68, 1, NULL, 109, 15),
(121, 'PE106', 'Physical Education', 'promotes physical fitness and basic motor skills through age-appropriate exercises, games, and activities. Emphasis is on developing coordination, teamwork, and a positive attitude toward physical activity.', '14:00', '15:00', 68, 1, NULL, 109, 15),
(122, 'CED107', 'Christian Education', 'explores values and principles based on Christian teachings. Students will reflect on moral and ethical values, gaining insights into spirituality and contributing positively to their personal and social development', '15:00', '16:00', 68, 1, NULL, 109, 15),
(123, 'SOC701', 'Social Studies', 'introduces students to the study of human societies and their interactions. Topics include geography, history, and basic civics.', '07:30', '08:30', 75, 8, NULL, 119, 15),
(124, 'TECH702', 'Technology and Innovation', 'focuses on introducing students to basic technological concepts and skills. It covers computer literacy, internet safety, and basic programming concepts.', '08:30', '09:30', 75, 8, NULL, 118, 15),
(125, 'LANG703', 'World Languages', 'explores the world of music, introducing students to different genres, instruments, and musical techniques.', '10:00', '11:00', 75, 8, NULL, 113, 15),
(126, 'MUSIC704', 'Music Appreciation', 'explores the world of music, introducing students to different genres, instruments, and musical techniques. ', '11:00', '12:00', 75, 8, NULL, 116, 15),
(127, 'MED705', 'Media Literacy', 'teaches students to critically analyze and understand various forms of media, including print, digital, and visual media', '13:00', '14:00', 75, 8, NULL, 111, 15),
(128, 'MATH706', 'Advanced Mathematics', 'builds on the foundational math concepts covered in MATH102, introducing more advanced topics such as algebra and geometry. ', '14:00', '15:00', 75, 8, NULL, 115, 15),
(129, 'ENG707', 'Creative Writing', 'encourages students to explore their creativity through various writing forms, including short stories, poetry, and essays.', '15:00', '16:00', 75, 8, NULL, 109, 15),
(131, 'ORCOM', 'Oral Communication', ' Focuses on developing effective oral communication skills, including public speaking, presentation, and interpersonal communication', '07:30', '08:30', 71, 12, 4, 109, 15);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `TeacherID` int(15) NOT NULL,
  `ProfilePath` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Age` int(5) NOT NULL,
  `Birthday` varchar(100) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `HomeAddress` varchar(500) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`TeacherID`, `ProfilePath`, `FirstName`, `MiddleName`, `LastName`, `Age`, `Birthday`, `ContactNumber`, `HomeAddress`, `EmailAddress`) VALUES
(108, 'TeacherUploads/656ddaba38fc9_TFProfilePic.jpg', 'Melany', 'J', 'Hudson', 29, '2023-12-14', '09123456789', 'Iligan City', 'melanyhudson@gmail.com'),
(109, 'TeacherUploads/656ddb069e61d_TFProfilePic.jpg', 'Anne', 'I', 'Mooney', 30, '2023-12-14', '09123456789', 'Iligan City', 'annemooney@gmail.com'),
(110, 'TeacherUploads/656ddbf3232c3_TFProfilePic.jpg', 'Ben', 'W', 'Griffin', 28, '2023-12-14', '09123456789', 'Iligan City', 'bengriffin@gmail.com'),
(111, 'TeacherUploads/656ddc314f42e_TFProfilePic.jpg', 'Alina', 'S', 'Rivas', 29, '2023-12-14', '09123456789', 'Iligan City', 'alinarivas@gmail.com'),
(112, 'TeacherUploads/656ddc6d7432d_TFProfilePic.jpg', 'Lennon', 'U', 'Boyd', 32, '2023-12-14', '09123456789', 'Iligan City', 'lennonboyd@gmail.com'),
(113, 'TeacherUploads/656ddc913749f_TFProfilePic.jpg', 'Wade', 'Y', 'Cooper', 30, '2023-12-14', '09123456789', 'Iligan City', 'wadecooper@gmail.com'),
(115, 'TeacherUploads/656ddcc093a52_TFProfilePic.jpg', 'Rosalyn', 'A', 'Callahan', 33, '2023-12-14', '09123456789', 'Iligan City', 'rosalyncallahan@gmail.com'),
(116, 'TeacherUploads/656ddcf669b6d_TFProfilePic.jpg', 'Navy', 'A', 'Phillips', 34, '2023-12-14', '09123456789', 'Iligan City', 'navyphillips@gmail.com'),
(117, 'TeacherUploads/656ddd6826ea9_TFProfilePic.jpg', 'Kenna', 'B', 'Hopkins', 30, '2023-12-14', '09123456789', 'Iligan City', 'kennahopkins@gmail.com'),
(118, 'TeacherUploads/656ddd9b85600_TFProfilePic.jpg', 'Lilith', 'C', 'Malone', 29, '2023-12-14', '09123456789', 'Iligan City', 'lilithmalone@gmail.com'),
(119, 'TeacherUploads/656dddc0db99e_TFProfilePic.jpg', 'Jillian', 'M', 'Knight', 31, '2023-12-14', '09123456789', 'Iligan City', 'jillianknight@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tesdacourse`
--

CREATE TABLE `tesdacourse` (
  `CourseID` int(15) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `CourseDescription` varchar(500) NOT NULL,
  `CourseDuration` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tesdacourse`
--

INSERT INTO `tesdacourse` (`CourseID`, `CourseName`, `CourseDescription`, `CourseDuration`) VALUES
(2, 'Bread and Pastry Production NC II', ' consists of competencies that person must achieve to be able to clean equipment , tools and utensils and prepare, portion and plate pastries, breads and other dessert items to guests in hotels, motels, restaurants, clubs, canteens, resorts and luxury lines/cruises and other related operations.', '141 hours'),
(3, 'Cookery NC II', ' consists of competencies that a person must achieve to clean kitchen areas, prepare hot, cold meals and desserts for guests in various food and beverage service facilities.', '316 hours'),
(4, 'HouseKeeping NC II', ' consists of competencies that a person must achieve to prepare guest rooms, clean public areas and equipment, provide housekeeping services, provide valet services, handle intoxicated guest, and laundry linen and guest clothes to a range of accommodation services.', '436 hours'),
(5, 'Trainers Methodology NC II', ' consists of competencies a TVET trainer performing functions of trainer and assessor must achieve. A TVET trainer is a person who enables a learner or a group of learners to develop competencies to performing a particular trade or technical work.', '264 hours'),
(6, 'Electrical Installation and Maintenance NC II', ' consists of competencies that a person must achieve to enable him/her to install and maintain electrical wiring, lighting and related equipment and systems where the voltage does not exceed 600 volts in residential houses/buildings.', '196 hours'),
(7, 'Food and Beverage Services NC II', ' consists of competencies that a person must achieve to provide food and beverage service to guests in various food and beverage service facilities.', '356 hours');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Account_ID`),
  ADD KEY `AccountType_ID` (`AccountType_ID`),
  ADD KEY `Student_ID` (`Student_ID`),
  ADD KEY `TeacherID` (`TeacherID`),
  ADD KEY `SectionID` (`SectionID`),
  ADD KEY `SchoolYear_ID3` (`SchoolYear_ID`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`AccountTypeID`);

--
-- Indexes for table `gradelevel`
--
ALTER TABLE `gradelevel`
  ADD PRIMARY KEY (`Gradelevel_ID`),
  ADD KEY `SchoolYear_ID` (`SchoolYear_ID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`gradeID`),
  ADD KEY `Subject_ID2` (`Subject_ID`),
  ADD KEY `Account_ID3` (`Account_ID`),
  ADD KEY `GradingPeriod_ID` (`GradingPeriod_ID`),
  ADD KEY `SchoolYear_ID4` (`SchoolYear_ID`);

--
-- Indexes for table `gradingperiod`
--
ALTER TABLE `gradingperiod`
  ADD PRIMARY KEY (`GradingPeriod_ID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `StudentID2` (`Student_ID`),
  ADD KEY `Account_ID2` (`Account_ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `StudentID` (`Student_ID`);

--
-- Indexes for table `schoolfees`
--
ALTER TABLE `schoolfees`
  ADD PRIMARY KEY (`SchoolFee_ID`),
  ADD KEY `Gradelevel_ID2` (`Gradelevel_ID`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`SchoolYear_ID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`SectionID`),
  ADD KEY `GradeLevel_ID` (`Gradelevel_ID`),
  ADD KEY `Strand_ID` (`Strand_ID`),
  ADD KEY `SchoolYear2_ID` (`SchoolYear_ID`),
  ADD KEY `Teacher2_ID` (`Teacher_ID`);

--
-- Indexes for table `strand`
--
ALTER TABLE `strand`
  ADD PRIMARY KEY (`Strand_ID`),
  ADD KEY `SchoolYear3_ID` (`SchoolYear_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`Subject_ID`),
  ADD KEY `SchoolYear` (`SchoolYear_ID`),
  ADD KEY `Section2_ID` (`SectionID`),
  ADD KEY `GradeLevel2_ID` (`GradeLevel_ID`),
  ADD KEY `Teacher_ID` (`Teacher_ID`),
  ADD KEY `Strand2_ID` (`Strand_ID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`TeacherID`);

--
-- Indexes for table `tesdacourse`
--
ALTER TABLE `tesdacourse`
  ADD PRIMARY KEY (`CourseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `Account_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `AccountTypeID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gradelevel`
--
ALTER TABLE `gradelevel`
  MODIFY `Gradelevel_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `gradeID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `gradingperiod`
--
ALTER TABLE `gradingperiod`
  MODIFY `GradingPeriod_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `schoolfees`
--
ALTER TABLE `schoolfees`
  MODIFY `SchoolFee_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `SchoolYear_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `SectionID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `strand`
--
ALTER TABLE `strand`
  MODIFY `Strand_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `Subject_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `TeacherID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tesdacourse`
--
ALTER TABLE `tesdacourse`
  MODIFY `CourseID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `AccountType_ID` FOREIGN KEY (`AccountType_ID`) REFERENCES `account_type` (`AccountTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SchoolYear_ID3` FOREIGN KEY (`SchoolYear_ID`) REFERENCES `schoolyear` (`SchoolYear_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SectionID` FOREIGN KEY (`SectionID`) REFERENCES `section` (`SectionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Student_ID` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TeacherID` FOREIGN KEY (`TeacherID`) REFERENCES `teachers` (`TeacherID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gradelevel`
--
ALTER TABLE `gradelevel`
  ADD CONSTRAINT `SchoolYear_ID` FOREIGN KEY (`SchoolYear_ID`) REFERENCES `schoolyear` (`SchoolYear_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `Account_ID3` FOREIGN KEY (`Account_ID`) REFERENCES `accounts` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `GradingPeriod_ID` FOREIGN KEY (`GradingPeriod_ID`) REFERENCES `gradingperiod` (`GradingPeriod_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SchoolYear_ID4` FOREIGN KEY (`SchoolYear_ID`) REFERENCES `schoolyear` (`SchoolYear_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Subject_ID2` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `Account_ID2` FOREIGN KEY (`Account_ID`) REFERENCES `accounts` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `StudentID2` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `StudentID` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schoolfees`
--
ALTER TABLE `schoolfees`
  ADD CONSTRAINT `Gradelevel_ID2` FOREIGN KEY (`Gradelevel_ID`) REFERENCES `gradelevel` (`Gradelevel_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `GradeLevel_ID` FOREIGN KEY (`Gradelevel_ID`) REFERENCES `gradelevel` (`Gradelevel_ID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `SchoolYear2_ID` FOREIGN KEY (`SchoolYear_ID`) REFERENCES `schoolyear` (`SchoolYear_ID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `Strand_ID` FOREIGN KEY (`Strand_ID`) REFERENCES `strand` (`Strand_ID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `Teacher2_ID` FOREIGN KEY (`Teacher_ID`) REFERENCES `teachers` (`TeacherID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `strand`
--
ALTER TABLE `strand`
  ADD CONSTRAINT `SchoolYear3_ID` FOREIGN KEY (`SchoolYear_ID`) REFERENCES `schoolyear` (`SchoolYear_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `GradeLevel2_ID` FOREIGN KEY (`GradeLevel_ID`) REFERENCES `gradelevel` (`Gradelevel_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SchoolYear` FOREIGN KEY (`SchoolYear_ID`) REFERENCES `schoolyear` (`SchoolYear_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Section2_ID` FOREIGN KEY (`SectionID`) REFERENCES `section` (`SectionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Strand2_ID` FOREIGN KEY (`Strand_ID`) REFERENCES `strand` (`Strand_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Teacher_ID` FOREIGN KEY (`Teacher_ID`) REFERENCES `teachers` (`TeacherID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
