<?php
session_start();
define("BASE_FOLDER","/admin/");
define("BASE_URL","http://".$_SERVER['HTTP_HOST'].BASE_FOLDER);

define("WEB_BASE_FOLDER","/");
define("WEB_BASE_URL","http://".$_SERVER['HTTP_HOST'].WEB_BASE_FOLDER);
if(isset($_COOKIE['obj_admin'])) {
    $_SESSION['obj_admin'] = $_COOKIE['obj_admin'];
}
if(isset($_SESSION['obj_admin'])) {
    $obj_admin = unserialize($_SESSION['obj_admin']);
} else {
    $obj_admin = new Admin();
}
$current = $_SERVER['PHP_SELF'];
$restricted_pages = [
    BASE_FOLDER.'dashboard.php',
];
if(in_array($current,$restricted_pages) && !$obj_admin->loggedin) {
    header("Location:".BASE_URL."index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head> 
        <!-- Title -->
        <title>Smart Store | <?php echo(ucfirst($obj_admin->user_name)); ?></title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        
        <!-- Styles -->
        <link href="<?php echo(BASE_URL); ?>assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="<?php echo(BASE_URL); ?>assets/plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="<?php echo(BASE_URL); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo(BASE_URL); ?>assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo(BASE_URL); ?>assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo(BASE_URL); ?>assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo(BASE_URL); ?>assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo(BASE_URL); ?>assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo(BASE_URL); ?>assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>	
        <!-- data tables -->
        <link href="<?php echo(BASE_URL); ?>assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo(BASE_URL); ?>assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo(BASE_URL); ?>assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>	
        	
        <!-- Theme Styles -->
        <link href="<?php echo(BASE_URL); ?>assets/css/meteor.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo(BASE_URL); ?>assets/css/layers/material-layer.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="<?php echo(BASE_URL); ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <!-- toastr css -->
        <link href="<?php echo(BASE_FOLDER); ?>assets/css/toastr.min.css" rel="stylesheet" type="text/css">

        <script src="<?php echo(BASE_URL) ?>assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        
        
    </head>
    <body class="compact-menu">
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button push-sidebar">
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="index.html" class="logo-text"><span>Smart Store</span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="show-search"><i class="icon-magnifier"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                <li>		
                                    <a href="javascript:void(0);" class="sidebar-toggle"><i class="icon-arrow-left"></i></a>
                                </li>
                                <li class="dropdown">
                                    <ul class="dropdown-menu dropdown-md dropdown-list theme-settings" role="menu">
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Fixed Header 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right fixed-header-check">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Fixed Sidebar 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right fixed-sidebar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Horizontal bar 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right horizontal-bar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Toggle Sidebar 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right toggle-sidebar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Compact Menu 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right compact-menu-check" checked>
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Hover Menu 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right hover-menu-check">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Boxed Layout 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right boxed-layout-check">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="no-link"><button class="btn btn-default reset-options">Reset Options</button></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="user-name"><?php echo(ucfirst($obj_admin->user_name)); ?><i class="fa fa-angle-down"></i></span>
                                        <?php echo("<img class='img-circle avatar' src='".WEB_BASE_URL."img/admin/".$obj_admin->image."' width='40' height='40' alt=''>");?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="<?php echo(BASE_URL); ?>admins/profile.php"><i class="icon-user"></i>Profile</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a href="<?php echo(BASE_URL); ?>changePassword.php"><i class="icon-lock"></i>Change Password</a></li>
                                        <li role="presentation"><a href="<?php echo(BASE_URL); ?>process/process_logout.php"><i class="icon-key m-r-xs"></i>Logout</a></li>
                                    </ul>
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->