<?php
require_once "../../models/Admin.php";
require_once "../../models/Order.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">New Orders List</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Order ID</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            $orders = Order::deliveredOrders();
                            foreach($orders as $order) {
                                echo("<tr>");
                                echo("<td>".$i++."</td>");
                                echo("<td>".$order->id."</td>");
                                echo("<td>".$order->user_name."</td>");
                                echo("<td>".$order->email."</td>");
                                echo("<td>".$order->address."</td>");
                                echo("<td>".$order->date."</td>");
                                if($order->status == 0) {
                                    echo("<td><span class='badge badge-danger'>pending</span></td>");
                                } else {
                                    echo("<td><span class='badge badge-primary'>Delivered</span></td>");
                                }
                                if(!empty($order->notes)) {
                                    echo("<td>".$order->notes."</td>");
                                } else {
                                    echo("<td>N/A</td>");
                                }
                                echo("<td><a href='#' style='color:green' class='view' title='View Order Products' data-id='".$order->id."'><i class='fa fa-eye'></i></a></td>");
                                echo("</tr>");
                            }

                        ?>
                    </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>
</div><!-- Row -->
<!-- Modal -->
<div id="itemsModal" class="modal fade" role="dialog">
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
?>
<script>
$(document).ready(function(e) {
    $(".view").click(function(e) {
        var id = $(this).data("id");
        var data = {
            'id':id,
        };
        $.ajax({
            url:"<?php echo(BASE_URL); ?>orders/process/process_get_order_items.php",
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
                                output += "<tr><td>"+i+"</td><td><img src='<?php echo(WEB_BASE_FOLDER) ?>img/user_products/"+item.image+"' width='50'></td><td>"+item.name+"</td><td>"+item.quantity+"</td><td>"+item.price+"</td></tr>";
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
});
</script>