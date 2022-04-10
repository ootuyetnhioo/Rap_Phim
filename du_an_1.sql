-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 10, 2022 lúc 07:26 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dich_vu`
--

CREATE TABLE `dich_vu` (
  `id` int(11) NOT NULL,
  `ten_dich_vu` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gia_dich_vu` decimal(18,2) NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `loai_dich_vu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dich_vu`
--

INSERT INTO `dich_vu` (`id`, `ten_dich_vu`, `gia_dich_vu`, `trang_thai`, `loai_dich_vu_id`) VALUES
(1, 'Bấm Huyệt', '100000.00', 1, 1);

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
-- Cấu trúc bảng cho bảng `ghe_ngoi`
--

CREATE TABLE `ghe_ngoi` (
  `id` int(11) NOT NULL,
  `vi_tri_day` varchar(1) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `vi_tri_cot` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `phong_chieu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ghe_ngoi`
--

INSERT INTO `ghe_ngoi` (`id`, `vi_tri_day`, `vi_tri_cot`, `trang_thai`, `phong_chieu_id`) VALUES
(2563, 'A', 1, 1, 1),
(2564, 'A', 2, 0, 1),
(2565, 'A', 3, 0, 1),
(2566, 'A', 4, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id` int(11) NOT NULL,
  `ngay_ban` date NOT NULL,
  `so_luong_ve` int(11) NOT NULL,
  `so_luong_dich_vu` int(11) NOT NULL,
  `tong_tien` decimal(18,2) NOT NULL,
  `nhan_vien_id` int(11) NOT NULL,
  `dich_vu_id` int(11) NOT NULL,
  `khach_hang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`id`, `ngay_ban`, `so_luong_ve`, `so_luong_dich_vu`, `tong_tien`, `nhan_vien_id`, `dich_vu_id`, `khach_hang_id`) VALUES
(2, '2022-03-18', 2, 2, '20000.00', 2, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `so_cmnd` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `so_dien_thoai` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngay_dang_ky` date NOT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `user_id`, `ho_ten`, `so_cmnd`, `so_dien_thoai`, `email`, `dia_chi`, `ngay_dang_ky`, `ngay_sinh`, `gioi_tinh`) VALUES
(2, 11, 'khach hang1', '1233213123', '12312312312', 'khachhang1@gmail.com', 'Quãng Nam', '2022-04-05', '2022-04-24', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `id` int(11) NOT NULL,
  `ten_khuyen_mai` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `noi_dung` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dieu_kien_dieu_khoan` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `giam_gia` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `phim_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyen_mai`
--

INSERT INTO `khuyen_mai` (`id`, `ten_khuyen_mai`, `hinh_anh`, `noi_dung`, `dieu_kien_dieu_khoan`, `ngay_bat_dau`, `ngay_ket_thuc`, `giam_gia`, `trang_thai`, `phim_id`) VALUES
(1, 'MĂM COMBO, NHẬN NGAY QUÀ TẶNG ẤM ÁP TẠI METIZ CINEMA', 'NOEL_METIZ_2019_GIANG_SINH_AM_AP_WEB-0147.jpg', '<p>M&ugrave;a Gi&aacute;ng sinh n&agrave;y, bạn sẽ kh&ocirc;ng c&ograve;n thấy lạnh lẽo v&igrave; sẽ c&oacute; những m&oacute;n qu&agrave; cực xinh xắn v&agrave; ấm ấp Metiz gửi tặng cho bạn.</p>\r\n\r\n<p>Trong&nbsp;2 ng&agrave;y Thứ Ba (24/12/2019) &ndash; Thứ Tư (25/12/2019), tất cả c&aacute;c kh&aacute;ch h&agrave;ng khi đến xem phim Metiz v&agrave;&nbsp;mua Combo 2,&nbsp;combo 2 extra&nbsp;sẽ được nhận ngay những&nbsp;đ&ocirc;i tất với họa tiết đ&uacute;ng điệu gi&aacute;ng sinh cực kỳ đ&aacute;ng y&ecirc;u&nbsp;lu&ocirc;n n&egrave;.</p>\r\n\r\n<p>Từ l&acirc;u, những đ&ocirc;i tất ch&iacute;nh l&agrave; m&oacute;n qu&agrave; được rất nhiều người lựa chọn d&agrave;nh tặng nhau bởi n&oacute; mang &yacute; nghĩa đầy đặn v&agrave; gửi gắm sự ấm &aacute;p cũng như mang tới những ph&uacute;c l&agrave;nh cho người nhận, v&igrave; vậy, với m&oacute;n qu&agrave; xinh xinh n&agrave;y, sẽ thay Metiz gửi đến bạn lời ch&uacute;c một m&ugrave;a Gi&aacute;ng sinh thật an l&agrave;nh, ấm &aacute;p v&agrave; kh&ocirc;ng c&ocirc; đơn nh&eacute;.</p>', '<p>Chương tr&igrave;nh &aacute;p dụng cho kh&aacute;ch h&agrave;ng đến xem phim tại Metiz Cinema v&agrave; mua combo 2, combo 2 extra.</p>\r\n\r\n<p>Chương tr&igrave;nh chỉ &aacute;p dụng cho h&igrave;nh thức mua trực tiếp tại quầy.</p>\r\n\r\n<p>Thời gian &aacute;p dụng chương tr&igrave;nh:&nbsp;Thứ Ba (24/12/2019) &ndash; Thứ Tư (25/12/2019)</p>\r\n\r\n<p>Chương tr&igrave;nh sẽ kết th&uacute;c sớm khi qu&agrave; tặng hết.</p>\r\n\r\n<p>Nh&acirc;n vi&ecirc;n của Metiz Cinema kh&ocirc;ng được tham gia chương tr&igrave;nh n&agrave;y.</p>\r\n\r\n<p>Trong mọi trường hợp, quyết định của Metiz Cinema l&agrave; quyết định cuối c&ugrave;ng.</p>', '2020-12-25', '2020-12-25', 10, 0, 3),
(2, 'XEM PHIM METIZ NHẬN KẸO CÒN KHÔNG BỊ GHẸO DỊP LỄ HALLOWEEN', 'HALLOWEEN_2019_WEB-012.jpg', '<p>B&ecirc;n cạnh rất nhiều bộ phim kinh dị cực hot v&agrave;o m&ugrave;a lễ Halloween, khi đến Metiz Cinema xem phim nh&acirc;n dịp ng&agrave;y lễ ma qu&aacute;i n&agrave;y c&ograve;n được nhận những vi&ecirc;n kẹo ma qu&aacute;i dễ thương từ Metiz nữa đấy.</p>\r\n\r\n<p>Duy nhất v&agrave;o ng&agrave;y 31.10, tất cả c&aacute;c kh&aacute;ch h&agrave;ng đến giao dịch mua v&eacute; xem phim Metiz vừa được nhận kẹo, vừa kh&ocirc;ng bị ghẹo lu&ocirc;n nh&eacute;.</p>', '<p>Đối tượng khuyến mại:&nbsp;Chương tr&igrave;nh &aacute;p dụng cho tất cả c&aacute;c kh&aacute;ch h&agrave;ng đến xem phim tại Metiz Cinema. (C&oacute; thẻ th&agrave;nh vi&ecirc;n v&agrave; kh&ocirc;ng c&oacute; thẻ th&agrave;nh vi&ecirc;n)</p>\r\n\r\n<p>Chương tr&igrave;nh được&nbsp;&aacute;p dụng duy nhất v&agrave;o Thứ 5 (31/10/2019).</p>\r\n\r\n<p>Chương tr&igrave;nh chỉ &aacute;p dụng cho h&igrave;nh thức mua v&eacute; trực tiếp tại quầy.</p>\r\n\r\n<p>Chương tr&igrave;nh sẽ kết th&uacute;c sớm khi qu&agrave; tặng hết.</p>\r\n\r\n<p>Trong mọi trường hợp, mọi quyết định của Metiz Cinema l&agrave; quyết định cuối c&ugrave;ng.</p>', '2019-10-31', '2019-10-31', 15, 0, 2),
(3, 'XEM PHIM METIZ, NHẬN QUÀ NGỌT NGÀO DỊP LỄ 20/10', '2018.jpg', '<p>Để ch&agrave;o đ&oacute;n ng&agrave;y cả thế giới hướng về phụ nữ, hướng về một nửa thế giới xinh xắn v&agrave; tuyệt vời, Metiz mang đến chương tr&igrave;nh&nbsp;XEM PHIM METIZ, NHẬN QU&Agrave; NGỌT NG&Agrave;O, d&agrave;nh tặng 200 chiếc t&uacute;i thơm cho c&aacute;c kh&aacute;ch h&agrave;ng nữ đến Metiz xem phim v&agrave;o dịp lễ 20/10 n&agrave;y.</p>\r\n\r\n<p>V&agrave;o&nbsp;chủ nhật ng&agrave;y 20/10/2019, 200 bạn nữ đầu ti&ecirc;n khi đến xem phim tại Metiz sẽ được nhận&nbsp;phần qu&agrave; l&agrave; những chiếc t&uacute;i thơm Lavender xinh xắn.</p>\r\n\r\n<p>Hy vọng m&oacute;n qu&agrave; n&agrave;y sẽ thay Metiz gửi đến tất cả c&aacute;c c&ocirc; g&aacute;i một ng&agrave;y lễ 20/10 &yacute; nghĩa v&agrave; tuyệt vời b&ecirc;n người th&acirc;n, người y&ecirc;u v&agrave; bạn b&egrave; nh&eacute;.</p>', '<p>- Chương tr&igrave;nh &aacute;p dụng cho tất cả c&aacute;c kh&aacute;ch h&agrave;ng đến xem phim - mua v&eacute; xem phim tại quầy Box Metiz Cinema.</p>\r\n\r\n<p>- Chương tr&igrave;nh &aacute;p dụng cho&nbsp;200 kh&aacute;ch h&agrave;ng nữ đầu ti&ecirc;n đến xem phim tại Metiz Cinema.</p>\r\n\r\n<p>-&nbsp;Thời gian &aacute;p dụng chương tr&igrave;nh duy nhất v&agrave;o Chủ nhật ng&agrave;y 20.10.2019</p>\r\n\r\n<p>- Chương tr&igrave;nh chỉ &aacute;p dụng cho h&igrave;nh thức mua trực tiếp tại quầy.</p>\r\n\r\n<p>- Chương tr&igrave;nh sẽ kết th&uacute;c sớm nếu hết qu&agrave; tặng.</p>\r\n\r\n<p>- Nh&acirc;n vi&ecirc;n của Metiz Cinema kh&ocirc;ng được tham gia chương tr&igrave;nh n&agrave;y.</p>\r\n\r\n<p>- Trong mọi trường hợp, quyết định của Metiz Cinema l&agrave; quyết định cuối c&ugrave;ng.</p>', '2022-03-23', '2022-03-23', 5, 0, 1),
(4, 'XEM PHIM METIZ, RƯỚC LỒNG ĐÈN XINH', 'METIZ_TRUNG_THU_2019_WEB-0118.jpg', '<p>Những ng&agrave;y n&agrave;y, kh&ocirc;ng kh&iacute; Trung thu nhộn nhịp đang đến thật gần. V&agrave; để ch&agrave;o đ&oacute;n m&ugrave;a trăng tr&ograve;n 2019, Metiz mang đến chương tr&igrave;nh&nbsp;XEM PHIM METIZ, RƯỚC LỒNG Đ&Egrave;N XINH&nbsp;d&agrave;nh tặng cho kh&aacute;ch đến Metiz xem phim v&agrave;o Trung thu n&agrave;y.</p>\r\n\r\n<p>V&agrave;o&nbsp;<strong>Thứ S&aacute;u ng&agrave;y 13/09/2019</strong>, c&aacute;c kh&aacute;ch h&agrave;ng khi đến xem phim tại Metiz sẽ được nhận một chiếc lồng đ&egrave;n Trung Thu xinh xắn.</p>\r\n\r\n<p>Hy vọng những chiếc lồng đ&egrave;n nhỏ xinh sẽ l&agrave; thay lời Metiz ch&uacute;c cho c&aacute;c bạn một m&ugrave;a Trung thu thật ấm &aacute;p v&agrave; &yacute; nghĩa b&ecirc;n người th&acirc;n v&agrave; bạn b&egrave;.</p>', '<p>- Chương tr&igrave;nh &aacute;p dụng cho tất cả c&aacute;c kh&aacute;ch h&agrave;ng đến xem phim - mua v&eacute; xem phim tại quầy Box Metiz Cinema.</p>\r\n\r\n<p>- Chương tr&igrave;nh được &aacute;p dụng&nbsp;duy nhất v&agrave;o Thứ S&aacute;u (13/9/2019).</p>\r\n\r\n<p>- Chương tr&igrave;nh chỉ &aacute;p dụng cho&nbsp;h&igrave;nh thức mua trực tiếp tại quầy.</p>\r\n\r\n<p>- Chương tr&igrave;nh sẽ kết th&uacute;c sớm nếu qu&agrave; tặng hết.</p>\r\n\r\n<p>- Nh&acirc;n vi&ecirc;n của Metiz Cinema kh&ocirc;ng được tham gia chương tr&igrave;nh n&agrave;y.</p>\r\n\r\n<p>- Trong mọi trường hợp, mọi quyết định của Metiz Cinema l&agrave; quyết định cuối c&ugrave;ng.</p>', '2019-09-13', '2019-09-13', 20, 0, 1),
(6, 'SUPER MONDAY (THỨ HAI SIÊU HẠNG)', 'KM_SUPER__MONDAY_MEDIA-0272.jpg', '<p>H&atilde;y đến Metiz Cinema để khởi động&nbsp;<strong>ng&agrave;y</strong>&nbsp;<strong>THỨ HAI MỖI TUẦN</strong><strong>&nbsp;</strong>thật nhiều năng lượng v&agrave; tr&agrave;n đầy cảm x&uacute;c c&aacute;c bạn nh&eacute;!<br />\r\nGạt bỏ nỗi &aacute;m ảnh đầu tuần bằng năng lượng SI&Ecirc;U NH&Acirc;N v&agrave; biến thứ Hai trở th&agrave;nh một ng&agrave;y SI&Ecirc;U HẠNG c&ugrave;ng những bộ phim hay với gi&aacute; cực kỳ ưu đ&atilde;i 45.000 đồng/ v&eacute; 2D, 50.000 đồng/ v&eacute; 3D.</p>', '<p>1. Chương tr&igrave;nh &aacute;p dụng cho th&agrave;nh vi&ecirc;n Metiz Cinema. Vui l&ograve;ng xuất tr&igrave;nh thẻ th&agrave;nh vi&ecirc;n trước khi mua v&eacute; để được gi&aacute; ưu đ&atilde;i &amp; t&iacute;ch lũy điểm thưởng.<br />\r\n2. Một kh&aacute;ch h&agrave;ng c&oacute; thể mua nhiều v&eacute;.<br />\r\n3. &Aacute;p dụng cho h&igrave;nh thức mua v&eacute; trực tiếp tại rạp.<br />\r\n4. Gi&aacute; v&eacute; &aacute;p dụng cho ghế thường, ghế VIP v&agrave; ghế đ&ocirc;i.<br />\r\n5. Gi&aacute; v&eacute; kh&ocirc;ng &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y lễ, Tết, suất chiếu đặc biệt, suất chiếu sớm.<br />\r\n6. Kh&ocirc;ng &aacute;p dụng c&ugrave;ng c&aacute;c chương tr&igrave;nh khuyến m&atilde;i kh&aacute;c.<br />\r\n7. Trong mọi trường hợp, mọi quyết định của Metiz Cinema l&agrave; quyết định cuối c&ugrave;ng.</p>', '2021-12-31', '2021-12-31', 20, 0, 1),
(7, 'XEM PHIM NHẬN 1000 PHẦN QUÀ CHO 8/3 THÊM XINH', '878.jpg', '<p>B&ecirc;n cạnh bộ phim đang&nbsp;cực&nbsp;hot tại rạp trong th&aacute;ng 3, khi đến Metiz Cinema nh&acirc;n dịp ng&agrave;y 8/3 c&aacute;c t&iacute;n đồ m&agrave;n ảnh rộng sẽ c&oacute; cơ hội tham gia chương tr&igrave;nh khuyến m&atilde;i hấp dẫn của Metiz.</p>\r\n\r\n<p>Tặng 1000 phần qu&agrave; 8/3 cho kh&aacute;ch h&agrave;ng nữ khi đến xem phim tại rạp, chương tr&igrave;nh chỉ &aacute;p dụng duy nhất trong ng&agrave;y 8/3.</p>', '<p>Đối tượng khuyến mại:&nbsp; Kh&aacute;ch h&agrave;ng nữ đến xem phim tại Metiz Cinema&nbsp;(C&oacute; thẻ th&agrave;nh vi&ecirc;n v&agrave; kh&ocirc;ng c&oacute; thẻ th&agrave;nh vi&ecirc;n)</p>\r\n\r\n<p>Chương tr&igrave;nh &aacute;p dụng cho tất cả&nbsp; c&aacute;c kh&aacute;ch h&agrave;ng&nbsp; nữ&nbsp; đến xem phim&nbsp; -&nbsp; mua v&eacute; xem phim&nbsp; tại Metiz Cinema.</p>\r\n\r\n<p>Chương tr&igrave;nh được &aacute;p dụng duy nhất v&agrave;o Thứ S&aacute;u (08/3/2019).</p>\r\n\r\n<p>Chương tr&igrave;nh chỉ &aacute;p dụng cho h&igrave;nh thức mua trực tiếp tại quầy.</p>\r\n\r\n<p>Chương tr&igrave;nh sẽ kết th&uacute;c sớm nếu qu&agrave; tặng hết.</p>\r\n\r\n<p>Nh&acirc;n vi&ecirc;n của Metiz Cinema kh&ocirc;ng được tham gia chương tr&igrave;nh n&agrave;y.</p>\r\n\r\n<p>Trong mọi trường hợp, mọi quyết định của Metiz Cinema l&agrave; quyết định cuối c&ugrave;ng.</p>', '2019-03-08', '2019-03-08', 5, 0, 1),
(8, 'VALENTINE ĐẾN METIZ XEM PHIM RINH GẤU', 'tang_moc_khoa87.jpg', '<p>Lễ t&igrave;nh nh&acirc;n Valentine 14/2 năm nay bạn đ&atilde; c&oacute; &yacute; tưởng g&igrave; chưa? Nếu chưa th&igrave; đưa &quot;một nửa th&acirc;n y&ecirc;u&quot; của m&igrave;nh đến Metiz xem phim sẵn tiện rinh lu&ocirc;n một em gấu b&eacute; b&eacute;, xinh xinh&nbsp;về n&agrave;o.</p>\r\n\r\n<p>Duy nhất trong ng&agrave;y Valentine 14/2/2019, tất cả c&aacute;c kh&aacute;ch h&agrave;ng khi đến xem phim tại Metiz Cinema&nbsp;mua v&eacute; xem phim ghế Sweetbox sẽ được tặng 1&nbsp;m&oacute;c kh&oacute;a th&uacute; b&ocirc;ng v&ocirc; c&ugrave;ng dễ thương.</p>', '<p>- Chương tr&igrave;nh &aacute;p dụng cho tất cả c&aacute;c kh&aacute;ch h&agrave;ng đến xem phim tại Metiz Cinema.&nbsp;</p>\r\n\r\n<p>- Chương tr&igrave;nh được &aacute;p dụng duy nhất v&agrave;o&nbsp;Thứ năm (14/02/2019).</p>\r\n\r\n<p>- Chương tr&igrave;nh chỉ &aacute;p dụng cho h&igrave;nh thức mua trực tiếp tại quầy.</p>\r\n\r\n<p>- Với mỗi một h&oacute;a đơn/ mua v&eacute; xem phim ghế Sweetbox, kh&aacute;ch h&agrave;ng sẽ nhận được 01 m&oacute;c kh&oacute;a th&uacute; b&ocirc;ng.</p>\r\n\r\n<p>- Nh&acirc;n vi&ecirc;n của Metiz Cinema kh&ocirc;ng được tham gia chương tr&igrave;nh n&agrave;y.</p>\r\n\r\n<p>- Trong mọi trường hợp, mọi quyết định của Metiz Cinema l&agrave; quyết định cuối c&ugrave;ng.</p>', '2019-02-14', '2019-02-14', 20, 0, 2),
(9, 'TẾT XEM PHIM HAY, NHẬN LỘC LIỀN TAY', 'TET_2019_METIZ_WEB-0142.jpg', '<p>Trong kh&ocirc;ng kh&iacute; tưng bừng ch&agrave;o đ&oacute;n năm mới Kỷ Hợi, Metiz xin gửi đến 100 bao l&igrave; x&igrave; may mắn cho 100 kh&aacute;ch h&agrave;ng &ldquo;x&ocirc;ng đất&rdquo; đầu ti&ecirc;n mua 02 v&eacute; xem phim bất kỳ tại Metiz Cinema v&agrave;o ng&agrave;y&nbsp;Thứ ba (05/02/2019) &ndash; M&ugrave;ng 01 &acirc;m lịch.</p>', '<p>Chương tr&igrave;nh &aacute;p dụng cho tất cả c&aacute;c kh&aacute;ch h&agrave;ng đến xem phim tại Metiz Cinema. &nbsp;</p>\r\n\r\n<p>Chương tr&igrave;nh được &aacute;p dụng duy nhất v&agrave;o Thứ ba (05/02/2019) - m&ugrave;ng 1 Tết &acirc;m lịch</p>\r\n\r\n<p>Chương tr&igrave;nh chỉ &aacute;p dụng cho 100 kh&aacute;ch h&agrave;ng đầu ti&ecirc;n đủ điều kiện.</p>\r\n\r\n<p>Chương tr&igrave;nh chỉ &aacute;p dụng cho h&igrave;nh thức mua trực tiếp tại quầy.</p>\r\n\r\n<p>Với mỗi một h&oacute;a đơn mua 02 v&eacute; xem phim, kh&aacute;ch h&agrave;ng sẽ nhận được 01 phong b&igrave; l&igrave; x&igrave; c&oacute; phiếu qu&agrave; tặng.&nbsp;</p>\r\n\r\n<p>Phiếu qu&agrave; tặng hợp lệ c&oacute; con dấu của c&ocirc;ng ty TNHH Khởi Ph&aacute;t v&agrave; kh&ocirc;ng được chấp nhận trong trường hợp r&aacute;ch, rời, tẩy x&oacute;a hay chắp v&aacute;.&nbsp;</p>\r\n\r\n<p>Qu&agrave; tặng chỉ được sử dụng 01 lần cho 01 đơn h&agrave;ng duy nhất, kh&ocirc;ng được chuyển nhượng v&agrave; kh&ocirc;ng được quy đổi th&agrave;nh tiền mặt.</p>\r\n\r\n<p>Nh&acirc;n vi&ecirc;n của Metiz Cinema kh&ocirc;ng được tham gia chương tr&igrave;nh n&agrave;y.</p>\r\n\r\n<p>Trong mọi trường hợp, mọi quyết định của Metiz Cinema l&agrave; quyết định cuối c&ugrave;ng.</p>', '2019-02-05', '2019-02-05', 20, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_dich_vu`
--

CREATE TABLE `loai_dich_vu` (
  `id` int(11) NOT NULL,
  `ten_dich_vu` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_dich_vu`
--

INSERT INTO `loai_dich_vu` (`id`, `ten_dich_vu`) VALUES
(1, 'Mát Xa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_phim`
--

CREATE TABLE `loai_phim` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_phim`
--

INSERT INTO `loai_phim` (`id`, `ten`) VALUES
(1, 'Hành Động'),
(2, 'Lãng Mạn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ma_xac_nhan`
--

CREATE TABLE `ma_xac_nhan` (
  `nhan_vien_id` int(11) NOT NULL,
  `ma_xac_nhan` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `so_cmnd` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `so_dien_thoai` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngay_vao_lam` date NOT NULL,
  `gioi_tinh` int(11) NOT NULL,
  `dang_lam` int(11) NOT NULL,
  `hinh_anh` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `da_xoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `user_id`, `ho_ten`, `so_cmnd`, `so_dien_thoai`, `email`, `dia_chi`, `ngay_vao_lam`, `gioi_tinh`, `dang_lam`, `hinh_anh`, `da_xoa`) VALUES
(2, 10, 'Group FB Tử Vi Việt Nam', '123123123', '231321312132', 'thienphan@gmail.com', 'quang nam', '2022-03-17', 1, 0, '1.png', 0);

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
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `thoi_luong` int(11) NOT NULL,
  `gioi_han_tuoi` int(11) NOT NULL,
  `ngay_cong_chieu` date NOT NULL,
  `ngon_ngu` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dien_vien` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `quoc_gia` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `nha_san_xuat` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tom_tat` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `da_xoa` int(11) NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `loai_phim_id` int(11) NOT NULL,
  `gia_tien` int(11) NOT NULL,
  `trailer` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`id`, `ten`, `thoi_luong`, `gioi_han_tuoi`, `ngay_cong_chieu`, `ngon_ngu`, `dien_vien`, `quoc_gia`, `nha_san_xuat`, `tom_tat`, `trang_thai`, `da_xoa`, `hinh_anh`, `loai_phim_id`, `gia_tien`, `trailer`) VALUES
(1, '3 Chang Linh Ngu Lam', 90, 18, '2022-03-01', 'viet', 'Pham Bang Bang', 'Viet', 'sdgsdrg', 'dgsrgrg', 1, 0, '1649462190.jpg', 1, 100000, 'https://www.youtube.com/embed/2OlmsBI6aHw'),
(2, 'Mắt Biếc', 90, 13, '2022-03-15', 'Việt', 'Trần Nghĩa,Trúc Anh,Trần Phong', 'Việt', 'sergserg', 'Đi qua những đau khổ và phản bội, mối tình đơn phương của Ngạn dành cho cô bạn thân thời thơ ấu Hà Lan kéo dài cả một thế hệ trong bộ phim siêu lãng mạn này.', 1, 0, '1649462362.jpg', 1, 20000, 'https://www.youtube.com/embed/KSFS0OfIK2c'),
(3, 'hương mật tựa khói sương', 90, 15, '2022-03-19', 'Viet', 'Pham Bang Bang', 'Viet', 'Cam My', 'Hương Mật Tựa Khói Sương là câu chuyện tình yêu lãng mạn có ngọt ngào, có đau thương và thật sự sâu sắc. Với lối viết logic, hài hước và vô cùng hấp dẫn, tác giả Điện Tuyến đã mở ra một cánh cửa cho độc giả đi vào thế giới của thần tiên.', 1, 0, 'anh-dep-hoa-huong-duong-va-mat-troi_022805970-1-1181x800-6.jpg', 2, 200000, 'https://www.youtube.com/embed/EFPN8G7wONQ'),
(4, 'MORBIUS', 105, 16, '2022-03-30', 'Viet', 'Jared Leto, Michael Keaton, Adria Arjona', 'Viet', 'Daniel Espinosa', 'Morbius là một nhà khoa học tìm cách chữa căn bệnh “rối loạn máu” của mình. Tuy nhiên, mọi chuyện lại không đi đúng hướng khi vị giáo sư phải trả giá khi bị nhiễm một loại virus khát máu và trở thành một sinh vật nửa người, nửa ma cà rồng.', 1, 0, 'morbius_montageposter_fb_4x5_1_.jpg', 1, 1000000, 'https://www.youtube.com/embed/oZ6iiRrz1SY'),
(5, 'BÓNG ĐÈ', 100, 18, '2022-03-17', 'Viet', 'Lâm Thanh Mỹ, Quang Tuấn, Mai Cát Vi, Diệu Nhi', 'Viet', 'Lê Văn Kiệt', 'Bóng đè là trải nghiệm xảy ra khi tâm trí đã thức giấc nhưng cơ thể vẫn còn trong giấc ngủ. Đa số trường hợp không thể phân biệt được giữa thực và mơ. Theo thống kê, 40% dân số thế giới từng bị bóng đè ít nhất một lần trong đời. BÓNG ĐÈ- phim điện ảnh Việt đầu tiên khai thác về hiện tượng bóng đè, cầm trịch bởi Lê Văn Kiệt – đạo diễn Hai Phượng. Chuyển đến một căn nhà cổ ở vùng quê, ba cha con Thành (Quang Tuấn), Linh (Lâm Thanh Mỹ) và Yến (Mai Cát Vi) hy vọng về một cuộc sống mới. Nhưng chào đón họ là hàng loạt những hiện tượng kỳ dị ập đến mỗi khi chìm vào giấc ngủ ... Giờ lành đã điểm, quỷ dữ thức giấc ...', 1, 0, '274000748_303942525050235_5319815067182769032_n.jpg', 1, 500000, 'https://www.youtube.com/embed/mGLL_ylu8IU'),
(6, 'THÀNH PHỐ MẤT TÍCH', 115, 13, '2022-03-25', 'Viet', 'Sandra Bullock, Channing Tatum, Daniel Radcliffe, Brad Pitt, etc.', 'Viet', 'Aaron Nee, Adam Nee', 'Một tác giả tiểu thuyết lãng mạn cùng người mẫu bìa sách của cô bị cuốn vào một âm mưu bắt cóc dẫn đến hành trình phiêu lưu bá đạo nơi rừng rậm.', 1, 0, 'poster_th_nh_ph_m_t_t_ch_-_25.03.2022_1_.jpg', 1, 75000, 'https://www.youtube.com/embed/WP4cYvo_AhU'),
(7, 'VẾT NỨT - ÁM HỒN TRONG TRANH', 95, 18, '2022-03-25', 'Viet', 'Nichkhun, Pat Chayanit Chansangav, Sahajak Boonthanakit,,…', 'Viet', 'Top Surapong Plernsaeng', 'Phim kinh dị của Thái với nội dung kể về cuộc đời Ruja là con gái của người họa sĩ lỗi lạc đã tự tử nhiều năm trước. Cô tìm đến Tim, một nhà phục chế nghệ thuật để sửa chữa những bức tranh thừa hưởng từ bố, nhưng sau đó cả hai đã bị mắc kẹt trong cuộc hành trình nguy hiểm.', 1, 0, 'cracked_poster_1200wx1800h_1_.jpg', 1, 50000, 'https://www.youtube.com/embed/Kz-BNZ43RrY'),
(8, 'NHÍM SONIC 2', 120, 13, '2022-04-09', 'Viet', 'Ben Schwartz, Idris Elba, Jim Carrey, James Marsden, Tika Sumpter', 'Viet', 'Jeff Fowler', 'Khi Robotnik tìm cách quay trở về Trái Đất thành công, ông ta có một đồng minh mới là Knuckles hùng mạnh, liệu Sonic và người bạn ới Tails có thể ngăn chặn được âm mưu điên rồi để cứu lấy thế giới?', 0, 0, 'nh_m_sonic_2_poster_1_.jpg', 1, 50000, 'https://www.youtube.com/embed/G1Mrk6pFqVI'),
(9, 'JUJUTSU KAISEN 0: CHÚ THUẬT HỒI CHIẾN', 120, 15, '2022-04-15', 'Viet', 'Hanazawa Kana, Nakamura Yuichi, Uchiyama Koki,…', 'Viet', 'Sunghoo Park', 'Yuta Okkotsu, một học sinh trung học giành được quyền kiểm soát một Linh hồn bị nguyền rủa cực kỳ mạnh mẽ và được Jujutsu Sorcerers đăng ký vào trường trung học Jujutsu tỉnh Tokyo để giúp anh ta kiểm soát sức mạnh của mình và để mắt đến anh ta.', 0, 0, 'poster_jujutsu_kaisen_1_.jpg', 1, 50000, 'https://www.youtube.com/embed/caIKd7qjd9U'),
(10, 'NGÔI ĐỀN KỲ QUÁI 3', 120, 18, '2022-04-15', 'VIet', 'Phiravich Attachitsataporn, Sim Kyutae Pond, Khunnapat Pichetworawut', 'Viet', 'Phontharis Chotkijsadarsopon', 'Hội tạo nghiệp tụ tập nhau đến dự lễ xuất gia của Aod nhưng phải hoãn lại do lời nguyền từ chiếc lắc chân xuất hiện. Min Jun, Balloon, First phải chạy đua với thời gian để tìm ra cách giải lời nguyền trước khi quỷ dữ đến lấy mạng Aod.', 0, 0, '277673089_1192934964443919_1162497775423605940_n.jpg', 1, 50000, 'https://www.youtube.com/embed/wNgkxBJlBIY'),
(11, 'THANH SÓI', 90, 15, '2022-04-22', 'Viet', 'Đồng Ánh Quỳnh, Tóc Tiên, Rima Thanh Vy, Thuận Nguyễn, Song Luân', 'Viet', 'Ngô Thanh Vân, Aaron Toronto', 'Bộ phim Thanh Sói là một tác phẩm điện ảnh hành động thuộc \"vũ trụ\" Hai Phượng. Phim là câu chuyện về thời trẻ của nữ trùm Thanh Sói với hướng khai thác thú vị và niềm tin rằng tất cả nhân vật xấu đều xuất phát từ lý do nào đó. Nỗi đau có thể thay đổi tất cả.', 0, 0, '276132479_4937651012977184_5678275802048877605_n.jpg', 1, 50000, 'https://www.youtube.com/embed/lVBgekemG9E');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_chieu`
--

CREATE TABLE `phong_chieu` (
  `id` int(11) NOT NULL,
  `so_luong_day` int(11) NOT NULL,
  `so_luong_cot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_chieu`
--

INSERT INTO `phong_chieu` (`id`, `so_luong_day`, `so_luong_cot`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suat_chieu`
--

CREATE TABLE `suat_chieu` (
  `id` int(11) NOT NULL,
  `gio_bat_dau` timestamp NOT NULL DEFAULT current_timestamp(),
  `gio_ket_thuc` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_chieu` date NOT NULL,
  `phim_id` int(11) NOT NULL,
  `phong_chieu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `suat_chieu`
--

INSERT INTO `suat_chieu` (`id`, `gio_bat_dau`, `gio_ket_thuc`, `ngay_chieu`, `phim_id`, `phong_chieu_id`) VALUES
(1, '2022-03-01 00:52:26', '2022-03-01 00:52:26', '2022-03-01', 1, 1);

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
  `rolename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `rolename`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'le quoc dat', 'quocdat3b@yahoo.com.vn', NULL, '$2y$10$0O1MvrdP8McdVHPtj20oVuqsNxDScxwe6dk/q4U8S8TFuV26.EsYS', 'admin', NULL, NULL, NULL),
(10, 'Group FB Tử Vi Việt Nam', 'thienphan@gmail.com', NULL, '123123123', 'sale', NULL, '2022-03-16 23:51:06', '2022-03-16 23:51:06'),
(11, 'khach hang 1', 'khachhang1@gmail.com', NULL, '123123123', 'customer', NULL, NULL, NULL),
(13, 'Phan Văn Thiên', 'phanvanthien.ha@gmail.com', NULL, '$2y$10$zd5z6vQo4Lw5si9sHoMf8upgTIiTLouS.OWFierOiuZ30fZGeBY.S', 'admin', NULL, NULL, NULL),
(14, 'Phan Văn Thiên', 'thien1@gmail.com', NULL, '$2y$10$NCfu8oPuLwMcHdNHKL4cVuaamni9IgNE8H81VyFdwz9kqjQBprhMi', 'Thanh Vien', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ve_dat`
--

CREATE TABLE `ve_dat` (
  `id` int(11) NOT NULL,
  `ngay_ban` date NOT NULL,
  `tong_tien` decimal(18,2) NOT NULL,
  `suat_chieu_id` int(11) NOT NULL,
  `ghe_id` int(11) NOT NULL,
  `nhan_vien_id` int(11) NOT NULL,
  `hoa_don_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ve_dat`
--

INSERT INTO `ve_dat` (`id`, `ngay_ban`, `tong_tien`, `suat_chieu_id`, `ghe_id`, `nhan_vien_id`, `hoa_don_id`) VALUES
(16, '2022-03-17', '20000.00', 1, 2564, 2, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dich_vu`
--
ALTER TABLE `dich_vu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loai_dich_vu_id` (`loai_dich_vu_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `ghe_ngoi`
--
ALTER TABLE `ghe_ngoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phong_chieu_id` (`phong_chieu_id`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhan_vien_id` (`nhan_vien_id`,`dich_vu_id`),
  ADD KEY `dich_vu_id` (`dich_vu_id`),
  ADD KEY `khach_hang_id map khach_hang` (`khach_hang_id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phim_id` (`phim_id`);

--
-- Chỉ mục cho bảng `loai_dich_vu`
--
ALTER TABLE `loai_dich_vu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_phim`
--
ALTER TABLE `loai_phim`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ma_xac_nhan`
--
ALTER TABLE `ma_xac_nhan`
  ADD PRIMARY KEY (`nhan_vien_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loai_phim_id` (`loai_phim_id`);

--
-- Chỉ mục cho bảng `phong_chieu`
--
ALTER TABLE `phong_chieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suat_chieu`
--
ALTER TABLE `suat_chieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phim_id` (`phim_id`,`phong_chieu_id`),
  ADD KEY `phong_chieu_id` (`phong_chieu_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `ve_dat`
--
ALTER TABLE `ve_dat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhan_vien_id` (`nhan_vien_id`),
  ADD KEY `ghe_id` (`ghe_id`),
  ADD KEY `ghe_id_2` (`ghe_id`) USING BTREE,
  ADD KEY `suat_chieu_id` (`suat_chieu_id`,`ghe_id`,`nhan_vien_id`) USING BTREE,
  ADD KEY `hoa_don_id map hoa_don` (`hoa_don_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dich_vu`
--
ALTER TABLE `dich_vu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ghe_ngoi`
--
ALTER TABLE `ghe_ngoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2567;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `loai_dich_vu`
--
ALTER TABLE `loai_dich_vu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `loai_phim`
--
ALTER TABLE `loai_phim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `ma_xac_nhan`
--
ALTER TABLE `ma_xac_nhan`
  MODIFY `nhan_vien_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `phong_chieu`
--
ALTER TABLE `phong_chieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `suat_chieu`
--
ALTER TABLE `suat_chieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `ve_dat`
--
ALTER TABLE `ve_dat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dich_vu`
--
ALTER TABLE `dich_vu`
  ADD CONSTRAINT `dich_vu_ibfk_1` FOREIGN KEY (`loai_dich_vu_id`) REFERENCES `loai_dich_vu` (`id`);

--
-- Các ràng buộc cho bảng `ghe_ngoi`
--
ALTER TABLE `ghe_ngoi`
  ADD CONSTRAINT `ghe_ngoi_ibfk_1` FOREIGN KEY (`phong_chieu_id`) REFERENCES `phong_chieu` (`id`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`dich_vu_id`) REFERENCES `dich_vu` (`id`),
  ADD CONSTRAINT `hoa_don_ibfk_2` FOREIGN KEY (`nhan_vien_id`) REFERENCES `nhanvien` (`id`),
  ADD CONSTRAINT `khach_hang_id map khach_hang` FOREIGN KEY (`khach_hang_id`) REFERENCES `khach_hang` (`id`);

--
-- Các ràng buộc cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD CONSTRAINT `khach_hang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD CONSTRAINT `khuyen_mai_ibfk_1` FOREIGN KEY (`phim_id`) REFERENCES `phim` (`id`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `phim_ibfk_1` FOREIGN KEY (`loai_phim_id`) REFERENCES `loai_phim` (`id`);

--
-- Các ràng buộc cho bảng `suat_chieu`
--
ALTER TABLE `suat_chieu`
  ADD CONSTRAINT `suat_chieu_ibfk_1` FOREIGN KEY (`phong_chieu_id`) REFERENCES `phong_chieu` (`id`),
  ADD CONSTRAINT `suat_chieu_ibfk_2` FOREIGN KEY (`phim_id`) REFERENCES `phim` (`id`);

--
-- Các ràng buộc cho bảng `ve_dat`
--
ALTER TABLE `ve_dat`
  ADD CONSTRAINT `hoa_don_id map hoa_don` FOREIGN KEY (`hoa_don_id`) REFERENCES `hoa_don` (`id`),
  ADD CONSTRAINT `ve_dat_ibfk_2` FOREIGN KEY (`nhan_vien_id`) REFERENCES `nhanvien` (`id`),
  ADD CONSTRAINT `ve_dat_ibfk_3` FOREIGN KEY (`suat_chieu_id`) REFERENCES `suat_chieu` (`id`),
  ADD CONSTRAINT `ve_dat_ibfk_4` FOREIGN KEY (`ghe_id`) REFERENCES `ghe_ngoi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
