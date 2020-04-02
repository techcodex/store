<?php
require_once "ddos.php";
require_once "models/Cart.php";
require_once "models/Category.php";
require_once "models/Wishlist.php";
require_once "models/User.php";
require_once "views/header.php";
require_once "views/slider.php";
?>

<!-- start section -->
<section class="section white-background">
    <div class="container">
        <div class="row">
            <h3 class="text-center"> <span class="text-danger ">Newest</span> Products</h3>
        </div>
        <div class="spacer-20 no-border"></div>
        <div class="row column-4" >
            <div id="products">

            </div>

        
        <!--End Row-->
    </div><!-- end container -->
    <br>
        <hr class="spacer-10 no-border" />
        <!-- Start Row-->
        <div class="row">
            <button class="btn btn-danger btn-lg col-md-offset-5" id="loadProducts" style="">Load More
            <span class="loader"></span>
            </button>
        </div>
</section>
<!-- end section -->
<!-- start section -->
<section class="section dark-background">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="icon-boxes style2 info-background">
                    <div class="icon">
                        <i class="fa fa-life-ring text-white"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h6 class="alt-font text-white text-uppercase">Support 24/7</h6>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-4">
                <div class="icon-boxes style2 warning-background">
                    <div class="icon">
                        <i class="fa fa-gift text-white"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h6 class="alt-font text-white text-uppercase">Gift cards</h6>
                        <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.</p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-4">
                <div class="icon-boxes style2 danger-background">
                    <div class="icon">
                        <i class="fa fa-credit-card text-white"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h6 class="alt-font text-white text-uppercase">Payment 100% Secure</h6>
                        <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.</p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end section -->
<div class="spacer-20 no-border"></div>
<section class="section image-background layer-dark" style="background-image: url(img/bg_01.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="icon-boxes style2">
                    <div class="icon">
                        <i class="fa fa-book text-primary"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h5 class="text-white">Customer Service</h5>
                        <p class="text-white">Smart Store is providing best services to his customer. Customer can
                            pay after verify the product after delivery and then confirm the payment.</p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-4">
                <div class="icon-boxes style2">
                    <div class="icon">
                        <i class="fa fa-lightbulb-o text-info"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h5 class="text-white">Customer Satisfaction</h5>
                        <p class="text-white">Smart Store is providing best customer service. Our customer is our asset.
                            If any customer have any problem related to store or product then
                            we faclitate our customer in best way.
                        </p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-4">
                <div class="icon-boxes style2">
                    <div class="icon">
                        <i class="fa fa-bullhorn text-warning"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h5 class="text-white">Best Offers</h5>
                        <p class="text-white">Smart Store is providing best offer to their customers by purchase
                            stuff by sitting their home.</p>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<div class="spacer-10 no-border"></div>
<!-- end section -->

