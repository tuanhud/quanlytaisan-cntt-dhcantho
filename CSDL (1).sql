/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     6/15/2012 10:32:51 PM                        */
/*==============================================================*/


drop table if exists CoDD;

drop table if exists CoNoiDung;

drop table if exists CoPhieuMau;

drop table if exists CoQuyen;

drop table if exists CoThuocTinh;

drop table if exists CoVPP;

drop table if exists DacDiem;

drop table if exists DonVi;

drop table if exists DonViTinh;

drop table if exists DuocCC;

drop table if exists KeHoachMuaSam;

drop table if exists LapKiemKe;

drop table if exists LoaiKiemKe;

drop table if exists LoaiTaiSan_ThietBi;

drop table if exists LoaiVanPhongPham;

drop table if exists Nam;

drop table if exists NamMuaSam;

drop table if exists NguoiDung;

drop table if exists NhaCungCap;

drop table if exists NhaSanXuat;

drop table if exists NoiDung;

drop table if exists NoiDungCon;

drop table if exists PhieuDuToanVPP;

drop table if exists PhieuKiemKe;

drop table if exists PhieuMau;

drop table if exists Quy;

drop table if exists Quyen;

drop table if exists SoTienCap;

drop table if exists TaiSan;

drop table if exists TaiSanDuocThanhLy;

drop table if exists TaiSanKiemKe;

drop table if exists TaiSanThuocDonVi;

drop table if exists ThanhLyTaiSan;

drop table if exists ThuocDonViMuaSam;

drop table if exists ThuocKHMS;

drop table if exists ThuocPhieuMau;

drop table if exists ThuocQuyVPP;

drop table if exists ThuocTinh;

drop table if exists VanPhongPham;

/*==============================================================*/
/* Table: CoDD                                                  */
/*==============================================================*/
create table CoDD
(
   MaVPP                char(10) not null,
   MoTaDD               varchar(100) not null,
   ChiTietVPP           varchar(100),
   primary key (MaVPP, MoTaDD)
);

/*==============================================================*/
/* Table: CoNoiDung                                             */
/*==============================================================*/
create table CoNoiDung
(
   MaPhieuKiemKe        char(10) not null,
   MaND                 char(10) not null,
   MaTaiSan             char(10) not null,
   ChiTietND            varchar(50),
   primary key (MaPhieuKiemKe, MaND, MaTaiSan)
);

/*==============================================================*/
/* Table: CoPhieuMau                                            */
/*==============================================================*/
create table CoPhieuMau
(
   MaPhieuKiemKe        char(10) not null,
   MaPhieu              char(10) not null,
   primary key (MaPhieuKiemKe, MaPhieu)
);

/*==============================================================*/
/* Table: CoQuyen                                               */
/*==============================================================*/
create table CoQuyen
(
   MSCB                 char(6) not null,
   MaQuyen              char(10) not null,
   primary key (MSCB, MaQuyen)
);

/*==============================================================*/
/* Table: CoThuocTinh                                           */
/*==============================================================*/
create table CoThuocTinh
(
   MaTaiSan             char(10) not null,
   MaThuocTinh          char(10) not null,
   GiaTriThuocTinh      varchar(50),
   primary key (MaTaiSan, MaThuocTinh)
);

/*==============================================================*/
/* Table: CoVPP                                                 */
/*==============================================================*/
create table CoVPP
(
   MaPhieuDuToan        char(10) not null,
   MaVPP                char(10) not null,
   SL_VPP               int,
   DonGia               decimal,
   primary key (MaPhieuDuToan, MaVPP)
);

/*==============================================================*/
/* Table: DacDiem                                               */
/*==============================================================*/
create table DacDiem
(
   MoTaDD               varchar(100) not null,
   GhiChuDD             varchar(100),
   primary key (MoTaDD)
);

/*==============================================================*/
/* Table: DonVi                                                 */
/*==============================================================*/
create table DonVi
(
   MSDV                 char(10) not null,
   TenDV                varchar(50),
   primary key (MSDV)
);

/*==============================================================*/
/* Table: DonViTinh                                             */
/*==============================================================*/
create table DonViTinh
(
   TenDonViTinh         char(10) not null,
   primary key (TenDonViTinh)
);

/*==============================================================*/
/* Table: DuocCC                                                */
/*==============================================================*/
create table DuocCC
(
   MaVPP                char(10) not null,
   MaNCC                char(10) not null,
   primary key (MaVPP, MaNCC)
);

