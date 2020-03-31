<?php
// echo("<pre>");
// print_r($_FILES);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    require_once "../init.php";
    require_once "../../models/Admin.php";

    $errors = [];
    $obj_admin = unserialize($_SESSION['obj_admin']);

    
    try{
        $obj_admin->image = $_FILES['image'];
    }catch(Exception $ex){
        $errors['image'] = $ex->getMessage();
    }
    

if(count($errors) == 0) {
    try{
        $obj_admin->updateProfile();
        $_SESSION['success'] = "Profile Updated Successfully";
        header("Location:".BASE_URL."admins/profile.php");
    } catch(Exception $ex) {
        die($ex->getMessage());
        $_SESSION['error'] = $ex->getMessage();
        header("Location:".BASE_URL."admins/profile.php");
    }
    
} else {
    $_SESSION['error'] = "Check Your Errors";
    $_SESSION['errors'] = $errors;
    $_SESSION['obj_admin'] = serialize($obj_admin);
    header("Location:".BASE_URL."admins/profile.php");
}
}
?>