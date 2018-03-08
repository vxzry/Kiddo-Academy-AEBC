-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2018 at 09:10 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkadc`
--

-- --------------------------------------------------------

--
-- Table structure for table `studdismisswithdraw`
--

CREATE TABLE `studdismisswithdraw` (
  `tblStudDismissId` int(11) NOT NULL,
  `tblStudDismissAction` varchar(15) DEFAULT NULL,
  `tblStudDismissReason` text,
  `tblStudDismiss_tblStudentId` varchar(5) DEFAULT NULL,
  `tblStudDismissFlag` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `tblAccId` int(11) NOT NULL,
  `tblAcc_tblStudentId` varchar(5) DEFAULT NULL,
  `tblAcc_tblStudSchemeId` int(11) DEFAULT NULL,
  `tblAccCredit` float DEFAULT NULL,
  `tblAccPR` varchar(10) DEFAULT NULL,
  `tblAccOR` varchar(10) DEFAULT NULL,
  `tblAccDueDate` date DEFAULT NULL,
  `tblAccPaymentDate` date DEFAULT NULL,
  `tblAccPayment` decimal(10,0) DEFAULT NULL,
  `tblAccRunningBal` decimal(10,0) DEFAULT NULL,
  `tblAccCharge` tinyint(4) DEFAULT '0',
  `tblAccRemark` tinytext,
  `tblAccFlag` tinyint(4) DEFAULT '1',
  `tblAccPaymentNum` int(11) DEFAULT NULL,
  `tblAccPaid` varchar(15) DEFAULT 'UNPAID',
  `tblAccTN` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`tblAccId`, `tblAcc_tblStudentId`, `tblAcc_tblStudSchemeId`, `tblAccCredit`, `tblAccPR`, `tblAccOR`, `tblAccDueDate`, `tblAccPaymentDate`, `tblAccPayment`, `tblAccRunningBal`, `tblAccCharge`, `tblAccRemark`, `tblAccFlag`, `tblAccPaymentNum`, `tblAccPaid`, `tblAccTN`) VALUES
(1, '17002', 1, 1000, '', '', '2017-09-09', '2018-02-12', '1000', NULL, 0, NULL, 1, 1, 'PAID', NULL),
(2, '17002', 1, 1000, NULL, NULL, '2018-03-03', NULL, NULL, '1000', 0, NULL, 1, 2, 'UNPAID', NULL),
(3, '17002', 51, 100, '', '', NULL, '2018-02-12', '100', NULL, 0, NULL, 1, 1, 'PAID', NULL),
(4, '17002', 52, 1500, '', '', '2017-10-07', '2018-02-12', '1500', NULL, 0, NULL, 1, 1, 'PAID', NULL),
(5, '17002', 52, 1500, NULL, NULL, '2018-02-02', NULL, NULL, '1500', 0, NULL, 1, 2, 'UNPAID', NULL),
(6, '17002', 53, 0, '', '', NULL, '2018-02-12', '0', NULL, 0, NULL, 1, 1, 'PAID', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcheck`
--

