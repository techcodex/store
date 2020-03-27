<?php
require_once "DbTrait.php";
class Brand {
    use DbTrait;
    private $brand_id;
    private $name;
    private $image;

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
    private function setBrand_id($brand_id) {
        if($brand_id <= 0 || !is_numeric($brand_id)) {
            throw new Exception("*Invalid / Missing Brand ID");
        }
        $this->brand_id = $brand_id;
    }
    private function getBrand_id() {
        return $this->brand_id;
    }
    private function setName($name) {
        if(empty($name) || strlen($name) < 2) {
            throw new Exception("Missing brand Name");
        }
        $this->name = $name;
    }
    private function getName() {
        return $this->name;
    }

    private function setImage($image) {
        if ($image['error'] == 4) {
            throw new Exception("File Missing");
        }

        if ($image['size'] > 500000) {
            throw new Exception("MAX FILE SIZE IS 500K");
        }
        $imgData = getimagesize($image['tmp_name']);

        if (!$imgData) {
            throw new Exception("Not a valid Image");
        }
        if ($image['type'] != "image/jpeg" && $image['type'] != "image/png") {
            throw new Exception("Only jpeg / png allowed");
        }

        if ($image['type'] != $imgData['mime']) {
            throw new Exception("Corrupt Image");
        }
        $temp = str_replace(" ","_",$this->name);
        $fileName = time().$temp . ".jpg";

        $strPath = $_SERVER['DOCUMENT_ROOT'] . "/img/brands/$fileName";
        $result = move_uploaded_file($image['tmp_name'], $strPath);

        if (!$result) {
            throw new Exception("Failed to move file");
        }
        $this->image = $fileName;
    }
    private function getImage() {
        $query = "select image from brands "
            . " where id = '$this->brand_id'";
        $objDB = self::obj_db();
        $result = $objDB->query($query);
        $data = $result->fetch_object();

        if (!is_null($data->image)) {
            $uri = "img/brands/$data->store_image";
        } else {
            $uri = "img/brands/demo.png";
        }
        return $uri;
    }

    public function addBrand(){
        $obj_db = self::obj_db();

        $query = " insert into brands "
                ." (`id`,`name`,`image`) "
                ." values "
                ." (NULL , '$this->name' , '$this->image') ";
        $obj_db->query($query);

        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->errno");
        }
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

    public function updateBrand(){
        $obj_db = self::obj_db();

        if(isset($this->image)){
            $query = " update brands set "
                ." name = '$this->name', "
                ." image = '$this->image' "
                ." where id = $this->brand_id ";
        
        $obj_db->query($query);

        if($obj_db->errno){
            throw new Exception("Select Query Error - $obj_db->errno - $obj_db->error");
        }
        }else{
            $query = " update brands set "
                ." name = '$this->name' "
                ." where id = $this->brand_id ";
        
        $obj_db->query($query);

        if($obj_db->errno){
            throw new Exception("Select Query Error - $obj_db->errno - $obj_db->error");
        }
        }

    }

    public static function getAllbrands($id){
        $obj_db = self::obj_db();

        $query = " select * from brands "
                ." where id ='$id'";
        $result = $obj_db->query($query);

        if($obj_db->errno){
            throw new Exception("Select Query Error - $obj_db->errno - $obj_db->error");
        }

        if($result->num_rows == 0){
            return;
        }
        return $result->fetch_object();
    }

    public static function deleteBrand($id){
        $obj_db = self::obj_db();

        $query = " delete from brands "
                ." where id = '$id' ";

        $obj_db->query($query);

        if($obj_db->errno){
            throw new Exception("Select Query Error - $obj_db->errno - $obj_db->error");
        }   
    }

}
?>