<?php
header('Access-Control-Allow-Origin: *');
require_once '../database.php';
require_once './sql_tracks.php';
$id = $_GET['id'];
$token = $_GET['token'];
$isLogin = Database::check_token($token);

if ($isLogin) {
    if ($id === 0) {
        $response = array('res'=>false);
        echo json_encode($response);
        return;
    }
    echo Track::query_track($id);
} else {
    $response = array('res'=>false);
    echo  json_encode($response);
}
