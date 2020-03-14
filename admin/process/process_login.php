<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../init.php";
    require_once "../../models/Admin.php";
    $obj_admin = new Admin();
    $errors = [];
    try {
        $obj_admin->user_name = $_POST['user_name'];
    } catch(Exception $ex) {
        $errors['user_name'] = $ex->getMessage();
    }
    try {
        $obj_admin->password  = $_POST['password'];
    } catch(Exception $ex) {
        $errors['password'] = $ex->getMessage();
    }
    if(count($errors) == 0) {
        try{
            $remember = isset($_POST['remember']) ? TRUE : FALSE;
            $obj_admin->login($remember);
            header("Location:".BASE_URL."dashboard.php");
        } catch(Exception $ex) {
            $_SESSION['error'] = $ex->getMessage();
            header("Location:".BASE_URL."index.php");
        }
    } else {
        $_SESSION['error'] = "Check Your Errors";
        $_SESSION['errors'] = $errors;
        header("Location:".BASE_URL."index.php");
    }
}

?>