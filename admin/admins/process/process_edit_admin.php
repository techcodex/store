<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    require_once "../../init.php";
    require_once "../../../models/Admin.php";

    $errors = [];
    $obj_admin = new Admin();

    try{
        $obj_admin->admin_id = $_POST['id'];
    }catch(Exception $ex){
        $errors['admin_id'] = $ex->getMessage();
    }

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
    

if(count($errors) == 0) {
    try{
        $obj_admin->updateAdmin();
        $_SESSION['success'] = "Admin Updated Successfully";
        header("Location:".BASE_URL."admins/index.php");
    } catch(Exception $ex) {
        die($ex->getMessage());
        $_SESSION['error'] = $ex->getMessage();
        header("Location:".BASE_URL."admins/edit.php");
    }
    
} else {
    $_SESSION['error'] = "Check Your Errors";
    $_SESSION['errors'] = $errors;
    $_SESSION['obj_admin'] = serialize($obj_admin);
    header("Location:".BASE_URL."admin/create.php");
}
}
?>