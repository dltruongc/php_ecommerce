<?php

class DatHang
{
    private $conn;
    private $errorArray;

    public function __construct(mysqli $conn)
    {
        $this->errorArray = array();
        $this->conn = $conn;
    }

    public function themDatHang($kh, $ngayDH, $trangthai, $nv = null)
    {
        if (!empty($nv)) {
        $q = "INSERT INTO DatHang (MSKH, MSNV, NgayDH, TrangThai) 
        VALUES ($kh, $nv, '$ngayDH', '$trangthai');";
        } else {
            $q = "INSERT INTO DatHang (MSKH, NgayDH, TrangThai)
                VALUES ($kh, '$ngayDH', '$trangthai');";
        }

        $result = $this->conn->query($q);

        if ($result == false) {
            array_push($this->errorArray, "Thêm đặt hàng thất bại");
        }

        return $this->errorArray;
    }

    public function xoaDatHang($ma)
    {
        $q = "DELETE FROM DatHang WHERE SoDonDH = $ma;";
        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Xóa đặt hàng thất bại");
        }

        return $this->errorArray;
    }

    public function capNhatDatHang($ma, $kh, $ngayDH, $trangthai, $nv = null)
    {
        if ($nv != null) {
            $q = "UPDATE DatHang 
                SET MSKH = $kh, 
                    NgayDH = '$ngayDH', 
                    TrangThai = '$trangthai',
                    MSNV = $nv
                WHERE SoDonDH = $ma;";
        } else {
            $q = "UPDATE DatHang 
                SET MSKH = $kh, 
                    NgayDH = '$ngayDH', 
                    TrangThai = '$trangthai'
                WHERE SoDonDH = $ma;";
        }

        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Cập nhật đặt hàng thất bại");
        }
        return $this->errorArray;

    }

    public function xemDatHang($ms = null)
    {
        if ($ms != null) {
            $q = "SELECT * FROM DatHang Where SoDonDH = $ms";
        } else {
            $q = "SELECT * FROM DatHang ORDER BY SoDonDH DESC";
        }

        $res = $this->conn->query($q);
        if ($res == false) {
            return [];
        } else return $res->fetch_all();
    }
}