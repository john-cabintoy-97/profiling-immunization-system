-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 05:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profiling_immunization`
--

-- --------------------------------------------------------

--
-- Table structure for table `individual_treatment`
--

CREATE TABLE `individual_treatment` (
  `individual_treatment_id` int(11) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `modeoftransaction` varchar(50) NOT NULL,
  `dateofconsultation` date NOT NULL,
  `consultationtime` time NOT NULL,
  `bloodpressure` varchar(50) NOT NULL,
  `temperature` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `nameattendingprovider` varchar(50) NOT NULL,
  `natureofvisit` varchar(50) NOT NULL,
  `typeofconsultationpurposeofvisit` varchar(50) NOT NULL,
  `refferedfrom` varchar(50) NOT NULL,
  `refferedto` varchar(50) NOT NULL,
  `reasonforreferral` varchar(50) NOT NULL,
  `refferedby` varchar(50) NOT NULL,
  `cheifcomplaints` text NOT NULL,
  `diagnosis` text NOT NULL,
  `medicaltreatment` text NOT NULL,
  `nameofhealthprovider` varchar(50) NOT NULL,
  `labfindingsimpression` text NOT NULL,
  `performedlabtest` varchar(50) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_enrollement`
--

CREATE TABLE `patient_enrollement` (
  `patient_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `bloodtype` varchar(50) NOT NULL,
  `spousename` varchar(100) NOT NULL,
  `civilstatus` varchar(100) NOT NULL,
  `educationalattainment` varchar(100) NOT NULL,
  `employmentstatus` varchar(100) NOT NULL,
  `familymember` varchar(100) NOT NULL,
  `facilitycode` varchar(100) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `contactnumber` varchar(50) NOT NULL,
  `mothersname` varchar(100) NOT NULL,
  `residentialAddress` varchar(100) NOT NULL,
  `dswdnhts` varchar(50) NOT NULL,
  `facility_no` varchar(100) NOT NULL,
  `fourpsmember` varchar(50) NOT NULL,
  `phmember` varchar(50) NOT NULL,
  `statustype` varchar(50) NOT NULL,
  `phealthno` varchar(100) NOT NULL,
  `membercategory` varchar(100) NOT NULL,
  `psbmember` varchar(50) NOT NULL,
  `schedule` date NOT NULL,
  `schedule_status` varchar(50) NOT NULL,
  `users_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record_four`
--

CREATE TABLE `record_four` (
  `record_four_id` int(11) NOT NULL,
  `feeding_six_months` varchar(50) NOT NULL,
  `feeding_six_months_duration` varchar(50) NOT NULL,
  `vitamin_a_date` date NOT NULL,
  `mnp_date` date NOT NULL,
  `mmr_date_dose_one` date NOT NULL,
  `nutrional_age_months` varchar(50) NOT NULL,
  `nutrional_length` varchar(50) NOT NULL,
  `nutrional_weight` varchar(50) NOT NULL,
  `nutritional_status` varchar(50) NOT NULL,
  `mmr_date_dose_twi` date NOT NULL,
  `fic_date` date NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record_one`
--

CREATE TABLE `record_one` (
  `record_one_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `mothersname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `facilitycode` varchar(50) NOT NULL,
  `first_time` varchar(50) NOT NULL,
  `delivery` varchar(50) NOT NULL,
  `se_status` varchar(50) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record_three`
--

CREATE TABLE `record_three` (
  `record_three_id` int(11) NOT NULL,
  `opv_first_dose` date NOT NULL,
  `opv_second_dose` date NOT NULL,
  `opv_third_dose` date NOT NULL,
  `pcv_first_dose` date NOT NULL,
  `pcv_second_dose` date NOT NULL,
  `pcv_third_dose` date NOT NULL,
  `ipv_third_dose` date NOT NULL,
  `exlusive_breastfed_one_month` varchar(50) NOT NULL,
  `exlusive_breastfed_one_month_date` date NOT NULL,
  `exlusive_breastfed_two_month` varchar(50) NOT NULL,
  `exlusive_breastfed_two_month_date` date NOT NULL,
  `exlusive_breastfed_three_month` varchar(50) NOT NULL,
  `exlusive_breastfed_three_month_date` date NOT NULL,
  `exlusive_breastfed_four_month` varchar(50) NOT NULL,
  `exlusive_breastfed_four_month_date` date NOT NULL,
  `nutrition_age_month` varchar(50) NOT NULL,
  `nutrition_length_month` varchar(50) NOT NULL,
  `nutrition_weight_month` varchar(50) NOT NULL,
  `nutrition_status_month` varchar(50) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record_two`
--

CREATE TABLE `record_two` (
  `record_two_id` int(11) NOT NULL,
  `length_birth` varchar(50) NOT NULL,
  `weight_birth` varchar(50) NOT NULL,
  `weight_birth_status` varchar(50) NOT NULL,
  `breast_feeding` date NOT NULL,
  `bcg` date NOT NULL,
  `bbd` date NOT NULL,
  `nutrition_age_months` varchar(50) NOT NULL,
  `nutrition_length` varchar(50) NOT NULL,
  `nutrition_length_date` date NOT NULL,
  `nutrition_weight` varchar(50) NOT NULL,
  `nutrition_weight_date` date NOT NULL,
  `nutrition_status` varchar(50) NOT NULL,
  `low_birth_first_month` date NOT NULL,
  `low_birth_second_month` date NOT NULL,
  `low_birth_third_month` date NOT NULL,
  `immunization_first_dose` date NOT NULL,
  `immunization_second_dose` date NOT NULL,
  `immunization_third_dose` date NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `childname` varchar(100) NOT NULL,
  `schedule_time` time NOT NULL,
  `schedule_date` date NOT NULL,
  `patient_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_logs`
--

CREATE TABLE `sms_logs` (
  `sms_log_id` int(11) NOT NULL,
  `sender_name` varchar(50) NOT NULL,
  `contactnumber` varchar(50) NOT NULL,
  `childname` varchar(50) NOT NULL,
  `schedule_time` time NOT NULL,
  `schedule_date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
