<?php
require_once "DbTrait.php";
class User
{
    use DbTrait;
    private $user_name;
    private $email;
    private $password;
    private $loggedin;
    private $user_id;
    private $first_name;
    private $last_name;
    private $middle_name;
    private $contact_no;
    private $gender;
    private $street_address;
    private $state_id;
    private $country_id;
    private $city_id;
    private $date_of_birth;
    private $rating;
    private $profile_image;

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
    private function setUser_id($user_id)
    {
        if (!is_numeric($user_id) || $user_id <= 0) {
            throw new Exception("*invalid / Missing User ID");
        }
        $this->user_id = $user_id;
    }
    private function getUser_id()
    {
        return $this->user_id;
    }
    private function getLoggedin()
    {
        return $this->loggedin;
    }
    private function getRating() {
        return $this->rating;
    }

    private function setFirst_name($first_name)
    {
        $reg = "/^[a-z]+$/i";
        if (!preg_match($reg, $first_name)) {
            throw new Exception("*invalid / Missing First Name");
        }
        $this->first_name = $first_name;
    }
    private function getFirst_name()
    {
        return $this->first_name;
    }
    private function setLast_name($last_name)
    {
        $reg = "/^[a-z]+$/i";
        if (!preg_match($reg, $last_name)) {
            throw new Exception("*invalid / Missing Last Name");
        }
        $this->last_name = $last_name;
    }
    private function getLast_name()
    {
        return $this->last_name;
    }
    private function setMiddle_name($middle_name)
    {
        $reg = "/^[a-z]+$/i";
        if (!preg_match($reg, $middle_name)) {
            throw new Exception("*invalid / Missing Middle Name");
        }
        $this->middle_name = $middle_name;
    }
    private function getMiddle_name()
    {
        return $this->middle_name;
    }
    private function setGender($gender)
    {
        $genders = ['male', 'female'];
        if (!in_array($gender, $genders)) {
            throw new Exception("Missing Gender");
        }
        $this->gender = $gender;
    }
    private function getGender()
    {
        return $this->gender;
    }
    private function setDate_of_birth($date_of_birth)
    {
        if (empty($date_of_birth)) {
            throw new Exception("*Missing Date Of Birth");
        }
        $this->date_of_birth = $date_of_birth;
    }
    private function getDate_of_birth()
    {
        return $this->date_of_birth;
    }
    private function setCountry_id($country_id)
    {
        if (empty($country_id) || !is_numeric($country_id)) {
            throw new Exception("*Missing Country");
        }
        $this->country_id = $country_id;
    }
    private function getCountry_name()
    {
        $obj_db = $this->obj_db();
        $query = "select name from countries "
            . " where id = $this->country_id ";
        $data = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        if ($data->num_rows == 0) {
            return "N/A";
        }
        return $data->fetch_object()->name;
    }
    private function getCountry_id()
    {
        return $this->country_id;
    }
    private function setState_id($state_id)
    {
        if (empty($state_id) || !is_numeric($state_id)) {
            throw new Exception("*Missing State");
        }
        $this->state_id = $state_id;
    }
    private function getState_name()
    {
        $obj_db = $this->obj_db();
        $query = "select name from states "
            . " where id = $this->state_id";
        $data = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        return $data->fetch_object()->name;
    }
    private function setCity_id($city_id)
    {
        if (empty($city_id) || !is_numeric($city_id)) {
            throw new Exception("*Missing City");
        }
        $this->city_id = $city_id;
    }
    private function getCity_name()
    {
        $obj_db = $this->obj_db();
        $query = "select name from city "
            . " where id = $this->city_id";
        $data = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db select error - $obj_db->error");
        }
        return $data->fetch_object()->name;
    }

    private function setContact_no($contact_no) {
        $reg = "/^\d{1,4}\-\d{3}\-\d{7}$/";
        if (!preg_match($reg, $contact_no)) {
            throw new Exception("*Invalid / Missing Contact Number");
        }
        $this->contact_no = $contact_no;
    }
    private function getContact_no()
    {
        return $this->contact_no;
    }
    private function setStreet_address($street_address)
    {
        if (empty($street_address) || strlen($street_address) < 9) {
            throw new Exception("*Missing Street Address");
        }
        $this->street_address = $street_address;
    }
    private function getStreet_address()
    {
        return $this->street_address;
    }
    private function setUser_name($user_name)
    {
        $reg = "/^[a-z][a-z0-9]{3,19}$/i";
        if (!preg_match($reg, $user_name)) {
            throw new Exception("*Invalid Missing User Name");
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
            throw new Exception("*Invalid Missing Email");
        }
        $this->email = $email;
    }
    private function getEmail()
    {
        return $this->email;
    }
    private function setPassword($password)
    {
        $reg = "/^[a-z][a-z0-9]{5,15}$/i";
        if (!preg_match($reg, $password)) {
            throw new Exception("*Invalid Missing Password");
        }
        $this->password = sha1($password);
    }
    private function getPassword()
    {
        return $this->password;
    }

    public function checkPassword($password)
    {
        $reg = "/^[a-z][a-z0-9]{5,15}$/i";
        if (!preg_match($reg, $password)) {
            throw new  Exception("*invalid / Missing Password");
        }
    }
    public function matchPassword($new_password, $confirm_password)
    {
        if ($new_password != $confirm_password) {
            throw new Exception("Password Not Match");
        }
    }

    private function setProfile_image($profileImage)
    {
        //        echo("<pre>");
        //        print_r($profileImage);
        //        echo("</pre>");
        //        die;
        if ($profileImage['error'] == 4) {
            throw new Exception("File Missing");
        }

        if ($profileImage['size'] > 500000) {
            throw new Exception("MAX FILE SIZE IS 500K");
        }
        $imgData = getimagesize($profileImage['tmp_name']);
        if (!$imgData) {
            throw new Exception("Not a valid Image");
        }
        if ($profileImage['type'] != "image/jpeg" && $profileImage['type'] != "image/png") {
            throw new Exception("Only jpeg / png allowed");
        }

        if ($profileImage['type'] != $imgData['mime']) {
            throw new Exception("Corrupt Image");
        }
        $fileName = $this->user_name . ".jpg";

        $strPath = $_SERVER['DOCUMENT_ROOT'] . "/img/users/$fileName";
        $result = move_uploaded_file($profileImage['tmp_name'], $strPath);
        if (!$result) {
            throw new Exception("Failed to move file");
        }
        $query = "update user_profile set "
            . " profile_image = '$fileName' "
            . " where user_id = '$this->user_id'";
        $objDB = self::obj_db();
        $result = $objDB->query($query);
        if ($objDB->errno) {
            die($objDB->error);
        }
    }

    private function getProfile_image()
    {
        $query = "select profile_image from user_profile "
            . " where user_id = '$this->user_id'";
        $objDB = self::obj_db();
        $result = $objDB->query($query);
        $data = $result->fetch_object();

           die($data->profile_image);

        if (!is_null($data->profile_image)) {
            $uri = "img/users/$data->profile_image";
        } else {
            $uri = "img/users/default.png";
        }

        return $uri;
    }

    public function change_password($old_password, $new_password)
    {
        $obj_db = self::obj_db();
        $query = " select password from users "
            . " where id = $this->user_id ";
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->errno - $obj_db->error ");
        }
        if ($result->num_rows == 0) {
            throw new Exception("Opsss Something Went Wrong");
        }
        if (sha1($old_password) != $result->fetch_object()->password) {
            throw new Exception("Invalid / Miss Match Password");
        }
        $new_password = sha1($new_password);
        $query_update = "update users set "
            . " password = '$new_password' "
            . " where id = $this->user_id ";
        $obj_db->query($query_update);
        if ($obj_db->errno) {
            throw new Exception("update query error - $obj_db->error");
        }
    }

    public function singup()
    {
        $obj_db = $this->obj_db();
        $now = date("Y-m-d");
        $query = "insert into users "
            . "(`id`,`user_name`,`email`,`password`,`signup_date`)"
            . " values "
            . "(NULL,'$this->user_name','$this->email','$this->password','$now')";
        $data = $obj_db->query($query);
        if ($obj_db->errno == 1062) {
            throw new Exception("Username | Email is Already Taken ");
        }
        if ($obj_db->errno) {
            throw new Exception("Db Insert error - $obj_db->error");
        }
        $user_id = $obj_db->insert_id;
        $query_insert_profile = "insert into user_profile "
            . "(`id`,`user_id`) "
            . " values "
            . "(NULL,$user_id)";
        $obj_db->query($query_insert_profile);
        if ($obj_db->errno) {
            throw new Exception("Db insert error - " . $obj_db->error);
        }
    }

    public function login($remember)
    {
        $obj_db = DbTrait::obj_db();
        $query = "select * from users "
            . " where(email = '$this->email') ";
        $data = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        if ($data->num_rows == 0) {
            throw new Exception("User Not Found");
        }
        $user = $data->fetch_object();
        if ($user->password != $this->password) {
            throw new Exception("*Invalid Email / Password ");
        }
        if ($user->status == 0) {
            throw new Exception("Account Disable Contact Admin");
        }
        $this->user_name = $user->user_name;
        $this->password = null;
        $this->user_id = $user->id;
        $this->loggedin = true;
        $str_user = serialize($this);

        $_SESSION['obj_user'] = $str_user;
        if ($remember) {
            $expiry = time() + (60 * 60 * 24 * 5);
            setcookie("obj_user", $str_user, $expiry, "/");
        }
    }
    public function profile()
    {
        $obj_db = self::obj_db();
        $query = "select * from users u "
                ." JOIN user_profile up on up.user_id = u.id "
                ." where u.id = $this->user_id ";
        $data = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        $user = $data->fetch_object();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->middle_name = $user->middle_name;
        $this->contact_no = $user->contact_no;
        $this->street_address = $user->street_address;
        $this->gender = $user->gender;
        $this->country_id = $user->country_id;
        $this->state_id = $user->state_id;
        $this->city_id = $user->city_id;
        $this->rating = $user->rating;
        $this->date_of_birth = $user->date_of_birth;
    }

    public function profile_image()
    {
        $obj_db = self::obj_db();
        $query = "select profile_image from user_profile "
            . " where user_id = $this->user_id ";
        $data = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }

        $user = $data->fetch_object();
        return $user->profile_image;
        // $this->image = $admin->image;
    }
    public function logout()
    {
        if (isset($_SESSION['obj_user'])) {
            unset($_SESSION['obj_user']);
        }
        if (isset($_COOKIE['obj_user'])) {
            setcookie("obj_user", "aaa", 1, "/");
        }
    }
    public function edit()
    {
        $obj_db = self::obj_db();
        $query = "update user_profile "
            . "set first_name = '$this->first_name',last_name = '$this->last_name', "
            . " middle_name='$this->middle_name', contact_no = '$this->contact_no', "
            . " street_address = '$this->street_address', date_of_birth = '$this->date_of_birth', "
            . " country_id = $this->country_id, state_id = $this->state_id, "
            . " city_id = $this->city_id, date_of_birth = '$this->date_of_birth', gender = '$this->gender' "
            . " where user_id = $this->user_id ";
        $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db update Error - $obj_db->error");
        }
    }
    public static function show_all_users()
    {
        $obj_db  = self::obj_db();
        $query = "select u.id as user_id,u.user_name,u.email,u.status,up.first_name,up.last_name "
            . " from users u "
            . "JOIN user_profile up on u.id = up.user_id "
            . "ORDER BY user_name ASC ";
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Seletc Error - $obj_db->error");
        }
        $users = [];
        if ($result->num_rows == 0) {
            return $users;
        }
        while ($data = $result->fetch_object()) {
            $users[] = $data;
        }
        return $users;
    }
    public static function active($user_id)
    {
        $obj_db = self::obj_db();
        $query = "update users set "
            . "status = 1 "
            . " where id = $user_id ";
        $obj_db->query(($query));
        if ($obj_db->errno) {
            throw new Exception("Db updated Error - $obj_db->error ");
        }
    }
    public static function deactive($user_id)
    {
        $obj_db = self::obj_db();
        $query = "update users set "
            . "status = 0 "
            . " where id = $user_id ";
        $obj_db->query(($query));
        if ($obj_db->errno) {
            throw new Exception("Db updated Error - $obj_db->error ");
        }
    }
    public static function editAdmin($user_id)
    {
        $obj_db = self::obj_db();
        $query = " select u.*,up.*,u.id as user_id from users u "
            . " join user_profile up on u.id = up.user_id "
            . " where u.id = $user_id ";
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        return $result->fetch_object();
    }
    public function adminUpdate()
    {
        $obj_db = self::obj_db();
        $query = "update users set "
            . "user_name = '$this->user_name', "
            . "email = '$this->email' "
            . "where id = $this->user_id ";
        $obj_db->query($query);
        if ($obj_db->errno == 1062) {
            throw new Exception("User Name | Email Already Taken");
        }
        if ($obj_db->errno) {
            throw new Exception("Db Update Error - $obj_db->error");
        }
        $query_update_profile = "update user_profile set "
            . " first_name = '$this->first_name', "
            . " middle_name = '$this->middle_name', "
            . " last_name = '$this->last_name', "
            . " contact_no = '$this->contact_no', "
            . " date_of_birth = '$this->date_of_birth', "
            . " gender = '$this->gender', "
            . " street_address = '$this->street_address' "
            . " where user_id = $this->user_id ";
        $obj_db->query($query_update_profile);
        if ($obj_db->errno) {
            throw new Exception("Db update error - $obj_db->error");
        }
    }
    public function updateOrderProfile()
    {
        $obj_db = self::obj_db();
        $query = "update user_profile "
            . "(`first_name`,`last_name`,`contact_no`,`street_address`) "
            . " values "
            . "('$this->first_name','$this->last_name','$this->contact_no','$this->street_address') "
            . " where user_id = $this->user_id ";
    }
    public static function makeRating($user_id,$rating) {
        // die($rating);
        $obj_db = self::obj_db();
        $query = " select * from users "
                ." where id = $user_id ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            die($obj_db->error);
        }
        $user = $result->fetch_object();
        $user_rating = $user->rating;
        $user_rating += $rating;
        $user_rating = round($user_rating / 2,1);
        $query_update = " update users "
                        ." set rating = $user_rating "
                        ." where id = $user_id ";
        // die($query_update);
        $obj_db->query($query_update);
        if($obj_db->errno) {
            die($obj_db->error);
        }
    }
}
