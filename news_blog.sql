-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 02:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `sr_no` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `post_under_cat` int(5) NOT NULL DEFAULT 0,
  `date_modify` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`sr_no`, `cat_name`, `post_under_cat`, `date_modify`) VALUES
(6, 'bollywood', 2, '2023-05-20 04:37:33'),
(7, 'hollywood', 4, '2023-05-20 04:37:40'),
(8, 'music', 2, '2023-05-20 04:37:45'),
(9, 'news', 3, '2023-05-20 04:37:51'),
(10, 'ecommerce', 2, '2023-05-22 09:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `cat` int(5) NOT NULL,
  `author` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`sr_no`, `image`, `title`, `description`, `date`, `cat`, `author`) VALUES
(9, 'img3.jpg', 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-05-22 09:32:58', 6, 1),
(10, 'img4.jpg', 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.', '2023-05-22 09:34:27', 7, 1),
(11, 'img5.jpg', 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2023-05-22 09:35:04', 8, 1),
(12, 'img6.jpg', 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2023-05-22 09:35:40', 9, 1),
(13, 'img7.jpg', 'The standard Lorem Ipsum passage, used since the 1500s', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2023-05-22 09:36:35', 10, 2),
(14, 'img9.jpg', 'de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2023-05-22 09:37:16', 6, 2),
(15, 'img10.jpg', '1914 translation by H. Rackham', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure', '2023-05-22 09:37:53', 7, 2),
(16, 'img11.jpg', 'de Finibus Bonorum et Malorum', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repella', '2023-05-22 09:38:36', 7, 2),
(17, 'img12.jpg', '1914 translation by H. Rackham', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains', '2023-05-22 09:39:28', 9, 3),
(18, 'img13.jpg', 'hello world how are you', 'Aliquam quis ex orci. Maecenas sodales urna vel sem tincidunt sodales. Sed pulvinar ante in ligula scelerisque hendrerit. Vivamus nisi ligula, posuere sit amet placerat ut, consequat non est. Ut feugiat porta libero ut vestibulum. Praesent ultricies, ligula vitae vehicula eleifend, diam nisl pharetra erat, quis pretium quam lacus vitae turpis. Nullam volutpat purus lorem, vel sagittis metus tincidunt et. Suspendisse ac vulputate sapien', '2023-05-22 09:40:57', 10, 3),
(19, 'img15.jpg', 'Vestibulum id volutpat nibh', 'Vestibulum id volutpat nibh. In eget lorem ut mauris maximus tempus non et augue. Nunc porta libero id augue luctus feugiat. Aliquam eleifend pulvinar augue, sed feugiat enim cursus eu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In viverra rutrum eros, vitae varius erat tristique id. Duis ac porttitor nisi, id ornare magna. Nullam iaculis ex sit amet mi efficitur sagittis. Fusce ac tortor faucibus, tempus est at, ullamcorper erat. Nunc fermentum maximus tellus, vitae tempor justo mattis eu. Aliquam feugiat at tellus in pharetra. Etiam dolor enim, sagittis et mauris vitae, vehicula volutpat nibh. Ut porttitor, sem a vestibulum interdum, magna odio egestas nunc, ac tristique nulla urna id eros. Donec congue pharetra volutpat. Proin id placerat metus, quis maximus magna. Nullam gravida mauris tortor, ac scelerisque sem tincidunt non.', '2023-05-22 09:41:31', 7, 3),
(20, 'img16.jpg', 'Aliquam fermentum, velit eget luctus sollicitudin', 'Aliquam fermentum, velit eget luctus sollicitudin, est sapien feugiat turpis, non tristique odio sapien non leo. Praesent mollis auctor nisi in semper. Integer accumsan lacus nec odio hendrerit bibendum. Ut scelerisque orci vel metus viverra tristique. Cras eu nisl rutrum, scelerisque eros vel, pretium ipsum. Nam quis pharetra turpis. Etiam porta eros et augue elementum scelerisque. Donec pulvinar varius mi vel sagittis. Aliquam non nisl eu orci sagittis rhoncus. Maecenas nec nulla urna.', '2023-05-22 09:42:14', 9, 3),
(21, 'img23.jpg', 'i am manish admin', 'hey hahahahahahaha', '2023-05-22 12:03:10', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sr_no` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sr_no`, `fname`, `lname`, `uname`, `password`, `role`, `date`) VALUES
(1, 'manish', 'prajapati', 'manish@mail.com', 'f2255ea1bfddae3560f2f3c17ca65454', 0, '2023-05-20 04:43:28'),
(2, 'sanjay', 'patel', 'sanjay@mail.com', '560fab5add03238d438b48d6b71d5805', 1, '2023-05-21 06:06:41'),
(3, 'gopal', 'daas', 'gopal@mail.com', 'eb977eacadef5cfbe06c0e602b19a494', 1, '2023-05-21 02:19:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
