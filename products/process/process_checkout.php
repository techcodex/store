<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
require_once "../../models/Order.php";
require_once "../../models/User.php";
require_once "../../models/Cart.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../../init.php";
    $response = [];
    if(isset($_SESSION['obj_user'])) {
        $obj_user = unserialize($_SESSION['obj_user']);
    } else {
        $response['error'] = true;
        $response['msg'] = "Please Login to checkout";
    }
    $obj_cart = unserialize($_SESSION['obj_cart']);
    $obj_order = new Order();
    $errors = [];
    try{
        $obj_order->user_id = $obj_user->user_id;
    } catch(Exception $ex) {
        $errors['user_id'] = $ex->getMessage();
    }
    try{
        $obj_order->address = $_POST['address'];
    } catch(Exception $ex) {
        $errors['address'] = $ex->getMessage();
    }
    try{
        $obj_order->notes = $_POST['notes'];
    } catch(Exception $ex) {
        $errors['notes'] = $ex->getMessage();
    }
    try{
        $obj_order->items = $obj_cart->items;
    } catch(Exception $ex) {
        $errors['items'] = $ex->getMessage();
    }
    try{
        $obj_user->first_name = $_POST['first_name'];
    } catch(Exception $ex) {
        $errors['first_name'] = $ex->getMessage();
    }
    try{
        $obj_user->last_name = $_POST['last_name'];
    } catch(Exception $ex) {
        $errors['last_name'] = $ex->getMessage();
    }
    try{
        $obj_user->first_name = $_POST['first_name'];
    } catch(Exception $ex) {
        $errors['first_name'] = $ex->getMessage();
    }
    try{
        $obj_user->street_address = $_POST['address'];
    } catch(Exception $ex) {
        $errors['street_address'] = $ex->getMessage();
    }
    try{
        $obj_user->contact_no = $_POST['contact_no'];
    } catch(Exception $ex) {
        $errors['contact_no'] = $ex->getMessage();
    }
    if(count($errors) == 0) {
        try{
            $obj_user->updateOrderProfile();
            $obj_order->create();
            $response['success'] = true;
            $response['msg'] = "Order Place Sucessfully";
            unset($_SESSION['obj_cart']);
        } catch(Exception $ex) {
            $response['error'] = true;
            $response['msg'] = $ex->getMessage();
        }
    } else {
        $response['errors'] = $errors;
        $response['error'] = "Opps Something Went Wrong";
    }
    
    echo(json_encode($response));
}
?>