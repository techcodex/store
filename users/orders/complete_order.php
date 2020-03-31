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
                    <input type="hidden" id="order_id" name="order_id" value="<?php echo($_GET['id']) ?>">
                    <div class="col-sm-12 text-left">
                        <h2 class="title">Order Feedback</h2>
                    </div><!-- end col -->
                    <div class="row">
                        <div class="col-md-4" style="margin-top:30px;font-weight:bold;font-size:10px;">
                            <p>Rate Your Experience about Order</p>
                        </div>
                        <div class="col-md-6">
                            <p class="stars">
                                <span class="number">
                                    <a class="star-1 star" href="#">1</a>
                                    <a class="star-2 star" href="#">2</a>
                                    <a class="star-3 star" href="#">3</a>
                                    <a class="star-4 star" href="#">4</a>
                                    <a class="star-5 star" href="#">5</a>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" style="margin-top:30px;font-weight:bold;font-size:10px;">
                            <p>Order Feedback</p>
                        </div>
                        <div class="col-md-6">
                            <textarea name="feedback" id="feedback" placeholder="Enter Your Feedback about seller" class="form-control"></textarea>
                        </div>
                    </div>
                </div><!-- end row -->
                <input type="button" class="btn btn-primary semi-circle col-md-offset-4" id="submit"value="Submit Review">
                <hr class="spacer-5">
                <hr class="spacer-20 no-border">
                <!-- code --->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php
require_once "../../views/footer.php"
?>
<script>
    $(document).ready(function(e) {
        $('.stars a').on('click', function(){
        $('.stars span, .stars a').removeClass('active');

        $(this).addClass('active');
        $('.stars span').addClass('active');
        });
        $("#submit").click(function(e) {
            var rate = document.querySelector(".rate");
            var feedback = document.querySelector("#feedback").value;
            var order_id = document.querySelector("#order_id").value;

            var stars = document.getElementsByClassName("star");

            var id = document.getElementById("order_id").value;
            var rating = getRating(stars);
            
            if(rating == 0) {
                toastr.error("Please Rate Seller to clear Payment");
                return;
            }
            if(feedback == "") {
                toastr.error("Missinf Feedback");
                return;
            }
            var data = {
                id:order_id,
                feedback:feedback,
                rating:rating,
            };
            $.ajax({
                url:"<?php echo(BASE_URL); ?>users/orders/process/process_clear_payment.php",
                data:data,
                dataType:'JSON',
                type:'POST',
                complete:function(jqXHR,textStatus) {
                    if(jqXHR.status == 200) {
                        var result = JSON.parse(jqXHR.responseText);
                        if(result.hasOwnProperty('success')) {
                            toastr.success("Review Submit Successfully");
                            setTimeout(()=>{
                                window.location.replace("<?php echo(BASE_URL); ?>users/orders/orders.php");
                            },2000)
                        } else if(result.hasOwnProperty('error')) {
                            toastr.error(result.error);   
                        }
                    } else {
                        toastr.error("Opss Something Went Wrong Contact Admin "+jqXHR.status);
                    }
                }
            });
        });
    });
    function getRating(stars) {
        var rate = "";
        for(var i =0;i<stars.length;i++) {
            if(stars[i].classList.contains("active")) {
                rate = stars[i].classList;
            }
        }
        if(rate == "") 
            return 0;
        var star = rate[0];
        var star = star.split("-");
        return star[1];
    }
</script>
