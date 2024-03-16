-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 10:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `Id` int(10) NOT NULL,
  `Question` varchar(200) NOT NULL,
  `Answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`Id`, `Question`, `Answer`) VALUES
(1, 'Who are we?', 'We are students from Multimedia University. We studied Diploma in Information Technology and this is our last semester. The reason we do this webpage is for our Final Year Project.'),
(2, 'What we provide to our user', 'Our webpage is use to provide conveniece to user. Our user mostly are student and house owner. We use to help house owner to rent their house and help student to find their satisfied hostel anytime anywhere via our webpage.'),
(4, 'Frequently Asks Questions', ''),
(5, 'How Do I Pay for the hostel?', 'Remember your student loans can help you to cover these costs, it\'s what it\'s there for after all!'),
(6, 'What Can\'t I Bring to the hostel?', 'Pets and weapons are usually not allowed for every hostel, but other items include mini fridges, portable heaters and candles, you need to get the owner permission to bring into your accomodation.  								So if you are not sure if you can bring it, check with the owner first.'),
(7, 'Will the hostel be cleaned before my arrival?', 'The hostel should be clean and ready for you to move in. If you are not happy with the condition of the hostel or you notice any damage, you must point this out to the hostel owner straight away and indicate this on the inventory. Taking photographs may also be helpful to refer to in the unlikely event of any dispute at the end of the contract.'),
(8, 'Who do I contact if have problem?', 'If you are not able to resolve the matter, our admins are available to help you contacting the owner with any problems or concerns you may have and offer advice on all housing matters.'),
(9, 'Why Choose Us?', ''),
(10, 'Easy to Search', 'User can compare different hostel, price, location and the cleanliness from our webpage and find the hostel that you prefer easily.'),
(11, 'Customer Services', 'We provide good services to our user. We use to help owner to rent their hostel and provide student a better assurance.'),
(12, 'Ensure User Safety', 'We make sure all the data that upload are been protected and with the correct information.'),
(13, 'Bring Convenience', 'By using our system user can directly book their satisfied house anytime, anywhere.');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Pic` varchar(100) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `AdminType` varchar(100) NOT NULL,
  `AdminIsDelete` int(10) NOT NULL,
  `AdminDel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Name`, `Email`, `Password`, `Pic`, `Contact`, `Gender`, `AdminType`, `AdminIsDelete`, `AdminDel`) VALUES
