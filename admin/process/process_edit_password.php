<?php
//echo("<pre>");
//print_r($_POST);
//echo("</pre>");
//die;
require_once "../../models/Admin.php";
require_once "../../init.php";
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $obj_admin = unserialize($_SESSION['obj_admin']);
    $errors = [];
    try{
        $obj_admin->checkPassword($_POST['old_password']);
    } catch (Exception $ex) {
        $errors['old_password'] = $ex->getMessage();
    }
    try{
        $obj_admin->checkPassword($_POST['new_password']);
    } catch (Exception $ex) {
        $errors['new_password'] = $ex->getMessage();
    }
    try{
        $obj_admin->matchPassword($_POST['new_password'],$_POST['confirm_new_password']);
    } catch (Exception $ex) {
        $errors['confirm_new_password'] = $ex->getMessage();
    }
    if(count($errors) == 0) {
        try {
            $obj_admin->change_password($_POST['old_password'],$_POST['new_password']);
            $_SESSION['success'] = "Password Change Successfully";
            header("Location:".BASE_URL."admin/changePassword.php");
            return;
        } catch (Exception $ex) {
            $_SESSION['error'] = $ex->getMessage();
            header("Location:".BASE_URL."admin/changePassword.php");
            return;
        }
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['error'] = "Check Your Errors";
        header("Location:".BASE_URL."admin/changePassword.php");
    }
}
?>