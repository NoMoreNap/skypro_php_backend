<?php
header('Access-Control-Allow-Origin: *');
class track {
    static $host = 'localhost';
    static $login = '';
    static $pass = '';
    static $db = '';

    static function all_tracks() {
        $connect = mysqli_connect(self::$host, self::$login,self::$pass,self::$db);
        mysqli_set_charset($connect, 'utf8');
        $req = "SELECT * FROM `tracks`";
        $result = mysqli_query($connect,$req);
        $data = mysqli_fetch_all($result,1);
        return json_encode($data);
    }
    static function query_track($id) {
        $connect = mysqli_connect(self::$host, self::$login,self::$pass,self::$db);
        mysqli_set_charset($connect, 'utf8');
        $req = "SELECT * FROM `tracks` WHERE `id` = '$id'";
        $result = mysqli_query($connect,$req);
        $data = mysqli_fetch_all($result,1);
        return json_encode($data);
    }
    static function get_favorites($token) {
        $connect = mysqli_connect(self::$host, self::$login,self::$pass,self::$db);
        mysqli_set_charset($connect, 'utf8');
        $req_get = "SELECT `favorite` FROM `user_data` WHERE `token` = '$token'";
        $response = mysqli_query($connect, $req_get);
        $data = mysqli_fetch_all($response, 1);
        if (!strlen($data[0]['favorite'])) {
            return  json_encode(array('favorite'=>false));
        }
        return json_encode($data[0]);
    }
    static function get_favorite($token) {
        $connect = mysqli_connect(self::$host, self::$login,self::$pass,self::$db);
        mysqli_set_charset($connect, 'utf8');
        $req_get = "SELECT `favorite` FROM `user_data` WHERE `token` = '$token'";
        $response = mysqli_query($connect, $req_get);
        $data = mysqli_fetch_all($response, 1);
        $str = $data[0]['favorite'];
        return $str;
    }
    static function delete_favorite($id,$token) {
        $connect = mysqli_connect(self::$host, self::$login,self::$pass,self::$db);
        mysqli_set_charset($connect, 'utf8');
        $str = self::get_favorite($token);
        $favArray = explode(',', $str);
        $strNew = '';
        foreach ($favArray as $idenf) {
            if ($idenf != $id) {
                $strNew = strlen($strNew) > 0 ?  $strNew.','.$idenf : $idenf;
            }
        }
        $req_get = "UPDATE `user_data` SET `favorite` = '$strNew' WHERE `token` = '$token'";
        $response = mysqli_query($connect, $req_get);
        return json_encode(array('res'=>boolval($response),'text' => boolval($response) ? 'Трек успешно удален.':'Ошибка запроса.'));

    }
    static function add_favorite($id,$token) {
        $connect = mysqli_connect(self::$host, self::$login,self::$pass,self::$db);
        mysqli_set_charset($connect, 'utf8');
        // get
        $str = self::get_favorite($token);
        $favArray = explode(',', $str);
        foreach ($favArray as $idenf) {
            if ($idenf === $id) {
                echo json_encode(array('res' => true, 'text'=> 'Трек уже есть в избранном!'));
                return;
            }
        }
        // upd
        $str = strlen($str) > 0  ? $str.','.$id : $id;
        $req_upd = "UPDATE `user_data` SET `favorite` = '$str' WHERE `token` = '$token'";
        $result = mysqli_query($connect,$req_upd);
        if (boolval($result)) {
            echo json_encode(array('res' => true,'text' => 'Трек успешно добавлен в избранное!'));
            return;
        }
        return json_encode($result);
    }
    static function get_rand() {
        $array = json_decode(self::all_tracks());
        shuffle($array);
        echo json_encode($array);
    }
}

$Track = new track();
