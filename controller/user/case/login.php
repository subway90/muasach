<?php
if(empty($_SESSION['user'])){
    $subURL = "";
    $username = "";
    if(isset($_GET['addCart'])) $subURL .= '&addCart';
    if(isset($_POST['user']) && isset($_POST['password'])){
        $username = $_POST['user'];
        $password = $_POST['password'];
        if(!empty($username)) {
            if(!empty($password)) {
                $result = dang_nhap(str_replace(['"',"'"],'',$_POST['user']),md5($_POST['password']));
                if(!empty($result)){
                    #Data
                    $_SESSION['user'] = $result;
                    #Add Cart
                    if(isset($_GET['addCart'])) {
                        if(!empty($_SESSION['cart'])) {
                            for ($i=0; $i < count($_SESSION['cart']); $i++) { 
                                extract($_SESSION['cart'][$i]);
                                $check = checkCartByID($id);
                                if(empty($check)) addCart($_SESSION['user']['id'],$id,$quantity);
                                else updateQuantity($check,'quantity+1');
                            }
                            unset($_SESSION['cart']);
                        }
                    }
                    #Authorization
                    if($_SESSION['user']['role'] == 1){
                        define('ADMIN','Hieu');
                        header("Location: ".URL."/controller/admin");
                    }
                    else header("Location:".URL);
                }else addAlert('danger','Tài khoản hoặc mật khẩu không chính xác.');
            }else $arr_error[] = 'Vui lòng nhập mật khẩu';
        }else $arr_error[] = 'Vui lòng nhập tài khoản';
    }
    require_once "../../view/user/header.php";
    require_once "../../view/user/login.php";
}else header("Location:".URL);