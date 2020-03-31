<?php
require_once "../../models/Admin.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";

if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

if(!isset($_GET['id'])){
    header("Location:".BASE_URL."admins/index.php");
}
$admin = Admin::getAllAdmins($_GET['id']);

?>
<div class="row">
    <div class="panel panel-white">
        <div class="panel-heading text-center">
            <h3 class="panel-title" style="font-size: 15px;"> 
            <span class="fa fa-user"></span>
             Admin / Update Admin</h3>
            <hr>
        </div>
        
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="<?php echo(BASE_URL); ?>admins/process/process_edit_admin.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo($admin->id); ?>">
                <div class="form-group <?php if(isset($errors['user_name'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-rounded" id="user_name" placeholder="Enter User Name" name="user_name" value="<?php echo($admin->user_name) ?>">
                        <?php
                            if(isset($errors['user_name'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['user_name']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['email'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control input-rounded" id="email" placeholder="Enter Email" name="email" value="<?php echo($admin->email); ?>">
                        <?php
                            if(isset($errors['email'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['email']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary col-md-offset-5" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once "../views/footer.php"
?>