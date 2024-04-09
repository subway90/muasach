<?php
$success = false;
$point_valid=0;
$arr_error = [];
if(!empty($_SESSION['user'])){
    $getUser = getOneByID('accounts',$_SESSION['user']['id'],'1');
    extract($getUser);
    // [CẬP NHẬT THÔNG TIN: name, email, phone, address]
    if(isset($_POST['info'])){
        $fullName = $_POST['fullName'];
        if(!empty($fullName)) $point_valid++;
        else $arr_error[] = "Tên không được để trống.";

        $email = $_POST['email'];
        if(!empty($email)){
            if(checkEmail($email)==true) $point_valid++;
            else $arr_error[] = "Email không hợp lệ.";
        }
        else $arr_error[] = "Email không được để trống.";
        
        $phone = $_POST['phone'];
        if(!empty($phone)){
            if(checkPhone($phone)==true) $point_valid++;
            else $arr_error[] = "SĐT không hợp lệ.";
        }
        else $arr_error[] = "SĐT không được để trống.";

        $address = $_POST['address'];
        if(!empty($address)) $point_valid++;
        else $arr_error[] = "Địa chỉ không được để trống.";

        if($point_valid==4){
            $success = true; //thông báo update thành công bên VIEW
            updateUser($fullName,$email,$phone,$address,$_SESSION['user']['id']); //update lên database
            $_SESSION['user'] = getOneByID('accounts',$_SESSION['user']['id'],1); //reload lại thông tin user
        }
    }
    // [CẬP NHẬT THÔNG TIN: avatar]
    if(isset($_POST['img'])){
        $image = $_FILES['image'];
        if(empty(basename($_FILES['image']['name']))) alert('Bạn chưa chọn ảnh nào.');
        else{
            $checkImage = checkImage($image,2); //kiểm tra điều kiện file ảnh có hợp lệ hay không | Điều kiện: (trỏ chuột vào hàm để xem)
            if($checkImage === true){
                $hash_name_image =  createTokenChar(16); //mã hóa tên ảnh | [Để tránh tình trạng ảnh chung tên -> nếu chung tên thì khi xóa ảnh sẽ bị xóa trùng luôn]
                $image['name'] = $hash_name_image.'.'.substr($image['type'],6); //hàm substr: cắt chuỗi [type] tại vị trí 6
                if($_SESSION['user']['image'] != 'user_default.jpg') unlink("../uploads/user/avatar/".$_SESSION['user']['image']); //gỡ hình cũ
                move_uploaded_file($image["tmp_name"], "../uploads/user/avatar/".$image["name"]); //up hình mới
                $success = true; //thông báo update thành công bên VIEW
                updateAvatar($image['name'],$_SESSION['user']['id']); //update lên database
                $_SESSION['user'] = getOneByID('accounts',$_SESSION['user']['id'],1); //reload lại thông tin user
            }else alert($checkImage);
        }
    }
    require_once '../../view/user/header.php';
    require_once '../../view/user/info.php';
}else{
    include "../../view/user/header.php";
    require_once '../../view/user/404.php';
}