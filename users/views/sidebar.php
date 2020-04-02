
<section style="background-color: ghostwhite;margin-top:20px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3" style="font-size: 20px;">
                    <ul class="list-group">
                        <li class="list-group-item" style="padding:15px;">
                            <div class="row">
                                <div class="col-md-2 border">
                                    <span class="fa fa-home" style="color:#e55e5a"></span>
                                </div>
                                <div class="col-md-10">
                                    <a href="<?php echo(BASE_URL); ?>users/dashboard.php" class="hover">Dashboard</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" style="padding:15px;">
                            <div class="row">
                                <div class="col-md-2 border">
                                    <span class="fa fa-product-hunt" style="color:#e55e5a"></span>
                                </div>
                                <div class="col-md-10">
                                    <a href="<?php echo(BASE_URL); ?>users/products/create.php" class="hover">Add New Product</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" style="padding:15px;">
                            <div class="row">
                                <div class="col-md-2 border">
                                    <span class="fa fa-shopping-bag" style="color:#e55e5a"></span>
                                </div>
                                <div class="col-md-10">
                                    <a href="<?php echo(BASE_URL); ?>users/products/index.php" class="hover">My Products</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" style="padding:15px;">
                            <div class="row">
                                <div class="col-md-2 border">
                                    <span class="fa fa-user" style="color:#e55e5a"></span>
                                </div>
                                <div class="col-md-10">
                                    <a href="<?php echo(BASE_URL); ?>users/account.php" class="hover">My Account</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" style="padding:15px;">
                            <div class="row">
                                <div class="col-md-2 border">
                                    <span class="fa fa-cart-plus" style="color:#e55e5a"></span>
                                </div>
                                <div class="col-md-10">
                                    <a href="<?php echo(BASE_URL); ?>users/orders/sellerorders.php" class="hover">New Orders</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" style="padding:15px;">
                            <div class="row">
                                <div class="col-md-2 border">
                                    <span class="fa fa-bus" style="color:#e55e5a"></span>
                                </div>
                                <div class="col-md-10">
                                    <a href="<?php echo(BASE_URL); ?>users/orders/deliveredorders.php" class="hover">Delivered Orders</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" style="padding:15px;">
                            <div class="row">
                                <div class="col-md-2 border">
                                    <span class="fa fa-info-circle" style="color:#e55e5a"></span>
                                </div>
                                <div class="col-md-10">
                                    <a href="<?php echo(BASE_URL); ?>users/orders/disputed_orders.php" class="hover">Disputed Orders <i class="badge badge-default pull-right">
                                        <?php echo(Order::countUserdisputedOrders($obj_user->user_id)); ?>
                                    </i></a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" style="padding:15px;">
                            <div class="row">
                                <div class="col-md-2 border">
                                    <span class="fa fa-bar-chart" style="color:#e55e5a"></span>
                                </div>
                                <div class="col-md-10">
                                    <a href="<?php echo(BASE_URL); ?>users/reports/index.php" class="hover">Reports</a>  
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="panel" style="padding:10px;border:1px solid #eee;">
                        <div class="panel-body">
                            <h5> <?php  echo(ucfirst($obj_user->user_name)); ?> | Dashboard</h5>
                            <hr>