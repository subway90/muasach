<?php
include "../../view/user/header.php";
unset($_SESSION['user']);
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    setcookie('username','',time()-1);
    setcookie('password','',time()-1);
}
header("Location: ".URL);