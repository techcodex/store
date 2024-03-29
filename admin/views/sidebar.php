<div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <ul class="menu accordion-menu">
                        <li class="active"><a href="<?php echo(BASE_URL); ?>dashboard.php" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Dashboard</p><span class="active-page"></span></a></li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Admins</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo(BASE_URL); ?>admins/create.php">Add New Admin</a></li>
                                <li><a href="<?php echo(BASE_URL); ?>admins/index.php">Show All Admins</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Users</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo(BASE_URL); ?>users/create.php">Add New User</a></li>
                                <li><a href="<?php echo(BASE_URL); ?>users/index.php">Show All Users</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-energy"></span><p>Products</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo(BASE_URL); ?>products/create.php">Add New Product</a></li>
                                <li><a href="<?php echo(BASE_URL); ?>products/index.php">Show All Products</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-bulb"></span><p>Categories</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo(BASE_URL); ?>categories/create.php">Add New Category</a></li>
                                <li><a href="<?php echo(BASE_URL); ?>categories/index.php">Show All Categories</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-chemistry"></span><p>Brands</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo(BASE_URL); ?>brands/create.php">Add New Brand</a></li>
                                <li><a href="<?php echo(BASE_URL); ?>brands/index.php">Show All Brands</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-bar-chart"></span><p>Orders</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo(BASE_URL); ?>orders/new_orders.php">New Orders</a></li>
                                <li><a href="<?php echo(BASE_URL); ?>orders/delivered.php">Delivered Orders</a></li>
                                <li><a href="<?php echo(BASE_URL); ?>orders/disputed_orders.php">Disputed Orders</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="<?php echo(BASE_URL); ?>messages/index.php" class="waves-effect waves-button"><span class="menu-icon icon-envelope"></span><p>Messages</p></a>
                        <li class=""><a href="<?php echo(BASE_URL); ?>reports/index.php" class="waves-effect waves-button"><span class="menu-icon icon-pie-chart"></span><p>Reports</p></a>
                        </li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->

            <div class="page-inner">
                <div class="page-title" style="border-bottom: 1px solid lightgrey;padding:15px;">
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo(BASE_URL); ?>index.php">Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">