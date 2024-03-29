<?php
session_start();
define("BASE_FOLDER","/");
define("BASE_URL","http://".$_SERVER['HTTP_HOST'].BASE_FOLDER);
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

    <!-- Datatable -->
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    
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
                    <a href="<?php echo(BASE_URL); ?>products/index.php">
                        <span class="hidden-xs">
                            Switch to Buying
                        </span>
                    </a>
                </li>
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
                        <li><a href="<?php echo(BASE_URL); ?>products/wishlist.php">Wishlist (<?php echo(Wishlist::countWishlist($obj_user->user_id)); ?>)</a></li>
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