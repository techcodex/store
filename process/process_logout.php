<?php
if($_SERVER['REQUEST_METHOD'] == "GET") {
    require_once "../init.php";
    if(isset($_SESSION['obj_user'])) {
        $obj_user = unserialize($_SESSION['obj_user']);
    } else {
        header("Location:../index.php");
    }
    try{
        $obj_user->logout();
        header("Location:../index.php");
    } catch(Exception $ex) {
        $_SESSION['error'] = $ex->getMessage();
        header("Location:../index.php");
    } 
}

?>