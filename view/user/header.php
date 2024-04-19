<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php if(isset($title) && !empty($title)) echo$title; else echo'Mua Sách'?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?=URL?>/uploads/system/logo-muasach-1000x1000.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Poppins:wght@200;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?=URL?>/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?=URL?>/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=URL?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=URL?>/assets/css/custom.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?=URL?>/assets/css/style.css" rel="stylesheet">
</head>

<!-- [MENU ICON] Start -->
<div style="height: 50%; z-index:3" class="position-fixed end-0 ps-4 ps-lg-0 top-50 col-3 col-md-3 col-lg-1">
        <span class="w-100 p-0">
            <a class="btn btn-lg btn-primary btn-lg-square mx-auto" href="<?=ACT.'app/'.$arrayURL[0]?>/<?php if(isset($_SESSION['background']) && !empty($_SESSION['background'])) echo'mode-light'; else echo'mode-dark'?>" >
                <i class="<?php if(isset($_SESSION['background']) && !empty($_SESSION['background'])) echo'text-light'; else echo'text-dark'?> fas fa-adjust"></i>
            </a>
        </span>
        <span class="w-100 ps-1">   
            <button class="btn btn-lg btn-danger btn-lg-square mx-auto animated pulse infinite" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="fas fa-comment-dots"></i>
            </button>
        </span>
    </div>
</div>
<!-- [MENU ICON] End -->

<body <?php if(isset($_SESSION['background']) && !empty($_SESSION['background'])) echo $_SESSION['background']?> class='position-relative'>
<!-- function show alert -->
<?=showAlert()?>

    <!-- Spinner Start -->
    <!-- <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0 m-0">
                <a href="<?=URL?>" class="navbar-brand col-6 col-md-6 col-lg-2">
                <div class="d-flex align-items-center">
                    <div class="p-0 col-12 col-md-12 col-lg-12">
                        <img class="w-100" src="<?=URL?>/uploads/system/logo-tgs-3.gif" alt="LOGO">
                    </div>
                </div>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto align-items-lg-center">
                        <a href="<?=URL?>" class="nav-item nav-link text-dark">Trang chủ</a>
                        <a href="<?=ACT?>san-pham" class="nav-item nav-link text-dark">Sản phẩm</a>
                        <a href="<?=ACT?>gio-hang" class="nav-item nav-link text-dark position-relative">
                            Giỏ hàng
                            <?php if(!empty($countProductInCart)){ ?>
                            <span class="position-absolute ms-2 top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?=$countProductInCart?>
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <?php } ?>
                        </a>
                        <!-- <a href="<?=ACT?>gio-hang" class="nav-item nav-link text-dark">Giỏ hàng</a> -->
                        <div class="nav-item dropdown position-relative">
                        <!-- [Đã đăng nhập] -->
                        <?php if(!empty($_SESSION['user'])){ ?>
                            <a href="#" class="nav-link dropdown-toggle m-0 fw-bold text-dark" data-bs-toggle="dropdown">
                                <span><img width="35px" height="35px" class="me-2" src="<?=urlPath().$_SESSION['user']['image']?>" alt="LOGO"></span>
                                <?=$_SESSION['user']['fullName']?>
                            </a>
                            <?php if($bellActive) echo'<span class="position-absolute top-0 start-100 translate-middle badge rounded-circle px-2 bg-danger ms-lg-1"><i class="bell fas fa-bell "></i></span>'?>
                            <div class="dropdown-menu bg-primary-subtle mt-2">
                            <?php if($_SESSION['user']['role'] == 1) echo'<a href="'.URL_ADMIN.'" class="dropdown-item py-2 text-primary">Quản lí</a>'?> <!--ADMIN CASE -->
                                <a href="<?=ACT?>thong-tin" class="dropdown-item py-2 text-warning">Cập nhật thông tin</a>
                                <a href="<?=ACT?>lich-su-mua-hang" class="dropdown-item py-2 text-success">Lịch sử mua hàng</a>
                                <a href="<?=ACT?>thong-bao" class="dropdown-item py-2 text-info">
                                <div class="position-relative">
                                    Thông báo
                                    <?php if($bellActive) echo'<span class="position-absolute top-0 start-100 translate-middle badge rounded-circle px-2 bg-danger ms-lg-1">'.$notify.'</span>'?>
                                </div>
                            </a>
                                <hr class="my-1 border border-primary">
                                <a href="<?=ACT?>dang-xuat" class="dropdown-item py-2 text-danger">Đăng xuất</a>
                        <!-- [Chưa đăng nhập] -->
                        <?php }else{ ?>
                            <a href="#" class="nav-link text-dark dropdown-toggle m-0" data-bs-toggle="dropdown">Tài khoản</a>
                            <div class="dropdown-menu bg-primary-subtle mt-2">
                                <a href="<?=ACT?>lich-su-mua-hang" class="dropdown-item py-2">Tra cứu đơn hàng</a>
                                <a href="<?=ACT?>dang-nhap" class="dropdown-item py-2">Đăng nhập</a>
                                <a href="<?=ACT?>dang-ky" class="dropdown-item py-2">Đăng ký</a>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Alert Start -->
    <?php show_alert_2()?>
    <!-- [MESSAGER] Start -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Nhắn tin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body text-dark">
            Chức năng đang phát triển
        </div>
    </div>
    <!-- [MESSAGER] End -->