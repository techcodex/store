<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../init.php";
    $obj_user = new User();
    $errors = [];
    try{
        $obj_user->email = $_POST['email'];
    } catch(Exception $ex) {
        $errors['email'] = $ex->getMessage();
    }
    try{
        $obj_user->password = $_POST['password'];
    } catch(Exception $ex) {
        $errors['password'] = $ex->getMessage();
    }

    if(count($errors) == 0) {
        try{
            $remember = isset($_POST['remember']) ? true : false;
            $obj_user->login($remember);
            header("Location:".BASE_URL."index.php");
        } catch (Exception $ex) {
            $_SESSION['error'] = $ex->getMessage();
            header("Location:".BASE_URL."login.php");
        }
    } else {
        $_SESSION['error'] = "Fill All Required Fileds";
        $_SESSION['errors'] = $errors;
        $_SESSION['obj_user'] = serialize($obj_user);
        header("Location:".BASE_URL."login.php");
    }
}
?>