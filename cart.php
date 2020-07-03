<?php

ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Apple Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/favicon.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
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
                    <a class="nav-link" href="about.html">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="cart.php">Giỏ hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog-grid.html">Liên hệ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Đăng ký</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--/ Nav End /-->

<!--/ Intro Single star /-->
<section class="intro-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                    <h1 class="title-single">Giỏ hàng</h1>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Giỏ hàng
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!--/ Property Star /-->
<section class="section-property">
    <div class="container">
        <div class="row bg-light py-4 mb-3">
            <div class="col-md-3">
                <img src="img/about-1.jpg" alt="" width="100" height="100">
            </div>
            <div class="col-md-3">
                <div class="font-weight-bold">Sản phẩm: <span class="font-weight-normal">Apple Watch</span>
                </div>
                <div class="font-weight-bold">Đơn giá: <span class="font-weight-normal">15000đ</span></div>
            </div>

            <div class="col-md-3">
                <div class="font-weight-bold form-group">
                    <label for="count1">Số lượng:</label>
                    <form action="cart.php" method="post" class="form-inline">
                        <button class="form-control btn btn-dark">-</button>
                        <input id="count1" class="mx-1 col-sm-3 form-control font-weight-bold"
                               type="text" value="12" readonly>
                        <button class="form-control btn btn-dark">+</button>
                    </form>
                </div>
            </div>

            <div class="col-md-3" style="font-size: 1.3em">
                <div class="font-weight-bold">Thành tiền: <span
                            class="font-weight-normal">150000đ</span></div>
            </div>
        </div>
        <div class="row bg-light py-4 mb-3">
            <div class="col-md-3">
                <img src="img/about-1.jpg" alt="" width="100" height="100">
            </div>
            <div class="col-md-3">
                <div class="font-weight-bold">Sản phẩm: <span class="font-weight-normal">Apple Watch</span>
                </div>
                <div class="font-weight-bold">Đơn giá: <span class="font-weight-normal">15000đ</span></div>
            </div>

            <div class="col-md-3">
                <div class="font-weight-bold form-group">
                    <label for="count1">Số lượng:</label>
                    <form action="cart.php" method="post" class="form-inline">
                        <button class="form-control btn btn-dark">-</button>
                        <input id="count1" class="mx-1 col-sm-3 form-control font-weight-bold"
                               type="text" value="12" readonly>
                        <button class="form-control btn btn-dark">+</button>
                    </form>
                </div>
            </div>

            <div class="col-md-3" style="font-size: 1.3em">
                <div class="font-weight-bold">Thành tiền: <span
                            class="font-weight-normal">150000đ</span></div>
            </div>
        </div>
        <div class="row bg-light py-4 mb-3">
            <div class="col-md-3">
                <img src="img/about-1.jpg" alt="" width="100" height="100">
            </div>
            <div class="col-md-3">
                <div class="font-weight-bold">Sản phẩm: <span class="font-weight-normal">Apple Watch</span>
                </div>
                <div class="font-weight-bold">Đơn giá: <span class="font-weight-normal">15000đ</span></div>
            </div>

            <div class="col-md-3">
                <div class="font-weight-bold form-group">
                    <label for="count1">Số lượng:</label>
                    <form action="cart.php" method="post" class="form-inline">
                        <button class="form-control btn btn-dark">-</button>
                        <input id="count1" class="mx-1 col-sm-3 form-control font-weight-bold"
                               type="text" value="12" readonly>
                        <button class="form-control btn btn-dark">+</button>
                    </form>
                </div>
            </div>

            <div class="col-md-3" style="font-size: 1.3em">
                <div class="font-weight-bold">Thành tiền: <span
                            class="font-weight-normal">150000đ</span></div>
            </div>
        </div>
        <div class="row bg-light py-4 mb-3">
            <div class="col-md-3">
                <img src="img/about-1.jpg" alt="" width="100" height="100">
            </div>
            <div class="col-md-3">
                <div class="font-weight-bold">Sản phẩm: <span class="font-weight-normal">Apple Watch</span>
                </div>
                <div class="font-weight-bold">Đơn giá: <span class="font-weight-normal">15000đ</span></div>
            </div>

            <div class="col-md-3">
                <div class="font-weight-bold form-group">
                    <label for="count1">Số lượng:</label>
                    <form action="cart.php" method="post" class="form-inline">
                        <button class="form-control btn btn-dark">-</button>
                        <input id="count1" class="mx-1 col-sm-3 form-control font-weight-bold"
                               type="text" value="12" readonly>
                        <button class="form-control btn btn-dark">+</button>
                    </form>
                </div>
            </div>

            <div class="col-md-3" style="font-size: 1.3em">
                <div class="font-weight-bold">Thành tiền: <span
                            class="font-weight-normal">150000đ</span></div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col-md-6 title-a">
                Tổng: 6000000đ
            </div>
            <div class="col-md-6 ">
                <button class="d-float float-right btn btn-lg btn-outline-dark">Thanh toán</button>
            </div>
        </div>
    </div>
</section>
<!--/ Property End /-->

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
<script src="js/cart.js"></script>
</body>

</html>