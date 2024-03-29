<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
define("BASE_FOLDER","/");
define("BASE_URL","http://".$_SERVER['HTTP_HOST'].BASE_FOLDER);
define('ITEM_PER_PAGE',6);

define("WEB_BASE_FOLDER","/");
define("WEB_BASE_URL","http://".$_SERVER['HTTP_HOST'].WEB_BASE_FOLDER);
if(isset($_COOKIE['obj_user'])) {
    $_SESSION['obj_user'] = $_COOKIE['obj_user'];
}
if(isset($_SESSION['obj_user'])) {
    $obj_user = unserialize($_SESSION['obj_user']);
} else {
    $obj_user = new User();
}
if(isset($_SESSION['obj_cart'])) {
    $obj_cart = unserialize($_SESSION['obj_cart']);
} else {
    $obj_cart = new Cart();
}
if($obj_user->loggedin) {
    $wishlist_count = Wishlist::countWishlist($obj_user->user_id);
} else {
    $wishlist_count = 0;
}
$public_pages = [
    BASE_FOLDER."login.php",
    BASE_FOLDER."register.php",
];
$restricted_pages = [
    BASE_FOLDER."users/account.php",
    BASE_FOLDER."users/edit.php",
    BASE_FOLDER."products/wishlist.php",
    BASE_FOLDER."products/checkout.php",
];
$current = $_SERVER['PHP_SELF'];

