-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 09, 2023 lúc 11:59 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tkvl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congty`
--

CREATE TABLE `congty` (
  `macongty` int(11) NOT NULL,
  `tencongty` varchar(50) NOT NULL,
  `gioithieucongty` varchar(500) NOT NULL,
  `thongtinlienhe` varchar(500) NOT NULL,
  `duongdanhinhanh` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `congty`
--

INSERT INTO `congty` (`macongty`, `tencongty`, `gioithieucongty`, `thongtinlienhe`, `duongdanhinhanh`) VALUES
(1, 'MBBank', '', '', ''),
(2, 'FPT Software', '', '', ''),
(3, 'XNK Cao Gia', '', '', ''),
(4, 'Tập Đoàn Faraland', '', '', ''),
(5, 'NCSC', '', '', ''),
(6, 'Viettel', '', '', ''),
(7, 'Công ty Luật TNHH Tâm Long', '', '', ''),
(8, 'Công ty Cổ phần Tony and Ruby', '', '', ''),
(9, 'Công ty TNHH Dịch vụ Viễn thông Newstar', '', '', ''),
(10, 'Công ty TNHH Thương mại và Du lịch Kiwi', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congty_nganhnghe`
--

CREATE TABLE `congty_nganhnghe` (
  `macongty` int(11) NOT NULL,
  `manganhnghe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `congty_nganhnghe`
--

INSERT INTO `congty_nganhnghe` (`macongty`, `manganhnghe`) VALUES
(1, 1),
(3, 2),
(4, 2),
(5, 1),
(6, 1),
(7, 4),
(8, 2),
(9, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congviec`
--

CREATE TABLE `congviec` (
  `macongviec` int(11) NOT NULL,
  `tencongviec` varchar(50) DEFAULT NULL,
  `manganhnghe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `congviec`
--

INSERT INTO `congviec` (`macongviec`, `tencongviec`, `manganhnghe`) VALUES
(1, 'C++ Intership', 1),
(2, 'Senior Python Developer', 1),
(3, 'Database Deverloper', 1),
(4, 'Junior Java Developer', 1),
(5, 'Cyber Security', 1),
(6, 'Thực tập sinh quản trị hệ thống', 1),
(7, 'Thực tập sinh Frontend Angular', 1),
(8, 'IT Support', 1),
(9, 'Fresher Devops', 1),
(10, 'Nhân viên kinh doanh thị trường', 2),
(11, 'Chuyên viên kinh doanh bất động sản', 2),
(12, 'Nhân Viên Telesale Làm Việc Tại Nhà', 2),
(13, 'Nhân Viên Tư Vấn Du Lịch', 3),
(14, 'Nhân Viên Điều Hành Tour Du Lịch Outbound', 3),
(15, 'Chuyên Viên Kinh Doanh Ngành Du Lịch', 3),
(16, 'Nhân Viên Khảo Sát Ý Kiến Khách Hàng', 3),
(17, 'Trợ lý luật sư', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoso`
--

CREATE TABLE `hoso` (
  `mahoso` int(11) NOT NULL,
  `tencongviec` varchar(50) NOT NULL,
  `chitietungtuyen` varchar(50) NOT NULL,
  `hovaten` varchar(50) NOT NULL,
  `ngaysinh` varchar(50) NOT NULL,
  `gioitinh` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `hocvan` varchar(50) NOT NULL,
  `motakinhnghiem` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sodienthoai` varchar(10) NOT NULL,
  `taikhoan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoso`
--

INSERT INTO `hoso` (`mahoso`, `tencongviec`, `chitietungtuyen`, `hovaten`, `ngaysinh`, `gioitinh`, `diachi`, `hocvan`, `motakinhnghiem`, `email`, `sodienthoai`, `taikhoan`) VALUES
(1, 'IT', 'IP Support', 'Thịnh CSRF', '2000-10-16', 'nam', 'Thuỵ Chính', 'THPT', 'NVBH Winmart+', '', '0865341610', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `image`) VALUES
(1, 'Linh.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganhnghe`
--

CREATE TABLE `nganhnghe` (
  `manganhnghe` int(11) NOT NULL,
  `tennganhnghe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nganhnghe`
--

INSERT INTO `nganhnghe` (`manganhnghe`, `tennganhnghe`) VALUES
(1, 'IT'),
(2, 'Kinh Doanh'),
(3, 'Du Lịch'),
(4, 'Luật');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`taikhoan`, `matkhau`) VALUES
('admin', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `congty`
--
ALTER TABLE `congty`
  ADD PRIMARY KEY (`macongty`);

--
-- Chỉ mục cho bảng `congty_nganhnghe`
--
ALTER TABLE `congty_nganhnghe`
  ADD PRIMARY KEY (`macongty`,`manganhnghe`),
  ADD KEY `manganhnghe` (`manganhnghe`);

--
-- Chỉ mục cho bảng `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`macongviec`);

--
-- Chỉ mục cho bảng `hoso`
--
ALTER TABLE `hoso`
  ADD PRIMARY KEY (`mahoso`),
  ADD KEY `taikhoan` (`taikhoan`);

--
-- Chỉ mục cho bảng `nganhnghe`
--
ALTER TABLE `nganhnghe`
  ADD PRIMARY KEY (`manganhnghe`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`taikhoan`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `congty_nganhnghe`
--
ALTER TABLE `congty_nganhnghe`
  ADD CONSTRAINT `congty_nganhnghe_ibfk_1` FOREIGN KEY (`macongty`) REFERENCES `congty` (`macongty`),
  ADD CONSTRAINT `congty_nganhnghe_ibfk_2` FOREIGN KEY (`manganhnghe`) REFERENCES `nganhnghe` (`manganhnghe`);

--
-- Các ràng buộc cho bảng `congviec`
--
ALTER TABLE `congviec`
  ADD CONSTRAINT `congviec_ibfk_1` FOREIGN KEY (`manganhnghe`) REFERENCES `nganhnghe` (`manganhnghe`);

--
-- Các ràng buộc cho bảng `hoso`
--
ALTER TABLE `hoso`
  ADD CONSTRAINT `hoso_ibfk_1` FOREIGN KEY (`taikhoan`) REFERENCES `nguoidung` (`taikhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