(1, 'Demo1', 'Demo1@demo.com', '123.Qwer', 'demo1.jpg', '0112345678', 'Female', 'SuperAdmin', 0, 0),
(2, 'Demo2', 'Demo2@demo.com', '123.Qwer', 'demo.jpg', '0123456789', 'Male', 'SuperAdmin', 0, 0),
(3, 'Demo3', 'Demo3@demo.com', '123.Qwer', 'demo.png', '0111234567', 'Female', 'SuperAdmin', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Id` int(10) NOT NULL,
  `HosId` int(10) NOT NULL,
  `BookId` int(10) NOT NULL,
  `StudId` int(10) NOT NULL,
  `OwnId` int(10) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Time` varchar(100) NOT NULL,
  `Message` varchar(1000) NOT NULL,
  `Approve` int(10) NOT NULL,
  `AppoinDone` int(10) NOT NULL,
  `AppoinIsDelete` int(10) NOT NULL,
  `OwnPassKey` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Id`, `HosId`, `BookId`, `StudId`, `OwnId`, `Date`, `Time`, `Message`, `Approve`, `AppoinDone`, `AppoinIsDelete`, `OwnPassKey`) VALUES
(1, 1, 1, 1, 1, '2020-10-08', '5 pm', 'Hi i would like to visit these two hostel', 1, 1, 0, 1),
(2, 8, 2, 1, 1, '2020-10-08', '5 pm', 'Hi i would like to visit these two hostel', 1, 1, 0, 1),
(3, 3, 5, 2, 1, '2020-10-29', '4 pm', 'Hi i would like to view this hostel', 0, 0, 0, 0),
(4, 1, 9, 1, 1, '2020-10-17', '2 pm', 'Please bring me to visit the hostel thank you!', 0, 1, 0, 0),
(5, 2, 11, 5, 1, '2020-10-29', '6 pm', 'Hi', 0, 0, 0, 0),
(6, 3, 12, 5, 1, '2020-10-29', '6 pm', 'Hi', 0, 0, 0, 0),
(7, 7, 13, 5, 1, '2020-10-16', '12 pm', 'Hi', 0, 1, 0, 0),
(8, 9, 14, 5, 3, '2020-10-17', '12 pm', '', 0, 1, 0, 0),
(9, 6, 15, 5, 1, '2020-11-07', '8 pm', '', 0, 0, 1, 0),
(13, 3, 19, 1, 1, '2020-10-15', '12 pm', 'hi', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Id` int(10) NOT NULL,
  `HosId` int(10) NOT NULL,
  `StudId` int(10) NOT NULL,
  `RateId` int(10) NOT NULL,
  `TotRoom` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(100) NOT NULL,
  `HosIsDelete` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Id`, `HosId`, `StudId`, `RateId`, `TotRoom`, `Date`, `Status`, `HosIsDelete`) VALUES
(1, 1, 1, 0, 1, '2020-10-06', 'cancel', 1),
(2, 8, 1, 1, 3, '2020-10-06', 'paid', 1),
(3, 1, 2, 0, 1, '2020-10-06', 'unpaid', 1),
(4, 6, 2, 0, 1, '2020-10-06', 'paid', 1),
(5, 3, 2, 0, 5, '2020-10-06', 'unpaid', 1),
(6, 7, 1, 0, 1, '2020-10-07', 'cancel', 1),
(7, 2, 1, 0, 6, '2020-10-07', 'unpaid', 1),
(8, 6, 2, 0, 1, '2020-10-07', 'unpaid', 0),
(9, 1, 1, 0, 1, '2020-10-08', 'cancel', 1),
(10, 1, 4, 0, 1, '2020-10-08', 'paid', 1),
(11, 2, 5, 0, 1, '2020-10-08', 'v', 1),
(12, 3, 5, 0, 1, '2020-10-08', 'cancel', 1),
(13, 7, 5, 0, 1, '2020-10-08', 'cancel', 0),
(14, 9, 5, 0, 1, '2020-10-08', 'cancel', 1),
(15, 6, 5, 0, 1, '2020-10-08', 'cancel', 1),
(23, 2, 3, 0, 1, '2020-10-13', 'cancel', 1),
(24, 2, 3, 0, 6, '2020-10-13', 'cancel', 1),
(25, 7, 6, 0, 1, '2020-10-13', 'unpaid', 0),
(26, 3, 6, 0, 5, '2020-10-13', 'unpaid', 0),
(27, 3, 3, 0, 1, '2020-10-13', 'proceed', 0),
(28, 2, 3, 0, 0, '2020-11-30', 'v', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id` int(10) NOT NULL,
  `StudId` int(10) NOT NULL,
  `HosId` int(10) NOT NULL,
  `NumOfRoom` int(10) NOT NULL,
  `HosIsDelete` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Id`, `StudId`, `HosId`, `NumOfRoom`, `HosIsDelete`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 8, 3, 1),
(3, 2, 1, 1, 1),
(4, 2, 6, 1, 1),
(5, 2, 3, 1, 1),
(6, 1, 7, 1, 1),
(7, 1, 2, 6, 1),
(8, 2, 6, 1, 1),
(9, 1, 1, 1, 1),
(10, 4, 1, 1, 1),
(11, 5, 2, 1, 1),
(12, 5, 3, 1, 1),
(13, 5, 7, 1, 1),
(14, 5, 3, 1, 1),
(15, 5, 9, 1, 1),
(16, 5, 6, 1, 1),
(17, 7, 7, 1, 1),
(18, 7, 7, 6, 1),
(19, 1, 4, 8, 1),
(20, 1, 3, 1, 1),
(21, 1, 1, 1, 0),
(25, 3, 2, 1, 1),
(26, 3, 2, 6, 1),
(27, 6, 7, 1, 1),
(28, 6, 3, 5, 1),
(29, 3, 3, 1, 1),
(30, 3, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(10) NOT NULL,
  `Category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `Category`) VALUES
