<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])) {
    require_once "../../../init.php";
    require_once "../../../models/Order.php";
    $response = [];
    try{
         Order::delivered($_POST['id']);
         $response['success'] = true;
    } catch(Exception $ex) {
        $response['error'] = $ex->getMessage();
    }
    echo(json_encode($response));
}
?>