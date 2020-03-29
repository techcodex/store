<?php
require_once "../models/Admin.php";
require_once "views/header.php";
require_once "views/sidebar.php";
if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

?>
<div class="row">
    <div class="panel panel-white">
        <div class="panel-heading text-center">
            <h3 class="panel-title" style="font-size: 15px;"> 
            <span class="fa fa-user"></span>
             Setting / Change Password</h3>
            <hr>
        </div>
        
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="<?php echo(BASE_URL); ?>process/process_edit_password.php">
                <div class="form-group <?php if(isset($errors['old_password'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Old Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control input-rounded" id="old_password" placeholder="Enter Old Password" name="old_password">
                        <?php
                            if(isset($errors['old_password'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['old_password']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['new_password'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control input-rounded" id="new_password" placeholder="Enter New Password" name="new_password">
                        <?php
                            if(isset($errors['new_password'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['new_password']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['confirm_new_password'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Confirm New Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control input-rounded" id="confirm_new_password" placeholder="Enter New Password Again" name="confirm_new_password">
                        <?php
                            if(isset($errors['confirm_new_password'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['confirm_new_password']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary col-md-offset-5" value="Update Password">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once "views/footer.php"
?>