(1, 'Ixora Apartment\r\n'),
(2, 'Pangsapuri Bukit Beruang Permai'),
(3, 'The Height Resident'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Id` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` varchar(1000) NOT NULL,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Id`, `Name`, `Email`, `Subject`, `Message`, `Status`) VALUES
(1, 'Gan Zhi Qing', '1122@gmail.com', 'Seek for help', 'Hi may i know how can I make an appointment?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_discount` varchar(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(11) NOT NULL,
  `coupon_used` int(11) NOT NULL,
  `coupon_add` int(11) NOT NULL,
  `CouponIsDelete` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_title`, `coupon_discount`, `coupon_code`, `coupon_limit`, `coupon_used`, `coupon_add`, `CouponIsDelete`) VALUES
(1, 'RAYA DISCOUNT', '0.05', 'JOMRAYA', 0, 1, 1, 0),
(2, 'NEW USER DISCOUNT', '0.05', 'NewUser', 1000, 6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Id` int(11) NOT NULL,
  `CourseTitle` text NOT NULL,
  `CourseIsDelete` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Id`, `CourseTitle`, `CourseIsDelete`) VALUES
(1, 'Foundation in Business', 0),
(3, 'Diploma in Business Administration', 0),
(4, 'Diploma in Accounting', 0),
(5, 'Foundation in Engineering', 0),
(6, 'Diploma in Electronic Engineering', 0),
(7, 'Foundation in Information Technology', 0),
(8, 'Diploma in Information Technology', 0),
(9, 'Foundation in Life Sciences', 0),
(10, 'Foundation in Law', 0),
(11, 'Others', 0),
(15, 'Bachelor of Artificial Intelligent', 0),
(16, 'Bachelor of Security Technology', 0),
(17, 'Bachelor of Human Resources', 0);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `Id` int(10) NOT NULL,
  `Hostel` varchar(100) NOT NULL,
  `Details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`Id`, `Hostel`, `Details`) VALUES
(1, 'Ixora Apartment', 'It located at Bukit Beruang. The prestigious Ixora Apartment comprises of 4 block of majestic residential apartments spreading over 9 acres of land. It just 2 minutes walk distance to Multimedia University'),
(2, 'Pangsapuri Bukit Beruang Permai', 'It located at ayeh keroh. It only tooks  minutes walking distance to Multimedia University.'),
(3, 'The Height Resident', 'It located at Ayer Keroh, it offer swimming pool, fitness center and barbeque facilities. The apartment also offer a sauna. It just 10 minutes walking distance to Multimedia University.');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `Id` int(10) NOT NULL,
  `StudId` int(10) NOT NULL,
  `HosId` int(10) NOT NULL,
  `HosIsDelete` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`Id`, `StudId`, `HosId`, `HosIsDelete`) VALUES
(1, 1, 1, 0),
(2, 1, 4, 0),
(3, 2, 1, 0),
(4, 2, 6, 0),
(5, 7, 7, 0),
(6, 3, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `User_id` int(10) NOT NULL,
  `Fbname` varchar(100) NOT NULL,
  `FbPhnNum` varchar(20) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `Date` datetime NOT NULL,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`User_id`, `Fbname`, `FbPhnNum`, `Message`, `Date`, `Status`) VALUES
(1, 'Gan Zhi Qing', '011235648959', 'Having a good services', '2020-10-05 17:34:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `Id` int(10) NOT NULL,
  `Pic` varchar(100) NOT NULL,
  `Hostel` varchar(100) NOT NULL,
  `Room` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`Id`, `Pic`, `Hostel`, `Room`) VALUES
