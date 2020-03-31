<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
require_once '../../models/Cart.php';
require_once '../../models/Item.php';
require_once "../../models/Product.php";
require_once "../../init.php";
if(isset($_SESSION['obj_cart'])) {
    $obj_cart = unserialize($_SESSION['obj_cart']);
} else{
    $obj_cart = new Cart();
}

if(isset($_POST['action'])) {
    switch($_POST['action']) {
        case "add_to_cart":
            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
            $product = Product::getProduct($product_id);
            $item = new Item($product_id,1,$product->user_id);
            try{
                $obj_cart->add_to_cart($item);
            } catch(Exception $ex) {
                $_SESSION['error'] = $ex->getMessage();
            }
            break;
        case "update_cart":
            try{
                $obj_cart->update_cart($_POST['qtys']);
            } catch(Exception $ex) {
                $_SESSION['error'] = $ex->getMessage();
            }
            break;
    }
}
if(isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "empty_cart":
            $obj_cart->empty_cart();
            break;
        case "remove_item":
            $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : 0;
            $product = Product::getProduct($product_id);
            $item = new Item($product_id,1,$product->user_id);
            $obj_cart->remove_cart($item);
            break;
    }
}
$_SESSION['obj_cart'] = serialize($obj_cart);
header("Location:".BASE_URL."products/index.php");
?>