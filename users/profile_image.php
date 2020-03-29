<?php
require_once "../models/Cart.php";
require_once "../models/Wishlist.php";
require_once "../models/Category.php";
require_once "../models/User.php";
require_once "../views/header.php";
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
$user = $obj_user->profile_image();
?>
<div class="container" style="margin-top: 30px;">
    <form class="well form-horizontal" action="<?php echo(BASE_URL);?>users/process/process_profile_image.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>
                <center>
                    <h2><b>Change Profile Image</b></h2>
                </center>
            </legend><br>
            <div class="col-md-5 col-md-offset-3">
            <div class="panel">
                <div class="panel-body">
                        <?php
                            echo("<center><img src='".WEB_BASE_URL."img/users/".$user."' class='img-circle' height='300px' width='300px' alt='".$user."'></center>");
                        ?>
                 </div>
                 </div>
                        
                    </div>
            <div class="form-group">
                <div class="col-md-5 inputGroupContainer col-md-offset-3">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                        <input name="profile_image" class="form-control" value="" type="file">
                    </div>
                    <?php
                        if(isset($errors['profile_image'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['profile_image']."</span>");
                        }
                    ?>
                    
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Change" class="btn btn-danger col-md-offset-5">
            </div>
        </fieldset>
    </form>
</div>
<?php
require_once "../views/footer.php"
?>