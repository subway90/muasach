<?php
require_once '../../config/APP.php';
$fb = new Facebook\Facebook([
    'app_id' => FB_APP_ID,
    'app_secret' => FB_SECRET,
    'default_graph_version' => 'v3.0',
]);