<?php
ob_start();
session_start();

include "consts.php";
include "login_auth.php";

include "controllers/TaiKhoan.php";

$err = array();

$tk = new TaiKhoan($conn);
$dsTK = $tk->xemTaiKhoan();

if (isset($_POST["add"])) {
    $_POST["MatKhau"] = md5($_POST["MatKhau"]);
    $err = array_merge($err, $tk->themTaiKhoan($_POST["MSNV"], $_POST["TenTK"], $_POST["MatKhau"]));

    if (count($err) > 0) {
        $err = implode(", ", $err);
        echo "<script type='text/javascript'>alert('Có lỗi: $err')</script>";
    } else header("Location: " . ROOT_URL . "/dashboard_account.php");
} else
    if (isset($_POST["delete"])) {
        $err = array_merge($err, $tk->xoaTaiKhoan($_POST["MSTK"]));

        if (count($err) > 0) {
            $err = implode(", ", $err);
            echo "<script type='text/javascript'>alert('Có lỗi: $err')</script>";
        } else
            header("Location: " . ROOT_URL . "/dashboard_account.php");
    } else
        if (isset($_POST["update"])) {
            $err = array_merge($err, $tk->capNhatTaiKhoan($_POST["MSTK"], $_POST["MSNV"], $_POST["TenTK"]));
            if (count($err) > 0) {
                $err = implode(", ", $err);
                echo "<script type='text/javascript'>alert('Có lỗi: $err')</script>";
            } else {
                header("Location: " . ROOT_URL . "/dashboard_account.php");
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Apple Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<!--/ Nav Start /-->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="navbar-brand text-brand" href="index.php">Apple<span class="color-b">Store</span></a>
        <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none"
                data-toggle="collapse"
                data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Giỏ hàng <span id="top-cart-counter"
                                                                       class="badge badge-info"><?php if (isset($_SESSION["products"])) {
                                echo count($_SESSION["products"]);
                            } ?></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Đăng xuất</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
/ Nav End /

/ Intro Single star /
<section class="intro-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                    <h1 class="title-single">Dashboard</h1>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tài khoản
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- dashboard menu-->
        <div class="row mt-lg-4">
            <div class="col-md-12 col-lg-12">
                <ul class="nav justify-content-around shadow-lg">
                    <li class="nav-item">
                        <a class="nav-link " href="dashboard.php">Hàng hóa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard_bill.php">Đặt hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard_customer.php">Khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard_member.php">Nhân viên</a>
                    </li>
                    <li class="nav-item border-dark  border-bottom">
                        <a class="nav-link" href="dashboard_account.php">Tài khoản</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="table-responsive">
            <div class="col-sm-12 section-t2">
                <div class="mh-100 overflow-auto">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã nhân viên</th>
                            <th scope="col">Tên tài khoản</th>
                            <th scope="col">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="table-active">
                            <form action="dashboard_account.php" method="post">
                                <th class="table-active" scope="row">?</th>
                                <td>
                                    <input class="form-control form-text" type="text" name="MSNV"
                                           placeholder="Mã nhân viên">
                                </td>
                                <td>
                                    <input class="form-control form-text" type="text" name="TenTK"
                                           placeholder="Tên tài khoản">
                                </td>
                                <td>
                                    <input class="form-control form-text" type="password" name="MatKhau"
                                           placeholder="Mật khẩu">
                                </td>
                                <td>
                                    <input name='add' value='Thêm' type='submit' class='btn btn-info'>
                                </td>
                            </form>
                        </tr>
                        <?php
                        foreach ($dsTK as $tk) {
                            echo "
                                    <tr>
                                        <form action='dashboard_account.php' method='post'>
                                            <th scope='row'>$tk[0]</th>
                                            <td><input class='form-control form-text' type='text' name='MSNV'
                                                   placeholder='Mã nhân viên' value='$tk[1]'></td>
                                            <td><input class='form-control form-text' type='text' name='TenTK'
                                                   placeholder='Tên tài khoản' value='$tk[2]'></td>
                                            <td><input readonly class='form-control disabled' type='password'
                                                   placeholder='************'></td>
                                            <td>
                                                <div role='group' aria-label='Basic example'> 
                                                    <input type='hidden' name='MSTK' value='$tk[0]' >
                                                    <input name='update' value='Sửa' type='submit' class='btn btn-outline-info' >
                                                    <input name='delete' value='Xoá' type='submit' class='btn btn-outline-danger' >
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                    ";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!--/ footer Star /-->
<section class="section-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">AppleShop</h3>
                    </div>
                    <div class="w-body-a">
                        <p class="w-text-a color-text-a">
                            Lấy ý tưởng từ hệ thống kinh doanh sản phẩm Apple của website Mac24h. Hệ thống website
                            AppleShop được xây dựng nhằm thúc đẩy sự trao đổi hàng hoá nhanh chóng đang là xu thế của
                            thời đại.
                        </p>
                    </div>
                    <div class="w-footer-a">
                        <ul class="list-unstyled">
                            <li class="color-a">
                                <span class="color-text-a">Phone: </span> +84.964.818.3xx
                            </li>
                            <li class="color-a">
                                <span class="color-text-a">Email: </span> dltruong.@gmail.com
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 section-md-t3">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">Cá nhân</h3>
                    </div>
                    <div class="w-body-a">
                        <div class="w-body-a">
                            <ul class="list-unstyled">
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> Đại học Cần Thơ
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> Đỗ Lam Trường
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> B1704648
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> Hệ Thống Thông tin
                                </li>
                                <li class="item-list-a">
                                    <i class="fa fa-angle-right"></i> Khoá 43
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 section-md-t3">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">Tài liệu tham khảo</h3>
                    </div>
                    <div class="w-body-a">
                        <ul class="list-unstyled">
                            <li class="item-list-a">
                                <i class="fa fa-angle-right"></i> <a href="https://www.ctu.edu.vn/">CTU Lập trình
                                    web</a>
                            </li>
                            <li class="item-list-a">
                                <i class="fa fa-angle-right"></i> <a href="https://www.free-css.com/free-css-templates">Free-css</a>
                            </li>
                            <li class="item-list-a">
                                <i class="fa fa-angle-right"></i> <a href="https://www.w3schools.com/">W3School</a>
                            </li>
                            <li class="item-list-a">
                                <i class="fa fa-angle-right"></i> <a href="https://www.udemy.com/">Udemy</a>
                            </li>
                            <li class="item-list-a">
                                <i class="fa fa-angle-right"></i> <a href="https://developer.mozilla.org/en-US/">MDN</a>
                            </li>
                            <li class="item-list-a">
                                <i class="fa fa-angle-right"></i> <a href="http://mac24h.vn/">Mac24H</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="socials-a">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="https://twitter.com/LamTrng37435104">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/dltruong.neyva/">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://github.com/dltruongc">
                                <i class="fa fa-github" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ Footer End /-->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/popper/popper.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="form/forms.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/scrollreveal/scrollreveal.min.js"></script>
<!-- Template Main Javascript File -->
<script src="js/main.js"></script>
</body>
</html>
