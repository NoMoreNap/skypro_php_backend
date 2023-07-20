<?php
header('Access-Control-Allow-Origin: *');
class database {
    static $host = 'localhost';
    static $login = 'root';
    static $pass = '123';
    static $db = 'skypro';
    static function search_query($log,$pass) {
        $connect = mysqli_connect(self::$host, self::$login,self::$pass,self::$db);
        $req = "SELECT `login`, `pass` FROM `user_data` WHERE `login` = '$log' and `pass` = '$pass'";
        $result = mysqli_query($connect,$req);
        $data = mysqli_fetch_all($result,1);
        return boolval($data);
    }
    static function new_user($log,$pass,$token) {
        $connect = mysqli_connect(self::$host, self::$login,self::$pass,self::$db);
        if ( self::check_user($log)) {
            return 0;
        }

        $req = "INSERT INTO `user_data`( `login`, `pass`, `token`) VALUES ('$log','$pass','$token')";

        $result = mysqli_query($connect,$req);
        return $result;
    }
    static function get_token($log,$pass) {
        $connect = mysqli_connect(self::$host, self::$login,self::$pass,self::$db);

        $req = "SELECT `token` FROM `user_data` WHERE `login` = '$log' and `pass` = '$pass'";
        $result = mysqli_query($connect,$req);
        $data = mysqli_fetch_all($result,1);
        return $data[0]['token'];
    }
    static function check_user($log) {
        $connect = mysqli_connect(self::$host, self::$login,self::$pass,self::$db);
        $req = "SELECT `login` FROM `user_data` WHERE `login` = '$log'";
        $result = mysqli_query($connect,$req);
        $data = mysqli_fetch_all($result,1);
        return boolval($data);
    }
    static function check_token($token) {
        $connect = mysqli_connect(self::$host, self::$login,self::$pass,self::$db);
        $req = "SELECT `token` FROM `user_data` WHERE `token` = '$token'";
        $result = mysqli_query($connect,$req);
        $data = mysqli_fetch_all($result,1);
        return boolval($data);
    }
}

$Database = new database();
