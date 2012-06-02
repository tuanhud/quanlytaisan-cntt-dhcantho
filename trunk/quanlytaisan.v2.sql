-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2012 at 04:51 PM
-- Server version: 5.0.91
-- PHP Version: 5.2.17

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
  `ChiTietVPP` varchar(100) default NULL,
  PRIMARY KEY  (`MaVPP`,`MoTaDD`),
  KEY `FK_CoDD2` (`MoTaDD`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `codd`
--


-- --------------------------------------------------------

--
-- Table structure for table `conoidung`
--

CREATE TABLE IF NOT EXISTS `conoidung` (
  `MaPhieuKiemKe` char(10) NOT NULL,
  `MaND` char(10) NOT NULL,
  `MaTaiSan` char(10) NOT NULL,
  `ChiTietND` varchar(50) default NULL,
  PRIMARY KEY  (`MaPhieuKiemKe`,`MaND`,`MaTaiSan`),
  KEY `FK_CoNoiDung2` (`MaND`),
  KEY `FK_CoNoiDung3` (`MaTaiSan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  PRIMARY KEY  (`MaPhieuKiemKe`,`MaPhieu`),
  KEY `FK_CoPhieuMau2` (`MaPhieu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cophieumau`
--


-- --------------------------------------------------------

--
-- Table structure for table `coquyen`
--

CREATE TABLE IF NOT EXISTS `coquyen` (
  `MSCB` char(6) NOT NULL,
  `MaQuyen` char(10) NOT NULL,
  PRIMARY KEY  (`MSCB`,`MaQuyen`),
  KEY `FK_CoQuyen2` (`MaQuyen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coquyen`
--

INSERT INTO `coquyen` (`MSCB`, `MaQuyen`) VALUES
('000009', 'DUYET'),
('000009', 'DUYETKHMS'),
('000009', 'DUYETKK'),
('000009', 'DUYETVPP'),
('000009', 'KHMS'),
('000009', 'KK'),
('111111', 'DUYET'),
('111111', 'DUYETKHMS'),
('111111', 'DUYETKK'),
('111111', 'DUYETVPP'),
('111111', 'KHMS'),
('888888', 'DUYET'),
('888888', 'KK'),
('888888', 'VPP');

-- --------------------------------------------------------

--
-- Table structure for table `cothuoctinh`
--

CREATE TABLE IF NOT EXISTS `cothuoctinh` (
  `MaTaiSan` char(10) NOT NULL,
  `MaThuocTinh` char(10) NOT NULL,
  `GiaTriThuocTinh` varchar(50) default NULL,
  PRIMARY KEY  (`MaTaiSan`,`MaThuocTinh`),
  KEY `FK_CoThuocTinh2` (`MaThuocTinh`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cothuoctinh`
--


-- --------------------------------------------------------

--
-- Table structure for table `covpp`
--

CREATE TABLE IF NOT EXISTS `covpp` (
  `MaPhieuDuToan` char(10) NOT NULL,
  `MaVPP` char(10) NOT NULL,
  `SL_VPP` int(11) default NULL,
  `DonGia` decimal(10,0) default NULL,
  PRIMARY KEY  (`MaPhieuDuToan`,`MaVPP`),
  KEY `FK_CoVPP2` (`MaVPP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `covpp`
--


-- --------------------------------------------------------

--
-- Table structure for table `dacdiem`
--

CREATE TABLE IF NOT EXISTS `dacdiem` (
  `MoTaDD` varchar(100) NOT NULL,
  `GhiChuDD` varchar(100) default NULL,
  PRIMARY KEY  (`MoTaDD`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dacdiem`
--


-- --------------------------------------------------------

--
-- Table structure for table `donvi`
--

CREATE TABLE IF NOT EXISTS `donvi` (
  `MSDV` char(10) NOT NULL,
  `TenDV` varchar(50) default NULL,
  PRIMARY KEY  (`MSDV`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donvi`
--

INSERT INTO `donvi` (`MSDV`, `TenDV`) VALUES
('4', 'Hệ thống thông tin'),
('3', 'Công nghệ phần mềm'),
('1', 'Khoa học máy tính'),
('2', 'Mạng máy tính và truyền thông');

-- --------------------------------------------------------

--
-- Table structure for table `donvitinh`
--

CREATE TABLE IF NOT EXISTS `donvitinh` (
  `TenDonViTinh` char(10) NOT NULL,
  PRIMARY KEY  (`TenDonViTinh`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donvitinh`
--

INSERT INTO `donvitinh` (`TenDonViTinh`) VALUES
('Cái'),
('Kg');

-- --------------------------------------------------------

--
-- Table structure for table `duoccc`
--

CREATE TABLE IF NOT EXISTS `duoccc` (
  `MaVPP` char(10) NOT NULL,
  `MaNCC` char(10) NOT NULL,
  PRIMARY KEY  (`MaVPP`,`MaNCC`),
  KEY `FK_DuocCC2` (`MaNCC`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `duoccc`
--


-- --------------------------------------------------------

--
-- Table structure for table `kehoachmuasam`
--

CREATE TABLE IF NOT EXISTS `kehoachmuasam` (
  `MaKHMS` char(10) NOT NULL,
  `MSCB` char(6) NOT NULL,
  `DuyetBM` int(11) default NULL,
  `DuyetKhoa` int(11) default NULL,
  PRIMARY KEY  (`MaKHMS`),
  KEY `FK_LapKHMS` (`MSCB`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  PRIMARY KEY  (`MSCB`,`MaPhieuKiemKe`),
  KEY `FK_LapKiemKe2` (`MaPhieuKiemKe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lapkiemke`
--


-- --------------------------------------------------------

--
-- Table structure for table `loaikiemke`
--

CREATE TABLE IF NOT EXISTS `loaikiemke` (
  `MaLoaiKK` char(10) NOT NULL,
  `TenLoaiKK` varchar(50) default NULL,
  PRIMARY KEY  (`MaLoaiKK`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaikiemke`
--


-- --------------------------------------------------------

--
-- Table structure for table `loaitaisan_thietbi`
--

CREATE TABLE IF NOT EXISTS `loaitaisan_thietbi` (
  `MaLoai` char(10) NOT NULL,
  `TenLoai` varchar(30) default NULL,
  `DienGiaiTB` varchar(100) default NULL,
  PRIMARY KEY  (`MaLoai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaitaisan_thietbi`
--

INSERT INTO `loaitaisan_thietbi` (`MaLoai`, `TenLoai`, `DienGiaiTB`) VALUES
('1', 'Thiet bi chuyen dung', 'agfaugfuagfa');

-- --------------------------------------------------------

--
-- Table structure for table `loaivanphongpham`
--

CREATE TABLE IF NOT EXISTS `loaivanphongpham` (
  `MaLoaiVPP` char(10) NOT NULL,
  `TenLoaiVPP` varchar(30) default NULL,
  `DienGiaiVPP` varchar(100) default NULL,
  PRIMARY KEY  (`MaLoaiVPP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaivanphongpham`
--


-- --------------------------------------------------------

--
-- Table structure for table `nam`
--

CREATE TABLE IF NOT EXISTS `nam` (
  `Nam` varchar(20) NOT NULL,
  PRIMARY KEY  (`Nam`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nam`
--

INSERT INTO `nam` (`Nam`) VALUES
('');

-- --------------------------------------------------------

--
-- Table structure for table `nammuasam`
--

CREATE TABLE IF NOT EXISTS `nammuasam` (
  `MaKHMS` char(10) NOT NULL,
  `Nam` varchar(20) NOT NULL,
  PRIMARY KEY  (`MaKHMS`,`Nam`),
  KEY `FK_NamMuaSam2` (`Nam`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nammuasam`
--


-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE IF NOT EXISTS `nguoidung` (
  `MSCB` char(6) NOT NULL,
  `MSDV` char(10) NOT NULL,
  `TenCB` varchar(50) default NULL,
  `Gioitinh` varchar(5) default NULL,
  `NgaySinh` varchar(2) default NULL,
  `ThangSinh` varchar(2) NOT NULL,
  `NamSinh` varchar(4) NOT NULL,
  `Email` varchar(50) default NULL,
  `Diachi` varchar(100) default NULL,
  `SDT` char(11) default NULL,
  `Matkhau` varchar(30) default NULL,
  PRIMARY KEY  (`MSCB`),
  KEY `FK_ThuocDonVi` (`MSDV`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`MSCB`, `MSDV`, `TenCB`, `Gioitinh`, `NgaySinh`, `ThangSinh`, `NamSinh`, `Email`, `Diachi`, `SDT`, `Matkhau`) VALUES
('111111', '3', 'Nhân', 'Nam', '1', '2', '1990', 'nhan@yahoo.com', 'Ben Tre', '25225252222', 'aaaaaa'),
('000009', '4', 'tin', 'Nam', '20', '2', '2010', 'tin@yahoo.com.vn', 'afgajfgw', '73965237627', 'ksghfksghf'),
('313131', '4', 'afadad', 'Nam', '29', '1', '2000', 'lvty@yahoo.com.vn', 'aUKDQUAGHA', '1471947', 'JFGA'),
('222222', '4', 'tay', 'Nam', '1', '2', '2011', 'lvtay92@yahoo.com.vn', 'hakugfaugf', '72562965927', 'jlhgsghsuo'),
('213222', '4', 'adssssssssssssss', 'Nam', '1', '1', '2011', 'zjbczc@yahoo.com.vn', 'aoifahogf', '862956', 'gfsugfs'),
('888888', '3', 'taynn', 'nam', '22', '12', '1988', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `MaNCC` char(10) NOT NULL,
  `TenNCC` varchar(50) default NULL,
  `DiaChiNCC` varchar(50) default NULL,
  `SoDTNCC` char(12) default NULL,
  PRIMARY KEY  (`MaNCC`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhacungcap`
--


-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE IF NOT EXISTS `nhasanxuat` (
  `MaNSX` char(10) NOT NULL,
  `TenNSX` varchar(50) default NULL,
  PRIMARY KEY  (`MaNSX`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhasanxuat`
--


-- --------------------------------------------------------

--
-- Table structure for table `noidung`
--

CREATE TABLE IF NOT EXISTS `noidung` (
  `MaND` char(10) NOT NULL,
  `TenDonViTinh` char(10) NOT NULL,
  `TenND` varchar(50) default NULL,
  `GhiChuND` varchar(100) default NULL,
  PRIMARY KEY  (`MaND`),
  KEY `FK_DonViTinhCuaBangKiemKe` (`TenDonViTinh`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  PRIMARY KEY  (`Noi_MaND`,`MaND`),
  KEY `FK_NoiDungCon2` (`MaND`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `Duyet` int(11) default NULL,
  PRIMARY KEY  (`MaPhieuDuToan`),
  KEY `FK_DTVPPNam` (`Nam`),
  KEY `FK_PhieuDTThuocDonVi` (`MSDV`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieudutoanvpp`
--


-- --------------------------------------------------------

--
-- Table structure for table `phieukiemke`
--

CREATE TABLE IF NOT EXISTS `phieukiemke` (
  `MaPhieuKiemKe` char(10) NOT NULL,
  `Nam` varchar(20) NOT NULL,
  `MaLoaiKK` char(10) NOT NULL,
  `DienGiaiKiemKe` varchar(100) default NULL,
  `NgayKiemKe` datetime default NULL,
  `NgayKetThucKiemKe` datetime default NULL,
  PRIMARY KEY  (`MaPhieuKiemKe`),
  KEY `FK_KiemKeThuocNam` (`Nam`),
  KEY `FK_ThuocLoaiKK` (`MaLoaiKK`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieukiemke`
--


-- --------------------------------------------------------

--
-- Table structure for table `phieumau`
--

CREATE TABLE IF NOT EXISTS `phieumau` (
  `MaPhieu` char(10) NOT NULL,
  `TenPhieu` varchar(50) default NULL,
  `GhiChuPhieu` varchar(50) default NULL,
  `NgayLap` date default NULL,
  `CapNhatMoiNhat` date default NULL,
  `KhoaCapNhat` int(11) default NULL,
  PRIMARY KEY  (`MaPhieu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieumau`
--


-- --------------------------------------------------------

--
-- Table structure for table `quy`
--

CREATE TABLE IF NOT EXISTS `quy` (
  `Quy` char(10) NOT NULL,
  PRIMARY KEY  (`Quy`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quy`
--


-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE IF NOT EXISTS `quyen` (
  `MaQuyen` char(10) NOT NULL,
  `TenQuyen` varchar(30) default NULL,
  `DienGiaiQuyen` varchar(100) default NULL,
  PRIMARY KEY  (`MaQuyen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`MaQuyen`, `TenQuyen`, `DienGiaiQuyen`) VALUES
('KHMS', 'Thêm sửa kế hoạch mua sắm', 'Thêm sửa kế hoạch mua sắm'),
('KK', 'Sửa thêm kiểm kê', 'Sửa thêm kiểm kê'),
('VPP', 'Sửa thêm văn phòng phẩm', 'Sửa thêm văn phòng phẩm'),
('DUYET', 'Duyệt', NULL),
('DUYETVPP', 'Duyệt văn phòng phẩm', 'Duyệt văn phòng phẩm'),
('DUYETKK', 'Duyệt kiểm kê', 'Duyệt kiểm kê'),
('DUYETKHMS', 'Duyệt kế hoạch mua sắm', 'Duyệt kế hoạch mua sắm');

-- --------------------------------------------------------

--
-- Table structure for table `sotiencap`
--

CREATE TABLE IF NOT EXISTS `sotiencap` (
  `Nam` varchar(20) NOT NULL,
  `MSDV` char(10) NOT NULL,
  `SoTien` decimal(10,0) default NULL,
  PRIMARY KEY  (`Nam`,`MSDV`),
  KEY `FK_SoTienCap2` (`MSDV`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `TenTaiSan` varchar(30) default NULL,
  `TinhTrang` varchar(50) default NULL,
  PRIMARY KEY  (`MaTaiSan`),
  KEY `FK_CoDonViTinh` (`TenDonViTinh`),
  KEY `FK_ThuocLoaiTaiSan` (`MaLoai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taisan`
--

INSERT INTO `taisan` (`MaTaiSan`, `TenDonViTinh`, `MaLoai`, `TenTaiSan`, `TinhTrang`) VALUES
('3', 'Kg', '1', 'tay', 'tay'),
('1', 'Cái', '1', 'â', 'â');

-- --------------------------------------------------------

--
-- Table structure for table `taisanduocthanhly`
--

CREATE TABLE IF NOT EXISTS `taisanduocthanhly` (
  `MaThanhLy` char(10) NOT NULL,
  `MaTaiSan` char(10) NOT NULL,
  `SLThanhLy` int(11) default NULL,
  PRIMARY KEY  (`MaThanhLy`,`MaTaiSan`),
  KEY `FK_TaiSanDuocThanhLy2` (`MaTaiSan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  PRIMARY KEY  (`MaTaiSan`,`MaPhieuKiemKe`),
  KEY `FK_TaiSanKiemKe2` (`MaPhieuKiemKe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `SoLuongCuaDonVi` int(11) default NULL,
  `DonGiaTS` decimal(10,0) default NULL,
  PRIMARY KEY  (`MSDV`,`MaTaiSan`),
  KEY `FK_TaiSanThuocDonVi2` (`MaTaiSan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taisanthuocdonvi`
--


-- --------------------------------------------------------

--
-- Table structure for table `thanhlytaisan`
--

CREATE TABLE IF NOT EXISTS `thanhlytaisan` (
  `MaThanhLy` char(10) NOT NULL,
  `Nam` varchar(20) NOT NULL,
  `DienGiaiThanhLy` varchar(100) default NULL,
  PRIMARY KEY  (`MaThanhLy`),
  KEY `FK_ThuocNam` (`Nam`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  PRIMARY KEY  (`MSDV`,`MaKHMS`),
  KEY `FK_ThuocDonViMuaSam2` (`MaKHMS`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `SoLuong` int(11) default NULL,
  `ThuyetMinhSuDung` varchar(255) default NULL,
  `DonGiaMuaSam` decimal(10,0) default NULL,
  PRIMARY KEY  (`MaTaiSan`,`MaKHMS`),
  KEY `FK_ThuocKHMS2` (`MaKHMS`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  PRIMARY KEY  (`MaPhieu`,`MaND`),
  KEY `FK_ThuocPhieuMau2` (`MaND`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  PRIMARY KEY  (`MaPhieuDuToan`,`Quy`),
  KEY `FK_ThuocQuyVPP2` (`Quy`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuocquyvpp`
--


-- --------------------------------------------------------

--
-- Table structure for table `thuoctinh`
--

CREATE TABLE IF NOT EXISTS `thuoctinh` (
  `MaThuocTinh` char(10) NOT NULL,
  `TenThuocTinh` varchar(30) default NULL,
  `GhiChu` varchar(50) default NULL,
  PRIMARY KEY  (`MaThuocTinh`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuoctinh`
--

INSERT INTO `thuoctinh` (`MaThuocTinh`, `TenThuocTinh`, `GhiChu`) VALUES
('2', 'B', 'B'),
('1', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `vanphongpham`
--

CREATE TABLE IF NOT EXISTS `vanphongpham` (
  `MaVPP` char(10) NOT NULL,
  `MaLoaiVPP` char(10) NOT NULL,
  `TenDonViTinh` char(10) NOT NULL,
  `MaNSX` char(10) NOT NULL,
  `TenVPP` varchar(30) default NULL,
  PRIMARY KEY  (`MaVPP`),
  KEY `FK_DonViTinhVPP` (`TenDonViTinh`),
  KEY `FK_ThuocLoaiVPP` (`MaLoaiVPP`),
  KEY `FK_ThuocNSX` (`MaNSX`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vanphongpham`
--

