<?php


class NhomHangHoa
{
    private $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function themNhom($maNhom, $tenNhom)
    {
        $q = "INSERT INTO NhomHangHoa VALUES ('$maNhom', '$tenNhom');";
        $result = $this->conn->query($q);
        if (!result) {
            return ['Thêm nhóm thất bại'];
        }
    }

    public function xoaNhom($maNhom)
    {
        $q = "DELETE FROM NhomHangHoa WHERE MaNhom = '$maNhom';";
        $result = $this->conn->query($q);
        if (!result) {
            return ['Xóa nhóm thất bại'];
        }
    }

    public function xemMaNhom()
    {
        $q = "SELECT `MaNhom` FROM `NhomHangHoa`;";
        $res = $this->conn->query($q);
        return $res->fetch_all();
    }
}