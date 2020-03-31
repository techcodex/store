<?php
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    require_once "../../init.php";
    require_once "../../../models/Admin.php";
    try{
        Admin::active($_GET['id']);
        $_SESSION['success'] = "Admin Activated Successfully";
    } catch(Exception $ex) {
        $_SESSION['error'] = $ex->getMessage();
    }
    header("Location:".BASE_URL."admins/index.php");
}
?>