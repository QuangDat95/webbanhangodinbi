-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 11, 2023 lúc 03:14 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `weblaptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'DELL', '2022-02-21 01:19:32', '2022-02-21 01:19:32'),
(2, 'ACER', '2022-02-21 01:19:40', '2022-02-21 01:19:40'),
(3, 'LENOVO', '2022-02-21 01:19:46', '2022-02-21 01:19:46'),
(4, 'HP', '2022-02-21 01:19:52', '2022-02-21 01:19:52'),
(6, 'MACBOOK', '2022-02-21 01:31:32', '2022-02-22 20:21:32'),
(7, 'ASUS', '2022-02-22 20:46:38', '2022-02-22 20:46:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `buy_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `buy_date`, `created_at`, `updated_at`) VALUES
(2, 'Đạt', '03985834', 'Hải Thượng', '2023-03-11', '2023-03-11 06:05:09', '2023-03-11 06:05:09'),
(3, 'abc', '6445654', 'def', '2023-03-11', '2023-03-11 07:07:37', '2023-03-11 07:07:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `features`
--

INSERT INTO `features` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Học tập', NULL, NULL),
(2, 'Game', NULL, NULL),
(3, 'Văn phòng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_orders`
--

CREATE TABLE `list_orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `list_orders`
--

INSERT INTO `list_orders` (`id`, `customer_id`, `product_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 2, 6, '3', '2023-03-11 06:05:09', '2023-03-11 06:05:09'),
(2, 3, 6, '1', '2023-03-11 07:07:37', '2023-03-11 07:07:37'),
(3, 3, 7, '1', '2023-03-11 07:07:37', '2023-03-11 07:07:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_02_21_025900_create_category_table', 1),
(12, '2022_02_21_074249_create_products_table', 1),
(14, '2022_02_22_015835_create_orders_table', 2),
(15, '2022_02_22_033821_create_listorders_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'Laptop Dell Gaming G15 5511', '35990000', 'image/vJKmUZrbDkeqGM3ru8X7mB58kzyT3cjUoYonD8EK.jpg', '<h3>Mang đến cho người d&ugrave;ng một thiết kế thời thượng c&ugrave;ng hiệu năng vượt trội,&nbsp;<a href=\"https://www.thegioididong.com/laptop/dell-gaming-g15-5511-i7-p105f006bgr\" target=\"_blank\" title=\"Dell Gaming G15 5511 i7 11800H (P105F006BGR) đang bán tại thegioididong.com\">laptop Dell Gaming G15 5511 i7 11800H&nbsp;(P105F006BGR)</a>&nbsp;xứng danh l&agrave; người cộng sự l&yacute; tưởng cho mọi nhu cầu c&ocirc;ng việc từ&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=do-hoa-ky-thuat\" target=\"_blank\" title=\"Xem thêm laptop đồ hoạ - kỹ thuật đang bán tại thegioididong.com\">đồ hoạ - kỹ thuật</a>&nbsp;tới chiến những trận game đầy kịch t&iacute;nh.</h3>\r\n\r\n<p>&bull;&nbsp;<a href=\"https://www.thegioididong.com/laptop-dell-gaming-g-series\" target=\"_blank\" title=\"Xem thêm laptop Dell Gaming G-series đang bán tại thegioididong.com\">Laptop Dell Gaming</a>&nbsp;được trang bị CPU&nbsp;<strong>Intel Core i7 11800H</strong>&nbsp;c&ugrave;ng card rời&nbsp;<strong>NVIDIA GeForce RTX 3050 Ti 4</strong>&nbsp;<strong>GB</strong>&nbsp;mang lại hiệu suất xử l&yacute; vượt trội mọi t&aacute;c vụ từ văn ph&ograve;ng đến thiết kế đồ hoạ, render video hay giải tr&iacute; với c&aacute;c tựa game kịch t&iacute;nh.</p>\r\n\r\n<p>&bull; Đa nhiệm si&ecirc;u mượt m&agrave; với&nbsp;<strong>RAM 16 GB</strong>, ổ cứng&nbsp;<strong>SSD 512 GB</strong>&nbsp;cho bạn kh&ocirc;ng gian lưu trữ đủ d&ugrave;ng, r&uacute;t ngắn thời gian phản hồi mọi t&aacute;c vụ tr&ecirc;n laptop.</p>\r\n\r\n<p>&bull; M&agrave;n h&igrave;nh&nbsp;<strong>15.6 inch</strong>&nbsp;c&oacute; tần số qu&eacute;t&nbsp;<strong>120 Hz</strong>&nbsp;cho bạn m&atilde;n nh&atilde;n với từng chuyển động của những tựa game rượt đuổi đầy hấp dẫn m&agrave; kh&ocirc;ng lo xảy ra t&igrave;nh trạng giật, x&eacute; h&igrave;nh.</p>\r\n\r\n<p>&bull; M&agrave;n h&igrave;nh&nbsp;<strong>WVA</strong>&nbsp;cho g&oacute;c nh&igrave;n rộng, kết hợp c&ocirc;ng nghệ&nbsp;<strong>Anti Glare</strong>&nbsp;chống ch&oacute;i, độ s&aacute;ng&nbsp;<strong>250 nits</strong>&nbsp;v&agrave;&nbsp;<strong>LED Backlit</strong>&nbsp;mang lại m&agrave;u sắc hiển thị rực rỡ, độ tương phản cao, tiết kiệm điện năng.</p>\r\n\r\n<p>&bull; Được ho&agrave;n thiện tinh tế từng chi tiết với lớp&nbsp;<strong>vỏ nhựa</strong>&nbsp;m&agrave;u đen cứng c&aacute;p c&oacute; trọng lượng&nbsp;<strong>2.81 kg</strong>,&nbsp;<a href=\"https://www.thegioididong.com/laptop-dell\" target=\"_blank\" title=\"Xem thêm laptop Dell đang bán tại thegioididong.com\">laptop Dell</a>&nbsp;mang diện mạo ấn tượng thu h&uacute;t mọi &aacute;nh nh&igrave;n.</p>\r\n\r\n<p>&bull; Trang bị đa dạng c&aacute;c cổng giao tiếp như 3 x USB 3.2, HDMI, LAN (RJ45), USB Type-C gi&uacute;p dễ d&agrave;ng truyền, xuất dữ liệu đến c&aacute;c thiết bị ngoại vi.&nbsp;<strong>Đ&egrave;n nền b&agrave;n ph&iacute;m đơn sắc</strong>&nbsp;tiện lợi cũng được hỗ trợ.</p>\r\n\r\n<p>&bull;&nbsp;Hệ điều h&agrave;nh&nbsp;<strong>Windows 11&nbsp;Home SL&nbsp;</strong>v&agrave;<strong>&nbsp;Office Home &amp; Student 2021</strong>&nbsp;vĩnh viễn&nbsp;được t&iacute;ch hợp sẵn tr&ecirc;n&nbsp;<a href=\"https://www.thegioididong.com/laptop\" target=\"_blank\" title=\"Xem thêm sản phẩm laptop đang bán tại thegioidiong.com\">laptop</a>&nbsp;cung cấp kho ứng dụng Office đa dạng, hỗ trợ bạn l&agrave;m việc v&agrave; học tập hiệu quả hơn.</p>\r\n\r\n<p>&bull;&nbsp;&Acirc;m thanh to r&otilde; c&ugrave;ng khả năng khử tiếng ồn t&acirc;n tiến đến từ c&ocirc;ng nghệ&nbsp;<strong>Nahimic Audio</strong>&nbsp;cho bạn những trải nghiệm kh&oacute; qu&ecirc;n với kh&ocirc;ng gian &acirc;m nhạc sống động, thư gi&atilde;n hơn bao giờ hết.</p>', 1, '2022-02-21 20:25:45', '2022-02-22 21:13:43'),
(6, 'Dell Gaming G15 5515', '32990000', 'image/RzYXAikcZvNeTA1OfdePNcecJd3mE9IRn0rIr5El.jpg', '<h3><a href=\"https://www.thegioididong.com/laptop/dell-gaming-g15-5515-r7-70266675\" target=\"_blank\" title=\"Laptop Dell Gaming G15 5515 R7 5800H/16GB/512GB/4GB RTX3050Ti/120Hz/OfficeHS/Win11 (70266675)\">Dell Gaming G15 5515 R7 5800H (70266675)</a>&nbsp;được trang bị cấu h&igrave;nh vượt trội c&ugrave;ng thiết kế đầy mạnh mẽ đậm chất game thủ, hứa hẹn sẽ lu&ocirc;n s&aacute;t c&aacute;nh c&ugrave;ng bạn trong mọi trận chiến.</h3>\r\n\r\n<p>&bull;&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=do-hoa-ky-thuat\" target=\"_blank\" title=\"Xem thêm laptop đồ hoạ - kỹ thuật tại thegioididong.com\">Laptop đồ họa - kỹ thuật</a>&nbsp;được trang bị bộ vi xử l&yacute;&nbsp;<strong>AMD Ryzen 7 5800H​&nbsp;</strong>c&ugrave;ng&nbsp;card đồ họa rời&nbsp;<strong>NVIDIA&nbsp;GeForce RTX 3050Ti 4&nbsp;GB</strong>, phục vụ mọi nhu cầu của người d&ugrave;ng từ t&aacute;c vụ văn ph&ograve;ng đến c&aacute;c thao t&aacute;c s&aacute;ng tạo phức tạp hay chiến mọi tựa game một c&aacute;ch mượt m&agrave;.</p>\r\n\r\n<p>&bull;&nbsp;<strong>RAM 16 GB&nbsp;</strong>xử l&yacute; đa nhiệm mượt m&agrave; mọi t&aacute;c vụ<strong>&nbsp;</strong>c&ugrave;ng ổ&nbsp;cứng<strong>&nbsp;SSD&nbsp;512 GB</strong>&nbsp;mang đến kh&ocirc;ng gian lưu trữ đủ d&ugrave;ng.</p>\r\n\r\n<p>&bull;&nbsp;Tần&nbsp;số qu&eacute;t&nbsp;<strong>120 Hz</strong>&nbsp;cho những chuyển động trơn tru, hạn chế tối đa t&igrave;nh trạng giật x&eacute; h&igrave;nh trong c&aacute;c trận chiến game đỉnh cao.</p>\r\n\r\n<p>&bull;&nbsp;M&agrave;n h&igrave;nh viền mỏng&nbsp;<strong>15.6 inch</strong>&nbsp;ở&nbsp;<a href=\"https://www.thegioididong.com/laptop-dell\" target=\"_blank\" title=\"Một số laptop Dell đang kinh doanh tại thegioididong.com\">laptop Dell</a>&nbsp;sở hữu c&aacute;c c&ocirc;ng nghệ như chống ch&oacute;i&nbsp;<strong>Anti Glare,</strong><strong>&nbsp;WVA,&nbsp;</strong>độ s&aacute;ng<strong>&nbsp;250 nits, LED Backlit&nbsp;</strong>cho bạn g&oacute;c nh&igrave;n mở rộng, h&igrave;nh ảnh hiển thị r&otilde; n&eacute;t, hạn chế hiện tượng ch&oacute;i lo&aacute;, b&oacute;ng gương.</p>\r\n\r\n<p>&bull; C&ocirc;ng nghệ&nbsp;<strong>Nahimic Audio</strong>&nbsp;mang đến &acirc;m thanh sống động, r&otilde; r&agrave;ng, cho bạn tận hưởng kh&ocirc;ng gian giải tr&iacute; ch&acirc;n thật hơn bao giờ hết.</p>\r\n\r\n<p>&bull;&nbsp;<a href=\"https://www.thegioididong.com/laptop-dell-gaming-g-series\" target=\"_blank\" title=\"Một số laptop Dell Gaming G-series đang kinh doanh tại thegioididong.com\">Laptop Dell Gaming</a>&nbsp;sở hữu&nbsp;trọng lượng<strong>&nbsp;2.81 kg</strong>&nbsp;v&agrave; d&agrave;y&nbsp;<strong>25 mm</strong>, c&ugrave;ng b&agrave;n ph&iacute;m c&oacute;&nbsp;<strong>đ&egrave;n nền chuyển m&agrave;u RGB,&nbsp;</strong>cho bạn chiến mọi trận game ở cả điều kiện thiếu &aacute;nh s&aacute;ng với c&aacute; t&iacute;nh ri&ecirc;ng biệt.</p>\r\n\r\n<p>&bull;&nbsp;Hệ điều h&agrave;nh&nbsp;<strong>Windows 11 Home SL v&agrave; Office Home &amp; Student 2021</strong>&nbsp;vĩnh viễn được thiết lập sẵn trong m&aacute;y, hỗ trợ tối ưu cho mọi nhu cầu sử dụng từ bạn.</p>\r\n\r\n<p>&bull; Phi&ecirc;n bản&nbsp;<a href=\"https://www.thegioididong.com/laptop\" target=\"_blank\" title=\"Một số laptop đang kinh doanh tại thegioididong.com\">laptop</a>&nbsp;n&agrave;y c&ograve;n được trang bị c&aacute;c cổng kết nối phổ biến như USB 3.2,&nbsp;2 x USB 2.0, HDMI, LAN (RJ45) v&agrave; USB Type-C hỗ trợ qu&aacute; tr&igrave;nh truyền xuất dữ liệu dễ d&agrave;ng.</p>', 1, '2022-02-22 21:15:56', '2022-02-22 21:15:56'),
(7, 'Laptop Dell Latitude 3520', '30990000', 'image/zNesPJAdl6w7AWn1tz0fy9aak95LDzRvX0InoT6k.jpg', '<h3><a href=\"https://www.thegioididong.com/laptop/dell-latitude-3520-i7-70261780\" target=\"_blank\" title=\"Laptop Dell Latitude 3520 i7 1165G7/8GB/512GB/Win10 Pro (70261780) \">Laptop Dell Latitude 3520 i7 (70261780)</a>&nbsp;sở hữu thiết hiện đại thường thấy của c&aacute;c sản phẩm nh&agrave; Dell, nhưng mang trong m&igrave;nh cấu h&igrave;nh mạnh mẽ vượt trội, l&agrave; người trợ thủ đắc lực cho bạn từ c&ocirc;ng việc đến giải tr&iacute;.</h3>\r\n\r\n<h3>Thu h&uacute;t mọi &aacute;nh nh&igrave;n với vẻ ngo&agrave;i mạnh mẽ</h3>\r\n\r\n<p>Bao bọc b&ecirc;n ngo&agrave;i chiếc&nbsp;<a href=\"https://www.thegioididong.com/laptop\" target=\"_blank\" title=\"Một số laptop đang kinh doanh tại thegioididong.com\">laptop</a>&nbsp;n&agrave;y l&agrave; một gam m&agrave;u đen trung t&iacute;nh đầy ấn tượng, với lớp vỏ được chế t&aacute;c từ nhựa bền bỉ sở hữu trọng lượng&nbsp;<strong>1.79 kg&nbsp;</strong>v&agrave; d&agrave;y<strong>&nbsp;18 mm</strong>, tối ưu cho bạn trong suốt qu&aacute; tr&igrave;nh di chuyển, n&acirc;ng cao năng suất l&agrave;m việc.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/252808/dell-latitude-3520-i7-70261780-a-2.jpg\" onclick=\"return false;\"><img alt=\"Dell Latitude 3520 i7 1165G7 (70261780) - Thiết kế\" src=\"https://cdn.tgdd.vn/Products/Images/44/252808/dell-latitude-3520-i7-70261780-a-2.jpg\" title=\"Dell Latitude 3520 i7 1165G7 (70261780) - Thiết kế\" /></a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/laptop-dell\" target=\"_blank\" title=\"Một số laptop Dell đang kinh doanh tại thegioididong.com\">Laptop Dell</a>&nbsp;sở hữu b&agrave;n ph&iacute;m Fullsize rộng r&atilde;i c&ugrave;ng c&aacute;c ph&iacute;m c&oacute; độ nảy tốt, h&agrave;nh tr&igrave;nh ph&iacute;m s&acirc;u được trang bị&nbsp;<strong>đ&egrave;n nền</strong>&nbsp;tiện lợi, thuận tiện cho bạn l&agrave;m việc hay giải tr&iacute; thoải m&aacute;i trong cả những nơi c&oacute; điều kiện &aacute;nh s&aacute;ng k&eacute;m, gia tăng hiệu quả c&ocirc;ng việc.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/252808/dell-latitude-3520-i7-70261780-6.jpg\" onclick=\"return false;\"><img alt=\"Dell Latitude 3520 i7 1165G7 (70261780) - Bàn phím\" src=\"https://cdn.tgdd.vn/Products/Images/44/252808/dell-latitude-3520-i7-70261780-6.jpg\" title=\"Dell Latitude 3520 i7 1165G7 (70261780) - Bàn phím\" /></a></p>\r\n\r\n<p>Dọc hai b&ecirc;n của phi&ecirc;n bản&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=hoc-tap-van-phong\" target=\"_blank\" title=\"Một số laptop học tập - văn phòng đang kinh doanh tại thegioididong.com\">laptop học tập - văn ph&ograve;ng</a>&nbsp;n&agrave;y được trang bị c&aacute;c cổng kết nối th&ocirc;ng dụng như 2 cổng USB 3.2, HDMI, Jack tai nghe 3.5 mm, LAN (RJ45), USB Type-C c&ugrave;ng khe đọc thẻ nhớ Micro SD, cho ph&eacute;p bạn truyền xuất dữ liệu nhanh ch&oacute;ng với nhiều thiết bị ngoại vi tương th&iacute;ch.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/252808/dell-latitude-3520-i7-70261780-11.jpg\" onclick=\"return false;\"><img alt=\"Dell Latitude 3520 i7 1165G7 (70261780) - Cổng kết nối\" src=\"https://cdn.tgdd.vn/Products/Images/44/252808/dell-latitude-3520-i7-70261780-11.jpg\" title=\"Dell Latitude 3520 i7 1165G7 (70261780) - Cổng kết nối\" /></a></p>\r\n\r\n<p>Chuẩn kết nối kh&ocirc;ng d&acirc;y&nbsp;<strong>Bluetooth 5.1</strong>&nbsp;v&agrave;&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/wi-fi-chuan-80211ax-la-gi-tim-hieu-ve-wi-fi-the-he-thu-6-1187524\" target=\"_blank\" title=\"Tìm hiểu thêm về chuẩn Wi-Fi 802.11ax - Wi-Fi thế hệ thứ 6\">Wi-Fi 6 (802.11ax)</a>, cung cấp cho bạn đường truyền ổn định, hỗ trợ cho c&ocirc;ng việc hay giải tr&iacute; của người d&ugrave;ng d&ugrave; ở cả trong nh&agrave; hay ngo&agrave;i trời m&agrave; kh&ocirc;ng lo gi&aacute;n đoạn, ảnh hưởng đến hiệu suất c&ocirc;ng việc.</p>\r\n\r\n<p>Đặc biệt, m&aacute;y được thiết kế&nbsp;<strong>bản lề 180 độ</strong>, gi&uacute;p bạn l&agrave;m việc với nhiều tư thế v&agrave; g&oacute;c độ ph&ugrave; hợp nhất, chia sẻ m&agrave;n h&igrave;nh với mọi người xung quanh dễ d&agrave;ng.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/252808/dell-latitude-3520-i7-70261780-a-7.jpg\" onclick=\"return false;\"><img alt=\"Dell Latitude 3520 i7 1165G7 (70261780) - Bản lề\" src=\"https://cdn.tgdd.vn/Products/Images/44/252808/dell-latitude-3520-i7-70261780-a-7.jpg\" title=\"Dell Latitude 3520 i7 1165G7 (70261780) - Bản lề\" /></a></p>\r\n\r\n<h3>N&acirc;ng tầm h&igrave;nh ảnh, thỏa m&atilde;n &acirc;m thanh</h3>\r\n\r\n<p>Chiếc laptop n&agrave;y sở hữu&nbsp;<a href=\"https://www.thegioididong.com/laptop-15-6-inch\" target=\"_blank\" title=\"Một số laptop 15.6 inch đang kinh doanh tại thegioididong.com\">m&agrave;n h&igrave;nh 15.6 inch</a>&nbsp;với độ ph&acirc;n giải<strong>&nbsp;Full HD (1920 x 1080)&nbsp;</strong>mang đến h&igrave;nh ảnh ch&acirc;n thật, sắc n&eacute;t đến từng chi tiết, cho bạn cảm gi&aacute;c như đang trong thế giới ảo, ch&igrave;m đắm trong kh&ocirc;ng gian phim ảnh đầy thư gi&atilde;n.</p>\r\n\r\n<p>C&ocirc;ng nghệ chống ch&oacute;i&nbsp;<strong>Anti Glare</strong>&nbsp;c&ugrave;ng c&ocirc;ng nghệ&nbsp;<strong>WVA&nbsp;</strong>cho ph&eacute;p bạn l&agrave;m việc hay giải tr&iacute; với khung h&igrave;nh rộng mở đến<strong>&nbsp;178 độ</strong>&nbsp;ở cả những nơi &aacute;nh s&aacute;ng kh&ocirc;ng thuận lợi với h&igrave;nh ảnh r&otilde; n&eacute;t, sống động d&ugrave; kh&ocirc;ng ngồi trực diện, m&agrave; kh&ocirc;ng lo mắt bị mỏi hay l&oacute;a.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/252808/dell-latitude-3520-i7-70261780-8.jpg\" onclick=\"return false;\"><img alt=\"Dell Latitude 3520 i7 1165G7 (70261780) - Màn hình\" src=\"https://cdn.tgdd.vn/Products/Images/44/252808/dell-latitude-3520-i7-70261780-8.jpg\" title=\"Dell Latitude 3520 i7 1165G7 (70261780) - Màn hình\" /></a></p>\r\n\r\n<p>Sở hữu bộ chỉnh &acirc;m chuy&ecirc;n s&acirc;u c&ugrave;ng khả năng khuếch đại &acirc;m thanh, c&ocirc;ng nghệ&nbsp;<strong>Realtek ALC3204</strong>&nbsp;mang đến cho người d&ugrave;ng những &acirc;m thanh to r&otilde;, cho bạn cảm nhận ch&acirc;n thật từng giọng n&oacute;i của c&aacute;c nh&acirc;n vật trong những thước phim hay tận hưởng kh&ocirc;ng gian &acirc;m nhạc chuẩn x&aacute;c đầy thư th&aacute;i.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/252808/dell-latitude-3520-i7-70261780-a-9.jpg\" onclick=\"return false;\"><img alt=\"Dell Latitude 3520 i7 1165G7 (70261780) - Âm thanh\" src=\"https://cdn.tgdd.vn/Products/Images/44/252808/dell-latitude-3520-i7-70261780-a-9.jpg\" title=\"Dell Latitude 3520 i7 1165G7 (70261780) - Âm thanh\" /></a></p>\r\n\r\n<h3>Vượt khỏi mọi giới hạn với&nbsp;<a href=\"https://www.thegioididong.com/laptop-cpu-intel-gen-11\" target=\"_blank\" title=\"Một số laptop có CPU Intel Gen 11 đang kinh doanh tại thegioididong.com\">chip Intel Gen 11</a></h3>\r\n\r\n<p>Mang đến tốc độ&nbsp;<strong>2.80 GHz</strong>&nbsp;v&agrave; đạt tối đa l&ecirc;n đến&nbsp;<strong>4.7 GHz</strong>&nbsp;nhờ&nbsp;<strong>Turbo Boost&nbsp;</strong>khi sở hữu<strong>&nbsp;4 nh&acirc;n 8 luồng</strong>,&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=core-i7\" target=\"_blank\" title=\"Một số laptop có Intel Core i7 đang kinh doanh tại thegioididong.com\">Intel Core i7</a>&nbsp;<strong>Tiger Lake 1165G7</strong>&nbsp;hỗ trợ người d&ugrave;ng xử l&yacute; mọi t&aacute;c vụ một c&aacute;ch hiệu quả từ những việc đơn giản đến phức tạp, từ c&aacute;c t&aacute;c vụ văn ph&ograve;ng với Word, Excel,.. đến s&aacute;ng tạo đồ họa hay chinh chiến với c&aacute;c thể loại game thịnh h&agrave;nh đầy kịch t&iacute;nh.</p>\r\n\r\n<p>Khơi nguồn s&aacute;ng tạo trong bạn với việc chỉnh sửa h&igrave;nh ảnh, render video hay dựng h&igrave;nh 3D nhờ được trang bị card đồ họa t&iacute;ch hợp&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-card-do-hoa-tich-hop-intel-iris-xe-graphics-1305192\" target=\"_blank\" title=\"Tìm hiểu về card đồ họa tích hợp Intel Iris Xe Graphics\">Intel Iris Xe Graphics</a>, c&ugrave;ng bạn tạo n&ecirc;n những t&aacute;c phẩm tuyệt hảo, đồng thời cho bạn những trải nghiệm bất tận với c&aacute;c tựa game đầy hấp dẫn như&nbsp;PUBG: Battlegrounds, Li&ecirc;n Minh Huyền Thoại,...</p>\r\n\r\n<p>Đa nhiệm hơn nhờ tốc độ Bus RAM<strong>&nbsp;3200 MHz</strong>&nbsp;đến từ&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=8-gb\" target=\"_blank\" title=\"Một số laptop có RAM 8 GB đang kinh doanh tại thegioididong.com\">RAM 8 GB</a>&nbsp;chuẩn<strong>&nbsp;DDR4 2 khe&nbsp;</strong>(1 khe<strong>&nbsp;8 GB&nbsp;</strong>+ 1 khe rời) c&ugrave;ng khả năng n&acirc;ng cấp l&ecirc;n đến&nbsp;<strong>32 GB&nbsp;</strong>cho ph&eacute;p bạn mở nhiều ứng dụng c&ugrave;ng l&uacute;c v&agrave; chuyển đổi qua lại, thoải m&aacute;i vừa thiết kế đồ họa vừa thưởng thức &acirc;m nhạc, m&agrave; kh&ocirc;ng lo xảy ra t&igrave;nh trạng giật hay lag m&aacute;y.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/252808/dell-latitude-3520-i7-70261780-4.jpg\" onclick=\"return false;\"><img alt=\"Dell Latitude 3520 i7 1165G7 (70261780) - Cấu hình\" src=\"https://cdn.tgdd.vn/Products/Images/44/252808/dell-latitude-3520-i7-70261780-4.jpg\" title=\"Dell Latitude 3520 i7 1165G7 (70261780) - Cấu hình\" /></a></p>\r\n\r\n<p>Tốc độ truy cập m&aacute;y v&agrave; vận h&agrave;nh c&aacute;c ứng dụng đ&aacute;ng kinh ngạc nhờ ổ cứng&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=ssd-512-gb\" target=\"_blank\" title=\"Một số laptop sở hữu SSD 512 GB đang kinh doanh tại thegioididong.com\">512 GB SSD</a>&nbsp;<strong>NVMe PCle</strong>, c&ugrave;ng khả năng mở m&aacute;y v&agrave; vận h&agrave;nh c&aacute;c ứng dụng trong thời gian nhanh ch&oacute;ng chỉ v&agrave;i gi&acirc;y. Kh&ocirc;ng những thế, bạn c&ograve;n c&oacute; thể th&aacute;o rời v&agrave; thay thế bằng thanh ổ cứng kh&aacute;c tối đa&nbsp;<strong>1 TB</strong>, phục vụ tối đa cho mọi nhu cầu của bạn.</p>\r\n\r\n<p>Đặc biệt,&nbsp;<a href=\"https://www.thegioididong.com/laptop-dell-latitude\" target=\"_blank\" title=\"Một số laptop Dell Latitude đang kinh doanh tại thegioididong.com\">laptop Dell Latitude</a>&nbsp;c&ograve;n được trang bị khe cắm&nbsp;<strong>HDD SATA&nbsp;</strong>(n&acirc;ng cấp tối đa&nbsp;<strong>1 TB</strong>), cho ph&eacute;p bạn dễ d&agrave;ng n&acirc;ng cấp bộ nhớ khi cần, tối ưu hơn cho mọi y&ecirc;u cầu của người d&ugrave;ng.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/252808/dell-latitude-3520-i7-70261780-5.jpg\" onclick=\"return false;\"><img alt=\"Dell Latitude 3520 i7 1165G7 (70261780) - SSD\" src=\"https://cdn.tgdd.vn/Products/Images/44/252808/dell-latitude-3520-i7-70261780-5.jpg\" title=\"Dell Latitude 3520 i7 1165G7 (70261780) - SSD\" /></a></p>\r\n\r\n<p>Laptop Dell Latitude 3520 i7 (70261780) l&agrave; người cộng sự ho&agrave;n hảo với thiết kế hiện đại c&ugrave;ng hiệu năng mạnh mẽ, l&agrave; chọn lựa đ&aacute;ng sở hữu cho bất kỳ ai, c&ugrave;ng bạn chinh phục mọi c&ocirc;ng việc.</p>', 1, '2022-02-22 21:18:02', '2022-02-22 21:18:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_features`
--

CREATE TABLE `product_features` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `feature_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_features`
--

INSERT INTO `product_features` (`id`, `product_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, NULL),
(2, 5, 2, NULL, NULL),
(3, 6, 2, NULL, NULL),
(4, 6, 3, NULL, NULL),
(5, 7, 1, NULL, NULL),
(6, 7, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Người dùng', 'nguoidung@gmail.com', NULL, '$2y$10$HVFbA8zXBAIVurPfihRrDehgoLcqxeI9jRtIWdtoi0oHKH4fDliM6', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `list_orders`
--
ALTER TABLE `list_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `list_orders`
--
ALTER TABLE `list_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
