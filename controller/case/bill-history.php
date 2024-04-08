<?php
require_once "../view/header.php";
if(!empty($_SESSION['user'])){
    $listBill = getAllBill($_SESSION['user']['id']);
    if(isset($arrayURL[1]) && !empty($arrayURL[1])){
        $listDetail = getDetailBillByToken($arrayURL[1],$_SESSION['user']['id']);
        if(!empty($listDetail)){
            $Bill = getOneBillByToken($arrayURL[1]);
            extract($Bill);
            require_once "../view/bill-detail.php";
        }else require_once "../view/404.php";
    }else require_once "../view/bill-history.php";
}else require_once "../view/404.php";