<!-- start section -->
<section>
    <div class="container">
        <!-- Modal Product Quick View -->
        <div class="modal fade productQuickView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5>Lorem ipsum dolar sit amet</h5>
                    </div><!-- end modal-header -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
                                    <div class='carousel-inner'>
                                        <div class='item active'>
                                            <figure>
                                                <img src='img/products/men_01.jpg' alt='' />
                                            </figure>
                                        </div><!-- end item -->
                                        <div class='item'>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NrmMk1Myrxc"></iframe>
                                            </div>
                                        </div><!-- end item -->
                                        <div class='item'>
                                            <figure>
                                                <img src='img/products/men_03.jpg' alt='' />
                                            </figure>
                                        </div><!-- end item -->
                                        <div class='item'>
                                            <figure>
                                                <img src='img/products/men_04.jpg' alt='' />
                                            </figure>
                                        </div><!-- end item -->
                                        <div class='item'>
                                            <figure>
                                                <img src='img/products/men_05.jpg' alt='' />
                                            </figure>
                                        </div><!-- end item -->

                                        <!-- Arrows -->
                                        <a class='left carousel-control' href='.html' data-slide='prev'>
                                            <span class='fa fa-angle-left'></span>
                                        </a>
                                        <a class='right carousel-control' href='.html' data-slide='next'>
                                            <span class='fa fa-angle-right'></span>
                                        </a>
                                    </div><!-- end carousel-inner -->

                                    <!-- thumbs -->
                                    <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                        <li data-target='.product-slider' data-slide-to='0' class='active'><img src='img/products/men_01.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='1'><img src='img/products/men_02.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='2'><img src='img/products/men_03.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='3'><img src='img/products/men_04.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='4'><img src='img/products/men_05.jpg' alt='' /></li>
                                        <li data-target='.product-slider' data-slide-to='5'><img src='img/products/men_06.jpg' alt='' /></li>
                                    </ol><!-- end carousel-indicators -->
                                </div><!-- end carousel -->
                            </div><!-- end col -->
                            <div class="col-sm-7">
                                <p class="text-gray alt-font">Product code: 1032446</p>

                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star-half-o text-warning"></i>
                                <span>(12 reviews)</span>
                                <h4 class="text-primary">$79.00</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of a page when looking at its layout. The point of using Lorem Ipsum is
                                    that it has a more-or-less normal distribution of letters, as opposed to using
                                    'Content here, content here', making it look like readable English.</p>
                                <hr class="spacer-10">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control" name="select">
                                            <option value="" selected>Color</option>
                                            <option value="red">Red</option>
                                            <option value="green">Green</option>
                                            <option value="blue">Blue</option>
                                        </select>
                                    </div><!-- end col -->
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control" name="select">
                                            <option value="">Size</option>
                                            <option value="">S</option>
                                            <option value="">M</option>
                                            <option value="">L</option>
                                            <option value="">XL</option>
                                            <option value="">XXL</option>
                                        </select>
                                    </div><!-- end col -->
                                    <div class="col-md-4 col-sm-12">
                                        <select class="form-control" name="select">
                                            <option value="" selected>QTY</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                            <option value="">6</option>
                                            <option value="">7</option>
                                        </select>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                                <hr class="spacer-10">
                                <ul class="list list-inline">
                                    <li><button type="button" class="btn btn-default btn-md round"><i class="fa fa-shopping-basket mr-5"></i>Add to Cart</button></li>
                                    <li><button type="button" class="btn btn-gray btn-md round"><i class="fa fa-heart mr-5"></i>Add to Wishlist</button></li>
                                </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end modal-body -->
                </div><!-- end modal-content -->
            </div><!-- end modal-dialog -->
        </div><!-- end productRewiew -->
    </div><!-- end container -->
</section>
<!-- end section -->

<!-- start footer -->
<?php
require "views/footer.php"
?>

<script>
    var offset = 0;
    var limit = 3;
    $(document).ready(function(e) {    
        getProduct(offset,limit);
        $("#loadProducts").click(function(e) {
            offset += 3;
            getProduct(offset,limit);
        });
    });

    function getProduct(offset,limit) {
        var data = {
            offset:offset,
            limit:limit,
        }; 
        $.ajax({
            url:"<?php echo(BASE_URL); ?>process/process_products.php",
            data:data,
            dataType:'JSON',
            type:'POST',
            beforeSend:function(xhr) {
                $(".loader").html("<img src='<?php echo(BASE_URL); ?>img/loader.gif' alt='' width='30'>")
            },
            complete:function(jqXHR,textStatus) {
                if(jqXHR.status == 200) {
                    var result = JSON.parse(jqXHR.responseText);
                    var output = "";
                    if(result.length != 0) {
                        result.forEach(function(product) {
                            output += '<div class="col-sm-6 col-md-3">'
                                    +'<div class="thumbnail store style1">'
                                    +'<div class="header">'
                                    +'<figure class="layer">'
                                    +'<a href="javascript:void(0);">'
                                    +'<img src="<?php echo(BASE_URL) ?>img/user_products/'+product.image+'" style="width:200px;height:200px;" alt="image">'
                                    +'</a>'
                                    +'</figure>'
                                    +'<div class="icons">'
                                    +'<a class="icon semi-circle" href="<?php echo(BASE_URL); ?>products/process/process_wishlist.php?action=add&product_id='+product.id+'"><i class="fa fa-heart-o"></i></a>'
                                    +'<a class="icon semi-circle" href="<?php echo(BASE_URL); ?>"><i class="fa fa-gift"></i></a>'
                                    +'</div>'
                                    +'</div>'
                                    +'<div class="caption">'
                                    +'<h6 class="regular"><a href="shop-single-product-v1.html">'+product.name+'</a></h6>'
                                    +'<div class="price">'
                                    +'<span class="amount text-primary">$ '+product.price+'</span>'
                                    +'</div>'
                                    +'<a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>'
                                    +'</div>'
                                    +'</div>'
                                    +'</div>'
                                    +'</div>';
                        });
                        $("#products").append(output);
                    }
                }
                $(".loader").html("");
            }
        });
    }
</script>