(1, 'ixora.jpg', 'Ixora', ''),
(2, 'BBP.png', 'Pangsapuri Bukit Beruang Permai', ''),
(3, 'height.jpg', 'The Height Residence', ''),
(4, 'ix.png', 'Ixora', 'Room'),
(5, 'bbp2.png', 'Pangsapuri Bukit Beruang Permai', 'Room'),
(6, 'height2.png', 'The Height Residence', 'Room');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `ID` int(10) NOT NULL,
  `Own_id` int(10) NOT NULL,
  `HosName` varchar(100) NOT NULL,
  `HosPrice` int(10) NOT NULL,
  `Cat_id` int(10) NOT NULL,
  `OriRoom` int(10) NOT NULL,
  `TotRoom` int(10) NOT NULL,
  `HosDetails` text NOT NULL,
  `Image1` varchar(100) NOT NULL,
  `Image2` varchar(100) NOT NULL,
  `Image3` varchar(100) NOT NULL,
  `Image4` varchar(100) NOT NULL,
  `Image5` varchar(100) NOT NULL,
  `HostelIsDelete` int(10) NOT NULL,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`ID`, `Own_id`, `HosName`, `HosPrice`, `Cat_id`, `OriRoom`, `TotRoom`, `HosDetails`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `HostelIsDelete`, `Status`) VALUES
