<?php
require_once "../../models/User.php";
require_once "../../models/Cart.php";
require_once "../../models/Order.php";
require_once "../../models/Wishlist.php";
require_once "../../models/Category.php";
require_once "../../models/OrderRating.php";
require_once "../../views/header.php";
if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
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
                <form action="<?php echo(BASE_URL); ?>users/orders/process/process_dispute.php" method="post">
                    <input type="hidden" name="order_id" value="<?php echo($_GET['id']); ?>">
                    <div class="form-group <?php echo(isset($errors['notes']) ? 'has-error' : ''); ?>">
                        <label for="note">Enter Reason of Dispute:</label>
                        <textarea class="form-control" name="notes" placeholder="Enter Dispute Reason" rows="10"></textarea>
                        <span class="text-danger">
                            <?php
                                if(isset($errors['notes'])) {
                                    echo($errors['notes']);
                                }
                            ?>
                        </span>
                    </div>
                    <input type="submit" value="Open Dispute" class="btn btn-danger col-md-offset-5 semi-circle">
                </form>

            </div>
        </div>
    </div>
</section>
<?php
require_once "../../views/footer.php";
?>