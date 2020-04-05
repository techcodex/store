<?php
require_once "../models/Admin.php";
require_once "../models/Product.php";
require_once "../models/Order.php";
require_once "../models/User.php";
require_once "views/header.php";
require_once "views/sidebar.php";

$new_order = Order::countNewOrders();
$deliver_orders = Order::countDeliveredOrders();
$disputed_orders = Order::countNewDisputedOrders();
$resolved_disputed_orders = Order::countResolveDisputedOrders();
$users = User::countUsers();
$products = Product::countProducts();
?>
<div class="row" style="font-size: 25px;">
    <div class="col-md-2  col-xs-6 panel panel-blue text-center" style="padding: 10px; color:white;">
        <i class="icon-basket"></i>
        <h5>New Orders</h5>
        <h4 class="no-m"><?php echo($new_order); ?></h4>
    </div>

    <div class="col-md-2 col-xs-6 col-md-offset-1 panel panel-blue text-center" style="padding: 10px;color:white;">
    <i class="icon-basket"></i>
        <h5>Delivered Orders</h5>
        <h4 class="no-m"><?php echo($deliver_orders); ?></h4>
    </div>

    <div class="col-md-2 col-xs-6 col-md-offset-1 panel panel-blue text-center" style="padding: 10px;color:white;">
        <i class="icon-credit-card"></i>
        <h5>Disputed Orders</h5>
        <h4 class="no-m"><?php echo($disputed_orders); ?></h4>
    </div>
    <div class="col-md-2 col-xs-6 col-md-offset-1 panel panel-yellow text-center" style="padding: 10px;color:white;">
    <i class="icon-shield"></i>
        <h5>Resolved Disputed Orders</h5>
        <h4 class="no-m"><?php echo($resolved_disputed_orders); ?></h4>
    </div>
</div>
<div class="row" style="font-size: 25px;">
    <div class="col-md-2  col-xs-6 panel panel-blue text-center" style="padding: 10px; color:white;">
        <i class="icon-user"></i>
        <h5>Users</h5>
        <h4 class="no-m"><?php echo($users); ?></h4>
    </div>
    <div class="col-md-2 col-md-offset-1 col-xs-6 panel panel-green text-center" style="padding: 10px;color:white;">
        <i class="icon-globe"></i>
        <h5>Products</h5>
        <h4 class="no-m"><?php echo($products); ?></h4>
    </div>
</div>
<?php
require_once "views/footer.php";
?>