if(in_array($current,$restricted_pages) && !$obj_user->loggedin) {
    $_SESSION['error'] = "Please Login To View This Page";
    header("Location:".BASE_URL."login.php");
    die;
}
if(in_array($current,$public_pages) && $obj_user->loggedin) {
    $_SESSION['error'] = "Please Logout to View This Page";
    header("Location:".BASE_URL."index.php");
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Smart Store | 
        <?php
            if($obj_user->loggedin) {
                echo(ucfirst($obj_user->user_name));
            }
        ?>
    </title>
    <meta charset="utf-8">
    <meta name="description" content="Smart Store">
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo(BASE_URL); ?>img/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?php echo(BASE_URL); ?>img/favicon.png" type="image/x-icon">

    <!-- css files -->
    <link rel="stylesheet" type="text/css" href="<?php echo(BASE_URL); ?>css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo(BASE_URL); ?>css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo(BASE_URL); ?>css/owl.carousel.min.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo(BASE_URL); ?>css/animate.css" />


    <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
    <link id="pagestyle" rel="stylesheet" type="text/css" href="<?php echo(BASE_URL); ?>css/default.css" />

    <!-- toastr css -->
    <link href="<?php echo(BASE_URL); ?>css/toastr.min.css" rel="stylesheet" type="text/css">
    
    <!-- Jquery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Google fonts -->
    
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
    <!-- Adding Toastr css-->

    <style>
        .middleBar .header-items .header-item a:hover {
            background-color: #e55e5a !important;
            color:white;
        }
        .middleBar .header-items .header-item a sub {
            background-color: #e55e5a;
        }
        .border{
            border-right:1px solid #e55e5a;
        }
        .hover:hover{
            color:#e55e5a;
        }
        .stars input {
            position: absolute;
            left: -999999px;
        }

        .stars a {
            display: inline-block;
            padding-right:4px;
            text-decoration: none;
            margin:0;
        }

        .stars a:after {
            position: relative;
            font-size: 18px;
            font-family: 'FontAwesome', serif;
            display: block;
            content: "\f005";
            color: #9e9e9e;
        }


        .number {
        font-size: 0; /* trick to remove inline-element's margin */
        }

        .stars a:hover ~ a:after{
        color: #9e9e9e !important;
        }
        span.active a.active ~ a:after{
        color: #9e9e9e;
        }

        span:hover a:after{
        color:goldenrod !important;
        }

        span.active a:after,
        .stars a.active:after{
            color:goldenrod;
        }
    </style>
</head>

<body>

    <!-- start topBar -->
    <div class="topBar inverse">
        <div class="container">

            <ul class="list-inline pull-left hidden-sm hidden-xs">
                <li><i class="fa fa-phone mr-5"></i>+1 (260) 702-1333</li>
                <li><i class="fa fa-envelope mr-5"></i>info@smartstore.com</li>
            </ul>
            <ul class="topBarNav pull-right">
                <?php
                    if(!$obj_user->loggedin) {

                ?>
                <li class="linkdown">
                    <a href="<?php echo(BASE_URL); ?>login.php">
                        <span class="hidden-xs">
                            Login
                        </span>
                    </a>
                </li>
                <li class="linkdown">
                    <a href="<?php echo(BASE_URL); ?>register.php">
                        <span class="hidden-xs">
                            Register
                        </span>
                    </a>
                </li>

                <?php
                } else {
                    ?>
                    <li class="linkdown">
                        <a href="<?php echo(BASE_URL); ?>users/dashboard.php">
                            <span class="hidden-xs">
                                Switch to Selling
                            </span>
                        </a>
                    </li>
                <?php
                }
                ?>
                
                <li class="linkdown">
                    <a href="javascript:void(0);">
                        <i class="fa fa-user mr-5"></i>
                        <span class="hidden-xs">
                            My Account
                            <i class="fa fa-angle-down ml-5"></i>
                        </span>
                    </a>
                    <ul class="w-150">
                        <?php
                            if(!$obj_user->loggedin) {
                                echo("<li><a href='".BASE_URL."login.php'>Login</a></li>");
                                echo("<li><a href='".BASE_URL."register.php'>Create Account</a></li>");
                            } 
                            else {
                                echo("<li><a href='".BASE_URL."users/account.php'>Account Setting</a></li>");
                            }
                        ?>
                        <li class="divider"></li>
                        <li><a href="<?php echo(BASE_URL); ?>products/wishlist.php">Wishlist (<?php echo($wishlist_count); ?>)</a></li>
                        <li><a href="<?php echo(BASE_URL); ?>products/cart.php">My Cart</a></li>
                        <li><a href="<?php echo(BASE_URL); ?>products/checkout.php">Checkout</a></li>
                        <?php
                        if($obj_user->loggedin) {
                            echo("<li class='divider'></li>");
                            echo("<li><a href='".BASE_URL."process/process_logout.php'>Logout</a></li>");
                        }
                        ?>
                    </ul>
                </li>
                <li class="linkdown">
                    <a href="javascript:void(0);">
                        <i class="fa fa-shopping-basket mr-5"></i>
                        <span class="hidden-xs">
                            Cart<sup class="text-danger">(<?php echo($obj_cart->count); ?>)</sup>
                            <i class="fa fa-angle-down ml-5"></i>
                        </span>
                    </a>
                    <ul class="cart w-250">
                        <li>
                            <div class="cart-items">
                                <ol class="items">
                                    <?php
                                        $items = $obj_cart->items;
                                        foreach($items as $item) {
                                            echo('<li>');
                                            echo('<a href="'.BASE_URL.'products/product.php?id='.$item->item_id.'" class="product-image">');
                                            echo('<img src="'.BASE_URL.$item->image.'" alt="Sample Product ">');
                                            echo('</a>');
                                            echo('<div class="product-details">');
                                            echo('<div class="close-icon">');
                                            echo('<a href="'.BASE_URL.'products/process/process_cart.php?product_id='.$item->item_id.'&action=remove_item"><i class="fa fa-close"></i></a>');
                                            echo('</div>');
                                            echo('<p class="product-name">');
                                            echo('<a href="'.BASE_URL.'products/product.php?id='.$item->item_id.'">'.ucfirst($item->item_name).'</a>');
                                            echo('</p>');
                                            echo('<strong>'.$item->quantity.'</strong> x <span class="price text-danger">$'.$item->unit_price.'</span>');
                                            echo('</div>');
                                            echo('</li>');
                                        }
                                    ?>
                                </ol>
                                <div class="col-md-12" style="border-top:1px solid red;margin-top:5px;">
                                    
                                </div>
                                <div class="pull-right" ><b>Total:</b>
                                    <?php echo("<span class='text-danger'> $".$obj_cart->total."</span>") ?>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="cart-footer">
                                <a href="<?php echo(BASE_URL); ?>products/cart.php" class="pull-left"><i class="fa fa-cart-plus mr-5"></i>View Cart</a>
                                <a href="<?php echo(BASE_URL); ?>products/checkout.php" class="pull-right">
                                    <i class="fa fa-shopping-basket mr-5"></i>Checkout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- end container -->
    </div>
    <!-- end topBar -->

    <div class="middleBar">
        <div class="container">
            <div class="row display-table">
                <div class="col-sm-3 vertical-align text-left hidden-xs">
                    <a href="javascript:void(0);">
                        <img width="100" src="<?php echo(BASE_URL); ?>img/sslogo.png" alt="" />
                    </a>
                </div><!-- end col -->
                <div class="col-sm-7 vertical-align text-center">
                    <form>
                        <div class="row grid-space-1">
                            <div class="col-sm-6">
                                <input type="text" name="search" id="header_search" class="form-control input-lg" placeholder="Search">
                            </div><!-- end col -->
                            <div class="col-sm-3">
                                <select class="form-control input-lg" id="header_category_id" name="category">
                                    <option value="">All Categories</option>
                                    <?php  
                                    $categories = Category::getCategories();
                                    foreach($categories as $category) {
                                        echo("<option value='".$category->id."'>".ucfirst($category->name)."</option>");
                                    }
                                    ?>
                                </select>
                            </div><!-- end col -->
                            <div class="col-sm-3">
                                <a href="#" id="btn_header_search" class="btn btn-danger btn-block btn-lg" >Search</a>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </form>
                </div><!-- end col -->
                <div class="col-sm-2 vertical-align header-items hidden-xs">
                    <div class="header-item mr-5">
                        <a href="<?php echo(BASE_URL); ?>products/wishlist.php" data-toggle="tooltip" data-placement="top" title="Wishlist">
                            <i class="fa fa-heart-o"></i>
                            <sub><?php echo($wishlist_count); ?></sub>
                        </a>
                    </div>
                    <div class="header-item">
                        <a href="<?php echo(BASE_URL) ?>products/cart.php" data-toggle="tooltip" data-placement="top" title="Cart">
                            <i class="fa fa-shopping-bag"></i>
                            <sub><?php echo($obj_cart->count); ?></sub>
                        </a>
                    </div>
                </div><!-- end col -->
            </div><!-- end  row -->
        </div><!-- end container -->
    </div><!-- end middleBar -->

    <!-- start navbar -->
    <div class="navbar yamm navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-3" class="navbar-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="javascript:void(0);" class="navbar-brand visible-xs">
                    <img src="<?php echo(BASE_URL); ?>img/sslogo.png" width="60" alt="logo">
                </a>
            </div>
            <div id="navbar-collapse-3" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <!-- Home -->
                    <li class="active"><a href="<?php echo(BASE_URL); ?>index.php">Home</a></li>
                    <li><a href="<?php echo(BASE_URL); ?>aboutus.php" >About Us</a></li>
                    <li><a href="<?php echo(BASE_URL); ?>products/index.php">Products</a></li>
                    <li><a href="<?php echo(BASE_URL); ?>contactus.php" >Contact Us</a></li>
                    <li class="dropdown left"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Account<i class="fa fa-angle-down ml-5"></i></a>
                        <ul class="dropdown-menu">
                            <?php
                                if($obj_user->loggedin) {
                                    echo("<li><a href='".BASE_URL."users/account.php'>My Account</a></li>");
                                    echo("<li><a href='".BASE_URL."process/process_logout.php'>Logout</a></li>");
                                } else {
                                    echo("<li><a href='".BASE_URL."login.php'>Login</a></li>");
                                    echo("<li><a href='".BASE_URL."register.php'>Signup</a></li>");
                                }
                            ?>

                        </ul><!-- end ul dropdown-menu -->
                    </li>
                    <li class="dropdown "><a href="<?php echo(BASE_URL); ?>products/cart.php" class="dropdown-toggle">Cart</a></li>


                    <!-- Features -->
                </ul><!-- end navbar-nav -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown right">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            <span class="hidden-sm">Categories</span><i class="fa fa-bars ml-5"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                                $categories  = Category::getCategories();
                                foreach($categories as $category) {
                                    echo('<li><a href="'.BASE_URL.'products/index.php?brand_id=0&type=all&category_id='.$category->id.'">'.ucfirst($category->name).'</a></li>');
                                }
                            ?>
                            
                        </ul><!-- end ul dropdown-menu -->
                    </li><!-- end dropdown -->
                </ul><!-- end navbar-right -->
            </div><!-- end navbar collapse -->
        </div><!-- end container -->
    </div><!-- end navbar -->
