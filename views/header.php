<?php
session_start();
define("BASE_FOLDER","/");
define("BASE_URL","http://".$_SERVER['HTTP_HOST'].BASE_FOLDER);
define('ITEM_PER_PAGE',3);
if(isset($_COOKIE['obj_user'])) {
    $_SESSION['obj_user'] = $_COOKIE['obj_user'];
}
if(isset($_SESSION['obj_user'])) {
    $obj_user = unserialize($_SESSION['obj_user']);
} else {
    $obj_user = new User();
}
$public_pages = [
    BASE_FOLDER."login.php",
    BASE_FOLDER."register.php",
];
$restricted_pages = [
    BASE_FOLDER."users/account.php",
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
    </style>
</head>

<body>

    <!-- start topBar -->
    <div class="topBar inverse">
        <div class="container">


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
                                echo("<li><a href=''>Account Setting</a></li>");
                            }
                        ?>
                        <li class="divider"></li>
                        <li><a href="wishlist.html">Wishlist (5)</a></li>
                        <li><a href="cart.html">My Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
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
                            Cart<sup class="text-danger">(3)</sup>
                            <i class="fa fa-angle-down ml-5"></i>
                        </span>
                    </a>
                    <ul class="cart w-250">
                        <li>
                            <div class="cart-items">
                                <ol class="items">
                                    <li>
                                        <a href="shop-single-product-v1.html" class="product-image">
                                            <img src="<?php echo(BASE_URL); ?>img/products/men_06.jpg" alt="Sample Product ">
                                        </a>
                                        <div class="product-details">
                                            <div class="close-icon">
                                                <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                            </div>
                                            <p class="product-name">
                                                <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a>
                                            </p>
                                            <strong>1</strong> x <span class="price text-danger">$59.99</span>
                                        </div><!-- end product-details -->
                                    </li><!-- end item -->
                                    <li>
                                        <a href="shop-single-product-v1.html" class="product-image">
                                            <img src="<?php echo(BASE_URL); ?>img/products/shoes_01.jpg" alt="Sample Product ">
                                        </a>
                                        <div class="product-details">
                                            <div class="close-icon">
                                                <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                            </div>
                                            <p class="product-name">
                                                <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a>
                                            </p>
                                            <strong>1</strong> x <span class="price text-danger">$39.99</span>
                                        </div><!-- end product-details -->
                                    </li><!-- end item -->
                                    <li>
                                        <a href="shop-single-product-v1.html" class="product-image">
                                            <img src="<?php echo(BASE_URL); ?>img/products/bags_07.jpg" alt="Sample Product ">
                                        </a>
                                        <div class="product-details">
                                            <div class="close-icon">
                                                <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                            </div>
                                            <p class="product-name">
                                                <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a>
                                            </p>
                                            <strong>1</strong> x <span class="price text-danger">$29.99</span>
                                        </div><!-- end product-details -->
                                    </li><!-- end item -->
                                </ol>
                            </div>
                        </li>
                        <li>
                            <div class="cart-footer">
                                <a href="cart.html" class="pull-left"><i class="fa fa-cart-plus mr-5"></i>View Cart</a>
                                <a href="checkout.html" class="pull-right"><i
                                        class="fa fa-shopping-basket mr-5"></i>Checkout</a>
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
                                <input type="text" name="keyword" class="form-control input-lg" placeholder="Search">
                            </div><!-- end col -->
                            <div class="col-sm-3">
                                <select class="form-control input-lg" name="category">
                                    <option value="all">All Categories</option>
                                    <optgroup label="Mens">
                                        <option value="shirts">Shirts</option>
                                        <option value="coats-jackets">Coats & Jackets</option>
                                        <option value="underwear">Underwear</option>
                                        <option value="sunglasses">Sunglasses</option>
                                        <option value="socks">Socks</option>
                                        <option value="belts">Belts</option>
                                    </optgroup>
                                    <optgroup label="Womens">
                                        <option value="bresses">Bresses</option>
                                        <option value="t-shirts">T-shirts</option>
                                        <option value="skirts">Skirts</option>
                                        <option value="jeans">Jeans</option>
                                        <option value="pullover">Pullover</option>
                                    </optgroup>
                                    <option value="kids">Kids</option>
                                    <option value="fashion">Fashion</option>
                                    <optgroup label="Sportwear">
                                        <option value="shoes">Shoes</option>
                                        <option value="bags">Bags</option>
                                        <option value="pants">Pants</option>
                                        <option value="swimwear">Swimwear</option>
                                        <option value="bicycles">Bicycles</option>
                                    </optgroup>
                                    <option value="bags">Bags</option>
                                    <option value="shoes">Shoes</option>
                                    <option value="hoseholds">HoseHolds</option>
                                    <optgroup label="Technology">
                                        <option value="tv">TV</option>
                                        <option value="camera">Camera</option>
                                        <option value="speakers">Speakers</option>
                                        <option value="mobile">Mobile</option>
                                        <option value="pc">PC</option>
                                    </optgroup>
                                </select>
                            </div><!-- end col -->
                            <div class="col-sm-3">
                                <input type="submit" class="btn btn-danger btn-block btn-lg" value="Search">
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </form>
                </div><!-- end col -->
                <div class="col-sm-2 vertical-align header-items hidden-xs">
                    <div class="header-item mr-5">
                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Wishlist">
                            <i class="fa fa-heart-o"></i>
                            <sub>32</sub>
                        </a>
                    </div>
                    <div class="header-item">
                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Compare">
                            <i class="fa fa-refresh"></i>
                            <sub>2</sub>
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
                    <li><a href="#">Products</a></li>
                    <li><a href="<?php echo(BASE_URL); ?>contactus.php" >Contact Us</a></li>
                    <li class="dropdown left"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Account<i class="fa fa-angle-down ml-5"></i></a>
                        <ul class="dropdown-menu">
                            <?php
                                if($obj_user->loggedin) {
                                    echo("<li><a href='".BASE_URL."process/process_logout.php'>Logout</a></li>");
                                } else {
                                    echo("<li><a href='".BASE_URL."login.php'>Login</a></li>");
                                    echo("<li><a href='".BASE_URL."register.php'>Signup</a></li>");
                                }
                            ?>

                        </ul><!-- end ul dropdown-menu -->
                    </li>
                    <li class="dropdown "><a href="#" data-toggle="dropdown" class="dropdown-toggle">Cart</a></li>


                    <!-- Features -->
                </ul><!-- end navbar-nav -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown right">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            <span class="hidden-sm">Categories</span><i class="fa fa-bars ml-5"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle"
                                    data-toggle="dropdown">Mens</a>
                                <ul class="dropdown-menu">
                                    <li><a href="category.html">Shirts</a></li>
                                    <li><a href="category.html">Coats & Jackets</a></li>
                                    <li><a href="category.html">Underwear</a></li>
                                    <li><a href="category.html">Sunglasses</a></li>
                                    <li><a href="category.html">Socks</a></li>
                                    <li><a href="category.html">Belts</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle"
                                    data-toggle="dropdown">Womens</a>
                                <ul class="dropdown-menu">
                                    <li><a href="category.html">Bresses</a></li>
                                    <li><a href="category.html">T-shirts</a></li>
                                    <li><a href="category.html">Skirts</a></li>
                                    <li><a href="category.html">Jeans</a></li>
                                    <li><a href="category.html">Pullover</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);">Kids</a></li>
                            <li><a href="javascript:void(0);">Fashion</a></li>
                            <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle"
                                    data-toggle="dropdown">SportWear</a>
                                <ul class="dropdown-menu">
                                    <li><a href="category.html">Shoes</a></li>
                                    <li><a href="category.html">Bags</a></li>
                                    <li><a href="category.html">Pants</a></li>
                                    <li><a href="category.html">SwimWear</a></li>
                                    <li><a href="category.html">Bicycles</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);">Bags</a></li>
                            <li><a href="javascript:void(0);">Shoes</a></li>
                            <li><a href="javascript:void(0);">HouseHolds</a></li>
                            <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle"
                                    data-toggle="dropdown">Technology</a>
                                <ul class="dropdown-menu">
                                    <li><a href="category.html">TV</a></li>
                                    <li><a href="category.html">Camera</a></li>
                                    <li><a href="category.html">Speakers</a></li>
                                    <li><a href="category.html">Mobile</a></li>
                                    <li><a href="category.html">PC</a></li>
                                </ul>
                            </li>
                        </ul><!-- end ul dropdown-menu -->
                    </li><!-- end dropdown -->
                </ul><!-- end navbar-right -->
            </div><!-- end navbar collapse -->
        </div><!-- end container -->
    </div><!-- end navbar -->
