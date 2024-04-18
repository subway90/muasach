<?php
function login($user,$pass){
    $sql = "select * from accounts WHERE user = '".$user."' AND pass ='".$pass."' AND status = 1";
    return pdo_query_one($sql);
}

function autoLogin($user,$pass){
    $sql = "select * from accounts WHERE user = '".$user."' AND pass ='".$pass."' AND status = 1";
    $_SESSION['user'] = pdo_query_one($sql);
}

function addAccount($user,$pass,$fullName,$email,$phone,$address){
    $sql = "INSERT INTO accounts(user,pass,fullName,email,phone,address,role,status,dateCreate) values('$user','$pass','$fullName','$email','$phone','$address',2,1,current_timestamp())";
    pdo_execute($sql);
}
function checkUserExist($input){
    $sql = "SELECT id FROM accounts WHERE user = '".$input."' AND status = 1";
    $result = pdo_query_one($sql);
    if(empty($result)) return true;
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