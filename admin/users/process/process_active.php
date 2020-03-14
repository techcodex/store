<?php
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    require_once "../../init.php";
    require_once "../../../models/User.php";
    try{
        User::active($_GET['id']);
        $_SESSION['success'] = "User Active Successfully";
    } catch(Exception $ex) {
        $_SESSION['error'] = $ex->getMessage();
    }
    header("Location:".BASE_URL."users/index.php");
}
?>