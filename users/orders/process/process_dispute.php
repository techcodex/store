<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../../../init.php";
    require_once "../../../models/DisputedOrder.php";
    require_once "../../../models/Order.php";
    $seller = Order::getOrderUser($_POST['order_id']);
    $obj_dispute = new DisputedOrder();
    $errors = [];
    try{
        $obj_dispute->order_id = $_POST['order_id'];   
    } catch(Exception $ex) {
        $errors['order_id'] = $ex->getMessage();
    }
    try{
        $obj_dispute->notes = $_POST['notes'];
    } catch(Exception $ex) {
        $errors['notes'] = $ex->getMessage();
    }
    if(count($errors) == 0) {
        try{
            Order::disputeOpen($_POST['order_id']);
            $obj_dispute->create();
            $_SESSION['success'] = "Order Dispute Created Sucessfully ";
        }catch(Exception $ex) {
            $_SESSION['error'] = $ex->getMessage();
        }
        header("Location:".BASE_URL."users/orders/orders.php");
    } else {
        $_SESSION['error'] = "Fill all Required Fields";
        $_SESSION['errors'] = $errors;
        header("Location:".BASE_URL."users/orders/dispute.php?id=".$_POST['order_id']);
    }
}
?>