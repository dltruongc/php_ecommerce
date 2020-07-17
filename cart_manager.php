<?php

ob_start();
session_start();

include "sql.php";
include "controllers/HangHoa.php";

if (isset($_POST["MSHH"])) {
    $hangHoa = new HangHoa($conn);
    $_POST["SoLuong"] = (int) $_POST["SoLuong"];
    $_POST["Gia"] = (int) $_POST["Gia"];
    $_POST["MSHH"] = (int) $_POST["MSHH"];

    foreach ($_POST as $key => $value) {
        $product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }

    $mshh = $_POST["MSHH"];

    $result = $hangHoa->xemHangHoa($mshh)[0];

    $product["TenHH"] = $result[1];
    $product["Gia"] = (int) $result[2];
    $product["SoLuongHang"] = (int) $result[3];
    $product["MaNhom"] = $result[4];
    $product["Hinh"] = $result[5];
    $product["MoTaHH"] = $result[6];

    if (isset($_SESSION["products"])) {
        if (isset($_SESSION["products"][$product['MSHH']])) {
            $_SESSION["products"][$product['MSHH']]["SoLuong"] += $_POST["SoLuong"];
        } else {
            $_SESSION["products"][$product['MSHH']] = $product;
            $_SESSION["products"][$product['MSHH']]["SoLuong"] = $_POST["SoLuong"];
        }
    } else {
        $_SESSION["products"][$product['MSHH']] = $product;
        $_SESSION["products"][$product['MSHH']]["SoLuong"] = $_POST["SoLuong"];
    }
    $count_product = count($_SESSION["products"]);
    die(json_encode(array('results' => $count_product, "products" => $_SESSION["products"])));
}
?>