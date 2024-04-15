<?php
if(isset($arrayURL[1]) && !empty($arrayURL[1])){
    if($arrayURL[1] == 'mode-light') $_SESSION['background'] = '';
    if($arrayURL[1] == 'mode-dark')  $_SESSION['background'] = 'style="background: #050314; color:#ffffff; opacity: 0.8"';
}