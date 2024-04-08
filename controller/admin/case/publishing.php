<?php
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) updateStatusById('publishing',$_GET['id'],$_GET['delete']);
show_alert($_SESSION['alert']);
include "../../view/admin/header.php";
include "../../view/admin/publishing.php";
include "../../view/admin/footer.php";