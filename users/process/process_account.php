<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
require_once "../../init.php";
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['obj_user'])) {
    $obj_user = unserialize($_SESSION['obj_user']);
    $errors = [];
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
        $obj_user->contact_no = $_POST['contact_number'];
    } catch(Exception $ex) {
        $errors['contact_number'] = $ex->getMessage();
    }
    try{
        $obj_user->date_of_birth = $_POST['date_of_birth'];
    } catch(Exception $ex) {
        $errors['date_of_birth'] = $ex->getMessage();
    }
    try{
        $obj_user->street_address = $_POST['street_address'];
    } catch(Exception $ex) {
        $errors['street_address'] = $ex->getMessage();
    }
    try{
        $gender = isset($_POST['gender']) ? $_POST['gender'][0] : '';
        $obj_user->gender = $gender;
    } catch(Exception $ex) {
        $errors['gender'] = $ex->getMessage();
    }
    try{
        $obj_user->country_id = $_POST['country_id'];
    } catch(Exception $ex) {
        $errors['country_id'] = $ex->getMessage();
    }
    try{
        $obj_user->state_id = $_POST['state_id'];
    } catch(Exception $ex) {
        $errors['state_id'] = $ex->getMessage();
    }
    try{
        $obj_user->city_id  = $_POST['city_id'];
    } catch(Exception $ex) {
        $errors['city_id'] = $ex->getMessage();
    }
    
    if(count($errors) == 0) {
        try{
            $obj_user->edit();
            $_SESSION['success'] = "Profile Updated Successfully";
        } catch(Exception $ex) {
            $_SESSION['error'] = $ex->getMessage();
        }
        header("Location:".BASE_URL."users/account.php");
    } else {
        $_SESSION['error'] = "Check Your Errors";
        $_SESSION['errors'] = $errors;
        $_SESSION['obj_user'] = serialize($obj_user);
        header("Location:".BASE_URL."users/edit.php");
    }
}
?>