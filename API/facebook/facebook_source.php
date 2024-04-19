<?php
include 'Facebook/autoload.php';
include 'fbconfig.php';

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://subway90.vn/API/facebook/fb-callback.php', $permissions);
?>