CREATE TABLE `tblcheck` (
  `tblChkId` int(11) NOT NULL,
  `tblChkAmount` float DEFAULT NULL,
  `tblChkDate` date DEFAULT NULL,
  `tblChkBank` varchar(100) DEFAULT NULL,
  `tblChk_tblStudentId` varchar(5) DEFAULT NULL,
  `tblChk_tblSchoolYrId` int(11) DEFAULT NULL,
  `tblChkFlag` tinyint(4) NOT NULL DEFAULT '1',
  `tblChkRTag` varchar(30) DEFAULT NULL,
  `tblChkNum` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcurriculum`
--

CREATE TABLE `tblcurriculum` (
  `tblCurriculumId` int(11) NOT NULL,
  `tblCurriculumName` varchar(50) DEFAULT NULL,
  `tblCurriculumFlag` tinyint(1) DEFAULT '1',
  `tblCurriculumActive` varchar(10) DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcurriculum`
--

INSERT INTO `tblcurriculum` (`tblCurriculumId`, `tblCurriculumName`, `tblCurriculumFlag`, `tblCurriculumActive`) VALUES
(1, 'RBEC', 0, ''),
(2, 'K-12', 1, ''),
(3, 'DEERS', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcurriculumdetail`
--

CREATE TABLE `tblcurriculumdetail` (
  `tblCurriculumDetailId` int(11) NOT NULL,
  `tblCurriculumDetail_tblCurriculumId` int(11) DEFAULT NULL,
  `tblCurriculumDetail_tblDivisionId` int(11) DEFAULT NULL,
  `tblCurriculumDetail_tblLevelId` int(11) DEFAULT NULL,
  `tblCurriculumDetail_tblSubjectId` varchar(8) DEFAULT NULL,
  `tblDetailsFlag` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcurriculumdetail`
--

INSERT INTO `tblcurriculumdetail` (`tblCurriculumDetailId`, `tblCurriculumDetail_tblCurriculumId`, `tblCurriculumDetail_tblDivisionId`, `tblCurriculumDetail_tblLevelId`, `tblCurriculumDetail_tblSubjectId`, `tblDetailsFlag`) VALUES
(1, 1, 1, 1, 'MATH', 0),
(2, 1, 1, 2, 'MATH', 0),
(3, 1, 2, 3, 'MATH', 0),
(4, 1, 2, 0, 'ENG', 0),
(5, 1, 1, 0, 'MATH', 0),
(6, 1, 1, 2, 'ENG', 0),
(7, 1, 2, 3, 'ENG', 0),
(8, 1, 2, 0, 'MATH', 0),
(9, 2, 1, 1, 'SCI', 1),
(10, 1, 2, 5, 'ENG', 0),
(11, 1, 2, 4, 'ENG', 1),
(12, 1, 2, 4, 'MATH', 1),
(13, 2, 2, 4, 'ENG', 1),
(14, 2, 2, 4, 'MATH', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldivision`
--

CREATE TABLE `tbldivision` (
  `tblDivisionId` int(11) NOT NULL,
  `tblDivisionName` varchar(50) DEFAULT NULL,
  `tblDivisionActive` varchar(10) DEFAULT 'ACTIVE',
  `tblDivisionFlag` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldivision`
--

INSERT INTO `tbldivision` (`tblDivisionId`, `tblDivisionName`, `tblDivisionActive`, `tblDivisionFlag`) VALUES
(1, 'PRESCHOOL', 'ACTIVE', 1),
(2, 'ELEMENTARY', 'ACTIVE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

CREATE TABLE `tblfaculty` (
  `tblFacultyId` varchar(5) NOT NULL,
  `tblFacultyFname` varchar(50) DEFAULT NULL,
  `tblFacultyLname` varchar(50) DEFAULT NULL,
  `tblFacultyMname` varchar(50) DEFAULT NULL,
  `tblFacultyGender` varchar(50) DEFAULT NULL,
  `tblFacultyEmail` varchar(50) DEFAULT NULL,
  `tblFaculty_tblUserId` int(11) DEFAULT NULL,
  `tblFacultyFlag` tinyint(1) DEFAULT '1',
  `tblFacultyPosition` varchar(100) DEFAULT NULL,
  `tblFacultyContact` varchar(11) DEFAULT NULL,
  `tblFacultyAddress` varchar(225) DEFAULT NULL,
  `tblFacultyBplace` varchar(225) DEFAULT NULL,
  `tblFacultyBday` date DEFAULT NULL,
  `tblFacultyImage` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`tblFacultyId`, `tblFacultyFname`, `tblFacultyLname`, `tblFacultyMname`, `tblFacultyGender`, `tblFacultyEmail`, `tblFaculty_tblUserId`, `tblFacultyFlag`, `tblFacultyPosition`, `tblFacultyContact`, `tblFacultyAddress`, `tblFacultyBplace`, `tblFacultyBday`, `tblFacultyImage`) VALUES
('17001', 'Rowan', 'Whitethorn', 'A', 'M', 'rowan@gmail.com', 3, 1, NULL, '09678678912', 'Manila, Philippines', 'Manila, Philippines', '1985-09-09', NULL),
('17002', 'Christine', 'Mijeco', 'S', 'F', 'hrdepartment.hiring2016@gmail.com', 2, 1, NULL, '09752860345', 'Caloocan C3 5th avenue', 'Caloocan City', '1989-08-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblfee`
--

CREATE TABLE `tblfee` (
  `tblFeeId` int(11) NOT NULL,
  `tblFeeName` varchar(100) DEFAULT NULL,
  `tblFeeFlag` tinyint(4) DEFAULT '1',
  `tblFeeType` varchar(20) DEFAULT NULL,
  `tblFeeMandatory` char(1) DEFAULT 'N',
  `tblFeeCode` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfee`
--

INSERT INTO `tblfee` (`tblFeeId`, `tblFeeName`, `tblFeeFlag`, `tblFeeType`, `tblFeeMandatory`, `tblFeeCode`) VALUES
(1, 'TUITION FEE', 1, 'SPECIFIC FEE', 'Y', 'TF'),
(2, 'OTHER FEE', 1, 'SPECIFIC FEE', 'N', 'OF'),
(3, 'BOOK FEE', 1, 'GENERAL FEE', 'Y', 'FEE001'),
(4, 'HYGIENE FEE', 1, 'GENERAL FEE', 'N', 'HF'),
(5, 'SDASDSDSDSD', 0, 'GENERAL FEE', 'Y', 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeeamount`
--

CREATE TABLE `tblfeeamount` (
  `tblFeeAmountId` int(11) NOT NULL,
  `tblFeeAmountAmount` float DEFAULT '0',
  `tblFeeAmount_tblFeeId` int(11) DEFAULT NULL,
  `tblFeeAmount_tblLevelId` int(11) DEFAULT NULL,
  `tblFeeAmountFlag` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfeeamount`
--

INSERT INTO `tblfeeamount` (`tblFeeAmountId`, `tblFeeAmountAmount`, `tblFeeAmount_tblFeeId`, `tblFeeAmount_tblLevelId`, `tblFeeAmountFlag`) VALUES
(1, 2000, 1, 1, 1),
(2, 3000, 1, 2, 1),
(3, 4000, 1, 3, 1),
(4, 5000, 1, 4, 1),
(5, 3000, 2, 1, 1),
(6, 1300, 2, 2, 1),
(7, 1400, 2, 3, 1),
(8, 1500, 2, 4, 1),
(9, 100, 3, 1, 1),
(10, 100, 3, 2, 1),
(11, 100, 3, 3, 1),
(12, 100, 3, 4, 1),
(13, 0, 4, 1, 1),
(14, 0, 4, 2, 1),
(15, 0, 4, 3, 1),
(16, 0, 4, 4, 1),
(17, 0, 4, 5, 1),
(18, 0, 5, 1, 0),
(19, 0, 5, 2, 0),
(20, 0, 5, 3, 0),
(21, 0, 5, 4, 0),
(22, 0, 5, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedetail`
--

CREATE TABLE `tblfeedetail` (
  `tblFeeDetailId` int(11) NOT NULL,
  `tblFeeDetailName` varchar(100) DEFAULT NULL,
  `tblFeeDetailAmount` float DEFAULT NULL,
  `tblFeeDetail_tblFeeId` int(11) DEFAULT NULL,
  `tblFeeDetail_tblLevelId` int(11) DEFAULT NULL,
  `tblFeeDetailFlag` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfeedetail`
--

INSERT INTO `tblfeedetail` (`tblFeeDetailId`, `tblFeeDetailName`, `tblFeeDetailAmount`, `tblFeeDetail_tblFeeId`, `tblFeeDetail_tblLevelId`, `tblFeeDetailFlag`) VALUES
(1, 'tuition', 2000, 1, 1, 1),
(2, 'tuition', 3000, 1, 2, 1),
(3, 'tuition', 4000, 1, 3, 1),
(4, 'tuition', 5000, 1, 4, 1),
(5, 'FEE 1', 3000, 2, 1, 1),
(6, 'FEE 1', 1300, 2, 2, 1),
(7, 'FEE 1', 1400, 2, 3, 1),
(8, 'FEE 1', 1500, 2, 4, 1),
(9, 'MATHEMATICS', 100, 3, 1, 1),
(10, 'MATHEMATICS', 100, 3, 2, 1),
(11, 'MATHEMATICS', 100, 3, 3, 1),
(12, 'MATHEMATICS', 100, 3, 4, 1),
(13, 'MATHEMATICS', 100, 3, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblgrade`
--

CREATE TABLE `tblgrade` (
  `tblGradeId` int(11) NOT NULL,
  `tblGradeGrade` int(11) DEFAULT NULL,
  `tblGradeStatus` char(1) DEFAULT NULL,
  `tblGrade_tblStudentId` varchar(5) DEFAULT NULL,
  `tblGrade_tblSubjectId` varchar(8) DEFAULT NULL,
  `tblGradeFlag` tinyint(4) DEFAULT '1',
  `tblGrade_tblGradingId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblgradeave`
--

CREATE TABLE `tblgradeave` (
  `tblGenAveId` int(11) NOT NULL,
  `tblGenAverage` float DEFAULT NULL,
  `tblGenAveStatus` varchar(50) DEFAULT NULL,
  `tblGenAve_tblStudentId` varchar(5) DEFAULT NULL,
  `tblGenAve_tblGradingId` int(11) DEFAULT NULL,
  `tblGenAve_tblSchoolYrId` int(11) DEFAULT NULL,
  `tblGenAveFlag` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblgradeave`
--

INSERT INTO `tblgradeave` (`tblGenAveId`, `tblGenAverage`, `tblGenAveStatus`, `tblGenAve_tblStudentId`, `tblGenAve_tblGradingId`, `tblGenAve_tblSchoolYrId`, `tblGenAveFlag`) VALUES
(1, 12, 'FAILED', '17004', NULL, 1, 1),
(2, 98, 'PASSED', '17005', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblgradingperiod`
--

CREATE TABLE `tblgradingperiod` (
  `tblGradingId` int(11) NOT NULL,
  `tblGradingPeriod` varchar(15) DEFAULT NULL,
  `tblGrading_tblSchoolYrId` int(11) DEFAULT NULL,
  `tblGradingStartDate` date DEFAULT NULL,
  `tblGradingFlag` tinyint(4) DEFAULT '1',
  `tblGradingEndDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblgradingperiod`
--

INSERT INTO `tblgradingperiod` (`tblGradingId`, `tblGradingPeriod`, `tblGrading_tblSchoolYrId`, `tblGradingStartDate`, `tblGradingFlag`, `tblGradingEndDate`) VALUES
(1, '1st Quarter', 2, NULL, 0, NULL),
(2, '2nd Quarter', 2, NULL, 0, NULL),
(3, '3rd Quarter', 2, NULL, 0, NULL),
(4, '4th Quarter', 2, NULL, 0, NULL),
(5, '1st Quarter', 3, NULL, 1, NULL),
(6, '2nd Quarter', 3, NULL, 1, NULL),
(7, '3rd Quarter', 3, NULL, 1, NULL),
(8, '4th Quarter', 3, NULL, 1, NULL),
(9, '1st Quarter', 0, NULL, 1, NULL),
(10, '2nd Quarter', 0, NULL, 1, NULL),
(11, '3rd Quarter', 0, NULL, 1, NULL),
(12, '4th Quarter', 0, NULL, 1, NULL),
(13, '1st Quarter', 0, NULL, 1, NULL),
(14, '2nd Quarter', 0, NULL, 1, NULL),
(15, '3rd Quarter', 0, NULL, 1, NULL),
(16, '4th Quarter', 0, NULL, 1, NULL),
(17, '1st Quarter', 4, NULL, 0, NULL),
(18, '2nd Quarter', 4, NULL, 0, NULL),
(19, '3rd Quarter', 4, NULL, 0, NULL),
(20, '4th Quarter', 4, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbllevel`
--

CREATE TABLE `tbllevel` (
  `tblLevelId` int(11) NOT NULL,
  `tblLevelName` varchar(50) DEFAULT NULL,
  `tblLevel_tblDivisionId` int(11) DEFAULT NULL,
  `tblLevelFlag` tinyint(1) DEFAULT '1',
  `tblLevelActive` varchar(10) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbllevel`
--

INSERT INTO `tbllevel` (`tblLevelId`, `tblLevelName`, `tblLevel_tblDivisionId`, `tblLevelFlag`, `tblLevelActive`) VALUES
(1, 'KINDER 1', 1, 1, 'ACTIVE'),
(2, 'KINDER 2', 1, 1, 'ACTIVE'),
(3, 'GRADE 1', 2, 1, 'ACTIVE'),
(4, 'GRADE 2', 2, 1, 'ACTIVE'),
(5, 'GRADE 3', 2, 1, 'ACTIVE'),
(6, 'GRADE 3', 2, 0, 'ACTIVE'),
(7, 'DFSDAFASDFASDF', 2, 0, 'ACTIVE'),
(8, '', 0, 0, 'ACTIVE'),
(9, '213WQWQEQW', 2, 0, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbllevelsubject`
--

CREATE TABLE `tbllevelsubject` (
  `tblLvlSubjId` int(11) NOT NULL,
  `tblLvlSubj_tblLevelId` int(11) DEFAULT NULL,
  `tblLvlSubj_tblSubjectId` varchar(8) DEFAULT NULL,
  `tblLvlSubjFlag` tinyint(4) DEFAULT '1',
  `tblLvlSubjCode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbllevelsubject`
--

INSERT INTO `tbllevelsubject` (`tblLvlSubjId`, `tblLvlSubj_tblLevelId`, `tblLvlSubj_tblSubjectId`, `tblLvlSubjFlag`, `tblLvlSubjCode`) VALUES
(1, 1, 'MATH', 0, 'MATH-K1'),
(2, 2, 'MATH', 0, 'MATH-K2'),
(3, 3, 'MATH', 0, 'MATH-G1'),
(4, 4, 'MATH', 1, 'MATH-G2'),
(5, 1, 'ENG', 0, 'ENG-K1'),
(6, 2, 'ENG', 0, 'ENG-K2'),
(7, 3, 'ENG', 0, 'ENG-G1'),
(8, 4, 'ENG', 1, 'ENG-G2'),
(9, 1, 'SCI', 1, 'SCI-K1'),
(10, 5, 'ENG', 0, 'ENG-G3'),
(11, 1, 'FIL', 1, 'FIL-K1'),
(12, 2, 'FIL', 1, 'FIL-K2');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessage`
--

CREATE TABLE `tblmessage` (
  `tblMessageId` int(11) NOT NULL,
  `tblMessageSubject` varchar(225) DEFAULT NULL,
  `tblMessageText` text,
  `tblMessageSender` char(1) DEFAULT NULL,
  `tblMessage_tblParentId` varchar(5) DEFAULT NULL,
  `tblMessage_tblFacultyId` varchar(5) DEFAULT NULL,
  `tblMessageDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblmodule`
--

CREATE TABLE `tblmodule` (
  `tblModuleId` int(11) NOT NULL,
  `tblModuleName` varchar(50) DEFAULT NULL,
  `tblModuleFlag` tinyint(4) DEFAULT '1',
  `tblModuleLinks` varchar(150) DEFAULT NULL,
  `tblModuleType` varchar(50) DEFAULT NULL,
  `tblModuleOrder` int(11) DEFAULT NULL,
  `tblModuleIcon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmodule`
--

INSERT INTO `tblmodule` (`tblModuleId`, `tblModuleName`, `tblModuleFlag`, `tblModuleLinks`, `tblModuleType`, `tblModuleOrder`, `tblModuleIcon`) VALUES
(1, 'Dashboard', 1, 'dashboard.php', 'Home', 1, 'fa-home'),
(2, 'School Year', 1, 'school-year.php', 'Maintenance', 2, 'fa-circle'),
(3, 'Curriculum', 1, 'curriculum.php', 'Maintenance', 1, NULL),
(5, 'Section', 1, 'section.php', 'Maintenance', 3, NULL),
(6, 'Requirement', 1, 'requirement.php', 'Maintenance', 4, NULL),
(7, 'Payment', 1, 'payment.php', 'Maintenance', 5, NULL),
(8, 'Admission', 1, 'admission.php', 'Transaction', 1, NULL),
(9, 'Enrollment', 1, 'enrollmentmain.php', 'Transaction', 2, NULL),
(10, 'Sectioning', 1, 'sectioning.php', 'Transaction', 3, NULL),
(11, 'Grades', 1, 'grade(first).php', 'Transaction', 4, NULL),
(12, 'Billing', 1, 'billing.php', 'Transaction', 5, NULL),
(13, 'Dismiss/Withdraw', 1, 'dismiss-withdraw.php', 'Transaction', 6, NULL),
(14, 'Profile', 1, 'profile.php', 'Maintenance', 6, NULL),
(15, 'Class List', 1, 'reportclmain.php', 'Report', 1, NULL),
(16, 'Daily Collection', 0, 'reportdcmain.php', 'Report', 2, NULL),
(17, 'Statement of Account', 0, 'reportsoamain.php', 'Report', 3, NULL),
(18, 'Student Information', 0, 'reportsimain.php', 'Report', 4, NULL),
(19, 'Parent Contact Information', 0, 'reportcontactmain.php', 'Report', 5, NULL),
(20, 'Student Grades', 0, 'reportgrademain.php', 'Queries', 6, NULL),
(21, 'Receipt', 0, 'reportreceipt.php', 'Report', 7, NULL),
(22, 'Parent List', 0, 'queryParent.php', 'Queries', 1, NULL),
(23, 'Faculty List', 0, 'queryFaculty.php', 'Queries', 2, NULL),
(24, 'Student by Section', 0, 'queryStudentBySection.php', 'Queries', 3, NULL),
(25, 'List of Enrollees', 1, 'queryEnrollees.php', 'Queries', 4, NULL),
(26, 'List of Applicants', 1, 'queryApplicants.php', 'Queries', 5, NULL),
(27, 'Fees', 0, 'queryFees.php', 'Queries', 6, NULL),
(28, 'Section List', 1, 'querySection.php', 'Queries', 7, NULL),
(29, 'User Account', 1, 'createUser.php', 'Utilities', 1, NULL),
(30, 'User Access', 1, 'useraccess.php', 'Utilities', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblparent`
--

CREATE TABLE `tblparent` (
  `tblParentId` varchar(5) NOT NULL,
  `tblParentFname` varchar(50) DEFAULT NULL,
  `tblParentLname` varchar(50) DEFAULT NULL,
  `tblParentMname` varchar(50) DEFAULT NULL,
  `tblParentRelation` varchar(50) DEFAULT NULL,
  `tblParentEmail` varchar(50) DEFAULT NULL,
  `tblParent_tblUserId` int(11) DEFAULT NULL,
  `tblParentFlag` tinyint(1) DEFAULT '1',
  `tblParentAddBldg` varchar(25) DEFAULT NULL,
  `tblParentTelNo` varchar(11) DEFAULT NULL,
  `tblParentCpNo` varchar(11) DEFAULT NULL,
  `tblParentOccupation` varchar(100) DEFAULT NULL,
  `tblParentCompany` varchar(100) DEFAULT NULL,
  `tblParentComAddBldg` varchar(25) DEFAULT NULL,
  `tblParentWorkNo` varchar(9) DEFAULT NULL,
  `tblParentAddSt` varchar(25) DEFAULT NULL,
  `tblParentAddBrgy` varchar(25) DEFAULT NULL,
  `tblParentAddCity` varchar(25) DEFAULT NULL,
  `tblParentAddCountry` varchar(25) DEFAULT NULL,
  `tblParentComAddSt` varchar(25) DEFAULT NULL,
  `tblParentComAddBrgy` varchar(25) DEFAULT NULL,
  `tblParentComAddCity` varchar(25) DEFAULT NULL,
  `tblParentComAddCountry` varchar(25) DEFAULT NULL,
  `tblParentImage` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblparent`
--

INSERT INTO `tblparent` (`tblParentId`, `tblParentFname`, `tblParentLname`, `tblParentMname`, `tblParentRelation`, `tblParentEmail`, `tblParent_tblUserId`, `tblParentFlag`, `tblParentAddBldg`, `tblParentTelNo`, `tblParentCpNo`, `tblParentOccupation`, `tblParentCompany`, `tblParentComAddBldg`, `tblParentWorkNo`, `tblParentAddSt`, `tblParentAddBrgy`, `tblParentAddCity`, `tblParentAddCountry`, `tblParentComAddSt`, `tblParentComAddBrgy`, `tblParentComAddCity`, `tblParentComAddCountry`, `tblParentImage`) VALUES
('17001', 'Ronaldo', 'Albania', 'Semilla', 'FATHER', 'albania@gmail.com', NULL, 1, '', '', '09128734698', 'Driver', '', '', '', '', 'Malamig', 'Gloria', 'Philippines', '', '', '', 'Philippines', NULL),
('17002', 'Rosalie', 'Albania', 'Kalalo', 'MOTHER', 'rosalie@email.com', NULL, 1, '', '', '09122372846', '', '', '', '', '', 'Malamig', 'Gloria', 'Philippines', '', '', '', 'Philippines', NULL),
('17005', 'Michael', 'Bataan', '', 'FATHER', 'michael@gmail.com', NULL, 1, 'Unit 2', '', '09361011659', 'IT Instructor', 'PLDT', 'PLDT Avenue', '4145689', 'Pag Asa Street', 'Brgy Damayan', 'Quezon City', 'Philippines', '', 'Brgy Pag Asa', 'Makati', 'Philippines', NULL),
('17006', 'Christina', 'Bataan', '', 'MOTHER', 'christina@gmail.com', NULL, 1, 'Unit 2', '', '09365896578', 'Housewife', '', '', '', 'Pag Asa Street', 'Brgy Damayan', 'Quezon City', 'Philippines', '', '', '', 'Philippines', NULL),
('17007', 'Romeo', 'Torreda', '', 'FATHER', 'romeo@gmail.com', NULL, 1, 'Bldg 2', '4145632', '09365658985', 'Electrician', 'RF Electrical', '34', '4143569', 'Rose Street', 'Brgy Bagong Nayon', 'Quezon City', 'Philippines', 'Rose Street', 'Brgy Bagong Nayon', 'Quezon City', 'Philippines', NULL),
('17008', 'Franchesca', 'Torreda', '', 'MOTHER', '', NULL, 1, '', '', '', '', '', '', '', '', '', '', 'Philippines', '', '', '', 'Philippines', NULL),
('17009', '', '', '', 'FATHER', '', NULL, 1, '', '', '', '', '', '', '', '', '', '', 'Philippines', '', '', '', 'Philippines', NULL),
('17010', '', '', '', 'MOTHER', '', NULL, 1, '', '', '', '', '', '', '', '', '', '', 'Philippines', '', '', '', 'Philippines', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblparentstatus`
--

CREATE TABLE `tblparentstatus` (
  `tblParentStatId` int(11) NOT NULL,
  `tblParentStatus` varchar(50) DEFAULT NULL,
  `tblParentStat_tblStudentId` varchar(5) DEFAULT NULL,
  `tblParentStatFlag` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblparentstatus`
--

INSERT INTO `tblparentstatus` (`tblParentStatId`, `tblParentStatus`, `tblParentStat_tblStudentId`, `tblParentStatFlag`) VALUES
(1, 'Parents Married', '17002', 1),
(2, 'Parents Married', '17004', 1),
(3, 'Mother Deceased', '17005', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblparentstudent`
--

CREATE TABLE `tblparentstudent` (
  `tblParStudId` int(11) NOT NULL,
  `tblParStud_tblParentId` varchar(5) DEFAULT NULL,
  `tblParStud_tblStudentId` varchar(5) DEFAULT NULL,
  `tblParStudFlag` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblparentstudent`
--

INSERT INTO `tblparentstudent` (`tblParStudId`, `tblParStud_tblParentId`, `tblParStud_tblStudentId`, `tblParStudFlag`) VALUES
(1, '17001', '17002', 1),
(2, '17002', '17002', 1),
(3, '17003', '17003', 1),
(4, '17004', '17003', 1),
(5, '17005', '17004', 1),
(6, '17006', '17004', 1),
(7, '17007', '17005', 1),
(8, '17008', '17005', 1),
(9, '17009', '17006', 1),
(10, '17010', '17006', 1),
(11, '17009', '17007', 1),
(12, '17010', '17007', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblrequirement`
--

CREATE TABLE `tblrequirement` (
  `tblReqId` int(11) NOT NULL,
  `tblReqName` varchar(50) DEFAULT NULL,
  `tblReqDescription` varchar(200) DEFAULT NULL,
  `tblReqType` varchar(20) DEFAULT NULL,
  `tblReqStudent` varchar(50) DEFAULT NULL,
  `tblRequirementFlag` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblrequirement`
--

INSERT INTO `tblrequirement` (`tblReqId`, `tblReqName`, `tblReqDescription`, `tblReqType`, `tblReqStudent`, `tblRequirementFlag`) VALUES
(1, 'MEDICAL CERTIFICATE', 'STUDENT\'S HEALTH INFORMATION', 'ADMISSION', 'NEW', 1),
(2, 'FORM 138-A', 'STUDENT\'S GRADE THE PREVIOUS YEAR', 'ENROLLMENT', 'NEW', 1),
(3, 'INFORMATION SHEET', 'STUDENT INFORMATION', 'ADMISSION', 'NEW', 1),
(4, 'PARENT CONTACT', 'PARENT CONTACT INFORMATION', 'ENROLLMENT', 'NEW', 1),
(5, 'FORM 137', 'STUDENT\'S GRADES', 'ADMISSION', 'TRANSFEREE', 1),
(6, 'BIRTH CERTIFICATE', 'PROOF OF IDENTIFICATION', 'ADMISSION', 'NEW AND TRANSFEREE', 1),
(7, 'VOUCHERD', 'VOUCHER', 'ENROLLMENT', 'TRANSFEREE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblrole`
--

CREATE TABLE `tblrole` (
  `tblRoleId` int(11) NOT NULL,
  `tblRoleName` varchar(50) DEFAULT NULL,
  `tblRoleFlag` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblrole`
--

INSERT INTO `tblrole` (`tblRoleId`, `tblRoleName`, `tblRoleFlag`) VALUES
(1, 'ADMIN', 1),
(2, 'REGISTRAR', 1),
(3, 'TEACHER', 1),
(4, 'PARENT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblrolemodule`
--

CREATE TABLE `tblrolemodule` (
  `tblRoleModuleId` int(11) NOT NULL,
  `tblRoleModule_tblRoleId` int(11) DEFAULT NULL,
  `tblRoleModule_tblModuleId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblrolemodule`
--

INSERT INTO `tblrolemodule` (`tblRoleModuleId`, `tblRoleModule_tblRoleId`, `tblRoleModule_tblModuleId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 10),
(9, 1, 12),
(10, 1, 13),
(11, 1, 14),
(12, 1, 15),
(13, 1, 16),
(14, 1, 17),
(15, 1, 18),
(16, 1, 19),
(17, 1, 20),
(18, 1, 21),
(19, 1, 22),
(20, 1, 23),
(21, 1, 24),
(22, 1, 25),
(23, 1, 26),
(24, 1, 27),
(25, 1, 28),
(26, 1, 29),
(27, 1, 30),
(28, 2, 8),
(29, 2, 9),
(30, 2, 10),
(31, 2, 12),
(32, 2, 14),
(33, 3, 11),
(34, 3, 15),
(35, 3, 19),
(36, 3, 20),
(37, 4, 17),
(38, 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tblscheme`
--

CREATE TABLE `tblscheme` (
  `tblSchemeId` int(11) NOT NULL,
  `tblSchemeType` varchar(100) DEFAULT NULL,
  `tblSchemeNoOfPayment` int(11) DEFAULT NULL,
  `tblScheme_tblFeeId` int(11) DEFAULT NULL,
  `tblSchemeFlag` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblscheme`
--

INSERT INTO `tblscheme` (`tblSchemeId`, `tblSchemeType`, `tblSchemeNoOfPayment`, `tblScheme_tblFeeId`, `tblSchemeFlag`) VALUES
(1, 'SEMESTRAL', 2, 1, 1),
(2, 'INSTALLMENT A', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblschemedetail`
--

CREATE TABLE `tblschemedetail` (
  `tblSchemeDetailId` int(11) NOT NULL,
  `tblSchemeDetailName` varchar(100) DEFAULT NULL,
  `tblSchemeDetailDueDate` date DEFAULT NULL,
  `tblSchemeDetailAmount` float DEFAULT NULL,
  `tblSchemeDetail_tblLevel` int(11) DEFAULT NULL,
  `tblSchemeDetail_tblScheme` int(11) DEFAULT NULL,
  `tblSchemeDetailFlag` tinyint(4) DEFAULT '1',
  `tblSchedDetailCtr` tinyint(4) DEFAULT '0',
  `tblSchemeDetail_tblFee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblschemedetail`
--

INSERT INTO `tblschemedetail` (`tblSchemeDetailId`, `tblSchemeDetailName`, `tblSchemeDetailDueDate`, `tblSchemeDetailAmount`, `tblSchemeDetail_tblLevel`, `tblSchemeDetail_tblScheme`, `tblSchemeDetailFlag`, `tblSchedDetailCtr`, `tblSchemeDetail_tblFee`) VALUES
(1, '1', '2017-09-09', 1000, 1, 1, 1, 1, NULL),
(2, '2', '2018-03-03', 1000, 1, 1, 1, 1, NULL),
(3, '1', NULL, NULL, 2, 1, 1, 0, NULL),
(4, '2', NULL, NULL, 2, 1, 1, 0, NULL),
(5, '1', NULL, NULL, 3, 1, 1, 0, NULL),
(6, '2', NULL, NULL, 3, 1, 1, 0, NULL),
(7, '1', NULL, NULL, 4, 1, 1, 0, NULL),
(8, '2', NULL, NULL, 4, 1, 1, 0, NULL),
(9, '1', '2017-10-07', 1500, 1, 2, 1, 1, NULL),
(10, '2', '2018-02-02', 1500, 1, 2, 1, 1, NULL),
(11, '1', NULL, NULL, 2, 2, 1, 0, NULL),
(12, '2', NULL, NULL, 2, 2, 1, 0, NULL),
(13, '1', NULL, NULL, 3, 2, 1, 0, NULL),
(14, '2', NULL, NULL, 3, 2, 1, 0, NULL),
(15, '1', NULL, NULL, 4, 2, 1, 0, NULL),
(16, '2', NULL, NULL, 4, 2, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblschoolyear`
--

CREATE TABLE `tblschoolyear` (
  `tblSchoolYrId` int(11) NOT NULL,
  `tblSchoolYrYear` varchar(14) DEFAULT NULL,
  `tblSchoolYr_tblCurriculumId` int(11) DEFAULT NULL,
  `tblSchoolYearFlag` tinyint(1) DEFAULT '1',
  `tblSchoolYrActive` varchar(8) DEFAULT 'ACTIVE',
  `tblSchoolYrStart` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblschoolyear`
--

INSERT INTO `tblschoolyear` (`tblSchoolYrId`, `tblSchoolYrYear`, `tblSchoolYr_tblCurriculumId`, `tblSchoolYearFlag`, `tblSchoolYrActive`, `tblSchoolYrStart`) VALUES
(1, 'S.Y. 2017-2018', 1, 1, 'ACTIVE', 2017),
(2, 'S.Y. 2018-2019', 1, 0, 'INACTIVE', 2018),
(3, 'S.Y. 2016-2017', 1, 1, 'INACTIVE', 2016),
(4, 'S.Y. 2021-2022', 2, 0, 'INACTIVE', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `tblsection`
--

CREATE TABLE `tblsection` (
  `tblSectionId` int(11) NOT NULL,
  `tblSectionName` varchar(50) DEFAULT NULL,
  `tblSectionSession` varchar(15) DEFAULT NULL,
  `tblSectionMaxCap` int(11) DEFAULT '15',
  `tblSection_tblLevelId` int(11) DEFAULT NULL,
  `tblSection_tblSchedId` int(11) DEFAULT NULL,
  `tblSectionFlag` tinyint(1) DEFAULT '1',
  `tblSectionMinCap` int(11) DEFAULT '5',
  `tblSection_tblFacultyId` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsection`
--

INSERT INTO `tblsection` (`tblSectionId`, `tblSectionName`, `tblSectionSession`, `tblSectionMaxCap`, `tblSection_tblLevelId`, `tblSection_tblSchedId`, `tblSectionFlag`, `tblSectionMinCap`, `tblSection_tblFacultyId`) VALUES
(1, 'LOVE', 'MORNING', 15, 1, NULL, 1, 5, '17001'),
(2, 'JOY', 'MORNING', 16, 1, NULL, 1, 5, '17002'),
(3, 'DASDS', 'MORNING', 12, 2, NULL, 0, 12, NULL),
(4, 'DSADSADSA', 'MORNING', 12, 1, NULL, 0, 12, NULL),
(5, 'SADSAADASD', 'MORNING', 12, 3, NULL, 0, 122, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsectionstud`
--

CREATE TABLE `tblsectionstud` (
  `tblSectStudId` int(11) NOT NULL,
  `tblSectStud_tblSectionId` int(11) DEFAULT NULL,
  `tblSectStud_tblStudentId` varchar(5) DEFAULT NULL,
  `tblSectStud_tblSchoolYrId` int(11) DEFAULT NULL,
  `tblSectStudFlag` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudemergency`
--

CREATE TABLE `tblstudemergency` (
  `tblStudEmId` int(11) NOT NULL,
  `tblStudEmName` varchar(50) DEFAULT NULL,
  `tblStudEmRelation` varchar(25) DEFAULT NULL,
  `tblStudEmTelNo` varchar(20) DEFAULT NULL,
  `tblStudEmAddress` text,
  `tblStudEm_tblStudentId` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstudemergency`
--

INSERT INTO `tblstudemergency` (`tblStudEmId`, `tblStudEmName`, `tblStudEmRelation`, `tblStudEmTelNo`, `tblStudEmAddress`, `tblStudEm_tblStudentId`) VALUES
(1, 'Jane Albania', 'Aunt', '092632717721', 'Malamig', '17002'),
(2, '', '', '', '', '17003'),
(3, '', '', '', '', '17004'),
(4, '', '', '', '', '17005'),
(5, '', '', '', '', '17006'),
(6, '', '', '', '', '17007');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudenroll`
--

CREATE TABLE `tblstudenroll` (
  `tblStudEnrollId` int(11) NOT NULL,
  `tblStudEnrollPreferedSession` varchar(15) DEFAULT NULL,
  `tblStudEnrollClearance` char(1) DEFAULT NULL,
  `tblStudEnrollPromote` tinyint(4) DEFAULT '0',
  `tblStudEnrollFlag` tinyint(4) DEFAULT '1',
  `tblStudEnroll_tblStudentId` varchar(5) DEFAULT NULL,
  `tblStudEnroll_tblSchoolYrId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstudenroll`
--

INSERT INTO `tblstudenroll` (`tblStudEnrollId`, `tblStudEnrollPreferedSession`, `tblStudEnrollClearance`, `tblStudEnrollPromote`, `tblStudEnrollFlag`, `tblStudEnroll_tblStudentId`, `tblStudEnroll_tblSchoolYrId`) VALUES
(1, 'MORNING', 'Y', 0, 1, '17003', NULL),
(2, 'MORNING', 'Y', 0, 1, '17003', NULL),
(3, 'MORNING', 'Y', 0, 1, '17002', NULL),
(4, 'MORNING', 'Y', 0, 1, '17002', NULL),
(5, 'MORNING', 'Y', 0, 1, '17002', NULL),
(6, 'MORNING', 'Y', 0, 1, '17002', NULL),
(7, 'MORNING', 'Y', 0, 1, '17002', NULL),
(8, 'AFTERNOON', 'Y', 0, 1, '17005', NULL),
(9, 'MORNING', 'Y', 0, 1, '17004', NULL),
(10, 'MORNING', NULL, 0, 1, '17002', 1),
(11, 'MORNING', NULL, 0, 1, '17007', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `tblStudentId` varchar(5) NOT NULL,
  `tblStudent_tblSectionId` int(11) DEFAULT NULL,
  `tblStudentType` varchar(10) DEFAULT NULL,
  `tblStudentPromotion` char(1) DEFAULT NULL,
  `tblStudentPreferSession` varchar(15) DEFAULT NULL,
  `tblStudent_tblLevelId` int(11) DEFAULT NULL,
  `tblStudentFlag` tinyint(1) DEFAULT '1',
  `tblStudentTransferee` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`tblStudentId`, `tblStudent_tblSectionId`, `tblStudentType`, `tblStudentPromotion`, `tblStudentPreferSession`, `tblStudent_tblLevelId`, `tblStudentFlag`, `tblStudentTransferee`) VALUES
('17001', NULL, 'APPLICANT', NULL, NULL, 1, 1, 'New Student'),
('17002', NULL, 'OFFICIAL', NULL, 'MORNING', 1, 1, 'New Student'),
('17003', NULL, 'OFFICIAL', NULL, 'MORNING', 1, 1, 'New Student'),
('17004', NULL, 'OFFICIAL', NULL, 'MORNING', 1, 1, 'New Student'),
('17005', NULL, 'OFFICIAL', NULL, 'AFTERNOON', 4, 1, 'Transferee'),
('17006', NULL, 'APPLICANT', NULL, NULL, 0, 1, 'New Student'),
('17007', NULL, 'APPLICANT', NULL, NULL, 2, 1, 'TRANSFEREE');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentinfo`
--

CREATE TABLE `tblstudentinfo` (
  `tblStudInfoId` int(11) NOT NULL,
  `tblStudInfoFname` varchar(50) DEFAULT NULL,
  `tblStudInfoLname` varchar(50) DEFAULT NULL,
  `tblStudInfoMname` varchar(50) DEFAULT NULL,
  `tblStudInfoBday` date DEFAULT NULL,
  `tblStudInfoBplace` varchar(225) DEFAULT NULL,
  `tblStudInfoGender` char(1) DEFAULT NULL,
  `tblStudInfoAddBldg` varchar(25) DEFAULT NULL,
  `tblStudInfoLang1` varchar(50) DEFAULT NULL,
  `tblStudInfoLang2` varchar(50) DEFAULT NULL,
  `tblStudInfoReligion` varchar(50) DEFAULT NULL,
  `tblStudInfoNationality` varchar(50) DEFAULT NULL,
  `tblStudInfoPrevSchool` varchar(225) DEFAULT NULL,
  `tblStudInfo_tblStudentId` varchar(5) DEFAULT NULL,
  `tblStudInfoFlag` tinyint(4) DEFAULT '1',
  `tblStudInfoSiblingNo` int(11) DEFAULT NULL,
  `tblStudInfoAddSt` varchar(25) DEFAULT NULL,
  `tblStudInfoAddBrgy` varchar(25) DEFAULT NULL,
  `tblStudInfoAddCity` varchar(25) DEFAULT NULL,
  `tblStudInfoAddCountry` varchar(25) DEFAULT NULL,
  `tblStudInfoImage` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstudentinfo`
--

INSERT INTO `tblstudentinfo` (`tblStudInfoId`, `tblStudInfoFname`, `tblStudInfoLname`, `tblStudInfoMname`, `tblStudInfoBday`, `tblStudInfoBplace`, `tblStudInfoGender`, `tblStudInfoAddBldg`, `tblStudInfoLang1`, `tblStudInfoLang2`, `tblStudInfoReligion`, `tblStudInfoNationality`, `tblStudInfoPrevSchool`, `tblStudInfo_tblStudentId`, `tblStudInfoFlag`, `tblStudInfoSiblingNo`, `tblStudInfoAddSt`, `tblStudInfoAddBrgy`, `tblStudInfoAddCity`, `tblStudInfoAddCountry`, `tblStudInfoImage`) VALUES
(1, 'Gwen Stephanies', 'Albania', 'Navarro', '1998-08-11', 'Malamig, Gloria, Oriental Mindoro', 'M', '', 'Tagalog', 'English', 'Roman Catholic', 'Filipino', NULL, '17002', 1, NULL, '', 'Malamig', 'Gloria', 'Philippines', 'data:image/jpg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD//gA8Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcgSlBFRyB2ODApLCBxdWFsaXR5ID0gMTAwCv/bAEMAAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/bAEMBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIA+gD6AMBIgACEQEDEQH/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/xAC1EAACAQMDAgQDBQUEBAAAAX0BAgMABBEFEiExQQYTUWEHInEUMoGRoQgjQrHBFVLR8CQzYnKCCQoWFxgZGiUmJygpKjQ1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4eLj5OXm5+jp6vHy8/T19vf4+fr/xAAfAQADAQEBAQEBAQEBAAAAAAAAAQIDBAUGBwgJCgv/xAC1EQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/AP7+KKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoorKu9b0qxDfab6BGQEsit5kgwpfHlx7mBKgkAjmgDVorhL7x3p8EZNpFJcMd+0yfuk+VQVOAWcgs23+FvkauVu/H9+0rohhgiJhK+Wp3rlFd/wB4S/BYN6/J+NBSi3su/wBy3fornsjEKCxIUDkkkAADqSTwBj/9Y61At1bOQq3ETEkAYkQkkkgAYPXI6fh9PnseKJ5pBJLeySj/AEwuXldgCYFkA+ZuMI/3em38j0Gl6vC8eWk5e++zx7Tkl4JlkODjH3JFx/vUuZbXRTpTS5mml6X/AOB+Op7ZRUUUm/IIwVC55z94Ejt6D/8AVUtMzCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKZJJHEheV0jQfeeRlRAPdmIA/E1x2q+PNA03KpO2oSjI2WOyRQ3YNMzrGOOcr5nagDtKa7pGpZ2VFHdmCj8yQK8O1X4kapc4GmRx6fEVQksqXFyp3AONzqIxjDf8s/u+/Xhb7Wb+7l867vZZ5DuQtJIWwDucKq/dABC/d2+/XNBcacn5fn/AMD5n0PqHizRNNB867WWTYkghg2yNhyg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wCeEi/Kv0DoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAr8s/27/DY1ufx7orxhofEvwmCEYJ8xpT4g0qVSByQIoo1bbzsav1Mr4Q/a901Zde8KTY51bwv4k0p+Bg/Y7izuIsse4OoSDp8u7OaAP8AGv8AGHwq8Va7458R/DfwxoWq654ltfiV4q8P2GgaTp97qGq3l5p2pTwS21tY2dvPcyShIM+VHatIvlu7qVT5IJ/2PP2itNQXOrfCbx7pdr9m+0x3N54R8QxwyW+9YhcJK2nLG0BkcL53meWxb79fs7qHiif9hP8A4LA+M/iNHoUWoXPwb/aft/jHpGiTNHbprGjXWtWviu4063mnhu47Z7zRdRW3hvPJnaGZkmjTfDx/qn/CT4i/DP4//C/wH8ZPh9PpPibwP8RvCOl+I/DeqC2tJnk0bXLW3vfsF0hWU211bSbbXVNNkbda6hayW8yedb0Af4c8vwV+ImkmeO58MaxHcxhisUmm36OFVHdndGtw6KqK3zMu1Ar8na9cqnw08bPMtv8A8IxrJlO07RYXOXVwSpUNECQQDtbbtav90fxj4G+GC6Zfanr3w08Fa8i2zxTpfeE9AvHmgBeT7PI11p8xeFnZ28tt0e5nf+KvyL+M/wC3T+wP8HfFv9geMv2dPAc2o2t9HpV1cW3gDwLNLZNcW7yQs5k06FpLT7Naq00du010ihB9gdIZ5oQD/Jf8N/CfxvJdrCvhLxDLI8xt4zDpl4+2VhhUASCQEHKt8v3j86d6frPw18Vadc/ZNZ8N67pkp2TJHqOl31o5ikzslVLi3izHLsk2sg2tt/dyOa/1nPCX/BTz/gn1L4evdT0T4ZeEPDllp8WkymKfwb4Y0W2mtJXhS3urNm0y3+12+mWsgupJEhWOO1jdLKS5eFIZtXx9+2T/AME4PE3h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QPBv7fvjW6ig8mLxX4f8P+IgVUIskkqXGnTP8oGWMmntub+979AD8sPEEUb6Tpl1n5rbU9V01pcniI/Y9SgiAyEI33t0yt/GzP8ANXPJEFCS+YrHcQUVgzrjqH8s7ckklfmPGea2dSuTcaBNbqQcX2k6iuAQR5lld2VxjAI+Zkh3N/FtOaw7ZcxjI3ENkc9xgckjpyPl6UASTy524bqePmwABgc56/8A6sjvXtfwE8Jz+Pfip8PPB1nG0t54h8ZaBpUMaqzblu9QhjfLRlW2hNzt8rbdvPrXjMluGKvnlDyflHDHgcnJwF/Hp71+oX/BHT4ZyfFD/goX+zj4aFsLq3Hji21C5jkjSaNYLC1u7rzGVsqHUwblY/MjKmzZlKAP9db4R+Hrbwr8PfBXhy0ijjt9C8LeH9JhjjURxhNP0q0sxhAW2A+Xu2/N35zivSbglUY/X26Kp/z9aztIg8i0gjHASONVHAAVVAA4+nb8qu3RwgBH3vT3Y9Ouev8AjQB/Kv8A8FevEX/Cy/8AgqB+xV8IoiJ7b4QfDfxZ8RNRgDblguPG179lSWWM4VWY+G9DZXB3fcr9zf2I9JEV7osmzAgstSuxn0+ySWYPsQ0yd16fXP8APj8fph8Qf+C3X7Qup5M0Pwz+GHwv8FQZfctub/w54W1mZFDDEbC7S/8AlXsz/wB8V/Sz+xppRhtmuSuBb+HY0zgZ33dxbOvbj5IpP85oA+9aKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAPyE8eWQtvHPxY0sgL5XjLX5VGf8AlneXkl5H0y33J1/Wv89v/g5W8Gpo/wC018K/FSwFW17wHqNjJL8wWQ6J4guZApGAu5V1Zc7fmZGx2Sv9E74xWgs/jZ8TbXbhby40i/G4Ej/TNAsGdgAcnLq3PTdX8N3/AAdC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UHxHfYmUkn5JNu5f7v3D9yv8pXT133GIQXeaNl8x2yxkZSqoAWIOc7V+7j5B24/18P8Agh78Orj4b/8ABLn9kXQrqzezvb/4U6N4lu4XTbJ5vid7jX0eQAD52t7+Fuf4diYNAH6nuHCMcD0H15zkjpj8f0xX8uH/AAXK1NPFH7bP/BOD4Zq286I/xC+It1bjPypc6noVlZTMAOd03hW4Uf8AXOv6l7iFlj7nnk+vP4Yxz0x/h/I9/wAFP9RfxH/wWp+BOgMzPB4F/Zc0W5EbZ2QXWr+NfG08zADI3SQahZ8/WgD9uv2ONJ36t4XXacDUY5ug+7aJJMOnTHktX671+Zf7FmmtLf6RNt+W00y/vW45G5ZLZTnoBvul2/8A66/TSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA5vxlp39seEfFOk7dx1Lw7rViq/3mu9OuYFH/AH04r8SrDUF1rwj9ngjmuna2UL5UEjAgKh4YIQTs+b+JvwzX7qTozwTIhw7xSIp9GZCFP4Eivwz8MQCw8KXcMQ8t1DrKsJ8rdIq+W5cAqGYldu5vm60Afwif8Fuv2MfGlv8AtZ6t8XtA0LxLf6N408LaVNqVrpHgL4h65s1bSkutMMk+q+HvB+raBbK1nZWbNDf6pa3i+WH8nydkz/iF4S/Z1+OXjvxNpXhHwl8N9f1TXdd1SDS9JsDptxZXF5f3bxxQxCPVV09InMksatJceTHH5nzunNftt/wcT+LdRj/a08BaBJd38Gmp8LY72KC2naOKS8u/E/iCCaWaMNh28i0hj3bWb2+/X8+J1XW7y3Fvd6je3phRUgWaaV1iiQkIsauSAAny/Lh/loA/ej4Q/wDBvp/wUKsvFvw81v42fAPxZ4E+HWpatouo+Jdbk8TfDi7vx4Zae3vNROj6PH4ygurq/fSi32ezWNpJJpIVfyUd3T/Sm/ZY/aJ/Z+/4Vh4W8C+AfEFhb6X8OtC0PwXJot8sGiX2iL4e0u10mGwurXUJLVEMUNgFjkt2mtZlXzraaaF43f8Axnh428ea2NL0nV/Feuana6fBa6fp9vq+r312mm6bEiWsNnaPeTSLaWUMKLDDaRssMMSpCiKiIh/1W/8Ag3v/AGdbr4Bf8Eyfgt/aEaprHxWF38XdVBLPL/xV1rp8WkBmKKFCaHpum4jX5V3+lAH7Gat+0B8E7VCb34ieBdMkJBK6j438G6eEAJ3Fze6/bgA8f3v8P5If2kdctfjp/wAFkvid8WPAF3F4x+Hng/4YfDb4dWnijw2U1zw//atnpmn6lrdrBr2lPf6Lfi21CWSN7jTb66t451ubaZ0vLa5hT+v66hnUxMryDYw4DMMgZBBUdQR/kCv41f2WTLov7ff7f/hk7Hs7H416sLbo0cclz4q8U30iRcfu9kVxartXbtVQlAH9U/7FWlmLSr+92kLb6NZWYLK6MGurkyt8rqrLuFln8DX3hXyV+ycwPh/XFUAKseh8D7oOzU+g6DOOQPT2r61oAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACvxJuIF0zWPHPhxhtbSvE/iHTGRsrt+xatd2+0gkYx5XT/AGeRxX7bV+KWv/ZLz4yfGK/kRJ4JPiF4vijgmQvAn2fWry3klVQUYO7QNM25tm+SQ7M0AfxH/wDByH8AfF2rfEX4P/Fbwr4Z1jXFNjqHg3VJtJ0m91E2ojurjVtPe7ktYplt4WNxeKsk22MN/GK/ld1DT9d029kstQsr6zuUO14pLeaJ1AwB8uxW5PHp/wADNf3Mf8HD/wAX9X+HXwb8A2HhzRfCd7ceJfiJFp8seueHtO1yFLO10TW7qUxQapFcwxziZLdVuP8AWRqz7Mb8V/GtD8Y9ftry21CPQPBllfWV2ty0kvgPwtLbu6SeZGtzb3eizWU1uJY1b7PcW9xDNH+5mR03hwDK+C/wg8efFP4g+DfB3hnQdY1jU/FHiXRtE02zsrC6vJribUL+KBSIIY5H8qMs0lxI0Xlxxo7vsRHdP9rL9lnwh4e+HX7Pvwc+HVvqGmxjwT8NfA/hby4r21Kq2g+GdM0xlG2YAFpLZv8AgX51/kh6N/wV5/bA8O+HNH8MeGZPgLpC6NY21hYanpf7Jn7MNnrsEcMbwJcWuswfCMXf22RJNzXjf6UzbH8zfl6/0Y/+CGUfxB+If/BOX4NfEv41eJPGmv8Aj/4gt4g8UXF5f+Jtb02OHSrvVZodItNM0fRr/TtH0rTIrWDzLO10/TbONYpvubNlAH7kahHZIQftdowJPIniPygcnO/7mP4v8j+J/wDY3uD4u/bT/be8bpERF4p/ae+IENrIUwslhpOu/wBm25XH8Imiuv8AgTvv5r+rL41+Do4vhj8TL3Sdc8e6dqlh8PPG+oaRc6d8RfHVrNbarZeG9TuNOli8vxEqny7uOGRUZWXC4r+af/glDo2j6v8ACDwZ4vutIsW8TeItc8TX+va0YFbUtZuv+Es1mN7zUryTzLq7uZjB5kk00zNIzO/8ZoA/qp/Zb09rbwpqt0VIW5n0+FTjAJtobhnA9cG4X8x2r6hrxP4BeUvgC2hijSMQ310rFAcvkRkMxJJJAO1d3O1Rx3r2ygAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAK/Fb4g6XP4P+MnxS0rVA9qb3xbr+v2YfO6fTNdv7rVrKdME71e3u1X5dx3LImzO/P7U1/Jt/wdAeMb3wp4e/ZtsvDmqaloGseIYPiQdcvdD1XUdIvdU0fS38JLptlfvp13bfa7S0vL++mtluFk8iWaZ4WQ76APyU/wCDiH9nX4mfG34E+DfFXwr8La541HgXxouvaxaeH7K5v9Ti0O50vUrC8vYNLij+33hsrqS3WeG1t5LiOFnm8l0R3T+IW/8ADvjDRppbXV9E8Rac8QdXt9Y0jVdPk2r95ZIruCJlfAzt27i3WvvD4t/EPxxvltx438YPDGzhIpfFOvTqAd+eJtRkHLFv7z7m/P5l03W9UvL/AM271G9u5Cysz3d3Pcu67xkM00rsQfl+X/ZoAofAv4d6R8UPil4M8F+IvHHhL4Y6NruvafY6n4z8c3GrWHhbw5p7Sg3eqazNpmla1qn2S2hRmkj0/Sby8uWZIIbZ3ev9bD9kz/goD/wTA+GPwE+Dvwb8Nftofs8C2+HXw78IeDYfK8V22gWVxJ4f0Gx0y4vLW01qDS54o7ye3kuts0ccytN++Tf8lf5evhXU2+zQI0Nk54G82Vs0gG1sHzHh3tu2/e3fdyOa+jNBuFntIzPBbyhFCrvhicIvUquUwFLH04oA/wBRvxT+2f8AsVeIvBvi06H+1V+zrrTyeFfEDR2tr8YfAjS3AOkXm2JIG1xZpGk3KvkwxvId2xE39f5rP+CNvibTda+EHhnTrbUPPmsNU8QXNzEqylLaS98SajeJArtlMKLhcqp+Rg+/Y++v5DPHGq36SrcW95dWlxGE8ueyuJrOZAgAULNavE68bfusrLtNfdn7CX7VXx98B+PfC9noPxe8eWumLq2mxSadd6/eavpz27alDJNE1jq8l/bbJfmWQ+X80bOj/JsRAD/UN+A1q8Hw/spXBH2u7upkyCNyKViDYPQFkYfhz3r2esnQreztdG0uHToUgslsbZraKMsypFJCsi4ZmZnzv3MzMzMzFy3etagAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAK/i2/4Ooddz8Tv2cNBVx/oPws8WaqUBBKnV/F0VruK8kbxo2FbH8L1/aTX8Lf8AwdJ6r5v7U3wr04uSNO+AWjyBMjCm98ceNZCQBhhu8pf++c80AfxRfFici4uTkZywOOg+ZwRjHU/T+KvENEkzdDBAOCNx5IyQDjK5wR7HkivYfilLvuZ845Y/xDOSW2DHQg5/PNeLaI227XO1lYgk5Ukjeo78kED73+z70AfTnhZgBaruJ4GTgYHHJByMA/hjdX1D4ez9jQjgeWCABnAYLjnb1+q18teD0LPBjAxjaCMAL95V24w3Xd/s/jX1V4fQfYY8tgsiAcdCAMnOCM854/8A1AHB+ONoWTjoRyc9cHB7cAj/AHeleufsuXBi8Z6I4bbt1KzJzjOBdRHI5AIAHy8j9a8o8dr+6kI6lgSATycHkA4Hb6j8s97+zhP5Xi3SHJ4F9bH8rmMcA56AZoA/19fhbqX9s/DP4d6vnd/angbwnqO7IOftug2FxnI4OfMzxXd14J+yvqQ1j9mj4AamH8z7Z8HfhzNvzncT4T0oEk+uQc173QAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFfwIf8HPmqG5/bf0ix3DGl/AjwJAByMfaNa8X3xzjrk3P/Ad/fNf331/npf8HMV95v8AwUC8SQk7hZfCn4Y2g6kqG0i4vWTjgf8AH00n/As47UAfyG/FKZRdXGTzuI4GeeRx1xjt6N+njeiyAXgDc5bghcAHepAZsk8r/B7etep/FKVUuLhn5BY88HLYYZycjP8AD8v3WPQdvItBYNchyNpD5GMgH5gctwMY/vY/HrkA+rfBZBW1JUk7VJAJPRjj+FeAn+1u/gPavrDw+oayjzwdgIwM9AFJPI9v85r5C8E3Hz2yIeBjazDcM4IIyOpCj8a+xfDabrJCDkmMYC4xuwD0xuPSgDhfHMf+juc7eSBwOysTxknnjjp9K3vgDMI/FOnnPAu7ds544njJGecc9PftVDx5Fi2kJ6DpnAAOGwD1bd7dqd8CXC+KLDOd32mIjBHQTKd2A3B3fcYfrjFAH+tD+wneC/8A2Nf2ZroMW3/BnwLHuJySbfRLa3OTgc5iI6CvrCvij/gnHdfbP2Gv2Y5s5x8LdFhJ45+zS3Vv2JH/ACy9a+16ACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAr/Oh/4OP737b/AMFD/iq27d9h8LfDeyCn+HyfBWkkrgdfmfd/wKv9F6v83X/g4Xvxef8ABQ347BSHMC+ELIjB+U23hDRkOWxjjGNv93HOKAP5TfipIftEwGM5AHTABLDJ7H04X5e/YV4rpFztn2KCpJGWx3LZ+mP5/JXsnxUINzMNwyG3KSAwIyV9M/3v/rV4zpcamcEFQC3GQOoIOMEZB/2nOetAH018PpnNxZRkgh5V3bgScYPHGMEn+GvvTwpFu06MgBfkXB5AOV4z83Y8d6+C/h8ifaLMBDvZw27gjaF6HPXr8rY/A4r9APCEajT48DBKhuemwouM9ef6CgDhfiHE6WFxkfNtLAkEYwDk4z6KWWsn4EFm8U2Jf7xuYAMYBI89WwMgjkhcfjXR/EQKtjOSBtKgYByoyCcrxnnA+X/arB+BSY8UWO1cgXMGOMYHnKfyxtXaF4oA/wBWv/gmQSf2Df2ZwTuK/D2Nc4xwus6sAPwHH/66+7q+E/8AgmVG0X7B37M6tnJ+HkMnzZyRJq2qSAnJPJDfyr7soAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC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oooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAr/KZ/4KrSCT9tH9rRxwp/aM+NxXqcY+JfiYfnkcfy4r/Vmr/KO/4Kovn9sr9q49A37RHxrPABBJ+JPiYk+ucE/jkcUAfgr8SSTeSkgNzj+IgE7snAZsDP3e/FeY6KB9ozn+IArnrjOcluOR27da9K+I7Mt9N2zuAIIGckjGB0Ht/dGK8z0cAzszHGGU4UL83UjJ6J3/vHvxQB9YfDBQbm14AYshPHO3DEZxweR8v3lbdvwM5r768OELYw4B5jUkE4H3Bg9PQdvu59a+AfhhtN3ZMCxJ8nI4woycdDxn121+gPh0j7AuVVS6RjBKjoBwDyO6/hkYoA84+JZzZyYHoykMOeCenTBz+PpxVr9nNv+Kt0wZ6XtvjHAz9ojOOOM8n8fTgVR+JZ220pHBAIfGMAAOcHJBPX5cVd/ZyyPF2mHqPtsAK8YJNxCMEcHJGFz9PQ0Af60/7GsZi/ZO/ZyjYYK/Bn4e5H18Naef619K184fse5/4ZU/Z0yMH/AIUx8Osj3/4RbTfc9evWvo+gAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAK/yff+Coc5l/a+/aklBHz/ALQHxkfdj1+IniQ8kkHj5fWv9YKv8mn/AIKXS+d+1f8AtLuhADfHT4uMMnk5+IHiEg5zkk/yoA/DH4kOPtc2D8wZjtzyAS+c89Mjueleb6Mx+0dT9/JHUEAnpnIBY/xdVNeh/Ef/AI/JcrnJI+8MA7mJJAzgAevy5+tec6Of3yr8pw6tgk9mOMccE5Y0AfWHwuH+l2mAuUMYwM5LbuQT0YYPX/69foD4fQCxhJ3Fyq9hjG3GSfbH/wBbmvz/APhaGW7td5HMqAKCDxkqQSOTycr/ABdq/QHQC32JFUgKFBU85B24Izu5x6fSgDzP4mMotJCyZ3cY25yW3cjBxuP97n71aP7NhD+LdMJyR9utj0YEKbiP7oJPp9etZ3xOO20ZkIGFX3ByrDdjGOjN/s9wa0/2aBnxho+SoH221Ixnn/S4h1HTn6ErQB/rYfskrt/Zd/Z5XGMfBr4cjGMY/wCKV0vt2r6GrwH9lNSn7Mn7PykbSvwb+HII44x4T0r0AH6CvfqACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAr/ACV/+CjMqyftQftFSbv9b8a/iq2TjA8zx5r7ZGcA8H+QxX+tRX+R9/wUCnFx+0b8erjAPnfF34lSgg9pPGmtOB6jg0Afit8RmBvJeDgFsk5AA+bJOQBjkd/1rzzRdzXCsqjJkCAsOvcLwODgbvp9BXe/EVx9sl6/fJJJPYsMEgdDj8u4rgNF4mRwMSF4xuLY+Q+ZuJ4OT90jNAH1p8KwRe22QwY+QSCM5beQw+bJ6nt/F27V+gOgNixiUqRuVcoPZV6cqTyPy985+AvhYD9ttem0sm3ON5yCcsx5DAkN8v8AFX374fVvsSBQOEBOTjBZQPUcHa3C7t3vQB5Z8TiotWJbbj7/AFA/iUL685U/7vvWz+zMSfGOkEgnF7bdwSD9pT69x19+lYvxPAa1mUFPlGc8H5tzFjxngEbf7vUfTb/ZkXPjDSOn/H9bDgDtcxDgnkAZ/hoA/wBbv9lpSv7NXwBUggr8HPhwCDjOR4S0nOcEjr717xXh37Mq7f2cvgOvTHwf+HI/H/hEtJz6d/oa9xoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACv8in9u2QzfHf4zzEE+d8TvH0h7BTJ4r1Z8ZxjvX+utX+Ql+2nO0vxk+Lkhzl/iL44k5OclvE+qMGz2Az8vzEYP1oA/Hn4i83c+VPDnkcNuDOB1428f+h4FcLoZAnQ4Xlx98EMuPxwevruPHvXbfERk+2OCGDGRsDkjmR+v3j/wL7vOBXBaRlp4wpA2vn72088kZG7Gc7dv93t1oA+u/hQ2L2zfIJ3RZAycMC3BwvOMf3iy7vSv0D0Bf9Biz8uUU8Z6kckE9QSf73X8c/n38JSWurcZ3EmNckHJxkMw6naT/Fj5l5HNfoJoak2MeRwI0BwRkYGc47Enj245oA8q+KCgWkgUdODuI7Zyc7sf8C/vY49dj9mRSfGWkLjP/ExtPU8faojkkc8/e9/pWJ8TSfskh/vblI6FWBIIHBJDKG6/dNb37MQLeNNHIA41C0xknp9pj3c+wP6UAf6437NuB+z18DAARj4RfDoYIwePCOkjkV7VXj37PShPgJ8FFXkD4T/D0DH/AGKek8jIH6ivYaACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAr/H/wD2wJTL8UviZMQP3/jbxXKcYxmXX9QdsEbTyWz8vy81/sAV/j4/tZOZfiJ49fJIfxV4jfLdzJrF8cgjPB+X0+9QB+SXxFU/bmdfl+YrjAx94g5B9x3xls9a4nRUBuFJJGJFIPJLcnow4ZiB75rtviLxfNgEYdjtIB4BYDIODyfm/wCBdqwfAGiTeJ/FPh7w5BeWVhJr2t6bo8V/qU62mm2MupXsFjHd6ldsGFrYW7T+deXD7lht43fnZQB9RfCNd11bYK8SISQuW4JbDHBGT8zZ4PNfoHoYK2ELEKGKKcKNoGBn7pK5HI3YTvX17+zx/wAEPfi54juIZZf2l/2TfDsEYjkNx4i+KUWmxOJGYERSvZtHK7feiX+JX3oa9z/ap/4Jr+Kf2P8A4ZaV491z9oT9mv4nx6hrlr4fbw18LPiTZ+JfFVvNPBLMl8NGEKXE+mQrCy310u1bOSS23o/nI8YB+OvxQBNuxU5Csx5zxkMOhGcHPWuh/ZgU/wDCaaP1J/tCzb5cZO25h+XOen6fXtzvxOIFqVyeWK7iCMLksAVOMkfL24+tdL+y6pHjPR88j+0LMjPcC4jLAE9SeM/Ln37UAf66fwHjWL4IfB2NcBY/hd4CQAdML4W0oD+X616vXmHwSXZ8GfhImc7fhn4EGfXHhfSxn/69en0AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFADXYIrOeiKzH6KCT+gr/AB4v2onV/GvjBgxYv4g1k7jgBs6ndNkdDkr/AHq/2FL9gljeueAlpcsT6BYXJ9+1f47n7R0v2jxJ4il6mbVNQkJ6ZL3krHae/AO08/yoA/LD4iEC8kycfMccDIPJ7cgE4+Y1zngrTNS13xBpGh6PbPeavrWpWWlaTZxSRLJd6hqN1FaWVojSuqI1xczJArSMsasyF3Q/PW/8RDm8cE5HmjvjkMTyOwH0rmPC11LY6jaXlrNNbXlrLBc2t1BI0E9tPbypJFcW88REsU8MyLLHIjK0cipIj9qAP3s/Z3/4JI/8FF/Gt+sPhj9mjxTq8tsEFwIPE/w6QwqGZSH87xjGcI67X+9txX1R8cv+Cd/7Zv7KvgW08d/tAfA7xN8PPB95qVpocHiDUNW8K6tYPq93DNNa2DP4d1/WZIZ7iO0uJI1uI41YRv8APXl//BKTR/2uv2r/AInXT67+1V8b/hr+zz8LtMbxl+0P8ZNS+L3jfT9A8B/DvSorq91SKPULnV5bCfxTrdlZXGn+GdJmjn+0ahIlzc2z2Ftc19rf8FG/+CiF5+1pfeCPg98MbzxVpv7LvwF09/DHww0/xZruqa54t8e3Nkq2M3xQ+JGrahe3V3rXibXbaCNrGO8kkXQ7O4uUtkhudS1LeAfhz8UkZYCuWbDA/KdoK/MBkdPzxnr9er/ZaBbxro45BOo2ZVeSQGuoh7DBx+fX25b4qtmF+cEgHHfaCcnp1O7/AD36/wDZXy3jnRM5wdSsxjBBwbuEg4Ynj8NtAH+u/wDCGLyPhP8ADGD/AJ4/D3wZF/378Oaan9K9ErhPhanl/DL4dR/3PAnhFP8Avnw/p6/0ru6ACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigDK16UQaHrM56Q6VqMp+kdnM5/QV/jtftBtnXdZYE/NeXbA5OCTO5Y5OcZGf0r/YX8YSiDwl4pnOCsPhzW5SD0Ij0y6c59iB6V/jwfHt/wDia6qfvfv7nPAGSZm7Ek9vvcfrQB+XvxCK/bXB+b5yRknB5fJxk46/k2axPA0GnXevaZZ6vdvpulz6jYQajqkcD3b2GnzXUUd5eraI6vctZ2zSXC28bK0zR+Wj4etj4gMRfMDx+8x0BBUFgPQEH72VH4Vm/D/QNR8T+JNF8OaQizar4h1jTdE02BmjiSfUNTvYbGzieWQrHEJLm4jjaaRljjVtz4RBQB/Xb8KfFH/BNDx18BfBn7NS/tt+OPgX8JfCkUGreKNC8FfBrxL4lvPi/wCMftkFyniTxheahb6JPdz212jahY6bNI2n2MjIltCiWGmx23MftN/Br/gnp8PPhno2qfss/tU/En43+P7vV7S0v/DPif4Tv4M0qy0Qw3RvNVl1iXUG2XkU0drDbafHb3XnLcO8k8Pk7H8a/Zi/4JEeDtf1V9A+IP8AwUQ/Y2+D3i3SorL+3PCXjvx3p2maxpeo3EUck2lzW9/rWmzm4tvNVt0lrC8kLJcomx0r6e/a2/4Jf65+yr8FNA+O/gr9or4G/tPfCjUPF5+H+ueLfgp4ktNdtPCfi+XTY9Y03RtXFvqF/FJNqOmtLcKtrcSXFmqwveW0MF5ZzTAH4i/FUlrd+SNxVeOOpI9hwB17/jXZfsrD/ittDA6nUrIHJIPN3CAQMkkc/Xqc5HPG/FX5rdhwGL52jnO1SDt9Sfvf4V3H7Kak+ONCUnI/tSxA3AnGL2EdOTjLbv8Aa9PUA/16Phuhj+HfgKM5yngvwshz1yuh2IOffIrtK5PwEhj8DeC42zuj8J+HUbPXK6PZqc9s5FdZQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAcX8SJTB8O/HswGTD4L8Uygepj0O+cD8SK/wAen48D/iZ6pycefP8ALyeBO3I57/hX+wJ8YpjbfCP4p3A6wfDjxvMPrF4Z1Rx+q1/j4/Hph/aWqYHBmmyCckgyOeOc/wDoPJ4oA/Mb4gN/xMGAJyZGYgcEAbsLzu9F/wCBdK6/9nIH/hdPwn2xlmPxM8CDccD/AJmjTByQPl5KndtrkfHoVr1+OVlY8g8ZZsdfu/w9ht/Oq/w58Uaj4N8XeGvFOmLDJfeGdd0jX9PS4Vnhe90jU7bUrZZ1jZHeEzQRpIqsrNGz/PmgD+i/w1+yzeftSftz/toaBbeNIPBh+FHw4+LXx2a8fQ5dd/ttPhb4DtvEY8LrDFq+lNZTayYDp66w0l4un7nuf7NvP+Pav0e8EMy/8EJ/iKJPm83/AIKAeH1Q5znyfgz4dJ6nPQr/AN9Zevir9nT/AIKvfBXw1o3x11ex/Yt8PaZ8bvj58GfHvwp1v4taZ8QtTa7tP+FheE7zw1qOpf2VeaLJbvArSWd3JaQta3VxFZiF7z968z+i+Pf23fDPij9hr4W/sb/DX4J6N8NtK0PxTZ/Ev4ueMo9f1bXNT+JvxNstAh8M2/iSG01CRovDkN1o9rbtqFjbzTWsl5Cn2OGzhV/tIB+P3xWz5GOjKygHHqrcY68gev5k16D+yWA3j3QEP8Wraegyec/bIBxknnJ7/wCxXn/xVP8Ao/AIIYdjyMH34AGf4dv1616F+yOSfHugcBiNX0/AOR0vYdo4wR/vH0oA/wBfPwgpTwn4XRuqeHdEU9uV022B47ciuirC8L5/4Rrw7u+//YWk7uMHP2C3zx25rdoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAPJ/j1P9m+BvxmuM48j4U/EOXPp5fhHV2z+GM1/j+fHZz/aN+MYHnTE5OODK5wDxtwfxr/Xr/aalMH7N/wAf5lbY0XwW+KMitzwyeCNbZTxz94Cv8hD46MG1G/5BzLcHrjP71jkHJxj0+agD8zvHh/06Q/dzJwTj5dxIO7qTwdyj+7V74M6Hp3in4meAfDesxzy6T4g8a+FdE1FLWUw3T6fqeuWFjerBMFfypjbTusc3lyeXIyP5frm+Ps/bpG3YHmEKOVwCCSeuGbPP6V0HwAu7Sz+Mfwqvb66gsLKz+I3gq9u727mjt7S0tLTxHp01xPdzysscUEESySTTSMqRxrI7uiYoA/p8+FGmf8EVPg18R/F3wy+Ofwl/a31XxP4J1l9BvLjwL4r0VtIuL21VxPNBLqfiiyuvs4V41TzLKJmd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f209Y8bw6r8LfEknirw7Fp998JNA0WCyn1ObTtLK6pFc+H7qa4tfJZYbW4snSZzM6IAfyqfFpsQtggHeM9TnJOc9OmV3cf7ea9l/YhRm+KvgYEZP/CUaECrYIIbVrUdD2z8vsBXjfxaI2MwAALL6Yz8wxgAgHI57e4zXt37DCGT4v+AouufFXh4Y28lW1i0BxxxkH9BQB/r4Lwqj/ZH8qdSAYAHoAPypaACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigD4+/4KCsU/Yc/azZTg/8ACgPigM4zw3hPU1PH0Jr/ACQ/jZtF7fjcM+dMM8Y4d89xjnjPb0r/AFsf+Cib+X+wn+1s2QP+LB/ElcnoA/hu+Q9j2b0r/JK+N0mb2/x8w8yXJKnORI3bA7nP5cUAfm9435vpAGBBfLHlfmXI6Mc/dH8O3r+WHoLFblGxsKkjdzlcYGR1+YH+XvW141JF62cDDnH1KtkAdMDGPrWHoZb7Sg2qclUbryGIJyMDP/AvagD70+Cer6hbzWhgvLpNrJnbcSruBDAYAcBuP4emPwr9/k/aM8A6j/wS70P9nKbxHe3Xxbtf2vPEXxVuNCnsdSkgh8B3vwm8IeGrHU01mSFtMZ5tc03ULVtPjuvt0fl/anto4Zkd/wCev4MnE8GQuCFzjHIKtjI4H93rmvvTTZGGnx4bBIHAyMDAHUHBOMfNQB4T8WGV4yTztkAODkAKX6g8Dj73vmvfv2CkV/jT8OVLfLJ4v8MoxA9dasAMkNjAz97sM+9fPfxWy0bccHarfQbyxzgen8IHzfr9C/sEkL8aPhztJ48ZeGQSMZ41uxGOCPXjG3H50Af68tFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQB8Sf8FJpDH+wP+1y46j4EePx2/i0WdO/H8X+elf5KXxs/4+74nr5svOf+mkoI5z1A/wC+hX+s9/wU3do/+Cfv7XTKSD/wpDxmMjqFayCNjrztY/U1/ku/Gts3t8OQBLIW5wM+Y2MjoM80AfnH41JN+3HG5uMHgqWI6gDtz796xdCJ+0p6bgTnHrkHB56+tbPjQg3z8ZfOB0+Xq230H3mz/u+tYWiEi7z64yD/ABZIGOo6Y3budv8Av0Afcnwcb97b4wPmTr8o6PnByO36nFfd2l5+wRMCBhFwAdwycA9Mkf8AAvu/WvhD4McyWylSuSmcZOB8/Gc8AAfL/jzX3fpaqLJCMEhFfntlRnB54P8AF+NAHg/xVbKsSAAWGQeMYBBII+9X0b+wKhb42fDcdQfGvhjgck51ywB47nn7vf6182/FogxN25GVAOWOTg8Dgcjd9fz+m/8Agnmok+O3wvXAAPjrwmjDkZD6/pyn8gf7v6dQD/XWooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAPgz/gqE/l/8E9v2uWyB/xZbxSnPA/eRwx4zzjO/bnsT1r/ACYvjTn7XqA+UYmlPr8vmuOo7fXHpX+sf/wVTcx/8E7f2uWBx/xaDWlz7PdWCH9GNf5NfxmcC7vRuzmWfPb+N8A8EAdf+A+lAH50+M8fb5c7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tLDBPzfexzwDgbQCMKfm9On4/fn/AASQXzP2wv2clIxj41/C84PIP/Fc6B39f+BfjQB/rB0UUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAH41f8F8ZRF/wTH+NpJwH174ZIffPj3Qzjj1C1/lnfFoqbi7LE4DyfqxwDjPp+Vf6kf8AwX/cp/wTH+MOP4/FPwwTv0/4TbS27An+Gv8ALY+LJX7RebR95nPBIwd5JP5g/wDAeDQB8C+JiP7Qn6Z3Hp6724yTyf8AOar6Jj7XFnccsuecD7wP8x/wL+VjxMuNQkPGMn/0NsfiT/8Arqro2TdQkknDr0YDOck9VOOR/u9qAPv34KDKW+AoA2HPJBwJB3xjILDd/er7csubPOQQFBIPqw5ywPAJ5xuPWvib4H5McBwWHyDBGehc8kYyAf5V9r2ocWfTClPl6jPcEAYHUf7S/rQB86fFSX5tpAOSBnjHyllxjn72VYfxfzr9CP8AgkJGJP2x/wBmtDj5vjd8LFGfU+O9BGMYJB4GOea/P34qRpguBkhlIO4YUkFgBk4AB9vT6V+hX/BHpfM/bN/ZnGCM/HL4VjHPUePNAOTjG4/RfT8AD/VyooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAPxQ/4OCpPL/wCCZXxVHeTxp8MIx7f8VbZyf+06/wAuH4tf6675OCznpnoxypOB/vf8B681/qH/APBww+3/AIJm/Ecc/P8AED4Yrx3x4h34/wDHK/y7Pi3nzbwnoDL75Ac4BO0hedzdu+fcA+DPEf8Ax+yluCWwPQ/Mx9cLVfRgPtUI5yroeo6lie5wMAfeqz4hBW+lXnl2zz69DzzkDkfw8celRaLH/pUWSTkjkEEA7h35x6e/vQB9/fBE4ihOefl2kZIPLAAcnO35l2//AF6+0bSQG1UfNkKBjdycLyMfcxg7f4vWvi/4KgiGHJ2sShDDgBgzNgkccZ52V9k2oZbcsQdxAbgnGQOWxg44+7/jQB88/FWXBVADjPQfd6sQeoyMHb90fK2K/Rb/AII7qR+2j+zIBxv+OvwnjzjPLePdAHHvk/hX5y/FkFpRk4BcHOBnocYzxnncvH8sV+j/APwRvOf22f2XkB+Zvjx8JODgjnx/4e7duD/3z6ZoA/1a6KKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigD8Pv8Ag4aRm/4Jn/EErn938RPhi7Ad1/t2RCP/AB/88V/l3/F3iW8HIAZx652lgDx1Jx6V/qYf8F/dNfUP+CZHxidEZjp/ij4Y37bV3FVXxtpdqW7Y/wCPvbu7bua/y0/jCu2W7XlTufJyP7+eQCd2SV7dsUAfA/iJj9ukYkZJIHB/vHg+552/rVfRTm7hznaGUn14cDAIJ2nB7/w+nGJfEZH26Xhh83fn+L8cc/Ljr3zVTR2Iu4jyMOMc47j0B7nI/wD1UAfoR8FseTbkfKHGNuScZDnqT3zlW+9+dfZdhIfJKrt27Rg5xjgEknnIIK/THpXxX8GJVW1tSTwqAtzlhjeTgZz0bCjr/KvtLTdjWkZVSEePgg5xgEsCMjB4+mM0AfPPxd2o+SADuByGypBYkY4XPA/2f5Cv0a/4IyKG/br/AGVk5+b48fCj5eCT/wAV5oB4zk9uO/rX5x/GHO9G5UqwBIPI+ZjgtgEn+9+VfpT/AMETdFubn9vj9lu9SUPEvxu+GMhhwW/1PjTRXJ5yoCrHu4VGXj8QD/VhooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAPzE/4LJ+Ep/GX/AATY/ag022iM01h4U0LxEIwu8mLw94z8OatdOAcf6mztbiZv7qRt6Cv8oT422EkF5fqVYMJZARg8Ycj0PBx0/wDr1/tJ+LvCXh3x74W8ReCfGGk2mveFfFmjal4e8Q6LfKz2mqaPq9pLZahZThWRwlxbTSxlo2jkjLB4nR0Vx/nRf8Fiv+CM/ij9k3x/f+JPC1pqfiP4HeMdRvp/BHjBbaSRtJee4muIfB/iq4gQW8HiGwtyq21wy28PiC0hmv7OFHhvLOzAP4ufEiFb+YDONxAz3GRjGDz9PvM351kaadtxESSAGU5B+7lgckHrX2h8SP2adVsrueSCK4VhuAPJUHadvBU5Gem1l96+a9T+F3izSXyLSSVQe2cjHTsB/n6UAfVPwd1OFYreMuB90FSFOVIfGQOclG2bdqjp1r7Z0bULeaxjQSogVehIA+6PlAGAeeWwf4ffFfkroN9498PNGtppwPlSKf3kLM38RxuD4CAH5mZW2/3Hr2TRviX8Z5USPS9K01SzlGE1pcTuMrgHIuY9o/u7fvf8AxQB9J/F2ZJHUK6HEgZuSCSSSRnGWUbv51+yf/Bv94W1DxX+31+zva6faS3g0zxxpviW8EKF/s2n+GbhNbu7qU8hYoYrINIzdv8AppX45fB/9n34+/H7xPo2jPpl3d3mrXlvZWen6Nps0l1eXFzKkUFvbQRm6nuLiZ5FVY0jaRmZEj5Oyv8ASD/4Idf8EfdJ/wCCf3gW4+LnxPsmuv2hvHmjtpn2S7khuR8PfCdxLFcPpcJj3Rx+INaeKGTWZI3ZrOzittN3pM+pI4B/QTRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFct408EeD/iP4Y1bwX498M6H4w8Ja9bG01jw74j0y01fSNRt96yItzY3sU0EjRSpHPbylPMtriOK4haOaKN16mvJ/GHi2YF9P0qZoolJS4uoyVklYHmOGQcrF2aRcGQfx7D84B/PH+2Z/wAG9P7M3j6W+1/4AfEe7+EPiG5kllbwV4ltrrxx4NleQSkQWd9bzR+JvDsYkdPmupfESrGoSG2T5K/Av4of8G9f7Ymhz3B8P+GPh/8AEO0jZwt34Q8d6NZmVNvylLLxmPCV9k427VtZPn7umXr+6S7lZ2YllJOc5POScZ9P84NYknmE8BvzDfqeCffp2+gB/n8aZ/wQY/be1PURaH4C3VkDIFa41LxZ4CsrRMnLs11N4nWNkC/xRs38s/ol+zZ/wbcfEjUdXsLr43/EL4e/CrQhNCb230b7X8QPEgQqxkWK10yOx8Po5O2MTN4kmVW+cQuibH/ru8q4OcBsdu+fXPHH6+5qaOO8QghJODkYU9Pb5SNv6fN0oA5z9jH/AIJwfsm/sYabBe/BvwjDrPi+S0NrdfEzxTLZa74sljkRBcQ6ddRWtvY6BbTbdslvo9nZySR/uLya5Ar9A6+TvD/iPVNGuFlgkkhzxJGQfLlXIYrJGwKMAP4h8y/8s3TmvpHw9r1tr1n58RVJ48C5gDZKMfuuvdo3wSrdsFexoA6CiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAydckeLSb1o2KuYtisDgqZGVMg/Rv8A64rwS7spGLHrn29zznOOle9a4u/TZk/vGMfk4P8AT6V5nNZZzwvPGe/vn8v8gcgHmsumyMxGBjB5x0Jzx09Kg/ss7hlARkdV4b0Gf/rdPxr0KTTxnoDgDjOPfGfp+HamCxOVBXAz1BB75ycc9f8APegDkrfS+B8q5znG3jvg/wA+3btWmmlgAHyxgj079CDg9fp/I11UViAOBk/kc5P/ANerQtFAAK4+pPJ9e/NAHAXGmgEHy14PBweMZ9DgdRn/APXXV+ClmstWg2HbHOTDIoyAyvgDcOhKtt2+n1q1NZhuw+nB45x26/j1rS0S38u/tDjG2eP+7jlwMcHNAHqdFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQBR1FC9qyjruT9DXKPbZOdvQAdz9ec9M12F2CYTj+8v86xXiwp4Pp1yTn8+1AHOG05Pyn1+6O+euBj/PTimfZenA4/2f5ccfrW/5Xs35f/Wo8r2b8v8A61AGStqAcAD2GOc/p/nFTLB6qP6fyzmtZYsqODke3T8PenhMDpnvkjP+R+P40AYEttn+Ecnj6DP1H/1/erWnW+26gbHSWPPPo6nj/P1rSMPqPTqv5df0qW2hCzRnAB3qeno4/L8uKAN+iiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAimGUIxnkcYzWe4yRxkY9M881pP0H1/oapUAV9n+z/47/8AWo2f7P8A47/9arFFAESLjORj2I/X9KkwPQfkKWplPy59Af0z/nr+VAFVwMDAGMn9f0x/9bFPiA3Icc7h/PFLUkX3x+H8xQBcooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAGuPl+hz/T+tVtg9T+n+FWX+6fw/mKhoAZsHqf0/wAKNg9T+n+FPooAZsHqf0/wpwGBilooAZsHqf0/wp6qAwI9R/OilXqPqP50AT0UUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFADX+6fw/mKhqZ/un8P5ioaACiiigAooooAKVeo+o/nSUq9R9R/OgCeiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAa/wB0/h/MVDRRQAUUUUAFFFFABSr1H1H86KKAJ6KKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA//Z');
INSERT INTO `tblstudentinfo` (`tblStudInfoId`, `tblStudInfoFname`, `tblStudInfoLname`, `tblStudInfoMname`, `tblStudInfoBday`, `tblStudInfoBplace`, `tblStudInfoGender`, `tblStudInfoAddBldg`, `tblStudInfoLang1`, `tblStudInfoLang2`, `tblStudInfoReligion`, `tblStudInfoNationality`, `tblStudInfoPrevSchool`, `tblStudInfo_tblStudentId`, `tblStudInfoFlag`, `tblStudInfoSiblingNo`, `tblStudInfoAddSt`, `tblStudInfoAddBrgy`, `tblStudInfoAddCity`, `tblStudInfoAddCountry`, `tblStudInfoImage`) VALUES
(3, 'Christian', 'Bataan', '', '2008-12-17', 'Quezon City', NULL, 'Unit 2', 'Tagalog', 'English', 'Catholic', 'Filipino', NULL, '17004', 1, NULL, 'Pag Asa Street', 'Brgy Damayan', 'Quezon City', 'Philippines', ''),
(4, 'Jm', 'Torreda', '', '2013-12-15', 'Quezon City', NULL, 'Bldg 2', 'Tagalog', 'English', 'Catholic', 'Filipino', NULL, '17005', 1, NULL, 'Rose Street', 'Brgy Bagong Nayon', 'Quezon City', 'Philippines', ''),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'data:image/jpg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD//gA7Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcgSlBFRyB2NjIpLCBxdWFsaXR5ID0gODIK/9sAQwAGBAQFBAQGBQUFBgYGBwkOCQkICAkSDQ0KDhUSFhYVEhQUFxohHBcYHxkUFB0nHR8iIyUlJRYcKSwoJCshJCUk/9sAQwEGBgYJCAkRCQkRJBgUGCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQk/8AAEQgBkAGQAwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A+qaKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACqeraxYaFYyX2pXUVrbR/ekkOB9B6n2rjPiF8YtF8EI9rEV1DVMHFvG3CH/bPb6dfpXzV4u8c6341vTdatdM4GfLhXiOIegFAHq/ij9peZLtofDmmwmBTjz7rJL+4UYx+Zp3hX9pWaW8WDxFp0KwOQPPtiQU9ypzn9K8D2n1pyqM96APuzTtStNWs472xuI7i3lGUkQ5BqzXyD8PPiZq3gO8BhY3Fk5Hm2rt8re49D719ReEvGWk+M9PF5pc4bAHmRMfnjPoR/WgDcooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiuA+IHxh0XwSj20TLf6nyBbxt8sZ/2z2+nWgDs9W1iw0KxkvtSuorW3j+88hwPoPU+1fP3xF+P15q3maf4a8yytOVa5JxLIPb+6P1rzrxh451rxpfG51W6Z1XPlwrxHGPQCudJz3oAdJK0jlnYszHJJPJppYdKaWzSGgBxPNKDUeeSaUnpmgCTfjoa1vDfirU/CupR3+mXLwyoecHhh6EdxWLmm5NAH158N/i1pfjqBbeUpaaooG6AtxJ7p/h/Ou9r4Os724srhJ7eR4pYzuVkOCCK+iPhd8dYdUEWk+JXWG5GFjvCcK/s/ofegD2migEMAQQQeQRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABVLV9ZsNCsZL7UrqO2to/vO5x+A9T7VxXxC+Mui+CVe0gK6hqmCBbxt8sZ/2z2+nX6V82+LfHGs+NL43Wq3bSAE+XEDiOMegFAHo/xD+Pt7rHmaf4b32Nmcq1yTiWUe390frXj0szOxZyWYnkk8moy3600tgdaAEY54pCaQt9KbnJz0oACcj60CjvQOB260ABBPSk7Y6079BRQAZ7CgKWxgU+NHlcIqlmY4AA5Jr3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0CoM+ufSmeNfhXq/xN1fTodLuUVoVZDE6E4yRlsjj0znHQUhnz/aWV9rmpJbW0c15e3UmFVQWeRyf1Nfa/wQ+AMfg/RIpNeVXupSJZYB0Zuwb2HQD6+uK6P4Q/Afw/8ACy1W4RFv9ZdcS3si8r6hB/CK9OoGIiLGoRFCqowABwBS0UUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAySIOMGsXVNJiuYnR4wwYdMVu010DDmk0B8ofGH4N3atLqWjR7stvaMDqa8ktTJaL5cyNG4zuVuCp7g1966hpqSoQUDA9Qa8E+MHwme9EmpaTGFmCncoH3qEwPFbO4Dyrg/wABP8q2bc7iK5fTobiyuJYbuJ4pYzsZG7e/6V0Vm+5hTAsSaJY3rBpraNm9StdP4a0e1s3HkQouPQVkQKSRzXTaIu0nnnFAM47X9D1jxVqOsXmmqJ5IoBbWQU5Cjo5BHRjlvyFYPhP4UAXMMl5NvkT5pcKDHCR2B/ib9B39D3KfDHw1Dqs+pGCctM5kaHziIsk5PyjqPY8V674K+GkusJHd6jGbTTlwY4VG1pB7eg96BGF4Q8FXfiBktdPi+z2MOFadhlVH/sx7/wA69s8PeGtP8NWn2eyj5bHmSt9+Qj1P9Kv2dnb2FultawpDDGMKiDAAqagYUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFACMoYVn3mnrMpyOK0aCM0rAeFfFT4VRaxbNeWEKx3cfOVHX2rwiG1n0+6a3uIzHIhwVP9K+5LixjnUgivNvHXwXt/EzfabN47e7HRyODQgPALdlOOfz4rqfD8MtzIsUEbyyOdqKgySa7XQ/2er0tnV9VihUHgWyly354x+teoeFPAej+EIz9iiaScjDTynLkeg7AfSmBg+DfhpFYlL/AFpVmueGS36pH9fU/p9a9AoooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigD//Z'),
(6, '', '', '', '0000-00-00', '', '', '', '', '', '', '', NULL, '17007', 1, NULL, '', '', '', 'Philippines', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudhealth`
--

CREATE TABLE `tblstudhealth` (
  `tblStudHealthId` int(11) NOT NULL,
  `tblStudHealthAllergies` varchar(225) DEFAULT NULL,
  `tblStudHealthIllness` varchar(225) DEFAULT NULL,
  `tblStudHealthMedication` varchar(225) DEFAULT NULL,
  `tblStudHealthBloodType` varchar(3) DEFAULT NULL,
  `tblStudHealthHospitalized` char(1) DEFAULT NULL,
  `tblStudHealthReason` varchar(225) DEFAULT NULL,
  `tblStudHealthDoctor` varchar(50) DEFAULT NULL,
  `tblStudHealthHospital` varchar(100) DEFAULT NULL,
  `tblStudHealthHospitalNo` varchar(11) DEFAULT NULL,
  `tblStudHealthHospAddBldg` varchar(25) DEFAULT NULL,
  `tblStudHealthFlag` int(11) DEFAULT '1',
  `tblStudHealth_tblStudentId` varchar(5) DEFAULT NULL,
  `tblStudHealthEmergency` char(1) DEFAULT 'Y',
  `tblStudHealthHospAddSt` varchar(25) DEFAULT NULL,
  `tblStudHealthHospAddBrgy` varchar(25) DEFAULT NULL,
  `tblStudHealthHospAddCity` varchar(25) DEFAULT NULL,
  `tblStudHealthHospAddCountry` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstudhealth`
--

INSERT INTO `tblstudhealth` (`tblStudHealthId`, `tblStudHealthAllergies`, `tblStudHealthIllness`, `tblStudHealthMedication`, `tblStudHealthBloodType`, `tblStudHealthHospitalized`, `tblStudHealthReason`, `tblStudHealthDoctor`, `tblStudHealthHospital`, `tblStudHealthHospitalNo`, `tblStudHealthHospAddBldg`, `tblStudHealthFlag`, `tblStudHealth_tblStudentId`, `tblStudHealthEmergency`, `tblStudHealthHospAddSt`, `tblStudHealthHospAddBrgy`, `tblStudHealthHospAddCity`, `tblStudHealthHospAddCountry`) VALUES
(1, 'Seafoods', '', '', 'A', 'N', '', '', '', '', '', 1, '17002', 'N', '', '', '', ''),
(2, '', '', '', 'A', 'Y', '', '', '', '', '', 1, '17003', 'Y', '', '', '', 'Philippines'),
(3, '', '', '', 'A', 'Y', '', '', '', '', '', 1, '17004', 'Y', '', '', '', 'Philippines'),
(4, '', '', '', 'A', 'Y', '', '', '', '', '', 1, '17005', 'Y', '', '', '', 'Philippines'),
(5, '', '', '', 'A', 'Y', '', '', '', '', '', 1, '17006', 'Y', '', '', '', 'Philippines'),
(6, '', '', '', 'A', 'Y', '', '', '', '', '', 1, '17007', 'Y', '', '', '', 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudliveswith`
--

CREATE TABLE `tblstudliveswith` (
  `tblLivesWithId` int(11) NOT NULL,
  `tblLivesWithPerson` varchar(50) DEFAULT NULL,
  `tblLivesWith_tblStudentId` varchar(5) DEFAULT NULL,
  `tblLivesWithFlag` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstudliveswith`
--

INSERT INTO `tblstudliveswith` (`tblLivesWithId`, `tblLivesWithPerson`, `tblLivesWith_tblStudentId`, `tblLivesWithFlag`) VALUES
(1, 'Relative/s', '17002', 1),
(2, 'Father and Mother', '17004', 1),
(3, 'Father', '17005', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudrelative`
--

CREATE TABLE `tblstudrelative` (
  `tblStudRelId` int(11) NOT NULL,
  `tblStudRelName` varchar(50) DEFAULT NULL,
  `tblStudRelAge` int(11) DEFAULT NULL,
  `tblStudRelRelation` varchar(50) DEFAULT NULL,
  `tblStudRel_tblStudentId` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstudrelative`
--

INSERT INTO `tblstudrelative` (`tblStudRelId`, `tblStudRelName`, `tblStudRelAge`, `tblStudRelRelation`, `tblStudRel_tblStudentId`) VALUES
(2, '', 0, '', '17002'),
(3, '', 0, '', '17003'),
(4, '', 0, '', '17004'),
(5, '', 0, '', '17005'),
(6, '', 0, '', '17006'),
(7, '', 0, '', '17007');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudreq`
--

CREATE TABLE `tblstudreq` (
  `tblStudReqId` int(11) NOT NULL,
  `tblStudReq_tblStudentId` varchar(5) DEFAULT NULL,
  `tblStudReq_tblReqId` int(11) DEFAULT NULL,
  `tblStudReqStatus` char(1) DEFAULT NULL,
  `tblStudReqFlag` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstudreq`
--

INSERT INTO `tblstudreq` (`tblStudReqId`, `tblStudReq_tblStudentId`, `tblStudReq_tblReqId`, `tblStudReqStatus`, `tblStudReqFlag`) VALUES
(1, '17002', 1, 'Y', 1),
(2, '17002', 2, NULL, 1),
(3, '17003', 1, 'Y', 1),
(4, '17003', 2, NULL, 1),
(5, '17003', 3, 'Y', 1),
(6, '17004', 1, 'Y', 1),
(7, '17004', 2, NULL, 1),
(8, '17004', 3, 'Y', 1),
(9, '17005', 1, 'Y', 1),
(10, '17005', 2, NULL, 1),
(11, '17005', 3, 'Y', 1),
(12, '17006', 1, NULL, 1),
(13, '17006', 2, NULL, 1),
(14, '17006', 3, NULL, 1),
(15, '17006', 4, NULL, 1),
(16, '17006', 5, NULL, 1),
(17, '17006', 6, NULL, 1),
(18, '17007', 1, NULL, 1),
(19, '17007', 2, NULL, 1),
(20, '17007', 3, NULL, 1),
(21, '17007', 4, NULL, 1),
(22, '17007', 5, 'Y', 1),
(23, '17007', 6, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudscheme`
--

CREATE TABLE `tblstudscheme` (
  `tblStudSchemeId` int(11) NOT NULL,
  `tblStudScheme_tblSchemeId` int(11) DEFAULT NULL,
  `tblStudScheme_tblFeeId` int(11) DEFAULT NULL,
  `tblStudScheme_tblStudentId` varchar(5) DEFAULT NULL,
  `tblStudSchemeFlag` tinyint(4) DEFAULT '1',
  `tblStudScheme_tblSchoolYrId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstudscheme`
--

INSERT INTO `tblstudscheme` (`tblStudSchemeId`, `tblStudScheme_tblSchemeId`, `tblStudScheme_tblFeeId`, `tblStudScheme_tblStudentId`, `tblStudSchemeFlag`, `tblStudScheme_tblSchoolYrId`) VALUES
(1, 1, 1, '17002', 1, 1),
(51, NULL, 3, '17002', 1, 1),
(52, 2, 2, '17002', 1, 1),
(53, NULL, 4, '17002', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudsiblings`
--

CREATE TABLE `tblstudsiblings` (
  `tblStudSibId` int(11) NOT NULL,
  `tblStudSibName` varchar(100) DEFAULT NULL,
  `tblStudSibLname` varchar(50) DEFAULT NULL,
  `tblStudSibMname` varchar(50) DEFAULT NULL,
  `tblStudSibAge` varchar(2) DEFAULT NULL,
  `tblStudSib_tblStudId` varchar(5) DEFAULT NULL,
  `tblStudSibGrade` varchar(15) DEFAULT NULL,
  `tblStudSibSchool` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstudsiblings`
--

INSERT INTO `tblstudsiblings` (`tblStudSibId`, `tblStudSibName`, `tblStudSibLname`, `tblStudSibMname`, `tblStudSibAge`, `tblStudSib_tblStudId`, `tblStudSibGrade`, `tblStudSibSchool`) VALUES
(3, 'Lee Ann Nicole', NULL, NULL, '17', '17002', 'Grade 11', 'Abada'),
(4, '', NULL, NULL, '', '17003', '', ''),
(5, '', NULL, NULL, '', '17004', '', ''),
(6, '', NULL, NULL, '', '17005', '', ''),
(7, '', NULL, NULL, '', '17006', '', ''),
(8, '', NULL, NULL, '', '17007', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `tblSubjectId` varchar(8) NOT NULL,
  `tblSubjectDesc` varchar(100) DEFAULT NULL,
  `tblSubjectFlag` tinyint(1) DEFAULT '1',
  `tblSubjActive` varchar(10) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`tblSubjectId`, `tblSubjectDesc`, `tblSubjectFlag`, `tblSubjActive`) VALUES
('ENG', 'ENGLISH', 1, 'ACTIVE'),
('FIL', 'FILIPINO', 1, 'ACTIVE'),
('MATH', 'MATHEMATICS', 1, 'ACTIVE'),
('SCI', 'SCIENCE', 1, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `tblUserId` int(11) NOT NULL,
  `tblUserName` varchar(50) DEFAULT NULL,
  `tblUserPassword` varchar(20) DEFAULT NULL,
  `tblUser_tblRoleId` int(11) DEFAULT NULL,
  `tblUserFlag` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`tblUserId`, `tblUserName`, `tblUserPassword`, `tblUser_tblRoleId`, `tblUserFlag`) VALUES
(1, 'F-17001', 'admin', 1, 1),
(2, 'F-17002', 'teacher', 3, 1),
(3, 'P-17007', '123456', 0, 1),
(4, 'P-17005', '234567', 1, 1),
(5, 'P-17001', 'qwerty', 1, 1),
(6, 'P-17002', 'sdasd', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studdismisswithdraw`
--
ALTER TABLE `studdismisswithdraw`
  ADD PRIMARY KEY (`tblStudDismissId`),
  ADD KEY `fk_tblStudDismiss_tblStudentId` (`tblStudDismiss_tblStudentId`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`tblAccId`),
  ADD KEY `fk_tblAcc_tblStudentId` (`tblAcc_tblStudentId`),
  ADD KEY `fk_tblAcc_tblStudSchemeId` (`tblAcc_tblStudSchemeId`);

--
-- Indexes for table `tblcheck`
--
ALTER TABLE `tblcheck`
  ADD PRIMARY KEY (`tblChkId`);

--
-- Indexes for table `tblcurriculum`
--
ALTER TABLE `tblcurriculum`
  ADD PRIMARY KEY (`tblCurriculumId`);

--
-- Indexes for table `tblcurriculumdetail`
--
ALTER TABLE `tblcurriculumdetail`
  ADD PRIMARY KEY (`tblCurriculumDetailId`),
  ADD KEY `fk_tblCurriculumDetail_tblDivisionId` (`tblCurriculumDetail_tblDivisionId`),
  ADD KEY `fk_tblCurriculumDetail_tblLevelId` (`tblCurriculumDetail_tblLevelId`),
  ADD KEY `fk_tblCurriculumDetail_tblSubjectId` (`tblCurriculumDetail_tblSubjectId`),
  ADD KEY `fk_tblCurriculumDetail_tblCurriculumId` (`tblCurriculumDetail_tblCurriculumId`);

--
-- Indexes for table `tbldivision`
--
ALTER TABLE `tbldivision`
  ADD PRIMARY KEY (`tblDivisionId`);

--
-- Indexes for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  ADD PRIMARY KEY (`tblFacultyId`),
  ADD KEY `fk_tblFaculty_tblUserId` (`tblFaculty_tblUserId`);

--
-- Indexes for table `tblfee`
--
ALTER TABLE `tblfee`
  ADD PRIMARY KEY (`tblFeeId`);

--
-- Indexes for table `tblfeeamount`
--
ALTER TABLE `tblfeeamount`
  ADD PRIMARY KEY (`tblFeeAmountId`),
  ADD KEY `fk_tblFeeAmount_tblFeeId` (`tblFeeAmount_tblFeeId`),
  ADD KEY `fk_tblFeeAmount_tblLevelId` (`tblFeeAmount_tblLevelId`);

--
-- Indexes for table `tblfeedetail`
--
ALTER TABLE `tblfeedetail`
  ADD PRIMARY KEY (`tblFeeDetailId`),
  ADD KEY `fk_tblFeeDetail_tblFeeId` (`tblFeeDetail_tblFeeId`),
  ADD KEY `fk_tblFeeDetail_tblLevelId` (`tblFeeDetail_tblLevelId`);

--
-- Indexes for table `tblgrade`
--
ALTER TABLE `tblgrade`
  ADD PRIMARY KEY (`tblGradeId`),
  ADD KEY `fk_tblGrade_tblStudentId` (`tblGrade_tblStudentId`),
  ADD KEY `fk_tblGrade_tblSubjectId` (`tblGrade_tblSubjectId`),
  ADD KEY `fk_tblGrade_tblGradingId` (`tblGrade_tblGradingId`);

--
-- Indexes for table `tblgradeave`
--
ALTER TABLE `tblgradeave`
  ADD PRIMARY KEY (`tblGenAveId`),
  ADD KEY `fk_tblGenAve_tblStudentId` (`tblGenAve_tblStudentId`),
  ADD KEY `fk_tblGenAve_tblGradingId` (`tblGenAve_tblGradingId`),
  ADD KEY `fk_tblGenAve_tblSchoolYrId` (`tblGenAve_tblSchoolYrId`);

--
-- Indexes for table `tblgradingperiod`
--
ALTER TABLE `tblgradingperiod`
  ADD PRIMARY KEY (`tblGradingId`),
  ADD KEY `fk_tblGrading_tblSchoolYrId` (`tblGrading_tblSchoolYrId`);

--
-- Indexes for table `tbllevel`
--
ALTER TABLE `tbllevel`
  ADD PRIMARY KEY (`tblLevelId`),
  ADD KEY `fk_tblLevel_tblDivisionId` (`tblLevel_tblDivisionId`);

--
-- Indexes for table `tbllevelsubject`
--
ALTER TABLE `tbllevelsubject`
  ADD PRIMARY KEY (`tblLvlSubjId`),
  ADD KEY `fk_tblLvlSubj_tblLevelId` (`tblLvlSubj_tblLevelId`),
  ADD KEY `fk_tblLvlSubj_tblSubjectId` (`tblLvlSubj_tblSubjectId`);

--
-- Indexes for table `tblmessage`
--
ALTER TABLE `tblmessage`
  ADD PRIMARY KEY (`tblMessageId`),
  ADD KEY `fk_tblMessage_tblParentId` (`tblMessage_tblParentId`),
  ADD KEY `fk_tblMessage_tblFacultyId` (`tblMessage_tblFacultyId`);

--
-- Indexes for table `tblmodule`
--
ALTER TABLE `tblmodule`
  ADD PRIMARY KEY (`tblModuleId`);

--
-- Indexes for table `tblparent`
--
ALTER TABLE `tblparent`
  ADD PRIMARY KEY (`tblParentId`),
  ADD KEY `fk_tblParent_tblUserId` (`tblParent_tblUserId`);

--
-- Indexes for table `tblparentstatus`
--
ALTER TABLE `tblparentstatus`
  ADD PRIMARY KEY (`tblParentStatId`),
  ADD KEY `fk_tblParentStat_tblStudentId` (`tblParentStat_tblStudentId`);

--
-- Indexes for table `tblparentstudent`
--
ALTER TABLE `tblparentstudent`
  ADD PRIMARY KEY (`tblParStudId`),
  ADD KEY `fk_tblParStud_tblParentId` (`tblParStud_tblParentId`),
  ADD KEY `fk_tblParStud_tblStudentId` (`tblParStud_tblStudentId`);

--
-- Indexes for table `tblrequirement`
--
ALTER TABLE `tblrequirement`
  ADD PRIMARY KEY (`tblReqId`);

--
-- Indexes for table `tblrole`
--
ALTER TABLE `tblrole`
  ADD PRIMARY KEY (`tblRoleId`);

--
-- Indexes for table `tblrolemodule`
--
ALTER TABLE `tblrolemodule`
  ADD PRIMARY KEY (`tblRoleModuleId`),
  ADD KEY `fk_tblRoleModule_tblRoleId` (`tblRoleModule_tblRoleId`),
  ADD KEY `fk_tblRoleModule_tblModuleId` (`tblRoleModule_tblModuleId`);

--
-- Indexes for table `tblscheme`
--
ALTER TABLE `tblscheme`
  ADD PRIMARY KEY (`tblSchemeId`),
  ADD KEY `fk_tblScheme_tblFeeId` (`tblScheme_tblFeeId`);

--
-- Indexes for table `tblschemedetail`
--
ALTER TABLE `tblschemedetail`
  ADD PRIMARY KEY (`tblSchemeDetailId`),
  ADD KEY `fk_tblSchemeDetail_tblLevel` (`tblSchemeDetail_tblLevel`),
  ADD KEY `fk_ttblSchemeDetail_tblScheme` (`tblSchemeDetail_tblScheme`),
  ADD KEY `fk_tblSchemeDetail_tblSchemeDetail_tblFee` (`tblSchemeDetail_tblFee`);

--
-- Indexes for table `tblschoolyear`
--
ALTER TABLE `tblschoolyear`
  ADD PRIMARY KEY (`tblSchoolYrId`),
  ADD KEY `fk_tblSchoolYr_tblCurriculumId` (`tblSchoolYr_tblCurriculumId`);

--
-- Indexes for table `tblsection`
--
ALTER TABLE `tblsection`
  ADD PRIMARY KEY (`tblSectionId`),
  ADD KEY `fk_tblSection_tblFacultyId` (`tblSection_tblFacultyId`);

--
-- Indexes for table `tblsectionstud`
--
ALTER TABLE `tblsectionstud`
  ADD PRIMARY KEY (`tblSectStudId`),
  ADD KEY `fk_tblSectStud_tblSectionId` (`tblSectStud_tblSectionId`),
  ADD KEY `fk_tblSectStud_tblStudentId` (`tblSectStud_tblStudentId`),
  ADD KEY `fk_tblSectStud_tblSchoolYrId` (`tblSectStud_tblSchoolYrId`);

--
-- Indexes for table `tblstudemergency`
--
ALTER TABLE `tblstudemergency`
  ADD PRIMARY KEY (`tblStudEmId`),
  ADD KEY `fk_tblStudEm_tblStudentId` (`tblStudEm_tblStudentId`);

--
-- Indexes for table `tblstudenroll`
--
ALTER TABLE `tblstudenroll`
  ADD PRIMARY KEY (`tblStudEnrollId`),
  ADD KEY `fk_tblStudEnroll_tblStudentId` (`tblStudEnroll_tblStudentId`),
  ADD KEY `fk_tblStudEnroll_tblSchoolYrId` (`tblStudEnroll_tblSchoolYrId`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`tblStudentId`),
  ADD KEY `fk_tblStudent_tblSectionId` (`tblStudent_tblSectionId`),
  ADD KEY `fk_tblStudent_tblLevelId` (`tblStudent_tblLevelId`);

--
-- Indexes for table `tblstudentinfo`
--
ALTER TABLE `tblstudentinfo`
  ADD PRIMARY KEY (`tblStudInfoId`),
  ADD KEY `fk_tblStudInfo_tblStudentId` (`tblStudInfo_tblStudentId`);

--
-- Indexes for table `tblstudhealth`
--
ALTER TABLE `tblstudhealth`
  ADD PRIMARY KEY (`tblStudHealthId`),
  ADD KEY `fk_tblStudHealth_tblStudentId` (`tblStudHealth_tblStudentId`);

--
-- Indexes for table `tblstudliveswith`
--
ALTER TABLE `tblstudliveswith`
  ADD PRIMARY KEY (`tblLivesWithId`),
  ADD KEY `fk_tblLivesWith_tblStudentId` (`tblLivesWith_tblStudentId`);

--
-- Indexes for table `tblstudrelative`
--
ALTER TABLE `tblstudrelative`
  ADD PRIMARY KEY (`tblStudRelId`),
  ADD KEY `fk_tblStudRel_tblStudentId` (`tblStudRel_tblStudentId`);

--
-- Indexes for table `tblstudreq`
--
ALTER TABLE `tblstudreq`
  ADD PRIMARY KEY (`tblStudReqId`),
  ADD KEY `fk_tblStudReq_tblStudentId` (`tblStudReq_tblStudentId`),
  ADD KEY `fk_tblStudReq_tblReqId` (`tblStudReq_tblReqId`);

--
-- Indexes for table `tblstudscheme`
--
ALTER TABLE `tblstudscheme`
  ADD PRIMARY KEY (`tblStudSchemeId`),
  ADD KEY `fk_tblStudScheme_tblFeeId` (`tblStudScheme_tblFeeId`),
  ADD KEY `fk_tblStudScheme_tblSchemeId` (`tblStudScheme_tblSchemeId`),
  ADD KEY `fk_tblStudScheme_tblStudentId` (`tblStudScheme_tblStudentId`),
  ADD KEY `fk_tblStudScheme_tblSchoolYrId` (`tblStudScheme_tblSchoolYrId`);

--
-- Indexes for table `tblstudsiblings`
--
ALTER TABLE `tblstudsiblings`
  ADD PRIMARY KEY (`tblStudSibId`),
  ADD KEY `fk_tblStudSib_tblStudId` (`tblStudSib_tblStudId`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`tblSubjectId`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`tblUserId`),
  ADD KEY `fk_tblUser_tblRoleId` (`tblUser_tblRoleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studdismisswithdraw`
--
ALTER TABLE `studdismisswithdraw`
  MODIFY `tblStudDismissId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `tblAccId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcheck`
--
ALTER TABLE `tblcheck`
  MODIFY `tblChkId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcurriculum`
--
ALTER TABLE `tblcurriculum`
  MODIFY `tblCurriculumId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcurriculumdetail`
--
ALTER TABLE `tblcurriculumdetail`
  MODIFY `tblCurriculumDetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbldivision`
--
ALTER TABLE `tbldivision`
  MODIFY `tblDivisionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblfee`
--
ALTER TABLE `tblfee`
  MODIFY `tblFeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblfeeamount`
--
ALTER TABLE `tblfeeamount`
  MODIFY `tblFeeAmountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblfeedetail`
--
ALTER TABLE `tblfeedetail`
  MODIFY `tblFeeDetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblgrade`
--
ALTER TABLE `tblgrade`
  MODIFY `tblGradeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblgradeave`
--
ALTER TABLE `tblgradeave`
  MODIFY `tblGenAveId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblgradingperiod`
--
ALTER TABLE `tblgradingperiod`
  MODIFY `tblGradingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbllevel`
--
ALTER TABLE `tbllevel`
  MODIFY `tblLevelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbllevelsubject`
--
ALTER TABLE `tbllevelsubject`
  MODIFY `tblLvlSubjId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblmessage`
--
ALTER TABLE `tblmessage`
  MODIFY `tblMessageId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblmodule`
--
ALTER TABLE `tblmodule`
  MODIFY `tblModuleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblparentstatus`
--
ALTER TABLE `tblparentstatus`
  MODIFY `tblParentStatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblparentstudent`
--
ALTER TABLE `tblparentstudent`
  MODIFY `tblParStudId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblrequirement`
--
ALTER TABLE `tblrequirement`
  MODIFY `tblReqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblrole`
--
ALTER TABLE `tblrole`
  MODIFY `tblRoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblrolemodule`
--
ALTER TABLE `tblrolemodule`
  MODIFY `tblRoleModuleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tblscheme`
--
ALTER TABLE `tblscheme`
  MODIFY `tblSchemeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblschemedetail`
--
ALTER TABLE `tblschemedetail`
  MODIFY `tblSchemeDetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblschoolyear`
--
ALTER TABLE `tblschoolyear`
  MODIFY `tblSchoolYrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblsection`
--
ALTER TABLE `tblsection`
  MODIFY `tblSectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblsectionstud`
--
ALTER TABLE `tblsectionstud`
  MODIFY `tblSectStudId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblstudemergency`
--
ALTER TABLE `tblstudemergency`
  MODIFY `tblStudEmId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblstudenroll`
--
ALTER TABLE `tblstudenroll`
  MODIFY `tblStudEnrollId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblstudentinfo`
--
ALTER TABLE `tblstudentinfo`
  MODIFY `tblStudInfoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblstudhealth`
--
ALTER TABLE `tblstudhealth`
  MODIFY `tblStudHealthId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblstudliveswith`
--
ALTER TABLE `tblstudliveswith`
  MODIFY `tblLivesWithId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblstudrelative`
--
ALTER TABLE `tblstudrelative`
  MODIFY `tblStudRelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblstudreq`
--
ALTER TABLE `tblstudreq`
  MODIFY `tblStudReqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblstudscheme`
--
ALTER TABLE `tblstudscheme`
  MODIFY `tblStudSchemeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tblstudsiblings`
--
ALTER TABLE `tblstudsiblings`
  MODIFY `tblStudSibId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblgrade`
--
ALTER TABLE `tblgrade`
  ADD CONSTRAINT `fk_tblGrade_tblGradingId` FOREIGN KEY (`tblGrade_tblGradingId`) REFERENCES `tblgradingperiod` (`tblGradingId`);

--
-- Constraints for table `tblgradeave`
--
ALTER TABLE `tblgradeave`
  ADD CONSTRAINT `fk_tblGenAve_tblGradingId` FOREIGN KEY (`tblGenAve_tblGradingId`) REFERENCES `tblgradingperiod` (`tblGradingId`),
  ADD CONSTRAINT `fk_tblGenAve_tblSchoolYrId` FOREIGN KEY (`tblGenAve_tblSchoolYrId`) REFERENCES `tblschoolyear` (`tblSchoolYrId`),
  ADD CONSTRAINT `fk_tblGenAve_tblStudentId` FOREIGN KEY (`tblGenAve_tblStudentId`) REFERENCES `tblstudent` (`tblStudentId`);

--
-- Constraints for table `tbllevelsubject`
--
ALTER TABLE `tbllevelsubject`
  ADD CONSTRAINT `fk_tblLvlSubj_tblLevelId` FOREIGN KEY (`tblLvlSubj_tblLevelId`) REFERENCES `tbllevel` (`tblLevelId`),
  ADD CONSTRAINT `fk_tblLvlSubj_tblSubjectId` FOREIGN KEY (`tblLvlSubj_tblSubjectId`) REFERENCES `tblsubject` (`tblSubjectId`);

--
-- Constraints for table `tblrolemodule`
--
ALTER TABLE `tblrolemodule`
  ADD CONSTRAINT `fk_tblRoleModule_tblModuleId` FOREIGN KEY (`tblRoleModule_tblModuleId`) REFERENCES `tblmodule` (`tblModuleId`),
  ADD CONSTRAINT `fk_tblRoleModule_tblRoleId` FOREIGN KEY (`tblRoleModule_tblRoleId`) REFERENCES `tblrole` (`tblRoleId`);

--
-- Constraints for table `tblschemedetail`
--
ALTER TABLE `tblschemedetail`
  ADD CONSTRAINT `fk_tblSchemeDetail_tblLevel` FOREIGN KEY (`tblSchemeDetail_tblLevel`) REFERENCES `tbllevel` (`tblLevelId`),
  ADD CONSTRAINT `fk_ttblSchemeDetail_tblFee` FOREIGN KEY (`tblSchemeDetail_tblFee`) REFERENCES `tblfee` (`tblFeeId`),
  ADD CONSTRAINT `fk_ttblSchemeDetail_tblScheme` FOREIGN KEY (`tblSchemeDetail_tblScheme`) REFERENCES `tblscheme` (`tblSchemeId`);

--
-- Constraints for table `tblstudemergency`
--
ALTER TABLE `tblstudemergency`
  ADD CONSTRAINT `fk_tblStudEm_tblStudentId` FOREIGN KEY (`tblStudEm_tblStudentId`) REFERENCES `tblstudent` (`tblStudentId`);

--
-- Constraints for table `tblstudenroll`
--
ALTER TABLE `tblstudenroll`
  ADD CONSTRAINT `fk_tblStudEnroll_tblSchoolYrId` FOREIGN KEY (`tblStudEnroll_tblSchoolYrId`) REFERENCES `tblschoolyear` (`tblSchoolYrId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
