<?php
function addCart($idUser,$idProduct,$quantity){
    $sql = "INSERT INTO cart(idUser,idProduct,quantity,dateCreate,status) values('$idUser','$idProduct','$quantity',current_timestamp(),1)";
    pdo_execute($sql);
}
function checkCart($input){
    for($i = 0 ; $i < sizeof($_SESSION['cart']) ; $i++){
        if($_SESSION['cart'][$i]['id'] == $input) return $i; //nếu ID input trùng ID đã có trong CART -> trả về vị trí của SP trùng đó trong CART
    }return -1;
}
function checkCartByID($input){
    $input = str_replace([' ','"',"'","-","."],"",$input);
    if(!empty($_SESSION['user'])) $sql = "SELECT id FROM cart WHERE idProduct = ".$input." AND idUser = ".$_SESSION['user']['id'];
    $result = pdo_query_one($sql);
    return $result['id'];
}
function updateQuantity($id,$input){
    $sql = "UPDATE cart SET quantity = ".$input.", dateCreate = current_timestamp() WHERE id=".$id;
    pdo_execute($sql);
}
function deleteCart($input){
    $input = str_replace([' ','"',"'","-","."],"",$input);
    if(!empty($_SESSION['user'])) $sql = "DELETE FROM cart WHERE id=".$input." AND idUser = ".$_SESSION['user']['id'];
    pdo_execute($sql);
}
function deleteAllCart($input){
    if(!empty($_SESSION['user'])) $sql = "DELETE FROM cart WHERE idUser=".$input;
    pdo_execute($sql);
}