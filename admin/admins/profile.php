<?php
require_once "../../models/Admin.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

$admin = $obj_admin->profile();
?>
<div class="row">
    <div class="panel panel-white">
        <div class="panel-heading text-center">
            <h3 class="panel-title" style="font-size: 15px;">
                <span class="fa fa-user"></span>
                Admins / Change Profile</h3>
            <hr>
        </div>
        <div class="col-md-5 col-md-offset-3">
            <div class="panel">
                <div class="panel-body">
                        <?php
                            echo("<center><img src='".WEB_BASE_URL."img/admin/".$admin."' class='img-circle' height='300px' width='300px'></center>");
                        ?>
                 </div>
                 </div>
                        
                    </div>
        <div class="panel-body">
        
            <form class="form-horizontal" method="POST" action="<?php echo (BASE_URL); ?>process/process_edit_profile.php" enctype="multipart/form-data">
                    <div class="form-group <?php if(isset($errors['image'])) { echo("has-error"); } ?>">
                    <div class="col-sm-7 col-md-offset-2">
                        <input type="file" class="form-control input-rounded" id="image" name="image">
                        <?php
                            if(isset($errors['image'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['image']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary col-md-offset-5" value="Update Profile">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once "../views/footer.php"
?>