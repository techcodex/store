<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="icon-boxes style1">
                        <div class="icon">
                            <i class="fa fa-truck text-gray"></i>
                        </div><!-- end icon -->
                        <div class="box-content">
                            <h6 class="alt-font text-light text-uppercase"> Shipping</h6>
                            <p class="text-gray">Smart Store is providing home delivery to his customers.</p>
                        </div>
                    </div><!-- icon-box -->
                </div><!-- end col -->
                <div class="col-sm-3">
                    <div class="icon-boxes style1">
                        <div class="icon">
                            <i class="fa fa-life-ring text-gray"></i>
                        </div><!-- end icon -->
                        <div class="box-content">
                            <h6 class="alt-font text-light text-uppercase">Support 24/7</h6>
                            <p class="text-gray">We provide 24 / 7 service to it's customers so feel free to contact us.
                            </p>
                        </div>
                    </div><!-- icon-box -->
                </div><!-- end col -->
                <div class="col-sm-3">
                    <div class="icon-boxes style1">
                        <div class="icon">
                            <i class="fa fa-heart text-gray"></i>
                        </div><!-- end icon -->
                        <div class="box-content">
                            <h6 class="alt-font text-light text-uppercase">Wishlist</h6>
                            <p class="text-gray">We are providing wishlist facility.</p>
                        </div>
                    </div><!-- icon-box -->
                </div><!-- end col -->
                <div class="col-sm-3">
                    <div class="icon-boxes style1">
                        <div class="icon">
                            <i class="fa fa-credit-card text-gray"></i>
                        </div><!-- end icon -->
                        <div class="box-content">
                            <h6 class="alt-font text-light text-uppercase">Payment 100% Secure</h6>
                            <p class="text-gray">You will pay after verfiy the product you are purchasing</p>
                        </div>
                    </div><!-- icon-box -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="spacer-30">

            <div class="row">
                <div class="col-sm-3">
                    <h5 class="title">Smart Store</h5>
                    <p>Smart Store is first platform that allows their customers to confirm payment after order is delivered.In
                        this way customer will be able to check weather the product is same as they saw on Store.</p>

                    <hr class="spacer-10 no-border">
                </div><!-- end col -->
                <div class="col-sm-3">
                    <h5 class="title">My Account</h5>
                    <ul class="list alt-list">
                        <li><i class="fa fa-angle-right"></i><a href="<?php echo(BASE_URL); ?>login.php">Login</a></li>
                        <li><a href="<?php echo(BASE_URL); ?>products/wishlist.php"><i class="fa fa-angle-right"></i>Wishlist</a></li>
                        <li><a href="<?php echo(BASE_URL); ?>products/cart.php"><i class="fa fa-angle-right"></i>My Cart</a></li>
                        <li><a href="<?php echo(BASE_URL); ?>products/checkout.php"><i class="fa fa-angle-right"></i>Checkout</a></li>
                    </ul>
                </div><!-- end col -->
                <div class="col-sm-3">
                    <h5 class="title">Information</h5>
                    <ul class="list alt-list">
                        <li><a href="<?php echo(BASE_URL); ?>home.php"><i class="fa fa-angle-right"></i>Home</a></li>
                        <li><a href="<?php echo(BASE_URL); ?>aboutus.php"><i class="fa fa-angle-right"></i>About Us</a></li>
                        <li><a href="<?php echo(BASE_URL); ?>contactus.php"><i class="fa fa-angle-right"></i>Contact Us</a></li>
                    </ul>
                </div><!-- end col -->
                <div class="col-sm-3">
                    <h5 class="title">Payment Methods</h5>
                    <p>Payment at delivery. Beacuse customer can give money for that product that it buy</p>
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="spacer-30">

            <div class="row text-center">
                <div class="col-sm-12">
                    <p class="text-sm">© 2020. Made with <i class="fa fa-heart text-danger"></i> by <a href="">Smart
                            Store</a></p>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer>
    <!-- end footer -->


    <!-- JavaScript Files -->
    <script type="text/javascript" src="<?php echo(BASE_URL); ?>js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo(BASE_URL); ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo(BASE_URL); ?>js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo(BASE_URL); ?>js/nouislider.min.js"></script>
    <script type="text/javascript" src="<?php echo(BASE_URL); ?>js/jquery.sticky.js"></script>
    <script type="text/javascript" src="<?php echo(BASE_URL); ?>js/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo(BASE_URL); ?>js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo(BASE_URL); ?>js/swiper.min.js"></script>
    <script type="text/javascript" src="<?php echo(BASE_URL); ?>js/main.js"></script>
    <script src="<?php echo(BASE_URL); ?>js/toastr.min.js"></script>

    <!-- datatable  -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded",(e)=>{
        toastr.options.escapeHtml = true;
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates = true;
        toastr.options.progressBar = true;
        <?php
            if(isset($_SESSION['error'])) {
                echo("toastr.error('".$_SESSION['error']."');");
                unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])) {
                echo("toastr.success('".$_SESSION['success']."');");
                unset($_SESSION['success']);
            }
            if(isset($_SESSION['info'])) {
                echo("toastr.info('".$_SESSION['info']."');");
                unset($_SESSION['info']);
            }
        ?>
        $("#header_category_id").change(function(e) {
            var id = $("#header_category_id").val();
            if(id == "") {
                return;
            }
            window.location.replace("<?php echo(BASE_URL); ?>products/index.php?brand_id=0&type=all&category_id="+id);
        });
        $("#btn_header_search").click((e)=>{
            var search = $("#header_search").val();
            if(search == "") {
                toastr.error("Please Enter Product Name You Want to Search");
                return;
            }
            window.location.replace("<?php echo(BASE_URL); ?>products/index.php?brand_id=0&category_id=0&type="+search);
        }); 
    });
    var loader = "<img src='<?php echo(BASE_URL); ?>img/loader.gif' width='15'>";
    
    </script>
</body>

</html>