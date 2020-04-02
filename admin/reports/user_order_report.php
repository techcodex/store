<?php
require_once "../init.php";
require_once "../../models/Order.php";
if(!isset($_POST['user_id'])) {
    $_SESSION['error'] = "Missing User";
    header("Location:".BASE_URL."reports/index.php");
}
$user_id = $_POST['user_id'];
require_once "views/header.php";
?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Sr.No</td>
            <td>Order ID</td>
            <td>Seller Name</td>
            <td>Date</td>
            <td>Shipment</td>
            <td>Payment</td>
            <td>Address</td>
        </tr>
    </thead>
    <?php
        $i=1;
        $orders = Order::getBuyerOrders($user_id);
        foreach($orders as $order) {
            echo("<tr>");   
            echo("<td>".$i++."</td>");
            echo("<td>".$order->order_id."</td>");
            echo("<td>".$order->user_name."</td>");
            echo("<td>".$order->date."</td>");
            if($order->status == 0) {
                echo("<td><i class='badge badge-danger'>Pending</i></td>");
            } else {
                echo("<td><i class='badge badge-primary'>Delivered</i></td>");
            }
            if($order->confirm == 0) {
                echo("<td><i class='badge badge-danger'>Pending</i></td>");
            } else {
                echo("<td><i class='badge badge-primary'>Clear</i></td>");
            }
            echo("<td>".$order->address."</td>");
            echo("</tr>");
        }
    ?>
</table>
<?php
require_once "views/footer.php";
?>