<?php
$previewBill = false;
require_once "../../view/user/header.php";
if(isset($arrayURL[1]) && !empty($arrayURL[1])){
    $Bill = getOneBillByToken($arrayURL[1]);
    if(!empty($_SESSION['user'])) $listDetail = getDetailBillByToken($arrayURL[1],$_SESSION['user']['id']);
    else $listDetail = getDetailBillByToken($arrayURL[1],0);
        require_once "../../view/user/bill-detail.php";
}else require_once "../../view/user/404.php";