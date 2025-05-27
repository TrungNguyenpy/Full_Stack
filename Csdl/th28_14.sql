-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 27, 2025 lúc 04:47 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `th28_14`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(50) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`CustomerID`, `FirstName`, `LastName`, `Email`, `Password`, `Role`) VALUES
(4, 'Nguyen', 'Thanh Trung', 'trung.nguyen@example.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(5, 'Le', 'Thi Hoa', 'hoa.le@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'user'),
(6, 'Tran', 'Van Nam', 'nam.tran@example.com', '0192023a7bbd73250516f069df18b500', 'admin'),
(7, 'Nguyễn', 'Trung', 'abcdVSSKNL@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(9, 'Trung', 'Trung', 'trung123pysl@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Hoàng Bảo Trung - Học viên tiêu biểu của F8 tỏa sáng với dự án \"AI Powered Learning\"', 'Trong thời đại công nghệ số 4.0, việc học không còn bó buộc trong những cuốn sách truyền thống. Giờ đây, trí tuệ nhân tạo (AI) đang...', '../assets/img/1.png', '2025-04-02 03:39:30', '2025-04-26 03:41:47'),
(2, 'Mình đã làm thế nào để hoàn thành một dự án website chỉ trong 15 ngày', 'Xin chào mọi người mình là Lý Cao Nguyên, mình đã làm một dự án website front-end với hơn 100 bài học và 200 bài viết.\r\n\r\nBài viết này...', '../assets/img/2.png', '2025-04-26 04:11:30', '2025-04-26 04:11:30'),
(3, 'Tôi đã viết Chrome extension đầu tiên của mình bằng Github Copilot như thế nào?', 'Câu chuyện của tôi là Tôi đang học tiếng Nhật trên một trang web là Dungmori.com, và tôi học từ mới trên trang web Quizlet. Và tôi...', '../assets/img/3.png', '2025-04-26 04:13:02', '2025-04-26 04:13:02'),
(4, 'Hướng dẫn chi tiết cách sử dụng Dev Mode trong khóa Pro', 'Chào bạn! Nếu bạn đã là học viên khóa Pro của F8, chắc hẳn bạn đã biết tới \"Dev Mode\" - giúp thực hành code song song khi xem...', '../assets/img/4.png', '2025-04-27 03:13:29', '2025-04-27 03:13:29'),
(5, 'Sự khác biệt giữa var, let và const trong JavaScript', 'Tôi muốn thảo luận chi tiết về các từ khóa var,...', '../assets/img/5.png', '2025-04-27 03:15:31', '2025-04-27 03:15:31'),
(6, 'Cách chỉnh theme Oh-my-posh cho Powershell', 'Hello ae mọi người nhé, mọi người (đặc biệt là lập trình viên Software) chắc hẳn đã nghe tới Powershell, nhưng bù lại cái màn hình...', '../assets/img/5.png', '2025-04-27 03:15:31', '2025-04-27 03:15:31'),
(7, '`Tất tần tật` về cải thiện Performance của 1 trang web🚀', 'Ở bài viết này, chúng ta cùng nhau tìm hiểu về các vấn đề liên quan đến Performance ở phía FE. Không dài dòng nữa,...', '../assets/img/9.png', '2025-04-28 09:29:48', '2025-04-28 09:30:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stored_courses`
--

CREATE TABLE `stored_courses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `registered_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_noidung`
--

CREATE TABLE `tbl_noidung` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` text NOT NULL,
  `price` varchar(30) NOT NULL,
  `img` varchar(30) NOT NULL,
  `videoID` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `exp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_noidung`
--

INSERT INTO `tbl_noidung` (`id`, `name`, `level`, `price`, `img`, `videoID`, `description`, `exp`) VALUES
(1, 'Kiến thức nhập môn IT ', 'Nhập môn ', 'Miễn phí', '../assets/img/1.png', 'M62l1xA5Eu8', 'Để có cái nhìn tổng quan về ngành IT - Lập trình web các bạn nên xem các videos tại khóa này trước nhé.', 'Các kiến thức cơ bản, nền móng của ngành IT\nCác mô hình, kiến trúc cơ bản khi triển khai ứng dụng\nCác khái niệm, thuật ngữ cốt lõi khi triển khai ứng dụng\nHiểu hơn về cách internet và máy vi tính hoạt động'),
(2, 'Lập trình C++ cơ bản, nâng cao', 'Cơ bản, nâng cao', 'Miễn phí', '../assets/img/2.png', '74B6PXO97Tw', 'Khóa học lập trình C++ từ cơ bản tới nâng cao dành cho người mới bắt đầu. Mục tiêu của khóa học này nhằm giúp các bạn nắm được các khái niệm căn cơ của lập trình, giúp các bạn có nền tảng vững chắc để chinh phục con đường trở thành một lập trình viên.', 'Hiểu rõ cấu trúc chương trình C++.\r\nBiết cách khai báo và sử dụng biến, kiểu dữ liệu, toán tử.\r\nLàm việc với các câu lệnh điều kiện và vòng lặp.\r\nNắm được quy trình từ việc phân tích bài toán đến viết mã hoàn chỉnh.\r\nHiểu và áp dụng các khái niệm: lớp (class), đối tượng (object), kế thừa, đa hình, đóng gói.\r\nBiết cách sử dụng con trỏ trong C++.\r\nQuản lý bộ nhớ động bằng new, delete.\r\nHiểu các vấn đề như rò rỉ bộ nhớ và cách phòng tránh.'),
(3, 'HTML CSS từ Zero đến Hero', 'Cơ bản, nâng cao\r\n', 'MIễn phí', '../assets/img/3.png', 'Z6uylatF5VY', 'Trong khóa này chúng ta sẽ cùng nhau xây dựng giao diện 2 trang web là The Band & Shopee.', 'Biết cách xây dựng giao diện web với HTML, CSS\r\nBiết cách phân tích giao diện website\r\nBiết cách đặt tên class CSS theo chuẩn BEM\r\nBiết cách làm giao diện web responsive\r\nLàm chủ Flexbox khi dựng bố cục website\r\nSở hữu 2 giao diện web khi học xong khóa học\r\nBiết cách tự tạo động lực cho bản thân\r\nBiết cách tự học những kiến thức mới\r\nHọc được cách làm UI chỉn chu, kỹ tính\r\nNhận chứng chỉ khóa học do F8 cấp'),
(4, 'Responsive Với Grid System', 'Nâng cao', '200.000', '../assets/img/4.png', 'uz5LIP85J5Y', 'Trong khóa này chúng ta sẽ học về cách xây dựng giao diện web responsive với Grid System, tương tự Bootstrap 5.', 'Biết cách xây dựng website Responsive\r\nHiểu được tư tưởng thiết kế với Grid system\r\nTự tay xây dựng được thư viện CSS Grid\r\nTự hiểu được Grid layout trong bootstrap'),
(5, 'Lập Trình JavaScript Cơ Bản', 'Cơ bản', 'Miễn phí', '../assets/img/5.png', '93OOY5_Bn9s', 'Học Javascript cơ bản phù hợp cho người chưa từng học lập trình. Với hơn 100 bài học và có bài tập thực hành sau mỗi bài học.', 'Hiểu chi tiết về các khái niệm cơ bản trong JS\r\nXây dựng được website đầu tiên kết hợp với JS\r\nTự tin khi phỏng vấn với kiến thức vững chắc\r\nCó nền tảng để học các thư viện và framework JS\r\nNắm chắc các tính năng trong phiên bản ES6\r\nThành thạo DOM APIs để tương tác với trang web\r\nGhi nhớ các khái niệm nhờ bài tập trắc nghiệm\r\nNâng cao tư duy với các bài kiểm tra với testcases\r\nCác bài thực hành như Tabs, Music Player\r\nNhận chứng chỉ khóa học do F8 cấp'),
(6, 'Lập Trình JavaScript Nâng Cao', 'Nâng cao', '500.000', '../assets/img/6.png', 'MGhw6XliFgo', 'Hiểu sâu hơn về cách Javascript hoạt động, tìm hiểu về IIFE, closure, reference types, this keyword, bind, call, apply, prototype, ...', 'Được học kiến thức miễn phí với nội dung chất lượng hơn mất phí\r\nCác kiến thức nâng cao của Javascript giúp code trở nên tối ưu hơn\r\nHiểu được cách tư duy nâng cao của các lập trình viên có kinh nghiệm\r\nHiểu được các khái niệm khó như từ khóa this, phương thức bind, call, apply & xử lý bất đồng bộ\r\nCó nền tảng Javascript vững chắc để làm việc với mọi thư viện, framework viết bởi Javascript\r\nNâng cao cơ hội thành công khi phỏng vấn xin việc nhờ kiến thức chuyên môn vững chắc'),
(7, 'Làm việc với Terminal & Ubuntu', 'Nâng cao', '500.000', '../assets/img/7.png', '8Cr0x5RtH5M', 'Sở hữu một Terminal hiện đại, mạnh mẽ trong tùy biến và học cách làm việc với Ubuntu là một bước quan trọng trên con đường trở thành một Web Developer.', 'Biết cách cài đặt và tùy biến Windows Terminal\r\nBiết sử dụng Windows Subsystem for Linux\r\nThành thạo sử dụng các lệnh Linux/Ubuntu\r\nBiết cài đặt Node và tạo dự án ReactJS/ExpressJS\r\nBiết cài đặt PHP 7.4 và MariaDB trên Ubuntu 20.04\r\nHiểu về Ubuntu và biết tự cài đặt các phần mềm khác'),
(8, 'Xây Dựng Website với ReactJS', 'Nâng cao', '500.000', '../assets/img/8.png', 'x0fSBAgBrOQ', 'Khóa học ReactJS từ cơ bản tới nâng cao, kết quả của khóa học này là bạn có thể làm hầu hết các dự án thường gặp với ReactJS. Cuối khóa học này bạn sẽ sở hữu một dự án giống Tiktok.com, bạn có thể tự tin đi xin việc khi nắm chắc các kiến thức được chia sẻ trong khóa học này.', 'Hiểu về khái niệm SPA/MPA\r\nHiểu về khái niệm hooks\r\nHiểu cách ReactJS hoạt động\r\nHiểu về function/class component\r\nBiết cách tối ưu hiệu năng ứng dụng\r\nThành thạo làm việc với RESTful API\r\nHiểu rõ ràng Redux workflow\r\nThành thạo sử dụng Redux vào dự án\r\nBiết sử dụng redux-thunk middleware\r\nXây dựng sản phẩm thực tế (clone Tiktok)\r\nTriển khai dự án React ra Internet\r\nĐủ hành trang tự tin apply đi xin việc\r\nBiết cách Deploy lên Github/Gitlab page\r\nNhận chứng chỉ khóa học do F8 cấp'),
(9, 'Node & ExpressJS', 'Nâng cao', '100', '../assets/img/9.png', 'jR-n-cQnpNI', 'Học Back-end với Node & ExpressJS framework, hiểu các khái niệm khi làm Back-end và xây dựng RESTful API cho trang web.', 'Nắm chắc lý thuyết chung trong việc xây dựng web\nBiết cách làm việc với Mongoose, MongoDB trong NodeJS\nXây dựng web với Express bằng kiến thức thực tế\nBiết cách xây dựng API theo chuẩn RESTful API\nNắm chắc lý thuyết về API và RESTful API\nĐược chia sẻ lại kinh nghiệm làm việc thực tế\nNắm chắc khái niệm về giao thức HTTP\nHiểu rõ tư tưởng và cách hoạt động của mô hình MVC\nHọc được cách tổ chức code trong thực tế\nBiết cách deploy (triển khai) website lên internet'),
(10, 'Ngôn ngữ Sass', 'Nâng cao ', '2.000.000', '../assets/img/10.png', '_kqN4hl9bGc', 'Sass (viết tắt của Syntactically Awesome Stylesheets) là một ngôn ngữ tiền xử lý CSS (CSS preprocessor), giúp việc viết CSS trở nên hiệu quả, dễ tổ chức và dễ bảo trì hơn', 'Viết CSS nhanh hơn và dễ bảo trì.\nTổ chức mã rõ ràng và chuyên nghiệp hơn.\nTái sử dụng mã hiệu quả.\nTăng hiệu suất phát triển giao diện.\nCải thiện tư duy thiết kế giao diện.\nLàm nền tảng học các công nghệ UI hiện đại.'),
(24, 'Lập trình Android nâng cao', 'Cơ bản', '2.000.000', '../assets/img/11.png', 'bvZ1_P9eCpw', 'hay', 'sấdasdasd');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `stored_courses`
--
ALTER TABLE `stored_courses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_noidung`
--
ALTER TABLE `tbl_noidung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `stored_courses`
--
ALTER TABLE `stored_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_noidung`
--
ALTER TABLE `tbl_noidung`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
