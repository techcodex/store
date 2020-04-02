<?php
require_once "DbTrait.php";
class Product
{
    use DbTrait;
    private $product_id;
    private $name;
    private $price;
    private $quantity;
    private $features;
    private $description;
    private $brand_id;
    private $category_id;
    private $user_id;
    private $image;

    public function __set($name, $value)
    {
        $method = "set" . $name;
        if (!method_exists($this, $method)) {
            throw new Exception("set property $name doesn't Exist");
        }
        $this->$method($value);
    }
    public function __get($name)
    {
        $method = "get" . $name;
        if (!method_exists($this, $method)) {
            throw new Exception("get property $name doesn't Exist");
        }
        return $this->$method();
    }
    private function setProduct_id($product_id)
    {
        if ($product_id <= 0 || !is_numeric($product_id)) {
            throw new Exception("*Invalid Missing Product");
        }
        $this->product_id = $product_id;
    }
    private function getProduct_id()
    {
        return $this->product_id;
    }
    private function setUser_id($user_id)
    {
        if (!is_numeric($user_id) || $user_id <= 0) {
            throw new Exception("*Invalid Missing User ID");
        }
        $this->user_id = $user_id;
    }
    private function getUser_id()
    {
        return $this->user_id;
    }

    private function setName($name)
    {
        if (empty($name) || strlen($name) < 3) {
            throw new Exception("Missing Product Name");
        }
        $this->name = $name;
    }
    private function getName()
    {
        return $this->name;
    }

    private function setPrice($price)
    {
        if ($price < 0 || empty($price)) {
            throw new Exception("*Invalid / Missing Price");
        }
        $this->price = $price;
    }
    private function getPrice()
    {
        return $this->price;
    }

    private function setQuantity($quantity)
    {
        if (!is_numeric($quantity) || $quantity <= 0 || empty($quantity)) {
            throw new Exception("Missing Quantity");
        }
        $this->quantity = $quantity;
    }
    private function getQuantity()
    {
        return $this->quantity;
    }
    private function setFeatures($features)
    {
        $this->features = $features;
    }
    private function getFeatures()
    {
        return $this->features;
    }
    private function setDescription($description)
    {
        $this->description  = $description;
    }
    private function getDescription()
    {
        return $this->description;
    }
    private function setBrand_id($brand_id)
    {
        if (!is_numeric($brand_id) || $brand_id <= 0) {
            throw new Exception("Missing Brand");
        }
        $this->brand_id = $brand_id;
    }
    private function getBrand_id()
    {
        return $this->brand_id;
    }
    private function setCategory_id($category_id)
    {
        if (!is_numeric($category_id) || $category_id <= 0) {
            throw new Exception("Missing Category");
        }
        $this->category_id = $category_id;
    }
    private function getCategory_id()
    {
        return $this->category_id;
    }
    private function setImage($image)
    {
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
        $temp = str_replace(" ", "_", $this->name);
        $fileName = time() . $temp . ".jpg";

        $strPath = $_SERVER['DOCUMENT_ROOT'] . "/img/user_products/$fileName";
        $result = move_uploaded_file($image['tmp_name'], $strPath);

        if (!$result) {
            throw new Exception("Failed to move file");
        }
        $this->image = $fileName;
    }
    private function getImage()
    {
        $query = "select image from products "
            . " where id = '$this->product_id'";
        $objDB = self::obj_db();
        $result = $objDB->query($query);
        $data = $result->fetch_object();

        //        die($data->profile_image);

        if (!is_null($data->image)) {
            $uri = "img/user_products/$data->store_image";
        } else {
            $uri = "img/user_products/demo.png";
        }
        return $uri;
    }

