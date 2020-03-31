<?php
//echo("<pre>");
require_once "../../init.php";
require_once "../../models/User.php";
if(!isset($_SESSION['obj_user'])) {
    $_SESSION['error'] = "Opss Something Went Wrong";
    header("Location:".BASE_URL."index.php");
    die;
}
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $obj_user = unserialize($_SESSION['obj_user']);
    $errors = [];
    try{
        $obj_user->profile_image = $_FILES['profile_image'];
    } catch (Exception $ex) {
        $errors['profile_image'] = $ex->getMessage();
    }
    if(count($errors) == 0) {
        $_SESSION['success'] = "Profile Image Updated Successfully";
        header("Location:".BASE_URL."users/profile_image.php");
    } else {
        $_SESSION['error'] = "Check Your Errors";
        $_SESSION['errors'] = $errors;
        header("Location:".BASE_URL."users/profile_image.php");
    }
}
?>