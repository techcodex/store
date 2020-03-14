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
        $obj_user->first_name = $_POST['first_name'];
    } catch(Exception $ex) {
            $errors['first_name'] = $ex->getMessage();
    }
    try{
        $obj_user->last_name = $_POST['last_name'];
    } catch(Exception $ex) {
        $errors['last_name'] = $ex->getMessage();
    }
    try{
        $obj_user->middle_name = $_POST['middle_name'];
    } catch(Exception $ex) {
        $errors['middle_name'] = $ex->getMessage();
    }
    try{
        $gender = isset($_POST['gender']) ? $_POST['gender'][0] : '';
        $obj_user->gender = $gender;
    } catch(Exception $ex) {
        $errors['gender'] = $ex->getMessage();
    }
    try{
        $obj_user->street_address = $_POST['street_address'];
    } catch(Exception $ex) {
        $errors['street_address'] = $ex->getMessage();
    }
    try{
        $obj_user->user_id = $_POST['user_id'];
    } catch(Exception $ex) {
        $errors['user_id '] = $ex->getMessage();
    }
    try{
        $obj_user->date_of_birth = $_POST['date_of_birth'];
    } catch(Exception $ex) {
        $errors['date_of_birth'] = $ex->getMessage();
    }
    try{
        $obj_user->contact_no = $_POST['contact_no'];
    } catch(Exception $ex) {
        $errors['contact_no'] = $ex->getMessage();
    }
    if(count($errors) == 0) {
        try{
            $obj_user->adminUpdate();
            $_SESSION['success'] = "User Updated Successfully";
            header("Location:".BASE_URL."users/index.php");
        } catch(Exception $ex) {
            $_SESSION['error'] = $ex->getMessage();
            header("Location:".BASE_URL."users/edit.php?id=".$_POST['user_id']);
        }
        
    } else {
        $_SESSION['error'] = "Check Your Errors";
        $_SESSION['errors'] = $errors;
        header("Location:".BASE_URL."users/edit.php?id=".$_POST['user_id']);
    }

}
?>