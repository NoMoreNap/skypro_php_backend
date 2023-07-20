<?php
header('Access-Control-Allow-Origin: *');
require_once '../database.php';
require_once './sql_tracks.php';

$token = $_SERVER['QUERY_STRING'];
$isLogin = Database::check_token($token);

if ($isLogin) {
    echo Track::all_tracks();
} else {
    $response = array('res'=>false);
    echo  json_encode($response);
}

