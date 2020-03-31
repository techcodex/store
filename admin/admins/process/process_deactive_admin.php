<?php
// echo("<pre>");
// print_r($_GET);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    require_once "../../init.php";
    require_once "../../../models/Admin.php";
    try{
        Admin::deactive($_GET['id']);
        $_SESSION['success'] = "Admin Deactivated Successfully";
        header("Location:".BASE_URL."admins/index.php");
    } catch(Exception $ex) {
        $_SESSION['error'] = $ex->getMessage();
    }
    header("Location:".BASE_URL."admins/index.php");
}
?>