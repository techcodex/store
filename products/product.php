<?php
require_once "../models/User.php";
require_once "../models/Product.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = Product::getProduct($id);
}
require_once "../views/header.php";
?>
<div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li class="active">Single product</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                    <div class="col-sm-3">
                        <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
                            <div class='carousel-inner'>
                                <div class='item active'>
                                    <figure>
                                        <img src='<?php echo(BASE_URL.'img/user_products/'.$product->image); ?>' alt='' />
                                    </figure>
                                </div><!-- end item -->
                            </div><!-- end carousel-inner -->
                        </div><!-- end carousel -->
                    </div><!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="title"><?php echo(ucfirst($product->name)); ?></h2>
                                    <p class="text-gray alt-font">Product code: <?php echo($product->id) ?></p>
                                    
                                    <ul class="list list-inline">
                                        <li><h5 class="text-primary">$ <?php echo($product->price); ?></h5></li>
                                        <li><a href="javascript:void(0);">(4 views)</a></li>
                                    </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-10 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Description:</h5>
                                <p><?php echo($product->description == "" ?  "N/A" : $product->description);  ?></p>
                                <hr class="spacer-15">
                                <h5>Features:</h5>
                                <p><?php echo($product->features == "" ? "N/A" : $product->features); ?></p>
                                
                                <ul class="list list-inline">
                                    <li><button type="button" class="btn btn-default btn-md round"><i class="fa fa-shopping-basket mr-5"></i>Add to Cart</button></li>
                                    <li><button type="button" class="btn btn-gray btn-md round"><i class="fa fa-heart mr-5"></i>Add to Wishlist</button></li>
                                </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                    <div class="col-md-4" style="border:1px solid #eee;">
                        <div class="user">
                            <img src="../img/products/bags_01.jpg" alt="img" class="img-circle col-md-offset-4" width="130" height="130">
                        </div>
                        <hr class="spacer-5"><hr class="spacer-10 no-border">
                        <div class="information">
                        <div class="row">
                                <p class="col-md-6 border"><b>Rating:</b></p>
                                <p class="col-md-6 text-center"> 5.0</p>
                            </div>
                            <div class="row">
                                <p class="col-md-6 border"><b>User Name:</b></p>
                                <p class="col-md-6 text-center"> <?php echo($product->user_name); ?></p>
                            </div>
                            <div class="row">
                                <p class="col-md-6 border"><b>Full Name:</b></p>
                                <p class="col-md-6 text-center"> <?php echo($product->first_name == "" ? "N/A" : ucfirst($product->first_name.' '.$product->last_name) ) ?></p>
                            </div>
                            <div class="row">
                                <p class="col-md-6 border"><b>Gender:</b></p>
                                <p class="col-md-6 text-center"> <?php echo($product->gender); ?></p>
                            </div>
                            <div class="row">
                                <p class="col-md-6 border"><b>Country:</b></p>
                                <p class="col-md-6 text-center"> <?php echO($product->country_name == "" ? "N/A" : $product->country_name); ?></p>
                            </div>
                            <div class="row">
                                <p class="col-md-6 border"><b>State:</b></p>
                                <p class="col-md-6 text-center"> <?php echo($product->state_name == "" ? "N/A" : $product->state_name); ?></p>
                            </div>
                            <div class="row">
                                <p class="col-md-6 border"><b>City:</b></p>
                                <p class="col-md-6 text-center"> <?php echo($product->city_name == "" ? "N/A" : $product->city_name); ?></p>
                            </div>
                            <div class="row">
                                <input type="button" class="btn btn-danger btn-md round col-md-offset-4" value="Contact">
                            </div>
                            <br>
                        </div>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
               
<?php
require_once "../views/footer.php";
?>