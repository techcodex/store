<?php
require_once "../models/User.php";
require_once "../models/Product.php";
require_once "../views/header.php";
$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? $_GET['limit'] : ITEM_PER_PAGE;
$type = isset($_GET['type']) ? $_GET['type'] : "all";

?>

<!-- start section -->
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <!-- start sidebar -->
            <div class="col-sm-3">
                <div class="widget">
                    <h6 class="subtitle">Search</h6>
                        <form >
                            <div class="form-group">
                                <input type="text" id="search" class="form-control input-sm" placeholder="Search">
                            </div>
                        </form>
                        
                        <div class="form-group">
                            <a href="#" id="filter" class="btn btn-primary col-md-12">Filter</a>
                        </div>
                        <div class="form-group">
                            <a href="<?php echo(BASE_URL); ?>products/index.php" class="btn btn-danger col-md-12" style="margin-top:5px;">Reset</a>
                        </div>
                </div><!-- end widget -->
                <div class="widget">
                    <h6 class="subtitle">Categories</h6>

                    <ul class="list list-unstyled">
                        <li>
                            <div class="">
                                <a href="">Mens</a>
                            </div>
                        </li>
                        <li>
                            <div class="">
                                <a href="">Women</a>
                            </div>
                        </li>
                        <li>
                            <div class="">
                                <a href="">Kids</a>
                            </div>
                        </li>
                        <li>
                            <div class="">
                                <a href="">Sports</a>
                            </div>
                        </li>
                        <li>
                            <div class="">
                                <a href="">Sport Wear</a>
                            </div>
                        </li>
                        <li>
                            <div class="">
                                <a href="">Kids</a>
                            </div>
                        </li>
                    </ul>
                </div><!-- end widget -->
                <div class="widget">

                    <h6 class="subtitle">Brands</h6>

                    <ul class="list list-unstyled">
                        <li>
                            <div class="">
                                <a href="">Armani</a>
                            </div>
                        </li>
                        <li>
                            <div class="">
                                <a href="">Gucci</a>
                            </div>
                        </li>
                        <li>
                            <div class="">
                                <a href="">Chanel</a>
                            </div>
                        </li>
                    </ul>
                </div><!-- end widget -->
                <div class="widget">
                    <h6 class="subtitle">My Cart</h6>

                    <p>There are 2 items in your cart.</p>
                    <hr class="spacer-10">
                    <ul class="items">
                        <li>
                            <a href="javascript:void(0);" class="product-image">
                                <img src="img/products/men_06.jpg" alt="Sample Product ">
                            </a>
                            <div class="product-details">
                                <div class="close-icon">
                                    <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                </div>
                                <p class="product-name">
                                    <a href="javascript:void(0);">Lorem ipsum dolor sit amet Consectetur</a>
                                </p>
                                <strong class="text-dark">1</strong> x <span class="price text-primary">$19.99</span>
                            </div>
                        </li><!-- end item -->
                        <li>
                            <a href="javascript:void(0);" class="product-image">
                                <img src="img/products/shoes_01.jpg" alt="Sample Product ">
                            </a>
                            <div class="product-details">
                                <div class="close-icon">
                                    <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                </div>
                                <p class="product-name">
                                    <a href="javascript:void(0);">Lorem ipsum dolor sit amet Consectetur</a>
                                </p>
                                <strong class="text-dark">1</strong> x <span class="price text-primary">$19.99</span>
                            </div>
                        </li><!-- end item -->
                    </ul>

                    <hr class="spacer-10">
                    <strong class="text-dark">Cart Subtotal:<span class="pull-right text-primary">$19.99</span></strong>
                    <hr class="spacer-10">
                    <a href="checkout.html" class="btn btn-danger semi-circle btn-block btn-md"><i class="fa fa-shopping-basket mr-10"></i>Checkout</a>
                </div><!-- end widget -->
                <div class="widget">
                    <h6 class="subtitle text-center"><span style="color:darkred;">Smart</span> <span style="color:orange;">Store</span></h6>
                    <figure>
                        <a href="javascript:void(0);">
                            <img src="img/sslogo.png" alt="collection">
                        </a>
                    </figure>
                </div><!-- end widget -->
            </div><!-- end col -->
            <!-- end sidebar -->
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <h2 class="title">Products</h2>
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="spacer-5">
                <hr class="spacer-20 no-border">

                <div class="row column-3">
                    <?php
                        $products = Product::showAllProducts($limit,$offset,0,0,0,$type);
                        foreach($products as $product) {
                            echo('<div class="col-sm-6 col-md-4">');
                            echo('<div class="thumbnail store style1">');
                            echo('<div class="header">');
                            echo('<figure class="layer">');
                            echo('<a href="javascript:void(0);">');
                            echo('<img src="'.BASE_URL.'img/user_products/'.$product->image.'" alt="" style="height:250px;">');
                            echo('</a>');
                            echo('</figure>');
                            echo('<div class="icons">');
                            echo('<a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>');
                            echo('<a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>');
                            echo('<a class="icon semi-circle" href="'.BASE_URL.'products/product.php?id='.$product->id.'"><i class="fa fa-search"></i></a>');
                            echo('</div>');
                            echo('</div>');
                            echo('<div class="caption">');
                            echo('<h6 class="regular"><a href="'.BASE_URL.'products/product.php?id='.$product->id.'">'.ucfirst($product->name).'</a></h6>');
                            echo('<div class="price">');
                            echo('<span class="amount text-danger">$ '.$product->price.'</span>');
                            echo('</div>');
                            echo('<form>');
                            echo('<input type="submit" class="btn btn-sm btn-danger" value="Add To Cart">');
                            echo('</form>');
                            echo('</div>');
                            echo('</div>');
                            echo('</div>');

                        }
                    ?>
                </div><!-- end row -->

                <hr class="spacer-10 no-border">

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <nav>
                            <ul class="pagination">
                                <?php
                                    $p_num = Product::pagination(ITEM_PER_PAGE,0,0,0);
                                    foreach($p_num as $p_no=>$offset) {
                                        $page = $p_no + 1;
                                        if(isset($_GET['offset']) && $_GET['offset'] == $offset) {
                                            echo('<li class="active"><a href="'.BASE_URL.'products/index.php?offset='.$offset.'">'.$page.'</a></li>');
                                        } else {
                                            echo('<li><a href="'.BASE_URL.'products/index.php?offset='.$offset.'">'.$page.'</a></li>');
                                        }
                                        
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->

    </div><!-- end container -->
</section>
<?php
require_once "../views/footer.php";
?>
<script>
$(document).ready(function(e) {
    $("#filter").click(function(e) {
        var val = document.getElementById("search").value;
        if(val == "") {
            toastr.error("Enter a Product Name You want to search");
            return;
        }
        window.location.replace("<?php echo(BASE_URL.'products/index.php?type='); ?>"+val);
    });
}); 
</script>