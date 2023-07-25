<?php
header('Access-Control-Allow-Origin: *');
require_once '../user/database.php';
require_once './sql_tracks.php';

if (!isset($_GET['action']) or !isset($_GET['token'])) {
    error_format('Не передан Token или Action');
    return;
}

$action = $_GET['action'];
$token = $_GET['token'];

$isLogin = Database::check_token($token);



if ($isLogin) {
    switch ($action) {
        case 'add':
            if (!isset($_POST['id'])) {
                error_format('Не передан ID при добавлении');
                return;
            }
            $id = $_POST['id'];
            echo Track::add_favorite($id, $token);
            break;
        case 'get':
            echo Track::get_favorites($token);
            break;
        case 'del':
            if (!isset($_POST['id'])) {
                error_format('Не передан ID при удалении');
                return;
            }
            $id = $_POST['id'];
            echo Track::delete_favorite($id,$token);
            break;
    }
} else {
    $response = array('res'=>false, 'text' => 'Ошибка авторизации');
    echo json_encode($response);
}

function error_format($text) {
    $responce = array('res' => false,'text' => 'Не правильный формат запроса: '.$text);
    echo json_encode($responce);;
}

