-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2026 at 09:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tajale_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni_details`
--

CREATE TABLE `alumni_details` (
  `AlumniID` int(11) NOT NULL,
  `InstitutionName` varchar(255) NOT NULL,
  `Degree` varchar(100) NOT NULL,
  `FieldOfStudy` varchar(100) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `S_ID` int(11) DEFAULT NULL,
  `AddedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni_details`
--

INSERT INTO `alumni_details` (`AlumniID`, `InstitutionName`, `Degree`, `FieldOfStudy`, `StartDate`, `EndDate`, `logo`, `description`, `S_ID`, `AddedBy`) VALUES
(6, 'PIES DIGITAL', 'MIT', 'SYSTEM DEVELOPMENT', '2024-06-26', '2024-06-25', 'image/csr-scc.png', 'Avtech Solution', NULL, 1),
(8, 'Diocese of San Carlos', 'DOSC', 'Church System', '2022-01-01', '2024-06-25', 'image/1.png', 'Smart Diocese App', NULL, 1),
(10, 'Tanon State', 'MIT', 'Church System', '2025-01-30', '2025-01-16', 'image/Teacher-male512_44209.png', 'pataka', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblclassroom`
--

CREATE TABLE `tblclassroom` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclassroom`
--

INSERT INTO `tblclassroom` (`id`, `name`, `description`) VALUES
(1, 'asas', 'adad'),
(2, 'czc', 'czczc');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourses`
--

