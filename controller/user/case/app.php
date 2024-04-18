<?php
if($APP == 'mode-light') $_SESSION['background'] = '';
if($APP == 'mode-dark')  $_SESSION['background'] = 'style="background: #050314; color:#ffffff; opacity: 0.8"';
header('Location:'.URL);