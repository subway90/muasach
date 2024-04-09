<?php
// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>'; exit;

# [FUNCTION START]
ob_start(); 
session_start();

# [FILES]
include "../../config/URL.php";
include "../../config/database.php";
include "../../model/pdo.php";
include "../../model/function.php";
include "../../model/user/product.php";
include "../../model/user/user.php";
include "../../model/user/cart.php";
include "../../model/user/bill.php";
include "../../model/user/notifycation.php";

# [VARIBLE START]
if(!empty($_SESSION['user'])){
$bellActive = false; $notify = 0;
$listFB = getAllByIdUser('feedback',$_SESSION['user']['id'],1);
    $countNotify = count($listFB);
    for ($i=0; $i < $countNotify; $i++) { 
        extract($listFB[$i]);
        if($statusUser == 1) {
            $notify++;
            $bellActive = true;
        }
    }
}
$activeModal = 'pay';

# [SESSION]
if(!isset($_SESSION['user'])) $_SESSION['user'] = [];
if(!isset($_SESSION['alert'])) $_SESSION['alert'] = [];
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

# [CASE]
if(isset($_GET['act'])){
    $arrayURL = explode('/',$_GET['act']);
    $act=$arrayURL[0];
        switch($act) {
            case "trang-chu":
                $title='Trang chủ';
                require_once 'case/home.php';
                break;
            case "chi-tiet":
                $title='Chi tiết sản phẩm';
                require_once 'case/detail.php';
                break;
            case "dang-nhap":
                $title='Đăng nhập';
                require_once 'case/login.php';
                break;
            case "dang-ky":
                $title = "Đăng kí tài khoản";
                require_once 'case/register.php';
                break;
            case "dang-xuat":
                require_once 'case/logout.php';
                break;
            case "gio-hang":
                $title='Giỏ hàng';
                require_once 'case/cart.php';
                break;
            case "san-pham":
                $title = "Sản phẩm";
                require_once 'case/product.php';
                break;
            case "lich-su-mua-hang":
                $title = "Lịch sử mua hàng";
                require_once 'case/bill-history.php';
                break;
            case "thong-tin":
                $title = "Thông tin cá nhân";
                require_once 'case/info.php';
                break;
            case "thong-bao":
                $title = "Thông báo";
                require_once 'case/notifycation.php';
                break;
            case "danh-gia":
                $title = "Đánh giá sản phẩm";
                require_once 'case/notifycation.php';
                break;
            case "test":
                $title = '&#9760; BUG &#9760;';
                require_once 'case/test.php';
                break;
            case "view-modal-bill":
                $title='Thanh toán';
                include "../../view/user/header.php";
                include "../../view/user/bill.php";
                break;
            default:
                $title = "404 NOT FOUND";
                include "../../view/user/header.php";
                include "../../view/user/404.php";
                break;
        }
}else{
    $title = "Trang chủ";
    show_alert($_SESSION['alert']);
    include "../../view/user/header.php";
    include "../../view/user/home.php";
}
# [LAYOUT] footer
include "../../view/user/footer.php";