CREATE TABLE `tblcourses` (
  `COURSE_ID` int(11) NOT NULL,
  `COURSE_CODE` varchar(20) NOT NULL,
  `COURSE_NAME` varchar(150) NOT NULL,
  `COURSE_DESC` text DEFAULT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblcourses`
--

INSERT INTO `tblcourses` (`COURSE_ID`, `COURSE_CODE`, `COURSE_NAME`, `COURSE_DESC`, `STATUS`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology', 'Information Technology program', 'Active'),
(2, 'BSTM', 'Bachelor of Science in Tourism Management', 'Tourism Management program', 'Active'),
(3, 'BSED', 'Bachelor of Secondary Education', 'Secondary Education program', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`id`, `name`, `description`) VALUES
(2, 'wwdw', 'dwdwd'),
(3, 'asas', 'asas'),
(4, 'fff', 'fsdfsfs'),
(5, '766868', 'trttr');

-- --------------------------------------------------------

--
-- Table structure for table `tbldoctors`
--

CREATE TABLE `tbldoctors` (
  `DOCTOR_ID` int(11) NOT NULL,
  `UID` int(11) DEFAULT NULL COMMENT 'Optional link to tblusers, for a Doctor-type login account',
  `FULLNAME` varchar(150) NOT NULL,
  `SPECIALIZATION` varchar(150) DEFAULT NULL,
  `LICENSE_NO` varchar(60) DEFAULT NULL,
  `CONTACT_NO` varchar(40) DEFAULT NULL,
  `SCHEDULE_DAYS` varchar(100) DEFAULT NULL,
  `SCHEDULE_TIME` varchar(100) DEFAULT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT 'Active',
  `ADDEDBY` int(11) DEFAULT NULL,
  `DATEADDED` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbldoctors`
--

INSERT INTO `tbldoctors` (`DOCTOR_ID`, `UID`, `FULLNAME`, `SPECIALIZATION`, `LICENSE_NO`, `CONTACT_NO`, `SCHEDULE_DAYS`, `SCHEDULE_TIME`, `STATUS`, `ADDEDBY`, `DATEADDED`) VALUES
(2, 81, 'Sora', 'wrw', 'rwt', 'etet', 'dsftet', 'rwr', 'Active', 1, '2026-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `EmployeeID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `HireDate` date NOT NULL,
  `JobTitle` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Salary` decimal(10,2) NOT NULL,
  `ManagerID` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `Suffix` varchar(10) DEFAULT NULL,
  `PhotoPath` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) GENERATED ALWAYS AS (trim(concat_ws(' ',`FirstName`,nullif(`MiddleName`,''),`LastName`,nullif(`Suffix`,'')))) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`EmployeeID`, `FirstName`, `LastName`, `Email`, `Phone`, `DateOfBirth`, `HireDate`, `JobTitle`, `Department`, `Salary`, `ManagerID`, `IsActive`, `MiddleName`, `Suffix`, `PhotoPath`) VALUES
(5, 'JACK', 'ABADIES', '123@GMAIL.COM', '09852114503', '1996-12-12', '2006-12-16', 'ceo', 'HR', 1000.00, NULL, 0, 'P.', NULL, 'uploads/employees/emp_1789965445_8106.jpg'),
(6, 'SAMMY', 'SIEBADAj', 'SAM@GMAIL.COM', '095864515654', '2003-12-12', '2024-12-16', 'CEO', 'HR', 25000.00, 5, 1, 'P.', NULL, ''),
(7, 'jay', 'mar', 'jay@gmail.com', '626246456', '2007-12-10', '2008-12-10', 'hahah', 'agaga', 5245.00, 6, 1, 's', 'Jr.', NULL),
(8, 'Honey', 'Carasaquit', 'han@gmail.com', '09207956964', '2006-02-04', '2007-12-05', 'Accountant', 'IU', 18000.00, 5, 1, 'P.', NULL, ''),
(9, 's', 'z', 'yen2@gmail.com', '89', '2003-12-01', '2003-12-02', 'doctor', 'c', 2000.00, 8, 1, 'h', NULL, ''),
(10, '4884', '965945', 'jkg@gmail.com', '911', '1996-12-12', '2000-12-06', 'fire man', 'fmr', 4500.00, 5, 0, '515', 'Sr.', 'uploads/employees/emp_1789968744_4162.jpg'),
(11, 'JESSON', 'BATUTO', 'jbatuto@gmail.com', '091234567898', '1995-01-25', '2000-02-15', 'Doctor', 'Radiology', 45000.00, 8, 0, 'P.', 'Sr.', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblenrollment`
--

CREATE TABLE `tblenrollment` (
  `ENROLLMENT_ID` int(11) NOT NULL,
  `S_ID` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `SECTION_ID` int(11) DEFAULT NULL,
  `SY_ID` int(11) NOT NULL,
  `YEAR_LEVEL` varchar(20) NOT NULL,
  `SEMESTER` varchar(20) NOT NULL,
  `CATEGORY` varchar(30) NOT NULL DEFAULT 'New',
  `CURRICULUM_YR` varchar(20) DEFAULT NULL,
  `DATE_RESERVED` date DEFAULT NULL,
  `DATE_ENROLLED` date DEFAULT NULL,
  `STATUS` varchar(30) NOT NULL DEFAULT 'Registered',
  `AMOUNT_DUE` decimal(10,2) NOT NULL DEFAULT 0.00,
  `AMOUNT_PAID` decimal(10,2) NOT NULL DEFAULT 0.00,
  `REG_FEE_PAID` decimal(10,2) NOT NULL DEFAULT 0.00,
  `ENCODED_BY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblenrollment`
--

INSERT INTO `tblenrollment` (`ENROLLMENT_ID`, `S_ID`, `COURSE_ID`, `SECTION_ID`, `SY_ID`, `YEAR_LEVEL`, `SEMESTER`, `CATEGORY`, `CURRICULUM_YR`, `DATE_RESERVED`, `DATE_ENROLLED`, `STATUS`, `AMOUNT_DUE`, `AMOUNT_PAID`, `REG_FEE_PAID`, `ENCODED_BY`) VALUES
(9, 15, 1, 1, 1, '1st Year', '1st Semester', 'New', '2025-2026', '2026-08-29', '2026-08-29', 'Enrolled', 19800.00, 19800.00, 1000.00, 1),
(10, 16, 1, 3, 1, '1st Year', '1st Semester', 'New', '2025-2026', '2026-08-30', '2026-08-30', 'Enrolled', 19800.00, 1000.00, 1000.00, 1),
(15, 21, 1, 1, 1, '1st Year', '1st Semester', 'New', '2025-2026', '2026-09-02', '2026-09-02', 'Enrolled', 19800.00, 6000.00, 1000.00, 1),
(16, 23, 1, 1, 1, '1st Year', '1st Semester', 'New', '2025-2026', '2026-09-02', '2026-09-02', 'Enrolled', 19800.00, 5000.00, 1000.00, 1),
(17, 24, 1, NULL, 1, '1st Year', '1st Semester', 'New', '2025-2026', '2026-09-03', NULL, 'Registered', 0.00, 0.00, 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblenrollment_details`
--

CREATE TABLE `tblenrollment_details` (
  `DETAIL_ID` int(11) NOT NULL,
  `ENROLLMENT_ID` int(11) NOT NULL,
  `SUBJECT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblenrollment_details`
--

INSERT INTO `tblenrollment_details` (`DETAIL_ID`, `ENROLLMENT_ID`, `SUBJECT_ID`) VALUES
(39, 9, 1),
(40, 9, 2),
(43, 9, 11),
(36, 9, 12),
(37, 9, 13),
(38, 9, 14),
(42, 9, 15),
(41, 9, 16),
(47, 10, 1),
(48, 10, 2),
(51, 10, 11),
(44, 10, 12),
(45, 10, 13),
(46, 10, 14),
(50, 10, 15),
(49, 10, 16),
(79, 15, 1),
(80, 15, 2),
(83, 15, 11),
(76, 15, 12),
(77, 15, 13),
(78, 15, 14),
(82, 15, 15),
(81, 15, 16),
(87, 16, 1),
(88, 16, 2),
(91, 16, 11),
(84, 16, 12),
(85, 16, 13),
(86, 16, 14),
(90, 16, 15),
(89, 16, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tblgrades`
--

CREATE TABLE `tblgrades` (
  `GRADE_ID` int(11) NOT NULL,
  `S_ID` int(11) NOT NULL,
  `SUBJECT_ID` int(11) NOT NULL,
  `ENROLLMENT_ID` int(11) NOT NULL,
  `SY_ID` int(11) NOT NULL,
  `SEMESTER` varchar(20) DEFAULT NULL,
  `GRADE` decimal(5,2) DEFAULT NULL,
  `REMARKS` varchar(20) DEFAULT NULL,
  `DATE_ENCODED` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblinstructor`
--

CREATE TABLE `tblinstructor` (
  `id` int(11) NOT NULL,
  `instructor_id` varchar(50) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblinstructor`
--

INSERT INTO `tblinstructor` (`id`, `instructor_id`, `name`, `description`) VALUES
(1, 'dd', 'adad', 'adad');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatients`
--

CREATE TABLE `tblpatients` (
  `PATIENT_ID` int(11) NOT NULL,
  `S_ID` int(11) DEFAULT NULL COMMENT 'Optional link to tblstudent, if the patient is an enrolled student',
  `FNAME` varchar(60) NOT NULL,
  `MNAME` varchar(60) DEFAULT NULL,
  `LNAME` varchar(60) NOT NULL,
  `SEX` varchar(10) DEFAULT NULL,
  `BDAY` date DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `CONTACT_NO` varchar(40) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT 'Active',
  `ADDEDBY` int(11) DEFAULT NULL,
  `DATEADDED` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblpatients`
--

INSERT INTO `tblpatients` (`PATIENT_ID`, `S_ID`, `FNAME`, `MNAME`, `LNAME`, `SEX`, `BDAY`, `AGE`, `CONTACT_NO`, `ADDRESS`, `STATUS`, `ADDEDBY`, `DATEADDED`) VALUES
(1, 15, 'Viod', 'S', '2.0', 'Male', '1992-03-26', 34, '0909', 'Unknown', 'Active', 80, '2026-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayments`
--

CREATE TABLE `tblpayments` (
  `PAYMENT_ID` int(11) NOT NULL,
  `ENROLLMENT_ID` int(11) NOT NULL,
  `AMOUNT` decimal(10,2) NOT NULL,
  `PAYMENT_TYPE` enum('Registration','Tuition') NOT NULL DEFAULT 'Tuition',
  `SOURCE` enum('Counter','Online') NOT NULL DEFAULT 'Counter',
  `PAY_STATUS` enum('Pending','Verified','Rejected') NOT NULL DEFAULT 'Verified',
  `VERIFIED_BY` int(11) DEFAULT NULL,
  `VERIFIED_ON` datetime DEFAULT NULL,
  `OR_NUMBER` varchar(50) DEFAULT NULL,
  `PROOF_FILE` varchar(255) DEFAULT NULL,
  `CASHIER` varchar(100) DEFAULT NULL,
  `DATE_PAID` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblpayments`
--

INSERT INTO `tblpayments` (`PAYMENT_ID`, `ENROLLMENT_ID`, `AMOUNT`, `PAYMENT_TYPE`, `SOURCE`, `PAY_STATUS`, `VERIFIED_BY`, `VERIFIED_ON`, `OR_NUMBER`, `PROOF_FILE`, `CASHIER`, `DATE_PAID`) VALUES
(1, 5, 2700.00, 'Tuition', 'Counter', 'Verified', NULL, NULL, '9696965', NULL, 'kier', '2026-08-27'),
(2, 5, 3000.00, 'Tuition', 'Counter', 'Verified', NULL, NULL, '9696965', NULL, 'kier', '2026-08-27'),
(3, 6, 2700.00, 'Tuition', 'Counter', 'Verified', NULL, NULL, '9696965', NULL, 'kier', '2026-08-27'),
(4, 8, 10000.00, 'Tuition', 'Counter', 'Verified', NULL, NULL, '9696965', NULL, 'kier', '2026-08-27'),
(5, 8, 9800.00, 'Tuition', 'Counter', 'Verified', NULL, NULL, '9696965', NULL, 'kier', '2026-08-27'),
(6, 9, 19800.00, 'Tuition', 'Counter', 'Verified', NULL, NULL, '9696965', NULL, 'kier', '2026-08-29'),
(7, 10, 1000.00, 'Tuition', 'Counter', 'Verified', NULL, NULL, '55555', NULL, 'kier', '2026-08-30'),
(14, 15, 2000.00, 'Registration', 'Online', 'Verified', 1, '2026-09-02 10:19:32', '000000', 'proofs/proof_21_1788315445_0IN0e9I__1_.jpg', 'Online Submission', '2026-09-02'),
(15, 15, 2000.00, 'Tuition', 'Online', 'Verified', 1, '2026-09-02 10:20:51', '000000', 'proofs/proof_21_1788315627_1cd0580d2177736a180a9cee727da4e8.jpg', 'Online Submission', '2026-09-02'),
(16, 15, 4000.00, 'Tuition', 'Online', 'Verified', 1, '2026-09-02 10:40:16', '000000', 'proofs/proof_21_1788316775_Screenshot_2026-07-09_160105.png', 'Online Submission', '2026-09-02'),
(17, 16, 1000.00, 'Registration', 'Online', 'Verified', 1, '2026-09-02 15:04:11', '000000', 'proofs/proof_23_1788332606_c9b0869f8a2ecd6f9f972b242ab6de66.jpg', 'Online Submission', '2026-09-02'),
(18, 16, 5000.00, 'Tuition', 'Online', 'Verified', 1, '2026-09-02 15:06:10', '000000', 'proofs/proof_23_1788332718_c9b0869f8a2ecd6f9f972b242ab6de66.jpg', 'Online Submission', '2026-09-02'),
(19, 18, 1000.00, 'Registration', 'Online', 'Verified', 1, '2026-09-11 21:53:43', '000000', 'proofs/proof_25_1789134796_3bfc6759d40a9e2b720f382be61cdab9.jpg', 'Online Submission', '2026-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `tblscheduleday`
--

CREATE TABLE `tblscheduleday` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblscheduleday`
--

INSERT INTO `tblscheduleday` (`id`, `name`, `description`) VALUES
(1, 'Monday', 'Monday schedule'),
(2, 'Tuesday', 'Tuesday schedule'),
(3, 'Wednesday', 'Wednesday schedule'),
(4, 'Thursday', 'Thursday schedule'),
(5, 'Friday', 'Friday schedule'),
(6, 'Saturday', 'Saturday schedule'),
(7, 'Sunday', 'Sunday schedule');

-- --------------------------------------------------------

--
-- Table structure for table `tblscheduletime`
--

CREATE TABLE `tblscheduletime` (
  `id` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblscheduletime`
--

INSERT INTO `tblscheduletime` (`id`, `time_start`, `time_end`, `description`) VALUES
(4, '10:30:00', '23:30:00', 'vbfbb'),
(5, '01:16:00', '02:17:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblschoolyear`
--

CREATE TABLE `tblschoolyear` (
  `SY_ID` int(11) NOT NULL,
  `SCHOOL_YEAR` varchar(20) NOT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblschoolyear`
--

INSERT INTO `tblschoolyear` (`SY_ID`, `SCHOOL_YEAR`, `STATUS`) VALUES
(1, '2025-2026', 'Active'),
(4, '2024-2025', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tblsections`
--

CREATE TABLE `tblsections` (
  `SECTION_ID` int(11) NOT NULL,
  `SECTION_NAME` varchar(50) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `SY_ID` int(11) NOT NULL,
  `YEAR_LEVEL` varchar(20) NOT NULL,
  `PROGRAM_HEAD` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblsections`
--

INSERT INTO `tblsections` (`SECTION_ID`, `SECTION_NAME`, `COURSE_ID`, `SY_ID`, `YEAR_LEVEL`, `PROGRAM_HEAD`) VALUES
(1, 'A', 1, 1, '1st Year', NULL),
(2, 'B', 1, 1, '1st Year', NULL),
(3, 'C', 1, 1, '1st Year', NULL),
(4, 'D', 1, 1, '1st Year', NULL),
(5, 'A', 2, 1, '1st Year', NULL),
(6, 'B', 2, 1, '1st Year', NULL),
(7, 'C', 2, 1, '1st Year', NULL),
(8, 'D', 2, 1, '1st Year', NULL),
(9, 'A', 3, 1, '1st Year', NULL),
(10, 'B', 3, 1, '1st Year', NULL),
(11, 'C', 3, 1, '1st Year', NULL),
(12, 'D', 3, 1, '1st Year', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsetschedule`
--

CREATE TABLE `tblsetschedule` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `semester` varchar(50) NOT NULL,
  `school_year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsetschedule`
--

INSERT INTO `tblsetschedule` (`id`, `department_id`, `subject_id`, `classroom_id`, `day_id`, `time_id`, `instructor_id`, `semester`, `school_year`) VALUES
(8, 5, 8, 1, 1, 5, 1, '1st Semester', '2026-2027');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `S_ID` int(11) NOT NULL,
  `IDNO` varchar(20) NOT NULL,
  `FNAME` varchar(40) NOT NULL,
  `LNAME` varchar(40) NOT NULL,
  `MNAME` varchar(40) NOT NULL,
  `SEX` varchar(10) NOT NULL DEFAULT 'Male',
  `BDAY` date DEFAULT NULL,
  `BPLACE` text DEFAULT NULL,
  `STATUS` varchar(30) NOT NULL DEFAULT 'Active',
  `AGE` int(11) DEFAULT NULL,
  `NATIONALITY` varchar(40) DEFAULT NULL,
  `RELIGION` varchar(255) DEFAULT NULL,
  `CONTACT_NO` varchar(40) DEFAULT NULL,
  `HOME_ADD` text DEFAULT NULL,
  `EMAIL` varchar(150) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `ACC_PASSWORD` text DEFAULT NULL,
  `LRNNO` varchar(15) DEFAULT NULL,
  `CONTACTPERSON` varchar(150) DEFAULT NULL,
  `COMPANYIDNO` int(11) DEFAULT NULL,
  `COURSE_ID` int(11) DEFAULT NULL,
  `AddedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`S_ID`, `IDNO`, `FNAME`, `LNAME`, `MNAME`, `SEX`, `BDAY`, `BPLACE`, `STATUS`, `AGE`, `NATIONALITY`, `RELIGION`, `CONTACT_NO`, `HOME_ADD`, `EMAIL`, `photo`, `ACC_PASSWORD`, `LRNNO`, `CONTACTPERSON`, `COMPANYIDNO`, `COURSE_ID`, `AddedBy`) VALUES
(15, '1', 'Viod', '2.0', 'S', 'Male', '1992-03-26', 'san caslos', 'Active', 34, 'Void', 'Void', '0909', 'Unknown', 'Void@gmail.com', 'image/1787985521_฀฀฀ on TikTok.jpe', NULL, NULL, NULL, NULL, 1, NULL),
(16, '2', 'peace', 'cool', 'stay', 'Male', '2007-06-30', 'san caslos', 'Active', 18, 'Void', 'Void', '090988', 'Unknown', 'peace@gmail.com', 'image/1788043359_Golden Brown Pictures.jpe', NULL, NULL, NULL, NULL, 1, NULL),
(21, '2026-0021', 'scsf', 'czcc', 'czcz', 'Male', '2026-09-17', 'czcz', 'Active', 66, 'wfwf', 'gstw', 'gg', 'wtwtw', 'kier@gmail.com', NULL, '$2y$10$o8qiKhInEqOf/LE5JWkpeObvmcUgOZ61eJd6fzwc5VXlILC0m4FP6', NULL, NULL, NULL, 1, NULL),
(23, '2026-0023', 'Shin', 'lol', 'okk', 'Female', '2026-09-10', 'czcz', 'Active', 66, 'wfwf', 'gstw', 'gg', 'wtwtw', 'kensolitario62@gmail.com', 'image/1788332173_฀฀฀ on TikTok.jpe', '$2y$10$9Rwoje9l2MD38XiB5XFw5.76MPRB8dQenCvMCUMgLXllYui2pmFPW', NULL, NULL, NULL, 1, NULL),
(24, '00035', 'sdwd', 'dD', 'dqd', 'Male', '2026-08-20', 'san caslos', 'Active', 34, 'Void', 'Void', '0909', 'wtwtw', 'Void@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `SUBJECT_ID` int(11) NOT NULL,
  `SUBJECT_CODE` varchar(20) NOT NULL,
  `SUBJECT_NAME` varchar(150) NOT NULL,
  `UNITS` int(11) NOT NULL DEFAULT 3,
  `PRICE_PER_UNIT` decimal(10,2) NOT NULL DEFAULT 900.00,
  `COURSE_ID` int(11) NOT NULL,
  `YEAR_LEVEL` varchar(20) DEFAULT NULL,
  `SEMESTER` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`SUBJECT_ID`, `SUBJECT_CODE`, `SUBJECT_NAME`, `UNITS`, `PRICE_PER_UNIT`, `COURSE_ID`, `YEAR_LEVEL`, `SEMESTER`) VALUES
(1, 'IT101', 'Introduction to Computing', 3, 900.00, 1, '1st Year', '1st Semester'),
(2, 'IT102', 'Computer Programming 1', 3, 900.00, 1, '1st Year', '1st Semester'),
(4, 'IT104', 'Web Systems and Technologies', 3, 900.00, 1, '1st Year', '2nd Semester'),
(5, 'TM101', 'Introduction to Tourism', 3, 900.00, 2, '1st Year', '1st Semester'),
(6, 'TM102', 'Philippine Culture and Tourism Geography', 3, 900.00, 2, '1st Year', '1st Semester'),
(7, 'TM103', 'Micro Perspective of Tourism', 3, 900.00, 2, '1st Year', '2nd Semester'),
(8, 'ED101', 'The Teaching Profession', 3, 900.00, 3, '1st Year', '1st Semester'),
(9, 'ED102', 'Child and Adolescent Development', 3, 900.00, 3, '1st Year', '1st Semester'),
(10, 'ED103', 'Facilitating Learner-Centered Teaching', 3, 900.00, 3, '1st Year', '2nd Semester'),
(11, 'RE 1', 'Basic Doctrine and Sacraments in the Teaching of St. Augustine', 2, 900.00, 1, '1st Year', '1st Semester'),
(12, 'GE 1', 'Understanding the Self', 3, 900.00, 1, '1st Year', '1st Semester'),
(13, 'GE 2', 'Readings in Philippine History', 3, 900.00, 1, '1st Year', '1st Semester'),
(14, 'GE 3', 'The Contemporary World', 3, 900.00, 1, '1st Year', '1st Semester'),
(15, 'PATHFit 1', 'Movement Competency Training', 2, 900.00, 1, '1st Year', '1st Semester'),
(16, 'NSTP 1', 'National Service Training Program 1', 3, 900.00, 1, '1st Year', '1st Semester');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `UID` int(11) NOT NULL,
  `DISPLAYNAME` varchar(30) NOT NULL,
  `PHOTO` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` text NOT NULL,
  `TYPE` varchar(15) NOT NULL,
  `TYPEID` int(11) DEFAULT NULL,
  `ADDEDBY` int(3) NOT NULL,
  `DATEADDED` date NOT NULL,
  `MODIFIEDBY` int(3) NOT NULL,
  `DATEMODIFIED` date NOT NULL,
  `STATUSACTIVE` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`UID`, `DISPLAYNAME`, `PHOTO`, `USERNAME`, `PASSWORD`, `TYPE`, `TYPEID`, `ADDEDBY`, `DATEADDED`, `MODIFIEDBY`, `DATEMODIFIED`, `STATUSACTIVE`) VALUES
(1, 'Kier', '1788329618_ziad_50i✨️.jpe', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 1, 1, '2020-08-27', 1, '2026-09-02', 1),
(77, 'dfd', NULL, 'dfd', '6bb65257fcab4e2975cd96b0f7fc4b53d97c10b6', 'Staff', 3, 1, '2025-01-16', 1, '2026-08-02', 1),
(78, 'dfd', NULL, 'dfdf', '6bb65257fcab4e2975cd96b0f7fc4b53d97c10b6', 'Staff', 3, 1, '2025-01-16', 1, '2025-01-16', 1),
(79, 'Erick', NULL, 'jason', '5c2dd944dde9e08881bef0894fe7b22a5c9c4b06', 'Administrator', 1, 1, '2025-01-24', 1, '2025-01-24', 1),
(80, 'ken', '', 'ken', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Doctor', NULL, 1, '2026-09-09', 1, '2026-09-09', 1),
(81, 'Sora', '', 'Sora', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Doctor', NULL, 1, '2026-09-11', 1, '2026-09-11', 1),
(82, 'eli', '', 'eli', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Registrar', NULL, 1, '2026-09-12', 1, '2026-09-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

CREATE TABLE `tblusertype` (
  `TYPEID` int(11) NOT NULL,
  `USERTYPE` varchar(30) NOT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusertype`
--

INSERT INTO `tblusertype` (`TYPEID`, `USERTYPE`, `STATUS`) VALUES
(1, 'Administrator', 'Active'),
(2, 'Doctor', 'Active'),
(3, 'Staff', 'Active'),
(7, 'Nurse', 'Active'),
(12, 'hello', 'Inactive'),
(13, 'cashier', 'Active'),
(14, 'sdsds', 'Inactive'),
(16, 'Student', 'Active'),
(17, 'Registrar', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblvisits`
--

CREATE TABLE `tblvisits` (
  `VISIT_ID` int(11) NOT NULL,
  `PATIENT_ID` int(11) NOT NULL,
  `DOCTOR_ID` int(11) DEFAULT NULL COMMENT 'tbldoctors.DOCTOR_ID - nullable, the doctor may not have a linked profile yet',
  `VISIT_DATE` date NOT NULL,
  `CHIEF_COMPLAINT` varchar(255) DEFAULT NULL,
  `DIAGNOSIS` varchar(255) DEFAULT NULL,
  `NOTES` text DEFAULT NULL,
  `ENCODED_BY` int(11) DEFAULT NULL COMMENT 'tblusers.UID of whoever recorded the visit',
  `DATEADDED` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblvisits`
--

INSERT INTO `tblvisits` (`VISIT_ID`, `PATIENT_ID`, `DOCTOR_ID`, `VISIT_DATE`, `CHIEF_COMPLAINT`, `DIAGNOSIS`, `NOTES`, `ENCODED_BY`, `DATEADDED`) VALUES
(1, 1, NULL, '2026-09-10', 'sakit ulo', NULL, 'dwdwd', 80, '2026-09-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni_details`
--
ALTER TABLE `alumni_details`
  ADD PRIMARY KEY (`AlumniID`),
  ADD KEY `fk_alumni_student` (`S_ID`),
  ADD KEY `fk_alumni_addedby` (`AddedBy`);

--
-- Indexes for table `tblclassroom`
--
ALTER TABLE `tblclassroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcourses`
--
ALTER TABLE `tblcourses`
  ADD PRIMARY KEY (`COURSE_ID`),
  ADD UNIQUE KEY `COURSE_CODE` (`COURSE_CODE`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldoctors`
--
ALTER TABLE `tbldoctors`
  ADD PRIMARY KEY (`DOCTOR_ID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `idx_fullname` (`FullName`);

--
-- Indexes for table `tblenrollment`
--
ALTER TABLE `tblenrollment`
  ADD PRIMARY KEY (`ENROLLMENT_ID`),
  ADD UNIQUE KEY `uq_enrollment_term` (`S_ID`,`SY_ID`,`SEMESTER`),
  ADD KEY `fk_enrollment_student` (`S_ID`),
  ADD KEY `fk_enrollment_course` (`COURSE_ID`),
  ADD KEY `fk_enrollment_section` (`SECTION_ID`),
  ADD KEY `fk_enrollment_sy` (`SY_ID`),
  ADD KEY `fk_enrollment_encodedby` (`ENCODED_BY`);

--
-- Indexes for table `tblenrollment_details`
--
ALTER TABLE `tblenrollment_details`
  ADD PRIMARY KEY (`DETAIL_ID`),
  ADD UNIQUE KEY `uq_enrollment_subject` (`ENROLLMENT_ID`,`SUBJECT_ID`),
  ADD KEY `fk_endetails_enrollment` (`ENROLLMENT_ID`),
  ADD KEY `fk_endetails_subject` (`SUBJECT_ID`);

--
-- Indexes for table `tblgrades`
--
ALTER TABLE `tblgrades`
  ADD PRIMARY KEY (`GRADE_ID`),
  ADD KEY `fk_grades_student` (`S_ID`),
  ADD KEY `fk_grades_subject` (`SUBJECT_ID`),
  ADD KEY `fk_grades_enrollment` (`ENROLLMENT_ID`),
  ADD KEY `fk_grades_sy` (`SY_ID`);

--
-- Indexes for table `tblinstructor`
--
ALTER TABLE `tblinstructor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpatients`
--
ALTER TABLE `tblpatients`
  ADD PRIMARY KEY (`PATIENT_ID`),
  ADD KEY `S_ID` (`S_ID`);

--
-- Indexes for table `tblpayments`
--
ALTER TABLE `tblpayments`
  ADD PRIMARY KEY (`PAYMENT_ID`);

--
-- Indexes for table `tblscheduleday`
--
ALTER TABLE `tblscheduleday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblscheduletime`
--
ALTER TABLE `tblscheduletime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblschoolyear`
--
ALTER TABLE `tblschoolyear`
  ADD PRIMARY KEY (`SY_ID`),
  ADD UNIQUE KEY `SCHOOL_YEAR` (`SCHOOL_YEAR`);

--
-- Indexes for table `tblsections`
--
ALTER TABLE `tblsections`
  ADD PRIMARY KEY (`SECTION_ID`),
  ADD KEY `fk_sections_course` (`COURSE_ID`),
  ADD KEY `fk_sections_sy` (`SY_ID`);

--
-- Indexes for table `tblsetschedule`
--
ALTER TABLE `tblsetschedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_setschedule_department` (`department_id`),
  ADD KEY `fk_setschedule_classroom` (`classroom_id`),
  ADD KEY `fk_setschedule_day` (`day_id`),
  ADD KEY `fk_setschedule_time` (`time_id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`S_ID`),
  ADD UNIQUE KEY `IDNO` (`IDNO`),
  ADD KEY `fk_student_course` (`COURSE_ID`),
  ADD KEY `fk_student_addedby` (`AddedBy`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`SUBJECT_ID`),
  ADD UNIQUE KEY `uq_subject_code` (`SUBJECT_CODE`),
  ADD KEY `fk_subjects_course` (`COURSE_ID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `uq_username` (`USERNAME`),
  ADD KEY `fk_users_usertype` (`TYPEID`);

--
-- Indexes for table `tblusertype`
--
ALTER TABLE `tblusertype`
  ADD PRIMARY KEY (`TYPEID`),
  ADD UNIQUE KEY `uq_usertype` (`USERTYPE`);

--
-- Indexes for table `tblvisits`
--
ALTER TABLE `tblvisits`
  ADD PRIMARY KEY (`VISIT_ID`),
  ADD KEY `PATIENT_ID` (`PATIENT_ID`),
  ADD KEY `DOCTOR_ID` (`DOCTOR_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni_details`
--
ALTER TABLE `alumni_details`
  MODIFY `AlumniID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblclassroom`
--
ALTER TABLE `tblclassroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcourses`
--
ALTER TABLE `tblcourses`
  MODIFY `COURSE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbldoctors`
--
ALTER TABLE `tbldoctors`
  MODIFY `DOCTOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblenrollment`
--
ALTER TABLE `tblenrollment`
  MODIFY `ENROLLMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblenrollment_details`
--
ALTER TABLE `tblenrollment_details`
  MODIFY `DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tblgrades`
--
ALTER TABLE `tblgrades`
  MODIFY `GRADE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblinstructor`
--
ALTER TABLE `tblinstructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpatients`
--
ALTER TABLE `tblpatients`
  MODIFY `PATIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpayments`
--
ALTER TABLE `tblpayments`
  MODIFY `PAYMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblscheduleday`
--
ALTER TABLE `tblscheduleday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblscheduletime`
--
ALTER TABLE `tblscheduletime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblschoolyear`
--
ALTER TABLE `tblschoolyear`
  MODIFY `SY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblsections`
--
ALTER TABLE `tblsections`
  MODIFY `SECTION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblsetschedule`
--
ALTER TABLE `tblsetschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `SUBJECT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tblusertype`
--
ALTER TABLE `tblusertype`
  MODIFY `TYPEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblvisits`
--
ALTER TABLE `tblvisits`
  MODIFY `VISIT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni_details`
--
ALTER TABLE `alumni_details`
  ADD CONSTRAINT `fk_alumni_addedby` FOREIGN KEY (`AddedBy`) REFERENCES `tblusers` (`UID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alumni_student` FOREIGN KEY (`S_ID`) REFERENCES `tblstudent` (`S_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tblenrollment`
--
ALTER TABLE `tblenrollment`
  ADD CONSTRAINT `fk_enrollment_course` FOREIGN KEY (`COURSE_ID`) REFERENCES `tblcourses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_enrollment_encodedby` FOREIGN KEY (`ENCODED_BY`) REFERENCES `tblusers` (`UID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_enrollment_section` FOREIGN KEY (`SECTION_ID`) REFERENCES `tblsections` (`SECTION_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_enrollment_student` FOREIGN KEY (`S_ID`) REFERENCES `tblstudent` (`S_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_enrollment_sy` FOREIGN KEY (`SY_ID`) REFERENCES `tblschoolyear` (`SY_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblenrollment_details`
--
ALTER TABLE `tblenrollment_details`
  ADD CONSTRAINT `fk_endetails_enrollment` FOREIGN KEY (`ENROLLMENT_ID`) REFERENCES `tblenrollment` (`ENROLLMENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_endetails_subject` FOREIGN KEY (`SUBJECT_ID`) REFERENCES `tblsubjects` (`SUBJECT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblgrades`
--
ALTER TABLE `tblgrades`
  ADD CONSTRAINT `fk_grades_enrollment` FOREIGN KEY (`ENROLLMENT_ID`) REFERENCES `tblenrollment` (`ENROLLMENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_grades_student` FOREIGN KEY (`S_ID`) REFERENCES `tblstudent` (`S_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_grades_subject` FOREIGN KEY (`SUBJECT_ID`) REFERENCES `tblsubjects` (`SUBJECT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_grades_sy` FOREIGN KEY (`SY_ID`) REFERENCES `tblschoolyear` (`SY_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblsections`
--
ALTER TABLE `tblsections`
  ADD CONSTRAINT `fk_sections_course` FOREIGN KEY (`COURSE_ID`) REFERENCES `tblcourses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sections_sy` FOREIGN KEY (`SY_ID`) REFERENCES `tblschoolyear` (`SY_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblsetschedule`
--
ALTER TABLE `tblsetschedule`
  ADD CONSTRAINT `fk_setschedule_classroom` FOREIGN KEY (`classroom_id`) REFERENCES `tblclassroom` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_setschedule_day` FOREIGN KEY (`day_id`) REFERENCES `tblscheduleday` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_setschedule_department` FOREIGN KEY (`department_id`) REFERENCES `tbldepartment` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_setschedule_time` FOREIGN KEY (`time_id`) REFERENCES `tblscheduletime` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD CONSTRAINT `fk_student_addedby` FOREIGN KEY (`AddedBy`) REFERENCES `tblusers` (`UID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_course` FOREIGN KEY (`COURSE_ID`) REFERENCES `tblcourses` (`COURSE_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD CONSTRAINT `fk_subjects_course` FOREIGN KEY (`COURSE_ID`) REFERENCES `tblcourses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD CONSTRAINT `fk_users_usertype` FOREIGN KEY (`TYPEID`) REFERENCES `tblusertype` (`TYPEID`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
