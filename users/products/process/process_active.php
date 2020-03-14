<?php
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    require_once "../../../init.php";
    require_once "../../../models/Product.php";

    try{
        Product::active($_GET['id']);
        $_SESSION['success'] = "Product Active Successfully";
    } catch(Exception $ex) {
        $_SESSION['error'] = $ex->getMessage();
    }
    header("Location:".BASE_URL."users/products/index.php");
}
?>