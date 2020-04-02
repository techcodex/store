<?php
require_once "../../models/User.php";
require_once "../../models/Cart.php";
require_once "../../models/Order.php";
require_once "../../models/Wishlist.php";
require_once "../../models/Category.php";
require_once "../../views/header.php";
?>
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <!-- start sidebar -->
            <div class="col-sm-3">
                <div class="widget">
                    <h6 class="subtitle">Account Navigation</h6>

                    <ul class="list list-unstyled">
                        <li>
                            <a href="my-account.html">My Account</a>
                        </li>
                        <li class="active">
                            <a href="cart.html">My Cart <span class="text-danger">(<?php echo ($obj_cart->count) ?>)</span></a>
                        </li>
                        <li>
                            <a href="order-list.html">My Order</a>
                        </li>
                        <li>
                            <a href="wishlist.html">Wishlist <span class="text-danger">(5)</span></a>
                        </li>
                        <li>
                            <a href="user-information.html"> Account Settings</a>
                        </li>
                    </ul>
                </div><!-- end widget -->

                <div class="widget">
                    <h6 class="subtitle text-center"><span style="color:darkred;">Smart</span><span style="color:orange"> Store</span></h6>
                    <figure>
                        <a href="javascript:void(0);">
                            <img src="<?php echo (BASE_URL); ?>img/sslogo.png" alt="collection">
                        </a>
                    </figure>
                </div><!-- end widget -->
            </div><!-- end col -->
            <!-- end sidebar -->
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <h2 class="title">My Orders</h2>
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="spacer-5">
                <hr class="spacer-20 no-border">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Order id</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Clearence</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                    <?php
                        $orders = Order::getBuyerOrders($obj_user->user_id);
                        $i = 0;
                        foreach($orders as $order) {
                            $i++;
                            echo("<tr>");
                            echo("<td>".$i."</td>");
                            echo("<td>".$order->order_id."</td>");
                            echo("<td>".$order->date."</td>");
                            if($order->status == 0) {
                                echo("<td><i class='badge' style='background-color:#e55e5a;'>Pending</i></td>");
                            } else {
                                echo("<td><i class='badge badge-primary' style='background-color:#007bff'>Delivered</i></td>");
                            }
                            if($order->confirm == 0) {
                                echo("<td><a href='".BASE_URL."users/orders/complete_order.php?id=".$order->order_id."' class='btn btn-sm btn-primary semi-circle pending' data-id='".$order->order_id."' title='payment pending click to clear'>Complete Order</a></td>");
                            } else {
                                echo("<td><a href='#' class='btn btn-sm btn-success semi-circle' title='payment paid'>Paid</a></td>");
                            }
                            if($order->notes == "") {
                                echo("<td>N/A</td>");
                            } else {
                                echo("<td>".$order->notes."</td>");
                            }
                            if($order->confirm == 1) {
                                echo("<td><a href='#' style='color:green;' data-id='".$order->id."' class='view' title='order Items'><i class='fa fa-eye'></i></a>".
                                "&nbsp;<a href='".BASE_URL."users/orders/order_feedback.php?id=".$order->order_id."' title='Check Feedback' style='color:blue;'><i class='fa fa-check-square'></i></a>"
                                ."</td>");
                                echo("</tr>");
                            } else {
                                echo("<td><a href='#' style='color:green;' data-id='".$order->order_id."' class='view' title='order Items'><i class='fa fa-eye'></i></a>");
                                if($order->dispute == 0 || $order->dispute == 2 && $order->confirm == 0) {
                                    echo("&nbsp;<a href='".BASE_URL."users/orders/dispute.php?id=".$order->order_id."' title='Open Disputed' style='color:red;'><i class='fa fa-info-circle'></i></a>");
                                }
                                echo("</td>");
                                echo("</tr>");
                            }
                            
                            
                        }
                    ?>
                    </tbody>

                </table>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
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
<!-- Rating Modal -->
<?php
require_once "../../views/footer.php"
?>

<script>
$(document).ready(function(e) {
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
    
    
});

</script>