/*==============================================================*/
/* Table: KeHoachMuaSam                                         */
/*==============================================================*/
create table KeHoachMuaSam
(
   MaKHMS               char(10) not null,
   MSCB                 char(6) not null,
   DuyetBM              int,
   DuyetKhoa            int,
   primary key (MaKHMS)
);

/*==============================================================*/
/* Table: LapKiemKe                                             */
/*==============================================================*/
create table LapKiemKe
(
   MSCB                 char(6) not null,
   MaPhieuKiemKe        char(10) not null,
   primary key (MSCB, MaPhieuKiemKe)
);

/*==============================================================*/
/* Table: LoaiKiemKe                                            */
/*==============================================================*/
create table LoaiKiemKe
(
   MaLoaiKK             char(10) not null,
   TenLoaiKK            varchar(50),
   primary key (MaLoaiKK)
);

/*==============================================================*/
/* Table: LoaiTaiSan_ThietBi                                    */
/*==============================================================*/
create table LoaiTaiSan_ThietBi
(
   MaLoai               char(10) not null,
   TenLoai              varchar(30),
   DienGiaiTB           varchar(100),
   primary key (MaLoai)
);

/*==============================================================*/
/* Table: LoaiVanPhongPham                                      */
/*==============================================================*/
create table LoaiVanPhongPham
(
   MaLoaiVPP            char(10) not null,
   TenLoaiVPP           varchar(30),
   DienGiaiVPP          varchar(100),
   primary key (MaLoaiVPP)
);

/*==============================================================*/
/* Table: Nam                                                   */
/*==============================================================*/
create table Nam
(
   Nam                  varchar(20) not null,
   primary key (Nam)
);

/*==============================================================*/
/* Table: NamMuaSam                                             */
/*==============================================================*/
create table NamMuaSam
(
   MaKHMS               char(10) not null,
   Nam                  varchar(20) not null,
   primary key (MaKHMS, Nam)
);

/*==============================================================*/
/* Table: NguoiDung                                             */
/*==============================================================*/
create table NguoiDung
(
   MSCB                 char(6) not null,
   MSDV                 char(10) not null,
   TenCB                varchar(50),
   Gioitinh             varchar(5),
   NgaySinh             date,
   Email                varchar(50),
   Diachi               varchar(100),
   SDT                  char(11),
   Matkhau              varchar(30),
   primary key (MSCB)
);

/*==============================================================*/
/* Table: NhaCungCap                                            */
/*==============================================================*/
create table NhaCungCap
(
   MaNCC                char(10) not null,
   TenNCC               varchar(50),
   DiaChiNCC            varchar(50),
   SoDTNCC              char(12),
   primary key (MaNCC)
);

/*==============================================================*/
/* Table: NhaSanXuat                                            */
/*==============================================================*/
create table NhaSanXuat
(
   MaNSX                char(10) not null,
   TenNSX               varchar(50),
   primary key (MaNSX)
);

/*==============================================================*/
/* Table: NoiDung                                               */
/*==============================================================*/
create table NoiDung
(
   MaND                 char(10) not null,
   TenDonViTinh         char(10) not null,
   TenND                varchar(50),
   GhiChuND             varchar(100),
   primary key (MaND)
);

/*==============================================================*/
/* Table: NoiDungCon                                            */
/*==============================================================*/
create table NoiDungCon
(
   Noi_MaND             char(10) not null,
   MaND                 char(10) not null,
   primary key (Noi_MaND, MaND)
);

/*==============================================================*/
/* Table: PhieuDuToanVPP                                        */
/*==============================================================*/
create table PhieuDuToanVPP
(
   MaPhieuDuToan        char(10) not null,
   Nam                  varchar(20) not null,
   MSDV                 char(10) not null,
   Duyet                int,
   primary key (MaPhieuDuToan)
);

/*==============================================================*/
/* Table: PhieuKiemKe                                           */
/*==============================================================*/
create table PhieuKiemKe
(
   MaPhieuKiemKe        char(10) not null,
   Nam                  varchar(20) not null,
   MaLoaiKK             char(10) not null,
   DienGiaiKiemKe       varchar(100),
   NgayKiemKe           datetime,
   NgayKetThucKiemKe    datetime,
   primary key (MaPhieuKiemKe)
);

