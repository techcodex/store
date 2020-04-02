<?php
require_once "DbTrait.php";
class Admin
{
    use DbTrait;

    private $user_name;
    private $password;
    private $email;
    private $image;
    private $loggedin;
    private $admin_id;

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
            throw new Exception("get property $name doesn't Exist ");
        }
        return $this->$method();
    }

    private function setAdmin_id($admin_id)
    {
        if (!is_numeric($admin_id) || $admin_id <= 0) {
            throw new Exception("*invalid / Missing ID");
        }
        $this->admin_id = $admin_id;
    }
    private function getAdmin_id()
    {
        return $this->admin_id;
    }
    private function getLoggedin()
    {
        return $this->loggedin;
    }
    private function setUser_name($user_name)
    {
        $reg = "/^[a-z][a-z0-9]{4,19}$/i";
        if (!preg_match($reg, $user_name)) {
            throw new Exception("*invalid / Missing User Name");
        }
        $this->user_name = $user_name;
    }
    private function getUser_name()
    {
        return $this->user_name;
    }
    private function setEmail($email)
    {
        $reg = "/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zAZ]\.)+[a-zA-Z]{2,4})$/";
        if (!preg_match($reg, $email)) {
            throw new Exception("*invalid / Missing Email");
        }
        $this->email = $email;
    }
    private function getEmail()
    {
        return $this->email;
    }
    private function setPassword($password)
    {
        $reg = "/^[a-z][a-z0-9]{4,15}$/i";
        if (!preg_match($reg, $password)) {
            throw new Exception("*invalid / Missing Password");
        }
        $this->password = sha1($password);
    }
    private function getPassword()
    {
        return $this->password;
    }

    public function checkPassword($password) {
        $reg = "/^[a-z][a-z0-9]{4,15}$/i";
        if(!preg_match($reg,$password)) {
            throw new  Exception("*invalid / Missing Password");
        }
    }
    public function matchPassword($new_password,$confirm_new_password) {
        if($new_password != $confirm_new_password) {
            throw new Exception("Password Not Match");
        }
    }

    public function change_password($old_password,$new_password) {
        $obj_db = self::obj_db();
        $query = " select password from admins "
                ." where id = $this->admin_id ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->errno - $obj_db->error ");
        }
        if($result->num_rows == 0) {
            throw new Exception("Opsss Something Went Wrong");
        }
        if(sha1($old_password) != $result->fetch_object()->password) {
            throw new Exception("Invalid / Miss Match Password");
        }
        $new_password = sha1($new_password);
        $query_update = "update admins set "
                        ." password = '$new_password' "
                        ." where id = $this->admin_id ";
        $obj_db->query($query_update);
        if($obj_db->errno) {
            throw new Exception("update query error - $obj_db->error");
        }
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
        $temp = str_replace(" ", "_", $this->user_name);
        $fileName = time() . $temp . ".jpg";

        $strPath = $_SERVER['DOCUMENT_ROOT'] . "/img/admin/$fileName";
        $result = move_uploaded_file($image['tmp_name'], $strPath);

        if (!$result) {
            throw new Exception("Failed to move file");
        }
        $this->image = $fileName;
    }
    private function getImage()
    {
        return $this->image;
    }

    public function addAdmin()
    {
        $obj_db = self::obj_db();
        $query = " insert into admins "
            . " (`id`,`user_name`,`email`,`password`,`image`) "
            . " values "
            . " (NULL,'$this->user_name','$this->email','$this->password','default.png') ";

        $obj_db->query($query);

        if ($obj_db->errno) {
            throw new Exception("Db Insert Error - $obj_db->error");
        }
    }

    public static function getAdmins()
    {
        $obj_db = self::obj_db();
        $query = "select * from admins "
            . " order BY user_name asc ";
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->errno");
        }
        $admins = [];
        if ($result->num_rows == 0) {
            return $admins;
        }
        while ($data = $result->fetch_object()) {
            $admins[] = $data;
        }
        return $admins;
    }

    public static function getAllAdmins($id)
    {
        $obj_db = self::obj_db();

        $query = " select * from admins "
            . " where id ='$id'";
        $result = $obj_db->query($query);

        if ($obj_db->errno) {
            throw new Exception("Select Query Error - $obj_db->errno - $obj_db->error");
        }

        if ($result->num_rows == 0) {
            return;
        }
        return $result->fetch_object();
    }

    public function updateAdmin()
    {

        $obj_db = self::obj_db();

        $query = " update admins set "
            . " user_name = '$this->user_name', "
            . " email = '$this->email' "
            . " where id = $this->admin_id ";

        $obj_db->query($query);

        if ($obj_db->errno) {
            throw new Exception("Select Query Error - $obj_db->errno - $obj_db->error");
        }
    }

    public static function active($admin_id)
    {
        $obj_db = self::obj_db();
        $query = "update admins set "
            . "status = 1 "
            . " where id = $admin_id ";
        $obj_db->query(($query));
        if ($obj_db->errno) {
            throw new Exception("Db updated Error - $obj_db->error ");
        }
    }
    public static function deactive($admin_id)
    {
        $obj_db = self::obj_db();
        $query = "update admins set "
            . "status = 0 "
            . " where id = $admin_id ";
        $obj_db->query(($query));
        if ($obj_db->errno) {
            throw new Exception("Db updated Error - $obj_db->error ");
        }
    }

    public function profile()
    {
        $obj_db = self::obj_db();
        $query = "select image from admins "
            ." where id = $this->admin_id ";
        $data = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        $admin = $data->fetch_object();
        return $admin->image;
        
    }

    public function updateProfile()
    {
        $obj_db = self::obj_db();
        $query = " update admins set "
            . " image = '$this->image' "
            . " where id = $this->admin_id ";
        $obj_db->query(($query));
        if ($obj_db->errno) {
            throw new Exception("Db updated Error - $obj_db->error ");
        }
    }

    public function login($remember)
    {
        $obj_db = self::obj_db();
        $query = "select * from admins "
            . " where user_name = '$this->user_name' ";

        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        if ($result->num_rows == 0) {
            throw new Exception("User Not Found");
        }
        $data = $result->fetch_object();
        if ($data->password != $this->password) {
            throw new Exception("Invalid User Name or Password");
        }
        $this->user_name = $data->user_name;
        $this->email = $data->email;
        $this->password = null;
        $this->admin_id = $data->id;
        $this->loggedin = true;
        $this->image = $data->profile_image;
        $obj_admin = serialize($this);
        $_SESSION['obj_admin'] = $obj_admin;

        if ($remember) {
            $expiry = time() + (60 * 60 * 24 * 15);
            setcookie('obj_admin', $obj_admin, $expiry, '/');
        }
    }
    public function logout()
    {
        if (isset($_SESSION['obj_admin'])) {
            unset($_SESSION['obj_admin']);
        }
        if (isset($_COOKIE['obj_admin'])) {
            setcookie('obj_admin', 'aaa', 1, '/');
        }
    }
}
