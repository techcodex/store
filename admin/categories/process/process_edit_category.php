<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    require_once "../../init.php";
    require_once "../../../models/Category.php";

    $errors = [];
    $obj_category = new Category();

    try{
        $obj_category->category_id = $_POST['id'];
    }catch(Exception $ex){
        $errors['category_id'] = $ex->getMessage();
    }

    try{
        $obj_category->name = $_POST['name'];
    }catch(Exception $ex){
        $errors['name'] = $ex->getMessage();
    }

if(count($errors) == 0) {
    try{
        $obj_category->updateCategory();
        $_SESSION['success'] = "Category Updated Successfully";
        header("Location:".BASE_URL."categories/index.php");
    } catch(Exception $ex) {
        $_SESSION['error'] = $ex->getMessage();
        header("Location:".BASE_URL."categories/index.php");
    }
    
} else {
    $_SESSION['error'] = "Check Your Errors";
    $_SESSION['errors'] = $errors;
    header("Location:".BASE_URL."categories/edit.php?id=".$_POST['id']);
}
}
?>