/*==============================================================*/
/* Table: PhieuMau                                              */
/*==============================================================*/
create table PhieuMau
(
   MaPhieu              char(10) not null,
   TenPhieu             varchar(50),
   GhiChuPhieu          varchar(50),
   NgayLap              date,
   CapNhatMoiNhat       date,
   KhoaCapNhat          int,
   primary key (MaPhieu)
);

/*==============================================================*/
/* Table: Quy                                                   */
/*==============================================================*/
create table Quy
(
   Quy                  char(10) not null,
   primary key (Quy)
);

/*==============================================================*/
/* Table: Quyen                                                 */
/*==============================================================*/
create table Quyen
(
   MaQuyen              char(10) not null,
   TenQuyen             varchar(30),
   DienGiaiQuyen        varchar(100),
   primary key (MaQuyen)
);

/*==============================================================*/
/* Table: SoTienCap                                             */
/*==============================================================*/
create table SoTienCap
(
   Nam                  varchar(20) not null,
   MSDV                 char(10) not null,
   SoTien               decimal,
   primary key (Nam, MSDV)
);

/*==============================================================*/
/* Table: TaiSan                                                */
/*==============================================================*/
create table TaiSan
(
   MaTaiSan             char(10) not null,
   TenDonViTinh         char(10) not null,
   MaLoai               char(10) not null,
   TenTaiSan            varchar(30),
   TinhTrang            varchar(50),
   primary key (MaTaiSan)
);

/*==============================================================*/
/* Table: TaiSanDuocThanhLy                                     */
/*==============================================================*/
create table TaiSanDuocThanhLy
(
   MaThanhLy            char(10) not null,
   MaTaiSan             char(10) not null,
   SLThanhLy            int,
   primary key (MaThanhLy, MaTaiSan)
);

/*==============================================================*/
/* Table: TaiSanKiemKe                                          */
/*==============================================================*/
create table TaiSanKiemKe
(
   MaTaiSan             char(10) not null,
   MaPhieuKiemKe        char(10) not null,
   primary key (MaTaiSan, MaPhieuKiemKe)
);

/*==============================================================*/
/* Table: TaiSanThuocDonVi                                      */
/*==============================================================*/
create table TaiSanThuocDonVi
(
   MSDV                 char(10) not null,
   MaTaiSan             char(10) not null,
   SoLuongCuaDonVi      int,
   DonGiaTS             decimal,
   primary key (MSDV, MaTaiSan)
);

/*==============================================================*/
/* Table: ThanhLyTaiSan                                         */
/*==============================================================*/
create table ThanhLyTaiSan
(
   MaThanhLy            char(10) not null,
   Nam                  varchar(20) not null,
   DienGiaiThanhLy      varchar(100),
   primary key (MaThanhLy)
);

/*==============================================================*/
/* Table: ThuocDonViMuaSam                                      */
/*==============================================================*/
create table ThuocDonViMuaSam
(
   MSDV                 char(10) not null,
   MaKHMS               char(10) not null,
   primary key (MSDV, MaKHMS)
);

/*==============================================================*/
/* Table: ThuocKHMS                                             */
/*==============================================================*/
create table ThuocKHMS
(
   MaTaiSan             char(10) not null,
   MaKHMS               char(10) not null,
   SoLuong              int,
   ThuyetMinhSuDung     varchar(255),
   DonGiaMuaSam         decimal,
   primary key (MaTaiSan, MaKHMS)
);

/*==============================================================*/
/* Table: ThuocPhieuMau                                         */
/*==============================================================*/
create table ThuocPhieuMau
(
   MaPhieu              char(10) not null,
   MaND                 char(10) not null,
   primary key (MaPhieu, MaND)
);

/*==============================================================*/
/* Table: ThuocQuyVPP                                           */
/*==============================================================*/
create table ThuocQuyVPP
(
   MaPhieuDuToan        char(10) not null,
   Quy                  char(10) not null,
   primary key (MaPhieuDuToan, Quy)
);

/*==============================================================*/
/* Table: ThuocTinh                                             */
/*==============================================================*/
create table ThuocTinh
(
   MaThuocTinh          char(10) not null,
   TenThuocTinh         varchar(30),
   GhiChu               varchar(50),
   primary key (MaThuocTinh)
);

/*==============================================================*/
/* Table: VanPhongPham                                          */
/*==============================================================*/
create table VanPhongPham
(
   MaVPP                char(10) not null,
   MaLoaiVPP            char(10) not null,
   TenDonViTinh         char(10) not null,
   MaNSX                char(10) not null,
   TenVPP               varchar(30),
   DonGiaVPP            decimal,
   primary key (MaVPP)
);

