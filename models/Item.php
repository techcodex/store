<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Item
 *
 * @author SohaiB
 */
require_once 'DBTrait.php';

class Item {
    use DBTrait;
    //put your code here
    private $item_id;
    private $quantity;
    private $user_id;

    public function __construct($item_id,$quantity = 1,$user_id) {
//        die("sss".$this->item_id);
        $this->item_id = $item_id;
        $this->quantity = $quantity;
        $this->user_id = $user_id;
    }
    
    public function __set($name, $value) {
        $method = "set$name";
        if(!method_exists($this, $method)) {
            throw new Exception("set property $name does'nt Exist");
        }
        $this->$method($value);
    }
    public function __get($name) {
        $method = "get$name";
        if(!method_exists($this, $method)) {
            throw new Exception("get property $name does'nt Exist");
        }
        return $this->$method();
    }
    private function setItem_id($item_id) {
//        die("item".$item_id);
        if(!is_numeric($item_id) || $item_id <= 0) {
            throw new Exception("Invalid Missing Item");
        }
        $this->item_id = $item_id;
//        die($this->item_id);
    }
    private function getItem_id() {
        return $this->item_id;
    }
    private function setUser_id($user_id) {
        if(!is_numeric($user_id) || $user_id<=0) {
            throw new Exception("Missing User");
        }
        $this->user_id = $user_id;
    }
    private function getUser_id() {
        return $this->user_id;
    }
    private function setQuantity($quantity) {
        if(!is_numeric($quantity) || $quantity<=0) {
            throw new Exception("Invalid Missing Quantity");
        }
        $this->quantity = $quantity;
    }
    private function getQuantity() {
        return $this->quantity;
    }
    
    private function getItem_name() {
        $obj_db = $this->obj_db();
        $query = "select name from products "
                . "where id = '$this->item_id' ";
//        die($query);
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Product Not found query -  $obj_db->errno - $obj_db->error");
        }
        if($result->num_rows == 0) {
            throw new Exception("Product Not Found rows");
        }
        $data = $result->fetch_object();
        return $data->name;
    }
    private function getItem_description() {
        $obj_db = $this->obj_db();
        $query = "select description from products "
                . "where id = '$this->item_id' ";
//        die($query);
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Product Not found query -  $obj_db->errno - $obj_db->error");
        }
        if($result->num_rows == 0) {
            throw new Exception("Product Not Found rows");
        }
        $data = $result->fetch_object();
        return $data->description;
    }
    private function getUnit_price() {
        $obj_db = $this->obj_db();
        $query  = "select price from products "
                . "where id = '$this->item_id' ";
//        die($query);
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Product not found  query $obj_db->errno - $obj_db->error");
        }
        if($result->num_rows == 0) {
            throw  new Exception("Product not found rows ");
        }
        $data = $result->fetch_object();
        return $data->price;
    }
    private function getTotal() {
        $total = $this->quantity * $this->unit_price;
        return $total;
    }
    private function getImage() {
        $obj_db = self::obj_db();
        $query = "select image "
                ." from products where id = $this->item_id ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("select query error - $obj_db->errno - $obj_db->error");
        }
        $url = "img/user_products/na.png";
        if($result->num_rows == 0) {
            return $url;
        }
//        die($this->getItem_name());
        $data = $result->fetch_object()->image;
        $url = "img/user_products/".$data;
        return $url;
    }
}
