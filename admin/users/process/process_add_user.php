<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../../init.php";
    require_once "../../../models/User.php";
    $obj_user = new User();
    $errors = [];

    try{
        $obj_user->user_name = $_POST['user_name'];
    } catch(Exception $ex) {
        $errors['user_name'] = $ex->getMessage();
    }

    try{
        $obj_user->email = $_POST['email'];
    } catch(Exception $ex) {
        $errors['email'] = $ex->getMessage();
    }

    try{
        $obj_user->password = $_POST['password'];
    } catch(Exception $ex) {
        $errors['password'] = $ex->getMessage();
    }
    if(count($errors) == 0) {
        try{
            $obj_user->singup();
            $_SESSION['success'] = "User Created Successfully";
            header("Location:".BASE_URL."users/create.php");
        } catch(Exception $ex) {
            $_SESSION['error'] = $ex->getMessage();
            header("Location:".BASE_URL."users/create.php");
        }
    } else {
        $_SESSION['error'] = "Check Your Errors";
        $_SESSION['errors'] = $errors;
        header("Location:".BASE_URL."users/create.php");
    }
}
?>