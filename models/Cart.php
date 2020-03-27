<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart
 *
 * @author SohaiB
 */
require_once "DbTrait.php";
require_once 'Item.php';
class Cart {
    use DbTrait;
    //put your code here
    private $items;
    
    public function __construct() {
        $this->items = [];
        //$this->items = array();
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
    private function getItems() {
        return $this->items;
    }
    private function getCount() {
        $total = 0;
        foreach($this->items as $item) {
            $total = $total + $item->quantity;
        }
        return $total;
    }
    private function getTotal() {
        $total = 0;
        foreach($this->items as $item) {
            $total +=$item->total;
        }
        return $total;
    }
    public function add_to_cart($item) {
        $obj_db = self::obj_db();
        if(!$item instanceof Item) {
            throw new Exception("Not a valid Object");
        }
        $query = "select quantity from products "
                ." where id = $item->item_id";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        $quantity = $result->fetch_object()->quantity;
        if(array_key_exists($item->item_id, $this->items)) {
            if($this->items[$item->item_id]->quantity >= $quantity ) {
                throw new Exception("Out of Stock");
            }
            $this->items[$item->item_id]->quantity += $item->quantity;
            
        } else {
            $this->items[$item->item_id] = $item;
        }
    }
    public function update_cart($qtys) {
        $obj_db = self::obj_db();
        foreach($this->items as $item) {
            $query = "select quantity from products "
                ." where id = $item->item_id";
            $result = $obj_db->query($query);
            if($obj_db->errno) {
                throw new Exception("Db Select Error - $obj_db->error");
            }
            $quantity = $result->fetch_object()->quantity;
            if(is_numeric($qtys[$item->item_id])) {
                if($qtys[$item->item_id] > 0) {
                    if($item->quantity >= $quantity) {
                        throw new Exception("Out of Stock");
                    }
                    $item->quantity = $qtys[$item->item_id];
                    //quantity = 10
                } else if($qtys[$item->item_id] == 0) {
                    unset($this->items[$item->item_id]);
                }
            } 
        }
    }
    public function remove_cart($item) {
//        echo("<pre>");
//        print_r($this->items);
//        echo("</pre>");
//        die;
        if(!$item instanceof Item) {
            throw new Exception("Not a valid Object");
        }
        if(array_key_exists($item->item_id, $this->items)) {
            unset($this->items[$item->item_id]);
        }
    }
    public function empty_cart() {
        $this->items = [];
    }
    public function getQuantity($item_id) {
        if(array_key_exists($item_id, $this->items)) {
            return $this->items[$item_id]->quantity;
        } else {
            return 0;
        }
    }
}
