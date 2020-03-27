<?php
require_once "DbTrait.php";
class Order{
    use DbTrait;
    private $user_id;
    private $address;
    private $notes;
    private $items;

    public function __set($name,$value) {
        $method = "set".$name;
        if(!method_exists($this,$method)) {
            throw new Exception("Set property $name doesn't Exist");
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
        if(!is_numeric($user_id) || $user_id <= 0) {
            throw new Exception("*Invalid Missing User ID");
        }
        $this->user_id = $user_id;
    }
    private function getUser_id() {
        return $this->user_id;
    }
    private function setAddress($address) {
        if(strlen($address) < 8) {
            throw new Exception("Missing Address");
        }   
        $this->address = $address;
    }
    private function getAddress() {
        return $this->address;
    }
    private function setNotes($notes) {
        $this->notes = $notes;
    }
    private function getNotes() {
        return $this->notes;
    }
    private function setItems($items) {
        if(count($items) == 0) {
            throw new Exception("Missing Cart Items");
        }
        $this->items = $items;
    }
    private function getItems() {
        return $this->items;
    }
    
    public function create() {
        $obj_db = self::obj_db();
        $this->validateQuantity();
        $now = date("Y-m-d");
        $query = "insert into orders "
                ."(`id`,`address`,`notes`,`user_id`,`date`) "
                ." values "
                ." (NULL,'$this->address','$this->notes',$this->user_id,'$now')";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db insert Error $obj_db->error");
        }
        $order_id = $obj_db->insert_id;
        foreach($this->items as $item) {
            $query_product = "select quantity from products "
                            ." where id = $item->item_id ";
            $result = $obj_db->query($query_product);
            $query_insert = "insert into order_items "
                            ."(`id`,`order_id`,`product_id`,`quantity`,`price`) "
                            ." values "
                            ." (NULL, $order_id,$item->item_id,$item->quantity,$item->unit_price )";
            $obj_db->query($query_insert);
            if($obj_db->errno) {
                throw new Exception("Db insert error - $obj_db->error");
            }
        }
        
    }
    public function validateQuantity() {
        $obj_db = self::obj_db();
        foreach($this->items as $item) {
            $query = "select quantity from products "
                    ." where id = $item->item_id ";
            $result = $obj_db->query($query);
            if($obj_db->errno) {
                throw new Exception("Db Select Error");
            }
            if($item->quantity > $result->fetch_object()->quantity) {
                throw new Exception("Opps Something Went Wrong Invalid Quantity");
            }
        }
    }
    public static function getBuyerOrders($user_id) {
        $obj_db = self::obj_db();
        $query = "select * from orders o "
                ." where user_id = $user_id ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db select Error - $obj_db->error");
        }
        $orders = [];
        if($result->num_rows == 0) {
            return $orders;
        }
        while($data = $result->fetch_object()) {
            $orders[] = $data;
        }
        return $orders;
    }
    public static function getSellerOrders($user_id) {
        $obj_db = self::obj_db();
        $query = "select o.id as order_id,o.date,o.status,o.notes,o.confirm from orders o "
                ." JOIN order_items oi on o.id = oi.order_id "
                ." JOIN products p on p.id = oi.product_id "
                ." where p.user_id = $user_id ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        $orders = [];
        if($result->num_rows == 0) {
            return $orders;
        }
        while($data = $result->fetch_object()) {
            $orders[] = $data;
        }
        return $orders;
    }
    public static function getOrderItems($order_id,$user_id) {
        $obj_db = self::obj_db();
        $query = "select * from order_items oi "
                ." JOIN products p on p.id = oi.product_id "
                ." where order_id = $order_id AND p.user_id = $user_id ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db select Error - $obj_db->error");
        }
        $orders = [];
        if($result->num_rows == 0) {
            return $orders;
        }
        while($data = $result->fetch_object()) {
            $orders[] = $data;
        }
        return $orders;
    }
    public static function delivered($order_id) {
        $obj_db = self::obj_db();
        $query = " update orders set status = 1 "
                ." where id = $order_id ";
        $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Update Error - $obj_db->error");
        }
    }
}