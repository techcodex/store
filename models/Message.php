<?php
require_once "DbTrait.php";
class Message {
    use DbTrait;
    private $message_id;
    private $email;
    private $message;
    private $name;

    public function __set($name,$value) {
        $method = "set".$name;
        if(!method_exists($this,$method)) {
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
    private function setMessage_id($message_id) {
        if($message_id <= 0 || !is_numeric($message_id)) {
            throw new Exception("*Invalid / Missing Message ID");
        }
        $this->message_id = $message_id;
    }
    private function getMessage_id() {
        return $this->message_id;
    }
    private function setName($name) {
        if(empty($name) || strlen($name) < 2) {
            throw new Exception("*Invalid / Missing Name");
        }
        $this->name = $name;
    }
    private function getName() {
        return $this->name;
    }
    private function setEmail($email) {
        $reg = "/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zAZ]\.)+[a-zA-Z]{2,4})$/";
        if(!preg_match($reg,$email)) {
            throw new Exception("*Invalid / Missing Email");
        }
        $this->email = $email;
    }
    private function getEmail() {
        return $this->email;
    }
    private function setMessage($message) {
        if(empty($message) || strlen($message) < 10) {
            throw new Exception("*Missing Message");
        }
        $this->message = $message;
    }
    private function getMessage() {
        return $this->message;
    }

    public static function getMessages() {
        $obj_db = self::obj_db();
        $query = "select * from messages "
                ." ORDER BY name asc ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error  - $obj_db->error");
        }
        $messages = [];
        while($data = $result->fetch_object()) {
            $messages[] = $data;
        }
        return $messages;
    }

    public function addMessage(){
        $obj_db = self::obj_db();
        $query = "insert into messages "
                ."(`id`,`name`,`email`,`message`) "
                ." values "
                ." (NULL,'$this->name','$this->email','$this->message')";
        $obj_db->query($query);
        if($obj_db->errno){
            throw new Exception("Message not Insert - $obj_db->errno - $obj_db->error");
        }
    }

    public static function deleteMessage($id){
        $obj_db = self::obj_db();

        $query = " delete from messages "
                ." where id = '$id' ";

        $obj_db->query($query);

        if($obj_db->errno){
            throw new Exception("Select Query Error - $obj_db->errno - $obj_db->error");
        }   
    }
}
?>