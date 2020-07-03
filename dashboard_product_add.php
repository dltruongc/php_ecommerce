<?php
ob_start();
session_start();

include "consts.php";
include "sql.php";
include "controllers/HangHoa.php";
include "controllers/NhomHangHoa.php";

$hangHoa = new HangHoa($conn);
$nhomHangHoa = new NhomHangHoa($conn);
$maNhom = $nhomHangHoa->xemMaNhom();

$err = array();

if (isset($_POST["cancel"])) {
    header("Location: " . ROOT_URL . "/dashboard.php");
}

if (isset($_POST["add"])) {

    $ten = $_POST["TenHH"];
    $gia = (int)$_POST["Gia"];
    $sl = (int)$_POST["SoLuongHang"];
    $maNhom = $_POST["MaNhom"];
    $moTa = $_POST["MoTaHH"];

    // UPLOAD IMAGE
    // Check if image file is a actual image or fake image
    $uploadOk = 1;
    if (isset($_FILES["Hinh"])) {
        $target_dir = getcwd() . "/uploads/";
        $target_file = $target_dir . basename($_FILES["Hinh"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["Hinh"]["tmp_name"]);
        if ($check !== false) {
            move_uploaded_file($_FILES["Hinh"]["tmp_name"], $target_file);
            $uploadOk = 1;
        } else {
            array_push($err, "Tệp tin không đúng định dạng.");
            $uploadOk = 0;
        }
        $hinh = "uploads/" . $_FILES["Hinh"]["name"];
    }

    if ($uploadOk == 1) {
        $x = $hangHoa->themHangHoa($ten, $gia, $sl, $maNhom, $hinh, $moTa);
        $err = array_merge($err, $x);
    } else {
        $x = $hangHoa->themHangHoa($ten, $gia, $sl, $maNhom, "img/favicon.png", $moTa);
        $err = array_merge($err, $x);
    }

    if (count($err) > 0) {
        $err = implode(", ", $err);
        $err = json_encode($err);
        echo "<script type='text/javascript'>alert('$err')</script>";
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
                    <a class="nav-link" href="property-grid.html">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Giỏ hàng</a>
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
/ Nav End /


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
                            <a href="dashboard.php">Home</a>

                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Hàng hoá
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
                    <li class="nav-item border-dark">
                        <a class="nav-link" href="dashboard_account.php">Tài khoản</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="contact">
    <!--    #	Tên	Giá	Số lượng	Mã nhóm	Mô tả	Hành động-->
    <div class="container">
        <div class="col-sm-12 section-t8">
            <div class="row">
                <div class="col-md-7">
                    <form class="form-a contactForm"
                          action="<?php echo ROOT_URL.'/dashboard_product_add.php' ?>"
                          method="post"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="TenHH">Tên hàng hóa:</label>
                                    <input type="text" name="TenHH" id="TenHH"
                                           class="form-control form-control-lg form-control-a"
                                           value="" data-rule="required"
                                           data-msg="Không được bỏ trống">
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="Gia">Giá:</label>
                                    <input type="number" name="Gia" id="Gia"
                                           class="form-control form-control-lg form-control-a"
                                           value="" data-rule="required"
                                           data-msg="Không được bỏ trống">
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="SoLuongHang">Số lượng:</label>
                                    <input type="number" id="SoLuongHang" name="SoLuongHang"
                                           class="form-control form-control-lg form-control-a"
                                           data-rule="required"
                                           max="127"
                                           min="0"
                                           data-msg="Không được bỏ trống">
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label>
                                        <div>Mã nhóm:</div>
                                        <select name="MaNhom">
                                            <?php
                                            foreach ($maNhom as $mn) {
                                                echo "<option value='$mn[0]'>$mn[0]</option>";
                                            }
                                            ?>
                                        </select>
                                    </label>
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <label for="Hinh">Chọn ảnh</label>
                                    </div>
                                    <input
                                            type="file"
                                            class="form-control form-control-lg form-control-a "
                                            id="Hinh"
                                            name="Hinh"
                                            accept="image/*"
                                            maxlength="200"
                                            data-rule="required"
                                            accept="image/*">
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="MoTaHH">Mô tả:</label>
                                    <textarea name="MoTaHH" cols="45" rows="8"
                                              type="text" name="MoTa"
                                              class="form-control form-control-lg form-control-a"
                                              data-rule="required"
                                              data-msg="Không được bỏ trống"></textarea>
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group-lg" role="group">
                                    <input type="submit" name="add" class="btn btn-outline-info" value="Thêm">
                                    <a class="btn btn-info" href="<?php echo ROOT_URL . '/dashboard.php' ?>">Hủy</a>
                                </div>
                            </div>
                        </div>
                    </form>
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
