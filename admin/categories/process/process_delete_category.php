<?php

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    require_once "../../init.php";
    require_once "../../../models/Category.php";

    try{
        Category::deleteCategory($_GET['id']);
        $_SESSION['success'] = "Category Deleted Successfully";
    } catch(Exception $ex) {
        $_SESSION['error'] = $ex->getMessage();
    }
    header("Location:".BASE_URL."categories/index.php");
}

?>