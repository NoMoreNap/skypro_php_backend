<?php
header('Access-Control-Allow-Origin: *');
require '../user/database.php';
require_once './sql_tracks.php';

if (!isset($_SERVER['QUERY_STRING'])) {
    $responce = array('res' => false,'text' => 'Не найден токен');
    echo json_encode($responce);;
    return;
}
$token = $_SERVER['QUERY_STRING'];
$isLogin = Database::check_token($token);

if ($isLogin) {
    echo Track::all_tracks();
} else {
    $response = array('res'=>false, 'text' => 'Ошибка авторизации');
    echo  json_encode($response);
}