(1, 1, 'No 245 Block A', 360, 1, 6, 5, '<p>4 bed rooms with 2 single beds per rooms<br />Fully furnitured<br />2 washrooms with Water Heater ff</p>', 'Picture293.png', 'Picture294.png', 'Picture295.png', 'Picture296.png', 'Picture297.png', 0, 3),
(2, 1, 'No 284, Block A', 250, 2, 6, 6, '<p>4 bed rooms with 2 single beds per rooms<br />Fully furnitured<br />2 washrooms with water heater</p>', 'Picture180.png', 'Picture181.png', 'Picture182.png', 'Picture183.png', 'Picture184.png', 0, 1),
(3, 2, 'A-10-B', 250, 3, 5, 5, '<p>Utility not included</p>\r\n<p>5-10 minutes walking distance to MMU</p>\r\n<p>Priority for student</p>', 'Picture58.png', 'Picture59.png', 'Picture60.png', 'Picture61.png', 'Picture62.png', 0, 1),
(4, 2, 'No 93 Block D', 300, 4, 8, 5, '<p>Near to the AEON Ayer Keroh</p>\r\n<p>7 mins walk to MMU</p>', 'Picture224.png', 'Picture220.png', 'Picture221.png', 'Picture222.png', 'Picture223.png', 0, 1),
(5, 3, 'No 62, Bukit Beruang', 470, 1, 3, 3, '<p>3 bed room 2 bathroom</p>\r\n<p>Welcome student, intern and working adult</p>\r\n<p>Fully furnished. Friendly housemate</p>\r\n<p>&nbsp;</p>', 'Picture311.png', 'Picture312.png', 'Picture313.png', 'Picture314.png', 'Picture315.png', 0, 1),
(6, 3, 'Block A No 193', 500, 2, 4, 3, '<p>The house is eqquipped with refrigerator, washing machine, water heater, clothes kitchen, clothes rack, bed frame, desk and chair.</p>\r\n<p>First come first serve</p>', 'Picture89.png', 'Picture90.png', 'Picture91.png', 'Picture92.png', 'Picture93.png', 0, 1),
(7, 4, 'D-02-09', 200, 3, 6, 6, '<p>Unit facilities:</p>\r\n<p>-strong 8Mbps TM Wifi</p>\r\n<p>-117L refrigerator(sharing with housemate), cooking is allowed</p>\r\n<p>-bathroom shared with roomate only</p>\r\n<p>-laundry rack, dining table, sofa, cooking area</p>', 'Picture79.png', 'Picture80.png', 'Picture81.png', 'Picture82.png', 'Picture83.png', 0, 1),
(8, 4, 'Bukit Beruang Utama Apartment', 250, 3, 3, 3, '<p>Facilities(Apartment) : Swimming pool, Mini market, Covered parking, Playground, Jogging track, 24 hour security</p>\r\n<p>Facilities(Unit) :</p>\r\n<p>-3 bedrooms and 2 washroom</p>\r\n<p>-Fully furnished (water heater, frigde, stove, oven, sofa, washing machine, etc)</p>\r\n<p>Ready to move in.</p>', 'Picture151.png', 'Picture152.png', 'Picture153.png', 'Picture154.png', 'Picture155.png', 0, 1),
(9, 4, 'D0810', 280, 4, 4, 4, '<p>5 mins walk distance to mmu</p>\r\n<p>fridge is provided</p>\r\n<p>security guard 24 hour</p>', 'Picture1.png', 'Picture2.png', 'Picture3.png', 'Picture4.png', 'Picture5.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(10) NOT NULL,
  `Admin_id` int(10) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_ic` varchar(12) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `ownerPassport` varchar(100) NOT NULL,
  `owner_phnum` varchar(255) NOT NULL,
  `owner_currentaddress` varchar(255) NOT NULL,
  `StaId` int(10) NOT NULL,
  `postcode` int(5) NOT NULL,
  `owner_email` varchar(255) NOT NULL,
  `owner_pass` varchar(255) NOT NULL,
  `owner_image` text NOT NULL,
  `owner_icpic` text NOT NULL,
  `HOwner_nationality` varchar(100) NOT NULL,
  `HOwner_race` varchar(10) NOT NULL,
  `OwnerIsDelete` int(10) NOT NULL DEFAULT 0,
  `AdminDel` int(10) NOT NULL,
  `OwnerStatus` int(10) NOT NULL DEFAULT 0,
  `secu_pin` varchar(100) DEFAULT NULL,
  `secu_date` datetime DEFAULT NULL,
  `Que1` int(10) NOT NULL,
  `Ans1` varchar(1000) NOT NULL,
  `Que2` int(10) NOT NULL,
  `Ans2` varchar(1000) NOT NULL,
  `Que3` int(10) NOT NULL,
  `Ans3` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `Admin_id`, `owner_name`, `owner_ic`, `gender`, `ownerPassport`, `owner_phnum`, `owner_currentaddress`, `StaId`, `postcode`, `owner_email`, `owner_pass`, `owner_image`, `owner_icpic`, `HOwner_nationality`, `HOwner_race`, `OwnerIsDelete`, `AdminDel`, `OwnerStatus`, `secu_pin`, `secu_date`, `Que1`, `Ans1`, `Que2`, `Ans2`, `Que3`, `Ans3`) VALUES
(1, 1, 'Rowan Sebastian Atkinson', '550106125821', 'Male', '', '0163298536', '254, Jalan semabok', 4, 75050, 'bean@gmail.com', '123.Qwer', 'PROD-Mr-Beans-Holiday-Photocall.jpg', 'WhatsApp Image 2020-09-07 at 1.29.01 AM.jpeg', 'Malaysian', 'Chinese', 0, 0, 1, NULL, NULL, 1, '254', 2, '8536', 3, 'Pay fong'),
(2, 0, 'Obama', '640108088888', 'Male', '', '0125652685', 'Taman Satria Jaya', 11, 93350, 'obama@hotmail.com', '123.Qwer', '59c387d3ba785e34910e27b4.jpg', 'Barack-Obama-Malaysia-Identification-Card.jpg', 'Malaysian', 'Malay', 0, 0, 0, NULL, NULL, 5, 'XiaoHei', 2, '6257', 9, 'Broccoli'),
(3, 1, 'kara wong', '', 'Female', 'K0123456', '0152320220', 'jalan success', 2, 85600, 'kara@gmail.com', '123.Qwer', '0.jpg', '440px-Biodata_page_of_Singapore_Passport.jpg', 'Non-Malaysian', 'chinese', 0, 0, 1, NULL, NULL, 1, '1234', 2, '8119', 3, 'jj'),
(4, 0, 'Lim Mei Hua', '', 'Female', 'L0123456', '0152360222', 'jalan hisup', 4, 86666, 'mei@gmail.com', '123.Qwer', 'download.jpg', '640px-ROC_National_Without_Registration_Passport_Datapage.jpg', 'Non-Malaysian', 'chinese', 0, 0, 0, NULL, NULL, 1, '1234', 2, '8119', 3, 'jj');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` int(10) NOT NULL,
  `HosId` int(10) NOT NULL,
  `BookId` int(10) NOT NULL,
  `StudId` int(10) NOT NULL,
  `OwnId` int(10) NOT NULL,
  `VouId` int(10) NOT NULL,
  `Bank` varchar(100) NOT NULL,
  `HolderName` varchar(100) NOT NULL,
  `CardNumber` varchar(100) NOT NULL,
  `CardType` varchar(100) NOT NULL,
  `CVV` int(3) NOT NULL,
  `ExpireDate` varchar(10) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `PaymentDate` varchar(100) NOT NULL,
  `MoveIn` date NOT NULL,
  `Duration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ID`, `HosId`, `BookId`, `StudId`, `OwnId`, `VouId`, `Bank`, `HolderName`, `CardNumber`, `CardType`, `CVV`, `ExpireDate`, `Price`, `PaymentDate`, `MoveIn`, `Duration`) VALUES
