-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2021 at 06:40 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

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
(1, 'https://localhost/innovare/static/app-assets/images/bannerImages/899ffdb3aef94b5abc79c9b468635713-large.jpg', '2021-05-15 09:16:07', 7, 'deactivated'),
(4, 'https://localhost/innovare/static/app-assets/images/bannerImages/6b37e719b6398ed4eb39c64d0fe352f0.jpeg', '2021-05-15 09:33:15', 7, 'active');

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
(1, 'INNOVARÉ-2021-TRAINING-CALENDAR-1-11', 'static/app-assets/documents/calender/innovare--2021-training-calendar-1-11-pdf.pdf', 'pdf', '2021-05-04 19:41:05', 7);

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
  `category_id` int(225) DEFAULT NULL,
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
(3, 'ISO 27001 LEAD AUDITOR', 'iso-27001-lead-auditor', 3, '&lt;div class=&quot;elementor-element elementor-element-aqyxiuw elementor-widget elementor-widget-text-editor&quot; data-id=&quot;aqyxiuw&quot; data-element_type=&quot;text-editor.default&quot;&gt;\r\n&lt;div class=&quot;elementor-widget-container&quot;&gt;\r\n&lt;div class=&quot;elementor-text-editor elementor-clearfix&quot;&gt;\r\n&lt;p&gt;Innovare&amp;rsquo;s ISO/IEC 27001 Lead Auditor training enables you to develop the necessary expertise to perform an Information Security Management System (ISMS) audit by applying widely recognized audit principles, procedures and techniques. During this training course, you will acquire the knowledge and skills to plan and carry out internal and external audits in compliance with ISO 19011 and ISO/IEC 17021-1 certification process. Based on practical exercises, you will be able to master audit techniques and become competent to manage an audit program, audit team, communication with customers, and conflict resolution. After acquiring the necessary expertise to perform this audit, you can sit for the exam and apply for a &amp;ldquo;PECB Certified ISO/IEC 27001 Lead Auditor&amp;rdquo; credential. By holding a PECB Lead Auditor Certificate, you will demonstrate that you have the capabilities and competencies to audit organizations based on best practices.&lt;br /&gt;Innovare is a PECB ATP (Authorized Training Partner). We are leaders in professional certification training in IT risk, IT audit,&lt;br /&gt;information security and IT Governance. Our instructors are practitioners with years of practical experience.&lt;br /&gt;Our various training &amp;amp; preparation programs are as follows:&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Official Course Review&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;This training delivery will cover the entire syllabus within the 4 domain areas. You can take the course as a 4-day boot camp,&lt;br /&gt;four 6 hour sessions on Saturdays or eight 3 hour session in the evening.&lt;/p&gt;\r\n&lt;h3&gt;The Course Agenda&lt;/h3&gt;\r\n&lt;p&gt;&lt;strong&gt;Day 1:&lt;/strong&gt; Introduction to Information Security Management Systems (ISMS) and ISO/IEC 27001&lt;br /&gt;&lt;strong&gt;Day 2:&lt;/strong&gt; Audit principles, preparation and launching of an audit&lt;br /&gt;&lt;strong&gt;Day 3:&lt;/strong&gt; On-site audit activities&lt;br /&gt;&lt;strong&gt;Day 4:&lt;/strong&gt; Closing the audit&lt;br /&gt;&lt;strong&gt;Day 5:&lt;/strong&gt; Certification Exam&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Learning objectives&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Understand the operations of an Information Security Management System based on ISO/IEC 27001&lt;/li&gt;\r\n&lt;li&gt;Acknowledge the correlation between ISO/IEC 27001, ISO/IEC 27002 and other standards and regulatory frameworks&lt;/li&gt;\r\n&lt;li&gt;Understand an auditor&amp;rsquo;s role to: plan, lead and follow-up on a management system audit in accordance with ISO 19011&lt;/li&gt;\r\n&lt;li&gt;Learn how to lead an audit and audit team&lt;/li&gt;\r\n&lt;li&gt;Learn how to interpret the requirements of ISO/IEC 27001 in the context of an ISMS audit&lt;/li&gt;\r\n&lt;li&gt;Acquire the competencies of an auditor to: plan an audit, lead an audit, draft reports, and follow-up on an audit in compliance with ISO 19011&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;Program Fees&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Official Course Review + Official Exam Revision&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;&lt;em&gt;Included are:&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;em&gt;Official ISO 27001 Lead Auditor Manual&lt;/em&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;em&gt;snacks,&lt;/em&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;em&gt;A participation certificate of 31 CPD (Continuing Professional Development) credit&lt;/em&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;em&gt;In case of exam failure, you can retake the exam within 12 months for free&lt;/em&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;em&gt;Training Passport&lt;/em&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '2_years', 3000, 'physical', '[\"7\"]', 'ISO 27001', 'https://localhost/innovare/static/app-assets/images/courseImages/3/iso-la-final.jpeg', '2021-05-04 07:52:01', '2021-05-15 20:35:27', 7, 'active'),
(5, 'ISO/IEC 27032 Cyber Security', 'iso-iec-27032-cyber-security', 2, '&lt;p&gt;This is my test&lt;/p&gt;', '6_weeks', 1000, 'physical', '[\"7\",\"9\"]', 'ISO/IEC 27032', 'https://localhost/innovare/static/app-assets/images/courseImages/5/cyber-security.jpg', '2021-05-15 18:38:47', '2021-05-15 20:08:04', 7, 'active');

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
(5, 'Personal', 'personal', '2021-05-05 08:43:38', '2021-05-05 08:43:38'),
(6, 'ISACA', 'isaca', '2021-05-05 09:55:12', '2021-05-05 09:55:12');

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
(8, 'Innovare Web Application', 'pdf', 'https://localhost/innovare/static/app-assets/documents/courseDocuments/5/innovare-web-application-pdf.pdf', 5, 'free', '2021-05-15 18:39:51', 7);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(225) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `category_id` int(225) DEFAULT NULL,
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
(1, 'ISACA EVENT', 'isaca-event', 3, '&lt;h1&gt;This is a test&lt;/h1&gt;\n&lt;p&gt;some this test message&lt;/p&gt;', 'https://localhost/innovare/static/app-assets/images/eventImages/1/undraw-mail-sent-re-0ofv.png', 'office of isaca', 'Atomic junction, Accra Ghana', '2021-05-16', '09:30:00', '12:35:00', NULL, NULL, 'active', '2021-05-09 09:31:02', '2021-05-09 09:31:02', 7, 'no', 'one_day'),
(3, 'This An official Test Event _1', 'this-an-official-test-event-1', 3, '&lt;h2&gt;Official Test Event&lt;/h2&gt;\n&lt;p&gt;This Is an&amp;nbsp;&lt;strong&gt;Official&amp;nbsp;&lt;/strong&gt; Event test input&lt;/p&gt;', 'https://localhost/innovare/static/app-assets/images/eventImages/3/undraw-confirmed-re-sef7.png', 'Innovare Premises', 'ADC innovare premises location', NULL, NULL, NULL, '2021-05-30', '2021-05-30', 'active', '2021-05-09 10:02:44', '2021-05-09 10:02:44', 7, 'yes', 'multiple_days');

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
(1, 'Innovare', 'innovare', '2021-05-05 10:16:19', '2021-05-05 10:16:19', 7),
(2, 'ECB', 'ecb', '2021-05-05 10:16:47', '2021-05-05 10:16:47', 7),
(3, 'ISACAA', 'isacaa', '2021-05-05 10:16:57', '2021-05-16 00:45:30', 7);

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
(3, 'INNOVARÉ-2021-TRAINING-CALENDAR-1-11', 'pdf', 'https://localhost/innovare/static/app-assets/documents/eventDocuments/3/innovare--2021-training-calendar-1-11-pdf.pdf', 3, 'active', '2021-05-09 10:58:16', 7);

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
(6, 3, 'https://localhost/innovare/static/app-assets/images/eventImages/3/eventGallery/impact-week-flyer-with-sponsors.jpg', '2021-05-09 15:07:50', 7);

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
(1, 'https://localhost/innovare/static/app-assets/images/newsImages/1/img-6038-870x489.jpg', 'PaySwitch led by Kojo Choi (Managing Director) has received certification for ISO 27001', 'payswitch-led-by-kojo-choi-managing-director-has-received-certification-for-iso-27001', '[\"3\"]', '&lt;div class=&quot;entry-content&quot;&gt;\r\n&lt;p&gt;PaySwitch Company Limited, a Ghanaian owned third party payment processor (TPP) is certified as ISO 27001 compliant. This award comes as a validation of the company&amp;rsquo;s strides to provide Ghana with an authentic locally established TPP to banks and other businesses who are driving a digital payment agenda.&lt;/p&gt;\r\n&lt;p&gt;ISO 27001 is an international standard for information security with respect to how risk is managed through an organization&amp;rsquo;s information processes and controls. The certificate is globally recognized and when awarded to an organization, it confirms its compliance to a high standard of Information Security Management System (ISMS). A certified company is equipped to protect the information of both its clients and staff.&lt;/p&gt;\r\n&lt;p&gt;PaySwitch provides integrated payment solutions that facilitates the circulation of money as well as the exchange of value between individuals (C2C); individuals and organizations (C2B); organizations and individuals (B2C); and between organizations (B2B) on a timely and consistent basis. Among the profile of products and solution within issuing and acquiring are: (1) Payment Card [Visa, MasterCard, UnionPay and GhLink] (2) Wallet Services [TELA Wallet and Proprietary Wallet] (3) Loyalty Card / Scheme [Mileage reward programs] (4) Anti-Fraud Solutions (5) Monitoring &amp;amp; Prevention (6) ATM &amp;amp; Smart POS (7) MomoPOS [Mobile Money Point of Sale via Android App and OS] (8) E-commerce (9) QR code.&lt;/p&gt;\r\n&lt;p&gt;At the presentation ceremony held at the premises of the company, Mr. C.K. Bruce (C.E.O &amp;ndash; Innovare) remarked in his speech that, &amp;ldquo;we are honored to be associated with PaySwitch because it is a company that is going to be a stamp in the industry&amp;rdquo;. He continued by saying &amp;ldquo;this certification means that PaySwitch&amp;rsquo;s environment of operation is matured and raised to a global standard&amp;rdquo;.&lt;/p&gt;\r\n&lt;p&gt;Kojo Choi who is the Managing Director of PaySwitch said, &amp;ldquo;I&amp;rsquo;m glad the company is continuously making &amp;nbsp;progress in the Ghanaian market. This certification is part of our growing effort to give Ghana its own authentic third-party payment processing company which then empowers local processing of transactions&amp;rdquo;. He continued, &amp;ldquo;we have done a lot of pioneering work in this space and we believe our clients will have more confidence to grow with us&amp;rdquo;.&lt;/p&gt;\r\n&lt;p&gt;PaySwitch currently is switching and providing various aggregated services to 5 major banks in Ghana and has over 3000 merchants. The company is set to launch the biggest marketplace platform in Ghana in the coming weeks which is estimated to have over two (2) million subscribers from its day of launch.&lt;/p&gt;\r\n&lt;/div&gt;', 'active', '2021-05-16 14:02:36', '2021-05-16 09:48:31', '2021-05-16 15:21:22', 7),
(2, NULL, 'PaySwitch led by Kojo Choi (Managing Director) has received certification for ISO 27001', 'payswitch-led-by-kojo-choi-managing-director-has-received-certification-for-iso-27001', '[\"3\"]', '&lt;div class=&quot;entry-content&quot;&gt;\r\n&lt;p&gt;&lt;strong&gt;Date Issued: 18&lt;sup&gt;th&lt;/sup&gt; September 2020&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Time: 10:00am&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;For Immediate release&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Attention: News Editor&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;PaySwitch Company Limited, a Ghanaian owned third party payment processor (TPP) is certified as ISO 27001 compliant. This award comes as a validation of the company&amp;rsquo;s strides to provide Ghana with an authentic locally established TPP to banks and other businesses who are driving a digital payment agenda.&lt;/p&gt;\r\n&lt;p&gt;ISO 27001 is an international standard for information security with respect to how risk is managed through an organization&amp;rsquo;s information processes and controls. The certificate is globally recognized and when awarded to an organization, it confirms its compliance to a high standard of Information Security Management System (ISMS). A certified company is equipped to protect the information of both its clients and staff.&lt;/p&gt;\r\n&lt;p&gt;PaySwitch provides integrated payment solutions that facilitates the circulation of money as well as the exchange of value between individuals (C2C); individuals and organizations (C2B); organizations and individuals (B2C); and between organizations (B2B) on a timely and consistent basis. Among the profile of products and solution within issuing and acquiring are: (1) Payment Card [Visa, MasterCard, UnionPay and GhLink] (2) Wallet Services [TELA Wallet and Proprietary Wallet] (3) Loyalty Card / Scheme [Mileage reward programs] (4) Anti-Fraud Solutions (5) Monitoring &amp;amp; Prevention (6) ATM &amp;amp; Smart POS (7) MomoPOS [Mobile Money Point of Sale via Android App and OS] (8) E-commerce (9) QR code.&lt;/p&gt;\r\n&lt;p&gt;At the presentation ceremony held at the premises of the company, Mr. C.K. Bruce (C.E.O &amp;ndash; Innovare) remarked in his speech that, &amp;ldquo;we are honored to be associated with PaySwitch because it is a company that is going to be a stamp in the industry&amp;rdquo;. He continued by saying &amp;ldquo;this certification means that PaySwitch&amp;rsquo;s environment of operation is matured and raised to a global standard&amp;rdquo;.&lt;/p&gt;\r\n&lt;p&gt;Kojo Choi who is the Managing Director of PaySwitch said, &amp;ldquo;I&amp;rsquo;m glad the company is continuously making &amp;nbsp;progress in the Ghanaian market. This certification is part of our growing effort to give Ghana its own authentic third-party payment processing company which then empowers local processing of transactions&amp;rdquo;. He continued, &amp;ldquo;we have done a lot of pioneering work in this space and we believe our clients will have more confidence to grow with us&amp;rdquo;.&lt;/p&gt;\r\n&lt;p&gt;PaySwitch currently is switching and providing various aggregated services to 5 major banks in Ghana and has over 3000 merchants. The company is set to launch the biggest marketplace platform in Ghana in the coming weeks which is estimated to have over two (2) million subscribers from its day of launch.&lt;/p&gt;\r\n&lt;/div&gt;', 'archived', '2021-05-16 15:14:08', '2021-05-16 15:14:08', '2021-05-16 15:14:08', 7);

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
(3, 'https://localhost/innovare/static/app-assets/images/sliderImages/3/slider-1.jpg', 'for my lover ', 'for-my-lover-', '&lt;h1&gt;Test seventeen&lt;/h1&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;This test is good as working on something&lt;/p&gt;', 'active', '2021-05-13 19:56:55', '2021-05-15 04:06:29', 7),
(4, 'https://localhost/innovare/static/app-assets/images/servicesImages/4/los-angeles-home-and-backyard-pool-overlooking-the-city-skyline-1587611488.jpg', 'for my lover ', 'for-my-lover-', '&lt;h1&gt;Test seventeen&lt;/h1&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;This test is good as working on something&lt;/p&gt;', 'active', '2021-05-13 20:30:01', '2021-05-13 22:52:41', 7);

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
  `sorting_order` enum('1','2','3','4','5','0') DEFAULT '0',
  `status` enum('active','archived') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image_url`, `header_text`, `sub_header_text`, `btn_1_text`, `btn_1_url`, `btn_2_text`, `btn_2_url`, `sorting_order`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(4, 'https://localhost/innovare/static/app-assets/images/sliderImages/4/los-angeles-home-and-backyard-pool-overlooking-the-city-skyline-1587611488.jpg', 'Contact Us Now', 'Contact is', 'learn more', '#', 'view More', '#', '2', NULL, '2021-05-15 05:53:36', '2021-05-15 06:31:05', 7);

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
(5, 'https://localhost/innovare/static/app-assets/images/teamImages/5/3-upcoming-tour-nye-in-ghana-.jpg', 'mr', 'Margaret Pobee', 'margaret-pobee', '6412432444', '6412432444', 'jthurlare7@gmail.com', 'jthurlare7@gmail.com', '&lt;p&gt;This is a test message&lt;/p&gt;', 'staff', 'C.E.O', '#', '#', '#', '#', '2021-05-14 12:13:28', '2021-05-14 12:13:28', 7, 'active'),
(7, 'https://localhost/innovare/static/app-assets/images/teamImages/7/21726408528-8821c646b1-b.jpeg', 'mr', 'Emma Pobee', 'emma-pobee', '6412432444', '6412432444', 'king@gmail.com', 'nam@techantion.gh', '&lt;p&gt;This is a test message&lt;/p&gt; ', 'instructor', 'Instructore', '#', '#', '#', '#', '2021-05-14 12:24:26', '2021-05-14 12:24:26', 7, 'active'),
(8, 'https://localhost/innovare/static/app-assets/images/teamImages/8/airport-city-accra-scaled.jpeg', 'mr', 'Margaret Pobee', 'margaret-pobee', '6412432444', '6412432444', 'jthurlare7@gmail.com', 'jthurlare7@gmail.com', '&lt;p&gt;This is a test message&lt;/p&gt;', 'management', 'C.E.O', '#', '#', '#', '#', '2021-05-14 12:24:42', '2021-05-14 12:24:42', 7, 'active'),
(9, 'https://localhost/innovare/static/app-assets/images/teamImages/9/71k0lgxxurl-ul1500-.jpg', 'mr', 'Nana Afranie-Mensah', 'nana-afranie-mensah', '0559049117', '0555892892', 'kingstondelygee@gmail.com', 'nam@techantion.gh', '&lt;p&gt;THis is my profile&lt;/p&gt;', 'instructor', 'Instructor', '#', '#', '#', '#', '2021-05-15 16:35:38', '2021-05-15 16:35:38', 7, 'active');

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
(1, 'Innovare', 'https://localhost/innovare/static/app-assets/images/logoImages/apple-music.png', 'https://localhost/innovare/static/app-assets/images/logoImages/5ece500f123d6d0004ce5f8a.png', '2021-05-15 11:20:20', 7, '2021-05-15 11:52:16');

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
-- Indexes for table `team`
--
ALTER TABLE `team`
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
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_cat`
--
ALTER TABLE `course_cat`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_document`
--
ALTER TABLE `course_document`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_cat`
--
ALTER TABLE `event_cat`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_documents`
--
ALTER TABLE `event_documents`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_gallery`
--
ALTER TABLE `event_gallery`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `website_details`
--
ALTER TABLE `website_details`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
