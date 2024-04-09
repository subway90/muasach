<?php
require_once "../../../view/user/user/header.php";
if(!empty($_SESSION['user'])){
    $listBill = getAllBill($_SESSION['user']['id']);
    if(isset($arrayURL[1]) && !empty($arrayURL[1])){
        $listDetail = getDetailBillByToken($arrayURL[1],$_SESSION['user']['id']);
        if(!empty($listDetail)){
            $Bill = getOneBillByToken($arrayURL[1]);
            extract($Bill);
            require_once "../../../view/user/user/bill-detail.php";
        }else require_once "../../../view/user/user/404.php";
    }else require_once "../../../view/user/user/bill-history.php";
}else require_once "../../../view/user/user/404.php";