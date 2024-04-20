<?php
function login($user,$pass){
    $sql = "SELECT * FROM accounts WHERE user= '".$user."' AND pass ='".$pass."' AND status = 1";
    return pdo_query_one($sql);
}

function autoLogin($user,$pass){
    if(!empty($pass)) $passSelect = "AND pass ='".$pass."'";
    $sql = "SELECT * FROM accounts WHERE user= '".$user."' ".$passSelect." AND status = 1";
    $result = pdo_query_one($sql);
    if(!empty($result)) $_SESSION['user'] = $result;
}

function addAccount($type,$user,$pass,$fullName,$email,$phone,$address,$image){
    $sql = "INSERT INTO accounts(type,user,pass,fullName,email,phone,address,image,role,status,dateCreate) values('$type','$user','$pass','$fullName','$email','$phone','$address','$image',2,1,current_timestamp())";
    pdo_execute($sql);
}

/**
 * @param string $input nhập username
 * Trả về TRUE nếu không tồn tại, ngược lại trả về FALSE
 */
function checkUserExist($input){
    $sql = "SELECT id FROM accounts WHERE user = '".$input."' AND status = 1";
    if(empty(pdo_query_one($sql))) return true;
    else return false;
}
function updateUser($fullName,$email,$phone,$address,$id){
    $sql = "UPDATE accounts SET fullName = '".$fullName."',email = '".$email."',phone = '".$phone."',address = '".$address."',dateUpdate = current_timestamp() WHERE id = ".$id;
    pdo_execute($sql);
}
function updateAvatar($image,$id){
    $sql = "UPDATE accounts SET image = '".$image."',dateUpdate = current_timestamp() WHERE id = ".$id;
    pdo_execute($sql);
}

function urlPath(){
    if($_SESSION['user']['type'] == 1) return URL.'/uploads/user/avatar/';
    else return '';
}