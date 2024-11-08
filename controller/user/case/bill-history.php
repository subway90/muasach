<?php
$previewBill = false;
require_once "../../view/user/header.php";

    # CHI TIẾT BILL
    if(isset($arrayURL[1]) && !empty($arrayURL[1])){
        # đã ĐĂNG NHẬP
        $listDetail = getDetailBillByToken($arrayURL[1]);
        if(!empty($listDetail)){
            $Bill = getOneBillByToken($arrayURL[1]);
            extract($Bill);
            require_once "../../view/user/bill-detail.php";
        }else require_once "../../view/user/404.php";
    }else{
        //DANH SÁCH BILL
        if(!empty($_SESSION['user'])) {
            $listBill = getAllBill($_SESSION['user']['id']);
            require_once "../../view/user/bill-history.php";
        }else{
            $previewBill = true;
            $token = "";
            if(isset($_POST['token'])  && !empty($_POST['token'])) {
                $token = $_POST['token'];
                $Bill = getOneFieldByCustom('bill','*','token = "'.moveCharSpecial($_POST['token']).'" AND idUser = 0');
                if(!empty($Bill)) {
                    extract($Bill);
                    $listDetail = getDetailBillByToken($token);
                    $previewBill = false;
                }else addAlert('danger','TOKEN '.$token.' không hợp lệ');
            }
            require_once "../../view/user/header.php";
            require_once "../../view/user/bill-detail.php";
        }
    }

if(1==2){
    $previewBill = true;
    $token = "";
    if(isset($_POST['token'])  && !empty($_POST['token'])) {
        $token = $_POST['token'];
        $Bill = getOneFieldByCustom('bill','*','token = "'.moveCharSpecial($_POST['token']).'" AND idUser = 0');
        if(!empty($Bill)) {
            extract($Bill);
            $listDetail = getDetailBillByToken($token);
            $previewBill = false;
        }else addAlert('danger','TOKEN '.$token.' không hợp lệ');
    }
    require_once "../../view/user/header.php";
    require_once "../../view/user/bill-detail.php";
}