<!DOCTYPE html>
<html lang="en">

<head>
    <title>Smart Store</title>
    <meta charset="utf-8">
    <meta name="description" content="Smart Store">
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--Favicon-->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">

    <!-- css files -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css" />

    <link rel="stylesheet" type="text/css" href="css/animate.css" />


    <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
    <link id="pagestyle" rel="stylesheet" type="text/css" href="css/default.css" />

    <!-- Google fonts -->

    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext"
        rel="stylesheet">
    <!-- Adding Toastr css-->

</head>

<body>

    <!-- start topBar -->
    <div class="topBar inverse">
        <div class="container">


            <ul class="topBarNav pull-right">
                <li class="linkdown">
                    <a href="javascript:void(0);">
                        <i class="fa fa-user mr-5"></i>
                        <span class="hidden-xs">
                            My Account
                            <i class="fa fa-angle-down ml-5"></i>
                        </span>
                    </a>
                    <ul class="w-150">
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Create Account</a></li>
                        <li class="divider"></li>
                        <li><a href="wishlist.html">Wishlist (5)</a></li>
                        <li><a href="cart.html">My Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                    </ul>
                </li>
                <li class="linkdown">
                    <a href="javascript:void(0);">
                        <i class="fa fa-shopping-basket mr-5"></i>
                        <span class="hidden-xs">
                            Cart<sup class="text-primary">(3)</sup>
                            <i class="fa fa-angle-down ml-5"></i>
                        </span>
                    </a>
                    <ul class="cart w-250">
                        <li>
                            <div class="cart-items">
                                <ol class="items">
                                    <li>
                                        <a href="shop-single-product-v1.html" class="product-image">
                                            <img src="img/products/men_06.jpg" alt="Sample Product ">
                                        </a>
                                        <div class="product-details">
                                            <div class="close-icon">
                                                <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                            </div>
                                            <p class="product-name">
                                                <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a>
                                            </p>
                                            <strong>1</strong> x <span class="price text-primary">$59.99</span>
                                        </div><!-- end product-details -->
                                    </li><!-- end item -->
                                    <li>
                                        <a href="shop-single-product-v1.html" class="product-image">
                                            <img src="img/products/shoes_01.jpg" alt="Sample Product ">
                                        </a>
                                        <div class="product-details">
                                            <div class="close-icon">
                                                <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                            </div>
                                            <p class="product-name">
                                                <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a>
                                            </p>
                                            <strong>1</strong> x <span class="price text-primary">$39.99</span>
                                        </div><!-- end product-details -->
                                    </li><!-- end item -->
                                    <li>
                                        <a href="shop-single-product-v1.html" class="product-image">
                                            <img src="img/products/bags_07.jpg" alt="Sample Product ">
                                        </a>
                                        <div class="product-details">
                                            <div class="close-icon">
                                                <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                            </div>
                                            <p class="product-name">
                                                <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a>
                                            </p>
                                            <strong>1</strong> x <span class="price text-primary">$29.99</span>
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
                        <img width="100" src="img/sslogo.png" alt="" />
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
                                <input type="submit" class="btn btn-default btn-block btn-lg" value="Search">
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
                    <img src="img/sslogo.png" width="60" alt="logo">
                </a>
            </div>
            <div id="navbar-collapse-3" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <!-- Home -->
                    <li class="dropdown active"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Home</a></li>
                    <li class="dropdown "><a href="#" data-toggle="dropdown" class="dropdown-toggle">About Us</a></li>
                    <li class="dropdown "><a href="#" data-toggle="dropdown" class="dropdown-toggle">Products</a></li>
                    <li class="dropdown "><a href="#" data-toggle="dropdown" class="dropdown-toggle">Contact Us</a></li>
                    <li class="dropdown left"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Account<i
                                class="fa fa-angle-down ml-5"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Signup</a></li>

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

    <!-- start section -->
    <section class="section light-backgorund">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <div class="navbar-vertical">
                        <ul class="nav nav-stacked">
                            <li class="header">
                                <h6 class="text-uppercase">Categories <i class="fa fa-navicon pull-right"></i></h6>
                            </li>
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    Mens <i class="fa fa-angle-right pull-right"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Shirts</a></li>
                                    <li><a href="javascript:void(0);">Coats & Jackets</a></li>
                                    <li><a href="javascript:void(0);">Underwear</a></li>
                                    <li><a href="javascript:void(0);">Sunglasses</a></li>
                                    <li><a href="javascript:void(0);">Socks</a></li>
                                    <li><a href="javascript:void(0);">Belts</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    Womens <i class="fa fa-angle-right pull-right"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Dresses</a></li>
                                    <li><a href="javascript:void(0);">T-shirts</a></li>
                                    <li><a href="javascript:void(0);">Skirts</a></li>
                                    <li><a href="javascript:void(0);">Jeans</a></li>
                                    <li><a href="javascript:void(0);">Pullover</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);">Kids</a></li>
                            <li><a href="javascript:void(0);">Fashion</a></li>
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                                    SportWear <i class="fa fa-angle-right pull-right"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Shoes</a></li>
                                    <li><a href="javascript:void(0);">Bags</a></li>
                                    <li><a href="javascript:void(0);">Pants</a></li>
                                    <li><a href="javascript:void(0);">Swimwear</a></li>
                                    <li><a href="javascript:void(0);">Bicycles</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);">Bags</a></li>
                            <li><a href="javascript:void(0);">Shoes</a></li>
                            <li><a href="javascript:void(0);">HouseHolds</a></li>
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                                    Technology <i class="fa fa-angle-right pull-right"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Television</a></li>
                                    <li><a href="javascript:void(0);">Camera</a></li>
                                    <li><a href="javascript:void(0);">Speakers</a></li>
                                    <li><a href="javascript:void(0);">Mobile</a></li>
                                    <li><a href="javascript:void(0);">PC</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- end navbar-vertical -->

                    <hr class="spacer-20 no-border">


                </div><!-- end col -->
                <div class="col-sm-8 col-md-9">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="owl-carousel slider owl-theme">
                                <div class="item">
                                    <figure>
                                        <a href="javascript:void(0);">
                                            <img src="img/slider/slider_10.jpg" alt="" />
                                        </a>
                                    </figure>
                                </div><!-- end item -->
                                <div class="item">
                                    <figure>
                                        <a href="javascript:void(0);">
                                            <img src="img/slider/slider_09.jpg" alt="" />
                                        </a>
                                    </figure>
                                </div><!-- end item -->
                                <div class="item">
                                    <figure>
                                        <a href="javascript:void(0);">
                                            <img src="img/slider/slider_08.jpg" alt="" />
                                        </a>
                                    </figure>
                                </div><!-- end item -->
                            </div><!-- end owl carousel -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="section white-background">
        <div class="container">
            <div class="row">
                <h3 class="text-center"> <span class="text-info ">Newest</span> Products</h3>
            </div>
            <div class="spacer-20 no-border"></div>
            <div class="row column-4">

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail store style1">
                        <div class="header">
                            <figure class="layer">
                                <a href="javascript:void(0);">
                                    <img src="img/products/women_01.jpg" alt="">
                                </a>
                            </figure>
                            <div class="icons">
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal"
                                    data-target=".productQuickView"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                            <div class="price">
                                <small class="amount off">$68.99</small>
                                <span class="amount text-primary">$59.99</span>
                            </div>
                            <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                        </div><!-- end caption -->
                    </div><!-- end thumbnail -->
                </div><!-- end col -->

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail store style1">
                        <div class="header">
                            <figure class="layer">
                                <a href="javascript:void(0);">
                                    <img src="img/products/women_01.jpg" alt="">
                                </a>
                            </figure>
                            <div class="icons">
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal"
                                    data-target=".productQuickView"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                            <div class="price">
                                <small class="amount off">$68.99</small>
                                <span class="amount text-primary">$59.99</span>
                            </div>
                            <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                        </div><!-- end caption -->
                    </div><!-- end thumbnail -->
                </div><!-- end col -->

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail store style1">
                        <div class="header">
                            <figure class="layer">
                                <a href="javascript:void(0);">
                                    <img src="img/products/bags_01.jpg" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="caption">
                            <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                            <div class="price">
                                <small class="amount off">$68.99</small>
                                <span class="amount text-primary">$59.99</span>
                            </div>
                            <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                        </div><!-- end caption -->
                    </div><!-- end thumbnail -->
                </div><!-- end col -->

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail store style1">
                        <div class="header">
                            <figure class="layer">
                                <a href="javascript:void(0);">
                                    <img src="img/products/fashion_01.jpg" alt="">
                                </a>
                            </figure>
                            <div class="icons">
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal"
                                    data-target=".productQuickView"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                            <div class="price">
                                <small class="amount off">$68.99</small>
                                <span class="amount text-primary">$59.99</span>
                            </div>
                            <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                        </div><!-- end caption -->
                    </div><!-- end thumbnail -->
                </div><!-- end col -->

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail store style1">
                        <div class="header">
                            <figure class="layer">
                                <a href="javascript:void(0);">
                                    <img src="img/products/hoseholds_05.jpg" alt="">
                                </a>
                            </figure>
                            <div class="icons">
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal"
                                    data-target=".productQuickView"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                            <div class="price">
                                <small class="amount off">$68.99</small>
                                <span class="amount text-primary">$59.99</span>
                            </div>
                            <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                        </div><!-- end caption -->
                    </div><!-- end thumbnail -->
                </div><!-- end col -->

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail store style1">
                        <div class="header">
                            <figure class="layer">
                                <a href="javascript:void(0);">
                                    <img src="img/products/kids_01.jpg" alt="">
                                </a>
                            </figure>
                            <div class="icons">
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal"
                                    data-target=".productQuickView"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                            <div class="price">
                                <small class="amount off">$68.99</small>
                                <span class="amount text-primary">$59.99</span>
                            </div>
                            <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                        </div><!-- end caption -->
                    </div><!-- end thumbnail -->
                </div><!-- end col -->

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail store style1">
                        <div class="header">
                            <figure class="layer">
                                <a href="javascript:void(0);">
                                    <img src="img/products/shoes_01.jpg" alt="">
                                </a>
                            </figure>
                            <div class="icons">
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal"
                                    data-target=".productQuickView"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                            <div class="price">
                                <small class="amount off">$68.99</small>
                                <span class="amount text-primary">$59.99</span>
                            </div>
                            <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                        </div><!-- end caption -->
                    </div><!-- end thumbnail -->
                </div><!-- end col -->

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail store style1">
                        <div class="header">
                            <figure class="layer">
                                <a href="javascript:void(0);">
                                    <img src="img/products/technology_02.jpg" alt="">
                                </a>
                            </figure>
                            <div class="icons">
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal"
                                    data-target=".productQuickView"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="caption">
                            <h6 class="regular"><a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a></h6>
                            <div class="price">
                                <small class="amount off">$68.99</small>
                                <span class="amount text-primary">$59.99</span>
                            </div>
                            <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                        </div><!-- end caption -->
                    </div><!-- end thumbnail -->
                </div><!-- end col -->
            </div><!-- end row -->


            <hr class="spacer-10 no-border" />
            <!-- Start Row-->
            <div class="row">
                <button class="btn btn-primary btn-lg col-md-offset-5" style="">Load More</button>
            </div>
            <!--End Row-->
        </div><!-- end container -->
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
                            <p class="text-white">G-Store is providing best customer service. Our customer is our asset.
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
                                    <div class='carousel slide product-slider' data-ride='carousel'
                                        data-interval="false">
                                        <div class='carousel-inner'>
                                            <div class='item active'>
                                                <figure>
                                                    <img src='img/products/men_01.jpg' alt='' />
                                                </figure>
                                            </div><!-- end item -->
                                            <div class='item'>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item"
                                                        src="https://www.youtube.com/embed/NrmMk1Myrxc"></iframe>
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
                                            <li data-target='.product-slider' data-slide-to='0' class='active'><img
                                                    src='img/products/men_01.jpg' alt='' /></li>
                                            <li data-target='.product-slider' data-slide-to='1'><img
                                                    src='img/products/men_02.jpg' alt='' /></li>
                                            <li data-target='.product-slider' data-slide-to='2'><img
                                                    src='img/products/men_03.jpg' alt='' /></li>
                                            <li data-target='.product-slider' data-slide-to='3'><img
                                                    src='img/products/men_04.jpg' alt='' /></li>
                                            <li data-target='.product-slider' data-slide-to='4'><img
                                                    src='img/products/men_05.jpg' alt='' /></li>
                                            <li data-target='.product-slider' data-slide-to='5'><img
                                                    src='img/products/men_06.jpg' alt='' /></li>
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
                                        <li><button type="button" class="btn btn-default btn-md round"><i
                                                    class="fa fa-shopping-basket mr-5"></i>Add to Cart</button></li>
                                        <li><button type="button" class="btn btn-gray btn-md round"><i
                                                    class="fa fa-heart mr-5"></i>Add to Wishlist</button></li>
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
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="icon-boxes style1">
                        <div class="icon">
                            <i class="fa fa-truck text-gray"></i>
                        </div><!-- end icon -->
                        <div class="box-content">
                            <h6 class="alt-font text-light text-uppercase"> Shipping</h6>
                            <p class="text-gray">Smart Store is providing home delivery to his customers.</p>
                        </div>
                    </div><!-- icon-box -->
                </div><!-- end col -->
                <div class="col-sm-3">
                    <div class="icon-boxes style1">
                        <div class="icon">
                            <i class="fa fa-life-ring text-gray"></i>
                        </div><!-- end icon -->
                        <div class="box-content">
                            <h6 class="alt-font text-light text-uppercase">Support 24/7</h6>
                            <p class="text-gray">We provide 24 / 7 service to it's customers so feel free to contact us.
                            </p>
                        </div>
                    </div><!-- icon-box -->
                </div><!-- end col -->
                <div class="col-sm-3">
                    <div class="icon-boxes style1">
                        <div class="icon">
                            <i class="fa fa-heart text-gray"></i>
                        </div><!-- end icon -->
                        <div class="box-content">
                            <h6 class="alt-font text-light text-uppercase">Wishlist</h6>
                            <p class="text-gray">We are providing wishlist facility.</p>
                        </div>
                    </div><!-- icon-box -->
                </div><!-- end col -->
                <div class="col-sm-3">
                    <div class="icon-boxes style1">
                        <div class="icon">
                            <i class="fa fa-credit-card text-gray"></i>
                        </div><!-- end icon -->
                        <div class="box-content">
                            <h6 class="alt-font text-light text-uppercase">Payment 100% Secure</h6>
                            <p class="text-gray">You will pay after verfiy the product you are purchasing</p>
                        </div>
                    </div><!-- icon-box -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="spacer-30">

            <div class="row">
                <div class="col-sm-3">
                    <h5 class="title">Smart Store</h5>
                    <p>Smart Store is first platform that allow his customer to confirm payment after order delivery so
                        in that way customer will check weather this is the product that he see online.</p>

                    <hr class="spacer-10 no-border">

                    <ul class="social-icons">
                        <li class="facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                        <li class="dribbble"><a href="javascript:void(0);"><i class="fa fa-dribbble"></i></a></li>
                        <li class="linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                        <li class="youtube"><a href="javascript:void(0);"><i class="fa fa-youtube"></i></a></li>
                        <li class="behance"><a href="javascript:void(0);"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div><!-- end col -->
                <div class="col-sm-3">
                    <h5 class="title">My Account</h5>
                    <ul class="list alt-list">
                        <li><i class="fa fa-angle-right"></i><a href="">Login</a></li>
                        <li><a href=""><i class="fa fa-angle-right"></i>Wishlist</a></li>
                        <li><a href=""><i class="fa fa-angle-right"></i>My Cart</a></li>
                        <li><a href=""><i class="fa fa-angle-right"></i>Checkout</a></li>
                    </ul>
                </div><!-- end col -->
                <div class="col-sm-3">
                    <h5 class="title">Information</h5>
                    <ul class="list alt-list">
                        <li><a href=""><i class="fa fa-angle-right"></i>Home</a></li>
                        <li><a href=""><i class="fa fa-angle-right"></i>About Us</a></li>
                        <li><a href=""><i class="fa fa-angle-right"></i>Stores</a></li>
                        <li><a href=""><i class="fa fa-angle-right"></i>Contact Us</a></li>
                    </ul>
                </div><!-- end col -->
                <div class="col-sm-3">
                    <h5 class="title">Payment Methods</h5>
                    <p>Payment at delivery. Beacuse customer can give money for that product that it buy</p>
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="spacer-30">

            <div class="row text-center">
                <div class="col-sm-12">
                    <p class="text-sm">© 2019. Made with <i class="fa fa-heart text-danger"></i> by <a href="">Smart
                            Store</a></p>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer>
    <!-- end footer -->


    <!-- JavaScript Files -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/nouislider.min.js"></script>
    <script type="text/javascript" src="js/jquery.sticky.js"></script>
    <script type="text/javascript" src="js/pace.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/swiper.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>