<?php


class TaiKhoan
{
    private $conn;
    private $errorArray;

    public function __construct(mysqli $conn)
    {
        $this->errorArray = array();
        $this->conn = $conn;
    }

    public function timTaiKhoan($tentk)
    {
        $q = "SELECT TenTK FROM TaiKhoan WHERE TenTK = '$tentk'";
        $res = $this->conn->query($q);
        if ($res->num_rows > 0) {
            return true;
        };
    }

    public function timTheoNhanVien($nhanVien)
    {
        $q = "SELECT TenTK FROM TaiKhoan WHERE MSNV = $nhanVien";
        $res = $this->conn->query($q);
        return $res->fetch_all();
    }

    public function themTaiKhoan($msnv, $tentk, $mk)
    {
        if ($this->timTaiKhoan($tentk)) {
            array_push($this->errorArray, "Tên tài khoản đã tồn tại");
        } else if (!empty($this->timTaiKhoan($tentk))) {
            array_push($this->errorArray, "Nhân viên này đã được cấp tài khoản");
        } else {
            $q = "INSERT INTO TaiKhoan (MSNV, TenTK, MatKhau) VALUES ($msnv, '$tentk', '$mk');";

            $result = $this->conn->query($q);
            if (!$result) {
                array_push($this->errorArray, "Thêm tài khoản thất bại.");
            }
        }

        return $this->errorArray;
    }

    public function xoaTaiKhoan($ma)
    {
        $q = "DELETE FROM TaiKhoan WHERE MSTK = $ma;";
        $result = $this->conn->query($q);
        if (!$result) {
            array_push($this->errorArray, "Xóa tài khoản thất bại");
        }
        return $this->errorArray;
    }

    public function capNhatTaiKhoan($ma, $msnv, $tentk, $mk = null)
    {
        if (empty($mk)) {
            $q = "UPDATE TaiKhoan 
            SET MSNV = $msnv, 
                TenTK = '$tentk'
            WHERE MSTK = $ma;";
        } else {
            $q = "UPDATE TaiKhoan 
            SET MSNV = $msnv, 
                TenTK = '$tentk',
                MatKhau = '$mk'
            WHERE MSTK = $ma;";
        }
        if ($this->timTaiKhoan($tentk)) {
            array_push($this->errorArray, "Tên tài khoản đã tồn tại");
        } else {
            $result = $this->conn->query($q);
            if (!$result) {
                array_push($this->errorArray, "Cập nhật tài khoản thất bại.");
            }
        }

        return $this->errorArray;
    }

    public function dangNhap($tentk, $matkhau)
    {
        $matkhau = md5($matkhau);
        $q = "SELECT TenTK FROM TaiKhoan WHERE TenTK = '$tentk' AND MatKhau= '$matkhau';";
        $res = $this->conn->query($q);
        if ($res->num_rows > 0) {
            $this->taoSession($tentk);
            return $res->fetch_all();
        };
        return false;
    }

    private function taoSession($tentk)
    {
        $_SESSION["login"] = $tentk;
    }

    public function dangXuat($tentk)
    {
        $_SESSION["login"] = null;
    }

    public function xemTaiKhoan($ms = null)
    {
        if ($ms != null) {
            $q = "SELECT MSTK, MSNV, TenTK FROM TaiKhoan WHERE MSTK = $ms";

        }

        $q = "SELECT MSTK, MSNV, TenTK FROM TaiKhoan ORDER BY MSTK DESC";
        $res = $this->conn->query($q);

        if ($res == false) {
            return [];
        } else {
            return $res->fetch_all();
        }
    }
}