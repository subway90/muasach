<?php
$previewBill = false;
if(!empty($_SESSION['user'])){
    require_once "../../view/user/header.php";
    $listBill = getAllBill($_SESSION['user']['id']);
    if(isset($arrayURL[1]) && !empty($arrayURL[1])){
        $listDetail = getDetailBillByToken($arrayURL[1],$_SESSION['user']['id']);
        if(!empty($listDetail)){
            $Bill = getOneBillByToken($arrayURL[1]);
            extract($Bill);
        }else require_once "../../view/user/404.php";
    }else require_once "../../view/user/404.php";
}else {
    $previewBill = true;
    $token = "";
    if(isset($_POST['token'])  && !empty($_POST['token'])) {
        $token = $_POST['token'];
        $Bill = getOneFieldByCustom('bill','*','token = "'.moveCharSpecial($_POST['token']).'" AND idUser = 0');
        if(!empty($Bill)) {
            extract($Bill);
            $listDetail = getDetailBillByToken($token,0);
            $previewBill = false;
        }else addAlert('danger','TOKEN '.$token.' không hợp lệ');
    }
    require_once "../../view/user/header.php";
    require_once "../../view/user/bill-detail.php";
}