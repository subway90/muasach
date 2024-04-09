<?php

if(empty($_SESSION['user'])){
    $title = "Đăng nhập"; $user = "";
    include "../../view/user/header.php";
    if(isset($_POST['user']) && isset($_POST['password'])){
        $user = str_replace(['"',"'"],'',$_POST['user']);
        $result = dang_nhap($user,md5($_POST['password']));
        if(!empty($result)){
            $_SESSION['user'] = $result;
            if($_SESSION['user']['role'] == 1){
                define('ADMIN','Hieu');
                header("Location: ".URL."/controller/admin");
            }
            else header("Location:".URL);
        }else{
            alert('Tài khoản hoặc mật khẩu không chính xác.');
        }
    }
    include "../../view/user/login.php";
}else{
    echo'<script>history.go(-1)</script>';
    $_SESSION['alert'] = "Đã đăng nhập rồi.";
    include "../../view/user/header.php";
    include "../../view/user/home.php";
} 