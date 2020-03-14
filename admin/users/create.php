<?php
require_once "../../models/Admin.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";

?>
<div class="row">
    <div class="panel panel-white">
        <div class="panel-heading text-center">
            <h3 class="panel-title" style="font-size: 15px;"> 
            <span class="fa fa-user"></span>
             Users / Add New User</h3>
            <hr>
        </div>
        <?php
            if(isset($_SESSION['errors'])) {
                $errors = $_SESSION['errors'];
                unset($_SESSION['errors']);
            }
        ?>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="<?php echo(BASE_URL); ?>users/process/process_add_user.php">
                <?php
                if(isset($_SESSION['error'])) {
                    echo("<div class='alert alert-danger alert-dismissible'>");
                    echo("<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>");
                    echo("<strong>Error !</strong> ".$_SESSION['error']);
                    echo("</div>");
                    unset($_SESSION['error']);
                }
                ?>
                <div class="form-group <?php if(isset($errors['user_name'])) {echo("has-error");} ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-rounded" name="user_name" id="userName" placeholder="Enter User Name">
                        <?php
                            if(isset($errors['user_name'])) {
                                echo("<span class='text-danger' style='margin-left:2%;'>".$errors['user_name']."</span>");
                            }
                        ?>
                    </div>
                    
                </div>
                <div class="form-group <?php if(isset($errors['email'])) {echo("has-error");} ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control input-rounded" id="email" name="email" placeholder="Enter Email">
                        <?php
                            if(isset($errors['email'])) {
                                echo("<span class='text-danger' style='margin-left:2%;'>".$errors['email']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['password'])) {echo("has-error");} ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-rounded" id="password" name="password" placeholder="Enter Password">
                        <?php
                            if(isset($errors['password'])) {
                                echo("<span class='text-danger' style='margin-left:2%;'>".$errors['password']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary col-md-offset-5" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once "../views/footer.php";
?>