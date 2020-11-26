<?php
    $conn = mysqli_connect('localhost', 'root', '', 'QuanLyBanHang');
    $msg = null;
    if (!$conn) {
        $rawMsg = "Không kết nối được cơ sở dữ liệu";
        $msg = "<script text=javascript>alert('$rawMsg');</script>";
    }
?>