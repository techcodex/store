<?php
require_once "../init.php";
require_once "../../models/DisputedOrder.php";
require_once "views/header.php";
?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Sr.No</td>
            <td>Order ID</td>
            <td>Customer</td>
            <td>Date</td>
            <td>Reason</td>
            <td>Status</td>
        </tr>
    </thead>
    <?php
        $i=1;
        $orders = DisputedOrder::getDisputedOrder();
        foreach($orders as $order) {
            echo("<tr>");   
            echo("<td>".$i++."</td>");
            echo("<td>".$order->order_id."</td>");
            echo("<td>".$order->user_name."</td>");
            echo("<td>".$order->disputed_date."</td>");
            echo("<td>".$order->disputed_notes."</td>");
            if($order->disputed_status == 0) {
                echo("<td><i class='badge badge-danger'>Pending</i></td>");
            } else {
                echo("<td><i class='badge badge-primary'>Resolved</i></td>");
            }
            echo("</tr>");
        }
    ?>
</table>
<?php
require_once "views/footer.php";
?>