alter table CoDD add constraint FK_CoDD foreign key (MaVPP)
      references VanPhongPham (MaVPP) on delete restrict on update restrict;

alter table CoDD add constraint FK_CoDD2 foreign key (MoTaDD)
      references DacDiem (MoTaDD) on delete restrict on update restrict;

alter table CoNoiDung add constraint FK_CoNoiDung foreign key (MaPhieuKiemKe)
      references PhieuKiemKe (MaPhieuKiemKe) on delete restrict on update restrict;

alter table CoNoiDung add constraint FK_CoNoiDung2 foreign key (MaND)
      references NoiDung (MaND) on delete restrict on update restrict;

alter table CoNoiDung add constraint FK_CoNoiDung3 foreign key (MaTaiSan)
      references TaiSan (MaTaiSan) on delete restrict on update restrict;

alter table CoPhieuMau add constraint FK_CoPhieuMau foreign key (MaPhieuKiemKe)
      references PhieuKiemKe (MaPhieuKiemKe) on delete restrict on update restrict;

alter table CoPhieuMau add constraint FK_CoPhieuMau2 foreign key (MaPhieu)
      references PhieuMau (MaPhieu) on delete restrict on update restrict;

alter table CoQuyen add constraint FK_CoQuyen foreign key (MSCB)
      references NguoiDung (MSCB) on delete restrict on update restrict;

alter table CoQuyen add constraint FK_CoQuyen2 foreign key (MaQuyen)
      references Quyen (MaQuyen) on delete restrict on update restrict;

alter table CoThuocTinh add constraint FK_CoThuocTinh foreign key (MaTaiSan)
      references TaiSan (MaTaiSan) on delete restrict on update restrict;

alter table CoThuocTinh add constraint FK_CoThuocTinh2 foreign key (MaThuocTinh)
      references ThuocTinh (MaThuocTinh) on delete restrict on update restrict;

alter table CoVPP add constraint FK_CoVPP foreign key (MaPhieuDuToan)
      references PhieuDuToanVPP (MaPhieuDuToan) on delete restrict on update restrict;

alter table CoVPP add constraint FK_CoVPP2 foreign key (MaVPP)
      references VanPhongPham (MaVPP) on delete restrict on update restrict;

alter table DuocCC add constraint FK_DuocCC foreign key (MaVPP)
      references VanPhongPham (MaVPP) on delete restrict on update restrict;

alter table DuocCC add constraint FK_DuocCC2 foreign key (MaNCC)
      references NhaCungCap (MaNCC) on delete restrict on update restrict;

alter table KeHoachMuaSam add constraint FK_LapKHMS foreign key (MSCB)
      references NguoiDung (MSCB) on delete restrict on update restrict;

alter table LapKiemKe add constraint FK_LapKiemKe foreign key (MSCB)
      references NguoiDung (MSCB) on delete restrict on update restrict;

alter table LapKiemKe add constraint FK_LapKiemKe2 foreign key (MaPhieuKiemKe)
      references PhieuKiemKe (MaPhieuKiemKe) on delete restrict on update restrict;

alter table NamMuaSam add constraint FK_NamMuaSam foreign key (MaKHMS)
      references KeHoachMuaSam (MaKHMS) on delete restrict on update restrict;

alter table NamMuaSam add constraint FK_NamMuaSam2 foreign key (Nam)
      references Nam (Nam) on delete restrict on update restrict;

alter table NguoiDung add constraint FK_ThuocDonVi foreign key (MSDV)
      references DonVi (MSDV) on delete restrict on update restrict;

alter table NoiDung add constraint FK_DonViTinhCuaBangKiemKe foreign key (TenDonViTinh)
      references DonViTinh (TenDonViTinh) on delete restrict on update restrict;

alter table NoiDungCon add constraint FK_NoiDungCon foreign key (Noi_MaND)
      references NoiDung (MaND) on delete restrict on update restrict;

alter table NoiDungCon add constraint FK_NoiDungCon2 foreign key (MaND)
      references NoiDung (MaND) on delete restrict on update restrict;

alter table PhieuDuToanVPP add constraint FK_DTVPPNam foreign key (Nam)
      references Nam (Nam) on delete restrict on update restrict;

alter table PhieuDuToanVPP add constraint FK_PhieuDTThuocDonVi foreign key (MSDV)
      references DonVi (MSDV) on delete restrict on update restrict;

