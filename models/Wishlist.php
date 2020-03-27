<?php
require_once "DbTrait.php";
class Wishlist {
    use DbTrait;
    private $user_id;
    private $product_id;

    public function __set($name,$value) {
        $method = "set".$name;
        if(!method_exists($this,$method)) {
            throw new Exception("set property $name doesn't Exist");
        }
        $this->$method($value);
    }
    public function __get($name) {
        $method = "get".$name;
        if(!method_exists($this,$method)) {
            throw new Exception("get property $name doesn't Exist");
        }
        return $this->$method();
    }
    private function setUser_id($user_id) {
        if($user_id <=0 || !is_numeric($user_id)) {
            throw new Exception("Missing User");
        }
        $this->user_id = $user_id;
    }
    private function getUser_id() {
        return $this->user_id;
    }
    private function setProduct_id($product_id) {
        if($product_id <= 0 || !is_numeric($product_id)) {
            throw new Exception("Missing Product");
        }
        $this->product_id = $product_id;
    }
    private function getProduct_id() {
        return $this->product_id;
    }
    public function add() {
        $obj_db = self::obj_db();
        $query_select = "select * from wishlist "
                        ." where product_id = $this->product_id AND user_id = $this->user_id ";
        $result = $obj_db->query($query_select);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        if($result->num_rows != 0) {
            throw new Exception("Product Already in Wishlist");
        }
        $query = "insert into wishlist "
                ."(`id`,`user_id`,`product_id`) "
                ." values "
                ."(NULL,$this->user_id,$this->product_id) ";
        $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db insert error $obj_db->error");
        }
    }
    public static function remove($id) {
        $obj_db = self::obj_db();
        $query = "delete from wishlist "
                ." where id = $id ";
        $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Delete Error - $obj_db->error");
        }
    }
    public static function countWishlist($user_id) {
        $obj_db = self::obj_db();
        $query = "select count(*) as total "
                ." from wishlist where user_id = $user_id ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        if($result->num_rows == 0) {
            return 0;
        }
        return $result->fetch_object()->total;
    }  
    public static function getUserWishlist($user_id) {
        $obj_db = self::obj_db();
        $query = "select w.id,p.name,p.image,p.price from wishlist w "
                ." JOIN products p on p.id = w.product_id "
                ." where w.user_id = $user_id ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        $wishlist = [];
        if($result->num_rows == 0) {
            return $wishlist;
        }
        while($data = $result->fetch_object()) {
            $wishlist[] = $data;
        }
        return $wishlist;
    }
}

?>