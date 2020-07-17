<?php


class KhachHang
{
    private $conn;
    private $errorArray;

    public function __construct(mysqli $conn)
    {
        $this->errorArray = array();
        $this->conn = $conn;
    }

    public function themKhachHang($hoten, $diachi, $sdt)
    {
        $q = "INSERT INTO KhachHang (HoTenKH, DiaChi, SoDienThoai) 
            VALUES ('$hoten', '$diachi', '$sdt');";

        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Thêm khách hàng thất bại");
        }

        return $this->errorArray;
    }


    public function timKhachHang($hoten, $diachi, $sdt)
    {
        $q = "SELECT * FROM KhachHang WHERE HoTenKH LIKE '$hoten' AND DiaChi LIKE '%$diachi%' AND SoDienThoai LIKE '$sdt';";

        $result = $this->conn->query($q);
        return $result->fetch_all();
    }

    public function xoaKhachHang($ma)
    {
        $q = "DELETE FROM KhachHang WHERE MSKH = $ma;";
        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Xóa khách hàng thất bại");
        }
        return $this->errorArray;
    }

    public function capNhatKhachHang($ma, $hoten, $diachi, $sdt)
    {
        $q = "UPDATE KhachHang 
            SET HoTenKH = '$hoten', 
                DiaChi = '$diachi',
                SoDienThoai = '$sdt'
            WHERE MSKH = $ma;";

        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Cập nhật khách hàng thất bại");
        }
        array_push($this->errorArray, "Cập nhật khách hàng thất bại");

        echo $q;

        return $this->errorArray;
    }

    public function xemKhachHang($ma = null)
    {
        if ($ma != null) {
            $q = "SELECT * FROM KhachHang WHERE MSKH = $ma";
        } else {
            $q = "SELECT * FROM KhachHang ORDER BY MSKH DESC";
        }

        $result = $this->conn->query($q);
        if ($result != false) {
            return $result->fetch_all();
        } else return [];
    }

}