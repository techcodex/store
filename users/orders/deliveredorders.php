<?php
require_once "../../models/User.php";
require_once "../../models/Cart.php";
require_once "../../models/Order.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";
?>
<div class="row">
    <table class="table table-bordered table-striped" id="orders" style="font-size:12px;">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Order ID#</th>
                <th>DATE</th>
                <th>Shipment</th>
                <th>Clearence</th>
                <th>Notes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $orders = Order::getSellerDeliveredOders($obj_user->user_id);
            if(count($orders) == 0) {
                echo("<tr><td colspan='7' class='text-center'>No Order Found</td></tr>");
            } else {
                $i = 0;
                foreach($orders as $order) {
                    $i++;
                    echo("<tr>");
                    echo("<td>".$i."</td>");
                    echo("<td>".$order->order_id."</td>");
                    echo("<td>".$order->date."</td>");
                    echo("<td><i class='badge badge-primary' style='background-color:#007bff'>Delivered</i></td>");
                    if($order->confirm == 0) {
                        echo("<td><i class='badge' style='background-color:#e55e5a;'>Pending</i></td>");
                    } else {
                        echo("<td><i class='badge badge-primary' style='background-color:#007bff'>Clear</i></td>");
                    }
                    if($order->notes == "") {
                        echo("<td>N/A</td>");
                    } else {
                        echo("<td>".$order->notes."</td>");
                    }
                    echo("<td><a href='#' class='view' data-id='".$order->order_id."'  style='color:green;' title='order Products'><i class='fa fa-eye'></i></a></td>");
                    echo("</tr>");
                    
                }
            }
        ?>
        </tbody>
    </table>

</div>
<div id="itemsModal" class="modal fade" role="dialog" style="font-size:15px;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Order Items</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody class="tbody">

            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php
require_once "../views/footer.php";
require_once "../../views/footer.php";
?>
<script>
$(document).ready(function(e) {
    $("#orders").DataTable();
    $(".view").click(function(e){
        var id = $(this).data("id");
        var data = {
            'id':id,
        };
        $.ajax({
            url:"<?php echo(BASE_URL); ?>users/orders/process/process_getOrderItems.php",
            data:data,
            dataType:'JSON',
            type:'POST',
            complete:function(jqXhR,textStatus) {
                if(jqXhR.status == 200) {
                    var result = JSON.parse(jqXhR.responseText);
                    if(result.hasOwnProperty('success')) {
                        var items = result.items;
                        var output = "";
                        if(items.length == 0) {
                            output += "<tr><td>No Product Found</td></tr>";
                        } else {
                            var i = 0;
                            items.forEach(function(item){
                                i++;
                                output += "<tr><td>"+i+"</td><td><img src='<?php echo(BASE_URL) ?>img/user_products/"+item.image+"' width='50'></td><td>"+item.name+"</td><td>"+item.quantity+"</td><td>"+item.price+"</td></tr>";
                            });
                            $(".tbody > tr").remove();
                            $(".tbody").append(output)
                            $("#itemsModal").modal();
                        }
                    }
                }
            }
        });
    });
    $(".delivered").click(function(e) {
        var id = $(this).data("id");
        var data = {
            'id':id,
        };
        $.ajax({
            url:"<?php echo(BASE_URL); ?>users/orders/process/process_delivered.php",
            data:data,
            dataType:'JSON',
            type:'POST',
            complete:function(jqXHR,textStatus) {
                if(jqXHR.status == 200) {
                    var result = JSON.parse(jqXHR.responseText);
                    if(result.hasOwnProperty('success')) {
                        toastr.success("Order Delivered Successfully");
                        setTimeout(()=>{
                            window.location.replace("<?php echo(BASE_URL); ?>users/orders/sellerorders.php");
                        },2000)
                    } else if(result.hasOwnProperty(error)) {
                        toastr.error(result.error);
                    } else {
                        toastr.error("Contact Admin "+jqXHR.textStatus);
                    }
                }
            }
        });
    });
});
</script>