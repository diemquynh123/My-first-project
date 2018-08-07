-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 22, 2018 lúc 03:37 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doantotnghiep`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiasp`
--

CREATE TABLE `danhgiasp` (
  `id_bl` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dien_thoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `binh_luan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_gio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgiasp`
--

INSERT INTO `danhgiasp` (`id_bl`, `id_sp`, `ten`, `ten_sp`, `dien_thoai`, `binh_luan`, `ngay_gio`) VALUES
(1, 1, 'Hoàng Văn Huy', 'Túi Xách Nữ GC1201', '098765432', 'Sản phẩm dùng rất tốt', '2017-04-27 00:00:00'),
(2, 5, 'Nguyễn Minh Tú', 'Túi Xách Nữ GC1205', '098765432', 'Sản phẩm dùng rất tốt', '2014-04-27 14:50:29'),
(3, 4, 'Phạm Trưởng', 'Túi Xách Nữ GC1204', '098765432', 'Sản phẩm dùng rất tốt', '2017-04-27 19:50:29'),
(4, 7, 'Lưu Thi Thi', 'Túi Xách Nữ LV2402', '098765432', 'Sản phẩm dùng rất tốt', '2017-04-27 20:50:29'),
(5, 8, 'Đông Hoa', 'Túi Xách Nữ LV2403', '098765432', 'Sản phẩm dùng rất tốt', '2017-06-27 14:50:29'),
(6, 10, 'Phạm Băng Băng', 'Túi Xách Nữ LV2405', '098765432', 'Sản phẩm dùng rất tốt', '2017-04-27 12:50:29'),
(7, 1, 'Triệu Lệ Dĩnh', 'Túi Xách Nữ GC1201', '098765432', 'Sản phẩm dùng rất tốt', '2017-04-27 04:50:29'),
(8, 16, 'Triệu Vy', 'Túi Xách Nữ JN9601', '098765432', 'Sản phẩm dùng rất tốt', '2017-03-27 14:30:29'),
(9, 18, 'Châu Tấn', 'Túi Xách Nữ JN9603', '098765432', 'Sản phẩm dùng rất tốt', '2017-02-27 10:50:29'),
(10, 22, 'Mỹ Tâm', 'Túi Xách Nữ ZA0202', '098765432', 'Sản phẩm dùng rất tốt', '2017-04-27 06:50:29'),
(11, 25, 'Bảo thy', 'Túi Xách Nữ ZA0205', '098765432', 'Sản phẩm dùng rất tốt', '2016-04-29 09:50:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmsanpham`
--

CREATE TABLE `dmsanpham` (
  `id_dm` int(11) NOT NULL,
  `ten_dm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmsanpham`
--

INSERT INTO `dmsanpham` (`id_dm`, `ten_dm`) VALUES
(1, 'GUCCI'),
(2, 'louis vuitton'),
(3, 'lYN'),
(4, 'JUNO'),
(5, 'ZARA');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlthanhvien`
--

CREATE TABLE `qlthanhvien` (
  `id_tv` int(11) NOT NULL,
  `ten_tv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quyen_truy_cap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `qlthanhvien`
--

INSERT INTO `qlthanhvien` (`id_tv`, `ten_tv`, `email`, `mat_khau`, `quyen_truy_cap`) VALUES
(1, 'Anh', 'anh123@gmail.com', '12345', 1),
(2, 'Anh', 'anh123@gmail.com', '12345', 1),
(3, 'Anh', 'anh123@gmail.com', '12345', 1),
(4, 'Anh', 'anh123@gmail.com', '12345', 1),
(5, 'Anh', 'anh123@gmail.com', '12345', 1),
(6, 'Anh', 'anh123@gmail.com', '12345', 1),
(7, 'Anh', 'anh123@gmail.com', '12345', 1),
(8, 'Anh', 'anh123@gmail.com', '12345', 1),
(9, 'Anh', 'anh123@gmail.com', '12345', 1),
(10, 'Anh', 'anh123@gmail.com', '12345', 1),
(11, 'Anh', 'anh123@gmail.com', '12345', 1),
(12, 'Anh', 'anh123@gmail.com', '12345', 1),
(13, 'Huy', '@gmail.com', '12345', 2),
(14, 'quynh', 'quynh@gmail.com', '12345', 2),
(15, 'thuy', 'thuy@gmail.com', '12345', 1),
(16, 'manh', 'manh@gmail.com', '12345', 1),
(17, 'hung', 'hung@gmail.com', '12345', 2),
(18, 'viet', 'viet@gmail.com', '12345', 1),
(19, 'hoang', 'hoang@gmail.com', '12345', 2),
(20, 'minh', 'minh@gmail.com', '12345', 1),
(21, 'lan', 'lan@gmail.com', '12345', 2),
(22, 'nhung', 'nhung@gmail.com', '12345', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phu_kien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinh_trang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khuyen_mai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `sl_da_ban` int(11) NOT NULL,
  `chi_tiet_sp` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `id_dm`, `ten_sp`, `gia_sp`, `anh_sp`, `phu_kien`, `tinh_trang`, `khuyen_mai`, `so_luong`, `sl_da_ban`, `chi_tiet_sp`) VALUES
(1, 1, 'Túi Xách Nữ GC1201', '1050000', 'gc1.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 45, 'túi xách mang thương hiệu GUCCI với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(2, 1, 'Túi Xách Nữ GC1202', '1200000', 'gc2.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', 'tặng kèm ví', 25, 10, 'túi xách mang thương hiệu GUCCI với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(3, 1, 'Túi Xách Nữ GC1203', '1020000', 'gc3.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 14, 42, 'túi xách mang thương hiệu GUCCI với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(4, 1, 'Túi Xách Nữ GC1204', '2050000', 'gc5.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', 'tặng kèm ví', 12, 30, 'túi xách mang thương hiệu GUCCI với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(5, 1, 'Túi Xách Nữ GC1205', '1320000', 'gc6.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 20, 25, 'túi xách mang thương hiệu GUCCI với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(6, 2, 'Túi Xách Nữ LV2401', '2100000', 'lv1.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 40, 50, 'túi xách mang thương hiệu louis vuitton với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(7, 2, 'Túi Xách Nữ LV2402', '3100000', 'lv2.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 20, 20, 'túi xách mang thương hiệu louis vuitton với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(8, 2, 'Túi Xách Nữ LV2403', '250000', 'lv3.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 15, 'túi xách mang thương hiệu louis vuitton với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(9, 2, 'Túi Xách Nữ LV2404', '2100000', 'lv4.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 12, 16, 'túi xách mang thương hiệu louis vuitton với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(10, 2, 'Túi Xách Nữ LV2405', '1600000', 'gc4.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 18, 29, 'túi xách mang thương hiệu louis vuitton với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(11, 3, 'Túi Xách Nữ LY2301', '3250000', 'lyn1.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 25, 'túi xách mang thương hiệu lYN với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(12, 3, 'Túi Xách Nữ LY2302', '1060000', 'lyn2.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 20, 'túi xách mang thương hiệu lYN với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(13, 3, 'Túi Xách Nữ LY2303', '3020000', 'lyn3.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 15, 'túi xách mang thương hiệu lYN với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(14, 3, 'Túi Xách Nữ LY2304', '1040000', 'lyn4.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 10, 'túi xách mang thương hiệu lYN với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(15, 3, 'Túi Xách Nữ LY2305', '3000000', 'gci1.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 5, 'túi xách mang thương hiệu lYN với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(16, 4, 'Túi Xách Nữ JN9601', '1200000', 'juno1.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 15, 'túi xách mang thương hiệu JUNO với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(17, 4, 'Túi Xách Nữ JN9602', '1500000', 'juno2.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 35, 'túi xách mang thương hiệu JUNO với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(18, 4, 'Túi Xách Nữ JN9603', '1200000', 'juno3.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 15, 'túi xách mang thương hiệu JUNO với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(19, 4, 'Túi Xách Nữ JN9604', '2000000', 'juno4.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 25, 'túi xách mang thương hiệu JUNO với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(20, 4, 'Túi Xách Nữ JN9605', '1050000', 'juno1.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 15, 'túi xách mang thương hiệu JUNO với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(21, 5, 'Túi Xách Nữ ZA0201', '750000', 'zaza1.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 15, 'túi xách mang thương hiệu ZARA với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(22, 5, 'Túi Xách Nữ ZA0202', '600000', 'zaza2.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 35, 'túi xách mang thương hiệu ZARA với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(23, 5, 'Túi Xách Nữ ZA0203', '750000', 'zaza3.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 10, 10, 'túi xách mang thương hiệu ZARA với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(24, 5, 'Túi Xách Nữ ZA0204', '1000000', 'zaza4.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 20, 15, 'túi xách mang thương hiệu ZARA với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(25, 5, 'Túi Xách Nữ ZA0205', '700000', 'zaza5.jpg', 'hộp,dây đeo,', 'hàng nhập khẩu', '', 15, 10, 'túi xách mang thương hiệu ZARA với chất liệu da mềm mại, thiết kế bắt mắt, tiện lợi'),
(26, 0, '', '1500000', '', '', '', '', 0, 0, ''),
(27, 0, '', '1020000', '', '', '', '', 0, 0, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhgiasp`
--
ALTER TABLE `danhgiasp`
  ADD PRIMARY KEY (`id_bl`);

--
-- Chỉ mục cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `qlthanhvien`
--
ALTER TABLE `qlthanhvien`
  ADD PRIMARY KEY (`id_tv`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhgiasp`
--
ALTER TABLE `danhgiasp`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `qlthanhvien`
--
ALTER TABLE `qlthanhvien`
  MODIFY `id_tv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
