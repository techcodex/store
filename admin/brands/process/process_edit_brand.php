<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    require_once "../../init.php";
    require_once "../../../models/Brand.php";

    $errors = [];
    $obj_brand = new Brand();

    try{
        $obj_brand->brand_id = $_POST['id'];
    }catch(Exception $ex){
        $errors['brand_id'] = $ex->getMessage();
    }

    try{
        $obj_brand->name = $_POST['name'];
    }catch(Exception $ex){
        $errors['name'] = $ex->getMessage();
    }
    
    if ($_FILES['image']['tmp_name'] != '') {
        try{
            $obj_brand->image = $_FILES['image'];
        }catch(Exception $ex){
            $errors['image'] = $ex->getMessage();
        }
    }
    

if(count($errors) == 0) {
    try{
        $obj_brand->updateBrand();
        $_SESSION['success'] = "Brand Updated Successfully";
        header("Location:".BASE_URL."brands/index.php");
    } catch(Exception $ex) {
        die($ex->getMessage());
        $_SESSION['error'] = $ex->getMessage();
        header("Location:".BASE_URL."brands/edit.php");
    }
    
} else {
    $_SESSION['error'] = "Check Your Errors";
    $_SESSION['errors'] = $errors;
    $_SESSION['obj_brand'] = serialize($obj_brand);
    header("Location:".BASE_URL."brands/create.php");
}
}
?>