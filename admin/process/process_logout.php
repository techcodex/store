<?php
require_once "../init.php";
require_once "../../models/Admin.php";
if(isset($_SESSION['obj_admin']) && $_SERVER['REQUEST_METHOD'] == "GET") {
    $obj_admin = unserialize($_SESSION['obj_admin']);
    try{
        
        $obj_admin->logout();
        header("Location:".BASE_URL."index.php");
    } catch(Exception $ex) {
        $_SESSION['error'] = $ex->getMessage();
        header("Location:".BASE_URL."dashboard.php");
    }
}
?>