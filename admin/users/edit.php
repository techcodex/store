<?php
require_once "../../models/Admin.php";
require_once "../../models/User.php";
$user = User::editAdmin($_GET['id']);
require_once "../views/header.php";
require_once "../views/sidebar.php";
?>
<div class="row">
    <div class="panel panel-white">
        <div class="panel-heading text-center">
            <h3 class="panel-title" style="font-size: 15px;"> 
            <span class="fa fa-user"></span>
             Users / Edit User</h3>
            <hr>
        </div>
        <?php
            if(isset($_SESSION['errors'])) {
                $errors = $_SESSION['errors'];
                unset($_SESSION['errors']);
            }
        ?>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="<?php echo(BASE_URL); ?>users/process/process_update_user.php">
                <?php
                if(isset($_SESSION['error'])) {
                    echo("<div class='alert alert-danger alert-dismissible'>");
                    echo("<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>");
                    echo("<strong>Error !</strong> ".$_SESSION['error']);
                    echo("</div>");
                    unset($_SESSION['error']);
                }
                ?>
                <input type="hidden" name="user_id" value="<?php echo($user->user_id); ?>">
                <div class="form-group <?php if(isset($errors['user_name'])) {echo("has-error");} ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-rounded" name="user_name" value="<?php echo($user->user_name); ?>" id="userName" placeholder="Enter User Name">
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
                        <input type="text" class="form-control input-rounded" name="email" value="<?php echo($user->email); ?>" id="userName" placeholder="Enter Email">
                        <?php
                            if(isset($errors['email'])) {
                                echo("<span class='text-danger' style='margin-left:2%;'>".$errors['email']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['first_name'])) {echo("has-error");} ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-rounded" name="first_name" value="<?php echo($user->first_name); ?>" id="firstName" placeholder="Enter First Name">
                        <?php
                            if(isset($errors['first_name'])) {
                                echo("<span class='text-danger' style='margin-left:2%;'>".$errors['first_name']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['middle_name'])) {echo("has-error");} ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Middle Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-rounded" id="middleName" name="middle_name" value="<?php echo($user->middle_name); ?>" placeholder="Enter Middle Name">
                        <?php
                            if(isset($errors['middle_name'])) {
                                echo("<span class='text-danger' style='margin-left:2%;'>".$errors['middle_name']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['last_name'])) {echo("has-error");} ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Last Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-rounded" id="lastName" name="last_name" value="<?php echo($user->last_name); ?>" placeholder="Enter Last Name">
                        <?php
                            if(isset($errors['last_name'])) {
                                echo("<span class='text-danger' style='margin-left:2%;'>".$errors['last_name']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['contact_no'])) {echo("has-error");} ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Contact No:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-rounded" id="contactNo" name="contact_no" value="<?php echo($user->contact_no); ?>" placeholder="Enter Contact No">
                        <?php
                            if(isset($errors['contact_no'])) {
                                echo("<span class='text-danger' style='margin-left:2%;'>".$errors['contact_no']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['date_of_birth'])) {echo("has-error");} ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Date Of Birth:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-rounded" id="dateOfBirth" name="date_of_birth" value="<?php echo($user->date_of_birth); ?>">
                        <?php
                            if(isset($errors['date_of_birth'])) {
                                echo("<span class='text-danger' style='margin-left:2%;'>".$errors['date_of_birth']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['street_address'])) {echo("has-error");} ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Street Address:</label>
                    <div class="col-sm-10">
                        <textarea name="street_address" placeholder="Enter Street Address" class="form-control input-rounded"><?php echo($user->street_address); ?></textarea>
                        <?php
                            if(isset($errors['street_address'])) {
                                echo("<span class='text-danger' style='margin-left:2%;'>".$errors['street_address']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['gender'])) {echo("has-error");} ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Gender:</label>
                    <div class="col-sm-10">
                        <label>
                            <input type="radio" name="gender[]" value="male" <?php if($user->gender == "male") echo("checked"); ?> >Male
                        </label>
                        <label>
                            <input type="radio" name="gender[]" value="female" <?php if($user->gender == "female") echo("checked"); ?>>Female
                        </label>
                        <?php
                            if(isset($errors['gender'])) {
                                echo("<span class='text-danger' style='margin-left:2%;'>".$errors['gender']."</span>");
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
require_once "../views/footer.php";
?>