<?php
require_once "DbTrait.php";
class Brand {
    use DbTrait;
    private $brand_id;
    private $name;

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
    public static function getBrands() {
        $obj_db = self::obj_db();
        $query = "select * from brands "
                ." order BY name asc ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->errno");
        }
        $brands = [];
        if($result->num_rows == 0) {
            return $brands;
        }
        while($data = $result->fetch_object()) {
            $brands[] = $data;
        }
        return $brands;
    }
}
?>