(1, 8, 2, 1, 1, 0, 'CIMB Bank', 'Gan Zhi Qing', '4652 3688 9033 6257', 'VISA', 255, '2021-12', '750', '2020-10-06', '2020-10-16', '1 year'),
(2, 6, 4, 2, 1, 0, 'CIMB Bank', 'elvin', '5412 3121 1312 1212', 'MASTERCARD', 333, '2020-12', '500', '2020-10-08', '2020-10-24', '1 year'),
(3, 1, 10, 4, 1, 4, 'Public Bank Berhad', 'Wong Jing Wei', '4658 4238 6660 0372', 'VISA', 225, '2020-12', '342', '2020-10-08', '2020-10-17', '1 year');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `Id` int(11) NOT NULL,
  `HosId` int(10) NOT NULL,
  `Rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`Id`, `HosId`, `Rating`) VALUES
(1, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `secureque`
--

CREATE TABLE `secureque` (
  `Id` int(10) NOT NULL,
  `Question` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secureque`
--

INSERT INTO `secureque` (`Id`, `Question`) VALUES
(1, 'What was the house number and street name you lived in as a child?'),
(2, 'What were the last four digits of your childhood telephone number?'),
(3, 'What primary school did you attend?'),
(4, 'In what town or city was your first full time job?'),
(5, 'What is you pets name'),
(6, 'Who is your best friend'),
(7, 'In what town or city did your parents meet?'),
(8, 'What time of the day were you born? (dd:mm)'),
(9, 'What is you favourite food');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `Slidecode` varchar(20) NOT NULL,
  `Pic` varchar(100) NOT NULL,
  `Hostel` varchar(100) NOT NULL,
  `Distance` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`Slidecode`, `Pic`, `Hostel`, `Distance`) VALUES
('S01', 'Ixora_Slider.jpg', 'Ixora Apartment', '2 mins walk distance to MMU'),
('S02', 'BBP.png', 'Pangsapuri Bukit Beruang Permai', '5 mins walking distance to MMU'),
('S03', 'THR.jpg', 'The Height Residence', '10 mins walking distance to MMU');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `ID` int(11) NOT NULL,
  `State` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`ID`, `State`) VALUES
(1, 'Johor'),
(2, 'Kedah'),
(3, 'Kelantan'),
(4, 'Malacca'),
(5, 'Negeri Sembilan'),
(6, 'Pahang'),
(7, 'Perak'),
(8, 'Perlis'),
(9, 'Penang'),
(10, 'Sabah'),
(11, 'Sarawak'),
(12, 'Selangor'),
(13, 'Terengganu');

-- --------------------------------------------------------

--
-- Table structure for table `studregister`
--

