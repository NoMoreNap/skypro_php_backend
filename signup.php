<?php
header('Access-Control-Allow-Origin: *');
require_once 'database.php';

$login = $_POST['login'];
$pass = md5($_POST['pass']);
$token = md5($login.$pass.(time() - rand(0,9999999)));
$insert = Database::new_user($login,$pass,$token);
if ($insert) {
    $response = array('res'=>true,'token'=>$token);
    echo json_encode($response);
} else {
    $response = array('res'=>false);
    echo  json_encode($response);
}


