<?php
require_once "../../models/User.php";
require_once "../../models/Cart.php";
require_once "../../models/Order.php";
require_once "../../models/Wishlist.php";
require_once "../../models/Category.php";
require_once "../../models/OrderRating.php";
$order_id = $_GET['id'];
$data = OrderRating::show($order_id);
require_once "../../views/header.php";
?>
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <div class="col-md-12 " style="background-color:#f8f8ff;padding:10px; border-left:5px solid #e55e5a;" >
                <div class="col-md-2">
                    <?php
                        if(empty($data['profile_image'])) {
                            echo("<img src='".BASE_URL."img/users/default.png' alt='image' width='100'>");
                        } else {
                            echo("<img src='".BASE_URL."".$data['profile_image']."' alt='image'>");
                        }
                    ?>
                </div>
                <div class="col-md-5" style="border-right:1px solid grey;">
                    <h5><?php echo(ucfirst($data['first_name'])." ".ucfirst($data['last_name'])); ?></h1>
                    <h6>User Name : <?php echo($data['user_name']) ?></h6>
                    <h6>Rating: <?php echo($data['user_rating']) ?></h6>
                </div>
                <div class="col-md-3 text-center">
                    <div style="margin-top:30px;font-size:30px;">
                        <?php
                            $rating = ceil($data['order_rating']);
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
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" >
                        <p class="" style="margin-top:20px;margin-left:15px;"><?php echo($data['feedback']); ?></p>
                        <p class="" style="margin-left:15px;">--<?php echo($data['buyer_name']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once "../../views/footer.php";
?>