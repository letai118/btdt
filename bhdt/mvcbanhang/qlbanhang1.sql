-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2025 lúc 05:55 AM
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
-- Cơ sở dữ liệu: `qlbanhang1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`) VALUES
(1, 'SAMSUNG', 'CÁC MẪU SAMSUNG MỚI', 'https://i.pinimg.com/736x/f4/ef/61/f4ef614083d8d3ab2297798df8c70519.jpg'),
(4, 'Xiaomi Redmi', 'Các mẫu Điện thoại Xiaomi Redmi mới nhất', 'https://inkythuatso.com/uploads/images/2021/10/xiaomi-logo-inkythuatso-01-30-09-04-50.jpg'),
(5, 'iPHONE ', 'Các mẫu iPHONE mới ra', 'https://fabrikbrands.com/wp-content/uploads/Apple-Logo-History-1-1155x770.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(50) DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `category_id`) VALUES
(1, 'iPhone 16 Pro Max 256GB|Chính hãng VN/A', 29900000, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-16-pro-max.png', 'iPhone 16 Pro Max sở hữu chipset A18 Pro mạnh mẽ giúp xử lý nhanh mọi tác vụ, camera 48 MP zoom quang 5x cho ảnh nét, màn hình 6.9 inch sống động. Pin dung lượng cao của máy hỗ trợ phát video tới 33 tiếng, đáp ứng nhu cầu giải trí liên tục suốt ngày dài. Cùng với đó là thiết kế khung Titanium bền nhẹ, mang lại cảm giác sang trọng và chắc chắn khi cầm.', 5),
(2, 'Xiaomi Redmi Note 13 Pro 5G 8GB 256GB', 6790000, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/p/h/photo_2024-12-20_17-05-54_1.jpg', 'Điện thoại Xiaomi Redmi Note 13 Pro 5G 8GB 256GB tích hợp chip Snapdragon 7s Gen 2 (8 nhân) mạnh mẽ, xử lý tác vụ mượt mà, thúc đẩy hiệu năng toàn diện. Camera chính 200 MP của Note 13 Series cho phép ghi lại hình ảnh vô cùng sắc nét, mang đến trải nghiệm chụp ảnh chi tiết và sống động. Viên pin lớn 5100 mAh giúp Redmi Note 13 Pro hoạt động bền bỉ suốt cả ngày, giảm thiểu tình trạng sạc nhiều lần.', 4),
(3, 'Samsung Galaxy S24 Plus 12GB 512GB', 21190000, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/a/samsung-galaxy-s24-plus_1.png', 'Samsung S24 Plus phiên bản 512GB được trang bị con chip Exynos 2400 kết hợp cùng dung lượng RAM 12GB cho hiệu năng đáng kinh ngạc. Cụm camera với cảm biến chính 50MP đảm bảo mang tới những bức ảnh sống động và khả năng quay video Super HDR đỉnh cao. Màn hình Dynamic AMOLED 2X cùng độ phân giải Quad-HD+ với độ sáng 2.600 nit hỗ trợ mang lại khả năng hiển thị vượt trội.', 1),
(4, 'Xiaomi 14T 12GB 512GB', 13240000, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi_14t_2_.png', 'Xiaomi 14T 5G là phiên bản điện thoại cận cao cấp được Xiaomi trang bị chip Dimensity 8300 Ultra cùng 12GB RAM để mang tới hiệu suất ấn tượng. Mẫu điện thoại này còn được trang bị bộ 3 ống kính Leica thế hệ mới để nâng cao trải nghiệm nhiếp ảnh. Với màn hình Super AMOLED 6.67 inch sở hữu phần viền siêu mỏng cùng độ nét 1.5K, điện thoại Mi14T sẽ luôn mang tới chất lượng hình ảnh sắc nét, sống động.', 4),
(5, 'Samsung Galaxy Z Flip6 12GB 256GB', 21990000, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/f/r/frame_166_3.png', 'Samsung Z Flip 6 sở hữu nhiều nâng cấp ấn tượng nhờ được trang bị chip Snapdragon 8 Gen 3 for Galaxy, RAM 12GB, mang lại hiệu năng mạnh mẽ cho đa nhiệm và chơi game. Camera chính 50MP của máy giúp cải thiện khả năng quay chụp, đặc biệt trong môi trường thiếu sáng. Cùng với đó là pin 4.000mAh, hỗ trợ sạc nhanh 25W, giúp kéo dài thời gian sử dụng của người dùng.', 1),
(6, 'iPhone 15 128GB | Chính hãng VN/A', 15190000, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-plus_1__1.png', 'iPhone 15 128GB được trang bị màn hình Dynamic Island kích thước 6.1 inch với công nghệ hiển thị Super Retina XDR màn lại trải nghiệm hình ảnh vượt trội. Điện thoại với mặt lưng kính nhám chống bám mồ hôi cùng 5 phiên bản màu sắc lựa chọn: Hồng, Vàng, Xanh lá, Xanh dương và đen. Camera trên iPhone 15 series cũng được nâng cấp lên cảm biến 48MP cùng tính năng chụp zoom quang học tới 2x. Cùng với thiết kế cổng sạc thay đổi từ lightning sang USB-C vô cùng ấn tượng.', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` tinyint(4) DEFAULT 0,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `phone`, `address`, `role`, `birthday`) VALUES
(6, 'customer', 'kh@123', 'test@gmail.com', 'Tuấn Anh', '0913154353', 'hà nọi', 0, NULL),
(18, 'admin', 'admin@123', NULL, NULL, NULL, NULL, 1, NULL),
(20, 'admin2', 'admin@123', NULL, NULL, NULL, NULL, 0, NULL),
(26, 'administrator', '121221', NULL, NULL, NULL, NULL, 0, NULL),
(27, 'longangia118', 'abc12345', 'Letai925@gmail.com', 'tài anh', '0293737372', 'hà nội', 0, '2005-03-08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_idx` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_items_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
