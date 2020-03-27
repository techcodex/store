<?php

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    require_once "../../init.php";
    require_once "../../../models/Brand.php";

    try{
        Brand::deleteBrand($_GET['id']);
        $_SESSION['success'] = "Brand Deleted Successfully";
    } catch(Exception $ex) {
        $_SESSION['error'] = $ex->getMessage();
    }
    header("Location:".BASE_URL."brands/index.php");
}

?>