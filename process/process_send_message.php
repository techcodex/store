<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    require_once "../init.php";
    require_once "../models/Message.php";

    $errors = [];
    $obj_message = new Message();
    try{
        $obj_message->name = $_POST['name'];
    }catch(Exception $ex){
        $errors['name'] = $ex->getMessage();
    }

    try{
        $obj_message->email = $_POST['email'];
    }catch(Exception $ex){
        $errors['email'] = $ex->getMessage();
    }

    try{
        $obj_message->message = $_POST['message'];
    }catch(Exception $ex){
        $errors['message'] = $ex->getMessage();
    }

if(count($errors) == 0) {
    try{
        $obj_message->addMessage();
        $_SESSION['success'] = "Message Sent Successfully";
        header("Location:".BASE_URL."contactus.php");
    } catch(Exception $ex) {
        die($ex->getMessage());
        $_SESSION['error'] = $ex->getMessage();
        header("Location:".BASE_URL."contactus.php");
    }
    
} else {
    $_SESSION['error'] = "Check Your Errors";
    $_SESSION['errors'] = $errors;
    $_SESSION['obj_message'] = serialize($obj_message);
    header("Location:".BASE_URL."contactus.php");
}
}
?>