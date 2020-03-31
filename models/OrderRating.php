<?php
require_once "DbTrait.php";
require_once "Order.php";
require_once "User.php";
class OrderRating {
    use DbTrait;
    private $order_id;
    private $feedback;
    private $rating;

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
    private function setOrder_id($order_id) {
        if($order_id <= 0 || !is_numeric($order_id)) {
            throw new Exception("Missing Order ");
        }
        $this->order_id = $order_id;
    }
    private function getOrder_id(){
        return $this->order_id;
    }

    private function setFeedback($feedback) {
        if(empty($feedback)) {
            throw new Exception("Missing Feddback");
        }
        $this->feedback = $feedback;
    }
    private function getfeedback(){
        return $this->feedback;
    }
    private function setRating($rating) {
        if(empty($rating) || $rating < 0) {
            throw new Exception("Missing Rating");
        }
        $this->rating = $rating;
    }
    private function getRating(){
        return $this->rating;
    }
    public function add() {
        $obj_db = self::obj_db();
        $query = "insert into order_rating "
                ."(`id`,`order_id`,`rating`,`feedback`) "
                ." values "
                ." (NULL, $this->order_id,'$this->rating','$this->feedback') ";
        $obj_db->query($query);
        if($obj_db->errno) {
            die("sss");
        }
    }
    public static function show($id) {
        $obj_db = self::obj_db();
        $query = "select * from order_rating ora  "
                ." JOIN orders o on o.id = ora.order_id "
                ." where order_id = $id ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error ");
        }
        $order_rating = $result->fetch_object();
        
        //getting buyer
        $seller = User::editAdmin($order_rating->user_id);
        //getting seller
        $user = Order::getOrderUser($order_rating->order_id);
        $data = [];

        $data['profile_image'] = $user->profile_image;
        $data['user_name'] = $user->user_name;
        $data['first_name'] = $user->first_name;
        $data['last_name'] = $user->last_name;
        $data['user_rating'] = $user->rating;
        $data['order_rating'] = $order_rating->rating;
        $data['feedback'] = $order_rating->feedback;
        $data['buyer_name'] = ucfirst($seller->first_name)." ".ucfirst($seller->last_name);
        return $data;

    }
}