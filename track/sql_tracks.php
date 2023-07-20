<?php
header('Access-Control-Allow-Origin: *');
class track {
    static $host = 'localhost';
    static $login = 'root';
    static $pass = '123';
    static $db = 'skypro';

    static function all_tracks() {
        $connect = mysqli_connect(self::$host, self::$login,self::$pass,self::$db);
        $req = "SELECT * FROM `tracks`";
        $result = mysqli_query($connect,$req);
        $data = mysqli_fetch_all($result,1);
        return json_encode($data);
    }
    static function query_track($id) {
        $connect = mysqli_connect(self::$host, self::$login,self::$pass,self::$db);
        $req = "SELECT * FROM `tracks` WHERE `id` = '$id'";
        $result = mysqli_query($connect,$req);
        $data = mysqli_fetch_all($result,1);
        return json_encode($data);
    }

}

$Track = new track();
