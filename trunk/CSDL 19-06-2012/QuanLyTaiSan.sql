-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2012 at 04:48 PM
-- Server version: 5.5.10
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quanlytaisan`
--

-- --------------------------------------------------------

--
-- Table structure for table `codd`
--

CREATE TABLE IF NOT EXISTS `codd` (
  `MaVPP` char(10) NOT NULL,
  `MoTaDD` varchar(100) NOT NULL,
  `ChiTietVPP` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`MaVPP`,`MoTaDD`),
  KEY `FK_CoDD2` (`MoTaDD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `codd`
--

INSERT INTO `codd` (`MaVPP`, `MoTaDD`, `ChiTietVPP`) VALUES
('1', 'Phù hợp', 'Giấy mỏng'),
('2', 'Không phù hợp', 'Các loại máy in phun');

-- --------------------------------------------------------

--
-- Table structure for table `conoidung`
--

CREATE TABLE IF NOT EXISTS `conoidung` (
  `MaPhieuKiemKe` char(10) NOT NULL,
  `MaND` char(10) NOT NULL,
  `MaTaiSan` char(10) NOT NULL,
  `ChiTietND` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MaPhieuKiemKe`,`MaND`,`MaTaiSan`),
  KEY `FK_CoNoiDung2` (`MaND`),
  KEY `FK_CoNoiDung3` (`MaTaiSan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conoidung`
--


-- --------------------------------------------------------

--
-- Table structure for table `cophieumau`
--

CREATE TABLE IF NOT EXISTS `cophieumau` (
  `MaPhieuKiemKe` char(10) NOT NULL,
  `MaPhieu` char(10) NOT NULL,
  PRIMARY KEY (`MaPhieuKiemKe`,`MaPhieu`),
  KEY `FK_CoPhieuMau2` (`MaPhieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cophieumau`
--


-- --------------------------------------------------------

--
-- Table structure for table `coquyen`
--

CREATE TABLE IF NOT EXISTS `coquyen` (
  `MSCB` char(7) NOT NULL,
  `MaQuyen` char(10) NOT NULL,
  PRIMARY KEY (`MSCB`,`MaQuyen`),
  KEY `FK_CoQuyen2` (`MaQuyen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coquyen`
--

INSERT INTO `coquyen` (`MSCB`, `MaQuyen`) VALUES
('1069', 'CBQLBM'),
('1081677', 'ADMIN'),
('1081677', 'DUYETKHMS'),
('1081677', 'DUYETKK'),
('1081677', 'DUYETVPP'),
('1081677', 'SUAKHMS'),
('1081677', 'SUAKK'),
('1081677', 'SUAVPP'),
('1081677', 'THEMKHMS'),
('1081677', 'THEMKK'),
('1081677', 'THEMVPP'),
('1090090', 'ADMIN'),
('1090090', 'CBQLBM'),
('1090090', 'DUYETKK'),
('1090090', 'DUYETVPP'),
('1090090', 'GV'),
('1090090', 'SUAKHMS'),
('1090090', 'SUAKK'),
('1090090', 'SUAVPP'),
('1090090', 'THEMKHMS'),
('1090090', 'THEMKK'),
('1090090', 'THEMVPP'),
('2000', 'GV'),
('2299', 'GV');

-- --------------------------------------------------------

--
-- Table structure for table `cothuoctinh`
--

CREATE TABLE IF NOT EXISTS `cothuoctinh` (
  `MaTaiSan` char(10) NOT NULL,
  `MaThuocTinh` char(10) NOT NULL,
  `GiaTriThuocTinh` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MaTaiSan`,`MaThuocTinh`),
  KEY `FK_CoThuocTinh2` (`MaThuocTinh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cothuoctinh`
--

INSERT INTO `cothuoctinh` (`MaTaiSan`, `MaThuocTinh`, `GiaTriThuocTinh`) VALUES
('5', '1', 'HÃ²a phÃ¡t');

-- --------------------------------------------------------

--
-- Table structure for table `covpp`
--

CREATE TABLE IF NOT EXISTS `covpp` (
  `MaPhieuDuToan` char(10) NOT NULL,
  `MaVPP` char(10) NOT NULL,
  `SL_VPP` int(11) DEFAULT NULL,
  `DonGia` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`MaPhieuDuToan`,`MaVPP`),
  KEY `FK_CoVPP2` (`MaVPP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `covpp`
--

INSERT INTO `covpp` (`MaPhieuDuToan`, `MaVPP`, `SL_VPP`, `DonGia`) VALUES
('1', '1', 2, '424242'),
('1', '3', 2, '2424242'),
('2', '1', 2, '424242'),
('2', '3', 2, '2424242'),
('2', '2', 3, '40000'),
('3', '4', 6, '3000');

-- --------------------------------------------------------

--
-- Table structure for table `dacdiem`
--

CREATE TABLE IF NOT EXISTS `dacdiem` (
  `MoTaDD` varchar(100) NOT NULL,
  `GhiChuDD` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`MoTaDD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dacdiem`
--

INSERT INTO `dacdiem` (`MoTaDD`, `GhiChuDD`) VALUES
('Phù hợp', ''),
('Không phù hợp', '');

-- --------------------------------------------------------

--
-- Table structure for table `donvi`
--

CREATE TABLE IF NOT EXISTS `donvi` (
  `MSDV` char(10) NOT NULL,
  `TenDV` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MSDV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donvi`
--

INSERT INTO `donvi` (`MSDV`, `TenDV`) VALUES
('2', 'Mạng máy tính và truyền thông'),
('1', 'Hệ thống thông tin'),
('3', 'Khoa học máy tính'),
('4', 'Công nghệ phần mềm');

-- --------------------------------------------------------

--
-- Table structure for table `donvitinh`
--

CREATE TABLE IF NOT EXISTS `donvitinh` (
  `TenDonViTinh` char(10) NOT NULL,
  PRIMARY KEY (`TenDonViTinh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donvitinh`
--

INSERT INTO `donvitinh` (`TenDonViTinh`) VALUES
('Cái'),
('Cuộn'),
('Gam'),
('Kg');

-- --------------------------------------------------------

--
-- Table structure for table `duoccc`
--

CREATE TABLE IF NOT EXISTS `duoccc` (
  `MaVPP` char(10) NOT NULL,
  `MaNCC` char(10) NOT NULL,
  PRIMARY KEY (`MaVPP`,`MaNCC`),
  KEY `FK_DuocCC2` (`MaNCC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `duoccc`
--

INSERT INTO `duoccc` (`MaVPP`, `MaNCC`) VALUES
('1', '1'),
('1', '2'),
('2', '1'),
('3', '2');

-- --------------------------------------------------------

--
-- Table structure for table `kehoachmuasam`
--

CREATE TABLE IF NOT EXISTS `kehoachmuasam` (
  `MaKHMS` char(10) NOT NULL,
  `MSCB` char(6) NOT NULL,
  `DuyetBM` int(11) DEFAULT NULL,
  `DuyetKhoa` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaKHMS`),
  KEY `FK_LapKHMS` (`MSCB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kehoachmuasam`
--


-- --------------------------------------------------------

--
-- Table structure for table `lapkiemke`
--

CREATE TABLE IF NOT EXISTS `lapkiemke` (
  `MSCB` char(6) NOT NULL,
  `MaPhieuKiemKe` char(10) NOT NULL,
  PRIMARY KEY (`MSCB`,`MaPhieuKiemKe`),
  KEY `FK_LapKiemKe2` (`MaPhieuKiemKe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lapkiemke`
--


-- --------------------------------------------------------

--
-- Table structure for table `loaikiemke`
--

CREATE TABLE IF NOT EXISTS `loaikiemke` (
  `MaLoaiKK` char(10) NOT NULL,
  `TenLoaiKK` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MaLoaiKK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaikiemke`
--


-- --------------------------------------------------------

--
-- Table structure for table `loaitaisan_thietbi`
--

CREATE TABLE IF NOT EXISTS `loaitaisan_thietbi` (
  `MaLoai` char(10) NOT NULL,
  `TenLoai` varchar(30) DEFAULT NULL,
  `DienGiaiTB` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`MaLoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaitaisan_thietbi`
--

INSERT INTO `loaitaisan_thietbi` (`MaLoai`, `TenLoai`, `DienGiaiTB`) VALUES
('2', 'Thiết bị tin học', 'Thiết bị tin học'),
('3', 'Thiết bị chiếu, sao chụp', 'Thiết bị chiếu, sao chụp'),
('4', 'Thiết bị điện – điện tử; âm th', 'Thiết bị điện – điện tử; âm thanh – ánh sáng'),
('5', 'Dụng cụ đồ gỗ, đồ sắt', 'Dụng cụ đồ gỗ, đồ sắt');

-- --------------------------------------------------------

--
-- Table structure for table `loaivanphongpham`
--

CREATE TABLE IF NOT EXISTS `loaivanphongpham` (
  `MaLoaiVPP` char(10) NOT NULL,
  `TenLoaiVPP` varchar(30) DEFAULT NULL,
  `DienGiaiVPP` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`MaLoaiVPP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaivanphongpham`
--

INSERT INTO `loaivanphongpham` (`MaLoaiVPP`, `TenLoaiVPP`, `DienGiaiVPP`) VALUES
('3', 'Mau hư', 'Những văn phòng phẩm mau hư, dễ vỡ'),
('4', 'Lâu hư', '');

-- --------------------------------------------------------

--
-- Table structure for table `nam`
--

CREATE TABLE IF NOT EXISTS `nam` (
  `Nam` varchar(20) NOT NULL,
  PRIMARY KEY (`Nam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nam`
--

INSERT INTO `nam` (`Nam`) VALUES
('2010'),
('2011'),
('2012');

-- --------------------------------------------------------

--
-- Table structure for table `nammuasam`
--

CREATE TABLE IF NOT EXISTS `nammuasam` (
  `MaKHMS` char(10) NOT NULL,
  `Nam` varchar(20) NOT NULL,
  PRIMARY KEY (`MaKHMS`,`Nam`),
  KEY `FK_NamMuaSam2` (`Nam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nammuasam`
--


-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE IF NOT EXISTS `nguoidung` (
  `MSCB` char(7) NOT NULL,
  `MSDV` char(10) NOT NULL,
  `TenCB` varchar(50) DEFAULT NULL,
  `Gioitinh` varchar(5) DEFAULT NULL,
  `NgaySinh` varchar(2) DEFAULT NULL,
  `ThangSinh` varchar(2) NOT NULL,
  `NamSinh` varchar(4) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Diachi` varchar(100) DEFAULT NULL,
  `SDT` char(11) DEFAULT NULL,
  `Matkhau` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`MSCB`),
  KEY `FK_ThuocDonVi` (`MSDV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`MSCB`, `MSDV`, `TenCB`, `Gioitinh`, `NgaySinh`, `ThangSinh`, `NamSinh`, `Email`, `Diachi`, `SDT`, `Matkhau`) VALUES
('1090090', '4', 'Nguyễn Thị Tố Uyên', 'Nữ', '22', '12', '1988', 'nttuyen69@student.ctu.edu.vn', 'can tho', '099999999', '1090090'),
('1081677', '1', 'Doan Van Nhan', 'Nam', '17', '10', '1990', 'changtraidethuong@yahoo.com.vn', 'Ben Tre', '01668510075', 'nhan'),
('2299', '3', 'Hồ Quang Thái', 'Nam', '3', '3', '1987', 'hqthai@cit.ctu.edu.vn', 'Cần Thơ', '0939393939', '2299'),
('1069', '3', 'Võ Huỳnh Trâm', 'Nữ', '7', '5', '1970', 'vhtram@cit.ctu.edu.vn', 'Cần Thơ', '01667898678', '1069'),
('2000', '4', 'Nguyễn Thanh Hải', 'Nam', '2', '3', '1984', 'nthai@cit.ctu.edu.vn', 'Cần Thơ', '0166879876', '2000'),
('1888', '2', 'Nguyễn Công Huy', 'Nam', '6', '4', '1978', 'nchuy@cit.ctu.edu.vn', 'Cần Thơ', '0909897654', '1888');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `MaNCC` char(10) NOT NULL,
  `TenNCC` varchar(50) DEFAULT NULL,
  `DiaChiNCC` varchar(50) DEFAULT NULL,
  `SoDTNCC` char(12) DEFAULT NULL,
  PRIMARY KEY (`MaNCC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `DiaChiNCC`, `SoDTNCC`) VALUES
('1', 'Quang Minh', '132/26 đường 3/2', '840710999665'),
('2', 'Hải Âu', 'TP. Hồ Chí Minh', '0834325454');

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE IF NOT EXISTS `nhasanxuat` (
  `MaNSX` char(10) NOT NULL,
  `TenNSX` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MaNSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`MaNSX`, `TenNSX`) VALUES
('1', 'HP'),
('2', 'DELL'),
('3', 'Thiên Long'),
('4', 'Bút Bi');

-- --------------------------------------------------------

--
-- Table structure for table `noidung`
--

CREATE TABLE IF NOT EXISTS `noidung` (
  `MaND` char(10) NOT NULL,
  `TenDonViTinh` char(10) NOT NULL,
  `TenND` varchar(50) DEFAULT NULL,
  `GhiChuND` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`MaND`),
  KEY `FK_DonViTinhCuaBangKiemKe` (`TenDonViTinh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noidung`
--


-- --------------------------------------------------------

--
-- Table structure for table `noidungcon`
--

CREATE TABLE IF NOT EXISTS `noidungcon` (
  `Noi_MaND` char(10) NOT NULL,
  `MaND` char(10) NOT NULL,
  PRIMARY KEY (`Noi_MaND`,`MaND`),
  KEY `FK_NoiDungCon2` (`MaND`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noidungcon`
--


-- --------------------------------------------------------

--
-- Table structure for table `phieudutoanvpp`
--

CREATE TABLE IF NOT EXISTS `phieudutoanvpp` (
  `MaPhieuDuToan` char(10) NOT NULL,
  `Nam` varchar(20) NOT NULL,
  `MSDV` char(10) NOT NULL,
  `Duyet` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaPhieuDuToan`),
  KEY `FK_DTVPPNam` (`Nam`),
  KEY `FK_PhieuDTThuocDonVi` (`MSDV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieudutoanvpp`
--

INSERT INTO `phieudutoanvpp` (`MaPhieuDuToan`, `Nam`, `MSDV`, `Duyet`) VALUES
('1', '2010', '4', 0),
('2', '2010', '4', 0),
('3', '2010', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phieukiemke`
--

CREATE TABLE IF NOT EXISTS `phieukiemke` (
  `MaPhieuKiemKe` char(10) NOT NULL,
  `Nam` varchar(20) NOT NULL,
  `MaLoaiKK` char(10) NOT NULL,
  `DienGiaiKiemKe` varchar(100) DEFAULT NULL,
  `NgayKiemKe` datetime DEFAULT NULL,
  `NgayKetThucKiemKe` datetime DEFAULT NULL,
  PRIMARY KEY (`MaPhieuKiemKe`),
  KEY `FK_KiemKeThuocNam` (`Nam`),
  KEY `FK_ThuocLoaiKK` (`MaLoaiKK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieukiemke`
--


-- --------------------------------------------------------

--
-- Table structure for table `phieumau`
--

CREATE TABLE IF NOT EXISTS `phieumau` (
  `MaPhieu` char(10) NOT NULL,
  `TenPhieu` varchar(50) DEFAULT NULL,
  `GhiChuPhieu` varchar(50) DEFAULT NULL,
  `NgayLap` date DEFAULT NULL,
  `CapNhatMoiNhat` date DEFAULT NULL,
  `KhoaCapNhat` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaPhieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieumau`
--


-- --------------------------------------------------------

--
-- Table structure for table `quy`
--

CREATE TABLE IF NOT EXISTS `quy` (
  `Quy` char(10) NOT NULL,
  PRIMARY KEY (`Quy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quy`
--

INSERT INTO `quy` (`Quy`) VALUES
('1'),
('2'),
('3'),
('4');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE IF NOT EXISTS `quyen` (
  `MaQuyen` char(10) NOT NULL,
  `TenQuyen` varchar(30) DEFAULT NULL,
  `DienGiaiQuyen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`MaQuyen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`MaQuyen`, `TenQuyen`, `DienGiaiQuyen`) VALUES
('THEMKHMS', 'Thêm kế hoạch mua sắm', 'Thêm kế hoạch mua sắm'),
('THEMKK', 'Thêm kiểm kê', 'Thêm kiểm kê'),
('THEMVPP', 'Thêm văn phòng phẩm', 'Thêm văn phòng phẩm'),
('SUAVPP', 'Sửa phiếu dự toán văn phòng ph', 'Sửa phiếu dự toán văn phòng phẩm'),
('DUYETVPP', 'Duyệt văn phòng phẩm', 'Duyệt văn phòng phẩm'),
('DUYETKK', 'Duyệt kiểm kê', 'Duyệt kiểm kê'),
('DUYETKHMS', 'Duyệt kế hoạch mua sắm', 'Duyệt kế hoạch mua sắm'),
('SUAKK', 'Sửa phiếu kiểm kê', 'Sửa phiếu kiểm kê'),
('SUAKHMS', 'Sửa kế hoạch mua sắm', 'Sửa kế hoạch mua sắm'),
('ADMIN', 'Admin', 'Quan tri he thong'),
('CBQLBM', 'Cán bộ quản lý bộ môn', 'Cán bộ quản lý bộ môn'),
('GV', 'Giảng viên', 'Giảng viên');

-- --------------------------------------------------------

--
-- Table structure for table `sotiencap`
--

CREATE TABLE IF NOT EXISTS `sotiencap` (
  `Nam` varchar(20) NOT NULL,
  `MSDV` char(10) NOT NULL,
  `SoTien` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`Nam`,`MSDV`),
  KEY `FK_SoTienCap2` (`MSDV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sotiencap`
--


-- --------------------------------------------------------

--
-- Table structure for table `taisan`
--

CREATE TABLE IF NOT EXISTS `taisan` (
  `MaTaiSan` char(10) NOT NULL,
  `TenDonViTinh` char(10) NOT NULL,
  `MaLoai` char(10) NOT NULL,
  `TenTaiSan` varchar(30) DEFAULT NULL,
  `TinhTrang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MaTaiSan`),
  KEY `FK_CoDonViTinh` (`TenDonViTinh`),
  KEY `FK_ThuocLoaiTaiSan` (`MaLoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taisan`
--

INSERT INTO `taisan` (`MaTaiSan`, `TenDonViTinh`, `MaLoai`, `TenTaiSan`, `TinhTrang`) VALUES
('1', 'Cái', '2', 'Máy in Canon LBP 3300 ', 'Còn hàng'),
('2', 'Cái', '3', 'Màn hình LCD Samsung 733NW', 'Còn hàng'),
('3', 'Cái', '4', 'Máy lạnh Mitsu Electric C10VA ', 'Còn hàng'),
('4', 'Cái', '4', 'Quạt gió treo tường Asia L1800', 'Còn hàng'),
('5', 'Cái', '5', 'Tủ hồ sơ di động', 'Còn hàng'),
('6', 'Cái', '5', 'Ghế xoay văn phòng Hòa Phát SG', 'Còn hàng');

-- --------------------------------------------------------

--
-- Table structure for table `taisanduocthanhly`
--

CREATE TABLE IF NOT EXISTS `taisanduocthanhly` (
  `MaThanhLy` char(10) NOT NULL,
  `MaTaiSan` char(10) NOT NULL,
  `SLThanhLy` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaThanhLy`,`MaTaiSan`),
  KEY `FK_TaiSanDuocThanhLy2` (`MaTaiSan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taisanduocthanhly`
--


-- --------------------------------------------------------

--
-- Table structure for table `taisankiemke`
--

CREATE TABLE IF NOT EXISTS `taisankiemke` (
  `MaTaiSan` char(10) NOT NULL,
  `MaPhieuKiemKe` char(10) NOT NULL,
  PRIMARY KEY (`MaTaiSan`,`MaPhieuKiemKe`),
  KEY `FK_TaiSanKiemKe2` (`MaPhieuKiemKe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taisankiemke`
--


-- --------------------------------------------------------

--
-- Table structure for table `taisanthuocdonvi`
--

CREATE TABLE IF NOT EXISTS `taisanthuocdonvi` (
  `MSDV` char(10) NOT NULL,
  `MaTaiSan` char(10) NOT NULL,
  `SoLuongCuaDonVi` int(11) DEFAULT NULL,
  `DonGiaTS` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`MSDV`,`MaTaiSan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taisanthuocdonvi`
--

INSERT INTO `taisanthuocdonvi` (`MSDV`, `MaTaiSan`, `SoLuongCuaDonVi`, `DonGiaTS`) VALUES
('4', '1', 1, '100000'),
('1', '1', 788, '18000000'),
('1', '2', 2, '10000000'),
('4', '3', 1, '1200000'),
('3', '1', 12, '1000000'),
('3', '3', 1, '10000'),
('2', '6', NULL, NULL),
('2', '4', NULL, NULL),
('2', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `STT` varchar(100) DEFAULT NULL,
  `Họ và Tên` varchar(100) DEFAULT NULL,
  `MSSV` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Chuyên ngành` varchar(100) DEFAULT NULL,
  `Khóa` varchar(100) DEFAULT NULL,
  `Giới tính` varchar(100) DEFAULT NULL,
  `Ngày sinh` varchar(100) DEFAULT NULL,
  `Đoàn Đảng` varchar(100) DEFAULT NULL,
  `ĐC Thường Trú` varchar(100) DEFAULT NULL,
  `ĐC Liên Hệ` varchar(100) DEFAULT NULL,
  `Điện thoại` varchar(100) DEFAULT NULL,
  `Năng Khiếu` varchar(100) DEFAULT NULL,
  `Dân tộc` varchar(100) DEFAULT NULL,
  `Tôn giáo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`STT`, `Họ và Tên`, `MSSV`, `Email`, `Chuyên ngành`, `Khóa`, `Giới tính`, `Ngày sinh`, `Đoàn Đảng`, `ĐC Thường Trú`, `ĐC Liên Hệ`, `Điện thoại`, `Năng Khiếu`, `Dân tộc`, `Tôn giáo`) VALUES
('1', 'Nguyễn Viết Hưng', '7096345', 'nvhung45@student.ctu.edu.vn', '1', '35', '1', '22/12/1988', '1', '', '', '', '', '1', '1'),
('2', 'Trần Mộng Thu Hà', '7096247', 'tmtha47@student.ctu.edu.vn', '2', '35', '0', '', '1', '', '', '', '', '1', '1'),
('3', 'Lê Minh Tiến', '1100577', 'lmtien77@student.ctu.edu.vn', '3', '36', '1', '', '1', '', '', '', '', '1', '1'),
('4', 'Vương Quốc Tuấn', '6086579', 'vqtuan79@student.ctu.edu.vn', '4', '34', '1', '', '1', '', '', '', '', '1', '1'),
('5', 'Cao Ngân Giang', '1086981', 'cngiang81@student.ctu.edu.vn', '4', '34', '0', '', '1', '', '', '', '', '1', '1'),
('6', 'Đoàn Hoàn Phi', '1081331', 'dhphi31@student.ctu.edu.vn', '4', '34', '1', '', '1', '', '', '', '', '1', '1'),
('7', 'Trần Thị Xuân Đào', '1088318', 'ttxdao18@student.ctu.edu.vn', '2', '34', '0', '', '1', '', '', '', '', '1', '1'),
('8', 'Nguyễn Thị Ngoan', '4085220', 'ntngoan20@student.ctu.edu.vn', '2', '34', '0', '', '1', '', '', '', '', '1', '1'),
('9', 'Trần Thị Loan Hương', '6086458', 'ttlhuong58@student.ctu.edu.vn', '2', '34', '0', '', '1', '', '', '', '', '1', '1'),
('10', 'Trần Văn Phụng', '6088036', 'tvphung36@student.ctu.edu.vn', '2', '34', '1', '', '1', '', '', '', '', '1', '1'),
('11', 'Bùi Thị Ngọc Anh', '4094614', 'btnanh14@student.ctu.edu.vn', '2', '35', '0', '', '1', '', '', '', '', '1', '1'),
('12', 'Hồ Hải Ly', '1091505', 'hhly05@student.ctu.edu.vn', '2', '35', '0', '', '1', '', '', '', '', '1', '1'),
('13', 'Nguyễn Thị Bích Thảo', '7096475', 'ntbthao75@student.ctu.edu.vn', '2', '35', '0', '', '1', '', '', '', '', '1', '1'),
('14', 'Nguyễn Nhật Trường', '6096055', 'nntruong55@student.ctu.edu.vn', '1', '35', '1', '', '1', '', '', '', '', '1', '1'),
('15', 'Nguyễn Thị Ngọc Vấn', '4094874', 'ntnvan74@student.ctu.edu.vn', '1', '35', '0', '', '1', '', '', '', '', '1', '1'),
('16', 'Giáp Thị Cẩm Nhung', '4094680', 'gtcnhung80@student.ctu.edu.vn', '1', '35', '0', '', '1', '', '', '', '', '1', '1'),
('17', 'Trần Thị Diễm Phương', '7096472', 'ttdphuong72@student.ctu.edu.vn', '1', '35', '0', '', '1', '', '', '', '', '1', '1'),
('18', 'Trần Đức Anh', '1097321', 'tdanh21@student.ctu.edu.vn', '1', '35', '1', '', '1', '', '', '', '', '1', '1'),
('19', 'Hoàng Thị Hà Hương', '4094259', 'hthhuong59@student.ctu.edu.vn', '1', '35', '0', '', '1', '', '', '', '', '1', '1'),
('20', 'Nguyễn Thị Thúy Liễu', 'HG09011', 'nttlieu59@student.ctu.edu.vn', '4', '35', '0', '', '1', '', '', '', '', '1', '1'),
('21', 'Nguyễn Thị Ánh Nguyệt', '4104305', 'ntanguyet05@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '1'),
('22', 'Nguyễn Thị Thu Thảo', '4105339', 'nttthao39@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '2'),
('23', 'Quách Kim Thoa', 'LT10224', 'qkthoa24@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '2'),
('24', 'Lê Văn Thông', '1100521', 'lvthong21@student.ctu.edu.vn', '4', '36', '1', '', '1', '', '', '', '', '1', '2'),
('25', 'Trần Thị Diễm Trinh', 'LT10318', 'ttdtrinh18@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '2'),
('26', 'Đặng Đức Anh', '1101356', 'ddanh56@student.ctu.edu.vn', '4', '36', '1', '', '1', '', '', '', '', '1', '2'),
('27', 'Nguyễn Trường Giang', '4104967', 'ntgiang67@student.ctu.edu.vn', '4', '36', '1', '', '1', '', '', '', '', '1', '2'),
('28', 'Bùi Văn Kiệt', '4105580', 'bvkiet80@student.ctu.edu.vn', '4', '36', '1', '', '1', '', '', '', '', '1', '2'),
('29', 'Nguyễn Thị Quỳnh Như', 'LT10210', 'ntqnhu10@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '2'),
('30', 'Trần Thị Hồng Nhung', '7106928', 'tthnhung28@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '2'),
('31', 'Tạ Xuân Vương', '1101435', 'txvuong35@student.ctu.edu.vn', '4', '36', '1', '', '1', '', '', '', '', '1', '2'),
('32', 'Trương Hồng Diễm', '6106222', 'thdiem22@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '2'),
('33', 'Nguyễn Thị Mộng Điệp', '5107399', 'ntmdiep99@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '2'),
('34', 'Lê Thị Thủy Hương', 'LT10190', 'ltthuong90@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '2'),
('35', 'Trương Hoàng Nhi Lan', '2102455', 'thnlan55@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '2'),
('36', 'Đoàn Thị Ngọc', '2102075', 'dtngoc75@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '7'),
('37', 'Nguyễn Thị Ngọc Anh', '4105524', 'ntnanh24@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '7'),
('38', 'Cao Quang Dương', '4104745', 'cqduong45@student.ctu.edu.vn', '4', '36', '1', '', '1', '', '', '', '', '1', '7'),
('39', 'Nguyễn Thị Ngọc Gấm', 'LT10181', 'ntngam81@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '7'),
('40', 'Phạm Văn Hòa', '1101602', 'pvhoa02@student.ctu.edu.vn', '4', '36', '1', '', '1', '', '', '', '', '1', '7'),
('41', 'Trần Thị Diễm Hương', '4104146', 'ttdhuong46@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '7'),
('42', 'Nguyễn Ngọc Tuấn Khanh', '1100469', 'nntkhanh69@student.ctu.edu.vn', '4', '36', '1', '', '1', '', '', '', '', '1', '7'),
('43', 'Nguyễn Thị Kim Ngân', 'LT10284', 'ntkngan84@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '7'),
('44', 'Phạm Thị Mai Ngân', '2102462', 'ptmngan62@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '2'),
('45', 'Nguyễn Trương Minh Nghĩa', '4104302', 'ntmnghia02@student.ctu.edu.vn', '4', '36', '1', '', '1', '', '', '', '', '1', '2'),
('46', 'Nguyễn Thị Ngọc Ngọt', 'LT10205', 'ntnngot05@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '2'),
('47', 'Đặng Thị Hồng Nhung', 'LT10209', 'dthnhung09@student.ctu.edu.vn', '4', '36', '0', '', '1', '', '', '', '', '1', '2'),
('48', 'Trần Minh Phước', '4104623', 'tmphuoc23@student.ctu.edu.vn', '4', '36', '1', '', '1', '', '', '', '', '1', '2'),
('49', 'Nguyễn Trương Minh Trung', '4104259', 'ntmtrung59@student.ctu.edu.vn', '4', '36', '1', '', '1', '', '', '', '', '1', '2'),
('50', 'Trần Thanh Tùng', '4107385', 'tttung95@student.ctu.edu.vn', '4', '36', '1', '', '1', '', '', '', '', '1', '2'),
('51', 'Lê Hoàn Vũ', '1101081', 'lhvu81@student.ctu.edu.vn', '4', '36', '1', '', '1', '', '', '', '', '1', '2'),
('52', 'Nguyễn Tiến Dũng', '9116989', 'ntdung89@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '2'),
('53', 'Nguyễn Nhật Trường Duy', '4113985', 'nntduy85@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '2'),
('54', 'Bùi Việt Hưng', '4114527', 'bvhung27@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '2'),
('55', 'Nguyễn Thị Diễm Hương', '4117253', 'ntdhuong53@student.ctu.edu.vn', '4', '37', '0', '', '1', '', '', '', '', '1', '2'),
('56', 'Nguyễn Thị Loan', '4117255', 'ntloan55@student.ctu.edu.vn', '4', '37', '0', '', '1', '', '', '', '', '1', '2'),
('57', 'Ngô Thành Lý', '4114630', 'ntly30@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '1'),
('58', 'Phạm Thị Kim Nhung', '4115233', 'ptknhung33@student.ctu.edu.vn', '4', '37', '0', '', '1', '', '', '', '', '1', '1'),
('59', 'Mai Quốc Thái', '4118621', 'mqthai21@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '1'),
('60', 'Phan Minh Trí', '2111880', 'pmtri80@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '1'),
('61', 'Nguyễn Thị Tố Uyên', '4113969', 'nttuyen69@student.ctu.edu.vn', '4', '37', '0', '', '1', '', '', '', '', '1', '1'),
('62', 'Nguyễn Võ', '3113518', 'nvo18@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '1'),
('63', 'Trần Thị Kim Yến', '3112303', 'ttkyen03@student.ctu.edu.vn', '4', '37', '0', '', '1', '', '', '', '', '1', '1'),
('64', 'Nguyễn Thị Ánh Tuyết', '6116299', 'ntatuyet99@student.ctu.edu.vn', '4', '37', '0', '', '1', '', '', '', '', '1', '1'),
('65', 'Trịnh Nguyễn Khánh Hồng', '1110025', 'tnkhong25@student.ctu.edu.vn', '4', '37', '0', '', '1', '', '', '', '', '1', '1'),
('66', 'Nguyễn Quang Huy', '1111089', 'nqhuy89@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '1'),
('67', 'Phạm Hoàng Lâm', '9117002', 'phlam02@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '7'),
('68', 'Lê Hữu Nguyên', '3112880', 'lhnguyen80@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '7'),
('69', 'Phạm Thị Thu Thảo', '1110546', 'pttthao46@student.ctu.edu.vn', '4', '37', '0', '', '1', '', '', '', '', '1', '7'),
('70', 'Trương Hữu Trí', '3113280', 'nhtri80@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '7'),
('71', 'Nguyễn Hữu Tuấn', '3113684', 'nhtuan84@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '7'),
('72', 'Nguyễn Minh Tuấn', '4113964', 'nmtuan64@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '7'),
('73', 'Nguyễn Thị Hồng Đào', '3112741', 'nthdao41@student.ctu.edu.vn', '4', '37', '0', '', '1', '', '', '', '', '1', '7'),
('74', 'Phạm Thái Dương', '3118191', 'ptduong91@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '7'),
('75', 'Hồ Hải Kiều', '6116182', 'hhkieu82@student.ctu.edu.vn', '4', '37', '0', '', '1', '', '', '', '', '1', '7'),
('76', 'Trần Thị Hương Nhi', '3112258', 'tthnhi58@student.ctu.edu.vn', '4', '37', '0', '', '1', '', '', '', '', '1', '7'),
('77', 'Nguyễn Thanh Trung', '3113118', 'nttrung18@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '7'),
('78', 'Lê Duy Tuấn', '3112720', 'ldtuan20@student.ctu.edu.vn', '4', '37', '1', '', '1', '', '', '', '', '1', '7'),
('79', 'Đỗ Thị Mỹ Hạnh', '1110098', 'dtmhanh98@student.ctu.edu.vn', '4', '37', '0', '', '1', '', '', '', '', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `temp2`
--

CREATE TABLE IF NOT EXISTS `temp2` (
  `ma` varchar(100) DEFAULT NULL,
  `tentruong` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp2`
--

INSERT INTO `temp2` (`ma`, `tentruong`) VALUES
('1', 'STT'),
('2', 'Họ và Tên'),
('3', 'MSSV'),
('4', 'Email'),
('5', 'Chuyên ngành'),
('6', 'Khóa'),
('7', 'Giới tính'),
('8', 'Ngày sinh'),
('9', 'Đoàn Đảng'),
('10', 'ĐC Thường Trú'),
('11', 'ĐC Liên Hệ'),
('12', 'Điện thoại'),
('13', 'Năng Khiếu'),
('14', 'Dân tộc'),
('15', 'Tôn giáo');

-- --------------------------------------------------------

--
-- Table structure for table `thanhlytaisan`
--

CREATE TABLE IF NOT EXISTS `thanhlytaisan` (
  `MaThanhLy` char(10) NOT NULL,
  `Nam` varchar(20) NOT NULL,
  `DienGiaiThanhLy` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`MaThanhLy`),
  KEY `FK_ThuocNam` (`Nam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanhlytaisan`
--


-- --------------------------------------------------------

--
-- Table structure for table `thuocdonvimuasam`
--

CREATE TABLE IF NOT EXISTS `thuocdonvimuasam` (
  `MSDV` char(10) NOT NULL,
  `MaKHMS` char(10) NOT NULL,
  PRIMARY KEY (`MSDV`,`MaKHMS`),
  KEY `FK_ThuocDonViMuaSam2` (`MaKHMS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuocdonvimuasam`
--


-- --------------------------------------------------------

--
-- Table structure for table `thuockhms`
--

CREATE TABLE IF NOT EXISTS `thuockhms` (
  `MaTaiSan` char(10) NOT NULL,
  `MaKHMS` char(10) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `ThuyetMinhSuDung` varchar(255) DEFAULT NULL,
  `DonGiaMuaSam` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`MaTaiSan`,`MaKHMS`),
  KEY `FK_ThuocKHMS2` (`MaKHMS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuockhms`
--


-- --------------------------------------------------------

--
-- Table structure for table `thuocphieumau`
--

CREATE TABLE IF NOT EXISTS `thuocphieumau` (
  `MaPhieu` char(10) NOT NULL,
  `MaND` char(10) NOT NULL,
  PRIMARY KEY (`MaPhieu`,`MaND`),
  KEY `FK_ThuocPhieuMau2` (`MaND`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuocphieumau`
--


-- --------------------------------------------------------

--
-- Table structure for table `thuocquyvpp`
--

CREATE TABLE IF NOT EXISTS `thuocquyvpp` (
  `MaPhieuDuToan` char(10) NOT NULL,
  `Quy` char(10) NOT NULL,
  PRIMARY KEY (`MaPhieuDuToan`,`Quy`),
  KEY `FK_ThuocQuyVPP2` (`Quy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuocquyvpp`
--

INSERT INTO `thuocquyvpp` (`MaPhieuDuToan`, `Quy`) VALUES
('1', '1'),
('2', '1'),
('3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `thuoctinh`
--

CREATE TABLE IF NOT EXISTS `thuoctinh` (
  `MaThuocTinh` char(10) NOT NULL,
  `TenThuocTinh` varchar(30) DEFAULT NULL,
  `GhiChu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MaThuocTinh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuoctinh`
--

INSERT INTO `thuoctinh` (`MaThuocTinh`, `TenThuocTinh`, `GhiChu`) VALUES
('1', 'Nhãn hiệu  ', 'Nhãn hiệu  '),
('2', 'Model/Type', 'Model/Type'),
('3', 'Ký mã hiệu, số serial number', 'Ký mã hiệu, số serial number'),
('4', 'Công suất thiết bị', 'Công suất thiết bị'),
('5', 'Công suất tiêu thụ điện năng', 'Công suất tiêu thụ điện năng'),
('6', 'Điện thế cung cấp', 'Điện thế cung cấp'),
('7', 'Nguyên giá (1.000 đ)', 'Nguyên giá (1.000 đ)');

-- --------------------------------------------------------

--
-- Table structure for table `vanphongpham`
--

CREATE TABLE IF NOT EXISTS `vanphongpham` (
  `MaVPP` char(10) NOT NULL,
  `MaLoaiVPP` char(10) NOT NULL,
  `TenDonViTinh` char(10) NOT NULL,
  `MaNSX` char(10) NOT NULL,
  `TenVPP` varchar(30) DEFAULT NULL,
  `Dongiavpp` decimal(10,0) NOT NULL,
  PRIMARY KEY (`MaVPP`),
  KEY `FK_DonViTinhVPP` (`TenDonViTinh`),
  KEY `FK_ThuocLoaiVPP` (`MaLoaiVPP`),
  KEY `FK_ThuocNSX` (`MaNSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vanphongpham`
--

INSERT INTO `vanphongpham` (`MaVPP`, `MaLoaiVPP`, `TenDonViTinh`, `MaNSX`, `TenVPP`, `Dongiavpp`) VALUES
('1', '3', 'Cái', '1', 'Viet muc', '2000'),
('2', '3', 'Kg', '2', 'Giấy In', '40000'),
('3', '4', 'Cái', '2', 'Keo dán', '5000'),
('4', '3', 'Cái', '3', 'Bút Bi', '3000');

