CREATE DATABASE IF NOT EXISTS `QuanLyBanHang`;

CREATE TABLE `Quanlybanhang`.`NhanVien`
(
    `MSNV`        INT         NOT NULL AUTO_INCREMENT,
    `HoTenNV`     VARCHAR(50) NOT NULL,
    `ChucVu`      VARCHAR(50) NOT NULL,
    `DiaChi`      VARCHAR(50) NOT NULL,
    `SoDienThoai` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`MSNV`)
) ENGINE = InnoDB;

ALTER TABLE `NhanVien`
    CHANGE `DiaChi` `DiaChi` VARCHAR(50) NULL;

CREATE TABLE `Quanlybanhang`.`KhachHang`
(
    `MaSoKH`      INT         NOT NULL AUTO_INCREMENT,
    `HoTenKH`     VARCHAR(50) NOT NULL,
    `DiaChi`      VARCHAR(50) NOT NULL,
    `SoDienThoai` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`MaSoKH`)
) ENGINE = InnoDB;

ALTER TABLE `KhachHang`
    CHANGE `MaSoKH` `MSKH` INT(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `Quanlybanhang`.`NhomHangHoa`
(
    `MaNhom`  VARCHAR(5)  NOT NULL,
    `TenNhom` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`MaNhom`)
) ENGINE = InnoDB;

CREATE TABLE `Quanlybanhang`.`DatHang`
(
    `SoDonDH`   INT         NOT NULL AUTO_INCREMENT,
    `MSKH`      INT         NOT NULL,
    `MSNV`      INT         NOT NULL,
    `NgayDH`    DATETIME    NOT NULL,
    `TrangThai` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`SoDonDH`)
) ENGINE = InnoDB;

ALTER TABLE `DatHang`
    CHANGE `MSNV` `MSNV` INT(11) NULL;

