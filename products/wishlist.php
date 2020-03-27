<?php
require_once "../models/Wishlist.php";
require_once "../models/User.php";
require_once "../models/Cart.php";
require_once "../models/Category.php";
require_once "../views/header.php";
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
                        <h2 class="title">My Wishlist</h2>
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="spacer-5">
                <hr class="spacer-20 no-border">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                    <?php
                        $wishlists = Wishlist::getUserWishlist($obj_user->user_id);
                        $i = 0;
                        foreach($wishlists as $list) {
                            $i++;
                            echo("<tr>");
                            echo("<td>".$i."</td>");
                            echo("<td><img src='".BASE_URL."img/user_products/".$list->image."' width='70'></td>");
                            echo("<td>".$list->name."</td>");
                            echo("<td>".$list->price."</td>");
                            echo("<td><a href='".BASE_URL."products/process/process_wishlist.php?action=remove&id=".$list->id."' style='color:red;'><i class='fa fa-trash'></i></a></td>");
                            echo("</tr>");
                        }
                    ?>
                    </tbody>

                </table>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<?php
require_once "../views/footer.php"
?>