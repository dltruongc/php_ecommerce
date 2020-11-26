<?php


class NhanVien
{
    private $conn;
    private $errorArray;

    public function __construct(mysqli $conn)
    {
        $this->errorArray = array();
        $this->conn = $conn;
    }

    public function themNhanVien($hoten, $chucvu, $sdt, $diachi = null)
    {
        $q = "INSERT INTO NhanVien (HoTenNV, ChucVu, DiaChi, SoDienThoai) 
            VALUES ('$hoten', '$chucvu', '$diachi', '$sdt');";

        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Thêm nhân viên thất bại");
        }

        return $this->conn->insert_id;
    }

    public function xoaNhanVien($ma)
    {
        $q = "DELETE FROM NhanVien WHERE MSNV = $ma;";
        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Xóa nhân viên thất bại");
        }

        return $this->errorArray;
    }

    public function capNhatNhanVien($ma, $hoten, $chucvu, $sdt, $diachi = null)
    {
        $q = "UPDATE NhanVien 
            SET HoTenNV = $hoten, 
                ChucVu = $chucvu, 
                SoDienThoai = $sdt,
                DiaChi = $diachi,
            WHERE MSNV = $ma;";

        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Cập nhật nhân viên thất bại");
        }
        return $this->errorArray;

    }

    public function xemNhanVien($ma = null) {
        if ($ma == null) {
            $q = "SELECT * FROM NhanVien ORDER BY MSNV DESC";
        } else {
            $q = "SELECT * FROM NhanVien WHERE MSNV";
        }

        $res = $this->conn->query($q);

        return $res->fetch_all();
    }
}