alter table PhieuKiemKe add constraint FK_KiemKeThuocNam foreign key (Nam)
      references Nam (Nam) on delete restrict on update restrict;

alter table PhieuKiemKe add constraint FK_ThuocLoaiKK foreign key (MaLoaiKK)
      references LoaiKiemKe (MaLoaiKK) on delete restrict on update restrict;

alter table SoTienCap add constraint FK_SoTienCap foreign key (Nam)
      references Nam (Nam) on delete restrict on update restrict;

alter table SoTienCap add constraint FK_SoTienCap2 foreign key (MSDV)
      references DonVi (MSDV) on delete restrict on update restrict;

alter table TaiSan add constraint FK_CoDonViTinh foreign key (TenDonViTinh)
      references DonViTinh (TenDonViTinh) on delete restrict on update restrict;

alter table TaiSan add constraint FK_ThuocLoaiTaiSan foreign key (MaLoai)
      references LoaiTaiSan_ThietBi (MaLoai) on delete restrict on update restrict;

alter table TaiSanDuocThanhLy add constraint FK_TaiSanDuocThanhLy foreign key (MaThanhLy)
      references ThanhLyTaiSan (MaThanhLy) on delete restrict on update restrict;

alter table TaiSanDuocThanhLy add constraint FK_TaiSanDuocThanhLy2 foreign key (MaTaiSan)
      references TaiSan (MaTaiSan) on delete restrict on update restrict;

alter table TaiSanKiemKe add constraint FK_TaiSanKiemKe foreign key (MaTaiSan)
      references TaiSan (MaTaiSan) on delete restrict on update restrict;

alter table TaiSanKiemKe add constraint FK_TaiSanKiemKe2 foreign key (MaPhieuKiemKe)
      references PhieuKiemKe (MaPhieuKiemKe) on delete restrict on update restrict;

alter table TaiSanThuocDonVi add constraint FK_TaiSanThuocDonVi foreign key (MSDV)
      references DonVi (MSDV) on delete restrict on update restrict;

alter table TaiSanThuocDonVi add constraint FK_TaiSanThuocDonVi2 foreign key (MaTaiSan)
      references TaiSan (MaTaiSan) on delete restrict on update restrict;

alter table ThanhLyTaiSan add constraint FK_ThuocNam foreign key (Nam)
      references Nam (Nam) on delete restrict on update restrict;

alter table ThuocDonViMuaSam add constraint FK_ThuocDonViMuaSam foreign key (MSDV)
      references DonVi (MSDV) on delete restrict on update restrict;

alter table ThuocDonViMuaSam add constraint FK_ThuocDonViMuaSam2 foreign key (MaKHMS)
      references KeHoachMuaSam (MaKHMS) on delete restrict on update restrict;

alter table ThuocKHMS add constraint FK_ThuocKHMS foreign key (MaTaiSan)
      references TaiSan (MaTaiSan) on delete restrict on update restrict;

alter table ThuocKHMS add constraint FK_ThuocKHMS2 foreign key (MaKHMS)
      references KeHoachMuaSam (MaKHMS) on delete restrict on update restrict;

alter table ThuocPhieuMau add constraint FK_ThuocPhieuMau foreign key (MaPhieu)
      references PhieuMau (MaPhieu) on delete restrict on update restrict;

alter table ThuocPhieuMau add constraint FK_ThuocPhieuMau2 foreign key (MaND)
      references NoiDung (MaND) on delete restrict on update restrict;

alter table ThuocQuyVPP add constraint FK_ThuocQuyVPP foreign key (MaPhieuDuToan)
      references PhieuDuToanVPP (MaPhieuDuToan) on delete restrict on update restrict;

alter table ThuocQuyVPP add constraint FK_ThuocQuyVPP2 foreign key (Quy)
      references Quy (Quy) on delete restrict on update restrict;

alter table VanPhongPham add constraint FK_DonViTinhVPP foreign key (TenDonViTinh)
      references DonViTinh (TenDonViTinh) on delete restrict on update restrict;

alter table VanPhongPham add constraint FK_ThuocLoaiVPP foreign key (MaLoaiVPP)
      references LoaiVanPhongPham (MaLoaiVPP) on delete restrict on update restrict;

alter table VanPhongPham add constraint FK_ThuocNSX foreign key (MaNSX)
      references NhaSanXuat (MaNSX) on delete restrict on update restrict;

