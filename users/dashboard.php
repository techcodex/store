<?php
require_once "../models/User.php";
require_once "../models/Cart.php";
require_once "views/header.php";
require_once "views/sidebar.php";
?>
<div class="row">
    <div class="panel col-md-3" style="background-color: #fbad4c;border-radius:5px;">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="">
                        <i class="fa fa-shopping-cart fa-3x" style="color:white;"></i>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8" style="color:white; font-size: 20px;">
                    <p class="text-center">New Orders</p>
                    <p class="text-center">
                        0                                    
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="panel col-md-3 col-md-offset-1 " style="background-color: #59d05d;border-radius:5px;">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="">
                        <i class="fa fa-check fa-3x" style="color:white;"></i>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8" style="color:white; font-size: 20px;">
                    <p class="text-center">Deleivered</p>
                    <p class="text-center">
                        0                                    
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="panel col-md-3 col-md-offset-1" style="background-color: #1D62F0;border-radius:5px;">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="">
                        <i class="fa fa-product-hunt fa-3x" style="color:white;"></i>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8" style="color:white; font-size: 20px;">
                    <p class="text-center">Products</p>
                    <p class="text-center">
                        0                                    
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once "views/footer.php";
require_once "../views/footer.php";
?>