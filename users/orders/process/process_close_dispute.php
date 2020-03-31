<?php
// echo("<pre>");
// print_r($_GET);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "GET") {
    require_once "../../../init.php";
    require_once "../../../models/Order.php";
    require_once "../../../models/DisputedOrder.php";
    Order::disputeClose($_GET['id']);
    DisputedOrder::close_dispute($_GET['id']);
    $_SESSION['success'] = "Dispute Clear Successfully";
    header("Location:".BASE_URL."users/orders/disputed_orders.php");
}
?>