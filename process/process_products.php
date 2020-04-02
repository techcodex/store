<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../init.php";
    require_once "../models/Product.php";
    $products = Product::getHomeProducts($_POST['offset'],$_POST['limit']);
    echo(json_encode($products));
}
?>