<?php
trait DbTrait{
    public static function obj_db() {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "store_db";
        $obj_db = new mysqli();
        $obj_db->connect($host,$user,$password);
        if($obj_db->connect_errno) {
            throw new Exception("Db Connect Error ".$obj_db->error);
        }
        $obj_db->select_db($database);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        return $obj_db;
    }
}

?>