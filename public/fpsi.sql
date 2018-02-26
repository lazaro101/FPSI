-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 03:39 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fpsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `appaddress_t`
--

CREATE TABLE `appaddress_t` (
  `APP_ID` int(11) NOT NULL,
  `ADDRSS` varchar(100) NOT NULL,
  `ADDCAT` varchar(10) NOT NULL,
  `PHONENUM1` varchar(30) DEFAULT NULL,
  `PHONENUM2` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appchildren_t`
--

CREATE TABLE `appchildren_t` (
  `APP_ID` int(11) NOT NULL,
  `CHILDNAME` varchar(100) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `BIRTHDATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appchildren_t`
--

INSERT INTO `appchildren_t` (`APP_ID`, `CHILDNAME`, `AGE`, `BIRTHDATE`) VALUES
(1, 'asd', 0, '1998-10-27'),
(6, 'wqe', 0, '1998-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `appcontact_t`
--

CREATE TABLE `appcontact_t` (
  `APP_ID` int(11) NOT NULL,
  `CONTACTNAME` varchar(100) DEFAULT NULL,
  `CONTACTNUM` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appcontact_t`
--

INSERT INTO `appcontact_t` (`APP_ID`, `CONTACTNAME`, `CONTACTNUM`) VALUES
(1, 'wqe', '123132'),
(6, 'qwe', '213');

-- --------------------------------------------------------

--
-- Table structure for table `appdoc_t`
--

CREATE TABLE `appdoc_t` (
  `APP_NO` int(11) NOT NULL,
  `APP_ID` int(11) NOT NULL,
  `REQ_ID` int(11) DEFAULT NULL,
  `DOCSTAT` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applications_t`
--

CREATE TABLE `applications_t` (
  `APP_NO` int(11) NOT NULL,
  `APP_ID` int(11) NOT NULL,
  `JORDER_ID` int(11) DEFAULT NULL,
  `EMPLOYER_ID` int(11) DEFAULT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `JOB_ID` int(11) DEFAULT NULL,
  `INITINTERVIEWDATE` date DEFAULT NULL,
  `INITINTERVIEWSTATUS` varchar(10) DEFAULT NULL,
  `FINALINTERVIEWSTATUS` varchar(10) DEFAULT NULL,
  `APPSTATS` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apppersonal_t`
--

CREATE TABLE `apppersonal_t` (
  `APP_ID` int(11) NOT NULL,
  `NAMEOFFATHER` varchar(100) DEFAULT NULL,
  `FAGE` varchar(30) DEFAULT NULL,
  `FOCCUPATION` varchar(100) DEFAULT NULL,
  `NAMEOFMOTHER` varchar(100) DEFAULT NULL,
  `MAGE` varchar(30) DEFAULT NULL,
  `MOCCUPATION` varchar(100) DEFAULT NULL,
  `NAMEOFSPOUSE` varchar(100) DEFAULT NULL,
  `SAGE` varchar(30) DEFAULT NULL,
  `SOCCUPATION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apppersonal_t`
--

INSERT INTO `apppersonal_t` (`APP_ID`, `NAMEOFFATHER`, `FAGE`, `FOCCUPATION`, `NAMEOFMOTHER`, `MAGE`, `MOCCUPATION`, `NAMEOFSPOUSE`, `SAGE`, `SOCCUPATION`) VALUES
(1, 'father', '45', 'po', 'mother', '43', 'po', 'spouse', '42', 'po'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'WQE', '12', 'QWE', 'QWE', '12', 'QWE', 'QWE', '12', 'QWE');

-- --------------------------------------------------------

--
-- Table structure for table `appschool_t`
--

CREATE TABLE `appschool_t` (
  `APP_ID` int(11) NOT NULL,
  `SCHOOLNAME` varchar(100) NOT NULL,
  `SCHOOLTYPE` varchar(30) NOT NULL,
  `YRSTART` year(4) NOT NULL,
  `YREND` year(4) NOT NULL,
  `DEGREE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appschool_t`
--

INSERT INTO `appschool_t` (`APP_ID`, `SCHOOLNAME`, `SCHOOLTYPE`, `YRSTART`, `YREND`, `DEGREE`) VALUES
(4, 'sad', 'Elementary', 2019, 2019, 'wqe'),
(5, 'sad', 'Elementary', 2019, 2019, 'wqe'),
(1, 'asd', 'Tertiary', 2014, 2018, 'asd'),
(6, 'qweqwe', 'qweqwe', 2019, 2018, 'qweqwe');

-- --------------------------------------------------------

--
-- Table structure for table `appskills_t`
--

CREATE TABLE `appskills_t` (
  `APP_ID` int(11) NOT NULL,
  `SKILL_ID` int(11) DEFAULT NULL,
  `PROFICIENCY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appskills_t`
--

INSERT INTO `appskills_t` (`APP_ID`, `SKILL_ID`, `PROFICIENCY`) VALUES
(1, 1, 1),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `appworkex_t`
--

CREATE TABLE `appworkex_t` (
  `APP_ID` int(11) NOT NULL,
  `COMPANY` varchar(100) NOT NULL,
  `COMPANYADD` varchar(100) NOT NULL,
  `POSITION` varchar(100) NOT NULL,
  `MONTHSTART` varchar(10) NOT NULL,
  `YEARSTART` year(4) NOT NULL,
  `MONTHEND` varchar(10) NOT NULL,
  `YEAREND` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appworkex_t`
--

INSERT INTO `appworkex_t` (`APP_ID`, `COMPANY`, `COMPANYADD`, `POSITION`, `MONTHSTART`, `YEARSTART`, `MONTHEND`, `YEAREND`) VALUES
(6, 'QWE', 'QWE', 'QWE', '06', 1997, '08', 2009);

-- --------------------------------------------------------

--
-- Table structure for table `app_t`
--

CREATE TABLE `app_t` (
  `APP_ID` int(11) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `MNAME` varchar(30) DEFAULT NULL,
  `JOB_ID` int(11) DEFAULT NULL,
  `GENDER` char(6) DEFAULT NULL,
  `CIVILSTAT` varchar(30) DEFAULT NULL,
  `CONTACT` varchar(30) NOT NULL,
  `CITIZENSHIP` varchar(60) DEFAULT NULL,
  `BIRTHDATE` date NOT NULL,
  `AGE` int(11) DEFAULT NULL,
  `AHEIGHT` varchar(10) DEFAULT NULL,
  `AWEIGHT` varchar(10) DEFAULT NULL,
  `APPSTATUS` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_t`
--

INSERT INTO `app_t` (`APP_ID`, `LNAME`, `FNAME`, `MNAME`, `JOB_ID`, `GENDER`, `CIVILSTAT`, `CONTACT`, `CITIZENSHIP`, `BIRTHDATE`, `AGE`, `AHEIGHT`, `AWEIGHT`, `APPSTATUS`, `status`) VALUES
(1, 'last', 'first', 'middle', 2, 'Male', 'Single', '0997-549-1786', NULL, '1998-10-27', 19, '12', '12', NULL, 0),
(6, 'asd', 'asd', 'asd', 2, 'Female', 'Single', '0975-292-9292', NULL, '2018-02-19', 0, '150 cm', '45 kg', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banksallowed_t`
--

CREATE TABLE `banksallowed_t` (
  `COUNTRY_ID` int(11) DEFAULT NULL,
  `BANK_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banksallowed_t`
--

INSERT INTO `banksallowed_t` (`COUNTRY_ID`, `BANK_ID`) VALUES
(8, 1),
(8, 2),
(8, 4),
(9, 1),
(9, 2),
(7, 2),
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `banks_t`
--

CREATE TABLE `banks_t` (
  `BANK_ID` int(11) NOT NULL,
  `BANKNAME` varchar(55) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks_t`
--

INSERT INTO `banks_t` (`BANK_ID`, `BANKNAME`, `status`) VALUES
(1, 'Metrobank', 0),
(2, 'BPI', 0),
(4, 'BDO', 0),
(5, 'asdasd', 1),
(6, 'Sample1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countryreqs_t`
--

CREATE TABLE `countryreqs_t` (
  `COUNTRY_ID` int(11) DEFAULT NULL,
  `REQ_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countryreqs_t`
--

INSERT INTO `countryreqs_t` (`COUNTRY_ID`, `REQ_ID`) VALUES
(8, 22),
(9, 22),
(7, 22),
(15, 22);

-- --------------------------------------------------------

--
-- Table structure for table `country_t`
--

CREATE TABLE `country_t` (
  `COUNTRY_ID` int(11) NOT NULL,
  `COUNTRYNAME` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_t`
--

INSERT INTO `country_t` (`COUNTRY_ID`, `COUNTRYNAME`, `status`) VALUES
(7, 'Japan', 0),
(8, 'United States of America', 0),
(9, 'Philippines', 0),
(10, 'sample', 1),
(11, 'kj', 1),
(12, 'asd', 1),
(13, 'sadsadasdads', 1),
(14, 'assds', 1),
(15, 'Sampleasd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `currency_t`
--

CREATE TABLE `currency_t` (
  `CURRENCY_ID` int(11) NOT NULL,
  `CURRENCYNAME` varchar(30) NOT NULL,
  `SYMBOL` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `COUNTRY_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency_t`
--

INSERT INTO `currency_t` (`CURRENCY_ID`, `CURRENCYNAME`, `SYMBOL`, `status`, `COUNTRY_ID`) VALUES
(6, 'Yen', 'JPN', 0, 7),
(7, 'Philippine Peso', 'Php', 0, 9),
(8, 'Us', 'Dlr', 0, 8),
(9, 'asdasd', 'sad', 1, 8),
(10, 'Sample', 'Sample', 1, 7),
(11, 'Sampleasdasd', 'Sampleasd', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `employer_t`
--

CREATE TABLE `employer_t` (
  `EMPLOYER_ID` int(11) NOT NULL,
  `EMPLOYERNAME` varchar(100) NOT NULL,
  `LNAME` varchar(100) NOT NULL,
  `FNAME` varchar(100) NOT NULL,
  `MNAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `CONTACT` varchar(30) DEFAULT NULL,
  `LANDLINE` varchar(30) DEFAULT NULL,
  `COMPANYADD` varchar(100) DEFAULT NULL,
  `EMPSTATUS` varchar(30) DEFAULT NULL,
  `REASONS` varchar(100) DEFAULT NULL,
  `TDATE` date DEFAULT NULL,
  `COUNTRY_ID` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer_t`
--

INSERT INTO `employer_t` (`EMPLOYER_ID`, `EMPLOYERNAME`, `LNAME`, `FNAME`, `MNAME`, `EMAIL`, `CONTACT`, `LANDLINE`, `COMPANYADD`, `EMPSTATUS`, `REASONS`, `TDATE`, `COUNTRY_ID`, `status`) VALUES
(1, 'USA Employer', 'qwe', 'asd', 'dsa', 'lolo@gmail.com', '09858585', 'zxc', 'asd', NULL, NULL, NULL, 8, 0),
(2, 'asd', 'asd', 'asd', 'asd', 'ads', 'asd', 'dsa', 'asd', NULL, 'noen', '2018-02-12', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_t`
--

CREATE TABLE `emp_t` (
  `EMP_ID` int(11) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `MNAME` varchar(30) DEFAULT NULL,
  `GENDER` char(6) DEFAULT NULL,
  `BIRTHDATE` date DEFAULT NULL,
  `ADDRSS` varchar(60) DEFAULT NULL,
  `CONTACT` varchar(11) DEFAULT NULL,
  `DEPTNAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_t`
--

INSERT INTO `emp_t` (`EMP_ID`, `LNAME`, `FNAME`, `MNAME`, `GENDER`, `BIRTHDATE`, `ADDRSS`, `CONTACT`, `DEPTNAME`) VALUES
(1, 'Vidanes', 'Aubrey', 'Santiago', 'Female', '1998-05-18', 'Pasig City', '09995093954', 'Operations');

-- --------------------------------------------------------

--
-- Table structure for table `feetype_t`
--

CREATE TABLE `feetype_t` (
  `FEE_ID` int(11) DEFAULT NULL,
  `JOBTYPE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feetype_t`
--

INSERT INTO `feetype_t` (`FEE_ID`, `JOBTYPE_ID`) VALUES
(2, 3),
(3, 2),
(3, 3),
(4, 2),
(4, 3),
(1, 2),
(5, 2),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `genfees_t`
--

CREATE TABLE `genfees_t` (
  `FEE_ID` int(11) NOT NULL,
  `FEENAME` varchar(30) NOT NULL,
  `PAYMENTTYPE` varchar(30) DEFAULT NULL,
  `NOOFPAYMENTS` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genfees_t`
--

INSERT INTO `genfees_t` (`FEE_ID`, `FEENAME`, `PAYMENTTYPE`, `NOOFPAYMENTS`, `status`) VALUES
(1, 'Fee1', NULL, NULL, 0),
(2, 'Fee2', NULL, NULL, 0),
(3, 'Fee3', NULL, NULL, 0),
(4, 'sample', NULL, NULL, 1),
(5, 'as', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `genreqs_t`
--

CREATE TABLE `genreqs_t` (
  `REQ_ID` int(11) NOT NULL,
  `REQNAME` varchar(100) NOT NULL,
  `ALLOCATION` varchar(30) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genreqs_t`
--

INSERT INTO `genreqs_t` (`REQ_ID`, `REQNAME`, `ALLOCATION`, `Description`, `status`) VALUES
(1, 'Accomplished Agency Application Form', 'Basic', 'All necessary fields must be filled out', 0),
(2, 'Comprehensive Resume', 'Basic', '', 0),
(3, 'Valid Medical Certificate', 'Basic', '', 0),
(4, 'Valid Passport Original', 'Basic', '', 0),
(5, 'Colored Whole Body Picture (2 pcs.)', 'Basic', 'White background', 0),
(6, 'Colored 2x2 Pictures (6 pcs.)', 'Basic', 'White background', 0),
(7, 'Employment Certificate', 'Basic', '', 0),
(8, 'Training Certificate', 'Basic', '', 0),
(9, 'Valid Original NBI Clearance', 'Basic', '', 0),
(10, 'Barangay Clearance', 'Basic', '', 0),
(11, 'College Diploma', 'Job', '', 0),
(12, 'High School Diploma', 'Job', '', 0),
(13, 'Related Learning Experience (RLE) Summary', 'Job', '', 0),
(14, 'Valid PRC License/ID', 'Job', '', 0),
(15, 'Board Certificate', 'Job', '', 0),
(16, 'Board Rating', 'Job', '', 0),
(17, 'Project Portfolio', 'Job', '', 0),
(18, 'Certificate of Singleness', 'Job', '', 0),
(19, 'Marriage Contract', 'Job', '', 0),
(20, 'Family Photo', 'Job', '', 0),
(21, 'NCII', 'Job', '', 0),
(22, 'Visa', 'Country', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `genskills_t`
--

CREATE TABLE `genskills_t` (
  `SKILL_ID` int(11) NOT NULL,
  `SKILLNAME` varchar(100) NOT NULL,
  `SKILLTYPE` varchar(55) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genskills_t`
--

INSERT INTO `genskills_t` (`SKILL_ID`, `SKILLNAME`, `SKILLTYPE`, `status`) VALUES
(1, 'Good Communication', 'General', 0),
(2, 'Programming (Java)', 'Specific', 0),
(3, 'Analytical', 'General', 0),
(4, 'Creative Thinking', 'General', 0),
(5, 'Critical Thinking', 'General', 0),
(6, 'Decision Making', 'General', 0),
(7, 'Leadership', 'General', 0),
(8, 'Logical Thinking', 'General', 0),
(9, 'Listening', 'General', 0),
(10, 'Programming (PHP)', 'Specific', 0),
(11, 'aa', 'General', 1),
(12, 'asas', 'General', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobcategory_t`
--

CREATE TABLE `jobcategory_t` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CATEGORYNAME` varchar(30) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobcategory_t`
--

INSERT INTO `jobcategory_t` (`CATEGORY_ID`, `CATEGORYNAME`, `status`) VALUES
(1, 'Information Technology', 0),
(2, 'Engineering', 0),
(3, 'Human Resource', 0),
(4, 'Health Care / Medical', 0),
(5, 'Hospitality', 0),
(6, 'aa', 1),
(7, 'j', 1),
(8, 'j1asd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobdocs_t`
--

CREATE TABLE `jobdocs_t` (
  `JORDER_ID` int(11) DEFAULT NULL,
  `REQ_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobdocs_t`
--

INSERT INTO `jobdocs_t` (`JORDER_ID`, `REQ_ID`) VALUES
(1, 12),
(1, 13),
(2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `jobfees_t`
--

CREATE TABLE `jobfees_t` (
  `JORDER_ID` int(11) NOT NULL,
  `FEE_ID` int(11) NOT NULL,
  `AMOUNT` int(11) DEFAULT NULL,
  `JFTYPE` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobfees_t`
--

INSERT INTO `jobfees_t` (`JORDER_ID`, `FEE_ID`, `AMOUNT`, `JFTYPE`) VALUES
(1, 3, 12434, NULL),
(2, 1, 119, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `joborder_t`
--

CREATE TABLE `joborder_t` (
  `JORDER_ID` int(11) NOT NULL,
  `EMPLOYER_ID` int(11) DEFAULT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `JOB_ID` int(11) DEFAULT NULL,
  `REQAPP` int(11) DEFAULT NULL,
  `SALARY` int(11) DEFAULT NULL,
  `GENDER` int(1) DEFAULT NULL,
  `HEIGHTREQ` varchar(10) DEFAULT NULL,
  `WEIGHTREQ` varchar(10) DEFAULT NULL,
  `CNTRCTSTART` date DEFAULT NULL,
  `CNTRCTEND` date DEFAULT NULL,
  `CNTRCTSTAT` varchar(30) DEFAULT NULL,
  `MIN` varchar(50) DEFAULT NULL,
  `MAX` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joborder_t`
--

INSERT INTO `joborder_t` (`JORDER_ID`, `EMPLOYER_ID`, `CATEGORY_ID`, `JOB_ID`, `REQAPP`, `SALARY`, `GENDER`, `HEIGHTREQ`, `WEIGHTREQ`, `CNTRCTSTART`, `CNTRCTEND`, `CNTRCTSTAT`, `MIN`, `MAX`, `status`) VALUES
(1, 1, 1, 2, 123, 123, 1, '234', '345', '2018-02-28', NULL, NULL, NULL, NULL, 0),
(2, 1, 1, 2, 12, 23, 2, '34', '45', '2018-02-28', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobskills_t`
--

CREATE TABLE `jobskills_t` (
  `JORDER_ID` int(11) DEFAULT NULL,
  `SKILL_ID` int(11) DEFAULT NULL,
  `PROFLEVEL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobskills_t`
--

INSERT INTO `jobskills_t` (`JORDER_ID`, `SKILL_ID`, `PROFLEVEL`) VALUES
(1, 7, 4),
(2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `jobtype_t`
--

CREATE TABLE `jobtype_t` (
  `JOBTYPE_ID` int(11) NOT NULL,
  `TYPENAME` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobtype_t`
--

INSERT INTO `jobtype_t` (`JOBTYPE_ID`, `TYPENAME`, `status`) VALUES
(2, 'Skilled', 0),
(3, 'Vulnerable', 1),
(4, 'aa', 1),
(5, 'as', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_t`
--

CREATE TABLE `job_t` (
  `JOB_ID` int(11) NOT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `JOBNAME` varchar(30) NOT NULL,
  `JOBTYPE_ID` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_t`
--

INSERT INTO `job_t` (`JOB_ID`, `CATEGORY_ID`, `JOBNAME`, `JOBTYPE_ID`, `status`) VALUES
(2, 1, 'Web Developer', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logs_t`
--

CREATE TABLE `logs_t` (
  `LOG_ID` int(11) NOT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  `INTIME` datetime DEFAULT NULL,
  `OUTTIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payables_t`
--

CREATE TABLE `payables_t` (
  `APP_NO` int(11) NOT NULL,
  `APP_ID` int(11) NOT NULL,
  `FEE_ID` int(11) DEFAULT NULL,
  `FEESTATUS` varchar(30) NOT NULL,
  `DATEPAID` date DEFAULT NULL,
  `PAY_ID` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `placementfee_t`
--

CREATE TABLE `placementfee_t` (
  `JORDER_ID` int(11) DEFAULT NULL,
  `PLACEMENT` decimal(11,0) DEFAULT NULL,
  `PTYPE` varchar(30) DEFAULT NULL,
  `PERCENT` int(11) DEFAULT NULL,
  `PAYMENTTYPE` varchar(30) DEFAULT NULL,
  `NOOFPAYMENTS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receipts_t`
--

CREATE TABLE `receipts_t` (
  `PAY_ID` char(6) NOT NULL,
  `APP_ID` int(11) NOT NULL,
  `AMOUNT` int(11) DEFAULT NULL,
  `PAYMENT` int(11) DEFAULT NULL,
  `CHNGE` int(11) DEFAULT NULL,
  `RDATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specskills_t`
--

CREATE TABLE `specskills_t` (
  `Job_id` int(11) DEFAULT NULL,
  `Skill_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specskills_t`
--

INSERT INTO `specskills_t` (`Job_id`, `Skill_id`) VALUES
(2, 2),
(2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `EMP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `EMP_ID`) VALUES
(1, 'admin', '$2y$10$vaI0AWpAafhxAHb2wZy8pOxax2pYmd0g9WC9EBgyAi2VXpAL1qIia', 'T04iz4TCRXN3QxaH5qUtmGDfjFeS2wksE9L4YJMcPGGjnS2reQjsTFwtoYSy', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appaddress_t`
--
ALTER TABLE `appaddress_t`
  ADD KEY `APP_ID` (`APP_ID`);

--
-- Indexes for table `appchildren_t`
--
ALTER TABLE `appchildren_t`
  ADD KEY `APP_ID` (`APP_ID`);

--
-- Indexes for table `appcontact_t`
--
ALTER TABLE `appcontact_t`
  ADD KEY `APP_ID` (`APP_ID`);

--
-- Indexes for table `appdoc_t`
--
ALTER TABLE `appdoc_t`
  ADD KEY `APP_NO` (`APP_NO`),
  ADD KEY `APP_ID` (`APP_ID`),
  ADD KEY `REQ_ID` (`REQ_ID`);

--
-- Indexes for table `applications_t`
--
ALTER TABLE `applications_t`
  ADD PRIMARY KEY (`APP_NO`),
  ADD KEY `APP_ID` (`APP_ID`),
  ADD KEY `JORDER_ID` (`JORDER_ID`),
  ADD KEY `EMPLOYER_ID` (`EMPLOYER_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`,`JOB_ID`);

--
-- Indexes for table `apppersonal_t`
--
ALTER TABLE `apppersonal_t`
  ADD PRIMARY KEY (`APP_ID`);

--
-- Indexes for table `appschool_t`
--
ALTER TABLE `appschool_t`
  ADD KEY `APP_ID` (`APP_ID`);

--
-- Indexes for table `appskills_t`
--
ALTER TABLE `appskills_t`
  ADD KEY `APP_ID` (`APP_ID`),
  ADD KEY `SKILL_ID` (`SKILL_ID`);

--
-- Indexes for table `appworkex_t`
--
ALTER TABLE `appworkex_t`
  ADD KEY `APP_ID` (`APP_ID`);

--
-- Indexes for table `app_t`
--
ALTER TABLE `app_t`
  ADD PRIMARY KEY (`APP_ID`),
  ADD KEY `JOB_ID` (`JOB_ID`);

--
-- Indexes for table `banksallowed_t`
--
ALTER TABLE `banksallowed_t`
  ADD KEY `COUNTRY_ID` (`COUNTRY_ID`),
  ADD KEY `BANK_ID` (`BANK_ID`);

--
-- Indexes for table `banks_t`
--
ALTER TABLE `banks_t`
  ADD PRIMARY KEY (`BANK_ID`);

--
-- Indexes for table `countryreqs_t`
--
ALTER TABLE `countryreqs_t`
  ADD KEY `COUNTRY_ID` (`COUNTRY_ID`),
  ADD KEY `REQ_ID` (`REQ_ID`);

--
-- Indexes for table `country_t`
--
ALTER TABLE `country_t`
  ADD PRIMARY KEY (`COUNTRY_ID`);

--
-- Indexes for table `currency_t`
--
ALTER TABLE `currency_t`
  ADD PRIMARY KEY (`CURRENCY_ID`),
  ADD KEY `COUNTRY_ID` (`COUNTRY_ID`);

--
-- Indexes for table `employer_t`
--
ALTER TABLE `employer_t`
  ADD PRIMARY KEY (`EMPLOYER_ID`),
  ADD KEY `COUNTRY_ID` (`COUNTRY_ID`);

--
-- Indexes for table `emp_t`
--
ALTER TABLE `emp_t`
  ADD PRIMARY KEY (`EMP_ID`);

--
-- Indexes for table `feetype_t`
--
ALTER TABLE `feetype_t`
  ADD KEY `FEE_ID` (`FEE_ID`),
  ADD KEY `JOBTYPE_ID` (`JOBTYPE_ID`);

--
-- Indexes for table `genfees_t`
--
ALTER TABLE `genfees_t`
  ADD PRIMARY KEY (`FEE_ID`);

--
-- Indexes for table `genreqs_t`
--
ALTER TABLE `genreqs_t`
  ADD PRIMARY KEY (`REQ_ID`);

--
-- Indexes for table `genskills_t`
--
ALTER TABLE `genskills_t`
  ADD PRIMARY KEY (`SKILL_ID`);

--
-- Indexes for table `jobcategory_t`
--
ALTER TABLE `jobcategory_t`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `jobdocs_t`
--
ALTER TABLE `jobdocs_t`
  ADD KEY `JORDER_ID` (`JORDER_ID`),
  ADD KEY `REQ_ID` (`REQ_ID`);

--
-- Indexes for table `jobfees_t`
--
ALTER TABLE `jobfees_t`
  ADD KEY `JORDER_ID` (`JORDER_ID`),
  ADD KEY `FEE_ID` (`FEE_ID`);

--
-- Indexes for table `joborder_t`
--
ALTER TABLE `joborder_t`
  ADD PRIMARY KEY (`JORDER_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`,`JOB_ID`),
  ADD KEY `EMPLOYER_ID` (`EMPLOYER_ID`);

--
-- Indexes for table `jobskills_t`
--
ALTER TABLE `jobskills_t`
  ADD KEY `JORDER_ID` (`JORDER_ID`),
  ADD KEY `SKILL_ID` (`SKILL_ID`);

--
-- Indexes for table `jobtype_t`
--
ALTER TABLE `jobtype_t`
  ADD PRIMARY KEY (`JOBTYPE_ID`);

--
-- Indexes for table `job_t`
--
ALTER TABLE `job_t`
  ADD PRIMARY KEY (`JOB_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`),
  ADD KEY `JOBTYPE_ID` (`JOBTYPE_ID`);

--
-- Indexes for table `logs_t`
--
ALTER TABLE `logs_t`
  ADD PRIMARY KEY (`LOG_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `payables_t`
--
ALTER TABLE `payables_t`
  ADD KEY `APP_NO` (`APP_NO`),
  ADD KEY `APP_ID` (`APP_ID`),
  ADD KEY `FEE_ID` (`FEE_ID`),
  ADD KEY `PAY_ID` (`PAY_ID`);

--
-- Indexes for table `placementfee_t`
--
ALTER TABLE `placementfee_t`
  ADD KEY `JORDER_ID` (`JORDER_ID`);

--
-- Indexes for table `receipts_t`
--
ALTER TABLE `receipts_t`
  ADD PRIMARY KEY (`PAY_ID`),
  ADD KEY `APP_ID` (`APP_ID`);

--
-- Indexes for table `specskills_t`
--
ALTER TABLE `specskills_t`
  ADD KEY `Job_id` (`Job_id`),
  ADD KEY `Skill_id` (`Skill_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`EMP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appaddress_t`
--
ALTER TABLE `appaddress_t`
  MODIFY `APP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appchildren_t`
--
ALTER TABLE `appchildren_t`
  MODIFY `APP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appcontact_t`
--
ALTER TABLE `appcontact_t`
  MODIFY `APP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appdoc_t`
--
ALTER TABLE `appdoc_t`
  MODIFY `APP_NO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications_t`
--
ALTER TABLE `applications_t`
  MODIFY `APP_NO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apppersonal_t`
--
ALTER TABLE `apppersonal_t`
  MODIFY `APP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appschool_t`
--
ALTER TABLE `appschool_t`
  MODIFY `APP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appskills_t`
--
ALTER TABLE `appskills_t`
  MODIFY `APP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appworkex_t`
--
ALTER TABLE `appworkex_t`
  MODIFY `APP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `app_t`
--
ALTER TABLE `app_t`
  MODIFY `APP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banks_t`
--
ALTER TABLE `banks_t`
  MODIFY `BANK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country_t`
--
ALTER TABLE `country_t`
  MODIFY `COUNTRY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `currency_t`
--
ALTER TABLE `currency_t`
  MODIFY `CURRENCY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employer_t`
--
ALTER TABLE `employer_t`
  MODIFY `EMPLOYER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_t`
--
ALTER TABLE `emp_t`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `genfees_t`
--
ALTER TABLE `genfees_t`
  MODIFY `FEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genreqs_t`
--
ALTER TABLE `genreqs_t`
  MODIFY `REQ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `genskills_t`
--
ALTER TABLE `genskills_t`
  MODIFY `SKILL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobcategory_t`
--
ALTER TABLE `jobcategory_t`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `joborder_t`
--
ALTER TABLE `joborder_t`
  MODIFY `JORDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobtype_t`
--
ALTER TABLE `jobtype_t`
  MODIFY `JOBTYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_t`
--
ALTER TABLE `job_t`
  MODIFY `JOB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs_t`
--
ALTER TABLE `logs_t`
  MODIFY `LOG_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payables_t`
--
ALTER TABLE `payables_t`
  MODIFY `APP_NO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipts_t`
--
ALTER TABLE `receipts_t`
  MODIFY `APP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appaddress_t`
--
ALTER TABLE `appaddress_t`
  ADD CONSTRAINT `appaddress_t_ibfk_1` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appaddress_t_ibfk_2` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appaddress_t_ibfk_3` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appchildren_t`
--
ALTER TABLE `appchildren_t`
  ADD CONSTRAINT `appchildren_t_ibfk_1` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appchildren_t_ibfk_2` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appchildren_t_ibfk_3` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appdoc_t`
--
ALTER TABLE `appdoc_t`
  ADD CONSTRAINT `appdoc_t_ibfk_3` FOREIGN KEY (`REQ_ID`) REFERENCES `genreqs_t` (`REQ_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `appdoc_t_ibfk_4` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appdoc_t_ibfk_5` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appdoc_t_ibfk_6` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appdoc_t_ibfk_7` FOREIGN KEY (`APP_NO`) REFERENCES `applications_t` (`APP_NO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applications_t`
--
ALTER TABLE `applications_t`
  ADD CONSTRAINT `applications_t_ibfk_2` FOREIGN KEY (`JORDER_ID`) REFERENCES `joborder_t` (`JORDER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_t_ibfk_3` FOREIGN KEY (`EMPLOYER_ID`) REFERENCES `employer_t` (`EMPLOYER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_t_ibfk_4` FOREIGN KEY (`CATEGORY_ID`,`JOB_ID`) REFERENCES `job_t` (`CATEGORY_ID`, `JOB_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_t_ibfk_5` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_t_ibfk_6` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_t_ibfk_7` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apppersonal_t`
--
ALTER TABLE `apppersonal_t`
  ADD CONSTRAINT `apppersonal_t_ibfk_1` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apppersonal_t_ibfk_2` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apppersonal_t_ibfk_3` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appschool_t`
--
ALTER TABLE `appschool_t`
  ADD CONSTRAINT `appschool_t_ibfk_1` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appschool_t_ibfk_2` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appschool_t_ibfk_3` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appskills_t`
--
ALTER TABLE `appskills_t`
  ADD CONSTRAINT `appskills_t_ibfk_2` FOREIGN KEY (`SKILL_ID`) REFERENCES `genskills_t` (`SKILL_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `appskills_t_ibfk_3` FOREIGN KEY (`SKILL_ID`) REFERENCES `genskills_t` (`SKILL_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appskills_t_ibfk_4` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appskills_t_ibfk_5` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appskills_t_ibfk_6` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appworkex_t`
--
ALTER TABLE `appworkex_t`
  ADD CONSTRAINT `appworkex_t_ibfk_1` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appworkex_t_ibfk_2` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appworkex_t_ibfk_3` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `app_t`
--
ALTER TABLE `app_t`
  ADD CONSTRAINT `app_t_ibfk_1` FOREIGN KEY (`JOB_ID`) REFERENCES `job_t` (`JOB_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `banksallowed_t`
--
ALTER TABLE `banksallowed_t`
  ADD CONSTRAINT `banksallowed_t_ibfk_1` FOREIGN KEY (`COUNTRY_ID`) REFERENCES `country_t` (`COUNTRY_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `banksallowed_t_ibfk_2` FOREIGN KEY (`BANK_ID`) REFERENCES `banks_t` (`BANK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `countryreqs_t`
--
ALTER TABLE `countryreqs_t`
  ADD CONSTRAINT `countryreqs_t_ibfk_1` FOREIGN KEY (`COUNTRY_ID`) REFERENCES `country_t` (`COUNTRY_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `countryreqs_t_ibfk_2` FOREIGN KEY (`REQ_ID`) REFERENCES `genreqs_t` (`REQ_ID`) ON DELETE CASCADE;

--
-- Constraints for table `currency_t`
--
ALTER TABLE `currency_t`
  ADD CONSTRAINT `currency_t_ibfk_1` FOREIGN KEY (`COUNTRY_ID`) REFERENCES `country_t` (`COUNTRY_ID`) ON DELETE CASCADE;

--
-- Constraints for table `employer_t`
--
ALTER TABLE `employer_t`
  ADD CONSTRAINT `employer_t_ibfk_1` FOREIGN KEY (`COUNTRY_ID`) REFERENCES `country_t` (`COUNTRY_ID`) ON DELETE CASCADE;

--
-- Constraints for table `feetype_t`
--
ALTER TABLE `feetype_t`
  ADD CONSTRAINT `feetype_t_ibfk_1` FOREIGN KEY (`FEE_ID`) REFERENCES `genfees_t` (`FEE_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `feetype_t_ibfk_2` FOREIGN KEY (`JOBTYPE_ID`) REFERENCES `jobtype_t` (`JOBTYPE_ID`) ON DELETE CASCADE;

--
-- Constraints for table `jobdocs_t`
--
ALTER TABLE `jobdocs_t`
  ADD CONSTRAINT `jobdocs_t_ibfk_1` FOREIGN KEY (`JORDER_ID`) REFERENCES `joborder_t` (`JORDER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobdocs_t_ibfk_4` FOREIGN KEY (`REQ_ID`) REFERENCES `genreqs_t` (`REQ_ID`) ON DELETE CASCADE;

--
-- Constraints for table `jobfees_t`
--
ALTER TABLE `jobfees_t`
  ADD CONSTRAINT `jobfees_t_ibfk_1` FOREIGN KEY (`JORDER_ID`) REFERENCES `joborder_t` (`JORDER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobfees_t_ibfk_2` FOREIGN KEY (`FEE_ID`) REFERENCES `genfees_t` (`FEE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `joborder_t`
--
ALTER TABLE `joborder_t`
  ADD CONSTRAINT `joborder_t_ibfk_1` FOREIGN KEY (`CATEGORY_ID`,`JOB_ID`) REFERENCES `job_t` (`CATEGORY_ID`, `JOB_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `joborder_t_ibfk_2` FOREIGN KEY (`EMPLOYER_ID`) REFERENCES `employer_t` (`EMPLOYER_ID`) ON DELETE CASCADE;

--
-- Constraints for table `jobskills_t`
--
ALTER TABLE `jobskills_t`
  ADD CONSTRAINT `jobskills_t_ibfk_1` FOREIGN KEY (`JORDER_ID`) REFERENCES `joborder_t` (`JORDER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobskills_t_ibfk_4` FOREIGN KEY (`SKILL_ID`) REFERENCES `genskills_t` (`SKILL_ID`) ON DELETE CASCADE;

--
-- Constraints for table `job_t`
--
ALTER TABLE `job_t`
  ADD CONSTRAINT `job_t_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `jobcategory_t` (`CATEGORY_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_t_ibfk_2` FOREIGN KEY (`JOBTYPE_ID`) REFERENCES `jobtype_t` (`JOBTYPE_ID`) ON DELETE CASCADE;

--
-- Constraints for table `logs_t`
--
ALTER TABLE `logs_t`
  ADD CONSTRAINT `logs_t_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `emp_t` (`EMP_ID`);

--
-- Constraints for table `payables_t`
--
ALTER TABLE `payables_t`
  ADD CONSTRAINT `payables_t_ibfk_3` FOREIGN KEY (`FEE_ID`) REFERENCES `genfees_t` (`FEE_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `payables_t_ibfk_4` FOREIGN KEY (`PAY_ID`) REFERENCES `receipts_t` (`PAY_ID`),
  ADD CONSTRAINT `payables_t_ibfk_5` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payables_t_ibfk_6` FOREIGN KEY (`APP_NO`) REFERENCES `applications_t` (`APP_NO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `placementfee_t`
--
ALTER TABLE `placementfee_t`
  ADD CONSTRAINT `placementfee_t_ibfk_1` FOREIGN KEY (`JORDER_ID`) REFERENCES `joborder_t` (`JORDER_ID`) ON DELETE CASCADE;

--
-- Constraints for table `receipts_t`
--
ALTER TABLE `receipts_t`
  ADD CONSTRAINT `receipts_t_ibfk_1` FOREIGN KEY (`APP_ID`) REFERENCES `app_t` (`APP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specskills_t`
--
ALTER TABLE `specskills_t`
  ADD CONSTRAINT `specskills_t_ibfk_1` FOREIGN KEY (`Job_id`) REFERENCES `job_t` (`JOB_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `specskills_t_ibfk_2` FOREIGN KEY (`Skill_id`) REFERENCES `genskills_t` (`SKILL_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
