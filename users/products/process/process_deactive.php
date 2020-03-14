<?php
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    require_once "../../../init.php";
    require_once "../../../models/Product.php";

    try{
        Product::deactive($_GET['id']);
        $_SESSION['success'] = "Product Deactivate Successfully";
    } catch(Exception $ex) {
        $_SESSION['error'] = $ex->getMessage();
    }
    header("Location:".BASE_URL."users/products/index.php");
}
?>