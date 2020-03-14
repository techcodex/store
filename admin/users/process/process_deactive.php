<?php
// echo("<pre>");
// print_r($_GET);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    require_once "../../init.php";
    require_once "../../../models/User.php";
    try{
        User::deactive($_GET['id']);
        $_SESSION['success'] = "User Deactive Successfully";
    } catch(Exception $ex) {
        $_SESSION['error'] = $ex->getMessage();
    }
    header("Location:".BASE_URL."users/index.php");
}
?>