<?php
require_once "models/User.php";
require_once "models/Category.php";
require_once "models/Cart.php";
require_once "models/Wishlist.php";
require_once "views/header.php";
?>
<div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="#">Smart Store</a></li>
                            <li class="active">About Us</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="title-wrap">
                            <h2 class="title lines">About Us</h2>
                            <p class="lead">Smart Store is first platform that allows their customers to confirm payment after order is delivered.In
                        this way customer will be able to check weather the product is same as they saw on Store.</p>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <div class="row">
                    <div class="col-sm-4">
                        <figure>
                            <img src="img/blog/blog_01.jpg" alt="" />
                        </figure>
                        <h5>Lorem ipsum dolor sit</h5>
                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div><!-- end col -->
                    <div class="col-sm-4">
                        <figure>
                            <img src="img/blog/blog_02.jpg" alt="" />
                        </figure>
                        <h5>Consectetur adipiscing</h5>
                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div><!-- end col -->
                    <div class="col-sm-4">
                        <figure>
                            <img src="img/blog/blog_03.jpg" alt="" />
                        </figure>
                        <h5>Lorem ipsum dolor sit</h5>
                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-100">
                
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="mb-20">Our Store Location</h4>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <div class="row column-4">
                    <div class="col-sm-12 col-md-12">
                        <div class="icon-boxes style2 light-backgorund">
                            <div class="box-content text-left">
                                <h6 class="alt-font">United States Of America</h6>
                                <p>
                                    77 Mass. Ave., E14/E15
                                    <br>
                                    Seattle, MA 02139-4307 USA
                                </p>
                            </div>
                        </div><!-- icon-box -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
        <!-- start section -->
        <section class="section image-background layer-white" style="background-image: url(img/coming-soon-bg.jpg);">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-8 col-sm-offset-2">
                        <p class="lead text-dark">If you have any questions or concerns, please send us a message, and we'll get you an answare as soon as posible</p>
                        <a href="<?php echo(BASE_URL); ?>contactus.php" class="btn btn-default semi-circle btn-md"><i class="fa fa-envelope mr-5"></i> Send a message</a>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
<?php
require_once "views/footer.php";
?>