ALTER TABLE `DatHang`
    ADD CONSTRAINT `fk_dathang_nv` FOREIGN KEY (`MSNV`) REFERENCES `NhanVien` (`MSNV`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `DatHang`
    ADD CONSTRAINT `fk_dathang_kh` FOREIGN KEY (`MSKH`) REFERENCES `KhachHang` (`MSKH`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `Quanlybanhang`.`ChiTietDatHang`
(
    `SoDonDH`    INT     NOT NULL AUTO_INCREMENT,
    `MSHH`       INT     NOT NULL,
    `SoLuong`    TINYINT NOT NULL,
    `GiaDatHang` FLOAT   NOT NULL,
    PRIMARY KEY (`SoDonDH`)
) ENGINE = InnoDB;

ALTER TABLE `ChiTietDatHang`
    CHANGE `SoDonDH` `MSChiTiet` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ChiTietDatHang`
    ADD `SoDonDH` INT NOT NULL AFTER `MSChiTiet`;

ALTER TABLE `ChiTietDatHang`
    ADD CONSTRAINT `fk_chitietdonhang_donhang` FOREIGN KEY (`SoDonDH`) REFERENCES `DatHang` (`SoDonDH`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `Quanlybanhang`.`HangHoa`
(
    `MSHH`        INT          NOT NULL AUTO_INCREMENT,
    `TenHH`       VARCHAR(50)  NOT NULL,
    `Gia`         INT          NOT NULL,
    `SoLuongHang` TINYINT      NOT NULL,
    `MaNhom`      VARCHAR(5)   NOT NULL,
    `Hinh`        VARCHAR(50)  NOT NULL,
    `MoTaHH`      VARCHAR(200) NOT NULL,
    PRIMARY KEY (`MSHH`)
) ENGINE = InnoDB;

ALTER TABLE `HangHoa`
    CHANGE `MoTaHH` `MoTaHH` VARCHAR(200) NULL;

ALTER TABLE `HangHoa`
    ADD CONSTRAINT `fk_hanghoa_nhom` FOREIGN KEY (`MaNhom`) REFERENCES `NhomHangHoa` (`MaNhom`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `ChiTietDatHang`
    ADD CONSTRAINT `fk_chitietdathang_hh` FOREIGN KEY (`MSHH`) REFERENCES `HangHoa` (`MSHH`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `Quanlybanhang`.`TaiKhoan`
(
    `MSTK`    INT         NOT NULL AUTO_INCREMENT,
    `MSNV`    INT         NOT NULL,
    `TenTK`   VARCHAR(30) NOT NULL,
    `MatKhau` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`MSTK`)
) ENGINE = InnoDB;

ALTER TABLE `TaiKhoan`
    ADD CONSTRAINT `fk_taikhoan_nv` FOREIGN KEY (`MSNV`) REFERENCES `NhanVien` (`MSNV`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `TaiKhoan`
    ADD CONSTRAINT `UC_TaiKhoan` UNIQUE (`MSTK`);

ALTER TABLE `TaiKhoan`
    ADD UNIQUE (`MSNV`);


INSERT INTO NhomHangHoa
VALUES ('air', 'iMac'); -- ok
INSERT INTO NhomHangHoa
VALUES ('imac', 'iMac'); -- ok
INSERT INTO NhomHangHoa
VALUES ('ipad', 'iPad'); -- ok
INSERT INTO NhomHangHoa
VALUES ('ipro', 'iMac'); -- ok
INSERT INTO NhomHangHoa
VALUES ('mini', 'MacBook Mini'); -- ok
INSERT INTO NhomHangHoa
VALUES ('pro', 'MacBook Pro'); -- ok
INSERT INTO NhomHangHoa
VALUES ('phone', 'iPhone');

insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (1, 'Ulises Madgwick', 766762, 74, 'pro', 'http://dummyimage.com/1760x576.bmp/5fa2dd/ffffff',
        'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (2, 'Keriann Stothert', 536923, 35, 'ipro', 'http://dummyimage.com/1325x1012.bmp/ff4444/ffffff',
        'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (3, 'Reuven Boor', 613340, 13, 'mini', 'http://dummyimage.com/989x1034.png/dddddd/000000',
        'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (4, 'Hamilton Vasilic', 627316, 31, 'ipad', 'http://dummyimage.com/1554x592.bmp/dddddd/000000',
        'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (5, 'Jonis Mangon', 733081, 74, 'imac', 'http://dummyimage.com/1360x630.png/dddddd/000000',
        'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (6, 'Joseph Droogan', 301810, 80, 'mini', 'http://dummyimage.com/662x579.jpg/cc0000/ffffff',
        'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (7, 'Donnie Wagg', 223074, 93, 'imac', 'http://dummyimage.com/901x495.jpg/dddddd/000000',
        'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (8, 'Gram Craydon', 499709, 84, 'mini', 'http://dummyimage.com/1699x1034.bmp/cc0000/ffffff',
        'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (9, 'Orlan Prover', 299298, 1, 'phone', 'http://dummyimage.com/1213x1043.png/dddddd/000000',
        'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (10, 'Nealy Colgrave', 776723, 15, 'air', 'http://dummyimage.com/1451x529.bmp/cc0000/ffffff',
        'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (11, 'Raf Hughlin', 86292, 17, 'ipro', 'http://dummyimage.com/1182x907.bmp/5fa2dd/ffffff',
        'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (12, 'Norton Fancett', 31366, 22, 'mini', 'http://dummyimage.com/744x602.bmp/5fa2dd/ffffff',
        'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (13, 'Desiri Petricek', 787610, 48, 'ipad', 'http://dummyimage.com/674x701.png/cc0000/ffffff',
        'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (14, 'Pearla Fassmann', 14727, 20, 'ipad', 'http://dummyimage.com/840x571.bmp/cc0000/ffffff',
        'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (15, 'Zollie Bosma', 785381, 33, 'air', 'http://dummyimage.com/981x735.bmp/5fa2dd/ffffff',
        'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (16, 'Delcine Gilbeart', 691016, 37, 'phone', 'http://dummyimage.com/1197x487.png/dddddd/000000',
        'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (17, 'Barbabra Marians', 269658, 8, 'imac', 'http://dummyimage.com/1138x937.jpg/cc0000/ffffff',
        'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (18, 'Eben Davitashvili', 56445, 93, 'ipro', 'http://dummyimage.com/1802x722.bmp/dddddd/000000',
        'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (19, 'Ernaline O'' Markey', 902008, 75, 'mini', 'http://dummyimage.com/648x656.png/cc0000/ffffff',
        'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (20, 'Issy McMeanma', 802374, 57, 'air', 'http://dummyimage.com/1885x828.bmp/5fa2dd/ffffff',
        'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (21, 'Mathias Caramuscia', 750329, 40, 'ipro', 'http://dummyimage.com/1654x828.png/5fa2dd/ffffff',
        'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (22, 'Alfie Coldbathe', 808745, 83, 'air', 'http://dummyimage.com/1060x830.bmp/5fa2dd/ffffff',
        'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (23, 'Timmie Medmore', 347269, 28, 'phone', 'http://dummyimage.com/1443x566.png/5fa2dd/ffffff',
        'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (24, 'Donnie Lawfull', 68150, 28, 'ipad', 'http://dummyimage.com/1816x964.bmp/5fa2dd/ffffff',
        'In congue. Etiam justo. Etiam pretium iaculis justo.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (25, 'Kristina Rawkesby', 358557, 86, 'air', 'http://dummyimage.com/608x818.bmp/5fa2dd/ffffff',
        'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (26, 'Alix Tuckwood', 589303, 12, 'imac', 'http://dummyimage.com/872x534.bmp/dddddd/000000',
        'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (27, 'Cynthea Lefwich', 134519, 11, 'phone', 'http://dummyimage.com/1058x517.png/5fa2dd/ffffff',
        'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (28, 'Dalton Bigham', 140738, 87, 'air', 'http://dummyimage.com/712x657.bmp/dddddd/000000',
        'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (29, 'Alidia Crumby', 633861, 22, 'phone', 'http://dummyimage.com/1721x990.png/ff4444/ffffff',
        'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (30, 'Mildrid Baglin', 802561, 58, 'phone', 'http://dummyimage.com/1589x582.jpg/ff4444/ffffff',
        'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (31, 'Thaine Cristofano', 240889, 75, 'imac', 'http://dummyimage.com/1272x1054.bmp/cc0000/ffffff',
        'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (32, 'Moyna Wilden', 192519, 86, 'phone', 'http://dummyimage.com/1110x811.bmp/ff4444/ffffff',
        'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (33, 'Arni Ong', 872544, 86, 'ipro', 'http://dummyimage.com/1087x555.jpg/5fa2dd/ffffff',
        'Fusce consequat. Nulla nisl. Nunc nisl.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (34, 'Bianca Regi', 646456, 46, 'pro', 'http://dummyimage.com/1094x632.jpg/ff4444/ffffff',
        'In congue. Etiam justo. Etiam pretium iaculis justo.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (35, 'Marsh Lowrie', 672808, 'imac', 'air', 'http://dummyimage.com/1079x808.bmp/dddddd/000000',
        'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (36, 'Anjanette Gookes', 985831, 57, 'mini', 'http://dummyimage.com/1787x547.bmp/5fa2dd/ffffff',
        'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (37, 'Jewel Bussetti', 293700, 89, 'ipad', 'http://dummyimage.com/1808x857.png/5fa2dd/ffffff',
        'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (38, 'Phillie Rhodes', 725520, 46, 'ipad', 'http://dummyimage.com/1882x714.jpg/dddddd/000000',
        'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (39, 'Kerrin Jouhning', 714732, 94, 'pro', 'http://dummyimage.com/733x915.png/ff4444/ffffff',
        'In congue. Etiam justo. Etiam pretium iaculis justo.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (40, 'Elspeth Ferrari', 887388, 56, 'mini', 'http://dummyimage.com/784x855.png/cc0000/ffffff',
        'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (41, 'Danna Smallman', 285243, 51, 'mini', 'http://dummyimage.com/525x616.bmp/cc0000/ffffff',
        'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (42, 'Marney Rosten', 47535, 8, 'mini', 'http://dummyimage.com/1241x924.jpg/5fa2dd/ffffff',
        'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (43, 'Franklyn Pennrington', 369323, 99, 'ipro', 'http://dummyimage.com/1169x680.png/cc0000/ffffff',
        'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (44, 'Catha Wands', 874362, 81, 'phone', 'http://dummyimage.com/1836x1017.png/dddddd/000000',
        'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (45, 'Ashton Rivard', 792582, 58, 'ipad', 'http://dummyimage.com/1620x1027.bmp/ff4444/ffffff',
        'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (46, 'Georgina Newcom', 19637, 77, 'pro', 'http://dummyimage.com/606x572.jpg/cc0000/ffffff',
        'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (47, 'Ralph Stag', 597580, 63, 'imac', 'http://dummyimage.com/1287x684.jpg/dddddd/000000',
        'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (48, 'Glen Beddow', 286072, 91, 'air', 'http://dummyimage.com/1853x481.png/5fa2dd/ffffff',
        'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (49, 'Michel Nield', 582439, 46, 'pro', 'http://dummyimage.com/1419x487.jpg/cc0000/ffffff',
        'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.');
insert into HangHoa (MSHH, TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH)
values (50, 'Zonda Dowty', 275026, 48, 'ipro', 'http://dummyimage.com/631x565.png/dddddd/000000',
        'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.');


insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (1, 'Prent Bodsworth', '0 1st Alley', '5729880969');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (2, 'Eirena Searchwell', '950 Commercial Avenue', '8358813538');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (3, 'Steward Treffry', '3 Iowa Point', '9923674773');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (4, 'Tucker Bearman', '90083 Brickson Park Way', '9947890907');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (5, 'Aloysius Mulbry', '691 Manley Road', '3904620420');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (6, 'Elke Benneton', '19 Algoma Trail', '6466591327');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (7, 'Shaylynn Brims', '98 American Ash Plaza', '2152415196');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (8, 'Geoffry Deware', '48222 Petterle Hill', '9599648674');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (9, 'Felizio Inchbald', '0824 Grover Road', '9182412647');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (10, 'Lyman Dalloway', '7 Artisan Place', '1171174509');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (11, 'Jourdan Litster', '267 Victoria Junction', '5175423689');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (12, 'Kennan Loader', '5668 Manitowish Circle', '2926574242');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (13, 'Rosabel Gerling', '910 Spohn Parkway', '5604040881');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (14, 'Helyn Gillmore', '53 Leroy Center', '1657274286');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (15, 'Weston Lembke', '0076 Emmet Avenue', '7268413234');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (16, 'Trudi Turn', '7 Eagle Crest Terrace', '8591640271');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (17, 'Dierdre Fodden', '9 Rowland Lane', '3473916043');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (18, 'Alessandra Hemeret', '6 Farwell Plaza', '2717921888');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (19, 'Vern Adamsson', '17200 Mockingbird Plaza', '7613253024');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (20, 'Meade Hriinchenko', '27 Clyde Gallagher Point', '1222251586');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (21, 'Katuscha Hoonahan', '10602 Melvin Street', '2546468899');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (22, 'Evelyn Cuningham', '014 Melody Place', '4812688520');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (23, 'Eryn Lascelles', '98 Badeau Point', '6203935022');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (24, 'Natal Harlick', '2 Saint Paul Point', '3129437106');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (25, 'Wolfgang Eastbrook', '3881 Mifflin Court', '5432325811');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (26, 'Adolph MacMearty', '470 Russell Crossing', '6446298333');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (27, 'Meagan Daborn', '0239 Esch Crossing', '2762240101');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (28, 'Basile Osman', '06 Mcbride Crossing', '8045316927');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (29, 'Valentine McCahey', '0 Warner Court', '8413954218');
insert into KhachHang (MSKH, HoTenKH, DiaChi, SoDienThoai)
values (30, 'Robinson Salandino', '3224 Bellgrove Terrace', '2461925937');
