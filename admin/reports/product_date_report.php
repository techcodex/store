<?php
require_once "../init.php";
require_once "../../models/Order.php";
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$product_id = $_POST['product_id'];
$from_date_time = strtotime($from_date);
$to_date_time = strtotime($to_date);
// die("From Date".$from_date_time."<br>"."To date".$to_date_time);
if($from_date_time > $to_date_time) {
    $_SESSION['error'] = "Invalid Date";
    header("Location:".BASE_URL."reports/index.php");
    die;
}
if(empty($product_id)) {
    $_SESSION['error'] = "Missing Product";
    header("Location:".BASE_URL."reports/index.php");
    die;
}
require_once "views/header.php";
?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Sr.No</td>
            <td>Order ID</td>
            <td>Customer</td>
            <td>Date</td>
            <td>Shipment</td>
            <td>Payment</td>
            <td>Address</td>
        </tr>
    </thead>
    <?php
        $i=1;
        $orders = Order::OrderProductReport($from_date,$to_date,$product_id);
        if(count($orders) == 0) {
            echo("<tr><td colspan='7' class='text-center'>No Order Found</td></tr>");
        } else {
            foreach($orders as $order) {
                echo("<tr>");   
                echo("<td>".$i++."</td>");
                echo("<td>".$order->order_id."</td>");
                echo("<td>".$order->user_name."</td>");
                echo("<td>".$order->date."</td>");
                if($order->order_status == 0) {
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
        }
    ?>
</table>
<?php
require_once "views/footer.php";
?>