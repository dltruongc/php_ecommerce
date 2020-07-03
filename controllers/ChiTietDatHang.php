<?php
class ChiTietDatHang
{
    private $conn;
    private $errorArray;

    public function __construct(mysqli $conn)
    {
        $this->errorArray = array();
        $this->conn = $conn;
    }

    public function themChiTietDatHang($dondh, $mshh, $sl, $gia)
    {
        $q = "INSERT INTO ChiTietDatHang (SoDonDH, MSHH, SoLuong, GiaDatHang)
        VALUES ($dondh, $mshh, $sl, $gia);";
        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Thêm chi tiết đặt hàng thất bại");
        }
        return $this->errorArray;
    }

    public function xoaChiTietDatHang($ma)
    {
        $q = "DELETE FROM ChiTietDatHang WHERE MSChiTiet = $ma;";
        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Xóa chi tiết đặt hàng thất bại");
        }
        return $this->errorArray;
    }

    public function capNhatChiTietDatHang($ma, $dondh, $mshh, $sl, $gia)
    {
        $q = "UPDATE ChiTietDatHang 
            SET SoDonDH = $dondh, 
                MSHH = $mshh, 
                SoLuong = $sl, 
                GiaDatHang = $gia,
            WHERE MSChiTiet = $ma;";
        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Cập nhật chi tiết đặt hàng thất bại");
        }
        return $this->errorArray;
    }
}