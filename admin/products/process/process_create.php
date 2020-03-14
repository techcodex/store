<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../../init.php";
    require_once "../../../models/Product.php";
    $errors = [];
    $obj_product = new Product();

    try{
        $obj_product->user_id = $_POST['user_id'];
    } catch(Exception $ex) {
        $errors['user_id'] = $ex->getMessage();
    }
    try{
        $obj_product->name = $_POST['name'];
    } catch(Exception $ex) {
        $errors['name'] = $ex->getMessage();
    }
    try {
        $obj_product->price = $_POST['price'];
    } catch(Exception $ex) {
        $errors['price'] = $ex->getMessage();
    }
    try {
        $obj_product->quantity = $_POST['quantity'];
    } catch(Exception $ex) {
        $errors['quantity'] = $ex->getMessage();
    }
    try {
        $obj_product->features = $_POST['features'];
    } catch(Exception $ex) {
        $errors['features'] = $ex->getMessage();
    }
    try {
        $obj_product->description = $_POST['description'];
    } catch(Exception $ex) {
        $errors['description'] = $ex->getMessage();
    }
    try {
        $obj_product->brand_id = $_POST['brand_id'];
    } catch(Exception $ex) {
        $errors['brand_id'] = $ex->getMessage();
    }
    try {
        $obj_product->category_id = $_POST['category_id'];
    } catch(Exception $ex) {
        $errors['category_id'] = $ex->getMessage();
    }
    try{
        $obj_product->image = $_FILES['image'];
    } catch(Exception $ex) {
        $errors['image'] = $ex->getMessage();
    }
    if(count($errors) == 0) {
        try{
            $obj_product->add();
            $_SESSION['success'] = "Product Addedd Successfully";
            header("Location:".BASE_URL."products/create.php");
        } catch(Exception $ex) {
            die($ex->getMessage());
            $_SESSION['error'] = $ex->getMessage();
            header("Location:".BASE_URL."products/create.php");
        }
        
    } else {
        $_SESSION['error'] = "Check Your Errors";
        $_SESSION['errors'] = $errors;
        $_SESSION['obj_product'] = serialize($obj_product);
        header("Location:".BASE_URL."products/create.php");
    }
}
?>