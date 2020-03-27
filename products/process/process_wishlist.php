<?php
// echo("<pre>");
// print_r($_GET);
// echo("</pre>");
// die;

require_once "../../init.php";
require_once "../../models/User.php";
require_once "../../models/Wishlist.php";
if(isset($_SESSION['obj_user'])) {
    $obj_user = unserialize($_SESSION['obj_user']);
} else {
    $_SESSION['error'] = "Please Login to view this page";
    header("Location:".BASE_URL."login.php");
    die;
}
if($_SERVER['REQUEST_METHOD'] == "GET") {
    switch($_GET['action']) {
        case 'add':
            $obj_wishlist = new Wishlist();
            $obj_wishlist->user_id = $obj_user->user_id;
            $obj_wishlist->product_id = $_GET['product_id'];
            try{
                $obj_wishlist->add();
                $_SESSION['success'] = "Product Added Wishlist";
            } catch(Exception $ex) {
                $_SESSION['error'] = $ex->getMessage();
            }
            break;
        case 'remove':
            Wishlist::remove($_GET['id']);
            $_SESSION['success'] = "Product Remove From Wishlist";
            break;
        default:{
            $_SESSION['error'] = "Opps Something Went Wrong";
        }
    }
    header("Location:".BASE_URL."products/index.php");
}
?>