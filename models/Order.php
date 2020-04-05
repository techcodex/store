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
        $clearence = strtotime($now);
        $clearence = strtotime('+15 day',$clearence);
        $clearence = date('Y-m-d',$clearence);
        $user_items = [];
        foreach($this->items as $item) {
            $user_items[$item->user_id][] = $item;
        }
        foreach($user_items as $field=>$data) {
            $query = " insert into orders "
                ."(`id`,`address`,`notes`,`user_id`,`date`,`seller_id`,`clearence`) "
                ." values "
                ." (NULL,'$this->address','$this->notes',$this->user_id,'$now',$field,'$clearence')";
            $result = $obj_db->query($query);    
            if($obj_db->errno) {
                throw new Exception("Db insert Error $obj_db->error");
            }
            $order_id = $obj_db->insert_id;
            foreach($data as $d) {
                $query_insert = " insert into order_items "
                            ."(`id`,`order_id`,`product_id`,`quantity`,`price`) "
                            ." values "
                            ." (NULL, $order_id,$d->item_id,$d->quantity,$d->unit_price )";
                $obj_db->query($query_insert);
                if($obj_db->errno) {
                    throw new Exception("Db insert error - $obj_db->error");
                }    
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
        $query = "select o.*,u.*,u.id as user_id,o.id as order_id from orders o "
                ." join users u on u.id = o.user_id "
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
        // die($user_id);
        $obj_db = self::obj_db();
        $query = " select o.id as order_id,o.date,o.status as order_status,o.notes,o.confirm,o.address,u.*,u.status as user_status from orders o "
                ." JOIN users u on u.id = o.user_id "
                ." where o.seller_id = $user_id ";
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
        // echo("<pre>");
        // print_r($orders);
        // echo("</pre>");
        // die;
        return $orders;
    }

    public static function getSellerNewOrders($user_id) {
        // die($user_id);
        $obj_db = self::obj_db();
        $query = " select o.id as order_id,o.date,o.status as order_status,o.notes,o.confirm,o.address,u.*,u.status as user_status from orders o "
                ." JOIN users u on u.id = o.user_id "
                ." where o.seller_id = $user_id "
                ." AND "
                ." o.status = 0 ";
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
        // echo("<pre>");
        // print_r($orders);
        // echo("</pre>");
        // die;
        return $orders;
    }
    public static function getSellerDailyOrders($user_id) {
        $obj_db = self::obj_db();
        $now = date("Y-m-d");
        $query = " select o.id as order_id,o.date,o.status,o.notes,o.confirm,o.address,u.*,u.status as user_status from orders o "
                ." JOIN users u on u.id = o.user_id "
                ." where o.seller_id = $user_id AND o.date = '$now'";
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
    public static function getSellerOrderReport($user_id,$from_date,$to_date) {
        $obj_db = self::obj_db();
        $now = date("Y-m-d");
        $query = " select o.id as order_id,o.date,o.status,o.notes,o.confirm,o.address,u.*,u.status as user_status from orders o "
                ." JOIN users u on u.id = o.user_id "
                ." where o.seller_id = $user_id AND o.date = '$now' AND date BETWEEN '$from_date' AND '$to_date' ";
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
    public static function getSellerDeliveredOders($user_id) {
        $obj_db = self::obj_db();
        $query = " select o.id as order_id,o.date,o.status,o.notes,o.confirm from orders o "
                ." where o.seller_id = $user_id AND status = 1";
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
    public static function getOrderItems($order_id) {
        $obj_db = self::obj_db();
        $query = "select * from order_items oi "
                ." JOIN products p on p.id = oi.product_id "
                ." where order_id = $order_id ";
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
    public static function newOrders(){
        $obj_db = self::obj_db();
        $query = " select o.*,u.user_name,u.email from orders o "
                ." JOIN users u on o.user_id = u.id "
                ." where o.status = 0 ";
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
    public static function deliveredOrders(){
        $obj_db = self::obj_db();
        $query = " select o.*,u.user_name,u.email from orders o "
                ." JOIN users u on o.user_id = u.id "
                ." where o.status = 1 ";
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
    public static function confirmOrder($order_id) {
        $obj_db = self::obj_db();
        $query = "update orders set "
                ." confirm = 1 "
                ." where id = $order_id ";
        $obj_db->query($query);

        $query_select = "select * from order_items oi "
                        ." where order_id = $order_id "
                        ."limit 1 ";
        $result = $obj_db->query($query_select);
        $item = $result->fetch_object();
        $query_product = "select * from products "
                        ." where id = $item->product_id ";
        $result = $obj_db->query($query_product);
        $product = $result->fetch_object();
        return $product->user_id;
    }
    public static function getOrderUser($id) {
        $obj_db = self::obj_db();
        $query = " select * from order_items oi "
                ." JOIN products p on oi.product_id = p.id "
                ." JOIN users u on p.user_id = u.id "
                ." JOIN user_profile up on up.user_id = u.id "
                ." where order_id = $id ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db select error  - $obj_db->error ");
        }
        $items = [];
        while($data = $result->fetch_object()) {
            $items[] = $data;
        }
        return $items[0];

    }
    public static function disputeOpen($id) {
        $obj_db = self::obj_db();
        $query = "update orders set "
                ." dispute = 1 "
                ." where id = $id ";
        $obj_db->query($query);
        if($obj_db->errno) {
            die($obj_db->error);
        }
    }
    public static function disputeClose($id) {
        // die($id);
        $obj_db = self::obj_db();
        $query = "update orders set "
                ." dispute = 0 "
                ." where id = $id ";
        $obj_db->query($query);
        if($obj_db->errno) {
            die($obj_db->error);
        }
    }
    public static function UserdisputedOrders($id) {
        $obj_db = self::obj_db();
        $query = " select o.*,o.id as order_id,d.id as disputed_id from orders o "
                ." JOIN disputed_orders d on o.id = d.order_id "
                ." where seller_id = $id AND dispute = 1 AND d.status = 0 ";
        // die($query);
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            die($obj_db->error);
        }
        // echo("<pre>");
        // print_r($result);
        // echo("</pre>");
        // die;
        $orders = [];
        if($result->num_rows == 0) {
            return $orders;
        }
        while($data = $result->fetch_object()) {
            $orders[] = $data;
        }
        return $orders;
    }
    public static function countUserdisputedOrders($id) {
        $obj_db = self::obj_db();
        $query = "select count(*) as total from orders o "
                ." JOIN disputed_orders d on o.id = d.order_id "
                ." where seller_id = $id AND dispute = 1  AND d.status = 0";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            die($obj_db->error);
        }
        return $result->fetch_object()->total;
    }
    public static function countSellerNewOrders($user_id) {
        $obj_db = self::obj_db();
        $query = "select count(*) as total from orders "
                ." where seller_id = $user_id AND status = 0 ";
        $result = $obj_db->query($query);
        if($result->num_rows == 0) {
            return 0;
        }
        return $result->fetch_object()->total;
    }
    public static function countSellerDeliveredOrders($user_id) {
        $obj_db = self::obj_db();
        $query = "select count(*) as total from orders "
                ." where seller_id = $user_id AND status = 1 ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            die($obj_db->error);
        }
        if($result->num_rows == 0) {
            return 0;
        }
        return $result->fetch_object()->total;
    }

    public static function showAllOrders() {
        $obj_db = self::obj_db();
        $now = date("Y-m-d");
        $query = " select o.*,u.*,o.id as order_id,o.status as order_status from orders o "
                ." join users u on u.id = o.user_id "
                ." WHERE o.date = '$now' ";
        
        $result = $obj_db->query($query);
        // print_r($result);
        if($obj_db->errno) {
            die($obj_db->error);
        }
        $orders = [];
        
        while($data = $result->fetch_object()) {
            $orders[] = $data;
        }
        return $orders;
    }
    public static function OrderReport($from_date,$to_date) {
        $obj_db = self::obj_db();
        $query = " select u.*,o.*,o.id as order_id from orders o"
                ." JOIN users u on u.id = o.user_id "
                ." where date between '$from_date' AND '$to_date' ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            die($obj_db->error);
        }
        $orders = [];
        while($data = $result->fetch_object()) {
            $orders[] = $data;
        }
        return $orders;
    }
    public static function OrderProductReport($from_date,$to_date,$product_id = 0) {
        $obj_db = self::obj_db();
        $query = " select o.*,u.*,o.id as order_id,o.status as order_status from orders o "
                ." JOIN order_items oi on o.id = oi.order_id "
                ." JOIN users u on u.id = o.user_id "
                ."where date BETWEEN '$from_date' AND '$to_date' AND oi.product_id = $product_id ";
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
    public static function SellerProductOrderReport($user_id,$product_id) {
        $obj_db = self::obj_db();
        $query = " select o.id as order_id,o.date,o.status,o.notes,o.confirm,o.address,u.*,u.status as user_status from orders o "
                ." JOIN users u on u.id = o.user_id "
                ." JOIN order_items oi on o.id = oi.order_id "
                ." where o.seller_id = $user_id AND oi.product_id = $product_id ";
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
    public static function clearOrder() {
        $obj_db = self::obj_db();
        $now = date("Y-m-d");
        $query = " update orders o set "
                ." confirm = 1 "
                ." where '$now' >= o.clearence ";
        $obj_db->query($query);
        if($obj_db->errno) {
            die($obj_db->error);
        }
    }
    public static function countNewOrders() {
        $obj_db = self::obj_db();
        $query = "select count(*) as total from orders "
                ." where status = 0 ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        return $result->fetch_object()->total;
    }
    public static function countDeliveredOrders() {
        $obj_db = self::obj_db();
        $query = "select count(*) as total from orders "
                ." where status = 1 ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        return $result->fetch_object()->total;
    }
    public static function countNewDisputedOrders() {
        $obj_db = self::obj_db();
        $query = "select count(*) as total from disputed_orders "
                ." where status = 0";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        return $result->fetch_object()->total;
    }
    public static function countResolveDisputedOrders() {
        $obj_db = self::obj_db();
        $query = "select count(*) as total from disputed_orders "
                ." where status = 1 ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        return $result->fetch_object()->total;
    }
}