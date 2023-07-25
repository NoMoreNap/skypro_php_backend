<?php
header('Access-Control-Allow-Origin: *');
require_once '../user/database.php';
require_once './sql_tracks.php';
if (isset($_GET['action']) and isset($_GET['token'])) {
    $action = $_GET['action'];
    $token = $_GET['token'];
    $isLogin = Database::check_token($token);
    if ($isLogin) {
        switch ($action){
            case 'rand':
                echo Track::get_rand($token);
                break;
        }
    } else {
        $response = array('res'=>false, 'text' => 'Ошибка авторизации');
        echo  json_encode($response);
    }
    return;
}
if (!isset($_GET['id']) or !isset($_GET['token'])) {
    $response = array('res' => false,'text' => 'Не правильный формат запрорса');
    echo json_encode($response);;
    return;
}
$id = $_GET['id'];
$token = $_GET['token'];
$isLogin = Database::check_token($token);

if ($isLogin) {
    if ($id === 0) {
        $response = array('res'=>false, 'text' => 'Не найден трек с id 0');
        echo json_encode($response);
        return;
    }
    echo Track::query_track($id);
} else {
    $response = array('res'=>false, 'text' => 'Ошибка авторизации');
    echo  json_encode($response);
}
