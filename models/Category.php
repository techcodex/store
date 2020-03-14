<?php
require_once "DbTrait.php";
class Category {
    use DbTrait;
    private $category_id;
    private $name;

    public function __set($name,$value) {
        $method = "set".$name;
        if(!method_exists($this,$name)) {
            throw new Exception("set property $name doesn't Exist");;
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
    private function setCategory_id($category_id) {
        if($category_id <= 0 || !is_numeric($category_id)) {
            throw new Exception("*Invalid / Missing Category ID");
        }
        $this->category_id = $category_id;
    }
    private function getCategory_id() {
        return $this->category_id;
    }
    private function setName($name) {
        if(empty($name) || strlen($category_id) < 2) {
            throw new Exception("Missing Category Name");
        }
        $this->name = $name;
    }
    private function getName() {
        return $this->name;
    }
    public static function getCategories() {
        $obj_db = self::obj_db();
        $query = "select * from categories "
                ." ORDER BY name asc ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error  - $obj_db->error");
        }
        $categories = [];
        while($data = $result->fetch_object()) {
            $categories[] = $data;
        }
        return $categories;
    }
}
?>