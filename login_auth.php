<?php

ob_start();
session_start();

include "sql.php";
include "controllers/NhanVien.php";

$nv = new NhanVien($conn);
if (!isset($_SESSION["login"]) || empty($nv->xemNhanVien($_SESSION["login"]))) {
    header("Location: login.php");
}