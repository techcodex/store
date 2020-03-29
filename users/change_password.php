<?php
require_once "../models/Cart.php";
require_once "../models/Wishlist.php";
require_once "../models/Category.php";
require_once "../models/User.php";
require_once "../views/header.php";

if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>

<div class="container" style="margin-top: 30px;">
    <form class="well form-horizontal" action="<?php echo(BASE_URL."users/process/process_change_password.php"); ?>" method="post">
        <fieldset>
            <legend>
                <center>
                    <h2><b>Change Password</b></h2>
                </center>
            </legend><br>
            <div class="form-group">
                <label class="col-md-4 control-label">Old Password</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input name="old_password" placeholder="Enter Your old Password" class="form-control" value="" type="password">
                    </div>
                    <?php
                        if(isset($errors['old_password'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['old_password']."</span>");
                        }
                    ?>
                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">New Password</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input name="new_password" placeholder="Enter New Password" class="form-control" value="" type="password">
                    </div>
                    <?php
                        if(isset($errors['new_password'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['new_password']."</span>");
                        }
                    ?>
                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Confirm Password</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input name="confirm_password" placeholder="Confirm Password" class="form-control" value="" type="password">
                    </div>
                    <?php
                        if(isset($errors['confirm_password'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['confirm_password']."</span>");
                        }
                    ?>
                    
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Change" class="btn btn-danger col-md-offset-6">
            </div>
        </fieldset>
    </form>
</div>
<?php
require_once "../views/footer.php"
?>