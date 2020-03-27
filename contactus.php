<?php
require_once "models/User.php";
require_once "views/header.php";

if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <li><a href="#">Smart Store</a></li>
                    <li class="active">Contact Us</li>
                </ul><!-- end breadcrumb -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end breadcrumbs -->
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-wrap">
                    <h2 class="title lines">Contact Us</h2>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row column-3">
            <div class="col-sm-6 col-md-4">
                <div class="icon-boxes style1">
                    <div class="icon">
                        <i class="fa fa-phone text-info"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h6 class="thin">Quick question?</h6>
                        <h5 class="text-info">Call - +1 (260) 702-1333</h5>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-6 col-md-4">
                <div class="icon-boxes style1">
                    <div class="icon">
                        
                    </div><!-- end icon -->
                    <div class="box-content">
                        
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
            <div class="col-sm-6 col-md-4">
                <div class="icon-boxes style1">
                    <div class="icon">
                        <i class="fa fa-envelope-o text-success"></i>
                    </div><!-- end icon -->
                    <div class="box-content">
                        <h6 class="thin">or send us e-mail</h6>
                        <h5 class="text-success">Info@domain.net</h5>
                    </div>
                </div><!-- icon-box -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="spacer-40 no-border">

        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <form action="<?php echo(BASE_URL); ?>process/process_send_message.php" method="POST">
                    <div class="form-group <?php if(isset($errors['name'])) { echo("has-error"); } ?>">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control input-lg" placeholder="Name" name="name">
                        <?php
                            if(isset($errors['name'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['name']."</span>");
                            }
                        ?>
                    </div>
                    <div class="form-group <?php if(isset($errors['email'])) { echo("has-error"); } ?>">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" class="form-control input-lg" placeholder="E-mail" name="email">
                        <?php
                            if(isset($errors['email'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['email']."</span>");
                            }
                        ?>
                    </div>
                    <div class="form-group <?php if(isset($errors['message'])) { echo("has-error"); } ?>">
                        <label class="control-label" for="message">Message</label>
                        <textarea id="message" rows="6" class="form-control input-lg" placeholder="Message" name="message"></textarea>
                        <?php
                            if(isset($errors['message'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['message']."</span>");
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-default round btn-lg" value="Submit">
                    </div>
                </form>
            </div><!-- end col -->
        </div><!-- end row -->

    </div><!-- end container -->
</section>
<?php
require_once "views/footer.php";
?>