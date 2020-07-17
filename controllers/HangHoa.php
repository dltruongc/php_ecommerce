<?php

include_once "consts.php";

class HangHoa
{
    private $conn;
    private $errorArray;

    public function __construct(mysqli $conn)
    {
        $this->errorArray = array();
        $this->conn = $conn;
    }

    public function themHangHoa($ten, $gia, $sl, $maNhom, $hinh, $mota)
    {
        $q = "INSERT INTO HangHoa (TenHH, Gia, SoLuongHang, MaNhom, Hinh, MotaHH) VALUES ('$ten', $gia, $sl, '$maNhom', '$hinh', '$mota');";
        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Thêm hàng hóa thất bại");
        }
        array_push($this->errorArray, $q);

        return $this->errorArray;
    }

    public function xoaHangHoa($maHH)
    {
        $hinh = $this->xemHangHoa($maHH);
        $hinh = $hinh[0][5];
        $path = ROOT_PATH . "/" . $hinh;

        // If the user file in existing directory already exist, delete it
        if (file_exists($path)) {
            if (!unlink($path)) {
                array_push($this->errorArray, "Không xóa được ảnh");
            };
        }

        $q = "DELETE FROM HangHoa WHERE MSHH = $maHH;";
        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Xóa hàng hóa thất bại");
        }

        return $this->errorArray;
    }

    public function capNhatHangHoa($maHH, $ten, $gia, $sl, $maNhom, $hinh, $mota)
    {
        $q = "UPDATE HangHoa 
            SET TenHH = '$ten', 
            Gia = $gia, 
            SoLuongHang = $sl, 
            MaNhom = '$maNhom', 
            Hinh = '$hinh', 
            MotaHH = '$mota'
            WHERE MSHH = $maHH;";

        $result = $this->conn->query($q);

        if (!$result) {
            array_push($this->errorArray, "Cập nhật hàng hóa thất bại");
        }

        return $this->errorArray;
    }

    public function xemHangHoa($mshh = null)
    {
        if ($mshh != null) {
            $mshh = (int) $mshh;
            $q = "SELECT * FROM HangHoa WHERE MSHH = $mshh";
        } else $q = "SELECT * FROM HangHoa ORDER BY MSHH DESC";
        $results = $this->conn->query($q);

        return $results->fetch_all();
    }

    public function timHangHoa($search)
    {
        $q = "SELECT * FROM HangHoa WHERE TenHH LIKE '%$search%';";
        $results = $this->conn->query($q);
        return $results->fetch_all();
    }

    public function xemHangHoaMoi($sl = null)
    {
        if (empty($sl)) {
            $q = "SELECT * FROM HangHoa ORDER BY MSHH;";
        } else {
            $q = "SELECT * FROM HangHoa ORDER BY MSHH DESC LIMIT $sl;";
        }
        $results = $this->conn->query($q);

        return $results->fetch_all();
    }
}
