<?php
//echo("<pre>");
//print_r($_POST);
//echo("</pre>");
//die;
require_once "../../init.php";
require_once "../../models/User.php";
if(!isset($_SESSION['obj_user'])) {
    $_SESSION['error'] = "Please Login to view this page";
    header("Location:".BASE_URL."index.php");
    die;
}
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $obj_user = unserialize($_SESSION['obj_user']);
    $errors = [];
    try{
        $obj_user->checkPassword($_POST['old_password']);
    } catch (Exception $ex) {
        $errors['old_password'] = $ex->getMessage();
    }
    try{
        $obj_user->checkPassword($_POST['new_password']);
    } catch (Exception $ex) {
        $errors['new_password'] = $ex->getMessage();
    }
    try{
        $obj_user->matchPassword($_POST['new_password'],$_POST['confirm_password']);
    } catch (Exception $ex) {
        $errors['confirm_password'] = $ex->getMessage();
    }
    if(count($errors) == 0) {
        try {
            $obj_user->change_password($_POST['old_password'],$_POST['new_password']);
            $_SESSION['success'] = "Password Change Successfully";
            header("Location:".BASE_URL."users/account.php");
            return;
        } catch (Exception $ex) {
            $_SESSION['error'] = $ex->getMessage();
            header("Location:".BASE_URL."users/change_password.php");
            return;
        }
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['error'] = "Check Your Errors";
        header("Location:".BASE_URL."users/change_password.php");
    }
}
?>