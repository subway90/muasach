<?php
require_once "../../view/admin/header.php";
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) updateStatusById('products',$_GET['id'],$_GET['delete']);
// [SHOW SP]
$title="Quản lí sản phẩm";
if(isset($_REQUEST['success'])) alert("Đăng sản phẩm thành công ");
require_once "../../view/admin/product.php";