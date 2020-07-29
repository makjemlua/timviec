-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 25, 2020 lúc 11:09 AM
-- Phiên bản máy phục vụ: 10.1.35-MariaDB
-- Phiên bản PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `timviec`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_phone` int(11) DEFAULT NULL,
  `ad_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `ad_phone`, `ad_avatar`, `role`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn An', 'nguyenan.2502@gmail.com', '$2y$10$NYzKdwIa4LgioY/6GGvHAOxIVhPnmpMPhcdC9bdiL8yrevoF3UgFm', NULL, NULL, 2, 1, '2020-04-15 10:34:18', '2020-04-15 10:34:18'),
(2, 'Trần Dần', 'trandan@gmail.com', '$2y$10$FFftYA/X6IpauqKb.UsK2.vUSXxNH.WR3ZNPUcymLDX5LZUTcddJi', NULL, NULL, 1, 1, '2020-07-03 22:49:24', '2020-07-03 22:49:24'),
(3, 'Davik', 'nguyenan.250298@gmail.com', '$2y$10$ZqIwTR7Z.H32BTEAEuXgpu4EhQLijtfu4Y85CHkFas9XyzokR7SWq', NULL, NULL, 0, 0, '2020-04-15 10:33:58', '2020-04-15 10:33:58'),
(4, 'Saiiyan', 'an@gmail.com', '$2y$10$ZSJRWiCFQNN0CUiFvgEfzefROhDYlzIjatKeaJPDLW1XIig43WK9C', NULL, NULL, 0, 1, '2020-04-15 15:53:20', '2020-04-15 15:53:20'),
(5, 'Huyaaa', 'huy@gmail.com', '$2y$10$bQib3szUP7zhd8z4Uo7q/uIBh7ucAt3Zk3/NCdSUmLehrS0v5GpZ.', NULL, NULL, 0, 1, '2020-07-03 22:28:46', '2020-07-03 22:28:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_blogs`
--

CREATE TABLE `admin_blogs` (
  `id` int(11) NOT NULL,
  `bo_admin_id` int(11) NOT NULL,
  `bo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tiêu đề',
  `bo_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'seo link',
  `bo_description` text COLLATE utf8mb4_unicode_ci COMMENT 'Miêu tả',
  `bo_content` text COLLATE utf8mb4_unicode_ci COMMENT 'Nội dung',
  `bo_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bo_active` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tin tức';

--
-- Đang đổ dữ liệu cho bảng `admin_blogs`
--

INSERT INTO `admin_blogs` (`id`, `bo_admin_id`, `bo_title`, `bo_slug`, `bo_description`, `bo_content`, `bo_avatar`, `bo_active`, `created_at`, `updated_at`) VALUES
(1, 1, '5 sai lầm phổ biến trong khi đàm phán lương', '5-sai-lam-pho-bien-trong-khi-dam-phan-luong', 'Đàm phán lương được xem là một trong những phần quan trọng nhất trong buổi phỏng vấn. Tuy nhiên, có rất nhiều ứng viên đã đánh mất cơ hội việc làm cho mình chỉ vì phạm phải một số sai lầm khi thương lượng lương. Hãy cùng Tìm Việc Nhanh tìm hiểu xem đó là những sai lầm nào nhé.', '<h4 dir=\"ltr\"><strong>Chủ động đề cập đến vấn đề đ&agrave;m ph&aacute;n lương</strong></h4>\r\n\r\n<p dir=\"ltr\">Khi đang phỏng vấn cho một c&ocirc;ng việc mới, bạn nhắc đến vấn đề về lương trước khi nh&agrave; tuyển dụng đề cập đến được xem l&agrave; một sai lầm. Tốt nhất, vấn đề n&agrave;y h&atilde;y để đối phương chủ động đề cập.&nbsp;Một khi họ đ&atilde; quyết định với bạn v&agrave; đưa ra lời đề nghị, bạn sẽ ở vị thế thương lượng tốt hơn, &ocirc;ng Lynda Zugec, gi&aacute;m đốc điều h&agrave;nh của&nbsp;The Workforce&nbsp;Consulting cho biết.&nbsp;V&agrave;o cuối buổi phỏng vấn, c&aacute;c cuộc đ&agrave;m ph&aacute;n tiền lương sẽ diễn ra, v&igrave; vậy h&atilde;y thể hiện tốt nhất khả năng của bạn trong khoảng thời gian trước đ&oacute;.</p>\r\n\r\n<p><img alt=\"\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/4-sai-l%E1%BA%A7m-ph%E1%BB%95-bi%E1%BA%BFn-trong-khi-%C4%91%C3%A0m-ph%C3%A1n-l%C6%B0%C6%A1ng-h%C3%ACnh-%E1%BA%A3nh-1.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/4-sai-lầm-phổ-biến-trong-khi-đàm-phán-lương-hình-ảnh-1.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/4-sai-lầm-phổ-biến-trong-khi-đàm-phán-lương-hình-ảnh-1-300x175.jpg 300w\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>N&ecirc;n để nh&agrave; tuyển dụng chủ động đề cập đến lương</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>Đ&aacute;nh gi&aacute; thấp bản th&acirc;n</strong></h4>\r\n\r\n<p dir=\"ltr\">Peter &ndash; Chủ tịch&nbsp;Cố vấn tại nơi l&agrave;m việc th&iacute; điểm&nbsp;Peter Berner n&oacute;i rằng: &ldquo;Biết bạn c&oacute; gi&aacute; trị như thế n&agrave;o đối với một c&ocirc;ng ty l&agrave; điều rất cần thiết. Thế nhưng c&oacute; qu&aacute; nhiều người tự đ&aacute;nh gi&aacute; thấp bản th&acirc;n v&igrave; họ sợ rằng y&ecirc;u cầu hoặc kỳ vọng của họ sẽ cao hơn mức chi trả của c&ocirc;ng ty. V&agrave; điều n&agrave;y rất bất lợi với đề nghị thương lượng lương cũng như cơ hội thăng tiến nghề nghiệp của bạn.&rdquo; H&atilde;y nhớ rằng miễn l&agrave; bạn y&ecirc;u cầu một mức lương hợp l&yacute; dựa tr&ecirc;n khả năng bản th&acirc;n v&agrave; gi&aacute; trị của ng&agrave;nh tr&ecirc;n thị trường th&igrave;&nbsp;nh&agrave; tuyển dụng sẽ cung cấp cho bạn những g&igrave; c&oacute; thể để đi đến sự thống nhất chung.</p>\r\n\r\n<h4>&nbsp;<strong>Kh&ocirc;ng xem x&eacute;t những ph&uacute;c lợi kh&aacute;c</strong></h4>\r\n\r\n<p>Một trong những sai lầm lớn nhất của ứng vi&ecirc;n l&agrave; chỉ chăm chăm v&agrave;o mức lương m&igrave;nh được nhận. Thực tế l&agrave; b&ecirc;n cạnh tiền lương, c&ograve;n nhiều vấn đề nữa bạn cần quan t&acirc;m như ng&agrave;y nghỉ ph&eacute;p, tiền thưởng, ph&uacute;c lợi x&atilde; hội,&hellip; C&oacute; thể nh&agrave; tuyển dụng kh&ocirc;ng cung cấp được mức lương như bạn mong muốn nhưng họ c&oacute; thể đưa ra nhiều ph&uacute;c lợi kh&aacute;c, đảm bảo sự thoải m&aacute;i v&agrave; c&acirc;n bằng trong c&ocirc;ng việc v&agrave; đời sống c&aacute; nh&acirc;n của bạn. Đ&acirc;y cũng l&agrave; một gợi &yacute; rất đ&aacute;ng để bạn suy ngẫm thay v&igrave; chỉ cho rằng tiền lương l&agrave; yếu tố ti&ecirc;n quyết đến c&ocirc;ng việc của bạn.</p>\r\n\r\n<h4><strong>Chấp nhận&nbsp;lời đề nghị&nbsp;đầu ti&ecirc;n từ nh&agrave; tuyển dụng</strong></h4>\r\n\r\n<p>Nhiều người, đặc biệt l&agrave; sinh vi&ecirc;n mới ra trường rất dễ chấp nhận mức lương đề xuất đầu ti&ecirc;n từ nh&agrave; tuyển dụng. Bạn n&ecirc;n biết rằng nh&agrave; tuyển dụng sẽ đưa ra lời đề nghị thấp hơn mức lương dự t&iacute;nh để d&ograve; x&eacute;t th&aacute;i độ của bạn. Do đ&oacute;, bạn n&ecirc;n suy nghĩ thận trọng để đưa ra quyết định của m&igrave;nh. Nhận được một mức lương ph&ugrave; hợp, c&oacute; lợi cho cả hai b&ecirc;n sẽ l&agrave; điều kiện thuận lợi c&oacute; được c&ocirc;ng việc mơ ước.</p>\r\n\r\n<p><img alt=\"\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/5-sai-l%E1%BA%A7m-ph%E1%BB%95-bi%E1%BA%BFn-trong-khi-%C4%91%C3%A0m-ph%C3%A1n-l%C6%B0%C6%A1ng-h%C3%ACnh-%E1%BA%A3nh-2.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/5-sai-lầm-phổ-biến-trong-khi-đàm-phán-lương-hình-ảnh-2.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/5-sai-lầm-phổ-biến-trong-khi-đàm-phán-lương-hình-ảnh-2-300x175.jpg 300w\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Sinh vi&ecirc;n mới ra trường rất dễ chấp nhận lời đề nghị đầu ti&ecirc;n từ nh&agrave; tuyển dụng</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>Tin v&agrave;o lời hứa của nh&agrave; tuyển dụng</strong></h4>\r\n\r\n<p>Cuối c&ugrave;ng, đừng tin v&agrave;o lời hứa sẽ tăng lương trong tương lai trừ khi điều n&agrave;y được x&aacute;c định bằng văn bản. Bạn chỉ n&ecirc;n chấp nhận điều n&agrave;y khi:</p>\r\n\r\n<p>+ Mức lương ban đầu tối thiểu đ&aacute;p ứng chi ph&iacute; sinh hoạt của bạn.<br />\r\n+ Nh&agrave; tuyển dụng cung cấp mốc thời gian cụ thể khi n&agrave;o họ sẽ xem x&eacute;t mức lương của bạn bằng văn bản (sau 1 qu&yacute;, sau 6 th&aacute;ng, sau 1 năm)<br />\r\n+ Bạn c&oacute; c&aacute;c y&ecirc;u cầu cụ thể được n&ecirc;u ra để được tăng lương bằng văn bản (cung cấp một dự &aacute;n nhất định, đ&aacute;p ứng c&aacute;c số liệu hiệu suất nhất định,&hellip;)<br />\r\n+ Bạn được cung cấp một ngưỡng tăng cụ thể bằng văn bản (1%, 5%, 10%,&hellip;)</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; những sai lầm phổ biến nhất m&agrave; ứng vi&ecirc;n thường mắc phải trong qu&aacute; tr&igrave;nh đ&agrave;m ph&aacute;n lương. Nắm r&otilde; những sai lầm tr&ecirc;n bạn sẽ tự tin v&agrave; dễ d&agrave;ng đạt được mức lương m&agrave; m&igrave;nh mong muốn. Ch&uacute;c bạn may mắn.</p>\r\n\r\n<div id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '2020-03-19__4-sai-lam-pho-bien-trong-khi-dam-phan-luong-hinh-anh-1.jpg', 1, '2020-06-27 21:26:36', '2020-07-01 21:48:45'),
(2, 1, 'Làm thế nào để làm việc hiệu quả với sếp nhỏ tuổi hơn?', 'lam-the-nao-de-lam-viec-hieu-qua-voi-sep-nho-tuoi-hon', 'Những khác biệt trong cách làm việc giữa hai thế hệ sẽ dẫn đến nhiều vấn đề phát sinh. Vậy làm thế nào để bạn có thể dung hòa với sếp của mình, đặc biệt khi họ có tuổi đời nhỏ hơn bạn rất nhiều?', '<h4><strong>Người T&igrave;m Việc hỏi:</strong></h4>\r\n\r\n<p>Xin ch&agrave;o, T&igrave;m Việc Nhanh. M&igrave;nh t&ecirc;n l&agrave; Thanh Minh, năm nay 35 tuổi v&agrave; đang l&agrave;m việc trong một c&ocirc;ng ty về sản phẩm hữu cơ tại H&agrave; Nội. Tuần trước, bộ phận m&igrave;nh ch&agrave;o đ&oacute;n vị sếp mới, m&igrave;nh kh&aacute; bất ngờ v&igrave; c&ocirc; ấy chỉ mới 25 tuổi. Ch&iacute;nh v&igrave; khoảng c&aacute;ch tuổi t&aacute;c n&agrave;y m&agrave; trong qu&aacute; tr&igrave;nh l&agrave;m việc giữa m&igrave;nh v&agrave; vị sếp trẻ n&agrave;y xảy ra nhiều bất đồng. Hy vọng T&igrave;m Việc Nhanh cho m&igrave;nh lời khuy&ecirc;n để c&oacute; thể l&agrave;m việc tốt hơn với sếp mới của m&igrave;nh. M&igrave;nh cảm ơn.</p>\r\n\r\n<p><em><strong>Thanh Minh, H&agrave; Nội</strong></em></p>\r\n\r\n<h4><strong>T&igrave;m Việc Nhanh trả lời:</strong></h4>\r\n\r\n<p>Ch&agrave;o bạn Thanh Minh, T&igrave;m Việc Nhanh cảm ơn bạn đ&atilde; gửi y&ecirc;u cầu về cho chuy&ecirc;n mục. Vấn đề của bạn cũng l&agrave; trường hợp kh&aacute; phổ biến nơi m&ocirc;i trường c&ocirc;ng sở. L&agrave;m việc với sếp nhỏ tuổi hơn chưa bao giờ l&agrave; dễ d&agrave;ng. Thế nhưng bạn h&atilde;y l&agrave;m theo c&aacute;c lời khuy&ecirc;n sau đ&acirc;y, vấn đề sẽ được cải thiện đi rất nhiều đấy.</p>\r\n\r\n<h4><strong>1. Giải quyết khoảng c&aacute;ch tuổi&nbsp;</strong></h4>\r\n\r\n<p>B&agrave; Nancy Noto, SHRM-SCP, một nh&agrave; tư vấn nh&acirc;n sự tại th&agrave;nh phố New York cho c&aacute;c c&ocirc;ng ty khởi nghiệp v&agrave; giai đoạn tăng trưởng chia sẻ rằng: &ldquo;Khi bạn đang l&agrave;m việc cho một &ocirc;ng chủ trẻ hơn th&igrave; kh&ocirc;ng thể bỏ qua sự kh&aacute;c biệt về tuổi t&aacute;c&rdquo;.</p>\r\n\r\n<p>Nhiều người sếp trẻ tuổi sẽ c&oacute; t&acirc;m l&yacute; rằng những thế hệ lớn hơn sẽ cứng nhắc v&agrave; thường kh&oacute; tiếp thu những kiến thức mới. Nếu bạn kh&eacute;o l&eacute;o đề cập vấn đề n&agrave;y với cấp tr&ecirc;n, c&oacute; thể mối quan hệ giữa bạn v&agrave; sếp sẽ được cải thiện tốt hơn. V&iacute; dụ, bạn c&oacute; thể n&oacute;i với sếp của m&igrave;nh rằng: &ldquo;T&ocirc;i biết c&oacute; một định kiến ​​rằng những người lao động lớn tuổi như t&ocirc;i kh&ocirc;ng muốn học c&ocirc;ng nghệ mới, nhưng t&ocirc;i th&igrave; ngược lại.&nbsp;T&ocirc;i lu&ocirc;n mong muốn học hỏi những kỹ năng mới&rdquo;.</p>\r\n\r\n<p>Điều quan trọng nữa l&agrave; cho sếp của bạn thấy rằng bạn thấy m&igrave;nh l&agrave; một th&agrave;nh vi&ecirc;n trong nh&oacute;m v&agrave; lu&ocirc;n muốn cống hiến v&igrave; sự ph&aacute;t triển chung của c&ocirc;ng ty. Bạn hiểu rằng c&oacute; một sự kh&aacute;c biệt về tuổi t&aacute;c v&agrave; bạn ở đ&acirc;y để hỗ trợ sếp theo đ&uacute;ng chuy&ecirc;n m&ocirc;n của m&igrave;nh. Bạn h&atilde;y truyền đạt điều đ&oacute; với sếp&nbsp; thật r&otilde; r&agrave;ng, như thế khoảng c&aacute;ch về tuổi t&aacute;c giữa bạn v&agrave; sếp sẽ được giải quyết.</p>\r\n\r\n<p><img alt=\"\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/L%C3%A0m-th%E1%BA%BF-n%C3%A0o-%C4%91%E1%BB%83-l%C3%A0m-vi%E1%BB%87c-hi%E1%BB%87u-qu%E1%BA%A3-v%E1%BB%9Bi-s%E1%BA%BFp-nh%E1%BB%8F-tu%E1%BB%95i-h%C6%A1n-h%C3%ACnh-%E1%BA%A3nh-1.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Làm-thế-nào-để-làm-việc-hiệu-quả-với-sếp-nhỏ-tuổi-hơn-hình-ảnh-1.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Làm-thế-nào-để-làm-việc-hiệu-quả-với-sếp-nhỏ-tuổi-hơn-hình-ảnh-1-300x175.jpg 300w\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Giải quyết khoảng c&aacute;ch về tuổi t&aacute;c với sếp</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2. &Aacute;p dụng kinh nghiệm của m&igrave;nh để l&agrave;m việc</strong></h4>\r\n\r\n<p>Nhiều người e ngại khi phải l&agrave;m việc chung với những người kh&aacute;c thế hệ v&igrave; sợ bất đồng nhiều vấn đề. Thế nhưng nếu biết c&aacute;ch hỗ trợ lẫn nhau, ch&uacute;ng ta vẫn c&oacute; thể l&agrave;m việc chung cực kỳ hiệu quả. L&agrave; một người c&oacute; tuổi đời v&agrave; thời gian gắn b&oacute; với c&ocirc;ng việc l&acirc;u hơn, bạn sẽ t&iacute;ch lũy được những kinh nghiệm ri&ecirc;ng cho m&igrave;nh. Bạn c&oacute; thể kh&ocirc;ng c&oacute; nhiều kiến ​​thức chuy&ecirc;n ng&agrave;nh, nhưng chắc chắn bạn sẽ biết c&aacute;ch xử l&yacute; c&aacute;c t&igrave;nh huống xảy ra bất ngờ cũng như văn h&oacute;a l&agrave;m việc tại c&ocirc;ng ty.&nbsp;Bạn h&atilde;y tận dụng điều n&agrave;y để hỗ trợ cho vị sếp trẻ tuổi hơn của m&igrave;nh thay v&igrave; chống đối họ.</p>\r\n\r\n<h4>&nbsp;<strong>3. Lu&ocirc;n n&acirc;ng cao kỹ năng v&agrave; tr&igrave;nh độ của bản th&acirc;n</strong></h4>\r\n\r\n<p>Cho d&ugrave; bạn đ&atilde; l&agrave;m việc v&agrave; gắn b&oacute; với c&ocirc;ng ty l&acirc;u hơn th&igrave; sếp của bạn vẫn c&oacute; kh&iacute;a cạnh n&agrave;o đ&oacute; l&agrave;m tốt hơn bạn. Do đ&oacute;,&nbsp; n&acirc;ng cao tr&igrave;nh độ v&agrave; kỹ năng của bản th&acirc;n l&agrave; điều cần thiết. Lu&ocirc;n cập nhật v&agrave; đ&aacute;nh gi&aacute; xu hướng ph&aacute;t triển trong ng&agrave;nh v&agrave; cải thiện những vấn đề m&agrave; bạn c&ograve;n thiếu. Cho d&ugrave; điều đ&oacute; c&oacute; nghĩa l&agrave; cải thiện&nbsp;Excel&nbsp;, sử dụng th&agrave;nh thạo phương tiện truyền th&ocirc;ng x&atilde; hội&nbsp;hoặc&nbsp;kỹ năng thuyết tr&igrave;nh&nbsp;, h&atilde;y ch&uacute; &yacute; theo kịp c&aacute;c xu hướng v&agrave; đừng ngại đặt c&acirc;u hỏi nếu bạn kh&ocirc;ng biết c&aacute;ch l&agrave;m điều g&igrave; đ&oacute; m&agrave; người quản l&yacute;&nbsp;c&oacute; thể gi&uacute;p đỡ bạn.</p>\r\n\r\n<p><img alt=\"\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/L%C3%A0m-th%E1%BA%BF-n%C3%A0o-%C4%91%E1%BB%83-l%C3%A0m-vi%E1%BB%87c-hi%E1%BB%87u-qu%E1%BA%A3-v%E1%BB%9Bi-s%E1%BA%BFp-nh%E1%BB%8F-tu%E1%BB%95i-h%C6%A1n-h%C3%ACnh-%E1%BA%A3nh-2.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Làm-thế-nào-để-làm-việc-hiệu-quả-với-sếp-nhỏ-tuổi-hơn-hình-ảnh-2.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Làm-thế-nào-để-làm-việc-hiệu-quả-với-sếp-nhỏ-tuổi-hơn-hình-ảnh-2-300x175.jpg 300w\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Lu&ocirc;n n&acirc;ng cao tr&igrave;nh độ v&agrave; kỹ năng của bản th&acirc;n</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>4. Trở th&agrave;nh một người cố vấn</strong></h4>\r\n\r\n<p>Xu hướng muốn hướng dẫn v&agrave; dạy dỗ những người trẻ hơn bạn kh&ocirc;ng chỉ l&agrave; một phản ứng tự nhi&ecirc;n, m&agrave; c&ograve;n l&agrave; một điều hữu &iacute;ch ngay cả khi đ&oacute; l&agrave; sếp của bạn.&nbsp;Tất cả nh&acirc;n vi&ecirc;n (bao gồm cả người quản l&yacute;) l&agrave;m việc tốt hơn trong m&ocirc;i trường mở, nơi sự hợp t&aacute;c được ch&agrave;o đ&oacute;n.</p>\r\n\r\n<p>Cuối c&ugrave;ng, bạn phải ngăn chặn những cảm gi&aacute;c v&agrave; lo lắng n&agrave;y từ lễ hội.&nbsp;Thay v&igrave; kh&oacute; chịu về việc c&oacute; một người gi&aacute;m s&aacute;t trẻ hơn, h&atilde;y tập trung l&agrave;m việc c&ugrave;ng nhau để ho&agrave;n th&agrave;nh c&aacute;c mục ti&ecirc;u của nh&oacute;m.&nbsp;Đ&acirc;y sẽ l&agrave; ch&igrave;a kh&oacute;a để bạn ph&aacute;t triển mạnh ở vị tr&iacute; của m&igrave;nh v&agrave; thăng tiến trong sự nghiệp</p>\r\n\r\n<div id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '2020-03-19__lam-the-nao-de-lam-viec-hieu-qua-voi-sep-nho-tuoi-hon-hinh-anh-1-430x350.jpg', 1, '2020-06-27 21:13:06', '2020-06-27 22:53:39'),
(3, 1, '6 tật xấu tại nơi làm việc bạn cần từ bỏ ngay', '6-tat-xau-tai-noi-lam-viec-ban-can-tu-bo-ngay', 'Rick Myers, người sáng lập và là CEO của Talent Zoo, một trang chuyên về tiếp thị, quảng cáo và chuyên gia kỹ thuật số cho rằng những thói quen xấu có thể phá hủy sự nghiệp của một người, nhưng đáng tiếc là chúng ta hiếm khi nhận ra mình có những thói quen này. Vậy đâu là những thói quen xấu nơi công sở bạn cần tránh? Tham khảo bài viết sau đây nhé.', '<h4><strong>1. Kh&ocirc;ng trung thực</strong></h4>\r\n\r\n<p>Một trong những tật xấu l&agrave;m ảnh hưởng đến sự nghiệp của bạn l&agrave; t&iacute;nh kh&ocirc;ng trung thực. Đ&acirc;y cũng ch&iacute;nh l&agrave; &yacute; kiến của&nbsp;Ann Kaiser Stearns, tiến sĩ t&acirc;m l&yacute; học v&agrave; t&aacute;c giả của &ldquo;Vượt<em>&nbsp;qua khủng hoảng c&aacute; nh&acirc;n&rdquo;</em>&nbsp;. Cho d&ugrave; ch&uacute;ng ta l&agrave;m việc trong lĩnh vực kinh doanh, ng&acirc;n h&agrave;ng, m&ocirc;i trường hay bất cứ ng&agrave;nh nghề n&agrave;o, nếu thiếu sự li&ecirc;m ch&iacute;nh cũng như đức t&iacute;nh trung thực, sớm muộn g&igrave; bạn cũng đ&aacute;nh mất đi sự t&iacute;n nhiệm của sếp v&agrave; đồng nghiệp. V&agrave; hiển nhi&ecirc;n sẽ kh&ocirc;ng c&oacute; cơ hội thăng tiến n&agrave;o d&agrave;nh cho người kh&ocirc;ng trung thực cả.</p>\r\n\r\n<h4><strong>2. Hay than v&atilde;n</strong></h4>\r\n\r\n<p>Một đặc điểm của đại bộ phận d&acirc;n c&ocirc;ng sở l&agrave; họ thường xuy&ecirc;n bu&ocirc;n chuyện, than v&atilde;n v&agrave; ph&agrave;n n&agrave;n với nhau.&nbsp;Theo&nbsp;&ocirc;ng Amy Hoover, chủ tịch của Talent Zoo n&oacute;i rằng: &ldquo;Bất cứ người sếp n&agrave;o cũng mong muốn nh&acirc;n vi&ecirc;n của m&igrave;nh l&agrave; những con người t&iacute;ch cực v&agrave; truyền cảm hứng l&agrave;m việc cho mọi người. Ngược lại nh&acirc;n vi&ecirc;n ti&ecirc;u cực sẽ g&acirc;y ảnh hưởng đến c&ocirc;ng việc v&agrave; tinh thần của những người l&agrave;m việc c&ugrave;ng&rdquo;. Nếu c&oacute; vấn đề khiến bạn kh&oacute; chịu, h&atilde;y tr&igrave;nh b&agrave;y trực tiếp với cấp tr&ecirc;n hoặc những người c&oacute; li&ecirc;n quan để giải quyết thay v&igrave; than v&atilde;n với đồng nghiệp.</p>\r\n\r\n<p><img alt=\"\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/5-t%E1%BA%ADt-x%E1%BA%A5u-t%E1%BA%A1i-n%C6%A1i-l%C3%A0m-vi%E1%BB%87c-b%E1%BA%A1n-c%E1%BA%A7n-t%E1%BB%AB-b%E1%BB%8F-ngay-h%C3%ACnh-%E1%BA%A3nh-1.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/5-tật-xấu-tại-nơi-làm-việc-bạn-cần-từ-bỏ-ngay-hình-ảnh-1.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/5-tật-xấu-tại-nơi-làm-việc-bạn-cần-từ-bỏ-ngay-hình-ảnh-1-300x175.jpg 300w\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Thay v&igrave; than v&atilde;n với đồng nghiệp, h&atilde;y tr&igrave;nh b&agrave;y vấn đề với cấp tr&ecirc;n</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>3. Chần chừ</strong></h4>\r\n\r\n<p>Th&oacute;i quen n&agrave;y c&oacute; khả năng l&agrave;m ảnh hưởng nghi&ecirc;m trọng đến c&ocirc;ng việc của bạn một c&aacute;ch trực tiếp v&agrave; dễ thấy nhất. Nhiều người c&oacute; th&oacute;i quen &ldquo;nước đến ch&acirc;n mới nhảy&rdquo;, chỉ tiến h&agrave;nh bắt tay v&agrave;o l&agrave;m việc khi sắp đến hạn &ldquo;deadline&rdquo;. Vội v&agrave;ng l&agrave;m việc v&agrave;o ph&uacute;t ch&oacute;t sẽ khiến bạn mất tập trung v&agrave; g&acirc;y n&ecirc;n nhiều sai s&oacute;t. Kh&ocirc;ng những thế, những đồng nghiệp khi bị bạn hối th&uacute;c cũng trở n&ecirc;n kh&oacute; chịu v&agrave; rất c&oacute; thể họ sẽ đổ lỗi cho bạn nếu c&ocirc;ng việc chung xảy ra bất cứ sự cố n&agrave;o.</p>\r\n\r\n<h4><strong>4. Kh&ocirc;ng đ&uacute;ng giờ</strong></h4>\r\n\r\n<p>Roxanne Peplow, giảng vi&ecirc;n chương tr&igrave;nh nghề nghiệp kinh doanh v&agrave; cố vấn dịch vụ sinh vi&ecirc;n tại Viện Hệ thống M&aacute;y t&iacute;nh cho biết: &ldquo;Nếu bạn li&ecirc;n tục đi l&agrave;m muộn hoặc chậm trễ trong c&aacute;c cuộc họp, điều đ&oacute; thể hiện th&aacute;i độ tự m&atilde;n v&agrave; bất cẩn của bản th&acirc;n bạn&rdquo;. Lỗi kh&ocirc;ng đ&uacute;ng giờ nghe c&oacute; vẻ nhỏ nhặt nhưng th&oacute;i quen xấu n&agrave;y sẽ khiến cấp tr&ecirc;n, đồng nghiệp hoặc kh&aacute;ch h&agrave;ng cho rằng bạn kh&ocirc;ng t&ocirc;n trọng họ. V&agrave; dĩ nhi&ecirc;n chẳng ai muốn l&agrave;m việc c&ugrave;ng một người suốt ng&agrave;y chậm trễ cả, đ&uacute;ng kh&ocirc;ng n&agrave;o?</p>\r\n\r\n<h4><strong>5. Nghiện truyền th&ocirc;ng x&atilde; hội</strong></h4>\r\n\r\n<p>C&ocirc;ng nghệ ng&agrave;y c&agrave;ng ph&aacute;t triển, con người c&agrave;ng c&oacute; nhiều th&uacute; vui để giải tr&iacute;, trong đ&oacute; phải kể đến c&aacute;c trang mạng truyền th&ocirc;ng x&atilde; hội. Thậm ch&iacute; c&oacute; nhiều người mắc phải hội chứng nghiện mạng x&atilde; hội nặng, c&oacute; thể lướt internet trong một khoảng thời gian d&agrave;i. Tật xấu n&agrave;y kh&ocirc;ng chỉ xuất hiện ở d&acirc;n c&ocirc;ng sở m&agrave; hầu hết ở giới trẻ.&nbsp;Một số c&ocirc;ng ty đ&atilde; thực hiện c&aacute;c biện ph&aacute;p gi&aacute;m s&aacute;t hoặc hạn chế sử dụng phương tiện truyền th&ocirc;ng x&atilde; hội của nh&acirc;n vi&ecirc;n. Trong khi những c&ocirc;ng ty kh&aacute;c đ&atilde; chặn ho&agrave;n to&agrave;n c&aacute;c trang web n&agrave;y. Bạn h&atilde;y nhớ rằng d&agrave;nh qu&aacute; nhiều thời gian cho phương tiện truyền th&ocirc;ng x&atilde; hội hoặc c&aacute;c trang web kh&aacute;c kh&ocirc;ng li&ecirc;n quan đến c&ocirc;ng việc đang l&agrave;m sẽ kh&ocirc;ng gi&uacute;p &iacute;ch g&igrave; cho sự nghiệp của bạn. Đ&ocirc;i khi việc n&agrave;y c&ograve;n g&acirc;y t&aacute;c dụng ngược nữa đấy.</p>\r\n\r\n<p><img alt=\"\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/5-t%E1%BA%ADt-x%E1%BA%A5u-t%E1%BA%A1i-n%C6%A1i-l%C3%A0m-vi%E1%BB%87c-b%E1%BA%A1n-c%E1%BA%A7n-t%E1%BB%AB-b%E1%BB%8F-ngay-h%C3%ACnh-%E1%BA%A3nh-2.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/5-tật-xấu-tại-nơi-làm-việc-bạn-cần-từ-bỏ-ngay-hình-ảnh-2.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/5-tật-xấu-tại-nơi-làm-việc-bạn-cần-từ-bỏ-ngay-hình-ảnh-2-300x175.jpg 300w\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Kh&ocirc;ng chỉ d&acirc;n văn ph&ograve;ng, hầu hết mọi người đều d&agrave;nh nhiều thời gian cho mạng x&atilde; hội</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>6. Ng&ocirc;n ngữ cơ thể xấu</strong></h4>\r\n\r\n<p>&Iacute;t ai nghĩ rằng ng&ocirc;n ngữ cơ thể cũng c&oacute; t&aacute;c động đến sự nghiệp của m&igrave;nh. Nếu bạn đang c&oacute; những th&oacute;i quen như đảo mắt li&ecirc;n tục, tay ch&acirc;n luống cuống,&hellip; khi đối diện với người kh&aacute;c th&igrave; n&ecirc;n từ bỏ ngay lập tức.&nbsp;Phần lớn giao tiếp của ch&uacute;ng ta được thực hiện th&ocirc;ng qua c&aacute;c t&iacute;n hiệu phi ng&ocirc;n ngữ.&nbsp;Đồng nghiệp, người quản l&yacute; hoặc kh&aacute;ch h&agrave;ng của bạn c&oacute; thể nhận thấy một số th&oacute;i quen ng&ocirc;n ngữ cơ thể của bạn l&agrave; th&ocirc; lỗ hoặc kh&ocirc;ng chuy&ecirc;n nghiệp. Tất cả những điều n&agrave;y cuối c&ugrave;ng lại l&agrave; nguy&ecirc;n nh&acirc;n l&agrave;m cho con đường thăng tiến của bạn gặp nhiều kh&oacute; khăn.</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y chỉ l&agrave; một v&agrave;i th&oacute;i quen xấu c&oacute; thể khiến sự nghiệp của bạn bị ảnh hưởng. C&aacute;ch tốt nhất l&agrave; bạn h&atilde;y nh&igrave;n nhận th&oacute;i quen của m&igrave;nh v&agrave; hỏi &yacute; kiến đ&aacute;nh gi&aacute; từ những người xung quanh. V&agrave; nếu bạn nhận được bất kỳ phản hồi n&agrave;o, thay v&igrave; phủ nhận h&atilde;y nghi&ecirc;m t&uacute;c thay đổi ch&uacute;ng.</p>\r\n\r\n<div id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '2020-03-19__5-tat-xau-tai-noi-lam-viec-ban-can-tu-bo-ngay-hinh-anh-1-340x204.jpg', 1, '2020-03-20 15:58:22', '2020-06-27 22:47:34'),
(4, 1, 'Phải làm gì khi công việc thực tế không giống như bảng mô tả công việc?', 'phai-lam-gi-khi-cong-viec-thuc-te-khong-giong-nhu-bang-mo-ta-cong-viec', 'Ứng tuyển thành công vào vị trí có bảng mô tả công việc như mình mong muốn có lẽ là hạnh phúc của rất nhiều ứng viên. Hẳn là bạn sẽ rất háo hức và chuẩn bị thật chu đáo cho hành trình mới của mình. Thế nhưng ngay trong ngày đầu tiên, bạn dường như cảm nhận được công việc mình đang phụ trách lại không hề giống bảng mô tả công việc mà bạn đã nhìn thấy khi ứng tuyển. Vậy phải làm gì trong tình huống này?', '<h4><strong>1. Giữ b&igrave;nh tĩnh</strong></h4>\r\n\r\n<p>Một điều chắc chắn l&uacute;c n&agrave;y l&agrave; bạn cảm thấy kh&oacute; chịu, thất vọng v&agrave; c&oacute; cảm gi&aacute;c như m&igrave;nh đ&atilde; bị lừa. Thế nhưng thay v&igrave; n&oacute;ng nảy l&agrave;m mọi chuyện rối tung l&ecirc;n, bạn h&atilde;y cố gắng giữ b&igrave;nh tĩnh để xem x&eacute;t lại c&ocirc;ng việc của m&igrave;nh. Nếu v&agrave;i ng&agrave;y đầu ti&ecirc;n, bạn chỉ l&agrave;m những nhiệm vụ lặt vặt th&igrave; điều đ&oacute; cũng dễ hiểu. C&oacute; thể l&agrave; do sếp mới của bạn đang bận c&ocirc;ng việc kh&aacute;c, hoặc c&ocirc;ng ty cho bạn v&agrave;i ng&agrave;y để th&iacute;ch nghi với văn h&oacute;a c&ocirc;ng ty trước khi t&igrave;m hiểu s&acirc;u hơn v&agrave;o vai tr&ograve; của m&igrave;nh. Cho d&ugrave; bạn biết sự thật rằng bộ phận tuyển dụng đ&atilde; cố tạo ra một bảng m&ocirc; tả c&ocirc;ng việc &ldquo;b&oacute;ng bẩy&rdquo; để thu h&uacute;t ứng vi&ecirc;n th&igrave; vẫn kh&ocirc;ng n&ecirc;n bộc ph&aacute;t những cảm x&uacute;c ti&ecirc;u cực của m&igrave;nh. Bởi v&igrave; điều n&agrave;y chẳng gi&uacute;p &iacute;ch được g&igrave; m&agrave; chỉ khiến bạn cảm thấy ức chế hơn m&agrave; th&ocirc;i.</p>\r\n\r\n<p><a href=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Ph%E1%BA%A3i-l%C3%A0m-g%C3%AC-khi-c%C3%B4ng-vi%E1%BB%87c-th%E1%BB%B1c-t%E1%BA%BF-kh%C3%B4ng-gi%E1%BB%91ng-nh%C6%B0-b%E1%BA%A3ng-m%C3%B4-t%E1%BA%A3-c%C3%B4ng-vi%E1%BB%87c-h%C3%ACnh-%E1%BA%A3nh-1.jpg\"><img alt=\"Phải-làm-gì-khi-công-việc-thực-tế-không-giống-như-bảng-mô-tả-công-việc-hình-ảnh-1.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Ph%E1%BA%A3i-l%C3%A0m-g%C3%AC-khi-c%C3%B4ng-vi%E1%BB%87c-th%E1%BB%B1c-t%E1%BA%BF-kh%C3%B4ng-gi%E1%BB%91ng-nh%C6%B0-b%E1%BA%A3ng-m%C3%B4-t%E1%BA%A3-c%C3%B4ng-vi%E1%BB%87c-h%C3%ACnh-%E1%BA%A3nh-1.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Phải-làm-gì-khi-công-việc-thực-tế-không-giống-như-bảng-mô-tả-công-việc-hình-ảnh-1.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Phải-làm-gì-khi-công-việc-thực-tế-không-giống-như-bảng-mô-tả-công-việc-hình-ảnh-1-300x175.jpg 300w\" title=\"Phải làm gì khi công việc thực tế không giống như bảng mô tả công việc? hình ảnh 1\" width=\"600\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>H&atilde;y cố gắng giữ b&igrave;nh tĩnh để xem x&eacute;t lại c&ocirc;ng việc của m&igrave;nh</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2. Tạo cơ hội cho bản th&acirc;n</strong></h4>\r\n\r\n<p>Sau khi b&igrave;nh ổn lại cảm x&uacute;c của bản th&acirc;n, bạn sẽ cần&nbsp;một ch&uacute;t thời gian để l&agrave;m quen với một m&ocirc;i trường xa lạ, l&agrave;m việc với những người bạn kh&ocirc;ng biết v&agrave; chiến đấu với những tr&aacute;ch nhiệm mới. H&atilde;y xem x&eacute;t liệu những nhiệm vụ mới n&agrave;y ch&ecirc;nh lệch với những g&igrave; được liệt k&ecirc; trong bảng m&ocirc; tả c&ocirc;ng việc c&oacute; qu&aacute; lớn hay kh&ocirc;ng, v&agrave; bản th&acirc;n bạn c&oacute; đ&aacute;p ứng được những nhiệm vụ mới n&agrave;y kh&ocirc;ng. B&ecirc;n cạnh đ&oacute;, h&atilde;y thử l&agrave;m quen với đồng nghiệp mới, g&acirc;y ấn tượng với sếp bằng c&aacute;ch t&igrave;nh nguyện tham gia cho một dự &aacute;n sắp tới chẳng hạn. Bạn phải mất một khoảng thời gian kh&aacute; d&agrave;i để ổn định tại nơi l&agrave;m việc mới, bởi v&igrave; rất kh&oacute; để biết được đ&acirc;y c&oacute; phải l&agrave; vị tr&iacute; ph&ugrave; hợp với bạn hay kh&ocirc;ng chỉ sau một v&agrave;i ng&agrave;y l&agrave;m việc đầu ti&ecirc;n. Nếu mỗi ng&agrave;y bạn cảm thấy hứng th&uacute; hơn với việc đi l&agrave;m th&igrave; đ&acirc;y l&agrave; một dấu hiệu tốt, nhưng nếu ngược lại, c&oacute; lẽ vị tr&iacute; n&agrave;y kh&ocirc;ng ph&ugrave; hợp với bạn.</p>\r\n\r\n<h4><strong>3. N&oacute;i chuyện với cấp tr&ecirc;n</strong></h4>\r\n\r\n<p>Nếu bạn đ&atilde; d&agrave;nh cho m&igrave;nh đủ thời gian để đ&aacute;nh gi&aacute; về c&ocirc;ng việc mới n&agrave;y v&agrave; cảm thấy n&oacute; kh&aacute;c rất nhiều so với vai tr&ograve; m&agrave; bạn mong muốn, h&atilde;y n&oacute;i chuyện với người quản l&yacute; của bạn. Đầu ti&ecirc;n, thiết lập một cuộc họp với họ v&agrave; tr&igrave;nh b&agrave;y cho họ biết vấn đề hiện tại của bạn. H&atilde;y nhớ rằng mục đ&iacute;ch của cuộc họp n&agrave;y l&agrave; để thống nhất vai tr&ograve; cụ thể của bạn trong c&ocirc;ng ty chứ kh&ocirc;ng phải bạn đang buộc tội ph&iacute;a c&ocirc;ng ty đ&atilde; c&oacute; sự dối tr&aacute; với bạn.</p>\r\n\r\n<p>Nếu người quản l&yacute; tiếp nhận những g&igrave; bạn n&oacute;i v&agrave; t&igrave;m c&aacute;ch sắp xếp vị tr&iacute; thực tế của bạn đ&uacute;ng với vai tr&ograve; đ&atilde; ứng tuyển th&igrave; bạn vẫn c&oacute; cơ hội để cứu v&atilde;n c&ocirc;ng việc n&agrave;y. Nhưng nếu cấp tr&ecirc;n ph&ograve;ng thủ hoặc từ chối gi&uacute;p bạn th&igrave; đ&atilde; đến l&uacute;c bạn n&ecirc;n c&acirc;n nhắc lại lựa chọn của m&igrave;nh.</p>\r\n\r\n<p><a href=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Ph%E1%BA%A3i-l%C3%A0m-g%C3%AC-khi-c%C3%B4ng-vi%E1%BB%87c-th%E1%BB%B1c-t%E1%BA%BF-kh%C3%B4ng-gi%E1%BB%91ng-nh%C6%B0-b%E1%BA%A3ng-m%C3%B4-t%E1%BA%A3-c%C3%B4ng-vi%E1%BB%87c-h%C3%ACnh-%E1%BA%A3nh-2.jpg\"><img alt=\"Phải-làm-gì-khi-công-việc-thực-tế-không-giống-như-bảng-mô-tả-công-việc-hình-ảnh-2.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Ph%E1%BA%A3i-l%C3%A0m-g%C3%AC-khi-c%C3%B4ng-vi%E1%BB%87c-th%E1%BB%B1c-t%E1%BA%BF-kh%C3%B4ng-gi%E1%BB%91ng-nh%C6%B0-b%E1%BA%A3ng-m%C3%B4-t%E1%BA%A3-c%C3%B4ng-vi%E1%BB%87c-h%C3%ACnh-%E1%BA%A3nh-2.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Phải-làm-gì-khi-công-việc-thực-tế-không-giống-như-bảng-mô-tả-công-việc-hình-ảnh-2.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Phải-làm-gì-khi-công-việc-thực-tế-không-giống-như-bảng-mô-tả-công-việc-hình-ảnh-2-300x175.jpg 300w\" title=\"Phải làm gì khi công việc thực tế không giống như bảng mô tả công việc? hình ảnh 2\" width=\"600\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Thiết lập một cuộc họp với họ v&agrave; tr&igrave;nh b&agrave;y cho cấp tr&ecirc;n biết vấn đề hiện tại của m&igrave;nh</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>4. Chuẩn bị c&aacute;c phương &aacute;n dự ph&ograve;ng</strong></h4>\r\n\r\n<p>Nếu đ&atilde; thực hiện c&aacute;c bước tr&ecirc;n m&agrave; kết quả vẫn kh&ocirc;ng đổi th&igrave; đ&atilde; đến l&uacute;c bạn n&ecirc;n t&igrave;m kiếm một cơ hội mới cho m&igrave;nh. Kh&ocirc;ng c&oacute; l&yacute; do g&igrave; để bạn n&iacute;u k&eacute;o&nbsp;một c&ocirc;ng việc m&agrave; bạn kh&ocirc;ng hề y&ecirc;u th&iacute;ch v&agrave; kh&ocirc;ng mong muốn gắn b&oacute; l&acirc;u d&agrave;i cả. Tuy nhi&ecirc;n, cho d&ugrave; bạn đ&atilde; đưa ra quyết định nghỉ việc, h&atilde;y cố gắng hết sức để mọi chuyện được diễn ra nhẹ nh&agrave;ng v&agrave; th&acirc;n mật. H&atilde;y để người quản l&yacute; v&agrave; những đồng nghiệp của bạn biết rằng bạn đ&aacute;nh gi&aacute; cao cơ hội n&agrave;y, nhưng v&igrave; n&oacute; kh&ocirc;ng ph&ugrave; hợp với bạn n&ecirc;n mới lựa chọn rời đi. Biết đ&acirc;u được những mối quan hệ n&agrave;y lại c&oacute; thể gi&uacute;p &iacute;ch cho bạn trong tương lai th&igrave; sao?</p>\r\n\r\n<p>Thật tiếc nếu phải từ bỏ một c&ocirc;ng việc m&agrave; bạn phải tốn nhiều thời gian v&agrave; c&ocirc;ng sức để c&oacute; được. Tuy nhi&ecirc;n, đ&ocirc;i khi bạn phải học c&aacute;ch đ&oacute;ng c&aacute;nh cửa n&agrave;y lại để mở ra một c&aacute;nh cửa mới ph&ugrave; hợp với m&igrave;nh hơn. D&ugrave; thế n&agrave;o th&igrave; bạn h&atilde;y tự tin v&agrave; giữ vững tinh thần lạc quan để t&igrave;m kiếm những cơ hội mới cho m&igrave;nh nh&eacute;.</p>\r\n\r\n<div id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '2020-03-19__phai-lam-gi-khi-cong-viec-thuc-te-khong-giong-nhu-bang-mo-ta-cong-viec-hinh-anh-2-340x204.jpg', 1, '2020-03-20 16:05:32', '2020-06-27 22:53:41'),
(5, 1, 'Tại sao nhà tuyển dụng không nên bỏ qua những ứng viên lớn tuổi?', 'tai-sao-nha-tuyen-dung-khong-nen-bo-qua-nhung-ung-vien-lon-tuoi', 'Trong quá trình tìm kiếm nhân sự cho công ty, hầu hết các nhà tuyển dụng thường bỏ qua những ứng viên lớn tuổi. Có thể họ lo sợ rằng người lớn tuổi thường khó quản lý hơn hoặc những đối tượng này sẽ khó theo kịp nhịp độ làm việc trong môi trường công sở hiện đại. Thế nhưng bạn sẽ gạt bỏ ngay những suy nghĩ này nếu nhận ra 5 lợi ích sau đây từ việc tuyển dụng ứng viên lớn tuổi.', '<h4><strong>1. Tạo m&ocirc;i trường l&agrave;m việc đa dạng hơn</strong></h4>\r\n\r\n<p>Nếu trong c&ocirc;ng ty của bạn tồn tại nhiều lứa tuổi c&ugrave;ng l&agrave;m việc với nhau sẽ tạo n&ecirc;n một m&ocirc;i trường l&agrave;m việc đa dạng. Điều n&agrave;y c&oacute; thể tăng năng suất v&agrave; tiềm năng của c&aacute;c nh&acirc;n vi&ecirc;n trẻ tuổi, đồng thời th&uacute;c đẩy c&aacute;c kỹ năng của nh&acirc;n vi&ecirc;n ph&aacute;t triển hơn.&nbsp;Hơn nữa,&nbsp;một nơi l&agrave;m việc đa dạng c&oacute; thể l&agrave;m tăng nhận diện thương hiệu của c&ocirc;ng ty.&nbsp;Bạn sẽ nhận được nhiều ứng vi&ecirc;n ứng tuyển nếu c&ocirc;ng ty c&oacute; văn h&oacute;a h&ograve;a nhập giữa nhiều lứa tuổi với nhau.</p>\r\n\r\n<p><img alt=\"Tại-sao-nhà-tuyển-dụng-không-nên-bỏ-qua-những-ứng-viên-lớn-tuổi-hình-ảnh-1.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/T%E1%BA%A1i-sao-nh%C3%A0-tuy%E1%BB%83n-d%E1%BB%A5ng-kh%C3%B4ng-n%C3%AAn-b%E1%BB%8F-qua-nh%E1%BB%AFng-%E1%BB%A9ng-vi%C3%AAn-l%E1%BB%9Bn-tu%E1%BB%95i-h%C3%ACnh-%E1%BA%A3nh-1.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Tại-sao-nhà-tuyển-dụng-không-nên-bỏ-qua-những-ứng-viên-lớn-tuổi-hình-ảnh-1.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Tại-sao-nhà-tuyển-dụng-không-nên-bỏ-qua-những-ứng-viên-lớn-tuổi-hình-ảnh-1-300x175.jpg 300w\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Nếu c&oacute; nhiều tầng lớp c&ugrave;ng l&agrave;m việc với nhau sẽ tạo n&ecirc;n một m&ocirc;i trường l&agrave;m việc đa dạng</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2. Họ c&oacute; nhiều kinh nghiệm</strong></h4>\r\n\r\n<p>Một lợi &iacute;ch chắc chắn v&agrave; r&otilde; r&agrave;ng nhất khi tuyển dụng ứng vi&ecirc;n lớn tuổi l&agrave; họ c&oacute; nhiều kỹ năng v&agrave; kinh nghiệm l&agrave;m việc.&nbsp;Những người thuộc thế hệ cũ c&oacute; thể c&oacute; sự hiểu biết trong nhiều lĩnh vực kh&aacute;c nhau trong qu&aacute; tr&igrave;nh l&agrave;m việc của họ. Kinh nghiệm n&agrave;y chắc chắn đ&atilde; dạy cho họ một loạt những điều c&oacute; thể được &aacute;p dụng cho vai tr&ograve; hiện tại. C&oacute; thể bạn cho rằng, người lớn tuổi sẽ kh&ocirc;ng bắt kịp được những kỹ năng về c&ocirc;ng nghệ; tuy nhi&ecirc;n, những kỹ năng n&agrave;y c&oacute; thể học được. Ngược lại, đ&agrave;o tạo những người trẻ tuổi c&oacute; sự kh&ocirc;n ngoan hoặc suy nghĩ ch&iacute;n chắn như những người đ&atilde; c&oacute; nhiều năm &ldquo;lăn lộn&rdquo; với nghề l&agrave; điều ho&agrave;n to&agrave;n kh&ocirc;ng thể.</p>\r\n\r\n<h4><strong>3. L&ograve;ng trung th&agrave;nh</strong></h4>\r\n\r\n<p>C&aacute;c nghi&ecirc;n cứu đ&atilde; chỉ ra rằng những người lao động c&agrave;ng lớn tuổi c&agrave;ng mong muốn được k&eacute;o d&agrave;i thời gian l&agrave;m việc của họ l&acirc;u hơn so với c&aacute;c thế hệ trước. Khoảng hơn 50% những người ở độ tuổi tr&ecirc;n 55 dự định sẽ l&agrave;m việc ngo&agrave;i tuổi về hưu. Tuổi nghỉ hưu mặc định cũng kh&ocirc;ng c&ograve;n bị &eacute;p buộc ở tuổi 65. Điều n&agrave;y c&oacute; khả năng mang lại kết quả t&iacute;ch cực cho tỷ lệ duy tr&igrave; trong một tổ chức v&agrave; tất cả ch&uacute;ng ta đều biết l&ograve;ng trung th&agrave;nh quan trọng như thế n&agrave;o đối với một doanh nghiệp .</p>\r\n\r\n<h4><strong>4. Họ c&oacute; sự trưởng th&agrave;nh</strong></h4>\r\n\r\n<p>Một lợi &iacute;ch nữa sẽ khiến bạn an t&acirc;m nếu tuyển dụng ứng vi&ecirc;n lớn tuổi l&agrave; ở họ c&oacute; sự trưởng th&agrave;nh nhất định. Điều n&agrave;y c&oacute; nghĩa l&agrave; họ biết c&aacute;ch cư xử, biết những g&igrave; n&ecirc;n v&agrave; kh&ocirc;ng n&ecirc;n l&agrave;m tại nơi l&agrave;m việc. Trong khi đ&oacute;, những người trẻ tuổi thường c&oacute; c&aacute;i t&ocirc;i v&agrave; tự &aacute;i rất cao, đ&acirc;y cũng l&agrave; nguy&ecirc;n nh&acirc;n dễ g&acirc;y n&ecirc;n x&iacute;ch m&iacute;ch trong qu&aacute; tr&igrave;nh l&agrave;m việc.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, khả năng một nh&acirc;n vi&ecirc;n lớn tuổi bị l&ocirc;i k&eacute;o v&agrave;o ch&iacute;nh trị văn ph&ograve;ng, b&egrave; ph&aacute;i hoặc vi phạm nội quy c&ocirc;ng ty thường rất hiếm khi xảy ra. Họ thường sẽ n&eacute; tr&aacute;nh những ồn &agrave;o nơi c&ocirc;ng sở v&agrave; lu&ocirc;n tập trung v&agrave;o c&ocirc;ng việc của m&igrave;nh.</p>\r\n\r\n<p><img alt=\"Tại-sao-nhà-tuyển-dụng-không-nên-bỏ-qua-những-ứng-viên-lớn-tuổi-hình-ảnh-2.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/T%E1%BA%A1i-sao-nh%C3%A0-tuy%E1%BB%83n-d%E1%BB%A5ng-kh%C3%B4ng-n%C3%AAn-b%E1%BB%8F-qua-nh%E1%BB%AFng-%E1%BB%A9ng-vi%C3%AAn-l%E1%BB%9Bn-tu%E1%BB%95i-h%C3%ACnh-%E1%BA%A3nh-2.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Tại-sao-nhà-tuyển-dụng-không-nên-bỏ-qua-những-ứng-viên-lớn-tuổi-hình-ảnh-2.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/03/Tại-sao-nhà-tuyển-dụng-không-nên-bỏ-qua-những-ứng-viên-lớn-tuổi-hình-ảnh-2-300x175.jpg 300w\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Nh&acirc;n vi&ecirc;n lớn tuổi thường chỉ tập trung v&agrave;o c&ocirc;ng việc của họ</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>5.&nbsp;Tiết kiệm chi ph&iacute;</strong></h4>\r\n\r\n<p>Th&ocirc;ng thường, c&aacute;c ứng cử vi&ecirc;n lớn tuổi thường mong đợi mức lương cao hơn so với ứng vi&ecirc;n trẻ, nhưng điều n&agrave;y đ&aacute;ng gi&aacute; để đảm bảo cho một nh&acirc;n vi&ecirc;n c&oacute; kinh nghiệm hơn. Nh&acirc;n vi&ecirc;n lớn tuổi c&oacute; thể tiết kiệm chi ph&iacute; của bạn&nbsp;về l&acirc;u d&agrave;i chỉ bằng c&aacute;ch gi&uacute;p bạn tr&aacute;nh những sai lầm tốn k&eacute;m hoặc mất thời gian. Hơn nữa, nh&acirc;n vi&ecirc;n lớn tuổi c&oacute; thể trở th&agrave;nh những người quản l&yacute;, đ&agrave;o tạo cho những nh&acirc;n vi&ecirc;n trẻ tuổi hơn, gi&uacute;p c&ocirc;ng ty tiết kiệm được một khoảng thời gian đ&aacute;ng kể.</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; 5 lợi &iacute;ch phổ biến nếu bạn nhận thu&ecirc; người t&igrave;m việc lớn tuổi. Mặc d&ugrave; vẫn c&oacute; một số bất lợi nhưng nh&igrave;n chung tuyển dụng nh&acirc;n vi&ecirc;n lớn tuổi c&oacute; thể mang lại cho doanh nghiệp rất nhiều lợi &iacute;ch tuyệt vời kh&aacute;c.</p>\r\n\r\n<div id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '2020-03-19__tai-sao-nha-tuyen-dung-khong-nen-bo-qua-nhung-ung-vien-lon-tuoi-hinh-anh-1-340x204.jpg', 1, '2020-03-20 16:05:39', '2020-03-20 16:05:39'),
(6, 1, 'Làm thế nào để kết thúc cuộc phỏng vấn một cách hoàn hảo?', 'lam-the-nao-de-ket-thuc-cuoc-phong-van-mot-cach-hoan-hao', 'Trong quá trình phỏng vấn, ấn tượng đầu tiên là vô cùng quan trọng, tuy nhiên, ấn tượng trước khi ra về cũng giúp phần “củng cố” quyết định cuối cùng của nhà tuyển dụng nữa đấy!', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '2020-07-01__web-1-1.png', 1, '2020-07-01 21:37:58', '2020-07-01 21:37:58'),
(7, 1, 'Những điều nhà tuyển dụng cần lưu ý khi sàng lọc CV', 'nhung-dieu-nha-tuyen-dung-can-luu-y-khi-sang-loc-cv', 'Sàng lọc CV là công đoạn quan trọng của các nhà tuyển dụng sau khi đăng tải thông tin tuyển dụng. Nếu cẩn thận và chăm chút kỹ lưỡng ở bước này, bạn sẽ tìm ra được những CV chất lượng. Điều này đồng nghĩa với việc ứng viên mà bạn muốn phỏng vấn sẽ có mức độ phù hợp với công ty cao hơn. Để làm được điều này, trong quá trình sàng lọc CV, nhà tuyển dụng cần lưu ý những vấn đề sau.', '<h4><strong>CV tr&igrave;nh b&agrave;y cẩu thả, sai ch&iacute;nh tả</strong></h4>\r\n\r\n<p>Tr&igrave;nh b&agrave;y CV cẩu thả v&agrave; sai lỗi ch&iacute;nh tả l&agrave; lỗi thường gặp ở nhiều ứng vi&ecirc;n, v&agrave; đ&acirc;y l&agrave; một trong những yếu tố quan trọng để nh&agrave; tuyển dụng đ&aacute;nh gi&aacute; ứng vi&ecirc;n. Thực tế một người nếu mắc phải những lỗi cơ bản tr&ecirc;n thường thiếu sự cẩn thận hoặc họ kh&ocirc;ng quan trọng với vị tr&iacute; c&ocirc;ng việc n&agrave;y. Ngược lại, một ứng vi&ecirc;n chuy&ecirc;n nghiệp sẽ ch&uacute; &yacute; nhiều đến c&aacute;c chi tiết như ch&iacute;nh tả, dấu c&acirc;u, ngữ ph&aacute;p,&hellip;</p>\r\n\r\n<p><img alt=\"Những-điều-nhà-tuyển-dụng-cần-lưu-ý-khi-sàng-lọc-CV-hình-ảnh-1.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/06/Nh%E1%BB%AFng-%C4%91i%E1%BB%81u-nh%C3%A0-tuy%E1%BB%83n-d%E1%BB%A5ng-c%E1%BA%A7n-l%C6%B0u-%C3%BD-khi-s%C3%A0ng-l%E1%BB%8Dc-CV-h%C3%ACnh-%E1%BA%A3nh-1.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/06/Những-điều-nhà-tuyển-dụng-cần-lưu-ý-khi-sàng-lọc-CV-hình-ảnh-1.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/06/Những-điều-nhà-tuyển-dụng-cần-lưu-ý-khi-sàng-lọc-CV-hình-ảnh-1-300x175.jpg 300w\" title=\"Những điều nhà tuyển dụng cần lưu ý khi sàng lọc CV hình ảnh 1\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Ứng vi&ecirc;n chuy&ecirc;n nghiệp sẽ ch&uacute; &yacute; nhiều đến c&aacute;c chi tiết như ch&iacute;nh tả, dấu c&acirc;u,&hellip;</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>Khoảng c&aacute;ch giữa c&aacute;c c&ocirc;ng việc đ&atilde; l&agrave;m qu&aacute; xa</strong></h4>\r\n\r\n<p>Một điều tiếp theo nh&agrave; tuyển dụng cần lưu &yacute; khi xem x&eacute;t CV của ứng vi&ecirc;n ch&iacute;nh l&agrave; lịch sử việc l&agrave;m của họ. Nếu khoảng c&aacute;ch giữa mỗi lần l&agrave;m việc của ứng vi&ecirc;n c&aacute;ch nhau qu&aacute; xa, bạn n&ecirc;n đặt c&acirc;u hỏi rằng họ đ&atilde; l&agrave;m g&igrave; trong khoảng thời gian n&agrave;y. Tuy nhi&ecirc;n đ&acirc;y kh&ocirc;ng phải l&agrave; điều kiện để bạn loại bỏ CV ngay lập tức. Nếu bạn kh&ocirc;ng l&yacute; giải được điều n&agrave;y m&agrave; CV c&oacute; vẻ ph&ugrave; hợp với c&ocirc;ng việc, h&atilde;y hỏi ứng vi&ecirc;n trong lần phỏng vấn. C&oacute; thể ứng vi&ecirc;n sẽ đưa ra một số l&yacute; do m&agrave; bạn ho&agrave;n to&agrave;n chấp nhận được như bệnh tật, c&ocirc;ng việc gia đ&igrave;nh, học c&aacute;c chương tr&igrave;nh bổ sung,&hellip;</p>\r\n\r\n<h4><strong>CV c&oacute; nội dung kh&ocirc;ng r&otilde; r&agrave;ng</strong></h4>\r\n\r\n<p>C&aacute;c nh&agrave; tuyển dụng đều biết rằng hầu hết ứng vi&ecirc;n thường nộp đơn v&agrave; nhiều vị tr&iacute; c&ugrave;ng l&uacute;c mỗi khi t&igrave;m việc. Điều n&agrave;y đồng nghĩa với việc kh&ocirc;ng chỉ bạn m&agrave; c&ograve;n nhiều nh&agrave; tuyển dụng kh&aacute;c nữa cũng sẽ nhận được CV n&agrave;y. Tuy nhi&ecirc;n, nếu nhận thấy CV của ứng vi&ecirc;n c&oacute; vẻ &ldquo;chung chung&rdquo;, nội dung kh&ocirc;ng r&otilde; r&agrave;ng th&igrave; c&oacute; thể họ chỉ d&ugrave;ng một mẫu CV để gửi chung cho nhiều vị tr&iacute;. Việc kh&ocirc;ng t&ugrave;y chỉnh CV theo nội dung m&ocirc; tả c&ocirc;ng việc cho thấy ứng vi&ecirc;n kh&ocirc;ng thật sự t&acirc;m huyết với vị tr&iacute; c&ocirc;ng việc n&agrave;y. Ngược lại nếu một CV được t&ugrave;y chỉnh nội dung ph&ugrave; hợp, cho thấy ứng vi&ecirc;n đ&atilde; c&oacute; nghi&ecirc;n cứu v&agrave; t&igrave;m hiểu về c&ocirc;ng ty. Đồng thời họ sẽ li&ecirc;n kết được những kỹ năng của bản th&acirc;n đ&aacute;p ứng được với y&ecirc;u cầu của c&ocirc;ng việc đ&atilde; đề ra.</p>\r\n\r\n<p><img alt=\"Những-điều-nhà-tuyển-dụng-cần-lưu-ý-khi-sàng-lọc-CV-hình-ảnh-2.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/06/Nh%E1%BB%AFng-%C4%91i%E1%BB%81u-nh%C3%A0-tuy%E1%BB%83n-d%E1%BB%A5ng-c%E1%BA%A7n-l%C6%B0u-%C3%BD-khi-s%C3%A0ng-l%E1%BB%8Dc-CV-h%C3%ACnh-%E1%BA%A3nh-2.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/06/Những-điều-nhà-tuyển-dụng-cần-lưu-ý-khi-sàng-lọc-CV-hình-ảnh-2.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/06/Những-điều-nhà-tuyển-dụng-cần-lưu-ý-khi-sàng-lọc-CV-hình-ảnh-2-300x175.jpg 300w\" title=\"Những điều nhà tuyển dụng cần lưu ý khi sàng lọc CV hình ảnh 2\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Việc kh&ocirc;ng t&ugrave;y chỉnh CV cho thấy ứng vi&ecirc;n kh&ocirc;ng thật sự t&acirc;m huyết với vị tr&iacute; c&ocirc;ng việc n&agrave;y.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>Kh&ocirc;ng thực hiện theo c&aacute;c chỉ dẫn</strong></h4>\r\n\r\n<p>Trong một số trường hợp, nh&agrave; tuyển dụng sẽ đưa ra c&aacute;c y&ecirc;u cầu về việc nộp CV như: Kh&ocirc;ng gửi tin nhắn ri&ecirc;ng m&agrave; gửi qua email, cấu tr&uacute;c đặt ti&ecirc;u đề email, t&agrave;i liệu đ&iacute;nh k&egrave;m,&hellip; Nếu ứng vi&ecirc;n cố t&igrave;nh kh&ocirc;ng tu&acirc;n thủ, nh&agrave; tuyển dụng c&oacute; khả năng loại bỏ CV của họ. Một ứng vi&ecirc;n được xem l&agrave; ph&ugrave; hợp đầu ti&ecirc;n cần đọc, hiểu c&aacute;c y&ecirc;u cầu cơ bản v&agrave; nghi&ecirc;m t&uacute;c thực hiện ch&uacute;ng. Điều n&agrave;y kh&ocirc;ng chỉ thể hiện sự t&ocirc;n trọng d&agrave;nh cho nh&agrave; tuyển dụng m&agrave; c&ograve;n thể hiện t&iacute;nh chuy&ecirc;n nghiệp của ứng vi&ecirc;n.</p>\r\n\r\n<p>D&ugrave; phỏng vấn trực tiếp hay viết CV th&igrave; ứng vi&ecirc;n cũng phần n&agrave;o thể hiện được t&iacute;nh c&aacute;ch của họ. Nh&agrave; tuyển dụng cần kh&eacute;o l&eacute;o nhận ra những dấu hiệu tr&ecirc;n để đưa ra c&aacute;c lựa chọn s&aacute;ng suốt cho m&igrave;nh nh&eacute;.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '2020-07-01__nhung-dieu-nha-tuyen-dung-can-luu-y-khi-sang-loc-cv-hinh-anh-2-430x350.jpg', 1, '2020-07-01 22:01:22', '2020-07-01 22:01:22');
INSERT INTO `admin_blogs` (`id`, `bo_admin_id`, `bo_title`, `bo_slug`, `bo_description`, `bo_content`, `bo_avatar`, `bo_active`, `created_at`, `updated_at`) VALUES
(8, 1, '4 khuyết điểm làm ảnh hưởng đến sự nghiệp của bạn', '4-khuyet-diem-lam-anh-huong-den-su-nghiep-cua-ban', 'Nhiều người khi đi làm đều mong muốn rằng sau một thời gian mình sẽ có những thành công nhất định trong công việc. Đó có thể là được tăng lương, thăng chức hoặc được tham gia vào những dự án quan trọng của công ty. Thế nhưng thực tế lại không phải ai cũng đều đi theo một lộ trình như vậy, thậm chí bạn vẫn “giậm chân tại chỗ” sau bao nhiêu năm làm việc. Có bao giờ bạn tự hỏi rằng tại sao lại có sự khác biệt này hay không? Rất có thể câu trả lời là do chính những thói quan xấu hằng ngày, vô tình trở thành khuyết điểm làm cản trở con đường sự nghiệp của bạn.', '<h4><strong>Thiếu tự tin</strong></h4>\r\n\r\n<p>Đ&acirc;y l&agrave; một trong những khiếm khuyết c&oacute; ảnh hưởng lớn nhất đến sự nghiệp của bạn. Tự tin l&agrave; một đức t&iacute;nh quan trọng, gi&uacute;p bạn vững v&agrave;ng trong mọi quyết định. Từ đ&oacute; bạn sẽ dễ đạt được th&agrave;nh c&ocirc;ng trong c&ocirc;ng việc hơn. Ngược lại, nếu l&agrave;m việc g&igrave; bạn cũng tự ti, do dự th&igrave; rất kh&oacute; để &ldquo;l&agrave;m n&ecirc;n chuyện&rdquo;. C&agrave;ng về sau, sự thiếu tự tin sẽ g&acirc;y ra trở ngại t&acirc;m l&yacute; rất lớn cho bản th&acirc;n khiến bạn kh&ocirc;ng c&aacute;ch n&agrave;o vượt qua được, nhất l&agrave; khi nh&igrave;n thấy đồng nghiệp của m&igrave;nh ng&agrave;y c&agrave;ng ph&aacute;t triển tốt hơn.</p>\r\n\r\n<p><img alt=\"4-khuyết-điểm-làm-ảnh-hưởng-đến-sự-nghiệp-của-bạn-hình-ảnh-1.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/4-khuy%E1%BA%BFt-%C4%91i%E1%BB%83m-l%C3%A0m-%E1%BA%A3nh-h%C6%B0%E1%BB%9Fng-%C4%91%E1%BA%BFn-s%E1%BB%B1-nghi%E1%BB%87p-c%E1%BB%A7a-b%E1%BA%A1n-h%C3%ACnh-%E1%BA%A3nh-1.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/4-khuyết-điểm-làm-ảnh-hưởng-đến-sự-nghiệp-của-bạn-hình-ảnh-1.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/4-khuyết-điểm-làm-ảnh-hưởng-đến-sự-nghiệp-của-bạn-hình-ảnh-1-300x175.jpg 300w\" title=\"4 khuyết điểm làm ảnh hưởng đến sự nghiệp của bạn hình ảnh 1\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Thiếu tự tin l&agrave; yếu tố ảnh hưởng rất lớn đến sự nghiệp</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4>&nbsp;</h4>\r\n\r\n<h4>Lu&ocirc;n tr&igrave; ho&atilde;n trong c&ocirc;ng việc</h4>\r\n\r\n<p>Nhiều người hay c&oacute; th&oacute;i quen &ldquo;nước đến ch&acirc;n mới nhảy&rdquo;, chỉ khi n&agrave;o đến s&aacute;t deadline th&igrave; mới bắt tay v&agrave;o c&ocirc;ng việc. Nếu cứ giữ m&atilde;i th&oacute;i quen n&agrave;y, bạn sẽ đẩy bản th&acirc;n m&igrave;nh v&agrave;o thế kh&oacute; nếu chẳng may c&oacute; vấn đề ph&aacute;t sinh. Hơn nữa, nếu bạn chỉ cho m&igrave;nh một khoảng thời gian rất &iacute;t để thực hiện nhiệm vụ, bạn sẽ ho&agrave;n th&agrave;nh ch&uacute;ng với t&acirc;m l&yacute; vội v&atilde; hay &ldquo;l&agrave;m cho c&oacute;&rdquo;. Như thế, chất lượng c&ocirc;ng việc chắc chắn sẽ bị ảnh hưởng v&agrave; cấp tr&ecirc;n sẽ kh&ocirc;ng c&oacute; đ&aacute;nh gi&aacute; tốt về bạn. V&igrave; thế, nếu muốn nhận được sự t&iacute;n nhiệm từ sếp v&agrave; đồng nghiệp, bạn phải lu&ocirc;n ho&agrave;n th&agrave;nh c&ocirc;ng việc kh&ocirc;ng chỉ hiệu quả nhất trong thời gian sớm nhất.</p>\r\n\r\n<h4><strong>Qu&aacute; thẳng thắn</strong></h4>\r\n\r\n<p>Nhiều người cho rằng, thẳng thắn l&agrave; một đức t&iacute;nh tốt v&agrave; người c&oacute; t&iacute;nh thẳng thắn sẽ c&oacute; c&aacute; t&iacute;nh ri&ecirc;ng gi&uacute;p họ dễ th&agrave;nh c&ocirc;ng hơn những người kh&aacute;c. Tuy nhi&ecirc;n, trong một m&ocirc;i trường l&agrave;m việc nơi c&ocirc;ng sở, nơi bạn tiếp x&uacute;c với nhiều người với nhiều t&iacute;nh c&aacute;ch kh&aacute;c nhau, việc qu&aacute; thẳng thắn đ&ocirc;i khi lại mang đến cho bạn nhiều phiền phức kh&ocirc;ng đ&aacute;ng c&oacute;. Đặc biệt, trong những cuộc tranh luận, sự thẳng thắn của bạn đ&ocirc;i khi l&agrave;m tổn thương đến đối phương v&agrave; c&oacute; thể mọi người sẽ cho rằng bạn lu&ocirc;n cho m&igrave;nh đ&uacute;ng v&agrave; kh&ocirc;ng biết lắng nghe người kh&aacute;c. Thay v&agrave;o đ&oacute;, nếu bạn biết c&aacute;ch đưa ra &yacute; kiến của m&igrave;nh một c&aacute;ch nhẹ nh&agrave;ng v&agrave; kh&eacute;o l&eacute;o, bạn sẽ giải quyết được vấn đề một c&aacute;ch thuận lợi nhất m&agrave; kh&ocirc;ng l&agrave;m ảnh hưởng đến h&ograve;a kh&iacute; với đồng nghiệp v&agrave; cấp tr&ecirc;n. Bạn n&ecirc;n nhớ rằng d&ugrave; trong c&ocirc;ng việc hay cuộc sống, người kh&eacute;o ăn n&oacute;i sẽ giao tiếp tốt hơn, mở rộng mạng lưới quan hệ của m&igrave;nh hơn. Từ đ&oacute;, con đường sự nghiệp của bạn sẽ dễ d&agrave;ng hơn rất nhiều.</p>\r\n\r\n<p><img alt=\"4-khuyết-điểm-làm-ảnh-hưởng-đến-sự-nghiệp-của-bạn-hình-ảnh-2.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/4-khuy%E1%BA%BFt-%C4%91i%E1%BB%83m-l%C3%A0m-%E1%BA%A3nh-h%C6%B0%E1%BB%9Fng-%C4%91%E1%BA%BFn-s%E1%BB%B1-nghi%E1%BB%87p-c%E1%BB%A7a-b%E1%BA%A1n-h%C3%ACnh-%E1%BA%A3nh-2.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/4-khuyết-điểm-làm-ảnh-hưởng-đến-sự-nghiệp-của-bạn-hình-ảnh-2.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/4-khuyết-điểm-làm-ảnh-hưởng-đến-sự-nghiệp-của-bạn-hình-ảnh-2-300x175.jpg 300w\" title=\"4 khuyết điểm làm ảnh hưởng đến sự nghiệp của bạn hình ảnh 2\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Việc qu&aacute; thẳng thắn đ&ocirc;i khi lại mang đến cho bạn nhiều phiền phức kh&ocirc;ng đ&aacute;ng c&oacute;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>Thiếu sự ki&ecirc;n tr&igrave;</strong></h4>\r\n\r\n<p>C&oacute; c&acirc;u n&oacute;i rằng &ldquo;Tr&ecirc;n con đường th&agrave;nh c&ocirc;ng kh&ocirc;ng c&oacute; dấu ch&acirc;n của kẻ lười biếng&rdquo;. Nếu muốn th&agrave;nh c&ocirc;ng, bạn buộc phải ki&ecirc;n tr&igrave;, bạn phải kh&ocirc;ng ngừng nỗ lực. Nếu một người c&oacute; sự ki&ecirc;n tr&igrave; v&agrave; niềm tin m&atilde;nh liệt, sớm muộn g&igrave; họ cũng sẽ đạt được mục đ&iacute;ch của m&igrave;nh. Bởi v&igrave; người ki&ecirc;n tr&igrave; lu&ocirc;n hiểu m&igrave;nh muốn l&agrave;m những g&igrave; v&agrave; kh&ocirc;ng ngừng nỗ lực để đạt được mục ti&ecirc;u ấy. Ngược lại, người n&agrave;o dễ từ bỏ khi gặp t&iacute; kh&oacute; khăn sẽ kh&oacute; l&agrave;m n&ecirc;n chuyện. Ch&iacute;nh sự nh&uacute;t nh&aacute;t, thiếu tự tin sẽ dần dần tạo th&agrave;nh một lối m&ograve;n tư duy, từ đ&oacute; khiến họ dễ d&agrave;ng bu&ocirc;ng tay v&agrave; từ bỏ mục ti&ecirc;u ban đầu của m&igrave;nh.</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; 4 đặc điểm khiến bạn kh&oacute; th&agrave;nh c&ocirc;ng trong sự nghiệp. Nếu nhận thấy bản th&acirc;n c&oacute; tồn tại một trong những điều chia sẻ ở tr&ecirc;n, h&atilde;y h&atilde;y nhanh ch&oacute;ng khắc phục ngay nh&eacute;. Chỉ c&oacute; như vậy bạn mới c&oacute; thể khẳng định được gi&aacute; trị của bản th&acirc;n v&agrave; khẳng định được chỗ đứng của m&igrave;nh trong c&ocirc;ng việc.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '2020-07-01__4-khuyet-diem-lam-anh-huong-den-su-nghiep-cua-ban-hinh-anh-2-340x204.jpg', 1, '2020-07-01 22:01:09', '2020-07-01 22:01:09'),
(9, 1, 'Giải mã sức hút của “ông trùm” bán lẻ VinCommerce', 'giai-ma-suc-hut-cua-ong-trum-ban-le-vincommerce', 'Công Ty Cổ Phần Dịch Vụ Thương Mại Tổng Hợp VinCommerce (bao gồm hệ thống siêu thị Vinmart và chuỗi cửa hàng Vinmart+) thuộc Tập đoàn VinGroup – Tập đoàn kinh tế đa ngành hàng đầu Việt Nam. Chính thức đi vào hoạt động từ ngày 20/11/2014 với 9 siêu thị được mở trên địa bàn Hà Nội, tính đến nay, Vinmart và Vinmart+ đã tạo cho mình một chỗ đứng trong lòng người tiêu dùng.', '<h4><strong>Ch&igrave;a kh&oacute;a th&agrave;nh c&ocirc;ng</strong></h4>\r\n\r\n<p>Chỉ trong v&ograve;ng 5 năm, VinCommerce đ&atilde; x&acirc;y dựng một mạng lưới với gần 2.600 si&ecirc;u thị v&agrave; cửa h&agrave;ng Vinmart v&agrave; Vinmart+. VinCommerce đã có bước đi đúng đắn trong vi&ecirc;̣c lựa chọn ngành hàng tươi s&ocirc;́ng làm nhóm sản ph&acirc;̉m chi&ecirc;́n lược trong m&ocirc; hình hoạt đ&ocirc;̣ng của si&ecirc;u thị VinMart cũng như cửa hàng VinMart+.</p>\r\n\r\n<p><img alt=\"Giải-mã-sức-hút-của-ông-trùm-bán-lẻ-VinCommerce-hình-1.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Gi%E1%BA%A3i-m%C3%A3-s%E1%BB%A9c-h%C3%BAt-c%E1%BB%A7a-%C3%B4ng-tr%C3%B9m-b%C3%A1n-l%E1%BA%BB-VinCommerce-h%C3%ACnh-1.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Giải-mã-sức-hút-của-ông-trùm-bán-lẻ-VinCommerce-hình-1.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Giải-mã-sức-hút-của-ông-trùm-bán-lẻ-VinCommerce-hình-1-300x175.jpg 300w\" title=\"Giải mã sức hút của “ông trùm” bán lẻ VinCommerce hình 1\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>H&ecirc;̣ th&ocirc;́ng si&ecirc;u thị VinMart &amp; chu&ocirc;̃i cửa hàng VinMart+ là đơn vị ti&ecirc;́p c&acirc;̣n khách hàng r&ocirc;̣ng khắp và thường xuy&ecirc;n nh&acirc;́t.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kh&ocirc;ng những thế, VinCommerce dành ph&acirc;̀n lớn thời gian đ&ecirc;̉ đào tạo nh&acirc;n vi&ecirc;n theo các quy tắc, tác phong ti&ecirc;u chu&acirc;̉n qu&ocirc;́c t&ecirc;́. M&ocirc;̃i nh&acirc;n vi&ecirc;n được xác định là m&ocirc;̣t đại sứ thương hi&ecirc;̣u đóng vai trò tư v&acirc;́n những sản ph&acirc;̉m ch&acirc;́t lượng, th&ocirc;ng báo các chương trình khuy&ecirc;́n mại và đặc bi&ecirc;̣t lu&ocirc;n th&ecirc;̉ hi&ecirc;̣n thái đ&ocirc;̣ tươi tắn và rạng rỡ nhằm tạo thi&ecirc;̣n cảm, sự thoải mái cho khách hàng.</p>\r\n\r\n<p>Trong năm 2017, VinCommerce đã tri&ecirc;̉n khai chương trình &ldquo;Đồng h&agrave;nh, hỗ trợ v&agrave; th&uacute;c đẩy sản xuất nội địa&rdquo; nhằm h&ocirc;̃ trợ v&ecirc;̀ k&ecirc;nh ph&acirc;n ph&ocirc;́i, chi&ecirc;́n lược phát tri&ecirc;̉n sản ph&acirc;̉m, chương trình marketing&hellip; dành cho các thương hi&ecirc;̣u Vi&ecirc;̣t đang được bày bán tr&ecirc;n các qu&acirc;̀y k&ecirc;̣ của VinMart, VinMart+. Nhờ đó, người ti&ecirc;u dùng d&ecirc;̃ dàng mua sắm và sử dụng các sản ph&acirc;̉m Vi&ecirc;̣t Nam ch&acirc;́t lượng cao, minh bạch ngu&ocirc;̀n g&ocirc;́c xu&acirc;́t xứ với mức giá hợp lý.</p>\r\n\r\n<h4><strong>Những th&agrave;nh tựu VinCommerce đ&atilde; đạt được</strong></h4>\r\n\r\n<p>C&ocirc;ng ty VinCommerce vinh dự lọt top 2 những &ldquo;Sản ph&acirc;̉m dịch vụ thương hi&ecirc;̣u Vi&ecirc;̣t ti&ecirc;u bi&ecirc;̉u năm 2017&rdquo; được trao tặng bởi B&ocirc;̣ C&ocirc;ng thương nhằm vinh danh các doanh nghi&ecirc;̣p Vi&ecirc;̣t Nam sản xu&acirc;́t, ph&acirc;n ph&ocirc;́i sản ph&acirc;̉m, cung ứng dịch vụ được người ti&ecirc;u dùng ưa chu&ocirc;̣ng tr&ecirc;n thị trường.</p>\r\n\r\n<p><img alt=\"Giải-mã-sức-hút-của-ông-trùm-bán-lẻ-VinCommerce-hình-2.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Gi%E1%BA%A3i-m%C3%A3-s%E1%BB%A9c-h%C3%BAt-c%E1%BB%A7a-%C3%B4ng-tr%C3%B9m-b%C3%A1n-l%E1%BA%BB-VinCommerce-h%C3%ACnh-2.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Giải-mã-sức-hút-của-ông-trùm-bán-lẻ-VinCommerce-hình-2.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Giải-mã-sức-hút-của-ông-trùm-bán-lẻ-VinCommerce-hình-2-300x175.jpg 300w\" title=\"Giải mã sức hút của “ông trùm” bán lẻ VinCommerce hình 2\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>C&ocirc;ng Ty CP Dịch Vụ Thương Mại Tổng Hợp Vincommerce lọt Top 10 Nh&agrave; b&aacute;n lẻ uy t&iacute;n 2019</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hơn thế nữa, với sự thành c&ocirc;ng của h&ecirc;̣ th&ocirc;́ng si&ecirc;u thị VinMart v&agrave; chu&ocirc;̃i cửa hàng VinMart+, VinCommerce cũng đã lọt top nhi&ecirc;̀u bảng x&ecirc;́p hạng thương hi&ecirc;̣u uy tín trong nước và qu&ocirc;́c t&ecirc;́, th&ecirc;̉ hi&ecirc;̣n t&acirc;̀m vóc và quy m&ocirc; của m&ocirc;̣t thương hi&ecirc;̣u trẻ giàu ti&ecirc;̀m năng và mang tính đ&ocirc;̣t phá cao, như: Đứng thứ 19 trong số 50 thương hiệu gi&aacute; trị nhất Việt Nam năm 2016, 2017 (do Brand Finance bình chọn); Top 10 Nh&agrave; b&aacute;n lẻ uy t&iacute;n 2019; Top 2 trong t&acirc;m tr&iacute; người ti&ecirc;u d&ugrave;ng Việt (do Vietnam Report bình chọn); Top 10 thương hiệu chủ đề: &ldquo;Sản phẩm xanh &ndash; Ti&ecirc;u d&ugrave;ng sạch&rdquo; (trao bởi Tạp chí tư v&acirc;́n ti&ecirc;u dùng).</p>\r\n\r\n<h4><strong>Nguồn nh&acirc;n lực l&agrave; yếu tố cốt l&otilde;i v&agrave; l&agrave; t&agrave;i sản qu&yacute; gi&aacute;</strong></h4>\r\n\r\n<p>VinCommerce lu&ocirc;n coi nguồn nh&acirc;n lực l&agrave; yếu tố cốt l&otilde;i v&agrave; l&agrave; t&agrave;i sản qu&yacute; gi&aacute;. Mục ti&ecirc;u tuyển dụng tại đ&acirc;y l&agrave; thu h&uacute;t v&agrave; ch&agrave;o đ&oacute;n tất cả những ứng vi&ecirc;n mong muốn l&agrave;m việc với th&aacute;i độ t&iacute;ch cực, năng động, tốc độ, s&aacute;ng tạo v&agrave; hiệu quả &ndash; nơi mỗi c&aacute; nh&acirc;n c&oacute; thể ph&aacute;t huy tối đa khả năng v&agrave; kiến thức chuy&ecirc;n m&ocirc;n. VinCommerce lu&ocirc;n tạo một m&ocirc;i trường l&agrave;m việc chuy&ecirc;n nghiệp, hiện đại, ph&aacute;t huy tối đa quyền được l&agrave;m việc, cống hiến, ph&aacute;t triển, t&ocirc;n vinh của người lao động v&agrave; sự kết hợp h&agrave;i h&ograve;a giữa lợi &iacute;ch của doanh nghiệp với lợi &iacute;ch của c&aacute;n bộ, người lao động.</p>\r\n\r\n<p><img alt=\"Giải-mã-sức-hút-của-ông-trùm-bán-lẻ-VinCommerce-hình-3.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Gi%E1%BA%A3i-m%C3%A3-s%E1%BB%A9c-h%C3%BAt-c%E1%BB%A7a-%C3%B4ng-tr%C3%B9m-b%C3%A1n-l%E1%BA%BB-VinCommerce-h%C3%ACnh-3.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Giải-mã-sức-hút-của-ông-trùm-bán-lẻ-VinCommerce-hình-3.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Giải-mã-sức-hút-của-ông-trùm-bán-lẻ-VinCommerce-hình-3-300x175.jpg 300w\" title=\"Giải mã sức hút của “ông trùm” bán lẻ VinCommerce hình 3\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>VinCommerce lu&ocirc;n tạo một m&ocirc;i trường l&agrave;m việc chuy&ecirc;n nghiệp, hiện đại</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ngo&agrave;i ra, VinCommerce đặc biệt ch&uacute; trọng đến c&ocirc;ng t&aacute;c ph&aacute;t triển nguồn nh&acirc;n lực th&ocirc;ng qua việc triển khai hiệu quả ch&iacute;nh s&aacute;ch đ&agrave;o tạo, n&acirc;ng cao hiểu biết, tr&igrave;nh độ nghiệp vụ cho nh&acirc;n sự trong c&ocirc;ng ty. Đ&agrave;o tạo kh&ocirc;ng chỉ với mục đ&iacute;ch n&acirc;ng cao tr&igrave;nh độ, m&agrave; để mỗi th&agrave;nh vi&ecirc;n đều trở th&agrave;nh một đại diện xứng đ&aacute;ng của VinCommerce trong bất cứ ho&agrave;n cảnh n&agrave;o.</p>\r\n\r\n<p>VinCommerce c&ograve;n l&agrave; nơi bạn c&oacute; thể học hỏi, cống hiến v&agrave; th&agrave;nh c&ocirc;ng tr&ecirc;n con đường sự nghiệp của m&igrave;nh. Tại đ&acirc;y mọi đ&oacute;ng g&oacute;p của bạn đều được ghi nhận, kh&iacute;ch lệ bằng tinh thần c&ugrave;ng chế độ đ&atilde;i ngộ hấp dẫn, ch&iacute;nh s&aacute;ch ph&uacute;c lợi vượt trội v&agrave; cơ hội thăng tiến r&otilde; r&agrave;ng.</p>\r\n\r\n<p>C&ograve;n chần chờ g&igrave; nữa, tham khảo v&agrave;&nbsp;<strong>ứng tuyển ngay</strong>&nbsp;tại T&igrave;m Việc Nhanh nh&eacute;!</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '2020-07-05__giai-ma-suc-hut-cua-ong-trum-ban-le-vincommerce-hinh-2-270x160.jpg', 1, '2020-07-05 20:48:47', '2020-07-05 20:48:47'),
(10, 1, 'Làm gì khi sếp thường xuyên cáu gắt với bạn?', 'lam-gi-khi-sep-thuong-xuyen-cau-gat-voi-ban', 'Là một nhân viên, chẳng ai muốn bị sếp khó chịu hay cáu gắt cho dù với bất cứ lý do gì đi nữa. Các quản lý thường hay có xu hướng xả cơn bực tức của mình thay vì kìm nén chúng, và dĩ nhiên câu chuyện chẳng mấy vui vẻ này sẽ sớm được lan truyền khắp công ty. Vậy nếu chẳng may trở thành nạn nhân xấu số trong trường hợp này, bạn nên làm gì?', '<h4><strong>Giữ bản th&acirc;n b&igrave;nh tĩnh</strong></h4>\r\n\r\n<p>Trong trường hợp n&agrave;y, việc giữ bản th&acirc;n tuyệt đối b&igrave;nh tĩnh l&agrave; điều rất quan trọng. Nếu kh&ocirc;ng khống chế được cảm x&uacute;c của bản th&acirc;n, bạn rất dễ để mọi chuyện trở n&ecirc;n tồi tệ hơn. Mặc d&ugrave; rất kh&oacute; để thực hiện nhưng bạn c&oacute; thể cố gắng h&iacute;t thở đều, nghĩ đến những chuyện khiến bản th&acirc;n m&igrave;nh vui vẻ, thoải m&aacute;i. Bạn cũng c&oacute; thể tự nhủ với bản th&acirc;n rằng mọi chuyện rồi sẽ ổn, chỉ v&agrave;i ph&uacute;t nữa th&ocirc;i th&igrave; mọi chuyện l&agrave; trở về như b&igrave;nh thường m&agrave; th&ocirc;i. Việc tỏ th&aacute;i độ với một người đang &ldquo;bốc hỏa&rdquo; được cho l&agrave; kh&ocirc;ng kh&ocirc;n ngoan ch&uacute;t n&agrave;o, nhất l&agrave; khi đối phương l&agrave; cấp tr&ecirc;n của m&igrave;nh.</p>\r\n\r\n<p><img alt=\"https://nghenghiep.timviecnhanLàm-gì-khi-sếp-thường-xuyên-cáu-gắt-với-bạn-hình-1.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/L%C3%A0m-g%C3%AC-khi-s%E1%BA%BFp-th%C6%B0%E1%BB%9Dng-xuy%C3%AAn-c%C3%A1u-g%E1%BA%AFt-v%E1%BB%9Bi-b%E1%BA%A1n-h%C3%ACnh-1.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Làm-gì-khi-sếp-thường-xuyên-cáu-gắt-với-bạn-hình-1.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Làm-gì-khi-sếp-thường-xuyên-cáu-gắt-với-bạn-hình-1-300x175.jpg 300w\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Bạn cần cố gắng khống chế cảm x&uacute;c của bản th&acirc;n</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>Hạ thấp giọng n&oacute;i của m&igrave;nh</strong></h4>\r\n\r\n<p>C&oacute; lẽ &iacute;t ai để &yacute; nhưng hầu hết mỗi khi tức giận, nhất l&agrave; khi xảy ra bất đồng hay tranh luận vấn đề g&igrave; đ&oacute;, ch&uacute;ng ta đều c&oacute; xu hướng l&ecirc;n cao giọng. Tuy nhi&ecirc;n, bạn cần ghi nhớ rằng người to tiếng hơn kh&ocirc;ng phải l&agrave; người thắng cuộc. Những l&uacute;c thế n&agrave;y, bạn n&ecirc;n hạ giọng, n&oacute;i chuyện một c&aacute;ch ch&acirc;n th&agrave;nh v&agrave; b&igrave;nh tĩnh. Chẳng mấy chốc sếp sẽ dịu giọng hơn với bạn. Đồng thời bạn cũng n&ecirc;n cố gắng hiểu những lời cấp tr&ecirc;n đang n&oacute;i với m&igrave;nh. Nếu tỏ th&aacute;i độ bất cần v&agrave; kh&ocirc;ng quan t&acirc;m th&igrave; bạn chỉ khiếp cấp tr&ecirc;n trở n&ecirc;n giận dữ hơn m&agrave; th&ocirc;i.</p>\r\n\r\n<h4><strong>Xem x&eacute;t lại bản th&acirc;n</strong></h4>\r\n\r\n<p>Kh&ocirc;ng phải người sếp n&agrave;o cũng soi m&oacute;i để c&aacute;u gắt với nh&acirc;n vi&ecirc;n, đ&ocirc;i khi lỗi lầm l&agrave; thuộc về bạn. Nếu thường xuy&ecirc;n bị sếp la mắng, bạn n&ecirc;n xem x&eacute;t lại bản th&acirc;n m&igrave;nh. Nếu đ&oacute; thật sự l&agrave; sai s&oacute;t của bản th&acirc;n, bạn n&ecirc;n nhận lỗi với sếp v&agrave; cố gắng khắc phục ch&uacute;ng. C&oacute; thể c&oacute; rất nhiều nguy&ecirc;n nh&acirc;n khiến bạn kh&ocirc;ng thể ho&agrave;n th&agrave;nh tốt vai tr&ograve; của m&igrave;nh như: Bạn đang bị qu&aacute; tải, c&aacute;c bộ phận li&ecirc;n quan kh&ocirc;ng hỗ trợ bạn, hoặc đơn giản l&agrave; c&ocirc;ng ty kh&ocirc;ng c&oacute; c&aacute;c chương tr&igrave;nh, c&ocirc;ng cụ để hỗ trợ nh&acirc;n vi&ecirc;n l&agrave;m việc nhanh hơn,&hellip; Tất cả những nguy&ecirc;n nh&acirc;n n&agrave;y, bạn n&ecirc;n thẳng thắn chia sẻ với sếp. Từ đ&oacute; t&igrave;m hướng giải quyết thỏa đ&aacute;ng m&agrave; kh&ocirc;ng l&agrave;m ảnh hưởng đến mối quan hệ giữa bạn v&agrave; cấp tr&ecirc;n.</p>\r\n\r\n<p><img alt=\"Làm-gì-khi-sếp-thường-xuyên-cáu-gắt-với-bạn-hình-ảnh-2.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/L%C3%A0m-g%C3%AC-khi-s%E1%BA%BFp-th%C6%B0%E1%BB%9Dng-xuy%C3%AAn-c%C3%A1u-g%E1%BA%AFt-v%E1%BB%9Bi-b%E1%BA%A1n-h%C3%ACnh-%E1%BA%A3nh-2.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Làm-gì-khi-sếp-thường-xuyên-cáu-gắt-với-bạn-hình-ảnh-2.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Làm-gì-khi-sếp-thường-xuyên-cáu-gắt-với-bạn-hình-ảnh-2-300x175.jpg 300w\" title=\"Làm gì khi sếp thường xuyên cáu gắt với bạn? hình ảnh 2\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Bạn n&ecirc;n xem x&eacute;t lại bản th&acirc;n nếu bị sếp la mắng qu&aacute; nhiều</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>Xem x&eacute;t chuyển sang c&ocirc;ng ty mới</strong></h4>\r\n\r\n<p>Nếu kh&ocirc;ng may bạn phải l&agrave;m việc với một &ocirc;ng chủ suốt ng&agrave;y chỉ biết la mắng nh&acirc;n vi&ecirc;n cho d&ugrave; lỗi kh&ocirc;ng ho&agrave;n to&agrave;n l&agrave; do bạn th&igrave; đ&atilde; đến l&uacute;c bạn n&ecirc;n xem x&eacute;t đến việc chuyển sang một c&ocirc;ng ty mới. Việc bạn cố gồng m&igrave;nh ở lại c&ocirc;ng ty cũ với &aacute;p lực, căng thẳng mỗi khi đối diện với sếp chẳng c&oacute; &iacute;ch g&igrave; cả. Ch&iacute;nh những điều n&agrave;y sẽ l&agrave;m ảnh hưởng xấu đến sức khỏe c&aacute; nh&acirc;n của bạn, đồng thời hiệu suất l&agrave;m việc sẽ giảm đi r&otilde; rệt. Thực tế, chẳng một nh&acirc;n vi&ecirc;n n&agrave;o c&oacute; thể l&agrave;m việc tốt khi suốt ng&agrave;y phải chịu &aacute;p lực từ sếp của m&igrave;nh cả. V&igrave; vậy, nếu c&oacute; thể t&igrave;m được một m&ocirc;i trường l&agrave;m việc tốt hơn, thoải m&aacute;i v&agrave; ph&ugrave; hợp với bạn hơn th&igrave; việc rời đi l&agrave; điều bạn cần c&acirc;n nhắc.</p>\r\n\r\n<p>Thật kh&ocirc;ng vui khi phải ở v&agrave;o t&igrave;nh huống n&agrave;y nhưng với những chia sẻ trong b&agrave;i viết tr&ecirc;n, hy vọng bạn sẽ t&igrave;m được hưởng giải quyết cho m&igrave;nh. H&atilde;y nhớ rằng mọi chuyện đều c&oacute; giới hạn v&agrave; h&atilde;y suy x&eacute;t thật cẩn thận với mỗi quyết định của m&igrave;nh nh&eacute;.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '2020-07-05__lam-gi-khi-sep-thuong-xuyen-cau-gat-voi-ban-hinh-anh-2-270x160.jpg', 1, '2020-07-07 10:32:41', '2020-07-07 10:32:41'),
(11, 1, 'Những lý do khiến nhà tuyển dụng không tuyển được ứng viên', 'nhung-ly-do-khien-nha-tuyen-dung-khong-tuyen-duoc-ung-vien', 'Là một nhà tuyển dụng, việc tuyển được nhân tài cho công ty là nhiệm vụ quan trọng hàng đầu. Thế nhưng có không ít trường hợp, công ty hội tụ đầy đủ các yếu tố như lương cao, phúc lợi tốt… nhưng vẫn không tìm được ứng viên phù hợp. Vậy lý do nằm ở đâu? Các nhà tuyển dụng hãy cùng tham khảo một số lý do được liệt kê dưới đây nhé.', '<h4><strong>Kh&ocirc;ng hiểu r&otilde; mục ti&ecirc;u tuyển dụng</strong></h4>\r\n\r\n<p>Khi l&agrave;m bất cứ việc g&igrave;, việc x&aacute;c định v&agrave; hiểu r&otilde; mục ti&ecirc;u l&agrave; điều v&ocirc; c&ugrave;ng quan trọng. Trước khi bắt đầu tuyển dụng, bạn cần phải x&aacute;c định r&otilde; c&aacute;c vấn đề như: C&ocirc;ng việc n&agrave;y y&ecirc;u cầu kỹ năng g&igrave;? Cần bao nhi&ecirc;u năm kinh nghiệm cho vị tr&iacute; n&agrave;y? Bằng cấp li&ecirc;n quan ứng vi&ecirc;n cần phải c&oacute; l&agrave; g&igrave;?</p>\r\n\r\n<p>Việc l&agrave;m r&otilde; c&aacute;c y&ecirc;u cầu c&ocirc;ng việc v&agrave; kỹ năng, phẩm chất mỗi c&aacute; nh&acirc;n l&agrave; điều rất quan trọng. Đ&acirc;y được xem l&agrave; thước đo để bạn dễ d&agrave;ng đối chiếu khi duyệt hồ sơ. Từ đ&oacute;, bạn c&oacute; thể khoanh v&ugrave;ng được những ứng vi&ecirc;n tiềm năng để đi tiếp v&agrave;o v&ograve;ng phỏng vấn. Thực hiện điều n&agrave;y một c&aacute;ch cẩn thận ngay từ đầu sẽ gi&uacute;p nh&agrave; tuyển dụng tiết kiệm được thời gian v&agrave; dễ d&agrave;ng t&igrave;m được ứng vi&ecirc;n ph&ugrave; hợp với c&ocirc;ng ty.</p>\r\n\r\n<p><img alt=\"Những-lý-do-khiến-nhà-tuyển-dụng-không-tuyển-được-ứng-viên-hình-ảnh-1.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Nh%E1%BB%AFng-l%C3%BD-do-khi%E1%BA%BFn-nh%C3%A0-tuy%E1%BB%83n-d%E1%BB%A5ng-kh%C3%B4ng-tuy%E1%BB%83n-%C4%91%C6%B0%E1%BB%A3c-%E1%BB%A9ng-vi%C3%AAn-h%C3%ACnh-%E1%BA%A3nh-1.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Những-lý-do-khiến-nhà-tuyển-dụng-không-tuyển-được-ứng-viên-hình-ảnh-1.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Những-lý-do-khiến-nhà-tuyển-dụng-không-tuyển-được-ứng-viên-hình-ảnh-1-300x175.jpg 300w\" title=\"Những lý do khiến nhà tuyển dụng không tuyển được ứng viên hình ảnh 1\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>X&aacute;c định r&otilde; mục ti&ecirc;u tuyển dụng l&agrave; việc rất quan trọng</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>Nội dung tin đăng sơ s&agrave;i</strong></h4>\r\n\r\n<p>C&oacute; rất nhiều c&ocirc;ng ty đăng tải th&ocirc;ng tin tuyển dụng rất sơ s&agrave;i, kh&ocirc;ng c&oacute; m&ocirc; tả c&ocirc;ng việc v&agrave; y&ecirc;u cầu r&otilde; r&agrave;ng. Từ đ&oacute; khiến người t&igrave;m việc hiểu lầm v&agrave; hậu quả l&agrave; nh&agrave; tuyển dụng nhận được c&aacute;c CV kh&ocirc;ng chất lượng. B&ecirc;n cạnh đ&oacute;, h&igrave;nh thức tr&igrave;nh b&agrave;y cẩu thả, sai ch&iacute;nh tả trong nội dung tin đăng cũng l&agrave; một nguy&ecirc;n nh&acirc;n khiến ứng vi&ecirc;n bỏ qua bản tin tuyển dụng. V&igrave; vậy, trước khi đăng tải bất kỳ th&ocirc;ng tin tuyển dụng n&agrave;o, bạn cần phải đọc lại thật kỹ để d&ograve; lỗi ch&iacute;nh tả, đồng thời kiểm tra xem th&ocirc;ng tin tuyển dụng đ&atilde; đầy đủ v&agrave; r&otilde; r&agrave;ng hay chưa để tr&aacute;nh c&aacute;c rắc rối kh&ocirc;ng đ&aacute;ng c&oacute; về sau.</p>\r\n\r\n<h4><strong>Tin v&agrave;o những ấn tượng ban đầu</strong></h4>\r\n\r\n<p>Theo Ted Karkus &ndash; CEO của Prophase Labs &ndash; c&ocirc;ng ty chuy&ecirc;n sản xuất vi&ecirc;n ngậm Cold-EEZE th&igrave; nhiều nh&agrave; tuyển dụng thường l&agrave;m việc theo cảm t&iacute;nh. Th&ocirc;ng thường, c&aacute;c nh&agrave; tuyển dụng thường hay đ&aacute;nh gi&aacute; ứng vi&ecirc;n dựa tr&ecirc;n cảm gi&aacute;c của bản th&acirc;n. Việc n&agrave;y c&oacute; ảnh hưởng rất lớn đến kết quả tuyển dụng, c&oacute; nhiều ứng vi&ecirc;n thật sự c&oacute; năng lực nhưng kh&ocirc;ng thể c&oacute; được c&ocirc;ng việc như mong muốn chỉ v&igrave; tr&oacute;t để lại ấn tượng kh&ocirc;ng tốt với c&aacute;c nh&agrave; tuyển dụng. D&ugrave; kh&ocirc;ng thể đảm bảo ứng vi&ecirc;n c&oacute; thể ho&agrave;n th&agrave;nh tố c&aacute;c nhiệm vụ sau khi được tuyển nhưng tốt nhất bạn kh&ocirc;ng n&ecirc;n&nbsp;coi ấn tượng đầu ti&ecirc;n l&agrave; yếu tố ti&ecirc;n quyết để đưa ra quyết định tuyển dụng.</p>\r\n\r\n<p><img alt=\"Những-lý-do-khiến-nhà-tuyển-dụng-không-tuyển-được-ứng-viên-hình-ảnh-2.jpg\" height=\"350\" sizes=\"(max-width: 600px) 100vw, 600px\" src=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Nh%E1%BB%AFng-l%C3%BD-do-khi%E1%BA%BFn-nh%C3%A0-tuy%E1%BB%83n-d%E1%BB%A5ng-kh%C3%B4ng-tuy%E1%BB%83n-%C4%91%C6%B0%E1%BB%A3c-%E1%BB%A9ng-vi%C3%AAn-h%C3%ACnh-%E1%BA%A3nh-2.jpg\" srcset=\"https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Những-lý-do-khiến-nhà-tuyển-dụng-không-tuyển-được-ứng-viên-hình-ảnh-2.jpg 600w, https://www.timviecnhanh.com/goc-nghe-nghiep/wp-content/uploads/2020/05/Những-lý-do-khiến-nhà-tuyển-dụng-không-tuyển-được-ứng-viên-hình-ảnh-2-300x175.jpg 300w\" title=\"Những lý do khiến nhà tuyển dụng không tuyển được ứng viên hình ảnh 2\" width=\"600\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Kh&ocirc;ng n&ecirc;n coi ấn tượng đầu ti&ecirc;n l&agrave; yếu tố ti&ecirc;n quyết để đưa ra quyết định tuyển dụng</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>Kh&ocirc;ng chọn đ&uacute;ng c&aacute;ch để kết nối với người t&igrave;m việc</strong></h4>\r\n\r\n<p>Đ&acirc;y cũng l&agrave; một sai lầm kh&aacute; phổ biến m&agrave; nhiều nh&agrave; tuyển dụng hay mắc phải. Nếu bạn chỉ tiếp cận với ứng vi&ecirc;n th&ocirc;ng qua người quen, bạn b&egrave; hoặc một v&agrave;i k&ecirc;nh rao vặt, website tuyển dụng kh&ocirc;ng chất lượng th&igrave; tỉ lệ tuyển được ứng vi&ecirc;n sẽ rất thấp. Trong khi đ&oacute;, với sự ph&aacute;t triển của c&ocirc;ng nghệ hiện nay, bạn c&oacute; thể khai th&aacute;c c&aacute;c lợi &iacute;ch từ việc tuyển dụng trực tuyến, đặc biệt l&agrave; những website tuyển dụng uy t&iacute;n, chất lượng để t&igrave;m kiếm ứng vi&ecirc;n hiệu quả hơn. Ngo&agrave;i ra, tận dụng c&aacute;c trang mạng x&atilde; hội, c&aacute;c hội nh&oacute;m tr&ecirc;n facebook cũng l&agrave; một k&ecirc;nh hữu hiệu để bạn c&oacute; thể săn được nh&acirc;n t&agrave;i cho c&ocirc;ng ty.</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; một số l&yacute; do khiến c&aacute;c nh&agrave; tuyển dụng kh&oacute; tuyển được ứng vi&ecirc;n. Hy vọng với những chia sẻ ở tr&ecirc;n, bạn sẽ t&igrave;m được cho m&igrave;nh c&aacute;c phương ph&aacute;p tốt nhất cho b&agrave;i to&aacute;n tuyển dụng của m&igrave;nh nh&eacute;.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', 'ae80f69d980dbb8d9fe7587f6190616b_.jpg', 1, '2020-07-07 10:33:21', '2020-07-07 10:47:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_notification`
--

CREATE TABLE `admin_notification` (
  `id` int(11) NOT NULL,
  `no_check` int(11) DEFAULT NULL COMMENT 'User or Employer',
  `no_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_active` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `ch_to` int(11) NOT NULL,
  `ch_from` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `ch_read` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chat`
--

INSERT INTO `chat` (`id`, `ch_to`, `ch_from`, `message`, `ch_read`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'aaa', 1, '2020-06-28 00:00:00', '2020-06-30 10:05:53'),
(2, 2, 1, 'bbb', 1, '2020-06-28 00:00:00', '2020-06-28 00:00:00'),
(5, 1, 3, 'Xin chào các bạn', 1, '2020-06-28 14:52:59', '2020-06-29 14:57:40'),
(86, 2, 1, 'no', 0, '2020-06-30 10:05:56', '2020-06-30 10:05:56'),
(87, 2, 1, 'zed', 0, '2020-06-30 10:13:18', '2020-06-30 10:13:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `ra_user_id` int(11) DEFAULT NULL,
  `ra_employer_id` int(11) DEFAULT NULL,
  `ra_parent_id` int(11) DEFAULT NULL,
  `ra_article_id` int(11) DEFAULT NULL,
  `ra_content` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `ra_user_id`, `ra_employer_id`, `ra_parent_id`, `ra_article_id`, `ra_content`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, NULL, 1, 'Bài viết rất bổ ích', '2020-07-07 10:35:18', '2020-07-07 10:35:18'),
(2, 1, NULL, 1, 1, 'Tuyệt vời', '2020-07-07 10:38:16', '2020-07-07 10:38:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `co_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `co_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `co_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `co_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `co_name`, `co_phone`, `co_email`, `co_content`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn An', '0326621502', 'nguyenan.2502@gmail.com', 'Website rất tốt', '2020-05-21 20:47:34', '2020-05-21 20:47:34'),
(2, 'Nguyễn Văn An', '0326621502', 'nguyenan.2502@gmail.com', 'Help me !', '2020-07-01 15:04:35', '2020-07-01 15:04:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employers`
--

CREATE TABLE `employers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `em_phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `em_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `em_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `em_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tên công ty',
  `em_scale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Quy mô nhân sự',
  `em_description` text COLLATE utf8mb4_unicode_ci COMMENT 'Sơ lược công ty',
  `em_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tên website',
  `em_contact_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Hình thức liên hệ',
  `em_vip` int(11) DEFAULT '0' COMMENT 'Quảng bá thương hiệu',
  `em_timevip` datetime DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1' COMMENT 'Khóa tk',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employers`
--

INSERT INTO `employers` (`id`, `name`, `email`, `password`, `em_phone`, `em_address`, `em_avatar`, `em_company`, `em_scale`, `em_description`, `em_website`, `em_contact_type`, `em_vip`, `em_timevip`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Tuyen dung 1', 'tuyendung1@gmail.com', '$2y$10$TMRZvetIFzNRkK1LvDs3vOJon/D4qkqJdY60veI53EvAv6aO27Kwe', '0987654321', '24 Nguyễn Văn Bảo Gò Vấp Tp Hồ Chí Minh', '5def459e577f2dbd68dbd1abdead3bac_emplogo1.jpg', 'Cyber Logitech', 'Dưới 20 người', 'Ko co', 'tuyendung1@gmail.com', 'Mọi hình thức', 0, '2020-07-17 14:30:59', 1, '2020-07-13 21:19:43', '2020-07-25 16:08:42'),
(2, 'Tuyển dụng 2', 'tuyendung2@gmail.com', '$2y$10$3uAZKEqpXUGdyukODSCNOONGNQir41Rw6enEKqPqzwsWAn6Tnhfvu', '134456342', '522', '31d4c9413dd8e7c9eb6796995faa8fb6_cv.png', 'r323', 'Dưới 20 người', NULL, 'tuyendung2@gmail.com', NULL, 1, '2020-07-28 11:03:50', 1, '2020-07-18 12:29:40', '2020-07-18 12:29:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employer_map`
--

CREATE TABLE `employer_map` (
  `id` int(11) NOT NULL,
  `ma_employer_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employer_map`
--

INSERT INTO `employer_map` (`id`, `ma_employer_id`, `address`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 1, '24 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh, Việt Nam', 10.8232662, 106.6860602, '2020-07-13 12:34:07', '2020-07-13 12:34:07'),
(2, 1, 'Chung Cư Hưng Ngân, Dương Thị Mười, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh, Việt Nam', 10.8585859, 106.6310413, '2020-07-13 11:59:57', '2020-07-13 11:59:57'),
(6, 1, '1 Quang Trung, Phường 3, Gò Vấp, Hồ Chí Minh, Việt Nam', 10.8264452, 106.6789759, '2020-07-14 16:11:11', '2020-07-14 16:11:11'),
(7, 1, '1 Tran Hung Dao', NULL, NULL, '2020-07-14 21:32:15', '2020-07-14 21:32:15'),
(8, 2, '24 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh, Việt Nam', NULL, NULL, '2020-07-18 12:29:48', '2020-07-18 12:29:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employer_profile`
--

CREATE TABLE `employer_profile` (
  `id` int(11) NOT NULL,
  `pr_employer_id` int(11) NOT NULL,
  `pr_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tiêu đề',
  `pr_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pr_quantity` int(11) DEFAULT NULL COMMENT 'số lượng người',
  `pr_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Giới tính',
  `pr_description` text COLLATE utf8mb4_unicode_ci COMMENT 'Mô tả công việc',
  `pr_skill` text COLLATE utf8mb4_unicode_ci COMMENT 'Yêu cầu công việc',
  `pr_attribute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tính chất công việc',
  `pr_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Trình độ',
  `pr_experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Kinh nghiệm',
  `pr_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mức lương',
  `pr_work_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Hình thức làm việc',
  `pr_probation_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Thời gian thử việc',
  `pr_benefit` text COLLATE utf8mb4_unicode_ci COMMENT 'Quyền lợi',
  `pr_career` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ngành nghề chính',
  `pr_career_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ngành nghề phụ',
  `pr_provinces` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Nơi làm việc',
  `pr_expired_at` date DEFAULT NULL COMMENT 'Hết hạn',
  `pr_view_count` int(11) NOT NULL DEFAULT '0',
  `pr_status` int(11) NOT NULL DEFAULT '1' COMMENT 'Hiển thị bài đăng',
  `pr_active` int(11) NOT NULL DEFAULT '0' COMMENT 'Duyệt hồ sơ',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employer_profile`
--

INSERT INTO `employer_profile` (`id`, `pr_employer_id`, `pr_title`, `pr_slug`, `pr_quantity`, `pr_gender`, `pr_description`, `pr_skill`, `pr_attribute`, `pr_level`, `pr_experience`, `pr_salary`, `pr_work_time`, `pr_probation_time`, `pr_benefit`, `pr_career`, `pr_career_2`, `pr_provinces`, `pr_expired_at`, `pr_view_count`, `pr_status`, `pr_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tuyển dụng 1', 'tuyen-dung-1', 1, 'Không yêu cầu', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', 'Giờ hành chính', 'Đại học', 'Chưa có kinh nghiệm', '15-20 triệu', 'Nhân viên chính thức', 'Nhận việc ngay', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', 'Bán hàng', 'Bán hàng', 'Hà Nội', '2020-08-11', 7, 1, 0, '2020-07-13 12:34:07', '2020-07-25 16:08:42'),
(2, 1, 'Tuyển dụng 2', 'tuyen-dung-2', 1, 'Không yêu cầu', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', 'Giờ hành chính', 'Đại học', 'Chưa có kinh nghiệm', '15-20 triệu', 'Nhân viên chính thức', 'Nhận việc ngay', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', 'Bán hàng', 'Bán hàng', 'Hà Nội', '2020-07-15', 4, 1, 0, '2020-07-13 11:59:57', '2020-07-25 16:08:42'),
(6, 1, 'Tuyển dụng 1', 'tuyen-dung-1', 1, 'Không yêu cầu', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', 'Giờ hành chính', 'Đại học', 'Chưa có kinh nghiệm', '15-20 triệu', 'Nhân viên chính thức', 'Nhận việc ngay', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', 'Bán hàng', 'Bán hàng', 'Hà Nội', '2020-07-15', 0, 1, 0, '2020-07-14 16:11:11', '2020-07-25 16:08:42'),
(7, 1, 'Tuyển dụng 4', 'tuyen-dung-4', 1, 'Không yêu cầu', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', 'Giờ hành chính', 'Đại học', 'Chưa có kinh nghiệm', '15-20 triệu', 'Nhân viên chính thức', 'Nhận việc ngay', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', 'Bán hàng', 'Bán hàng', 'Hà Nội', '2020-07-15', 0, 1, 0, '2020-07-14 21:32:15', '2020-07-25 16:08:42'),
(8, 2, 'Tuyển dụng 1', 'tuyen-dung-1', 1, 'Không yêu cầu', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', 'Giờ hành chính', 'Đại học', 'Chưa có kinh nghiệm', '15-20 triệu', 'Nhân viên chính thức', 'Nhận việc ngay', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>', 'Bán hàng', 'Bán hàng', 'Hà Nội', '2020-08-17', 0, 1, 1, '2020-07-18 12:29:48', '2020-07-18 12:30:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employer_saveprofile`
--

CREATE TABLE `employer_saveprofile` (
  `id` int(11) NOT NULL,
  `sa_employer_id` int(11) NOT NULL,
  `sa_profile_id` int(11) NOT NULL,
  `sa_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên hồ sơ',
  `sa_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên người tìm việc',
  `sa_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Trình độ',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioi_tinh`
--

CREATE TABLE `gioi_tinh` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gioi_tinh`
--

INSERT INTO `gioi_tinh` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nam', '2020-04-02 22:16:10', '0000-00-00 00:00:00'),
(2, 'Nữ', '2020-04-02 22:16:15', '0000-00-00 00:00:00'),
(3, 'Giới tính khác', '2020-04-02 22:16:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kinh_nghiem`
--

CREATE TABLE `kinh_nghiem` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kinh_nghiem`
--

INSERT INTO `kinh_nghiem` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Chưa có kinh nghiệm', '2020-04-02 22:19:43', '0000-00-00 00:00:00'),
(2, 'Dưới 1 Năm', '2020-04-02 22:19:53', '0000-00-00 00:00:00'),
(3, '1 Năm', '2020-04-02 22:20:03', '0000-00-00 00:00:00'),
(4, '2 Năm', '2020-04-02 22:20:12', '0000-00-00 00:00:00'),
(5, '3 Năm', '2020-04-02 22:20:21', '0000-00-00 00:00:00'),
(6, '4 Năm', '2020-04-02 22:20:31', '0000-00-00 00:00:00'),
(7, '5 Năm', '2020-04-02 22:20:50', '0000-00-00 00:00:00'),
(8, 'Trên 5 Năm', '2020-04-02 22:21:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muc_luong`
--

CREATE TABLE `muc_luong` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `muc_luong`
--

INSERT INTO `muc_luong` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dưới 3 triệu', '2020-04-02 22:04:30', '0000-00-00 00:00:00'),
(2, '3-5 triệu', '2020-04-02 22:05:19', '0000-00-00 00:00:00'),
(3, '5-7 triệu', '2020-04-02 22:05:28', '0000-00-00 00:00:00'),
(4, '7-10 triệu', '2020-04-02 22:05:38', '0000-00-00 00:00:00'),
(5, '10-12 triệu', '2020-04-02 22:05:48', '0000-00-00 00:00:00'),
(6, '12-15 triệu', '2020-04-02 22:05:58', '0000-00-00 00:00:00'),
(7, '15-20 triệu', '2020-04-02 22:06:07', '0000-00-00 00:00:00'),
(8, '20-25 triệu', '2020-04-02 22:06:16', '0000-00-00 00:00:00'),
(9, '25-30 triệu', '2020-04-02 22:06:27', '0000-00-00 00:00:00'),
(10, '30-40 triệu', '2020-04-02 22:06:40', '0000-00-00 00:00:00'),
(11, '40-50 triệu', '2020-04-02 22:06:52', '0000-00-00 00:00:00'),
(12, 'Trên 50 triệu', '2020-04-02 22:07:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `or_transaction_id` int(11) NOT NULL,
  `or_name_id` int(11) NOT NULL,
  `or_qty` int(11) NOT NULL,
  `or_price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `or_transaction_id`, `or_name_id`, `or_qty`, `or_price`, `created_at`, `updated_at`) VALUES
(24, 35, 1, 2, 10000, '2020-07-07 14:30:59', '2020-07-07 14:30:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `price_list`
--

CREATE TABLE `price_list` (
  `id` int(11) NOT NULL,
  `pri_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pri_price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `price_list`
--

INSERT INTO `price_list` (`id`, `pri_name`, `pri_price`, `created_at`, `updated_at`) VALUES
(1, 'Hiển thị hồ sơ lên website', 10000, '2020-03-18 12:28:03', '2020-03-18 12:28:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `tr_employer_id` int(11) NOT NULL,
  `tr_total` int(11) DEFAULT NULL,
  `tr_note` text COLLATE utf8mb4_unicode_ci,
  `tr_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tr_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `tr_employer_id`, `tr_total`, `tr_note`, `tr_address`, `tr_phone`, `tr_status`, `tr_username`, `tr_email`, `tr_payment`, `created_at`, `updated_at`) VALUES
(35, 1, 20000, 'Thanh toan hoa don', '24 Nguyễn Văn Bảo Gò Vấp Tp Hồ Chí Minh', '0987654321', '0', 'Tuyen dung 1', 'tuyendung1@gmail.com', 'NCB', '2020-07-07 14:30:59', '2020-07-07 14:30:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinh_do`
--

CREATE TABLE `trinh_do` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trinh_do`
--

INSERT INTO `trinh_do` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Đại học', '2020-04-02 22:11:29', '0000-00-00 00:00:00'),
(2, 'Cao đẳng', '2020-04-02 22:11:39', '0000-00-00 00:00:00'),
(3, 'Trung cấp', '2020-04-02 22:11:49', '0000-00-00 00:00:00'),
(4, 'Cao học', '2020-04-02 22:11:57', '0000-00-00 00:00:00'),
(5, 'Trung học', '2020-04-02 22:12:08', '0000-00-00 00:00:00'),
(6, 'Chứng chỉ', '2020-04-02 22:12:19', '0000-00-00 00:00:00'),
(7, 'Lao động phổ thông', '2020-04-02 22:12:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'hien thi',
  `active` int(11) NOT NULL DEFAULT '1' COMMENT 'admin khoa tk',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `provider`, `provider_id`, `password`, `phone`, `birthday`, `gender`, `address`, `avatar`, `remember_token`, `status`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn An', 'nguyenan.250298@gmail.com', NULL, NULL, NULL, '$2y$10$Lcn87oTL.l1NLHV6jSEzh.26HMAfI46dSBhrD8eCQ103ueOScHqMq', '0326621502', '2020-07-05', 'Nam', '24 Nguyễn Văn Bảo, Gò Vấp, Tp Hồ Chí Minh', '46f9905d8234aff410dfca2cda23865d_bun1.jpg', NULL, 0, 1, '2020-07-05 22:45:51', '2020-07-05 22:45:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_applied`
--

CREATE TABLE `user_applied` (
  `id` int(11) NOT NULL,
  `ap_user_id` int(11) NOT NULL,
  `ap_hoso_id` int(11) NOT NULL COMMENT 'hồ sơ tìm việc',
  `ap_profile_id` int(11) NOT NULL COMMENT 'hồ sơ nhà tuyển dụng',
  `ap_employer_id` int(11) NOT NULL,
  `ap_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tiêu đề tin tuyển dụng',
  `ap_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Công ty',
  `ap_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên nhà tuyển dụng',
  `ap_career` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nghề nghiệp yêu cầu',
  `ap_provinces` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_status` int(11) NOT NULL DEFAULT '0',
  `ap_expired_at` datetime DEFAULT NULL COMMENT 'Hạn của bài tuyển dụng',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_degree`
--

CREATE TABLE `user_degree` (
  `id` int(11) NOT NULL,
  `de_user_id` int(11) NOT NULL,
  `de_level_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Trình độ',
  `de_school_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Đơn vị đào tạo',
  `de_year_from_1` int(11) DEFAULT NULL COMMENT 'Năm bắt đầu',
  `de_year_to_1` int(11) DEFAULT NULL COMMENT 'Năm kết thúc',
  `de_diploma_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Chuyên ngành',
  `de_loai_tn_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Loại tốt nghiệp',
  `de_level_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `de_school_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `de_year_from_2` int(11) DEFAULT NULL,
  `de_year_to_2` int(11) DEFAULT NULL,
  `de_diploma_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `de_loai_tn_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Trình độ';

--
-- Đang đổ dữ liệu cho bảng `user_degree`
--

INSERT INTO `user_degree` (`id`, `de_user_id`, `de_level_1`, `de_school_1`, `de_year_from_1`, `de_year_to_1`, `de_diploma_1`, `de_loai_tn_1`, `de_level_2`, `de_school_2`, `de_year_from_2`, `de_year_to_2`, `de_diploma_2`, `de_loai_tn_2`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 10:13:11', '2020-07-06 10:13:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_experience`
--

CREATE TABLE `user_experience` (
  `id` int(11) NOT NULL,
  `ex_user_id` int(11) DEFAULT NULL,
  `ex_company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Công ty',
  `ex_position_exp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Chức danh',
  `ex_month_from` int(11) DEFAULT NULL COMMENT 'Tháng bắt đầu',
  `ex_year_from` int(11) DEFAULT NULL COMMENT 'Năm bắt đầu',
  `ex_month_to` int(11) DEFAULT NULL COMMENT 'Tháng kết thúc',
  `ex_year_to` int(11) DEFAULT NULL COMMENT 'Năm kết thúc',
  `ex_current_salary` int(11) DEFAULT NULL COMMENT 'Mức lương',
  `ex_description` text COLLATE utf8mb4_unicode_ci COMMENT 'Mô tả công việc',
  `ex_achieve` text COLLATE utf8mb4_unicode_ci COMMENT 'Thành tích đạt được',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Kinh nghiệm làm việc';

--
-- Đang đổ dữ liệu cho bảng `user_experience`
--

INSERT INTO `user_experience` (`id`, `ex_user_id`, `ex_company_name`, `ex_position_exp`, `ex_month_from`, `ex_year_from`, `ex_month_to`, `ex_year_to`, `ex_current_salary`, `ex_description`, `ex_achieve`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 10:13:11', '2020-07-06 10:13:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_generalinfo`
--

CREATE TABLE `user_generalinfo` (
  `id` int(11) NOT NULL,
  `ge_user_id` int(11) NOT NULL,
  `ge_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên hồ sơ',
  `ge_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ge_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Trình độ cao nhất',
  `ge_experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số năm kinh nghiệm',
  `ge_position_current` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Cấp bậc hiện tại',
  `ge_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Cấp bậc mong muốn',
  `ge_profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ngành nghề mong muốn',
  `ge_salary_min` int(11) NOT NULL COMMENT 'Mức lương tối thiểu',
  `ge_provinces` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nơi làm việc mong muốn',
  `ge_career` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mục tiêu nghề nghiệp',
  `ge_status` int(11) NOT NULL DEFAULT '0',
  `ge_active` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Thông tin chung';

--
-- Đang đổ dữ liệu cho bảng `user_generalinfo`
--

INSERT INTO `user_generalinfo` (`id`, `ge_user_id`, `ge_title`, `ge_slug`, `ge_level`, `ge_experience`, `ge_position_current`, `ge_position`, `ge_profession`, `ge_salary_min`, `ge_provinces`, `ge_career`, `ge_status`, `ge_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hồ sơ 1', 'ho-so-1', 'Lao động phổ thông', 'Trên 5 Năm', 'Quản lý cấp cao', 'Quản lý cấp cao', 'Bán hàng', 10000000, 'Hà Nội', '<p>&bull; Mong muốn t&igrave;m được chỗ l&agrave;m ổn định l&acirc;u d&agrave;i để gắn b&oacute;.</p>\r\n\r\n<p>&bull; Mong muốn t&igrave;m được chỗ l&agrave;m c&oacute; cơ hội thăng tiến tốt, c&oacute; nhiều cơ hội để ph&aacute;t triển.</p>\r\n\r\n<p>&bull; Mong muốn t&igrave;m được nơi c&oacute; cơ hội cống hiến bản th&acirc;n tốt.</p>\r\n\r\n<p>&bull; Mức lương ph&ugrave; hợp với năng lực v&agrave; kinh nghiệm bản th&acirc;n</p>', 1, 1, '2020-07-06 10:13:11', '2020-07-07 10:12:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_job`
--

CREATE TABLE `user_job` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_job`
--

INSERT INTO `user_job` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Bán hàng', 'ban-hang', '2020-03-25 23:20:18', '2020-03-25 23:20:18'),
(2, 'Tài chính, Kế toán, Kiểm toán', 'tai-chinh-ke-toan-kiem-toan', '2020-04-04 10:19:57', '2020-04-04 10:19:57'),
(3, 'Hành chính, Thư ký, Trợ lý', 'hanh-chinh-thu-ky-tro-ly', '2020-04-04 10:20:07', '2020-04-04 10:20:07'),
(4, 'Kinh doanh', 'kinh-doanh', '2020-03-25 23:20:44', '2020-03-25 23:20:44'),
(5, 'Thời vụ, Bán thời gian', 'thoi-vu-ban-thoi-gian', '2020-04-04 10:23:06', '2020-04-04 10:23:06'),
(6, 'Chăm sóc khách hàng', 'cham-soc-khach-hang', '2020-03-25 23:20:52', '2020-03-25 23:20:52'),
(7, 'Điện, Điện tử, Điện lạnh', 'dien-dien-tu-dien-lanh', '2020-04-04 10:20:19', '2020-04-04 10:20:19'),
(8, 'Giáo dục, Đào tạo, Thư viện', 'giao-duc-dao-tao-thu-vien', '2020-04-04 10:18:50', '2020-04-04 10:18:50'),
(9, 'Nhân sự', 'nhan-su', '2020-03-25 23:21:09', '2020-03-25 23:21:09'),
(10, 'Báo chí, Biên tập viên', 'bao-chi-bien-tap-vien', '2020-04-04 10:20:54', '2020-04-04 10:20:54'),
(11, 'Bảo vệ, Vệ sĩ, An ninh', 'bao-ve-ve-si-an-ninh', '2020-04-04 10:20:32', '2020-04-04 10:20:32'),
(12, 'Bất động sản', 'bat-dong-san', '2020-03-25 23:21:29', '2020-03-25 23:21:29'),
(13, 'Biên dịch, Phiên dịch', 'bien-dich-phien-dich', '2020-04-04 10:20:42', '2020-04-04 10:20:42'),
(14, 'Bưu chính viễn thông', 'buu-chinh-vien-thong', '2020-03-25 23:21:41', '2020-03-25 23:21:41'),
(15, 'Cơ khí, Kĩ thuật ứng dụng', 'co-khi-ki-thuat-ung-dung', '2020-04-04 10:21:05', '2020-04-04 10:21:05'),
(16, 'Công nghệ thông tin', 'cong-nghe-thong-tin', '2020-03-25 23:23:59', '2020-03-25 23:23:59'),
(17, 'Dầu khí, Địa chất', 'dau-khi-dia-chat', '2020-04-04 10:21:14', '2020-04-04 10:21:14'),
(18, 'Dệt may', 'det-may', '2020-03-25 23:24:18', '2020-03-25 23:24:18'),
(19, 'Du lịch, Nhà hàng, Khách sạn', 'du-lich-nha-hang-khach-san', '2020-04-04 10:21:25', '2020-04-04 10:21:25'),
(20, 'Dược, Hóa chất, Sinh hóa', 'duoc-hoa-chat-sinh-hoa', '2020-04-04 10:21:58', '2020-04-04 10:21:58'),
(21, 'Giải trí, Vui chơi', 'giai-tri-vui-choi', '2020-04-04 10:22:09', '2020-04-04 10:22:09'),
(22, 'Giao thông, Vận tải, Thủy lợi, Cầu đường', 'giao-thong-van-tai-thuy-loi-cau-duong', '2020-04-04 10:22:22', '2020-04-04 10:22:22'),
(23, 'Giày da, Thuộc da', 'giay-da-thuoc-da', '2020-04-04 10:22:32', '2020-04-04 10:22:32'),
(24, 'Kho vận, Vật tư, Thu mua', 'kho-van-vat-tu-thu-mua', '2020-04-04 10:22:46', '2020-04-04 10:22:46'),
(25, 'Khu chế xuất, Khu công nghiệp', 'khu-che-xuat-khu-cong-nghiep', '2020-04-04 10:23:42', '2020-04-04 10:23:42'),
(26, 'Kiến trúc, Nội thất', 'kien-truc-noi-that', '2020-04-04 10:22:57', '2020-04-04 10:22:57'),
(27, 'Làm đẹp, Thể lực, Spa', 'lam-dep-the-luc-spa', '2020-04-04 10:23:28', '2020-04-04 10:23:28'),
(28, 'Lao động phổ thông', 'lao-dong-pho-thong', '2020-03-25 23:26:59', '2020-03-25 23:26:59'),
(29, 'Luật, Pháp lý', 'luat-phap-ly', '2020-04-11 11:19:17', '2020-04-11 11:19:17'),
(30, 'Môi trường, Xử lý chất thải', 'moi-truong-xu-ly-chat-thai', '2020-04-04 10:23:52', '2020-04-04 10:23:52'),
(31, 'Mỹ phẩm, Thời trang, Trang sức', 'my-pham-thoi-trang-trang-suc', '2020-04-04 10:23:17', '2020-04-04 10:23:17'),
(32, 'Ngân hàng, Chứng khoán, Đầu tư', 'ngan-hang-chung-khoan-dau-tu', '2020-04-04 10:26:17', '2020-04-04 10:26:17'),
(33, 'Nghệ thuật, Điện ảnh', 'nghe-thuat-dien-anh', '2020-04-04 10:26:26', '2020-04-04 10:26:26'),
(34, 'Ngoại ngữ', 'ngoai-ngu', '2020-03-25 23:28:21', '2020-03-25 23:28:21'),
(35, 'Nông, Lâm, Ngư nghiệp', 'nong-lam-ngu-nghiep', '2020-04-04 10:24:05', '2020-04-04 10:24:05'),
(36, 'PG, PB, Lễ tân', 'pg-pb-le-tan', '2020-04-04 10:24:17', '2020-04-04 10:24:17'),
(37, 'Phát triển thị trường', 'phat-trien-thi-truong', '2020-03-25 23:28:48', '2020-03-25 23:28:48'),
(38, 'Phục vụ, Tạp vụ, Giúp việc', 'phuc-vu-tap-vu-giup-viec', '2020-04-04 10:24:28', '2020-04-04 10:24:28'),
(39, 'Quan hệ đối ngoại', 'quan-he-doi-ngoai', '2020-03-25 23:29:09', '2020-03-25 23:29:09'),
(40, 'Quản lý điều hành', 'quan-ly-dieu-hanh', '2020-03-25 23:29:20', '2020-03-25 23:29:20'),
(41, 'Quảng cáo, Marketing, PR', 'quang-cao-marketing-pr', '2020-04-04 10:24:41', '2020-04-04 10:24:41'),
(42, 'Sản xuất, Vận hành sản xuất', 'san-xuat-van-hanh-san-xuat', '2020-04-04 10:24:49', '2020-04-04 10:24:49'),
(43, 'Sinh viên, Mới tốt nghiệp, Thực tập', 'sinh-vien-moi-tot-nghiep-thuc-tap', '2020-04-04 10:25:00', '2020-04-04 10:25:00'),
(44, 'Tài xế, Lái xe, Giao nhận', 'tai-xe-lai-xe-giao-nhan', '2020-04-04 10:25:10', '2020-04-04 10:25:10'),
(45, 'Thẩm định, Giám định, Quản lý chất lượng', 'tham-dinh-giam-dinh-quan-ly-chat-luong', '2020-04-04 10:25:43', '2020-04-04 10:25:43'),
(46, 'Thể dục, Thể thao', 'the-duc-the-thao', '2020-04-04 10:25:22', '2020-04-04 10:25:22'),
(47, 'Thiết kế, Mỹ thuật', 'thiet-ke-my-thuat', '2020-04-04 10:25:31', '2020-04-04 10:25:31'),
(48, 'Thực phẩm, DV ăn uống', 'thuc-pham-dv-an-uong', '2020-04-04 10:26:02', '2020-04-04 10:26:02'),
(49, 'Trang thiết bị công nghiệp', 'trang-thiet-bi-cong-nghiep', '2020-03-25 23:31:53', '2020-03-25 23:31:53'),
(50, 'Trang thiết bị gia dụng', 'trang-thiet-bi-gia-dung', '2020-03-25 23:32:01', '2020-03-25 23:32:01'),
(51, 'Trang thiết bị văn phòng', 'trang-thiet-bi-van-phong', '2020-03-25 23:32:09', '2020-03-25 23:32:09'),
(52, 'Tư vấn bảo hiểm', 'tu-van-bao-hiem', '2020-03-25 23:32:17', '2020-03-25 23:32:17'),
(53, 'Xây dựng', 'xay-dung', '2020-03-25 23:32:25', '2020-03-25 23:32:25'),
(54, 'Xuất-Nhập khẩu, Ngoại thương', 'xuat-nhap-khau-ngoai-thuong', '2020-04-04 10:25:52', '2020-04-04 10:25:52'),
(55, 'Y tế', 'y-te', '2020-03-25 23:32:59', '2020-03-25 23:32:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_language`
--

CREATE TABLE `user_language` (
  `id` int(11) NOT NULL,
  `la_user_id` int(11) NOT NULL,
  `la_language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ngoại ngữ',
  `la_language_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Trình độ',
  `la_listen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Nghe',
  `la_speak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Nói',
  `la_read` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Đọc',
  `la_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Viết',
  `la_word` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `la_powerpoint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `la_excel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `la_outlook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `la_other_skill` text COLLATE utf8mb4_unicode_ci,
  `la_special_achieve` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Ngoại ngữ';

--
-- Đang đổ dữ liệu cho bảng `user_language`
--

INSERT INTO `user_language` (`id`, `la_user_id`, `la_language`, `la_language_level`, `la_listen`, `la_speak`, `la_read`, `la_write`, `la_word`, `la_powerpoint`, `la_excel`, `la_outlook`, `la_other_skill`, `la_special_achieve`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 10:13:11', '2020-07-06 10:13:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_provinces`
--

CREATE TABLE `user_provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_provinces`
--

INSERT INTO `user_provinces` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Hà Nội', 'ha-noi', '2020-04-11 11:27:03', '0000-00-00 00:00:00'),
(2, 'Hà Giang', 'ha-giang', '2020-04-11 11:27:12', '0000-00-00 00:00:00'),
(3, 'Cao Bằng', 'cao-bang', '2020-04-11 11:27:20', '0000-00-00 00:00:00'),
(4, 'Bắc Kạn', 'bac-kan', '2020-04-11 11:27:31', '0000-00-00 00:00:00'),
(5, 'Tuyên Quang', 'tuyen-quang', '2020-04-11 11:27:42', '0000-00-00 00:00:00'),
(6, 'Lào Cai', 'lao-cai', '2020-04-11 11:27:58', '0000-00-00 00:00:00'),
(7, 'Điện Biên', 'dien-bien', '2020-04-11 11:28:07', '0000-00-00 00:00:00'),
(8, 'Lai Châu', 'lai-chau', '2020-04-11 11:28:17', '0000-00-00 00:00:00'),
(9, 'Sơn La', 'son-la', '2020-04-11 11:28:25', '0000-00-00 00:00:00'),
(10, 'Yên Bái', 'yen-bai', '2020-04-11 11:28:34', '0000-00-00 00:00:00'),
(11, 'Hoà Bình', 'hoa-binh', '2020-04-11 11:29:02', '0000-00-00 00:00:00'),
(12, 'Thái Nguyên', 'thai-nguyen', '2020-04-11 11:29:11', '0000-00-00 00:00:00'),
(13, 'Lạng Sơn', 'lang-son', '2020-04-11 11:29:22', '0000-00-00 00:00:00'),
(14, 'Quảng Ninh', 'quang-ninh', '2020-04-11 14:56:33', '0000-00-00 00:00:00'),
(15, 'Bắc Giang', 'bac-giang', '2020-04-11 14:56:43', '0000-00-00 00:00:00'),
(16, 'Phú Thọ', 'phu-tho', '2020-04-11 14:56:52', '0000-00-00 00:00:00'),
(17, 'Vĩnh Phúc', 'vinh-phuc', '2020-04-11 14:57:01', '0000-00-00 00:00:00'),
(18, 'Bắc Ninh', 'bac-ninh', '2020-04-11 14:57:11', '0000-00-00 00:00:00'),
(19, 'Hải Dương', 'hai-duong', '2020-04-11 14:57:22', '0000-00-00 00:00:00'),
(20, 'Hải Phòng', 'hai-phong', '2020-04-11 14:57:33', '0000-00-00 00:00:00'),
(21, 'Hưng Yên', 'hung-yen', '2020-04-11 14:57:43', '0000-00-00 00:00:00'),
(22, 'Thái Bình', 'thai-binh', '2020-04-11 14:57:53', '0000-00-00 00:00:00'),
(23, 'Hà Nam', 'ha-nam', '2020-04-11 14:58:01', '0000-00-00 00:00:00'),
(24, 'Nam Định', 'nam-dinh', '2020-04-11 14:58:10', '0000-00-00 00:00:00'),
(25, 'Ninh Bình', 'ninh-binh', '2020-04-11 14:58:19', '0000-00-00 00:00:00'),
(26, 'Thanh Hóa', 'thanh-hoa', '2020-04-11 14:58:39', '0000-00-00 00:00:00'),
(27, 'Nghệ An', 'nghe-an', '2020-04-11 14:58:49', '0000-00-00 00:00:00'),
(28, 'Hà Tĩnh', 'ha-tinh', '2020-04-11 14:58:57', '0000-00-00 00:00:00'),
(29, 'Quảng Bình', 'quang-binh', '2020-04-11 14:59:09', '0000-00-00 00:00:00'),
(30, 'Quảng Trị', 'quang-tri', '2020-04-11 14:59:18', '0000-00-00 00:00:00'),
(31, 'Thừa Thiên Huế', 'thua-thien-hue', '2020-04-11 14:59:35', '0000-00-00 00:00:00'),
(32, 'Đà Nẵng', 'da-nang', '2020-04-11 14:59:43', '0000-00-00 00:00:00'),
(33, 'Quảng Nam', 'quang-nam', '2020-04-11 14:59:53', '0000-00-00 00:00:00'),
(34, 'Quảng Ngãi', 'quang-ngai', '2020-04-11 15:00:04', '0000-00-00 00:00:00'),
(35, 'Bình Định', 'binh-dinh', '2020-04-11 15:00:13', '0000-00-00 00:00:00'),
(36, 'Phú Yên', 'phu-yen', '2020-04-11 15:00:22', '0000-00-00 00:00:00'),
(37, 'Khánh Hòa', 'khanh-hoa', '2020-04-11 15:00:32', '0000-00-00 00:00:00'),
(38, 'Ninh Thuận', 'ninh-thuan', '2020-04-11 15:00:42', '0000-00-00 00:00:00'),
(39, 'Bình Thuận', 'binh-thuan', '2020-04-11 15:00:52', '0000-00-00 00:00:00'),
(40, 'Kon Tum', 'kon-tum', '2020-04-11 15:01:01', '0000-00-00 00:00:00'),
(41, 'Gia Lai', 'gia-lai', '2020-04-11 15:01:10', '0000-00-00 00:00:00'),
(42, 'Đắk Lắk', 'dak-lak', '2020-04-11 15:01:21', '0000-00-00 00:00:00'),
(43, 'Đắk Nông', 'dak-nong', '2020-04-11 15:01:31', '0000-00-00 00:00:00'),
(44, 'Lâm Đồng', 'lam-dong', '2020-04-11 15:01:41', '0000-00-00 00:00:00'),
(45, 'Bình Phước', 'binh-phuoc', '2020-04-11 15:01:53', '0000-00-00 00:00:00'),
(46, 'Tây Ninh', 'tay-ninh', '2020-04-11 15:02:05', '0000-00-00 00:00:00'),
(47, 'Bình Dương', 'binh-duong', '2020-04-11 15:02:18', '0000-00-00 00:00:00'),
(48, 'Đồng Nai', 'dong-nai', '2020-04-11 15:02:28', '0000-00-00 00:00:00'),
(49, 'Bà Rịa - Vũng Tàu', 'ba-ria-vung-tau', '2020-04-11 15:02:41', '0000-00-00 00:00:00'),
(50, 'Thành phố Hồ Chí Minh', 'thanh-pho-ho-chi-minh', '2020-04-11 15:02:55', '0000-00-00 00:00:00'),
(51, 'Long An', 'long-an', '2020-04-11 15:03:08', '0000-00-00 00:00:00'),
(52, 'Tiền Giang', 'tien-giang', '2020-04-11 15:03:16', '0000-00-00 00:00:00'),
(53, 'Bến Tre', 'ben-tre', '2020-04-11 15:03:26', '0000-00-00 00:00:00'),
(54, 'Trà Vinh', 'tra-vinh', '2020-04-11 15:03:41', '0000-00-00 00:00:00'),
(55, 'Vĩnh Long', 'vinh-long', '2020-04-11 15:03:50', '0000-00-00 00:00:00'),
(56, 'Đồng Tháp', 'dong-thap', '2020-04-11 15:03:59', '0000-00-00 00:00:00'),
(57, 'An Giang', 'an-giang', '2020-04-11 15:04:07', '0000-00-00 00:00:00'),
(58, 'Kiên Giang', 'kien-giang', '2020-04-11 15:04:17', '0000-00-00 00:00:00'),
(59, 'Cần Thơ', 'can-tho', '2020-04-11 15:04:25', '0000-00-00 00:00:00'),
(60, 'Hậu Giang', 'hau-giang', '2020-04-11 15:04:34', '0000-00-00 00:00:00'),
(61, 'Sóc Trăng', 'soc-trang', '2020-04-11 15:04:43', '0000-00-00 00:00:00'),
(62, 'Bạc Liêu', 'bac-lieu', '2020-04-11 15:04:52', '0000-00-00 00:00:00'),
(63, 'Cà Mau', 'ca-mau', '2020-04-11 15:05:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_saveprofile`
--

CREATE TABLE `user_saveprofile` (
  `id` int(11) NOT NULL,
  `usa_user_id` int(11) NOT NULL,
  `usa_profile_id` int(11) NOT NULL,
  `usa_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên hồ sơ',
  `usa_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên công ty',
  `usa_career` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ngành nghề',
  `usa_expired_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_skills`
--

CREATE TABLE `user_skills` (
  `id` int(11) NOT NULL,
  `sk_user_id` int(11) NOT NULL,
  `sk_skill_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Kỹ năng',
  `sk_percent_1` int(11) DEFAULT NULL COMMENT '%',
  `sk_skill_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sk_percent_2` int(11) DEFAULT NULL COMMENT '%',
  `sk_skill_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sk_percent_3` int(11) DEFAULT NULL COMMENT '%',
  `sk_skill_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sk_percent_4` int(11) DEFAULT NULL COMMENT '%',
  `sk_interesting` text COLLATE utf8mb4_unicode_ci COMMENT 'Sở thích',
  `sk_speial_skill` text COLLATE utf8mb4_unicode_ci COMMENT 'Kỹ năng đặc biệt',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_skills`
--

INSERT INTO `user_skills` (`id`, `sk_user_id`, `sk_skill_1`, `sk_percent_1`, `sk_skill_2`, `sk_percent_2`, `sk_skill_3`, `sk_percent_3`, `sk_skill_4`, `sk_percent_4`, `sk_interesting`, `sk_speial_skill`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 10:13:11', '2020-07-06 10:13:11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `admin_blogs`
--
ALTER TABLE `admin_blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `co_admin_id` (`bo_admin_id`);

--
-- Chỉ mục cho bảng `admin_notification`
--
ALTER TABLE `admin_notification`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ra_user_id` (`ra_user_id`),
  ADD KEY `ra_employer_id` (`ra_employer_id`),
  ADD KEY `ra_parent_id` (`ra_parent_id`),
  ADD KEY `ra_article_id` (`ra_article_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `employer_map`
--
ALTER TABLE `employer_map`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `employer_profile`
--
ALTER TABLE `employer_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pr_employer_id` (`pr_employer_id`);

--
-- Chỉ mục cho bảng `employer_saveprofile`
--
ALTER TABLE `employer_saveprofile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sa_employer_id` (`sa_employer_id`),
  ADD KEY `sa_profile_id` (`sa_profile_id`);

--
-- Chỉ mục cho bảng `gioi_tinh`
--
ALTER TABLE `gioi_tinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kinh_nghiem`
--
ALTER TABLE `kinh_nghiem`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muc_luong`
--
ALTER TABLE `muc_luong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `or_transaction_id` (`or_transaction_id`);

--
-- Chỉ mục cho bảng `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tr_employer_id` (`tr_employer_id`);

--
-- Chỉ mục cho bảng `trinh_do`
--
ALTER TABLE `trinh_do`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `user_applied`
--
ALTER TABLE `user_applied`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ap_user_id` (`ap_user_id`),
  ADD KEY `ap_profile_id` (`ap_profile_id`),
  ADD KEY `ap_employer_id` (`ap_employer_id`),
  ADD KEY `ap_hoso_id` (`ap_hoso_id`);

--
-- Chỉ mục cho bảng `user_degree`
--
ALTER TABLE `user_degree`
  ADD PRIMARY KEY (`id`),
  ADD KEY `de_general_id` (`de_user_id`);

--
-- Chỉ mục cho bảng `user_experience`
--
ALTER TABLE `user_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ex_user_id` (`ex_user_id`) USING BTREE;

--
-- Chỉ mục cho bảng `user_generalinfo`
--
ALTER TABLE `user_generalinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ge_user_id` (`ge_user_id`);

--
-- Chỉ mục cho bảng `user_job`
--
ALTER TABLE `user_job`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_language`
--
ALTER TABLE `user_language`
  ADD PRIMARY KEY (`id`),
  ADD KEY `la_general_id` (`la_user_id`) USING BTREE;

--
-- Chỉ mục cho bảng `user_provinces`
--
ALTER TABLE `user_provinces`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_saveprofile`
--
ALTER TABLE `user_saveprofile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usa_profile_id` (`usa_profile_id`),
  ADD KEY `usa_user_id` (`usa_user_id`);

--
-- Chỉ mục cho bảng `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sk_general_id` (`sk_user_id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `admin_blogs`
--
ALTER TABLE `admin_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `admin_notification`
--
ALTER TABLE `admin_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `employer_map`
--
ALTER TABLE `employer_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `employer_profile`
--
ALTER TABLE `employer_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `employer_saveprofile`
--
ALTER TABLE `employer_saveprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gioi_tinh`
--
ALTER TABLE `gioi_tinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `kinh_nghiem`
--
ALTER TABLE `kinh_nghiem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `muc_luong`
--
ALTER TABLE `muc_luong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `trinh_do`
--
ALTER TABLE `trinh_do`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user_applied`
--
ALTER TABLE `user_applied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user_degree`
--
ALTER TABLE `user_degree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user_experience`
--
ALTER TABLE `user_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user_generalinfo`
--
ALTER TABLE `user_generalinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user_job`
--
ALTER TABLE `user_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `user_language`
--
ALTER TABLE `user_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user_provinces`
--
ALTER TABLE `user_provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `user_saveprofile`
--
ALTER TABLE `user_saveprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin_blogs`
--
ALTER TABLE `admin_blogs`
  ADD CONSTRAINT `admin_blogs_ibfk_1` FOREIGN KEY (`bo_admin_id`) REFERENCES `admins` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`ra_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`ra_employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`ra_article_id`) REFERENCES `admin_blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `employer_profile`
--
ALTER TABLE `employer_profile`
  ADD CONSTRAINT `employer_profile_ibfk_1` FOREIGN KEY (`pr_employer_id`) REFERENCES `employers` (`id`);

--
-- Các ràng buộc cho bảng `employer_saveprofile`
--
ALTER TABLE `employer_saveprofile`
  ADD CONSTRAINT `employer_saveprofile_ibfk_1` FOREIGN KEY (`sa_profile_id`) REFERENCES `user_generalinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employer_saveprofile_ibfk_2` FOREIGN KEY (`sa_employer_id`) REFERENCES `employers` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`or_transaction_id`) REFERENCES `transactions` (`id`);

--
-- Các ràng buộc cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`tr_employer_id`) REFERENCES `employers` (`id`);

--
-- Các ràng buộc cho bảng `user_applied`
--
ALTER TABLE `user_applied`
  ADD CONSTRAINT `user_applied_ibfk_1` FOREIGN KEY (`ap_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_applied_ibfk_2` FOREIGN KEY (`ap_employer_id`) REFERENCES `employers` (`id`),
  ADD CONSTRAINT `user_applied_ibfk_3` FOREIGN KEY (`ap_hoso_id`) REFERENCES `user_generalinfo` (`id`),
  ADD CONSTRAINT `user_applied_ibfk_4` FOREIGN KEY (`ap_profile_id`) REFERENCES `employer_profile` (`id`);

--
-- Các ràng buộc cho bảng `user_degree`
--
ALTER TABLE `user_degree`
  ADD CONSTRAINT `user_degree_ibfk_1` FOREIGN KEY (`de_user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `user_experience`
--
ALTER TABLE `user_experience`
  ADD CONSTRAINT `user_experience_ibfk_1` FOREIGN KEY (`ex_user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `user_generalinfo`
--
ALTER TABLE `user_generalinfo`
  ADD CONSTRAINT `user_generalinfo_ibfk_1` FOREIGN KEY (`ge_user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `user_saveprofile`
--
ALTER TABLE `user_saveprofile`
  ADD CONSTRAINT `user_saveprofile_ibfk_1` FOREIGN KEY (`usa_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_saveprofile_ibfk_2` FOREIGN KEY (`usa_profile_id`) REFERENCES `user_generalinfo` (`id`);

--
-- Các ràng buộc cho bảng `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`sk_user_id`) REFERENCES `users` (`id`);

DELIMITER $$
--
-- Sự kiện
--
CREATE DEFINER=`root`@`localhost` EVENT `reset_vip` ON SCHEDULE EVERY 30 SECOND STARTS '2020-03-18 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE employers 
SET em_vip = 0
WHERE em_timevip < DATE_SUB(NOW(), INTERVAL 1 MINUTE)$$

CREATE DEFINER=`root`@`localhost` EVENT `thoi_han_tuyen_dung` ON SCHEDULE EVERY 30 SECOND STARTS '2020-03-30 23:53:55' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE employer_profile
SET pr_active = 0
WHERE pr_expired_at < DATE_SUB(NOW(), INTERVAL 1 MINUTE)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
