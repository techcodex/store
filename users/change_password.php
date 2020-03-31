<?php
require_once "../models/User.php";
require_once "../models/Cart.php";
require_once "../models/Wishlist.php";
require_once "../models/Category.php";
require_once "../views/header.php";
?>
<div class="container" style="margin-top: 30px;">
    <form class="well form-horizontal" action="<?php echo(BASE_URL."users/process/process_account.php"); ?>" method="post" id="update_profile">
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
                        <input name="old_password" placeholder="Enter New Password" class="form-control" value="" type="password">
                    </div>
                    <?php
                        if(isset($errors['old_password'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['old_password']."</span>");
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
                        if(isset($errors['old_password'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['old_password']."</span>");
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