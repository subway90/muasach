<?php
require_once "../../view/admin/header.php";
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) updateStatusById('category',$_GET['id'],$_GET['delete']);
require_once "../../view/admin/category.php";