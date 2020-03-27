<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $response = [];
    require_once "../../../init.php";
    require_once "../../../models/Order.php";
    $items = Order::getOrderItems($_POST['id'],$_POST['user_id']);
    $response['success'] = true;
    $response['items'] = $items;
    echo(json_encode($response));
}
?>