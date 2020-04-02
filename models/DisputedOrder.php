<?php
require_once "DbTrait.php";
class DisputedOrder {
    use DbTrait;
    private $order_id;
    private $notes;

    public function __set($name, $value)
    {
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

    private function setOrder_id($order_id) {
        if(!is_numeric($order_id) || $order_id <=0) {
            throw new Exception("Missing Order");
        }
        $this->order_id = $order_id;
    }
    private function getOrder_id() {
        return $this->order_id;
    }
    private function setNotes($notes) {
        if(empty($notes)) {
            throw new Exception("Missing Notes");
        }
        $this->notes = $notes;
    }
    private function getNotes() {
        return $this->notes;
    }

    public function create() {
        $obj_db = self::obj_db();
        $now = date("Y-m-d");
        $query = "insert into disputed_orders "
                ."(`id`,`order_id`,`notes`,`date`) "
                ." values "
                ."(NULL,$this->order_id,'$this->notes','$now')";
        $obj_db->query($query);
        if($obj_db->errno) {
            die($obj_db->error);
        } 
    }
    public static function close_dispute($id) {
        $obj_db = self::obj_db();
        $query = "update disputed_orders set "
                ." status = 1 "
                ." where order_id = $id ";
        $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Update error - $obj_db->error");
        }
    }
    public static function getDisputedOrder() {
        $obj_db = self::obj_db();
        $query = " select u.*,o.*,do.*,o.id as order_id,do.notes as disputed_notes,do.status as disputed_status,do.date as disputed_date from disputed_orders do "
                ." JOIN orders o on do.order_id = o.id "
                ." JOIN users u on o.user_id = u.id ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->errno ");
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
    public static function getSellerDisputedOrders($user_id) {
        $obj_db = self::obj_db();
        $query = " select u.*,o.*,do.*,o.id as order_id,do.notes as disputed_notes,do.status as disputed_status,do.date as disputed_date from disputed_orders do "
                ." JOIN orders o on do.order_id = o.id "
                ." JOIN users u on o.user_id = u.id ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->errno ");
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
}

?>