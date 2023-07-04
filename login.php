<?php
header('Access-Control-Allow-Origin: *');
require_once 'database.php';

$login = $_POST['login'];
$pass = $_POST['pass'];

$isLogin = Database::search_query($login,$pass);

if ($isLogin) {
    $token = Database::get_token($login,$pass);
    $responce = array('res' => true,'token' => $token);
    echo json_encode($responce);
}
else {
    $responce = array('res' => false);
    echo json_encode($responce);
}
