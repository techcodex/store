<?php
require_once "../models/Admin.php";
require_once "init.php";
if(isset($_COOKIE['obj_admin'])) {
    $_SESSION['obj_admin'] = $_COOKIE['obj_admin'];
}
if(isset($_SESSION['obj_admin'])) {
    $obj_admin = unserialize($_SESSION['obj_admin']);
} else {
    $obj_admin = new Admin();
}
if($obj_admin->loggedin) {
    header("Location:".BASE_URL."dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        
        <!-- Title -->
        <title>Smart Store | Login - Sign in</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        
        <!-- Styles -->
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="assets/plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        
        <!-- Theme Styles -->
        <link href="assets/css/meteor.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/layers/material-layer.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-login">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-4 center" style="margin-top:5%;">
                            <div class="panel panel-white" id="js-alerts">
                                <div class="panel-body">
                                    <div class="login-box">
                                        <a href="index.html" class="logo-name text-lg text-center m-t-xs">
                                            <span class="text-danger">Smart</span>
                                            <span style="color:orange;">Store</span>
                                        </a>
                                        <p class="text-center m-t-md">Please login into your account.</p>
                                        <?php
                                            if(isset($_SESSION['errors'])) {
                                                $errors = $_SESSION['errors'];
                                                unset($_SESSION['errors']);
                                            }
                                        ?>
                                        <?php
                                            if(isset($_SESSION['error'])) {
                                                echo("<li class='text-danger'>".$_SESSION['error']."</li>");
                                                unset($_SESSION['error']);
                                            }
                                        ?>
                                        <form class="m-t-md" method="post" action="<?php echo(BASE_URL); ?>process/process_login.php">
                                            <div class="form-group <?php if(isset($errors['user_name'])) { echo('has-error'); } ?>">
                                                <input type="text" name="user_name" class="form-control" placeholder="Enter User Name">
                                                <?php
                                                    if(isset($errors['user_name'])) {
                                                        echo("<span class='text-danger'>".$errors['user_name']."</span>");
                                                    }
                                                ?>
                                            </div>
                                            <div class="form-group <?php if(isset($errors['password'])) { echo('has-error'); } ?>">
                                                <input type="password" name="password" class="form-control password" placeholder="Enter Password">
                                                <?php
                                                    if(isset($errors['password'])) {
                                                        echo("<span class='text-danger'>".$errors['password']."</span>");
                                                    }
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="remember">
                                                    <input type="checkbox" name="remember" > Remember Me
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block">Login</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
	

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/js/meteor.min.js"></script>
        
    </body>
</html>