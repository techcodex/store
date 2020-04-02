<?php
require_once "../models/User.php";
require_once "../models/Category.php";
require_once "../models/Cart.php";
require_once "../models/Wishlist.php";
require_once "../views/header.php";
?>
<!-- start section -->
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <!-- start sidebar -->
            <div class="col-sm-3">
                <div class="widget">
                    <h6 class="subtitle">Account Navigation</h6>

                    <ul class="list list-unstyled">
                        <li>
                            <a href="<?php echo(BASE_URL); ?>users/account.php">My Account</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo(BASE_URL); ?>products/cart.php">My Cart <span class="text-danger">(<?php echo ($obj_cart->count) ?>)</span></a>
                        </li>
                        <li>
                            <a href="<?php echo(BASE_URL); ?>users/orders/orders.php">My Order</a>
                        </li>
                        <li>
                            <a href="<?php echo(BASE_URL); ?>products/wishlist.php">Wishlist <span class="text-danger">(5)</span></a>
                        </li>
                        <li>
                            <a href="<?php echo(BASE_URL); ?>users/edit.php"> Account Settings</a>
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
                        <h2 class="title">My Cart</h2>
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="spacer-5">
                <hr class="spacer-20 no-border">
                <form action="<?php echo (BASE_URL) ?>products/process/process_cart.php" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Products</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $items = $obj_cart->items;
                                        if (count($items) == 0) {
                                            echo ("<tr><td class='text-danger text-center' colspan='5'>Opss Your Cart is Empty</td></tr>");
                                        } else { }
                                        foreach ($items as $item) {
                                            echo ('<tr>');
                                            echo ('<td>');
                                            echo ('<a href="' . BASE_URL . 'products/product.php?id=' . $item->item_id . '">');
                                            echo ('<img width="60px" src="' . BASE_URL . $item->image . '" alt="product">');
                                            echo ('</a>');
                                            echo ('</td>');
                                            echo ('<td>');
                                            echo ('<h6 class="regular"><a href="' . BASE_URL . 'products/product.php?id=' . $item->item_id . '">' . ucfirst($item->item_name) . '</a></h6>');
                                            if ($item->item_description == "") {
                                                echo ('<p>N/A</p>');
                                            } else {
                                                echo ('<p>' . $product->description . '</p>');
                                            }
                                            echo ('</td>');
                                            echo ('<td>');
                                            echo ('<span>$' . $item->unit_price . '</span>');
                                            echo ('<input type="hidden" name="action" value="update_cart">');
                                            echo ('<td><input type="number" name="qtys[' . $item->item_id . ']" class="form-control" value="' . $item->quantity . '"></td>');
                                            echo ('<td>');
                                            echo ('<span class="text-primary">$' . $item->unit_price * $item->quantity . '</span>');
                                            echo ('<td>');
                                            echo ('<a href="' . BASE_URL . 'products/process/process_cart.php?product_id=' . $item->item_id . '&action=remove_item" style="color:red;"><i class="fa fa-trash"></i></a>');
                                            echo ('</td>');
                                            echo ('</tr>');
                                        }

                                        ?>

                                    </tbody>
                                </table><!-- end table -->
                            </div><!-- end table-responsive -->

                            <hr class="spacer-10 no-border">

                            <a href="<?php echo (BASE_URL); ?>products/index.php" class="btn btn-light semi-circle btn-md pull-left">
                                <i class="fa fa-arrow-left mr-5"></i> Continue shopping
                            </a>
                            <button type="submit" class="btn btn-primary semi-circle btn-md col-md-offset-4">Update</button>
                            <a href="#" class="btn btn-danger checkout semi-circle btn-md pull-right">
                                Checkout <i class="fa fa-arrow-right ml-5"></i>
                            </a>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </form>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end section -->
<?php
require_once "../views/footer.php";
?>
<script>
$(document).ready(function(e) {
    $(".checkout").click(function(e) {
        e.preventDefault();
        <?php
            if($obj_cart->count != 0) {
                echo("window.location.replace('".BASE_URL."products/checkout.php')");
            } else {
                echo("toastr.error('Cart is Empty');");
            }
        ?>
    });
});
</script>