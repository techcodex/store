<?php
require_once "DbTrait.php";
class Admin{
    use DbTrait;

    private $user_name;
    private $password;
    private $email;
    private $loggedin;
    private $admin_id;

    public function __set($name, $value)
    {
        $method = "set".$name;
        if(!method_exists($this,$method)) {
            throw new Exception("set property $name doesn't Exist");
        }
        $this->$method($value);
    }
    public function __get($name) 
    {
        $method = "get".$name;
        if(!method_exists($this,$method)) {
            throw new Exception("get property $name doesn't Exist ");
        }
        return $this->$method();
    }

    private function setAdmin_id($admin_id) {
        if(!is_numeric($admin_id) || $admin_id <= 0) {
            throw new Exception("*invalid / Missing ID");
        }
        $this->admin_id = $admin_id;
    }
    private function getAdmin_id() {
        return $this->admin_id;
    }
    private function getLoggedin() {
        return $this->loggedin;
    }
    private function setUser_name($user_name) {
        $reg = "/^[a-z][a-z0-9]{4,19}$/i";
        if(!preg_match($reg,$user_name)) {
            throw new Exception("*invalid / Missing User Name");
        }
        $this->user_name = $user_name;
    }
    private function getUser_name() {
        return $this->user_name;
    }
    private function setEmail($email) {
        $reg = "/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zAZ]\.)+[a-zA-Z]{2,4})$/";
        if(!preg_match($reg,$email)) {
            throw new Exception("*invalid / Missing Email");
        }
        $this->email = $email;
    }
    private function getEmail() {
        return $this->email;
    }
    private function setPassword($password) {
        $reg = "/^[a-z][a-z0-9]{4,15}$/i";
        if(!preg_match($reg,$password)) {
            throw new Exception("*invalid / Missing Password");
        }
        $this->password = sha1($password);
    }
    private function getPassword() {
        return $this->password;
    }

    public function login($remember) {
        $obj_db = self::obj_db();
        $query = "select * from admins "
                ." where user_name = '$this->user_name' ";
        
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        if($result->num_rows == 0) {
            throw new Exception("User Not Found");
        }
        $data = $result->fetch_object();
        if($data->password != $this->password) {
            throw new Exception("Invalid User Name or Password");
        }
        $this->user_name = $data->user_name;
        $this->email = $data->email;
        $this->password = null;
        $this->admin_id = $data->id;
        $this->loggedin = true;
        $obj_admin = serialize($this);
        $_SESSION['obj_admin'] = $obj_admin;

        if($remember) {
            $expiry = time() + (60*60*24*15);
            setcookie('obj_admin',$obj_admin,$expiry,'/');
        }
    }
    public function logout() {
        if(isset($_SESSION['obj_admin'])) {
            unset($_SESSION['obj_admin']);
        }
        if(isset($_COOKIE['obj_admin'])) {
            setcookie('obj_admin','aaa',1,'/');
        }
    }
}

?>