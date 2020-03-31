<?php
require_once "../models/User.php";
require_once "../models/Product.php";
require_once "../models/Category.php";
require_once "../models/Cart.php";
require_once "../models/Brand.php";
require_once "../models/Wishlist.php";
require_once "../views/header.php";
$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? $_GET['limit'] : ITEM_PER_PAGE;
$type = isset($_GET['type']) ? $_GET['type'] : "all";
$brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;
$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : 0;
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : 0;
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
                    <h6 class="subtitle" style="margin-top:5px;">Categories</h6>

                    <ul class="list list-unstyled">
                        <?php
                            $categories = Category::getCategories();
                            foreach($categories as $category) {
                                echo('<li>');
                                echo('<div>');
                                echo("<a href='".BASE_URL."products/index.php?category_id=".$category->id."&brand_id=".$brand_id."&type=".$type."'>".$category->name."</a>");
                                echo('</div>');
                                echo('</li>');
                            }
                        ?>
                    </ul>
                </div><!-- end widget -->
                <div class="widget">

                    <h6 class="subtitle">Brands</h6>

                    <ul class="list list-unstyled">
                        <?php
                            $brands = Brand::getBrands();
                            foreach($brands as $brand) {
                                echo("<li>");
                                echo("<div>");
                                echo("<a href='".BASE_URL."products/index.php?category_id=".$category_id."&brand_id=".$brand->id."&type=".$type."'>".$brand->name."</a>");
                                echo("</div>");
                                echo("</li>");
                            }
                        ?>
                    </ul>
                </div><!-- end widget -->
                <div class="widget">
                    <h6 class="subtitle">My Cart</h6>

                    <p>There are <?php echo($obj_cart->count); ?> items in your cart.</p>
                    <hr class="spacer-10">
                    <ul class="items">
                        <?php
                            $items = $obj_cart->items;
                            foreach($items as $item) {
                                echo('<li>');
                                echo('<a href="'.BASE_URL.'products/product.php=id='.$item->item_id.'" class="product-image">');
                                echo('<img src="'.BASE_URL.$item->image.'" alt="img ">');
                                echo('</a>');
                                echo('<div class="product-details">');
                                echo('<div class="close-icon">');
                                echo('<a href="'.BASE_URL.'products/process/process_cart.php?product_id='.$item->item_id.'&action=remove_item"><i class="fa fa-close"></i></a>');
                                echo('</div>');
                                echo('<p class="product-name">');
                                echo('<a href="'.BASE_URL.'products/product.php?id='.$item->item_id.'">'.ucfirst($item->item_name).'</a>');
                                echo('</p>');
                                echo('<strong class="text-dark">'.$item->quantity.'</strong></strong> x <span class="price text-primary">$ '.$item->unit_price.'</span>');
                                echo('</div>');
                                echo('</li>');
                            }
                        ?>     
                            
                        <!-- end item -->
                    </ul>

                    <hr class="spacer-10">
                    <strong class="text-dark">Cart Subtotal:<span class="pull-right text-primary">$ <?php echo($obj_cart->total);  ?></span></strong>
                    <hr class="spacer-10">
                    <a href="checkout.html" class="btn btn-danger semi-circle btn-block btn-md"><i class="fa fa-shopping-basket mr-10"></i>Checkout</a>
                </div><!-- end widget -->
                <div class="widget">
                    <h6 class="subtitle text-center"><span style="color:darkred;">Smart</span> <span style="color:orange;">Store</span></h6>
                    <figure>
                        <a href="javascript:void(0);">
                            <img src="<?php echo(BASE_URL); ?>img/sslogo.png" alt="collection">
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
                        $products = Product::showAllProducts($limit,$offset,$brand_id,$category_id,$user_id,$type);
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
                            echo('<a class="icon semi-circle" href="'.BASE_URL.'products/process/process_wishlist.php?action=add&product_id='.$product->id.'"><i class="fa fa-heart-o"></i></a>');
                            echo('<a class="icon semi-circle" href="'.BASE_URL.'products/product.php?id='.$product->id.'"><i class="fa fa-search"></i></a>');
                            echo('</div>');
                            echo('</div>');
                            echo('<div class="caption">');
                            echo('<h6 class="regular"><a href="'.BASE_URL.'products/product.php?id='.$product->id.'">'.ucfirst($product->name).'</a></h6>');
                            echo('<div class="price">');
                            echo('<span class="amount text-danger">$ '.$product->price.'</span>');
                            echo('</div>');
                            echo('<form action="'.BASE_URL.'products/process/process_cart.php" method="post">');
                            echo('<input type="hidden" name="product_id" value="'.$product->id.'">');
                            echo('<input type="hidden" name="action" value="add_to_cart">');
                            echo('<input type="submit" class="btn btn-sm btn-danger semi-circle" value="Add To Cart">');
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
                                    $p_num = Product::pagination(ITEM_PER_PAGE,$brand_id,$category_id,0,$type);
                                    foreach($p_num as $p_no=>$offset) {
                                        $page = $p_no + 1;
                                        if(isset($_GET['offset']) && $_GET['offset'] == $offset) {
                                            echo('<li class="active"><a href="'.BASE_URL.'products/index.php?offset='.$offset.'">'.$page.'</a></li>');
                                        } else {
                                            echo('<li><a href="'.BASE_URL.'products/index.php?offset='.$offset.'&category_id='.$category_id.'&brand_id='.$brand_id.'&type='.$type.'">'.$page.'</a></li>');
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
        window.location.replace("<?php echo(BASE_URL.'products/index.php?type='); ?>"+val+"&category_id=<?php echo($category_id); ?>&brand_id=<?php echo($brand_id); ?>");
    });
}); 
</script>