CREATE TABLE `studregister` (
  `User_id` int(10) NOT NULL,
  `Admin_id` int(100) NOT NULL,
  `Studname` varchar(100) NOT NULL,
  `Nation` varchar(100) NOT NULL,
  `Studic` varchar(20) NOT NULL,
  `StudPassport` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Studphnum` varchar(20) NOT NULL,
  `CousId` int(10) NOT NULL,
  `StudOfferLetter` varchar(100) NOT NULL,
  `StudProfile` varchar(100) NOT NULL,
  `Studaddress` varchar(100) NOT NULL,
  `StaId` int(10) NOT NULL,
  `Postcode` int(5) NOT NULL,
  `Studemail` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `secu_pin` varchar(100) DEFAULT NULL,
  `secu_date` datetime DEFAULT NULL,
  `StudIsDelete` int(10) NOT NULL,
  `AdminDel` int(10) NOT NULL,
  `StudStatus` int(10) NOT NULL,
  `Que1` int(10) NOT NULL,
  `Ans1` varchar(1000) NOT NULL,
  `Que2` int(10) NOT NULL,
  `Ans2` varchar(1000) NOT NULL,
  `Que3` int(10) NOT NULL,
  `Ans3` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studregister`
--

INSERT INTO `studregister` (`User_id`, `Admin_id`, `Studname`, `Nation`, `Studic`, `StudPassport`, `Gender`, `Studphnum`, `CousId`, `StudOfferLetter`, `StudProfile`, `Studaddress`, `StaId`, `Postcode`, `Studemail`, `Password`, `secu_pin`, `secu_date`, `StudIsDelete`, `AdminDel`, `StudStatus`, `Que1`, `Ans1`, `Que2`, `Ans2`, `Que3`, `Ans3`) VALUES
(1, 1, 'Gan Zhi Qing', 'Malaysian', '000715011234', '', 'Female', '01254654546', 15, '120601387_1181318085572939_5717702466968197655_n.jpg', '606560186.jpg', '1234', 1, 84300, '11@gmail.com', '123.Qwer', NULL, NULL, 1, 1, 1, 1, '144', 2, '8119', 5, 'Xiao Hei'),
(2, 2, 'Elvin Ting Di Wei', 'Non-Malaysian', '', 'C1234567', 'Male', '0125658956', 1, '519318523.jpg', 'diwei.jpg', '45444', 5, 76000, '22@gmail.com', '123.Qwer', NULL, NULL, 0, 0, 1, 1, '87', 8, '26:06', 2, '8956'),
(3, 3, 'Jack Lee Lik Jie', 'Malaysian', '000503012226', '', 'Male', '02365898562', 8, 'JACK.pdf', 'jack.jpg', '15 jalan 1 taman impian batu pahat', 1, 83000, 'jj@gmail.com', '123.Qwer', NULL, NULL, 0, 0, 1, 3, 'Sjk c renming', 6, 'andy', 4, 'kuala lumpur'),
(4, 1, 'Wong Jing Wei', 'Non-Malaysian', '', 'H4512314', 'Female', '0125658956', 1, '925577929.jpg', 'JING WEI.jpg', '13 jalan 15 taman suasa', 9, 81000, '33@gmail.com', '123.Qwer', NULL, NULL, 0, 0, 1, 5, 'Boby', 7, 'USA', 9, 'Strawberry'),
(5, 2, 'Chan Hong Sang', 'Non-Malaysian', '', 'A0125678', 'Male', '0125659898', 1, '1544254926.jpg', 'PIERRE.jpg', '13 Jalan 1 taman sri bahru', 6, 81300, '44@gmail.com', '123.Qwer', NULL, NULL, 0, 0, 1, 1, '999', 9, 'Meat', 5, 'burger'),
(6, 1, 'Ng You Heng', 'Non-Malaysian', '', 'D6856903', 'Male', '0125238895', 1, '2006016743.jpg', 'YOUHENG.jpg', 'taman wulu', 8, 76503, '55@gmail.com', '123.Asdf', NULL, NULL, 0, 0, 1, 3, 'YING MING', 4, 'johor bahru', 6, 'Maximous');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `Id` int(10) NOT NULL,
  `CoupId` int(10) NOT NULL,
  `StudId` int(10) NOT NULL,
  `VouIsUse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`Id`, `CoupId`, `StudId`, `VouIsUse`) VALUES
(1, 2, 1, 0),
(2, 2, 2, 0),
(3, 2, 3, 0),
(4, 2, 4, 1),
(5, 2, 5, 0),
(6, 2, 6, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `secureque`
--
ALTER TABLE `secureque`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`Slidecode`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `studregister`
--
ALTER TABLE `studregister`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `User_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `secureque`
--
ALTER TABLE `secureque`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `studregister`
--
ALTER TABLE `studregister`
  MODIFY `User_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
