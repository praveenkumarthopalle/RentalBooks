-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 06:03 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_books_info`
--

CREATE TABLE `add_books_info` (
  `id` int(5) NOT NULL,
  `books_name` varchar(50) NOT NULL,
  `books_author_name` varchar(50) NOT NULL,
  `books_publication_name` varchar(50) NOT NULL,
  `books_price` varchar(10) NOT NULL,
  `books_qty` varchar(10) NOT NULL,
  `available_qty` varchar(10) NOT NULL,
  `librarian_username` varchar(50) NOT NULL,
  `books_image` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_books_info`
--

INSERT INTO `add_books_info` (`id`, `books_name`, `books_author_name`, `books_publication_name`, `books_price`, `books_qty`, `available_qty`, `librarian_username`, `books_image`) VALUES
(12, 'Mastering iOS 10 Programming', 'Donny Wals', 'Google', '3', '50', '47', 'admin', 'books_image/c02c16100173260d306d389a7966db949359 OS_ B05645 Mastering iOS 10 Programming.jpg'),
(13, 'The Book of God', 'Walter Wangerin Jr.', 'xyz', '4', '20', '18', 'admin', 'books_image/01d80a47ff84a5409848608ef730786e965733.jpg'),
(14, 'Android Programming for Beginners', 'John Horton', 'abc', '2', '20', '13', 'admin', 'books_image/9352ba95cdfe93ccbfd246a4b1b588ae9781785883262.png'),
(15, 'Angular Js ', 'Frederik Dietz', 'Succinctly', '3', '30', '30', 'admin', 'books_image/f3e7d455a7cbba101d7bd42a6c93c42bangularjs-succinctly.jpg'),
(16, 'ASP.NET Core', 'Simone Chiaretta & Ugo Lattanzi', 'Succinctly', '2', '40', '40', 'admin', 'books_image/0db7459e546ac56bba8d867d4dd470c0ASP_NET_Core_Succinctly.png'),
(17, 'Angular 2', 'Sebastian Eschweiler', 'hello-world', '1.3', '40', '40', 'admin', 'books_image/d5ad303a8875bfd2e90461fa930bf4c3hero.png'),
(18, 'PHP Developers Dictionary', 'Allen & Robert', 'SAMS', '3.50', '10', '10', 'admin', 'books_image/6847acf5ba6c0aa5e4b1432090bf53ac41644D8MEHL.jpg'),
(19, 'PHP Developers GUIDE', 'columbus', 'SAMS tech pub.', '2.10', '1', '0', 'admin', 'books_image/194276d4e150dd34b9da3ebbe72977acc76e711f-ed20-4a2b-a886-669f258e85d7.png'),
(20, 'HTML', 'Jon Duckett', 'WILEY', '5', '10', '0', 'admin', 'books_image/14c6c55747e130e34768b7b3cc76950a1364888556971338566.jpg'),
(21, 'Javascript & JQuery', 'Jon Duckett', 'WILEY', '5', '10', '10', 'admin', 'books_image/7d25702301ff5909b1d5ffb3b2a46a501364888556971338566.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `add_ebooks_info`
--

CREATE TABLE `add_ebooks_info` (
  `id` int(8) NOT NULL,
  `book_name` varchar(256) NOT NULL,
  `book_author_name` varchar(256) NOT NULL,
  `book_publication` varchar(128) NOT NULL,
  `book_edition` varchar(16) NOT NULL,
  `book_edition_year` varchar(16) NOT NULL,
  `book_image` varchar(1024) NOT NULL,
  `pdf_file_path` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_ebooks_info`
--

INSERT INTO `add_ebooks_info` (`id`, `book_name`, `book_author_name`, `book_publication`, `book_edition`, `book_edition_year`, `book_image`, `pdf_file_path`) VALUES
(1, 'Iconic', 'google', 'w3', '2', '2017', 'ebooks_image/f7c2e1010c96b6c582ef12a3fcea522cmedium.png', 'ebooks_pdf/f7c2e1010c96b6c582ef12a3fcea522c1.HTML and CSS design and build websites.pdf'),
(3, 'React JS', 'andy wilson', 'facetime', '2', '2013', 'books_image/9989d25c1ed9a29cedf398f913085525R6vKaLYH_200x200.jpg', 'ebooks_pdf/f7c2e1010c96b6c582ef12a3fcea522c1.HTML and CSS design and build websites.pdf'),
(7, 'Angular JS Up and Running', 'Shyam Seshadri & Brad Green', 'OREILLY', '1', '2014', 'ebooks_image/b56a537270138669fd7c209c716e58e9lrg.jpg', 'ebooks_pdf/b56a537270138669fd7c209c716e58e9AngularJS Up and Running.pdf'),
(8, 'Angular JS Up and Running', 'Shyam Seshadri & Brad Green', 'OREILLY', '1', '2014', 'books_image/11186fd6fb3444c9b8425ccaa68dcf101485237758android-tutorials-04-Android-Book.png', 'ebooks_pdf/f7c2e1010c96b6c582ef12a3fcea522c1.HTML and CSS design and build websites.pdf'),
(9, 'Javascript - the Definite Guide', 'Jon Duckett', 'OREILLY', '6th', '2016', 'ebooks_image/4250df1090b611e1312e6a9ee19657d9JS-guide.png', 'ebooks_pdf/4250df1090b611e1312e6a9ee19657d93.[O`Reilly] - JavaScript. The Definitive Guide, 6th ed. - [Flanagan].pdf');

-- --------------------------------------------------------

--
-- Table structure for table `fine_table`
--

CREATE TABLE `fine_table` (
  `id` int(225) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_type` varchar(225) NOT NULL,
  `book_name` varchar(225) NOT NULL,
  `quantity` int(225) NOT NULL,
  `total_fine` decimal(60,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(5) NOT NULL,
  `student_enrollment` varchar(20) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_sem` varchar(20) NOT NULL,
  `student_contact` varchar(20) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `book_id` int(225) NOT NULL,
  `books_name` varchar(100) NOT NULL,
  `books_issue_date` date NOT NULL,
  `books_issue_time` time NOT NULL,
  `books_return_date` date NOT NULL,
  `book_charges` varchar(8) NOT NULL,
  `student_user_name` varchar(50) NOT NULL,
  `user_type` varchar(32) NOT NULL,
  `book_status` varchar(225) NOT NULL,
  `return_mail` varchar(225) NOT NULL,
  `block_mail` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_enrollment`, `student_name`, `student_sem`, `student_contact`, `student_email`, `book_id`, `books_name`, `books_issue_date`, `books_issue_time`, `books_return_date`, `book_charges`, `student_user_name`, `user_type`, `book_status`, `return_mail`, `block_mail`) VALUES
(2, '123456', 'test_student lkfjldfk', '213', '987644', 'test@gmai.com', 0, 'HTML', '2017-12-18', '00:00:00', '2018-01-01', '5', 'teststudent', 'student', 'booked', '', 'not'),
(50, '3567891003', 'shravan kumar', '4', '9087654321', 'shilpavorsu@gmail.com', 19, 'PHP Developers GUIDE', '2017-12-16', '16:02:38', '0000-00-00', '2.10', 'shravan01', 'student', 'booked', '', 'not'),
(53, '3567891003', 'shravan kumar', '4', '9087654321', 'shilpavorsu@gmail.com', 19, 'PHP Developers GUIDE', '2017-12-18', '11:34:20', '2017-12-21', '2.10', 'shravan01', 'student', 'booked', 'not', 'not'),
(55, '7465897', 'shilpa vorsu', '8', '9847855', 'shilpavorsu@gmail.com', 13, 'The Book of God', '2017-12-10', '06:48:33', '2017-12-21', '4', 'shilpa04', 'student', 'booked', 'not', 'not'),
(57, '485486', 'shravan_test testlast', '1', '9466465464', 'shravankumar.lgit@gmail.com', 12, 'Mastering iOS 10 Programming', '2017-12-10', '11:35:00', '2017-12-21', '3', 'shravan09', 'student', 'booked', 'mailed', 'mailed'),
(58, '657657', 'karna karna', '6', '9293456789', 'shilpavorsu@gmail.com', 13, 'The Book of God', '2017-12-10', '12:02:04', '2017-12-21', '4', 'karna02', 'student', 'booked', 'mailed', 'mailed'),
(59, '7465897', 'shilpa vorsu', '8', '9847855', 'shilpavorsu@gmail.com', 14, 'Android Programming for Beginners', '2017-12-10', '05:38:37', '2017-12-20', '2', 'shilpa04', 'student', 'booked', 'mailed', 'mailed');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books_org`
--

CREATE TABLE `issue_books_org` (
  `id` int(8) NOT NULL,
  `org_user_id` varchar(8) NOT NULL,
  `org_name` varchar(256) NOT NULL,
  `org_admin_name` varchar(256) NOT NULL,
  `org_contact` varchar(64) NOT NULL,
  `org_email` varchar(128) NOT NULL,
  `org_url` varchar(128) NOT NULL,
  `org_admin_username` varchar(256) NOT NULL,
  `book_id` int(225) NOT NULL,
  `book_name` varchar(256) NOT NULL,
  `books_qty` int(225) NOT NULL,
  `books_issue_date` date NOT NULL,
  `books_issue_time` time NOT NULL,
  `return_date` date NOT NULL,
  `user_type` varchar(32) NOT NULL,
  `book_status` varchar(225) NOT NULL,
  `return_mail` varchar(225) NOT NULL,
  `block_mail` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_books_org`
--

INSERT INTO `issue_books_org` (`id`, `org_user_id`, `org_name`, `org_admin_name`, `org_contact`, `org_email`, `org_url`, `org_admin_username`, `book_id`, `book_name`, `books_qty`, `books_issue_date`, `books_issue_time`, `return_date`, `user_type`, `book_status`, `return_mail`, `block_mail`) VALUES
(13, '', 'sample_org', 'admin_org', '9847855', 'shilpavorsu@gmail.com', 'rdrdrt', 'shi', 20, 'HTML', 7, '2017-12-13', '07:02:06', '0000-00-00', 'organization', 'booked', '', 'not'),
(14, '', 'sample_org', 'admin_org', '9847855', 'shilpavorsu@gmail.com', 'rdrdrt', 'shi', 20, 'HTML', 2, '2017-12-13', '07:02:06', '0000-00-00', 'organization', 'booked', '', 'not'),
(16, '', 'sample_org', 'admin_org', '9847855', 'shilpavorsu@gmail.com', 'rdrdrt', 'shi', 14, 'Android Programming for Beginners', 2, '2017-12-13', '07:04:33', '0000-00-00', 'organization', 'booked', '', 'not'),
(17, '', 'sample_org', 'admin_org', '9847855', 'shilpavorsu@gmail.com', 'rdrdrt', 'shi', 20, 'HTML', 1, '2017-12-13', '07:05:04', '0000-00-00', 'organization', 'booked', '', 'not'),
(27, '', 'sample_org', 'admin_org', '9847855', 'shilpavorsu@gmail.com', 'rdrdrt', 'shi', 20, 'HTML', 1, '2017-12-13', '07:02:06', '0000-00-00', 'organization', 'hold', 'not', 'not'),
(29, '', 'Northwestern Polytechnic College ', 'max well', '9870789098', 'shilpavorsu@gmail.com', 'www.npu.edu', 'npu', 14, 'Android Programming for Beginners', 3, '2017-12-10', '11:37:40', '2017-12-21', 'organization', 'booked', 'mailed', 'mailed');

-- --------------------------------------------------------

--
-- Table structure for table `librarian_registration`
--

CREATE TABLE `librarian_registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `conf_password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian_registration`
--

INSERT INTO `librarian_registration` (`id`, `firstname`, `lastname`, `email`, `contact`, `username`, `password`, `conf_password`) VALUES
(1, 'abc', 'def', 'admin@lms.com', '9876543210', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(5) NOT NULL,
  `susername` varchar(50) NOT NULL,
  `dusername` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `sdate` varchar(16) NOT NULL,
  `read1` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `susername`, `dusername`, `title`, `msg`, `sdate`, `read1`) VALUES
(3, 'admin', 'shravan01', 'Test title', 'test msg..................', '12/08/2017', 'n'),
(4, 'admin', 'ahmed01', 'Test title', 'test message only', '12/08/2017', 'n'),
(5, 'admin', 'omkar01', 'remainder', 'book return remainder', '12/08/2017', 'n'),
(6, 'admin', 'shravan01', 'hi', 'where are you', '12/08/2017', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `organization_registration`
--

CREATE TABLE `organization_registration` (
  `id` int(8) NOT NULL,
  `org_name` varchar(256) NOT NULL,
  `org_admin_name` varchar(128) NOT NULL,
  `org_type` varchar(128) NOT NULL,
  `org_size` int(8) NOT NULL,
  `contact` varchar(32) NOT NULL,
  `address` varchar(512) NOT NULL,
  `email` varchar(256) NOT NULL,
  `website_url` varchar(256) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization_registration`
--

INSERT INTO `organization_registration` (`id`, `org_name`, `org_admin_name`, `org_type`, `org_size`, `contact`, `address`, `email`, `website_url`, `username`, `password`, `added_on`) VALUES
(2, 'Northwestern Polytechnic College ', 'max well', 'College', 3450, '9870789098', 'California, USA', 'shilpavorsu@gmail.com', 'www.npu.edu', 'npu', '123', '2017-08-12'),
(3, 'sample_org', 'admin_org', 'school', 3, '987', 'bhjbj', 'tgty@ff.com', 'rdrdrt', 'admin_org', '123', '2017-12-06'),
(4, 'sample_org', 'admin_org', 'College', 3, '9847855', 'abc', 'shilpavorsu@gmail.com', 'rdrdrt', 'shi', 'abcd', '2017-12-11'),
(5, '', '', '0', 0, '', '', '', '', '', '', '2017-12-14'),
(6, 'ahdgfdj', 'msgf,jd', '0', 8756, '9490590036', 'uygjdgh', 'a@gm.coom', 'www.ui.com', 'hfdgvf', '', '2017-12-14'),
(7, 'aKEDMKE', 'qqqq', 'school', 0, '9490590123', 'abc', 'root@email.com', 'www.ruktrkv.ac.in', 'AAAAAA', '', '2017-12-14'),
(8, 'sample_org', 'admin_org', 'College', 6000, '7013316551', 'abc', 'root@email.com', 'rdrdrt', 'abcdef01', 'abcde01', '2017-12-14'),
(9, 'sample_org', 'admin_org', 'College', 6000, '7013316551', 'abc', 'root@email.com', 'rdrdrt', 'abcdef06', '12345678', '2017-12-14'),
(10, 'sample_org', 'admin_org', 'College', 6000, '7013316551', 'abc', 'root@email.com', 'rdrdrt', 'abcdef08', 'red6789', '2017-12-14'),
(11, 'sample_org', 'sai ganga', 'College', 3, '7013316551', 'abc', 'shravankumar.lgit@gmail.com', 'www.ruktrkv.ac.in', 'veerashra1', 'veera123', '2017-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `enrollment_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `conf_password` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(1024) NOT NULL,
  `added_on` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`id`, `firstname`, `lastname`, `sem`, `enrollment_no`, `email`, `username`, `password`, `conf_password`, `contact`, `address`, `added_on`, `status`) VALUES
(1, 'ahmed', 'rahmani', '4', '4567891001', 'ahmed@gmail.com', 'ahmed01', 'ahmed01', 'ahmed01', '9876543210', 'USA', '2017-08-09', 'active'),
(2, 'shravan', 'kumar', '4', '3567891003', 'shravan.kumar@gmail.com', 'shravan01', 'shravan01', 'shravan01', '9087654321', 'UK', '2017-08-10', 'active'),
(3, 'ashraf', 'rahmani', '1', '1567891301', 'ashraf.rahmani@gmail.com', 'ashraf02', 'ashraf01', 'ashraf01', '9087678900', 'DUBAI', '2017-08-10', 'inactive'),
(4, 'omkar', 'akula', '3', '3567891401', 'omkar@gmail.com', 'omkar01', 'omkar01', 'omkar01', '9089089089', 'CANADA', '2017-08-11', 'active'),
(5, 'test_student', 'lkfjldfk', '213', '123456', 'test@gmai.com', 'teststudent', '123', '123', '987644', 'dkfjnkj jksfhkjj jksf ', '2017-09-27', 'active'),
(6, 'sample_student', 'sample2', '1', '123', 'sjekfn@jj.com', 'sample', '123', '123', '98765454', '987 uurf hfh hb f', '2017-12-06', 'inactive'),
(7, 'sample_student2', 'ksd', '1', '12345', 'jhh@jhd.com', 'sample123', '123', '123', '8798', 'nhbhjjb', '2017-12-06', 'inactive'),
(13, 'shravan', 'kolanupaka', '6', '7564597', 'shravankumar.lgit@gmail.com', 'shra', 'abc', 'abc', '957658', 'hfdj,hf', '2017-12-09', 'inactive'),
(14, 'a', '846584', '8', '8475684', 'shravankumar.lgit@gmail.com', 'titi', 'abc', 'abc', '9847855', 'jhgjd', '2017-12-09', 'inactive'),
(15, 'shilpa', 'vorsu', '8', '7465897', 'shilpavorsu@gmail.com', 'shilpa04', 'red', 'red', '9847855', 'abc', '2017-12-11', 'inactive'),
(16, 'kavi', 'kavi', '4', '7896', 'shilpavorsu@gail.com', 'kavis', 'kavis', 'kavis', '9490590036', 'jdghfjdh', '2017-12-13', 'inactive'),
(17, 'dhfbgjkd', 'jdghskj', '8', '76547', 'shilpavorsu@gmail.com', 'kavi67', 'kavis', 'kavis', '745698', 'eyrtek', '2017-12-13', 'active'),
(18, '', '', '', '', '', '', '', '', '', '', '2017-12-14', 'inactive'),
(19, '', '', '', '', '', 's', '', '', '', '', '2017-12-14', 'inactive'),
(20, 'jhgj', 'gvdf', '4', '74687569875', 'shilpavorsu@gmail.com', 'abcdefghi', 'abcdef', 'abcdef', '', 'hgdvfjhdv ', '2017-12-14', 'inactive'),
(21, 'shilpa', 'vorsu', '8', '97650457', 'shilpavorsu@gmail.com', 'shilpa05', 'red1443', 'red1443', '9490590012', 'jfgdkjhfdjhb', '2017-12-14', 'inactive'),
(22, 'avira', 'gds', '7', '94780', 'shilpavorsu@gail.com', 'avikagor56', 'avika12', 'avika12', '9490590012', 'jhgkjdgfjd', '2017-12-14', 'inactive'),
(23, 'fjvjjkxvkj', 'kjdcnkj', '7', '46846', 'shi@gm.com', 'aaaaaaa', '123', '123', '9490590012', 'kdjfnvkj', '2017-12-14', 'inactive'),
(24, 'usertest', 'testlast', '1', '4564', 'shravankumar.lgit@gmail.com', 'xyzyzyz', '1111111', '1111111', '9490590021', 'dfjkj', '2017-12-14', 'inactive'),
(25, 'shilpa', 'bkudjgj,h', '9', '76476', 'shilpavorsu@gmail.com', 'tarang123', 'tarang123', 'tarang123', '9490590012', 'abc', '2017-12-14', 'inactive'),
(26, 'shilpa', 'bkudjgj,h', '8', '144387654', 'root@email.com', 'admin1992', 'admin1992', 'admin1992', '7013316551', 'abc', '2017-12-14', 'inactive'),
(27, 'anuradha', 'korenu', '4', '6747646', 'shilpavorsu@gail.com', 'anuradha123', 'anuradha123', 'anuradha123', '9293456789', 'jhgfjkg', '2017-12-16', 'inactive'),
(28, 'shilpa', 'bkudjgj,h', '8', '7465897', 'shravankumar.lgit@gmail.com', 'admin90', 'admin90', 'admin90', '7013316551', 'abc', '2017-12-16', 'inactive'),
(29, 'madhu', 'malavika', '8', '876877', 'shilpavorsu@gmail.com', 'madhu123', 'madhu123', 'madhu123', '9293456789', 'jdfhdgjkfh', '2017-12-18', 'inactive'),
(30, 'madhu', 'malavika', '8', '876877', 'shilpavorsu@gmail.com', 'madhu1234', 'madhu1234', 'madhu1234', '9293456789', 'jdfhdgjkfh', '2017-12-18', 'inactive'),
(31, 'shravan_test', 'testlast', '1', '485486', 'shravankumar.lgit@gmail.com', 'shravan09', '11111111', '11111111', '9466465464', 'jsdkfhjhs', '2017-12-19', 'inactive'),
(32, 'karna', 'karna', '6', '657657', 'shilpavorsu@gmail.com', 'karna02', 'karna02', 'karna02', '9293456789', 'jhgjd', '2017-12-19', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `suggest_books`
--

CREATE TABLE `suggest_books` (
  `id` int(8) NOT NULL,
  `suggest_by` varchar(64) NOT NULL,
  `book_name` varchar(128) NOT NULL,
  `author_name` varchar(128) NOT NULL,
  `edition` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggest_books`
--

INSERT INTO `suggest_books` (`id`, `suggest_by`, `book_name`, `author_name`, `edition`, `status`) VALUES
(1, 'ahmed01', 'ASP.NET', 'jon smith', '5th', 'Rejected'),
(2, 'ahmed01', 'android programming', 'mark jobs', '3rd', 'Rejected'),
(3, 'omkar01', 'angular 4', 'grey shaw', '1st', 'Rejected'),
(4, 'npu', 'abc', 'xyz', '4th', 'Approved'),
(5, 'npu', 'Story of SSLABS', 'Shravankumar', 'all editions', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_books_info`
--
ALTER TABLE `add_books_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_ebooks_info`
--
ALTER TABLE `add_ebooks_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fine_table`
--
ALTER TABLE `fine_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books_org`
--
ALTER TABLE `issue_books_org`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian_registration`
--
ALTER TABLE `librarian_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_registration`
--
ALTER TABLE `organization_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggest_books`
--
ALTER TABLE `suggest_books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_books_info`
--
ALTER TABLE `add_books_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `add_ebooks_info`
--
ALTER TABLE `add_ebooks_info`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `fine_table`
--
ALTER TABLE `fine_table`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `issue_books_org`
--
ALTER TABLE `issue_books_org`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `librarian_registration`
--
ALTER TABLE `librarian_registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `organization_registration`
--
ALTER TABLE `organization_registration`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `suggest_books`
--
ALTER TABLE `suggest_books`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
