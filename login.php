<?php
header('Access-Control-Allow-Origin: *');
require_once 'database.php';

if (!isset($_POST['login']) or !isset($_POST['pass'])) {
    $responce = array('res' => false,'text' => 'Не введен логин или пароль');
    echo json_encode($responce);;
    return;
}

$login = $_POST['login'];
$pass = md5($_POST['pass']);


$isLogin = Database::search_query($login,$pass);

if ($isLogin) {
    $token = Database::get_token($login,$pass);
    $responce = array('res' => true,'token' => $token);
    echo json_encode($responce);
}
else {
    $responce = array('res' => false);
    http_response_code(401);
    echo json_encode($responce);
}
