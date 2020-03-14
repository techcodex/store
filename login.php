<?php
require_once "models/User.php";
require_once "views/header.php";
?>
<div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="#">Smart Store</a></li>
                            <li class="active">Login</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                    <div class="col-sm-3">
                        <div class="widget" style="border-right: 1px solid lightgrey;">
                            <h5 class="subtitle text-center"><span class="text-danger">Smart</span> <span style="color:orange">Store</span></h5>
                            <figure>
                                <a href="javascript:void(0);">
                                    <img src="img/sslogo.png" alt="collection">
                                </a>
                            </figure>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Sign in to Smart Store</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        <?php
                            if(isset($_SESSION['errors'])) {
                                $errors = $_SESSION['errors'];
                                unset($_SESSION['errors']);
                            }
                        ?>
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-10 col-lg-8">
                                <form class="form-horizontal" action="process/process_login.php" method="post">
                                    <?php
                                        if(isset($_SESSION['error'])) {
                                            echo('<li class="col-md-offset-2 text-danger">'.$_SESSION['error'].'</li>');
                                            echo('<hr class="spacer-5 no-border">');
                                        }
                                    ?>
                                    <div class="form-group <?php if(isset($errors['email'])) echo('has-error'); ?>">
                                        <label for="email" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                          <input type="email" class="form-control input-md" name="email" id="email" value="<?php echo($obj_user->email); ?>" placeholder="Email">
                                          <?php
                                                if(isset($errors['email'])) {
                                                    echo("<span class='text-danger'>".$errors['email']."</span>");
                                                }
                                          ?>
                                        </div>
                                    </div><!-- end form-group -->
                                    <div class="form-group <?php if(isset($errors['password'])) echo('has-error'); ?>">
                                        <label for="password" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                          <input type="password" class="form-control input-md" name="password" id="password" placeholder="Password">
                                          <?php
                                                if(isset($errors['password'])) {
                                                    echo("<span class='text-danger'>".$errors['password']."</span>");
                                                }
                                          ?>
                                        </div>
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox-input mb-10">
                                                <input id="remember" class="styled" type="checkbox">
                                                <label for="remember">
                                                    Remember me
                                                </label>
                                            </div><!-- end checkbox-input -->
                                        </div><!-- end col -->
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <div class="col-sm-offset-5 col-sm-10">
                                            <button type="submit" class="btn btn-danger round btn-md"><i class="fa fa-lock mr-5"></i> Login</button>
                                        </div>
                                    </div><!-- end form-group -->
                                </form>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
<?php
require_once "views/footer.php";
?>