    public function add()
    {
        $obj_db = self::obj_db();
        $query = "insert into products "
            . " (`id`,`name`,`price`,`quantity`,`features`,`description`,`user_id`,`brand_id`,`category_id`,`image`) "
            . " values "
            . " (NULL,'$this->name',$this->price,$this->quantity,'$this->features','$this->description',$this->user_id,$this->brand_id,$this->category_id, '$this->image')";
        $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Insert Error - $obj_db->error");
        }
    }
    public static function userProducts($user_id)
    {
        $obj_db = self::obj_db();
        $query = "select p.name as product_name,p.features,p.description,p.price,p.quantity, c.name as category_name,"
            . " p.id as product_id,p.status,b.name as brand_name "
            . " from products p "
            . " JOIN brands b on b.id = p.brand_id "
            . " JOIN categories c on c.id = p.category_id "
            . " where p.user_id = $user_id ";
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        $products = [];
        while ($data = $result->fetch_object()) {
            $products[] = $data;
        }
        return $products;
    }
    public static function deactive($product_id)
    {
        $obj_db = self::obj_db();
        $query = "update products set "
            . " status = 0 "
            . " where id = $product_id ";
        $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Update Error");
        }
    }
    public static function active($product_id)
    {
        $obj_db = self::obj_db();
        $query = "update products set "
            . " status = 1 "
            . " where id = $product_id ";
        $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Update Error");
        }
    }
    public static function showAllProductsAdmin()
    {
        $obj_db = self::obj_db();
        $query = "select p.*,p.id as product_id,p.name as product_name,c.name as category_name, "
            . " b.name as brand_name "
            . " from products p "
            . " JOIN brands b on b.id = p.brand_id "
            . " JOIN categories c on c.id = p.category_id "
            . " JOIN users u on u.id = p.user_id ";
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        $products = [];
        if ($result->num_rows == 0) {
            return $products;
        }

        while ($data = $result->fetch_object()) {
            $products[] = $data;
        }
        // print_r($products);
        // die;
        return $products;
    }
    public static function getProduct($id)
    {
        $obj_db = self::obj_db();
        $query = "select p.id as id,p.name,p.description,p.features,p.image,p.price,p.quantity,p.brand_id,p.category_id,p.user_id,"
            . " u.user_name, up.first_name,up.last_name,up.gender,up.profile_image, "
            . " c.name as country_name,s.name as state_name,ci.name as city_name "
            . " from products p "
            . " JOIN users u on p.user_id = u.id "
            . " JOIN user_profile up on u.id = up.user_id "
            . " LEFT JOIN countries c on c.id = up.country_id "
            . " LEFT JOIN states s on s.id = up.state_id "
            . " LEFT JOIN cities ci on c.id = up.city_id "
            . " where p.id = $id ";
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("DB Select Error - $obj_db->error");
        }
        // print_r("rows".$result->num_rows);
        // die;
        if ($result->num_rows == 0) {
            return;
        }
        return $result->fetch_object();
    }
    public function update()
    {
        $obj_db = self::obj_db();
        if (isset($this->image)) {
            $query = " update products set "
                . " name = '$this->name', "
                . " features = '$this->features', "
                . " description = '$this->description', "
                . " price = '$this->price', "
                . " quantity = '$this->quantity', "
                . " user_id = $this->user_id, "
                . " category_id = $this->category_id, "
                . " brand_id = $this->brand_id, "
                . " image = '$this->image' "
                . " where id = $this->product_id ";
            $obj_db->query($query);
            if ($obj_db->errno) {
                throw new Exception("DB update error - $obj_db->error");
            }
        } else {
            $query = " update products set "
                . " name = '$this->name', "
                . " features = '$this->features', "
                . " description = '$this->description', "
                . " price = '$this->price', "
                . " quantity = '$this->quantity', "
                . " user_id = $this->user_id, "
                . " category_id = $this->category_id, "
                . " brand_id = $this->brand_id "
                . " where id = $this->product_id ";
            $obj_db->query($query);
            if ($obj_db->errno) {
                throw new Exception("DB update error - $obj_db->error");
            }
        }
    }
    public static function showAllProducts($limit = 0, $offset = -1, $brand_id, $category_id, $user_id, $type = "all")
    {
        $obj_db = self::obj_db();
        $query = "select * from products p where status = 1 ";

        if ($category_id != 0) {
            $query .= " AND category_id = $category_id ";
        }
        if ($brand_id != 0) {
            $query .= " AND brand_id = $brand_id ";
        }
        if ($type != "all") {
            $query .= " AND name LIKE '%$type%' ";
        }

        if ($limit > 0 && $offset > -1) {
            $query .= " limit $limit offset $offset ";
        }

        $result =  $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        $products = [];
        if ($result->num_rows == 0) {
            return $products;
        }

        while ($data = $result->fetch_object()) {
            $products[] = $data;
        }
        return $products;
    }
    public static function pagination($item_per_page = 3, $brand_id = 0, $category_id = 0, $user_id = 0, $type = "all")
    {
        $obj_db = self::obj_db();
        $query_count = "select count(*) as count from products where status = 1 ";
        if ($category_id != 0) {
            $query_count .= " AND category_id = $category_id ";
        }
        if ($brand_id != 0) {
            $query_count .= " AND brand_id = $brand_id ";
        }
        if ($type != "all") {
            $query_count .= " AND name LIKE '%$type%'";
        }
        $result =  $obj_db->query($query_count);

        $data = $result->fetch_object();
        $total_products = $data->count;
        $total_pages = ceil($total_products / $item_per_page);
        $p_num = [];
        for ($i = 0, $j = 0; $i < $total_pages; $i++, $j += $item_per_page) {
            $p_num[$i] = $j;
        }
        return $p_num;
    }
    public static function viewIncrement($product_id) {
        $obj_db = self::obj_db();
        $query = " update products set "
                ." view = view + 1 "
                ." where id = $product_id ";
        $obj_db->query($query);
        if($obj_db->errno) {
            die($obj_db->error);
        }
    }
    public static function countSellerProducts($user_id) {
        $obj_db = self::obj_db();
        $query = "select count(*) as total from products "
                ." where user_id = $user_id ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            die($obj_db->error);
        }
        if($result->num_rows == 0) {
            return 0;
        }
        return $result->fetch_object()->total;
    } 
    public static function getHomeProducts($offset=0,$limit=0) {
        $obj_db = self::obj_db();
        $query = "select * from products p "
                ." where status = 1 "
                ." limit $limit offset $offset ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            die($obj_db->error);
        }
        $products = [];
        while($data = $result->fetch_object()) {
            $products[] = $data;
        }
        return $products;
    }
}
