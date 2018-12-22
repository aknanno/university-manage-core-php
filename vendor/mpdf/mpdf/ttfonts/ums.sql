-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2017 at 12:53 PM
-- Server version: 10.0.29-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ums`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'codex@gmail.com', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `assign_course`
--

CREATE TABLE `assign_course` (
  `assign_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `assign_teacher_name` varchar(50) NOT NULL,
  `assign_course_code` varchar(30) NOT NULL,
  `assign_course_credit` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assign_course`
--

INSERT INTO `assign_course` (`assign_id`, `teacher_id`, `assign_teacher_name`, `assign_course_code`, `assign_course_credit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 19, 'Sumon Mahmud', 'CS-115', '3', '2017-02-16 05:02:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_credit` varchar(10) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `course_department` varchar(50) NOT NULL,
  `course_semester_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `course_name`, `course_credit`, `course_description`, `course_department`, `course_semester_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(30, 'CS-115', 'Introduction to Computing', '3', 'This is a fundamental course for CSE. ', 'Computer Science & Engineering', 1, '2017-02-16 01:02:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'BS-104', 'Calculus', '3', 'This is most important course for engineering.', 'Computer Science & Engineering', 1, '2017-02-16 02:02:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'BS-107', 'Applied Physics', '4', 'This is Physics based course.', 'Computer Science & Engineering', 1, '2017-02-16 02:02:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'TE-151', 'Electric Circuits Analysis', '4', 'This is Electrical based course.', 'Computer Science & Engineering', 1, '2017-02-16 02:02:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'EEE-1102', 'Basic Electrical & Electronic Engineering Sessiona', '1.5', 'No description.', 'Electrical & Electronic Engineering', 1, '2017-02-16 02:02:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'EEE-1101', 'Basic Electrical & Electronic Engineering', '3', 'This is Electrical course.', 'Electrical & Electronic Engineering', 1, '2017-02-16 02:02:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Ph-1201', 'Physics-I', '3', 'This is Physics course.', 'Electrical & Electronic Engineering', 1, '2017-02-16 02:02:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Ph-1202', 'Physics-I  Sessional', '1.5', 'This is just practical course.', 'Electrical & Electronic Engineering', 1, '2017-02-16 02:02:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'CS-126', 'Object Oriented Programming', '4', 'This is a programming course.', 'Telecommunication Engineering', 1, '2017-02-16 02:02:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'TE-152', 'Electronic Devices & Circuits', '4', 'This is an electrical course.', 'Telecommunication Engineering', 1, '2017-02-16 02:02:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'CS-128', 'Computer Aided Engineering Design', '1.5', 'This is a practical course.', 'Telecommunication Engineering', 1, '2017-02-16 02:02:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'BS-108', 'Linear Algebra & Analytical Geometry', '3', 'This is an .........', 'Telecommunication Engineering', 1, '2017-02-16 02:02:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'CE-1001', 'Surveying', '4', 'This is CE course', 'Faculty of Civil Engineering', 1, '2017-02-16 03:02:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'CE-1002', 'Surveying Sessional', '1.5', 'This is just practical course', 'Faculty of Civil Engineering', 1, '2017-02-16 03:02:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'CE-1003', 'Engineering Materials-I', '2', 'This is most important for CE.', 'Faculty of Civil Engineering', 1, '2017-02-16 03:02:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'CE-1004', 'Engineering Materials-I Sessional', '1.5', 'This is a practical course.', 'Faculty of Civil Engineering', 1, '2017-02-16 03:02:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Days`
--

CREATE TABLE `Days` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Days`
--

INSERT INTO `Days` (`day_id`, `day_name`) VALUES
(7, 'Friday'),
(3, 'Monday'),
(1, 'Saturday'),
(2, 'Sunday'),
(6, 'Thursday'),
(4, 'Tuesday'),
(5, 'Wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_code` varchar(8) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_code`, `department_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'CSE-111', 'Computer Science & Engineering', '2017-02-16 01:02:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'EEE-222', 'Electrical & Electronic Engineering', '2017-02-16 01:02:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'BBA-102', 'Bachelor of Business Administration', '2017-02-16 01:02:46', '2017-02-16 04:02:43', '0000-00-00 00:00:00'),
(15, 'T.E-333', 'Telecommunication Engineering', '2017-02-16 01:02:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'FCE-402', 'Faculty of Civil Engineering', '2017-02-16 02:02:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designation_id` int(11) NOT NULL,
  `designation_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lecturer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Professor', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Associate Professor', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Assistant Professor', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Senior Lecturer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_course_student`
--

CREATE TABLE `enroll_course_student` (
  `enroll_id` int(11) NOT NULL,
  `enroll_student_reg_no` varchar(255) NOT NULL,
  `enroll_course_code` varchar(30) NOT NULL,
  `enroll_date` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enroll_course_student`
--

INSERT INTO `enroll_course_student` (`enroll_id`, `enroll_student_reg_no`, `enroll_course_code`, `enroll_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 'CSE-111-2017-101', 'CS-115', '02/16/2017', '2017-02-16 05:02:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'CSE-111-2017-101', 'BS-104', '02/16/2017', '2017-02-16 05:02:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `grade_letter`
--

CREATE TABLE `grade_letter` (
  `grade_id` int(11) NOT NULL,
  `grade_letter` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grade_letter`
--

INSERT INTO `grade_letter` (`grade_id`, `grade_letter`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A+', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'A-', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'B+', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'B', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'B-', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'C+', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'C', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'C-', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'D+', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'D', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'D-', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'F', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `r_student_reg_no` varchar(255) NOT NULL,
  `enroll_course_id` int(11) NOT NULL,
  `letter_grade_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `r_student_reg_no`, `enroll_course_id`, `letter_grade_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'CSE-111-2017-101', 16, 1, '2017-02-16 05:02:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_no` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A-101', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'A-102', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'A-103', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'A-104', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'B-201', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'B-202', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'B-203', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'B-204', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'C-301', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'C-302', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'C-303', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'C-304', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'D-401', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'D-402', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'D-403', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'D-404', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `room_allocation`
--

CREATE TABLE `room_allocation` (
  `alocation_id` int(11) NOT NULL,
  `alocation_department` varchar(255) NOT NULL,
  `alocation_course` varchar(50) NOT NULL,
  `alocation_room` varchar(20) NOT NULL,
  `alocation_day` varchar(50) NOT NULL,
  `alocation_time_from` varchar(20) NOT NULL,
  `alocation_time_to` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_allocation`
--

INSERT INTO `room_allocation` (`alocation_id`, `alocation_department`, `alocation_course`, `alocation_room`, `alocation_day`, `alocation_time_from`, `alocation_time_to`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'Computer Science & Engineering', 'BS-104', 'B-204', 'Tuesday', '15:00', '16:30', '2017-02-16 04:02:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Computer Science & Engineering', 'CS-115', 'A-104', 'Sunday', '10:30', '11:15', '2017-02-16 04:02:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Computer Science & Engineering', 'CS-115', 'A-104', 'Sunday', '11:16', '12:00', '2017-02-16 04:02:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Electrical & Electronic Engineering', 'EEE-1102', 'A-102', 'Saturday', '11:30', '12:15', '2017-02-16 05:02:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1st', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2nd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '3rd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '4th', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '5th', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '6th', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '7th', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '8th', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `registration_no` varchar(255) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `student_mobile` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `student_addresss` varchar(255) NOT NULL,
  `student_department` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `registration_no`, `student_name`, `student_email`, `student_mobile`, `date`, `student_addresss`, `student_department`, `created_at`, `updated_at`, `deleted_at`) VALUES
(25, 'CSE-111-2017-101', 'Mehedi Hasan', 'mehedi@ppi.edu.bd', '01767248797', '02/16/2017', 'Pabna, Dhaka, Pangladesh.', 'Computer Science & Engineering', '2017-02-16 05:02:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'CSE-111-2017-102', 'Imran Hossain', 'imran@gmail.com', '017654986238', '02/16/2017', 'Dhaka, Bangladesh.', 'Computer Science & Engineering', '2017-02-16 05:02:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'CSE-111-2017-103', 'Sazu', 'sazzad7066@yahoo.com', '014265865258', '02/16/2017', 'Dhaka, Bangladesh.', 'Computer Science & Engineering', '2017-02-16 05:02:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'EEE-222-2017-101', 'Shihab Nasifun', 'shihabnasifun89@gmail.com', '014265865258', '02/16/2017', 'Dhaka,Bangladesh.', 'Electrical & Electronic Engineering', '2017-02-16 05:02:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'EEE-222-2017-102', 'Limon', 'limon@gmail.com', '017654986238', '02/16/2017', 'Dhaka, Bangladesh.', 'Electrical & Electronic Engineering', '2017-02-16 05:02:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_address` varchar(255) NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `teacher_contact` varchar(20) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `teacher_department` varchar(50) NOT NULL,
  `teacher_credit` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_address`, `teacher_email`, `teacher_contact`, `designation`, `teacher_department`, `teacher_credit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 'Sumon Mahmud', 'Kustia, Dhaka, Bangladesh.', 'sumon@info.com', '014265865258', 'Lecturer', 'Computer Science & Engineering', '20', '2017-02-16 03:02:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Taimoon Islam', 'Dhaka, Bangladesh.', 'taimoon@gmail.com', '014265865258', 'Professor', 'Computer Science & Engineering', '10', '2017-02-16 03:02:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Mahbuba alom', 'Dhaka, Bangladesh.', 'bithi@gmail.com', '0124879599848', 'Lecturer', 'Computer Science & Engineering', '20', '2017-02-16 03:02:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Mahmudul Hasan Sobuj', 'Pabna, Dhaka, Bangladesh.', 'sobuj@gmail.com', '0148652586', 'Associate Professor', 'Telecommunication Engineering', '20', '2017-02-16 03:02:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Soukot Imran', 'Pabna, Dhaka.', 'soukot@gmail.com', '0148652586', 'Lecturer', 'Electrical & Electronic Engineering', '20', '2017-02-16 03:02:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Rejaul Islam', 'Pabna, Dhaka, Bangladesh.', 'rejaul@gmail.com', '01254789655', 'Assistant Professor', 'Electrical & Electronic Engineering', '20', '2017-02-16 04:02:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Repon Talukdar', 'Rajshahi, Dhaka, Bangladesh.', 'repon@gmail.com', '0148652586', 'Associate Professor', 'Electrical & Electronic Engineering', '15', '2017-02-16 04:02:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Abdul Latif', 'Pabna, Dhaka, Bangladesh.', 'latif@gmail.com', '0148652586', 'Professor', 'Bachelor of Business Administration', '20', '2017-02-16 04:02:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Abdur Razzaq', 'Pabna, Dhaka, Bangladesh.', 'razzaq@gmail.com', '014265865258', 'Senior Lecturer', 'Bachelor of Business Administration', '10', '2017-02-16 04:02:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Abdul hadi', 'Dhaka,Bangladesh.', 'hadi@gmail.com', '01767248797', 'Professor', 'Bachelor of Business Administration', '15', '2017-02-16 04:02:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Md. Shamim Hossain', 'Dhaka,Bangladesh.', 'shamim@yahoo.com', '01729425584', 'Lecturer', 'Telecommunication Engineering', '15', '2017-02-16 04:02:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Farukh Ahmed', 'Dhaka,Bangladesh.', 'farukh@gmail.com', '01748940295', 'Associate Professor', 'Telecommunication Engineering', '25', '2017-02-16 04:02:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Abdul Hai', 'Dhaka, Bangladesh.', 'hai@hotmail.com', '01577395643', 'Senior Lecturer', 'Faculty of Civil Engineering', '10', '2017-02-16 04:02:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Tusar Imran', 'Dhaka,Bangladesh', 'tusar@gmail.com', '01729456767', 'Associate Professor', 'Faculty of Civil Engineering', '20', '2017-02-16 04:02:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Md. Kabel Uddin', 'Dhaka,Bangladesh.', 'kabel@hotmail.com', '0148652586', 'Senior Lecturer', 'Faculty of Civil Engineering', '15', '2017-02-16 04:02:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_course`
--
ALTER TABLE `assign_course`
  ADD PRIMARY KEY (`assign_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `course_code` (`assign_course_code`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_department` (`course_department`),
  ADD KEY `course_semester` (`course_semester_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `course_semester_id` (`course_semester_id`);

--
-- Indexes for table `Days`
--
ALTER TABLE `Days`
  ADD PRIMARY KEY (`day_id`),
  ADD KEY `day_name` (`day_name`),
  ADD KEY `day_id` (`day_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `department_name` (`department_name`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_id`),
  ADD KEY `designation_name` (`designation_name`),
  ADD KEY `designation_id` (`designation_id`),
  ADD KEY `designation_id_2` (`designation_id`);

--
-- Indexes for table `enroll_course_student`
--
ALTER TABLE `enroll_course_student`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `enroll_id` (`enroll_id`),
  ADD KEY `enroll_course_code` (`enroll_course_code`),
  ADD KEY `enroll_student_id` (`enroll_student_reg_no`);

--
-- Indexes for table `grade_letter`
--
ALTER TABLE `grade_letter`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `r_student_reg_no` (`r_student_reg_no`),
  ADD KEY `enroll_course_id` (`enroll_course_id`),
  ADD KEY `letter_grade_id` (`letter_grade_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `room_allocation`
--
ALTER TABLE `room_allocation`
  ADD PRIMARY KEY (`alocation_id`),
  ADD KEY `alocation_department` (`alocation_department`),
  ADD KEY `alocation_course` (`alocation_course`),
  ADD KEY `alocation_room` (`alocation_room`),
  ADD KEY `alocation_day` (`alocation_day`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`),
  ADD KEY `semester_name` (`semester_name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_department` (`student_department`),
  ADD KEY `student_department_2` (`student_department`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `registration_no` (`registration_no`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `teacher_department` (`teacher_department`),
  ADD KEY `teacher_designation_id` (`designation`),
  ADD KEY `designation` (`designation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assign_course`
--
ALTER TABLE `assign_course`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `Days`
--
ALTER TABLE `Days`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `enroll_course_student`
--
ALTER TABLE `enroll_course_student`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `grade_letter`
--
ALTER TABLE `grade_letter`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `room_allocation`
--
ALTER TABLE `room_allocation`
  MODIFY `alocation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_course`
--
ALTER TABLE `assign_course`
  ADD CONSTRAINT `assign_course_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_course_ibfk_2` FOREIGN KEY (`assign_course_code`) REFERENCES `course` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`course_department`) REFERENCES `department` (`department_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`course_semester_id`) REFERENCES `semester` (`semester_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enroll_course_student`
--
ALTER TABLE `enroll_course_student`
  ADD CONSTRAINT `enroll_course_student_ibfk_2` FOREIGN KEY (`enroll_course_code`) REFERENCES `course` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_course_student_ibfk_3` FOREIGN KEY (`enroll_student_reg_no`) REFERENCES `students` (`registration_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`r_student_reg_no`) REFERENCES `students` (`registration_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`enroll_course_id`) REFERENCES `enroll_course_student` (`enroll_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`letter_grade_id`) REFERENCES `grade_letter` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_allocation`
--
ALTER TABLE `room_allocation`
  ADD CONSTRAINT `room_allocation_ibfk_2` FOREIGN KEY (`alocation_course`) REFERENCES `course` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_allocation_ibfk_3` FOREIGN KEY (`alocation_room`) REFERENCES `rooms` (`room_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_allocation_ibfk_4` FOREIGN KEY (`alocation_day`) REFERENCES `Days` (`day_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_allocation_ibfk_5` FOREIGN KEY (`alocation_department`) REFERENCES `department` (`department_name`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`student_department`) REFERENCES `department` (`department_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`teacher_department`) REFERENCES `department` (`department_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_ibfk_3` FOREIGN KEY (`designation`) REFERENCES `designation` (`designation_name`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
