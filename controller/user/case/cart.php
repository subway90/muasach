<?php
$total = 0;
//Nếu đã ĐĂNG NHẬP -> gọi CART trong Database và truyền dữ liệu vào mảng $cart
if(!empty($_SESSION['user'])) $cart = getAllByIdUser('cart',$_SESSION['user']['id'],1);
else $cart = [];
// [THÊM SP MỚI VÀ CART]
if(isset($_GET['add'])){
    if(empty($_SESSION['user'])){ // nếu CHƯA ĐĂNG NHẬP (GUEST)
        $check = checkCart($_GET['id']);
        if($check == -1) $_SESSION['cart'][] = ['id' => $_GET['id'],'quantity' => $_GET['quantity']]; // nếu không trùng ID-> thêm SP vào CART
        else  $_SESSION['cart'][$check]['quantity']++; // nếu trùng ID-> thêm số lượng (+1) vào ID đã trùng
        header("Location:".ACT."gio-hang");
    }else{ // nếu ĐÃ ĐĂNG NHẬP (USER)
        $check = checkCartByID($_GET['id']);
        if(empty($check)) addCart($_SESSION['user']['id'],$_GET['id'],$_GET['quantity']);
        else updateQuantity($check,'quantity+1');
    }
    header("Location:".ACT."gio-hang");
}

// [XÓA 1 SP TRONG CART]
if(isset($_GET['delete']) && !empty($_GET['delete'])) {
    if(empty($_SESSION['user'])){
        --$_GET['delete'];
        array_splice($_SESSION['cart'],$_GET['delete'],1);
        header("Location:".ACT."gio-hang");
    }else deleteCart($_GET['delete']);
    header("Location:".ACT."gio-hang");
}

// [XÓA TẤT CẢ SP TRONG CART]
if(isset($_GET['close'])){
    if(empty($_SESSION['user'])) unset($_SESSION['cart']); //nếu chưa đăng nhập -> hủy SESSION CART
    else deleteAllCart($_SESSION['user']['id']); //nếu đã đăng nhập -> thực thi SQL Delete dữ liệu
    header("Location:".ACT."gio-hang");
}

// [THÊM SỐ LƯỢNG SP]
if(isset($_GET['edit']) && isset($_POST['quantity']) && !empty($_POST['quantity'])){
    $quantityProduct = getOneFieldByID('products','quantity',$_POST['idProduct'],0);
    // var_dump($_POST['quantity']); exit;
    if($_POST['quantity'] > $quantityProduct['quantity']) $_SESSION['alert'] = "Số lượng không đủ để bạn mua | Số lượng còn hiện tại còn ".$quantityProduct['quantity'];
    else{
        if(empty($_SESSION['user'])){ //Nếu chưa đăng nhập -> Sửa ở SESSION
            $_SESSION['cart'][$_POST['idCart']]['quantity'] = $_POST['quantity'];
        }else updateQuantity($_POST['id'],$_POST['quantity']); //Nếu đã đăng nhập -> Sửa ở Database
        header("Location:".ACT."gio-hang");
    }
}

// [TOTAL]
if(empty($_SESSION['user'])){ // Trường hợp: Chưa đăng nhập (GUEST)
    if(!empty($_SESSION['cart'])){ //Nếu CART có SP
        for ($i=0; $i < count($_SESSION['cart']); $i++) {
            $product = getOneByID('products',$_SESSION['cart'][$i]['id'],'1') ;// select SP theo ID
            extract($product);
            if($priceSale==0) $total+=$price*$_SESSION['cart'][$i]['quantity'];
            else $total+=$priceSale*$_SESSION['cart'][$i]['quantity'];
        }
    }
}else{ // Trường hợp: Đã đăng nhập (USER)
    if(!empty($cart)){
        for ($i=0; $i < count($cart); $i++) { 
            $product = getOneByID('products',$cart[$i]['idProduct'],1);
            extract($product);
            if($priceSale==0) $total+=($price*$cart[$i]['quantity']);
            else $total+=$priceSale*$cart[$i]['quantity'];
        }
    }
}

// [THÔNG TIN THANH TOÁN]
if(!empty($_SESSION['user'])){ // nếu đã đăng nhập -> load thông tin có sẵn từ USER
    $user = getOneByID('accounts',$_SESSION['user']['id'],0);
    extract($user);
    $mess = "";$pay=1;
}else{
    $fullName = "";$phone = "";$email = ""; $address = "";$mess = "";$pay=1;
}


// [THANH TOÁN]
$arr_valid[] = array();$point_valid=0;
if(isset($_REQUEST['thanhtoan']) && $total !=0){
    $pay = $_POST['pay'];
    $fullName = $_POST['fullName'];
    if(empty($fullName)) $arr_valid[] = "Chưa nhập họ và tên";
    else $point_valid++;
    $phone = $_POST['phone'];
    if(empty($phone)) $arr_valid[] = "Chưa nhập SĐT";
    else {
        $checkPhone = checkPhone($phone);
        if($checkPhone == false) $arr_valid[] = "SĐT không hợp lệ";
        else $point_valid++;
    }
    $address = $_POST['address'];
    if(empty($address)) $arr_valid[] = "Chưa nhập địa chỉ";
    else $point_valid++;
    $email = $_POST['email'];
    $mess = $_POST['mess'];
    if($point_valid < 3) $activeModal = 'onload'; //Load lại PAY-MODAL ở CART
    else{
        if(!empty($_SESSION['user'])){ //nếu đã ĐĂNG NHẬP
            $token = createTokenChar(10);
            addBill($token,$total,$_SESSION['user']['id'],$total,$fullName,$phone,$email,$address,$pay); //thêm hóa đơn vào Database
            for($i=0; $i < count($cart); $i++){ //thêm hóa đơn chi tiết
                $product = getOneFieldByID('products','price,priceSale',$cart[$i]['idProduct'],1);
                extract($product);
                if($priceSale != 0) $price = $priceSale;
                addBillDetail($token,$cart[$i]['idProduct'],$price,$cart[$i]['quantity']); //thêm hóa đơn chi tiết vào Database
            }
        $_SESSION['alert'] = "Tạo hóa đơn thành công !";
        }else{ //nếu chưa ĐĂNG NHẬP
            $token = createTokenChar(10);
            addBill($token,2,0,$total,$fullName,$phone,$email,$address,$pay); //thêm hóa đơn vào Database
            for($i=0; $i < count($_SESSION['cart']); $i++){ //thêm hóa đơn chi tiết
                $product = getOneFieldByID('products','price,priceSale',$_SESSION['cart'][$i]['id'],1);
                extract($product);
                if($priceSale != 0) $price = $priceSale;
                addBillDetail($token,$_SESSION['cart'][$i]['id'],$price,$_SESSION['cart'][$i]['quantity']); //thêm hóa đơn chi tiết vào Database
            }
            $_SESSION['alert'] = "Tạo hóa đơn thành công !";
        }
        header("Location:".ACT."gio-hang&close");
    }
}

show_alert($_SESSION['alert']);
include "../../view/user/header.php";
include "../../view/user/cart.php";