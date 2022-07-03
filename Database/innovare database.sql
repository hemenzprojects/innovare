-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 05, 2021 at 07:51 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `innovare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(225) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `role` enum('manager','admin','account') NOT NULL,
  `password` varchar(225) NOT NULL,
  `ip` varchar(225) NOT NULL,
  `created-at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('archived','active') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `phone`, `role`, `password`, `ip`, `created-at`, `updated_at`, `status`) VALUES
(7, 'Margaret', 'Pobee', 'jthurlare7@gmail.com', '6412432444', 'admin', '$2y$10$0pU01ZGiSShii4Kf1sgwU.00ZXKFeoT71vgY60tW1TiOi6rmELWJq', '::1', '2021-04-27 13:17:29', '2021-04-27 13:17:29', 'active'),
(8, 'Kingston', 'Afranie', 'kingstondelygee@gmail.com', '0559049117', 'admin', '$2y$10$PlRt5LMmdAhIc0ArcpWGnO0fNdJ3Ksi3xO06D/pADaYS3Jt4/E9Ia', '::1', '2021-04-28 07:53:42', '2021-04-28 07:53:42', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(225) NOT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL,
  `status` enum('active','deactivated') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image_url`, `created_at`, `admin_id`, `status`) VALUES
(6, 'https://localhost/innovare/static/app-assets/images/bannerImages/mg-0034-1920x1080.jpg', '2021-05-18 01:43:42', 7, 'deactivated'),
(7, 'https://localhost/innovare/static/app-assets/images/bannerImages/parallax.jpg', '2021-05-18 01:55:51', 7, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `id` int(225) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `url` varchar(225) DEFAULT NULL,
  `extension` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calender`
--

INSERT INTO `calender` (`id`, `name`, `url`, `extension`, `created_at`, `admin_id`) VALUES
(4, 'INNOVARÉ-2021-TRAINING-CALENDAR-1-11', 'https://localhost/innovare/static/app-assets/documents/calender/innovare--2021-training-calendar-1-11-pdf.pdf', 'pdf', '2021-06-03 07:21:05', 7);

-- --------------------------------------------------------

--
-- Table structure for table `career_form`
--

CREATE TABLE `career_form` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `postal_address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alt_phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `area_of_interest` varchar(500) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `career_path` varchar(255) DEFAULT NULL,
  `capabilities` varchar(255) DEFAULT NULL,
  `archivements` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `status` enum('active','archived') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career_form`
--

INSERT INTO `career_form` (`id`, `firstname`, `lastname`, `postal_address`, `phone`, `alt_phone`, `email`, `area_of_interest`, `university`, `degree`, `qualification`, `career_path`, `capabilities`, `archivements`, `resume`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(7, 'Margaret', 'Pobee', '2465 Birch Ave', '6412432444', '', 'jthurlare7@gmail.com', '2, 3', 'Ghana Technology University ', 'Bsc. Information Technology', 'Some qualification', 'I will like to make Money', 'Some capabilities', 'Some Archivements', 'https://localhost/innovare_web/static/assets/images/career-resumes/report.pdf', 'active', '2021-08-16 20:32:41', '2021-08-16 20:32:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `case_study`
--

CREATE TABLE `case_study` (
  `id` int(225) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `category_id` varchar(225) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_study`
--

INSERT INTO `case_study` (`id`, `title`, `slug`, `category_id`, `description`, `thumbnail`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(5, 'New Case study', 'new-case-study', '3', '&lt;h3&gt;The quick, brown fox jumps over a lazy dog.&lt;/h3&gt;\n&lt;p&gt;DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps.&lt;/p&gt;\n&lt;p&gt;Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim.&lt;/p&gt;\n&lt;p&gt;Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! &quot;Now fax quiz Jack! &quot; my brave ghost pled.&lt;/p&gt;\n&lt;p&gt;Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk.&lt;/p&gt;', 'https://localhost/innovare/static/app-assets/images/caseStudyImages/5/paper-3309829-1920.jpg', 'active', '2021-07-02 09:41:01', '2021-07-02 09:41:01', 7);

-- --------------------------------------------------------

--
-- Table structure for table `case_study_cat`
--

CREATE TABLE `case_study_cat` (
  `id` int(225) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_study_cat`
--

INSERT INTO `case_study_cat` (`id`, `name`, `slug`, `created_at`, `updated_at`, `admin_id`) VALUES
(1, 'ISACa', 'isaca', '2021-07-01 15:28:15', '2021-07-01 15:28:15', 7),
(3, 'ECBE', 'ecbe', '2021-07-01 15:49:57', '2021-07-01 15:49:57', 7);

-- --------------------------------------------------------

--
-- Table structure for table `case_study_documents`
--

CREATE TABLE `case_study_documents` (
  `id` int(225) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `extension` varchar(500) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `case_study_id` int(225) DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_study_documents`
--

INSERT INTO `case_study_documents` (`id`, `name`, `extension`, `url`, `case_study_id`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(3, 'report', 'pdf', 'https://localhost/innovare/static/app-assets/documents/caseStudyDocuments/5/report-pdf.pdf', 5, 'active', '2021-07-06 06:49:08', '2021-07-06 06:49:08', 7);

-- --------------------------------------------------------

--
-- Table structure for table `case_study_gallery`
--

CREATE TABLE `case_study_gallery` (
  `id` int(225) NOT NULL,
  `case_study_id` int(225) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_study_gallery`
--

INSERT INTO `case_study_gallery` (`id`, `case_study_id`, `url`, `created_at`, `admin_id`) VALUES
(2, 5, 'https://localhost/innovare/static/app-assets/images/caseStudyImages/5/caseStudyGallery/entrepreneur-4784289-1920.jpg', '2021-07-06 06:38:07', 7);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(225) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status` enum('active','denied') NOT NULL DEFAULT 'denied',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `commet_reply`
--

CREATE TABLE `commet_reply` (
  `id` int(11) NOT NULL,
  `commet_id` int(225) DEFAULT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `comment` text NOT NULL,
  `status` enum('active','denied') NOT NULL DEFAULT 'denied',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consulting_service`
--

CREATE TABLE `consulting_service` (
  `id` int(11) NOT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consulting_service`
--

INSERT INTO `consulting_service` (`id`, `thumbnail`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(2, 'https://localhost/innovare/static/app-assets/images/consultingImages/2/demo-1-bg.jpg', 'Condition Of Work', 'condition-of-work', '&lt;h3&gt;Testing LLL&lt;/h3&gt;\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt;\n&lt;p&gt;Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&lt;/p&gt;\n&lt;p&gt;In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.&lt;/p&gt;\n&lt;p&gt;&lt;img src=&quot;../static/app-assets/images/mediaImages/iso-la-final.jpeg&quot; width=&quot;273&quot; height=&quot;273&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.&lt;/p&gt;\n&lt;p&gt;Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.&lt;/p&gt;', 'active', '2021-08-12 16:51:29', '2021-08-12 17:21:35', 7);

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(225) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `subject` varchar(500) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('read','unread') DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `status`) VALUES
(1, 'Margaret Pobee', 'jthurlare7@gmail.com', 'test message', 'Testing', '2021-08-16 07:54:09', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(225) NOT NULL,
  `phone` varchar(225) DEFAULT NULL,
  `opt_phone` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `opt_email` varchar(225) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `google_location` varchar(500) DEFAULT NULL,
  `p_o_box` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `phone`, `opt_phone`, `email`, `opt_email`, `location`, `google_location`, `p_o_box`, `created_at`, `updated_at`, `admin_id`) VALUES
(1, '6412432444', '6412432444', 'jthurlare7@gmail.com', 'jthurlare7@gmail.com', 'Accra, ghana', 'Atomic junction, Accra Ghana', '2465 Birch Ave', '2021-05-15 12:53:45', '2021-05-15 13:55:27', 7);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `category_id` varchar(225) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `duration` enum('6_weeks','3_months','6_months','1_year','2_years') DEFAULT NULL,
  `price` float DEFAULT NULL,
  `training_type` enum('online','physical','online_and_physical') DEFAULT NULL,
  `instructor` varchar(225) DEFAULT NULL,
  `code` varchar(225) DEFAULT NULL,
  `thumbnail` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(225) DEFAULT NULL,
  `status` enum('archived','active') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `slug`, `category_id`, `description`, `duration`, `price`, `training_type`, `instructor`, `code`, `thumbnail`, `created_at`, `updated_at`, `admin_id`, `status`) VALUES
(6, 'My Dreams', 'my-dreams', '2, 3', '&lt;p&gt;Rick and Morty Style&lt;/p&gt;\n&lt;p&gt;Pickle rick&lt;br /&gt;&lt;br /&gt;younging Rick&lt;/p&gt;', '3_months', 1000, 'physical', '9', '1234', 'https://localhost/innovare/static/app-assets/images/courseImages/6/risk-online-ads-samuel-3-1-870x489.jpg', '2021-05-20 09:49:38', '2021-08-18 10:12:54', 7, 'active'),
(7, 'COMPUTER HACKING AND FORENSICS INVESTIGATOR (CHFI)', 'computer-hacking-and-forensics-investigator-chfi-', '1, 3', '&lt;div class=&quot;elementor-element elementor-element-aqyxiuw elementor-widget elementor-widget-text-editor&quot; data-id=&quot;aqyxiuw&quot; data-element_type=&quot;text-editor.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-text-editor elementor-clearfix&quot;&gt;\n&lt;p&gt;Innovare is management consulting ﬁrm focused on information security, IT risk, IT audit and IT Governance. We provide training, consulting and thought leadership opportunities. We train and implement global best practices and standards. We have special skills in Information/cyber Security Management Systems where we have strong competencies in ISO 27001, PCI, Cobit, IT Audit Services, Cyber Crime Investigations, Cyber Law and the entire spectrum of IT Security training requirements. Our delivery methodology is built on forming partnerships with our clients based on trust and professionalism.&lt;/p&gt;\n&lt;p&gt;Innovare&amp;rsquo;s CHFI v9 covers detailed methodological approach to computer forensic and evidence analysis. It provides the necessary skillset for identiﬁcation of intruder&amp;rsquo;s footprints and gathering necessary evidence for its prosecution. All major tools and theories used by cyber forensic industry are covered in the curriculum.&lt;/p&gt;\n&lt;p&gt;The certiﬁcation can fortify the applied knowledge level of law enforcement personnel, system administrators, security oﬃcers, defense and military personnel, legal professionals, bankers, computer and network security professionals, and anyone who is concerned about the integrity of the network and digital investigations.&lt;/p&gt;\n&lt;p&gt;Innovare is an EC-Council ATC (Accredited Training Center). We are leaders in professional certiﬁcation training in Cyber Security, IT risk, IT audit, information security and IT Governance. Our instructors are practitioners with years of practical experience.&lt;/p&gt;\n&lt;p&gt;Our various training &amp;amp; preparation programs are as follows:&lt;/p&gt;\n&lt;h2&gt;Oﬃcial Course Review&lt;/h2&gt;\n&lt;p&gt;This training delivery will cover the entire syllabus within the 14 module areas. You can take the course as a 5-day boot camp or ﬁve 8 hour sessions on Saturdays.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h2&gt;The Course Agenda&lt;/h2&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;Computer forensics in today&amp;rsquo;s world&lt;/li&gt;\n&lt;li&gt;Computer forensics Investigation Process&lt;/li&gt;\n&lt;li&gt;Understanding hard disks and ﬁle system&lt;/li&gt;\n&lt;li&gt;Data acquisition and duplication&lt;/li&gt;\n&lt;li&gt;Defeating anti-forensics techniques&lt;/li&gt;\n&lt;li&gt;Operating system forensics&lt;/li&gt;\n&lt;li&gt;Network forensics&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;Course Objectives&lt;/strong&gt;&lt;/p&gt;\n&lt;ul style=&quot;list-style-type: circle;&quot;&gt;\n&lt;li&gt;Comprehensive forensics investigation process&lt;/li&gt;\n&lt;li&gt;Investigating web attacks Database&amp;nbsp; forensics Cloud&amp;nbsp;&amp;nbsp; forensics Malware forensics Investigating email crimes Mobile forensics&lt;/li&gt;\n&lt;li&gt;Forensics report writing and presentation&lt;/li&gt;\n&lt;li&gt;Forensics of ﬁle systems, operating systems, network and database, websites and email systems&lt;/li&gt;\n&lt;li&gt;Techniques for investigating on cloud, malware and mobile&lt;/li&gt;\n&lt;li&gt;Data acquisition and analysis as well as anti-forensic techniques&lt;/li&gt;\n&lt;li&gt;Thorough understanding of chain of custody, forensic report and presentation&lt;/li&gt;\n&lt;/ul&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-qcmilpz elementor-widget elementor-widget-spacer&quot; data-id=&quot;qcmilpz&quot; data-element_type=&quot;spacer.default&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-vuqhhfo elementor-widget elementor-widget-spacer&quot; data-id=&quot;vuqhhfo&quot; data-element_type=&quot;spacer.default&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-imykncl elementor-widget elementor-widget-heading&quot; data-id=&quot;imykncl&quot; data-element_type=&quot;heading.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;h2 class=&quot;elementor-heading-title elementor-size-default&quot;&gt;Details&lt;/h2&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-upzezya elementor-widget elementor-widget-text-editor&quot; data-id=&quot;upzezya&quot; data-element_type=&quot;text-editor.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-text-editor elementor-clearfix&quot;&gt;\n&lt;p&gt;Our professionals are industry leaders who understand technical, business, regulatory and legal matters and are seasoned in giving expert testimony. They represent top talent across disciplines, including engineers, architects, accountants, quantity surveyors, planning and scheduling specialists, cost engineers, project managers communications professionals.&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;', '3_months', 1000, 'physical', '7, 9', 'CHFI', 'https://localhost/innovare/static/app-assets/images/courseImages/7/5-1024x682.jpg', '2021-06-03 07:04:07', '2021-08-18 10:14:08', 7, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `course_cat`
--

CREATE TABLE `course_cat` (
  `id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_cat`
--

INSERT INTO `course_cat` (`id`, `name`, `slug`, `created_at`, `update_at`) VALUES
(1, 'ECBE', 'ecbe', '2021-04-28 01:28:58', '2021-05-01 09:06:22'),
(2, 'Innovare', 'innovare', '2021-04-28 01:57:02', '2021-05-01 09:06:22'),
(3, 'ISACA', 'isaca', '2021-04-28 07:47:26', '2021-05-01 09:06:22'),
(5, 'Personal Def', 'personal-def', '2021-05-05 08:43:38', '2021-05-20 11:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `course_document`
--

CREATE TABLE `course_document` (
  `id` int(225) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `extention` varchar(225) DEFAULT NULL,
  `url` varchar(225) NOT NULL,
  `course_id` int(225) DEFAULT NULL,
  `status` enum('free','paid') NOT NULL DEFAULT 'free',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_document`
--

INSERT INTO `course_document` (`id`, `name`, `extention`, `url`, `course_id`, `status`, `created_at`, `admin_id`) VALUES
(5, 'application_letter[]', 'pdf', 'https://localhost/innovare/static/app-assets/documents/courseDocuments/3/application-letter-pdf.pdf', 3, 'free', '2021-05-04 07:53:31', 7),
(7, '1605976610582YDIWx', 'pdf', 'https://localhost/innovare/static/app-assets/documents/courseDocuments/3/1605976610582ydiwx-pdf.pdf', 3, 'paid', '2021-05-04 12:49:45', 7),
(8, 'Innovare Web Application', 'pdf', 'https://localhost/innovare/static/app-assets/documents/courseDocuments/5/innovare-web-application-pdf.pdf', 5, 'free', '2021-05-15 18:39:51', 7),
(9, 'SOW - TECHROI001.xlsx', 'pdf', 'https://localhost/innovare/static/app-assets/documents/courseDocuments/6/sow---techroi001-xlsx-pdf.pdf', 6, 'paid', '2021-05-20 09:55:06', 7),
(10, 'SOW - TECHROI001.xlsx (1)', 'pdf', 'https://localhost/innovare/static/app-assets/documents/courseDocuments/7/sow---techroi001-xlsx-1-pdf.pdf', 7, 'free', '2021-06-03 10:30:58', 7);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(225) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `category_id` varchar(225) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `google_location` varchar(500) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` enum('active','archived','past') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL,
  `pat_register` enum('yes','no') NOT NULL DEFAULT 'yes',
  `duration` enum('one_day','multiple_days') NOT NULL DEFAULT 'one_day'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `category_id`, `description`, `thumbnail`, `location`, `google_location`, `event_date`, `time_from`, `time_to`, `date_from`, `date_to`, `status`, `created_at`, `updated_at`, `admin_id`, `pat_register`, `duration`) VALUES
(1, 'ISACA EVENT', 'isaca-event', '7, 8', '&lt;h1&gt;This is a test&lt;/h1&gt;\n&lt;p&gt;some this test message&lt;/p&gt;', 'https://localhost/innovare/static/app-assets/images/eventImages/1/sky-3335585-1920.jpg', 'office of isaca', 'Atomic junction, Accra Ghana', '2021-05-16', '09:30:00', '12:35:00', NULL, NULL, 'active', '2021-05-09 09:31:02', '2021-05-09 09:31:02', 7, 'no', 'one_day'),
(3, 'This An official Test Event _1', 'this-an-official-test-event-1', '3', '&lt;h2&gt;Official Test Event&lt;/h2&gt;\n&lt;p&gt;This Is an&amp;nbsp;&lt;strong&gt;Official&amp;nbsp;&lt;/strong&gt; Event test input&lt;/p&gt;', 'https://localhost/innovare/static/app-assets/images/eventImages/3/mountains-190055-1280.jpg', 'Innovare Premises', 'ADC innovare premises location', NULL, NULL, NULL, '2021-05-30', '2021-05-30', 'active', '2021-05-09 10:02:44', '2021-05-09 10:02:44', 7, 'yes', 'multiple_days'),
(4, 'ISACA EVENT-11', 'isaca-event-11', '6, 7', '&lt;p&gt;This is new tracks&lt;/p&gt;', 'https://localhost/innovare/static/app-assets/images/eventImages/4/sky-690293-1920.jpg', 'Innovare Premises', 'Atomic junction, Accra Ghana', '2021-06-06', NULL, NULL, '2021-06-06', '2021-06-06', 'active', '2021-05-20 14:28:32', '2021-05-20 14:28:32', 7, 'yes', 'multiple_days');

-- --------------------------------------------------------

--
-- Table structure for table `event_cat`
--

CREATE TABLE `event_cat` (
  `id` int(225) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_cat`
--

INSERT INTO `event_cat` (`id`, `name`, `slug`, `created_at`, `updated_at`, `admin_id`) VALUES
(6, 'ISACA', 'isaca', '2021-05-20 11:53:54', '2021-05-20 11:53:54', 7),
(7, 'PECB', 'pecb', '2021-05-20 11:54:03', '2021-05-20 11:54:03', 7),
(8, 'Innovare', 'innovare', '2021-05-20 11:54:10', '2021-05-20 11:54:10', 7),
(9, 'ADESA', 'adesa', '2021-05-20 11:54:20', '2021-05-20 11:54:20', 7);

-- --------------------------------------------------------

--
-- Table structure for table `event_documents`
--

CREATE TABLE `event_documents` (
  `id` int(225) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `extension` varchar(225) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `event_id` int(225) DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_documents`
--

INSERT INTO `event_documents` (`id`, `name`, `extension`, `url`, `event_id`, `status`, `created_at`, `admin_id`) VALUES
(1, 'Recruitment', 'pdf', 'https://localhost/innovare/static/app-assets/documents/eventDocuments/3/recruitment-pdf.pdf', 3, 'active', '2021-05-09 10:20:14', 7),
(2, 'Impact Week Flyer with Sponsors-2', 'jpg', 'https://localhost/innovare/static/app-assets/documents/eventDocuments/3/impact-week-flyer-with-sponsors-2-jpg.jpg', 3, 'active', '2021-05-09 10:21:23', 7),
(3, 'INNOVARÉ-2021-TRAINING-CALENDAR-1-11', 'pdf', 'https://localhost/innovare/static/app-assets/documents/eventDocuments/3/innovare--2021-training-calendar-1-11-pdf.pdf', 3, 'active', '2021-05-09 10:58:16', 7),
(6, 'SOW - TECHROI001.xlsx', 'pdf', 'https://localhost/innovare/static/app-assets/documents/eventDocuments/4/sow---techroi001-xlsx-pdf.pdf', 4, 'active', '2021-05-20 14:28:48', 7),
(7, 'innovare', 'sql', 'https://localhost/innovare/static/app-assets/documents/eventDocuments/4/innovare-sql.sql', 4, 'active', '2021-05-20 14:29:27', 7);

-- --------------------------------------------------------

--
-- Table structure for table `event_gallery`
--

CREATE TABLE `event_gallery` (
  `id` int(225) NOT NULL,
  `event_id` int(225) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_gallery`
--

INSERT INTO `event_gallery` (`id`, `event_id`, `url`, `created_at`, `admin_id`) VALUES
(5, 3, 'https://localhost/innovare/static/app-assets/images/eventImages/3/eventGallery/iso-la-final.jpeg', '2021-05-09 13:23:56', 7),
(6, 3, 'https://localhost/innovare/static/app-assets/images/eventImages/3/eventGallery/impact-week-flyer-with-sponsors.jpg', '2021-05-09 15:07:50', 7),
(8, 4, 'https://localhost/innovare/static/app-assets/images/eventImages/4/eventGallery/thunderstorm-3441687-1920.jpg', '2021-05-20 14:31:15', 7),
(9, 4, 'https://localhost/innovare/static/app-assets/images/eventImages/4/eventGallery/sky-3335585-1920.jpg', '2021-05-20 14:31:47', 7),
(10, 1, 'https://localhost/innovare/static/app-assets/images/eventImages/1/eventGallery/sky-3335585-1920.jpg', '2021-05-20 15:30:21', 7),
(12, 1, 'https://localhost/innovare/static/app-assets/images/eventImages/1/eventGallery/risk-summit-770x578.jpg', '2021-05-20 15:30:21', 7);

-- --------------------------------------------------------

--
-- Table structure for table `event_paticipant`
--

CREATE TABLE `event_paticipant` (
  `id` int(225) NOT NULL,
  `event_id` int(225) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `phone` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_paticipant`
--

INSERT INTO `event_paticipant` (`id`, `event_id`, `name`, `email`, `phone`, `created_at`) VALUES
(3, 3, 'Margaret Pobee', 'jthurlare7@gmail.com', '6412432444', '2021-06-08 16:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(11) NOT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','archived') DEFAULT 'active',
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `thumbnail`, `title`, `slug`, `excerpt`, `description`, `created_at`, `updated_at`, `status`, `admin_id`) VALUES
(2, 'https://localhost/innovare/static/app-assets/images/industriesImages/2/sky-690293-1920.jpg', 'I have a Dream in you', 'i-have-a-dream-in-you', 'this is a test', '&lt;p&gt;This is a test&lt;/p&gt;', '2021-05-26 06:36:58', '2021-06-08 23:23:50', 'archived', 7),
(3, 'https://localhost/innovare/static/app-assets/images/industriesImages/3/refinery-514010-1920.jpg', 'Oil & Gas', 'oil-gas', 'Do you need a guaranteed level of uptime for your critical Oil and Gas infrastructure, faster incident response times, a disaster recovery plan, technology/business goals alignment, and a strategic partner for your OIL &amp; GAS business technology guidance; Are you flying to an offshore oil platform on a helicopter or entering a high-security petrochemical plant, Liranz Limited Engineers are ready and Safety Certified to handle your day to day onshore and offshore Desktop Support and IT infrastructure.', '&lt;div class=&quot;fl-module fl-module-rich-text fl-node-5eb2bf48825b5&quot; data-node=&quot;5eb2bf48825b5&quot;&gt;\n&lt;div class=&quot;fl-module-content fl-node-content&quot;&gt;\n&lt;div class=&quot;fl-rich-text&quot;&gt;\n&lt;h3&gt;We transform your OIL &amp;amp; GAS OPERATIONS with our unmatched IT consulting Experiences.&amp;nbsp;(Oil &amp;amp; Gas Industry IT Services)&lt;/h3&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;fl-module fl-module-rich-text fl-node-5eb2c9c7dccfd&quot; data-node=&quot;5eb2c9c7dccfd&quot;&gt;\n&lt;div class=&quot;fl-module-content fl-node-content&quot;&gt;\n&lt;div class=&quot;fl-rich-text&quot;&gt;\n&lt;p&gt;Do you need a guaranteed level of uptime for your critical Oil and Gas infrastructure, faster incident response times, a disaster recovery plan, technology/business goals alignment, and a strategic partner for your OIL &amp;amp; GAS business technology guidance; Are you flying to an offshore oil platform on a helicopter or entering a high-security petrochemical plant, Liranz Limited Engineers are ready and Safety Certified to handle your day to day onshore and offshore Desktop Support and IT infrastructure.&lt;/p&gt;\n&lt;p&gt;We have the hard hats! From the &lt;strong&gt;JUBILEE&lt;/strong&gt;, &lt;strong&gt;TWENEBOA&lt;/strong&gt;, &lt;strong&gt;ENYENRA&lt;/strong&gt;, &lt;strong&gt;NTOMME&lt;/strong&gt; &lt;strong&gt;Oilfields&lt;/strong&gt;, on the &lt;strong&gt;MAERSK&lt;/strong&gt; &lt;strong&gt;VENTURER&lt;/strong&gt; AND &lt;strong&gt;STENA&lt;/strong&gt; &lt;strong&gt;FORTH&lt;/strong&gt; Oil Rigs and &lt;strong&gt;KWAME&lt;/strong&gt; &lt;strong&gt;NKRUMAH&lt;/strong&gt; and &lt;strong&gt;ATTA&lt;/strong&gt; &lt;strong&gt;MILLS&lt;/strong&gt; &lt;strong&gt;FPSOs&lt;/strong&gt;; we have provided unparalleled IT services for exploration and drilling works with our very qualified IT Personnel&lt;/p&gt;\n&lt;p&gt;Liranz Limited has been a seasoned Managed IT Services Provider with documented processes and procedures. We have experience in implementing IT solutions for Drilling, Downstream, Midstream, and Upstream operations.&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;', '2021-06-08 23:19:14', '2021-06-08 23:19:14', 'active', 7),
(4, 'https://localhost/innovare/static/app-assets/images/industriesImages/4/skyscraper-3184798-1920.jpg', 'Banking & Financial Services', 'banking-financial-services', 'Technology has been a game changer in the way and manner banking services are being delivered recently. From USSDs, through digital payments, to big data, to cyber security; banks and financial institutions are always under pressure to meet end-user expectations and protect company technology assets.', '&lt;h3&gt;Consulting for Banking Services&lt;/h3&gt;\n&lt;p&gt;Technology has been a game changer in the way and manner banking services are being delivered recently. From USSDs, through digital payments, to big data, to cyber security; banks and financial institutions are always under pressure to meet end-user expectations and protect company technology assets.&lt;/p&gt;\n&lt;p&gt;Business transformation, innovative customer engagement, revenue generation at minimal cost, profit growth and optimization have become major decision drivers for the banking industry.&lt;/p&gt;\n&lt;p&gt;We at Liranz Limited are constantly re-inventing the wheel and looking newer and pragmatic ways to empower to meet the ever-changing demands of the market, customers, partners and the regulators.&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;With our customized IT solutions for banking services, we are a true industry partner providing guidance and solutions on secured IT solutions, regulatory IT compliance, managing Cybersecurity risks, data access policies, as well as data loss prevention.&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;With a deep industrial expertise in IT solutions for banking services. We have provided consulting in core banking softwares and payment solutions, branch automation solutions, enterprise applications for banking operations and infrastructure solutions.&lt;/p&gt;', '2021-06-08 23:23:32', '2021-06-08 23:23:32', 'active', 7),
(5, 'https://localhost/innovare/static/app-assets/images/industriesImages/5/startup-593341-1920.jpg', 'SME’s', 'sme-s', 'MANAGED SERVICES takes a holistic approach to providing excellence in technology services. As managed service provider we offer a comprehensive range of technology services within one or many technology domains. We are a large team of skilled IT professionals creating a superior end-user experience by providing strategic and operational support and enhancements for a wide range of IT applications and services.', '&lt;div class=&quot;fl-module fl-module-vamtam-heading fl-node-5ecc1c142c5e4&quot; data-node=&quot;5ecc1c142c5e4&quot;&gt;\n&lt;div class=&quot;fl-module-content fl-node-content&quot;&gt;\n&lt;h3 class=&quot;vamtam-heading vamtam-font-style-1&quot;&gt;&lt;span class=&quot;vamtam-heading-text&quot;&gt;We are an IT Support Company&lt;/span&gt;&lt;/h3&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;fl-module fl-module-rich-text fl-node-5ecc1c142c5e5&quot; data-node=&quot;5ecc1c142c5e5&quot;&gt;\n&lt;div class=&quot;fl-module-content fl-node-content&quot;&gt;\n&lt;div class=&quot;fl-rich-text&quot;&gt;\n&lt;p&gt;We have provided&amp;nbsp;IT support services&amp;nbsp;to local and multination companies for past 10 years.&amp;nbsp;Focus on growing your business and we&amp;rsquo;ll manage and develop your technology.&amp;nbsp;We understand that no two businesses are the same because every organisation has different goals, different requirements and therefore different expectations.&lt;/p&gt;\n&lt;p&gt;We are a team of support engineers dedicated to providing you the needed&amp;nbsp;business IT support.&amp;nbsp;Our engineers have been trained to support all business sizes and have the required levels of technical expertise. We have a service desk that is active and responsive&amp;nbsp;24/7, 365 days a year.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;div class=&quot;fl-module fl-module-rich-text fl-node-5eb2bf48825b5&quot; data-node=&quot;5eb2bf48825b5&quot;&gt;\n&lt;div class=&quot;fl-module-content fl-node-content&quot;&gt;\n&lt;div class=&quot;fl-rich-text&quot;&gt;\n&lt;p&gt;&lt;strong&gt;At first Glance, most People are tempted to assume that &amp;ldquo;managed services&amp;rdquo; is just a another name for technology outsourcing, especially since the latter can be very confusing.&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;fl-module fl-module-rich-text fl-node-5ecbc33d5542f&quot; data-node=&quot;5ecbc33d5542f&quot;&gt;\n&lt;div class=&quot;fl-module-content fl-node-content&quot;&gt;\n&lt;div class=&quot;fl-rich-text&quot;&gt;\n&lt;p&gt;IT Outsourcing&amp;nbsp;includes handing out discrete services that are responsible for narrowly defined business processes.&amp;nbsp;Some of these might include ; tier-1 helpdesk, someone to take care of a non-IT task like data entry or document scanning.&amp;nbsp;When you outsource, you pick specific services and ask an external company to help address specific business needs.&lt;/p&gt;\n&lt;p&gt;MANAGED SERVICES&amp;nbsp;takes a holistic approach to providing excellence in technology services. As managed service provider we offer a comprehensive range of technology services within one or many technology domains. We are a large team of skilled IT professionals creating a superior end-user experience by providing strategic and operational support and enhancements for a wide range of IT applications and services.&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;', '2021-06-08 23:27:07', '2021-06-08 23:27:07', 'active', 7);

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_transfer`
--

CREATE TABLE `knowledge_transfer` (
  `id` int(225) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `course_cat_id` varchar(225) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `knowledge_transfer`
--

INSERT INTO `knowledge_transfer` (`id`, `title`, `slug`, `course_cat_id`, `thumbnail`, `description`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(2, 'knowledge transfer Test 1', 'knowledge-transfer-test-1', '2, 5', 'https://localhost/innovare/static/app-assets/images/knowledgeImages/2/office-620822-1920.jpg', '&lt;h3&gt;Lorem ipsum dolor sit amet&lt;/h3&gt;\n&lt;p&gt;consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt;\n&lt;p&gt;Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&lt;/p&gt;\n&lt;p&gt;In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.&lt;/p&gt;\n&lt;p&gt;Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.&lt;/p&gt;\n&lt;p&gt;Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.&lt;/p&gt;', 'active', '2021-08-11 01:58:47', '2021-08-11 04:02:45', 7),
(3, 'Cooking hood', 'cooking-hood', '2', 'https://localhost/innovare/static/app-assets/images/knowledgeImages/3/85k-5067.jpg', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&lt;/p&gt;\n&lt;p&gt;In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.&lt;/p&gt;\n&lt;p&gt;Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.&lt;/p&gt;\n&lt;p&gt;Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien.&lt;/p&gt;', 'active', '2021-08-13 00:54:45', '2021-08-13 00:54:45', 7);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(225) NOT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL,
  `status` enum('active','archived') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `image_url`, `created_at`, `admin_id`, `status`) VALUES
(3, 'https://localhost/innovare/static/app-assets/images/mediaImages/impact-week-dinner-ticket.jpg', '2021-05-15 21:55:36', 7, 'active'),
(4, 'https://localhost/innovare/static/app-assets/images/mediaImages/undraw-confirmed-re-sef7.png', '2021-05-15 22:00:56', 7, 'active'),
(5, 'https://localhost/innovare/static/app-assets/images/mediaImages/impact-week-flyer-with-sponsors-2.jpg', '2021-05-15 22:01:15', 7, 'active'),
(6, 'https://localhost/innovare/static/app-assets/images/mediaImages/iso-la-final.jpeg', '2021-05-15 22:02:45', 7, 'active'),
(7, 'https://localhost/innovare/static/app-assets/images/mediaImages/undraw-celebrating-rtuv.png', '2021-05-15 22:03:31', 7, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(225) NOT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `category_id` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` enum('active','draft','archived') NOT NULL DEFAULT 'active',
  `published_date` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image_url`, `title`, `slug`, `category_id`, `description`, `status`, `published_date`, `created_at`, `updated_at`, `admin_id`) VALUES
(1, 'https://localhost/innovare/static/app-assets/images/newsImages/1/img-6038-870x489.jpg', 'PaySwitch led by Kojo Choi (Managing Director) has received certification for ISO 27001', 'payswitch-led-by-kojo-choi-managing-director-has-received-certification-for-iso-27001', '3', '&lt;div class=&quot;entry-content&quot;&gt;\r\n&lt;p&gt;PaySwitch Company Limited, a Ghanaian owned third party payment processor (TPP) is certified as ISO 27001 compliant. This award comes as a validation of the company&amp;rsquo;s strides to provide Ghana with an authentic locally established TPP to banks and other businesses who are driving a digital payment agenda.&lt;/p&gt;\r\n&lt;p&gt;ISO 27001 is an international standard for information security with respect to how risk is managed through an organization&amp;rsquo;s information processes and controls. The certificate is globally recognized and when awarded to an organization, it confirms its compliance to a high standard of Information Security Management System (ISMS). A certified company is equipped to protect the information of both its clients and staff.&lt;/p&gt;\r\n&lt;p&gt;PaySwitch provides integrated payment solutions that facilitates the circulation of money as well as the exchange of value between individuals (C2C); individuals and organizations (C2B); organizations and individuals (B2C); and between organizations (B2B) on a timely and consistent basis. Among the profile of products and solution within issuing and acquiring are: (1) Payment Card [Visa, MasterCard, UnionPay and GhLink] (2) Wallet Services [TELA Wallet and Proprietary Wallet] (3) Loyalty Card / Scheme [Mileage reward programs] (4) Anti-Fraud Solutions (5) Monitoring &amp;amp; Prevention (6) ATM &amp;amp; Smart POS (7) MomoPOS [Mobile Money Point of Sale via Android App and OS] (8) E-commerce (9) QR code.&lt;/p&gt;\r\n&lt;p&gt;At the presentation ceremony held at the premises of the company, Mr. C.K. Bruce (C.E.O &amp;ndash; Innovare) remarked in his speech that, &amp;ldquo;we are honored to be associated with PaySwitch because it is a company that is going to be a stamp in the industry&amp;rdquo;. He continued by saying &amp;ldquo;this certification means that PaySwitch&amp;rsquo;s environment of operation is matured and raised to a global standard&amp;rdquo;.&lt;/p&gt;\r\n&lt;p&gt;Kojo Choi who is the Managing Director of PaySwitch said, &amp;ldquo;I&amp;rsquo;m glad the company is continuously making &amp;nbsp;progress in the Ghanaian market. This certification is part of our growing effort to give Ghana its own authentic third-party payment processing company which then empowers local processing of transactions&amp;rdquo;. He continued, &amp;ldquo;we have done a lot of pioneering work in this space and we believe our clients will have more confidence to grow with us&amp;rdquo;.&lt;/p&gt;\r\n&lt;p&gt;PaySwitch currently is switching and providing various aggregated services to 5 major banks in Ghana and has over 3000 merchants. The company is set to launch the biggest marketplace platform in Ghana in the coming weeks which is estimated to have over two (2) million subscribers from its day of launch.&lt;/p&gt;\r\n&lt;/div&gt;', 'active', '2021-05-16 14:02:36', '2021-05-16 09:48:31', '2021-05-25 23:35:42', 7),
(3, 'https://localhost/innovare/static/app-assets/images/newsImages/3/risk-online-ads-samuel-3-1-870x489.jpg', 'Risk Management and Strategy', 'risk-management-and-strategy', '2', '', 'active', '2021-05-18 09:08:27', '2021-05-18 09:08:27', '2021-05-25 23:35:36', 7),
(4, 'https://localhost/innovare/static/app-assets/images/newsImages/4/risk-online-ads-ck-1-870x489.jpg', 'Paradigms for Implementing Information Security Management', 'paradigms-for-implementing-information-security-management', '3, 4', '&lt;p&gt;&amp;bull;Tuesday 21st April &lt;br /&gt;Speaker: CK &lt;br /&gt;Area: Information Security&amp;nbsp;Management&lt;br /&gt;Topic: Paradigms for Implementing Information Security Management Systems from an African perspective&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;Meeting Recording:&lt;br /&gt;&lt;/strong&gt; &lt;a href=&quot;https://us02web.zoom.us/rec/share/-vAsN-m37UpJZ4Xz4mSCeLIqHI_peaa80yUf-_cLn0h03ftex2alpjB7nbQ6LSPG&quot;&gt;https://us02web.zoom.us/rec/share/-vAsN-m37UpJZ4Xz4mSCeLIqHI_peaa80yUf-_cLn0h03ftex2alpjB7nbQ6LSPG&lt;/a&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;Access Password: &lt;/strong&gt;2o+!?ok4&lt;/p&gt;', 'active', '2021-05-25 11:12:14', '2021-05-25 11:12:14', '2021-05-25 23:45:52', 7);

-- --------------------------------------------------------

--
-- Table structure for table `news_cat`
--

CREATE TABLE `news_cat` (
  `id` int(225) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_cat`
--

INSERT INTO `news_cat` (`id`, `name`, `slug`, `created_at`, `updated_at`, `admin_id`) VALUES
(1, 'ECB', 'ecb', '2021-05-16 00:31:15', '2021-05-16 00:31:15', 7),
(2, 'ISACAA', 'isacaa', '2021-05-16 00:31:21', '2021-05-16 00:31:21', 7),
(3, 'Innovare', 'innovare', '2021-05-16 00:31:36', '2021-05-16 00:31:36', 7),
(4, 'Exercise', 'exercise', '2021-05-16 00:46:52', '2021-05-16 00:46:52', 7);

-- --------------------------------------------------------

--
-- Table structure for table `news_gallery`
--

CREATE TABLE `news_gallery` (
  `id` int(225) NOT NULL,
  `news_id` int(225) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_gallery`
--

INSERT INTO `news_gallery` (`id`, `news_id`, `url`, `created_at`, `admin_id`) VALUES
(2, 1, 'https://localhost/innovare/static/app-assets/images/newsImages/1/newsGallery/img-6038-870x489.jpg', '2021-05-16 15:52:16', 7),
(3, 1, 'https://localhost/innovare/static/app-assets/images/newsImages/1/newsGallery/iso-la-final.jpeg', '2021-05-16 15:59:11', 7),
(4, 1, 'https://localhost/innovare/static/app-assets/images/newsImages/1/newsGallery/impact-week-flyer-with-sponsors-2.jpg', '2021-05-16 15:59:11', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(1, 'Sample Page', 'sample-page', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt;\n&lt;p&gt;Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;img src=&quot;static/app-assets/images/mediaImages/impact-week-dinner-ticket.jpg&quot; width=&quot;1500&quot; height=&quot;600&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.&lt;/p&gt;\n&lt;p&gt;Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.&lt;/p&gt;\n&lt;p&gt;Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.&lt;/p&gt;', 'active', '2021-08-11 21:36:34', '2021-08-11 21:36:34', 7),
(2, 'Sample Page', 'sample-page', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt;\n&lt;p&gt;Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;img src=&quot;../static/app-assets/images/mediaImages/impact-week-dinner-ticket.jpg&quot; width=&quot;100%&quot; height=&quot;600&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.&lt;/p&gt;\n&lt;p&gt;Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.&lt;/p&gt;\n&lt;p&gt;Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.&lt;/p&gt;', 'archived', '2021-08-11 21:37:07', '2021-08-12 03:35:52', 7);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(225) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `course_cat_id` varchar(225) DEFAULT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `slug`, `thumbnail`, `description`, `url`, `course_cat_id`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(4, 'ISACA', 'isaca', 'https://localhost/innovare/static/app-assets/images/partnersImages/4/isaca.png', '&lt;p&gt;ISACA stands as a globally authorized body for certifications on Information Security Auditing, Management, and Control Systems. Geared towards IT governance, ISACA provides world-recognized accreditation in leveraging careers in the IT field. In 2020, ISACA offered courses such as CISA, CISM and CRISK were high ranked in Global Knowledge&amp;rsquo;s list of top-paying certifications. INNOVARE Learning centre, the official training partner of ISACA Accra Chapter provides the best preparation towards exams pertaining to ISACA courses.&lt;/p&gt;', NULL, NULL, 'active', '2021-10-05 15:44:01', '2021-10-05 15:44:01', 7),
(5, 'PECB', 'pecb', 'https://localhost/innovare/static/app-assets/images/partnersImages/5/pecb.png', '&lt;p&gt;Endorsed by bodies such as International Accreditation Service, PECB offers courses in an extensive scope to organizations and individuals not only limited to the Information Technology field.&lt;/p&gt;\n&lt;p&gt;PECB certification exhibits acquaintance in giving reference to International Standards essential in running an effective establishment. Fundamental to corporations and populace in various fields not only limited to an IT background. Innovare is a PECB authorized training centre with our practitioners equipped with years of practical training and expertise in International Organization for Standardization.&lt;/p&gt;', NULL, NULL, 'active', '2021-10-05 15:48:16', '2021-10-05 15:48:16', 7),
(6, 'EC COUNCIL', 'ec-council', 'https://localhost/innovare/static/app-assets/images/partnersImages/6/ec-council.png', '&lt;p&gt;Institute of E-Commerce Consultants popularly known as EC- Council is known to be the world&amp;rsquo;s largest Cybersecurity certified body. With operations in over 140 countries, this body offers technical cybersecurity knowledge and application against cyber threats which is a major pending issue in the digital world today.&amp;nbsp; Being EC certified ensures a great investment of mastery and preparation towards security awareness. EC Council courses such as Licensed Penetration Testing, Ethical Hacking, Certified SOC Analyst among others led by INNOVARE, immerses you into the practical security and hacker mindset to defend against future attacks in an organization as well as leveraging one\'s career in cybersecurity.&lt;/p&gt;', NULL, NULL, 'active', '2021-10-05 15:51:10', '2021-10-05 15:51:10', 7);

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` int(11) NOT NULL,
  `career_id` int(225) DEFAULT NULL,
  `fullname` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `references`
--

INSERT INTO `references` (`id`, `career_id`, `fullname`, `email`, `phone`, `created_at`, `update_at`, `admin_id`) VALUES
(19, 7, 'Margaret Pobee', 'jthurlare7@gmail.com', '6412432444', '2021-08-16 20:32:41', '2021-08-16 20:32:41', NULL),
(20, 7, 'Margaret Pobee', 'nam@technationgh.com', '6412432444', '2021-08-16 20:32:41', '2021-08-16 20:32:41', NULL),
(21, 7, 'Nana Afranie', 'jthurlare7@gmail.com', '0559049117', '2021-08-16 20:32:41', '2021-08-16 20:32:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registered_courses`
--

CREATE TABLE `registered_courses` (
  `id` int(255) NOT NULL,
  `registration_token` varchar(500) DEFAULT NULL,
  `course_id` int(225) DEFAULT NULL,
  `user_id` int(225) DEFAULT NULL,
  `status` enum('registered','unregistered') NOT NULL DEFAULT 'registered',
  `payment_status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `completed` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(225) NOT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  `slug` varchar(225) NOT NULL,
  `description` longtext DEFAULT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `thumbnail`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(3, 'https://localhost/innovare/static/app-assets/images/sliderImages/3/slider-1.jpg', 'for my lover ', 'for-my-lover-', '&lt;div class=&quot;elementor-element elementor-element-caed055 elementor-widget elementor-widget-text-editor&quot; data-id=&quot;caed055&quot; data-element_type=&quot;text-editor.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-text-editor elementor-clearfix&quot;&gt;\n&lt;p&gt;&lt;strong&gt;Benefits of Implementing ISO 27001&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;Implementing ISO 27001 can enable enterprises to benchmark against competitors and to provide relevant information about IT security to vendors and customers, and it can enable management to demonstrate due diligence&lt;/li&gt;\n&lt;li&gt;It can foster efficient security cost management, compliance with laws and regulations, and a comfortable level of interoperability due to a common set of guidelines followed by the partner organization.&lt;/li&gt;\n&lt;li&gt;It can improve IT information security system quality assurance (QA) and increase security awareness among employees, customers, vendors, etc., and it can increase IT and business alignment.&lt;/li&gt;\n&lt;li&gt;It provides a process framework for IT security implementation and can also assist in determining the status of information security and the degree of compliance with security policies, directives and standards.&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&lt;strong&gt;Our Implementation Methodology&lt;/strong&gt;&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-af9b1b8 elementor-widget elementor-widget-image&quot; data-id=&quot;af9b1b8&quot; data-element_type=&quot;image.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-image&quot;&gt;&lt;img class=&quot;attachment-large size-large&quot; src=&quot;https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2.png&quot; sizes=&quot;(max-width: 693px) 100vw, 693px&quot; srcset=&quot;https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2.png 693w, https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2-300x66.png 300w, https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2-560x123.png 560w, https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2-600x132.png 600w, https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2-400x88.png 400w&quot; alt=&quot;&quot; width=&quot;693&quot; height=&quot;152&quot; /&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-54fc6ea elementor-widget elementor-widget-text-editor&quot; data-id=&quot;54fc6ea&quot; data-element_type=&quot;text-editor.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-text-editor elementor-clearfix&quot;&gt;\n&lt;p&gt;&lt;strong&gt;The Innovare Advantage&lt;/strong&gt;&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-177ae63 elementor-widget elementor-widget-image&quot; data-id=&quot;177ae63&quot; data-element_type=&quot;image.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-image&quot;&gt;&lt;img class=&quot;attachment-large size-large&quot; src=&quot;https://innovarelearning.com/wp-content/uploads/2019/01/Untitled.png&quot; sizes=&quot;(max-width: 605px) 100vw, 605px&quot; srcset=&quot;https://innovarelearning.com/wp-content/uploads/2019/01/Untitled.png 605w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-300x149.png 300w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-560x279.png 560w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-600x299.png 600w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-400x199.png 400w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-603x300.png 603w&quot; alt=&quot;&quot; width=&quot;605&quot; height=&quot;301&quot; /&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-20a5fce elementor-widget elementor-widget-text-editor&quot; data-id=&quot;20a5fce&quot; data-element_type=&quot;text-editor.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-text-editor elementor-clearfix&quot;&gt;\n&lt;p&gt;&lt;strong&gt;Our Managed Services Approach&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;The Innovare Information Security Managed Services based on ISO 27001 has an OPEX costing model. We will Establish, implement, operate, monitor, review, maintain and improve your ISMS and thereby all your security activities. Innovare will be there to ensure that all compliance requirements are fulfilled and adhered to at all times. We will also prepare all regulatory and compliance required reporting.&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;em&gt;We can either do full implementation or the managed services approach&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;', 'active', '2021-05-13 19:56:55', '2021-06-02 23:31:43', 7),
(4, 'https://localhost/innovare/static/app-assets/images/servicesImages/4/img-0090-870x489.jpg', 'ISO 27001 IMPLEMENTATION', 'iso-27001-implementation', '&lt;div class=&quot;elementor-element elementor-element-caed055 elementor-widget elementor-widget-text-editor&quot; data-id=&quot;caed055&quot; data-element_type=&quot;text-editor.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-text-editor elementor-clearfix&quot;&gt;\n&lt;div class=&quot;elementor-element elementor-element-caed055 elementor-widget elementor-widget-text-editor&quot; data-id=&quot;caed055&quot; data-element_type=&quot;text-editor.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-text-editor elementor-clearfix&quot;&gt;\n&lt;p&gt;&lt;strong&gt;Benefits of Implementing ISO 27001&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;Implementing ISO 27001 can enable enterprises to benchmark against competitors and to provide relevant information about IT security to vendors and customers, and it can enable management to demonstrate due diligence&lt;/li&gt;\n&lt;li&gt;It can foster efficient security cost management, compliance with laws and regulations, and a comfortable level of interoperability due to a common set of guidelines followed by the partner organization.&lt;/li&gt;\n&lt;li&gt;It can improve IT information security system quality assurance (QA) and increase security awareness among employees, customers, vendors, etc., and it can increase IT and business alignment.&lt;/li&gt;\n&lt;li&gt;It provides a process framework for IT security implementation and can also assist in determining the status of information security and the degree of compliance with security policies, directives and standards.&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&lt;strong&gt;Our Implementation Methodology&lt;/strong&gt;&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-af9b1b8 elementor-widget elementor-widget-image&quot; data-id=&quot;af9b1b8&quot; data-element_type=&quot;image.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-image&quot;&gt;&lt;img class=&quot;attachment-large size-large&quot; src=&quot;https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2.png&quot; sizes=&quot;(max-width: 693px) 100vw, 693px&quot; srcset=&quot;https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2.png 693w, https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2-300x66.png 300w, https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2-560x123.png 560w, https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2-600x132.png 600w, https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2-400x88.png 400w&quot; alt=&quot;&quot; width=&quot;693&quot; height=&quot;152&quot; /&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-54fc6ea elementor-widget elementor-widget-text-editor&quot; data-id=&quot;54fc6ea&quot; data-element_type=&quot;text-editor.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-text-editor elementor-clearfix&quot;&gt;\n&lt;p&gt;&lt;strong&gt;The Innovare Advantage&lt;/strong&gt;&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-177ae63 elementor-widget elementor-widget-image&quot; data-id=&quot;177ae63&quot; data-element_type=&quot;image.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-image&quot;&gt;&lt;img class=&quot;attachment-large size-large&quot; src=&quot;https://innovarelearning.com/wp-content/uploads/2019/01/Untitled.png&quot; sizes=&quot;(max-width: 605px) 100vw, 605px&quot; srcset=&quot;https://innovarelearning.com/wp-content/uploads/2019/01/Untitled.png 605w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-300x149.png 300w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-560x279.png 560w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-600x299.png 600w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-400x199.png 400w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-603x300.png 603w&quot; alt=&quot;&quot; width=&quot;605&quot; height=&quot;301&quot; /&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-20a5fce elementor-widget elementor-widget-text-editor&quot; data-id=&quot;20a5fce&quot; data-element_type=&quot;text-editor.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-text-editor elementor-clearfix&quot;&gt;\n&lt;p&gt;&lt;strong&gt;Our Managed Services Approach&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;The Innovare Information Security Managed Services based on ISO 27001 has an OPEX costing model. We will Establish, implement, operate, monitor, review, maintain and improve your ISMS and thereby all your security activities. Innovare will be there to ensure that all compliance requirements are fulfilled and adhered to at all times. We will also prepare all regulatory and compliance required reporting.&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;em&gt;We can either do full implementation or the managed services approach&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;', 'active', '2021-05-13 20:30:01', '2021-06-02 23:37:53', 7),
(5, 'https://localhost/innovare/static/app-assets/images/servicesImages/5/img-7489-1700x1080.jpg', 'ISO 27001 Information Security', 'iso-27001-information-security', '&lt;div class=&quot;elementor-element elementor-element-caed055 elementor-widget elementor-widget-text-editor&quot; data-id=&quot;caed055&quot; data-element_type=&quot;text-editor.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-text-editor elementor-clearfix&quot;&gt;\n&lt;p&gt;&lt;strong&gt;Benefits of Implementing ISO 27001&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;Implementing ISO 27001 can enable enterprises to benchmark against competitors and to provide relevant information about IT security to vendors and customers, and it can enable management to demonstrate due diligence&lt;/li&gt;\n&lt;li&gt;It can foster efficient security cost management, compliance with laws and regulations, and a comfortable level of interoperability due to a common set of guidelines followed by the partner organization.&lt;/li&gt;\n&lt;li&gt;It can improve IT information security system quality assurance (QA) and increase security awareness among employees, customers, vendors, etc., and it can increase IT and business alignment.&lt;/li&gt;\n&lt;li&gt;It provides a process framework for IT security implementation and can also assist in determining the status of information security and the degree of compliance with security policies, directives and standards.&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&lt;strong&gt;Our Implementation Methodology&lt;/strong&gt;&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-af9b1b8 elementor-widget elementor-widget-image&quot; data-id=&quot;af9b1b8&quot; data-element_type=&quot;image.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-image&quot;&gt;&lt;img class=&quot;attachment-large size-large&quot; src=&quot;https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2.png&quot; sizes=&quot;(max-width: 693px) 100vw, 693px&quot; srcset=&quot;https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2.png 693w, https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2-300x66.png 300w, https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2-560x123.png 560w, https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2-600x132.png 600w, https://innovarelearning.com/wp-content/uploads/2019/07/Untitled2-400x88.png 400w&quot; alt=&quot;&quot; width=&quot;693&quot; height=&quot;152&quot; /&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-54fc6ea elementor-widget elementor-widget-text-editor&quot; data-id=&quot;54fc6ea&quot; data-element_type=&quot;text-editor.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-text-editor elementor-clearfix&quot;&gt;\n&lt;p&gt;&lt;strong&gt;The Innovare Advantage&lt;/strong&gt;&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-177ae63 elementor-widget elementor-widget-image&quot; data-id=&quot;177ae63&quot; data-element_type=&quot;image.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-image&quot;&gt;&lt;img class=&quot;attachment-large size-large&quot; src=&quot;https://innovarelearning.com/wp-content/uploads/2019/01/Untitled.png&quot; sizes=&quot;(max-width: 605px) 100vw, 605px&quot; srcset=&quot;https://innovarelearning.com/wp-content/uploads/2019/01/Untitled.png 605w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-300x149.png 300w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-560x279.png 560w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-600x299.png 600w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-400x199.png 400w, https://innovarelearning.com/wp-content/uploads/2019/01/Untitled-603x300.png 603w&quot; alt=&quot;&quot; width=&quot;605&quot; height=&quot;301&quot; /&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;elementor-element elementor-element-20a5fce elementor-widget elementor-widget-text-editor&quot; data-id=&quot;20a5fce&quot; data-element_type=&quot;text-editor.default&quot;&gt;\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\n&lt;div class=&quot;elementor-text-editor elementor-clearfix&quot;&gt;\n&lt;p&gt;&lt;strong&gt;Our Managed Services Approach&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;The Innovare Information Security Managed Services based on ISO 27001 has an OPEX costing model. We will Establish, implement, operate, monitor, review, maintain and improve your ISMS and thereby all your security activities. Innovare will be there to ensure that all compliance requirements are fulfilled and adhered to at all times. We will also prepare all regulatory and compliance required reporting.&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;em&gt;We can either do full implementation or the managed services approach&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;', 'active', '2021-05-20 15:33:49', '2021-06-02 23:34:02', 7),
(9, 'https://localhost/innovare/static/app-assets/images/servicesImages/9/meeting-black-and-white-people-scaled.jpeg', 'Test', 'test', '&lt;table style=&quot;width: 1068.17px; border-color: #fff;&quot;&gt;\n&lt;tbody&gt;\n&lt;tr&gt;\n&lt;td style=&quot;width: 380px;&quot;&gt;&lt;img src=&quot;static/app-assets/images/mediaImages/impact-week-flyer-with-sponsors-2.jpg&quot; width=&quot;300&quot; height=&quot;300&quot; /&gt;&lt;/td&gt;\n&lt;td style=&quot;width: 691.172px;&quot;&gt;\n&lt;p&gt;The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps.&lt;/p&gt;\n&lt;p&gt;Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz.&lt;/p&gt;\n&lt;p&gt;Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim.&lt;/p&gt;\n&lt;p&gt;Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex.&lt;/p&gt;\n&lt;p&gt;Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! &quot;Now fax quiz Jack! &quot; my brave ghost pled.&lt;/p&gt;\n&lt;p&gt;Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk.&lt;/p&gt;\n&lt;/td&gt;\n&lt;/tr&gt;\n&lt;/tbody&gt;\n&lt;/table&gt;', 'active', '2021-07-02 13:04:35', '2021-07-02 13:04:35', 7);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `header_text` varchar(500) DEFAULT NULL,
  `sub_header_text` varchar(500) DEFAULT NULL,
  `btn_1_text` varchar(500) DEFAULT NULL,
  `btn_1_url` varchar(500) DEFAULT NULL,
  `btn_2_text` varchar(500) DEFAULT NULL,
  `btn_2_url` varchar(500) DEFAULT NULL,
  `content_position` enum('center','right','left') NOT NULL DEFAULT 'left',
  `sorting_order` enum('1','2','3','4','5','0') DEFAULT '0',
  `status` enum('active','archived') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image_url`, `header_text`, `sub_header_text`, `btn_1_text`, `btn_1_url`, `btn_2_text`, `btn_2_url`, `content_position`, `sorting_order`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(4, 'https://localhost/innovare/static/app-assets/images/sliderImages/4/los-angeles-home-and-backyard-pool-overlooking-the-city-skyline-1587611488.jpg', 'Consulting Knowledge Transfer  And Services', 'Providing Value-driven Information Security Services and Consulting Solution', 'Consulting Services', 'https://innovare.afroadore.com/consulting-services', 'Our Industries', 'https://innovare.afroadore.com/industries#', 'center', '2', NULL, '2021-05-15 05:53:36', '2021-10-04 13:00:43', 7),
(6, 'https://localhost/innovare/static/app-assets/images/sliderImages/6/img-0017-1-.jpg', 'Knowledge Transfer', 'Providing Global Recognized Cyber Security Certification Training', 'Knowledge Transfer ', 'https://innovare.afroadore.com/knowledge-transfer', 'Training Courses', 'https://innovare.afroadore.com/training-courses', 'left', '2', NULL, '2021-10-04 13:11:54', '2021-10-05 15:16:11', 7);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(225) NOT NULL,
  `full_name` varchar(400) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `full_name`, `email`, `created_at`) VALUES
(1, 'Margaret Pobee', 'jthurlare7@gmail.com', '2021-05-27 15:36:49'),
(2, 'Nana Afranie-Mensah', 'kingstondelygee@gmail.com', '2021-05-27 15:41:19'),
(3, 'Nana Afranie', 'kingstondel@gmail.com', '2021-06-02 17:16:53'),
(4, 'Nana Afranie-Mensah', 'admin@mastermindjourney.com', '2021-06-08 16:09:10'),
(5, 'James Doe', 'bediako.nana@littlebigspace.com', '2021-06-08 19:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(225) NOT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `title` enum('mr','mrs','ms','prof','rev','dr','master') DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `phone` varchar(225) DEFAULT NULL,
  `opt_phone` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `opt_email` varchar(225) DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `role` enum('management','staff','instructor') DEFAULT NULL,
  `position` varchar(225) DEFAULT NULL,
  `facebook` varchar(225) DEFAULT NULL,
  `twitter` varchar(225) DEFAULT NULL,
  `linkedin` varchar(225) DEFAULT NULL,
  `instagram` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `thumbnail`, `title`, `name`, `slug`, `phone`, `opt_phone`, `email`, `opt_email`, `about`, `role`, `position`, `facebook`, `twitter`, `linkedin`, `instagram`, `created_at`, `updated_at`, `admin_id`, `status`) VALUES
(5, 'https://localhost/innovare/static/app-assets/images/teamImages/5/3-upcoming-tour-nye-in-ghana-.jpg', 'mr', 'Margaret Pobee', 'margaret-pobee', '6412432444', '6412432444', 'jthurlare7@gmail.com', 'jthurlare7@gmail.com', '&lt;p&gt;This is a test message&lt;/p&gt; ', 'staff', 'C.E.O', '#', '#', '#', '#', '2021-05-14 12:13:28', '2021-05-14 12:13:28', 7, 'active'),
(7, 'https://localhost/innovare/static/app-assets/images/teamImages/7/21726408528-8821c646b1-b.jpeg', 'mr', 'Emma Pobee', 'emma-pobee', '6412432444', '6412432444', 'king@gmail.com', 'nam@techantion.gh', '&lt;p&gt;This is a test message&lt;/p&gt; ', 'instructor', 'Instructore', '#', '#', '#', '#', '2021-05-14 12:24:26', '2021-05-14 12:24:26', 7, 'active'),
(9, 'https://localhost/innovare/static/app-assets/images/teamImages/9/71k0lgxxurl-ul1500-.jpg', 'mr', 'Nana Afranie-Mensah', 'nana-afranie-mensah', '0559049117', '0555892892', 'kingstondelygee@gmail.com', 'nam@techantion.gh', '&lt;p&gt;THis is my profile&lt;/p&gt;', 'instructor', 'Instructor', '#', '#', '#', '#', '2021-05-15 16:35:38', '2021-05-15 16:35:38', 7, 'active'),
(10, 'https://localhost/innovare/static/app-assets/images/teamImages/10/cc-bruce-pic-2-684x700.jpg', 'mr', 'CC BRUCE JNR ', 'cc-bruce-jnr-', '023455555555', '', 'ccbruce@gmail.com', '', '&lt;p&gt;Until his appointment as Executive Consultant in charge of Group Expansion in West Africa, Cleland Cofie Bruce Jnr was the Chief Operations Officer for the Enterprise Group. Prior to that, he was the Executive Director of Enterprise Life Assurance Company Limited where he led the company to become the biggest Life Insurer in the country.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;C.C. Bruce served as Vice President of the Ghana Insurance Association and Chairman of the Life Council between 2010 and 2014. He also chaired the Life Committee of the African Insurance Organisation from 2009 to 2013.&amp;nbsp;C.C. Bruce has over 30 years&amp;rsquo; experience in insurance and is an Associate of the Chartered Insurance Institute (ACII, UK) and a Fellow of the Insurance Institute of Ghana (FIIG).&lt;/p&gt;\r\n&lt;p&gt;He holds a DipFM (ACCA) and a Master Arts (Leading Innovation and Change) from York St. John University, UK.&lt;/p&gt;', 'management', 'Chairman', '#', '#', '#', '#', '2021-05-18 07:13:51', '2021-05-18 07:13:51', 7, 'active'),
(11, 'https://localhost/innovare/static/app-assets/images/teamImages/11/ck-pic.jpeg', 'mr', 'C.K BRUCE ', 'c-k-bruce-', '+233559049117', '', 'ckbruce@gmial.com', '', '&lt;p&gt;C.K Bruce has over 20 years&amp;rsquo; of IT experience. His professional experiences are in Information Security management, ISO 27001 implementation, IT auditing, governance and IT project management. He is also a lead trainer in areas of IT risk, Information security, IT audit and IT governance. He has an extensive track record of having trained and mentored over 400 technology assurance professionals over the years.&lt;/p&gt;\r\n&lt;p&gt;He is a founding member and Past President of ISACA Accra Chapter, the global professional body for IT Auditors and information security professionals. He has served on a number of ISACA roles on the global and continental level, including as ISACA Africa Lead, responsible for business development for sub-Saharan Africa.&lt;/p&gt;\r\n&lt;p&gt;CK is also a member of Microsoft Outside Counsel Network, where he has done a number of high-level policy focused engagements. He was Lead Project Executive for a number of key large public sector eGovernment projects namely the Ghana Government Enterprise Architecture (GGEA) and the eGovernment Interoperability Framework (eGIF) where he developed the information security aspects of the project.&lt;/p&gt;\r\n&lt;p&gt;CK has undertaken information security consulting engagements across industries namely banking, IT services, education, government, and maritime.He is a frequent speaker at conferences and seminars covering topics around information security, IT governance, IT risk and audit.&lt;/p&gt;\r\n&lt;p&gt;CK serves on a number of corporate boards in Ghana including Interpay Ghana, NDL Ltd and Innovare Ghana. He is also a member of the Advisory Board of the College of Education, University of Ghana. He is also a member of the Committee of Co-operation between Law Enforcement Agencies and the Banking Community (COCLAB).&lt;/p&gt;\r\n&lt;p&gt;CK is a Certified Information Systems Auditor (CISA), Certified in Risk and Information Systems Control (CRISC), Certified Information Security Manager (CISM), Certified in the Governance of Enterprise IT (CGEIT), Certified Chief Information Security Officer (CCISO), Certified Prince2 Practitioner, ISO 27001 Lead Implementer, an IT Governance &amp;amp; Information/Cyber Security Consultant, IT Auditor, IT Project Manager and a Trainer.&lt;/p&gt;', 'management', 'C.E.O', '#', '#', '#', '#', '2021-05-18 07:17:22', '2021-05-18 07:17:22', 7, 'active'),
(12, 'https://localhost/innovare/static/app-assets/images/teamImages/12/user-1-.png', 'mr', 'Nana Afranie-Mensah', 'nana-afranie-mensah', '0559049117', '0279429037', 'kingstondelygee@gmail.com', 'nam@techantion.gh', '&lt;p&gt;I am the IT developer&lt;/p&gt;', 'staff', 'IT manager', '#', '#', '#', '#', '2021-05-25 10:53:07', '2021-05-25 10:53:07', 7, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `thought_leadership`
--

CREATE TABLE `thought_leadership` (
  `id` int(225) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `thumbnail` varchar(225) DEFAULT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thought_leadership`
--

INSERT INTO `thought_leadership` (`id`, `title`, `slug`, `description`, `thumbnail`, `status`, `created_at`, `update_at`, `admin_id`) VALUES
(1, 'Test Phase 222', 'test-phase-222', '&lt;h3&gt;Test heading 4444&lt;/h3&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt;\n&lt;p&gt;Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.&lt;/p&gt;\n&lt;p&gt;In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.&lt;/p&gt;\n&lt;p&gt;Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.&lt;/p&gt;\n&lt;p&gt;Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.&lt;/p&gt;', 'https://localhost/innovare/static/app-assets/images/leadershipImages/1/diversity-top-executive.jpeg', 'active', '2021-08-11 04:44:41', '2021-08-11 11:05:31', 7);

-- --------------------------------------------------------

--
-- Table structure for table `thought_leadership_video`
--

CREATE TABLE `thought_leadership_video` (
  `id` int(225) NOT NULL,
  `track_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `thought_leadership_id` int(255) DEFAULT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thought_leadership_video`
--

INSERT INTO `thought_leadership_video` (`id`, `track_id`, `title`, `slug`, `url`, `thought_leadership_id`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(2, '03', 'I have a Dream', 'i-have-a-dream', 'https://www.youtube.com/watch?v=VD4sEMGlph8', 1, 'active', '2021-08-11 11:02:45', '2021-08-11 11:35:18', 7),
(3, '02', 'I have a Dream in you', 'i-have-a-dream-in-you', 'https://www.youtube.com/watch?v=STZTnlowAlo', 1, 'active', '2021-08-11 11:34:08', '2021-08-11 11:34:08', 7),
(4, '05', 'Test', 'test', 'https://youtu.be/F0nCiSJgfj4', 1, 'active', '2021-08-11 11:57:49', '2021-08-11 11:57:49', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `profile_pic` varchar(500) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` int(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `education_level` enum('shs','degree','diploma','masters','phd') DEFAULT NULL,
  `school` varchar(225) DEFAULT NULL,
  `degree` varchar(225) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `is_working` enum('yes','no') DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_phone` varchar(255) DEFAULT NULL,
  `company_position` varchar(225) DEFAULT NULL,
  `affiliated_company_id` int(255) DEFAULT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `website_details`
--

CREATE TABLE `website_details` (
  `id` int(225) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `logo_url` varchar(500) DEFAULT NULL,
  `favicon_url` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(225) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website_details`
--

INSERT INTO `website_details` (`id`, `title`, `logo_url`, `favicon_url`, `created_at`, `admin_id`, `updated_at`) VALUES
(1, 'Innovare', 'https://localhost/innovare/static/app-assets/images/logoImages/logo.png', 'https://localhost/innovare/static/app-assets/images/logoImages/innovare-favicon.png', '2021-05-15 11:20:20', 7, '2021-05-17 20:39:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_form`
--
ALTER TABLE `career_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_study`
--
ALTER TABLE `case_study`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_study_cat`
--
ALTER TABLE `case_study_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_study_documents`
--
ALTER TABLE `case_study_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_study_gallery`
--
ALTER TABLE `case_study_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commet_reply`
--
ALTER TABLE `commet_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consulting_service`
--
ALTER TABLE `consulting_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_cat`
--
ALTER TABLE `course_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_document`
--
ALTER TABLE `course_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_cat`
--
ALTER TABLE `event_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_documents`
--
ALTER TABLE `event_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_gallery`
--
ALTER TABLE `event_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_paticipant`
--
ALTER TABLE `event_paticipant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge_transfer`
--
ALTER TABLE `knowledge_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_cat`
--
ALTER TABLE `news_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_gallery`
--
ALTER TABLE `news_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_courses`
--
ALTER TABLE `registered_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thought_leadership`
--
ALTER TABLE `thought_leadership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thought_leadership_video`
--
ALTER TABLE `thought_leadership_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_details`
--
ALTER TABLE `website_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `career_form`
--
ALTER TABLE `career_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `case_study`
--
ALTER TABLE `case_study`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `case_study_cat`
--
ALTER TABLE `case_study_cat`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `case_study_documents`
--
ALTER TABLE `case_study_documents`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `case_study_gallery`
--
ALTER TABLE `case_study_gallery`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commet_reply`
--
ALTER TABLE `commet_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consulting_service`
--
ALTER TABLE `consulting_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_cat`
--
ALTER TABLE `course_cat`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_document`
--
ALTER TABLE `course_document`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_cat`
--
ALTER TABLE `event_cat`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_documents`
--
ALTER TABLE `event_documents`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event_gallery`
--
ALTER TABLE `event_gallery`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `event_paticipant`
--
ALTER TABLE `event_paticipant`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `knowledge_transfer`
--
ALTER TABLE `knowledge_transfer`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news_cat`
--
ALTER TABLE `news_cat`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news_gallery`
--
ALTER TABLE `news_gallery`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `registered_courses`
--
ALTER TABLE `registered_courses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `thought_leadership`
--
ALTER TABLE `thought_leadership`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thought_leadership_video`
--
ALTER TABLE `thought_leadership_video`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_details`
--
ALTER TABLE `website_details`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
