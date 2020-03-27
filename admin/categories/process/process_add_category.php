<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    require_once "../../init.php";
    require_once "../../../models/Category.php";

    $errors = [];
    $obj_category = new Category();
    try{
        $obj_category->name = $_POST['name'];
    }catch(Exception $ex){
        $errors['name'] = $ex->getMessage();
    }

if(count($errors) == 0) {
    try{
        $obj_category->addCategory();
        $_SESSION['success'] = "Category Addedd Successfully";
        header("Location:".BASE_URL."categories/create.php");
    } catch(Exception $ex) {
        die($ex->getMessage());
        $_SESSION['error'] = $ex->getMessage();
        header("Location:".BASE_URL."categories/create.php");
    }
    
} else {
    $_SESSION['error'] = "Check Your Errors";
    $_SESSION['errors'] = $errors;
    $_SESSION['obj_category'] = serialize($obj_category);
    header("Location:".BASE_URL."categories/create.php");
}
}
?>