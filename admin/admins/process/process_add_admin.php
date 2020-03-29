<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    require_once "../../init.php";
    require_once "../../../models/Admin.php";

    $errors = [];
    $obj_admin = new Admin();

    try{
        $obj_admin->user_name = $_POST['user_name'];
    }catch(Exception $ex){
        $errors['user_name'] = $ex->getMessage();
    }

    try{
        $obj_admin->email = $_POST['email'];
    }catch(Exception $ex){
        $errors['email'] = $ex->getMessage();
    }

    try{
        $obj_admin->password = $_POST['password'];
    }catch(Exception $ex){
        $errors['password'] = $ex->getMessage();
    }

if(count($errors) == 0) {
    try{
        $obj_admin->addAdmin();
        $_SESSION['success'] = "Admin Addedd Successfully";
        header("Location:".BASE_URL."admins/create.php");
    } catch(Exception $ex) {
        die($ex->getMessage());
        $_SESSION['error'] = $ex->getMessage();
        header("Location:".BASE_URL."admins/create.php");
    }
    
} else {
    $_SESSION['error'] = "Check Your Errors";
    $_SESSION['errors'] = $errors;
    header("Location:".BASE_URL."admins/create.php");
}
}
?>