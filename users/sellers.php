<?php
require_once "../models/User.php";
require_once "../models/Product.php";
require_once "../models/Category.php";
require_once "../models/Cart.php";
require_once "../models/Brand.php";
require_once "../models/Wishlist.php";
require_once "../views/header.php";
$users = User::show_all_users();
?>

<!-- start section -->
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <div class="row column-4">
                <?php
                    foreach($users as $user) {
                        echo('<div class="col-sm-6 col-md-4">');
                            echo('<div class="thumbnail store style1">');
                            echo('<div class="header">');
                            echo('<figure class="layer">');
                            echo('<a href="'.BASE_URL.'products/index.php?user_id='.$user->user_id.'">');
                            if(empty($user->profile_image)) {
                                echo('<img src="'.BASE_URL.'img/users/default.png" alt="" style="height:250px;">');    
                            } else {
                                echo('<img src="'.BASE_URL.'img/users/'.$user->profile_image.'" alt="" style="height:200px;width:150px;">');
                            }
                            echo('</a>');
                            echo('</figure>');
                            echo('<div class="icons">');
                            echo('<a class="btn btn-sm btn-danger semi-circle" href="">View Products</a>');
                            echo('</div>');
                            echo('</div>');
                            echo('<div class="caption text-center">');
                            echo('<h6 class="regular"><a href="">'.ucfirst($user->user_name).'</a></h6>');
                            echo('<div class="price" style="font-size:20px;">');
                            $rating = ceil($user->rating);
                            for($i=1;$i<=5;$i++) {
                                if($rating < 3) {
                                    if($i <= $rating) {
                                        echo("<span class='fa fa-star text-danger'></span> &nbsp");
                                    } else {
                                        echo("<span class='fa fa-star'></span> &nbsp");
                                    }
                                } else {
                                    if($i <= $rating) {
                                        echo("<span class='fa fa-star text-success'></span> &nbsp");
                                    } else {
                                        echo("<span class='fa fa-star'></span> &nbsp");
                                    }
                                }
                                
                            }
                            echo('</div>');
                            echo('<a href="'.BASE_URL.'products/index.php?user_id='.$user->user_id.'" class="btn btn-sm btn-danger semi-circle">Seller Products</a>');
                            echo('</div>');
                            echo('</div>');
                            echo('</div>');
                    }
                ?>
            </div>
        </div><!-- end row -->

    </div><!-- end container -->
</section>
<?php
require_once "../views/footer.php";
?>
<script>
</script>